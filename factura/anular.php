<?php

define("RUTA_ABS", dirname(__FILE__));
include (RUTA_ABS . "/../controlador/conexion.php");
$id = $_GET["id"];
$conexion = conectar_bd();

$query = "UPDATE factura
SET anulada = 1
WHERE idfactura = $id";
;

$result = mysql_query($query);

if (!$result) {
    echo "No pudo ejecutarse satisfactoriamente la consulta ($query) " .
    "en la BD: " . mysql_error();
    //Finalizo la aplicación
    exit;
}
header("Location: ../main.php?iu=modtablafactura.php&mdir=negocios&dir=factura");
?>