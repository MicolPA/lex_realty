<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Propiedades */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Propiedades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="propiedades-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'titulo_publicacion',
            'tipo_propiedad',
            'ubicacion_id',
            'habitaciones',
            'baños',
            'riezgo_id',
            'impuestos',
            'cargas_gramabes',
            'deslinde',
            'certificado_titulo',
            'detalles',
            'user_id',
            'fecha_publicacion',
            'foto_1',
            'foto_2',
            'foto_3',
            'foto_4',
        ],
    ]) ?>

</div>
