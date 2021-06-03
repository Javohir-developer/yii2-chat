<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$user = \Yii::$app->user->identity;
$rule = ['User' => 'Гость', 'Admin' => 'Администратор', 'Drektor'=>'Пользователь'];
/* @var $this yii\web\View */
/* @var $model common\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <?php
    if ($user->rule == 'Admin'){
        echo $form->field($model, 'password')->passwordInput(['class' => 'form-control']);
        echo $form->field($model, 'rule')->dropDownList(['User' => 'Гость', 'Admin' => 'Администратор', 'Drektor'=>'Пользователь'],['prompt'=>'Select Option']);
        echo $form->field($model, 'status')->dropDownList([10 => 'активный', 9 => 'неактивный', 0=>'удаление']);
    }

    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
