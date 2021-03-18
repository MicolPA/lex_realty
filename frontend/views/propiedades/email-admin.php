

<div class="col-md-12" style="background: #0e1227; padding:4rem;width:100%">

	<div class="mt3" style="border-radius: 35px; background: #fff;padding:3rem;max-width:60%;margin:auto;min-width: 500px ">
		<div style="background: #44546b;margin-bottom: 2rem;text-align: center;padding:0.2rem">
			<h2 style="color: #fff;font-size: 22px"><?= $type == 1 ? "Nueva propuesta" : "Nuevo mensaje" ?></h2>
		</div>
		<div style="font-size: 20px !important">
			<p><label style="font-weight: bold;color:black;margin-bottom:0px">Nombre:</label> <?= $nombre ?> </p>
			<p><label style="font-weight: bold;color:black;margin-bottom:0px">Correo:</label> <?= $correo ?> </p>
			<p><label style="font-weight: bold;color:black;margin-bottom:0px">Tel&eacute;fono:</label> <?= $telefono ?> </p>
			<?php if ($type == 1): ?>
				<p><label style="font-weight: bold;color:black;margin-bottom:0px">Cantidad:</label> <?= number_format($cantidad) ?> </p>
				<p><label style="font-weight: bold;color:black;margin-bottom:0px">Forma de pago:</label> <?= $forma_pago ?> </p>
				<p><label style="font-weight: bold;color:black;margin-bottom:0px">Monto de reserva:</label> <?= number_format($monto_reserva) ?> </p>
				<p><label style="font-weight: bold;color:black;margin-bottom:0px">Fecha de cierre:</label> <?= $fecha_cierre ?> </p>
				<?php else: ?>
					<p><label style="font-weight: bold;color:black;margin-bottom:0px">Mensaje:</label> <br>
					 <?= $cantidad ?> </p>
			<?php endif ?>

			<hr>

			<p><label style="font-weight: bold;color:black;margin-bottom:0px">Propiedad:</label> <?= $propiedad->titulo_publicacion ?> </p>
			<p><label style="font-weight: bold;color:black;margin-bottom:0px">Ubicaci&oacute;n:</label> <?= $propiedad->ubicacion->nombre ?> </p>
			<br>
			<div style="background:#44546b;color:white;text-align: center;padding: 0.5rem">
				<?php if ($propiedad_check): ?>
					<a href="http://propiedades.lexrealtymagazine.com/frontend/web/propiedades/ver?id=<?= $propiedad->id ?>" style="color:white;text-decoration: none">VER PROPIEDAD</a>
					<?php else: ?>
					<a href="http://propiedades.lexrealtymagazine.com/frontend/web/pre-construccion/ver?id=<?= $propiedad->id ?>" style="color:white;text-decoration: none">VER PRE-CONSTRUCCIÓN</a>
				<?php endif ?>
			</div>
			

		</div>
		<br><br><br><br>

	</div>
</div>

