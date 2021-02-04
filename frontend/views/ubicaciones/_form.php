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
    		<h1 class="text-white mt-4 mb-3"><?= $title ?></h1>
    	</div>

    	<div class="col-md-8 m-auto">
    		<div class="card p-4">
    			<?php $form = ActiveForm::begin(); ?>

    			<?= $form->field($model, 'nombre')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3 mt-3', 'placeholder' =>'NOMBRE'])->label(false) ?>

			    <div class="form-group text-center">
			        <?= Html::submitButton('Guardar', ['class' => 'btn btn-warning rounded-3']) ?>
			    </div>

			    <?php ActiveForm::end(); ?>
    		</div>
    	</div>	
    </div>

</div>
