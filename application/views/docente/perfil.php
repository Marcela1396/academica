<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto" id="forms" style="background-color: white">
                <h3>Editar Perfil</h3>
                
                <?php
                $submit = array(
                  'name'  => 'cmdEnviar',
                  'class' => 'btn btn-orange lighten-1',
                  'value' => 'Actualizar'
                );
                $ced = array(
                    'name'  => 'txtced',
                    'value' => $cedula_usu
                );
                $nom = array(
                    'name'  => 'txtnom',
                    'value' => $nombre_usu
                );
                $foto = array(
                    'name'  => 'userfile',//debe llamarse userfile
                    'type'  => 'file',
                    'size'  => '20'
                );
                echo validation_errors('<div class=error>','</div>');
                echo form_open_multipart('profesores/perfil');
                echo "<div > <i class='fa fa-address-card prefix'></i>";
                    echo form_label('&nbsp;Cedula','txtced');
                    echo form_input($ced);
                echo "</div> <br>";
                echo "<div > <i class='fa fa-user-o  prefix'></i>";
                    echo form_label('&nbsp;Nombre','txtnom');
                    echo form_input($nom);
                echo "</div> <br>"; 
                echo "<div > <i class='fa fa-unlock-alt   prefix'></i>";
                    echo form_label('&nbsp; Nueva Clave de Acceso','txtpass');
                    echo form_password('txtpass');
                echo "</div> <br>";
                echo "<div > <i class='fa fa-user-circle  prefix'></i>";
                    echo form_label('&nbsp;Foto de Perfil','txtfoto');
                    echo "<br>" . form_input($foto);
                echo "</div> <br>";
                echo "<div align='center'>";
                    echo form_submit($submit);
                echo "</div>";
                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>