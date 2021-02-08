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
    
    .swal-icon img{
        width: 100%;
    }
    .swal-modal{
        background: transparent;;
    }
    .swal-overlay--show-modal{
        background: #0c1528;
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
                <div id="carousel-thumbs" class="carousel slide bg-white" data-ride="carousel">
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
                  <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="<?= count($fotos) > 5 ? "prev" : "" ?>">

                    <i class="fas fa-chevron-left text-blue fa-2x font-weight-bold float-left"></i>
                    <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="<?= count($fotos) > 5 ? "next" : "" ?>">
                    <i class="fas fa-chevron-right text-blue fa-2x font-weight-bold"></i>
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
                <a href="/frontend/web/propiedades/agente?id=<?= $model->id ?>" class="btn-block bg-darkblue text-white text-center p-0 pt-2 pb-2 font-14">CONTACTAR UN AGENTE <i class="fas fa-phone-alt ml-2"></i></a>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12 pr-0 pl-sm-none">
            <div class="bg-lightgray rounded p-3">
                <h2 class="h33 text-gray2">Descripción</h2>

                <div class="mt-4">
                    <p class="font-weight-normal text-gray2 font-14"><?= $model->detalles ?></p>
                </div>
            </div>
        </div>

    </div>

    <?php if ($extra): ?>
        <div class="row mt-3">
            <div class="col-md-12 pr-0 pl-sm-none">
                <div class="bg-lightgray rounded p-3">
                    <h2 class="h33 mb-3 text-gray2">Características adicionales</h2>
                    <div class="row">
                        <?php if ($extra->aire_acondicionado): ?>
                            <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success icon_md"></i> Aire acondicionado
                                </p>
                            </div>
                        <?php endif ?>
                        <?php if ($extra->balcon): ?>
                           <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success icon_md"></i> Balcón
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->cocina): ?>
                           <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success icon_md"></i> Cocina
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->lavadora): ?>
                           <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success icon_md"></i> Lavadora
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->nevera): ?>
                           <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success icon_md"></i> Nevera
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->piscina): ?>
                           <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success icon_md"></i> Piscina
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->vista_campo_golf): ?>
                           <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success icon_md"></i> Vista al campo de Golf
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->amueblado): ?>
                           <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success icon_md"></i> Amueblado
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->centro_comercial): ?>
                           <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success icon_md"></i> Cerca de Centro Comercial
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->estufa): ?>
                           <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success icon_md"></i> Estufa
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->marmol): ?>
                           <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success icon_md"></i> Mármol
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->parqueo): ?>
                           <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success icon_md"></i> Parqueo
                                </p>
                            </div> 
                        <?php endif ?>
                        <?php if ($extra->seguridad_24_hrs): ?>
                           <div class="col-md-4">
                                <p class="font-14 text-gray2 mb-1 font-weight-normal">
                                    <i class="fas fa-circle text-success icon_md"></i> Seguridad las 24hrs
                                </p>
                            </div> 
                        <?php endif ?>

                    </div>
                </div>
            </div>

        </div>
    <?php endif ?>

</div>


