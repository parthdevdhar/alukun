<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="<?= Url::home(true); ?>theme/assets/examples/css/uikit/dropdowns.css">
<div class="page-content ">
    <!-- Panel -->
    <div class="panel">
        <div class="panel-body">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">
            <!-- Example Responsive -->
            <div class="example-wrap">
                <div class="example">
                    <div class="table-responsive">
                        <?php Pjax::begin(['id' => 'pjax-grid-view']); ?>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'layout' => "{items}\n{summary}\n<spna class='float-right'>{pager}</spna>",
                            'showOnEmpty' => true,
                            'tableOptions' => [
                                'class' => 'table'
                            ],
                            'pager' => [
                                'options'=>['class'=>'pagination pagination-no-border '],   // set class name used in ui list of pagination
                                'prevPageLabel' => false,   // Set the label for the “previous” page button
                                'nextPageLabel' => false,   // Set the label for the “next” page button
                                'firstPageLabel'=>'<span aria-hidden="true">&laquo;</span>',   // Set the label for the “first” page button
                                'lastPageLabel'=>'<span aria-hidden="true">&raquo;</span>',    // Set the label for the “last” page button
                                'nextPageCssClass'=>'',    // Set CSS class for the “next” page button
                                'prevPageCssClass'=>'',    // Set CSS class for the “previous” page button
                                'firstPageCssClass'=>'',    // Set CSS class for the “first” page button
                                'lastPageCssClass'=>'',    // Set CSS class for the “last” page button
                                'maxButtonCount'=>5,    // Set maximum number of page buttons that can be displayed
                                'linkOptions' => ['class' => 'page-link'],
                                'activePageCssClass' => 'active',
                                'disabledPageCssClass' => 'disabled',
                                'pageCssClass' => 'page-item',
                                'disabledListItemSubTagOptions'=>['tag'=>'a','class'=>'page-link'],

                            ],
                            'options' => array('style' => 'text-align:center'),
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                    'attribute' => 'user_id',
                                    'value'=>'user.username',
                                ],
                                [
                                    'attribute' => 'product_id',
                                    'value'=>'product.name',
                                ],
                                'qty',
                                'created_dt',
                                [
                                    'label'=>'Status',
                                    'attribute' => 'status',
                                    'format' => 'raw',
                                    'class' => 'yii\grid\DataColumn',
                                    'value'=>function ($model) {
                                        return $model::drop($model->status,$model->id);
                                    },
                                    'enableSorting'=>TRUE ,
                                    'filter'=>false,
                                    //'filter'=>['1'=>'Received','2'=>'In-Process','3'=>'File Corrupted','4'=>'MisMatch Quantity','5'=>'MisMatch Quality','6'=>'In Printing','7'=>'Order is Ready','8'=>'Dispatch'],
                                ],
                                [
                                    'header' => 'Action',
                                    'class' => 'yii\grid\ActionColumn',
                                    'template' => '{file} {pdf} {update} {delete}',
                                    'buttons' => [
                                        'pdf' => function ($url, $model) {
                                            return ($model->status == 5 || $model->status == 8) ? $model::pdf($model->id) : '';
                                        },
                                    ],
                                    'options' => ['style' => 'width:16%'],
                                ],
                            ],
                        ]); ?>
                        <?php Pjax::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function status(status,id)
{
    $.ajax({
        type: 'get',
        url: '<?=Yii::$app->urlManager->createAbsoluteUrl(["/order/status"])?>?id=' + id +'&status='+status,
        dataType: 'json',
        success: function (data) {
            if (data.msg == 'success') {
                $.pjax({container: '#pjax-grid-view'});
                swal( 'Status Changed', '', "success");
            }
            else {
                alert('Please try again or contact system admin.');
            }
        },
    });
}
</script>