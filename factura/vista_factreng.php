<script type="text/javascript" src="../js/factura.js"></script>
<?php
define("RUTA_ABS", dirname(__FILE__));
include (RUTA_ABS . "/controlador/conexion.php");
include (RUTA_ABS."/controlador/convertir_json.php");


$cliente = $_POST['selectcliente'];
$fecha = $_POST['fecha'];

jsoner("listprod", $cliente);

?>
<div class="well">
<form style="margin-left: 15px;" action="factura/Emitirfactura.php" method="post">
    
    <legend>Nueva Factura - Paso 2</legend>
    <div id="container">
        <div class="tablafactura" style="margin-top: 1px">
            <table class="table table-bordered" style="margin-top: 1px">

                <thead>

                    <tr>
                        <th>Cod. Producto</th>
                        <th style ="width: auto;">Descripción</th>
                        <th>Precio Unit</th>
                        <th>Cantidad</th>
                        <th>% Iva</th>
                        <th>Couta Iva</th>
                        <th>Neto</th>
                        <th>Importe</th>
                    </tr>
                </thead>

                <tbody id="tbody">
                    <tr id="1" name="fila" style="background-color:#ffffff;"> 
                        <td><input  class="input-mini" type="text" name="outidprod1" id="outidprod1" readonly="readonly"></input></td>
                        <td>
                            <select required="requiered" onChange="load_prod_tr(outidprod1,outpunit1,this,outiva1,this.parentNode.parentNode.id);" class="input-xlarge" type="text" name="inputproducto1" id="inputproducto1" />
                            <script type="text/javascript">

                                carga_prodlist(inputproducto1);
                            </script></select>


                        </td>
                        <td>€ <input class="input-mini" type="text" name="outpunit1" readonly="readonly" id="outpunit1"></td>
                        <td><input class="input-mini" onkeypress="return justNumbers(event);" type="text" name="inputcant1" required="required" oninput="calculoneto(this.value,outpunit1.value,outneto1,outsubtot1,outiva1,outvaloriva1);" type="text" id="inputcant1" ></td> 
                        <td><input class="input-mini" type="text"  name="outiva1" readonly="readonly" id="outiva1" > %</td>
                        <td>€ <input class="input-mini"  type="text" name="outvaloriva1" readonly="readonly" id="outvaloriva1"></td>
                        <td>€ <input class="input-mini" type="text" name="outneto1" readonly="readonly" id="outneto1" ></td>
                        <td>€ <input class="input-mini" type="text" name="outsubtot1" readonly="readonly" id="outsubtot1" ></td>
                    </tr>

                </tbody>

                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Total Iva</th>
                        <th>Total Neto</th>
                        <th>Total</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>€ <input type="text" class="input-mini" readonly="readonly" name="totaliva" id="totaliva"></th>                            
                        <th>€ <input type="text" class="input-mini" readonly="readonly" name="totalneto" id="totalneto"></th>
                        <th>€ <input type="text" class="input-mini" readonly="readonly" name="total" id="total"></th>
                    </tr>

                </thead>
            </table>
        </div>
        <div class="botonfilas">       
            <button style="margin-bottom: 20px;" class="btn btn-primary" onclick=addfila(); type="button"><i class="icon-plus"></i></button>
            <button style="margin-bottom: 20px;" class="btn " onclick=delfila(); type="button"><i class="icon-minus"></i></button>

        </div>

    </div>

    <input style="margin-top: 100px;"  type="submit" class="btn btn-primary" value="Guardar e Imprimir" name="enviar">  
    <input style="margin-top: 100px;" type="button" class="btn btn-primary" onclick="window.open('<?php echo validarSesion(); ?>','_self');" value="Salir" name="salir">
    <input type="hidden" type="text" id="idxvar" name="idxvar">
    <input type="hidden" type="date" value="<?php echo $fecha ?>"  name="fecha">
    <input type="hidden" type="text" value="<?php echo $cliente ?>" name="cliente">
    <input id="inputidx" name="inputidx" type="hidden" value="1" type="text" value="" name="idx">
</form>
</div>