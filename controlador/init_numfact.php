<?php

include 'conexion.php';

//Conecto con la base de datos
$conexion = conectar_bd();
$numero = '"' . trim($_POST['initnum']) . '"';
/*
 * GUARDO UNA FACTURA CON VALORES EN CERO! QUE LUEGO SERA MOSTRADA EN LAS VISTAS COMO EL REINCIO DE NUMERACION
 */
$query_update_num = "UPDATE numfact SET num = $numero WHERE idnumfact=1"; //LOS TIPOS DE FACTURA SIMPLE Y FACTURA MIRAN ESTA TABLA SIEMPRE

mysql_query($query_update_num);
//Ejecuto la consulta



?>
<div class="alert alert-success" style="margin-right:15px;">
    
    <strong>¡Atención!</strong> El número de factura, ha sido reiniciado.
    
</div>

