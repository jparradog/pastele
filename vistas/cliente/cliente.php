<div class="well">
<form action="negocios/cliente/altacliente.php" method="post">

    <table border="0" class="table">

        <thead>

            <tr>
                <th><legend>Nuevo Cliente</legend></th>
        <th><legend>Domicilio</legend></th>

        </tr>
        </thead>

        <tbody>
            <tr> 
                <td style="width:150px;">
                    <label>Nombre/Razón Social</label>
                    <input name="nombre" type="text" >
                    <label>Apellido</label>
                    <input name="apellido" type="text">
                    <label>Segundo Apellido</label>
                    <input name="2apellido" type="text">
                    <label>Nif/Razon Social</label>
                    <input name="cuit" type="text"  >
                    <label>DNI</label>
                    <input name="dni" type="text" >
                    <label>E-mail</label>
                    <input name="email" type="email">
                    <label>Telefono</label>
                    <input name="telefono" type="text">
                    <label>Tel Movil</label>
                    <input name="movil" type="text">
                </td>
                <td>
                    <label>Calle</label>
                    <input name="calle" type="text" required>
                    <label>Numero</label>
                    <input name="numero" type="text" required>
                    <label>Población</label>
                    <input name="localidad" type="text" required>
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
