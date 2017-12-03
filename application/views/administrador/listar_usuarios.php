<p id="titles">Lista de Usuarios del Sistema</p>"
<div class="container">
	<div class="row">
        <div class="col-lg-8 m-auto">
			<table class="table">

			    <!--Table head-->
			    <thead class="mdb-color orange lighten-1">
			        <tr  class="text-white" >
			            <th id="titles">Cédula</th>
			            <th id="titles" >Nombres</th>
			            <th id="titles">Rol</th>
			        </tr>
			    </thead>
			    <tbody class="mdb-color lime lighten-4" >
			    	<?php 
			    	foreach ($usuarios as $row) {
			    		echo "<tr class='text-black'>";
			    		echo "<td id='contenido'>". $row['cedula_usu']. "</td>" ; 
			    		echo "<td id='contenido'>". $row['nombre_usu']. "</td>" ; 
			    		echo "<td id='contenido'>". $row['rol_usu']. "</td>" ; 
			    		echo "</tr>";
			    		}
			    	 ?>
			    </tbody>
			    <!--Table body-->
			</table>
		</div>
	</div>
</div>