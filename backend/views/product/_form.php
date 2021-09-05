<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .bootstrap-tagsinput {
        display: block;
    }
</style>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
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
                    <?php if ($model->isNewRecord) {
                    ?>
                        <div class="row" id='cat'>
                            <?= $form->field($model, 'cat_id')->dropDownList($cat, ['prompt' => 'Select...']) ?>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <?= $form->field($model,'name', ['options' => ['class' => 'form-group col-md-4']])->textInput(['maxlength' =>true, 'id' => 'parth']) ?>

                        <?= $form->field($model,'price', ['options' => ['class' => 'form-group col-md-4']])->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model,'discount_price', ['options' => ['class' => 'form-group col-md-4']])->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class='row'>
                        <?= $form->field($model, 'description', ['options' => ['class' => 'form-group col-md-12']])->textarea(['id' => 'editor1']) ?>
                    </div>
                    <div class="row">
                        <?= $form->field($model, 'door_type')->textInput(['maxlength' => true, 'data-role' => "tagsinput"]) ?>
                        <?= $form->field($model, 'colors')->textInput(['maxlength' => true, 'data-role' => "tagsinput"]) ?>
                    </div>
                    <div class="row">
                        <?= $form->field($model, 'img')->fileInput(['maxlength' => true, 'class' => 'form-control']) ?>
                        <?= $form->field($model, 'accessories')->textInput(['maxlength' => true, 'data-role' => "tagsinput"]) ?>
                    </div>
                    <?php if (!$model->isNewRecord) { ?>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <img height="200px" src="<?= Yii::$app->lib->img($model->img) ?>">
                            </div>
                        </div>
                    <?php } ?>
                    <div class="text-right">
                        <?= Html::button('<i class="icon wb-close"></i> Cancel', ['class' => 'btn btn-danger', 'onclick' => "window.location.href = '" . \Yii::$app->urlManager->createUrl(['/product']) . "';"]) ?>
                        <?= Html::submitButton('<i class="icon wb-check" aria-hidden="true"></i> Save', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    CKEDITOR.replace('editor1');
    var lastId = String;
    $('#product-cat_id').on('change', function() {
        var cat = $(this).val();
        $('.subcat').remove();

        getData(cat);
    });

    function getData(cat, id = null) {
        var val = "." + id;
        // console.log(val);
        $(val).next(".subcat").empty().remove();
        $.ajax({
            type: 'POST',
            url: '<?= Url::to(["//product/child"]) ?>',
            data: {
                cat: cat,
            },
            dataType: "json",
            success: function(data) {
                if (data.msg == 'success') {
                    lastId = data.lastId;
                    $('#cat').append(data.data);
                }
            }
        });
    }

    // var availableTags = [
    //     "ActionScript",
    //     "AppleScript",
    //     "Asp",
    //     "BASIC",
    //     "C",
    //     "C++",
    //     "Clojure",
    //     "COBOL",
    //     "ColdFusion",
    //     "Erlang",
    //     "Fortran",
    //     "Groovy",
    //     "Haskell",
    //     "Java",
    //     "JavaScript",
    //     "Lisp",
    //     "Perl",
    //     "PHP",
    //     "Python",
    //     "Ruby",
    //     "Scala",
    //     "Scheme"
    // ];
    // $("#parth").autocomplete({
    //     source: availableTags
    // });
</script>