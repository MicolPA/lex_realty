<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>
<style>
    .div-lab label{
        padding-left: 1rem !important;
        padding-right: 1rem !important;
        font-size: 10px;
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

                <div class="form-group">
                     <?php echo $form->field($model, 'tipo_propiedad')->dropDownList(ArrayHelper::map(\frontend\models\PropiedadesTipo::find()->orderBy(['nombre'=>SORT_ASC])->all(), 'id', 'nombre'),['prompt'=>'TIPO DE PROPIEDAD', 'class' => 'input-r pl-4 pr-4 pt-3 pb-3'])->label(false); ?>
                </div>

                <div class="form-group">
                     <?php echo $form->field($model, 'ubicacion_id')->dropDownList(ArrayHelper::map(\frontend\models\Ubicaciones::find()->orderBy(['nombre'=>SORT_ASC])->all(), 'id', 'nombre'),['prompt'=>'UBICACIÓN', 'class' => 'input-r pl-4 pr-4 pt-3 pb-3'])->label(false); ?>
                </div>

               <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'habitaciones')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'CANTIDAD DE HABITACIONES'])->label(false) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'baños')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'CANTIDAD DE BAÑOS'])->label(false) ?>
                    </div>

                    <div class="col-md-12">
                        <?= $form->field($model, 'titulo_publicacion')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'TITULO DE PUBLICACIÓN'])->label(false) ?>
                    </div>

                    <div class="col-md-6 my-checkbox">
                        <?= $form->field($model, 'impuestos', ['inputOptions'=>['class'=>'custom-control-input']])->checkbox([]); ?>
                        <?= $form->field($model, 'cargas_gramabes', ['inputOptions'=>['class'=>'form-control input-lg']])->checkbox([]); ?>
                        <?= $form->field($model, 'deslinde', ['inputOptions'=>['class'=>'form-control input-lg']])->checkbox([]); ?>
                            <?= $form->field($model, 'certificado_titulo', ['inputOptions'=>['class'=>'form-control input-lg']])->checkbox([]); ?>
                    </div>
                    <div class="col-md-6">

                       <!--  <?php //echo $form->field($model, 'riezgo_id')->dropDownList(ArrayHelper::map(\frontend\models\PropiedadesRiesgo::find()->all(), 'id', 'nombre'),['prompt'=>'CALIFICACIÓN DE RIESGO', 'class' => 'input-r pl-4 pr-4 pt-3 pb-3'])->label(false); ?> -->
                        <?= $form->field($model, 'precio')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'PRECIO', 'required' => 'required'])->label(false) ?>
                        <div class="pl-2">
                        </div>
                    </div>
               </div>

               <div class="row">
                    <div class="col-md-12">
                        <h6 class="font-weight-bold">Área</h6>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'metros')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'id' => 'metros', 'placeholder' =>'METROS'])->label(false) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'pies')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'id' => 'pies', 'placeholder' =>'PIES'])->label(false) ?>
                    </div>
               </div>

               <div class="row check-box-container my-checkbox">
                    <div class="col-md-12">
                        <h5 class="font-weight-bold">Características adicionales</h5>
                    </div>
                   <div class="col-md-6">
                        <?= $form->field($extras, 'aire_acondicionado', ['inputOptions'=>['class'=>'custom-radio-checkbox']])->checkbox([]); ?>
                        <?= $form->field($extras, 'balcon', ['inputOptions'=>['class'=>'custom-radio-checkbox']])->checkbox([]); ?>
                        <?= $form->field($extras, 'cocina', ['inputOptions'=>['class'=>'custom-radio-checkbox']])->checkbox([]); ?>
                        <?= $form->field($extras, 'lavadora', ['inputOptions'=>['class'=>'custom-radio-checkbox']])->checkbox([]); ?>
                        <?= $form->field($extras, 'nevera', ['inputOptions'=>['class'=>'custom-radio-checkbox']])->checkbox([]); ?>
                        <?= $form->field($extras, 'piscina', ['inputOptions'=>['class'=>'custom-radio-checkbox']])->checkbox([]); ?>
                        <?= $form->field($extras, 'vista_campo_golf', ['inputOptions'=>['class'=>'custom-radio-checkbox']])->checkbox([]); ?>
                   </div>
                   <div class="col-md-6">
                        <?= $form->field($extras, 'amueblado', ['inputOptions'=>['class'=>'custom-radio-checkbox']])->checkbox([]); ?>
                        <?= $form->field($extras, 'centro_comercial', ['inputOptions'=>['class'=>'custom-radio-checkbox']])->checkbox([]); ?>
                        <?= $form->field($extras, 'estufa', ['inputOptions'=>['class'=>'custom-radio-checkbox']])->checkbox([]); ?>
                        <?= $form->field($extras, 'marmol', ['inputOptions'=>['class'=>'custom-radio-checkbox']])->checkbox([]); ?>
                        <?= $form->field($extras, 'parqueo', ['inputOptions'=>['class'=>'custom-radio-checkbox']])->checkbox([]); ?>
                        <?= $form->field($extras, 'seguridad_24_hrs', ['inputOptions'=>['class'=>'custom-radio-checkbox']])->checkbox([]); ?>
                   </div>
               </div>

                <?= $form->field($model, 'detalles')->textarea(['class' => 'form-control bg-gray pl-4 pr-4 pt-3 pb-3 textarea mt-3', 'rows' => '4', 'placeholder' => 'DETALLES DE LA PROPIEDAD'])->label(false) ?>

                <div class="row">
                    <div class="col-md-2 p-0 div-lab">
                        <?= $form->field($model, 'foto_1')->fileInput([!$model ? "required" : "" => !$model ? "required" : "", 'id' => 'inputfile', 'value' => $model->foto_1])->label("PORTADA") ?>
                    </div>
                    <div class="col-md-2 p-0 div-lab">
                        <?= $form->field($model, 'foto_2')->fileInput([!$model ? "required" : "" => !$model ? "required" : "", 'id' => 'inputfile2'])->label("SUBIR") ?>
                    </div>
                    <div class="col-md-2 p-0 div-lab">
                        <?= $form->field($model, 'foto_3')->fileInput([!$model ? "required" : "" => !$model ? "required" : "", 'id' => 'inputfile3'])->label("SUBIR") ?>
                    </div>
                    <div class="col-md-2 p-0 div-lab">
                        <?= $form->field($model, 'foto_4')->fileInput([!$model ? "required" : "" => !$model ? "required" : "", 'id' => 'inputfile4'])->label("SUBIR") ?>
                    </div>
                    <div class="col-md-2 p-0 div-lab">
                        <?= $form->field($galeria, 'foto_5')->fileInput([])->label($galeria->foto_5 ? "CARGADA" : "SUBIR") ?>
                    </div>
                    <div class="col-md-2 p-0 div-lab">
                        <?= $form->field($galeria, 'foto_6')->fileInput([])->label($galeria->foto_6 ? "CARGADA" : "SUBIR") ?>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-md-2 p-0 div-lab">
                        <?= $form->field($galeria, 'foto_7')->fileInput([])->label($galeria->foto_7 ? "CARGADA" : "SUBIR") ?>
                    </div>
                    <div class="col-md-2 p-0 div-lab">
                        <?= $form->field($galeria, 'foto_8')->fileInput([])->label($galeria->foto_8 ? "CARGADA" : "SUBIR") ?>
                    </div>
                    <div class="col-md-2 p-0 div-lab">
                        <?= $form->field($galeria, 'foto_9')->fileInput([])->label($galeria->foto_9 ? "CARGADA" : "SUBIR") ?>
                    </div>
                    <div class="col-md-2 p-0 div-lab">
                        <?= $form->field($galeria, 'foto_10')->fileInput([])->label($galeria->foto_10 ? "CARGADA" : "SUBIR") ?>
                    </div>
                    <div class="col-md-2 p-0 div-lab">
                        <?= $form->field($galeria, 'foto_11')->fileInput([])->label($galeria->foto_11 ? "CARGADA" : "SUBIR") ?>
                    </div>
                    <div class="col-md-2 p-0 div-lab">
                        <?= $form->field($galeria, 'foto_12')->fileInput([])->label($galeria->foto_12 ? "CARGADA" : "SUBIR") ?>
                    </div>
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

