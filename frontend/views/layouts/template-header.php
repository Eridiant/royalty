<header class="head">
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="nav">
            <div class="nav-logo">
                <object type="image/svg+xml" data="/images/svg/logo.svg">
                    <img src="/images/svg/logo.svg" alt="" />
                </object>
            </div>
            <div class="nav-wrap">
                <div class="nav-phone radius">
                    <svg width="19" height="19"><use xlink:href="/images/icons.svg#phone"></use></svg>
                </div>
                <div class="nav-lang">
                    <?php $model = \backend\modules\language\models\Language::find()->where(['deleted_at' => null])->all(); ?>
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
                <a class="sm" href="tel:+70988900043">+7 (098) 890-00-43</a>
                <a class="sm" href="#">
                    <svg width="18" height="18"><use xlink:href="/images/icons.svg#whatsapp"></use></svg>
                </a>
                <a class="sm" href="#">
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
