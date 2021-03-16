<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'USUARIOS';
$this->params['breadcrumbs'][] = $this->title;
$page = isset(Yii::$app->request->get()['lideres']) ? 5 : 6;
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p class="mt-3">
                <span class="h2 title-light"><?= Html::encode($this->title) ?></span>
                <?= Html::a('Registrar', ['/site/signup'], ['class' => 'btn btn-warning pr-5 pl-5 float-right mt-3 mb-4']) ?>
            </p>
        </div>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <div class="col-md-12">
            <div class="card p-4">
                <div class="table-responsive">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            // 'id',
                            'username',
                            'first_name',
                            'last_name',
                            'inmobiliaria',
                            [
                                'label' => '',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    $view =  Html::a('<i class="fas fa-eye text-dark mr-2"></i>', ['view', 'id' => $data->id], []);
                                    $update =  Html::a('<i class="fas fa-pencil-alt text-primary mr-2"></i>', ['update', 'id' => $data->id], []);
                                    $delete = Html::a('<i class="fas fa-trash text-danger mt-2"></i>', ['delete', 'id' => $data->id], [
                                        'data' => [
                                            'confirm' => '¿Está seguro/a que desea eliminar este registro?',
                                            'method' => 'post',
                                        ],
                                    ]);
                                    if (Yii::$app->user->identity->role_id == 1) {
                                        return "$view $update $delete";
                                       
                                    }else{
                                        return "$view";

                                    }
                                },
                            ],
                            // 'auth_key',
                            //'password_hash',
                            //'password_reset_token',
                            //'email:email',
                            //'status',
                            //'created_at',
                            //'updated_at',
                            //'verification_token',

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>

    

</div>
