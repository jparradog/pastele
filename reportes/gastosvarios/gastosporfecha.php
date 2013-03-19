<div class="well">
<form name="formulario" style="margin-left: 15px;" action="reportes/gastosvarios/reportegastosvarios.php" method="post">
    <legend>Gastos Varios</legend>
    <label>Fecha Inicial</label>
    <input type="date" name="fechai" required></input>
    <label>Fecha Final</label>
    <input type="date" name="fechaf" required></input>    

    <p></p>
    <input type="submit" class="btn btn-primary" value="Siguente" name="siguiente">
    <input type="button" class="btn btn-primary" onclick="window.open('main.php','_self');" value="Salir" name="salir">
</form>
</div>