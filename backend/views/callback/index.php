<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FeedbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Callback';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute'=>'lang',
                'label'=>'Локаль',
                'headerOptions' => ['width' => '5%', 'class' => 'dfm'],
                'contentOptions' => ['class' => 'dfm'],
            ],
            [
                'attribute'=>'name',
                'label'=>'Имя',
                'headerOptions' => ['width' => '7%'],
            ],
            'phone',
            [
                'attribute' => 'country',
                'headerOptions' => ['class' => 'dfm'],
                'contentOptions' => ['class' => 'dfm'],
            ],
            [
                'label' => 'Статус',
                'attribute'=>'viewed',
                'format' => 'raw',
                'value'=>function ($model) {
                    if($model->viewed == 1){
                        return '<p style="color:green">Просмотрена</p>';
                    }elseif ($model->viewed == 0) {
                        return '<p style="color:#c55">Новая</p>';
                    }
                },
            ],
            // 'subject',
            // 'body:ntext',
            //'viewed',
            [
                'attribute' => 'created_at',
                'headerOptions' => ['class' => 'dfm'],
                'contentOptions' => ['class' => 'dfm'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Действия', 
                'headerOptions' => ['width' => '80'],
                'template' => '{view} {delete}',
            ],
        ],
    ]); ?>


</div>
