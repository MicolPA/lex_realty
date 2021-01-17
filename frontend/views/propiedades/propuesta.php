<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'PROPUESTA';
?>

<div class="container mt-5">

    <div class="row">
        <div class="col-md-8 m-auto bg-white rounded-2">
            <div class="p-5">
                <div class="bg-warning text-center pl-4 pr-4 pt-2 pb-2 mb-4">
                    <h2 class="text-white h5 m-0">Llene los siguientes datos para enviar su propuesta</h2>
                </div>
                <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off'],], ['enctype' => 'multipart/form-data']); ?>

                <div class="form-group">
                   	<?= $form->field($model, 'name')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'NOMBRE Y APELLIDO'])->label(false) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'email')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'CORREO'])->label(false) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'subject')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'TELEFONO'])->label(false) ?>
                </div>


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

