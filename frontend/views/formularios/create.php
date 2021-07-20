<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Formularios */

$this->title = 'Create Formularios';
$this->params['breadcrumbs'][] = ['label' => 'Formularios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formularios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
