
<form style="margin-left: 15px;" action="negocios/producto/altaproducto.php" method="post">
    <div class="input-prepend">
        <legend>Nuevo Producto</legend>
        <label>Descripci&oacute;n</label>
        <input name="descripcion" type="text" placeholder="Nombre del Producto" required>
        <label>Iva</label>
        <select name="iva" type="text" >
            <?php
            include (RUTA_ABS."/negocios/impuestos/traerimpuestos.php") ?> 
        </select>
        <label>Precio Referencia</label>
        <span class="add-on">€</span><input name="precioref" type="text" required>
    </div>


    <p></p>
    <input type="submit" class="btn btn-primary" value="Guardar" name="enviar">
    <input type="reset" class="btn btn-primary" value="Resetear" name="reset">
    <input type="button" class="btn btn-primary" onclick="window.open('main.php','_self');" value="Salir" name="salir">
</form>