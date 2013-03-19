<?php
define("RUTA_ABS", dirname(__FILE__));
include_once (RUTA_ABS . "/controlador/conexion.php");

$idmes = $_GET['idmes'];

conectar_bd();

$query = "SELECT trimestre.nombretrimestre
FROM trimestre
INNER JOIN mes
ON mes.idtrimestre = trimestre.idtrimestre
WHERE mes.idmes = $idmes
LIMIT 1";

$result = mysql_query($query);

$fila = mysql_fetch_array($result);
?>

<form name="formulario" style="margin-left: 15px;" action="negocios/compras/modificarcompra.php" method="post">
    <div name="titulos">
        <legend><?php echo $_GET['proveedor'] . " / " . $fila['nombretrimestre'] . " / " . $_GET['nombremes']; ?></legend>  
    </div>
    <div name="datos">       
        <label>Proveedor</label>
        <select name="idproveedor" type="text">
            <?php include (RUTA_ABS . "/negocios/compras/traerproveedores.php"); ?>
        </select>

        <label>Valor</label>
        <input name="valor" type="text" required value="<?php echo $_GET['valor'] ?>"></input>

        <label>IVA</label>
        <input name="iva" type="text" required value="<?php echo $_GET['iva']; ?>"></input>
        
        <label>Fecha</label>
        <input name="fecha" type="date" required value="<?php echo $_GET['fecha']; ?>"></input>

    </div>
    <div name="ocultos">
        <!-- Paso por POST los idrenglon, trimestre y mes-->    
        <input name="idrengloncompras" type="hidden" value="<?php echo  $_GET['idrengloncompras'] ;?>"></input>
    </div>
    <p></p>
    <input type="submit" class="btn btn-primary" value="Guardar" name="guardar">
    <input type="button" class="btn btn-primary" onclick="window.open('main.php?iu=modtablacompras.php&mdir=negocios&dir=compras','_self');" value="Atras" name="atras">
    <input type="button" class="btn btn-primary" onclick="window.open('main.php','_self');" value="Salir" name="salir">
</form>