<?php

use yii\helpers\Url;
use yii\helpers\Html;

/** @var yii\web\View $this */
$this->title = 'Royal development';
// $this->registerMetaTag(['name' => 'title', 'content' => Yii::t('frontend', 'Главная страница - Апартаменты в Батуми')]);
// $this->registerMetaTag(['name' => 'description', 'content' => Yii::t('frontend', 'Калиграфи Тауерс. Апартаменты в Батуми у моря')]);

?>

<div class="header">
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="header-bg">
            <picture>
                <source type="image/jpeg" srcset="/images/index/header/header-mb-1x.jpg, /images/index/header/header-mb-2x.jpg 2x, /images/index/header/header-mb-4x.jpg 4x" media="(max-width: 360px)">
                <source type="image/jpeg" srcset="/images/index/header/header-xs-1x.jpg, /images/index/header/header-xs-2x.jpg 2x, /images/index/header/header-xs-4x.jpg 4x" media="(max-width: 480px)">
                <source type="image/jpeg" srcset="/images/index/header/header-lg-1x.jpg, /images/index/header/header-lg-2x.jpg 2x, /images/index/header/header-lg-4x.jpg 4x" media="(max-width: 1350px)">
				<source type="image/jpeg" srcset="/images/index/header/header-1x.jpg, /images/index/header/header-2x.jpg 2x, /images/index/header/header-3x.jpg 3x">
				<img src="/images/index/header/header-1x.jpg" alt="">
            </picture>
        </div>
        <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
            <div class="header-title mb">
                <svg width="115" height="115"><use xlink:href="/images/icons.svg#video"></use></svg>
                <object type="image/svg+xml" data="/images/svg/royal-mb.svg">
                    <img src="/images/svg/royal-mb.svg" alt="">
                </object>
            </div>
            <div class="header-bg-logo dt">
                <div class="header-inner">
                    <div class="header-title">
                        <object type="image/svg+xml" data="/images/svg/royal-bg.svg">
                            <img src="/images/svg/royal-bg.svg" alt="">
                        </object>
                        <!-- <p>Выберите квартиру своей мечты на берегу моря</p> -->
                        <p><?=Yii::$app->translate->getT("Выберите квартиру своей мечты на берегу моря")?></p>
                    </div>
                </div>
            </div>
            <div class="header-wrapper">
                <!-- <div class="nav">
                    <div class="nav-logo">
                        <object type="image/svg+xml" data="/images/svg/logo.svg">
                            <img src="/images/svg/logo.svg" alt="">
                        </object>
                    </div>
                    <div class="nav-wrap">
                        <div class="nav-phone radius">
                            <svg width="19" height="19"><use xlink:href="/images/icons.svg#phone"></use></svg>
                        </div>
                        <div class="nav-lang radius">
                            <a href="#">ru</a>
                        </div>
                    </div>
                </div> -->
                <div class="header-inner dt">
                    <div class="header-title">
                        <object type="image/svg+xml" data="/images/svg/royal.svg">
                            <img src="/images/svg/royal.svg" alt="">
                        </object>
                        <p><?=Yii::$app->translate->getT("Выберите квартиру своей мечты на берегу моря")?></p>
                    </div>
                </div>
                <div class="header-footer-wtapper dt">
                    <div class="header-footer">
                        <div class="header-footer-row">
                            <!-- <div class="nav-radius">
                                <a href="tel:+70988900043">
                                    <svg width="19" height="19"><use xlink:href="/images/icons.svg#phone"></use></svg>
                                </a>
                            </div> -->
                            <a href="tel:+995558499966">+995 (558) 49-99-66</a>
                            <a href="tel:+995558499922">+995 (558) 49-99-22</a>
                            <!-- <a href="#" class="gold">
                                <svg width="18" height="18"><use xlink:href="/images/icons.svg#whatsapp"></use></svg>
                            </a>
                            <a href="#" class="gold">
                                <svg width="18" height="18"><use xlink:href="/images/icons.svg#viber"></use></svg>
                            </a> -->
                        </div>
                        <div class="header-footer-row social">
                            <a href="https://www.facebook.com/RoyalDevelopmentBatumi">
                                <svg width="27" height="27"><use xlink:href="/images/icons.svg#fb"></use></svg>
                            </a>
                            <a href="#">
                                <svg width="27" height="27"><use xlink:href="/images/icons.svg#youtube"></use></svg>
                            </a>
                            <a href="#">
                                <svg width="27" height="27"><use xlink:href="/images/icons.svg#instagram"></use></svg>
                            </a>
                            <a href="#">
                                <svg width="27" height="27"><use xlink:href="/images/icons.svg#telegram"></use></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-footer-row social pa">
            <a href="https://www.facebook.com/RoyalDevelopmentBatumi">
                <svg width="27" height="27"><use xlink:href="/images/icons.svg#fb"></use></svg>
            </a>
            <a href="#">
                <svg width="27" height="27"><use xlink:href="/images/icons.svg#youtube"></use></svg>
            </a>
            <a href="#">
                <svg width="27" height="27"><use xlink:href="/images/icons.svg#instagram"></use></svg>
            </a>
            <a href="#">
                <svg width="27" height="27"><use xlink:href="/images/icons.svg#telegram"></use></svg>
            </a>
        </div>
    </div>
</div>

<div class="development">
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="pattern"></div>
        <div class="development-bg md">
            <picture>
                <source type="image/jpeg" srcset="/images/index/development/dev-bg-1x.jpg, /images/index/development/dev-bg-2x.jpg 2x">
                <img src="/images/index/development/dev-bg-1x.jpg" loading="lazy" width="1920" alt="">
            </picture>
        </div>
        <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
            <div class="development-img mdm">
                <picture>
                    <source type="image/jpeg" srcset="/images/index/development/dev-gl-1x.jpg, /images/index/development/dev-gl-2x.jpg 2x" media="(max-width: 360px)">
                    <source type="image/jpeg" srcset="/images/index/development/dev-1x.jpg, /images/index/development/dev-2x.jpg 1.5x">
                    <img src="/images/index/development/dev-1x.jpg" loading="lazy" width="893" height="1205" alt="">
                </picture>
            </div>
            <div class="development-wrapper">
                <p class="cap"><?=Yii::$app->translate->getT("о жилом комплексе")?></p>
                <p class="title">Royal development</p>
                <div class="development-text">
                    <p>
                        <?=Yii::$app->translate->getT("“Royal development” - это премиальный жилой комплекс на 1-й береговой линии, в 150 метрах от моря. В продаже  апартаменты комфорт и бизнес класса от 28 кв.метров с видом на море и горы.")?>
                    </p>
                    <p>
                        <?=Yii::$app->translate->getT("Жилой комплекс “Royal development” привлекателен для инвестирования и постоянного проживания, концепция современного и роскошного ЖК для жизни и бизнеса, ЖК расположен в городе Батуми, Грузия")?>
                    </p>
                </div>
                <div class="development-items">
                    <div class="development-item">
                        <span class="radius">
                            <svg width="18" height="18"><use xlink:href="/images/icons.svg#anchor"></use></svg>
                        </span>
                        <p><?=Yii::$app->translate->getT("Близко к морю 150 метров")?></p>
                    </div>
                    <div class="development-item">
                        <span class="radius">
                            <svg width="18" height="18"><use xlink:href="/images/icons.svg#key"></use></svg>
                        </span>
                        <p><?=Yii::$app->translate->getT("Планировочные решения от 28 кв.")?></p>
                    </div>
                    <div class="development-item">
                        <span class="radius">
                            <svg width="18" height="18"><use xlink:href="/images/icons.svg#hotel"></use></svg>
                        </span>
                        <p><?=Yii::$app->translate->getT("Архитектура и концепция ЖК")?></p>
                    </div>
                    <div class="development-item">
                        <span class="radius">
                            <svg width="18" height="18"><use xlink:href="/images/icons.svg#secure"></use></svg>
                        </span>
                        <p><?=Yii::$app->translate->getT("Надежный застройщик и аккредитация банка")?></p>
                    </div>
                    <div class="development-item">
                        <span class="radius">
                            <svg width="19" height="18"><use xlink:href="/images/icons.svg#money"></use></svg>
                        </span>
                        <p><?=Yii::$app->translate->getT("Условия приобретения и ценовая политика")?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panorama">
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <!-- <div class="panoramas-wrapper">
            <div class="panorama-inner panorama-show">
                <picture>
                    <img src="/images/del/panorama.jpg" alt="">
                </picture>
            </div>
            <div class="header-bg-inner">
                <picture>
                </picture>
            </div>
        </div>
        <div class="panorama-switch">
            <svg width="24" height="24"><use xlink:href="images/icons.svg#sun"></use></svg>
            <svg class="panorama-switch-rt" width="71" height="30"><use xlink:href="images/icons.svg#switcher"></use></svg>
            <svg width="21" height="21"><use xlink:href="images/icons.svg#moon"></use></svg>
        </div> -->
        <div class="panorama-slider swiper" style="--swiper-navigation-color: var(--white-color); --swiper-navigation-size: 70px">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <picture>
                        <source type="image/jpeg" srcset="/images/index/panorama/panorama-gl-1-1x.jpg, /images/index/panorama/panorama-gl-1-2x.jpg 2x" media="(max-width: 360px)">
                        <source type="image/jpeg" srcset="/images/index/panorama/panorama-1-1x.jpg, /images/index/panorama/panorama-1-2x.jpg 2x">
                        <img src="/images/index/panorama/panorama-1-1x.jpg" loading="lazy" width="1920" height="1011" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <source type="image/jpeg" srcset="/images/index/panorama/panorama-gl-2-1x.jpg, /images/index/panorama/panorama-gl-2-2x.jpg 2x" media="(max-width: 360px)">
                        <source type="image/jpeg" srcset="/images/index/panorama/panorama-2-1x.jpg, /images/index/panorama/panorama-2-2x.jpg 2x">
                        <img src="/images/index/panorama/panorama-2-1x.jpg" loading="lazy" width="1920" height="1011" alt="">
                    </picture>
                </div>
            </div>
            <div class="swiper-button-next panorama-button-next"></div>
            <div class="swiper-button-prev panorama-button-prev"></div>
        </div>
    </div>
</div>

<div class="location" id="location">
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="location-map">
            <picture>
				<source type="image/jpeg" srcset="/images/index/location/map-1x.jpg, /images/index/location/map-2x.jpg 2x">
                <img src="/images/index/location/map-1x.jpg" loading="lazy" width="895" height="917" alt="">
            </picture>
        </div>
        <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
            <div class="location-wrapper">
                <div class="location-inner">
                    <p class="cap"><?=Yii::$app->translate->getT("о жилом комплексе")?></p>
                    <p class="title"><?=Yii::$app->translate->getT("Расположение")?></p>
                    <div class="location-map-mb">
                        <picture>
                            <source type="image/jpeg" srcset="/images/index/location/map-gl-1x.jpg, /images/index/location/map-gl-2x.jpg 2x" media="(max-width: 360px)">
                            <source type="image/jpeg" srcset="/images/index/location/map-mb-1x.jpg, /images/index/location/map-mb-2x.jpg 2x">
                            <img src="/images/index/location/map-mb-1x.jpg" loading="lazy" width="548" height="770" alt="">
                        </picture>
                    </div>
                    <p class="cap"><?=Yii::$app->translate->getT("рядом с комплексом")?></p>
                    <div class="location-slider-wrapper">
                        <div class="location-slider swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="location-slider-img">
                                        <picture>
                                            <source type="image/jpeg" srcset="/images/index/location/loc-1-1x.jpg, /images/index/location/loc-1-2x.jpg 2x">
                                            <img src="/images/index/location/loc-1-1x.jpg" width="364" height="243" loading="lazy" alt="">
                                        </picture>
                                    </div>
                                    <p><?=Yii::$app->translate->getT("Первая линия от моря в 70 метрах")?></p>
                                </div>
                                <div class="swiper-slide">
                                    <div class="location-slider-img">
                                        <picture>
                                            <source type="image/jpeg" srcset="/images/index/location/loc-2-1x.jpg, /images/index/location/loc-2-2x.jpg 2x">
                                            <img src="/images/index/location/loc-2-1x.jpg" width="364" height="243" loading="lazy" alt="">
                                        </picture>
                                    </div>
                                    <p><?=Yii::$app->translate->getT("Парк отдых 6000 кв.м")?></p>
                                </div>
                                <div class="swiper-slide">
                                    <div class="location-slider-img">
                                        <picture>
                                            <source type="image/jpeg" srcset="/images/index/location/loc-3-1x.jpg, /images/index/location/loc-3-2x.jpg 2x">
                                            <img src="/images/index/location/loc-3-1x.jpg" width="364" height="243" loading="lazy" alt="">
                                        </picture>
                                    </div>
                                    <p><?=Yii::$app->translate->getT("Набережная 10 км")?></p>
                                </div>
                                <div class="swiper-slide">
                                    <div class="location-slider-img">
                                        <picture>
                                            <source type="image/jpeg" srcset="/images/index/location/loc-4-1x.jpg, /images/index/location/loc-4-2x.jpg 2x">
                                            <img src="/images/index/location/loc-4-1x.jpg" width="364" height="243" loading="lazy" alt="">
                                        </picture>
                                    </div>
                                    <p><?=Yii::$app->translate->getT("Торговый центр 3000 кв.м")?></p>
                                </div>
                                <div class="swiper-slide">
                                    <div class="location-slider-img">
                                        <picture>
                                            <source type="image/jpeg" srcset="/images/index/location/loc-5-1x.jpg, /images/index/location/loc-5-2x.jpg 2x">
                                            <img src="/images/index/location/loc-5-1x.jpg" width="364" height="243" loading="lazy" alt="">
                                        </picture>
                                    </div>
                                    <p><?=Yii::$app->translate->getT("Детская площадка 200 кв.метров")?></p>
                                </div>
                                <div class="swiper-slide">
                                    <div class="location-slider-img">
                                        <picture>
                                            <source type="image/jpeg" srcset="/images/index/location/loc-6-1x.jpg, /images/index/location/loc-6-2x.jpg 2x">
                                            <img src="/images/index/location/loc-6-1x.jpg" width="364" height="243" loading="lazy" alt="">
                                        </picture>
                                    </div>
                                    <p><?=Yii::$app->translate->getT("Автобусная остановка")?></p>
                                </div>
                                <div class="swiper-slide">
                                    <div class="location-slider-img">
                                        <picture>
                                            <source type="image/jpeg" srcset="/images/index/location/loc-7-1x.jpg, /images/index/location/loc-7-2x.jpg 2x">
                                            <img src="/images/index/location/loc-7-1x.jpg" width="364" height="243" loading="lazy" alt="">
                                        </picture>
                                    </div>
                                    <p><?=Yii::$app->translate->getT("Супермаркет")?></p>
                                </div>
                                <div class="swiper-slide">
                                    <div class="location-slider-img">
                                        <picture>
                                            <source type="image/jpeg" srcset="/images/index/location/loc-8-1x.jpg, /images/index/location/loc-8-2x.jpg 2x">
                                            <img src="/images/index/location/loc-8-1x.jpg" width="364" height="243" loading="lazy" alt="">
                                        </picture>
                                    </div>
                                    <p><?=Yii::$app->translate->getT("Аэропорт в 5 минутах")?></p>
                                </div>
                            </div>
                        </div>
                        <div class="location-arrow">
                            <svg width="13" height="24" class="location-button-next"><use xlink:href="images/icons.svg#arrow-left"></use></svg>
                            <svg width="62" height="24" class="location-button-prev"><use xlink:href="images/icons.svg#arrow-right"></use></svg>
                        </div>
                    </div>
                    <p>
                        <?=Yii::$app->translate->getT("Royal development располагается в центральной части нового бульвара, вся инфраструктура находиться в шаговой доступности.")?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="apartments" class="apartments">
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="pattern"></div>
        <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
            <div class="apartments-title-wrapper mb">
                <div class="cap"><?=Yii::$app->translate->getT("квартиры")?></div>
                <h2 class="title"><?=Yii::$app->translate->getT("Для любой семьи")?></h2>
            </div>
            <div class="apartments-slider-wrapper">
                <div class="apartments-slider swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <picture>
                                <img src="/images/index/apartments/apart-1.jpg"  loading="lazy" alt="">
                            </picture>
                        </div>
                        <div class="swiper-slide">
                            <picture>
                                <img src="/images/index/apartments/apart-2.jpg"  loading="lazy" alt="">
                            </picture>
                        </div>
                        <div class="swiper-slide">
                            <picture>
                                <img src="/images/index/apartments/apart-3.jpg"  loading="lazy" alt="">
                            </picture>
                        </div>
                        <div class="swiper-slide">
                            <picture>
                                <img src="/images/index/apartments/apart-4.jpg"  loading="lazy" alt="">
                            </picture>
                        </div>
                        <div class="swiper-slide">
                            <picture>
                                <img src="/images/index/apartments/apart-5.jpg"  loading="lazy" alt="">
                            </picture>
                        </div>
                        <div class="swiper-slide">
                            <picture>
                                <img src="/images/index/apartments/apart-6.jpg"  loading="lazy" alt="">
                            </picture>
                        </div>
                    </div>
                </div>
                <div thumbsSlider="" class="apartments-thumbs swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <picture>
                                <img src="/images/index/apartments/apart-1.jpg"  loading="lazy" alt="">
                            </picture>
                        </div>
                        <div class="swiper-slide">
                            <picture>
                                <img src="/images/index/apartments/apart-2.jpg"  loading="lazy" alt="">
                            </picture>
                        </div>
                        <div class="swiper-slide">
                            <picture>
                                <img src="/images/index/apartments/apart-3.jpg"  loading="lazy" alt="">
                            </picture>
                        </div>
                        <div class="swiper-slide">
                            <picture>
                                <img src="/images/index/apartments/apart-4.jpg"  loading="lazy" alt="">
                            </picture>
                        </div>
                        <div class="swiper-slide">
                            <picture>
                                <img src="/images/index/apartments/apart-5.jpg"  loading="lazy" alt="">
                            </picture>
                        </div>
                        <div class="swiper-slide">
                            <picture>
                                <img src="/images/index/apartments/apart-6.jpg"  loading="lazy" alt="">
                            </picture>
                        </div>
                    </div>
                </div>
            </div>
            <div class="apartments-tab">
                <div class="cap dt"><?=Yii::$app->translate->getT("квартиры")?></div>
                <h2 class="title dt"><?=Yii::$app->translate->getT("Для любой семьи")?></h2>
                <div class="apartments-types">
                    <ul class="apartments-tabs">
                        <li class="active" data-num="0">
                            <svg width="25" height="36"><use xlink:href="/images/icons.svg#people"></use></svg>
                            <p>30 m<sup>2</sup></p>
                        </li>
                        <li data-num="1">
                            <svg width="25" height="36"><use xlink:href="/images/icons.svg#people"></use></svg>
                            <svg width="25" height="36"><use xlink:href="/images/icons.svg#people"></use></svg>
                            <p>38 m<sup>2</sup></p>
                        </li>
                        <li data-num="2">
                            <svg width="25" height="36"><use xlink:href="/images/icons.svg#people"></use></svg>
                            <svg width="25" height="36"><use xlink:href="/images/icons.svg#people"></use></svg>
                            <svg width="14" height="21"><use xlink:href="/images/icons.svg#people"></use></svg>
                            <p>52 m<sup>2</sup></p>
                        </li>
                    </ul>
                    <div class="cap"><?=Yii::$app->translate->getT("квартиры")?></div>
                    <div class="apartments-desc">
                        <p class="current" data-num="0">
                            <?=Yii::$app->translate->getT("Материалы в отделке использовались натуральные и экологичные —  такие как камень, дерево, отделочные смехи. Минималистское пространство не будет отвлекать вас от пейзажа за окном.")?>
                        </p>
                        <p data-num="1">
                            <?=Yii::$app->translate->getT("Материалы в отделке использовались натуральные и экологичные —  такие как камень, дерево, отделочные смехи. Минималистское пространство не будет отвлекать вас от пейзажа за окном.")?>
                        </p>
                        <p data-num="2">
                            <?=Yii::$app->translate->getT("Материалы в отделке использовались натуральные и экологичные —  такие как камень, дерево, отделочные смехи. Минималистское пространство не будет отвлекать вас от пейзажа за окном.")?>
                        </p>
                    </div>
                </div>
                <a href="<?= Url::toRoute('/site/plans') ?>" class="apartments-btn btn">
                    <span><?=Yii::t('frontend', 'Выбрать квартиру')?></span>
                    <svg width="62" height="24"><use xlink:href="/images/icons.svg#arrow-right"></use></svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- contacts -->
<div class="contacts">
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="pattern right"></div>
        <div class="container" style="max-width: 1120px; margin-left: auto; margin-right: auto">
            <div class="contacts-wrapper">
                <p class="cap"><?=Yii::$app->translate->getT("остались вопросы?")?></p>
                <p class="title"><?=Yii::$app->translate->getT("Напишите нам")?></p>
                <div class="contacts-content">
                    <p>
                        <?=Yii::$app->translate->getT("Наш менеджер перезвонит Вам в течении <b>15 минут</b> и подберет для Вас наилучший вариант")?>
                    </p>
                </div>
                <form name="callBack" class="form" action="#" method="post">
                    <label for="call-name"></label>
                    <input name="name" id="call-name" type="text" placeholder="<?=Yii::t('frontend', 'Имя')?>" required>
                    <label for="call-phone"></label>
                    <input name="phone" id="call-phone" pattern="(\+?\d[- .]*){7,19}" type="tel" class="" placeholder="<?=Yii::t('frontend', 'Телефон')?>" required>
                    <button type="submit" class="btn callback"><span><?=Yii::t('frontend', 'Оставить заявку')?></span></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- contacts end -->

