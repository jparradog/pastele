<?php

$idproveedor = $_POST['idproveedor'];
$idrengloncompras = $_POST['idrengloncompras'];
$fecha = '"' . $_POST['fecha'] . '"';
$valor = str_replace(",", ".", $_POST['valor']);
$iva = str_replace(",", ".", $_POST['iva']);

//----------------------------------------------------------------------------//
//GUARDO LA COMPRA EN LA BASE DE DATOS
//----------------------------------------------------------------------------//


define("RUTA_ABS", dirname(__FILE__));
include_once (RUTA_ABS . "/../../controlador/conexion.php");

conectar_bd();

$mes = getMes($_POST['fecha']);

$query = "UPDATE renglon_compras 
    SET idmes = $mes , fecha = $fecha , valor = $valor , iva = $iva , idproveedor = $idproveedor
    WHERE idrengloncompras = $idrengloncompras";

$sql = false;

if (mysql_query($query)) {
    $sql = true;
}

if ($sql == true) {
    header('Location:../../main.php?iu=modtablacompras.php&dir=compras&mdir=negocios&msg=compraok');
} else {
    echo '<div class="alert alert-error">Ocurrio un error en la modificacion de la Compra. <a href="../../main.php?iu=modtablacompras.php&dir=compras&mdir=negocios"<b>Volver</b></div>';
}

function getMes($fecha) {
    $fecha = strpbrk($fecha, '-');
    $fecha = mb_substr($fecha, 1, 2);
    return $fecha;
}

?>
