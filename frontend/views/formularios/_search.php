<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\FormulariosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="formularios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'identificacion') ?>

    <?= $form->field($model, 'direccion') ?>

    <?= $form->field($model, 'ocupacion') ?>

    <?php // echo $form->field($model, 'correo') ?>

    <?php // echo $form->field($model, 'identificacion_url') ?>

    <?php // echo $form->field($model, 'certificado_titulo_url') ?>

    <?php // echo $form->field($model, 'pagado') ?>

    <?php // echo $form->field($model, 'pago_total') ?>

    <?php // echo $form->field($model, 'procesado') ?>

    <?php // echo $form->field($model, 'email_notification') ?>

    <?php // echo $form->field($model, 'transaction_id') ?>

    <?php // echo $form->field($model, 'pdf_url') ?>

    <?php // echo $form->field($model, 'date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
