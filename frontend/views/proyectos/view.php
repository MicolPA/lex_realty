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

    body, html, .wrap{
        /*background: rgba(19,23,38,0.9) !important;*/
        background: #131927 !important;
    }
    .container-header, .navbar, footer{
        display: none;
    }

</style>
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="modal-dialog modal-lg modal-dialog-centered">
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
                                <a class="carousel-control-prev bg-darkblue" href="#carouselExampleControls<?= $model->id ?>" role="button" data-slide="prev" style="height: 35px;width: 35px !important;">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a> 
                            </div>

                            <div class="col-md-10">
                                <div id="carouselExampleControls<?= $model->id ?>" class="carousel slide" data-ride="carousel">
                                  <div class="carousel-inner">
                                    <div class="carousel-item active">
                                      <img src="/frontend/web/<?= $model->foto_1 ?>" class="d-block w-100" alt="...">
                                    </div>
                                    <?php foreach ($fotos as $foto): ?>
                                       <div class="carousel-item">
                                          <img src="/frontend/web/<?= $foto ?>" class="d-block w-100" alt="...">
                                        </div> 
                                    <?php endforeach ?>
                                  </div>
                                  
                                  
                                </div>
                            </div>

                            <div class="col-md-1">
                                <a class="carousel-control-next bg-darkblue" href="#carouselExampleControls<?= $model->id ?>" role="button" data-slide="next" style="height: 35px;width: 35px !important;">
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

                        <button type="button" class="btn btn-secondary text-center btn-block bg-pastel-blue mt-4 btn-sm" data-dismiss="modal">CERRAR</button>
                    </div>
                  </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
