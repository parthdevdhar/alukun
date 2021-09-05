<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

?>
<!-- Page -->
<div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
        <div class="panel">
            <div class="panel-body">
                <div class="brand">
                    <img class="brand-img" src="<?= Url::home(true); ?>theme/logo.png" alt="<?=Yii::$app->name?>" width="220px">
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
                <?php
                if(Yii::$app->session->hasFlash('success'))
                {
                    echo '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    '.Yii::$app->session->getFlash('success').'
                  </div>';
                }
                elseif(Yii::$app->session->hasFlash('error'))
                {
                    echo '<script> $( document ).ready(function() { swal( "error", "'.Yii::$app->session->getFlash('error').'", "error") }); </script>';
                    echo '<div class="alert alert-error alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    '.Yii::$app->session->getFlash('error').'
                  </div>';
                }
                ?>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class'=>'form-control', 'style'=>'content: "Enter your number"; ']) ?>

                <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control']) ?>
                <div class="form-group clearfix">
                    <?= $form->field($model, 'rememberMe')->checkbox([
                        'template' => "<div class=\"checkbox-custom checkbox-inline checkbox-primary checkbox-lg float-left\">{input} {label}</div>\n{error}",
                    ]) ?>
                    <?= Html::a('Forgot password?',Url::to('forgot'),['class'=>'float-right'])?>
                </div>


                <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-block btn-lg mt-40', 'name' => 'login-button']) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>

        <footer class="page-copyright page-copyright-inverse">
            <p>© <?= date('Y') ?>. All RIGHT RESERVED.</p>
        </footer>
    </div>
</div><!-- End Page -->
