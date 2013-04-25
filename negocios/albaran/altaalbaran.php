<?php

//Datos de Cliente
$cant_renglones = $_POST['inputidx'];
$idcliente = $id;
$fecha = '"' .$_POST['fecha']. '"';
$total = $_POST['total'];
$anulada = 0;


$cli = false;

//Conecto con la base de datos
$conexion = conectar_bd();

//----------------------------------------------------------------------------//
//Query para guardar el numero de albaran
$sql_idalbaran = "SELECT MAX(numeroalb) FROM albaran";
//Asigno el resultado de la consulta4 a $result
$result = mysql_query($sql_idalbaran);
$fila = mysql_fetch_array($result);
$numeroalb = $fila['MAX(numeroalb)'];
if ($numeroalb == NULL){
    $numeroalb = 1;
}else{
    $numeroalb++;
}




//----------------------------------------------------------------------------//
//Query para insertar una cabecera
$sql_cabecera = "INSERT INTO albaran (idcliente,fecha,total,anulada,numeroalb) 
VALUES ($idcliente,$fecha,$total,$anulada,$numeroalb)";

//Ejecuto la consulta
if (mysql_query($sql_cabecera)) {
    $cli = true;
}

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//
$sql_id_albaran = "SELECT MAX(idalbaran) FROM albaran";
//Asigno el resultado de la consulta a $result
$result = mysql_query($sql_id_albaran);
//Si la consulta no devuelve algun valor
if (!$result) {
    echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) " .
    "en la BD: " . mysql_error();
}
//Obtengo el valor del array devuelto en la consulta y lo asigno a $ultimo_id
$fila = mysql_fetch_assoc($result);
    //Guardo el ultimo id de domicilio
    $ultimo_id = $fila['MAX(idalbaran)'];

$t=1;

while($t<=$cant_renglones){

    $idprod = $_POST['outidprod' . $t];
    
    $punit = $_POST['outpunit' . $t];
    $cant = $_POST['inputcant' . $t];
    $subtot = $_POST['outsubtot' . $t];

    $sql_renglon = "INSERT INTO renglon_albaran (idproducto,punitario,cantidad,total,idalbaran)
    VALUES ($idprod,$punit,$cant,$subtot,$ultimo_id)";

    
    if(mysql_query($sql_renglon)){
        $renglon = true;
    }
     $t++;
}
    

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//

if ($cli == true && $renglon == true) {
    //redirecciono al main y muestro un mensaje de exito

    echo '<div class="msg-factura"><strong>Albaran grabado</strong></div>';
} else {
    //Muestro un error
    echo '<div class="alert alert-error">Ocurrio un error en la carga del Cliente. <a href="../main.php"><b>Volver</b></a></div>';
}

?>
