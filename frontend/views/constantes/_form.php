<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = "Editar constante $model->nombre";
?>

<div class="container">

    <div class="row">
        <div class="col-md-8 m-auto">
            <h3 class="h4 mt-4 mb-4 title-light text-darkblue text-uppercase"><?= $this->title ?></h3>
        </div>

        <div class="col-md-8 m-auto">
            <div class="card p-4">
                <?php $form = ActiveForm::begin(); ?>

                <?php if (!$model->nombre): ?>
                    <?= $form->field($model, 'nombre')->textInput(['class' => 'form-control bg-gray pl-4 pr-4 pt-3 pb-3 mt-3', 'placeholder' => 'NOMBRE'])->label(false) ?>
                    
                <?php endif ?>

                <?php if ( $model->nombre == 'precio_debida_diligencia' ): ?>
                    <?= $form->field($model, 'contenido')->textInput(['class' => 'form-control bg-gray pl-4 pr-4 pt-3 pb-3 mt-3', 'placeholder' => 'PRECIO'])->label(false) ?>
                <?php else: ?>  
                    <?= $form->field($model, 'contenido')->textarea(['class' => 'form-control bg-gray pl-4 pr-4 pt-3 pb-3 textarea mt-3', 'rows' => '4', 'placeholder' => 'CONTENIDO'])->label(false) ?>
                <?php endif ?>

                <div class="form-group text-center">
                    <?= Html::submitButton('Guardar', ['class' => 'btn btn-pastel-blue text-white rounded-3 pr-5 pl-5']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>  
    </div>

</div>
