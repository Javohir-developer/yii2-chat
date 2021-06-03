<?php
namespace frontend\models;

use Yii;
use yii\base\BaseObject;
use yii\base\Model;
use common\models\User;
use common\rbac\models\Role;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $full_name;
    public $email;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['full_name', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['full_name', 'string', 'min' => 2, 'max' => 255],



            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return false;
        }
        
        $user = new User();
        $role = new Role();
        $user->username = $this->username;
        $user->full_name = $this->full_name;
        $user->status=10;
        $user->rule = 'User';
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
//        return $user->save();

        if ($user->save()){
            $role->user_id = $user->getId();
            $role->item_name = 'User';
            $role->save();
        }
        return true;

    }

//___________________________________________________________

//    public function signup()
//    {
//        if ($this->validate()) {
//            $user = new User();
//            $user->username = $this->username;
//            $user->email = $this->email;
//            $user->setPassword($this->password);
//            $user->generateAuthKey();
//            $user->save(false);
//
//            // нужно добавить следующие три строки:
//            $auth = Yii::$app->authManager;
//            $authorRole = $auth->getRole('author');
//            $auth->assign($authorRole, $user->getId());
//
//            return $user;
//        }
//
//        return null;
//    }

//____________________________________________________________________
//    public function signup()
//    {
//        if ($this->validate()) {
//
//            $user = new User();
//            $user->username = $this->username;
//            $user->email = $this->email;
//            $user->setPassword($this->password);
//            $user->generateAuthKey();
//            $user->generateEmailVerificationToken();
//            // return $user->save() && $this->sendEmail($user);
//            $user->save();
//
//            $permissionList = $_POST['SignupForm']['permissions'];
//
//            // var_dump($user->id);
//            // exit;
//            foreach ($permissionList as $value) {
//
//                $newPer = new AuthAssignment;
//                $newPer->user_id = $user->id;
//                $newPer->item_name = $value;
//                $newPer->save();
//
//
//            }
//
//            $this->sendEmail($user);
//            return $user;
//
//        }
//
//    }



    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
