<?php



function conectar_bd() {
    $conexion = @mysql_connect("localhost", "pastele1_trium1", "f+#5F)Rq+fUI") or die("Fallo en el establecimiento de la conexion !");
    @mysql_select_db("pastele1_panaderia") or die("No se encuentra la Base de Datos !");
    return $conexion;
}

?>
