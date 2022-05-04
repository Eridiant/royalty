<?php

use yii\helpers\Url;
use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'Statistic';
// var_dump('<pre>');
// var_dump($dataStats);
// var_dump('</pre>');
// die;

?>

<script>
    var users = <?= json_encode($users); ?>;
    var newUsers = <?= json_encode($newUsers); ?>;
    var pageByDay = <?= json_encode($pageByDay); ?>;
    var usersLabels = <?= json_encode($usersLabels); ?>;
    var pages = <?= json_encode($pages); ?>;
    var pagesLabels = <?= json_encode($pagesLabels); ?>;
    var country = <?= json_encode($country); ?>;
    var countryLabels = <?= json_encode($countryLabels); ?>;
    var lang = <?= json_encode($lang); ?>;
    var langLabels = <?= json_encode($langLabels); ?>;
</script>

<section class="statistic content">
    <div class="body-content">
        <div class="row">
            <div class="item">
                <p>страны</p>
                <div class="ct-chart ct-perfect-fourth country"></div>
            </div>
            <div class="item">
                <p>языки</p>
                <div class="ct-chart ct-perfect-fourth lang"></div>
            </div>
        </div>
        <div class="row">
            <div class="item">
                <p>пользователей/новых пользователей</p>
                <div class="ct-chart ct-perfect-fourth chart"></div>
            </div>
            <div class="item">
                <p>количество просмотренных страниц</p>
                <div class="ct-chart ct-perfect-fourth page-by-day"></div>
            </div>
        </div>
        <div class="row">
            <p>количество просмотренных страниц за последние 2 дня</p>
            <div class="ct-chart ct-perfect-fourth page"></div>
        </div>
    </div>
</div>
