<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Banner */

$this->title = 'Update Banner: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Banners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="banner-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
