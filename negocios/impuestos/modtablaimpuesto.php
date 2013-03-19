<?php
define("RUTA_ABS", dirname(__FILE__));
include_once (RUTA_ABS."/controlador/conexion.php");

$conexion = conectar_bd();

$query = "SELECT * FROM impuesto";

$result = mysql_query($query);

if (!$result) {
    echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) " .
    "en la BD: " . mysql_error();
    //Finalizo la aplicación
    exit;
}
?>
  <legend>Impuestos</legend>
<table style="margin: 15px 0px 0px 15px; width: 98%;" class="table table-bordered">
    <tr>
        <th style="font-weight: bold;">
            Codigo
        </th>
        <th style="font-weight: bold;">
            Iva %
        </th>
        <th style="font-weight: bold;">
            Editar
        </th>
          
    </tr>
    <tbody style="background-color: #ffffff;">    
        <?php while ($fila = mysql_fetch_assoc($result)) { ?>
            <tr>
                <td>
                    <?php echo $fila['idiva']; ?>
                </td>
                <td>
                    <?php echo $fila['iva']." %"; ?>
                </td>
                <td>
                    <a class="btn" href=<?php echo "main.php?iu=modimpuesto.php&mdir=vistas&dir=impuesto&iva=".$fila['iva'].""."&idiva=".$fila['idiva'].""; ?>><i class="icon-pencil"></i></a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>