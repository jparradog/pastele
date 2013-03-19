<?php

/*
 * Este script se encarga de verificar si el loguin es exito
 * Si es asi, redirecciona al script index.php
 * Si no vuelve a la pagina de loguin pasando por GET un mensaje de error
 */
define("RUTA_ABS", dirname(__FILE__));
//Incluyo el archivo de conexion
include_once (RUTA_ABS."/../controlador/conexion.php");

//recibo los datos del login por post y los guardo en variables
$usuario = make_safe($_POST['usuario']);
$contraseña = make_safe($_POST['contraseña']);

//conecto con la base de datos
$conexion = conectar_bd();
//armo el query que devueleve los usuarios registrados en la base de datos
$query = "SELECT usuario, clave, tipo FROM admin WHERE usuario = '$usuario' AND  clave = '$contraseña'";
//Ejecuto la consulta y la almaceno en la variable $result
$result = mysql_query($query);
//Guardo el resultado en $fila
$fila = mysql_fetch_array($result);
//Obtengo el tipo de permisos
$tipo = $fila['tipo'];

$logeado = false;


if ($tipo == 'administrador') {

    //Creo la session
    session_start();
    //Le asigno el nombre de admin a la session
    $_SESSION['admin'] = 'admin';
    //Defino la sesion que contiene la fecha y hora en que se creo la sesion
    $_SESSION['ultimoAcceso'] = date("Y-n-j H:i:s");

    $logeado = true;
    //redirijo a la pagina principal
    header("Location:../main.php");
}

if ($tipo == 'usuario') {

    //Creo la session
    session_start();
    //Le asigno el nombre de admin a la session
    $_SESSION['usr'] = 'usr';
    //Defino la sesion que contiene la fecha y hora en que se creo la sesion
    $_SESSION['ultimoAcceso'] = date("Y-n-j H:i:s");

    $logeado = true;
    //redirijo a la pagina principal
    header("Location:../mainusr.php");
}

if ($logeado == false) {
    header("Location:login.php?errorusuario=si");
}


mysql_free_result($result);
mysql_close();



/*
 *  Comprueba si hay algun caracter raro cuando el usuario introduce los datos, y quita 
 *  o neutraliza los mismos. podemos evitar que cualquier persona utilize su propio código del SQL en nuestra base de datos
 *  Funcion utilizada para validar los caracteres introducidos por el usuario.
 *  Fuente:http://www.desarrolloweb.com/articulos/seguridad-php-ii.html
 */

function make_safe($variable) {
    $variable = addslashes(trim($variable));
    return $variable;
}

?>
