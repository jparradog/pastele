<?php

define("RUTA_ABS", dirname(__FILE__));
include_once (RUTA_ABS . "/../../controlador/conexion.php");

//Datos de Cliente
$nombre = '"' . str_replace(" ", "&nbsp;", $_POST['nombre']) . '"';
$apellido = '"' . trim($_POST['apellido']) . '"';
$cuit = '"' . trim($_POST['cuit']) . '"';
$dni = '"' . trim($_POST['dni']) . '"';
$email = '"' . trim($_POST['email']) . '"';
$telefono = '"' . trim($_POST['telefono']) . '"';
$movil = '"' . trim($_POST['movil']) . '"';
$apellido2 = '"' . trim($_POST['2apellido']) . '"';

//Datos de Domicilio
$calle = '"' . str_replace(" ", "&nbsp;", $_POST['calle']) . '"';
$numero = '"' . trim($_POST['numero']) . '"';
$localidad = '"' . str_replace(" ", "&nbsp;", $_POST['localidad']) . '"';

//Variables para saber si se ejecuto bien la consulta y para luego redirigir
//a el archivo vistas/msg.php
$cli = false;
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
if (mysql_query($sql_domicilio)) {
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


//Query para guardar un cliente
$sql_cliente = "INSERT INTO cliente (nombre, apellido, cuit, dni, email, iddomicilio, 2apellido)
VALUES ($nombre, $apellido, $cuit, $dni, $email, $ultimo_id, $apellido2)";

//Ejecuto la consulta
if (mysql_query($sql_cliente)) {
    $cli = true;
}

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//
//Selecciono el ultimo id (Siempre es el mayor el ultimo)
$sql_id_cli = "SELECT MAX(idcliente) FROM cliente";
//Asigno el resultado de la consulta a $result
$result = mysql_query($sql_id_cli);

//Obtengo el valor del array devuelto en la consulta y lo asigno a $ultimo_cli
while ($fila = mysql_fetch_assoc($result)) {
    //Guardo el ultimo id de domicilio
    $ultimo_cli = $fila['MAX(idcliente)'];
}

$sql_tel = "INSERT INTO telefono_cliente (numerotelcliente, idcliente, movil) VALUES ($telefono,$ultimo_cli, $movil)";

if (mysql_query($sql_tel)) {
    $tel = true;
}

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//
//LISTA DE PRECIOS AUTOMATICA

//Selecciono todos los productos
$query_productos = "SELECT * FROM producto";

$productos = mysql_query($query_productos);

//Mientras haya un producto
while ($fila = mysql_fetch_array($productos)){
    
    $idprod = $fila['idproducto'];
    $precio = $fila['precioref'];
    
    $query_lista = "INSERT INTO listaprecio (idcliente,idproducto,precio) VALUES
        ($ultimo_cli,$idprod,$precio)";
    
    //Guardo en la tabla listaprecio
    mysql_query($query_lista);
    
}

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//
//Si las consultas de cliente, domicilio y telefono se ejecutaron correctamente
if ($cli == true && $dom == true && $tel && true) {
    //redirecciono al main y muestro un mensaje de exito

    header('Location:../../main.php?iu=modtablacliente.php&dir=cliente&mdir=negocios&msg=clienteok');
} else {
    //Muestro un error
    echo '<div class="alert alert-error">Ocurrio un error en la carga del Cliente. <a href="main.php?iu=altascliente.php&mdir=vistas&dir=cliente"<b>Volver</b></div>';
}
?>