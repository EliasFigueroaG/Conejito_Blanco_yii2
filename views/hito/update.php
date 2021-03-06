<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hito */

$this->title = 'Update Hito: ' . ' ' . $model->id_hito;
$this->params['breadcrumbs'][] = ['label' => 'Hitos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_hito, 'url' => ['view', 'id' => $model->id_hito]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hito-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
