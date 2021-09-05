<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = 'Create Product';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-body select-product web-page">
    <div class="container">
        <div class="wrap-block">
            <div class="sidebar">
                <div class="filter-block">
                    <div class="filter-box">
                        <div class="filter-title"><a href="javascript:void(0);" data-toggle="collapse" data-target="#direction" aria-expanded="true" aria-controls="direction">DIN - DIRECTION</a></div>
                        <div class="form-group collapse show" id="direction">
                            <div class="radio-bx">
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="radio1">
                                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked>Left
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="radio2">
                                        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">Right
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-box">
                        <div class="filter-title"><a href="javascript:void(0);" data-toggle="collapse" data-target="#type-const" aria-expanded="true" aria-controls="type-const">Type and construction</a></div>
                        <div class="form-group collapse show" id="type-const">
                            <div class="radio-bx">
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="radio3">
                                        <input type="radio" class="form-check-input" id="radio3" name="optradio2" value="option1" checked><img src="<?= Url::home(true); ?>theme/images/E1-left-in.svg" alt="">
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="radio4">
                                        <input type="radio" class="form-check-input" id="radio4" name="optradio2" value="option2"><img src="<?= Url::home(true); ?>theme/images/E1-left-in.svg" alt="">
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="radio5">
                                        <input type="radio" class="form-check-input" id="radio5" name="optradio2" value="option3"><img src="<?= Url::home(true); ?>theme/images/E1-left-in.svg" alt="">
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="radio6">
                                        <input type="radio" class="form-check-input" id="radio6" name="optradio2" value="option4"><img src="<?= Url::home(true); ?>theme/images/E1-left-in.svg" alt="">
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="radio7">
                                        <input type="radio" class="form-check-input" id="radio7" name="optradio2" value="option5"><img src="<?= Url::home(true); ?>theme/images/E1-left-in.svg" alt="">
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="radio8">
                                        <input type="radio" class="form-check-input" id="radio8" name="optradio2" value="option6"><img src="<?= Url::home(true); ?>theme/images/E1-left-in.svg" alt="">
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="radio9">
                                        <input type="radio" class="form-check-input" id="radio9" name="optradio2" value="option7"><img src="<?= Url::home(true); ?>theme/images/E1-left-in.svg" alt="">
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="radio10">
                                        <input type="radio" class="form-check-input" id="radio10" name="optradio2" value="option8"><img src="<?= Url::home(true); ?>theme/images/E1-left-in.svg" alt="">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-box">
                        <div class="filter-title"><a href="javascript:void(0);" data-toggle="collapse" data-target="#dimensions" aria-expanded="true" aria-controls="dimensions">DIMENSTIONS</a></div>
                        <div class="form-group collapse show" id="dimensions">
                            <div class="dim-wrap">
                                <div class="dim-box">
                                    <label for="usr">Width</label>
                                    <input type="text" class="form-control" value="1100">
                                    <span>mm</span>
                                </div>
                                <div class="dim-box">
                                    <label for="usr">Height</label>
                                    <input type="text" class="form-control" value="2100">
                                    <span>mm</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-content">
                <ul class="select-process">
                    <li><a href="javascript:void(0);">Choose Model</a></li>
                    <li class="active"><a href="javascript:void(0);">Door type and dimensions</a></li>
                    <li><a href="<?= Url::to(['//shop/colour', 'id' => $_GET['id']])?>">Colours</a></li>
                    <li><a href="<?= Url::to(['//shop/accessories', 'id' => $_GET['id']])?>">Accessories</a></li>
                </ul>
                <div class="panel-box">
                    <div class="panel-bx">
                        <div class="panel-title">House Color</div>
                        <ul class="select-color">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="select-grey"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#"><span class="select-grey"></span></a>
                                    <a class="dropdown-item" href="#"><span class="select-yellow"></span></a>
                                    <a class="dropdown-item" href="#"><span class="select-orange"></span></a>
                                    <a class="dropdown-item" href="#"><span class="select-blue"></span></a>
                                    <a class="dropdown-item" href="#"><span class="select-skyblue"></span></a>
                                    <a class="dropdown-item" href="#"><span class="select-green"></span></a>
                                    <a class="dropdown-item" href="#"><span class="select-magenta"></span></a>
                                    <a class="dropdown-item" href="#"><span class="select-darkgrey"></span></a>
                                    <a class="dropdown-item" href="#"><span class="select-lightgrey"></span></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-bx">
                        <div class="panel-title">View</div>
                        <ul class="view">
                            <li class="active"><a href="javascript:void(0);">Outside</a></li>
                            <li><a href="javascript:void(0);">Inside</a></li>
                        </ul>
                    </div>
                </div>
                <div class="top-content">
                    <div class="svg-container">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="door-sketcher" viewBox="0 0 1160 2130" width="129.6150234741784px" height="238px" style="margin-left: -64.8075px;"><svg id="Vrata" x="30" y="30">
                                <g>
                                    <g transform="translate(0,0)"><svg id="Krilo" x="0" y="0">
                                            <g transform="translate(0,0)" id="okvirVrat"><svg width="1018" height="2059" x="41" y="41" viewBox="0 0 1018 2059">
                                                    <g transform="translate(0,0)" clip-path="url(#VrataClipPath)">
                                                        <g>
                                                            <g>
                                                                <image x="0" y="0" height="2100" width="1100" preserveAspectRatio="xMidYMid slice" xlink:href="https://doordesigner.inotherm.com/konfigurator/<?= Url::home(true); ?>theme/images/static/filter_zunanja.jpg" opacity="0.1"></image>
                                                            </g>
                                                        </g>
                                                        <g>
                                                            <polygon mask="url(#mask1-1)" fill="url(#mask1-1-texture)" points="-511,-545.5 1064,-545.5 1064,2604.5 -511,2604.5"></polygon>
                                                        </g>
                                                        <g><svg width="1018" height="2049" x="0" y="0">
                                                                <g transform="translate(0,2049) scale(1,-1)"><svg>
                                                                        <polygon points="0,411.8 0,425.8 1018,425.8 1018,411.8" stroke="black" stroke-width="2" fill="url(#DYNAMIC309141)" shape-rendering="geometricPrecision"></polygon>
                                                                        <polygon points="0,811.6 0,825.6 1018,825.6 1018,811.6" stroke="black" stroke-width="2" fill="url(#DYNAMIC309141)" shape-rendering="geometricPrecision"></polygon>
                                                                        <polygon points="0,1211.4 0,1225.4 1018,1225.4 1018,1211.4" stroke="black" stroke-width="2" fill="url(#DYNAMIC309141)" shape-rendering="geometricPrecision"></polygon>
                                                                        <polygon points="0,1610.2 0,1624.2 1018,1624.2 1018,1610.2" stroke="black" stroke-width="2" fill="url(#DYNAMIC309141)" shape-rendering="geometricPrecision"></polygon>
                                                                    </svg></g>
                                                            </svg></g>
                                                    </g>
                                                </svg></g>
                                        </svg><svg id="Okvir" x="67" y="69">
                                            <g transform="translate(0,0)">
                                                <rect stroke="black" stroke-width="5" stroke-opacity="0.5" opacity="0.8" fill="none" width="964" y="0" x="0" height="2006"></rect>
                                                <polygon points="0,2006 962,2006 962,2011 0,2011" fill="rgb(10,10,10)" shape-rendering="geometricPrecision"></polygon>
                                            </g>
                                        </svg>
                                        <polygon points="0,2080 1100,2080 1100,2100 0,2100" fill="rgb(150,150,150)" shape-rendering="geometricPrecision"></polygon>
                                        <g id="profili-sestava">
                                            <polygon points="0,0 69,0 69,2100 0,2100" fill="url(#OKVIR_VERTICAL)" shape-rendering="geometricPrecision" stroke="url(#OKVIR_VERTICAL)" stroke-width="2">
                                            </polygon>
                                            <polygon points="59,59 69,69 69,2100 59,2100" fill="url(#GRADIENT_DARK)" stroke="url(#GRADIENT_DARK)" opacity="0.5" shape-rendering="geometricPrecision" stroke-width="1"></polygon>
                                            <polygon points="0,0 1100,0 1031,69 69,69" fill="url(#OKVIR_HORIZONTAL)" shape-rendering="geometricPrecision" stroke="url(#OKVIR_HORIZONTAL)" stroke-width="2">
                                            </polygon>
                                            <polygon points="59,59 1041,59 1031,69 69,69" fill="black" stroke="black" opacity="0.5" shape-rendering="geometricPrecision" stroke-width="1"></polygon>
                                            <polygon points="1031,69 1100,0 1100,2100 1031,2100" fill="url(#OKVIR_VERTICAL)" shape-rendering="geometricPrecision" stroke="url(#OKVIR_VERTICAL)" stroke-width="2">
                                            </polygon>
                                            <polygon points="1031,69 1041,59 1041,2100 1031,2100" fill="url(#GRADIENT_DARK)" stroke="url(#GRADIENT_DARK)" opacity="0.5" shape-rendering="geometricPrecision" stroke-width="1"></polygon>
                                            <rect stroke="black" stroke-width="5" stroke-opacity="0.5" opacity="0.8" fill="none" width="1100" y="0" x="0" height="2100"></rect>
                                        </g><svg id="Dodatki">
                                            <g>
                                                <g transform="translate(0,69)" id="dodatkiOstali"></g>
                                                <g transform="translate(69,69)" id="KriloDodatki">
                                                    <g>
                                                        <g></g>
                                                    </g>
                                                    <g transform="translate(14,1052) rotate(0,21,21)">
                                                        <image x="0" y="0" height="42" width="42" xlink:href="https://doordesigner.inotherm.com/konfigurator/<?= Url::home(true); ?>theme/images//Zubehor/Rosette_aussen/ZRE_46.png">
                                                        </image>
                                                    </g>
                                                    <g transform="translate(95,625)  rotate(0,15,387)">
                                                        <image x="0" y="0" height="774" width="56" preserveAspectRatio="none" xlink:href="https://doordesigner.inotherm.com/konfigurator/<?= Url::home(true); ?>theme/images//Zubehor/Griffe-Drucker/Edelstahl/ZAE_70/ZAE_72.png">
                                                        </image>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </g>
                                </g>
                                <rect x="0" y="0" height="2100" width="1100" fill="url(#GRADIENT_LIGHT)"></rect>
                            </svg>
                            <defs id="defs">
                                <pattern id="OKVIR_KRILA_HORIZONTAL" x="0" y="0" height="100" width="100" patternUnits="userSpaceOnUse" patternTransform="rotate(90) ">
                                    <image x="0" y="0" height="100" width="100" preserveAspectRatio="none" xlink:href="https://doordesigner.inotherm.com/konfigurator/<?= Url::home(true); ?>theme/images/colors/colorServlet?R=55&amp;G=51&amp;B=50">
                                    </image>
                                </pattern>
                                <pattern id="OKVIR_KRILA_VERTICAL" x="0" y="0" height="100" width="100" patternUnits="userSpaceOnUse">
                                    <image x="0" y="0" height="100" width="100" preserveAspectRatio="none" xlink:href="https://doordesigner.inotherm.com/konfigurator/<?= Url::home(true); ?>theme/images/colors/colorServlet?R=55&amp;G=51&amp;B=50">
                                    </image>
                                </pattern>
                                <pattern id="NOTRANJI_PANEL_HORIZONTAL" x="0" y="0" height="100" width="100" patternUnits="userSpaceOnUse" patternTransform="rotate(90) ">
                                    <image x="0" y="0" height="100" width="100" preserveAspectRatio="none" xlink:href="https://doordesigner.inotherm.com/konfigurator/<?= Url::home(true); ?>theme/images/colors/colorServlet?R=55&amp;G=51&amp;B=50">
                                    </image>
                                </pattern>
                                <pattern id="NOTRANJI_PANEL" x="0" y="0" height="100" width="100" patternUnits="userSpaceOnUse">
                                    <image x="0" y="0" height="100" width="100" preserveAspectRatio="none" xlink:href="https://doordesigner.inotherm.com/konfigurator/<?= Url::home(true); ?>theme/images/colors/colorServlet?R=55&amp;G=51&amp;B=50">
                                    </image>
                                </pattern>
                                <clipPath id="VrataClipPath">
                                    <rect width="1018" y="0" x="0" height="2049"></rect>
                                </clipPath>
                                <mask id="mask1-1" maskUnits="userSpaceOnUse" x="0" y="0" height="3150" width="1575">
                                    <image x="-511" y="-545.5" width="1575" height="3150" xlink:href="https://doordesigner.inotherm.com/konfigurator/<?= Url::home(true); ?>theme/images/layers/10_PLOCEVINA/POLNAPLOCEVINA.PNG" preserveAspectRatio="none"></image>
                                </mask>
                                <pattern id="mask1-1-texture" x="0" y="0" height="100" width="100" patternUnits="userSpaceOnUse">
                                    <image x="0" y="0" height="100" width="100" preserveAspectRatio="none" xlink:href="https://doordesigner.inotherm.com/konfigurator/<?= Url::home(true); ?>theme/images/colors/colorServlet?R=55&amp;G=51&amp;B=50">
                                    </image>
                                </pattern>
                                <pattern id="DYNAMIC309141" x="0" y="0" height="2600" width="2600" patternUnits="userSpaceOnUse">
                                    <image x="0" y="0" height="2600" width="2600" preserveAspectRatio="none" xlink:href="https://doordesigner.inotherm.com/konfigurator/<?= Url::home(true); ?>theme/images/textures/EDELSTAHL_MATT.jpg">
                                    </image>
                                </pattern>
                                <clipPath id="SidetrueClipPath">
                                    <rect width="0" y="0" x="0" height="2100"></rect>
                                </clipPath>
                                <clipPath id="SidefalseClipPath">
                                    <rect width="0" y="0" x="0" height="2100"></rect>
                                </clipPath>
                                <clipPath id="TopSideClipPath">
                                    <rect width="1100" y="0" x="0" height="0"></rect>
                                </clipPath>
                                <linearGradient x1="0" y1="0" x2="0" y2="2100" id="GRADIENT_DARK">
                                    <stop offset="0%" stop-color="rgb(0,0,0)" stop-opacity="0.4"></stop>
                                    <stop offset="90%" stop-color="rgb(0,0,0)" stop-opacity="0.2"></stop>
                                </linearGradient>
                                <pattern id="OKVIR_HORIZONTAL" x="0" y="0" height="100" width="100" patternUnits="userSpaceOnUse" patternTransform="rotate(90) ">
                                    <image x="0" y="0" height="100" width="100" preserveAspectRatio="none" xlink:href="https://doordesigner.inotherm.com/konfigurator/<?= Url::home(true); ?>theme/images/colors/colorServlet?R=55&amp;G=51&amp;B=50">
                                    </image>
                                </pattern>
                                <pattern id="OKVIR_VERTICAL" x="0" y="0" height="100" width="100" patternUnits="userSpaceOnUse">
                                    <image x="0" y="0" height="100" width="100" preserveAspectRatio="none" xlink:href="https://doordesigner.inotherm.com/konfigurator/<?= Url::home(true); ?>theme/images/colors/colorServlet?R=55&amp;G=51&amp;B=50">
                                    </image>
                                </pattern>
                                <linearGradient x1="0" y1="0" x2="0" y2="2100" id="GRADIENT_LIGHT">
                                    <stop offset="0%" stop-color="rgb(255,255,255)" stop-opacity="0.15"></stop>
                                    <stop offset="85%" stop-color="rgb(255,255,255)" stop-opacity="0.0"></stop>
                                </linearGradient>
                                <filter id="grayscale">
                                    <feColorMatrix type="saturate" values="0.10"></feColorMatrix>
                                </filter>
                            </defs>
                            <g id="PODBOJ" width="100%" height="100%">
                                <image x="0" y="30" width="30" height="2100" xlink:href="https://doordesigner.inotherm.com/konfigurator/<?= Url::home(true); ?>theme/images/static/shadow/leftShadow.png" preserveAspectRatio="none"></image>
                                <image x="30" y="0" width="1100" height="30" xlink:href="https://doordesigner.inotherm.com/konfigurator/<?= Url::home(true); ?>theme/images/static/shadow/topShadow.png" preserveAspectRatio="none"></image>
                                <image x="1130" y="30" width="30" height="2100" xlink:href="https://doordesigner.inotherm.com/konfigurator/<?= Url::home(true); ?>theme/images/static/shadow/rightShadow.png" preserveAspectRatio="none"></image>
                                <image x="0" y="0" width="30" height="30" xlink:href="https://doordesigner.inotherm.com/konfigurator/<?= Url::home(true); ?>theme/images/static/shadow/leftCorner.png" preserveAspectRatio="none"></image>
                                <image x="1130" y="0" width="30" height="30" xlink:href="https://doordesigner.inotherm.com/konfigurator/<?= Url::home(true); ?>theme/images/static/shadow/rightCorner.png" preserveAspectRatio="none"></image>
                            </g>
                        </svg>
                    </div>
                    <ul class="btn-wrap">
                        <li><a href="javascript:void(0);"><i class="fas fa-camera"></i>Upload your Door Picture</a></li>
                        <li><a href="javascript:void(0);"><i class="fas fa-print"></i>Print</a></li>
                        <li><a href="javascript:void(0);"><i class="fas fa-envelope"></i>Send Indquiry</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>