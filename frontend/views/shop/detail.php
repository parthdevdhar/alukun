<?php

use yii\helpers\Url;
?>
<div class="content-body">

    <!-- =================  Product Detail Block Start ================ -->
    <div class="product-detail-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-img">
                        <img src="<?= yii::$app->lib->img($product->img); ?>" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-description">
                        <div class="product-title"><?= $product->name ?></div>
                        <?php if ($product->price) { ?>
                            <div class="price-review">
                                <div class="product-price">
                                    <div class="price" data-value="<?= ($product->discount_price) ? $product->discount_price : $product->price ?>">$<?= ($product->discount_price) ? $product->discount_price : $product->price ?></div>
                                    <?php if ($product->discount_price) echo "<div class='entry-text-original'>$" . $product->price . "</div>"; ?>
                                </div>
                            </div>
                            <div class="stock in-stock">
                                <select name="" id="doortype">
                                    <option value=""> Select <?= $cat_name ?> Type</option>
                                    <?php
                                    $val = explode(",", $product->door_type);
                                    foreach ($val as $v) {
                                        echo "<option value='$v'>$v</option>";
                                    } ?>
                                </select>
                            </div>
                            <div class="stock in-stock">
                                <select name="" id="color">
                                    <option value=""> Select Color</option>
                                    <?php
                                    $val = explode(",", $product->colors);
                                    foreach ($val as $v) {
                                        echo "<option value='$v'>$v</option>";
                                    } ?>
                                </select>
                            </div>
                            <div class="stock in-stock">
                                <select name="" id="accessories">
                                    <option value=""> Select Accessories</option>
                                    <?php
                                    $val = explode(",", $product->accessories);
                                    foreach ($val as $v) {
                                        echo "<option value='$v'>$v</option>";
                                    } ?>
                                </select>
                            </div>

                            <div class="qty-cart">
                                <a href="javascript:void(0)" onclick="cart(<?= $product->id ?>,1,<?= $product->price ?>)" class="btn btn-red">add to cart</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-tabs">
            <div class="container">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#description">DESCRIPTION</a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active container" id="description">
                        <p><?= $product->description ?></p>
                    </div>
                    <div class="tab-pane container" id="additional">
                        <p>Additional Information</p>
                    </div>
                    <div class="tab-pane container" id="reviews">
                        <p>No Reviews</p>
                    </div>
                </div>
            </div>
        </div>
        <?php if (!$product->price) { ?>
            <div class="content-body contact-page web-page">
                <div class="container">
                    <div class="contact-data-section" data-aos="fade-up">
                        <div class="contact-data">
                            <div class="contact-form" style="width: 100%;">
                                <h3 class="form-title">Get your Quotation </h3>
                                <div class="data">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                                <form class="form" id="quotation">
                                    <input type="hidden" name='window' value="<?= $product->name ?>">
                                    <div class="form-field">
                                        <label for="fname">First name:</label><br>
                                        <input type="text" id="fname" name="fname" value="" required>
                                    </div>
                                    <div class="form-field">
                                        <label for="lname">Last name:</label><br>
                                        <input type="text" id="lname" name="lname" value="" required>
                                    </div>
                                    <div class="form-field">
                                        <label for="email">Email id:</label><br>
                                        <input type="text" id="email" name="email" value="" required>
                                    </div>
                                    <div class="form-field">
                                        <label for="phone-no">Phone No:</label><br>
                                        <input type="text" id="phone-no" name="phone-no" value="" required>
                                    </div>
                                    <div class="form-field textarea-field">
                                        <label for="phone-no">Your Custom requirement</label><br>
                                        <textarea rows="4" name="comment" placeholder="Enter text here..." required></textarea>
                                    </div>
                                    <div class="form-field">
                                        <button class="common-button" type="submit" value="Submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- =================  Product Detail Block End ================ -->

    <?php if ($random) { ?>
        <!-- =================  Related Product Start ================ -->
        <div class="product-block related-product">
            <div class="container">
                <h3>RELATED PRODUCTS</h3>

                <div id="related-product">
                    <?php foreach ($random as $ran) {
                        $url = 'product/' . urlencode(strtolower(str_replace(' ', '-', trim($ran->name)))) . '/' . $ran->id;

                    ?>
                        <div class="product-box">
                            <div class="product-img">
                                <a href="<?= Url::toRoute([$url]); ?>"><img src="<?= yii::$app->lib->img($ran->img); ?>" alt="" class="img-fluid"></a>
                            </div>
                            <div class="product-desc">
                                <div class="product-title"><a href="<?= Url::toRoute([$url]); ?>"><?= substr($ran->name, 0, 20) ?></a></div>
                                <div class="entry-text">$<?= ($ran->discount_price) ? $ran->discount_price : $ran->price ?></div>
                                <?php if ($ran->discount_price) echo "<div class='entry-text-original'>$" . $ran->price . "</div>"; ?>
                                <a href="<?= Url::toRoute([$url]); ?>" class="btn">view products</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- =================  Related Product End ================ -->
    <?php } ?>
</div>

<script>
    $("#quotation").on('submit', function(e) {
        e.preventDefault();
        mail();
    });



    function mail() {
        $.ajax({
            type: "post",
            dataType: "json",
            url: "<?= Url::to(['//mailsent']) ?>",
            data: $('#quotation').serialize(),
            beforeSend: function() {
                $("#overlay").fadeIn(300);
            },
            success: function(data) {
                $("#quotation")[0].reset()
                noti('We will get back to you very soon. Thank You!', 'success');
            },
        });
    }
</script>