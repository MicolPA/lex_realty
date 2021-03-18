<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Entradas */
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

                <?= $form->field($model, 'titulo')->textInput(['placeholder' => 'TITULO'])->label(false) ?>
                <?= $form->field($model, 'url')->textInput(['placeholder' => 'URL'])->label(false) ?>

    			<?= $form->field($model, 'fecha_publicacion')->textInput(['class' => 'form-control pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'FECHA DE ENTRADA:', 'required' => 'required', 'type' => 'date', 'id' => 'fecha'])->label(false) ?>
                <div class="col-md-10 p-0 div-lab">
                    <?= $form->field($model, 'photo_url')->fileInput([!$model->photo_url ? 'required' : '' => !$model->photo_url ? 'required' : ''])->label($model->photo_url ? "CARGADA" : "SUBIR PORTADA") ?>
                </div>

                <div class="form-group text-center">
                    <?= Html::submitButton('Guardar', ['class' => 'btn btn-warning rounded-3']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>  
    </div>

</div>




