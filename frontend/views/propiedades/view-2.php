<?php 

// use kartik\widgets\StarRating;
use yii\widgets\ActiveForm;
use kartik\rating\StarRating;
use yii\helpers\Html;

?>


<?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off'],], ['enctype' => 'multipart/form-data']); ?>



<?php

// Usage with ActiveForm and model

// Fractional ratings increasing by 0.1. Uses the
// default unicode star symbol instead of glyphicon star.
echo '<label class="control-label">Rating</label>';
echo StarRating::widget(['model' => $model, 'attribute' => 'titulo_publicacion', 
    'pluginOptions' => [
        'theme' => 'krajee-uni',
        'filledStar' => '&#x2605;',
        'emptyStar' => '&#x2606;'
        
    ]
]);
 

 
// Render a display only rating easily
echo StarRating::widget([
    'name' => 'titulo_publicacion',
    'value' => 3,
    'pluginOptions' => ['displayOnly' => true,'theme' => 'krajee-uni',]
]); ?>
<?= Html::submitButton('PAGAR', ['class' => 'btn btn-success text-white rounded-3 pr-5 pl-5 font-weight-bold', 'style' => 'border-radius:50px']) ?>
                <?php ActiveForm::end(); ?>
