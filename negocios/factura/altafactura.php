<?php

//Datos de Cliente
$cant_renglones = $_POST['inputidx'];
$idcliente = $id;
$fecha = '"' . $_POST['fecha'] . '"';
$total = $_POST['total'];
$totaliva = $_POST['totaliva'];
$totalneto = $_POST['totalneto'];
$anulada = 0;


$cli = false;

//Conecto con la base de datos
$conexion = conectar_bd();

//----------------------------------------------------------------------------//
//Query para guardar el numero de factura
$sql_numerofactura = "SELECT num FROM numfact";
//$sql_numerofactura = "SELECT MAX(numerofactura) FROM factura";
//Asigno el resultado de la consulta a $result
$result = mysql_query($sql_numerofactura);
$fila = mysql_fetch_array($result);
$numerofactura = $fila['num'];
if ($numerofactura == NULL || $numerofactura == 0) {
    $numerofactura = 1;
} else {

    $numerofactura++;
}
$query_update_num = "UPDATE numfact SET num = $numerofactura WHERE idnumfact=1";
mysql_query($query_update_num);


//----------------------------------------------------------------------------//
//Query para insertar una cabecera
$sql_cabecera = "INSERT INTO factura (idcliente,fecha,total,numerofactura,anulada,totaliva,totalneto) 
VALUES ($idcliente,$fecha,$total,$numerofactura,$anulada,$totaliva,$totalneto)";

//Ejecuto la consulta
if (mysql_query($sql_cabecera)) {
    $cli = true;
}

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//
$sql_id_factura = "SELECT MAX(idfactura) FROM factura";
//Asigno el resultado de la consulta a $result
$result = mysql_query($sql_id_factura);
//Si la consulta no devuelve algun valor
if (!$result) {
    echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) " .
    "en la BD: " . mysql_error();
}
//Obtengo el valor del array devuelto en la consulta y lo asigno a $ultimo_id
$fila = mysql_fetch_assoc($result);
//Guardo el ultimo id de domicilio
$ultimo_id = $fila['MAX(idfactura)'];

$i = 1;
while ($i <= $cant_renglones) {

    $idprod = $_POST['outidprod' . $i];

    $punit = $_POST['outpunit' . $i];
    $cant = $_POST['inputcant' . $i];
    $iva = $_POST['outiva' . $i];
    $valoriva = $_POST['outvaloriva' . $i];
    $neto = $_POST['outneto' . $i];
    $subtot = $_POST['outsubtot' . $i];

    $sql_renglon = "INSERT INTO renglon_factura (idproducto,punitario,cantidad,total,neto,idfactura,valoriva,iva)
    VALUES ($idprod,$punit,$cant,$subtot,$neto,$ultimo_id,$valoriva,$iva)";


    if (mysql_query($sql_renglon)) {
        $renglon = true;
    }
    $i++;
}


//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//
//Si las consultas de cliente, domicilio y telefono se ejecutaron correctamente
if ($cli == true && $renglon == true) {
    //redirecciono al main y muestro un mensaje de exito

    echo '<div  class="msg-factura"><strong>Factura grabada</strong></div>';
} else {
    //Muestro un error
    echo '<div class="alert alert-error">Ocurrio un error en la carga de la Factura. <a href="../main.php"><b>Volver</b></a></div>';
}
?>
