<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TransactionDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaction-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'state') ?>

    <?= $form->field($model, 'payer_first_name') ?>

    <?= $form->field($model, 'payer_last_name') ?>

    <?= $form->field($model, 'payer_id') ?>

    <?php // echo $form->field($model, 'payer_email') ?>

    <?php // echo $form->field($model, 'country_code') ?>

    <?php // echo $form->field($model, 'invoice_number') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'token') ?>

    <?php // echo $form->field($model, 'procesado') ?>

    <?php // echo $form->field($model, 'date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
