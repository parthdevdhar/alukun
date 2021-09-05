<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

$user = \common\models\Customer::find()->count();
$order = \common\models\Order::find()->count();
$pro = \common\models\Product::find()->count();
$recipt =  '';
$this->title = 'Welcome';
?>

<div class="page-header">
    <h1 class="page-title font-size-26 font-weight-100"></h1>
</div>

<div class="page-content container-fluid">
    <div class="row">
        <!-- First Row -->
        <div class="col-xl-3 col-md-6 info-panel">
            <div class="card card-shadow">
                <div class="card-block bg-white p-20">
                    <?= Html::button('<i class="icon fa-shopping-cart"></i>', ['class' => 'btn btn-floating btn-sm btn-warning','onclick'=>"window.location.href='".\Yii::$app->urlManager->createUrl(['//order'])."'"]) ?>
                    <span class="ml-15 font-weight-400">ORDERS</span>
                    <div class="content-text text-center mb-0">
                        <span class="font-size-40 font-weight-100"><?=$order?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 info-panel">
            <div class="card card-shadow">
                <div class="card-block bg-white p-20">
                    <?= Html::button('<i class="icon fa-shopping-bag"></i>', ['class' => 'btn btn-floating btn-sm btn-danger','onclick'=>"window.location.href='".\Yii::$app->urlManager->createUrl(['//product'])."'"]) ?>
                    <span class="ml-15 font-weight-400">PRODUCTS</span>
                    <div class="content-text text-center mb-0">
                        <span class="font-size-40 font-weight-100"><?=$pro?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 info-panel">
            <div class="card card-shadow">
                <div class="card-block bg-white p-20">
                    <?= Html::button('<i class="icon wb-user"></i>', ['class' => 'btn btn-floating btn-sm btn-primary','onclick'=>"window.location.href='".\Yii::$app->urlManager->createUrl(['//customer'])."'"]) ?>
                    <span class="ml-15 font-weight-400">Customers</span>
                    <div class="content-text text-center mb-0">
                        <span class="font-size-40 font-weight-100"><?= $user?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 info-panel">
            <div class="card card-shadow">
                <div class="card-block bg-white p-20">
                    <?= Html::button('<i class="icon ti-receipt"></i>', ['class' => 'btn btn-floating btn-sm btn-success','onclick'=>"window.location.href='".\Yii::$app->urlManager->createUrl(['//paymentreceipt'])."'"]) ?>
                    <span class="ml-15 font-weight-400">Pending Receipt</span>
                    <div class="content-text text-center mb-0">
                        <span class="font-size-40 font-weight-100"><?=$recipt?></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End First Row -->

        <!-- Third Row -->
        <!-- Third Left -->
        <div class="col-lg-12" id="ecommerceRecentOrder">
            <div class="card card-shadow table-row">
                <div class="card-block bg-white table-responsive">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'layout' => "{items}",
                        'showOnEmpty' => true,
                        'tableOptions' => [
                            'class' => 'table'
                        ],

                        'options' => array('style' => 'text-align:center'),
                        'columns' => [
                            [
                                'headerOptions' => ['style'=>'font-weight:bold;'],
                                'label' => 'Product',
                                'attribute' => 'product_id',
                                'value'=>'product.name',
                                'enableSorting'=>false ,
                            ],
                            [
                                'headerOptions' => ['style'=>'font-weight:bold;'],
                                'label'=>'User',
                                'attribute' => 'user_id',
                                'value'=>'user.username',
                                'enableSorting'=>false ,
                            ],
                            [
                                'headerOptions' => ['style'=>'font-weight:bold;'],
                                'label'=>'Order Date',
                                'attribute'=>'created_dt',
                                'enableSorting'=>false ,
                                'options'=>['style'=>'width:16%'],
                            ],
                            [
                                'headerOptions' => ['style'=>'font-weight:bold;'],
                                'label'=>'Status',
                                'attribute' => 'status',
                                'format' => 'raw',
                                'class' => 'yii\grid\DataColumn',
                                'value'=>function ($model) {
                                    return $model::status($model->status);
                                },
                                'enableSorting'=>false ,
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
        <!-- End Third Left -->
    </div>
</div>

