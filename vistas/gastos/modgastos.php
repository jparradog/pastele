<form style="margin-left: 15px;" action="negocios/gastosvarios/modificargastos.php" method="post">
    <legend>Editar Gastos Varios</legend>
    <label>Descripci&oacute;n / Proveedor</label>
    <input name="descripcion" type="text" <?php echo "value=" . $_GET['descripcion'] ?> >
    <div class="input-prepend">
        <label>Valor</label>
        <span class="add-on">€</span><input name="precio" type="text" <?php echo "value=" . $_GET['precio'] ?>>
        <label>IVA</label>
        <span class="add-on">€</span><input name="iva" type="text" <?php echo "value=" . $_GET['iva'] ?>>
    </div>
    <label>Fecha</label>
    <input name="fecha" type="date" <?php echo "value=" . $_GET['fecha'] ?>>
    <input name="idgastos" type="hidden" <?php echo "value=" . $_GET['idgastos'] ?>>

    <p></p>
    <input type="submit" class="btn btn-primary" value="Guardar" name="enviar">
    <input type="button" class="btn btn-primary" onclick="window.open('main.php?iu=modtablagastos.php&dir=gastosvarios&mdir=negocios','_self');" value="Atras" name="atras">
    <input type="button" class="btn btn-primary" onclick="window.open('main.php','_self');" value="Salir" name="salir">
</form>