<?php
/*
 *(bars) sidebar_main.php -> (negocios/producto) modtablaproducto.php -> (vistas/producto) modproducto.php
 * 
 * Incluye la tabla de productos con todos los campos de productos
 * Agrega una columna con un boton que permite elegir una fila y 
 * editar ese producto. Al hacer esto, se pasan los datos por GET que
 * estan en la fila elegida al script de la vista modcproducto.php.
 */

include_once (RUTA_ABS."/controlador/conexion.php");

$conexion = conectar_bd();

$query = "SELECT * FROM producto ORDER BY descripcion";

$result = mysql_query($query);

if (!$result) {
    echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) " .
    "en la BD: " . mysql_error();
    //Finalizo la aplicación
    exit;
}
//----------------------------------------------------------------------------//
?>

<legend>Modificar Producto</legend>
<div name="mensaje">
        <?php
        //Este IF se encarga de recibir el msg pasado por el script negocios/compras/guardarcompras.php
        //y muestra un mensaje de exito                
        if(isset($_GET['msg'])){
        if ($_GET['msg'] == 'prod') {
            echo '<div class="alert alert-success">El producto se guardó correctamente en la Base de datos</div>';
        }}
        ?>
    </div>
<table style="margin: 15px 0px 0px 15px; width: 98%;" class="table table-bordered">
    <tr>
        <th style="font-weight: bold;">
            Codigo
        </th>
        <th style="font-weight: bold;">
            Nombre
        </th>
        <th style="font-weight: bold;">
            Iva %
        </th>
        <th style="font-weight: bold">
            Precio Referencia
        </th>
        <th style="font-weight: bold;">
            Editar
        </th>      
          
    </tr>
    <tbody style="background-color: #ffffff;">    
        <?php while ($fila = mysql_fetch_assoc($result)) { ?>
            <tr>   
                <td>
                    <?php echo $fila['idproducto']; ?>                      
                </td>
                <td>
                    <?php echo $fila['descripcion']; ?>                      
                </td>
                <td>
                    <?php 
                    //Obtengo a partir de fila['iva'] ( = idiva) el valor que se asocia a ese id iva
                    //de la tabla impuesto
                    $query_iva = "SELECT iva FROM impuesto where idiva = ".$fila['iva']."";
                    $resultado = mysql_query($query_iva);
                    $num_iva = mysql_fetch_array($resultado);
                    //Muestro el valor del iva y no el idiva 
                    echo $num_iva['iva']." %";
                    ?>
                </td>
                <td>
                    <?php echo $fila['precioref']; ?>
                </td>
                <td>
                    <!--<input type="hidden" name="idproveedor" <?php// echo "value=".$fila['idproveedor']; ?>> -->
                    <a class="btn" href=<?php echo "main.php?iu=modproducto.php&mdir=vistas&dir=producto&iva=".$num_iva['iva'].""."&idproducto=".$fila['idproducto'].""."&descripcion=".$fila['descripcion']."&precioref=".$fila['precioref'].""; ?>><i class="icon-pencil"></i></a>
                </td>
                                
            </tr>
        <?php } ?>
    </tbody>
</table>