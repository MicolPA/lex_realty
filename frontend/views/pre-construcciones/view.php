<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$fotos = array();
for ($i = 2; $i < 13; $i++) {
    
    if ($i > 4) {
        if ($model->galeria["foto_$i"]) {
            $fotos[] = $model->galeria["foto_$i"];
        }
    }else{
        if ($model["foto_$i"]) {
            $fotos[] = $model["foto_$i"];
        }
    }
}
/* @var $this yii\web\View */
/* @var $model frontend\models\Propiedades */

$this->title = $model->titulo_publicacion;
$this->params['breadcrumbs'][] = ['label' => 'Propiedades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$next_propiedad = \frontend\models\PreConstrucciones::find()->where(['<', 'id', $model->id])->orderBy(['id' => SORT_DESC])->one();
$prev_propiedad = \frontend\models\PreConstrucciones::find()->where(['>', 'id', $model->id])->orderBy(['id' => SORT_ASC])->one();

?>
<!-- <style>
    .swal-modal{
        width:65% !important;
    }
    .swal-icon{
        margin: 0px !important;
    }
    .swal-footer{
        height: 0px !important;
        margin-top: -5rem;
    }
    .swal-footer button{
        background: black;
    }
    
    .swal-icon img{
        width: 100%;
    }
    .swal-modal{
        background: transparent;;
    }
    .swal-overlay--show-modal{
        background: #0c1528;
    }
</style> -->
<div class="container pb-5">

    

    <div class="row mt-5">
        <div class="col-md-9">
            <div class="container">
                <div class="carousel-container position-relative row">
                  
                <!-- <a type="button" class="no-link" data-toggle="modal" data-target="#slideModal"> -->
                    <div id="myCarousel" class="carousel slide first-part w-100" data-ride="carousel">

                      <div class="carousel-inner">
                         
                        <div class="carousel-item active" data-slide-number="0">
                          <img src="/frontend/web/<?= $model->foto_1 ?>" class="d-block w-100 rounded-top" data-remote="/frontend/web/<?= $model->foto_1 ?>" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                        </div>
                        <?php $count = 0; ?>
                        <?php foreach ($fotos as $foto): ?>
                            <?php $count++ ?>
                            <div class="carousel-item" data-slide-number="<?= $count ?>">
                              <img src="/frontend/web/<?= $foto ?>" class="d-block w-100 rounded-top" data-remote="/frontend/web/<?= $foto ?>" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                            </div>
                        <?php endforeach ?>
                        <!-- Button trigger modal -->
                        
                      </div>
                      
                    </div>
                <!-- </a> -->
               <!--  <div class="text-right" style="position: inherit;width: 100%">
                    <button type="button" class="btn btn-outline-dark float-right border-0 mr-2 text-white" data-toggle="modal" data-target="#slideModal" style="margin-top: -3rem;background: #44546b">
                      <i class="fas fa-search-plus mr-1"></i> AMPLIAR IMAGEN
                    </button>
                </div> -->

                <!-- Carousel Navigation -->
                <div id="carousel-thumbs" class="carousel slide bg-white rounded-bottom" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <div class="row mx-0">
                        <div id="carousel-selector-0" class="thumb col-4 col-sm-2 px-1 py-2 selected" data-target="#myCarousel" data-slide-to="0">
                          <img src="/frontend/web/<?= $model->foto_1 ?>" class="img-fluid">
                        </div>
                        <?php $count = 0; ?>
                        <?php foreach ($fotos as $foto): ?>
                            <?php $count++ ?>
                            <?php if ($count <= 5): ?>
                                <div id="carousel-selector-<?= $count ?>" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="<?= $count ?>">
                                  <img src="/frontend/web/<?= $foto ?>" class="img-fluid">
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                        
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="row mx-0">
                        <?php $count = 0; ?>
                        <?php foreach ($fotos as $foto): ?>
                            <?php $count++ ?>
                            <?php if ($count > 5): ?>
                                <div id="carousel-selector-<?= $count ?>" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="<?= $count ?>">
                                  <img src="/frontend/web/<?= $foto ?>" class="img-fluid">
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                        <div class="col-2 px-1 py-2"></div>
                        <div class="col-2 px-1 py-2"></div>
                      </div>
                    </div>
                  </div>
                  <?php if (count($fotos) > 5): ?>
                      <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="<?= count($fotos) > 5 ? "prev" : "" ?>">

                        <i class="fas fa-chevron-left text-blue fa-2x font-weight-bold float-left"></i>
                        <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="<?= count($fotos) > 5 ? "next" : "" ?>">
                        <i class="fas fa-chevron-right text-blue fa-2x font-weight-bold"></i>
                        <span class="sr-only">Next</span>
                      </a>
                  <?php endif ?>
                </div>

                </div> <!-- /row -->
            </div> <!-- /container -->
        </div>
        <div class="col-md-3 rounded bg-white pb-5">
            <div>
                <h1 class="text-white mt-4 mb-4 h6 text-center pt-2 pb-2 rounded font-weight-light bg-darkblue"><?= Html::encode($this->title) ?></h1>

                <div style="width:80%;display: inline-block;">
                    <p class="m-0"><i class="fas fa-map-marker-alt mr-2"></i> <?= $model->ubicacion->nombre ?></p>
                    <p class="m-0"><i class="fas fa-circle-notch"></i> <?= isset($model->tipoPropiedad->nombre) ? $model->tipoPropiedad->nombre : '' ?></p>
                    <p class="m-0">
                        <?php if (isset($model->desarrollador->id)): ?>
                            <a href="/frontend/web/desarrolladores/index?id=<?= $model->desarrollador->id ?>&stars=1" class="no-link text-dark"><i class="fas fa-hard-hat"></i> <?= isset($model->desarrollador->nombre) ? $model->desarrollador->nombre : '' ?></a>
                        <?php endif ?>
                    </p>
                </div>
                <?php if ($model->riezgo_id == 1): ?>
                    <div class="d-inline p-2 float-right text-white text-center" style="background: #44546b;width: 19%">
                        <p class="mb-0 h4 font-weight-lighter  a-plus">A+</p>
                    </div>
                <?php endif ?>
                    <p>
                        <i class="fas fa-calendar-alt"></i> <span class="font-weight-normal">Fecha de entrega:</span>
                        <span class="m-0 font-weight-light"><?= $model->fecha_entrega ?></span>
                    </p>

                <span class="span-price pl-2 pr-2 font-12">PRECIO DESDE</span>
                <p class="font-weight-bold h4 mt-0 mb-2">US$<?= number_format($model->precio, 0) ?></p>

                <!-- <div class="row mt-2">
                    <div class="col-md-6">
                        <div style="position: absolute;"><img src="/frontend/web/images/bed-icon.png" width='40px'></div>
                        <p class="ml-5 pl-2 small m-0 col-xs-6">Habs.</p>
                        <span class="ml-5 pl-2 font-weight-bold font-12"><?//= $model->habitaciones ?></span>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <div style="position: absolute;"><img src="/frontend/web/images/shower-icon.png" width='40px'> </div>
                        <p class="ml-5 pl-2 small m-0">Baños</p>
                        <span class="ml-5 pl-2 font-weight-bold font-12"><?//= $model->baños ?></span>
                    </div>
                    <div class="col-md-6 mt-3 col-xs-6">
                        <div style="position: absolute;"><img src="/frontend/web/images/size-icon.png" width='40px'></div>
                        <p class="ml-5 pl-2 small m-0">Metros</p>
                        <span class="ml-5 pl-2 font-weight-bold font-12"><?//= number_format($model->metros) ?>m</span>
                    </div>
                    <div class="col-md-6 mt-3 col-xs-6">
                        <div style="position: absolute;"><img src="/frontend/web/images/size-icon.png" width='40px'></div>
                        <p class="ml-5 pl-2 small m-0">Pies</p>
                        <span class="ml-5 pl-2 font-weight-bold font-12"><?//= number_format($model->pies, 2) ?></span>
                    </div>
                </div> -->
                <a href="/frontend/web/propiedades/enviar-propuesta?id=<?= $model->id ?>&user_id=<?= $model->user_id ?>&propiedad=0" class="btn-block text-success text-center p-0 pt-2 pb-2 btn btn-outline-success mt-4 h6">ENVIAR PROPUESTA</a>
                <!-- <a href="/frontend/web/propiedades/contactar-agente?id=<?= $model->id ?>&user_id=<?= $model->user_id ?>&type=2&propiedad=0" class="btn-block btn btn-outline-dark text-center p-0 pt-2 pb-2 h6">CONTACTAR UN AGENTE</a> -->
                <a href="/frontend/web/propiedades/ver-dictamen?id=<?= $model->id ?>&propiedad_check=0" class="btn-block text-dark text-center p-0 pt-2 pb-2 btn btn-outline-dark h6" target='_blank'>DESCARGAR DICTAMEN</a>

                <div class="row mt-4">
                    <div class="col-md-6 col-xs-6 col-sm-6 text-right" style="max-width: 50% !important">
                        <div class="bg-white h-100">
                            <?php if ($model->id == $first or !$prev_propiedad): ?>
                                <a href="/frontend/web/pre-construcciones" class="no-link font-weight-bold float-right ml-2">
                                    <span class="font-12" style="color:#aeb1b6">ANTERIOR</span>
                                </a>
                                <div class="w-fit float-right" style="margin-top: 0.15rem !important;">
                                    <a href="/frontend/web/pre-construcciones" class="no-link text-secondary font-weight-bold">
                                        <i class="fal fas fa-chevron-left" style="font-size: 18px;color:#aeb1b6"></i> 
                                    </a>
                                </div>
                                
                            <?php else: ?>
                                <a href="/frontend/web/pre-construcciones/ver?id=<?= $prev_propiedad->id ?>&first=<?= $first ?>" class="no-link font-weight-bold float-right ml-2">
                                    <span class="font-12" style="color:#aeb1b6">ANTERIOR</span>
                                </a>
                                <div class="w-fit float-right" style="margin-top: 0.15rem !important;">
                                    <a href="/frontend/web/pre-construcciones/ver?id=<?= $prev_propiedad->id ?>&first=<?= $first ?>" class="no-link text-secondary font-weight-bold">
                                        <i class="fal fas fa-chevron-left" style="font-size: 18px;color:#aeb1b6"></i> 
                                    </a>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <?php if ($next_propiedad): ?>
                        <div class="col-md-6 col-xs-6 col-sm-6" style="max-width: 50% !important">
                            <div class="bg-white h-100">
                                <a href="/frontend/web/pre-construcciones/ver?id=<?= $next_propiedad->id ?>&first=<?= $first ?>" class="no-link font-weight-bold float-left mr-2">
                                    <span class="font-12" style="color:#aeb1b6">SIGUIENTE</span>
                                </a>
                                <div class="w-fit float-left" style="margin-top: 0.15rem !important;">
                                    <a href="/frontend/web/pre-construcciones/ver?id=<?= $next_propiedad->id ?>&first=<?= $first ?>" class="no-link text-secondary font-weight-bold">
                                        <i class="fal fas fa-chevron-right" style="font-size: 18px;color:#aeb1b6"></i> 
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row mt-4"> 
        <div class="col-md-12 pr-0 pl-sm-none">
            <div class="bg-white rounded p-5">
                <h2 class="h33 mb-3 text-gray2 font-weight-light">Características</h2>

                <div class="row">
                    <div class="col-md-4">
                        <?php $check = $model->certificado_titulo ? "dot-full-2.png" : 'dot.png' ?>
                        <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" class='mr-1' width="17px"> CERTIFICADO DE TITULO</p>

                        <?php $check = $model->cargas_gramabes ? "dot-full-2.png" : 'dot.png' ?>
                        <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" class='mr-1' width="17px"> LIBRES DE CARGAS Y GRAVÁMENES</p>
                        <?php $check = $model->deslinde ? "dot-full-2.png" : 'dot.png' ?>
                        <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" class='mr-1' width="17px"> DESLINDE</p>

                    </div>

                    <div class="col-md-4">
                        <?php $check = $model->permisos_municipales ? "dot-full-2.png" : 'dot.png' ?>
                        <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" class='mr-1' width="17px"> PERMISOS MUNICIPALES</p>

                        <?php $check = $model->permiso_ambiental ? "dot-full-2.png" : 'dot.png' ?>
                        <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" class='mr-1' width="17px"> PERMISO AMBIENTAL</p>

                        <?php $check = $model->objeccion_ministerio_turismo ? "dot-full-2.png" : 'dot.png' ?>
                        <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" class='mr-1' width="17px"> NO OBJECIÓN DEL MINISTERIO DE TURISMO</p>

                    </div>

                    <div class="col-md-4">

                        <?php $check = $model->permiso_obras_publicas ? "dot-full-2.png" : 'dot.png' ?>
                        <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" class='mr-1' width="17px"> PERMISO DE OBRAS PUBLICAS</p>

                        <?php $check = $model->confortur ? "dot-full-2.png" : 'dot.png' ?>
                        <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" class='mr-1' width="17px"> CONFORTUR</p>
                    </div>
                </div>
                
            </div>
        </div>

    </div> -->
    <div class="row mt-4">
        <div class="col-md-12 pr-0 pl-sm-none">
            <div class="bg-white rounded p-5">
                <h2 class="h33 mb-3 text-gray2 font-weight-light">Características</h2>

                <div class="row">
                    <div class="col-md-4">
                        <?php if ($model->certificado_titulo): ?>
                            <p class="m-0 small text-gray mb-2"><i class="fas fa-circle text-success2 mr-2"></i> CERTIFICADO DE TITULO</p>
                            <?php else: ?>
                            <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/dot.png" class='mr-1' width="15px"> CERTIFICADO DE TITULO</p>
                        <?php endif ?>
                        <?php if ($model->cargas_gramabes): ?>
                            <p class="m-0 small text-gray mb-2"><i class="fas fa-circle text-success2 mr-2"></i> LIBRES DE CARGAS Y GRAVÁMENES</p>
                            <?php else: ?>
                            <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/dot.png" class='mr-1' width="15px"> LIBRES DE CARGAS Y GRAVÁMENES</p>
                        <?php endif ?>
                        <?php if ($model->deslinde): ?>
                            <p class="m-0 small text-gray mb-2"><i class="fas fa-circle text-success2 mr-2"></i> DESLINDE</p>
                            <?php else: ?>
                            <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/dot.png" class='mr-1' width="15px"> DESLINDE</p>
                        <?php endif ?>

                    </div>

                    <div class="col-md-4">
                         <?php if ($model->permisos_municipales): ?>
                            <p class="m-0 small text-gray mb-2"><i class="fas fa-circle text-success2 mr-2"></i> PERMISOS MUNICIPALES</p>
                            <?php else: ?>
                            <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/dot.png" class='mr-1' width="15px"> PERMISOS MUNICIPALES</p>
                        <?php endif ?>
                        <?php if ($model->permiso_ambiental): ?>
                            <p class="m-0 small text-gray mb-2"><i class="fas fa-circle text-success2 mr-2"></i> PERMISO AMBIENTAL</p>
                            <?php else: ?>
                            <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/dot.png" class='mr-1' width="15px"> PERMISO AMBIENTAL</p>
                        <?php endif ?>
                        <?php if ($model->objeccion_ministerio_turismo): ?>
                            <p class="m-0 small text-gray mb-2"><i class="fas fa-circle text-success2 mr-2"></i> NO OBJECIÓN DEL MINISTERIO DE TURISMO</p>
                            <?php else: ?>
                            <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/dot.png" class='mr-1' width="15px"> DESLINDE</p>
                        <?php endif ?>

                    </div>

                    <div class="col-md-4">

                        <?php if ($model->permiso_obras_publicas): ?>
                            <p class="m-0 small text-gray mb-2"><i class="fas fa-circle text-success2 mr-1"></i> PERMISO DE OBRAS PUBLICAS</p>
                            <?php else: ?>
                            <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/dot.png" class='mr-1' width="15px"> PERMISO DE OBRAS PUBLICAS</p>
                        <?php endif ?>
                        <?php if ($model->confortur): ?>
                            <p class="m-0 small text-gray mb-2"><i class="fas fa-circle text-success2 mr-2"></i> CONFORTUR</p>
                            <?php else: ?>
                            <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/dot.png" class='mr-1' width="15px"> CONFORTUR</p>
                        <?php endif ?>

                    </div>
                </div>
                
            </div>
        </div>

    </div>
    <div class="row mt-3">
        <div class="col-md-12 pr-0 pl-sm-none">
            <div class="bg-white rounded p-5">
                <h2 class="h33 text-gray2 font-weight-light">Descripción</h2>

                <div class="mt-4">
                    <p class="font-weight-normal text-gray2 font-14"><?= $model->detalles ?></p>
                </div>
            </div>
        </div>

    </div>

    <div class="row mt-5">   
        <div class="col-md-12"> 
            <div class="bg-white pt-3 pb-3 rounded">  
                <div class="row">
                    <div class="col-md-6 col-xs-6 col-sm-6 text-right" style="max-width: 50% !important">
                        <div class="bg-white h-100">
                            <?php if ($model->id == $first or !$prev_propiedad): ?>
                                <a href="/frontend/web/pre-construcciones" class="no-link font-weight-bold float-right ml-2">
                                    <span class="font-12" style="color:#aeb1b6">ANTERIOR PROYECTO</span>
                                </a>
                                <div class="w-fit float-right" style="margin-top: 0.15rem !important;">
                                    <a href="/frontend/web/pre-construcciones" class="no-link text-secondary font-weight-bold">
                                        <i class="fal fas fa-chevron-left" style="font-size: 20px;color:#aeb1b6"></i> 
                                    </a>
                                </div>
                                
                            <?php else: ?>
                                <a href="/frontend/web/pre-construcciones/ver?id=<?= $prev_propiedad->id ?>&first=<?= $first ?>" class="no-link font-weight-bold float-right ml-2">
                                    <span class="font-12" style="color:#aeb1b6">ANTERIOR PROYECTO</span>
                                </a>
                                <div class="w-fit float-right" style="margin-top: 0.15rem !important;">
                                    <a href="/frontend/web/pre-construcciones/ver?id=<?= $prev_propiedad->id ?>&first=<?= $first ?>" class="no-link text-secondary font-weight-bold">
                                        <i class="fal fas fa-chevron-left" style="font-size: 20px;color:#aeb1b6"></i> 
                                    </a>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <?php if ($next_propiedad): ?>
                        <div class="col-md-6 col-xs-6 col-sm-6" style="max-width: 50% !important">
                            <div class="bg-white h-100">
                                <a href="/frontend/web/pre-construcciones/ver?id=<?= $next_propiedad->id ?>&first=<?= $first ?>" class="no-link font-weight-bold float-left mr-2">
                                    <span class="font-12" style="color:#aeb1b6">SIGUIENTE PROYECTO</span>
                                </a>
                                <div class="w-fit float-left" style="margin-top: 0.15rem !important;">
                                    <a href="/frontend/web/pre-construcciones/ver?id=<?= $next_propiedad->id ?>&first=<?= $first ?>" class="no-link text-secondary font-weight-bold">
                                        <i class="fal fas fa-chevron-right" style="font-size: 20px;color:#aeb1b6"></i> 
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>  
        </div>  
    </div>  

    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="rounded bg-white p-3">
                <?= $this->render('_comments', []) ?>
            </div>
        </div>
    </div>

    

</div>



<!-- Modal -->
<div class="modal bg-darkblue fade" id="slideModal" tabindex="-1" aria-labelledby="slideModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg bg-darkblue">
    <div class="modal-content bg-darkblue border-0">
      <div class="modal-head bg-darkblue pb-2">
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body p-0 bg-darkblue">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="/frontend/web/<?= $model->foto_1 ?>" class="d-block w-100" style='height: 500px;'>
                </div>
                <?php foreach ($fotos as $foto): ?>
                    <div class="carousel-item">
                      <img src="/frontend/web/<?= $foto ?>" class="d-block w-100" style='height: 500px;'>
                    </div>
                <?php endforeach ?>
              </div>
              <!-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a> -->
            </div>
      </div>
      <div class="modal-footer border-0 p-0 bg-darkblue">
        <a href="#carouselExampleControls" class="text-white" data-slide="prev"><i class="fas fa-long-arrow-alt-left fa-2x"></i></a>
        <a href="#carouselExampleControls" class="text-white" data-slide="next"><i class="fas fa-long-arrow-alt-right fa-2x"></i></a>
      </div>
    </div>
  </div>
</div>


