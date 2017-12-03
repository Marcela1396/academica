<div class="container">
	<div class="row">
        <div class="col-lg-8 m-auto">
			<p  id="titles" style="text-align: left;"> Listado de Eventos </p>

			<p id="contenido"> Seleccione el evento correspondiente </p>

			<form method="post" action="<?php echo base_url() . 'eventos/' . $opcion;?>">
			<?php
				echo "<select class='selectpicker'data-style='btn btn-orange lighten-1' id= 'txt_opc'  name='evento' required>";
				foreach ($eventos as $row) {
					echo "<option value=".$row['id_eve']."> Evento: ".$row["nombre_eve"]." Encargado: ".$row["nombre_usu"]."</option>" ;	
				}
					echo "</select>";
			?>
					
					<div align="center" class="input-field col s12">
							<input  type="submit" value="Seleccionar" class="btn btn-lime darken-2">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>