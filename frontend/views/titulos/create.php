<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Titulos */

$this->title = 'Registrar Titulos';
$this->params['breadcrumbs'][] = ['label' => 'Titulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titulos-create">

    <?= $this->render('_form', [
        'model' => $model,
        'title' => Html::encode($this->title),
    ]) ?>

</div>
