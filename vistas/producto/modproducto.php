<form style="margin-left: 15px;" action="negocios/producto/modificarproducto.php" method="post">

    <legend>Modificar Producto</legend>
    <label>Descripci&oacute;n</label>
    <input name="descripcion" type="text" <?php echo "value=" . $_GET['descripcion']; ?> >
    <label>IVA Anterior</label>
    <output class="alert alert-success" name="ivaanterior" type="label"><?php echo $_GET['iva']; ?> %</output>
    <p></p>
    <label>Iva Nuevo</label>
    <select name="iva" type="text"  >        
        <?php 
        include (RUTA_ABS."/negocios/impuestos/traerimpuestos.php") ?>
    </select>
    <label>Precio Referencia</label>
    <div class="input-prepend">
        <span class="add-on">€</span><input name="precioref" type="text"<?php echo "value=" . $_GET['precioref']; ?>>
        <input name="idproducto" type="hidden" <?php echo "value=" . $_GET['idproducto']; ?>></input>
    </div>
    <p></p>
    <input type="submit" class="btn btn-primary" value="Guardar" name="enviar">
    <input type="button" class="btn btn-primary" onclick="window.open('main.php?iu=modtablaproducto.php&dir=producto&mdir=negocios', '_self');" value="Atras" name="atras">
    <input type="button" class="btn btn-primary" onclick="window.open('main.php','_self');" value="Salir" name="salir">

</form>