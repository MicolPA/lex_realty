
<?php 

$this->title = "Pago realizado correctamente";

 ?>
<div class="mt-lg-5 mt-md-5 pb-lg-5 pb-md-5">
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <div class="bg-success w-100">
          <p class="font-weight-bold text-white text-center p-2 m-0">PAGO REALIZADO CORRECTAMENTE</p>
        </div>
      </div>
    </div>

    <div class="row mb-5">
      <div class="col-md-12">
        <div class="bg-white p-3">


          	<p class="h1 font-weight-lighter"><?= $model->nombre ?></p>
          	<hr>
          	<p class="mb-0">Monto pagado: <span class="">USD$<?= $model->pago_total ?></span> </p>
          	<p>No. de Transacción: <span class="text-success font-weight-bold"><?= $transaccion['invoice_number'] ?></span> </p>
          	<p>
          		Lorem ipsum dolor, sit amet, consectetur adipisicing elit. Dicta maxime, et ipsa tenetur, dolorum fugiat facilis quo similique odio error nostrum animi nemo delectus officia cum veritatis rem doloremque quos fuga numquam. Maiores nostrum doloremque illo voluptas, ducimus nisi natus dignissimos placeat ipsam. Quibusdam perspiciatis, cumque quis aliquam, iusto sapiente.
          	</p>

      </div>
    </div>

  </div>
</div>