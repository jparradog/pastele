
var idx = 1;


function calculoneto(precio,cantidad,neto,subtotal,outiva,outvaloriva){
    var res;
    var iva;
    var calc;
  
    res = precio*cantidad;
    neto.value = res.toFixed(2);
    iva = outiva.value/100 * res;
    outvaloriva.value =  iva.toFixed(2);
    calc = iva + res;
    subtotal.value = calc.toFixed(2);
   
    
    calculototal();
    calculototaliva();
    calculototalneto();
    
}

function calculototal(){
    var i;
    var index;
    var suma = 0;
    var subtota;
    
    for(i=1; i <= idx ;i=i+1){
        index = "outsubtot"+i;
        subtota = parseFloat(document.getElementById(index).value);
       
        suma = parseFloat(suma) + parseFloat(subtota);
    } 
    document.getElementById('total').value = suma.toFixed(2);    
}

function calculototaliva(){
    var i;
    var index;
    var suma = 0;
    var subtota;
    
    for(i=1; i <= idx ;i=i+1){
        index = "outvaloriva"+i;
        subtota = parseFloat(document.getElementById(index).value);
       
        suma = parseFloat(suma) + parseFloat(subtota);
    } 
    document.getElementById('totaliva').value = suma.toFixed(2);
}

function calculototalneto(){
    var i;
    var index;
    var suma = 0;
    var subtota;
    
    for(i=1; i <= idx ;i=i+1){
        index = "outneto"+i;
        subtota = parseFloat(document.getElementById(index).value);
       
        suma = parseFloat(suma) + parseFloat(subtota);
    } 
    document.getElementById('totalneto').value = suma.toFixed(2);
}


function addfila(){
   
    var tbody = document.getElementById('tbody');       
     
    //var celdas = document.getElementById(1).innerHTML;
    if(idx<=16){
        var newfila = generafila();
        idx = idx +1;
        tbody.appendChild(newfila);
    
        document.getElementById('inputproducto'+ idx).focus();
        carga_prodlist(document.getElementById('inputproducto'+ idx));
        inputidx = document.getElementById("inputidx");
        inputidx.value = parseInt(idx);
    }else{
        window.alert("No se pueden agregar mas filas");
    }
}

function generafila(){
    var tr = document.createElement("tr"); //TR DE LA FILA (CONTIENE 7 CELDAS)
    tr.setAttribute('id', parseInt(idx + 1) );
    tr.setAttribute('style', "background-color:#ffffff;" );
  
    var td1 = document.createElement("td"); //  CELDA CODIGO
    var celdaid = document.createElement("input");
    celdaid.setAttribute("class", "input-mini");
    celdaid.setAttribute('type', 'text');
    celdaid.id = "outidprod"+parseInt(idx+1);
    celdaid.name = "outidprod"+parseInt(idx+1);
    celdaid.setAttribute("readonly", "readonly")
    
    
    td1.setAttribute('id', "cod"  + parseInt(idx + 1) );
    td1.appendChild(celdaid);
  
    var td2 = document.createElement("td"); //CELDA PRODUCTO
    var celdaprod = document.createElement("select");
    
    celdaprod.setAttribute('class', 'input-xlarge');
    celdaprod.setAttribute('type', 'text');
    celdaprod.setAttribute('id', 'inputproducto'+parseInt(idx + 1));
    celdaprod.setAttribute("onchange","load_prod_tr(outidprod"+parseInt(idx + 1)+",outpunit"+parseInt(idx + 1)+",this,outiva"+parseInt(idx + 1)+",this.parentNode.parentNode.id)");
    celdaprod.name = "inputproducto"+parseInt(idx+1);
    celdaprod.setAttribute('required', 'required');
    td2.appendChild(celdaprod);
  
    //td2.innerHTML= ' <input class="span2" type="text"  list="productos"/> ';
    //td2.setAttribute('id', "prod" + parseInt(idx + 1));
  
    var td3 = document.createElement("td"); //CELDA P. UNITARIO
    var celdapunit = document.createElement("input");
    celdapunit.setAttribute("class", "input-mini");
    td3.innerHTML = "€ ";
    celdapunit.setAttribute('id', 'outpunit'+parseInt(idx + 1)+'');
    
    celdapunit.name = "outpunit"+parseInt(idx+1);
    celdapunit.setAttribute("readonly", "readonly");
    celdapunit.setAttribute('type', 'text');
    td3.appendChild(celdapunit);
  
    //td3.innerHTML= "<output id='outpunit'>2</output>";
    //td3.setAttribute('id', "punit" + parseInt(idx + 1));
  
    var td4 = document.createElement("td"); //CELDA CANTIDAD
    td4.innerHTML='<input onkeypress="return justNumbers(event);" required="required" name="inputcant'+parseInt(idx + 1)+'" id="inputcant'+parseInt(idx + 1)+'" class="input-mini" type="text" oninput=calculoneto(this.value,outpunit'+parseInt(idx + 1)+'.value,outneto'+parseInt(idx + 1)+',outsubtot'+parseInt(idx + 1)+',outiva'+parseInt(idx + 1)+',outvaloriva'+parseInt(idx + 1)+');>';
    td4.setAttribute('id', "cant" + parseInt(idx + 1));
      
    var td5 = document.createElement("td"); //CELDA NETO
    td5.innerHTML = "€ ";
    var celdaoutneto = document.createElement("input");
    celdaoutneto.setAttribute('id', 'outneto'+parseInt(idx + 1)+'');
    celdaoutneto.value = 0;
    celdaoutneto.name = "outneto"+parseInt(idx+1);
    celdaoutneto.setAttribute("readonly", "readonly");
    celdaoutneto.setAttribute("class", "input-mini");
    celdaoutneto.setAttribute('type', 'text');
    
    
    td5.appendChild(celdaoutneto);
    //
    //td5.innerHTML= "<output>0</output>";
    //td5.setAttribute('id', "neto" + parseInt(idx + 1));
  
    var td6 = document.createElement("td"); //CELDA IVA
  
    var celdaoutiva = document.createElement("input");
    celdaoutiva.setAttribute("class", "input-mini");
    celdaprod.setAttribute('required', 'required');
    celdaoutiva.setAttribute('id', 'outiva'+parseInt(idx + 1)+'');
    celdaoutiva.name = "outiva"+parseInt(idx+1);
    celdaoutiva.setAttribute("readonly", "readonly");
    celdaoutiva.setAttribute('type', 'text');
    
    
    td6.appendChild(celdaoutiva);
    td6.innerHTML=td6.innerHTML +" %";
  
    //td6.innerHTML= "000";
    //td6.setAttribute('id', "iva" + parseInt(idx + 1));
  
    var td7 = document.createElement("td"); //CELDA VALORIVA
    td7.innerHTML = "€ ";
    var celdaoutvaloriva = document.createElement("input");
    celdaoutvaloriva.setAttribute("class", "input-mini");
    celdaoutvaloriva.setAttribute('id', 'outvaloriva'+parseInt(idx + 1)+'');
    celdaoutvaloriva.name = "outvaloriva"+parseInt(idx+1);
    celdaoutvaloriva.setAttribute("readonly", "readonly");
    celdaoutvaloriva.value = 0;    
    celdaoutvaloriva.setAttribute('type', 'text');
    td7.appendChild(celdaoutvaloriva);
  
    //td7.innerHTML= "<output>0</output>";
    //td7.setAttribute('id', "subtotal" + parseInt(idx + 1));
    var td8 = document.createElement("td"); //CELDA SUBTOTAL
    td8.innerHTML = "€ ";
    var celdaoutsubt = document.createElement("input");
    celdaoutsubt.setAttribute("class", "input-mini");
    celdaoutsubt.setAttribute('id', 'outsubtot'+parseInt(idx + 1)+'');
    celdaoutsubt.value = 0;
    celdaoutsubt.setAttribute("readonly", "readonly");
    celdaoutsubt.setAttribute('type', 'text');
    celdaoutsubt.name ="outsubtot"+parseInt(idx+1);
    td8.appendChild(celdaoutsubt);
  
  
    tr.appendChild(td1); //Codigo producto
    tr.appendChild(td2); //Producto
    tr.appendChild(td3); //Punit
    tr.appendChild(td4); //Cant
    tr.appendChild(td6); //Iva
    tr.appendChild(td7); //Valor iva
    tr.appendChild(td5); //Neto
    tr.appendChild(td8); //Subtotal
  
    return tr;
  
  
}

function delfila(){
    
    //if (confirm("¿Seguro desea borrar la fila?")){ 
    var tbody = document.getElementById('tbody');
    if (idx > 1){
        tbody.removeChild(document.getElementById(idx));
        idx = idx - 1;
    }
        
// }
    
    
}
/*----------------------------------------------------
 *Esta funcion crea los select de producto para todos
 *los renglones
 *
 *----------------------------------------------------
 */
function carga_prodlist(select){
    
       
    
    $.getJSON("json/listprod.json",function(data){ 
        
        var item;
        var item2;
        item2 = document.createElement("option");
        item2.value="";
        item2.innerHTML=null;
        select.appendChild(item2);
        $.each(data, function(i){
            var datos = this;     
            item = document.createElement("option"); //Crea un option por cada producto
            item.value = datos.idproducto;
            item.innerHTML = datos.descripcion;
            select.appendChild(item);
                    
        });
        
 
    });
    


    

    
}

/*
 * ---------------------------------------------------
 * Esta funcion carga los datos del producto en el
 * renglon y actualiza los totales.
 * Tambien si ya se ha seleccionado un producto, al
 * cambiarlo los totales se actualizan =D 
 * ---------------------------------------------------
 */
function load_prod_tr(outidprod, outpunit, inputprod,outiva,id){

    //Obtengo los input o output del renglon
    var cantidad = document.getElementById("inputcant"+parseInt(id));
    var neto = document.getElementById("outneto"+parseInt(id));
    var subtotal = document.getElementById("outsubtot"+parseInt(id));
    var outvaloriva = document.getElementById("outvaloriva"+parseInt(id));
    
    //recorro el json
    $.getJSON("json/listprod.json",function(data){ 
        $.each(data, function(i){
            var datos = this;     
            
            if(datos.idproducto == inputprod.value){
                
                outidprod.value = datos.idproducto;
                outpunit.value = datos.precio;
                outiva.value = datos.iva
                calculoneto(outpunit.value,cantidad.value,neto,subtotal,outiva,outvaloriva) 
            
            }
        
                    
        });
        
 
    });
    
    
}
/*
 * ---------------------------------------------------
 * Esta funcion hace que solo puedan ingresarse
 * numeros en los inputs y no otro caracter
 * ---------------------------------------------------
 */
function justNumbers(e) {
    var keynum = window.event ? window.event.keyCode : e.which;
    if ( keynum == 8 || keynum == 46 ) return true;
    return /\d/.test(String.fromCharCode(keynum));
}

function showTotalRow(){
    var tbody = document.getElementById('tbody');
    
    var lastRow = tbody.lastElementChild;
    var idLastRow = parseInt(lastRow.id);
    
    if(idLastRow < 17){
        for(i=idLastRow; i < 17 ;i=i+1){
            $('#tbody').append("<tr style='height:37px;'><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>")
        }
    }

}