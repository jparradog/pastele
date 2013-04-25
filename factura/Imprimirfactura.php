<?php
define("RUTA_ABS", dirname(__FILE__));
include (RUTA_ABS . "/../controlador/redirect.php");
include (RUTA_ABS . "/../controlador/conexion.php");
include (RUTA_ABS . "/../negocios/factura/traerdoc.php");
include (RUTA_ABS . "/../negocios/cliente/clienteonfactura.php");
include (RUTA_ABS . "/../negocios/producto/productoonfactura.php");


$doc = traerdoc($_GET["idfact"], "factura"); //PASO EL ID y LA TABLA
$cliente = select_cliente($doc['idcliente']);
$renglones = traer_renglones($doc["idfactura"], "factura")
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Factura</title>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
        <link media="screen" href="factura.css" rel="stylesheet" type="text/css">
        <link media="print" href="printfactura.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="../js/factura.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                showTotalRow();    
            });
            
            
        </script>

    </head>
    <body>

        <!-- CABECERA DE LA FACTURA -->
        <div  id="header" >          
            <div class="datosfactura"  > 

                <form class="form-inline" style="margin: 3px">
                    <label  for="numfactura"><b>N° Factura:</b> </label>  <label id="numfactura"> <?php echo $doc['numerofactura']; ?></label>  


<label for="fecha">&nbsp&nbsp<b>Fecha: </b> </label> <?php echo $doc['fecha']; ?> <!-- <input class="input-small" type="date" name="fecha" id="fecha" />  -->

                </form> 



                <form class="form-inline" style="margin: 1px">
                    <label for="inputcliente"><b>Cliente: </b></label> <label id="cliente" /><?php echo $cliente['nombre'] . " " . $cliente['apellido'] . " " . $cliente['apellido2']; ?></label>      

                </form>

                <form class="form-inline" style="margin: 1px">

                    <label for="nif"><b>NIF:</b> </label>  <label id="nif" name="nif"> <?php echo $cliente['nif'] ?> </label> 
                </form>  

                <form class="form-inline" style="margin: 1px">          
                    <label for="direccion"><b>Dirección: </b> </label>  <label id="dir" name="dir"> <?php echo $cliente['calle'] . " " . $cliente['numero']; ?> </label> 
                </form>     

                <form class="form-inline" style="margin: 1px">  

                    <label  for="poblacion"><b>Población: </b></label>  <label id="poblacion" name="poblacion"> <?php echo $cliente['poblacion']; ?> </label> 
                </form>     
                <form class="form-inline" style="margin: 1px">     



                </form> 
            </div> 
            <div class="titulofactura">
                <h1 class="titulo">Factura  </h1>    
                <address >
                    <strong>Garcia Laspina Omar Hector</strong><br>
                    N.I.F. 77656834-W<br>
                    C/Torre Marcelo,4- Telf. 639023973-950337693<br>
                    Cabo de gata Almeria<br>
                    Código Postal 04150<br>

                </address>
            </div>
        </div> 
        <!-- CUERPO DE LA FACTURA-->       
        <div id="container">
            <div class="tablafactura" style="margin-top: 1px">
                <table class="table table-hover" style="margin-top: 1px">

                    <thead>

                        <tr>
                            <th>Cod</th>
                            <th>Producto</th>
                            <th>P. Unitario </th>
                            <th>Cant.</th>
                            <th>Iva</th>
                            <th>Cuota Iva</th>
                            <th>Base Imponible</th>
                            <th>Importe</th>
                        </tr>
                    </thead>

                    <tbody id="tbody">
                        <?php
                        $t = 1;
                        while ($fila = mysql_fetch_assoc($renglones)) {
                            echo '<tr name="fila" id="' . $t++ . '"> ';
                            echo '<td>' . $fila['idproducto'] . '</td>';
                            echo '<td>' . select_prod($fila["idproducto"]) . '</td>';
                            echo '<td>' . $fila['punitario'] . '</td>';
                            echo '<td>' . $fila['cantidad'] . '</td>';
                            echo '<td>' . $fila['iva'] . '</td>';
                            echo '<td>' . $fila['valoriva'] . '</td>';
                            echo '<td>' . $fila['neto'] . '</td>';
                            echo '<td>' . $fila['total'] . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <table class="table table-bordered" style="margin: 5 1 5 1;">
                    <thead style="background-color:#f5f5f5;">
                        <tr>
                            <th colspan="2">Total Bruto</th>
                            <th>Base imponible</th>
                            <th>% I.V.A</th>
                            <th>Importe IVA</th>
                            <th>Total factura</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2">
                                <?php echo "€ " . $doc['totalneto'] ?>
                            </td>
                            
                            <td>
                                asd
                            </td>
                            <td>
                                asd
                            </td>
                            <td>
                                <?php echo "€ " . $doc['totaliva']?>
                            </td>
                            <td>
                                <?php echo "€" . $doc['total'] ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="botonfilas">       

                <button onclick="window.print();" class="btn btn-primary" type="button"> <i class=" icon-print"></i> Imprimir</button> 
                <button onclick="window.open('../<?php echo validarSesion(); ?>?iu=modtablafactura.php&mdir=negocios&dir=factura','_self');" class="btn " type="button"> <i class="icon-remove"></i> Cancelar</button>    
                </p>    
            </div>

            <!--
            <footer>    
                <div class="botonguardar">

                </div>
            </footer>
            -->

        </div>

    </body>

</html>
