<?php
define("RUTA_ABS", dirname(__FILE__));
include (RUTA_ABS . "/../controlador/redirect.php");
include (RUTA_ABS . "/../controlador/conexion.php");
include (RUTA_ABS . "/../negocios/cliente/clienteonfactura.php");
$id = $_POST['cliente'];
$cliente[] = select_cliente($id); //TRAE EL CLIENTE

include (RUTA_ABS . "/../negocios/facturasimple/altafacturasimple.php");
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
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="../js/facturasimple.js"></script>
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
                    <label  for="numfactura"><b>N° Factura:</b> </label>  <label id="numfactura"> <?php echo $numerofactura; ?> </label>  


                    <label for="fecha">&nbsp&nbsp<b>Fecha: </b> </label><?php echo $_POST["fecha"]; ?>

                </form> 



                <form class="form-inline" style="margin: 1px">
                    <label for="inputcliente"><b>Cliente: </b></label> <label id="cliente" /><?php echo $cliente[0]['nombre'] . " " . $cliente[0]['apellido'] . " " . $cliente[0]['apellido2']; ?></label>      

                </form>

                <form class="form-inline" style="margin: 1px">

                    <label for="nif"><b>NIF:</b> </label>  <label id="nif" name="nif"> <?php echo $cliente[0]['nif'] ?> </label> 
                </form>  

                <form class="form-inline" style="margin: 1px">          
                    <label for="direccion"><b>Dirección: </b> </label>  <label id="dir" name="dir"> <?php echo $cliente[0]['calle'] . " " . $cliente[0]['numero']; ?> </label> 
                </form>     

                <form class="form-inline" style="margin: 1px">  

                    <label  for="poblacion"><b>Población: </b></label>  <label id="poblacion" name="poblacion"> <?php echo $cliente[0]['poblacion']; ?> </label> 
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
                            <th>N°</th>
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
                        while ($i <= $_POST["inputidx"]) {
                            echo '<tr name="fila" id="'.$i.'"> ';
                            echo '<td>' . $i . '</td>';
                            echo '<td>' . $_POST['inputproducto' . $i] . '</td>';
                            echo '<td>' . $_POST['selectiva' . $i] . '</td>';
                            echo '<td>' . $_POST['outvaloriva' . $i] . '</td>';
                            echo '<td>' . $_POST['outneto' . $i] . '</td>';
                            echo '<td>' . $_POST['inputsubtot' . $i] . '</td>';
                            echo '</tr>';
                            $i++;
                        }
                        ?>



                    </tbody>

                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Cuota IVA €&nbsp<output id="totaliva"><?php echo $_POST['totaliva'] ?></output></th>
                            <th>Base Imponible €&nbsp<output id="totalneto"><?php echo $_POST['totalneto'] ?></output></th>
                            <th>Importe Total €&nbsp<output id="total"><?php echo $_POST['total'] ?></output> </th>
                        </tr>


                    </thead>

                </table>
            </div>
            <div class="botonfilas">       

                <p >
                    <button onclick="print();" class="btn btn-primary" type="button"> <i class=" icon-print"></i> Imprimir</button> 
                    <button onclick="window.open('../main.php','_self');" class="btn " type="button"> <i class="icon-remove"></i> Cancelar</button>    
                    <button onclick="window.open('../<?php echo validarSesion(); ?>?iu=vista_simplehead.php&mdir=facturasimple','_self');" class="btn " type="button"> <i class="icon-plus"></i> Nueva factura simple</button>    
                </p>    
            </div>



        </div>

    </body>

</html>
