<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel common\models\Img_mSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="page-header page-header-bordered page-header-tabs">
    <div class="panel-body">
        <h1 class="page-title">Gallery</h1>
        <div class="panel-actions panel-actions-keep">
            <?php $c = $this->context->id . '/delete/'; ?>
            <?= Html::button('<i class="icon wb-plus" aria-hidden="true"></i>', ['class' => 'btn btn-floating btn-info btn-sm', 'data-toggle' => "tooltip",  'data-tag' => 'img', 'data-original-title' => "Add", 'data-container' => "body", 'onclick' => "javascript:void(0)"]) ?>

            <input id="img" type="file" name="img" style="display: none;" onchange="test()" />
        </div>
    </div>
</div>

<div class="page-content">
    <ul class="blocks blocks-100 blocks-xxl-4 blocks-lg-3 blocks-md-2" data-plugin="filterable" data-filters="#exampleFilter" id='imgadd'>
        <?php
        foreach ($model as $m) {
        ?>
            <li data-type="animal">
                <div class="card card-shadow">
                    <figure class="card-img-top overlay-hover overlay">
                        <img class="overlay-figure overlay-scale" src="<?= Yii::$app->lib->img($m->id) ?>" alt="...">
                        <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                            <a class="icon wb-search" href="<?= Yii::$app->lib->img($m->id) ?>"></a>
                            <a class="icon wb-trash" href="<?= Url::to(["//" . $c . $m->id]); ?>" title="Remove"></a>
                        </figcaption>
                    </figure>
                </div>
            </li>
        <?php } ?>
    </ul>

    <div style="margin:auto; width:40%;">
        <ul class="toolbox toolbox-pagination">
            <?php
            echo LinkPager::widget([
                'pagination' => $pages,
                'options' => ['class' => 'pagination pagination-no-border '],   // set class name used in ui list of pagination
                'prevPageLabel' => false,   // Set the label for the “previous” page button
                'nextPageLabel' => false,   // Set the label for the “next” page button
                'firstPageLabel' => '<span aria-hidden="true">&laquo;</span>',   // Set the label for the “first” page button
                'lastPageLabel' => '<span aria-hidden="true">&raquo;</span>',    // Set the label for the “last” page button
                'nextPageCssClass' => '',    // Set CSS class for the “next” page button
                'prevPageCssClass' => '',    // Set CSS class for the “previous” page button
                'firstPageCssClass' => '',    // Set CSS class for the “first” page button
                'lastPageCssClass' => '',    // Set CSS class for the “last” page button
                'maxButtonCount' => 5,    // Set maximum number of page buttons that can be displayed
                'linkOptions' => ['class' => 'page-link'],
                'activePageCssClass' => 'active',
                'disabledPageCssClass' => 'disabled',
                'pageCssClass' => 'page-item',
                'disabledListItemSubTagOptions' => ['tag' => 'a', 'class' => 'page-link'],
            ]);
            ?>
        </ul>
    </div>

</div>
<script>
    var id;
    $('button').on('click', function() {
        id = '#' + $(this).attr('data-tag');
        $(id).trigger('click');
    });

    function test() {
        var file = $(id).prop('files')[0];
        var imagefile = file.type;
        var match = ["image/jpeg", "image/png", "image/JPEG", "image/PNG"];
        if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
            swal("error", 'Uploaded file is not image.', "error");
            $(id).val('');
            return false;
        } else {
            submit(id);
        }
    }

    //image upload
    function submit(id) {
        var file_data = $(id).prop('files')[0];
        var formData = new FormData();
        formData.append('img', file_data);
        formData.append('type', id);
        $.ajax({
            type: 'POST',
            url: '<?= Url::toRoute(["//gallery/file"]) ?>',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('.page-content').css("opacity", ".10");
            },
            success: function(data) {
                var obj = jQuery.parseJSON(data);
                if (obj.msg == 'success') {
                    var msg = obj.msg.toUpperCase();
                    swal({
                            title: obj.msg,
                            text: obj.status,
                            type: obj.msg
                        },

                    );
                    window.setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    $(id).val('');
                    swal(obj.msg, obj.status, obj.msg);
                }
            }
        });
    };
</script>