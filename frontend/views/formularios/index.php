<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FormulariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicitudes';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <p class="mt-3">
                <span class="h2 title-light"><?= Html::encode($this->title) ?></span>
                <?= Html::a('Registrar', ['create'], ['class' => 'btn btn-pastel-blue text-white pr-5 pl-5 float-right mt-3 mb-3']) ?>
            </p>
        </div>

        <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

        <div class="col-md-12">
            <div class="card p-4">
                <div class="table-responsive">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            // 'id',
                            'nombre',
                            [
                                'label' => 'Identificación',
                                'attribute' => 'identificacion'
                            ],
                            // 'identificacion',
                            // 'direccion',
                            'ocupacion',
                            'correo',
                            //'identificacion_url:url',
                            //'certificado_titulo_url:url',
                            //'pagado',
                            //'pago_total',
                            //'procesado',
                            //'email_notification:email',
                            //'transaction_id',
                            //'pdf_url:url',
                            [
                                'label' => 'Pago',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    $transaccion = \frontend\models\TransactionDetails::findOne($data->transaction_id);
                                    if ($transaccion) {
                                        if ($transaccion->state == 'COMPLETED') {
                                            return "<span class='text-success font-weight-bold font-10' >PAGO COMPLETADO</span>";
                                        }
                                    }
                                    return "<span class='text-warning font-weight-bold font-10' >PAGO NO COMPLETADO</span>";

                                },
                            ],

                            [
                                'label' => '',
                                'format' => 'raw',
                                'visible' => Yii::$app->user->identity->id == 1 ? true : false,
                                'value' => function ($data) {
                                    $view =  Html::a('<i class="fas fa-eye text-primary mr-2"></i>', ['view', 'id' => $data->id], []);
                                    $update =  Html::a('<i class="fas fa-pencil-alt text-primary mr-2"></i>', ['update', 'id' => $data->id], []);
                                    $delete = Html::a('<i class="fas fa-trash text-danger mt-2"></i>', ['delete', 'id' => $data->id], [
                                        'data' => [
                                            'confirm' => '¿Está seguro/a que desea eliminar este registro?',
                                            'method' => 'post',
                                        ],
                                    ]);
                                         return "$view";
                                },
                            ],

                            // ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>


</div>

