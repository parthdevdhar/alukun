<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Img_m */

$this->title = 'Update Img M: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Img Ms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="img-m-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
