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
            height: 550px;
        }
    }


</style>
<div class="container mb-5">

    

    <div class="row mt-5">
        <div class="col-md-12">
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
    </div>

    <div class="row mt-3">
        <div class="col-md-12 pr-0 pl-sm-none">
            <div class="bg-white rounded p-5">
                <div class="mt-4">
                    <p class="font-weight-normal text-darkblue h4 mb-4"><?= $model->nombre ?></p>
                    <p class="font-weight-normal text-gray2 h6"><i class="fas fa-tractor"></i> <?= $model->desarrollador->nombre ?></p>
                    <p class="font-weight-normal text-gray2 h6"><i class="fas fa-map-marker-alt"></i> <?= $model->ubicacion->nombre ?></p>
                </div>
                <div class="mt-4">
                    <p class="font-weight-normal text-gray2 font-16"><?= $model->descripcion ?></p>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="rounded bg-white p-3">
                <?= $this->render('/pre-construcciones/_comments', []) ?>
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


