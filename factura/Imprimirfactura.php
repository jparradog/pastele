<?php
define("RUTA_ABS", dirname(__FILE__));
include (RUTA_ABS . "/../controlador/redirect.php");
include (RUTA_ABS . "/../controlador/conexion.php");
include (RUTA_ABS . "/../negocios/factura/traerdoc.php");
include (RUTA_ABS . "/../negocios/cliente/clienteonfactura.php");
include (RUTA_ABS . "/../negocios/producto/productoonfactura.php");
ini_set("error_reporting", E_ALL & ~E_NOTICE);

$doc = traerdoc($_GET["idfact"], "factura"); //PASO EL ID y LA TABLA
$cliente = select_cliente($doc['idcliente']);
$renglones = traer_renglones($doc["idfactura"], "factura");
$iva_array = traer_iva($doc["idfactura"], "renglon_factura", "idfactura");
$matriz = array();
$array_iva = array();
$array_valoriva = array();
$array_neto = array();
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
                 <table>
                    <tr>
                        <td>
                            <b>Fecha: </b><?php echo $doc["fecha"]; ?>

                        </td>
                        <td>
                            <b>N°: </b><?php echo $doc['numerofactura']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <b>Cliente: </b><?php echo $cliente['nombre'] . " " . $cliente['apellido'] . " " . $cliente['apellido2']; ?>
                        </td>

                    </tr>
                    <tr>
                        <td colspan="2">
                            <b>NIF:</b><?php echo $cliente['nif'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Dirección: </b><?php echo $cliente['calle'] . " " . $cliente['numero']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Población: </b><?php echo $cliente['poblacion']; ?>
                        </td>
                    </tr>
                </table>
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
            <div class="tablafactura" style="margin-top: -5px">
                <table class="table table-hover" style="margin-top: 1px">

                    <thead>

                         <tr style="background-color:#f5f5f5;">
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
                        $sumaneto = 0;
                        while ($fila = mysql_fetch_assoc($renglones)) {
                            echo '<tr name="fila" id="' . $t . '"> ';
                            echo '<td>' . $fila['idproducto'] . '</td>';
                            echo '<td>' . select_prod($fila["idproducto"]) . '</td>';
                            echo '<td>' . $fila['punitario'] . '</td>';
                            echo '<td>' . $fila['cantidad'] . '</td>';
                            echo '<td>' . $fila['iva'] . '</td>';
                            echo '<td>' . $fila['valoriva'] . '</td>';
                            echo '<td>' . $fila['neto'] . '</td>';
                            echo '<td>' . $fila['total'] . '</td>';
                            echo '</tr>';
                            $sumaneto = $sumaneto + $fila["neto"];
                            array_push($matriz, $fila);
                            array_push($array_iva, $fila["iva"]);
                            $t++;
                        }
                        $array_iva = array_unique($array_iva);
                        sort($array_iva);

                        $i = 0;

                        foreach ($array_iva as $iva) {
                            foreach ($matriz as $fila) {

                                if ($iva == $fila["iva"]) {
                                    $array_neto[$i] = $array_neto[$i] + $fila["neto"];
                                    $array_valoriva[$i] = $array_valoriva[$i] + $fila["valoriva"];
                                }
                            }

                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
                <table class="table table-hover" style="margin-top: -15px">
                    <thead style="background-color:#f5f5f5;">
                        <tr>
                            <th>Total Bruto</th>
                            <th>Base imponible</th>
                            <th>% I.V.A</th>
                            <th>Importe IVA</th>
                            <th>Total factura</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        $flag = false;
                        foreach ($array_iva as $iva) {
                            if (!$flag) {
                                echo "<tr>";

                                echo "<td rowspan='3'  class='totals'>";
                                echo "€ ".$sumaneto;
                                $flag = true;
                                echo "</td>";


                                echo "<td>";
                                echo "€ ".$array_neto[$i];
                                echo "</td>";

                                echo "<td>";
                                echo $iva;
                                echo "</td>";

                                echo "<td>";
                                echo "€ ".$array_valoriva[$i];

                                echo "</td>";

                                echo "<td rowspan='3'  class='totals'>";
                                echo "€ ". $doc["total"];
                                echo "</td>";

                                echo "</tr>";
                                
                            }else{
                                
                                echo "<tr>";
                                
                                echo "<td>";
                                echo "€ ".$array_neto[$i];
                                echo "</td>";

                                echo "<td>";
                                echo $iva." %";
                                echo "</td>";

                                echo "<td>";
                                echo "€ ".$array_valoriva[$i];
                                echo "</td>";
                               
                                echo "</tr>";
                            }
                            $i++;
                        }
                        ?>
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
