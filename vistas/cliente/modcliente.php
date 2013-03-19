<form  action="negocios/cliente/modificarcliente.php" method="post">
    <table border="0" class="table">

        <thead>

            <tr>
                <th><legend>Modificar Cliente</legend></th>
        <th><legend>Domicilio</legend></th>
        </tr>
        </thead>

        <tbody>
            <tr> 
                <td style="width:150px;">


                    <label>Nombre/Razón Social</label>
                    <input name="nombre" type="text" <?php echo "value=" . $_GET['nombre'] ?> >
                    <label>Apellido</label>
                    <input name="apellido" type="text" <?php echo "value=" . $_GET['apellido'] ?> >
                    <label>Segundo Apellido</label>
                    <input name="2apellido"  type="text" <?php echo "value=" . $_GET['apellido2'] ?>>
                    <label>Nif/Razon Social</label>
                    <input name="cuit" type="text" <?php echo "value=" . $_GET['cuit'] ?> >
                    <label>DNI</label>
                    <input name="dni" type="text" <?php echo "value=" . $_GET['dni'] ?> >
                    <label>E-mail</label>
                    <input name="email" type="text" <?php echo "value=" . $_GET['email'] ?>>
                    <label>Telefono</label>
                    <input name="telefono"  type="text" <?php echo "value=" . $_GET['numerotelcliente'] ?>>
                    <label>Tel Movil</label>
                    <input name="movil"  type="text" <?php echo "value=" . $_GET['movil'] ?>>
                </td>
                <td>

                    <label>Calle</label>
                    <input name="calle" <?php echo "value=" . $_GET['calle'] ?> type="text" required>
                    <label>Numero</label>
                    <input name="numero" <?php echo "value=" . $_GET['numero'] ?> type="text" required>
                    <label>Población</label>
                    <input name="localidad" <?php echo "value=" . $_GET['localidad'] ?> type="text" required>
                    <input type="hidden" name="idcliente" <?php echo "value=" . $_GET['idcliente'] ?>> 
                    <input type="hidden" name="iddomicilio" <?php echo "value=" . $_GET['iddomicilio'] ?>>
                </td>

            </tr>

        </tbody>
    </table>

    <p></p>
    <input type="submit" class="btn btn-primary" value="Guardar" name="enviar">
    <input type="button" class="btn btn-primary" onclick="window.open('main.php?iu=modtablacliente.php&dir=cliente&mdir=negocios','_self');" value="Atras" name="atras">
    <input type="button" class="btn btn-primary" onclick="window.open('main.php','_self');" value="Salir" name="salir">
</form>