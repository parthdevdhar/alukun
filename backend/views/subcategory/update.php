<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Subcategory */

$this->title = 'Update Subcategory: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Subcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subcategory-update">


    <?= $this->render('_form', [
        'model' => $model,
        'cat' =>$cat,
    ]) ?>

</div>
