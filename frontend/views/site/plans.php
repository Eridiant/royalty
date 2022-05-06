<?php

use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'Планировка';

?>

<div class="plans">
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="plans-bg">
            <picture>
                <img src="/images/plans/building/building.jpg" alt="">
            </picture>
        </div>
        <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
            <div id="plans" class="plans-wrapper"></div>
            <div class="plans-wrapper">
                <div class="building">
                    <div class="building-desc sm">
                        <object type="image/svg+xml" data="/images/svg/royal-build-bl.svg">
                            <img src="/images/svg/royal-build-bl.svg" alt="" />
                        </object>
                        <p class="cap">
                            <?=Yii::$app->translate->getT("Выберите этаж")?>
                        </p>
                        <p>
                            <?=Yii::$app->translate->getT("Жилые квартиры начинаются с 1 по 18 этаж. Если у вас возникнут вопросы, оставьте номер телефона или напишите нам сообщение и мы ответим в ближайшее время.")?>
                        </p>
                    </div>
                    <div class="building-choice">
                    <div class="building-change lgm" id="building-change" data-min="1" data-max="18">
                        <svg class="prev" width="161" height="25"><use xlink:href="images/icons.svg#rect"></use></svg>
                        <p class="btn"><span class="floor-changes">1</span> <?=Yii::$app->translate->getT("этаж")?>этаж</p>
                        <svg class="next" width="161" height="25"><use xlink:href="images/icons.svg#rect"></use></svg>
                    </div>
                    <div class="building-img">
                            <picture>
                                <img src="/images/plans/building/build.png" alt="">
                            </picture>
                        </div>
                        <div class="building-svg">
                            <object id="building" type="image/svg+xml" data="/images/svg/building.svg">
                                ваш браузер устарел
                            </object>
                        </div>
                    </div>
                    <div class="building-floor lg">
                        <p class="fl num floor-changes">2</p>
                        <p><?=Yii::$app->translate->getT("этаж")?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="plans-mb smm">
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="building-sm">
            <object type="image/svg+xml" data="/images/svg/royal-build-bl.svg">
                <img src="/images/svg/royal-build-bl.svg" alt="" />
            </object>
            <p class="cap">
                <?=Yii::$app->translate->getT("Выберите этаж")?>
            </p>
            <p>
                <?=Yii::$app->translate->getT("Жилые квартиры начинаются с 2 по 18 этаж. Если у вас возникнут вопросы, оставьте номер телефона или напишите нам сообщение и мы ответим в ближайшее время.")?>
            </p>
        </div>
    </div>
</div>

<div class="popup-wrapper popup-call-back">
    <div class="popup">
        <div class="popup-inner sending">
            <div class="subtitle">
                <?=Yii::$app->translate->getT("Узнать цену")?>
            </div>
            <p>
                <?=Yii::$app->translate->getT("Заполнте поля и мы Вам перезвоним в течение 15 минут")?>
            </p>
            <div class="">
                <form name="callBack" class="form" action="#" method="post">
                    <label for="call-name"></label>
                    <input name="name" id="call-name" type="text" placeholder="Имя" required>
                    <label for="call-phone"></label>
                    <input name="phone" id="call-phone" pattern="(\+?\d[- .]*){7,15}" type="tel" class=""
                        placeholder="Телефон" required>
                    <button type="submit" href="#" class="btn" data-btn="popup-success"><span><?=Yii::$app->translate->getT("Оставить заявку")?></span></button>
                </form>
            </div>
        </div>
    </div>
</div>