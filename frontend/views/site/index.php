<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Propiedades';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" style="background-image: url('/frontend/web/images/banner-2.jpg');min-height: 800px; background-repeat: no-repeat;background-size: cover;">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-md-7 mt-4 d-xs-show" style="display: none">
                        <div class="bg-warning-2 pl-5 pr-5 text-center">
                            <h2 class="h1 font-weight-bold m-0 text-white">PROPIEDADES</h2>
                        </div>
                        <div class="bg-blue m-auto pl-2 text-center">
                            <h2 class="h1 p-2 text-white">RECOMENDADAS</h2>
                        </div>
                    </div> -->
                    <div class="col-md-5 mt-lg-5 pt-5">
                        <div class="bg-white p-4 div-buscador">
                            <?php $form = ActiveForm::begin(['action' => 'propiedades', 'method' => 'GET', 'options' => ['autocomplete' => 'off'],], ['enctype' => 'multipart/form-data']); ?>
                            <div class="p-lg-5">
                                <p class="h4 mb-3">Buscador de propiedad</p>
                                <p class="h5 font-weight-normal text-muted">Recomendamos nuestro listado de propiedades</p>

                                <div class="pt-3">
                                    <?php echo $form->field($model, 'ubicacion_id')->dropDownList(ArrayHelper::map(\frontend\models\Ubicaciones::find()->orderBy(['nombre'=>SORT_ASC])->all(), 'id', 'nombre'),['prompt'=>'Ubicacición', 'class' => 'form-control h5 p-3 font-weight-bold text-secondary'])->label(false); ?>

                                    <?php echo $form->field($model, 'tipo_propiedad')->dropDownList(ArrayHelper::map(\frontend\models\PropiedadesTipo::find()->orderBy(['nombre'=>SORT_ASC])->all(), 'id', 'nombre'),['prompt'=>'Tipo de propiedad', 'class' => 'form-control h5 p-3 font-weight-bold text-secondary'])->label(false); ?>

                                    <?= Html::submitButton('Buscar', ['class' => 'btn btn-warning text-white rounded-3 mt-2 pr-4 pl-4', 'style' => 'border-radius:50px']) ?>
                                </div>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                    <div class="col-md-7 mt-5 pt-5 pl-5 d-xs-none">
                        <div class="mt-5 pt-5 pl-5">
                            <br>
                            <div class="bg-warning-2 m-auto pl-5 pr-5 text-center w-fit">
                                <h2 class="display-4 font-weight-bold m-0 text-white">PROPIEDADES</h2>
                            </div>
                            <div class="bg-blue m-auto pl-2 text-center w-fit">
                                <h2 class="h1 p-2 text-white">RECOMENDADAS</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
