<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Propiedades */

$this->title = $model->titulo_publicacion;
$this->params['breadcrumbs'][] = ['label' => 'Propiedades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container mb-5">

    

    <div class="row mt-5">
        <div class="col-md-9">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
             <!--  <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndic4tors" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
              </ol> -->
              <div class="carousel-inner rounded">
                <div class="carousel-item active">
                  <img src="/frontend/web/<?= $model->foto_1 ?>" class="d-block w-100">
                </div>
                <div class="carousel-item">
                  <img src="/frontend/web/<?= $model->foto_2 ?>" class="d-block w-100">
                </div>
                <div class="carousel-item">
                  <img src="/frontend/web/<?= $model->foto_3 ?>" class="d-block w-100">
                </div>
                <div class="carousel-item">
                  <img src="/frontend/web/<?= $model->foto_4 ?>" class="d-block w-100">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
                <div class="row mt-2 carousel-indicators">
                    <div class="col-md-3 d-inline-block pl-0">
                        <a href="#" data-target="#carouselExampleIndicators" data-slide-to="0" class="active"><img src="/frontend/web/<?= $model->foto_1 ?>" class="d-block w-100 rounded link_slide"></a>
                    </div>
                    <div class="col-md-3 d-inline-block">
                        <a href="#" data-target="#carouselExampleIndicators" data-slide-to="1"><img src="/frontend/web/<?= $model->foto_2 ?>" class="d-block w-100 rounded link_slide"></a>
                    </div>
                    <div class="col-md-3 d-inline-block">
                        <a href="#" data-target="#carouselExampleIndicators" data-slide-to="2"><img src="/frontend/web/<?= $model->foto_3 ?>" class="d-block w-100 rounded link_slide"></a>
                    </div>
                    <div class="col-md-3 d-inline-block pr-0">
                        <a href="#" data-target="#carouselExampleIndicators" data-slide-to="3"><img src="/frontend/web/<?= $model->foto_4 ?>" class="d-block w-100 rounded link_slide"></a>
                    </div>
                </div>
            </div>
           
            <!-- <div class="rounded">
                <img src="/frontend/web/<?//= $model->foto_1 ?>" width='100%'>
            </div> -->
        </div>
        <div class="col-md-3 rounded bg-lightgray pb-5">
            <div>
                <h1 class="text-black mt-4 mb-4 h6 bg-warning text-center pt-2 pb-2 rounded"><?= Html::encode($this->title) ?></h1>

                <p class="m-0"><i class="fas fa-map-marker-alt mr-2"></i> <?= $model->ubicacion->nombre ?></p>
                <p><i class="mr-2"></i> <?= $model->tipoPropiedad->nombre ?></p>

                <span class="font-weight-bold h3">$<?= number_format($model->precio) ?></span>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <div style="position: absolute;"><a class="btn btn-outline-primary pt-2 pb-2"><i class="fas fa-bed"></i></a> </div>
                        <p class="ml-5 pl-2 small m-0">Habs.</p>
                        <span class="ml-5 pl-2 font-weight-bold"><?= $model->baños ?></span>
                    </div>
                    <div class="col-md-6">
                        <div style="position: absolute;"><a class="btn btn-outline-primary pt-2 pb-2"><i class="fas fa-shower"></i></a> </div>
                        <p class="ml-5 pl-2 small m-0">Baños</p>
                        <span class="ml-5 pl-2 font-weight-bold"><?= $model->baños ?></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div style="position: absolute;"><a class="btn btn-outline-primary pt-2 pb-2"><i class="fas fa-layer-group"></i></a> </div>
                        <p class="ml-5 pl-2 small m-0">Metros</p>
                        <span class="ml-5 pl-2 font-weight-bold"><?= $model->metros ?></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div style="position: absolute;"><a class="btn btn-outline-primary pt-2 pb-2"><i class="fas fa-layer-group"></i></a> </div>
                        <p class="ml-5 pl-2 small m-0">Pies</p>
                        <span class="ml-5 pl-2 font-weight-bold"><?= $model->pies ?></span>
                    </div>
                </div>
                <a href="/frontend/web/propiedades/enviar-propuesta?id=<?= $model->id ?>" class="btn-block text-success text-center p-0 pt-2 pb-2 btn btn-outline-success mt-4" style="font-size: 20px">ENVIAR PROPUESTA</a>
                <a href="#" class="btn-block bg-blue text-white text-center p-0 pt-2 pb-2" style="font-size: 18px">CONTACTAR UN AGENTE <i class="fas fa-phone-alt ml-2"></i></a>
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
                        <div class="col-md-4">
                            <div class="mt-4">
                                <p class="h55 mb-1 font-weight-normal">
                                    <?php if ($extra->aire_acondicionado): ?>
                                        <i class="fas fa-check-circle text-success mr-2"></i>
                                        <?php else: ?>
                                        <i class="fas fa-times-circle text-danger mr-2"></i>
                                    <?php endif ?>
                                Aire acondicionado</p>
                                <p class="h55 mb-1 font-weight-normal">
                                    <?php if ($extra->balcon): ?>
                                        <i class="fas fa-check-circle text-success mr-2"></i>
                                        <?php else: ?>
                                        <i class="fas fa-times-circle text-danger mr-2"></i>
                                    <?php endif ?>
                                Balcón</p>
                                <p class="h55 mb-1 font-weight-normal">
                                    <?php if ($extra->cocina): ?>
                                        <i class="fas fa-check-circle text-success mr-2"></i>
                                        <?php else: ?>
                                        <i class="fas fa-times-circle text-danger mr-2"></i>
                                    <?php endif ?>
                                Cocina</p>
                                <p class="h55 mb-1 font-weight-normal">
                                    <?php if ($extra->lavadora): ?>
                                        <i class="fas fa-check-circle text-success mr-2"></i>
                                        <?php else: ?>
                                        <i class="fas fa-times-circle text-danger mr-2"></i>
                                    <?php endif ?>
                                Lavadora</p>
                                <p class="h55 mb-1 font-weight-normal">
                                    <?php if ($extra->nevera): ?>
                                        <i class="fas fa-check-circle text-success mr-2"></i>
                                        <?php else: ?>
                                        <i class="fas fa-times-circle text-danger mr-2"></i>
                                    <?php endif ?>
                                Nevera</p>
                               
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mt-4">
                                <p class="h55 mb-1 font-weight-normal">
                                    
                                <p class="h55 mb-1 font-weight-normal">
                                    <?php if ($extra->piscina): ?>
                                        <i class="fas fa-check-circle text-success mr-2"></i>
                                        <?php else: ?>
                                        <i class="fas fa-times-circle text-danger mr-2"></i>
                                    <?php endif ?>
                                Piscina</p>
                                <p class="h55 mb-1 font-weight-normal">
                                    <?php if ($extra->vista_campo_golf): ?>
                                        <i class="fas fa-check-circle text-success mr-2"></i>
                                        <?php else: ?>
                                        <i class="fas fa-times-circle text-danger mr-2"></i>
                                    <?php endif ?>
                                Vista al campo de Golf</p>
                                <p class="h55 mb-1 font-weight-normal">
                                    <?php if ($extra->amueblado): ?>
                                        <i class="fas fa-check-circle text-success mr-2"></i>
                                        <?php else: ?>
                                        <i class="fas fa-times-circle text-danger mr-2"></i>
                                    <?php endif ?>
                                Amueblado</p>
                                <p class="h55 mb-1 font-weight-normal">
                                    <?php if ($extra->centro_comercial): ?>
                                        <i class="fas fa-check-circle text-success mr-2"></i>
                                        <?php else: ?>
                                        <i class="fas fa-times-circle text-danger mr-2"></i>
                                    <?php endif ?>
                                Cerca de Centro Comercial</p>
                                <p class="h55 mb-1 font-weight-normal">
                                    <?php if ($extra->estufa): ?>
                                        <i class="fas fa-check-circle text-success mr-2"></i>
                                        <?php else: ?>
                                        <i class="fas fa-times-circle text-danger mr-2"></i>
                                    <?php endif ?>
                                Estufa</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mt-4">
                                <p class="h55 mb-1 font-weight-normal">
                                    
                                <p class="h55 mb-1 font-weight-normal">
                                    <?php if ($extra->marmol): ?>
                                        <i class="fas fa-check-circle text-success mr-2"></i>
                                        <?php else: ?>
                                        <i class="fas fa-times-circle text-danger mr-2"></i>
                                    <?php endif ?>
                                Marmol</p>
                                <p class="h55 mb-1 font-weight-normal">
                                    <?php if ($extra->parqueo): ?>
                                        <i class="fas fa-check-circle text-success mr-2"></i>
                                        <?php else: ?>
                                        <i class="fas fa-times-circle text-danger mr-2"></i>
                                    <?php endif ?>
                                Parqueo</p>
                                <p class="h55 mb-1 font-weight-normal">
                                    <?php if ($extra->seguridad_24_hrs): ?>
                                        <i class="fas fa-check-circle text-success mr-2"></i>
                                        <?php else: ?>
                                        <i class="fas fa-times-circle text-danger mr-2"></i>
                                    <?php endif ?>
                                Seguridad las 24hrs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php endif ?>

</div>


