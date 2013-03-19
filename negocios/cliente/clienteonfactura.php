<?php

/*
 * Este archivo me trae todos los datos del cliente segun el id que le mande en la funcion. 
 */



function select_cliente($id) {

    $conexion = conectar_bd();


    $query = "SELECT  cliente.idcliente, cliente.nombre, cliente.apellido, cliente.2apellido, cliente.cuit, cliente.dni, cliente.email, domicilio.iddomicilio,domicilio.calle, domicilio.localidad, domicilio.numero
FROM cliente
INNER JOIN domicilio
ON cliente.iddomicilio = domicilio.iddomicilio WHERE idcliente=".$id."";

    $result = mysql_query($query);

    if (!$result) {
        echo "No pudo ejecutarse satisfactoriamente la consulta ($result) " .
        "en la BD: " . mysql_error();
        //Finalizo la aplicación
        exit;
    }

//----------------------------------------------------------------------------//



    while ($fila = mysql_fetch_assoc($result)) {
        $arraycliente = array(
            "idcliente" => $fila["idcliente"],
            "nombre" => $fila["nombre"],
            "apellido" => $fila["apellido"],
            "apellido2" => $fila["2apellido"],
            "nif" => $fila["cuit"],
            "dni" => $fila["dni"],
            "email" => $fila["email"],
            "iddomicilio" => $fila["iddomicilio"],
            "calle" => $fila["calle"],
            "poblacion" => $fila["localidad"],
            "numero" => $fila["numero"],
        );
    }
    return $arraycliente;
}

function select_nombre_cliente($id) {

    $conexion = conectar_bd();


    $query = "SELECT nombre,apellido FROM cliente WHERE idcliente=".$id."";

    $result = mysql_query($query);

    if (!$result) {
        echo "No pudo ejecutarse satisfactoriamente la consulta ($query) " .
        "en la BD: " . mysql_error();
        //Finalizo la aplicación
        exit;
    }

//----------------------------------------------------------------------------//



$fila = mysql_fetch_assoc($result);
        
    
    return $fila["nombre"]." ".$fila["apellido"];
}

?>
