<nav class="navbar navbar-expand-lg navbar-dark  orange lighten-1">
		<a class="navbar-brand" href="<?php echo base_url()?>inicio">
        <img src="http://www.iconarchive.com/download/i92103/custom-icon-design/pretty-office-13/Users.ico" height="30" class="d-inline-block align-top" alt="">
        Menú Docente
    	</a>

	    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
	      	<ul class="navbar-nav ml-auto">
	        	<li class="nav-item active">
	        		<a class="nav-link" href="<?php echo base_url()?>inicio">Inicio </a> 
	        	</li>
	        	
	        	<li class="nav-item">
	        		<a class="nav-link" href="<?php echo base_url()?>profesores/perfil">Perfil </a> 
	        	</li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Información Docente </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item"  href="<?php echo base_url()?>profesores/formacion">Formación Academica</a>
 
                        <a class="dropdown-item"  href="<?php echo base_url()?>profesores/productividad">Productividad Academica</a>
                    </div>
                </li>
                
	        	<li class="nav-item">
	        		<a class="nav-link" href="<?php echo base_url()?>profesores/eventos">Eventos </a>
	        	</li>
	        	&nbsp;&nbsp;

	        	<li class="nav-item">
	        		<a class="nav-link" href="<?php echo base_url()?>inicio/salir">Salir </a>
	        	</li>
	        </ul>
	     </div>
</nav>

<br> 
<div class="container" >
	<div class="row" id="divBienvenida" style="background-color:#afb42b">
		<div class="col-lg-8 m-auto">
				<p id="bienvenida">
					<?php
					$nombres = $this->session->userdata('nombres');
					$rol = $this->session->userdata('rol');
					echo "Bienvenid@: " . $nombres;
					echo "<br>";
					echo "Cargo: " . $rol;
					?>
                </p>
		</div>
		<div class="col-lg-4 m-auto">
            <?php 
            $foto = './uploads/perfil/' . $this->session->userdata('id') . '.jpg';
            if (file_exists($foto)) {
                echo "<img src='" . base_url() . "uploads/perfil/" . $this->session->userdata('id') . ".jpg' alt=''>";
            } else {
                echo "<img src='" . base_url() . "uploads/perfil/user.jpg' alt=''>";
            }
            ?>
        </div>
	</div>
</div>