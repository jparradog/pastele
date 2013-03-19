<?php
//define("RUTA_ABS", dirname(__FILE__));

include_once (RUTA_ABS . "/controlador/conexion.php");
include_once (RUTA_ABS . "/negocios/cliente/clienteonfactura.php");




$conexion = conectar_bd();


//-----------------------------------------------
//-----------------------------------------------
if (isset($_GET['fechai']) && isset($_GET['fechaf'])) {

    $fechainicio = '"' . $_GET['fechai'] . '"';

    $fechafin = '"' . $_GET['fechaf'] . '"';

    $sql_buscar = "SELECT * FROM facturasimple WHERE fecha BETWEEN $fechainicio AND $fechafin";

    $result_buscar = mysql_query($sql_buscar);

    if (!$result_buscar) {
        echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) " .
        "en la BD: " . mysql_error();
        //Finalizo la aplicación
        exit;
    }
    ?>
    <legend>Facturas Simple</legend>
    <div class="input-prepend">
        <h5 style="margin-left: 15px ;">Filtrar por Fecha</h5>
        <span style="margin-left: 15px ;" class="add-on">Fecha Inicio</span><input id="fechai" type="date">    
        <span style="margin-left: 15px ;" class="add-on">Fecha Fin</span><input id="fechaf" type="date">
        <button style="margin-left: 15px ;" class="btn btn-warning" onclick="window.open('<?php echo validarSesion(); ?>?iu=modtablafacturasimple.php&mdir=negocios&dir=facturasimple&fechai='+fechai.value+'&fechaf='+fechaf.value+'','_self');">Buscar</button>       
    </div>
    <table style="margin: 15px 0px 0px 15px; width: 98%;" class="table table-bordered">
        <tr>
            <th style="font-weight: bold;">
                Codigo
            </th>
            <th style="font-weight: bold;">
                N° Factura
            </th>
            <th style="font-weight: bold;">
                Cliente
            </th>
            <th style="font-weight: bold;">
                Fecha
            </th>
            <th style="font-weight: bold;">
                Neto
            </th>
            <th style="font-weight: bold;">
                Iva
            </th>
            <th style="font-weight: bold;">
                Total
            </th>
            <th style="font-weight: bold;">
                Opciones
            </th>


        </tr>
        <tbody style="background-color: #ffffff;">    
            <?php while ($fila = mysql_fetch_assoc($result_buscar)) { ?>
                <?php
                if ($fila['fecha'] != "0000-00-00") {
                    if ($fila['anulada'] == 1) {
                        echo '<tr class="error">';
                        $flag = true;
                    } else {
                        echo '<tr>';
                        $flag = false;
                    }
                    ?>
                <td>
                    <?php echo $fila['idfacturasimple']; ?>
                </td>
                <td>
                    <?php echo $fila['numerofacturasimple']; ?>
                </td>
                <td>
                    <?php echo select_nombre_cliente($fila['idcliente']); ?>
                </td>
                <td>
                    <?php echo $fila['fecha']; ?>
                </td>
                <td>
                    € <?php echo $fila['totalneto']; ?>
                </td>
                <td>
                    € <?php echo $fila['totaliva']; ?>
                </td>
                <td>
                    € <?php echo $fila['total']; ?>
                </td>
                <td>
                    <?php if ($flag == false) { ?>
                        <a class="btn" onclick="if(confirm('¿Esta seguro de que desea anular esta factura?\nRecuerde, que se anulara permanentemente.')){window.open('facturasimple/anular.php?id='+<?php echo $fila['idfacturasimple'] ?>+'','_self')}" class="btn" ><i class="icon-ban-circle"></i> Anular</a>
                        <a class="btn" href="facturasimple/Imprimirfacturasimple.php?idfact=<?php echo $fila['idfacturasimple']; ?>" ><i class="icon-print"></i> Imprimir</a>
                        <?php
                    } else {
                        echo "<strong>Anulada</strong>";
                    }
                    ?>

                </td>


            </tr>
        <?php } else { ?>
            <tr class="info">
                <td colspan="8"><strong>Reinicio de facturacion</strong></td>

            </tr>
        <?php } ?>
    <?php } ?>
    </tbody>
    </table>

    </br>
    <?php if (isset($limit)) { ?>
        <a class="btn" style="margin-left: 15px;" href=<?php echo validarSesion()."?iu=modtablafacturasimple.php&mdir=negocios&dir=facturasimple&limit=" . $limit; ?>>Mostrar más Filas</a>
    <?php } else { ?>
        <a class="btn" style="margin-left: 15px;" href=<?php echo validarSesion()."?iu=modtablafacturasimple.php&mdir=negocios&dir=facturasimple&limit=10"; ?>>Mostrar más Filas</a>
    <?php } //FIN IF BOTON ?>

    <?php
//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//
} else {

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//
    $limit = 10;

    if (isset($_GET['limit'])) {
        $limit = $_GET['limit'] + 10;
        $query = "SELECT * FROM facturasimple ORDER BY idfacturasimple DESC LIMIT $limit";
    } else {
        $query = "SELECT * FROM facturasimple ORDER BY idfacturasimple DESC LIMIT $limit";
    }

    $result = mysql_query($query);

    if (!$result) {
        echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) " .
        "en la BD: " . mysql_error();
        //Finalizo la aplicación
        exit;
    }
    ?>
    <legend>Facturas Simple</legend>
    <div class="input-prepend">
        <h5 style="margin-left: 15px ;">Filtrar por Fecha</h5>
        <span style="margin-left: 15px ;" class="add-on">Fecha Inicio</span><input id="fechai" type="date">    
        <span style="margin-left: 15px ;" class="add-on">Fecha Fin</span><input id="fechaf" type="date">
        <button style="margin-left: 15px ;" class="btn btn-warning" onclick="window.open('<?php echo validarSesion(); ?>?iu=modtablafacturasimple.php&mdir=negocios&dir=facturasimple&fechai='+fechai.value+'&fechaf='+fechaf.value+'','_self');">Buscar</button>       
    </div>
    <table style="margin: 15px 0px 0px 15px; width: 98%;" class="table table-bordered">
        <tr>
            <th style="font-weight: bold;">
                Codigo
            </th>
            <th style="font-weight: bold;">
                N° Factura
            </th>
            <th style="font-weight: bold;">
                Cliente
            </th>
            <th style="font-weight: bold;">
                Fecha
            </th>
            <th style="font-weight: bold;">
                Neto
            </th>
            <th style="font-weight: bold;">
                Iva
            </th>
            <th style="font-weight: bold;">
                Total
            </th>
            <th style="font-weight: bold;">
                Opciones
            </th>


        </tr>
        <tbody style="background-color: #ffffff;">    
    <?php while ($fila = mysql_fetch_assoc($result)) { ?>
                <?php
                if ($fila['fecha'] != "0000-00-00") {
                    if ($fila['anulada'] == 1) {
                        echo '<tr class="error">';
                        $flag = true;
                    } else {
                        echo '<tr>';
                        $flag = false;
                    }
                    ?>
                <td>
                    <?php echo $fila['idfacturasimple']; ?>
                </td>
                <td>
            <?php echo $fila['numerofacturasimple']; ?>
                </td>
                <td>
            <?php echo select_nombre_cliente($fila['idcliente']); ?>
                </td>
                <td>
            <?php echo $fila['fecha']; ?>
                </td>
                <td>
                    € <?php echo $fila['totalneto']; ?>
                </td>
                <td>
                    € <?php echo $fila['totaliva']; ?>
                </td>
                <td>
                    € <?php echo $fila['total']; ?>
                </td>
                <td>
            <?php if ($flag == false) { ?>
                        <a class="btn" onclick="if(confirm('¿Esta seguro de que desea anular esta factura?\nRecuerde, que se anulara permanentemente.')){window.open('facturasimple/anular.php?id='+<?php echo $fila['idfacturasimple'] ?>+'','_self')}" class="btn" ><i class="icon-ban-circle"></i> Anular</a>
                        <a class="btn" href="facturasimple/Imprimirfacturasimple.php?idfact=<?php echo $fila['idfacturasimple']; ?>" ><i class="icon-print"></i> Imprimir</a>
                <?php
            } else {
                echo "<strong>Anulada</strong>";
            }
            ?>

                </td>


            </tr>
        <?php } else { ?>
            <tr class="info">
                <td colspan="8"><strong>Reinicio de facturacion</strong></td>

            </tr>
        <?php } ?>
    <?php } ?>
    </tbody>
    </table>
    </br>

    <?php if (isset($limit)) { ?>
        <a class="btn" style="margin-left: 15px;" href=<?php echo validarSesion()."?iu=modtablafacturasimple.php&mdir=negocios&dir=facturasimple&limit=" . $limit; ?>>Mostrar más Filas</a>
    <?php } else { ?>
        <a class="btn" style="margin-left: 15px;" href=<?php echo validarSesion()."?iu=modtablafacturasimple.php&mdir=negocios&dir=facturasimple&limit=10"; ?>>Mostrar más Filas</a>
    <?php } //FIN IF BOTON ?>

<?php } //FIN IF BUSCADOR ?>
