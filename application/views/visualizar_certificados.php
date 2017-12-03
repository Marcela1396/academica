<div class="container">
	<div class="row">
        <div class="col-lg-8 m-auto">

			<h1> Visualización de Certificados </h1>
			<hr>
			<?php
				$arr = directory_map("uploads/docs",1);

				foreach ($arr as $nombre) {
					$var = substr($nombre,1,-1);
					$var = explode("_",$var);

					if($llave == $var[0]){
						echo "<br>";
						echo "<div>";
							echo "<img src=" . base_url().'static/recursos/pdf.png>';
							echo "<a href=". base_url().'uploads/docs/'.$nombre. ">". $nombre. " </a>";
						echo "</div>";	
					}
				}
			?>
			<br>
			<div class="col-md-12 mb-r" align="center">
        		<a class="btn btn-lime darken-2 btn-lg"  href="<?php echo base_url();?>profesores/productividad"> Regresar </a>
        	</div>		
        </div>
	</div>
</div>
