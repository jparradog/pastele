<?php
/*
 * ***************************************************************************
 *                                                                          *
 *                          mwBackup ver. 1.3                               *
 *                                                                          *
 *                Copia y restaura con barra de progreso.                   *
 *                                                                          *
 * ***************************************************************************
 *                                                                          *
 *  Autor:         Manuel S�nchez (manuweb)                                 *
 *                                                                          *
 *  Copyright:     GPL (C) 2003-2011                                        *
 *  M�s info:      http://www.elmaestroweb.es                               *
 *                                                                          *
 *  Este software es gratuito; puedes redistribuirlo y modificarlo bajo     *
 *  los t�rminos de la Licencia P�blica General GNU.                        *
 *                                                                          *
 *  Los scripts se suministran tal cual, sin ninguna garantia de cualquier  *
 *  tipo.                                                                   *
 *                                                                          *
 *                                                                          *
 * ***************************************************************************
 *                                                                          *
 * ARCHIVO: mwBackup.php                                                    *
 *                                                                          *
 * ***************************************************************************
 */

if (isset($_POST["nombre"])) {
    // 
    // $nombre es el fichero
    //
	// se descarga
    //
	
	$nombre = $_POST["nombre"];
    $path = $_POST["path"];
    header("Content-Disposition: attachment; filename=" . $nombre . "\n\n");
    header("Content-Type: application/octet-stream");
    header("Content-Length: " . filesize($nombre));
    readfile($path . "/" . $nombre);
} else {
    //
    // incluimos la configuraci�n
    //
	include "include/config.php";
    include "include/" . $idioma;
    ?>

    <HTML>
        <HEAD>
            <TITLE> <?php echo _TITULO_MWBACKUP; ?></TITLE>
            <LINK REL="stylesheet" HREF="include/style.css" TYPE="text/css"> 
        </HEAD>

        <body>

        <center>
    <?php
    if (!isset($_POST["zip"])) {
        ?>
                <FORM name="miForm" METHOD=POST ACTION="mwBackup.php">

                    <SCRIPT LANGUAGE="JavaScript">
                        <!--	
                        function procede() {
                            miForm.submit();
                            document.getElementById('back').innerHTML="<br>Espere . . .<br><br><br><IMG SRC='include/Espera.gif' WIDTH='50' HEIGHT='50' BORDER=0 ALT=''>";
                        }
                        function cancela() {
                            var ventanatop=top.location.href;
                            if (ventanatop.indexOf ("mwBackup")==-1)
                            {
                                // No es un venta, es un frame
                                window.parent.location.href="<?php echo $parent; ?>";

                            }
                            else {
                                window.opener.location.href="<?php echo $parent; ?>";
                                window.close();
                            }
                        }

                        function pulsarTecla() {
                            var tecla = event.keyCode;
                            var teclaReal = String.fromCharCode(tecla);

                            if (tecla==13) {
                                tecla=9;
                                return event.keyCode=tecla;
                            }
                        }
                        function Tecla() {
                            var tecla = event.keyCode;
                            var teclaReal = String.fromCharCode(tecla);

                            if (tecla==27) {

                                var ventanatop=top.location.href;
                                if (ventanatop.indexOf ("mwRestore")==-1)
                                {
                                    // No es un venta, es un frame
                                    window.parent.location.href="<?php echo $parent; ?>";

                                }
                                else {
                                    window.opener.location.href="<?php echo $parent; ?>";
                                    window.close();
                                }
                            }
                        }

                        document.onkeydown = pulsarTecla;
                        document.onkeyup = Tecla;




                        //-->
                    </SCRIPT>
                    <br>
                    <div id="back">

                        <TABLE border="0" cellpadding="1" cellspacing="1" bgcolor="#000000">
                            <TR>
                                <TD class="group"  align="center"  width="350"><p class="titulo"><B><?php echo _MENSAJE_SE_HACE; ?></b></p></TD>
                            </TR>
                            <TR>
                                <TD class="standard" align="center"><br>
                                    <TABLE>
                                        <TR>
                                            <TD class="standard">
                                        <center>

                                            <FIELDSET>
                                                <LEGEND>&nbsp;<?php echo _MENSAJE_COMPRESION; ?></LEGEND>
                                                <TABLE>
                                                    <TR>
                                                        <TD><INPUT TYPE="radio" NAME="zip" value="si" > <?php echo _MENSAJE_COMPIMIDO; ?></TD>
                                                        <!-- Por defecto est� activado el valor SI -->
                                                        <TD><INPUT TYPE="radio" NAME="zip" value="no" checked> <?php echo _MENSAJE_SIN_COMPRIMIR; ?> </TD>
                                                    </TR>
                                                </TABLE>
                                            </FIELDSET>
                                            </TD>
                                            </TR>
                                    </TABLE><br>
                                </TD>
                            </TR>
                        </TABLE>

                        <br><br>
                        <BUTTON name="ok" value="ok" onclick="procede()"><?php echo _MENSAJE_PROCEDER; ?> </BUTTON>&nbsp;&nbsp;
                        <BUTTON name="cancelar" value="cancelar" onclick="cancela()"><?php echo _MENSAJE_CANCELAR; ?> </BUTTON>	
                    </div>

                </FORM>
        <?php
    } else {
        // 
        //
		// 2� Parte.
        //
		//
		// mostramos la barra y textos
        //
		?>
                <br>
                <TABLE border="0" cellpadding="1" cellspacing="1" bgcolor="#000000">
                    <TR>
                        <TD class="standard">
                            <TABLE width='350' border="0">
                                <TR>
                                    <TD class="standard" colspan="2" width='352' align="left" style='font-size:14px;'><?php echo _MENSAJE_DATABASE; ?>: <B><FONT SIZE="" COLOR="#7B91B4"><?php echo $bd; ?></FONT></B></TD>
                                </TR>
                                <TR>
                                    <TD class="standard" width='50' style='font-size:14px;' ><?php echo _MENSAJE_ESTADO; ?>: </td>
                                    <TD class="standard" width='302' align="left" style='font-size:14px;'><B><div id='texto' style='position:relative;color: #7B91B4;'></div></B></TD>
                                </TR>
                                <TR>
                                    <TD class="standard" colspan="2" align="center"><br>
                                        <TABLE  cellspacing="1" cellpadding="1" width='302' bgcolor="#7B91B4">
                                            <TR>
                                                <TD bgcolor="#ffffff" align="left" style='font-size:14px;' VALIGN="middle"><div id='progreso' style='position:relative;overflow:hidden'><div id='porcentaje' style='position:absolute;left:130;'>0 %</div><IMG SRC="include/trans.gif" WIDTH="1" HEIGHT="15" BORDER=0 ALT=""></div></TD>
                                            </TR>
                                        </TABLE><br>
                                    </TD>
                                </TR>
                            </TABLE>
                        </TD>
                    </TR>
                </TABLE>

        <?php

        //
        // Se procede a la creaci�n del backup
        //

		// 
        // muestra un texto arriba de la barra de progreso
        //
		function msg_texto($texto) {
            ob_start();
            ?>
                    <SCRIPT LANGUAGE="JavaScript">
                        <!--
                        document.getElementById('texto').innerHTML= "<?php echo $texto; ?>";
                        //-->
                    </SCRIPT>
            <?php
            flush();
            ob_end_flush();
        }

        //
        // muestra la barra de progreso
        //
		function procesa_barra($porcentaje, $pixeles) {
            ob_start();
            ?>
                    <SCRIPT LANGUAGE="JavaScript">
                        <!--
                        document.getElementById('progreso').innerHTML="<div id='porcentaje' style='position:absolute;left:130;'><B><?php echo $porcentaje . ' %'; ?></B></div><IMG SRC='include/progreso.gif' WIDTH='<?php echo $pixeles; ?>'  HEIGHT='15' BORDER=0>";
                        //-->
                    </SCRIPT>
            <?php
            flush();
            ob_end_flush();
        }

        $error = "no"; // errores de sql
        //
		// establecemos conexi�n
        // 
        if ($conexion = mysql_connect($host, $usuario, $passwd)) {
            msg_texto(_MENSAJE_PROCESANDO . " . . .");
            // conexi�n establecida
        } else {
            msg_texto(_MENSAJE_NO_CONECTA . mysql_error());
            $error = "si";
            // error al conectar
        }
        if ($error == "no") {
            if (!mysql_select_db($bd, $conexion)) {
                msg_texto(_MENSAJE_NO_SELECCIONA . mysql_error());
                $error = "si";
                // error al seleccionar base de datos
            }
        }
        if ($error == "no") {
            //
            // busqueda de tablas para backup
            //
			$sql = "SHOW TABLE STATUS;";
            if ($respuesta = mysql_query($sql, $conexion)) {
                msg_texto(_MENSAJE_CONECTANDO . " . . .");
            } else {
                msg_texto(_MENSAJE_NO_CONSULTA . mysql_error());
                $error = "si";
            }
            while ($fila = mysql_fetch_array($respuesta)) {
                $tablas[] = $fila['Name'];
                $tamano[] = $fila['Rows'];
            }
        }

        if ($error == "no") {

            //
            // cabecera del archivo backup
            //
			// $info es un array con los datos del servidor
            //
			$info['fecha'] = date("d-m-Y");
            $info['hora'] = date("h:m:s A");
            $info['mysqlver'] = mysql_get_server_info();
            $info['phpver'] = phpversion();
            ob_start();
            print_r($tablas);
            $representacion = ob_get_contents();
            ob_end_clean();
            preg_match_all('/(\[\d+\] => .*)\n/', $representacion, $matches);
            $info['tablas'] = implode(";  ", $matches[1]);

            //
            // $dump es la variable que contiene lo que vamos a respaldar
            //
			$dump = "# ===================================================================\n";
            $dump .="#  " . $mwBack . "\n";
            $dump .="#  Copias de seguridad\n";
            $dump .="#  \n";
            $dump .="#  Generado el {$info[fecha]} a las {$info[hora]} por el usuario `" . $usuario . "` \n";
            $dump .="#  Servidor: {$_SERVER['HTTP_HOST']} \n";
            $dump .="#  MySQL Version: {$info[mysqlver]} \n";
            $dump .="#  PHP Version: {$info[phpver]} \n";
            $dump .="#  Base de datos: `" . $bd . "` \n";
            $dump .="#  \n";
            $dump .="# -------------------------------------------------------------------\n";
            $dump .="# TABLAS:\n";
            $dump .="#  " . count($tablas) . "\n";

            //
            // calculamos los registros que hay
            //
			$registros = 0;
            for ($n = 0; $n < count($tablas); $n++) {
                $dump .="# - " . $tablas[$n] . " - " . $tamano[$n] . "\n";
                $registros+=$tamano[$n];
            }
            $dump .="# -------------------------------------------------------------------\n";

            //
            // $procesados lleva el control del numero de insert procesados
            // 
            $procesados = 0;
            //
            // $ultimo_proceso lleva el control de la llamada a la barra de progreso
            //
			$ultimo_proceso = 0;

            //
            // Si est� disponible Zlib
            //
			if (($hayZlib) && ($_POST["zip"] == "si")) {
                $compresion = "gz";
            } else {
                $compresion = "";
            }

            // 
            // se empieza la escritura del backup
            //
			if ($compresion == "gz") {
                $nombre.=".gz";
                $filehandle = gzopen($path . "/" . $nombre, 'w');
                gzwrite($filehandle, $dump);
            } else {
                $filehandle = fopen($path . "/" . $nombre, 'w');

                //Cambiamos los permisos del archivo creado en el servidor
                chmod($path . "/" . $nombre, 0777);
                fwrite($filehandle, $dump);
            }

            //
            // recorremos las tablas
            //
			msg_texto(_MENSAJE_CREANDO . " . . .");

            foreach ($tablas as $tabla) {

                // 
                // $drop_table_query -> sentencia de drop
                //
				$drop_table_query = "";
                // 
                // $create_table_query -> sentencia de create
                //
				$create_table_query = "";
                // 
                // $insert_table_query -> sentencias de insert
                //
				$insert_into_query = "";

                //
                // Solo si est� definido en include\config.php 
                //
				if ($drop) {
                    $drop_table_query = "DROP TABLE IF EXISTS `$tabla`;";
                } else {
                    $drop_table_query = "# No especificado.";
                }

                //
                // estructura de la tabla
                //
				$sql = "SHOW CREATE TABLE $tabla;";
                if (!($respuesta = mysql_query($sql, $conexion))) {
                    msg_texto("No se pudo ejecutar la consulta: " . mysql_error());
                    $error = "si";
                    exit();
                }
                while ($fila = mysql_fetch_array($respuesta, MYSQL_NUM)) {
                    $create_table_query = $fila[1] . ";";
                }

                $sql = "SELECT * FROM $tabla;";
                if (!($respuesta = mysql_query($sql, $conexion))) {
                    msg_texto("No se pudo ejecutar la consulta: " . mysql_error());
                    $error = "si";
                    exit();
                }

                $dump = "#\n";
                $dump .= "#\n";
                $dump .= "#\n";
                $dump .= "#\n";
                $dump .= "#  Vaciado de tabla `$tabla` \n";
                $dump .= "# ------------------------------------- \n";
                $dump .= "#\n";
                $dump .= "#\n";
                $dump .= "$drop_table_query\n";
                $dump .= "#\n";
                $dump .= "#\n";
                $dump .= "#  Estructura de la tabla `$tabla` \n";
                $dump .= "# ------------------------------------- \n";
                $dump .= "#\n";
                $dump .= "#\n";
                $dump .= "$create_table_query\n";
                $dump .= "#\n";
                $dump .= "#\n";
                $dump .= "#  Carga de datos de la tabla `$tabla` \n";
                $dump .= "# ------------------------------------- \n";
                $dump .= "#\n";
                $dump .= "#\n";

                //
                // escribimos el vaciado y estructura de la tabla
                //
				if ($compresion == "gz") {
                    gzwrite($filehandle, $dump);
                } else {
                    fwrite($filehandle, $dump);
                }
                //
                // cada registro
                //
				while ($fila = mysql_fetch_array($respuesta, MYSQL_ASSOC)) {
                    //
                    // recogemos los valores de cada regisrtro para los insert
                    //
					$columnas = array_keys($fila);
                    foreach ($columnas as $columna) {

                        if (gettype($fila[$columna]) == "NULL") {
                            $values[] = "NULL";
                        } else {
                            if (!(is_string($fila[$columna]))) {
                                $values[] = $fila[$columna];
                            } else {
                                $values[] = "'" . mysql_real_escape_string($fila[$columna]) . "'";
                            }
                        }
                    }
                    $insert_into_query = "INSERT INTO `$tabla` VALUES (" . implode(", ", $values) . ");\n";
                    $dump = "$insert_into_query";

                    //
                    // escribimos el insert
                    //
					if ($compresion == "gz") {
                        gzwrite($filehandle, $dump);
                    } else {
                        fwrite($filehandle, $dump);
                    }

                    unset($values);
                    $procesados++;
                    //
                    // calculamos seg�n los procesados los pixeles y el porcentaje 
                    // a representar en la barra de progreso
                    //
					$pixeles = round(($procesados * 300) / $registros);
                    $porcentaje = round(($procesados * 100) / $registros);
                    //
                    // solo si hay que aumentar de tama�o la barra de progreso
                    //
					if ($pixeles > $ultimo_proceso) {
                        $ultimo_proceso = $pixeles;
                        procesa_barra($porcentaje, $pixeles);
                    }
                }
                //
                // terminada la tabla actual
            //
			}
            //
            // terminaci�n de recorrer las tablas
            //




			// 
            //
			// Fin 2� Parte.
            if ($compresion == "gz") {
                gzclose($filehandle);
            } else {
                fclose($filehandle);
            }
            msg_texto(_MENSAJE_CREADO . ": <a href='" . $path . "/" . $nombre . "'>" . $nombre . "</a>");
            ?>
                    <SCRIPT LANGUAGE="JavaScript">
                        <!--	
                        var ventanatop=top.location.href;


                        function hecho() {
                            if (ventanatop.indexOf ("mwBackup")==-1)
                            {
                                // No es un venta, es un frame
                                window.parent.location.href="<?php echo $parent; ?>";

                            }
                            else {
                                window.opener.location.href="<?php echo $parent; ?>";
                                window.close();
                            }
                        }

                        function pulsarTecla() {
                            var tecla = event.keyCode;
                            var teclaReal = String.fromCharCode(tecla);

                            if (tecla==13) {
                                tecla=9;
                                return event.keyCode=tecla;
                            }
                        }
                        function Tecla() {
                            var tecla = event.keyCode;
                            var teclaReal = String.fromCharCode(tecla);

                            if (tecla==27) {

                                var ventanatop=top.location.href;
                                if (ventanatop.indexOf ("mwRestore")==-1)
                                {
                                    // No es un venta, es un frame
                                    window.parent.location.href="<?php echo $parent; ?>";

                                }
                                else {
                                    window.opener.location.href="<?php echo $parent; ?>";
                                    window.close();
                                }
                            }
                        }

                        document.onkeydown = pulsarTecla;
                        document.onkeyup = Tecla;

                        //-->
                    </SCRIPT>
                    <br>
                    <BUTTON name="hecho" value="hecho" onclick="hecho()"><?php echo _MENSAJE_HECHO; ?> </BUTTON>	
            <?php
            //
            // Se procede a ofrecer el archivo del backup
            //

            /*
             * Descarga el archivo, pero en localhost. En el server lo descarga vacio
             * Codigo modificado del original
             * 15/01/13
             * Ver download.php
             */
            if ($descarga) {
                
                //Utilizamos basename por seguridad, devuelve el 
                //nombre del archivo eliminando cualquier ruta. 
                $ruta = $path.'/' . $nombre;

                if (is_file($ruta)) {
                    echo "<a href="."download.php?file=$ruta".">Descargar</a>";
                }
                else
                    echo "No se encotro el archivo";
            }
        }
    }
    ?>

        </center>

    </BODY>

    </HTML>
            <?php
        }
