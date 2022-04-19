<?php
use yii\helpers\Url;

?>

                <div class="floor">
                    <div class="floor-logo">
                        <object type="image/svg+xml" data="/images/svg/royal-build-grd.svg">
                            <img src="/images/svg/royal-build-grd.svg" alt="" />
                        </object>
                    </div>
                    <div class="floor-choice">
                        <div class="floor-legend lg">
                            <p class="floor-reserved">Бронь</p>
                            <p class="floor-sold">Продано</p>
                        </div>
                        <div class="floor-flat">
                            <div class="floor-img">
                                <picture>
                                    <img src="/images/plans/floor/floor-1.jpg" alt="">
                                </picture>
                            </div>
                            <div class="floor-svg">
                                <object id="floor" type="image/svg+xml" data="/images/svg/floor.svg">
                                    ваш браузер устарел
                                </object>
                                <div class="focus">
                                    <p class="focus-flat"></p>
                                    <p class="focus-status"></p>
                                </div>
                            </div>
                        </div>
                        <div class="floor-change">
                            <div class="building-floor-svg prev">
                                <svg class="arrow-up md" width="44" height="17"><use xlink:href="images/icons.svg#vertical-arrow"></use></svg>
                                <svg class="arrow-up mdm" width="161" height="25"><use xlink:href="images/icons.svg#rect"></use></svg>
                            </div>
                            <div class="floor-change-floor">
                                <p class="floor-change-num num floor-changes">2</p>
                                <p class="floor-change-text">этаж</p>
                            </div>
                            <div class="building-floor-svg next">
                                <svg class="arrow-down md" width="44" height="17"><use xlink:href="images/icons.svg#vertical-arrow"></use></svg>
                                <svg class="arrow-down mdm" width="161" height="25"><use xlink:href="images/icons.svg#rect"></use></svg>
                            </div>
                        </div>
                    </div>
                    <div class="floor-btn">
                        <svg width="62" height="24"><use xlink:href="/images/icons.svg#arrow-right"></use></svg>
                        <span>К выбору этажа'</span>
                    </div>
                </div>
                <!-- квартира -->
                <div class="flat">
                    <div class="apartments-slider-wrapper">
                        <div class="apartments-slider swiper" style="--swiper-navigation-color: var(--main-color)">
                            <div class="swiper-wrapper">
                                <?php foreach ($files as $file): ?>
                                    <div class="swiper-slide">
                                        <picture>
                                            <img src="/<?= $file; ?>">
                                        </picture>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="swiper-button-next apartments-slider-next"></div>
                            <div class="swiper-button-prev apartments-slider-prev"></div>
                        </div>
                        <div thumbsSlider="" class="apartments-thumbs swiper">
                            <div class="swiper-wrapper">
                                <?php foreach ($files as $file): ?>
                                    <div class="swiper-slide">
                                        <picture>
                                            <img src="/<?= $file; ?>">
                                        </picture>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="flat-wrapper">
                        <div class="flat-logo">
                            <object type="image/svg+xml" data="/images/svg/royal-build-grd.svg">
                                <img src="/images/svg/royal-build-grd.svg" alt="" />
                            </object>
                        </div>
                        <div class="flat-btn md">
                            <svg width="62" height="24"><use xlink:href="/images/icons.svg#arrow-right"></use></svg>
                            <span>К выбору квартир</span>
                        </div>
                        <div id="flat-num" class="subtitle">Квартира №<span>1</span></div>
                        <div class="flat-inner">
                            <div class="flat-inner-location item md">
                                <span>Расположение квартиры на этаже:</span>
                                <div class="flat-inner-img">
                                    <div class="floor-img">
                                        <picture>
                                            <img src="/images/plans/floor/floor-1.jpg" alt="">
                                        </picture>
                                    </div>
                                    <div class="floor-svg">
                                        <object id="floor-current" type="image/svg+xml" data="/images/svg/floor-current.svg">
                                            ваш браузер устарел
                                        </object>
                                    </div>
                                </div>
                            </div>
                            <div class="flat-inner-items items item">
                                <p id="area">Общая площадь объекта <span>34.95</span> м<sup>2</sup> </p>
                                <p id="live">Жилая площадь <span>29.4</span> м<sup>2</sup>  </p>
                                <p id="balcony">Балкон <span>5.55</span> м<sup>2</sup>  </p>
                                <p>Отопление электричество/газ </p>
                            </div>
                        </div>
                        <div class="flat-buttons">
                            <!-- <div class="btn">Узнать цену</div> -->
                            <div class="btn act-btn" data-btn="popup-call-back">
                                <span>Узнать цену</span>
                                <svg width="20" height="20"><use xlink:href="images/icons.svg#phone"></use></svg>
                            </div>
                            <div class="btn btn-brd xsm">Забронировать квартиру</div>
                            <div class="">
                                <svg width="14" height="16"><use xlink:href="/images/icons.svg#pdf"></use></svg>
                                <a id="pdf" href="<?=Url::toRoute(['site/pdf', 'floor' => 1, 'flat' => 1, 'img' => 20]) ?>" target="_blank">
                                    Скачать планировку
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
