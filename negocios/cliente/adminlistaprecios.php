<?php
include_once (RUTA_ABS."/controlador/conexion.php");
//Guardo el id del cliente que selecciono para administrar su lista de precios
$idcliente = $_GET['idcliente'];

$conexion = conectar_bd();

//Obtengo todos los datos de la tabla producto
$query = "SELECT * FROM producto";

$productos = mysql_query($query);
//Obtengo el idcliente de la tabla listaprecio
$listaproducto = "SELECT DISTINCT idcliente FROM listaprecio WHERE idcliente = $idcliente";

$result = mysql_query($listaproducto);

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//
//SI EL CLIENTE YA TIENE UNA LISTA DE PRECIOS, TRAIGO LA LISTA QUE YA TIENE EN LA TABLA LISTAPRECIO
if (mysql_num_rows($result) != 0) {
    $sql = "SELECT  producto.descripcion, listaprecio.precio
            FROM listaprecio
            INNER JOIN producto
            ON producto.idproducto = listaprecio.idproducto
            WHERE listaprecio.idcliente = $idcliente";
    $datos = mysql_query($sql);
    ?>
<div class="well">
    <form style="margin-left: 15px;" action="negocios/cliente/modificarlistaprecio.php" method="post">
        <legend style="margin-left:15px;">Lista de Precios de <?php echo $_GET['nombre'] . " " . $_GET['apellido'] . " " . $_GET['2apellido']; ?></legend>
        <input type="submit" class="btn btn-primary" value="Guardar" name="enviar">
        <input type="button" class="btn btn-primary" onclick="window.open('main.php?iu=listaprecios.php&mdir=vistas&dir=cliente','_self');" value="Atras" name="atras">
        <input type="button" class="btn btn-primary" onclick="window.open('main.php','_self');" value="Salir" name="salir">
        <table style="margin: 15px 0px 0px 15px; width: 98%;" class="table table-bordered">
            <tr>
                <th style="font-weight: bold;">
                    Producto            
                </th>
                <th style="font-weight: bold;">
                    Precio Unitario
                </th>
            </tr>
            <tbody>    
                <?php
                //POS LA UTILIZO PARA SABER LA CANTIDA DE PRODUCTOS QUE HAY
                $pos = 0;

                while ($fila = mysql_fetch_assoc($datos)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $fila['descripcion']; ?>
                        </td>
                        <td>
                            <!-- MUESTRO UN INPUT TEXT CON LOS VALORES PREDIFINIDOS EN LA TABLA PRODUCTOS -->
                            <input type="text" name="<?php echo $pos; ?>" required value="<?php echo $fila['precio']; ?>">                        
                        </td>
                    </tr>   
                    <?php
                    $pos++;
                }
                ?>                
            </tbody>
        </table>
        <!-- MUESTRO UN CAMPO INVISIBLE QUE CONTIENE LA CANTIDAD DE PRODUCTOS 
        MOSTRADOS EN LA TABLA -->
        <input type="hidden" name="pos" <?php echo "value=" . $pos; ?>>
        <input type="hidden" name="idcliente" <?php echo "value=" . $idcliente; ?>>
        <br/>
        <input type="submit" class="btn btn-primary" value="Guardar" name="enviar">
        <input type="button" class="btn btn-primary" onclick="window.open('main.php?iu=listaprecios.php&mdir=vistas&dir=cliente','_self');" value="Atras" name="atras">
        <input type="button" class="btn btn-primary" onclick="window.open('main.php','_self');" value="Salir" name="salir">
    </form>
    <?php
//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//
//SI EL CLIENTE NO TIENE UNA LISTA DE PRECIOS, CARGO LA PREDETERMINADA
} else {
    ?>
    <form style="margin-left: 15px;" action="negocios/cliente/crearlistaprecio.php" method="post">
        <legend style="margin-left:15px;">Lista de Precios de <?php echo $_GET['nombre'] . " " . $_GET['apellido'] . " " . $_GET['2apellido']; ?></legend>
        <input type="submit" class="btn btn-primary" value="Guardar" name="enviar">
        <input type="button" class="btn btn-primary" onclick="window.open('main.php?iu=listaprecios.php&mdir=vistas&dir=cliente','_self');" value="Atras" name="atras">
        <input type="button" class="btn btn-primary" onclick="window.open('main.php','_self');" value="Salir" name="salir">
        <table style="margin: 15px 0px 0px 15px; width: 98%;" class="table table-bordered">
            <tr>
                <th style="font-weight: bold;">
                    Producto            
                </th>
                <th style="font-weight: bold;">
                    Precio Unitario
                </th>
            </tr>
            <tbody>    
    <?php
    //POS LA UTILIZO PARA SABER LA CANTIDA DE PRODUCTOS QUE HAY
    $pos = 0;

    while ($fila = mysql_fetch_assoc($productos)) {
        ?>
                    <tr>
                        <td>
                    <?php echo $fila['descripcion']; ?>
                        </td>
                        <td>
                            <!-- MUESTRO UN INPUT TEXT CON LOS VALORES PREDIFINIDOS EN LA TABLA PRODUCTOS -->
                            <input type="text" name="<?php echo $pos; ?>" required value="<?php echo $fila['precioref']; ?>">                        
                        </td>
                    </tr>   
        <?php
        $pos++;
    }
    ?>                
            </tbody>
        </table>
        <!-- MUESTRO UN CAMPO INVISIBLE QUE CONTIENE LA CANTIDAD DE PRODUCTOS 
        MOSTRADOS EN LA TABLA -->
        <input type="hidden" name="pos" <?php echo "value=" . $pos; ?>>
        <input type="hidden" name="idcliente" <?php echo "value=" . $idcliente; ?>>
        <br/>
        <input type="submit" class="btn btn-primary" value="Guardar" name="enviar">
        <input type="button" class="btn btn-primary" onclick="window.open('main.php?iu=listaprecios.php&mdir=vistas&dir=cliente','_self');" value="Atras" name="atras">
        <input type="button" class="btn btn-primary" onclick="window.open('main.php','_self');" value="Salir" name="salir">
    </form>
</div>
    <?php
}
?>