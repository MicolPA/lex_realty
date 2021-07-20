<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TransactionDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaction-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payer_first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payer_last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payer_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payer_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'invoice_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'procesado')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
