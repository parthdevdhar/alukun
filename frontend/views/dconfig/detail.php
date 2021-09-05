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


                        <div class="col-md-6">
                            <select>
                                <option value="">Select Door Type</option>
                                <?php

                                $t = @explode(',', $product->door_type);
                                foreach ($t as $val) {
                                    echo "<option value='$val'>$val</option>";
                                }
                                ?>
                            </select>

                        </div>
                        <div class="col-md-6">
                            <select>
                                <option value="">Select Color</option>
                                <?php
                                $t = @explode(',', $product->colors);
                                foreach ($t as $val) {
                                    echo "<option value='$val'>$val</option>";
                                }
                                ?>
                            </select>

                        </div>
                        <div class="col-md-6">
                            <select>
                                <option value="">Select Accessories</option>
                                <?php
                                $t = @explode(',', $product->accessories);
                                foreach ($t as $val) {
                                    echo "<option value='$val'>$val</option>";
                                }
                                ?>
                            </select>

                        </div>
                        <div class="qty-cart">
                            <a href="javascript:void(0)" onclick="cart(<?= $product->id ?>,1,<?= $product->price ?>)" class="btn btn-red">Send Enquiry </a>
                        </div>
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
    </div>
</div>