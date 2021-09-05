<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <link rel="icon" href="images/favicon.ico" type="image/ico" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="apple-touch-icon" href="<?= Url::home(true); ?>theme/logo.png">
    <link rel="shortcut icon" href="<?= Url::home(true); ?>theme/logo.png">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link href="<?php echo Url::home(true); ?>theme/css/web-font.css" rel="stylesheet">
    <link href="<?php echo Url::home(true); ?>theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Url::home(true); ?>theme/css/style.css" rel="stylesheet">
    <link href="<?php echo Url::home(true); ?>theme/css/responsive.css" rel="stylesheet">
    <!-- Responsive -->
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="<?php echo Url::home(true); ?>theme/js/respond.js"></script><![endif]-->
</head>

<body>
    <main class="main">
        <!-- =================  Login Start ================ -->
        <div class="login-register">
            <div class="logo"><img src="<?= Url::home(true); ?>theme/images/logo.png" alt=""></div>
            <?= $content ?>
        </div>
        <!-- =================  Login End ================ -->
    </main>
    <script src="<?php echo Url::home(true); ?>theme/js/jquery.min.js"></script>
    <script src="<?php echo Url::home(true); ?>theme/js/popper.min.js"></script>
    <script src="<?php echo Url::home(true); ?>theme/js/bootstrap.min.js"></script>
    <script src="<?php echo Url::home(true); ?>theme/js/bootstrap-notify.min.js"></script>
    <script>
        function noti(msg) {
            $.notify(msg, {
                animate: {
                    enter: 'animated fadeInRight',
                    exit: 'animated fadeOutRight'
                },
                placement: {
                    from: "bottom",
                    align: "center"
                },
            });
        }
    </script>
    <?php
    if (Yii::$app->session->hasFlash('success')) {
        $msg = (empty(Yii::$app->session->getFlash("success"))) ? '' : Yii::$app->session->getFlash("success");
        echo '<script> $( document ).ready(function() { noti(  "' . $msg . '", "success") }); </script>';
    } elseif (Yii::$app->session->hasFlash('error')) {
        echo '<script> $( document ).ready(function() { noti(  "' . Yii::$app->session->getFlash('error') . '","danger") }); </script>';
    }
    ?>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>