<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Alukun';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="<?= Url::home(true); ?>theme/logo.png">
    <link rel="shortcut icon" href="<?= Url::home(true); ?>theme/logo.png">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Oswald:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/css/bootstrap.min.css">
    <link href="<?= Url::home(true); ?>theme/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/css/animate.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/bootnavbar.css"> -->
    <link rel="stylesheet" type="text/css" href="<?= Url::home(true); ?>theme/css/slick.css">
    <link rel="stylesheet" type="text/css" href="<?= Url::home(true); ?>theme/css/slick-theme.css">
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/css/jquery.fancybox.min.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/css/custom.css">
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/css/ionicons.min.css">
    <script src="<?= Url::home(true); ?>theme/js/jquery-3.3.1.min.js"></script>
    <script src="<?= Url::home(true); ?>theme/js/slick.js"></script>
    <script src="<?= Url::home(true); ?>theme/js/slick-animation.min.js"></script>

    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBa0nXEOGFdm8uuKOgojp3ztDAUAQaA1g&libraries=places"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="<?= Url::home(true); ?>theme/js/jquery.fancybox.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="<?= Url::home(true); ?>theme/js/custom.js"></script>

    <style>
        #overlay {
            position: fixed;
            top: 0;
            z-index: 100;
            width: 100%;
            height: 100%;
            display: none;
            background: rgba(0, 0, 0, 0.6);
        }

        .cv-spinner {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px #ddd solid;
            border-top: 4px #2e93e6 solid;
            border-radius: 50%;
            animation: sp-anime 0.8s infinite linear;
        }

        @keyframes sp-anime {
            100% {
                transform: rotate(360deg);
            }
        }

        .is-hide {
            display: none;
        }
    </style>
</head>
<div id="overlay">
    <div class="cv-spinner">
        <span class="spinner"></span>
    </div>
</div>
<header class="header">
    <div class="top-section">
        <div class="container">
            <div class="top-part">
                <div class="sr-no">
                    <span>Mobile Number: <span><a href="tel:4961316366781"> +49-6131-6366781</a></span></span>
                </div>
                <div class="email-id">
                    <span>Email: <span><a href="mailto:info@alukun.com">info@alukun.com</a></span></span>
                </div>
                <div class="top-links">
                    <a class="link" href="#">Contact</a>
                    <a class="link" href="#">Log in</a>
                    <a class="link" href="#">to register</a>
                    <a class="link" href="#">To Compare</a>
                    <a class="link" href="#">Checkout</a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle-section">
        <div class="container">
            <div class="content-section">
                <div class="logo-section">
                    <div class="logo">
                        <a href="<?= Url::home(true); ?>"><img src="<?= Url::home(true); ?>theme/images/logo.png"></a>
                    </div>
                    <div class="made-section">
                        <div class="sr-no">
                            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="15" height="15" fill="#fff" viewBox="0 0 384 384" style="enable-background:new 0 0 384 384;" xml:space="preserve">
                                    <path d="M353.188,252.052c-23.51,0-46.594-3.677-68.469-10.906c-10.719-3.656-23.896-0.302-30.438,6.417l-43.177,32.594    c-50.073-26.729-80.917-57.563-107.281-107.26l31.635-42.052c8.219-8.208,11.167-20.198,7.635-31.448    c-7.26-21.99-10.948-45.063-10.948-68.583C132.146,13.823,118.323,0,101.333,0H30.813C13.823,0,0,13.823,0,30.813    C0,225.563,158.438,384,353.188,384c16.99,0,30.813-13.823,30.813-30.813v-70.323C384,265.875,370.177,252.052,353.188,252.052z"></path>
                                </svg><span><a href="tel:4961316366781"> +49-6131-6366781</a></span></span>
                        </div>
                        <div class="email-id">
                            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="20" height="20" fill="#fff">
                                    <polygon points="339.392,258.624 512,367.744 512,144.896   "></polygon>
                                    <polygon points="0,144.896 0,367.744 172.608,258.624   "></polygon>
                                    <path d="M480,80H32C16.032,80,3.36,91.904,0.96,107.232L256,275.264l255.04-168.032C508.64,91.904,495.968,80,480,80z"></path>
                                    <path d="M310.08,277.952l-45.28,29.824c-2.688,1.76-5.728,2.624-8.8,2.624c-3.072,0-6.112-0.864-8.8-2.624l-45.28-29.856    L1.024,404.992C3.488,420.192,16.096,432,32,432h448c15.904,0,28.512-11.808,30.976-27.008L310.08,277.952z"></path>
                                </svg><span><a href="mailto:info@alukun.com"> info@alukun.com</a></span></span>
                        </div>
                    </div>
                </div>
                <div class="cart-section">
                    <div class="logo-item">
                        <div class="top-links">
                            <a class="link" href="<?= Url::to(['//contact']) ?>">Contact</a>
                            <?php if (Yii::$app->user->isGuest) { ?>
                                <a class="link" href="<?= Url::to(['//login']) ?>">Log in</a>
                            <?php } else { ?>
                                <a class="link" href="<?= Url::to(['//logout']) ?>">Log out</a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="cart-item">
                        <span class="price">€0.00</span>
                        <div class="cart">
                            <a href="<?= Url::to(['//cart']) ?>" class="cart-link">
                                <svg class="cart-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 511.976 511.976" style="enable-background:new 0 0 511.976 511.976;" xml:space="preserve">

                                    <path d="M208,399.988c-26.464,0-48,21.536-48,48s21.536,48,48,48s48-21.536,48-48S234.464,399.988,208,399.988z M208,463.988    c-8.832,0-16-7.168-16-16c0-8.832,7.168-16,16-16c8.832,0,16,7.168,16,16C224,456.82,216.832,463.988,208,463.988z" />

                                    <path d="M400,399.988c-26.464,0-48,21.536-48,48s21.536,48,48,48s48-21.536,48-48S426.464,399.988,400,399.988z M400,463.988    c-8.832,0-16-7.168-16-16c0-8.832,7.168-16,16-16c8.832,0,16,7.168,16,16C416,456.82,408.832,463.988,400,463.988z" />

                                    <path d="M508.256,85.748c-3.008-3.648-7.52-5.76-12.256-5.76H119.936l-13.92-52.128c-1.856-7.008-8.192-11.872-15.456-11.872H16    c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h62.272l82.272,308.128c1.856,7.008,8.192,11.872,15.456,11.872h256    c8.832,0,16-7.168,16-16c0-8.832-7.168-16-16-16H188.288l-9.376-35.136l285.792-12.864c7.456-0.352,13.696-5.792,15.008-13.12    l32-176C512.576,94.196,511.296,89.396,508.256,85.748z M450.56,256.596l-280.128,12.608L128.48,111.988h348.352L450.56,256.596z" />

                                    <path d="M400,143.988c-8.832,0-16,7.168-16,16v64c0,8.832,7.168,16,16,16c8.832,0,16-7.168,16-16v-64    C416,151.156,408.832,143.988,400,143.988z" />

                                    <path d="M304,143.988c-8.832,0-16,7.168-16,16v64c0,8.832,7.168,16,16,16c8.832,0,16-7.168,16-16v-64    C320,151.156,312.832,143.988,304,143.988z" />

                                    <path d="M208,143.988c-8.832,0-16,7.168-16,16v64c0,8.832,7.168,16,16,16c8.832,0,16-7.168,16-16v-64    C224,151.156,216.832,143.988,208,143.988z" />
                                </svg>
                                <svg class="down-arrow" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 240.811 240.811" style="enable-background:new 0 0 240.811 240.811;" xml:space="preserve">
                                    <path id="Expand_More" d="M220.088,57.667l-99.671,99.695L20.746,57.655c-4.752-4.752-12.439-4.752-17.191,0   c-4.74,4.752-4.74,12.451,0,17.203l108.261,108.297l0,0l0,0c4.74,4.752,12.439,4.752,17.179,0L237.256,74.859   c4.74-4.752,4.74-12.463,0-17.215C232.528,52.915,224.828,52.915,220.088,57.667z" />
                                </svg>
                                <?php
                                $get = Yii::$app->request->cookies;

                                if ($get->getValue('cart') !== null) {
                                    $a = 0;
                                    foreach ($get->getValue('cart') as $qty) {
                                        $a += $qty['qty'];
                                    }
                                    echo '<span class="count">' . $a . '</span>';
                                } elseif (!yii::$app->user->isGuest) {
                                    $cart = \common\models\Cart::find()->where(['user_id' => yii::$app->user->id])->all();
                                    if ($cart) {
                                        $a = 0;
                                        foreach ($cart as $qty) {
                                            $a += $qty->qty;
                                        }
                                        echo '<span class="count">' . $a . '</span>';
                                    }
                                }
                                ?>
                            </a>
                            <div class="cart-data"> cart item </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-section">
        <div class="container">
            <div class="menu">
                <ul>
                    <li><a href="<?= Url::to(['//']) ?>">Home</a></li>
                    <li><a href="javascript::void(0)">Shop
                            <svg class="down-arrow" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 240.811 240.811" style="enable-background:new 0 0 240.811 240.811;" xml:space="preserve">
                                <path id="Expand_More" d="M220.088,57.667l-99.671,99.695L20.746,57.655c-4.752-4.752-12.439-4.752-17.191,0   c-4.74,4.752-4.74,12.451,0,17.203l108.261,108.297l0,0l0,0c4.74,4.752,12.439,4.752,17.179,0L237.256,74.859   c4.74-4.752,4.74-12.463,0-17.215C232.528,52.915,224.828,52.915,220.088,57.667z" />
                            </svg>
                        </a>
                        <ul>
                            <?php

                            $menus = \common\models\Category::menu();
                            echo $menus;
                            ?>
                        </ul>
                    </li>
                    <li><a href="<?= Url::to(['//about']) ?>">About Us</a></li>
                    <li><a href="<?= Url::to(['//contact']) ?>">Contact Us</a></li>

                </ul>
            </div>
        </div>
    </div>
</header>

<body class="body">
    <?= $content ?>
    <?php $this->endBody() ?>
</body>
<footer class="main-footer">
    <div class="footer-section">
        <div class="container">
            <div class="footer-wrap">
                <div class="details-section">
                    <div class="logo-section">
                        <a href="<?= Url::home(true); ?>"><img src="<?= Url::home(true); ?>theme/images/logo-footer.png"></a>
                    </div>
                    <div class="details">
                        <div class="location">
                            <h4 class="footer-title"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="20" height="20" fill="#fff" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                    <path d="M256,0C156.011,0,74.667,81.344,74.667,181.333c0,96.725,165.781,317.099,172.843,326.443    c1.984,2.667,5.163,4.224,8.491,4.224c3.328,0,6.507-1.557,8.491-4.224c7.061-9.344,172.843-229.717,172.843-326.443    C437.333,81.344,355.989,0,256,0z M256,277.333c-52.928,0-96-43.072-96-96c0-52.928,43.072-96,96-96s96,43.072,96,96    C352,234.261,308.928,277.333,256,277.333z" />
                                </svg></h4>
                            <div class="footer-data">
                                <div class="link">Danziger Str. 3, 65428</div><br>
                                <div class="link">Rüsselsheim am Main</div><br>
                                <div class="link"></div>
                            </div>
                        </div>
                        <div class="call-details">
                            <div class="phone">
                                <h4 class="footer-title"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="20" height="20" fill="#fff" viewBox="0 0 384 384" style="enable-background:new 0 0 384 384;" xml:space="preserve">
                                        <path d="M353.188,252.052c-23.51,0-46.594-3.677-68.469-10.906c-10.719-3.656-23.896-0.302-30.438,6.417l-43.177,32.594    c-50.073-26.729-80.917-57.563-107.281-107.26l31.635-42.052c8.219-8.208,11.167-20.198,7.635-31.448    c-7.26-21.99-10.948-45.063-10.948-68.583C132.146,13.823,118.323,0,101.333,0H30.813C13.823,0,0,13.823,0,30.813    C0,225.563,158.438,384,353.188,384c16.99,0,30.813-13.823,30.813-30.813v-70.323C384,265.875,370.177,252.052,353.188,252.052z" />
                                    </svg></h4>
                                <a href="tel:4961316366781" class="footer-data link">+49-6131-6366781</a>
                            </div>

                        </div>
                        <div class="email">
                            <h4 class="footer-title"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="20" height="20" fill="#fff">
                                    <polygon points="339.392,258.624 512,367.744 512,144.896   " />
                                    <polygon points="0,144.896 0,367.744 172.608,258.624   " />
                                    <path d="M480,80H32C16.032,80,3.36,91.904,0.96,107.232L256,275.264l255.04-168.032C508.64,91.904,495.968,80,480,80z" />
                                    <path d="M310.08,277.952l-45.28,29.824c-2.688,1.76-5.728,2.624-8.8,2.624c-3.072,0-6.112-0.864-8.8-2.624l-45.28-29.856    L1.024,404.992C3.488,420.192,16.096,432,32,432h448c15.904,0,28.512-11.808,30.976-27.008L310.08,277.952z" />
                                </svg></h4>
                            <div class="footer-data">
                                <a href="mailto:info@alukun.com" class="link">info@alukun.com</a>
                            </div>
                        </div>
                        <div class="email">
                            <h4 class="footer-title">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="20" height="20" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                    <g>
                                        <path d="M347.216,301.211l-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83c-10.966,0-19.83,8.864-19.83,19.83v118.978    c0,6.246,2.935,12.136,7.932,15.864l79.318,59.489c3.569,2.677,7.734,3.966,11.878,3.966c6.048,0,11.997-2.717,15.884-7.952    C357.766,320.208,355.981,307.775,347.216,301.211z" fill="#ffffff" data-original="#000000" style="" class="" />
                                        <path d="M256,0C114.833,0,0,114.833,0,256s114.833,256,256,256s256-114.833,256-256S397.167,0,256,0z M256,472.341    c-119.275,0-216.341-97.066-216.341-216.341S136.725,39.659,256,39.659c119.295,0,216.341,97.066,216.341,216.341    S375.275,472.341,256,472.341z" fill="#ffffff" data-original="#000000" style="" class="" />
                                </svg>
                            </h4>
                            <div class="footer-data">
                                Opening Hours :<br>
                                Mon - Fri : 10:00 AM - 18:00 PM<br>
                                Saturday : On Appointment<br>
                                Sunday : Closed<br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="links-section">
                    <div class="link-data">
                        <h4 class="footer-title">my account</h4>
                        <ul class="links">
                            <li>
                                <a href="<?= Url::to(['//login']) ?>" class="link">My account</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['//register']) ?>" class="link">To Register</a>
                            </li>
                        </ul>
                    </div>
                    <div class="link-data">
                        <h4 class="footer-title">useful</h4>
                        <ul class="links">
                            <li>
                                <a href="<?= Url::to(['//contact']) ?>" class="link">Contact</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['//delivery']) ?>" class="link">Delivery</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['//payment-information']) ?>" class="link">Payment Methods</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['//shipping']); ?>" class="link">Shipping</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['//declaration-of-performance']); ?>" class="link">declaration of performance</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['//graduated-discounts']); ?>" class="link">Graduated discounts</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['//ordering-information']); ?>" class="link">Ordering Information</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['//guarantee']); ?>" class="link">Guarantee</a>
                            </li>
                        </ul>
                    </div>
                    <div class="link-data">
                        <h4 class="footer-title">my account</h4>
                        <ul class="links">
                            <li>
                                <a href="<?= Url::to(['//terms-conditions']); ?>" class="link">Conditions</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['//right-of-withdrawal']); ?>" class="link">Right of withdrawal</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['privacy']) ?>" class="link">privacy</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['imprint']) ?>" class="link">imprint</a>
                            </li>
                        </ul>
                    </div>
                    <div class="link-data">
                        <h4 class="footer-title">Brands</h4>
                        <ul class="links">

                            <li>
                                <a href="<?= Url::to(['rehau']) ?>" class="link">Rehau</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['adopen']) ?>" class="link">Adopen</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['rescara']) ?>" class="link">Rescara</a>
                            </li>
                            <li>
                                <a href="#" class="link">Kale</a>
                            </li>
                            <li>
                                <a href="<?= Url::home(true) ?>" class="link">Alukun</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright-section">
            <div class="bottom-section">
                © <?= date('Y') ?> <a href="#"> Alukun.com</a>
            </div>
            <div class="bottom-section">
                <img src="<?= Url::home(true); ?>theme/images/paypal-iocn.png">
                <img src="<?= Url::home(true); ?>theme/images/visa-icon.png">
                <img src="<?= Url::home(true); ?>theme/images/american-express-icon.png">
                <img src="<?= Url::home(true); ?>theme/images/mastercard-icon.png">
                <img src="<?= Url::home(true); ?>theme/images/lastschriftlogo-icon.png">
                <img src="<?= Url::home(true); ?>theme/images/kauf-auf-rechnung-icon.png">
            </div>
        </div>
    </div>

</footer>

<script src="<?php echo Url::home(true); ?>theme/js/bootstrap-notify.min.js"></script>
<!-- <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBa0nXEOGFdm8uuKOgojp3ztDAUAQaA1g&libraries=places"></script> -->
<script>
    var val;

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

    $('#related-product').slick({
        dots: false,
        infinite: true,
        speed: 1000,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });


    function cart(id, qty, price) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        if (val != null) {
            qty = val;
        }

        var a = $("input[name='qty']").val();
        if (a != null) {
            qty = a;
        }

        var type = $("#doortype").val();
        var color = $("#color").val();
        var accessories = $("#accessories").val();

        price = $('.product-price').val();

        $.ajax({
            url: "<?= Yii::$app->urlManager->createAbsoluteUrl(["//site/addcart"]) ?>",
            dataType: "json",
            data: {
                id: id,
                qty: qty,
                price: price,
                doortype: type,
                color: color,
                accessories: accessories,
                '_csrf-frontend': csrfToken,
            },
            type: 'post',
            success: function(data) {
                if (data.status == 1) {
                    noti(data.message, 'success');
                    $('.count').html(data.data.qty);
                }
            }
        });
    }

    $(document).ajaxSend(function() {
        $("#overlay").fadeIn(300);
    });
    $(document).ajaxComplete(function() {
        setTimeout(function() {
            $("#overlay").fadeOut(300);
        }, 500);
    });


    $(document).ready(function() {

    });
</script>

</html>
<?php $this->endPage() ?>