<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\rating\StarRating;

?>
<style>
    .theme-krajee-uni .star, .theme-krajee-uni svg{
        font-size: 15px !important;
    }
</style>
<div class="container p-5">
    <div class="col-md-12 mt-5">
    
        <?php if (!$ratings_total['fecha_entrega']): ?>
           <p class="text-left"> No se han realizado valoraciones. </p> 
        <?php else: ?>
            <div class="row align-items-center bg-gray">
                <div class="col-md-3 div-label">
                    <label class="font-12 font-weight-normal text-uppercase text-gray">Fecha de entrega</label>
                </div>
                <div class="col-md-2 pl-md-0">
                    <?= StarRating::widget([
                        'name' => 'fecha_entrega1',
                        'value' => $ratings_total["fecha_entrega"],
                        'pluginOptions' => [
                            'displayOnly' => true,
                            'theme' => 'krajee-uni',
                            'filledStar' => '<i class="fas fa-star"></i>',
                            'emptyStar' => '<i class="fas fa-star"></i>',
                            ]
                        ]);
                     ?> 
                </div>
                <div class="col-md-3 div-label">
                    <label class="font-12 font-weight-normal text-uppercase text-gray">Calidad de materiales </label>
                </div>
                <div class="col-md-2 pl-md-0">
                    <?= StarRating::widget([
                        'name' => 'calidad_materiales1',
                        'value' => $ratings_total["calidad_materiales"],
                        'pluginOptions' => [
                            'displayOnly' => true,
                            'theme' => 'krajee-uni',
                            'filledStar' => '<i class="fas fa-star"></i>',
                            'emptyStar' => '<i class="fas fa-star"></i>',
                            ]
                        ]);
                     ?> 
                </div>
            </div>
            <div class="row align-items-center bg-gray">
                
            </div>
            <div class="row align-items-center bg-gray">
                <div class="col-md-3 div-label">
                    <label class="font-12 font-weight-normal text-uppercase text-gray">Entrega de areas sociales  </label>
                </div>
                <div class="col-md-2 pl-md-0">
                    <?= StarRating::widget([
                        'name' => 'entrega_areas_sociales1',
                        'value' => $ratings_total["entrega_areas_sociales"],
                        'pluginOptions' => [
                            'displayOnly' => true,
                            'theme' => 'krajee-uni',
                            'filledStar' => '<i class="fas fa-star"></i>',
                            'emptyStar' => '<i class="fas fa-star"></i>',
                            ]
                        ]);
                     ?> 
                </div>
                <div class="col-md-3 div-label">
                    <label class="font-12 font-weight-normal text-uppercase text-gray">Entrega según diseño original </label>
                </div>
                <div class="col-md-2 pl-md-0">
                     <?= StarRating::widget([
                        'name' => 'entrega_design1',
                        'value' => $ratings_total["entrega_design"],
                        'pluginOptions' => [
                            'displayOnly' => true,
                            'theme' => 'krajee-uni',
                            'filledStar' => '<i class="fas fa-star"></i>',
                            'emptyStar' => '<i class="fas fa-star"></i>',
                            ]
                        ]);
                     ?>  
                </div>
            </div>

            <div class="row align-items-center bg-gray">
                <div class="col-md-3 div-label">
                    <label class="font-12 font-weight-normal text-uppercase text-gray">Seguimiento durante la contrucción  </label>
                </div>
                <div class="col-md-2 pl-md-0">
                    <?= StarRating::widget([
                        'name' => 'seguimiento_construccion',
                        'value' => $ratings_total["seguimiento_construccion"],
                        'pluginOptions' => [
                            'displayOnly' => true,
                            'theme' => 'krajee-uni',
                            'filledStar' => '<i class="fas fa-star"></i>',
                            'emptyStar' => '<i class="fas fa-star"></i>',
                            ]
                        ]);
                     ?> 
                </div>
               
            </div>        
        <?php endif ?>
    </div>

    
</div>

