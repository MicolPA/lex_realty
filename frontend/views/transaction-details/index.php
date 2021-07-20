<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TransactionDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transaction Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-details-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Transaction Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'state',
            'payer_first_name',
            'payer_last_name',
            'payer_id',
            //'payer_email:email',
            //'country_code',
            //'invoice_number',
            //'amount',
            //'token',
            //'procesado',
            //'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
