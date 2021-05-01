<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'PROPUESTA';
?>
<style>
    .mb-0 .form-group{
        margin-bottom: 0px;
    }
    label{
        font-size: 14px;
        font-weight: 400;
    }
    .wrap{
        background: #f1f2f4 !important
    }
</style>
<div class="container mt-5">

    <div class="row bg-white p-4 pt-5">
        <div class="col-md-4 pr-md-3">
            <img src="/frontend/web/<?= $agente->photo_url ?>" width='100%' class='pr-md-5 mb-5'>
        </div>
        <div class="col-md-6">

            <p class="h2 mt-xs-3" style="font-weight: 200 !important;letter-spacing: 5px;"><?= $agente->first_name . ' ' . $agente->last_name ?></p>
            <p class="h5 text-blue font-weight-bold"><?= $agente->inmobiliaria ?></p>
            <p class="mt-4 text-muted"><?= $agente->descripcion ?></p>
           
        </div>

    </div>

    <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off'],], ['enctype' => 'multipart/form-data']); ?>
    <div class="row bg-white p-4">
        <div class="col-md-6">
            <div class=" w-95 m-auto">
                <div class="bg-blue3 row">
                    <div class="col-md-6">
                        <div class="pt-5 pl-4">
                            <p class="text-white font-14 m-0"><span class="font-weight-bold">PROPIEDAD:</span> <?= $propiedad->titulo_publicacion ?></p>
                            <p class="text-white font-14 m-0"><span class="font-weight-bold">UBICACIÓN:</span> <?= $propiedad->ubicacion->nombre ?></p>
                            <p class="text-white font-14"><span class="font-weight-bold">METRAJE:</span> <?= $propiedad->metros ?> MT2</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <img src="/frontend/web/<?= $propiedad->foto_1 ?>" width="100%" height="180px">
                    </div>
                </div>
            </div>
            <?php if ($type == 1): ?>
                <div class="row">
                    <div class="col-md-6 mt-4 pb-2">
                        <?= $form->field($model, 'body')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'MONTO OFERTADO', 'required' => 'required', 'type' => 'number'])->label(false) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'forma_pago')->label('')->radioList(['CASH' => 'CASH', 'FINANCIAMIENTO' => 'FINANCIAMIENTO'], ['class' => 'mt-3', 'required' => 'required']); ?>
                    </div>
                    <div class="col-md-6 mb-5 pb-2">
                        <?= $form->field($model, 'monto_reserva')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'MONTO RESERVA:', 'required' => 'required', 'type' => 'number'])->label(false) ?>
                    </div>
                    <div class="col-md-6 mb-5 pb-2">
                        <?= $form->field($model, 'fecha_cierre')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'FECHA DE CIERRE:', 'required' => 'required', 'type' => 'date', 'id' => 'fecha'])->label(false) ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="form-group mt-4 pb-2">
                    <?= $form->field($model, 'body')->textarea(['class' => 'form-control bg-gray pl-4 pr-4 pt-3 textarea mt-3', 'rows' => '5', 'placeholder' => 'COMENTARIOS'])->label(false) ?>
                </div>
            <?php endif ?>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'name')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'NOMBRE Y APELLIDO', 'required' => 'required'])->label(false) ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'email')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'CORREO', 'required' => 'required'])->label(false) ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'subject')->textInput(['class' => 'input-r pl-4 pr-4 pt-3 pb-3', 'placeholder' =>'TELEFONO', 'required' => 'required'])->label(false) ?>
            </div>

            <div class="form-group m-auto pt-4 text-center">
                <?= Html::submitButton('ENVIAR FORMULARIO', ['class' => 'btn btn-pastel-blue text-white rounded-3 pr-4 pl-4', 'style' => 'border-radius:50px']) ?>
            </div>
        </div>

    </div>
    <?php ActiveForm::end(); ?>

    <div class="row mb-5 mt-5">
        <?php if (count($listado_propiedades) > 0): ?>
            <?php foreach ($listado_propiedades as $p): ?>
                <div class="col-md-3 mt-4 mb-2">
                    <a href="/frontend/web/propiedades/ver?id=<?= $p->id ?>" class="no-link text-blue">
                        <div class="bg-white">
                            <div class="contenedor w-100">
                                <div style="width: 100%;height: 150px;background-image: url('/frontend/web/<?= $p->foto_1 ?>');background-size:cover;background-position:center;"></div>
                                <div class="bg-darkblue pt-1 pb-1">
                                    <p class="text-center text-white font-12 mb-0" style="font-family: 'Benton-book', Arial, sans-serif"><?= mb_strtoupper($p->ubicacion->nombre) ?></p>
                                </div>
                               
                            </div>

                            <div class="pl-3">
                                <div class="row mb-2">
                                    
                                    <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 pr-0" style="height:60px">
                                        <p class="m-0 mt-3 text-blue font-weight-light title-cards-f"><?= $p->titulo_publicacion ?></p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 pl-0">
                                        <?php if ($p->riezgo_id == 1): ?>
                                            <div class="bg-gray2 text-center pt-2 pb-2">
                                                <p class="mb-0 text-white h5 font-weight-light">A+</p>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>
                                

                                <p class="font-weight-bold font-18 mt-2 mb-2">US$<?= number_format($p->precio, 0) ?></p>
                                <p class="text-muted m-0 font-12 mb-2">
                                     <img src="/frontend/web/images/bed-icon.png" width='35px'> <?= $p->habitaciones ?>
                                     <img src="/frontend/web/images/shower-icon.png" width='35px'> <?= $p->baños ?>
                                     <img src="/frontend/web/images/size-icon.png" width='35px'> <?= number_format($p->metros, 2) ?> M<sup>2</sup>
                                    
                                </p>
                                
                                
                            </div>

                        </div>
                    </a>
                </div>  
                    
            <?php endforeach ?>
            <div class="col-md-12 text-center pt-5">
                <a href="<?= Yii::$app->request->referrer ?>" class="btn btn-warning rounded-3 text-white pr-5 pl-5">REGRESAR</a>        
            </div>

        <?php endif ?>        
    </div>

</div>

