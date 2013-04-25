<?php
define("RUTA_ABS", dirname(__FILE__));
include (RUTA_ABS."/../controlador/redirect.php");
include (RUTA_ABS."/../controlador/conexion.php");
include (RUTA_ABS."/../negocios/cliente/clienteonfactura.php");
include (RUTA_ABS."/../negocios/producto/productoonfactura.php");
$id = $_POST['cliente'];
$cliente[] = select_cliente($id); //TRAE EL CLIENTE

include (RUTA_ABS."/../negocios/albaran/altaalbaran.php");
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
                    <label  for="numfactura"><b>N° Albaran:</b> </label>  <label id="numfactura"><?php echo $numeroalb; ?> </label>  


<label for="fecha">&nbsp&nbsp<b>Fecha: </b> </label><?php echo $_POST["fecha"]; ?> <!-- <input class="input-small" type="date" name="fecha" id="fecha" />  -->

                </form> 



                <form class="form-inline" style="margin: 1px">
                    <label for="inputcliente"><b>Cliente: </b></label> <label id="cliente" /><?php echo $cliente[0]['nombre']." ".$cliente[0]['apellido']." ".$cliente[0]['apellido2']; ?></label>      

                </form>

                <form class="form-inline" style="margin: 1px">

                    <label for="nif"><b>NIF:</b> </label>  <label id="nif" name="nif"> <?php echo $cliente[0]['nif'] ?> </label> 
                </form>  

                <form class="form-inline" style="margin: 1px">          
                    <label for="direccion"><b>Dirección: </b> </label>  <label id="dir" name="dir"> <?php echo $cliente[0]['calle']." ".$cliente[0]['numero']; ?> </label> 
                </form>     

                <form class="form-inline" style="margin: 1px">  

                    <label  for="poblacion"><b>Población: </b></label>  <label id="poblacion" name="poblacion"> <?php echo $cliente[0]['poblacion']; ?> </label> 
                </form>     
                <form class="form-inline" style="margin: 1px">     

                    <!--<label  for="prov"><b>Provincia: </b></label>  <label id="prov" name="prov"> Mendoza </label>   -->                     

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
                        <tr id="1" name="fila"> 

                            <td><?php echo $_POST["outidprod1"]; ?></td> <!--OUTIDPROD -->
                            <td><?php echo select_prod($_POST["outidprod1"]); ?></td> <!--INPUTPRODUCTO -->
                            <td><?php echo $_POST["outpunit1"]; ?></td> <!--OUTPUNIT -->
                            <td><?php echo $_POST["inputcant1"]; ?> </td>  <!--INPUTCANT -->
                            <td><?php echo $_POST["outsubtot1"]; ?></td> <!--OUTSUBTOT -->
                            
                            
                            
                            
                        </tr>
                        <?php
                        $t=2;
                        while($t<=$_POST["inputidx"]){
                            echo '<tr name="fila" id="'.$t.'"> ';
                            echo '<td>'.$_POST['outidprod'.$t].'</td>';
                            echo '<td>'.select_prod($_POST["outidprod".$t]).'</td>';
                            echo '<td>'.$_POST['outpunit'.$t].'</td>';
                            echo '<td>'.$_POST['inputcant'.$t].'</td>';
                            echo '<td>'.$_POST['outsubtot'.$t].'</td>';
                            echo '</tr>';
                            $t++;
                        }
                        
                        
                        ?>

                    </tbody>

                    <thead>
                        <tr  >
                            <th></th>
                            
                           
                            <th  colspan="2" ></th>
                            
                            <th>Total </th>
                            
                            <th >€ <?php echo $_POST["total"]; ?> </th>
                        </tr>
                   

                    </thead>
                </table>
            </div>
            <div class="botonfilas">       
                
                    <button class="btn btn-primary" onclick="print();" type="button"> <i class=" icon-print"></i> Imprimir</button> 
                    <button onclick="window.open('../<?php echo validarSesion(); ?>','_self');" class="btn " type="button"> <i class="icon-arrow-left"></i> Cancelar</button>    
                    <button onclick="window.open('../<?php echo validarSesion(); ?>?iu=vista_albhead.php&mdir=albaran','_self');" class="btn " type="button"> <i class="icon-plus"></i> Nuevo Albaran</button>        
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
