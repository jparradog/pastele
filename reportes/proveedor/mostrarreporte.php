<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="../../js/bootstrap.js"></script>
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"> 
        <link href="../../css/mostrarreporte.css" rel="stylesheet" type="text/css" media="screen">
        <link href="../../css/printmostrarreporte.css" rel="stylesheet" type="text/css" media="print">
    </head>
    <body>

        <?php
//Incluyo el archivo de Conexión
        define("RUTA_ABS", dirname(__FILE__));
        include_once (RUTA_ABS . "/../../controlador/conexion.php");


//Conecto con la Base de Datos
        conectar_bd();

//Obtengo el numero de id del trimestre elegido
        $idtrimestre = $_POST['trimestre'];
        $año = $_POST['año'];

//----------------------------------------------------------------------------//
//FUNCIONES QUE ARMAN LA TABLA
//----------------------------------------------------------------------------//
//Obtengo el nombre del trimestre a partir del idtrimestre ($idtrim)
        function tituloTrimestre($idtrim) {

            //Selecciono el idtrimestre
            $query = "SELECT nombretrimestre FROM trimestre WHERE idtrimestre = $idtrim";

            $result = mysql_query($query);

            $fila = mysql_fetch_array($result);

            $trimestre = $fila['nombretrimestre'];

            //Decodifico por los caracteres raros
            $trimestre = utf8_decode($trimestre);

            //Devuelvo el nombre del trimestre
            return $trimestre;
        }

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//
//Muestro la cabecera Proveedor, Valor e IVA
        function mostrarCabecera() {
            //Por cada mes (3) muestro las cabeceras de la tabla

            echo'    
        <th>
        Proveedor
        </th>
        <th>
        Compras
        </th>
        <th>
        IVA
        </th>';
        }

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//
//Muestro el mes dependiendo del Trimestre
        function mostrarPrimerMes($idtrimestre) {
            if ($idtrimestre == 1) {
                echo 'Enero';
            } elseif ($idtrimestre == 2) {
                echo 'Abril';
            } elseif ($idtrimestre == 3) {
                echo 'Julio';
            } elseif ($idtrimestre == 4) {
                echo 'Octubre';
            }
        }

        function mostrarSegundoMes($idtrimestre) {
            if ($idtrimestre == 1) {
                echo 'Febrero';
            } elseif ($idtrimestre == 2) {
                echo 'Mayo';
            } elseif ($idtrimestre == 3) {
                echo 'Agosto';
            } elseif ($idtrimestre == 4) {
                echo 'Noviembre';
            }
        }

        function mostrarTercerMes($idtrimestre) {
            if ($idtrimestre == 1) {
                echo 'Marzo';
            } elseif ($idtrimestre == 2) {
                echo 'Junio';
            } elseif ($idtrimestre == 3) {
                echo 'Setiembre';
            } elseif ($idtrimestre == 4) {
                echo 'Diciembre';
            }
        }

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//
//Retorno el numero de mes dependiendo del Trimestre
        function getPrimerMes($idtrimestre) {
            if ($idtrimestre == 1) {
                return 1;
            } elseif ($idtrimestre == 2) {
                return 4;
            } elseif ($idtrimestre == 3) {
                return 7;
            } elseif ($idtrimestre == 4) {
                return 10;
            }
        }

        function getSegundoMes($idtrimestre) {
            if ($idtrimestre == 1) {
                return 2;
            } elseif ($idtrimestre == 2) {
                return 5;
            } elseif ($idtrimestre == 3) {
                return 8;
            } elseif ($idtrimestre == 4) {
                return 11;
            }
        }

        function getTercerMes($idtrimestre) {
            if ($idtrimestre == 1) {
                return 3;
            } elseif ($idtrimestre == 2) {
                return 6;
            } elseif ($idtrimestre == 3) {
                return 9;
            } elseif ($idtrimestre == 4) {
                return 12;
            }
        }

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//

        function mostrarFilas($idmes, $año) {
            //Obtengo la cantidad de proveedores 
            $query_prov = "SELECT DISTINCT idproveedor FROM renglon_compras WHERE idmes = $idmes";

            $result_prov = mysql_query($query_prov);

            $total_iva = 0;
            $tota_valor = 0;

            //Recorro por los proveedores que tienen compras en ese mes
            while ($fila = mysql_fetch_array($result_prov)) {
                //Arranco con el primer proveedor que devuelve la consulta
                $idproveedor = $fila['idproveedor'];

                //Selecciono todas las compras del proveedor en el mes elegido
                $query_datos = "
                SELECT renglon_compras.iva, renglon_compras.valor, proveedor.nombre 
                FROM renglon_compras
                INNER JOIN proveedor
                ON proveedor.idproveedor = renglon_compras.idproveedor
                WHERE renglon_compras.idproveedor = $idproveedor AND renglon_compras.idmes = $idmes";

                $result_datos = mysql_query($query_datos);

                $valor = 0;
                $iva = 0;

                while ($data = mysql_fetch_array($result_datos)) {
                    $nombreprov = $data['nombre'];
                    $valor = $valor + $data['valor'];
                    $iva = $iva + $data['iva'];

                    $total_iva = $total_iva + $data['iva'];
                    $tota_valor = $tota_valor + $data['valor'];
                }
                ?>
            <tr>
                <td>
                    <?php echo $nombreprov; ?>
                </td>
                <td>
                    <?php echo $valor; ?>
                </td>
                <td>
                    <?php echo $iva; ?>
                </td>

            </tr>

            <?php
        }

        if ($idmes < 10) {
            $query_gastos_varios = "SELECT precio, iva, fecha FROM gastos_varios WHERE fecha LIKE '$año-0$idmes%'";
        } else {
            $query_gastos_varios = "SELECT precio, iva, fecha FROM gastos_varios WHERE fecha LIKE '$año-$idmes%'";
        }

        $result_gastos_varios = mysql_query($query_gastos_varios);

        $ivagv = 0;
        $valorgv = 0;

        while ($gv = mysql_fetch_array($result_gastos_varios)) {
            $ivagv = $ivagv + $gv['iva'];
            $valorgv = $valorgv + $gv['precio'];
        }

        $total_iva = $total_iva + $ivagv;
        $tota_valor = $tota_valor + $valorgv;
        ?>
        <tr>
            <td>
                <?php echo 'Gastos Varios'; ?>
            </td>
            <td>
                <?php echo $valorgv; ?>
            </td>
            <td>
                <?php echo $ivagv; ?>
            </td>

        </tr>
        <tr>
            <th>
                <?php echo 'TOTAL'; ?>
            </th>
            <th>
                <?php echo $tota_valor; ?>
            </th>
            <th>
                <?php echo $total_iva; ?>
            </th>

        </tr>

        <?php
    }

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//
    ?>
    <div>       
        <div id ="tabla" class="page-header">
            <h3><?php echo 'Reporte de Compra a Proveedores:&nbsp&nbsp' . tituloTrimestre($idtrimestre) . "&nbspA&ntilde;o&nbsp" . $año; ?></h3>
        </div>
        <div class="posttabla">
            <table id="tabla" border="1" class="table table-bordered table-hover">
                <tr align="center" >
                    <th colspan="3">
                        <?php mostrarPrimerMes($idtrimestre); ?>
                    </th>        
                </tr>
                <tbody>
                    <?php
                    mostrarCabecera();
                    mostrarFilas(getPrimerMes($idtrimestre), $año);
                    ?>

                </tbody>
            </table>
        </div>
        <div class="posttabla">
            <table id="tabla" border="1" class="table table-bordered table-hover">
                <tr align="center">
                    <th  colspan="3">
                        <?php mostrarSegundoMes($idtrimestre); ?>
                    </th>        
                </tr>
                <tbody>
                    <?php
                    mostrarCabecera();
                    mostrarFilas(getSegundoMes($idtrimestre), $año);
                    ?>


                </tbody>
            </table>
        </div>
        <div class="posttabla">
            <table id="tabla" border="1" class="table table-bordered table-hover">
                <tr align="center">
                    <th  colspan="3">
                        <?php mostrarTercerMes($idtrimestre); ?>
                    </th>        
                </tr>
                <tbody>
                    <?php
                    mostrarCabecera();
                    mostrarFilas(getTercerMes($idtrimestre), $año);
                    ?>

                </tbody>
            </table>
        </div>

        </br>
        </br>
        <div class="botonsalirabsoluto">
            <button type="button" class="btn btn-primary" onclick="print();" name="imprimir"><i class="icon-print"></i> Imprimir </button>   
            <button  type="button" class="btn" onclick="window.open('../../main.php','_self');" name="salir"> <i class=" icon-arrow-left"></i> Cancelar </button> 
        </div>
    </div>
</body>
</html>
