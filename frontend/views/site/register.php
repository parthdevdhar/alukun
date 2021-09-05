<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-register-box">
    <?php $form = ActiveForm::begin(['id' => 'register-form']); ?>

    <?= $form->field($model, 'name', ['template' => "<span class='icon-box'><i class='icon-f-94'></i></span>\n{input}\n{hint}\n{error}"])->textInput(['class' => 'form-control', 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'mail', ['template' => "<span class='icon-box'><i class='icon-f-72'></i></span>\n{input}\n{hint}\n{error}"])->textInput(['class' => 'form-control', 'placeholder' => 'Email']) ?>

    <?= $form->field($model, 'phone', ['template' => "<span class='icon-box'><i class='icon-f-93'></i></span>\n{input}\n{hint}\n{error}"])->textInput(['class' => 'form-control num', 'placeholder' => 'Phone']) ?>

    <?= $form->field($model, 'password', ['template' => "<span class='icon-box'><i class='icon-f-77'></i></span>\n{input}\n{hint}\n{error}"])->passwordInput(['class' => 'form-control', 'placeholder' => 'Password']) ?>

    <?= $form->field($model, 'repassword', ['template' => "<span class='icon-box'><i class='icon-f-77'></i></span>\n{input}\n{hint}\n{error}"])->passwordInput(['class' => 'form-control', 'placeholder' => 'Confirm Password']) ?>

    <?= $form->field($model, 'terms', ['options' => ['class' => 'form-group form-check']])->checkbox(['class' => 'form-check-input','label'=> 'I agree to the <a href="javascript::void(0)">Terms of Service</a>']); ?>

    <?= Html::submitButton('Register', ['class' => 'btn', 'name' => 'register']) ?>

    <?php ActiveForm::end(); ?>
    <p class="login-register-link">Already a member? <a href="<?= Url::to(['//login']) ?>">Login</a></p>
</div>