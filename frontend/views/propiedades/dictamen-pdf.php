
<div style="background: #e3e1dd !important;height: 100%;width: 100%;">

		<div style="width:35%;display: inline-block;float: left;background: white;text-align: center;padding-top:1rem;padding-bottom: 0.5rem;height: 50px">
			<img src="/frontend/web/images/logo-principal.png" width="150px">
		</div>
		<div style="width:64%;display: inline-block;float: right;padding-top:1.5rem;padding-bottom: 1rem;height: 50px">
			<h5 style="padding-left:1rem;color: #000615">REPORTE DE ESTADO JURÍDICO</h5>
			<br>
			<br>
		</div>
		<div style="background: #000615;height: 40px"></div>
		<br>
		<br>
		<div style="width: 300px;display: inline-block;padding-left: 3rem;padding-top: 2.5rem;float: left;">
			<div style="background: #000615;color:white;text-align: center;padding:0.5rem 0rem;border-top-right-radius: 4px;border-top-left-radius: 4px">
                <p style="font-family: 'Benton-book', Arial, sans-serif;font-size: 12px;margin: 0px"><?= mb_strtoupper($propiedad->titulo_publicacion) ?></p>
            </div>
			<div style="width: 100%;height: 160px;background-image: url('/frontend/web/<?= $propiedad->foto_1 ?>');background-size:cover;background-position:center;"></div>
			<?php if ($propiedad->riezgo_id == 1): ?>
				<div>
					<div style="background: #000615;color:white;text-align: center;padding:0.5rem 0rem;width:80%;float: left;display: inline-block;border-bottom-left-radius: 4px">
		                <p style="font-family: 'Benton-book', Arial, sans-serif;font-size: 12px;margin: 0px"><?= mb_strtoupper($propiedad->ubicacion->nombre) ?></p>
		            </div>
		            <div style="width:20%;background: #95a1a6;text-align: center;float: right;display: inline-block;padding-top: 5.5px;padding-bottom: 5.5px;border-bottom-right-radius: 4px">
		            	<h4 style="color:white;margin: 0px">A+</h4>
		            </div>
				</div>
				<?php else: ?>
				<div class="bg-darkblue" style="background: #000615;color:white;text-align: center;padding:0.5rem 0rem;border-bottom-left-radius: 4px;border-bottom-right-radius: 4px">
	                <p style="font-family: 'Benton-book', Arial, sans-serif;font-size: 12px;margin: 0px"><?= mb_strtoupper($propiedad->ubicacion->nombre) ?></p>
	            </div>
			<?php endif ?>
			
		</div>
		<div style="width: 400px;display: inline-block;padding: 2.5rem 0rem 0rem 0.2rem;float: right;">
			<div style="background: white;height: 150px;padding: 1rem;width: 75%;border-radius: 4px;margin-bottom: <?= $propiedad_check ? '1rem' : '3rem'; ?>">
				
                <?php if ($propiedad_check): ?>
                	<p class="text-muted m-0 font-12 mb-2">
	                    <img src="/frontend/web/images/bed-icon.png" width='50px'> <?= $propiedad->habitaciones ?>
	                    <img src="/frontend/web/images/shower-icon.png" width='50px'> <?= $propiedad->baños ?>
	                    <img src="/frontend/web/images/size-icon.png" width='50px'> <?= number_format($propiedad->metros, 2) ?> M<sup>2</sup>
	                </p>
	                <br>
	                <div class="detalles" style="color:#585858;height: 80px;padding-top:0.1rem;font-family: 'Benton-book', Arial, sans-serif">

			            <?php $check = $propiedad->certificado_titulo ? "dot-full-2.png" : 'dot.png' ?>
			            <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> CERTIFICADO DE TITULO</p>

			            <?php $check = $propiedad->impuestos ? "dot-full-2.png" : 'dot.png' ?>
			            <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> IMPUESTOS AL DÍA</p>

			            <?php $check = $propiedad->cargas_gramabes ? "dot-full-2.png" : 'dot.png' ?>
			            <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> LIBRES DE CARGAS GRABAMES</p>
			            <?php $check = $propiedad->deslinde ? "dot-full-2.png" : 'dot.png' ?>
			            <p class="m-0 small text-gray"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> DESLINDE</p>
			        </div>
                <?php else: ?>
                	<div class="detalles" style="color:#585858;margin-top:1rem;font-family: 'Benton-book', Arial, sans-serif">

			            <?php $check = $propiedad->certificado_titulo ? "dot-full-2.png" : 'dot.png' ?>
                        <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> CERTIFICADO DE TITULO</p>

                        <?php $check = $propiedad->cargas_gramabes ? "dot-full-2.png" : 'dot.png' ?>
                        <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> LIBRES DE CARGAS Y GRAVÁMENES</p>
                        <?php $check = $propiedad->deslinde ? "dot-full-2.png" : 'dot.png' ?>
                        <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> DESLINDE</p>

                        <?php $check = $propiedad->permisos_municipales ? "dot-full-2.png" : 'dot.png' ?>
                        <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> PERMISOS MUNICIPALES</p>
                        <?php $check = $propiedad->permiso_ambiental ? "dot-full-2.png" : 'dot.png' ?>
                        <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> PERMISO AMBIENTAL</p>

                        <?php $check = $propiedad->objeccion_ministerio_turismo ? "dot-full-2.png" : 'dot.png' ?>
                        <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> NO OBJECIÓN DEL MINISTERIO DE TURISMO</p>

                        <?php $check = $propiedad->permiso_obras_publicas ? "dot-full-2.png" : 'dot.png' ?>
                        <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> PERMISO DE OBRAS PUBLICAS</p>

                        <?php $check = $propiedad->confortur ? "dot-full-2.png" : 'dot.png' ?>
                        <p class="m-0 small text-gray mb-2"><img src="/frontend/web/images/<?= $check ?>" alt="" width="17px"> CONFORTUR</p>
			        </div>
                <?php endif ?>
               
			</div>
		</div>
		<br>
		<br>
		<br>
		<div style="width:630px;background: white;margin-left: 3rem;border-radius:4px;border:1px solid #9d9f9c;padding:0.5rem;color:#585858">
			<p><?= $dictamen->contenido ?></p>
		</div>
</div>
