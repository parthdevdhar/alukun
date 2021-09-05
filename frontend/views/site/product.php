<?php

use yii\helpers\Url;

?>
<div class="container">

    <div class="row">
        <div class="col-lg-9">
            <div class="product-single-container product-single-default">
                <div class="row">
                    <div class="col-lg-7 col-md-6 product-single-gallery">
                        <div class="product-slider-container product-item">
                            <div class="product-single-carousel owl-carousel owl-theme">
                                <div class="product-item">
                                    <img class="product-single-image" height="400px" src="<?= Url::home(true); ?>uploads/products/<?= $product->thumb; ?>" data-zoom-image="<?= Url::home(true); ?>uploads/products/<?= $product->img; ?>"/>
                                </div>
                            </div>
                            <!-- End .product-single-carousel -->
                            <span class="prod-full-screen">
                            <i class="icon-plus"></i>
                        </span>
                        </div>
                    </div><!-- End .col-lg-7 -->

                    <div class="col-lg-5 col-md-6">
                        <div class="product-single-details">
                            <h1 class="product-title"><?=$product->name?></h1>
                            <div class="product-desc"></div>
                            <div class="product-filters-container">
                                <div class="product-single-filter">
                                    <input type="radio" name="type" value='1' checked="checked" class="a"> Regular Printing &nbsp;&nbsp;
                                    <input type="radio" name="type" value='2' class="a"> Uv Printing
                                </div><!-- End .product-single-filter -->
                                <div class="product-single-filter">
                                    <?php
                                        $mat = \common\models\Material::find()->all();
                                    ?>
                                    <select class="form-control mate" name="mate" id='dd'>
                                        <option value="">Select Materials</option>
                                            <?php
                                                $i = 0;
                                                foreach ($mat as $m) {
                                                    $select = '';
                                                    if($i == 0)
                                                        $select = 'selected="selected"';
                                                    echo "<option value='$m->id' data-uprice=".$m->uv_price." data-price=".$m->price." $select>$m->name</option>";
                                                    $i++;
                                                }
                                            ?>
                                    </select>
                                    <a href="<?= Url::home(true); ?>popups/materail" class="pop" style=""><i class="fas fa-question-circle" title="View Materials" style="padding-left:1.5rem; font-size:18px !important"></i></a>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="width" class="control-label">Width</label>
                                            <input type="text" value="1" name="width" class="form-control ">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="Height" class="control-label">height</label>
                                            <input type="text" value="1" name="height" class="form-control col-sm-2">
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End .product-filters-container -->

                            <div class="price-box">
                                <span class="product-price" data-value="<?=$product->price?>"><i class="fas fa-rupee-sign" style="font-size: medium;"></i><?=$product->price?></span>
                            </div><!-- End .price-box -->



                            <div class="product-action product-all-icons">
                                <div class="product-single-qty">
                                    <input class="horizontal-quantity form-control" type="text" name="qty">
                                </div><!-- End .product-single-qty -->

                                <a href="javascript:void(0)" onclick="cart(<?=$product->id?>,1,<?=$product->price?>)" class="paction add-cart" title="Add to Cart">
                                    <span>Add to Cart</span> </a>
                            </div><!-- End .product-action -->

                        </div><!-- End .product-single-details -->
                    </div><!-- End .col-lg-5 -->
                </div><!-- End .row -->
            </div><!-- End .product-single-container -->

            <div class="product-single-tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                        <div class="product-desc-content">
                            <?= $product->description?>
                        </div><!-- End .product-desc-content -->
                    </div><!-- End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .product-single-tabs -->
        </div><!-- End .col-lg-9 -->

        <div class="sidebar-overlay"></div>
        <div class="sidebar-toggle"><i class="icon-sliders"></i></div>
        <aside class="sidebar-product col-lg-3 padding-left-lg mobile-sidebar">
            <div class="sidebar-wrapper">
                <div class="widget widget-info">
                    <ul>
                        <li>
                            <i class="icon-shipping"></i>
                            <h4>FREE<br>SHIPPING</h4>
                        </li>
                        <li>
                            <i class="icon-us-dollar"></i>
                            <h4>100% MONEY<br>BACK GUARANTEE</h4>
                        </li>
                        <li>
                            <i class="icon-online-support"></i>
                            <h4>ONLINE<br>SUPPORT 24/7</h4>
                        </li>
                    </ul>
                </div><!-- End .widget -->
            </div>
        </aside><!-- End .col-md-3 -->
    </div><!-- End .row -->
</div>
<script type="text/javascript">
</script>