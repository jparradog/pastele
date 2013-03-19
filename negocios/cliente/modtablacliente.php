<div class="well">
<?php
/*
 * (bars) sidebar_main.php -> (negocios/cliente) modtablacliente.php -> (vistas/cliente) modcliente.php
 * 
 * Incluye la tabla de clientes con todos los campos de productos y su domicilio
 * Agrega una columna con un boton que permite elegir una fila y 
 * editar ese cliente. Al hacer esto, se pasan los datos por GET que
 * estan en la fila elegida al script de la vista modcliente.php.
 */

define("RUTA_ABS", dirname(__FILE__));
include_once (RUTA_ABS."/controlador/conexion.php");

$conexion = conectar_bd();

$query = "SELECT  cliente.idcliente, cliente.nombre, cliente.apellido, cliente.2apellido, cliente.cuit, cliente.dni, cliente.email, domicilio.iddomicilio,domicilio.calle, domicilio.localidad, domicilio.numero, telefono_cliente.numerotelcliente, telefono_cliente.movil
FROM cliente
INNER JOIN domicilio
ON cliente.iddomicilio = domicilio.iddomicilio
INNER JOIN telefono_cliente
ON telefono_cliente.idcliente = cliente.idcliente
ORDER BY cliente.nombre
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

<legend>Modificar Cliente</legend>
<?php
if(isset($_GET['msg'])){
  if($_GET['msg'] == 'clienteok'){
      echo '<div class="alert alert-success">El cliente se guardó correctamente en la Base de datos</div>';
  }}
  ?>
<table style="margin: 15px 0px 0px 15px; width: 98%;" class="table table-bordered">
    <tr>

        <th style="font-weight: bold;">
            Nombre
        </th>
        <th style="font-weight: bold;">
            Apellido
        </th>
        <th style="font-weight: bold;">
            Segundo Apellido
        </th>
        <th style="font-weight: bold;">
            Nif
        </th>
        <th style="font-weight: bold;">
            DNI
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
            Localidad
        </th>
        <th style="font-weight: bold;">
            Editar
        </th>


    </tr>
    <tbody style="background-color: #ffffff;">    
        <?php while ($fila = mysql_fetch_assoc($result)) { ?>
            <tr>
        <input type="hidden" name="iddomicilio" <?php echo "value=" . $fila['iddomicilio']; ?>>
        <input type="hidden" name="iddomicilio" <?php echo "value=" . $fila['idcliente']; ?>>  
        <td>
            <?php echo $fila['nombre']; ?>
        </td>
        <td>
            <?php echo $fila['apellido']; ?>
        </td>
        <td>
            <?php echo $fila['2apellido']; ?>
        </td>
        <td>
            <?php echo $fila['cuit']; ?>
        </td>
        <td>
            <?php echo $fila['dni']; ?>
        </td>
        
        <td>
            <?php echo $fila['numerotelcliente']; ?>
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
            <a class="btn" href= <?php echo "main.php?iu=modcliente.php&mdir=vistas&dir=cliente&idcliente=" . $fila['idcliente'] . "&nombre=" . $fila['nombre'] . "" . "&apellido=" . $fila['apellido']. "" . "&apellido2=" . $fila['2apellido'] . "" . "&cuit=" . $fila['cuit'] . "" . "&dni=" . $fila['dni'] . "" . "&email=" . $fila['email'] . "" . "&numerotelcliente=" . $fila['numerotelcliente']. "" . "&movil=" . $fila['movil'] . "" . "&calle=" . $fila['calle'] . "" . "&numero=" . $fila['numero'] . "" . "&localidad=" . $fila['localidad'] . "" . "&iddomicilio=" . $fila['iddomicilio'] . ""; ?> ><i class="icon-pencil"></i></a>
        </td>                

    </tr>
<?php } ?>
</tbody>
</table>
</div>