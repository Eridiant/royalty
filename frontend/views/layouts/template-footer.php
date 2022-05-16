<?php

use yii\helpers\Url;

?>

<footer class="footer">
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
            <div class="footer-wrapper">
                <div class="footer-logo nav-logo">
                    <object type="image/svg+xml" data="/images/svg/logo.svg">
                        <img src="/images/svg/logo.svg" alt="" />
                    </object>
                    <a href="/"></a>
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
                    <a href="tel:+995558499966">
                        +995 (558) 49-99-66
                    </a>
                    <p>
                        <a class="radius" href="tel:+995558499922">
                            <svg width="19" height="19"><use xlink:href="/images/icons.svg#phone"></use></svg>
                        </a>
                        <a href="tel:+995558499922">
                            +995 (558) 49-99-22
                        </a>
                    </p>
                    <p><?=Yii::$app->translate->getT("address: Rejeb nizharadze nomer 5")?></p>
                </div>
            </div>
        </div>
        <a href="<?= Url::toRoute('/site/privacy-policy') ?>" class="footer-polit mb" rel="nofollow"><?=Yii::t('frontend', 'Политика конфиденциальности')?></a>
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
            <a class="radius nav-lang-current" href="/site/set-locale?locale=<?=$cLang->key?>" rel="nofollow">
                <?= $cLang->code; ?>
            </a>
            <div class="nav-lang-choose">
                <?php foreach ($model as $lang): ?>
                    <?php if ($lang->key != $currentLang): ?>
                        <a class="radius" href="/site/set-locale?locale=<?=$lang->key?>" rel="nofollow">
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
            <a class="content-footer" href="<?= Url::toRoute('/site/privacy-policy') ?>" rel="nofollow"><?=Yii::t('frontend', 'Политика конфиденциальности')?></a>
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
