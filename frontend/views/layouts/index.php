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
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="apple-touch-icon" href="<?= Url::home(true); ?>theme/logo.png">
    <link rel="shortcut icon" href="<?= Url::home(true); ?>theme/logo.png">

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="icon" href="<?= Url::home(true); ?>theme/images/logo.png" sizes="16x16">
    <!-- <link rel="icon" href="<?= Url::home(true); ?>theme/images/favicon.ico" type="image/ico" sizes="16x16"> -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link href="<?php echo Url::home(true); ?>theme/css/web-font.css" rel="stylesheet">
    <link href="<?php echo Url::home(true); ?>theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Url::home(true); ?>theme/css/slick.css" rel="stylesheet">
    <link href="<?php echo Url::home(true); ?>theme/css/slick-theme.css" rel="stylesheet">
    <link href="<?php echo Url::home(true); ?>theme/css/style.css" rel="stylesheet">
    <link href="<?php echo Url::home(true); ?>theme/css/responsive.css" rel="stylesheet">
    <!-- Responsive -->
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

    <script src="<?php echo Url::home(true); ?>theme/js/jquery.min.js"></script>

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

<body>
    <?php $this->beginBody() ?>
    <main class="main">
        <div id="overlay">
            <div class="cv-spinner">
                <span class="spinner"></span>
            </div>
        </div>
        <!-- =================  Header Start ================ -->

        <!-- =================  Header Start ================ -->
        <header>
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="top-link">
                                <li><a href="tel:7195420314"><i class="icon-f-93"></i>+01 7195420314</a></li>
                                <li><a href="mailto:rowdyperformance@gmail.com"><i class="icon-f-72"></i>Rowdyperformance@gmail.com</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="social-icons">
                                <li><a href="https://www.facebook.com/RowdyPerformance" target="_Blank"><i class="fab fa-facebook-f"></i></a></li>
                                <!-- <li><a href="javascript:void(0);"><i class="fab fa-twitter"></i></a></li> -->
                                <li><a href="https://www.youtube.com/channel/UCMdnXGY8NOZP1E5RgVcofXA?view_as=subscriber" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="https://www.instagram.com/rowdy_performance/" target="_Blank"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        <a class="navbar-brand" href="<?= Url::home(true) ?>"><img src="<?php echo Url::home(true); ?>theme/images/logo.png" alt="Rowdy" class="img-fluid"></a>
                        <ul class="ml-auto nav-icons show-tab">
                            <li><a href="javascript:void(0);" class="search-btn"><i class="icon-f-85"></i></a></li>
                            <li class="dropdown" data-toggle="tooltip" data-placement="top" title="My Account">
                                <a href="javascript:void(0);" class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-f-94"></i></a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php if (Yii::$app->user->isGuest) { ?><a class="dropdown-item" href="<?= Url::to(['//login']) ?>"><i class="icon-f-77"></i>Sign In</a>
                                    <?php } else { ?><a class="dropdown-item" href="<?= Url::to(['//order']) ?>"><i class="icon-f-94"></i>My Account</a><?php } ?>
                                    <a class="dropdown-item" href="<?= Url::to(['//cart']) ?>"><i class="icon-f-39"></i>View Cart</a>
                                    <?php if (!Yii::$app->user->isGuest) { ?><a class="dropdown-item" href="<?= Url::to(['//logout']) ?>"><i class="fas fa-power-off"></i>Logout</a><?php } ?>
                                </div>
                            </li>
                            <li data-toggle="tooltip" data-placement="top" title="Cart">
                                <a href="<?= Url::to(['//cart']) ?>" class="dropdown-toggle" data-id='cart'>
                                    <i class="icon-f-39"></i>
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
                            </li>
                        </ul>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            <ul class='navbar-nav mr-auto ml-auto' id='mm'>
                                <?php

                                $menus = \common\models\Category::menu();
                                echo $menus;
                                ?>
                            </ul>
                            <ul class="ml-auto nav-icons show-desktop">
                                <li><a href="javascript:void(0);" class="search-btn"><i class="icon-f-85"></i></a></li>
                                <li class="dropdown" data-toggle="tooltip" data-placement="top" title="My Account">
                                    <a href="javascript:void(0);" class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-f-94"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <?php if (Yii::$app->user->isGuest) { ?><a class="dropdown-item" href="<?= Url::to(['//login']) ?>"><i class="icon-f-77"></i>Sign In</a>
                                        <?php } else { ?><a class="dropdown-item" href="<?= Url::to(['//order']) ?>"><i class="icon-f-94"></i>My Account</a><?php } ?>
                                        <a class="dropdown-item" href="<?= Url::to(['//cart']) ?>"><i class="icon-f-39"></i>View Cart</a>
                                        <?php if (!Yii::$app->user->isGuest) { ?><a class="dropdown-item" href="<?= Url::to(['//logout']) ?>"><i class="fas fa-power-off"></i>Logout</a><?php } ?>
                                    </div>
                                </li>
                                <li data-toggle="tooltip" data-placement="top" title="Cart">
                                    <a href="<?= Url::to(['//cart']) ?>" class="dropdown-toggle" data-id='cart'>
                                        <i class="icon-f-39"></i>
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
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- =================  Header End ================ -->

        <?= $content ?>

        <!-- =================  Footer Start ================ -->
        <footer>
            </div>
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-logo">
                                <img src="<?php echo Url::home(true); ?>theme/images/footer-logo.png" alt="" class="img-fluid">
                            </div>
                            <ul class="links">
                                <li><i class="icon-f-24"></i><span>1902 w 18th st Pueblo Colorado 81003.</span></li>
                                <li><a href="tel:7195420314"><i class="icon-f-93"></i>+01 7195420314</a></li>
                                <li><a href="mailto:rowdyperformance@gmail.com"><i class="icon-f-72"></i><small>Rowdyperformance@gmail.com</small></a></li>
                            </ul>
                            <ul class="social-icons">
                                <li><a href="https://www.facebook.com/RowdyPerformance" target="_Blank"><i class="fab fa-facebook-f"></i></a></li>
                                <!-- <li><a href="javascript:void(0);"><i class="fab fa-twitter"></i></a></li> -->
                                <li><a href="https://www.youtube.com/channel/UCMdnXGY8NOZP1E5RgVcofXA?view_as=subscriber" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="https://www.instagram.com/rowdy_performance/" target="_Blank"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-title">Product</div>
                            <ul class="footer-links">
                                <?= Yii::$app->lib->pro(); ?>
                                <!-- <li><a href="javascript:void(0);">Product 01</a></li>
                                <li><a href="javascript:void(0);">Product 02</a></li>
                                <li><a href="javascript:void(0);">Product 03</a></li>
                                <li><a href="javascript:void(0);">Product 04</a></li> -->
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-title">Information</div>
                            <ul class="footer-links">
                                <li><a href="javascript:void(0);">About</a></li>
                                <li><a href="javascript:void(0);">Contact</a></li>
                                <li><a href="<?= Url::home(true); ?>theme/rowdy-Terms-and-Conditions.pdf" target="_blank">Terms & Conditions</a></li>
                                <li><a href="<?= Url::home(true); ?>theme/rowdy-Privacy-Policy.pdf" target="_blank">Privacy Policy</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-title">Useful Links</div>
                            <ul class="footer-links">
                                <li><a href="javascript:void(0);">My Account</a></li>
                                <li><a href="javascript:void(0);">Track My Order</a></li>
                                <li><a href="javascript:void(0);">Shipping & Delivery</a></li>
                                <li><a href="javascript:void(0);">Return & Exchange</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="copyrights">Copyright © <?= date('Y') ?> Rowdy. All rights reserved.</div>
                </div>
            </div>
        </footer>
        <!-- =================  Footer End ================ -->

        <!-- =================  Search Box End ================ -->
        <div class="search-box">
            <div class="container">
                <div class="text-right">
                    <a href="javascript:void(0)" class="close-btn"><i class="icon-f-84"></i></a>
                </div>
                <div class="search-bar">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search Products..." name="search">
                    </div>
                    <a href="javascript:void(0)" class="search-icon" id='search'><i class="icon-f-85"></i></a>
                </div>
            </div>
        </div>
        <!-- =================  Search Box End ================ -->

    </main>

    <script src="<?php echo Url::home(true); ?>theme/js/popper.min.js"></script>
    <script src="<?php echo Url::home(true); ?>theme/js/bootstrap.min.js"></script>
    <script src="<?php echo Url::home(true); ?>theme/js/slick.min.js"></script>
    <script src="<?php echo Url::home(true); ?>theme/js/bootstrap-notify.min.js"></script>
    <script>
        $(function() {
            $('#mm').children('li.dropdown-menu').removeClass().addClass('nav-item dropdown');
            $('li.dropdown').children('a.dropdown-item').removeClass().addClass('nav-link dropdown-toggle')
                .attr('id', 'navbarDropdown').attr('role', 'button').attr('data-toggle', 'dropdown').attr('aria-haspopup', 'true').attr('aria-expanded', 'false');
        });

        $(".btn-group, .dropdown").hover(
            function() {
                $('>.dropdown-menu', this).stop(true, true).fadeIn("fast");
                $(this).addClass('open');
            },
            function() {
                $('>.dropdown-menu', this).stop(true, true).fadeOut("fast");
                $(this).removeClass('open');
            }
        );
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 100) {
                $(".bottom-header").addClass("active");
            } else {
                $(".bottom-header").removeClass("active");
            }
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });

        $(".search-btn").click(function() {
            $(".search-box").addClass("active");
        });
        $(".close-btn").click(function() {
            $(".search-box").removeClass("active");
        });

        $('#product-slider01').slick({
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
        $('#testimonial-slider').slick({
            dots: false,
            infinite: true,
            speed: 2000,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
    <!-- jQueryUI library -->
    <link rel="stylesheet" href="<?= Url::home(true); ?>theme/css/jquery-ui.css">
    <script src="<?= Url::home(true); ?>theme/js/jquery-ui.js"></script>
    <script>
        /* Search Box */
        $("input[name=search]").autocomplete({
            source: "<?= Url::to(["//site/getsearch"]) ?>",
            minLength: 1,
            select: function(event, ui) {
                $("#searchInput").val(ui.item.value);
                $("#userID").val(ui.item.id);
            }
        }).data("ui-autocomplete")._renderItem = function(ul, item) {
            return $("<li class='ui-autocomplete-row'></li>")
                .data("item.autocomplete", item)
                .append(item.label)
                .appendTo(ul);
        };

        $('#search').on('click', function() {
            var term = $('input[name=search]').val();
            window.location.href = "<?= Url::to(['//search']) ?>?term=" + term;
        });

        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 100) {
                $(".bottom-header").addClass("active");
            } else {
                $(".bottom-header").removeClass("active");
            }
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });

        $(".search-btn").click(function() {
            $(".search-box").addClass("active");
        });
        $(".close-btn").click(function() {
            $(".search-box").removeClass("active");
        });

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

        $('#product-slider01').slick({
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
    </script>
    <?php
    if (Yii::$app->session->hasFlash('success')) {
        $msg = (empty(Yii::$app->session->getFlash("success"))) ? '' : Yii::$app->session->getFlash("success");
        echo '<script> $( document ).ready(function() { noti(  "' . $msg . '", "success") }); </script>';
    } elseif (Yii::$app->session->hasFlash('error')) {
        echo '<script> $( document ).ready(function() { noti(  "' . Yii::$app->session->getFlash('error') . '","danger") }); </script>';
    }
    ?>
    <script>
        function submita(id) {
            if (id == 1) {
                $.ajax({
                    type: "post",
                    dataType: "json",
                    url: "<?= Yii::$app->urlManager->createAbsoluteUrl(['login']) ?>",
                    data: $('#login-form input').serialize(),
                    success: function(data) {
                        if (data.status == 0) {
                            $('#error-msg-l').html('<font color="#a94442">' + data.msg + '</font>');
                        } else {
                            noti('Welcome To Pixeltec', 'success');
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                        }
                    },
                });
            }
            if (id == 2) {
                $.ajax({
                    type: "post",
                    dataType: "json",
                    url: "<?= Yii::$app->urlManager->createAbsoluteUrl(['register']) ?>",
                    data: $('#registration-form input').serialize(),
                    success: function(data) {
                        if (data.status == 0) {
                            $('#error-msg-r').html('<font color="#a94442">' + data.msg + '</font>');
                        } else {
                            noti('Registered successfully', 'success');
                            $('#registration-form').trigger("reset");
                            $('.register').hide();
                            $('.login').show();
                        }
                    },
                });
            }
        }

        function show(id) {
            if (id === 1) {
                $('.register').hide();
                $('.login').show();
            }
            if (id === 2) {
                $('.register').show();
                $('.login').hide();
            }
        }
        var val;
        var mate = '';
        $('.mate').click(function() {
            mate = $(this).val();
        });

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

        function cart(id, qty, price) {
            var csrfToken = $('meta[name="csrf-token"]').attr("content");
            if (val != null) {
                qty = val;
            }
            var a = $("input[name='qty']").val();
            if (a != null) {
                qty = a;
            }

            price = $('.product-price').val();

            $.ajax({
                url: "<?= Yii::$app->urlManager->createAbsoluteUrl(["//site/addcart"]) ?>",
                dataType: "json",
                data: {
                    id: id,
                    qty: qty,
                    price: price,
                    '_csrf-frontend': csrfToken,
                },
                type: 'post',
                success: function(data) {
                    if (data.status == 1) {
                        noti(data.message, 'success');
                        $('[data-id="cart"]').html('<i class="icon-f-39"></i><span class="count">' + data.data.qty + '</span>');
                    }
                }
            });
        }

        $("#plus").click(function() {
            var q1 = +$(".quantity").children().val() + +1;
            $(".quantity").children().val(q1);
            var price = $('.price').attr('data-value') * q1;
            $(".price").text(price);
        });
        $("#minus").click(function() {
            var q2 = +$(".quantity").children().val() + -1;
            $(".quantity").children().val(q2);
            var price = $('.price').attr('data-value') * q2;
            $(".price").text(price);
        });

        $("input[name='qty']").on('change keyup', function() {
            val = $(this).val();
            var price = $('.price').attr('data-value') * val;
            $(".price").text(price);
        });

        $(document).ajaxSend(function() {
            $("#overlay").fadeIn(300);
        });
        $(document).ajaxComplete(function() {
            setTimeout(function() {
                $("#overlay").fadeOut(300);
            }, 500);
        });
    </script>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>