<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$fotos = array();
for ($i = 1; $i < 13; $i++) {
    
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
?>
<style>
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
</style>
<div class="container mb-5">

    

    <div class="row mt-5">
        <div class="col-md-9">
            <div class="container">
                <div class="carousel-container position-relative row">
                  
                <div id="myCarousel" class="carousel slide first-part" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active" data-slide-number="0">
                      <img src="/frontend/web/<?= $model->foto_1 ?>" class="d-block w-100" data-remote="/frontend/web/<?= $model->foto_1 ?>" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                    </div>
                    <?= $count = 0; ?>
                    <?php foreach ($fotos as $foto): ?>
                        <?php $count++ ?>
                        <div class="carousel-item" data-slide-number="<?= $count ?>">
                          <img src="/frontend/web/<?= $foto ?>" class="d-block w-100" data-remote="/frontend/web/<?= $foto ?>" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                        </div>
                    <?php endforeach ?>
                  </div>
                </div>

                <!-- Carousel Navigation -->
                <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
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
                  <a class="carousel-control-prev bg-lg-dark" href="#carousel-thumbs" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next bg-lg-dark" href="#carousel-thumbs" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>

                </div> <!-- /row -->
            </div> <!-- /container -->
        </div>
        <div class="col-md-3 rounded bg-lightgray pb-5">
            <div>
                <h1 class="text-black mt-4 mb-4 h6 bg-warning text-center pt-2 pb-2 rounded"><?= Html::encode($this->title) ?></h1>

                <p class="m-0"><i class="fas fa-map-marker-alt mr-2"></i> <?= $model->ubicacion->nombre ?></p>
                <p><i class="fas fa-circle-notch"></i> <?= $model->tipoPropiedad->nombre ?></p>

                <span class="font-weight-bold h3">US$<?= number_format($model->precio, 2) ?></span>

                <div class="row mt-2">
                    <div class="col-md-6">
                        <div style="position: absolute;"><a class="btn btn-outline-primary pt-2 pb-2"><i class="fas fa-bed"></i></a> </div>
                        <p class="ml-5 pl-2 small m-0 mt-2 col-xs-6">Habs.</p>
                        <span class="ml-5 pl-2 font-weight-bold"><?= $model->baños ?></span>
                    </div>
                    <div class="col-md-6 mt-2 col-xs-6">
                        <div style="position: absolute;"><a class="btn btn-outline-primary pt-2 pb-2"><i class="fas fa-shower"></i></a> </div>
                        <p class="ml-5 pl-2 small m-0">Baños</p>
                        <span class="ml-5 pl-2 font-weight-bold"><?= $model->baños ?></span>
                    </div>
                    <div class="col-md-6 mt-3 col-xs-6">
                        <div style="position: absolute;"><a class="btn btn-outline-primary pt-2 pb-2"><i class="fas fa-layer-group"></i></a> </div>
                        <p class="ml-5 pl-2 small m-0">Metros</p>
                        <span class="ml-5 pl-2 font-weight-bold"><?= number_format($model->metros) ?>m</span>
                    </div>
                    <div class="col-md-6 mt-3 col-xs-6">
                        <div style="position: absolute;"><a class="btn btn-outline-primary pt-2 pb-2"><i class="fas fa-layer-group"></i></a> </div>
                        <p class="ml-5 pl-2 small m-0">Pies</p>
                        <span class="ml-5 pl-2 font-weight-bold"><?= number_format($model->pies, 2) ?></span>
                    </div>
                </div>
                <a href="/frontend/web/propiedades/enviar-propuesta?id=<?= $model->id ?>" class="btn-block text-success text-center p-0 pt-2 pb-2 btn btn-outline-success mt-4 h6">ENVIAR PROPUESTA</a>
                <a href="/frontend/web/propiedades/agente?id=<?= $model->id ?>" class="btn-block bg-blue text-white text-center p-0 pt-2 pb-2 h6">CONTACTAR UN AGENTE <i class="fas fa-phone-alt ml-2"></i></a>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12 pr-0 pl-sm-none">
            <div class="bg-lightgray rounded p-3">
                <h2 class="h3">Descripción</h2>

                <div class="mt-4">
                    <p class="h55 font-weight-normal"><?= $model->detalles ?></p>
                </div>
            </div>
        </div>

    </div>

    <?php if ($extra): ?>
        <div class="row mt-3">
            <div class="col-md-12 pr-0 pl-sm-none">
                <div class="bg-lightgray rounded p-3">
                    <h2 class="h3">Características adicionales</h2>
                    <div class="row">
                        <?php if ($extra->aire_acondicionado): ?>
                            <div class="col-md-4">
                                <p class="h55 mb-1 font-weight-normal">
                                    <i class="fas fa-check-circle text-success mr-2"></i>Aire acondicionado
                                </p>
                            </div>
                        <?php endif ?>
                        <?php if ($extra->balcon): ?>
                           <div class="col-md-4">
                                <p class="h55 mb-1 font-weight-normal">
                                    <i class="fas fa-check-circle text-success mr-2"></i>Balcón
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->cocina): ?>
                           <div class="col-md-4">
                                <p class="h55 mb-1 font-weight-normal">
                                    <i class="fas fa-check-circle text-success mr-2"></i>Cocina
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->lavadora): ?>
                           <div class="col-md-4">
                                <p class="h55 mb-1 font-weight-normal">
                                    <i class="fas fa-check-circle text-success mr-2"></i>Lavadora
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->nevera): ?>
                           <div class="col-md-4">
                                <p class="h55 mb-1 font-weight-normal">
                                    <i class="fas fa-check-circle text-success mr-2"></i>Nevera
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->piscina): ?>
                           <div class="col-md-4">
                                <p class="h55 mb-1 font-weight-normal">
                                    <i class="fas fa-check-circle text-success mr-2"></i>Piscina
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->vista_campo_golf): ?>
                           <div class="col-md-4">
                                <p class="h55 mb-1 font-weight-normal">
                                    <i class="fas fa-check-circle text-success mr-2"></i>Vista al campo de Golf
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->amueblado): ?>
                           <div class="col-md-4">
                                <p class="h55 mb-1 font-weight-normal">
                                    <i class="fas fa-check-circle text-success mr-2"></i>Amueblado
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->centro_comercial): ?>
                           <div class="col-md-4">
                                <p class="h55 mb-1 font-weight-normal">
                                    <i class="fas fa-check-circle text-success mr-2"></i>Cerca de Centro Comercial
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->estufa): ?>
                           <div class="col-md-4">
                                <p class="h55 mb-1 font-weight-normal">
                                    <i class="fas fa-check-circle text-success mr-2"></i>Estufa
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->marmol): ?>
                           <div class="col-md-4">
                                <p class="h55 mb-1 font-weight-normal">
                                    <i class="fas fa-check-circle text-success mr-2"></i>Mármol
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->parqueo): ?>
                           <div class="col-md-4">
                                <p class="h55 mb-1 font-weight-normal">
                                    <i class="fas fa-check-circle text-success mr-2"></i>Parqueo
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->seguridad_24_hrs): ?>
                           <div class="col-md-4">
                                <p class="h55 mb-1 font-weight-normal">
                                    <i class="fas fa-check-circle text-success mr-2"></i>Seguridad las 24hrs
                                </p>
                            </div> 
                        <?php endif ?>

                    </div>
                </div>
            </div>

        </div>
    <?php endif ?>

</div>


