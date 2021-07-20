<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Anuncios */
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

                <?= $form->field($model, 'nombre')->textInput([]) ?>

                <div class="col-md-10 p-0 div-lab">
                    <?= $form->field($model, 'imagen_url')->fileInput([!$model->imagen_url ? 'required' : '' => !$model->imagen_url ? 'required' : '', 'accept' => 'image/*'])->label($model->imagen_url ? "CARGADA" : "SUBIR IMAGEN") ?>
                </div>

                <div class="form-group text-center">
                    <?= Html::submitButton('Guardar', ['class' => 'btn btn-pastel-blue text-white rounded-3']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>  
    </div>

</div>


