<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-content">
    <!-- Panel -->
    <div class="panel">
        <div class="panel-body">
            <h3><?= Html::encode($this->title) ?></h3>
            <div class="panel-actions panel-actions-keep">
                <?php $c = $this->context->id ?>
                <?= Html::button('<i class="icon wb-plus" aria-hidden="true"></i>', ['class' => 'btn btn-floating btn-info btn-sm', 'data-toggle' => "tooltip", 'data-original-title' => "Add New Product", 'data-container' => "body", 'onclick' => "window.location.href='" . Url::toRoute(["//$c/create"]) . "'"]) ?>
            </div>
        </div>
        <div class="panel-body">
            <!-- Example Responsive -->
            <div class="example-wrap">
                <div class="example">
                    <div class="table-responsive">
                        <?php Pjax::begin(); ?>

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'layout' => "{items}\n{summary}\n<spna class='float-right'>{pager}</spna>",
                            'showOnEmpty' => true,
                            'tableOptions' => [
                                'class' => 'table'
                            ],
                            'pager' => [
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

                            ],
                            'options' => array('style' => 'text-align:center'),
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                'name',
                                'mail',
                                'number',
                                'address',
                                'city',
                                'state',
                                'zip',
                                [
                                    'header' => 'Action',
                                    'class' => 'yii\grid\ActionColumn',
                                    'template' => '{update}',
                                    'buttons' => [
                                        'update' => function ($url, $model) {
                                            return ($model->status == 1) ? Html::a('<i class="icon wb-wrench" aria-hidden="true"></i>', $url, ['class' => "btn btn-sm btn-icon btn-flat btn-info", 'data-toggle' => "tooltip", 'data-original-title' => "Edit", 'data-container' => "body"]) : '--';
                                        },
                                    ],
                                    'options' => ['style' => 'width:10%'],
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