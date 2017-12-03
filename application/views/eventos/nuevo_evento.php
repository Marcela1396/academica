<div class="container" >
    <div class="row">
        <div class="col-lg-8 m-auto" id="forms" style="background-color: white">
        	<h3>Nuevo Evento</h3>
        	<hr>
            <?php
                $submit = array(
                        'name'  => 'cmdEnviar',
                        'class' => 'btn btn-lime darken-2 ',
                        'value' => 'Registrar'
                    );

            	echo validation_errors('<div class=error>','</div>');
            	echo form_open('eventos/adicionar_eve');
                
                echo "<div > <i class='fa fa-tag   prefix'></i>";
                	echo form_label('&nbsp; *Nombre del Evento','txtnomeve');
                    echo form_input('txtnomeve');
                echo "</div><br>";
                
                echo "<div > <i class='fa fa-database   prefix'></i>";
                    echo form_label('&nbsp; *Tipo de Evento','txttipoeve');
                    echo "<br>";
                    echo "<select name='txttipoeve'class='selectpicker'data-style='btn btn-orange lighten-1'>";
                        echo "<option value='Congreso'" . set_select('txttipoeve', 'Congreso') . ">Congreso</option>";
                        echo "<option value='Conversatorio'" . set_select('txttipoeve', 'Conversatorio') . ">Conversatorio</option>";
                        echo "<option value='Seminario'" . set_select('txttipoeve', 'Seminario') . ">Seminario</option>";
                    echo "</select>";
                echo "</div><br>";

                echo "<div > <i class='fa fa-building prefix'></i>";
                    echo form_label('&nbsp; *Lugar Evento','txtlugeve');
                    echo form_input('txtlugeve');
                echo "</div> <br>";

                echo "<div > <i class='fa fa-calendar prefix'></i>";
                    echo form_label('&nbsp; *Fecha Inicio','txtfechaIneve');
                    echo "<input type='date' name='txtfechaIneve' value='" . date('Y-m-d') . "'>";
                echo "</div> <br>";

                echo "<div > <i class='fa fa-calendar prefix'></i>";
                    echo form_label('&nbsp; *Fecha Finalización','txtfechaFneve');
                    echo "<input type='date' name='txtfechaFneve' value='" . date('Y-m-d') . "'>";
                echo "</div> <br>";

                echo "<div > <i class='fa fa-money prefix'></i>";
                    echo form_label('&nbsp; *Valor Evento','txtvaleve');
                    echo form_input('txtvaleve');
                echo "</div> <br>";
                
                echo "<div > <i class='fa fa-user-o prefix'></i>";
                    echo form_label('&nbsp; *Usuario','txtusuario');
                    echo "<br>";
                    echo "<select name='txtusuario'class='selectpicker'data-style='btn btn-orange lighten-1'>";
                    foreach ($usuarios as $row) {
                        
                        echo "<option value=". $row['id_usu'] . set_select('txtusuario', $row['id_usu']) . ">".$row['nombre_usu']."</option>";
                    }
                    echo "</select>";
                echo "</div> <br> <br> <br>";
                
            	echo "<div align= 'center' >";
                       echo form_submit($submit);
                echo "</div>";
            	echo form_close();
            ?>
        </div>
    </div>
 </div>