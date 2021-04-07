<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$count = $dataProvider->query->count();
$get = Yii::$app->request->get();
$precio = isset($get['precio']) ? $get['precio'] : '';
$calificacion = isset($get['calificacion']) ? $get['calificacion'] : '';
$precio_desde = isset($get['precio_desde']) ? $get['precio_desde'] : '';
$precio_hasta = isset($get['precio_hasta']) ? $get['precio_hasta'] : '';

$this->title = 'PROPIEDADES';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .radios-div label{
        margin-right: 10px;
        color:#9d9fa0 !important;
    }
</style>

<div class="container">

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 text-center mb-3">
                <h1 class="h4 title-light"><?= Html::encode($this->title) ?></h1>
            </div>
        </div>

        <div class="row">
            <div class="text-center bg-white" style="width: 125px">
                <p class="h6 font-weight-bold mt-1 text-blue mb-1">FILTROS</p>
            </div>
        </div>
        <div class="row pt-2 bg-darkblue mb-0" id="accordion">
            <div class="col-md-2">
                <a class="text-white font-weight-bold-2 font-12" data-toggle="collapse" data-target="#collapseUbicacion" aria-expanded="true" aria-controls="collapseUbicacion" href="#">UBICACIÓN <i class="fas fa-caret-down"></i></a>
            </div>
            <div class="col-md-4 text-lg-left">

                <div class="dropdown">
                    <a class="text-white font-weight-bold-2 font-12" data-toggle="collapse" data-target="#collapsePrecio" aria-expanded="true" aria-controls="collapsePrecio" href="#">PRECIO <i class="fas fa-caret-down"></i></a>
                </div>
            </div>
            <div class="col-md-2 text-lg-left">

                <div class="dropdown">
                    <a class="text-white font-weight-bold-2 font-12" data-toggle="collapse" data-target="#collapseCalificacion" aria-expanded="true" aria-controls="collapseCalificacion" href="#">CALIFICACIÓN <i class="fas fa-caret-down"></i></a>
                </div>

                
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-6 text-lg-left">
                    <a class="text-white font-weight-bold-2 font-12 pl-2" data-toggle="collapse" data-target="#collapseTipo" aria-expanded="true" aria-controls="collapseUbicacion" href="#">TIPO <i class="fas fa-caret-down"></i></a>
                    </div>

                </div>    
            </div>
        </div>
        <?php $form = ActiveForm::begin(['action' => 'propiedades', 'method' => 'GET', 'options' => ['autocomplete' => 'off'],], ['enctype' => 'multipart/form-data']); ?>
        <div class="row bg-white pt-4 mb-4">

            <div class="col-md-2 text-center">
                <?php echo $form->field($searchModel, 'ubicacion_id')->dropDownList(ArrayHelper::map(\frontend\models\Ubicaciones::find()->orderBy(['nombre'=>SORT_ASC])->all(), 'id', 'nombre'),['class' => 'input-r pl-4 pr-4 pt-2 pb-2', 'prompt' => 'Todas'])->label(false); ?>
            </div>

            <div class="col-md-2">
                <input type="text" name='precio_desde' class="input-r pl-4 pr-4 pt-2 pb-2" placeholder="DESDE" value="<?= $precio_desde ?>">
            </div>
            <div class="col-md-2">
                <input type="text" name='precio_hasta' class="input-r pl-4 pr-4 pt-2 pb-2" placeholder="HASTA" value="<?= $precio_hasta ?>">
            </div>

            <div class="col-md-2 radios-div">
                <?= $form->field($searchModel, 'riezgo_id')->label('')->radioList(['' => 'Todas', 1 => 'A+'], ['class' => 'mt-0', 'style' => 'margin-top:-1rem !important']); ?>
            </div>
            <div class="col-md-2">
                <?php echo $form->field($searchModel, 'tipo_propiedad')->dropDownList(ArrayHelper::map(\frontend\models\PropiedadesTipo::find()->orderBy(['nombre'=>SORT_ASC])->all(), 'id', 'nombre'),['class' => 'input-r pl-4 pr-4 pt-2 pb-2', 'prompt' => 'Todos'])->label(false); ?>
            </div>
            <div class="col-md-2 text-right">
                <?= Html::submitButton('Aplicar Filtros', ['class' => 'btn btn-pastel-blue text-white rounded-3 btn-sm pr-3 pl-3', 'style' => 'border-radius:50px;']) ?>
            </div>

        </div>
        <?php ActiveForm::end(); ?>

        <!-- <div class="row mb-2">
            <div class="col-md-12 p-lg-0 text-right">
                <a href="javascript:buscar('form-search')" class="btn pl-4 pr-4 text-white btn-sm" style="border-radius: 0px;background: #44546b">Aplicar filtros</a>
                <a href="/frontend/web/propiedades" class="btn btn-secondary pl-4 pr-4 text-white btn-sm" style="border-radius: 0px">Limpiar búsqueda</a>
                <a class="btn pl-4 pr-4 text-white btn-sm" style="border-radius: 0px;background: #628eaf">RESULTADOS <?= $count ?></a>
            </div>
        </div> -->

        <div class="row mb-5 <?= $count > 0 ? "bg-lightgray" : "" ?> p-4" style='padding-top: 0 !important'>
            <?php if ($count > 0): ?>
                <?php foreach ($model as $m): ?>
                    <a href="/frontend/web/propiedades/ver?id=<?= $m->id ?>&first=<?= $m->id ?>" class="no-link text-blue">
                        <div class="col-md-4 mt-4 mb-2">
                            <div class="bg-white">
                                <div class="contenedor w-100">
                                    <div style="width: 100%;height: 200px;background-image: url('/frontend/web/<?= $m->foto_1 ?>');background-size:cover;background-position:center;"></div>
                                    <div class="bg-darkblue pt-1 pb-1">
                                        <p class="text-center text-white font-12 mb-0" style="font-family: 'Benton-book', Arial, sans-serif"><?= mb_strtoupper($m->ubicacion->nombre) ?></p>
                                    </div>
                                   
                                </div>

                                <div class="pl-3 pb-3">
                                    <div class="row mb-2">
                                        
                                        <div class="col-md-7 col-sm-7 col-lg-7 col-xs-7 pr-0" style="height: 80px">
                                            <p class="m-0 mt-3 text-blue font-weight-light title-cards-f"><?= $m->titulo_publicacion ?></p>
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-lg-5 col-xs-5">
                                            <?php if ($m->riezgo_id == 1): ?>
                                                <div class="bg-gray2 text-center pt-2 pb-2">
                                                    <p class="mb-0 text-white h5 font-weight-light">A+</p>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    

                                    <p class="font-weight-bold font-18 mt-2 mb-2">US$<?= number_format($m->precio, 2) ?></p>
                                    <p class="text-muted m-0 font-12 mb-2">
                                         <?php if ($m->tipo_propiedad != 2): ?>
                                            <img src="/frontend/web/images/bed-icon.png" width='35px'> <?= $m->habitaciones ?>
                                            <img src="/frontend/web/images/shower-icon.png" width='35px'> <?= $m->baños ?>
                                         <?php endif ?>
                                         <img src="/frontend/web/images/size-icon.png" width='35px'> <?= number_format($m->metros, 2) ?> M<sup>2</sup>
                                        
                                    </p>
                                    
                                    <div class="detalles" style="height: 60px;font-family: 'Benton-book', Arial, sans-serif">

                                        <?php $check = $m->certificado_titulo ? "dot-full-2.png" : 'dot.png' ?>
                                        <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> CERTIFICADO DE TITULO</p>

                                        <?php $check = $m->impuestos ? "dot-full-2.png" : 'dot.png' ?>
                                        <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> IMPUESTOS AL DÍA</p>

                                        <?php $check = $m->cargas_gramabes ? "dot-full-2.png" : 'dot.png' ?>
                                        <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> LIBRES DE CARGAS GRABAMES</p>
                                        <?php $check = $m->deslinde ? "dot-full-2.png" : 'dot.png' ?>
                                        <p class="m-0 small text-gray"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> DESLINDE</p>
                                    </div>
                                    

                                    
                                    <a href="/frontend/web/propiedades/agente?id=<?= $m->id ?>" class="btn-block bg-blue text-white text-center p-0 h5 pt-1 pb-1" style="visibility: hidden;">CONTACTAR UN AGENTE <i class="fas fa-phone-alt ml-3"></i></a>

                                </div>

                            </div>
                        </div>      
                    </a>
                <?php endforeach ?>

            <?php else: ?>
                <div class="col-md-12 text-center">
                    <p class="text-darkblue mt-3">No se han encontrado resultados que coincidan con la búsqueda.</p>
                </div>
            <?php endif ?>
        </div>

        <div class="row">
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
        </div>
    </div>

    

</div>
