<?php
include 'conexion.php';
$cli = false;
//Conecto con la base de datos
$conexion = conectar_bd();

$sql_cabecera = "INSERT INTO factura (idcliente,fecha,total,numerofactura,anulada,totaliva,totalneto) 
VALUES (0,00-00-0000,0,0,0,0,0)";
$sql_cabecera2 = "INSERT INTO facturasimple (numerofacturasimple,idcliente,fecha,totalneto,totaliva,total,anulada) 
VALUES (0,0,0000-00-00,0,0,0,0)";
/*
 * GUARDO UNA FACTURA CON VALORES EN CERO! QUE LUEGO NO SERA MOSTRADA EN LAS VISTAS!
 */
$query_update_num = "UPDATE numfact SET num = 0 WHERE idnumfact=1";

mysql_query($query_update_num);
mysql_query($sql_cabecera);
mysql_query($sql_cabecera2);
//Ejecuto las consultas



?>
<div class="alert alert-success" style="margin-right:15px;">
    
    <strong>¡Atención!</strong> El número de factura, ha sido reiniciado.
    
</div>

<!-- ARCHIVO DE LA MUERTE -->