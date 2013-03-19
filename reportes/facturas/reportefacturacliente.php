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

        $sql_clientes = "
            SELECT DISTINCT factura.idcliente , cliente.nombre , cliente.apellido , cliente.2apellido
FROM factura
INNER JOIN cliente
ON cliente.idcliente = factura.idcliente";

        $result_clientes = mysql_query($sql_clientes);
        ?>
        <div class="label label-info" >
            <h3 style="margin-left: 15px;"> Reporte Total de Venta de Facturas por Cliente </h3>
        </div>
        <p class="lead" style="margin-left: 15px;">Per&iacuteodo <?php echo $_POST['fechai'] . ' / ' . $_POST['fechaf']; ?></p>

        <div class="divtabla">
            <table id="tablacliente" class="table table-bordered table-striped">
                <tr class="info" >
                    <td>
                        <strong>Cliente</strong>
                    </td>        
                    <td >
                        <strong>Total de Venta</strong>
                    </td>
                    <td>
                        <strong>Total de IVA</strong>
                    </td>

                </tr>
                <tbody>

                    <?php
                    //Recorro por todos los clientes que tienen albaran
                    while ($fila = mysql_fetch_array($result_clientes)) {
                        ?>
                        <tr >
                            <td>
                                <?php echo utf8_decode($fila['nombre']) . ' ' . utf8_decode($fila['apellido']) . ' ' . utf8_decode($fila['2apellido']); ?>
                            </td>                    
                            <?php
                            $totalventas = 0;
                            
                            $totaliva = 0;

                            $idcliente = $fila['idcliente'];

                            $sql_ventas = "SELECT total, totaliva FROM factura WHERE fecha BETWEEN $fechai AND $fechaf AND idcliente = $idcliente AND anulada = 0";

                            $result_ventas = mysql_query($sql_ventas);

                            //Recorro para un cliente todas sus ventas en un periodo de fecha determinado
                            while ($dato = mysql_fetch_array($result_ventas)) {
                                $totalventas = $totalventas + $dato['total'];
                                $totaliva = $totaliva + $dato['totaliva'];
                            }
                            ?>
                            <td>
                                <?php echo $totalventas; ?>
                            </td>
                            <td>
                                <?php echo $totaliva ; ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <br> 
            <div class="botonsalir">
                <button  class="btn" onclick="window.open('../../main.php?iu=tiporeporte.php&mdir=reportes','_self');"  name="salir"><i class=" icon-arrow-left"></i> Cancelar </button> 
            </div>
    </body>
</html>
