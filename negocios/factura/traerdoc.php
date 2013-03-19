<?php

function traerdoc($id, $table) {

    $conexion = conectar_bd();

    $query = "SELECT * FROM $table WHERE id$table=$id";

    $result = mysql_query($query);

    if (!$result) {
        echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) " .
        "en la BD: " . mysql_error();
        //Finalizo la aplicación
        exit;
    }



    $fila = mysql_fetch_assoc($result);
    return $fila;
}

function traer_renglones($id, $table) {
    $conexion = conectar_bd();

    $query = "SELECT * FROM renglon_$table WHERE id$table=$id";

    $result = mysql_query($query);

    if (!$result) {
        echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) " .
        "en la BD: " . mysql_error();
        //Finalizo la aplicación
        exit;
    }
    return $result;
}

?>
