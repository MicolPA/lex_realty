

<div class="col-md-12" style="background: #0e1227; padding:4rem;width:100%">
	

	<div class="mt3" style="border-radius: 35px; background: #fff;padding:3rem;max-width:50%;margin:auto; ">
		<div style="background: #f9ae33;margin-bottom: 2rem;text-align: center;padding:0.2rem">
			<h2 style="color: #fff;font-size: 22px">Nueva propuesta</h2>
		</div>
		<div style="font-size: 20px !important">
			<p><label style="font-weight: bold;color:black;margin-bottom:0px">Nombre:</label> <?= $nombre ?> </p>
			<p><label style="font-weight: bold;color:black;margin-bottom:0px">Correo:</label> <?= $correo ?> </p>
			<p><label style="font-weight: bold;color:black;margin-bottom:0px">Telefono:</label> <?= $telefono ?> </p>
			<p><label style="font-weight: bold;color:black;margin-bottom:0px">Cantidad:</label> <?= number_format($cantidad) ?> </p>

			<hr>

			<p><label style="font-weight: bold;color:black;margin-bottom:0px">Propiedad:</label> <?= $propiedad->titulo_publicacion ?> </p>
			<p><label style="font-weight: bold;color:black;margin-bottom:0px">Ubicación:</label> <?= $propiedad->ubicacion->nombre ?> </p>
			<br>
			<div style="background:#f9ae33;color:white;text-align: center;padding: 0.5rem">
				<a href="http://propiedades.lexrealtymagazine.com/frontend/web/propiedades/ver?id=<?= $propiedad->id ?>" style="color:white;text-decoration: none">VER PROPIEDAD</a>
			</div>
			

		</div>
		<br><br><br><br>

	</div>
</div>

