<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Formularios */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Formularios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<style>
    .table th{
        color: #000;
        font-weight: normal;
    }

    .table td{
        color: #0c1427 !important;
        font-weight: normal;
    }
</style>

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1 class="font-weight-lighter mb-2 mt-2"><?= Html::encode($this->title) ?></h1>
            <div class="bg-white p-3 mb-3">
                    <h2 class="font-weight-lighter">Información de la solicitud</h2>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        // 'id',
                        'nombre',
                        'identificacion',
                        'direccion',
                        'ocupacion',
                        'correo:email',
                        [
                            'label' => 'Pasaporte o Cédula',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return Html::a('Ver Imagen', [$data->identificacion_url], ['class' => 'font-weight-bold', 'target' => '_blank']);
                            },
                        ],
                        [
                            'label' => 'Certificado de titulo',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return Html::a('Ver Imagen', [$data->certificado_titulo_url], ['class' => 'font-weight-bold', 'target' => '_blank']);
                            },
                        ],
                        
                        'pago_total',
                        // 'procesado',
                        // 'email_notification',
                        // 'transaction_id',
                        
                        [
                            'label' => 'Pago',
                            'format' => 'raw',
                            'value' => function ($data) {
                                $transaccion = \frontend\models\TransactionDetails::findOne($data->transaction_id);
                                if ($transaccion) {
                                    if ($transaccion->state == 'COMPLETED') {
                                        return "<span class='text-success font-weight-bold font-12' >PAGO COMPLETADO</span>";
                                    }
                                }
                                return "<span class='text-warning font-weight-bold font-12' >PAGO NO COMPLETADO</span>";

                            },
                        ],
                        'date',
                    ],
                ]) ?>
            </div>

            <?php if ($transacciones): ?>
                <div class="bg-white p-3 mb-3">
                    <h2 class="font-weight-lighter">Información de la tansacción</h2>

                    <?= DetailView::widget([
                        'model' => $transacciones,
                        'attributes' => [
                            // 'id',
                            'state',
                            'payer_first_name',
                            'payer_last_name',
                            'payer_id',
                            'payer_email:email',
                            'country_code',
                            'invoice_number',
                            // 'amount',
                            // 'token',
                            // 'procesado',
                            'date',
                        ],
                    ]) ?>
                </div>
            <?php else: ?>
                <div class="bg-white p-3 mb-3 text-center">
                    <p class="font-weight-lighter h4">Esta persona no completó el pago</p>
                </div>
            <?php endif ?>
        </div>
    </div>

</div>
