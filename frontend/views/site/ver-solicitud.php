
<?php 

use yii\widgets\ActiveForm;
$this->title = "Consultar solicitud";

?>

<div class="mt-lg-5 mt-md-5 pb-lg-5 pb-md-5">
  <div class="container pb-5">

    <div class="row">
      <div class="col-md-9 m-auto">
        <div class="bg-darkblue w-100">
          <p class="title-light text-white text-center p-2 m-0">CONSULTA TU SOLICITUD</p>
        </div>
      </div>
    </div>

    <div class="row mb-5">
      <div class="col-md-9 m-auto">
        <div class="bg-white p-5 text-center">

            <?php $form = ActiveForm::begin(['method' => 'POST', 'options' => ['autocomplete' => 'off'],], ['enctype' => 'multipart/form-data']); ?>

	          	<div class="form-group mt-2">
	                <input type="text" class="input-r pl-4 pr-4 pt-3 pb-3" name="identificacion" placeholder="No. Pasaporte o Cédula" required>
		        </div>
		        <div class="form-group">
		            <input type="text" class="input-r pl-4 pr-4 pt-3 pb-3" name="no_transaccion" placeholder="No. Transacción" required>
		        </div>

		        <div class="form-group" style="margin-bottom: -4rem !important">
		        	<input type="submit" class="btn btn-success text-white rounded-3 pr-5 pl-5 font-weight-bold" value="CONSULTAR">
		        </div>
            <?php ActiveForm::end(); ?>

      </div>
    </div>

  </div>
</div>