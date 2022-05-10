<?php


use yii\helpers\Html;

Html::csrfMetaTags();

// use yii\helpers\Html;
// use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = Yii::t('frontend', 'Контакты');

$this->registerJsFile(
    '//maps.googleapis.com/maps/api/js?key=AIzaSyAij3ofbFzI6vQYhL_IBZHvawFtHZ9_gCY&region=EN&language=en',
    ['position' => $this::POS_END, 'async'=>true]
);

?>

<div id="google-maps" class="map">
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div id="maps" class="maps"></div>
        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1990.6169153523354!2d41.59324362088274!3d41.62212559382382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1s41.62230491491541%2C%2041.59460414225088!5e0!3m2!1sru!2s!4v1650356254295!5m2!1sru!2s" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
    </div>
</div>
<div class="contacts">
    <div class="container" style="max-width: 1100px; margin-left: auto; margin-right: auto">
        <div class="contacts-wraper">
            <div class="pattern"></div>
            <div class="contacts-inner">
                <div class="contacts-contacts">
                    <p class="subtitle"><?=Yii::$app->translate->getT("Контакты")?></p>
                    <a href="tel:+995558499966"><svg width="21" height="20"><use xlink:href="images/icons.svg#phone"></use></svg> +995 (558) 49-99-66</a>
                    <a href="tel:+995558499922"><svg width="21" height="20"><use xlink:href="images/icons.svg#phone"></use></svg> +995 (558) 49-99-22</a>
                    <a href="mailto:info@kaligraf.ge"><svg width="21" height="16"><use xlink:href="images/icons.svg#mail"></use></svg> info@royalresidence.ge</a>
                    <p><svg width="21" height="24"><use xlink:href="images/icons.svg#address"></use></svg><?=Yii::$app->translate->getT("Rejeb nizharadze nomer 5")?></p>
                    <div class="btn act-btn" data-btn="popup-call-back">
                        <span><?=Yii::t('frontend', 'Обратный звонок')?></span>
                        <svg width="20" height="20"><use xlink:href="images/icons.svg#phone"></use></svg>
                    </div>
                </div>
                <div class="contacts-img sm">
                    <picture>
                        <img src="/images/del/header.jpg" alt="">
                    </picture>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup-wrapper popup-call-back">
    <div class="popup">
        <div class="popup-inner sending">
            <div class="subtitle">
                <?=Yii::t('frontend', 'Обратный звонок')?>
            </div>
            <p>
                <?=Yii::$app->translate->getT("Заполнте поля и мы Вам перезвоним в течение 15 минут")?>
            </p>
            <div class="">
                <form name="callBack" class="form" action="#" method="post">
                    <label for="call-name"></label>
                    <input name="name" id="call-name" type="text" placeholder="<?=Yii::t('frontend', 'Имя')?>" required>
                    <label for="call-phone"></label>
                    <input name="phone" id="call-phone" pattern="(\+?\d[- .]*){7,19}" type="tel" class=""
                        placeholder="<?=Yii::t('frontend', 'Телефон')?>" required>
                    <button type="submit" href="#" class="btn" data-btn="popup-success"><span><?=Yii::t('frontend', 'Оставить заявку')?></span></button>
                </form>
            </div>
        </div>
    </div>
</div>


