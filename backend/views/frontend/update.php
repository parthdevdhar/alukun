<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Frontend */

$this->title = 'Update Frontend : ' . $model->filed;
$this->params['breadcrumbs'][] = ['label' => 'Frontends', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

