<?php
use yii\helpers\Url;
?>
<div class="product-single-container product-single-default product-quick-view container">
    <div class="row">
        <div class="col-lg-6 col-md-6 product-single-gallery">
            <div class="product-slider-container product-item">
                <div class="product-single-carousel owl-carousel owl-theme">
                    <div class="product-item">
                        <img class="product-single-image" src="<?= Url::home(true); ?>uploads/products/<?= $product->thumb; ?>" data-zoom-image="<?= Url::home(true); ?>uploads/products/<?= $product->img; ?>"/>
                    </div>
                </div>
                <!-- End .product-single-carousel -->
            </div>
        </div><!-- End .col-lg-7 -->

        <div class="col-lg-6 col-md-6">
            <div class="product-single-details">
                <form method="post" id="popup">
                <h1 class="product-title"><?=$product->name?></h1>

                <div class="price-box">
                    <span class="product-price"><i class="fas fa-rupee-sign"></i><?=$product->price?></span>
                </div><!-- End .price-box -->



                <div class="product-action product-all-icons">
                    <div class="product-single-qty">
                        <input class="horizontal-quantity form-control" type="text" name="qty" id="qty">
                    </div><!-- End .product-single-qty -->

                    <a href="javascript:void(0)" onclick="cart(<?=$product->id?>,1,<?=$product->price?>)" class="paction add-cart" title="Add to Cart">
                        <span>Add to Cart</span> </a>
                </div><!-- End .product-action -->
                </form>
            </div><!-- End .product-single-details -->
        </div><!-- End .col-lg-5 -->
    </div><!-- End .row -->
</div><!-- End .product-single-container -->