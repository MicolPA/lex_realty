<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Titulos */

$this->title = 'Update Titulos: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Titulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->nombre]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="titulos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'title' => Html::encode($this->title),
    ]) ?>

</div>
