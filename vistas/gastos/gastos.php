<div class="well">
<form style="margin-left: 15px;" action="negocios/gastosvarios/altagastosvarios.php" method="post">
    <?php
    if ($_GET['msg'] == 'gastook') {
        echo '<div class="alert alert-success">El gasto se guardó correctamente en la Base de datos</div>';
    }
    ?>
    <legend>Agregar Gastos Varios</legend>
    <label>Descripci&oacute;n / Proveedor</label>
    <input name="descripcion" type="text" >
    <div class="input-prepend">
        <label>Valor</label>
        <span class="add-on">€</span><input name="precio" type="text" >
        <label>IVA</label>
        <span class="add-on">%</span><input name="iva" type="text" >
    </div>
    <legend>Fecha</legend>
    <label>Fecha</label>
    <input name="fecha" type="date">



    <p></p>
    <input type="submit" class="btn btn-primary" value="Guardar" name="enviar">
    <input type="button" class="btn btn-primary" onclick="window.open('main.php','_self');" value="Salir" name="salir">
</form>
</div>