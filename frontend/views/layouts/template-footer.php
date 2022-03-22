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
                    <p>Соцсети:</p>
                    <div class="footer-social-icons">
                        <a href="#">
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
                    <a class="radius" href="tel:+70988900043">
                        <svg width="19" height="19"><use xlink:href="/images/icons.svg#phone"></use></svg>
                    </a>
                    <a href="tel:+70988900043"></a>
                        +7 (098) 890-00-43
                    </a>
                    <p>г. Москва, ул. Пражская 88/23</p>
                </div>
            </div>
        </div>
        <a href="#" class="footer-polit mb">Политики конфиденциальности</a>
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
            </div>
            <div class="top-social">
                <a href="#">
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
        <div class="lang lang-menu">
            <div class="lang-choosed radius">
                ru
            </div>
            <div class="lang-choose">
                <ul>
                    <li><a href="#">
                        ge
                    </a></li>
                    <li><a href="#">
                        en
                    </a></li>
                    <li><a href="#">
                        ru
                    </a></li>
                    <li><a href="#">
                        he
                    </a></li>
                </ul>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="content-nav">
                <ul>
                    <li><a href="<?=Url::toRoute('/site/index') ?>">Главная</a></li>
                    <li><a href="<?=Url::toRoute('/site/plans') ?>">Инфраструктура </a></li>
                </ul>
            </div>
            <a class="content-footer" href="#">Политики конфиденциальности</a>
        </div>
    </div>
</div>

<div class="popup-wrapper">
    <div class="popup"></div>
</div>



<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" /> -->
<!-- <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script> -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->
<!-- <script src="js/jquery.fancybox.min.js"></script> -->
<!-- <script src="js/app.min.js"></script> -->

</body>
</html>
