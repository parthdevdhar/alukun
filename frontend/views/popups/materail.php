<?php

use yii\helpers\Url;
use common\models\Material;

?>
<div class="product-single-container product-single-default product-quick-view container">
    <div class="row">

        <?php
        $model = Material::find()->All();
        foreach ($model as $p) {
            ?>
            <div class="col-6 col-md-4 col-lg-3 col-xl-4col mt-5">
                <div class="product">
                    <figure class="product-image-container">
                        <a href="javascript::void(0)" class="product-image">
                            <img src="<?= Url::home(true); ?>uploads/material/<?= $p->mat_img ?>" alt="material">
                        </a>
                    </figure>
                    <div class="product-details product-price-inner">
                        <h2 class="product-title">
                            <?= ucfirst($p->name) ?>
                        </h2>
                    </div><!-- End .product-details -->
                </div><!-- End .product -->
            </div><!-- End .col-xl-3 -->
        <?php } ?>

    </div><!-- End .row -->
</div><!-- End .product-single-container -->