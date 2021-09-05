<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Change Password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-content">
    <div class="panel">
        <div class="panel-body container-fluid">
            <div class="example-wrap">
                <h3 class="example-title"><?= Html::encode($this->title) ?></h3>

                <div class="example">
                    <p>Please fill out the following fields to change password :</p>

                    <?php $form = ActiveForm::begin([
                        'id' => 'changepassword-form',
                        'options' => ['class' => 'form-horizontal'],
                        'fieldConfig' => [
                                'template'=>"{label}\n<div class='col-md-6'>{input}\n{error}</div>",
                            'labelOptions' => ['class' => 'col-md-3 form-control-sm form-control-label'],
                            'errorOptions' => ['encode' => false, 'class' => 'error-cust'],
                        ],
                    ]); ?>

                    <?= $form->field($model, 'oldpass', ['inputOptions' => ['placeholder' => 'Old Password'],'options'=>['class'=>'form-group row']])->passwordInput() ?>

                    <?= $form->field($model, 'newpass', ['inputOptions' => ['placeholder' => 'New Password'],'options'=>['class'=>'form-group row']])->passwordInput() ?>

                    <?= $form->field($model, 'repeatnewpass', ['inputOptions' => ['placeholder' => 'Repeat New Password'],'options'=>['class'=>'form-group row']])->passwordInput() ?>


                    <div class="text-right">
                        <?= Html::button('<i class="icon wb-close"></i> Cancel', ['class' => 'btn btn-danger', 'onclick' => "window.location.href = '" . \Yii::$app->urlManager->createUrl(['/site']) . "';"]) ?>
                        <?= Html::submitButton(' Change Password', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>