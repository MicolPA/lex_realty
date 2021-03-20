<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TasasHipotecarias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container">

    <div class="row">
        <div class="col-md-8 m-auto">
            <h2 class="mt-4 mb-3 text-darkblue text-uppercase title-light"><?= $title ?></h2>
        </div>

        <div class="col-md-8 m-auto">
            <div class="card p-4">
                <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off'],], ['enctype' => 'multipart/form-data']); ?>
                <?= $form->field($model, 'nombre_banco')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'tasa')->textInput() ?>

                <?= $form->field($model, 'duracion')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

                <div class="col-md-10 p-0 div-lab">
                    <?= $form->field($model, 'photo_url')->fileInput([!$model->photo_url ? 'required' : '' => !$model->photo_url ? 'required' : ''])->label($model->photo_url ? "CARGADA" : "SUBIR FOTO DE LA ENTIDAD") ?>
                </div>

                <div class="form-group text-center">
                    <?= Html::submitButton('Guardar', ['class' => 'btn btn-pastel-blue text-white rounded-3']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>  
    </div>

</div>

