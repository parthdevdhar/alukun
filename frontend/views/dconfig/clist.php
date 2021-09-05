<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;
// echo 1;exit;
?>
<div class="content-body select-product web-page">
    <div class="container">
        <div class="wrap-block">
            <div class="sidebar">
                <div class="inner-title">ENTRANCE DOORS PROGRAMMES</div>
                <ul class="select-program">
                    <li class="active"><a href="javascript:void(0);"><label>All</label><span class="badge">205</span></a></li>
                    <li><a href="javascript:void(0);"><label>EXCLUSIV</label><span class="badge">146</span></a></li>
                    <li><a href="javascript:void(0);"><label>PROMOTION</label><span class="badge">24</span></a></li>
                    <li><a href="javascript:void(0);"><label>Select</label><span class="badge">35</span></a></li>
                </ul>
                <div class="filter-block">
                    <div class="inner-title">filters</div>
                    <div class="filter-box search-bar">
                        <div class="filter-title"><a href="javascript:void(0);">search product <span></span></a></div>
                        <form class="d-flex search-bx">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <a href="javascript:void(0);" class="search-icon"><i class="fas fa-search"></i></a>
                        </form>
                    </div>
                    <div class="filter-box">
                        <div class="filter-title"><a href="javascript:void(0);" data-toggle="collapse" data-target="#modal" aria-expanded="true" aria-controls="modal">modal</a></div>
                        <div class="form-group collapse show" id="modal">
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Classic</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Modern</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Simple</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Top Seller</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-box">
                        <div class="filter-title"><a href="javascript:void(0);" data-toggle="collapse" data-target="#glass" aria-expanded="true" aria-controls="glass">Glass </a></div>
                        <div class="form-group collapse show" id="glass">
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Without</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Small</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Medium</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Big</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-box">
                        <div class="filter-title"><a href="javascript:void(0);" data-toggle="collapse" data-target="#glass-shape" aria-expanded="true" aria-controls="glass-shape">Glass shape </a></div>
                        <div class="form-group collapse show" id="glass-shape">
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Rectangles</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Squares</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Curves and arc</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Other shapes</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-box">
                        <div class="filter-title"><a href="javascript:void(0);" data-toggle="collapse" data-target="#modal-application" aria-expanded="true" aria-controls="modal-application">MODEL APPLICATIONS </a></div>
                        <div class="form-group collapse show" id="modal-application">
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Classic</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Modern</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Simple</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Top Seller</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-content">
                <ul class="select-process">
                    <li class="active"><a href="choose-model.html">Choose Model</a></li>
                    <li><a href="javascript:void(0);">Door type and dimensions</a></li>
                    <li><a href="javascript:void(0);">Colours</a></li>
                    <li><a href="javascript:void(0);">Accessories</a></li>
                </ul>
                <div class="select-product">
                    <div class="title">Select Product</div>
                    <div class="row">
                        <?php
                        foreach ($model as $p) {
                            $url = 'product/' . urlencode(strtolower(str_replace(' ', '-', trim($p->name)))) . '/' . $p->id;
                        ?>
                            <div class="col-sm-3">
                                <div class="product-bx">
                                    <div class="product-img"><img src="<?= yii::$app->lib->img($p->thumb); ?>" alt="" class="img-fluid"></div>
                                    <div class="product-name"><?= substr($p->name, 0, 20) ?></div>
                                    <a href="<?=Url::to(['//dconfig/type','id'=>$p->id]);?>" class="faux-link"></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <ul class="pagination pagination-no-border">
                    <?php
                    echo LinkPager::widget([
                        'pagination' => $pages,
                        'prevPageLabel' => '<i class="icon-angle-left"></i>',
                        'nextPageLabel' => '<i class="icon-angle-right"></i>',
                        'linkOptions' => ['class' => 'page-link'],
                        'maxButtonCount' => 5,
                    ]);
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>