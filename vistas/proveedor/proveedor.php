<div class="well">
<form style="margin-left: 15px;" action="negocios/proveedor/altaproveedor.php" method="post">
    <table border="0" class="table">

        <thead>

            <tr>
                <th><legend>Nuevo proveedor</legend></th>
        <th><legend>Domicilio</legend></th>

        </tr>
        </thead>

        <tbody>
            <tr> 
                <td style="width:150px;">
                    <label>Nombre</label>
                    <input name="nombre" type="text" >
                    <label>Telefono</label>
                    <input name="telefono" type="text" >
                    <label>Movil</label>
                    <input name="movil" type="text" >

                </td>
                <td>
                    <label>Calle</label>
                    <input name="calle" type="text" required>
                    <label>Numero</label>
                    <input name="numero" type="text" required>
                    <label>Población</label>
                    <input name="localidad" type="text" required>
                    <label>Provincia</label>
                    <input name="provincia" type="text" required>
                </td>

            </tr>

        </tbody>



    </table>


    <p></p>
    <input type="submit" class="btn btn-primary" value="Guardar" name="enviar">
    <input type="reset" class="btn btn-primary" value="Resetear" name="reset">
    <input type="button" class="btn btn-primary" onclick="window.open('main.php','_self');" value="Salir" name="salir">
</form>


</div>