<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Inicio';
?>
<?= $this->render('_index_styles') ?>
<div class="container-fluid">
    <div class="row" style=";">
        <div class="col-md-12 p-0" style="">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item home-carousel-item active">
                  <img src="/frontend/web/images/slide.jpg" class="d-block w-100 c-image">
                </div>
                <!-- <div class="carousel-item home-carousel-item">
                  <img src="/frontend/web/images/slide-2.jpg" class="d-block w-100 c-image">
                </div>
                <div class="carousel-item home-carousel-item">
                  <img src="/frontend/web/images/slide-3.jpg" class="d-block w-100 c-image">
                </div> -->
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
            <div class="d-cont" style=";position: absolute;top: 0px;width: 100%;opacity: 0.9;background: rgb(14,22,41);
background: linear-gradient(0deg, rgba(14,22,41,1) 0%, rgba(14,42,79,1) 100%);">
            </div>
            <div class="">
                <div class='row align-items-center div-content-home' style="margin: auto !important;top: 80px;width: 100%">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9 float-right text-inicio text-white text-right m-0 pr-lg-0 pr-md-0 div-big-auto" style="height:500px">
                                <div id="carouselExampleControls" class="carousel slide h-100" data-ride="carousel">
                                  <div class="carousel-inner h-100">
                                    <div class="carousel-item home-carousel-item active h-100">
                                      <img src="/frontend/web/images/slide.jpg" class="d-block w-100 c-image h-100 rounded-left-2">
                                    </div>
                                    <div class="carousel-item home-carousel-item h-100">
                                      <img src="/frontend/web/images/slide-2.jpg" class="d-block w-100 c-image h-100 rounded-left-2">
                                    </div>
                                    <div class="carousel-item home-carousel-item h-100">
                                      <img src="/frontend/web/images/slide-3.jpg" class="d-block w-100 c-image h-100 rounded-left-2">
                                    </div>
                                  </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-5 pl-lg-0 pr-lg-4 pl-md-0 pr-md-4">
                        <?php $form = ActiveForm::begin(['action' => 'site/checkout', 'method' => 'POST', 'id' => 'form', 'options' => ['autocomplete' => 'on'],], ['enctype' => 'multipart/form-data']); ?>
                            <div class=" m-auto bg-white rounded-right-2 p-lg-5 p-sm-2 text-center div-big-auto" style="height:500px">
                                <div class="form-group mb-5 div-titles-2">
                                    <h2 class="display-4" style="font-size:18px"><span class="bg-blue-2 p-1 pr-3 pl-3 rounded-2 text-white">COMPLETA ESTE FORMULARIO</span></h2>
                                    <p class="font-weight-lighter text-dark mb-0" style="font-size:20px">PARA SOLICITAR TU DEBIDA DILIGENCIA</p>
                                </div>
                                <div class="div-form">
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
                                </div>
                                <?= $form->field($model, 'amount')->hiddenInput(['value' => $constante ? $constante['contenido'] : 120])->label(false) ?>
                                <div class="div-files" style="display:none">
                                    <div class="text-center font-weight-lighter">
                                        <p>DOCUMENTOS REQUERIDOS</p>
                                    </div>
                                    <div class="row">
                                        <div class="div-lab first col-md-6 icon-index mt-3 text-center">
                                            <?= $form->field($model, 'identificacion_url')->fileInput(['required' => 'required','id' => 'inputfile', 'value' => $model->identificacion_url, 'accept' => 'image/*'])->label('<i class="fas fa-file-upload"></i>') ?>
                                            <span class="font-weight-lighter">Pasaporte o Cédula</span>
                                        </div>
                                        <div class="div-lab second col-md-6 icon-index mt-3 text-center">
                                            <?= $form->field($model, 'certificado_titulo_url')->fileInput(['required' => 'required','id' => 'inputfile2', 'value' => $model->identificacion_url, 'accept' => 'image/*'])->label('<i class="fas fa-file-upload"></i>') ?>
                                            <span class="font-weight-lighter">Certificado de titulo</span>
                                        </div>
                                    </div>

                                    <div class="check-box-container my-checkbox mt-3 mb-3">
                                       
                                        <label class="font-weight-normal small"><input type="checkbox" required>  Declaro que todas las informaciones ingresadas son correctas y autorizo su uso para los procesos que son relacionados a la solicitud de debida diligencia.</label>


                                        <p class="text-center mt-3 mb-1 ">PAGOS SEGUROS REALIZADOS CON</p>

                                        <div class="imagenes text-center mt-3 mb-2">
                                            <img class='mr-2' src="/frontend/web/images/stock/visa-logo.png" width="60px">
                                            <img class='mr-2' src="/frontend/web/images/stock/mastercard-logo.png" width="60px">
                                            <img class='mr-2' src="/frontend/web/images/stock/paypal-logo.png" width="70px">
                                        </div>

                                    </div>
                                    <div class="col-md-6 m-auto text-center">
                                        <!-- <?//= Html::submitButton('PAGAR', ['class' => 'btn btn-success text-white rounded-3 pr-5 pl-5 font-weight-bold', 'style' => 'border-radius:50px']) ?> -->
                                        <a href="javascript:formSubmit('form')" class="btn btn-success text-white rounded-3 pr-5 pl-5 font-weight-bold">PAGAR</a>
                                    </div>
                                </div>
                                <input type="hidden" name="precio" value="<?= $constante ? $constante['contenido'] : 120 ?>">
                                <a href="javascript:formVerify('form')" class="btn btn-success text-white rounded-3 pr-5 pl-5 font-weight-bold btn-continue">CONTINUAR</a>
                                
                            </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                    <div class="col-md-8 m-auto text-white pt-5 font-12">
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Sed, fuga amet. Odio molestiae non a natus quidem repudiandae corrupti quisquam animi libero porro? Eveniet blanditiis laboriosam voluptatem minus saepe unde qui, nisi, suscipit est facere, inventore dolor provident animi porro ad deserunt nulla cum totam nemo ratione? Et accusamus quos ad quam reprehenderit illo assumenda ipsa sit quis ipsum necessitatibus, odit hic aut non eligendi architecto. 
                        </p>

                        <p>
                            Tempora harum eius totam ad non incidunt, autem aut corporis, deserunt amet quo cupiditate rerum quibusdam libero dolore, necessitatibus molestias cumque quas alias accusamus magni quae iure. Et itaque ipsam cupiditate eos eius ducimus officiis odit quidem, qui dolores animi porro quos explicabo officia reprehenderit voluptatum id molestias natus quam necessitatibus labore voluptates veritatis.
                        </p>
                    </div>
                </div>
                

                <div class="pt-lg-4 pb-lg-4 pt-md-4 pb-md-4 background-image" style="background-image: url(/frontend/web/images/slide.jpg);height: 300px;background-position: bottom !important;">
                    <div class="container d-xs-none">
                        <div class="row content-titulos" style="margin-top: -10rem;">
                            <div class="col-md-12">
                                <p class="text-center w-100 title-titulos"> <span class="bg-blue-2 p-1 pr-4 pl-4 font-weight-lighter rounded-2 text-white">TIPOS DE TITULOS</span> </p>
                            </div>
                            <div class="col-md-12 bg-white p-5 rounded">
                                <div id="carouselExampleControls22" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php $count = 0; $count2 = 0; ?>
                                        <?php foreach ($titulos as $m): ?>
                                            <?php 
                                                $id = "exampleModal".$m->id;
                                                $count++; $count2++;
                                                $total = \frontend\models\Propiedades::find()->where(['ubicacion_id' => $m->id])->count();
                                            ?>
                                            <?php if ($count == 1 or $count2 == 1): ?>
                                                <div class="carousel-item mt-4 w-fit-content m-auto row align-items-center <?= $count==1 ? 'active' : '' ?>">
                                            <?php endif ?>
                                                <a class="no-link text-dark w-100" href="#" data-toggle="modal" data-target="#<?= $id ?>">
                                                    <div class="col-2 mr-4 ml-5" style="display: inline-block;">
                                                        <div class="pr-5 pl-5 background-image" style="height: 175px;background: url('/frontend/web/<?= $m->imagen_url ?>');">
                                                            <!-- <img src="/frontend/web/<?//= $m->imagen_url ?>" class="w-100" style="height:230px"> -->
                                                        </div>
                                                        
                                                        <p class="text-center text-darkblue font-weight-normal font-11 mb-0 mt-2" style="font-family: 'Benton-book', Arial, sans-serif">
                                                            <?= mb_strtoupper($m->nombre) ?>
                                                         </p>
                                                    </div>
                                                </a>
                                            <?php if ($count2 == 4):  ?>
                                                <?php $count2=0 ?>
                                                </div>
                                            <?php endif ?>
                                            <?php echo $this->render('_titulo_detail', ['foto' => $m->imagen_url, 'id' => "$id", 'titulo' => $m->nombre, 'descripcion' => $m->descripcion]); ?>
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
                    <div class="container d-sm-none" style="margin-top: -8rem;">
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
                                                            <img src="/frontend/web/<?= $m->imagen_url ?>" class="w-100" style="height:480px">
                                                        </div>
                                                        
                                                        <p class="text-center text-darkblue font-weight-normal font-14 mb-0 mt-4" style="font-family: 'Benton-book', Arial, sans-serif">
                                                            <?= mb_strtoupper($m->nombre) ?>
                                                         </p>
                                                    </div>
                                                </a>
                                            </div>    
                                        <?php endforeach ?>
                                    </div>
                                    <!-- <a class="carousel-control-prev" href="#carouselExampleControls23" role="button" data-slide="prev" style="background: #444; top: -64px; padding-top: 70px; margin: 0px;bottom: 28px;">
                                        <i class="fas fa-chevron-left text-white fa-2x font-weight-bold float-left"></i>
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a> 
                                    <a class="carousel-control-next" href="#carouselExampleControls23" role="button" data-slide="next" style="background: #444; top: -64px; padding-top: 70px; margin: 0px;bottom: 28px;">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <i class="fas fa-chevron-right text-white fa-2x font-weight-bold float-left"></i>
                                        <span class="sr-only">Next</span>
                                    </a> -->

                                      
                                </div>
                            </div>

                            </div>

                           
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

