<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

<div class="modal-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 login" style="display: block;">
                <h2 class="title mb-2">Login</h2>
                <?php
                $form = ActiveForm::begin([
                    'id' => 'login-form',
                ]); ?>
                <div style="text-align: center;" id='error-msg-l'></div>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <div class="form-footer">
                    <?= Html::a('Login','javascript:void(0)',['class' => 'btn btn-primary btn-md', 'name' => 'login-button', 'onclick'=>'submita(1)']) ?>
                    <div class="custom-control custom-checkbox form-footer-right">
                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    </div>
                </div><!-- End .form-footer -->
                <hr>
                <div class="text-center">
                    <a href="#" class="forget-password"> Forgot your password?</a><br>
                    <a href="#" class="forget-password" onclick="show(2)" id="register"> Register Now</a>
                </div>
                <?php ActiveForm::end(); ?>
            </div><!-- End .col-md-6 -->

            <div class="col-md-12 register" style="display: none">
                <h2 class="title mb-2">Register</h2>

                <?php
                $form = ActiveForm::begin([
                    'id' => 'registration-form',
                ]); ?>
                <div class="form-group " id='error-msg-r'> </div>
                <?= $form->field($user, 'mail')->textInput() ?>
                <?= $form->field($user, 'username')->textInput() ?>
                <?= $form->field($user, 'password')->passwordInput() ?>
                <?= $form->field($user, 'repassword')->passwordInput() ?>

                    <div class="form-footer">
                        <?= Html::a('Register','javascript:void(0)',['class' => 'btn btn-primary btn-md', 'name' => 'login-button', 'onclick'=>'submita(2)']) ?>

                        <div class="custom-control custom-checkbox ">
                            <input type="checkbox" class="custom-control-input" id="newsletter-signup">
                        </div><!-- End .custom-checkbox -->
                    </div><!-- End .form-footer -->
                        <hr>
                    <div class="text-center">
                        <a href="#" class="forget-password" onclick="show(1)" id="login"> Login</a>
                    </div>
                        <?php ActiveForm::end(); ?>
            </div><!-- End .col-md-6 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div>