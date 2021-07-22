<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\rating\StarRating;

$data['fecha_entrega'] = 0;
$data['calidad_materiales'] = 0;
$data['entrega_areas_sociales'] = 0;
$data['entrega_design'] = 0;

$model = \frontend\models\StarsRatingCount::find()->where(['desarrollador_id' => $id])->all();

if (count($model) > 0) {
    $count = count($model);
    foreach ($model as $m) {
        $data['fecha_entrega'] += $m->fecha_entrega;
        $data['calidad_materiales'] += $m->calidad_materiales;
        $data['entrega_areas_sociales'] += $m->entrega_areas_sociales;
        $data['entrega_design'] += $m->entrega_design;
    }

    $data['fecha_entrega'] = $data['fecha_entrega'] / $count;
    $data['calidad_materiales'] = $data['calidad_materiales'] / $count;
    $data['entrega_areas_sociales'] = $data['entrega_areas_sociales'] / $count;
    $data['entrega_design'] = $data['entrega_design'] / $count;
}

?>
<style>
    .rating-container .caption, .theme-krajee-uni .clear-rating{
        display: none;
    }
    .theme-krajee-uni .star, .theme-krajee-uni svg {
        font-size: 18px !important;
    }
</style>

<div class="col-md-12 bg-white">
    <?php if (!$data['fecha_entrega']): ?>
       <!-- <p class="text-center mt-2 mt-5"> No se han realizado valoraciones. </p>  -->
    <?php else: ?>
        <div class="row align-items-center">
            <div class="col-md-4 div-label">
                <label class="font-weight-normal text-darkblue font-9">Fecha de entrega</label>
            </div>
            <div class="col-md-8 pl-md-0">

                <?= StarRating::widget([
                    'name' => 'fecha_entrega1',
                    'value' => $data["fecha_entrega"],
                    'pluginOptions' => [
                        'displayOnly' => true,
                        'theme' => 'krajee-uni',
                        'filledStar' => '<i class="fas fa-star"></i>',
                        'emptyStar' => '<i class="far fa-star"></i>',
                        ]
                    ]);
                 ?> 
            </div>
            <div class="col-md-4 div-label">
                <label class="font-weight-normal text-darkblue font-9">Calidad de materiales </label>
            </div>
            <div class="col-md-8 pl-md-0">
                <?= StarRating::widget([
                    'name' => 'calidad_materiales1',
                    'value' => $data["calidad_materiales"],
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
            <div class="col-md-4 div-label">
                <label class="font-weight-normal text-darkblue font-9">Entrega de areas sociales  </label>
            </div>
            <div class="col-md-8 pl-md-0">
                <?= StarRating::widget([
                    'name' => 'entrega_areas_sociales1',
                    'value' => $data["entrega_areas_sociales"],
                    'pluginOptions' => [
                        'displayOnly' => true,
                        'theme' => 'krajee-uni',
                        'filledStar' => '<i class="fas fa-star"></i>',
                        'emptyStar' => '<i class="far fa-star"></i>',
                        ]
                    ]);
                 ?> 
            </div>
            <div class="col-md-4 div-label">
                <label class="font-weight-normal text-darkblue font-9">Entrega según diseño original </label>
            </div>
            <div class="col-md-8 pl-md-0">
                 <?= StarRating::widget([
                    'name' => 'entrega_design1',
                    'value' => $data["entrega_design"],
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

