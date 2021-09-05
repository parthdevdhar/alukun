<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<div class="content-body">
    <!-- =================  Featured Product Start ================ -->
    <div class=" product-block featured-product">
        <div class="container">
            <h3><?= ucfirst($_GET['any']); ?></h3>
            <div class="row">
                <?php
                foreach ($model as $p) {
                    $url = 'product/' . urlencode(strtolower(str_replace(' ', '-', trim($p->name)))) . '/' . $p->id;
                ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="product-box">
                            <div class="product-img">
                                <a href="<?= Url::toRoute([$url]); ?>"><img src="<?= yii::$app->lib->img($p->thumb); ?>" alt="" class="img-fluid"></a>
                            </div>
                            <div class="product-desc">
                                <div class="product-title"><a href="<?= Url::toRoute([$url]); ?>"><?= substr($p->name, 0, 20) ?></a></div>
                                <div class="product-price">
                                    <div class="entry-text">$<?= ($p->discount_price) ? $p->discount_price : $p->price ?></div>
                                    <?php if ($p->discount_price) echo "<div class='entry-text-original'>$" . $p->price . "</div>"; ?>
                                </div>
                                <a href="<?= Url::toRoute([$url]); ?>" class="btn">view products</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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