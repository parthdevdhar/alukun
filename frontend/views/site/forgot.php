<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Forgot Password';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-register-box">

    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
    <p>
        To reset your password please provide your Email.
    </p>
    <?= $form->field($model, 'email', ['template' => "<span class='icon-box'><i class='icon-f-72'></i></span>\n{input}\n{error}"])->textInput(['autofocus' => true, 'placeholder' => 'Email']) ?>

    <div class="form-group">
        <?= Html::submitButton('Email Me recovery link', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <p class="login-register-link">Don't have and account? <a href="<?= Url::to(['//register']) ?>">Register</a></p>
</div>