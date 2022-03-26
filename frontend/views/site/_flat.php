                        <div class="apartments-slider swiper">
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