<?php

define("RUTA_ABS", dirname(__FILE__));
include_once (RUTA_ABS."/../../controlador/conexion.php");


$idiva = $_POST['idiva'];
$iva = $_POST['iva'];

$impuesto = false;
$conexion = conectar_bd();

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//

$sql_producto = "UPDATE impuesto
SET iva = $iva
WHERE idiva = $idiva";

//Ejecuto la consulta
if(mysql_query($sql_producto)){
    $impuesto = true;
}

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//

if ($impuesto == true){
    header('Location:../../main.php?iu=msg.php&mdir=vistas&msg=impuesto');
} else {
    echo '<div class="alert alert-error">Ocurrio un error al modificar el impuesto. <a href="main.php?iu=modimpuesto.php&mdir=vistas&dir=impuesto"><b>Volver</b></a></div>';
}
?>
