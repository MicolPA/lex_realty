<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\rating\StarRating;

$count = $dataProvider->query->count();

$this->title = "PROYECTOS ". $desarrolladora['nombre'];
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .radios-div label{
        margin-right: 10px;
        color:#9d9fa0 !important;
    }
    .fade{
        /*background: #131927;*/
        background: rgba(19,23,38,0.9);
    }
    .rating-container .caption, .theme-krajee-uni .clear-rating{
        display: none;
    }
    form{
        width: 100%;
    }
    .div-label{
        min-width: 130px !important;
        font-size: 12px !important;
    }
</style>

<div class="container">

    <div class="">
       <!--  <div class="row mt-5">
            <div class="col-md-12 text-center mb-3">
                <h1 class="h4 title-light">PROYECTOS</h1>
            </div>
        </div> -->

       
        <div class="row p-5 mt-4 bg-white border-rounded" style='padding-top: 0 !important'>
            <div class="col-md-12 mt-5 mb-5 pb-3"> 
                <img src="/frontend/web/<?= $desarrolladora['logo'] ?>" style='max-width:200px;'>
            </div>
            <?php if ($count > 0): ?>
                <?php foreach ($model as $m): ?>
                    <div class="col-md-4 mt-4 mb-2">
                        <a href="#" class="no-link text-blue w-100" data-toggle="modal" data-target="#staticBackdrop<?= $m->id ?>">
                            <div class="bg-white w-100">
                                <div class="contenedor w-100">
                                    <div style="width: 100%;height: 240px;background-image: url('/frontend/web/<?= $m->foto_1 ?>');background-size:cover;background-position:center;"></div>
                                    <div class="bg-darkblue pt-1 pb-1">
                                        <p class="text-center text-white font-12 mb-0" style="font-family: 'Benton-book', Arial, sans-serif"><?= mb_strtoupper($m->ubicacion->nombre) ?></p>
                                    </div>
                                   
                                </div>

                                <div class="pt-3 pb-2 pl-2 pr-2">
                                    <p class="font-weight-bold text-darkblue"><?= $m->nombre ?></p>
                                </div>

                            </div>
                        </a>
                    </div>

                    <!-- Modal -->
                    <?php 
                    $fotos = array();
                        for ($i = 2; $i < 9; $i++) {
                            
                           
                            if ($m["foto_$i"]) {
                                $fotos[] = $m["foto_$i"];
                            }
                        }

                     ?>
                    <div class="modal fade" id="staticBackdrop<?= $m->id ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header bg-pastel-blue">
                            <!-- <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5> -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body row">
                            <div class="col-md-8">

                                <div class="row align-items-center h-100 p-2">
                                    <div class="col-md-1">
                                        <a class="carousel-control-prev bg-darkblue" href="#carouselExampleControls<?= $m->id ?>" role="button" data-slide="prev" style="height: 35px;width: 35px !important;">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a> 
                                    </div>

                                    <div class="col-md-10">
                                        <div id="carouselExampleControls<?= $m->id ?>" class="carousel slide" data-ride="carousel">
                                          <div class="carousel-inner">
                                            <div class="carousel-item active">
                                              <img src="/frontend/web/<?= $m->foto_1 ?>" class="d-block w-100" alt="...">
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
                                        <a class="carousel-control-next bg-darkblue" href="#carouselExampleControls<?= $m->id ?>" role="button" data-slide="next" style="height: 35px;width: 35px !important;">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>


                                </div>
                                
                                                                
                            </div>
                            <div class="col-md-4">
                                <span class="badge bg-pastel-blue text-white mb-2"><?= $m->desarrollador->nombre ?></span>
                                <p class="font-weight-bold"><?= $m->nombre ?></p>
                                <p class="font-weight-normal text-gray2 h6"><i class="fas fa-map-marker-alt"></i> <?= $m->ubicacion->nombre ?></p>
                                <p>
                                    <?= $m->descripcion ?>
                                </p>

                                <button type="button" class="btn btn-secondary text-center btn-block bg-pastel-blue mt-4 btn-sm" data-dismiss="modal">CERRAR</button>
                            </div>
                          </div>
                            
                        </div>
                      </div>
                    </div>   
                <?php endforeach ?>
            <?php else: ?>
                <div class="col-md-12 text-center">
                    <p class="text-darkblue mt-3">No se han encontrado resultados.</p>
                </div>
            <?php endif ?>


            <div class="col-md-12 p-0">
                <div class="text-center">
                    <?php 
                        // display pagination
                        echo \yii\widgets\LinkPager::widget([
                            'pagination' => $pagination,
                            'options' => [
                                'class' => 'pagination text-blue float-right',

                            ],
                            'linkOptions' => ['class' => 'page-link text-blue'],
                            'prevPageLabel' => false,
                            'nextPageLabel' => false,

                        ]);
                    ?>
                </div>

            </div>

            <?php if ($count > 0): ?>

                
                <?= $this->render('_rating', ['rating' => $rating, 'ratings_total' => $ratings_total, 'rating_model' => $rating_model]) ?>
                <div class="col-md-12 mt-5">
                    <?= $this->render('/pre-construcciones/_comments', []) ?>
                </div>
            <?php endif ?>
        </div>

            
    </div>

    

</div>
