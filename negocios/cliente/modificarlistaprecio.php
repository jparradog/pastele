<?php
define("RUTA_ABS", dirname(__FILE__));
include_once (RUTA_ABS."/../../controlador/conexion.php");
//Obtengo el id del cliente
$idcliente = $_POST['idcliente'];
//Guardo en K la cantidad de productos que tiene la tabla
$k = $_POST['pos'];

$conexion = conectar_bd();
//Inicializo la variable idproducto en 1, que es equivalente
//al primer id grabado en la bd de la tabla producto
$idprod = 1;
//Recorro desde la posición 0 hasta la cantidad de elementos
for($i=0;$i<$k;$i++){
    //Armo la consulta: 
    $sql = "UPDATE listaprecio SET precio = $_POST[$i] WHERE idcliente = $idcliente AND idproducto = $idprod";
    //Ejecuto la consulta
    mysql_query($sql);
    //Aumento el id del producto
    $idprod++;
}

header("Location:../../main.php?iu=listaprecios.php&mdir=vistas&dir=cliente&msg=preciook")
?>
