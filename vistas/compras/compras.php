<!-- vistas/compras/compras.php -> vistas/compras/redirectcargarfacturas.php -->
<div class="well">
<form name="formulario" style="margin-left: 15px;" action="vistas/compras/redirectcargarfacturas.php" method="post">
    <legend>Compras a Proveedores</legend>
    <label>Seleccionar Proveedor</label>
    <select name="proveedor" type="text">
        <?php include (RUTA_ABS."/negocios/compras/traerproveedores.php"); ?>
    </select>

    <legend>Seleccionar Mes</legend> 
    <select name="meses" type="text">
        <?php include_once (RUTA_ABS."/negocios/compras/traermes.php"); ?>
    </select>

    <p></p>
    <input type="submit" class="btn btn-primary" value="Siguente" name="siguiente">
    <input type="reset" class="btn btn-primary" value="Resetear" name="reset">
    <input type="button" class="btn btn-primary" onclick="window.open('main.php','_self');" value="Salir" name="salir">
</form>
</div>