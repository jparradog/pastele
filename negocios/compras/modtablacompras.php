<?php
/*
 * (bars) sidebar_main.php -> (negocios/compras) modtablacompras.php -> (vistas/compras) modcompras.php
 * 
 * Incluye la tabla de gastos con todos los campos de gastos
 * Agrega una columna con un boton que permite elegir una fila y 
 * editar ese gasto. Al hacer esto, se pasan los datos por GET que
 * estan en la fila elegida al script de la vista modgastos.php.
 */
define("RUTA_ABS", dirname(__FILE__));
include_once (RUTA_ABS . "/controlador/conexion.php");

$conexion = conectar_bd();

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//

if (isset($_GET['fechai']) && isset($_GET['fechaf'])) {

    $fechainicio = '"' . $_GET['fechai'] . '"';

    $fechafin = '"' . $_GET['fechaf'] . '"';

    $sql_buscar = "
SELECT renglon_compras.idrengloncompras,renglon_compras.idmes, mes.nombremes , renglon_compras.fecha , renglon_compras.valor , renglon_compras.iva , renglon_compras.idproveedor,proveedor.nombre
FROM renglon_compras
INNER JOIN mes
ON renglon_compras.idmes = mes.idmes
INNER JOIN proveedor
ON proveedor.idproveedor = renglon_compras.idproveedor
    WHERE renglon_compras.fecha BETWEEN $fechainicio AND $fechafin";

    $result_buscar = mysql_query($sql_buscar);

    if (!$result_buscar) {
        echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) " .
        "en la BD: " . mysql_error();
        //Finalizo la aplicación
        exit;
    }
    ?>
    <legend style="margin-left:15px;">Modificar Compras a Proveedores</legend>
    <div class="input-prepend">
        <label style="margin-left: 5px ;" >Filtrar por Fecha</label>
        <span style="margin-left: 5px ;" class="add-on">Fecha Inicio</span><input id="fechai" type="date">    
        <span style="margin-left: 5px ;" class="add-on">Fecha Fin</span><input id="fechaf" type="date">
        <button style="margin-left: 5px ;" class="btn btn-warning" onclick="window.open('main.php?iu=modtablacompras.php&mdir=negocios&dir=compras&fechai='+fechai.value+'&fechaf='+fechaf.value+'','_self');">Buscar</button>       
    </div>
    <table style="margin: 15px 0px 0px 15px; width: 98%;" class="table table-bordered">
        <tr>
            <th style="font-weight: bold;">
                Codigo
            </th>
            <th style="font-weight: bold;">
                Mes
            </th>
            <th style="font-weight: bold;">
                Fecha
            </th>
            <th style="font-weight: bold;">
                Valor
            </th>
            <th style="font-weight: bold;">
                IVA
            </th>
            <th style="font-weight: bold;">
                Proveedor
            </th>
            <th style="font-weight: bold;">
                Editar
            </th>
        </tr>
        <tbody style="background-color: #ffffff;">    
            <?php while ($fila = mysql_fetch_assoc($result_buscar)) { ?>
                <tr>
                    <td>
                        <?php echo $fila['idrengloncompras']; ?>
                    </td>
                    <td>
                        <?php echo $fila['nombremes']; ?>
                    </td>
                    <td>
                        <?php echo $fila['fecha']; ?>
                    </td>
                    <td>
                        <?php echo $fila['valor']; ?>
                    </td>
                    <td>
                        <?php echo $fila['iva']; ?>
                    </td>
                    <td>
                        <?php echo $fila['nombre']; ?>
                    </td>
                    <td>
                        <a class="btn" href=<?php echo "main.php?iu=modcompras.php&mdir=vistas&dir=compras&idrengloncompras=" . $fila['idrengloncompras'] . "&nombremes=" . $fila['nombremes'] . "" . "&fecha=" . $fila['fecha'] . "" . "&valor=" . $fila['valor'] . "" . "&iva=" . $fila['iva'] . "&proveedor=" . $fila['nombre'] . "&idmes=" . $fila['idmes'] . "&idproveedor=" . $fila['idproveedor'] . ""; ?>><i class="icon-pencil"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    </br>
    <a class="btn" href=<?php echo "main.php?iu=modtablacompras.php&mdir=negocios&dir=compras&limit=" . $limit; ?>>Mostrar más Filas</a>
    <?php
//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//
} else {

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//
    $limit = 10;

    if (isset($_GET['limit'])) {
        $limit = $_GET['limit'] + 10;
        $query = "
SELECT renglon_compras.idrengloncompras,renglon_compras.idmes, mes.nombremes , renglon_compras.fecha , renglon_compras.valor , renglon_compras.iva , renglon_compras.idproveedor,proveedor.nombre
FROM renglon_compras
INNER JOIN mes
ON renglon_compras.idmes = mes.idmes
INNER JOIN proveedor
ON proveedor.idproveedor = renglon_compras.idproveedor
ORDER BY renglon_compras.idrengloncompras DESC 
LIMIT $limit";
    } else {
        $query = "
SELECT renglon_compras.idrengloncompras,renglon_compras.idmes, mes.nombremes , renglon_compras.fecha , renglon_compras.valor , renglon_compras.iva , renglon_compras.idproveedor,proveedor.nombre
FROM renglon_compras
INNER JOIN mes
ON renglon_compras.idmes = mes.idmes
INNER JOIN proveedor
ON proveedor.idproveedor = renglon_compras.idproveedor
ORDER BY renglon_compras.idrengloncompras DESC 
LIMIT $limit";
    }

    $result = mysql_query($query);

    if (!$result) {
        echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) " .
        "en la BD: " . mysql_error();
        //Finalizo la aplicación
        exit;
    }
//----------------------------------------------------------------------------//
    ?>

    <legend style="margin-left:15px;">Modificar Compras a Proveedores</legend>
    <div class="input-prepend">
        <label style="margin-left: 5px ;" >Filtrar por Fecha</label>
        <span style="margin-left: 5px ;" class="add-on">Fecha Inicio</span><input id="fechai" type="date">    
        <span style="margin-left: 5px ;" class="add-on">Fecha Fin</span><input id="fechaf" type="date">
        <button style="margin-left: 5px ;" class="btn btn-warning" onclick="window.open('main.php?iu=modtablacompras.php&mdir=negocios&dir=compras&fechai='+fechai.value+'&fechaf='+fechaf.value+'','_self');">Buscar</button>       
    </div>
    <?php
    if ($_GET['msg'] == 'compraok') {
        echo '<div class="alert alert-success">La compra se guardó correctamente en la Base de datos</div>';
    }
    ?>
    <table style="margin: 15px 0px 0px 15px; width: 98%;" class="table table-bordered">
        <tr>
            <th style="font-weight: bold;">
                Codigo
            </th>
            <th style="font-weight: bold;">
                Mes
            </th>
            <th style="font-weight: bold;">
                Fecha
            </th>
            <th style="font-weight: bold;">
                Valor
            </th>
            <th style="font-weight: bold;">
                IVA
            </th>
            <th style="font-weight: bold;">
                Proveedor
            </th>
            <th style="font-weight: bold;">
                Editar
            </th>
        </tr>
        <tbody style="background-color: #ffffff;">    
            <?php while ($fila = mysql_fetch_assoc($result)) { ?>
                <tr>
                    <td>
                        <?php echo $fila['idrengloncompras']; ?>
                    </td>
                    <td>
                        <?php echo $fila['nombremes']; ?>
                    </td>
                    <td>
                        <?php echo $fila['fecha']; ?>
                    </td>
                    <td>
                        <?php echo $fila['valor']; ?>
                    </td>
                    <td>
                        <?php echo $fila['iva']; ?>
                    </td>
                    <td>
                        <?php echo $fila['nombre']; ?>
                    </td>
                    <td>
                        <a class="btn" href=<?php echo "main.php?iu=modcompras.php&mdir=vistas&dir=compras&idrengloncompras=" . $fila['idrengloncompras'] . "&nombremes=" . $fila['nombremes'] . "" . "&fecha=" . $fila['fecha'] . "" . "&valor=" . $fila['valor'] . "" . "&iva=" . $fila['iva'] . "&proveedor=" . $fila['nombre'] . "&idmes=" . $fila['idmes'] . "&idproveedor=" . $fila['idproveedor'] . ""; ?>><i class="icon-pencil"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    </br>
    <a class="btn" href=<?php echo "main.php?iu=modtablacompras.php&mdir=negocios&dir=compras&limit=" . $limit; ?>>Mostrar más Filas</a>

<?php } ?>
