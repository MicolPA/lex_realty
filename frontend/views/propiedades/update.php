<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Propiedades */

$this->title = 'Editar propiedad';
$this->params['breadcrumbs'][] = ['label' => 'Propiedades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container pt-5">

    <?= $this->render('_form', [
        'model' => $model,
        'extras' => $extras,
        'title' => 'EDITAR PROPIEDAD',
    ]) ?>

</div>
