<div class="well">
<form style="margin-left: 15px;" action="negocios/impuestos/altaimpuesto.php" method="post">
    <legend>Agregar Impuesto</legend>


    <label>IVA</label>
    <div class="input-append">
        <input class="input-small" name="iva" type="text" placeholder="Ingrese sin %"><span class="add-on">%</span>
    </div>
    <p></p>
    <input type="submit" class="btn btn-primary" value="Guardar" name="enviar">
    <input type="reset" class="btn btn-primary" value="Resetear" name="reset">
    <input type="button" class="btn btn-primary" onclick="window.open('main.php','_self');" value="Salir" name="salir">
</form>
</div>