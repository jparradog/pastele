<?php
/*
 * (bars) sidebar_main.php -> (negocios/proveedor) modtablaproveedor.php -> (vistas/proveedor) modproveedor.php
 * 
 * Incluye la tabla de proveedores con todos los campos de proveedores y su domicilio
 * Agrega una columna con un boton que permite elegir una fila y 
 * editar ese proveedor. Al hacer esto, se pasan los datos por GET que
 * estan en la fila elegida al script de la vista modproveedor.php.
 */
define("RUTA_ABS", dirname(__FILE__));
include_once (RUTA_ABS . "/controlador/conexion.php");

$conexion = conectar_bd();

$query = "SELECT proveedor.iddomicilio, proveedor.idproveedor, proveedor.nombre, proveedor.provincia, domicilio.calle, domicilio.localidad, domicilio.numero ,telefono_proveedor.numerotelprov, telefono_proveedor.movil
FROM proveedor
INNER JOIN domicilio
ON proveedor.iddomicilio = domicilio.iddomicilio
INNER JOIN telefono_proveedor
ON telefono_proveedor.idproveedor = proveedor.idproveedor
ORDER BY proveedor.nombre
";

$result = mysql_query($query);

if (!$result) {
    echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) " .
    "en la BD: " . mysql_error();
    //Finalizo la aplicación
    exit;
}

//----------------------------------------------------------------------------//
?>
<legend>Modificar Proveedor</legend>
<?php
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'provok') {
        echo '<div class="alert alert-success">El proveedor se guardó correctamente en la Base de datos</div>';
    }
}
?>
<table style="margin: 15px 0px 0px 15px; width: 98%;" class="table table-bordered">
    <tr>
        <th style="font-weight: bold;">
            Codigo
        </th>
        <th style="font-weight: bold;">
            Nombre
        </th>
        <th style="font-weight: bold;">
            Telefono
        </th>
        <th style="font-weight: bold;">
            Movil
        </th>
        <th style="font-weight: bold;">
            Calle
        </th>
        <th style="font-weight: bold;">
            Numero
        </th>
        <th style="font-weight: bold;">
            Población
        </th>
        <th style="font-weight: bold;">
            Provincia
        </th>
        <th style="font-weight: bold;">
            Editar
        </th>


    </tr>
    <tbody style="background-color: #ffffff;">    
<?php while ($fila = mysql_fetch_assoc($result)) { ?>
            <tr>
                <td>
    <?php echo $fila['idproveedor']; ?>
                    <input type="hidden" name="iddomicilio" <?php echo "value=" . $fila['iddomicilio']; ?>>  
                </td>
                <td>
    <?php echo $fila['nombre']; ?>
                </td>
                <td>
    <?php echo $fila['numerotelprov']; ?>
                </td>
                <td>
    <?php echo $fila['movil']; ?>
                </td>
                <td>
    <?php echo $fila['calle']; ?>
                </td>
                <td>
    <?php echo $fila['numero']; ?>
                </td>
                <td>
    <?php echo $fila['localidad']; ?>
                </td>
                <td>
    <?php echo $fila['provincia']; ?>
                </td>

                <td>
                    <a class="btn" href=<?php echo "main.php?iu=modproveedor.php&mdir=vistas&dir=proveedor&idproveedor=" . $fila['idproveedor'] . "&nombre=" . $fila['nombre'] . "" . "&telefono=" . $fila['numerotelprov'] . "" . "&movil=" . $fila['movil'] . "" . "&calle=" . $fila['calle'] . "" . "&numero=" . $fila['numero'] . "" . "&localidad=" . $fila['localidad'] . "" . "&iddomicilio=" . $fila['iddomicilio'] . "" . "&provincia=" . $fila['provincia']; ?>><i class="icon-pencil"></i></a>
                </td>

            </tr>
<?php } ?>
    </tbody>
</table>