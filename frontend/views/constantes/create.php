<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Constantes */

$this->title = 'Create Constantes';
$this->params['breadcrumbs'][] = ['label' => 'Constantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="constantes-create pb-5">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
