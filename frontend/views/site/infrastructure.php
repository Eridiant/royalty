<?php

use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'Инфраструктура';

?>

<div class="infrastructure">
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <h2 class="title"><?=Yii::$app->translate->getT("Инфраструктура")?></h2>
    </div>
    <div></div>
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="pattern"></div>
        <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
            <div class="infrastructure-item">
                <picture>
                    <source type="image/jpeg" srcset="/images/infrastructure/infrastructure/infr-mb-1x-1.jpg, /images/infrastructure/infrastructure/infr-mb-2x-1.jpg 2x" media="(max-width: 480px)">
                    <img src="/images/infrastructure/infrastructure/infr-1.jpg" loading="lazy" alt="">
                </picture>
                <p class="title small"><?=Yii::$app->translate->getT("Эксплуатируемая крыша")?></p>
                <p class="infrastructure-text">
                    <?=Yii::$app->translate->getT("Уникальность нашему проекту придает многофункциональная оборудованная крыша на крыше будет несколько зон: зона отдыха, сезонный бассейн и кафе, кино площадка, озеленение со сквером. Жители комплекса смогут насладиться комплексным досугом не выходя из дома.")?>
                </p>
            </div>
            <div class="infrastructure-item">
                <picture>
                    <source type="image/jpeg" srcset="/images/infrastructure/infrastructure/infr-mb-1x-2.jpg, /images/infrastructure/infrastructure/infr-mb-2x-2.jpg 2x" media="(max-width: 480px)">
                    <img src="/images/infrastructure/infrastructure/infr-2.jpg" loading="lazy" alt="">
                </picture>
                <p class="title small"><?=Yii::$app->translate->getT("Паркинг")?></p>
                <p class="infrastructure-text">
                    <?=Yii::$app->translate->getT("Зоны парковок имеют уровни, бесплатную парковка для гостей,  подземный паркинг для жителей комплекса . Парковка имеет несколько систем вентиляции которые позволяют защитить ее от влажности, также парковка имеет места для людей с ограниченными возможностями.")?>
                </p>
            </div>
        </div>
    </div>
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="pattern right"></div>
        <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
            <div class="infrastructure-large">
                <picture>
                    <source type="image/jpeg" srcset="/images/infrastructure/infrastructure/infr-mb-1x-3.jpg, /images/infrastructure/infrastructure/infr-mb-2x-3.jpg 2x" media="(max-width: 480px)">
                    <img src="/images/infrastructure/infrastructure/infr-3.jpg" loading="lazy" alt="">
                </picture>
                <p class="title small"><?=Yii::$app->translate->getT("Детская игровая площадка")?></p>
                <p class="infrastructure-text">
                    <?=Yii::$app->translate->getT("Роял девелопмент ценит досуг для вас и  ваших детей, специально для маленьких жильцов будет построен сквер с детской площадкой зона 120 кв")?>
                </p>
            </div>
        </div>
    </div>
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="pattern"></div>
        <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
            <div class="infrastructure-item">
                <picture>
                    <source type="image/jpeg" srcset="/images/infrastructure/infrastructure/infr-mb-1x-4.jpg, /images/infrastructure/infrastructure/infr-mb-2x-4.jpg 2x" media="(max-width: 480px)">
                    <img src="/images/infrastructure/infrastructure/infr-4.jpg" loading="lazy" alt="">
                </picture>
                <p class="title small"><?=Yii::$app->translate->getT("Сквер")?></p>
                <p class="infrastructure-text">
                    <?=Yii::$app->translate->getT("Игровая площадка будет иметь отдельную зону для отдыха на улице")?>
                </p>
            </div>
            <div class="infrastructure-item">
                <picture>
                    <source type="image/jpeg" srcset="/images/infrastructure/infrastructure/infr-mb-1x-5.jpg, /images/infrastructure/infrastructure/infr-mb-2x-5.jpg 2x" media="(max-width: 480px)">
                    <img src="/images/infrastructure/infrastructure/infr-5.jpg" loading="lazy" alt="">
                </picture>
                <p class="title small"><?=Yii::$app->translate->getT("Открытая спортивная площадка")?></p>
                <p class="infrastructure-text">
                    <?=Yii::$app->translate->getT("Для любителей спорта на улице вас будет ждать оборудования открытая площадка для занятий спортом, мини футбол, стритбол, кроссфит итд")?>
                </p>
            </div>
        </div>
    </div>

    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="pattern right"></div>
        <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
            <div class="infrastructure-large">
                <picture>
                    <source type="image/jpeg" srcset="/images/infrastructure/infrastructure/infr-mb-1x-6.jpg, /images/infrastructure/infrastructure/infr-mb-2x-6.jpg 2x" media="(max-width: 480px)">
                    <img src="/images/infrastructure/infrastructure/infr-6.jpg" loading="lazy" alt="">
                </picture>
                <p class="title small"><?=Yii::$app->translate->getT("Фитнес центр")?></p>
                <p class="infrastructure-text">
                    <?=Yii::$app->translate->getT("Будет располагаться на 2-м этаже, для фитнеса выделено свыше 200 кв.метров, поддержка здорового образа жизни является для нас приятным дополнением концепции нашего комплекса")?>
                </p>
            </div>
        </div>
    </div>
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="pattern"></div>
        <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
            <div class="infrastructure-item">
                <picture>
                    <source type="image/jpeg" srcset="/images/infrastructure/infrastructure/infr-mb-1x-7.jpg, /images/infrastructure/infrastructure/infr-mb-2x-7.jpg 2x" media="(max-width: 480px)">
                    <img src="/images/infrastructure/infrastructure/infr-7.jpg" loading="lazy" alt="">
                </picture>
                <p class="title small"><?=Yii::$app->translate->getT("Открытый Бассейн")?></p>
                <p class="infrastructure-text">
                    <?=Yii::$app->translate->getT("Будет работать в теплый сезон, вы сможете насладиться морем в собственном бассейне на высоте 50 метров.")?>
                </p>
            </div>
            <div class="infrastructure-item">
                <picture>
                    <source type="image/jpeg" srcset="/images/infrastructure/infrastructure/infr-mb-1x-8.jpg, /images/infrastructure/infrastructure/infr-mb-2x-8.jpg 2x" media="(max-width: 480px)">
                    <img src="/images/infrastructure/infrastructure/infr-8.jpg" loading="lazy" alt="">
                </picture>
                <p class="title small"><?=Yii::$app->translate->getT("Отель")?></p>
                <p class="infrastructure-text">
                    <?=Yii::$app->translate->getT("В развитии первых 2 лет наш комплекс планирует открытие бутикового отеля для развития комплекса и его ценности для клиентов")?>
                </p>
            </div>
        </div>
    </div>
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <h2 class="title"><?=Yii::$app->translate->getT("Сервисы")?></h2>
    </div>
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="pattern"></div>
        <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
            <div class="infrastructure-item">
                <picture>
                    <img src="/images/infrastructure/location/location-1.jpg" loading="lazy" alt="">
                </picture>
                <p class="title small"><?=Yii::$app->translate->getT("Ресепшн 24\7")?></p>
                <p class="infrastructure-text">
                    <?=Yii::$app->translate->getT("Для жильцов будет работать стойка рецепции на 1 этаже, в круглосуточном режиме. Вы всегда сможете получить информацию, вам ответят на все вопросы и окажут помощь в любой момент")?>
                </p>
            </div>
            <div class="infrastructure-item">
                <picture>
                    <img src="/images/infrastructure/location/location-2.jpg" loading="lazy" alt="">
                </picture>
                <p class="title small"><?=Yii::$app->translate->getT("Охрана и видеонаблюдение 24\7")?></p>
                <p class="infrastructure-text">
                    <?=Yii::$app->translate->getT("Безопасность в нашем комплексе оказывает специализированное агентство в режиме 24/7, сохранность вас и ваших вещей под постоянной защитой, поддержку оказывает  системы видеонаблюдения")?>
                </p>
            </div>
        </div>
    </div>
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="pattern right"></div>
        <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
            <div class="infrastructure-large">
                <picture>
                    <img src="/images/infrastructure/location/location-3.jpg" loading="lazy" alt="">
                </picture>
                <p class="title small"><?=Yii::$app->translate->getT("Клининг")?></p>
                <p class="infrastructure-text">
                    <?=Yii::$app->translate->getT("Управляющая компания роял девелопмент, очень внимательно относиться к чистоте и экологии, наш комплекс ежедневно проводит сухую и влажную уборку, антибактериальную уборку. Для наших жильцов мы предлагаем услуги по уборке ваших квартир")?>
                </p>
            </div>
        </div>
    </div>
</div>
