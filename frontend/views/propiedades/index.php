<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

$count = $dataProvider->query->count();
$get = Yii::$app->request->get();
$precio = isset($get['precio']) ? $get['precio'] : '';

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PropiedadesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'PROPIEDADES';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <div class="row mt-5">
        <div class="col-md-12 text-center mb-3">
            <h1 class="text-white h4"><?= Html::encode($this->title) ?></h1>
        </div>
    </div>

    <div class="row">
        <div class="text-center bg-white" style="border-radius:12px 12px 0px  0px;width: 125px">
            <p class="h6 font-weight-bold mt-1 text-blue mb-1">FILTROS</p>
        </div>
    </div>
    <div class="row p-2 mb-2" id="accordion" style="background: #808285">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-6 text-lg-center">
                    <a class="text-white font-weight-bold-2" data-toggle="collapse" data-target="#collapseUbicacion" aria-expanded="true" aria-controls="collapseUbicacion" href="#">UBICACIÓN <i class="fas fa-caret-down"></i></a>
                </div>

                <div class="col-md-6 text-lg-center">
                    <!-- <a class="text-white font-weight-bold-2" href="#">CALIFICACIÓN <i class="fas fa-caret-down"></i></a> -->
                </div>

            </div>
        </div>
        <div class="col-md-4 text-lg-center">

            <div class="dropdown">
                <a class="text-white font-weight-bold-2" data-toggle="collapse" data-target="#collapsePrecio" aria-expanded="true" aria-controls="collapseUbicacion" href="#">PRECIO <i class="fas fa-caret-down"></i></a>
            </div>

            
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-6 text-lg-center">
                    <!-- <a class="text-white font-weight-bold-2" href="#">ORDENAR <i class="fas fa-caret-down"></i></a> -->
                </div>
                <div class="col-md-6 text-lg-center">
                <a class="text-white font-weight-bold-2" data-toggle="collapse" data-target="#collapseTipo" aria-expanded="true" aria-controls="collapseUbicacion" href="#">TIPO <i class="fas fa-caret-down"></i></a>
                </div>

            </div>    
        </div>
        <div class="col-md-12">
            <?php $form = ActiveForm::begin(['method' => 'GET', 'id' => 'form-search', 'action' => '/frontend/web/propiedades'], ['enctype' => 'multipart/form-data']); ?>

                <div id="collapseUbicacion" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="mt-3">
                    <?php foreach ($ubicaciones as $u): ?>
                        <div class="custom-control custom-checkbox mb-3" style="width: fit-content;display: inline-block;">
                          <input type="checkbox" class="custom-control-input" id="ub_<?= $u->id ?>" name="ubicacion[<?= $u->id ?>" <?= isset($get["ubicacion_$u->id"]) ? "checked" : "" ?>>
                          <label class="custom-control-label text-white mr-2" for="ub_<?= $u->id ?>"><?= $u->nombre ?></label>
                        </div>
                    <?php endforeach ?>
                  </div>
                </div>
                <div class="collapse" id="collapseTipo" data-parent="#accordion">
                  <div class="mt-3">
                    <?php foreach ($tipos as $u): ?>
                        <div class="custom-control custom-checkbox mb-3" style="width: fit-content;display: inline-block;">
                          <input type="checkbox" class="custom-control-input" id="tipo_<?= $u->id ?>" name="tipo[<?= $u->id ?>" <?= isset($get["tipo_$u->id"]) ? "checked" : "" ?>>
                          <label class="custom-control-label text-white mr-2" for="tipo_<?= $u->id ?>"><?= $u->nombre ?></label>
                        </div>
                    <?php endforeach ?>
                  </div>
                </div>

                <div class="collapse" id="collapsePrecio" data-parent="#accordion">
                    <div class="custom-control custom-radio" style="width: fit-content;display: inline-block;">
                        <input type="radio" class="custom-control-input" id="precio_bajo" name="precio" value="1" <?= $precio == "1" ? "checked" : "" ?>>
                        <label class="custom-control-label text-white mr-2" for="precio_bajo">Menor a mayor</label>
                    </div>
                    <div class="custom-control custom-radio" style="width: fit-content;display: inline-block;">
                        <input type="radio" class="custom-control-input" id="precio_alto" name="precio" value="2" <?= $precio == "2" ? "checked" : "" ?>>
                        <label class="custom-control-label text-white mr-2" for="precio_alto">Mayor a menor</label>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <div class="row mb-1">
        <div class="col-md-4 p-lg-0">
            <a href="javascript:buscar('form-search')" class="btn btn-warning pl-4 pr-4 text-white">Aplicar filtros</a>
            <a href="/frontend/web/propiedades" class="btn btn-secondary pl-4 pr-4 text-white">Limpiar búsqueda</a>
        </div>
        <div class="col-md-8">
            <p class="text-right text-white font-weight-bold">RESULTADOS <?= $count ?></p>
        </div>
    </div>

    <div class="row mb-5 <?= $count > 0 ? "bg-lightgray" : "" ?>">
    	<?php if ($count > 0): ?>
            <?php foreach ($dataProvider->query->all() as $m): ?>
                <?php $riesgo = \frontend\models\PropiedadesRiesgo::findOne($m->riezgo_id); ?>
                <a href="/frontend/web/propiedades/ver?id=<?= $m->id ?>" class="no-link text-blue">
                    <div class="col-md-4 mt-4">
                        <div class=" bg-white">
                            <div class="contenedor">
                                <img src="/frontend/web/<?= $m->foto_1 ?>" width='100%' style="height:250px">
                                <?php if ($riesgo): ?>
                                    <div class="bg-<?= $riesgo['color'] ?> div_riesgo p-2 pr-4 pl-4 text-white">
                                        <?= mb_strtoupper($riesgo['nombre']) ?>
                                    </div>
                                <?php endif ?>
                            </div>

                            <div class="pl-3 pb-3">
                                <p class="m-0 mt-2 text-blue font-weight-bold"><?= $m->titulo_publicacion ?></p>
                                <p class="m-0 mt-1 text-blue font-weight-normal"><?= $m->tipoPropiedad->nombre ?></p>

                                <hr>

                                <p class="font-weight-bold h3 mb-2">US$<?= number_format($m->precio) ?></p>
                                <?php $check = $m->certificado_titulo == 1 ? 'check.png' : 'uncheck.png' ?>
                                <p class="m-0 small"><img src="/frontend/web/images/stock/<?= $check ?>" width="20px"> CERTIFICADO DE TITULO</p>

                                <?php $check = $m->impuestos == 1 ? 'check.png' : 'uncheck.png' ?>
                                <p class="m-0 small"><img src="/frontend/web/images/stock/<?= $check ?>" width="20px"> IMPUESTOS AL DÍA</p>

                                <?php $check = $m->cargas_gramabes == 1 ? 'check.png' : 'uncheck.png' ?>
                                <p class="m-0 small"><img src="/frontend/web/images/stock/<?= $check ?>" width="20px"> LIBRES DE CARGAS GRABAMES</p>

                                <?php $check = $m->deslinde == 1 ? 'check.png' : 'uncheck.png' ?>
                                <p class="m-0 small"><img src="/frontend/web/images/stock/<?= $check ?>" width="20px"> DESLINDE</p>


                                <a href="/frontend/web/propiedades/enviar-propuesta?id=<?= $m->id ?>" class="btn-block text-success text-center p-0 btn btn-outline-success mt-3" style="font-size: 20px">ENVIAR PROPUESTA</a>
                                <a href="/frontend/web/propiedades/agente?id=<?= $m->id ?>" class="btn-block bg-blue text-white text-center p-0" style="font-size: 22px">CONTACTAR UN AGENTE <i class="fas fa-phone-alt ml-3"></i></a>

                            </div>

                        </div>
                    </div>      
                </a>
            <?php endforeach ?>
        <?php else: ?>
            <div class="col-md-12 text-center">
                <p class="text-white">No se han encontrado resultados que coincidan con la búsqueda.</p>
            </div>
        <?php endif ?>
    </div>

    

</div>
