<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Галерея';
?>
<div class="gallery <?= $rend == "gallery" ? "gall" : $rend ; ?>">
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="gallery-wrapper">
            <div class="gallery-img">
                <?= $this->render("_{$rend}-slide") ?>
                <!-- <picture>
                    <img src="/images/del/header.jpg" alt="">
                </picture>
                <div class="gallery-video">
                    <svg class="gallery-video" width="115" height="115"><use xlink:href="/images/icons.svg#video"></use></svg>
                </div>
                <div class="gallery-cub">
                    <svg class="gallery-3d" width="59" height="37"><use xlink:href="/images/icons.svg#3d"></use></svg>
                    <svg width="36" height="36"><use xlink:href="/images/icons.svg#cub"></use></svg>
                </div> -->
            </div>
            <div class="gallery-inner">
                <div class="gallery-text">
                    <h1 class="title"><?=Yii::$app->translate->getT("Галерея")?></h1>
                    <div class="gallery-item item">
                        <a class="gall" href="<?= Url::toRoute('/site/gallery') ?>"><?=Yii::t('frontend', 'Жилой дом')?></a>
                        <a class="construction" href="<?= Url::toRoute('/site/construction') ?>"><?=Yii::t('frontend', 'Ход строительства')?></a>
                        <a class="batumy" href="<?= Url::toRoute('/site/batumy') ?>"><?=Yii::t('frontend', 'Батуми')?></a>
                    </div>
                    <a href="/presentation/Royal_Residence_<?= Yii::$app->language; ?>.pdf" class="btn">
                        <svg width="14" height="16"><use xlink:href="/images/icons.svg#pdf"></use></svg>
                        <span><?=Yii::t('frontend', 'Скачать презентацию')?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->render("_{$rend}") ?>

<div class="dev">
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="dev-wrapper">
            <div class="dev-img">
                <picture>
                    <img src="/images/del/header.jpg" alt="">
                </picture>
            </div>
            <div class="dev-inner">
                <div class="dev-desc">
                    <p class="cap"><?=Yii::$app->translate->getT("о жилом комплексе")?></p>
                    <h2 class="title"><?=Yii::$app->translate->getT("Royal development")?></h2>
                    <div class="dev-column">
                        <p>
                            <?=Yii::$app->translate->getT("“Royal development” - это премиальный жилой комплекс на 1-й береговой линии, в 150 метрах от моря. В продаже  апартаменты комфорт и бизнес класса от 28 кв.метров с видом на море и горы.")?>
                        </p>
                        <p>
                            <?=Yii::$app->translate->getT("Жилой комплекс “Royal development” привлекателен для инвестирования и постоянного проживания, концепция современного и роскошного ЖК для жизни и бизнеса, ЖК расположен в городе Батуми, Грузия")?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
