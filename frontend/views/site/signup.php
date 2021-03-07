<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
// use yii\bootstrap\ActiveForm;

$this->title = 'REGISTRAR USUARIOS';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">


    <div class="row">
        <div class="col-lg-8 m-auto">
            <h1 class="title-light h3 mt-5"><?= Html::encode($this->title) ?></h1>
                <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off'],], ['enctype' => 'multipart/form-data']); ?>

                <div class="bg-white p-4 mb-4">
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <div class="form-group text-center">
                        <?= Html::submitButton('Siguiente', ['class' => 'btn btn-warning rounded-3']) ?>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
