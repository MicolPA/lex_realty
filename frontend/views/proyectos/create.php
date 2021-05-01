<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Proyectos */

$this->title = 'Create Proyectos';
$this->params['breadcrumbs'][] = ['label' => 'Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container pt-5">

    <?= $this->render('_form', [
        'model' => $model,
        'title' => 'CREAR PROYECTO',
    ]) ?>

</div>
