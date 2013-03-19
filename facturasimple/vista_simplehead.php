        
<form style="margin-left: 15px;" name="facthead" id="facthead" action="<?php echo validarSesion(); ?>?iu=vista_simplereng.php&mdir=facturasimple" method="post">
  <legend>Nueva Factura Simple</legend>
  
  
  <label>Fecha</label>
  <input  name="fecha" id="fechaq" type="date" required="required">
  <label>Cliente</label>
  <select name="selectcliente" id="selectcliente" type="text" required="required">
      
       <?php 
       define("RUTA_ABS", dirname(__FILE__));
       include (RUTA_ABS."/negocios/cliente/traerclientes.php");//trae los clientes de la bd para mostrarlos en un SELECT
       ?> 
  </select>
  
  
  <p></p>
  <input type="submit" class="btn btn-primary" value="Siguiente" name="enviar">
  
  <input type="button" class="btn btn-primary" onclick="window.open('<?php echo validarSesion(); ?>','_self');" value="Volver" name="salir">
</form>