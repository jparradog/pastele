<?php
define("RUTA_ABS", dirname(__FILE__));
include_once (RUTA_ABS."/../../controlador/conexion.php");

//Datos de Gastos Varios
$descripcion = '"' . str_replace(" ","&nbsp;",$_POST['descripcion']) . '"';
$precio = str_replace(",",".",$_POST['precio']);
$fecha = '"' .$_POST['fecha']. '"';
$iva = str_replace(",",".",$_POST['iva']);

//Variable para saber si se ejecuto bien la consulta y para luego redirigir
//a el archivo vistas/msg.php
$gasto = false ;

$conexion = conectar_bd();

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//

$sql_gastos = "INSERT INTO gastos_varios (descripcion, precio, fecha,iva)
    VALUES ($descripcion, $precio, $fecha,$iva)";

if(mysql_query($sql_gastos)){
    $gasto = true ;
}

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//

if ($gasto == true){
    header('Location:../../main.php?iu=gastos.php&mdir=vistas&dir=gastos&msg=gastook');
} else {
    echo 'Error';
}
?>
