<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);

$currentLang = Yii::$app->language;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <?php
    if (!Yii::$app->user->isGuest) {
        $this->registerCssFile('/frontend/web/css/admin.css');
        $this->registerJsFile('/frontend/web/js/admin.js');
    }
    ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="<?= $this->context->bodyClass; ?>">

<?php if (!Yii::$app->user->isGuest): ?>
    <!-- ------Admin-panel----------- -->
    <div class="admin">
        <a href="<?= Url::toRoute('/site/logout') ?>" class="admin-item">logout</a>
        <a href="<?= Url::toRoute('/admin') ?>" class="admin-item">admin-panel</a>
    </div>
    <div class="admin-form">
        <p class="admin-source-text">Ваша заявка отправлена, мы перезвоним</p>
        <form class="form" action="#" method="post">
            <textarea name="translate" placeholder="translate" class="translation"></textarea>
            <button class="btn" type="submit">отправить</button>
        </form>
    </div>
    <!-- ------Admin-panel-end----------- -->
<?php endif; ?>

<?php $this->beginBody() ?>

<?php require_once('template-header.php'); ?>

<?= $content ?>

<?php require_once('template-footer.php'); ?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
