<nav class="navbar navbar-expand-lg navbar-dark  orange lighten-1">
		<a class="navbar-brand" href="<?php echo base_url()?>inicio">
            <img src="<?php echo base_url()?>static/img/office.ico" height="30" class="d-inline-block align-top" alt="">
            Menú Administrador
    	</a>

	    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
	      	<ul class="navbar-nav ml-auto">
	        	<li class="nav-item active">
	        		<a class="nav-link" href="<?php echo base_url()?>inicio">Inicio </a> 
	        	</li>
	        	
	        	<li class="nav-item">
	        		<a class="nav-link" href="<?php echo base_url()?>usuarios/perfiladmin">Perfil </a> 
	        	</li>
	        	
	        	<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuarios </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item"  href="<?php echo base_url()?>usuarios/adicionar_usuario">Nuevo Usuario </a>
		        		<a class="dropdown-item" href="<?php echo base_url()?>usuarios/listar_usuarios/1">Modificar Usuario </a>
	        			<a class="dropdown-item" href="<?php echo base_url()?>usuarios/listar_usuarios/2">Eliminar Usuario </a>
	        			<a  class="dropdown-item" href="<?php echo base_url()?>usuarios/visualizar_usuarios">Listar Usuarios </a>
                    </div>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Eventos </a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
	                    <a class="dropdown-item" href="<?php echo base_url()?>eventos/adicionar_eve">Nuevo Evento </a>
	                    <a class="dropdown-item" href="<?php echo base_url()?>eventos/listar_eve/1">Modificar Evento </a>
	                    <a class="dropdown-item" href="<?php echo base_url()?>eventos/listar_eve/2">Eliminar Evento </a>	
	                </div>
	        	</li>
	        	
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