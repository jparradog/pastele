<?php
if ($_GET['tipo'] == 'total') {
    ?>

    <form name="formulario" style="margin-left: 15px;" action="reportes/albaran/reportealbaran.php" method="post">
        <legend>Total de Ventas de Albaranes</legend>
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

    <form name="formulario" style="margin-left: 15px;" action="reportes/albaran/reportealbarancliente.php" method="post">
        <legend>Total de Ventas de Albaranes por Clientes</legend>
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
