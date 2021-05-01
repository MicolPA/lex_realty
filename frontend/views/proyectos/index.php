<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$count = $dataProvider->query->count();

$this->title = 'PROYECTOS';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .radios-div label{
        margin-right: 10px;
        color:#9d9fa0 !important;
    }
</style>

<div class="container">

    <div class="">
        <div class="row mt-5">
            <div class="col-md-12 text-center mb-3">
                <h1 class="h4 title-light"><?= Html::encode($this->title) ?></h1>
            </div>
        </div>

       
        <div class="row mb-5" style='padding-top: 0 !important'>
            <?php if ($count > 0): ?>
                <?php foreach ($model as $m): ?>
                        <div class="col-md-4 mt-4 mb-2">
                            <a href="/frontend/web/proyectos/ver?id=<?= $m->id ?>" class="no-link text-blue w-100">
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
                <?php endforeach ?>
            <?php else: ?>
                <div class="col-md-12 text-center">
                    <p class="text-darkblue mt-3">No se han encontrado resultados.</p>
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

            <?php if ($count > 0): ?>
                <div class="col-md-12 mt-5">
                    <div class="rounded bg-white p-3">
                        <?= $this->render('/pre-construcciones/_comments', []) ?>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>

    

</div>
