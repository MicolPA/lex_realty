<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Desarrolladores */

$this->title = 'Create Desarrolladores';
$this->params['breadcrumbs'][] = ['label' => 'Desarrolladores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container pt-5">

    <?= $this->render('_form', [
        'model' => $model,
            'title' => 'CREAR DESARROLLADORA',
    ]) ?>

</div>
