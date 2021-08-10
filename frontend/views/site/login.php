<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <div class="row mt-5 pt-5">
        <div class="col-lg-8 m-auto card mt-5 p-5">
            <img class="m-auto" src="/frontend/web/images/logo-principal-1.png" width="220px">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <div class="pl-5 pr-5 pt-5">
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Nombre de usuario') ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'rememberMe')->checkbox() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Iniciar sesión', ['class' => 'btn btn-gray btn-block input-r text-white', 'name' => 'login-button', 'style' => 'font-size:20px !important']) ?>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
