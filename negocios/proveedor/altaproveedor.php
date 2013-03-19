<?php
define("RUTA_ABS", dirname(__FILE__));
include_once (RUTA_ABS."/../../controlador/conexion.php");

$nombre = '"' .str_replace(" ","&nbsp;",$_POST['nombre']) . '"';
$telefono = '"' . trim($_POST['telefono']). '"';
//Datos de Domicilio
$calle = '"' .str_replace(" ","&nbsp;",$_POST['calle']) . '"';
$numero = '"' . trim($_POST['numero'] ). '"';
$localidad = '"' . str_replace(" ","&nbsp;",$_POST['localidad']) . '"';
$provincia = '"' . str_replace(" ","&nbsp;",$_POST['provincia']) . '"';
$movil = '"' . trim($_POST['movil']). '"';

$prov = false;
$dom = false;
$tel = false;

//Conecto con la base de datos
$conexion = conectar_bd();

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//


//Query para insertar un domicilio
$sql_domicilio = "INSERT INTO domicilio (calle,numero,localidad) 
VALUES ($calle,$numero,$localidad)";

//Ejecuto la consulta
if(mysql_query($sql_domicilio)){
    $dom = true;
}

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//

//Selecciono el ultimo id (Siempre es el mayor el ultimo)
$sql_id_dom = "SELECT MAX(iddomicilio) FROM domicilio";
//Asigno el resultado de la consulta a $result
$result = mysql_query($sql_id_dom);
//Si la consulta no devuelve algun valor
if (!$result) {
    echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) " .
    "en la BD: " . mysql_error();
}
//Obtengo el valor del array devuelto en la consulta y lo asigno a $ultimo_id
while ($fila = mysql_fetch_assoc($result)) {
    //Guardo el ultimo id de domicilio
    $ultimo_id = $fila['MAX(iddomicilio)'];
}

$sql_domicilio = "INSERT INTO proveedor (nombre, iddomicilio, provincia) VALUES ($nombre, $ultimo_id, $provincia)";

if(mysql_query($sql_domicilio)){
    $prov = true;
}

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//

//Selecciono el ultimo id (Siempre es el mayor el ultimo)
$sql_id_prov = "SELECT MAX(idproveedor) FROM proveedor";
//Asigno el resultado de la consulta a $result
$result = mysql_query($sql_id_prov);

//Obtengo el valor del array devuelto en la consulta y lo asigno a $ultimo_cli
while ($fila = mysql_fetch_assoc($result)) {
    //Guardo el ultimo id de domicilio
    $ultimo_prov = $fila['MAX(idproveedor)'];
}

$sql_tel = "INSERT INTO telefono_proveedor (numerotelprov, idproveedor, movil) VALUES ($telefono,$ultimo_prov, $movil)";

if(mysql_query($sql_tel)){
    $tel = true;
}

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//

if($prov == true && $dom == true && $tel == true){
     header('Location:../../main.php?iu=modtablaproveedor.php&dir=proveedor&mdir=negocios&msg=provok');
} else {
    echo 'Error';
}
?>
