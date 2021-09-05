<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Img_m */

$this->title = 'Create Img M';
$this->params['breadcrumbs'][] = ['label' => 'Img Ms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="img-m-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
