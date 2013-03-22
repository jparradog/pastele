<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="well" style="margin-left: 15px; margin-top: 0px;">
    <legend>Backup Base de datos</legend>
    <a class="btn btn-primary" href="mwBackup_v_1_3/index.html">
        <i style="margin-right: 3px;" class="icon-download-alt icon-white"></i>
        Descargar backup
    </a>

</div>


<div class="well" style="margin-left:15px; margin-top: 15px;">
    <legend>Cambiar contraseña Administrador</legend>

    <form action="main.php?iu=cambiarpass.php&mdir=controlador" method="post">
        <label for="passinput1">
            Nueva contraseña
        </label>
        <input name="passinput1" type="password" required>
        <div class="control-group">
            <label for="passinput2">
                Confirmar Contraseña
            </label>
            <input name="passinput2" type="password" required>
        </div>
        <div class="control-group">
            <input type="submit" class="btn btn-primary" value="Aceptar">
        </div>
        <input name="tipopass" type="text" value="1" style="display: none">
    </form>

</div>


<div class="well" style="margin-left:15px; margin-top: 15px;">
    <legend>Cambiar contraseña Empleado</legend>

    <form action="main.php?iu=cambiarpass.php&mdir=controlador" method="post">
        <label for="passimput3">
            Nueva contraseña
        </label>
        <input name="passinput3" type="password" required>
        <div class="control-group">
            <label for="passinput4">
                Confirmar Contraseña
            </label>
            <input name="passinput4" type="password" required>
        </div>
        <input name="tipopass" type="text" value="2" style="display: none">
    <div class="control-group">
            <input type="submit"  class="btn btn-primary" value="Aceptar">
  </a>
    </div>
    </form>
    
</div>


<div class="well" style="margin-left: 15px; margin-top: 15px;">
    <legend>Ingresar numero actual de factura</legend>
    <div style="margin-right: 15px;" class="alert alert-info">

        <strong>¡Atención!</strong> Esta ventana le permitira empezar por el número de factura elegido. Recuerde que una vez hecha esta acción no se podra deshacer.

    </div>    
    <p></p>
    <form action="main.php?iu=reset.php&mdir=controlador" method="post">
        Numero de factura:

        <input name="initnum" class="input-mini" type="text"/>
        <p></p>
        <input  type="submit" class="btn btn-primary" value="Aceptar">

    </form>

</div>



<div class="well" style="margin-left: 15px; margin-top: 15px;">
    <legend>Resetear número de Factura</legend>
    <div style="margin-right: 15px;" class="alert alert-error">

        <strong>¡Atención!</strong> Esta ventana le permitirá resetear el número de factura actual a 0(Cero). Recuerde que una vez hecha esta acción no se podra deshacer.
    </div>    

    <p></p>
    <input onclick="if(confirm('¿Esta seguro de que desea realizar esta acción?')){window.open('main.php?iu=reset.php&mdir=controlador','_self')}" type="submit" class="btn btn-primary" value="Resetear" name="enviar">
    <input style="float:right; margin-right: 15px;" type="button" class="btn btn-info" onclick="window.open('main.php','_self');" value="Salir" name="salir">
</div>





