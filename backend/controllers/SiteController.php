<?php
namespace backend\controllers;

use common\models\Post;
use common\models\User;
use common\rbac\models\Role;
use frontend\models\SignupForm;
use Yii;
use yii\base\Exception;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Users;


/**
 * Site controller
 */
class SiteController extends MyController
{

    public function actionIndex()
    {
        $user = \Yii::$app->user->identity;
        $users = Users::find()
            ->leftJoin('post', 'post.user_id=user.id')
            ->where(['post.status'=>Post::STATUS_ACTIVE])
            ->andWhere(['user.status'=>User::STATUS_ACTIVE])
            ->andWhere(['!=', 'user.id', $user->id])
            ->all();
        $posts = Post::find()
            ->where(['post.status'=>Post::STATUS_ACTIVE])
            ->orWhere(['post.user_id'=> $user->id ])
            ->orWhere(['post.partner_id'=> $user->id ])
            ->all();
        return $this->render('index', ['users'=>$users, 'posts'=>$posts]);
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup() ) {
            Yii::$app->session->setFlash('success', 'Ro\'yxatdan o\'tganingiz uchun tashakkur.');
            return $this->redirect(['/site/login']);
        }else{
            return $this->render('signup', [
                'model' => $model,
            ]);
        }


    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
