<?php
/*
****************************************************************************
*                                                                          *
*                          mwBackup ver. 1.3                               *
*                                                                          *
*                Copia y restaura con barra de progreso.                   *
*                                                                          *
****************************************************************************
*                                                                          *
*  Autor:         Manuel Sánchez (manuweb)                                 *
*                                                                          *
*  Copyright:     GPL (C) 2003-2011                                        *
*  Más info:      http://www.elmaestroweb.es                               *
*                                                                          *
*  Este software es gratuito; puedes redistribuirlo y modificarlo bajo     *
*  los términos de la Licencia Pública General GNU.                        *
*                                                                          *
*  Los scripts se suministran tal cual, sin ninguna garantia de cualquier  *
*  tipo.                                                                   *
*                                                                          *
*                                                                          *
****************************************************************************
*                                                                          *
* ARCHIVO: mwRestore.php                                                   *
*                                                                          *
****************************************************************************
*/

function errores($mensaje) {
	echo $mensaje;
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--	
		function cancela() {
			var ventanatop=top.location.href;
			if (ventanatop.indexOf ("mwBackup")==-1)
			{
				// No es un venta, es un frame
					window.parent.location.href="<?php echo $parent;?>";

			}
			else {
				window.opener.location.href="<?php echo $parent;?>";
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
						window.parent.location.href="<?php echo $parent;?>";

				}
				else {
					window.opener.location.href="<?php echo $parent;?>";
					window.close();
				}
			}
		}

		document.onkeydown = pulsarTecla;
		document.onkeyup = Tecla;

	//-->
	</SCRIPT>

	<br><br>
	<BUTTON name="cancelar" value="cancelar" onclick="cancela()"><?php echo _MENSAJE_CANCELAR;?> </BUTTON>	

	<?php
}

//
// incluimos la configuración
//
include "include/config.php";
include "include/".$idioma;

?>
<HTML>
<HEAD>
	<TITLE> <?php echo _TITULO_MWBRESTORE;?></TITLE>
	<LINK REL="stylesheet" HREF="include/style.css" TYPE="text/css"> 

</HEAD>
<BODY>
<center>



<?php
if (isset($_POST["ok"])) {
	$archivo_name= $_FILES['archivo']['name'];
	$archivo_size= $_FILES['archivo']['size'];
	$archivo_type= $_FILES['archivo']['type'];
	$archivo= $_FILES['archivo']['tmp_name'];

	if($archivo == "") {
		errores(_MENSAJE_NO_ARCHIVO);
		exit();
	}
	$ext = explode(".",$archivo_name);
	if(($ext[1] != "sql") && ($ext[1] != "SQL")&&($ext[1] != "gz") && ($ext[1] != "GZ")) {
		errores(_MENSAJE_NO_SQL);
		exit();
	}

	//
	// $data es un array con las lineas del backup
	//
	if(($ext[1] != "gz") && ($ext[1] != "GZ")) {
		$data = gzfile($archivo);
		if (!($hayZlib)) {
			errores($mensaje = _MENSAJE_GZ_ERROR);
			exit();
		}
	}
	else {
		$data = file($archivo);
	}
	//
	// mostramos tablas de progreso
	//
	?>
	<br>
	<TABLE border="0" cellpadding="1" cellspacing="1" bgcolor="#000000">
		<TR>
			<TD class="standard">

			<TABLE width='364'>
			<TR>
				<TD colspan="2" width='364' align="left" style='font-size:14px;'><?php echo _MENSAJE_DATABASE;?>: <B><FONT SIZE="" COLOR="#7B91B4"><?phpecho $bd;?></FONT></B></TD>
			</TR>
			<TR>
				<TD width='50' style='font-size:14px;'><?php echo _MENSAJE_ESTADO;?>: </td>
				<TD width='364' align="left" style='font-size:14px;'><div id='texto' style='position:relative;color: #7B91B4;'></div></TD>
			</TR>
			<TR>
				<TD colspan="2" align="center"><br>
				<TABLE  cellspacing="1" cellpadding="1" width='354' bgcolor="#7B91B4">
				<TR>
					<TD bgcolor="#ffffff" width='50' ><?php echo _MENSAJE_PARCIAL;?>: </td>
					<TD bgcolor="#ffffff" align="left" style='font-size:14px;' VALIGN="middle"><div id='progreso_tb' style='position:relative;overflow:hidden'><div id='porcentaje_tb' style='position:absolute;left:130;'>0 %</div><IMG SRC="include/trans.gif" WIDTH="300" HEIGHT="15" BORDER=0 ALT=""></div></TD>
				</TR>
				</TABLE>
				<br>
				<TABLE  cellspacing="1" cellpadding="1" width='354' bgcolor="#7B91B4">

				<TR>
					<TD bgcolor="#ffffff" width='50' ><?php echo _MENSAJE_TOTAL;?>: </td>
					<TD bgcolor="#ffffff" align="left" style='font-size:14px;' VALIGN="middle"><div id='progreso_gr' style='position:relative;overflow:hidden'><div id='porcentaje_gr' style='position:absolute;left:130;'>0 %</div><IMG SRC="include/trans.gif" WIDTH="300" HEIGHT="15" BORDER=0 ALT=""></div></TD>
				</TR>
				</TABLE>
			</TD>
			</TR>
			</TABLE>
			</TD>
		</TR>
	</TABLE>
	<?php



	// 
	// muestra un texto arriba de la barra de progreso
	//
	function msg_texto($texto) {
		ob_start(); 
		?>
		<SCRIPT LANGUAGE="JavaScript">
		<!--
			document.getElementById('texto').innerHTML= "<?php echo $texto;?>";
		//-->
		</SCRIPT>
		<?php
		 flush(); 
		ob_end_flush(); 
	}

	//
	// muestra la barra de progreso
	//

	function procesa_barra($barra,$barra2,$porcentaje,$pixeles) {
			ob_start(); 
			?>
			<SCRIPT LANGUAGE="JavaScript">
			<!--
			document.getElementById('<?php echo $barra;?>').innerHTML="<div id='<?php echo $barra2;?>' style='position:absolute;left:130;'><B><?php echo $porcentaje.' %';?></B></div><IMG SRC='include/progreso.gif' WIDTH='<?php echo $pixeles;?>'  HEIGHT='15' BORDER=0>";
			//-->
			</SCRIPT>
			<?php
			 flush(); 
			ob_end_flush(); 
	}

	//
	// para controlar errores
	//
	$error="no";

	if ($conexion = mysql_connect($host, $usuario, $passwd) ) {
		msg_texto(_MENSAJE_PROCESANDO." . . .") ;
		// conexión establecida
	}
	else { 
		msg_texto(_MENSAJE_NO_CONECTA.":".mysql_error()) ;
		$error="si";
		// error al conectar
	}
	if ($error=="no") {
		if (!mysql_select_db($bd, $conexion) ) {
			msg_texto(_MENSAJE_NO_SELECCIONA.":".mysql_error()) ;
			$error="si";
			// error al seleccionar base de datos
		}
	}
	if ($error=="no") {
		//
		// en la linea 13 (12 desde 0)
		// está el nº de tablas
		//
		$a_tablas = explode("#",$data [12]);
		//
		// $num_tablas nº total de tablas
		//
		$num_tablas=trim($a_tablas[1]);
		//
		// $numeroRegistros el total de insert
		//
		$numeroRegistros=0;
		for ($n=13;$n<($num_tablas+13);$n++) {
			$a_n_tablas = explode("#",$data [$n]);
			$tab = explode("-",$a_n_tablas[1]);
			$tablas[$n-13]= array(trim($tab[1]),trim($tab[2]));
			$numeroRegistros+=trim($tab[2]);
		}

		$tab_act=0;		// tabla actual
		$procesados=0;	// registros procesados
		$porcentaje=0;	// porcentaje
		$cont=0;		// contador
		$registros=$numeroRegistros; 

		msg_texto("Tabla: <b>".$tablas[$tab_act][0]."</b>") ;

		//
		// $sql sentencia sql a ejecutar
		//
		$sql="";

		//
		// recorremos el archivo ($data)
		//
		for($l=0; $l<sizeof($data); $l++){
			if((rtrim($data[$l]) == "") || (substr($data[$l], 0, 1) == "#") ) {
				//
				// linea en blanco o con #, la ignoramos
				//
				continue;
			}
			//
			// Estamos en una consulta hasta encontrar ";" al fineal de una linea
			//
			$sql .= $data[$l];
			if (substr($data[$l],(strlen($data[$l])-2),1)==";") {
				// 
				// final de linea con ";"
				// terminamos
				//
				if($sql != "") {
					//
					// ejecutamos la sentencia 
					//
					if(!@mysql_query($sql)) {
						// 
						// hay error
						//
						$error="si";
						msg_texto(_MENSAJE_ERROR_SQL.": ".mysql_error()) ;
						exit;
						// no seguimos
					}
					//
					// $largo_tabla -> contamos los insert de la tabla actual
					//
					$largo_tabla=$tablas[$tab_act][1];
					if ($largo_tabla!=0) {
						//
						// Si la tabla no está vacia, sin insert
						//
						if (substr($data[$l],0,6)=="INSERT") {
							//
							// si la sentencia empieza por insert es que estamos en la misma tabla
							//
							if ($cont>=$largo_tabla) {
								// 
								// cambiamos de tabla
								//
								$tab_act++;
								$cont=0;
							}
							$cont++;
							$procesados ++;
							//
							// calculo de lo procesado por cada tabla
							//
							$pix_tb= round(($cont*300)/$largo_tabla);
							$por_tb= round(($cont*100)/$largo_tabla);
							//
							// calculo global de lo procesado
							//
							$pixeles= round(($procesados*300)/$registros);
							$porcentaje= round(($procesados*100)/$registros);
							
							if ($pixeles>$ultimo_proceso) {
								//
								// cambian los pixeles con respecto a la última vez
								// mostramos los progresos
								msg_texto(_MENSAJE_TABLA.": <b>".$tablas[$tab_act][0]."</b>") ;
								procesa_barra("progreso_tb","porcentaje_tb",$por_tb,$pix_tb) ;
								procesa_barra("progreso_gr","porcentaje_gr",$porcentaje,$pixeles) ;
								$ultimo_proceso=$pixeles;
							}
						}
					} //	if ($largo_tabla!=0) {

						
					else {
						//
						//cambiamos de tabla
						//
						msg_texto(_MENSAJE_TABLA.": <b>".$tablas[$tab_act][0]."</b>") ;

						$tab_act++;
						$cont=0;
						if ($tab_act <$num_tablas) {
							//
							// aún hay tablas
							//
							msg_texto($tablas[$tab_act][0]) ;
							$por_tb=0;
						}

					}
					$sql="";
				}
			} // fin de la sentencia sql
			
		} // fin del archivo
	}


	if ($error=="no") {
		msg_texto(_MENSAJE_TERMINADO) ;
		procesa_barra("progreso_tb","porcentaje_tb","100","300") ;
		procesa_barra("progreso_gr","porcentaje_gr","100","300") ;

		?>
		<br><br>

		<SCRIPT LANGUAGE="JavaScript">
		<!--
		function conforme() {
			var ventanatop=top.location.href;
			if (ventanatop.indexOf ("mwRestore")==-1)
			{
				// No es un venta, es un frame
					window.parent.location.href="<?php echo $parent;?>";

			}
			else {
				window.opener.location.href="<?php echo $parent;?>";
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
						window.parent.location.href="<?php echo $parent;?>";

				}
				else {
					window.opener.location.href="<?php echo $parent;?>";
					window.close();
				}
			}
		}

		document.onkeydown = pulsarTecla;
		document.onkeyup = Tecla;
		//-->
		</SCRIPT>
		<BUTTON name="ok" value="ok" type="button" onclick="conforme()"><?php echo _MENSAJE_CONFORME;?> </BUTTON>&nbsp;&nbsp;
		<?php
	}


}

else {
	//
	// Formulario para seleccionar archivo 
	// 

	//
	// incluimos la configuración
	//
	include "include/config.php";
	include "include/".$idioma;


	?>
	<br><br>
	<FORM enctype="multipart/form-data" METHOD="POST" name="miForm" ACTION="mwRestore.php">
	<div id="back">
	<p><?php echo _MENSAJE_ARCHIVO;?></p><br>
	<SCRIPT LANGUAGE="JavaScript">
	<!--	
		function procede() {
			miForm.submit();
			document.getElementById('back').innerHTML="<br>Espere . . .<br><br><br><IMG SRC='include/Espera.gif' WIDTH='50' HEIGHT='50' BORDER=0 ALT=''>";
		}
		function cancela() {
			var ventanatop=top.location.href;
			if (ventanatop.indexOf ("mwRestore")==-1)
			{
				// No es un venta, es un frame
					window.parent.location.href="<?php echo $parent;?>";

			}
			else {
				window.opener.location.href="<?php echo $parent;?>";
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
						window.parent.location.href="<?php echo $parent;?>";

				}
				else {
					window.opener.location.href="<?php echo $parent;?>";
					window.close();
				}
			}
		}

		document.onkeydown = pulsarTecla;
		document.onkeyup = Tecla;



	//-->
	</SCRIPT>

	
	<input type="hidden" name="ok" value ="si">
	<INPUT TYPE="FILE" NAME="archivo"><br>
	<br><br>
	<BUTTON name="ok" value="ok" onclick="procede()"><?php echo _MENSAJE_PROCEDER;?> </BUTTON>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<BUTTON name="cancelar" value="cancelar" onclick="cancela()"><?php echo _MENSAJE_CANCELAR;?> </BUTTON>	
	</div>
	</FORM>
	<?php
}
?>
</center>
</BODY>
</HTML>



