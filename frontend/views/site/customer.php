<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="content-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <h2 class="step-title" style="padding-bottom:2%; padding-top: 2%">Shipping Detail</h2>

                <?php $form = ActiveForm::begin([
                    'fieldConfig' => [
                        'template' => "{label}\n{input}\n{error}",
                        'options' => ['class' => 'form-group col-md-6', 'style' => "padding-top:2%;"],
                    ],
                ]); ?>
                <div class="row">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'mail')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                </div>
                <div class="row">
                    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="row">
                    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'zip')->textInput(['maxlength' => true]) ?>

                </div>

                <div class="row">
                    <?= $form->field($model, 'gst_no')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'address')->textarea(['maxlength' => true, 'cols' => "50", 'style' => 'max-width: 100%; min-height: 80px']) ?>
                </div>

            </div><!-- End .col-lg-8 -->
        </div><!-- End .row -->

        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="checkout-steps-action">
                    <?= Html::submitButton('Place Order', ['class' => 'btn btn-primary']) ?>
                </div><!-- End .checkout-steps-action -->
            </div><!-- End .col-lg-8 -->
        </div><!-- End .row -->
        <?php ActiveForm::end(); ?>
    </div><!-- End .container -->

    <div class="mb-6"></div><!-- margin -->
</div>
<!-- <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBa0nXEOGFdm8uuKOgojp3ztDAUAQaA1g&libraries=places"></script> -->
<script>
    $(".sticky-wrapper").hide();

    function initialize() {
        var input = document.getElementById('customer-address');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            for (i = 0; i < place.address_components.length; i++) {
                for (var j = 0; j < place.address_components[i].types.length; j++) {
                    if (place.address_components[i].types[j] == "administrative_area_level_1") {
                        $('#customer-state').val(place.address_components[i].long_name);
                    }
                    if (place.address_components[i].types[j] == "administrative_area_level_2") {
                        $('#customer-city').val(place.address_components[i].long_name);
                    }
                    if (place.address_components[i].types[j] == "postal_code") {
                        $('#customer-zip').val(place.address_components[i].long_name);
                    }
                }
            }
        });
    }
    $(document).ready(function() {
        google.maps.event.addDomListener(window, 'load', initialize);
    });
</script>