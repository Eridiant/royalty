<?php
use yii\helpers\Url;
use yii\helpers\Html;
use backend\modules\language\models\Language;

/* @var $this \yii\web\View */
/* @var $content string */
// Yii::$app->name
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">RA</span><span class="logo-lg">royal-admin</span>', '/site/login', ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                <?php
                    $messages = \backend\models\Callback::find()->where(['viewed' => 0])->orderBy(['created_at' => SORT_DESC])->limit(5)->all();
                    $mesCount = \backend\models\Callback::find()->where(['viewed' => 0])->count();
                ?>
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success"><?= $mesCount; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">У вас <?= $mesCount; ?> новых сообщения</li>
                        <li>
                            <?php foreach ($messages as $message): ?>
                                <ul class="menu">
                                    <li><!-- start message -->
                                    <a href="<?=Url::toRoute(['/feedback/views', 'id' => $message->id]) ?>">
                                        <h4>
                                            Имя <?= $message->name; ?>
                                            <small><i class="fa fa-clock-o"></i><?= Yii::$app->formatter->asRelativeTime($message->created_at); ?></small>
                                        </h4>
                                        <p><?= $message->phone; ?></p>
                                    </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                            <?php endforeach; ?>
                        </li>
                        <li class="footer">
                            <?= Html::a('Посмотреть все сообщения', '/admin/callback/index') ?>
                        </li>
                    </ul>
                </li>
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <!-- <span class="label label-warning">10</span> -->
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 0 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <!-- <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li>
                            </ul> -->
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                
                <!-- User Account: style can be found in dropdown.less -->

                <!--Блок языковых настроек-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= strtoupper(Language::getCurrent()->key); ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <?php foreach ($languages as $language) : ?>
                            <li>
                                <a href="<?= Url::to(['/language/change', 'id' => $language->id]) ?>"><?= strtoupper($language->key) ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <!--.Блок языковых настроек-->

                <!-- <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li> -->
            </ul>
        </div>
    </nav>
</header>
