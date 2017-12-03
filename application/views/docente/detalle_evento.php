<div class="container">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="card">
                <h3>Detalles del Evento</h3>
                <?php  
                echo "<div align='center'>";
                echo "<span><b>Nombre:</b> " . $evento['nombre_eve'] . "</span>";
                echo "<br><br>";
                echo "<span><b>Tipo:</b> " . $evento['tipo_eve'] . "</span>";
                echo "<br><br>";
                echo "<span><b>Lugar:</b> " . $evento['lugar_eve'] . "</span>";
                echo "<br><br>";
                echo "<span><b>Fecha de Inicio:</b> " . $evento['fecha_ini_eve'] . "</span>";
                echo "<br><br>";
                echo "<span><b>Fecha de Finalización:</b> " . $evento['fecha_fin_eve'] . "</span>";
                echo "<br><br>";
                echo "<span><b>Valor:</b> " . $evento['valor_eve'] . "</span>";
                echo "</div>"
                ?>
                <br><br>
            </div>
        </div>
    </div>
</div>