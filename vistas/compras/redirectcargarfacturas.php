<?php
/*
 * Este script toma los datos del script compras.php y redirecciona hacia el
 * formulario cargarfacturas.php, pasando como parámetros el idproveedor
 * idtrimestre.
 */

//Obtengo los id
$proveedor = $_POST['proveedor'];

$mes = $_POST['meses'];

define("RUTA_ABS", dirname(__FILE__));
include_once (RUTA_ABS."/../../controlador/conexion.php");

conectar_bd();

$query = "SELECT idtrimestre FROM mes WHERE idmes = $mes";

$result = mysql_query($query);

$fila = mysql_fetch_array($result);

$trimestre = $fila['idtrimestre'];

//Armo la redireccion
$header = "Location: ../../main.php?iu=cargarfacturas.php&mdir=vistas&dir=compras&proveedor=$proveedor&trimestre=$trimestre&mes=$mes";

//Redirecciono
header($header);
?>
