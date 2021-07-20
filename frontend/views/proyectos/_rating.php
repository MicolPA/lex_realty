<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\rating\StarRating;

?>
<?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off']]); ?>
<div class="col-md-12 mt-5">
    <p class="h3 font-weight-lighter">Valoraciones</p>
    <hr>
    <?php if (!$ratings_total['fecha_entrega']): ?>
       <p class="text-left"> No se han realizado valoraciones. </p> 
    <?php else: ?>
        <div class="row align-items-center">
            <div class="col-md-2 div-label">
                <label class="font-weight-normal text-darkblue">Fecha de entrega</label>
            </div>
            <div class="col-md-2 pl-md-0">

                <?= StarRating::widget([
                    'name' => 'fecha_entrega1',
                    'value' => $ratings_total["fecha_entrega"],
                    'pluginOptions' => [
                        'displayOnly' => true,
                        'theme' => 'krajee-uni',
                        'filledStar' => '<i class="fas fa-star"></i>',
                        'emptyStar' => '<i class="far fa-star"></i>',
                        ]
                    ]);
                 ?> 
            </div>
            <div class="col-md-2 div-label">
                <label class="font-weight-normal text-darkblue">Calidad de materiales </label>
            </div>
            <div class="col-md-2 pl-md-0">
                <?= StarRating::widget([
                    'name' => 'calidad_materiales1',
                    'value' => $ratings_total["calidad_materiales"],
                    'pluginOptions' => [
                        'displayOnly' => true,
                        'theme' => 'krajee-uni',
                        'filledStar' => '<i class="fas fa-star"></i>',
                        'emptyStar' => '<i class="far fa-star"></i>',
                        ]
                    ]);
                 ?> 
            </div>
        </div>
        <div class="row align-items-center">
            
        </div>
        <div class="row align-items-center">
            <div class="col-md-2 div-label">
                <label class="font-weight-normal text-darkblue">Entrega de areas sociales  </label>
            </div>
            <div class="col-md-2 pl-md-0">
                <?= StarRating::widget([
                    'name' => 'entrega_areas_sociales1',
                    'value' => $ratings_total["entrega_areas_sociales"],
                    'pluginOptions' => [
                        'displayOnly' => true,
                        'theme' => 'krajee-uni',
                        'filledStar' => '<i class="fas fa-star"></i>',
                        'emptyStar' => '<i class="far fa-star"></i>',
                        ]
                    ]);
                 ?> 
            </div>
            <div class="col-md-2 div-label">
                <label class="font-weight-normal text-darkblue">Entrega según diseño original </label>
            </div>
            <div class="col-md-2 pl-md-0">
                 <?= StarRating::widget([
                    'name' => 'entrega_design1',
                    'value' => $ratings_total["entrega_design"],
                    'pluginOptions' => [
                        'displayOnly' => true,
                        'theme' => 'krajee-uni',
                        'filledStar' => '<i class="fas fa-star"></i>',
                        'emptyStar' => '<i class="far fa-star"></i>',
                        ]
                    ]);
                 ?>  
            </div>
        </div>
        
    <?php endif ?>
</div>

    <div class="col-md-12 mt-5">
        <p class="h3 font-weight-lighter">Tu valoración</p>
        <hr>
        <div class="row align-items-center">
            <div class="col-md-2 div-label">
                <label class="font-weight-normal text-darkblue">Fecha de entrega</label>
            </div>
            <div class="col-md-2 pl-md-0">
                <?= StarRating::widget(['model' => $rating, 'attribute' => 'fecha_entrega', 
                        'language' => 'es',
                        'pluginOptions' => [
                            'theme' => 'krajee-uni',
                            'filledStar' => '&#x2605;',
                            'emptyStar' => '&#x2606;',
                            'language' => 'es',
                            'filledStar' => '<i class="fas fa-star"></i>',
                            'emptyStar' => '<i class="far fa-star"></i>',
                            
                        ]
                    ]);
                 ?> 
            </div>
            <div class="col-md-2 div-label">
                <label class="font-weight-normal text-darkblue">Calidad de materiales </label>
            </div>
            <div class="col-md-2 pl-md-0">
                <?= StarRating::widget(['model' => $rating, 'attribute' => 'calidad_materiales', 
                        'language' => 'es',
                        'pluginOptions' => [
                            'theme' => 'krajee-uni',
                            'filledStar' => '&#x2605;',
                            'emptyStar' => '&#x2606;',
                            'language' => 'es',
                            'filledStar' => '<i class="fas fa-star"></i>',
                            'emptyStar' => '<i class="far fa-star"></i>',
                            
                        ]
                    ]);
                 ?> 
            </div>
        </div>
        <div class="row align-items-center">
            
        </div>
        <div class="row align-items-center">
            <div class="col-md-2 div-label">
                <label class="font-weight-normal text-darkblue">Entrega de areas sociales  </label>
            </div>
            <div class="col-md-2 pl-md-0">
                <?= StarRating::widget(['model' => $rating, 'attribute' => 'entrega_areas_sociales', 
                        'language' => 'es',
                        // 'required' => 'required',
                        'pluginOptions' => [
                            'theme' => 'krajee-uni',
                            'filledStar' => '&#x2605;',
                            'emptyStar' => '&#x2606;',
                            'language' => 'es',
                            'filledStar' => '<i class="fas fa-star"></i>',
                            'emptyStar' => '<i class="far fa-star"></i>',
                            
                        ]
                    ]);
                 ?> 
            </div>
            <div class="col-md-2 div-label">
                <label class="font-weight-normal text-darkblue">Entrega según diseño original </label>
            </div>
            <div class="col-md-2 pl-md-0">
                <?= StarRating::widget(['model' => $rating, 'attribute' => 'entrega_design', 
                        'language' => 'es',
                        'pluginOptions' => [
                            'theme' => 'krajee-uni',
                            'filledStar' => '&#x2605;',
                            'emptyStar' => '&#x2606;',
                            'language' => 'es',
                            'filledStar' => '<i class="fas fa-star"></i>',
                            'emptyStar' => '<i class="far fa-star"></i>',
                            
                        ]
                    ]);
                 ?> 
            </div>
        </div>
        <div class="row align-items-center mt-3">
            <div class="col-md-4">
                <?= $form->field($rating, 'email')->textInput(['required' => 'required', 'class' => 'input-r pl-4 pr-4 pt-2 pb-2', 'placeholder' =>'Correo', 'type' => 'email'])->label(false) ?>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?= Html::submitButton('Enviar valoración', ['class' => 'btn btn-success text-white rounded-3 pr-5 pl-5 font-weight-bold', 'style' => 'border-radius:50px']) ?>
                </div>
            </div>
        </div>
        
    </div>
<?php ActiveForm::end(); ?>