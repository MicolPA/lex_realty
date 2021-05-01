<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProyectosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyectos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'ubicacion_id') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'foto_1') ?>

    <?php // echo $form->field($model, 'foto_2') ?>

    <?php // echo $form->field($model, 'foto_3') ?>

    <?php // echo $form->field($model, 'foto_4') ?>

    <?php // echo $form->field($model, 'foto_5') ?>

    <?php // echo $form->field($model, 'foto_6') ?>

    <?php // echo $form->field($model, 'foto_7') ?>

    <?php // echo $form->field($model, 'foto_8') ?>

    <?php // echo $form->field($model, 'desarrollador_id') ?>

    <?php // echo $form->field($model, 'date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
