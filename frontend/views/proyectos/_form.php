<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>

<div class="pb-5">

    <div class="row">
        <div class="col-md-8 m-auto bg-white rounded-2">
            <div class="p-5">
                <div class="bg-darkblue pl-4 pr-4 pt-2 pb-2 mb-4">
                    <h2 class="text-white h5 m-0"><?= $title ?></h2>
                </div>
                <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off'],], ['enctype' => 'multipart/form-data']); ?>

                <div class="form-group">
                    <?= $form->field($model, 'nombre')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'TITULO'])->label(false) ?>
                </div>
                <div class="form-group">
                     <?php echo $form->field($model, 'ubicacion_id')->dropDownList(ArrayHelper::map(\frontend\models\Ubicaciones::find()->orderBy(['nombre'=>SORT_ASC])->all(), 'id', 'nombre'),['prompt'=>'UBICACIÓN', 'class' => 'input-r pl-4 pr-4 pt-3 pb-3'])->label(false); ?>
                </div>
                <div class="form-group">
                     <?php echo $form->field($model, 'desarrollador_id')->dropDownList(ArrayHelper::map(\frontend\models\Desarrolladores::find()->orderBy(['nombre'=>SORT_ASC])->all(), 'id', 'nombre'),['prompt'=>'DESARROLLADORA', 'class' => 'input-r pl-4 pr-4 pt-3 pb-3'])->label(false); ?>
                </div>

                


              
                <?= $form->field($model, 'descripcion')->textarea(['class' => 'form-control bg-gray pl-4 pr-4 pt-3 pb-3 textarea mt-3', 'rows' => '4', 'placeholder' => 'DESCRIPCIÓN'])->label(false) ?>

                <div class="row">
                    <div class="col-md-3 p-0 div-lab">
                        <?= $form->field($model, 'foto_1')->fileInput([!$model ? "required" : "" => !$model ? "required" : "", 'id' => 'inputfile', 'value' => $model->foto_1])->label("PORTADA") ?>
                    </div>
                    <div class="col-md-3 p-0 div-lab">
                        <?= $form->field($model, 'foto_2')->fileInput([!$model ? "required" : "" => !$model ? "required" : "", 'id' => 'inputfile2'])->label("SUBIR") ?>
                    </div>
                    <div class="col-md-3 p-0 div-lab">
                        <?= $form->field($model, 'foto_3')->fileInput([!$model ? "required" : "" => !$model ? "required" : "", 'id' => 'inputfile3'])->label("SUBIR") ?>
                    </div>
                    <div class="col-md-3 p-0 div-lab">
                        <?= $form->field($model, 'foto_4')->fileInput([!$model ? "required" : "" => !$model ? "required" : "", 'id' => 'inputfile4'])->label("SUBIR") ?>
                    </div>
                   
                    
                </div>

                <div class="row">
                    <div class="col-md-3 p-0 div-lab">
                        <?= $form->field($model, 'foto_5')->fileInput([])->label($model->foto_5 ? "CARGADA" : "SUBIR") ?>
                    </div>
                    <div class="col-md-3 p-0 div-lab">
                        <?= $form->field($model, 'foto_6')->fileInput([])->label($model->foto_6 ? "CARGADA" : "SUBIR") ?>
                    </div>
                    <div class="col-md-3 p-0 div-lab">
                        <?= $form->field($model, 'foto_7')->fileInput([])->label($model->foto_7 ? "CARGADA" : "SUBIR") ?>
                    </div>
                    <div class="col-md-3 p-0 div-lab">
                        <?= $form->field($model, 'foto_8')->fileInput([])->label($model->foto_8 ? "CARGADA" : "SUBIR") ?>
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

