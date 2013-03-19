<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="../../js/bootstrap.js"></script>
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"> 
        <link href="../../css/mostrarreporte.css" rel="stylesheet" type="text/css" media="screen">
    </head>
    <body>
        <?php
        define("RUTA_ABS", dirname(__FILE__));
        include_once (RUTA_ABS . "/../../controlador/conexion.php");


        conectar_bd();

        $fechai = '"' . $_POST['fechai'] . '"';

        $fechaf = '"' . $_POST['fechaf'] . '"';

        $sql_gastos = "SELECT * FROM albaran WHERE fecha BETWEEN $fechai AND $fechaf AND anulada = 0";

        $result = mysql_query($sql_gastos);

        if (!$result) {
            echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) " .
            "en la BD: " . mysql_error();
        }
        ?>
<!--        <div class="alert alert-info" >-->
            <div class="label label-info" >
        <h3 style="margin-left: 20px;"> Reporte Total de Venta de Albaranes </h3>
        </div>
        </br>
        </br>
        <p class="lead" style="margin-left: 20px;">Per&iacuteodo <?php echo $_POST['fechai'] . ' / ' . $_POST['fechaf']; ?></p>
        <?php 
        
        $totalventas = 0;
        
        while($fila = mysql_fetch_array($result)){
            $totalventas = $totalventas + $fila['total'];
        }
        ?>
        
        <p class="lead" style="margin-left: 20px;">Total : $ <?php echo $totalventas ; ?></p>
        <br> 
        <div class="botonsalir">
            <button  class="btn" onclick="window.open('../../main.php?iu=tiporeporte.php&mdir=reportes','_self');"  name="salir"><i class=" icon-arrow-left"></i> Cancelar </button> 
        </div>
    </body>
</html>