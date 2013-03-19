<div class="well">
<?php
if ($_GET['tipo'] == 'total') {
    ?>

    <form name="formulario" style="margin-left: 15px;" action="reportes/facturas/reportefactura.php" method="post">
        <legend>Total de Ventas de Facturas</legend>
        <label>Fecha Inicial</label>
        <input type="date" name="fechai" required></input>
        <label>Fecha Final</label>
        <input type="date" name="fechaf" required></input>    

        <p></p>
        <input type="submit" class="btn btn-primary" value="Siguente" name="siguiente">
        <input type="button" class="btn btn-primary" onclick="window.open('main.php','_self');" value="Salir" name="salir">
    </form>

    <?php
}
if ($_GET['tipo'] == 'cliente') {
    ?>

    <form name="formulario" style="margin-left: 15px;" action="reportes/facturas/reportefacturacliente.php" method="post">
        <label>Fecha Inicial</label>
        <input type="date" name="fechai" required></input>
        <label>Fecha Final</label>
        <input type="date" name="fechaf" required></input>   
     
        <p></p>
        <input type="submit" class="btn btn-primary" value="Siguente" name="siguiente">
        <input type="button" class="btn btn-primary" onclick="window.open('main.php','_self');" value="Salir" name="salir">
    </form>

    <?php
}
?>
<?php
if ($_GET['tipo'] == 'simple') {
    ?>

    <form name="formulario" style="margin-left: 15px;" action="reportes/facturas/reportefacturasimplecliente.php" method="post">
        <label>Fecha Inicial</label>
        <input type="date" name="fechai" required></input>
        <label>Fecha Final</label>
        <input type="date" name="fechaf" required></input>   
     
        <p></p>
        <input type="submit" class="btn btn-primary" value="Siguente" name="siguiente">
        <input type="button" class="btn btn-primary" onclick="window.open('main.php','_self');" value="Salir" name="salir">
    </form>

    <?php
}
?>
</div>