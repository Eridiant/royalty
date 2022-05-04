<?php

use yii\helpers\Url;
use yii\helpers\Html;

/** @var yii\web\View $this */

// // $this->title = 'Statistic';
// var_dump('<pre>');
// var_dump($dataStats);
// var_dump('</pre>');
// die;

?>

<script>
    var users = <?= json_encode($users); ?>;
    var newUsers = <?= json_encode($newUsers); ?>;
    var usersLabels = <?= json_encode($usersLabels); ?>;
    var pages = <?= json_encode($pages); ?>;
    var pagesLabels = <?= json_encode($pagesLabels); ?>;
</script>

<div class="statistic"></div>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="ct-chart ct-perfect-fourth chart"></div>
            <div class="ct-chart ct-perfect-fourth page"></div>
        </div>
    </div>
</div>