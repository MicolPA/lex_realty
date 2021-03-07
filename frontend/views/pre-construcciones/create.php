<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Propiedades */

$this->title = 'CREAR PRE-CONSTRUCCIONES';
$this->params['breadcrumbs'][] = ['label' => 'PRE-CONSTRUCCIONES', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container pt-5">

    <!-- <h1 class="h4 text-white text-center"><?//= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'galeria' => $galeria,
        // 'extras' => $extras,
        'title' => 'PUBLICAR PRE-CONSTRUCCIONES',
    ]) ?>

</div>
