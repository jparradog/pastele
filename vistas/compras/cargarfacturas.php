<?php
/*
 * vistas/compras/cargarfacturas.php -> negocios/compras/guardarcompra.php
 * 
 * Este script obitiene los id's pasados por GET del script redirectcargarfacturas.php
 * Se encarga de mostrar la información que el usuario seleccionó en el formulario
 * anterior (compras.php) y permite cargar las facturas asociadas a un Proveedor, 
 * Trimestre y Mes elegido en el form compras.php.
 * Finalmente cuando el usuario carga los datos de una factura (Fecha, Valor e IVA)
 * y pulsa el botón guardar, se pasa toda la información al script 
 * negocios/compras/guardarcompra.php que se encarga de insertar en la BD.
 */

//Obtengo los id pasados por parametros en la URL de redirectcargarfacturas.php
$proveedor = $_GET['proveedor'];
$trimestre = $_GET['trimestre'];
$mes = $_GET['mes'];

define("RUTA_ABS", dirname(__FILE__));
include_once (RUTA_ABS."/controlador/conexion.php");

conectar_bd();

//Con esta query, a partir de los datos recibidos por GET, obtengo el Nombre
//Del proveedor, trimestre y mes elegido en el form compras.php
$query = "SELECT proveedor.nombre , trimestre.nombretrimestre, mes.nombremes
FROM proveedor 
INNER JOIN trimestre
ON trimestre.idtrimestre = $trimestre 
INNER JOIN mes
ON mes.idmes = $mes
WHERE proveedor.idproveedor = $proveedor";

//Ejecuto la consulta
$result = mysql_query($query);

//En fila guardo los nombres
$fila = mysql_fetch_array($result);
?>
<div class="well">
<form name="formulario" style="margin-left: 15px;" action="negocios/compras/guardarcompra.php" method="post">
    <div name="titulos">
        <legend><?php echo $fila['nombre'] . " / " . $fila['nombretrimestre'] . " / " . $fila['nombremes']; ?></legend>  
    </div>
    <div name="mensaje">
        <?php
        //Este IF se encarga de recibir el msg pasado por el script negocios/compras/guardarcompras.php
        //y muestra un mensaje de exito                
        if ($_GET['msg'] == 'cargaok') {
            echo '<div class="alert alert-success">La FACTURA se guardó correctamente en la Base de datos
                </br>Para guardar otra, ingrese los datos y pulse Guardar
                </br>Si finalizó pulse Salir</div>';
        }
        ?>
    </div>
    <div name="datos">
        <table>
            <tr>
                <td>
                    <label>Fecha</label>
                    <input name="fecha" type="date" required></input>        
                </td>
                <td>
                    <label>Valor</label>
                    <input name="valor" type="text" required></input>
                </td>
                <td>
                    <label>IVA</label>
                    <input name="iva" type="text"></input>
                </td>

            </tr>
        </table>
    </div>
    <div name="ocultos">
        <!-- Paso por POST los id de proveedor, trimestre y mes-->
        <input name="proveedor" type="hidden" value="<?php echo $proveedor ?>"></input>
        <input name="trimestre" type="hidden" value="<?php echo $trimestre ?>"></input>
        <input name="mes" type="hidden" value="<?php echo $mes ?>"></input>        
    </div>
    <p></p>
    <input type="submit" class="btn btn-primary" value="Guardar" name="guardar">
    <input type="button" class="btn btn-primary" onclick="window.open('main.php?iu=compras.php&mdir=vistas&dir=compras','_self');" value="Atras" name="atras">
    <input type="button" class="btn btn-primary" onclick="window.open('main.php','_self');" value="Salir" name="salir">
</form>
</div>