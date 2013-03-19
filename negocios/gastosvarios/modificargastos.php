<?php
define("RUTA_ABS", dirname(__FILE__));
include_once (RUTA_ABS."/../../controlador/conexion.php");

//Datos Gastos Varios
$idgastos = $_POST['idgastos'];
$precio = str_replace(",", ".", $_POST['precio']);
$descripcion = '"' .str_replace(" ","&nbsp;",$_POST['descripcion']). '"';
$iva = str_replace(",", ".", $_POST['iva']);
$fecha = '"' .$_POST['fecha']. '"';

//Variable para saber si se ejecuto bien la consulta y para luego redirigir
//a el archivo vistas/msg.php
$gasto = false;

$conexion = conectar_bd();

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//

$sql_gastos = "UPDATE gastos_varios
SET descripcion = $descripcion , precio = $precio , fecha = $fecha , iva = $iva
WHERE idgastos = $idgastos";

//Ejecuto la consulta
if(mysql_query($sql_gastos)){
    $gasto = true;
}

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//

if ($gasto == true){
    header('Location:../../main.php?iu=modtablagastos.php&dir=gastosvarios&mdir=negocios&msg=gastook');
} else {
    echo 'Error';
}
?>
