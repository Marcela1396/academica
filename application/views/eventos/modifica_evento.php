<div class="container" >
    <div class="row">
        <div class="col-lg-8 m-auto" id="forms" style="background-color: white">
            <h3>Actualiza Evento</h3>
            <hr>
            <?php
                $submit = array(
                            'name'  => 'cmdEnviar',
                            'class' => 'btn btn-lime darken-2 ',
                            'value' => 'Actualizar'
                );
                echo validation_errors('<div class=error>','</div>');
                echo form_open('eventos/modificar_evento');
                
                echo form_hidden('txtideve', $eventos['id_eve']);

                echo "<div > <i class='fa  fa-tag  prefix'></i>";
                    echo form_label('&nbsp; *Nombre del Evento','txtnomeve');
                    echo form_input('txtnomeve', $eventos['nombre_eve']);
                echo "</div> </br>";
                
                echo "<div > <i class='fa fa-database prefix'></i>";
                    echo form_label('&nbsp; *Tipo de Evento','txttipoeve');
                    echo "<br>";
                    echo "<select name='txttipoeve'class='selectpicker'data-style='btn btn-orange lighten-1'>";
                        echo "<option value='Congreso'" . set_select('txttipoeve', 'Congreso') . " ".(($eventos['tipo_eve'] == "Congreso" ) ? "selected" : "").">Congreso</option>";
                        echo "<option value='Conversatorio'" . set_select('txttipoeve', 'Conversatorio') . " ".(($eventos['tipo_eve'] == "Conversatorio" ) ? "selected" : "").">Conversatorio</option>";
                        echo "<option value='Seminario'".set_select('txttipoeve', 'Seminario') . " ".(($eventos['tipo_eve'] == "Seminario" ) ? "selected" : "").">Seminario</option>";  
                    echo "</select> <br>";
                echo "</div> </br>";

                echo "<div > <i class='fa fa-building  prefix'></i>";
                    echo form_label('&nbsp; *Lugar Evento','txtlugeve');
                    echo form_input('txtlugeve', $eventos['lugar_eve']);
                echo "</div> </br>";

                echo "<div > <i class='fa fa-calendar  prefix'></i>";
                    echo form_label('&nbsp; *Fecha Inicio','txtfechaIneve');
                    echo "<input type='date' name='txtfechaIneve' value='" . $eventos['fecha_ini_eve'] . "'>";
                echo "</div> </br>";

                echo "<div > <i class='fa fa-calendar prefix'></i>";
                    echo form_label('&nbsp; *Fecha Finalización','txtfechaFneve');
                    echo "<input type='date' name='txtfechaFneve' value='" .  $eventos['fecha_fin_eve'] . "'>";
                echo "</div> </br>";

                echo "<div > <i class='fa fa-money prefix'></i>";
                    echo form_label('&nbsp; *Valor Evento','txtvaleve');
                    echo form_input('txtvaleve',  $eventos['valor_eve']);
                echo "</div> </br>";

                echo "<div > <i class='fa fa-user-o prefix'></i>";
                    echo form_label('&nbsp; *Usuario','txtusuario');
                    echo "<br> <select name='txtusuario' class='selectpicker'data-style='btn btn-orange lighten-1'>";
                    foreach ($usuarios as $row) {
                        if ($eventos["usuario"] == $row['id_usu']) 
                        {
                            echo "<option value=". $row['id_usu'] . set_select('txtusuario', $row['id_usu']) . " selected>".$row['nombre_usu']."</option>";
                        }
                        else
                        {
                            echo "<option value=". $row['id_usu'] . set_select('txtusuario', $row['id_usu']) . ">".$row['nombre_usu']."</option>";
                        }
                        
                    }
                    echo "</select>";
                echo "</div> </br>";
                
                echo "<br><br>";
                echo "<div align= 'center' >";
                       echo form_submit($submit);
                echo "</div>";
                echo form_close();
            ?>
        </div>
    </div>
 </div>