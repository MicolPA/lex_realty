<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Propiedades */

$this->title = 'CREAR PROPIEDADES';
$this->params['breadcrumbs'][] = ['label' => 'Propiedades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container pt-5">

    <!-- <h1 class="h4 text-white text-center"><?//= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'extras' => $extras,
    ]) ?>

</div>
