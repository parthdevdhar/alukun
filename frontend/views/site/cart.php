<?php

use yii\helpers\Url;

$this->title = 'Cart';
$this->params['breadcrumbs'][] = $this->title;

$tax = round((@$model->total * 4) / 100, 2);
?>
<div class="content-body">
    <div class="container">
        <div class="row">
            <?php
            if (isset($model->status)) {
            ?>
                <div class="col-md-12">
                    <div align="center" style="padding: 10%;">
                        <img src="<?= Url::home(true) ?>theme/images/shopping.png" style="height: 200px;">
                        <h1 style="padding-top: 2%">Hey, it feels so light!</h1>
                        <div class="float-center">
                            <a href="<?= Url::home(true); ?>" class="btn btn-outline-secondary">Let's add some items</a>
                        </div>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="col-lg-8">
                    <div class="cart-table-container">
                        <table class="table table-cart">
                            <thead>
                                <tr>
                                    <th class="product-col">Product</th>
                                    <th>Details</th>
                                    <th class="price-col">Price</th>
                                    <th class="price-col">Discounted Price</th>
                                    <th class="qty-col">Qty</th>

                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($model as $key => $p) {
                                    if ($key !== 'total') {
                                        $url = 'product/' . urlencode(strtolower(str_replace(' ', '-', $p->name))) . '/' . $p->id;
                                ?>
                                        <tr class="product-row" id="pro<?= $p->id ?>">
                                            <td class="product-col">
                                                <figure class="product-image-container">
                                                    <a href="<?= Url::toRoute([$url]); ?>" class="product-image">
                                                        <img src="<?= yii::$app->lib->img($p->thumb); ?>" alt="product">
                                                    </a>
                                                </figure>
                                                <h2 class="product-title">
                                                    <a href="<?= Url::toRoute([$url]); ?>"><?= $p->name ?></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <p>Type :: <?= ucfirst($p->type)?></p>
                                                <p>Color :: <?= ucfirst($p->color)?></p>
                                                <p>Accessories :: <?= ucfirst($p->accessories)?></p>
                                            </td>
                                            <td>$<?= $p->price ?></td>
                                            <td>$<?= $p->discount_price ?></td>
                                            <td>
                                                <?= $p->qty ?>
                                            </td>
                                            <td>$<?= $p->sub_total ?></td>
                                        </tr>
                                        <tr class="product-action-row">
                                            <td colspan="8" class="clearfix">

                                                <div class="float-right">
                                                    <a href="javascript:void(0)" onclick="remove(<?= $p->id ?>)" title="Remove product" class="btn-remove"><span class="sr-only">Remove</span></a>
                                                </div><!-- End .float-right -->
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="8" class="clearfix">
                                        <div class="float-left">
                                            <a href="<?= Url::home(true); ?>" class="btn btn-outline-secondary">Continue Shopping</a>
                                        </div><!-- End .float-left -->

                                        <div class="float-right">
                                            <a href="javascript:void(0)" class="btn btn-outline-secondary btn-clear-cart">Clear Shopping Cart</a>
                                        </div><!-- End .float-right -->
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                    </div><!-- End .cart-table-container -->
                </div><!-- End .col-lg-8 -->

                <div class="col-lg-4">
                    <div class="cart-summary">
                        <h3>Summary</h3>
                        <table class="table table-totals">
                            <tfoot>
                                <tr>
                                    <td>Order Total</td>
                                    <td><i class="fas fa-dollar"></i><?= $model->total ?></td>

                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <td><i class="fas fa-dollar"></i><?= $tax ?></td>
                                </tr>
                                <tr>
                                    <td><b>Grand Total</b></td>
                                    <td><b>$<?= $model->total + $tax ?></b></td>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="checkout-methods">
                            <a href="javascript:void(0)" class="btn btn-block btn-sm btn-primary checkout">Go to Checkout</a>
                        </div><!-- End .checkout-methods -->
                    </div><!-- End .cart-summary -->
                </div><!-- End .col-lg-4 -->
        </div><!-- End .row -->
    <?php } ?>
    </div><!-- End .container -->
</div>
<script>
    $('.checkout').click(function() {
        window.location = '<?= Url::to(["//checkout"]) . '/' . base64_encode('checkout'); ?>';
    });

    $('.btn-clear-cart').click(function() {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            url: "<?= Yii::$app->urlManager->createAbsoluteUrl(["/clear"]) ?>",
            dataType: "json",
            data: {
                '_csrf-frontend': csrfToken,
            },
            type: 'post',
            success: function(data) {
                location.reload();
            }
        });
    });

    function remove(id) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            url: "<?= Yii::$app->urlManager->createAbsoluteUrl(["/remove"]) ?>",
            dataType: "json",
            data: {
                '_csrf-frontend': csrfToken,
                product_id: id
            },
            type: 'post',
            success: function(data) {
                location.reload();
            }
        });
    }
</script>