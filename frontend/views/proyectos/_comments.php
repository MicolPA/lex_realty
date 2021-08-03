<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\rating\StarRating;


$query = \frontend\models\StarsRatingCount::find()->where(['IS NOT', 'comment', null])->andWhere(['desarrollador_id' => $id])->orderBy(['id' => SORT_DESC]);
$countQuery = clone $query;
$pagination = new \yii\data\Pagination(['totalCount' => $countQuery->count()]);
$pagination->pageSize  = 10;
$model = $query->offset($pagination->offset)
->limit($pagination->limit)
->all();

?>
<style>
	.div-label label{
		margin-bottom: 0px !important;
	}

	.comment-content{
		border-left: 1px solid #ccc;
	    border-right: 1px solid #ccc;
	    border-bottom: 1px solid #ccc;
	    border-radius: 10px;
	    margin-top: -1rem !important;
	}
</style>
<?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off']]); ?>
	<div class="container p-md-5 p-lg-5">
		<div class="row p-md-5 p-lg-5">
			<div class=" mb-3">
				
			</div>
			<div class="row w-100 pl-lg-5 pl-md-5 pl-xs-4">
				<?php if ($query->count() > 1): ?>
					<p class="font-weight-bold text-darkblue font-14"><?= $query->count() ?> comentarios</p>
				<?php elseif ($query->count() == 1): ?>
				    <p class="font-weight-bold text-darkblue font-14"><?= $query->count() ?> comentario</p>
				<?php else: ?>
				    <p class="font-weight-bold text-darkblue font-14">No se han registrado comentarios.</p>
				<?php endif ?>
				<div class="col-md-12 p-md-0 pl-lg-0">
	                <?= $form->field($rating, 'email')->textInput(['required' => 'required', 'class' => 'form-control pl-4 pr-4 pt-2 pb-2', 'placeholder' =>'Correo', 'type' => 'email', 'style' => 'border-radius: 10px;font-size:16px'])->label(false) ?>
	            </div>
	            <div class="col-md-12 p-md-0 pl-lg-0">
	                <?= $form->field($rating, 'comment')->textarea(['required' => 'required', 'class' => 'form-control p-4', 'placeholder' =>'Comenzar un escrito...', 'type' => 'email', 'rows' => 4, 'style' => 'border-radius: 10px;font-size:16px'])->label(false) ?>
	            </div>
			</div>

			<div class="col-md-11 m-auto comment-content">
				<div class="row">
					<div class="col-md-12">
				        <div class="row align-items-center">
				            <div class="col-md-4 div-label">
				                <label class="font-12 font-weight-normal text-uppercase text-gray">Fecha de entrega</label>
				            </div>
				            <div class="col-md-2 pl-md-0">
				                <?= StarRating::widget(['model' => $rating, 'attribute' => 'fecha_entrega', 
				                        'language' => 'es',
				                        'pluginOptions' => [
				                            'theme' => 'krajee-uni',
				                            'filledStar' => '&#x2605;',
				                            'emptyStar' => '&#x2606;',
				                            'language' => 'es',
				                            'filledStar' => '<i class="fas fa-star"></i>',
				                            'emptyStar' => '<i class="fas fa-star"></i>',
				                            
				                        ]
				                    ]);
				                 ?> 
				            </div>
				            <div class="col-md-4 div-label">
				                <label class="font-12 font-weight-normal text-uppercase text-gray">Calidad de materiales </label>
				            </div>
				            <div class="col-md-2 pl-md-0">
				                <?= StarRating::widget(['model' => $rating, 'attribute' => 'calidad_materiales', 
				                        'language' => 'es',
				                        'pluginOptions' => [
				                            'theme' => 'krajee-uni',
				                            'filledStar' => '&#x2605;',
				                            'emptyStar' => '&#x2606;',
				                            'language' => 'es',
				                            'filledStar' => '<i class="fas fa-star"></i>',
				                            'emptyStar' => '<i class="fas fa-star"></i>',
				                            
				                        ]
				                    ]);
				                 ?> 
				            </div>
				        </div>
				        <div class="row align-items-center">
				            <div class="col-md-4 div-label">
				                <label class="font-12 font-weight-normal text-uppercase text-gray">Entrega de areas sociales  </label>
				            </div>
				            <div class="col-md-2 pl-md-0">
				                <?= StarRating::widget(['model' => $rating, 'attribute' => 'entrega_areas_sociales', 
				                        'language' => 'es',
				                        // 'required' => 'required',
				                        'pluginOptions' => [
				                            'theme' => 'krajee-uni',
				                            'filledStar' => '&#x2605;',
				                            'emptyStar' => '&#x2606;',
				                            'language' => 'es',
				                            'filledStar' => '<i class="fas fa-star"></i>',
				                            'emptyStar' => '<i class="fas fa-star"></i>',
				                            
				                        ]
				                    ]);
				                 ?> 
				            </div>
				            <div class="col-md-4 div-label">
				                <label class="font-12 font-weight-normal text-uppercase text-gray">Entrega según diseño original </label>
				            </div>
				            <div class="col-md-2 pl-md-0">
				                <?= StarRating::widget(['model' => $rating, 'attribute' => 'entrega_design', 
				                        'language' => 'es',
				                        'pluginOptions' => [
				                            'theme' => 'krajee-uni',
				                            'filledStar' => '&#x2605;',
				                            'emptyStar' => '&#x2606;',
				                            'language' => 'es',
				                            'filledStar' => '<i class="fas fa-star"></i>',
				                            'emptyStar' => '<i class="fas fa-star"></i>',
				                            
				                        ]
				                    ]);
				                 ?> 
				            </div>
				        </div>
				        <div class="row align-items-center">
				            <div class="col-md-4 div-label">
				                <label class="font-12 font-weight-normal text-uppercase text-gray">Seguimiento durante la contrucción  </label>
				            </div>
				            <div class="col-md-2 pl-md-0">
				                <?= StarRating::widget(['model' => $rating, 'attribute' => 'seguimiento_construccion', 
				                        'language' => 'es',
				                        // 'required' => 'required',
				                        'pluginOptions' => [
				                            'theme' => 'krajee-uni',
				                            'filledStar' => '&#x2605;',
				                            'emptyStar' => '&#x2606;',
				                            'language' => 'es',
				                            'filledStar' => '<i class="fas fa-star"></i>',
				                            'emptyStar' => '<i class="fas fa-star"></i>',
				                            
				                        ]
				                    ]);
				                 ?> 
				            </div>
				           
				        </div>
				        
			            
		        	</div>

	        	</div>

	        </div>
	        <div class="row w-100 align-items-center" style="margin-top:-1rem">
	            
	            <div class="col-md-12">
	                <div class="form-group text-center">
	                    <?= Html::submitButton('ENVIAR', ['class' => 'bg-blue-2 btn text-white rounded-3 pr-5 pl-5 font-weight-bold font-14', 'style' => 'border-radius:50px;font-size:12px !important']) ?>
	                </div>
	            </div>
	        </div>
	        
			
	        
	        
	    </div>
		<?php foreach ($model as $m): ?>
			<div class="col-md-12 pl-5 pr-5 mb-4">
				<div class="border p-4" style="min-height:80px;border-radius: 10px;">
					<p class="font-12 p-md-5 p-lg-3">
						<span class="font-weight-bold font-14"><?= $m->email ?> <span class="text-gray font-12">( <?= date('d/m/Y', strtotime(str_replace('-','/', $m->date))) ?> )</span> </span><br>
						<?= $m->comment ?>
					</p>
				</div>
			</div>
		<?php endforeach ?>
		<div class="col-md-12 p-lg-5">
            <div class="text-center">
                <?php 
                    // display pagination
                    echo \yii\widgets\LinkPager::widget([
                        'pagination' => $pagination,
                        'options' => [
                            'class' => 'pagination text-blue float-right',

                        ],
                        'linkOptions' => ['class' => 'page-link text-blue'],
                        'prevPageLabel' => false,
                        'nextPageLabel' => false,

                    ]);
                ?>
            </div>

        </div>
	</div>
<?php ActiveForm::end(); ?>
