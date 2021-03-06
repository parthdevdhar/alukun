<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$this->title = 'Change Password';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Page -->
<div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
        <div class="panel">
            <div class="panel-body">
                <div class="brand">
                    <h2 class="brand-text font-size-18">Change Password</h2>
                </div>
                <?php
                if($model->getErrors('status')) {
                    echo '<div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>'.$model->getErrors('status')[0].'
                      </div>';
                }
                ?>
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'fieldConfig' => [
                        'template' =>"{input}\n{label}\n{error}",
                        'options' => ['class' => 'form-group form-material floating',"data-plugin"=>"formMaterial"],
                        'labelOptions' => ['class' => 'floating-label'],
                        'errorOptions' => ['encode' => false, 'class' => 'error-cust'],
                    ],
                    'errorCssClass' => 'has-danger',
                    'options'=>['autocomplete'=>'off'],
                ]); ?>
                <?= $form->field($model, 'newpass', ['inputOptions' => ['class'=>'form-control', 'style'=>'content: "Enter your number"; ']])->passwordInput() ?>

                <?= $form->field($model, 'repeatnewpass', ['inputOptions' => ['class'=>'form-control', 'style'=>'content: "Enter your number"; ']])->passwordInput() ?>

                <div class="form-group clearfix">
                    <?= Html::a('Sign in',Url::to('login'),['class'=>'float-right'])?>
                </div>

                <?= Html::submitButton('Reset Your Password', ['class' => 'btn btn-primary btn-block btn-lg mt-40', 'name' => 'login-button']) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>

        <footer class="page-copyright page-copyright-inverse">
            <p>?? <?= date('Y') ?>. All RIGHT RESERVED.</p>
        </footer>
    </div>
</div><!-- End Page -->