

 <?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banner';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-content">
    <!-- Panel -->
    <div class="panel">
        <div class="panel-body">
            <h3><?= Html::encode($this->title) ?></h3>
            <div class="panel-actions panel-actions-keep">
                <?= Html::button('<i class="icon wb-plus" aria-hidden="true"></i>', ['class' => 'btn btn-floating btn-info btn-sm', 'data-toggle' => "tooltip", 'data-original-title' => "Add New Banner", 'data-container' => "body", 'onclick' => "window.location.href='" . \Yii::$app->urlManager->createUrl(['/banner/create']) . "'"]) ?>
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
                                //'id',
                                //'banner_img',
                                 [
                                    'attribute'=>'banner_img',
                                    'value'=>function($data){
                                        return '<img height="150px" src="'.\yii\helpers\Url::home(true).'../uploads/slider/'.$data->banner_img.'">';
                                    },
                                    'format'=>'raw'
                                ],
                                'order_id',
                                [
                                    'header' => 'Action',
                                    'class' => 'yii\grid\ActionColumn',
                                    'template' => '{update} {delete}',
                                    'buttons' => [
                                        'update' => function ($url) {
                                            return  Html::a('<i class="icon wb-wrench" aria-hidden="true"></i>', $url, ['class'=>"btn btn-sm btn-icon btn-flat btn-info", 'data-toggle'=>"tooltip" ,'data-original-title'=>"Edit",'data-container'=>"body"]);
                                        },
                                        'delete' => function($url) {
                                            return Html::a('<i class="icon wb-close" aria-hidden="true"></i>', $url, ['onClick' => 'return confirm("Are you absolutely sure ?")', 'data-pjax' => '0', 'class'=>"btn btn-sm btn-icon btn-flat btn-danger", 'data-toggle'=>"tooltip" ,'data-original-title'=>"Delete",'data-container'=>"body"]);
                                        }
                                    ]
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

