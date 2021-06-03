<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Users */
$user = \Yii::$app->user->identity;
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?php
        if ($user->rule == 'Admin'){
            $rule = 'rule';
            $image = 'image';
            $status = [
                'attribute' => 'status',
                'value' => function($model){
                    if ($model->status == 10){
                        return 'активный';
                    }elseif ($model->status == 9){
                        return 'неактивный';
                    }elseif ($model->status == 0){
                        return 'удаление';
                    }
                },
            ];

            echo Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]);
        }else{
            $rule = 'id';
            $image = 'id';
            $status = 'id';
        }
         ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'full_name',
            $rule,
            $image,
            $status,

        ],
    ]) ?>

</div>
