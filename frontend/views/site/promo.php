<?php

use yii\helpers\Url;

$html = '';

if (strpos($site_data['banner'], 'uploads') !== false) {
    $path = dirname(__DIR__) . "/../../uploads/" . @explode("uploads/", $site_data['banner'])[1];

    $mime = mime_content_type($path);
    if (strstr($mime, "video/")) {
        $html = "<video width='100%' height='100%' controls><source src='" . $site_data['banner'] . "' type=" . $mime . "></video>";
    } else if (strstr($mime, "image/")) {
        $html = "<img src='" . $site_data['banner'] . "'  alt='' class='img-fluid'>";
    }
} else {
    $html = $site_data['banner'];
}
?>

<!-- =================  Header Start ================ -->
<header>
    <div class="bottom-header">
        <div class="container">
            <div class="logo">
                <a href="<?= Url::home(true) ?>"><img src="<?php echo Url::home(true); ?>theme/images/logo.png" alt="" class="img-fluid"></a>
            </div>
        </div>
    </div>
</header>
<!-- =================  Header End ================ -->

<!-- =================  Car Banner Start ================ sdf -->
<div class="car-banner">
    <div class="container">
        <div class="heading-title">
            <h1><?= $site_data['win_text'] ?></h1><br>
            <h2><strong>WIN</strong> THIS</h2>
        </div>
        <div class="car-img">
            <?= $html ?>
        </div>
    </div>
</div>
<!-- =================  Car Banner End ================ -->

<!-- =================  Entries Banner Start ================ -->
<div class="entry-banner">
    <div class="container">
        <div class="entry-wrap">
            <div class="dollar-box">
                <div class="img-box">
                    <img src="<?php echo Url::home(true); ?>theme/images/dollar-coin.png" alt="" class="img-fluid">
                </div>
                <div class="text01"><span><?= $site_data['dollar'] ?></span> Dollar</div>
            </div>
            <div class="arrow-box">
                <img src="<?php echo Url::home(true); ?>theme/images/arrow-right.png" alt="" class="img-fluid">
            </div>
            <div class="entry-box">
                <div class="img-box">
                    <img src="<?php echo Url::home(true); ?>theme/images/entries.png" alt="" class="img-fluid">
                </div>
                <div class="text01"><span><?= $site_data['entry'] ?></span> Entries</div>
            </div>
        </div>
        <div class="title01">DOUBLE ENTRIES</div>
        <a href="<?php echo Url::home(true); ?>" class="btn"><?= $site_data['button_text'] ?> <span class="icon-box"></span></a>
        <div class="text02"><?= $site_data['line_1'] ?><span><?= $site_data['line_2'] ?></span></div>
        <p>*see detail below</p>
    </div>
</div>
<!-- =================  Entries Banner Start ================ -->

<!-- =================  Footer Start ================ -->
<footer>
    <div class="footer-bottom">
        <div class="container">
            <div class="copyrights">Copyright © <?= date('Y') ?> Rowdy. All rights reserved.</div>
        </div>
    </div>
</footer>
<!-- =================  Footer End ================ -->