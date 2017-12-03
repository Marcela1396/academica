<div class="container">
	<div class="row">
        <div class="col-lg-8 m-auto">

			<h1> Carga de Certificados </h1>
			<hr> 
			<?php

				$submit = array(
                        'name'  => 'cmdUpload',
                        'class' => 'btn btn-lime darken-2 ',
                        'value' => 'Subir Archivo'
                    );

				echo "<b>$error</b>";
				echo form_open_multipart("profesores/upload_certificados");
				echo form_label("Seleccione Documento (.pdf)");
				echo "<br>";
				$arr = array('name'=>'userfile','type'=>'file','size'=>'20');
				echo form_input($arr);
				echo form_hidden('llave',$llave);
				echo "<hr>";
				echo form_submit($submit);
				echo form_close();

			?>
		</div>
	</div>
</div>