<div class="well">
<form name="formulario" style="margin-left: 15px;" action="reportes/proveedor/mostrarreporte.php" method="post">
    <legend>Total Proveedores por Trimestre</legend>
    <label>Seleccionar Trimestre</label>
    <select name="trimestre" type="text">
        <?php include (RUTA_ABS."/negocios/compras/traertrimestre.php"); ?>
    </select>
    <label>Seleccione el año</label>
    <select name="año" type="text">
        <?php
        //Obtengo el año actual
        $añoactual = date("Y");
        
        //Desde 1990 hasta el añoactual-1 , muestro el option
        for ($t = 1990; $t < $añoactual; $t++) {
            echo '<option value=' . $t .'>' . $t . '</option>';
        }
        
        //Selecciono por defecto el año actual
        echo '<option selected="selected" value='. $añoactual . '>' . $añoactual . '</option>';
        ?>
    </select>

    <p></p>
    <input type="submit" class="btn btn-primary" value="Siguente" name="siguiente">
    <input type="button" class="btn btn-primary" onclick="window.open('main.php','_self');" value="Salir" name="salir">
</form>
</div>