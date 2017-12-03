<div class="container" >
    <div class="row">
        <div class="col-lg-8 m-auto" id="forms" style="background-color: white">

        	<h3>Actualizar Información de Usuario</h3>
        	<hr>
            <?php

                $submit = array(
                        'name'  => 'cmdEnviar',
                        'class' => 'btn btn-lime darken-2 ',
                        'value' => 'Actualizar'
                );

            	echo validation_errors('<div class=error>','</div>');
            	echo form_open_multipart('usuarios/modificar_usuario');
                
                echo form_hidden('txtidusu', $usuarios['id_usu']);

                echo "<div > <i class='fa fa-newspaper-o prefix'></i>";
                    echo form_label('&nbsp; *Cédula del Usuario','txtcedusu');
                    echo form_input('txtcedusu', $usuarios['cedula_usu']);
                echo "</div><br>";

                echo "<div > <i class='fa fa-user-plus  prefix'></i>";
                echo form_label('&nbsp; *Nombre del Usuario','txtnomusu');
                echo form_input('txtnomusu', $usuarios['nombre_usu']);
                echo "</div> <br>";
                
                //echo form_label('*Clave de Acceso','txtpassusu');
                //echo form_password('txtpassusu');
                echo "<div > <i class='fa fa-group prefix'></i>";            
                    echo form_label('&nbsp; *Rol del Usuario','txtrolusu');
                    echo "<br>";
                    echo "<select name='txtrolusu'class='selectpicker'data-style='btn btn-orange lighten-1'>";
                    if($usuarios['rol_usu'] == 'administrador'){
                        echo "<option selected <option  value='administrador'" . set_select('txtrolusu', 'administrador'). " >Administrador</option>"; 
                        echo "<option value='docente'" . set_select('txtrolusu', 'docente').">Docente</option>";
                    }
                    else{
                        echo "<option selected <option ". " value='docente'" . set_select('txtrolusu', 'docente') . ">Docente</option>";
                         echo "<option value='administrador'" . set_select('txtrolusu', 'administrador') . ">Administrador</option>";
                    }
                    echo "</select><br></div><br> <br>";

                
                echo "<div > <i class='fa fa-user-plus   prefix'></i>";
                    $foto = array(
                        'name'  => 'userfile',//debe llamarse userfile
                        'type'  => 'file',
                        'size'  => '20'
                    );
                    echo form_label('&nbsp; *Foto del Usuario','txtnomusu');
                    echo "<br>" . form_input($foto);
                 echo "<div> <br>";

            	echo "<div align= 'center' >";
                       echo form_submit($submit);
                echo "</div>";
            	echo form_close();
            ?>
        </div>
    </div> 
 </div>