<form style="margin-left: 15px;" action="negocios/proveedor/modificarproveedor.php" method="post">
    <table border="0" class="table">

        <thead>

            <tr>
                <th><legend>Modificar Proveedor</legend></th>
        <th><legend>Domicilio</legend></th>

        </tr>
        </thead>

        <tbody>
            <tr> 
                <td style="width:150px;">
                    <label>Nombre</label>
                    <input name="nombre" <?php echo "value=" . $_GET['nombre'] ?> type="text" >
                    <label>Telefono</label>
                    <input name="telefono" <?php echo "value=" . $_GET['telefono'] ?> type="text" >
                    <label>Movil</label>
                    <input name="movil" <?php echo "value=" . $_GET['movil'] ?> type="text" >
                </td>
                <td>

                    <label>Calle</label>
                    <input name="calle" <?php echo "value=" . $_GET['calle'] ?> type="text" required>
                    <label>Numero</label>
                    <input name="numero" <?php echo "value=" . $_GET['numero'] ?> type="text" required>
                    <label>Población</label>
                    <input name="localidad" <?php echo "value=" . $_GET['localidad'] ?> type="text" required>
                    <label>Provincia</label>
                    <input name="provincia" <?php echo "value=" . $_GET['provincia'] ?> type="text" required>
                    <input type="hidden" name="idproveedor" <?php echo "value=" . $_GET['idproveedor'] ?>> 
                    <input type="hidden" name="iddomicilio" <?php echo "value=" . $_GET['iddomicilio'] ?>>
                </td>

            </tr>

        </tbody>



    </table>
    <p></p>
    <input type="submit" class="btn btn-primary" value="Guardar" name="enviar">
    <input type="button" class="btn btn-primary" onclick="window.open('main.php?iu=modtablaproveedor.php&dir=proveedor&mdir=negocios','_self');" value="Atras" name="atras">
    <input type="button" class="btn btn-primary" onclick="window.open('main.php','_self');" value="Salir" name="salir">
</form>