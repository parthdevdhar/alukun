<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\widgets\Menu;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="">

    <title><?= Html::encode(yii::$app->name . ' | ' . $this->title) ?></title>

    <link rel="apple-touch-icon" href="<?= Url::home(true); ?>theme/favicon.ico">
    <link rel="shortcut icon" href="<?= Url::home(true); ?>theme/favicon.ico">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/global/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/assets/css/site.min.css">

    <!-- Plugins -->
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/global/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/global/vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/global/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css">

    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/assets/examples/css/structure/pagination.css">
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/global/vendor/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/assets/examples/css/pages/gallery.css">

    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/assets/examples/css/uikit/modals.css">

    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/global/vendor/bootstrap-sweetalert/sweetalert.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/global/fonts/font-awesome/font-awesome.css">
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/global/fonts/weather-icons/weather-icons.css">
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/global/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/global/fonts/brand-icons/brand-icons.min.css">
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/global/fonts/themify/themify.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <!--[if lt IE 9]>
    <script src="<?= Url::home(true); ?>theme/global/vendor/html5shiv/html5shiv.min.js"></script><![endif]-->

    <!--[if lt IE 10]>
    <script src="<?= Url::home(true); ?>theme/global/vendor/media-match/media.match.min.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/vendor/respond/respond.min.js"></script><![endif]-->

    <!-- Scripts -->
    <script src="<?= Url::home(true); ?>theme/global/vendor/breakpoints/breakpoints.js"></script>
    <script>
        Breakpoints();
    </script>
    <script src="<?= Url::home(true); ?>theme/global/vendor/jquery/jquery.js"></script>
</head>

<body class="animsition">
    <?php $this->beginBody() ?>

    <nav class="site-navbar navbar navbar-default navbar-fixed-top bg-blue-grey-800" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided" data-toggle="menubar">
                <span class="sr-only">Toggle navigation</span> <span class="hamburger-bar"></span>
            </button>
            <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse" data-toggle="collapse">
                <i class="icon wb-more-horizontal" aria-hidden="true"></i>
            </button>
            <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
                <img class="navbar-brand-logo" src="<?= Url::home(true); ?>theme/logo.png" title="Chrisma Loyal" width="220px">
            </div>
        </div>

        <div class="navbar-container container-fluid">
            <!-- Navbar Collapse -->
            <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">

                <!-- Navbar Toolbar Right -->
                <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
                            <span class="avatar">
                                <img src="<?= Url::home(true); ?>theme/user.png" alt="...">
                            </span>
                        </a>
                        <div class="dropdown-menu" role="menu">
                            <?= Html::a('<i class="icon wb-settings" aria-hidden="true"></i>Change Password', ['//site/changepassword'], ['class' => 'dropdown-item', 'role' => "menuitem"]) ?>
                            <?= Html::a('<i class="icon wb-star" aria-hidden="true"></i>Visit Site', ['../'], ['class' => 'dropdown-item', 'role' => "menuitem", 'target' => '_blank']) ?>
                            <div class="dropdown-divider" role="presentation"></div>
                            <?= Html::a('<i class="icon wb-power" aria-hidden="true"></i>Logout', ['/site/logout'], ['class' => 'dropdown-item']) ?>
                        </div>
                    </li>
                </ul>
                <!-- End Navbar Toolbar Right -->
            </div>
            <!-- End Navbar Collapse -->

            <!-- Site Navbar Seach -->
            <div class="collapse navbar-search-overlap" id="site-navbar-search">
                <form role="search">
                    <div class="form-group">
                        <div class="input-search">
                            <i class="input-search-icon wb-search" aria-hidden="true"></i>
                            <input type="text" class="form-control" name="site-search" placeholder="Search...">
                            <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search" data-toggle="collapse" aria-label="Close"></button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End Site Navbar Seach -->
        </div>
    </nav>
    <div class="site-menubar">
        <div class="site-menubar-body">
            <div>

                <div>
                    <?php
                    echo Menu::widget([
                        'items' => [
                            ['label' => 'General', 'options' => ['class' => 'site-menu-category'],],
                            ['label' => '<i class="site-menu-icon fa-home" ></i><span class="site-menu-title">Home</span>', 'url' => ['site/index']],
                            [
                                'label' => '<i class="site-menu-icon fa-file" aria-hidden="true"></i><span class="site-menu-title">Frontend</span><span class="site-menu-arrow"></span>',
                                'url' => 'javascript:void(0)',
                                'active' => ($this->context->id == 'banner' || $this->context->id == 'gallery' || $this->context->id == 'testimonial'),
                                'options' => ['class' => 'site-menu-item has-sub'],
                                'template' => '<a href="{url}" >{label}</a>',
                                'items' => [
                                    ['label' => '<span class="site-menu-title">Banner</span>', 'url' => ['//banner'], 'active' => $this->context->id == 'banner'],
                                    ['label' => '<span class="site-menu-title">Gallery</span>', 'url' => ['//gallery'], 'active' => $this->context->id == 'gallery'],
                                    ['label' => '<span class="site-menu-title">Testimonial</span>', 'url' => ['//testimonial'], 'active' => $this->context->id == 'testimonial'],
                                ],
                                'activeCssClass' => 'active',
                            ],
                            [
                                'label' => '<i class="site-menu-icon fa-shopping-cart" aria-hidden="true"></i><span class="site-menu-title">Shop</span><span class="site-menu-arrow"></span>',
                                'url' => 'javascript:void(0)',
                                'active' => ($this->context->id == 'category' || $this->context->id == 'product'),
                                'options' => ['class' => 'site-menu-item has-sub'],
                                'template' => '<a href="{url}" >{label}</a>',
                                'items' => [
                                    ['label' => '<span class="site-menu-title">Category</span>', 'url' => ['//category'], 'active' => $this->context->id == 'category'],
                                    ['label' => '<span class="site-menu-title">Products</span>', 'url' => ['//product'], 'active' => $this->context->id == 'product'],
                                    
                                ],
                                'activeCssClass' => 'active',
                            ],
                            //['label' => '<i class="site-menu-icon fa-list" ></i><span class="site-menu-title">Category</span>', 'url' => ['//category'], 'active' => $this->context->id == 'category'],
                            // ['label' => '<i class="site-menu-icon fa-list-alt" ></i><span class="site-menu-title">Sub-Category</span>', 'url' => ['//subcategory'], 'active' => $this->context->id == 'subcategory'],
                            //['label' => '<i class="site-menu-icon fa-shopping-bag" ></i><span class="site-menu-title">Products</span>', 'url' => ['//product'], 'active' => $this->context->id == 'product'],
                            
                            [
                                'label' => '<i class="site-menu-icon fa-cubes" aria-hidden="true"></i><span class="site-menu-title">Order</span><span class="site-menu-arrow"></span>',
                                'url' => 'javascript:void(0)',
                                'active' => $this->context->id == 'order',
                                'options' => ['class' => 'site-menu-item has-sub'],
                                'template' => '<a href="{url}" >{label}</a>',
                                'items' => [
                                    ['label' => '<span class="site-menu-title">New</span>', 'url' => ['//order/received']],
                                    ['label' => '<span class="site-menu-title">In-Process</span>', 'url' => ['//order/process']],
                                    ['label' => '<span class="site-menu-title">Ready</span>', 'url' => ['//order/ready']],
                                    ['label' => '<span class="site-menu-title">Dispatch</span>', 'url' => ['//order/dispatch']],
                                    ['label' => '<span class="site-menu-title">Delivered</span>', 'url' => ['//order/delivered']],
                                ],
                                'activeCssClass' => 'active',
                            ],
                            ['label' => '<i class="site-menu-icon fa-user" ></i><span class="site-menu-title">Customer</span>', 'url' => ['//customer'], 'active' => $this->context->id == 'customer'],
                            
                        ],
                        'activateParents' => true,
                        'encodeLabels' => false,
                        'activeCssClass' => 'active open',
                        'itemOptions' => [
                            'class' => 'site-menu-item',
                        ],
                        'submenuTemplate' => '<ul class="site-menu-sub">{items}</ul>',
                        'options' => [
                            'class' => 'site-menu',
                            'data-plugin' => 'menu',
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Page -->
    <div class="page">

        <?= $content ?>
    </div>
    <script src="<?= Url::home(true); ?>theme/global/vendor/jquery/jquery.js"></script>
    <?php
    if (Yii::$app->session->hasFlash('success')) {
        $msg = (empty(Yii::$app->session->getFlash("success"))) ? '' : Yii::$app->session->getFlash("success");
        echo '<script> $( document ).ready(function() { swal( "success", "' . $msg . '", "success") }); </script>';
    } elseif (Yii::$app->session->hasFlash('error')) {
        echo '<script> $( document ).ready(function() { swal( "error", "' . Yii::$app->session->getFlash('error') . '", "error") }); </script>';
    }
    ?>
    <!-- Footer -->
    <footer class="site-footer">
        <div class="text-center">© <?= date('Y') ?>. All RIGHT RESERVED.</div>
    </footer>
    <!-- Core  -->
    <script src="<?= Url::home(true); ?>theme/global/vendor/babel-external-helpers/babel-external-helpers.js"></script>

    <script src="<?= Url::home(true); ?>theme/global/vendor/popper-js/umd/popper.min.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/vendor/bootstrap/bootstrap.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/vendor/animsition/animsition.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/vendor/mousewheel/jquery.mousewheel.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/vendor/asscrollable/jquery-asScrollable.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>

    <!-- Plugins -->
    <script src="<?= Url::home(true); ?>theme/global/vendor/switchery/switchery.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/vendor/intro-js/intro.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/vendor/screenfull/screenfull.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/vendor/slidepanel/jquery-slidePanel.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/vendor/bootstrap-select/bootstrap-select.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/vendor/isotope/isotope.pkgd.min.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Scripts -->
    <script src="<?= Url::home(true); ?>theme/global/js/Component.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/js/Plugin.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/js/Base.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/js/Config.js"></script>

    <script src="<?= Url::home(true); ?>theme/assets/js/Section/Menubar.js"></script>
    <script src="<?= Url::home(true); ?>theme/assets/js/Section/GridMenu.js"></script>
    <script src="<?= Url::home(true); ?>theme/assets/js/Section/Sidebar.js"></script>
    <script src="<?= Url::home(true); ?>theme/assets/js/Section/PageAside.js"></script>
    <script src="<?= Url::home(true); ?>theme/assets/js/Plugin/menu.js"></script>

    <script src="<?= Url::home(true); ?>theme/assets/js/config/tour.js"></script>
    <script>
        Config.set('assets', '<?= Url::home(true); ?>theme/assets');
    </script>

    <!-- Page -->
    <script src="<?= Url::home(true); ?>theme/assets/js/Site.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/js/Plugin/asscrollable.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/js/Plugin/slidepanel.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/js/Plugin/switchery.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/vendor/aspaginator/jquery-asPaginator.min.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/js/Plugin/filterable.js"></script>

    <script src="<?= Url::home(true); ?>theme/global/js/Plugin/bootstrap-tagsinput.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/js/Plugin/bootstrap-select.js"></script>

    <!-- Tree view -->
    <script src="<?= Url::home(true); ?>theme/global/vendor/bootstrap-treeview/bootstrap-treeview.min.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/vendor/jstree/jstree.min.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/js/Plugin/bootstrap-treeview.js"></script>

    <!-- Tree view end -->
    <script src="<?= Url::home(true); ?>theme/assets/examples/js/pages/gallery.js"></script>

    <script src="<?= Url::home(true); ?>theme/global/vendor/bootstrap-sweetalert/sweetalert.js"></script>
    <script>
        (function(document, window, $) {
            'use strict';

            var Site = window.Site;
            $(document).ready(function() {
                Site.run();
            });
        })(document, window, jQuery);

        $('.num').keypress(function(event) {

            if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
                event.preventDefault();
            }
        });
    </script>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>