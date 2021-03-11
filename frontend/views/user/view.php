<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */

$this->title = $model->first_name . ' ' . $model->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container">


    <div class="row">
        <div class="col-md-12 bg-white p-4 mt-4">
            <div class="row">
                <div class="col-md-4">
                    <img src="/frontend/web/<?= $model->photo_url ?>" width='100%'>
                </div>

                <div class="col-md-8 pt-5">
                    <p class="h2 font-weight-light"><?= $model->first_name . ' ' . $model->last_name ?></p>
                    <p class="h6 text-muted"><?= $model->inmobiliaria ?></p>
                    <?php 
                        $number = str_replace('-', '', $model->celular);
                        $number = str_replace('(', '', $number);
                        $number = str_replace(')', '', $number);
                    ?>
                    <?php if ($propiedad_id): ?>
                        <a href="/frontend/web/propiedades/enviar-propuesta?id=<?= $propiedad_id ?>&type=2&user_id=<?= $model->id ?>&propiedad=<?= $propiedad ?>" class="btn text-center btn-sm btn btn-dark h6 mt-3">ENVIAR CORREO</a>
                        <?php if ($number): ?>
                             <a href="http://wa.me/1<?= $number ?>" class="btn text-center btn-sm btn btn-success h6 mt-3" target='_blank'>HABLAR POR WHATSAPP</a>
                        <?php endif ?>
                    <?php endif ?>
                    
                </div>
            </div>
        </div>
    </div>

</div>
