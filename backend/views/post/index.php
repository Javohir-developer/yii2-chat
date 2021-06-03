<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-container sidebar-closed sbar-open" id="container">


    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">



                    <div class="post-index">

            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'user_id',
                    'partner_id',
                    'body:ntext',
                    'date',
                    //'status',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>


        </div>

        </div>
    </div>
</div>

