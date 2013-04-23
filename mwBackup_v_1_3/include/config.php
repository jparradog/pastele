<?php
date_default_timezone_set("Europe/Madrid");

$idioma="lang_spanish.php";		// Idioma

$mwBack="mwBackup ver.1.3";		// Aparece en la cabecera del archivo backup.

$host ="localhost";				// Host para la conexion a  MySQL.

$usuario ="pastele2_root";				// usuario  para la conexion a MySQL.
//$usuario ="root";
$passwd = "8Cj7G8u9qm";					// Password para la conexion a MySQL.
//$passwd = "";
$bd = "pastele2_dbpastele";					// Base de Datos que se seleccionar�.

$dia = date("Y-m-d");
$hora = date("H-i-s");

$nombre = "Backup-".$dia."_".$hora.".sql";			// Nombre del fichero que se generar�. 

$descarga= true;				// Si el archivo generado se ofrece para la descarga.
          
$drop = true;					// Determina si la tabla ser� vaciada (si existe) cuando  restauremos la tabla. 

$path ="copias";				// path a donde van las copias (relativa al script).

/* 
* Tipo de compresion. 
* Puede ser "gz" o false (sin comprimir) 
* Se aplicar� solo si se puede.
*/ 

/* verificar si existe Zlib */
if( !@function_exists( 'gzopen' ) ) {
	$hayZlib = false;
	$compresion = ""; 
}
else {
	$hayZlib = true;
	$compresion = "gz"; 
}

$parent="../main.php";			// URL donde se vuelve tras backup, restore o cancelaci�n (relativa al script).
    
?>