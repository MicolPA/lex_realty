<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'PROPUESTA';
?>
<style>
    .mb-0 .form-group{
        margin-bottom: 0px;
    }
    label{
        font-size: 14px;
        font-weight: 400;
    }
</style>
<div class="container mt-5">

    <div class="row">
        <div class="col-md-8 m-auto bg-white rounded-2">
            <div class="p-5">
                <div class="bg-pastel-blue text-center pl-4 pr-4 pt-2 pb-2 mb-3">
                    <h2 class="text-white h5 m-0">Llene los siguientes datos para enviar su propuesta</h2>
                </div>
                <div class="col-md-12">
                    <img class=" mb-3" src="/frontend/web/<?= $oficial->photo_url ?>" width="300px">
                </div>
                <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off'],], ['enctype' => 'multipart/form-data']); ?>

                <div class="form-group">
                   	<?= $form->field($model, 'name')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'NOMBRE Y APELLIDO', 'required' => 'required'])->label(false) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'subject')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'TELÉFONO', 'required' => 'required'])->label(false) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'email')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'UBICACIÓN', 'required' => 'required'])->label(false) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'body')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'MONTO A FINANCIAR', 'required' => 'required'])->label(false) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'fecha_cierre')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'TIEMPO DE FINANCIAMIENTO:', 'required' => 'required'])->label(false) ?>
                </div>

                <div class="row">
                    <div class="col-md-6 m-auto text-center" style="margin-bottom: -4rem !important">
                        <?= Html::submitButton('ENVIAR FORMULARIO', ['class' => 'btn btn-pastel-blue text-white rounded-3 pr-4 pl-4', 'style' => 'border-radius:50px']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>

    </div>

    <div style="height: 100px;background: #d5d9de"></div>

</div>

