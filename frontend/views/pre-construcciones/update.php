<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\PreConstrucciones */

$this->title = 'Update Pre Construcciones: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pre Construcciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container pt-5">

    <!-- <h1 class="h4 text-white text-center"><?//= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'galeria' => $galeria,
        // 'extras' => $extras,
        'title' => 'EDITAR PRE-CONSTRUCCIÓN',
    ]) ?>

</div>
