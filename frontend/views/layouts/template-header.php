<header class="head">
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="nav">
            <div class="nav-logo">
                <object type="image/svg+xml" data="/images/svg/logo.svg">
                    <img src="/images/svg/logo.svg" alt="" />
                </object>
                <a href="/"></a>
            </div>
            <div class="nav-wrap">
                <div class="nav-phone radius">
                    <svg width="19" height="19"><use xlink:href="/images/icons.svg#phone"></use></svg>
                </div>
                <div class="nav-lang">
                    <a class="radius nav-lang-current" href="/site/set-locale?locale=<?=$cLang->key?>">
                        <?= $cLang->code; ?>
                    </a>
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
                <a class="sm" href="tel:+995558499966">
                    +995 (558) 49-99-66
                </a>
                <a class="sm" href="https://wa.me/955558499966">
                    <svg width="18" height="18"><use xlink:href="/images/icons.svg#whatsapp"></use></svg>
                </a>
                <a class="sm" href="viber://add?number=955558499966">
                    <svg width="18" height="18"><use xlink:href="/images/icons.svg#viber"></use></svg>
                </a>
            </div>
        </div>
    </div>
</header>

<div class="menu">
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="menu-button">
            <svg><use xlink:href="/images/icons.svg#menu"></use></svg>
        </div>
    </div>
</div>
