<style type="text/css">
    table {
        width: 600px;
        align-self: center;
        text-align: center;
        border: 2px #1593d6 solid;
    }
    tr {
        border-bottom: 1px #d4d4d4 solid;
    }
	td a{
		background-color: #d9d9d9;
        font-size: 30px;
	}
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="card">
                <h3>Agenda de Eventos</h3>
                <?php                
                $a = date('Y');
                $m = date('m');
                if (!$this->uri->segment(3) == ""){
                    $a=$this->uri->segment(3);
                    $m=$this->uri->segment(4);
                }
                
                $dias=array();
                foreach ($eventos as $key) {
                    $a1 = substr($key['fecha_ini_eve'],0,4);
                    $m1 = substr($key['fecha_ini_eve'],5,2);
                    $d1 = intval(substr($key['fecha_ini_eve'],8,2));
                    if  ($a == $a1 and $m == $m1) {
                        $dias[$d1] = base_url() . "profesores/ver_detalles/" . $key['id_eve'];
                    }
                }
                
                echo $this->calendar->generate($a,$m,$dias);
                ?>
                <br><br>
            </div>
        </div>
    </div>
</div>