<?php



function conectar_bd() {
    $conexion = @mysql_connect("localhost:3307", "root", "root") or die("Fallo en el establecimiento de la conexion !");
    @mysql_select_db("panaderia") or die("No se encuentra la Base de Datos !");
    return $conexion;
}

?>
