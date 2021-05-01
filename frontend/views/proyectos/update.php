<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Proyectos */

$this->title = 'Update Proyectos: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container pt-4">

    <?= $this->render('_form', [
        'model' => $model,
        'title' => 'EDITAR PROYECTO',
    ]) ?>

</div>
