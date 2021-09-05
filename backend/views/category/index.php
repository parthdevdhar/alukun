<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="<?= Url::home(true); ?>theme/global/vendor/toastr/toastr.css">
<link rel="stylesheet" href="<?= Url::home(true); ?>theme/global/vendor/bootstrap-treeview/bootstrap-treeview.css">
<link rel="stylesheet" href="<?= Url::home(true); ?>theme/global/vendor/jstree/jstree.min.css">
<div class="page-content">
    <!-- Panel -->
    <div class="panel">
        <div class="panel-body">
            <h3><?= Html::encode($this->title) ?></h3>
            <div class="panel-actions panel-actions-keep">
                <?php $c = $this->context->id ?>
                <form action="<?= Url::toRoute(["//$c/create/"]) ?>">
                    <input type="hidden" value="" id='search' name="id">
                    <?= Html::submitButton('<i class="icon wb-plus" aria-hidden="true"></i>', ['class' => 'btn btn-floating btn-info btn-sm', 'data-toggle' => "tooltip", 'data-original-title' => "Add", 'data-container' => "body"]) ?>
                    <?= Html::button('<i class="icon wb-wrench" aria-hidden="true"></i>', ['class' => 'btn btn-floating btn-default btn-sm', 'data-toggle' => "tooltip", 'data-original-title' => "Edit", 'data-container' => "body", 'id' => 'edit', 'style' => 'display:none']) ?>
                    <?= Html::button('<i class="icon wb-close" aria-hidden="true"></i>', ['class' => 'btn btn-floating btn-danger btn-sm', 'data-toggle' => "tooltip", 'data-original-title' => "Delete", 'data-container' => "body", 'id' => 'delete', 'style' => 'display:none']) ?>
                </form>

            </div>
        </div>
        <div class="panel-body container-fluid">
            <div class="col-xl-4 col-md-6">
                <!-- Example Expanded -->
                <div class="example-wrap">
                    <spna id='t'></spna>
                    <div class="example">
                        <div id="treeview"></div>
                    </div>
                </div>
                <!-- End Example Expanded -->
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        // var editButton = '<a class="btn btn-sm btn-icon btn-flat btn-info" href="/rowdy/admin/product/update/4" data-toggle="tooltip" data-original-title="Edit" data-container="body"><i class="icon wb-wrench" aria-hidden="true"></i></a>';
        var defaultData = <?= $model ?>;

        var $tree = $("#treeview").treeview({
            levels: 99,
            data: defaultData,
            injectStyle: false,
            expandIcon: 'icon wb-plus',
            collapseIcon: 'icon wb-minus',
            emptyIcon: 'icon',
            nodeIcon: 'icon wb-folder',
            showBorder: false,
            onNodeSelected: function(event, node) {
                $('#search').val(node.id);
                $('#edit').show(600);
                $('#edit').attr('onClick', "window.location.href='<?= Url::to(["//$c/update"]) ?>/" + node.id + "'");
                $('#delete').show(600);
                $('#delete').attr('onClick', "deleteC('<?= Url::to(["//$c/delete"]) ?>/" + node.id + "')");
                console.log(node);

            },
            onNodeUnselected: function(event, node) {
                $('#search').val('');
                $('#edit').hide(600);
                $('#delete').hide(600);
            },
            onNodeRendered: function(event, node) {
                node.$el.append($('<a href="' + node.url + '" class="btn btn-warning btn-xs pull-right prevent-click" target="_blank"><i class="fa fa-rss prevent-click"></i></a>'));
            },
            onAddButtonClicked: function(event, node) {

            },
        });
    });

    function deleteC(url) {
        var conf = window.confirm("Are you sure you want to delete this?");
        if (conf) {
            window.location.href = url;
        }
    }
</script>