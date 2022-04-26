<?php

use yii\helpers\Url;
use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'Royal';
?>
<div class="site-index">

    <div class="body-content">

        <h4>
            <?= Html::a('перейти на сайт', '/', ['class' => 'log']) ?>
        </h4>
        <h4>
            <?= Html::a('перевод', '/site/login', ['class' => 'log']) ?>
        </h4>

    </div>
</div>
