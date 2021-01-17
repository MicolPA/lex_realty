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

                <p><i class="fas fa-map-marker-alt mr-2"></i> <?= $model->ubicacion->nombre ?></p>

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
                        <p class="ml-5 pl-2 small m-0">Area</p>
                        <span class="ml-5 pl-2 font-weight-bold"><?= $model->baños ?></span>
                    </div>
                </div>
                <a href="/frontend/web/propiedades/enviar-propuesta?id=<?= $model->id ?>" class="btn-block text-success text-center p-0 pt-2 pb-2 btn btn-outline-success mt-4" style="font-size: 20px">ENVIAR PROPUESTA</a>
                <a href="#" class="btn-block bg-blue text-white text-center p-0 pt-2 pb-2" style="font-size: 20px">CONTACTAR UN AGENTE <i class="fas fa-phone-alt"></i></a>
            </div>
        </div>
    </div>

   <!--  <div class="row mt-5">
        <div class="col-md-9">
            <div class="bg-lightgray rounded">
                <h2>Características Adicionales</h2>
            </div>
        </div>

        <div class="col-md-9">
            <div class="bg-lightgray rounded">
            </div>
        </div>
    </div> -->

</div>
