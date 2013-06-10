<?php
define("RUTA_ABS", dirname(__FILE__));
include (RUTA_ABS . "/../controlador/redirect.php");
include (RUTA_ABS . "/../controlador/conexion.php");
include (RUTA_ABS . "/../negocios/cliente/clienteonfactura.php");

ini_set("error_reporting", E_ALL & ~E_NOTICE);

$id = $_POST['cliente'];
$cliente[] = select_cliente($id); //TRAE EL CLIENTE

include (RUTA_ABS . "/../negocios/facturasimple/altafacturasimple.php");
header("Location: imprimirfacturasimple.php?idfact=$ultimo_id")
?>

