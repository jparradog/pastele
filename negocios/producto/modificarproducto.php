<?php
define("RUTA_ABS", dirname(__FILE__));
include_once (RUTA_ABS."/../../controlador/conexion.php");

$idproducto = $_POST['idproducto'];
$idiva = $_POST['iva'];
$descripcion = '"' .str_replace(" ","&nbsp;",$_POST['descripcion']). '"';
$precioref = str_replace(",", ".", $_POST['precioref']);

$producto = false;
$conexion = conectar_bd();

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//

$sql_producto = "UPDATE producto
SET descripcion = $descripcion , iva = $idiva, precioref=$precioref
WHERE idproducto = $idproducto";

//Ejecuto la consulta
if(mysql_query($sql_producto)){
    $producto = true;
}

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//

if ($producto == true){
    header('Location:../../main.php?iu=modtablaproducto.php&mdir=negocios&dir=producto&msg=prod');
} else {
    echo 'Error';
}
?>
