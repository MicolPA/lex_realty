

<div class="col-md-12" style="background: #0e1227; padding:4rem;width:100%">

	<div class="mt3" style="border-radius: 10px; background: #fff;padding:3rem;width:40% ;max-width:500px;margin:auto;min-width: 300px ">
		<div style="background: #44546b;margin-bottom: 2rem;text-align: center;padding:0.2rem">
			<h2 style="color: #fff;font-size: 22px">Solicitud Debida Diligencia</h2>
		</div>
		<div style="">
			<h2 style="margin-bottom:0px;font-size: 18px !important"><label style="font-weight: 500;color:black;margin-bottom:0px"><?= $model->nombre ?></label></h2>
			<p style="margin:0px;font-size: 16px !important"><label style="font-weight: 500;color:black;margin-bottom:0px">No. de Transacci&oacute;n: </label> <span style="color:green"><?= $transaccion['invoice_number'] ?></span> </p>
			<p style="margin:0px;font-size: 16px !important"><label style="font-weight: 500;color:black;margin-bottom:0px">Total pagado:</label> USD$<?= number_format($model->pago_total) ?> </p>

			<hr>

			<p style="font-size:16px !important">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, magnam necessitatibus, adipisci, voluptates deserunt dignissimos recusandae quia distinctio atque iusto delectus repellendus aut repellat consectetur unde maxime ad molestias! Praesentium corporis adipisci esse odio sed officiis odit rem error animi repudiandae distinctio architecto harum itaque, aperiam sit ipsum tempora maxime?
			</p>
			<br>
			<!-- <div style="background:#44546b;color:white;text-align: center;padding: 0.5rem">
				<a href="https://drtitlesearch.com/frontend/web/site/ver-solicitud?id=<?//= $model->id ?>" style="color:white;text-decoration: none">DESCARGAR SOLICITUD</a>
			</div> -->

			<!-- <div>
				<p style="color:gray;font-size: 10px;text-align: center;padding: 1rem">
					Si no funciona el bot&oacute;n, favor copiar y pegar en el navegador el link a continuaci&oacute;n: https://drtitlesearch.com/frontend/web/site/ver-solicitud?id=<?//= $model->id ?>
				</p>
			</div> -->
			

		</div>
		<br><br><br><br>

	</div>
</div>

