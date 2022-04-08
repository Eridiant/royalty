<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Flat */

$this->title = 'Create Flat';
$this->params['breadcrumbs'][] = ['label' => 'Flats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
