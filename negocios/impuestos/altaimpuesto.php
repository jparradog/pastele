<?php
define("RUTA_ABS", dirname(__FILE__));
include_once (RUTA_ABS."/../../controlador/conexion.php");

//--------------IVA

$iva = $_POST['iva'];

//----------------------------------
$impuesto = false;

$conexion = conectar_bd();

$sql_impuesto = "INSERT INTO impuesto (iva) VALUES ($iva)";

if(mysql_query($sql_impuesto)){
    $impuesto = true;
}

if ($impuesto == true){
    header('Location:../../main.php?iu=msg.php&mdir=vistas&msg=impuesto');
} else {
    echo '<div class="alert alert-error">Ocurrio un error en la carga del impuesto. <a href="main.php?iu=impuesto.php&mdir=vistas&dir=impuesto"><b>Volver</b></a></div>';
}

?>
