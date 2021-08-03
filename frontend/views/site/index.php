<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Inicio';
?>
<style>
    @media (min-width: 1200px){
        .container, .container-sm, .container-md, .container-lg, .container-xl {
            max-width: 1140px !important;
        }
        .col-lg-3 {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 24.5%;
        }
    }

    @media (min-width: 767px){
        

        .c-image, .d-cont{
            height: 1200px;
        }
    }


    select option{
        font-size: 14px !important;
    }
    .icon-index label svg{
        font-size: 82px !important;
    }
    .icon-index label{
        padding-top: 2rem !important;
        padding-bottom: 2rem !important;
        border-radius: 5px;
        color: white !important;
    }
    @media (max-width: 766px){
        #carouselExampleControls{
            display: none;
        }

        .title-content{
            margin-top: 1rem;
            text-align: left;
            width: 100%;
            color:  #0c1528;
        }

        .title-titulos{
            margin-top: 8rem;
        }

        .carousel-control-next, .carousel-control-prev{
            padding-top: 100px !important;
        }
    }

    .icon-index .form-group{
        margin-bottom: 0px;
    }

    .first label{
        background: #747f91;
    }
    .second label{
        background: #799eb9;
    }

    .btn-success{
        background: #3ab54a !important;
    }
    .input-r::placeholder, .textarea::placeholder{
        color: #7b7b7b !important;
        font-weight: normal;
    }

    .icon-big{
        font-size: 70px;
    }

    .text-success{
        color: white !important;
        font-size: 14px !important;
    }

    .swal-modal{
        background: transparent;
    }
    .swal-loading img{
        width: 20% !important;
    }

</style>
<div class="container-fluid">
    <div class="row" style=";">
        <div class="col-md-12 p-0" style="">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item home-carousel-item active">
                  <img src="/frontend/web/images/slide.jpg" class="d-block w-100 c-image">
                </div>
                <div class="carousel-item home-carousel-item">
                  <img src="/frontend/web/images/slide-2.jpg" class="d-block w-100 c-image">
                </div>
                <div class="carousel-item home-carousel-item">
                  <img src="/frontend/web/images/slide-3.jpg" class="d-block w-100 c-image">
                </div>
              </div>
             <!--  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a> -->
            </div>
            <div class="bg-darkblue d-cont" style=";position: absolute;top: 0px;width: 100%;opacity: 0.8">
            </div>
            <div class="">
                <div class='row align-items-center div-content-home' style="margin: auto !important;top: 80px;width: 100%">
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-10 text-inicio text-white text-right pr-4 m-0">
                                <div class="fit-content float-right title-content">
                                    <p class="mb-0 text-right">
                                        <p class="mb-2 font-20 VelozIn" style="line-height:2px">SOLICITA TU DEBIDA</p>
                                        <p class="big mb-0 h2 VelozIn">DILIGENCIA</p>
                                        <p class="small mb-0 mt-1 VelozIn" style="line-height:12px">MÁS CONSULTA DE 20 MINUTOS GRATIS CON UN ABOGADO EXPERTO.</p>
                                        <p class="font-18 mt-1 font-weight-normal VelozIn">TOTAL <b>USD$ <?= $constante ? $constante['contenido'] : 120 ?></b></p>
                                    </p>

                                   <!--  <p class="font-12 mt-5">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim recusandae esse odio ad cum nulla tempora unde sunt iste blanditiis ipsa voluptatum dignissimos amet sed rem illo beatae velit, ducimus.
                                    </p> -->

                                </div>

                            </div>
                            <div class="text-white text-inicio d-xs-none m-0">
                                <i class="fas fa-caret-right float-right icon-big jump-infinite"></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 text-white float-right ml-auto pr-lg-5 pr-md-4">
                                <!-- <p class="font-12 pr-lg-5 pr-md-4 text-right">
                                    Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Officiis, reiciendis voluptatum libero necessitatibus nostrum a ipsum consequuntur doloribus fugit laborum. Nemo, id dolor, commodi unde repellendus fugit a, magni recusandae soluta tenetur sunt est voluptatibus sit? Natus, tempore, eos, mollitia quasi earum blanditiis aut eaque saepe illo non quaerat distinctio fuga eius animi perspiciatis dolore aperiam ex. Rem dolorum mollitia illum. Fuga dignissimos doloribus ipsum accusantium impedit. Porro nam perspiciatis eaque qui ab voluptatum maiores quia laboriosam deserunt, illum dolore voluptatibus illo quas quae quos aliquid ipsam sed rerum delectus nobis! Voluptate iste laudantium debitis eaque, odio culpa beatae autem!
                                </p> -->
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-5 pl-lg-4 pr-lg-4 pl-md-4 pr-md-4">
                        <?php $form = ActiveForm::begin(['action' => 'site/checkout', 'method' => 'POST', 'id' => 'form', 'options' => ['autocomplete' => 'on'],], ['enctype' => 'multipart/form-data']); ?>
                            <div class=" m-auto bg-white rounded-2 p-lg-5 p-sm-2 text-center">
                                <div class="form-group mb-5">
                                    <h2 class="display-4" style="font-size:18px"><span class="bg-blue-2 p-1 pr-3 pl-3 rounded-2 text-white">COMPLETA ESTE FORMULARIO</span></h2>
                                    <p class="font-weight-lighter text-dark" style="font-size:20px">PARA SOLICITAR TU DEBIDA DILIGENCIA</p>
                                </div>
                                <div class="col-md-12">
                                    <?= $form->field($model, 'nombre')->textInput(['required' => 'required', 'class' => 'input-r pl-4 pr-4 pt-2 pb-2', 'placeholder' =>'Nombre'])->label(false) ?>
                                </div>
                                <div class="col-md-12">
                                    <?= $form->field($model, 'identificacion')->textInput(['required' => 'required', 'class' => 'input-r pl-4 pr-4 pt-2 pb-2', 'placeholder' =>'No. Pasaporte o Cédula'])->label(false) ?>
                                </div>
                                <div class="col-md-12">
                                    <?= $form->field($model, 'direccion')->textInput(['required' => 'required', 'class' => 'input-r pl-4 pr-4 pt-2 pb-2', 'placeholder' =>'Dirección'])->label(false) ?>

                                </div>
                                <div class="col-md-12">
                                    <div class="row ">
                                        <div class="col-md-6">
                                            <?= $form->field($model, 'ocupacion')->textInput(['required' => 'required', 'class' => 'input-r pl-4 pr-4 pt-2 pb-2', 'placeholder' =>'Ocupación'])->label(false) ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?= $form->field($model, 'correo')->textInput(['required' => 'required', 'class' => 'input-r pl-4 pr-4 pt-2 pb-2', 'placeholder' =>'Correo', 'type' => 'email'])->label(false) ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 pt-3 text-center font-weight-lighter">
                                    <p>DOCUMENTOS REQUERIDOS</p>
                                </div>
                                <div class="row">
                                    <div class="div-lab first col-md-6 icon-index mt-3 text-center">
                                        <?= $form->field($model, 'identificacion_url')->fileInput(['required' => 'required', 'id' => 'inputfile', 'value' => $model->identificacion_url, 'accept' => 'image/*'])->label('<i class="fas fa-file-upload"></i>') ?>
                                        <span class="font-weight-lighter">Pasaporte o Cédula</span>
                                    </div>
                                    <div class="div-lab second col-md-6 icon-index mt-3 text-center ">
                                        <?= $form->field($model, 'certificado_titulo_url')->fileInput(['required' => 'required', 'id' => 'inputfile2', 'value' => $model->identificacion_url, 'accept' => 'image/*'])->label('<i class="fas fa-file-upload"></i>') ?>
                                        <span class="font-weight-lighter">Certificado de titulo</span>
                                    </div>
                                </div>
                                <?= $form->field($model, 'amount')->hiddenInput(['value' => '120'])->label(false) ?>

                                <div class="check-box-container my-checkbox mt-5 mb-3">
                                   
                                    <label class="font-weight-normal small"><input type="checkbox" required>  Declaro que todas las informaciones ingresadas son correctas y autorizo su uso para los procesos que son relacionados a la solicitud de debida diligencia.</label>


                                    <p class="text-center mt-3 mb-1 ">PAGOS SEGUROS REALIZADOS CON</p>

                                    <div class="imagenes text-center mt-3 mb-5">
                                        <img class='mr-2' src="/frontend/web/images/stock/visa-logo.png" width="60px">
                                        <img class='mr-2' src="/frontend/web/images/stock/mastercard-logo.png" width="60px">
                                        <img class='mr-2' src="/frontend/web/images/stock/paypal-logo.png" width="70px">
                                    </div>

                                </div>
                                <input type="hidden" name="precio" value="<?= $constante ? $constante['contenido'] : 120 ?>">

                                <div class="col-md-6 m-auto text-center" style="margin-bottom: -4rem !important">
                                    <!-- <?//= Html::submitButton('PAGAR', ['class' => 'btn btn-success text-white rounded-3 pr-5 pl-5 font-weight-bold', 'style' => 'border-radius:50px']) ?> -->
                                    <a href="javascript:formSubmit('form')" class="btn btn-success text-white rounded-3 pr-5 pl-5 font-weight-bold">PAGAR</a>
                                </div>
                            </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <p class="text-center w-100 title-titulos"> <span class="bg-blue-2 p-1 pr-4 pl-4 font-weight-lighter rounded-2 text-white">TIPOS DE TITULOS</span> </p>

                <div class="pt-lg-4 pb-lg-4 pt-md-4 pb-md-4" style="background: #d5d8dd">
                    <div class="container d-xs-none">
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div id="carouselExampleControls22" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php $count = 0; $count2 = 0; ?>
                                        <?php foreach ($titulos as $m): ?>
                                            <?php 
                                                $count++; $count2++;
                                                $total = \frontend\models\Propiedades::find()->where(['ubicacion_id' => $m->id])->count();
                                            ?>
                                            <?php if ($count == 1 or $count2 == 1): ?>
                                                <div class="carousel-item row <?= $count==1 ? 'active' : '' ?>">
                                            <?php endif ?>
                                                    <a class="no-link text-dark" href="javascript:imgBigger('<?= $m->imagen_url ?>')">
                                                        <div class="col-md-3 col-lg-3" style="display: inline-block;">
                                                            <div class="pr-5 pl-5">
                                                                <img src="/frontend/web/<?= $m->imagen_url ?>" class="w-100" style="height:230px">
                                                            </div>
                                                            
                                                            <p class="text-center text-darkblue font-weight-normal font-14 mb-0 mt-4" style="font-family: 'Benton-book', Arial, sans-serif">
                                                                <?= mb_strtoupper($m->nombre) ?>
                                                             </p>
                                                        </div>
                                                    </a>
                                            <?php if ($count2 == 4):  ?>
                                                <?php $count2=0 ?>
                                                </div>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </div>

                                      
                                </div>
                            </div>

                            </div>

                            <!-- <div class="col-md-1">
                                <a class="carousel-control-next" href="#carouselExampleControls22" role="button" data-slide="next">
                                    <i class="fas fa-chevron-right text-blue fa-2x font-weight-bold float-left"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div> -->

                            
                            
                        </div>
                    </div>
                    <div class="container d-sm-none">
                        <div class="row mt-5">
                            <div class="col-md-12 col-xs-12">
                                <div id="carouselExampleControls23" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php $count = 0; $count2 = 0; ?>
                                        <?php foreach ($titulos as $m): ?>
                                            <?php 
                                                $count++;
                                                $total = \frontend\models\Propiedades::find()->where(['ubicacion_id' => $m->id])->count();
                                             ?>
                                            <div class="carousel-item <?= $count==1 ? 'active' : '' ?>">
                                                <a class="no-link text-dark" href="javascript:imgBigger('<?= $m->imagen_url ?>')">
                                                    <div class="col-md-3 col-lg-3" style="display: inline-block;">
                                                        <div class="pr-5 pl-5">
                                                            <img src="/frontend/web/<?= $m->imagen_url ?>" class="w-100" style="height:230px">
                                                        </div>
                                                        
                                                        <p class="text-center text-darkblue font-weight-normal font-14 mb-0 mt-4" style="font-family: 'Benton-book', Arial, sans-serif">
                                                            <?= mb_strtoupper($m->nombre) ?>
                                                         </p>
                                                    </div>
                                                </a>
                                            </div>    
                                        <?php endforeach ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls23" role="button" data-slide="prev" style="background: #444; top: -64px; padding-top: 70px; margin: 0px;bottom: 28px;">
                                        <i class="fas fa-chevron-left text-white fa-2x font-weight-bold float-left"></i>
                                        <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
                                        <span class="sr-only">Previous</span>
                                    </a> 
                                    <a class="carousel-control-next" href="#carouselExampleControls23" role="button" data-slide="next" style="background: #444; top: -64px; padding-top: 70px; margin: 0px;bottom: 28px;">
                                        <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
                                        <i class="fas fa-chevron-right text-white fa-2x font-weight-bold float-left"></i>
                                        <span class="sr-only">Next</span>
                                    </a>

                                      
                                </div>
                            </div>

                            </div>

                           
                            
                        </div>
                    </div>

                    <div class="container">
                        <p class="p-5">
                            La Jurisdicción Inmobiliaria de República Dominicana  emite cuatro certificados de título que reconocen derechos sobre la propiedad inmobiliaria, conoce el aspecto físico de cada título y su alcance jurídico.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

