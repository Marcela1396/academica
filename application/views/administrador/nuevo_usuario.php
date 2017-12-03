<div class="container" >
    <div class="row" >
        <div class="col-lg-8 m-auto" id="forms" style="background-color: white">
            	<h3>Nuevo Usuario</h3>
            	<hr>
                <?php

                    $submit = array(
                        'name'  => 'cmdEnviar',
                        'class' => 'btn btn-lime darken-2 ',
                        'value' => 'Registrar'
                    );
                	echo validation_errors('<div class=error>','</div>');
                	echo form_open('usuarios/adicionar_usuario');

                    echo "<div > <i class='fa fa-newspaper-o   prefix'></i>";
                    	echo form_label('&nbsp; *Cédula del Usuario','txtcedusu');
                        echo form_input('txtcedusu');
                    echo "</div> <br>";

                    echo "<div > <i class='fa fa-user-plus   prefix'></i>";
                        echo form_label('&nbsp; *Nombre del Usuario','txtnomusu');
                        echo form_input('txtnomusu');
                    echo "<div> <br>";
            
                    echo "<div > <i class='fa fa-group prefix'></i>";            
                        echo form_label('&nbsp; *Rol del Usuario','txtrolusu');
                        echo "<br>";
                    	echo "<select name='txtrolusu' class='selectpicker'data-style='btn btn-orange lighten-1'>";
                            echo "<option value='administrador'" . set_select('txtrolusu', 'administrador') . ">Administrador</option>";
                            echo "<option value='docente'" . set_select('txtrolusu', 'docente') . ">Docente</option>";
                        echo "</select> </div> <br><br>";                    
                	echo "<hr>";
                    echo "<div align= 'center' >";
                	   echo form_submit($submit);
                    echo "</div>";
                	echo form_close();
                ?>
        </div>
    </div>
</div>
  

