<?php
define("RUTA_ABS", dirname(__FILE__));
include_once (RUTA_ABS."/../../controlador/conexion.php");

//Datos Producto
$iva = $_POST['iva'];
$descripcion = '"' .str_replace(" ","&nbsp;",$_POST['descripcion']). '"';
$precioref = str_replace(",", ".", $_POST['precioref']);

$producto = false;

$conexion = conectar_bd();

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//

$sql_producto = "INSERT INTO producto (iva, descripcion, precioref) VALUES ($iva,$descripcion,$precioref)";

if(mysql_query($sql_producto)){
    $producto = true;
}
//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//
//Selecciono el ultimo id (Siempre es el mayor el ultimo)
$sql_id_prod = "SELECT MAX(idproducto) FROM producto";
//Asigno el resultado de la consulta a $result
$result = mysql_query($sql_id_prod);
//Si la consulta no devuelve algun valor
if (!$result) {
    echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) " .
    "en la BD: " . mysql_error();
}
//Obtengo el valor del array devuelto en la consulta y lo asigno a $ultimo_id
while ($fila = mysql_fetch_assoc($result)) {
    //Guardo el ultimo id de domicilio
    $ultimo_id = $fila['MAX(idproducto)'];
}

$sql_clientes = "SELECT DISTINCT idcliente FROM listaprecio";

$result_cli = mysql_query($sql_clientes);

while($fila = mysql_fetch_array($result_cli)){
    $idcliente = $fila['idcliente'];
    $sql_cliente_listaprecio = "INSERT INTO listaprecio (idcliente,idproducto,precio) VALUES ($idcliente,$ultimo_id,$precioref)";
    mysql_query($sql_cliente_listaprecio);
}

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//

if ($producto == true){
    header('Location:../../main.php?iu=msg.php&mdir=vistas&msg=prod');
} else {
    echo 'Error';
}
?>
