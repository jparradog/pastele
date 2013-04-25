<?php
define("RUTA_ABS", dirname(__FILE__));
include (RUTA_ABS."/../controlador/redirect.php");

include (RUTA_ABS."/../controlador/conexion.php");
include (RUTA_ABS."/../negocios/cliente/clienteonfactura.php");
include (RUTA_ABS."/../negocios/producto/productoonfactura.php");
include (RUTA_ABS."/../negocios/factura/traerdoc.php");


$doc = traerdoc($_GET["idalb"], "albaran"); //PASO EL ID y LA TABLA
$cliente = select_cliente($doc['idcliente']);
$renglones = traer_renglones($doc["idalbaran"], "albaran")
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Albaran</title>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
        <link media="screen" href="albaran.css" rel="stylesheet" type="text/css">
        <link media="print" href="printalbaran.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="../js/albaran.js"></script>
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
                    <label  for="numfactura"><b>N° Albaran:</b> </label>  <label id="numfactura"> <?php echo $doc['numeroalb']; ?> </label>  


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
                <h1 class="titulo">Albaran  </h1>    
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
                            <th>Cod. Producto</th>
                            <th>Producto</th>
                            <th>Precio Unit €</th>
                            <th>Cantidad</th>

                            <th>Importe</th>
                        </tr>
                    </thead>

                    <tbody id="tbody">

                        <?php
                        $t = 1;
                        while ($fila = mysql_fetch_assoc($renglones)) {
                            echo '<tr name="fila" id="'.$t++.'"> ';
                            echo '<td>' . $fila['idproducto'] . '</td>';
                            echo '<td>' . select_prod($fila["idproducto"]) . '</td>';
                            echo '<td>' . $fila['punitario'] . '</td>';
                            echo '<td>' . $fila['cantidad'] . '</td>';
                            echo '<td>' . $fila['total'] . '</td>';
                            echo '</tr>';
                        }
                        ?>

                    </tbody>

                    <thead>
                        <tr  >
                            <th></th>


                            <th  colspan="2" ></th>

                            <th>Total </th>

                            <th >€ <?php echo $doc["total"]; ?> </th>
                        </tr>


                    </thead>
                </table>

            </div>
            <div class="botonfilas">       

                <button onclick="window.print();" class="btn btn-primary" type="button"> <i class=" icon-print"></i> Imprimir</button> 
                <button onclick="window.open('../<?php echo validarSesion(); ?>?iu=modtablaalbaran.php&mdir=negocios&dir=albaran','_self');" class="btn " type="button"> <i class="icon-arrow-left"></i> Cancelar</button>    
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