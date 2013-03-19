<?php
define("RUTA_ABS", dirname(__FILE__));
include_once (RUTA_ABS."/../../controlador/conexion.php");

$idproveedor = $_POST['idproveedor'];
$nombre = '"' .str_replace(" ","&nbsp;",$_POST['nombre']) . '"';
$telefono = '"' . trim($_POST['telefono']). '"';
$movil = '"' . trim($_POST['movil']). '"';
//Datos de Domicilio
$iddomicilio = $_POST['iddomicilio'];
$calle = '"' .str_replace(" ","&nbsp;",$_POST['calle']) . '"';
$numero = '"' . trim($_POST['numero'] ). '"';
$localidad = '"' . str_replace(" ","&nbsp;",$_POST['localidad']) . '"';
$provincia = '"' . str_replace(" ","&nbsp;",$_POST['provincia']) . '"';

$prov = false;
$dom = false;
$tel = false;

//Conecto con la base de datos
conectar_bd();

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//

$sql_proveedor = "UPDATE proveedor 
SET nombre = $nombre , provincia = $provincia
WHERE idproveedor = $idproveedor";

//Ejecuto la consulta
if(mysql_query($sql_proveedor)){
    $prov = true;
}

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//

$sql_domicilio = "UPDATE domicilio
SET calle = $calle, numero = $numero, localidad = $localidad
WHERE iddomicilio = $iddomicilio";

//Ejecuto la consulta
if(mysql_query($sql_domicilio)){
    $dom = true;
}

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//

$sql_tel = "UPDATE telefono_proveedor
SET numerotelprov = $telefono, movil = $movil
WHERE idproveedor = $idproveedor";

//Ejecuto la consulta
if(mysql_query($sql_tel)){
    $tel = true;
}

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//
//$prov == true && $dom == true && $tel == true
if($prov == true && $dom == true && $tel == true){
     header('Location:../../main.php?iu=modtablaproveedor.php&dir=proveedor&mdir=negocios&msg=provok');
    
} else {
    echo 'Error';
}
?>
