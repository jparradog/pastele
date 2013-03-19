<div class="well">
<form style="margin-left: 15px;" action="negocios/impuestos/modificarimpuesto.php" method="post">
  <legend>Modificar Impuesto</legend>
  
  <input class="input-small" name="idiva" type="hidden" <?php echo "value=" . $_GET['idiva'] ?>>
  <label>Iva %</label>
  <div class="input-append">
  <input class="input-small" name="iva" type="text" <?php echo "value=" . $_GET['iva'] ?>><span class="add-on">%</span>
  </div>
  
  <p></p>
  <input type="submit" class="btn btn-primary" value="Guardar" name="enviar">
  <input type="reset" class="btn btn-primary" value="Resetear" name="reset">
  <input type="button" class="btn btn-primary" onclick="window.open('main.php','_self');" value="Salir" name="salir">
</form>
</div>