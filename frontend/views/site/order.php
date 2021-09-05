<?php

use common\models\Product;
use yii\helpers\Url;

$this->title = 'My Orders';
$this->params['breadcrumbs'][] = $this->title;
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
                        <img src="<?= yii::$app->lib->img($p->thumb); ?>" alt="product">
                        <h1 style="padding-top: 2%">Hey, it's feels so light!</h1>
                        <div class="float-center">
                            <a href="<?= Url::home(true); ?>" class="btn btn-outline-secondary">Let's add some items</a>
                        </div>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="col-lg-12">
                    <div class="cart-table-container">
                        <table class="table table-cart">
                            <thead>
                                <tr>
                                    <th class="product-col">Product</th>
                                    <th class="price-col text-center">Price</th>
                                    <th class="qty-col text-center">Qty</th>
                                    <th class="qty-col text-center">Order Status</th>
                                    <th class="text-center">Amount</th>
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
                                            <td class="text-center">$<?= $p->price ?></td>

                                            <td class="text-center">
                                                <?= $p->qty ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                echo Product::status($p->status);
                                                if ($p->status >= 4 && !empty($p->trackingno)) {
                                                    echo "<br><small><a href='javascript:void(0)' onclick='track($p->trackingno)'>More</a></small>";
                                                }
                                                ?>

                                            </td>
                                            <td class="text-center"><b>$<?= $p->sub_total ?></b></td>

                                        </tr>
                                <?php
                                    }
                                } ?>
                            </tbody>
                        </table>

                    </div><!-- End .cart-table-container -->
                </div><!-- End .col-lg-8 -->
        </div><!-- End .row -->
    <?php } ?>
    </div><!-- End .container -->
    <!-- https://www.fedex.com/apps/fedextrack/?action=track&trackingnumber= -->
</div>

<script>
    function track(id) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
            type: "post",
            dataType: "json",
            url: "<?= Url::toRoute(['//shop/track']) ?>",
            data: {
                id: id,
                '_csrf-frontend': csrfToken,
            },
            success: function(data) {
                if (data.status == 0) {
                    $('#track').modal('toggle');
                } else {
                    $('#track').modal('toggle');
                    $('#datetime').html(data.date + '  ' + data.time);
                    $('#detail').html(data.location);
                    var url = 'Tracking No : <a href="https://www.fedex.com/apps/fedextrack/?action=track&trackingnumber=' + id + '" target="_blank">' + id + '</a>';
                    $('.modal-body').append(url);
                }
            },
        });
    }
</script>