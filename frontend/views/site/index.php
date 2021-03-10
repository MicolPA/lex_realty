<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Propiedades';
?>
<style>
    @media (min-width: 1200px){
        .container, .container-sm, .container-md, .container-lg, .container-xl {
            max-width: 1140px !important;
        }
    }
</style>
<div class="container-fluid">
    <div class="row" style=";">
        <div class="col-md-12 p-0" style="">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item home-carousel-item active">
                  <img src="/frontend/web/images/slide.jpg" class="d-block w-100" height="600px">
                </div>
                <div class="carousel-item home-carousel-item">
                  <img src="/frontend/web/images/slide-2.jpg" class="d-block w-100" height="600px">
                </div>
                <div class="carousel-item home-carousel-item">
                  <img src="/frontend/web/images/slide-3.jpg" class="d-block w-100" height="600px">
                </div>
              </div>
             <!--  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a> -->
            </div>
            <div class="bg-darkblue" style="height: 600px;position: absolute;top: 0px;width: 100%;opacity: 0.8">
            </div>
            <div style="margin: auto !important;position: absolute;top: 80px;width: 100%">
                <div class="col-md-7 mt-lg-5 div-buscador-home m-auto">
                    <div class="pt-4 pr-4 pl-4 pb-2 div_propiedades">
                        <?php $form = ActiveForm::begin(['action' => 'propiedades', 'method' => 'GET', 'options' => ['autocomplete' => 'off'],], ['enctype' => 'multipart/form-data']); ?>
                        <div class="container">
                            <div class="row p-lg-0 bg-white div-buscador pl-5 pr-5 text-center">
                                <div class="col-md-3 text-center">
                                    <?php echo $form->field($model, 'ubicacion_id')->dropDownList(ArrayHelper::map(\frontend\models\Ubicaciones::find()->orderBy(['nombre'=>SORT_ASC])->all(), 'id', 'nombre'),['prompt'=>'Ubicación', 'class' => 'form-control select-center h5 mt-2 mb-0 border-0 font-weight-bold text-secondary'])->label(false); ?>
                                </div>

                                <div class="col-md-3">
                                     <?php echo $form->field($model, 'tipo_propiedad')->dropDownList(ArrayHelper::map(\frontend\models\PropiedadesTipo::find()->orderBy(['nombre'=>SORT_ASC])->all(), 'id', 'nombre'),['prompt'=>'Tipo', 'class' => 'form-control select-center h5 mt-2 mb-0 border-0 font-weight-bold text-secondary'])->label(false); ?>
                                </div>

                                <div class="col-md-3">
                                    <?php echo $form->field($model, 'riezgo_id')->dropDownList(array('1' => 'A+'),['prompt'=>'Calificación', 'class' => 'form-control select-center h5 mt-2 mb-0 border-0 font-weight-bold text-secondary'])->label(false); ?>
                                </div>

                                <div class="col-md-3 text-right">
                                    <?= Html::submitButton('Buscar <i class="fas fa-search ml-1 fa-sm"></i>', ['class' => 'btn bg-light-gray text-default rounded-3 mt-2 pr-4 pl-4', 'style' => 'border-radius:50px']) ?>
                                </div>

                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                    <div class="pt-4 pr-4 pl-4 pb-2 div_pre_construccion" style="display: none">
                        <?php $form = ActiveForm::begin(['action' => 'pre-construcciones', 'method' => 'GET', 'options' => ['autocomplete' => 'off'],], ['enctype' => 'multipart/form-data']); ?>
                        <div class="container">
                            <div class="row p-lg-0 bg-white div-buscador pl-5 pr-5 text-center">
                                <div class="col-md-5 text-center">
                                    <?php echo $form->field($model2, 'ubicacion_id')->dropDownList(ArrayHelper::map(\frontend\models\Ubicaciones::find()->orderBy(['nombre'=>SORT_ASC])->all(), 'id', 'nombre'),['prompt'=>'Ubicación', 'class' => 'form-control select-center h5 mt-2 mb-0 border-0 font-weight-bold text-secondary'])->label(false); ?>
                                </div>

                                <div class="col-md-4">
                                    <?php echo $form->field($model2, 'riezgo_id')->dropDownList(array('1' => 'A+'),['prompt'=>'Calificación', 'class' => 'form-control select-center h5 mt-2 mb-0 border-0 font-weight-bold text-secondary'])->label(false); ?>
                                </div>

                                <div class="col-md-3 text-right">
                                    <?= Html::submitButton('Buscar <i class="fas fa-search ml-1 fa-sm"></i>', ['class' => 'btn bg-light-gray text-default rounded-3 mt-2 pr-4 pl-4', 'style' => 'border-radius:50px']) ?>
                                </div>

                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>

                    <div class="text-center">
                        <a href="javascript:showSearch()" class="m-auto pt-2 pb-2 pr-4 pl-4 text-white border-0" style="background: #44546b">PROPIEDADES</a>
                        <a href="javascript:showSearch()" class="m-auto pt-2 pb-2 pr-3 pl-3 text-white border-0" style="background: #638eb0">PRE-CONSTRUCCIONES</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="bg-white" style="height: 400px"></div>
<div class="pt-4 pb-4" style=";background-image: url(/frontend/web/images/slide-oscuro.jpg);background-repeat: no-repeat;background-size: cover;margin-top: -3rem">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 text-center mb-3">
                <h1 class="h4 title-light text-white">PROPIEDADES A+</h1>
            </div>
        </div>
        <div class="row bg-light-2">
            <?php foreach ($propiedades as $m): ?>
                    <a href="/frontend/web/propiedades/ver?id=<?= $m->id ?>" class="no-link text-blue">
                        <div class="col-md-3 mt-4 mb-2">
                            <div class="bg-white">
                                <div class="contenedor">
                                    <img src="/frontend/web/<?= $m->foto_1 ?>" width='100%' style="height:150px">
                                    <div class="bg-darkblue pt-1 pb-1">
                                        <p class="text-center text-white font-12 mb-0" style="font-family: 'Benton-book', Arial, sans-serif"><?= mb_strtoupper($m->ubicacion->nombre) ?></p>
                                    </div>
                                   
                                </div>

                                <div class="pl-3">
                                    <div class="row mb-2">
                                        
                                        <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 pr-0" style="height:60px">
                                            <p class="m-0 mt-3 text-blue font-weight-light title-cards-f"><?= $m->titulo_publicacion ?></p>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 pl-0">
                                            <?php if ($m->riezgo_id == 1): ?>
                                                <div class="bg-gray2 text-center pt-2 pb-2">
                                                    <p class="mb-0 text-white h5 font-weight-light">A+</p>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    

                                    <p class="font-weight-bold font-18 mt-2 mb-2">US$<?= number_format($m->precio, 0) ?></p>
                                    <p class="text-muted m-0 font-12 mb-2">
                                         <img src="/frontend/web/images/bed-icon.png" width='35px'> <?= $m->habitaciones ?>
                                         <img src="/frontend/web/images/shower-icon.png" width='35px'> <?= $m->baños ?>
                                         <img src="/frontend/web/images/size-icon.png" width='35px'> <?= number_format($m->metros, 2) ?> M<sup>2</sup>
                                        
                                    </p>
                                    
                                    <div class="detalles" style="height: 60px;font-family: 'Benton-book', Arial, sans-serif">

                                        <?php $check = $m->certificado_titulo ? "dot-full-2.png" : 'dot.png' ?>
                                        <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> CERTIFICADO DE TITULO</p>

                                        <?php $check = $m->impuestos ? "dot-full-2.png" : 'dot.png' ?>
                                        <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> IMPUESTOS AL DÍA</p>

                                        <?php $check = $m->cargas_gramabes ? "dot-full-2.png" : 'dot.png' ?>
                                        <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> LIBRES DE CARGAS GRABAMES</p>
                                        <?php $check = $m->deslinde ? "dot-full-2.png" : 'dot.png' ?>
                                        <p class="m-0 small text-gray"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> DESLINDE</p>
                                    </div>
                                    

                                    
                                    <a href="/frontend/web/propiedades/agente?id=<?= $m->id ?>" class="btn-block bg-blue text-white text-center p-0 h5 pt-1 pb-1" style="visibility: hidden;">CONTACTAR UN AGENTE <i class="fas fa-phone-alt ml-3"></i></a>

                                </div>

                            </div>
                        </div>      
                    </a>
            <?php endforeach ?>
        </div>
    </div>
</div>
<div class="pt-4 pb-4 bg-white">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 text-center mb-3">
                <h1 class="h4 title-light text-darkblue">PRE-CONSTRUCCIÓN</h1>
            </div>
        </div>
        <div class="row bg-light-2">
            <?php foreach ($pre_construcciones as $m): ?>
                <a href="/frontend/web/propiedades/ver?id=<?= $m->id ?>" class="no-link text-blue">
                    <div class="col-md-3 mt-4 mb-2">
                        <div class="bg-white">
                            <div class="contenedor">
                                <img src="/frontend/web/<?= $m->foto_1 ?>" width='100%' style="height:150px">
                                <div class="bg-darkblue pt-1 pb-1">
                                    <p class="text-center text-white font-12 mb-0" style="font-family: 'Benton-book', Arial, sans-serif"><?= mb_strtoupper($m->ubicacion->nombre) ?></p>
                                </div>
                               
                            </div>

                            <div class="pl-3">
                                <div class="row mb-2">
                                    
                                    <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 pr-0" style="height:60px">
                                        <p class="m-0 mt-3 text-blue font-weight-light title-cards-f"><?= $m->titulo_publicacion ?></p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 pl-0">
                                        <?php if ($m->riezgo_id == 1): ?>
                                            <div class="bg-gray2 text-center pt-2 pb-2">
                                                <p class="mb-0 text-white h5 font-weight-light">A+</p>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>
                                

                                <p class="font-weight-bold font-18 mt-2 mb-2">US$<?= number_format($m->precio, 0) ?></p>
                               <!--  <p class="text-muted m-0 font-12 mb-2">
                                     <img src="/frontend/web/images/bed-icon.png" width='35px'> <?= $m->habitaciones ?>
                                     <img src="/frontend/web/images/shower-icon.png" width='35px'> <?= $m->baños ?>
                                     <img src="/frontend/web/images/size-icon.png" width='35px'> <?= number_format($m->metros, 2) ?> M<sup>2</sup>
                                    
                                </p> -->
                                
                                <div class="detalles" style="height: 60px;font-family: 'Benton-book', Arial, sans-serif">

                                    <?php $check = $m->certificado_titulo ? "dot-full-2.png" : 'dot.png' ?>
                                    <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> CERTIFICADO DE TITULO</p>

                                    <?php $check = $m->permisos_municipales ? "dot-full-2.png" : 'dot.png' ?>
                                    <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> PERMISOS MUNICIPALES</p>

                                    <?php $check = $m->cargas_gramabes ? "dot-full-2.png" : 'dot.png' ?>
                                    <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> LIBRES DE CARGAS GRABAMES</p>
                                    <?php $check = $m->deslinde ? "dot-full-2.png" : 'dot.png' ?>
                                    <p class="m-0 small text-gray"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> DESLINDE</p>
                                </div>
                                

                                
                                <a href="/frontend/web/propiedades/agente?id=<?= $m->id ?>" class="btn-block bg-blue text-white text-center p-0 h5 pt-1 pb-1" style="visibility: hidden;">CONTACTAR UN AGENTE <i class="fas fa-phone-alt ml-3"></i></a>

                            </div>

                        </div>
                    </div>      
                </a>
            <?php endforeach ?>
        </div>
    </div>
</div>

<div class="pt-4 pb-4" style="background: #d5d8dd">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 text-center mb-3">
                <h1 class="h4 title-light text-darkblue">BUSCAR POR CIUDAD</h1>
            </div>
        </div>
        <div class="row">
            <?php foreach ($ubicaciones as $m): ?>
                <div class="col-md-3 mt-4 mb-2">
                    <a href="/frontend/web/propiedades/?ubicacion%5B<?= $m->id ?>=on" class="no-link text-blue">
                        <img src="/frontend/web/<?= $m->portada ?>" width='100%' style="height:150px">
                        <p class="text-center text-darkblue font-weight-bold font-14 mb-0" style="font-family: 'Benton-book', Arial, sans-serif"><?= mb_strtoupper($m->nombre) ?></p>
                    </a>
                </div>      
            <?php endforeach ?>
        </div>
    </div>
</div>
