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
for($t=0;$t<$k;$t++){
    //Armo la consulta: Insertar en lista de precios el id del cliente
    // el id del producto y el precio asociado a ese producto.
    $sql = "INSERT INTO listaprecio (idcliente,idproducto,precio) VALUES
        ($idcliente,$idprod,$_POST[$t])";
    //Ejecuto la consulta
    mysql_query($sql);
    //Aumento el id del producto
    $idprod++;
}

header("Location:../../main.php?iu=listaprecios.php&mdir=vistas&dir=cliente&msg=preciook")

?>
