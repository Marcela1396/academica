<div class="container" style="padding-top: 3rem">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img src="<?php echo base_url();?>static/recursos/login.png" height=100px>
                    </div>
                	<p align="center" id="titles">Inicio de Sesión</p>
                	<hr>

                    <div id="contenido">
                        <?php
                            $submit = array(
                              'name'  => 'cmdEnviar',
                              'class' => 'btn btn-orange lighten-1',
                              'value' => 'Ingresar'
                            );
                        	echo validation_errors('<div class=error>','</div>');
                        	echo form_open('inicio');
                            echo "<div > <i class='fa fa-user-circle  prefix'></i>";
                            	echo form_label('&nbsp;Login','txtlog');
                            	echo form_input('txtlog');
                            echo "</div> <br>"; 
                            echo "<div > <i class='fa fa-unlock-alt   prefix'></i>";
                        	    echo form_label('&nbsp; Clave de acceso','txtcla');
                        	    echo form_password('txtcla');
                            echo "</div> <br>";
                            echo "<div > <i class='fa fa-check-circle   prefix'></i>";
                                echo form_label('&nbsp; Captcha','txtcaptcha');
                                echo "<br>" . $image;
                                echo form_input('txtcaptcha');
                            echo "</div> <br>";
                            echo "<div align= 'center'>";
                        	    echo form_submit($submit);
                            echo "</div>";
                        	echo form_close();
                        ?>
                    </div>
            </div>
        </div>
    </div>
 </div>