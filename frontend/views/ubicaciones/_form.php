<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Ubicaciones */
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

    			<?= $form->field($model, 'nombre')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3 mt-3', 'placeholder' =>'NOMBRE'])->label(false) ?>

                <div class="col-md-10 p-0 div-lab">
                    <?= $form->field($model, 'portada')->fileInput(['required' => 'required'])->label($model->portada ? "CARGADA" : "SUBIR FOTO DE PORTADA") ?>
                </div>

			    <div class="form-group text-center">
			        <?= Html::submitButton('Guardar', ['class' => 'btn btn-warning rounded-3']) ?>
			    </div>

			    <?php ActiveForm::end(); ?>
    		</div>
    	</div>	
    </div>

</div>
