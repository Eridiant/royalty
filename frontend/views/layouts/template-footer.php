<?php

use yii\helpers\Url;

?>

<footer class="footer">
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
            <div class="footer-wrapper">
                <div class="footer-logo">
                    <object type="image/svg+xml" data="/images/svg/logo.svg">
                        <img src="/images/svg/logo.svg" alt="" />
                    </object>
                </div>
                <div class="footer-social">
                    <p><?=Yii::$app->translate->getT("Соцсети")?>:</p>
                    <div class="footer-social-icons">
                        <a href="https://www.facebook.com/RoyalDevelopmentBatumi">
                            <svg width="20" height="20"><use xlink:href="images/icons.svg#fb"></use></svg>
                        </a>
                        <a href="#">
                            <svg width="20" height="20"><use xlink:href="images/icons.svg#youtube"></use></svg>
                        </a>
                        <a href="#">
                            <svg width="20" height="20"><use xlink:href="images/icons.svg#instagram"></use></svg>
                        </a>
                        <a href="#">
                            <svg width="20" height="20"><use xlink:href="images/icons.svg#telegram"></use></svg>
                        </a>
                    </div>
                </div>
                <div class="footer-adders">
                    <a class="radius" href="tel:+995558499966">
                        <svg width="19" height="19"><use xlink:href="/images/icons.svg#phone"></use></svg>
                    </a>
                    <a href="tel:+995558499966"></a>
                        +995 (558) 49-99-66
                    </a>
                    <p>
                        <a class="radius" href="tel:+995558499922">
                            <svg width="19" height="19"><use xlink:href="/images/icons.svg#phone"></use></svg>
                        </a>
                        <a href="tel:+995558499922"></a>
                            +995 (558) 49-99-22
                        </a>
                    </p>
                    <p><?=Yii::$app->translate->getT("address: Rejeb nizharadze nomer 5")?></p>
                </div>
            </div>
        </div>
        <a href="<?= Url::toRoute('/site/privacy-policy') ?>" class="footer-polit mb"><?=Yii::t('frontend', 'Политики конфиденциальности')?></a>
    </div>
</footer>


<div class="aside">
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
    </div>
    <div class="content-close">
        <svg width="20" height="20"><use xlink:href="images/icons.svg#close"></use></svg>
    </div>
    <div class="content">
        <div class="content-header">
            <div class="content-logo">
                <object type="image/svg+xml" data="/images/svg/logo.svg">
                    <img src="/images/svg/logo.svg" alt="" />
                </object>
                <a href="/"></a>
            </div>
            <div class="top-social">
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
            <!-- <div class="content-empty"></div> -->
        </div>
        <div class="lang lang-menu nav-lang">
            <?php foreach ($model as $lang): ?>
                <?php if ($lang->key == $currentLang): ?>
                    <a class="radius nav-lang-current" href="/site/set-locale?locale=<?=$lang->key?>">
                        <?= $lang->code; ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
            <div class="nav-lang-choose">
                <?php foreach ($model as $lang): ?>
                    <?php if ($lang->key != $currentLang): ?>
                        <a class="radius" href="/site/set-locale?locale=<?=$lang->key?>">
                            <?= $lang->code; ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="content-nav">
                <ul>
                    <li><a href="<?= Url::toRoute('/site/index') ?>"><?=Yii::t('frontend', 'Главная')?></a></li>
                    <li><a href="<?= Url::toRoute('/site/plans') ?>"><?=Yii::t('frontend', 'Планировка')?></a></li>
                    <!-- <li><a href="<?//= Url::toRoute('/site/about') ?>">О компании</a></li> -->
                    <li><a href="<?= Url::toRoute('/site/infrastructure') ?>"><?=Yii::t('frontend', 'Инфраструктура')?></a></li>
                    <li><a href="<?= Url::toRoute('/site/gallery') ?>"><?=Yii::t('frontend', 'Галерея')?></a></li>
                    <li><a href="<?= Url::toRoute('/site/contacts') ?>"><?=Yii::t('frontend', 'Контакты')?></a></li>
                </ul>
            </div>
            <a class="content-footer" href="<?= Url::toRoute('/site/privacy-policy') ?>"><?=Yii::t('frontend', 'Политики конфиденциальности')?></a>
        </div>
    </div>
</div>

<div class="popup-wrapper">
    <div class="popup"></div>
</div>

<div class="popup-wrapper popup-success">
    <div class="popup">
        <div class="popup-inner sending">
            <div class="check">&#10003</div>
            <div class="subtitle">
                <?=Yii::$app->translate->getT("Спасибо")?>
            </div>
            <p>
                <?=Yii::$app->translate->getT("Ваша заявка отправлена, мы перезвоним")?>
            </p>
        </div>
    </div>
</div>
<!-- <?//=Yii::t('frontend', '')?>
<?//=Yii::$app->translate->getT("")?> -->


<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" /> -->
<!-- <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script> -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->
<!-- <script src="js/jquery.fancybox.min.js"></script> -->
<!-- <script src="js/app.min.js"></script> -->

</body>
</html>
