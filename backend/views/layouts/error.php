<?php

/* @var $this \yii\web\View */

/* @var $content string */
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="">

    <title><?= Html::encode($this->title) ?></title>
    <link rel="apple-touch-icon" href="<?= Url::home(true); ?>theme/assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="<?= Url::home(true); ?>theme/assets/images/favicon.ico">

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
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/assets/examples/css/pages/errors.css">


    <!-- Fonts -->
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/global/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <!--[if lt IE 9]>
    <script src="<?= Url::home(true); ?>theme/global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

    <!--[if lt IE 10]>
    <script src="<?= Url::home(true); ?>theme/global/vendor/media-match/media.match.min.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/vendor/respond/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->
    <script src="<?= Url::home(true); ?>theme/global/vendor/breakpoints/breakpoints.js"></script>
    <script>
        Breakpoints();
    </script>
</head>
<body class="animsition page-error page-error-400 layout-full">
    <?= $content ?>
    <!-- Core  -->
    <script src="<?= Url::home(true); ?>theme/global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/vendor/jquery/jquery.js"></script>
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

    <script src="<?= Url::home(true); ?>theme/global/js/config/colors.js"></script>
    <script src="<?= Url::home(true); ?>theme/assets/js/config/tour.js"></script>
    <script>Config.set('assets', '<?= Url::home(true); ?>theme/assets');</script>

    <!-- Page -->
    <script src="<?= Url::home(true); ?>theme/assets/js/Site.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/js/Plugin/asscrollable.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/js/Plugin/slidepanel.js"></script>
    <script src="<?= Url::home(true); ?>theme/global/js/Plugin/switchery.js"></script>

    <script>
        (function(document, window, $){
            'use strict';

            var Site = window.Site;
            $(document).ready(function(){
                Site.run();
            });
        })(document, window, jQuery);
    </script>
</body>
</html>
