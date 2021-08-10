<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->nombre;
\yii\web\YiiAsset::register($this);

$fotos = array();
for ($i = 2; $i < 9; $i++) {
    
    if ($model["foto_$i"]) {
        $fotos[] = $model["foto_$i"];
    }
}



?>


<style>
    @media (min-width: 990px){
        .first-part img {
            height: 400px;
        }
    }

    body, html, .wrap{
        /*background: rgba(19,23,38,0.9) !important;*/
        background: #131927 !important;
    }
    .container-header, .navbar, footer{
        display: none;
    }

    #carousel-thumbs img{
        border: none !important;
    }

</style>
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="modal-dialog modal-lg modal-dialog-centered mt-5">
                <div class="modal-content">
                  <div class="modal-header bg-pastel-blue">
                    <!-- <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5> -->
                    <a href="<?= Yii::$app->request->referrer ? Yii::$app->request->referrer : '/frontend/web/proyectos/index?desarrolladoras_id=' . $model->desarrollador_id .'&stars=1' ?>" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </a>
                  </div>
                  <div class="modal-body row">
                    <div class="col-md-8">

                        <div class="row align-items-center h-100 p-2">
                            <div class="col-md-1">
                                <a class="carousel-control-prev bg-darkblue" href="#carouselExampleControls" role="button" data-slide="prev" style="height: 35px;width: 35px !important;">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a> 
                            </div>

                            <div class="col-md-10">
                                <div class="carousel-container position-relative row">
                  
                                    <!-- <a type="button" class="no-link" data-toggle="modal" data-target="#slideModal"> -->
                                    <div id="carouselExampleControls" class="carousel slide first-part w-100" data-ride="carousel">

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
                                    <div id="carousel-thumbs" class="carousel slide bg-white rounded-bottom p-0" data-ride="carousel">
                                      <div class="carousel-inner">
                                        <div class="carousel-item active">
                                          <div class="row mx-0">
                                            <div id="carousel-selector-0" class="thumb col-4 col-sm-3 px-1 py-2 selected" data-target="#myCarousel" data-slide-to="0">
                                              <img src="/frontend/web/<?= $model->foto_1 ?>" class="img-fluid">
                                            </div>
                                            <?php $count = 0; ?>
                                            <?php foreach ($fotos as $foto): ?>
                                                <?php $count++ ?>
                                                <?php if ($count <= 5): ?>
                                                    <div id="carousel-selector-<?= $count ?>" class="thumb col-4 col-sm-3 px-1 py-2" data-target="#myCarousel" data-slide-to="<?= $count ?>">
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
                                                    <div id="carousel-selector-<?= $count ?>" class="thumb col-4 col-sm-3 px-1 py-2" data-target="#myCarousel" data-slide-to="<?= $count ?>">
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

                                </div> <!-- /carousel-container -->
                            </div>

                            <div class="col-md-1">
                                <a class="carousel-control-next bg-darkblue" href="#carouselExampleControls" role="button" data-slide="next" style="height: 35px;width: 35px !important;">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>


                        </div>
                        
                                                        
                    </div>
                    <div class="col-md-4">
                        <span class="badge bg-pastel-blue text-white mb-2"><?= $model->desarrollador->nombre ?></span>
                        <p class="font-weight-bold"><?= $model->nombre ?></p>
                        <p class="font-weight-normal text-gray2 h6"><i class="fas fa-map-marker-alt"></i> <?= $model->ubicacion->nombre ?></p>
                        <p>
                            <?= $model->descripcion ?>
                        </p>

                        <a href="<?= Yii::$app->request->referrer ? Yii::$app->request->referrer : '/frontend/web/proyectos/index?desarrolladoras_id=' . $model->desarrollador_id .'&stars=1' ?>" class="btn btn-secondary text-center btn-block bg-pastel-blue mt-4 btn-sm" data-dismiss="modal">CERRAR</a>
                    </div>
                  </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
