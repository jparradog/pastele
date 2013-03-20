<?php
/*
 *  @author: Luismo
 * 
 *  Descripcion: 
 * 
 * 
 */

include 'conexion.php';
$cli = false;
//Conecto con la base de datos
$conexion = conectar_bd();

if ($_POST['initnum'] == null) {

    /*
     * Guardo facturas con valores en cero, cuando modtablafactura.php encuentra una de estas
     * muestra el cartel REINICIO DE FACTURACION
     */
    $sql_cabecera = "INSERT INTO factura (idcliente,fecha,total,numerofactura,anulada,totaliva,totalneto) 
VALUES (0,00-00-0000,0,0,0,0,0)";
    $sql_cabecera2 = "INSERT INTO facturasimple (numerofacturasimple,idcliente,fecha,totalneto,totaliva,total,anulada) 
VALUES (0,0,0000-00-00,0,0,0,0)";

    $query_update_num = "UPDATE numfact SET num = 0 WHERE idnumfact=1";
    $msgalert = "Se ha reiniciado la numeracion a 0 (Cero) exitosamente.";


} else {

    $numero = (int) $_POST['initnum'];
    ($numero--);

    $query_update_num = "UPDATE numfact SET num = $numero WHERE idnumfact=1";
    $msgalert = "El salto de numeracion se ha realizado con exito.";
}
    mysql_query($query_update_num);
    mysql_query($sql_cabecera);
    mysql_query($sql_cabecera2);



//Ejecuto las consultas
?>
<div class="alert alert-success" style="margin-right:15px;">

    <strong>¡Atención!</strong> <?php echo $msgalert; ?>

</div>

<!-- ARCHIVO DE LA MUERTE -->