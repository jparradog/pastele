<?php
define("RUTA_ABS", dirname(__FILE__));
include (RUTA_ABS."/../controlador/redirect.php");
include (RUTA_ABS."/../controlador/conexion.php");
include (RUTA_ABS."/../negocios/cliente/clienteonfactura.php");
include (RUTA_ABS."/../negocios/producto/productoonfactura.php");
$id = $_POST['cliente'];
$cliente[] = select_cliente($id); //TRAE EL CLIENTE

include (RUTA_ABS."/../negocios/factura/altafactura.php");
header("Location: imprimirfactura.php?idfact=$ultimo_id")
?>
