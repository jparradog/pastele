<?php



function conectar_bd() {
    $conexion = @mysql_connect("localhost", "root", "") or die("Fallo en el establecimiento de la conexion !");
    @mysql_select_db("panaderia") or die("No se encuentra la Base de Datos !");
    return $conexion;
}

?>
