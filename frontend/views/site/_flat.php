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