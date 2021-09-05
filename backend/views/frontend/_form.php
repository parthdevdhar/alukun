<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */

$img = '';
if (strpos($model->value, "img") !== false) {
    preg_match_all('!\d+!', $model->value, $id);
    $id = implode(' ', $id[0]);
    $file = __DIR__ . $id;
    $img = Yii::$app->lib->img($id);
}
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
                    <div class="row">
                        <?= $form->field($model, 'filed')->textInput(['maxlength' => true, 'disabled' => 'disabled']) ?>

                        <?php if ($model->filed !== 'banner') {
                            echo $form->field($model, 'value')->textInput(['maxlength' => true, 'class' => 'form-control']);
                        } else {
                            echo '<div class="form-group col-md-6">
                            <label class="form-control-label" for="frontend-type">Type</label><div class="row">' . $form->field($model, 'type', ['options' => ['class' => 'col-md-6']])->radio(['label' => 'Image/Video', 'value' => 0, 'uncheck' => null]);
                            echo $form->field($model, 'type', ['options' => ['class' => 'col-md-6']])->radio(['label' => 'Youtube/Vimeo', 'value' => 1, 'uncheck' => null]) . '</div></div>';

                            echo "<div id='imgvid'>" . $form->field($model, 'img', ['options' => ['class' => 'col-md-12']])->fileInput(['maxlength' => true, 'class' => 'form-control']);
                            $html = '';
                            $path = dirname(__DIR__) . "/../../" . @explode("../", $img)[1];
                            // echo dirname(__DIR__)."/../../".$path;exit; 
                            $mime = @mime_content_type($path);
                            if (strstr($mime, "video/")) {
                                $html = "<video width='320' height='240' controls><source src='" . $img . "' ></video>";
                            } else if (strstr($mime, "image/")) {
                                $html = "<img height='200px' src='" . $img . "'>";
                            }

                        ?>
                            <div class="form-group col-md-12">
                                <?= $html ?>
                            </div>
                        <?php
                            echo "</div>";

                            echo $form->field($model, 'val', ['options' => ['id' => 'ifrm']])->textArea(['maxlength' => true, 'class' => 'form-control']);
                        }
                        ?>
                    </div>
                    <div class="text-right">
                        <?= Html::button('<i class="icon wb-close"></i> Cancel', ['class' => 'btn btn-danger', 'onclick' => "window.location.href = '" . \Yii::$app->urlManager->createUrl(['//frontend']) . "';"]) ?>
                        <?= Html::submitButton('<i class="icon wb-check" aria-hidden="true"></i> Save', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#ifrm').hide();
    $('input[type=radio').change(function() {
        if ($(this).val() == 1) {
            $('#ifrm').show();
            $('#imgvid').hide();
        } else {
            $('#ifrm').hide();
            $('#imgvid').show();
        }
    });
</script>