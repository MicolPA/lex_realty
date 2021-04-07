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

$this->title = $model->titulo_publicacion;
\yii\web\YiiAsset::register($this);
$next_propiedad = \frontend\models\Propiedades::find()->where(['<', 'id', $model->id])->orderBy(['id' => SORT_DESC])->one();
$prev_propiedad = \frontend\models\Propiedades::find()->where(['>', 'id', $model->id])->orderBy(['id' => SORT_ASC])->one();

?>

<div class="container mb-5">

    

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
                <!-- <div class="text-right" style="position: inherit;width: 100%">
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
        <div class="col-md-3 rounded bg-lightgray pb-5">
            <div>
                <h1 class="text-white mt-4 mb-4 h6 text-center pt-2 pb-2 rounded font-weight-light" style="background: #44546b"><?= Html::encode($this->title) ?></h1>

                <p class="m-0"><i class="fas fa-map-marker-alt mr-2"></i> <?= $model->ubicacion->nombre ?></p>
                <p><i class="fas fa-circle-notch"></i> <?= isset($model->tipoPropiedad->nombre) ? $model->tipoPropiedad->nombre : '' ?></p>

                <span class="font-weight-bold h3">US$<?= number_format($model->precio) ?></span>

                <div class="row mt-2">
                    <?php if ($model->tipo_propiedad != 2): ?>
                        <div class="col-md-5">
                            <div style="position: absolute;"><img src="/frontend/web/images/bed-icon.png" width='40px'></div>
                            <p class="ml-5 pl-2 small m-0 col-xs-6">Habs.</p>
                            <span class="ml-5 pl-2 font-weight-bold font-12"><?= $model->habitaciones ?></span>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <div style="position: absolute;"><img src="/frontend/web/images/shower-icon.png" width='40px'> </div>
                            <p class="ml-5 pl-2 small m-0">Baños</p>
                            <span class="ml-5 pl-2 font-weight-bold font-12"><?= $model->baños ?></span>
                        </div>
                    <?php endif ?>
                    <div class="col-md-5 mt-3 col-xs-6">
                        <div style="position: absolute;"><img src="/frontend/web/images/size-icon.png" width='40px'></div>
                        <p class="ml-5 pl-2 small m-0">Metros</p>
                        <span class="ml-5 pl-2 font-weight-bold font-12"><?= number_format($model->metros) ?>m</span>
                    </div>
                    <div class="col-md-6 mt-3 col-xs-6">
                        <div style="position: absolute;"><img src="/frontend/web/images/size-icon.png" width='40px'></div>
                        <p class="ml-5 pl-2 small m-0">Pies</p>
                        <span class="ml-5 pl-2 font-weight-bold font-12"><?= number_format($model->pies, 2) ?></span>
                    </div>
                </div>
                <a href="/frontend/web/propiedades/enviar-propuesta?id=<?= $model->id ?>&user_id=<?= $model->user_id ?>&propiedad=1" class="btn-block text-success text-center p-0 pt-2 pb-2 btn btn-outline-success mt-4 h6">ENVIAR PROPUESTA</a>
                <a href="/frontend/web/propiedades/contactar-agente?id=<?= $model->id ?>&user_id=<?= $model->user_id ?>&type=2&propiedad=1" class="btn-block text-white text-center p-0 pt-2 pb-2 btn btn-dark h6">CONTACTAR UN AGENTE</a>
            </div>
        </div>
    </div>
    <?php if ($extra): ?>
        <div class="row mt-4">
            <div class="col-md-12 pr-0 pl-sm-none">
                <div class="bg-lightgray rounded p-5">
                    <h2 class="h33 mb-3 text-gray2 font-weight-light">Características principales</h2>
                    <div class="row">
                        <?php if ($extra->aire_acondicionado): ?>
                            <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success2 icon_md mr-1"></i> Aire acondicionado
                                </p>
                            </div>
                        <?php endif ?>
                        <?php if ($extra->balcon): ?>
                           <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success2 icon_md mr-1"></i> Balcón
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->cocina): ?>
                           <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success2 icon_md mr-1"></i> Cocina
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->lavadora): ?>
                           <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success2 icon_md mr-1"></i> Lavadora
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->nevera): ?>
                           <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success2 icon_md mr-1"></i> Nevera
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->piscina): ?>
                           <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success2 icon_md mr-1"></i> Piscina
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->vista_campo_golf): ?>
                           <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success2 icon_md mr-1"></i> Vista al campo de Golf
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->amueblado): ?>
                           <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success2 icon_md mr-1"></i> Amueblado
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->centro_comercial): ?>
                           <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success2 icon_md mr-1"></i> Cerca de Centro Comercial
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->estufa): ?>
                           <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success2 icon_md mr-1"></i> Estufa
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->marmol): ?>
                           <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success2 icon_md mr-1"></i> Mármol
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->parqueo): ?>
                           <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success2 icon_md mr-1"></i> Parqueo
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->seguridad_24_hrs): ?>
                           <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success2 icon_md mr-1"></i> Seguridad las 24hrs
                                </p>
                            </div> 
                        <?php endif ?>

                    </div>
                </div>
            </div>

        </div>
    <?php endif ?>
    <div class="row mt-3">
        <div class="col-md-12 pr-0 pl-sm-none">
            <div class="bg-lightgray rounded p-5">
                <h2 class="h33 text-gray2 font-weight-light">Descripción</h2>

                <div class="mt-4">
                    <p class="font-weight-normal text-gray2 font-14"><?= $model->detalles ?></p>
                </div>
            </div>
        </div>

    </div>

    <div class="row mt-3">
        <div class="col-md-6 col-xs-6 col-sm-6 text-right" style="max-width: 50% !important">
            <?php if ($model->id == $first or !$prev_propiedad): ?>
                <a href="/frontend/web/propiedades" class="no-link font-weight-bold float-right mt-3">
                    <span class="font-12" style="color:#aeb1b6">ANTERIOR</span>
                </a>
                <div class="w-fit float-right">
                    <a href="/frontend/web/propiedades" class="no-link text-secondary font-weight-bold">
                        <i class="fal fas fa-chevron-left" style="font-size: 60px;color:#aeb1b6"></i> 
                    </a>
                </div>
                
            <?php else: ?>
                <a href="/frontend/web/propiedades/ver?id=<?= $prev_propiedad->id ?>&first=<?= $first ?>" class="no-link font-weight-bold float-right mt-3">
                    <span class="font-12" style="color:#aeb1b6">ANTERIOR</span>
                </a>
                <div class="w-fit float-right">
                    <a href="/frontend/web/propiedades/ver?id=<?= $prev_propiedad->id ?>&first=<?= $first ?>" class="no-link text-secondary font-weight-bold">
                        <i class="fal fas fa-chevron-left" style="font-size: 60px;color:#aeb1b6"></i> 
                    </a>
                </div>
            <?php endif ?>
        </div>
        <?php if ($next_propiedad): ?>
            <div class="col-md-6 col-xs-6 col-sm-6" style="max-width: 50% !important">
                <a href="/frontend/web/propiedades/ver?id=<?= $next_propiedad->id ?>&first=<?= $first ?>" class="no-link font-weight-bold float-left mt-3">
                    <span class="font-12" style="color:#aeb1b6">SIGUIENTE</span>
                </a>
                <div class="w-fit float-left">
                    <a href="/frontend/web/propiedades/ver?id=<?= $next_propiedad->id ?>&first=<?= $first ?>" class="no-link text-secondary font-weight-bold">
                        <i class="fal fas fa-chevron-right" style="font-size: 60px;color:#aeb1b6"></i> 
                    </a>
                </div>
            </div>
        <?php endif ?>
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


