<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
// use yii\bootstrap\ActiveForm;
use yii\widgets\ActiveForm;


$this->title = 'CREANDO USUARIO';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container">

    <div class="row">
        <div class="col-md-8 m-auto">
            <h3 class="h4 mt-4 mb-4 title-light text-darkblue text-uppercase"><?= $title ?></h3>
        </div>

        <div class="col-md-8 m-auto">
            <div class="card p-4">
                <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off'],], ['enctype' => 'multipart/form-data']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'input-r pl-4 pr-4 pt-3 pb-3 mt-3', 'placeholder' => 'USUARIO'])->label(false) ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'class' => 'input-r pl-4 pr-4 pt-3 pb-3 mt-3', 'type' => 'email', 'placeholder' => 'CORREO'])->label(false) ?>

                <?= $form->field($model, 'first_name')->textInput(['autofocus' => true, 'class' => 'input-r pl-4 pr-4 pt-3 pb-3 mt-3', 'placeholder' => 'NOMBRE'])->label(false) ?>

                <?= $form->field($model, 'last_name')->textInput(['autofocus' => true, 'class' => 'input-r pl-4 pr-4 pt-3 pb-3 mt-3', 'placeholder' => 'APELLIDO'])->label(false) ?>
                <?= $form->field($model, 'celular')->textInput(['autofocus' => true, 'class' => 'input-r pl-4 pr-4 pt-3 pb-3 mt-3', 'placeholder' => 'CELULAR'])->label(false) ?>

                <?= $form->field($model, 'inmobiliaria')->textInput(['autofocus' => true, 'class' => 'input-r pl-4 pr-4 pt-3 pb-3 mt-3', 'placeholder' => 'INMOBILIARIA'])->label(false) ?>

                 <?= $form->field($model, 'descripcion')->textarea(['class' => 'form-control bg-gray pl-4 pr-4 pt-3 pb-3 textarea mt-3', 'rows' => '4', 'placeholder' => 'DESCRIPCIÓN'])->label(false) ?>

                <div class="form-group">
                    <input type="password" name="password" class="input-r pl-4 pr-4 pt-3 pb-3 mt-3" placeholder="Contraseña" value="000000000">
                </div>

                <div class="col-md-2 p-0 div-lab">
                    <?= $form->field($model, 'photo_url')->fileInput([])->label($model->photo_url ? "CARGADA" : "SUBIR FOTO") ?>
                </div>
                <div class="form-group text-center">
                    <?= Html::submitButton('Guardar', ['class' => 'btn btn-warning rounded-3']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>  
    </div>

</div>

