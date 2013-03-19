<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="../../js/bootstrap.js"></script>
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"> 
        <link href="../../css/mostrarreporte.css" rel="stylesheet" type="text/css" media="screen">
    </head>
    <body style="width: 100%">

        <?php
        define("RUTA_ABS", dirname(__FILE__));
        include_once (RUTA_ABS . "/../../controlador/conexion.php");


        conectar_bd();

        $fechai = '"' . $_POST['fechai'] . '"';

        $fechaf = '"' . $_POST['fechaf'] . '"';

        $sql_gastos = "SELECT * FROM gastos_varios WHERE fecha BETWEEN $fechai AND $fechaf";

        $result = mysql_query($sql_gastos);

        if (!$result) {
            echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) " .
            "en la BD: " . mysql_error();
        }
        ?>
        <div class="label label-info" >
        <h3 style="margin-left: 15px;"> Reporte Gastos Varios </h3>
        </div>
        <div style="margin-left: 20px; max-width: 85%;" class="divtabla">
        <table  id="tablagastos" class="table table-bordered table-striped">
            <tr class="info">
                <td>
                    <strong>Descripci&oacute;n</strong>
                </td>        
                <td>
                    <strong>Valor</strong>
                </td>
                <td>
                    <strong>IVA</strong>
                </td>
                <td>
                    <strong>Fecha</strong>
                </td>
            </tr>    
            <?php
//Obtengo el valor del array devuelto en la consulta y lo asigno a $ultimo_id
            while ($fila = mysql_fetch_assoc($result)) {
                ?>
                <tr>            
                    <td>
                        <?php echo utf8_decode($fila['descripcion']); ?>
                    </td>
                    <td>
                        <?php echo $fila['precio']; ?>
                    </td>
                    <td>
                        <?php echo $fila['iva']; ?>
                    </td>
                    <td>
                        <?php echo $fila['fecha']; ?>
                    </td>

                </tr>

                <?php
            }
            ?>
        </table>
            </div>
        <div class="botonsalir">
            <button  class="btn" onclick="window.open('../../main.php?iu=tiporeporte.php&mdir=reportes','_self');"  name="salir"><i class=" icon-arrow-left"></i> Cancelar </button> 
        </div>
    </body>
</html>