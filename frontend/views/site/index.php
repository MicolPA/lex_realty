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

    @media (min-width: 992px){
        .col-lg-3 {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 24.5%;
        }
    }

    select option{
        font-size: 14px !important;
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
                                    <?php echo $form->field($model, 'ubicacion_id')->dropDownList(ArrayHelper::map(\frontend\models\Ubicaciones::find()->orderBy(['nombre'=>SORT_ASC])->all(), 'id', 'nombre'),['class' => 'form-control select-center h5 mt-2 mb-0 border-0 font-weight-bold text-secondary ubicacion font-10'])->label(false); ?>
                                </div>

                                <div class="col-md-3">
                                     <?php echo $form->field($model, 'tipo_propiedad')->dropDownList(ArrayHelper::map(\frontend\models\PropiedadesTipo::find()->orderBy(['nombre'=>SORT_ASC])->all(), 'id', 'nombre'),['class' => 'form-control select-center h5 mt-2 mb-0 border-0 font-weight-bold text-secondary tipo'])->label(false); ?>
                                </div>

                                <div class="col-md-3">
                                    <?php echo $form->field($model, 'riezgo_id')->dropDownList(array('1' => 'A+'),['class' => 'form-control select-center h5 mt-2 mb-0 border-0 font-weight-bold text-secondary calificacion'])->label(false); ?>
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
                                    <?php echo $form->field($model2, 'ubicacion_id')->dropDownList(ArrayHelper::map(\frontend\models\Ubicaciones::find()->orderBy(['nombre'=>SORT_ASC])->all(), 'id', 'nombre'),['class' => 'form-control select-center h5 mt-2 mb-0 border-0 font-weight-bold text-secondary ubicacion'])->label(false); ?>
                                </div>

                                <div class="col-md-4">
                                    <?php echo $form->field($model2, 'riezgo_id')->dropDownList(array('1' => 'A+'),['prompt'=>'Calificación', 'class' => 'form-control select-center h5 mt-2 mb-0 border-0 font-weight-bold text-secondary calificacion'])->label(false); ?>
                                </div>

                                <div class="col-md-3 text-right">
                                    <?= Html::submitButton('Buscar <i class="fas fa-search ml-1 fa-sm"></i>', ['class' => 'btn bg-light-gray text-default rounded-3 mt-2 pr-4 pl-4', 'style' => 'border-radius:50px']) ?>
                                </div>

                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>

                    <div class="m-auto text-center pl-4 pr-4 d-sm-none">
                        <a href="javascript:showSearch(1)" class="pt-2 pb-2 pr-4 pl-4 text-white border-0 bg-pastel-blue btn-block">PROPIEDADES</a>
                        <a href="javascript:showSearch(2)" class="pt-2 pb-2 pr-3 pl-3 text-white border-0 bg-blue-2 btn-block">PRE-CONSTRUCCIONES</a>
                    </div>
                    <div class="m-auto text-center pl-4 pr-4 d-xs-none">
                        <a href="javascript:showSearch(1)" class="pt-2 pb-2 pr-4 pl-4 text-white border-0 bg-pastel-blue">PROPIEDADES</a>
                        <a href="javascript:showSearch(2)" class="pt-2 pb-2 pr-3 pl-3 text-white border-0 bg-blue-2">PRE-CONSTRUCCIONES</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php if (count($entradas) > 0): ?>
    <div class="bg-white">
        <div class="container">
            <div class="row pt-5 pb-5">
                <div class="col-md-12">
                    <h2 class="h4 title-light text-center text-blue mb-5">PUBLICACIONES</h2>
                </div>
                <?php foreach ($entradas as $entrada): ?>
                    <div class="col-md-3 mb-4">
                        <a href="<?= $entrada->url ?>" class='no-link'>
                            <img src="/frontend/web/<?= $entrada->photo_url ?>" class='w-100 rounded' height='160px'>
                            <p class="font-weight-bold mt-4 text-dark"><?= $entrada->titulo ?></p>
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
<?php endif ?>
<?php if ($anuncios): ?>
    <div class="bg-white text-center pt-3 pb-3" style="min-height: 300px">
        <?php foreach ($anuncios as $a): ?>
            <img src="/frontend/web/<?= $a->photo_url ?>" alt="">
        <?php endforeach ?>
    </div>
<?php endif ?>
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
                                <div class="contenedor w-100">
                                    <div style="width: 100%;height: 150px;background-image: url('/frontend/web/<?= $m->foto_1 ?>');background-size:cover;background-position:center;"></div>
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
                                    
                                    <div class="detalles" style="height: 80px;font-family: 'Benton-book', Arial, sans-serif">

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
<div class="pt-4 pb-4 bg-light-2">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 text-center mb-3">
                <h1 class="h4 title-light text-darkblue">PRE-CONSTRUCCIÓN</h1>
            </div>
        </div>
        <div class="row bg-light-2">
            <?php foreach ($pre_construcciones as $m): ?>
                <a href="/frontend/web/pre-construcciones/ver?id=<?= $m->id ?>" class="no-link text-blue">
                    <div class="col-md-4 mt-4 mb-2 p-4">
                        <div class="bg-white">
                            <div class="contenedor">
                                <img src="/frontend/web/<?= $m->foto_1 ?>" width='100%' style="height:200px">
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
                                

                                <span class="span-price pl-2 pr-2 font-12">PRECIO DESDE</span>
                                <p class="font-weight-bold h4 mt-0 mb-2">US$<?= number_format($m->precio, 0) ?></p>
                               <!--  <p class="text-muted m-0 font-12 mb-2">
                                     <img src="/frontend/web/images/bed-icon.png" width='35px'> <?= $m->habitaciones ?>
                                     <img src="/frontend/web/images/shower-icon.png" width='35px'> <?= $m->baños ?>
                                     <img src="/frontend/web/images/size-icon.png" width='35px'> <?= number_format($m->metros, 2) ?> M<sup>2</sup>
                                    
                                </p> -->
                                
                                <div class="detalles" style="height: 230px;font-family: 'Benton-book', Arial, sans-serif">

                                    <?php $check = $m->certificado_titulo ? "dot-full-2.png" : 'dot.png' ?>
                                    <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> CERTIFICADO DE TITULO</p>

                                    <?php $check = $m->cargas_gramabes ? "dot-full-2.png" : 'dot.png' ?>
                                    <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> LIBRES DE CARGAS Y GRAVÁMENES</p>
                                    <?php $check = $m->deslinde ? "dot-full-2.png" : 'dot.png' ?>
                                    <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> DESLINDE</p>

                                    <?php $check = $m->permisos_municipales ? "dot-full-2.png" : 'dot.png' ?>
                                    <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> PERMISOS MUNICIPALES</p>
                                    <?php $check = $m->permiso_ambiental ? "dot-full-2.png" : 'dot.png' ?>
                                    <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> PERMISO AMBIENTAL</p>

                                    <?php $check = $m->objeccion_ministerio_turismo ? "dot-full-2.png" : 'dot.png' ?>
                                    <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> NO OBJECIÓN DEL MINISTERIO DE TURISMO</p>

                                    <?php $check = $m->permiso_obras_publicas ? "dot-full-2.png" : 'dot.png' ?>
                                    <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> PERMISO DE OBRAS PUBLICAS</p>

                                    <?php $check = $m->confortur ? "dot-full-2.png" : 'dot.png' ?>
                                    <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> CONFORTUR</p>
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
    <div class="container d-xs-none">
        <div class="row mt-5">
            <div class="col-md-12 text-center mb-3">
                <h1 class="h4 title-light text-darkblue mb-4">BUSCAR POR CIUDAD</h1>
            </div>
           <!--  <div class="col-md-1">
                <a class="carousel-control-prev" href="#carouselExampleControls22" role="button" data-slide="prev">
                    <i class="fas fa-chevron-left text-blue fa-2x font-weight-bold float-left"></i>
                    <span class="sr-only">Previous</span>
                </a> 
            </div> -->

            <div class="col-md-12">
                <div id="carouselExampleControls22" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php $count = 0; $count2 = 0; ?>
                        <?php foreach ($ubicaciones as $m): ?>
                            <?php 
                                $count++; $count2++;
                                $total = \frontend\models\Propiedades::find()->where(['ubicacion_id' => $m->id])->count();
                            ?>
                            <?php if ($count == 1 or $count2 == 1): ?>
                                <div class="carousel-item row <?= $count==1 ? 'active' : '' ?>">
                            <?php endif ?>
                                    <a class="no-link text-dark" href="/frontend/web/propiedades?ubicacion=<?= $m->id ?>">
                                        <div class="col-md-3 col-lg-3" style="display: inline-block;">
                                            <img src="/frontend/web/<?= $m->portada ?>" class="w-100" style="height:130px">
                                            <p class="text-center contenedor_total"><span class="rounded-pill btn-pastel-blue pr-4 pl-4 text-white font-weight-light"><?= $total ?> Propiedades</span></p>
                                            <p class="text-center text-darkblue font-weight-bold font-14 mb-0 mt-4" style="font-family: 'Benton-book', Arial, sans-serif">
                                                <?= mb_strtoupper($m->nombre) ?>
                                             </p>
                                        </div>
                                    </a>
                            <?php if ($count2 == 4):  ?>
                                <?php $count2=0 ?>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>

                      
                </div>
            </div>

            </div>

            <!-- <div class="col-md-1">
                <a class="carousel-control-next" href="#carouselExampleControls22" role="button" data-slide="next">
                    <i class="fas fa-chevron-right text-blue fa-2x font-weight-bold float-left"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div> -->

            
            
        </div>
    </div>
    <div class="container d-sm-none">
        <div class="row mt-5">
            <div class="col-md-12 text-center mb-3">
                <h1 class="h4 title-light text-darkblue mb-4">BUSCAR POR CIUDAD</h1>
            </div>

            <div class="col-md-12 col-xs-12">
                <div id="carouselExampleControls23" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php $count = 0; $count2 = 0; ?>
                        <?php foreach ($ubicaciones as $m): ?>
                            <?php 
                                $count++;
                                $total = \frontend\models\Propiedades::find()->where(['ubicacion_id' => $m->id])->count();
                             ?>
                            <div class="carousel-item <?= $count==1 ? 'active' : '' ?>">
                                <a class="no-link text-dark" href="/frontend/web/propiedades?ubicacion%5B<?= $m->id ?>=on">
                                    <img src="/frontend/web/<?= $m->portada ?>" class="w-100" style="height:160px">
                                    <p class="text-center contenedor_total"><span class="rounded-pill btn-pastel-blue pr-4 pl-4 text-white font-weight-light">23<?= $total ?> Propiedades</span></p>
                                    <p class="text-center text-darkblue font-weight-bold font-14 mb-0 mt-2" style="font-family: 'Benton-book', Arial, sans-serif">
                                        <?= mb_strtoupper($m->nombre) ?>
                                     </p>
                                </a>
                            </div>    
                        <?php endforeach ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls23" role="button" data-slide="prev" style="background: #444; top: -64px; padding-top: 70px; margin: 0px;bottom: 28px;">
                        <i class="fas fa-chevron-left text-white fa-2x font-weight-bold float-left"></i>
                        <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
                        <span class="sr-only">Previous</span>
                    </a> 
                    <a class="carousel-control-next" href="#carouselExampleControls23" role="button" data-slide="next" style="background: #444; top: -64px; padding-top: 70px; margin: 0px;bottom: 28px;">
                        <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
                        <i class="fas fa-chevron-right text-white fa-2x font-weight-bold float-left"></i>
                        <span class="sr-only">Next</span>
                    </a>

                      
                </div>
            </div>

            </div>

           
            
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 pt-5 pr-5 pb-5">
                <p class="text-secondary font-14">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe ipsam, maiores. Temporibus explicabo magni possimus non natus repellat fuga consectetur recusandae dolorum atque laboriosam itaque harum animi dicta accusamus ea nesciunt, illum unde, voluptatem ullam eos. Hic quaerat libero dolor ea dolorem autem modi nostrum cum, voluptatibus quidem expedita reprehenderit sequi fugiat voluptates harum, earum! At ex porro quos, modi, atque laboriosam vitae incidunt animi cumque nisi, ullam necessitatibus debitis.
                </p>

                <p class="text-secondary font-14">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe ipsam, maiores. Temporibus explicabo magni possimus non natus repellat fuga consectetur recusandae dolorum atque laboriosam itaque harum animi dicta accusamus ea nesciunt, illum unde, voluptatem ullam eos. Hic quaerat libero dolor ea dolorem autem modi nostrum cum, voluptatibus quidem expedita reprehenderit sequi fugiat voluptates harum, earum! At ex porro quos, modi, atque laboriosam vitae incidunt animi cumque nisi, ullam necessitatibus debitis.
                </p>

            </div>
        </div>
    </div>
</div>
