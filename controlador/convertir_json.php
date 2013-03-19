<?php

define("RUTA_ABS", dirname(__FILE__));
include_once(RUTA_ABS . "/controlador/conexion.php"); //Incluyo el archivo Conexion q tiene los datos de la conexion ;D

function jsoner($fname, $idcliente) {

    $link = conectar_bd(); //ingreso los datos de la conexion

    $query = "SELECT  listaprecio.idcliente, listaprecio.idproducto, producto.descripcion, impuesto.iva , listaprecio.precio
FROM listaprecio
INNER JOIN producto
ON listaprecio.idproducto = producto.idproducto
INNER JOIN impuesto
ON producto.iva = impuesto.idiva
WHERE idcliente =" . $idcliente . " 
    ORDER BY descripcion"; //Consulta: Tomo todos los marcadores de la tabla

    $result = mysql_query($query); //ejecuto consulta

    if (!$result) {

        echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) " .
        "en la BD: " . mysql_error();

        exit;
    }

    while ($rowEmp = mysql_fetch_array($result)) {

        $data[] = $rowEmp;
    }



    $ar = fopen(RUTA_ABS . "/json/$fname.json", "w") or //CREA UN ARCHIVO NUEVO CON FOPEN
            die("Problemas en la creacion");


    fputs($ar, json_encode($data));
}
?>

