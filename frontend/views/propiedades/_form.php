<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>

<div class="">

    <div class="row">
        <div class="col-md-8 m-auto bg-white rounded-2">
            <div class="p-5">
                <div class="bg-blue pl-4 pr-4 pt-2 pb-2 mb-4">
                    <h2 class="text-white h5 m-0">PUBLICAR PROPIEDADES</h2>
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
                        <?= $form->field($model, 'habitaciones')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'CANTIDAD DE BAÑOS'])->label(false) ?>
                    </div>

                    <div class="col-md-12">
                        <?= $form->field($model, 'titulo_publicacion')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'TITULO DE PUBLICACIÓN'])->label(false) ?>
                    </div>

                    <div class="col-md-6">
                        <?= $form->field($model, 'impuestos', ['inputOptions'=>['class'=>'custom-radio-checkbox']])->checkbox([]); ?>
                        <?= $form->field($model, 'cargas_gramabes', ['inputOptions'=>['class'=>'form-control input-lg']])->checkbox([]); ?>
                        <?= $form->field($model, 'deslinde', ['inputOptions'=>['class'=>'form-control input-lg']])->checkbox([]); ?>
                    </div>
                    <div class="col-md-6">
                         <?php echo $form->field($model, 'riezgo_id')->dropDownList(ArrayHelper::map(\frontend\models\Ubicaciones::find()->orderBy(['nombre'=>SORT_ASC])->all(), 'id', 'nombre'),['prompt'=>'CALIFICACIÓN DE RIEZGO', 'class' => 'input-r pl-4 pr-4 pt-3 pb-3'])->label(false); ?>
                        
                        <div class="pl-2">
                            <?= $form->field($model, 'certificado_titulo', ['inputOptions'=>['class'=>'form-control input-lg']])->checkbox([]); ?>
                        </div>
                    </div>
               </div>

                <?= $form->field($model, 'detalles')->textarea(['class' => 'form-control bg-gray pl-4 pr-4 pt-3 pb-3 textarea', 'rows' => '4', 'placeholder' => 'DETALLES DE LA PROPIEDAD']) ?>


                <div class="row">
                    <div class="col-md-3">
                        <?= $form->field($model, 'foto_1')->fileInput(['maxlength' => true, 'required' => 'required', 'id' => 'inputfile']) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'foto_2')->fileInput(['maxlength' => true, 'required' => 'required', 'id' => 'inputfile2']) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'foto_3')->fileInput(['maxlength' => true, 'required' => 'required', 'id' => 'inputfile3']) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'foto_4')->fileInput(['maxlength' => true, 'required' => 'required', 'id' => 'inputfile4']) ?>
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

