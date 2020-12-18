<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PropiedadesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="propiedades-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'titulo_publicacion') ?>

    <?= $form->field($model, 'tipo_propiedad') ?>

    <?= $form->field($model, 'ubicacion_id') ?>

    <?= $form->field($model, 'habitaciones') ?>

    <?php // echo $form->field($model, 'baños') ?>

    <?php // echo $form->field($model, 'riezgo_id') ?>

    <?php // echo $form->field($model, 'impuestos') ?>

    <?php // echo $form->field($model, 'cargas_gramabes') ?>

    <?php // echo $form->field($model, 'deslinde') ?>

    <?php // echo $form->field($model, 'certificado_titulo') ?>

    <?php // echo $form->field($model, 'detalles') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'fecha_publicacion') ?>

    <?php // echo $form->field($model, 'foto_1') ?>

    <?php // echo $form->field($model, 'foto_2') ?>

    <?php // echo $form->field($model, 'foto_3') ?>

    <?php // echo $form->field($model, 'foto_4') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
