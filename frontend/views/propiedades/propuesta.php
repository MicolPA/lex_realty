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
                <?php if ($type == 1): ?>
                <div class="bg-warning-2 text-center pl-4 pr-4 pt-2 pb-2 mb-5">
                    <h2 class="text-white h5 m-0">Llene los siguientes datos para enviar su propuesta</h2>
                </div>
                <?php else: ?>
                <div class="bg-blue text-center pl-4 pr-4 pt-2 pb-2 mb-5">
                    <h2 class="text-white h5 m-0">Llene los siguientes datos para enviar formulario de contacto</h2>
                </div>
                <?php endif ?>
                <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off'],], ['enctype' => 'multipart/form-data']); ?>

                <div class="form-group">
                   	<?= $form->field($model, 'name')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'NOMBRE Y APELLIDO', 'required' => 'required'])->label(false) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'email')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'CORREO', 'required' => 'required'])->label(false) ?>
                </div>

                <div class="form-group mb-0">
                    <?= $form->field($model, 'subject')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'TELEFONO', 'required' => 'required'])->label(false) ?>
                </div>

                <div class="rounded-left-2 bg-blue w-95 m-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="pt-5 pl-4">
                                <p class="text-blue font-14 m-0"><span class="font-weight-bold">PROPIEDAD:</span> <?= $propiedad->titulo_publicacion ?></p>
                                <p class="text-blue font-14 m-0"><span class="font-weight-bold">UBICACIÓN:</span> <?= $propiedad->ubicacion->nombre ?></p>
                                <p class="text-blue font-14"><span class="font-weight-bold">METRAJE:</span> <?= $propiedad->metros ?> MT2</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <img src="/frontend/web/<?= $propiedad->foto_1 ?>" width="100%" height="220px">
                        </div>
                    </div>
                </div>

                <?php if ($type == 1): ?>
                    <div class="row">
                        <div class="col-md-6 mt-4 pb-2">
                            <?= $form->field($model, 'body')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'MONTO OFERTADO', 'required' => 'required', 'type' => 'number'])->label(false) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'forma_pago')->label('')->radioList(['CASH' => 'CASH', 'FINANCIAMIENTO' => 'FINANCIAMIENTO'], ['class' => 'mt-3', 'required' => 'required']); ?>
                        </div>
                        <div class="col-md-6 mb-5 pb-2">
                            <?= $form->field($model, 'monto_reserva')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'MONTO RESERVA:', 'required' => 'required', 'type' => 'number'])->label(false) ?>
                        </div>
                        <div class="col-md-6 mb-5 pb-2">
                            <?= $form->field($model, 'fecha_cierre')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'FECHA DE CIERRE:', 'required' => 'required', 'type' => 'date', 'id' => 'fecha'])->label(false) ?>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-md-12 mt-4 mb-5 pb-2">
                        <?= $form->field($model, 'body')->textarea(['class' => 'form-control bg-gray pl-4 pr-4 pt-3 pb-3 textarea mt-3', 'rows' => '5', 'placeholder' => 'COMENTARIOS'])->label(false) ?>
                    </div>
                <?php endif ?>


                <div class="row">
                    <div class="col-md-6 m-auto text-center" style="margin-bottom: -4rem !important">
                        <?= Html::submitButton('ENVIAR FORMULARIO', ['class' => 'btn btn-warning text-white rounded-3 pr-4 pl-4', 'style' => 'border-radius:50px']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>

    </div>

</div>

