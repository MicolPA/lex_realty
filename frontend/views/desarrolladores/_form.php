<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>
<style>
	.div-lab label{
		width: 100%;
	}
</style>
<div class="mb-5">

    <div class="row">
        <div class="col-md-8 m-auto bg-white rounded-2">
            <div class="p-5">
                <div class="bg-darkblue pl-4 pr-4 pt-2 pb-2 mb-4">
                    <h2 class="text-white h5 m-0"><?= $title ?></h2>
                </div>
                <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off'],], ['enctype' => 'multipart/form-data']); ?>
               <div class="row">

                    <div class="col-md-12">
                        <?= $form->field($model, 'nombre')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'NOMBRE', 'required' => 'required'])->label(false) ?>
                    </div>

               </div>

                <div class="row">
                    <div class="col-md-6 div-lab">
                        <?= $form->field($model, 'portada')->fileInput([!$model->portada ? 'required' : '' => !$model->portada ? 'required' : ''])->label($model->portada ? "PORTADA CARGADA" : "SUBIR PORTADA") ?>
                    </div>
                    <div class="col-md-6 div-lab">
                        <?= $form->field($model, 'logo')->fileInput([!$model->logo ? 'required' : '' => !$model->logo ? 'required' : ''])->label($model->logo ? "LOGO CARGADO" : "SUBIR LOGO") ?>
                    </div>
                    
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

</div>

