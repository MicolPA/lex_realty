<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\PreConstrucciones */

$this->title = 'Update Pre Construcciones: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pre Construcciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pre-construcciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
