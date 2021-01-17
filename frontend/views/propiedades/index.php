<?php

use yii\helpers\Html;
use yii\grid\GridView;

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

    <div class="row p-2 mb-3" style="background: #808285">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-6 text-center">
                    <a class="text-white" href="#">UBICACIÓN <i class="fas fa-caret-down"></i></a>
                </div>

                 <div class="col-md-6 text-center">
                    <a class="text-white" href="#">CALIFICACIÓN <i class="fas fa-caret-down"></i></a>
                </div>

            </div>
        </div>
        <div class="col-md-4 text-center">

            <a class="text-white text-center">PRECIO <i class="fas fa-caret-down"></i></a>
            
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-6 text-center">
                    <a class="text-white" href="#">TIPO <i class="fas fa-caret-down"></i></a>
                </div>

                 <div class="col-md-6 text-center">
                    <a class="text-white" href="#">ORDENAR <i class="fas fa-caret-down"></i></a>
                </div>

            </div>    
        </div>
    </div>

    <div class="row mb-5 bg-lightgray">
    	<?php foreach ($dataProvider->query->all() as $m): ?>
            <?php $riesgo = \frontend\models\PropiedadesRiesgo::findOne($m->riezgo_id); ?>
    		<a href="/frontend/web/propiedades/ver?id=<?= $m->id ?>" class="no-link text-blue">
                <div class="col-md-4 mt-4">
                    <div class=" bg-white">
                        <div class="contenedor">
                            <img src="<?= $m->foto_1 ?>" width='100%' style="height:250px">
                            <div class="bg-<?= $riesgo['color'] ?> div_riesgo p-2 pr-4 pl-4 text-white">
                                <?= mb_strtoupper($riesgo['nombre']) ?>
                            </div>
                        </div>

                        <div class="pl-3 pb-3">
                            <p class="m-0 mt-2 text-blue font-weight-bold"><?= $m->titulo_publicacion ?></p>
                            <p class="m-0 mt-1 text-blue font-weight-normal"><?= $m->tipoPropiedad->nombre ?></p>

                            <hr>
                            <?php $check = $m->certificado_titulo == 1 ? 'check.png' : 'uncheck.png' ?>
                            <p class="m-0 small"><img src="/frontend/web/images/stock/<?= $check ?>" width="20px"> CERTIFICADO DE TITULO</p>

                            <?php $check = $m->impuestos == 1 ? 'check.png' : 'uncheck.png' ?>
                            <p class="m-0 small"><img src="/frontend/web/images/stock/<?= $check ?>" width="20px"> IMPUESTOS AL DÍA</p>

                            <?php $check = $m->cargas_gramabes == 1 ? 'check.png' : 'uncheck.png' ?>
                            <p class="m-0 small"><img src="/frontend/web/images/stock/<?= $check ?>" width="20px"> LIBRES DE CARGAS GRABAMES</p>

                            <?php $check = $m->deslinde == 1 ? 'check.png' : 'uncheck.png' ?>
                            <p class="m-0 small"><img src="/frontend/web/images/stock/<?= $check ?>" width="20px"> DESLINDE</p>


                            <a href="/frontend/web/propiedades/enviar-propuesta?id=<?= $m->id ?>" class="btn-block text-success text-center p-0 btn btn-outline-success mt-3" style="font-size: 20px">ENVIAR PROPUESTA</a>
                            <a href="#" class="btn-block bg-blue text-white text-center p-0" style="font-size: 22px">CONTACTAR UN AGENTE <i class="fas fa-phone-alt ml-3"></i></a>

                        </div>

                    </div>
                </div>      
            </a>
    	<?php endforeach ?>
    </div>

    

</div>
