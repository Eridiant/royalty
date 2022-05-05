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
    var langPref = <?= json_encode($langPref); ?>;
    var langPrefLabels = <?= json_encode($langPrefLabels); ?>;
</script>

<section class="statistic content">
    <div class="body-content">
        <div class="row">
            <div class="item">
                <h4>предпочитаемые языки/настройки браузера</h4>
                <div class="ct-chart ct-perfect-fourth lang-pref"></div>
            </div>
            <div class="item">
                <h4>выбраный язык </h4>
                <div class="ct-chart ct-perfect-fourth lang"></div>
            </div>
        </div>
        <div class="row">
            <div class="item">
                <h4>страны</h4>
                <div class="ct-chart ct-perfect-fourth country"></div>
            </div>
            <div class="item">
                <h4>пользователей/новых пользователей</h4>
                <div class="ct-chart ct-perfect-fourth chart"></div>
            </div>
        </div>
        <div class="row">
            <div class="item">
                <h4>количество просмотренных страниц</h4>
                <div class="ct-chart ct-perfect-fourth page-by-day"></div>
            </div>
            <div class="item">
                <h4>количество просмотренных страниц за последние 2 дня</h4>
                <div class="ct-chart ct-perfect-fourth page"></div>
            </div>
        </div>
    </div>
</div>
