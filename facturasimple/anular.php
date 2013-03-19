<?php
define("RUTA_ABS", dirname(__FILE__));

include (RUTA_ABS."/../controlador/conexion.php");
$id=$_GET["id"];
$conexion = conectar_bd();

    $query = "UPDATE facturasimple
SET anulada = 1
WHERE idfacturasimple = $id";;

    $result = mysql_query($query);

    if (!$result) {
        echo "No pudo ejecutarse satisfactoriamente la consulta ($query) " .
        "en la BD: " . mysql_error();
        //Finalizo la aplicación
        exit;
    }
header("Location: ../main.php?iu=modtablafacturasimple.php&mdir=negocios&dir=facturasimple");

?>