<?php
define("RUTA_ABS", dirname(__FILE__));
include (RUTA_ABS."/../controlador/redirect.php");
include (RUTA_ABS . "/../controlador/conexion.php");
include (RUTA_ABS . "/../negocios/factura/traerdoc.php");
include (RUTA_ABS . "/../negocios/cliente/clienteonfactura.php");
include (RUTA_ABS . "/../negocios/producto/productoonfactura.php");


$doc = traerdoc($_GET["idfact"], "facturasimple"); //PASO EL ID y LA TABLA
$cliente = select_cliente($doc['idcliente']);
$renglones = traer_renglones($doc["idfacturasimple"], "facturasimple")
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Factura Simple</title>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
        <link media="screen" href="facturasimple.css" rel="stylesheet" type="text/css">
        <link media="print" href="printfacturasimple.css" rel="stylesheet" type="text/css">

        <script type="text/javascript" src="facturasimple.js"></script>

    </head>
    <body>

        <!-- CABECERA DE LA FACTURA -->
        <div  id="header" >          
            <div class="datosfactura"  > 

                <form class="form-inline" style="margin: 3px">
                    <label  for="numfactura"><b>N° Factura:</b> </label>  <label id="numfactura"><?php echo $doc['numerofacturasimple']; ?></label>  


                    <label for="fecha">&nbsp&nbsp<b>Fecha: </b> </label><?php echo $doc["fecha"]; ?>

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
                            <th>N°&nbsp</th>
                            <th>Descripción</th>
                            <th>Iva (%)</th>
                            <th>Cuota Iva</th>
                            <th>Base Imponible</th>
                            <th>Importe</th>
                        </tr>
                    </thead>

                    <tbody id="tbody">
                        <?php
                        $i = 1;
                        while ($fila = mysql_fetch_assoc($renglones)) {
                            echo '<tr name="fila"> ';
                            echo '<td>' . $i . '</td>';
                            echo '<td>' . $fila['producto'] . '</td>';
                            echo '<td>' . $fila['iva'] . '</td>';
                            echo '<td>' . $fila['valoriva'] . '</td>';
                            echo '<td>' . $fila['neto'] . '</td>';
                            echo '<td>' . $fila['total'] . '</td>';
                            echo '</tr>';
                            $i++;
                        }
                        ?>



                    </tbody>

                    <thead>
                        <tr  >
                            <th></th>
                            <th></th>
                            <th></th>
                            <th  >Cuota IVA €&nbsp<output id="totaliva"><?php echo $doc['totaliva'] ?></output></th>
                            <th >Base Imponible €&nbsp<output id="totalneto"><?php echo $doc['totalneto'] ?></output></th>
                            <th > Importe Total €&nbsp<output id="total"><?php echo $doc['total'] ?></output> </th>
                        </tr>


                    </thead>
                </table>
            </div>
            <div class="botonfilas">       

                <p >
                    <button class="btn btn-primary" onclick="print();" type="button"> <i class=" icon-print"></i> Imprimir</button> 
                    <button onclick="window.open('../<?php echo validarSesion(); ?>?iu=modtablafacturasimple.php&mdir=negocios&dir=facturasimple','_self');" class="btn " type="button"> <i class="icon-remove"></i> Cancelar</button>    
                </p>    
            </div>



        </div>

    </body>

</html>
