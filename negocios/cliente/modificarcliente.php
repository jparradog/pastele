<?php
define("RUTA_ABS", dirname(__FILE__));
include_once (RUTA_ABS."/../../controlador/conexion.php");

//Datos de Cliente
$idcliente = $_POST['idcliente'];
$nombre = '"' . str_replace(" ","&nbsp;",$_POST['nombre']) . '"';
$apellido = '"' . trim($_POST['apellido'] ). '"';
$cuit = '"' . trim($_POST['cuit']) . '"';
$dni = '"' . trim($_POST['dni']) . '"';
$email = '"' . trim($_POST['email']) . '"';
$telefono = '"' .trim($_POST['telefono']).'"';
$apellido2 = '"' .trim($_POST['2apellido']).'"';
$movil = '"' .trim($_POST['movil']).'"';


//Datos de Domicilio
$iddomicilio = $_POST['iddomicilio'];
$calle = '"' . str_replace(" ","&nbsp;",$_POST['calle']). '"';
$numero = '"' . trim($_POST['numero']) . '"';
$localidad = '"' . str_replace(" ","&nbsp;",$_POST['localidad']) . '"';

//Variables para saber si se ejecuto bien la consulta
$cli = false;
$dom =  false;
$tel = false;

//Conecto con la base de datos
$conexion = conectar_bd();

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//

$sql_cliente = "UPDATE cliente
SET nombre = $nombre, apellido = $apellido , cuit = $cuit , dni = $dni, email = $email, 2apellido = $apellido2
WHERE idcliente = $idcliente";

//Ejecuto la consulta
if(mysql_query($sql_cliente)){
    $cli = true;
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

$sql_tel = "UPDATE telefono_cliente
SET numerotelcliente = $telefono, movil = $movil
WHERE idcliente = $idcliente";

//Ejecuto la consulta
if(mysql_query($sql_tel)){
    $tel = true;
}

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//

//Si las consultas de cliente, domicilio y telefono se ejecutaron correctamente
if($cli == true && $dom == true && $tel && true){    
    //redirecciono al main y muestro un mensaje de exito
    header('Location:../../main.php?iu=modtablacliente.php&dir=cliente&mdir=negocios&msg=clienteok');
} else {
    //Muestro un error
    echo '<div class="alert alert-error">Ocurrio un error en la modificacion del Cliente. <a href="main.php?iu=modcliente.php&mdir=vistas&dir=cliente"<b>Volver</b></div>';
}

?>
