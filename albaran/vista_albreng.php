<?php
define("RUTA_ABS", dirname(__FILE__));

include_once ("controlador/conexion.php");

include_once ("controlador/convertir_json.php");
?>

<script type="text/javascript" src="../js/albaran.js"></script>

<?php
$cliente = $_POST['selectcliente'];
$fecha = $_POST['fecha'];

jsoner("listprod_albaran", $cliente);
?>
<div class="well">
<form style="margin-left: 15px;" action="albaran/Emitiralbaran.php" method="post">

    <legend>Nuevo Albaran - Paso 2</legend>
    <div id="container">
        <div class="tablafactura" style="margin-top: 1px">
            <table class="table table-bordered" style="margin-top: 1px">

                <thead>

                    <tr>
                        <th>Cod. Producto</th>
                        <th>Producto</th>
                        <th>Precio Unit</th>
                        <th>Cantidad</th>

                        <th>Importe</th>
                    </tr>
                </thead>

                <tbody id="tbody">
                    <tr style="background-color:#ffffff;" id="1" name="fila"> 
                        <td><input id="outidprod1" name="outidprod1" readonly="readonly" type="text" class="input-mini"></td> <!-- codigo-->
                        <td>
                            <select name="inputproducto1" required="required" onChange="aload_prod_tr(outidprod1, outpunit1, this.value,outsubtot1,inputcant1);"  class="input-xlarge"  type="text"  id="inputproducto1" />
                            <script type="text/javascript">

                                acarga_prodlist(inputproducto1);
                            </script></select>
                        </td>
                        <td>€ <input  id="outpunit1" value="" name="outpunit1" readonly="readonly" type="text" class="input-mini"></td> <!-- precio unitario-->
                        <td><input class="input-mini" onkeypress="return justNumbers(event);" required="required" oninput="acalculoneto(this.value,outpunit1.value,outsubtot1);" type="text" name="inputcant1" id="inputcant1" ></td>                          

                        <td>€ <input id="outsubtot1" name="outsubtot1"  readonly="readonly" type="text" class="input-mini"></td>
                    </tr>

                </tbody>

                <thead>
                    <tr  >
                        <th></th>


                        <th  colspan="2" ></th>

                        <th>Total </th>

                        <th >€ <input name="total" readonly="readonly" type="text" class="input-mini" id="total"></th>
                    </tr>


                </thead>
            </table>
        </div>
        <div class="botonfilas">       
            <button style="margin-bottom: 20px;" class="btn btn-primary" onclick=aaddfila(); type="button"><i class="icon-plus"></i></button>
            <button style="margin-bottom: 20px;" class="btn " onclick=adelfila(); type="button"><i class="icon-minus"></i></button>

        </div>

    </div>

    <input style="margin-top: 100px;" type="submit" class="btn btn-primary" value="Guardar e Imprimir" name="enviar">  
    <input style="margin-top: 100px;" type="button" class="btn btn-primary" onclick="window.open('<?php echo validarSesion(); ?>','_self');" value="Salir" name="salir">
    <input type="hidden" type="text" id="idxvar" name="idxvar">
    <input type="hidden" type="date" value="<?php echo $fecha ?>"  name="fecha">
    <input type="hidden" type="text" value="<?php echo $cliente ?>" name="cliente">
    <input id="inputidx" name="inputidx" type="hidden" value="1" type="text" value="" name="idx">
</form>
</div>