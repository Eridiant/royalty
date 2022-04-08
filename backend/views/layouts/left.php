<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Главные настройки', 'icon' => 'home', 'url' => ['/site/index']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Квартиры',
                        'icon' => 'circle-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Этажи', 'icon' => 'building', 'url' => ['/floor/index'],],
                            // ['label' => 'Этажи', 'icon' => 'building', 'url' => ['/floor/multy', 'block' => 'a'],],
                            ['label' => 'Квартиры', 'icon' => 'wpforms', 'url' => ['/flat/index'],],
                            ['label' => 'Квартиры', 'icon' => 'wpforms', 'url' => ['/flat/status'],],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
