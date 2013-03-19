<?php

function select_prod($id) {

    $conexion = conectar_bd();


    $query = "SELECT * FROM producto WHERE idproducto=".$id."";

    $result = mysql_query($query);

    if (!$result) {
        echo "No pudo ejecutarse satisfactoriamente la consulta ($result) " .
        "en la BD: " . mysql_error();
        //Finalizo la aplicación
        exit;
    }

//----------------------------------------------------------------------------//



    while ($fila = mysql_fetch_assoc($result)) {
       $descripcion = $fila['descripcion'];
    }
    return $descripcion;
}
?>