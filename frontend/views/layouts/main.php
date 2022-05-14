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
$model = \backend\modules\language\models\Language::find()->where(['deleted_at' => null])->all(); 
$cLang = \backend\modules\language\models\Language::find()->where(['deleted_at' => null, 'key' => $currentLang])->one();

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= $cLang->code ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= Html::encode($this->title) ?></title>
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="/images/favicon/site.webmanifest">
	<link rel="mask-icon" href="/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

    <?php $this->registerMetaTag(['property' => 'og:title', 'content' => 'Premium class high rise residential complex']); ?>
    <?php $this->registerMetaTag(['property' => 'og:image', 'content' => Url::toRoute('/images/image.jpg', true)]); ?>

    <?php $this->registerCsrfMetaTags() ?>
    <?php
    if (!Yii::$app->user->isGuest) {
        $this->registerCssFile('/frontend/web/css/admin.css');
        $this->registerJsFile('/frontend/web/js/admin.js');
    }
    ?>
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
        <form name="trslt" class="form" action="#" method="post">
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
