<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PropiedadesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Propiedades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="propiedades-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Propiedades', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'titulo_publicacion',
            'tipo_propiedad',
            'ubicacion_id',
            'habitaciones',
            //'baños',
            //'riezgo_id',
            //'impuestos',
            //'cargas_gramabes',
            //'deslinde',
            //'certificado_titulo',
            //'detalles',
            //'user_id',
            //'fecha_publicacion',
            //'foto_1',
            //'foto_2',
            //'foto_3',
            //'foto_4',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
