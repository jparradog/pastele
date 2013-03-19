<?php

//Datos de Cliente
$cant_renglones = $_POST['inputidx'];
$idcliente = $id;
$fecha = '"' .$_POST['fecha']. '"';
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
$sql_cabecera = "INSERT INTO facturasimple (numerofacturasimple,idcliente,fecha,totalneto,totaliva,total,anulada) 
VALUES ($numerofactura,$idcliente,$fecha,$totalneto,$totaliva,$total,$anulada)";

//Ejecuto la consulta
if (mysql_query($sql_cabecera)) {
    $cli = true;
}

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//
$sql_id_factura = "SELECT MAX(idfacturasimple) FROM facturasimple";
//Asigno el resultado de la consulta a $result
$result = mysql_query($sql_id_factura);
//Si la consulta no devuelve algun valor
if (!$result) {
    echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) " .
    "en la BD: " . mysql_error();
}
//Obtengo el valor del array devuelto en la consulta y lo asigno a $ultimo_id
$fila = mysql_fetch_assoc($result);
    
    $ultimo_id = $fila['MAX(idfacturasimple)'];

$i=1;
while($i<=$cant_renglones){
    
    $prod = '"'.$_POST['inputproducto'.$i].'"';
    $iva = $_POST['selectiva'.$i];
    $valoriva = $_POST['outvaloriva'.$i];
    $neto = $_POST['outneto'.$i];
    $subtot = $_POST['inputsubtot'.$i];

    $sql_renglon = "INSERT INTO renglon_facturasimple (producto,iva,neto,valoriva,total,idfacturasimple)
    VALUES ($prod,$iva,$neto,$valoriva,$subtot,$ultimo_id)";

    
    if(mysql_query($sql_renglon)){
        $renglon = true;
    }
     $i++;
}
    

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//
//Si las consultas de cliente, domicilio y telefono se ejecutaron correctamente
if ($cli == true && $renglon == true) {

    echo '<div class="msg-factura"><strong>Factura Simple grabada</strong></div>';
} else {
    //Muestro un error
    echo '<div class="alert alert-error">Ocurrio un error en la carga de la Factura. <a href="../main.php"><b>Volver</b></a></div>';
}

?>
