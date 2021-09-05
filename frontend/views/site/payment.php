<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-register-box payment">

    <div class="panel-heading">
        <h3 class="panel-title">Charge <?php echo '$' . $price; ?> with Authorize.Net</h3>
    </div>
    <div class="panel-body">

        <!-- Payment form -->
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <?= $form->field($pay, 'name')->textInput(['autofocus' => true, 'placeholder' => 'Name']) ?>
        <?= $form->field($pay, 'email')->textInput(['autofocus' => true, 'placeholder' => 'Email', 'disabled' => true]) ?>
        <?= $form->field($pay, 'card')->textInput(['autofocus' => true, 'placeholder' => 'Card NO.']) ?>
        <div class="form-group">
            <label>EXPIRY DATE</label>
            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($pay, 'month',['options' => ['class' => ' ']])->textInput(['autofocus' => true, 'placeholder' => 'MM', "class" => "form-control num"])->label(false) ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($pay, 'year',['options' => ['class' => ' ']])->textInput(['autofocus' => true, 'placeholder' => 'YYYY', "class" => "form-control num"])->label(false) ?>
                </div>
            </div>

        </div>
        <?= $form->field($pay, 'cvc')->textInput(['autofocus' => true, 'placeholder' => 'CVC Number']) ?>
        <div class="form-group">
            <?= Html::submitButton('Pay Now', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>