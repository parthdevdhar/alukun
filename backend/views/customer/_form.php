<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-content">
    <div class="panel">
        <div class="panel-body container-fluid">
            <div class="example-wrap">
                <h4 class="example-title"><?= Html::encode($this->title) ?></h4>
                <div class="example">
                    <small><code>Fields with * are required.</code></small>
                    <?php $form = ActiveForm::begin([
                        'fieldConfig' => [
                            'template' => "{label}\n{input}\n{error}",
                            'options' => ['class' => 'form-group col-md-6 '],

                            'labelOptions' => ['class' => 'form-control-label'],
                            'errorOptions' => ['encode' => false, 'class' => 'error-cust'],
                        ],
                        'errorCssClass' => 'has-danger',
                        'options' => ['autocomplete' => 'off', 'enctype' => 'multipart/form-data'],
                    ]); ?>
                    <?php if ($model->isNewRecord) { ?>
                        <div class="row">
                            <?= $form->field($user, 'username')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($user, 'pass')->passwordInput(['maxlength' => true]) ?>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'bussiness_name')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="row">

                        <?= $form->field($model, 'mail')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'number')->textInput(['maxlength' => true, "class" => "form-control num"]) ?>
                    </div>

                    <div class="row">
                        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="row">
                        <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'zip')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="text-right">
                        <?= Html::button('<i class="icon wb-close"></i> Cancel', ['class' => 'btn btn-danger', 'onclick' => "window.location.href = '" . \Yii::$app->urlManager->createUrl(['/customer']) . "';"]) ?>
                        <?= Html::submitButton('<i class="icon wb-check" aria-hidden="true"></i> Save', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>