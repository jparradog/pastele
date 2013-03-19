<?php
define("RUTA_ABS", dirname(__FILE__));

include (RUTA_ABS . "/controlador/conexion.php");
include (RUTA_ABS . "/controlador/convertir_json.php");


$cliente = $_POST['selectcliente'];
$fecha = $_POST['fecha'];

jsoner("listprod", $cliente);
?>



<form style="margin-left: 15px;" action="facturasimple/Emitirfacturasimple.php" method="post">

    <legend>Nueva Factura Simple - Paso 2</legend>

    <div id="container">
        <div class="tablafactura" style="margin-top: 1px">
            <table class="table table-hover" style="margin-top: 1px">

                <thead>

                    <tr>
                        <th>N°&nbsp</th>
                        <th>Descripción</th>
                        <th>Iva (%)</th>
                        <th>Cuota Iva</th>
                        <th>Base Imponible</th>
                        <th>Importe</th>
                    </tr>
                </thead>

                <tbody id="tbody">
                    <tr id="1" name="fila"> 
                        <td id="numero1">1</td>
                        <td>
                            <input class="input-xlarge" type="text" required="required" name="inputproducto1" id="inputproducto1" list="productos"/>
                        </td>

<!--                        <td><input class="span1" oninput="calculoneto(this.value,outpunit1.value,outneto1,outsubtot1,outiva1,outvaloriva1);" type="text" id="inputcant1" ></td> -->

                        <td>
                            <select class="input-small" name="selectiva1" requiered="requiered" id="selectiva1" onchange="scalculoneto(inputsubtot1.value,this.value,outvaloriva1,outneto1);">
<?php include_once (RUTA_ABS."/negocios/impuestos/traervaloriva.php") ?>
                            </select></td>
                        <td>€&nbsp<input readonly="readonly" name="outvaloriva1" id="outvaloriva1" class="input-mini"  type="text"></td>
                        <td>€&nbsp<input readonly="readonly" name="outneto1" id="outneto1" class="input-mini"  type="text" ></td>
                        <td>€&nbsp<input required="required" class="input-mini" onkeypress="return justNumbers(event);" name="inputsubtot1" id="inputsubtot1"  oninput="scalculoneto(this.value,selectiva1.value,outvaloriva1,outneto1);" type="text"></td>
                    </tr>

                </tbody>

                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Cuota IVA<br> €&nbsp<input readonly="readonly" type="text" name="totaliva" class="input-mini" id="totaliva"></th>
                        <th>Base Imponible<br> €&nbsp<input readonly="readonly" type="text" name="totalneto" class="input-mini" id="totalneto"></th>
                        <th> Importe Total<br> €&nbsp<input name="total" readonly="readonly" type="text" class="input-mini" id="total"> </th>
                    </tr>


                </thead>
            </table>
        </div>
        <div class="botonfilas">       
            <button style="margin-bottom: 20px;" class="btn btn-primary" onclick=saddfila(); type="button"><i class="icon-plus"></i></button>
            <button style="margin-bottom: 20px;" class="btn " onclick=sdelfila(); type="button"><i class="icon-minus"></i></button>

        </div>



    </div>


    <input style="margin-top: 100px;" type="submit" class="btn btn-primary" value="Guardar e Imprimir" name="enviar">  
    <input style="margin-top: 100px;" type="button" class="btn btn-primary" onclick="window.open('<?php echo validarSesion(); ?>','_self');" value="Salir" name="salir">
    <input type="hidden" type="text" id="idxvar" name="idxvar">
    <input type="hidden" type="date" value="<?php echo $fecha ?>"  name="fecha">
    <input type="hidden" type="text" value="<?php echo $cliente ?>" name="cliente">
    <input id="inputidx" name="inputidx" type="hidden" value="1" type="text" value="" name="idx">
</form>