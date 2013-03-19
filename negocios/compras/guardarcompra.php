<?php
/*
 * negocios/compras/guardarcompra.php -> vistas/compras/cargarfacturas.php
 * 
 * Este script recibe los datos y se encarga de guardarlos en la BD.
 * También redirecciona de vuelta al formulario que lo llamó (cargarfacturas.php)
 * y pasa como parámetro en la URL el msg de éxito.
 */

//Obtengo los datos
$proveedor = $_POST['proveedor'];
$trimestre = $_POST['trimestre'];
$mes = $_POST['mes'];
$fecha = '"' .$_POST['fecha']. '"';
$valor = str_replace(",", ".", $_POST['valor']);
$iva = str_replace(",", ".", $_POST['iva']);

//----------------------------------------------------------------------------//
//GUARDO LA COMPRA EN LA BASE DE DATOS
//----------------------------------------------------------------------------//

define("RUTA_ABS", dirname(__FILE__));
include_once (RUTA_ABS."/../../controlador/conexion.php");

conectar_bd();


$query = "INSERT INTO renglon_compras (idmes, fecha, valor, iva, idproveedor) 
    VALUES ($mes, $fecha, $valor, $iva, $proveedor) ";

mysql_query($query);

//Redirecciono al formulario cargarfacturas.php por si el cliente desea seguir cargando más facturas.
//Paso como parametro en la variable msg el cargaok para saber que se guardo correctamente
$header = "Location: ../../main.php?iu=cargarfacturas.php&mdir=vistas&dir=compras&proveedor=$proveedor&trimestre=$trimestre&mes=$mes&msg=cargaok";

//Redirecciono
header($header);
?>
