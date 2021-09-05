<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TestimonialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Testimonials';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php Pjax::begin(['id' => 'pjax-grid-view']); ?>
<div class="page-content">
    <!-- Panel -->
    <div class="panel">
        <div class="panel-body">
            <h3><?= Html::encode($this->title) ?></h3>
            <div class="panel-actions panel-actions-keep">
                <?php $c = $this->context->id ?>
                <?= Html::button('<i class="icon wb-plus" aria-hidden="true"></i>', ['class' => 'btn btn-floating btn-info btn-sm', 'data-toggle' => "tooltip", 'data-original-title' => "Add", 'data-container' => "body", 'onclick' => "window.location.href='" . Url::toRoute(["//$c/create"]) . "'"]) ?>
            </div>
        </div>
        <div class="panel-body">
            <!-- Example Responsive -->
            <div class="example-wrap">
                <div class="example">
                    <div class="table-responsive">
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
                                'designation',
                                'text',
                                [
                                    'attribute' => 'star',
                                    'value' => function ($data) {
                                        $star ='';
                                        $s = '<i class="fa-star" style="color:#ffc107;"></i>';
                                        for($i=0; $i<$data->star;$i++){
                                            $star .= $s;
                                        }
                                        return $star;
                                    },
                                    'format' => 'raw'
                                ],
                                [
                                    'attribute' => 'img',
                                    'value' => function ($data) {
                                        return '<img height="150px" src="' . Yii::$app->lib->img($data->img) . '">';
                                    },
                                    'format' => 'raw'
                                ],
                                [
                                    'header' => 'Action',
                                    'class' => 'yii\grid\ActionColumn',
                                    'template' => '{update} {delete}',
                                    'buttons' => [
                                        'update' => function ($url) {
                                            return  Html::a('<i class="icon wb-wrench" aria-hidden="true"></i>', $url, ['class' => "btn btn-sm btn-icon btn-flat btn-info", 'data-toggle' => "tooltip", 'data-original-title' => "Edit", 'data-container' => "body"]);
                                        },
                                        'delete' => function ($url) {
                                            return Html::a('<i class="icon wb-close" aria-hidden="true"></i>', $url, ['onClick' => 'return confirm("Are you absolutely sure ?")', 'data-pjax' => '0', 'class' => "btn btn-sm btn-icon btn-flat btn-danger", 'data-toggle' => "tooltip", 'data-original-title' => "Delete", 'data-container' => "body"]);
                                        }
                                    ]
                                ],
                            ],
                        ]); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php Pjax::end(); ?>