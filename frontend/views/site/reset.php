<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Password Reset';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-register-box">

    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
    <h1>Password Reset</h1>
    <?= $form->field($model, 'password', ['template' => "<span class='icon-box'><i class='icon-f-77'></i></span>\n{input}\n{error}"])->passwordInput(['autofocus' => true, 'placeholder' => 'New Password']) ?>
    <?= $form->field($model, 'repassword', ['template' => "<span class='icon-box'><i class='icon-f-77'></i></span>\n{input}\n{error}"])->passwordInput([ 'placeholder' => 'Confirm Password']) ?>

    <div class="form-group">
        <?= Html::submitButton('Reset', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <p class="login-register-link">Don't have and account? <a href="<?= Url::to(['//register']) ?>">Register</a></p>
</div>