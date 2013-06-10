/**********************************************************
 *                                                        *  
 * La variable IDX es la que lleva el conteo de las filas *
 *                                                        *
 **********************************************************/

var idx = 1;

function scalculoneto(subtotal,iva,valoriva,neto){
    iva = (iva/100) + 1;
    //subtotal es el total de la fila
    var resneto; //resultado neto
    var resvaloriva; // resultado valor iva

    resneto = subtotal /iva;
    resvaloriva = subtotal - resneto;
    
    neto.value =  resneto.toFixed(2);
    valoriva.value = resvaloriva.toFixed(2);
    
    scalculototal();
    scalculototaliva();
    scalculototalneto();
}

function scalculototal(){
    var i;
    var index;
    var suma = 0;
    var subtota;
    
    for(i=1; i <= idx ;i=i+1){
        index = "inputsubtot"+i;
        subtota = parseFloat(document.getElementById(index).value);
       
        suma = parseFloat(suma) + parseFloat(subtota);
    } 
    document.getElementById('total').value = suma.toFixed(2);    
}

function scalculototaliva(){
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

function scalculototalneto(){
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

function saddfila(){
   
    var tbody = document.getElementById('tbody');       
     
    //var celdas = document.getElementById(1).innerHTML;

    

        if (idx <=16){

            var newfila = sgenerafila();
            idx = idx +1;
            tbody.appendChild(newfila);
            inputidx = document.getElementById("inputidx");
            inputidx.value = parseInt(idx);
            document.getElementById('inputproducto'+ idx).focus();
        } else{
            alert("No es posible agregar mas filas.");
        }
    
}



function sgenerafila(){
    var valoresiva = document.getElementById('selectiva1').innerHTML;
    
    var tr = document.createElement("tr"); //TR DE LA FILA (CONTIENE 7 CELDAS)
    tr.setAttribute('id', parseInt(idx + 1) );
  
    var td1 = document.createElement("td"); //  CELDA CODIGO
    td1.innerHTML= idx +1;
    td1.setAttribute('id', "numero"  + parseInt(idx + 1) );
  
    var td2 = document.createElement("td"); //CELDA PRODUCTO
    var celdaprod = document.createElement("input");
    celdaprod.setAttribute('class', 'input-xlarge');
    celdaprod.setAttribute('type', 'text'); 
    celdaprod.setAttribute('id', 'inputproducto'+parseInt(idx + 1)+'');
    celdaprod.setAttribute('name', 'inputproducto'+parseInt(idx + 1)+'');
    celdaprod.setAttribute('required', 'required');
    td2.appendChild(celdaprod);
    
    var td3 = document.createElement("td"); //CELDA %iva
    td3.innerHTML = '<select class="input-small" id="selectiva'+parseInt(idx + 1)+'" name="selectiva'+parseInt(idx + 1)+'" onchange="scalculoneto(inputsubtot'+parseInt(idx + 1)+'.value,this.value,outvaloriva'+parseInt(idx + 1)+',outneto'+parseInt(idx + 1)+');"> '+valoresiva+' </select>'
 
    
    var td5 = document.createElement("td"); //CELDA NETO
    td5.innerHTML = "€&nbsp ";
    var celdaoutneto = document.createElement("input");
    celdaoutneto.setAttribute('id', 'outneto'+parseInt(idx + 1)+'');
    celdaoutneto.setAttribute('name', 'outneto'+parseInt(idx + 1)+'');
    celdaoutneto.setAttribute('readonly', 'readonly');
    celdaoutneto.setAttribute('type', 'text');
    celdaoutneto.setAttribute('class','input-mini');
    celdaoutneto.value = 0;
    td5.appendChild(celdaoutneto);
 
  
    var td7 = document.createElement("td"); //CELDA VALORIVA
    td7.innerHTML = "€&nbsp";
    var celdaoutvaloriva = document.createElement("input");
    celdaoutvaloriva.setAttribute('id', 'outvaloriva'+parseInt(idx + 1)+'');
    celdaoutvaloriva.setAttribute('name', 'outvaloriva'+parseInt(idx + 1)+'');
    celdaoutvaloriva.setAttribute('readonly', 'readonly');
    celdaoutvaloriva.setAttribute('type', 'text');
    celdaoutvaloriva.setAttribute('class','input-mini');
    celdaoutvaloriva.value = 0;
    td7.appendChild(celdaoutvaloriva);
  
   
    var td8 = document.createElement("td"); //CELDA SUBTOTAL
    td8.innerHTML = "€&nbsp";
    td8.innerHTML = td8.innerHTML + '<input required="required"  id="inputsubtot'+parseInt(idx + 1)+'" name="inputsubtot'+parseInt(idx + 1)+'"   class="input-mini" oninput="scalculoneto(this.value,selectiva'+parseInt(idx + 1)+'.value,outvaloriva'+parseInt(idx + 1)+',outneto'+parseInt(idx + 1)+');" type="text" onkeypress="return justNumbers(event);">';
  
    tr.appendChild(td1); //Codigo producto
    tr.appendChild(td2); //Producto
    tr.appendChild(td3); //%iva
    tr.appendChild(td7); //Valor iva
    tr.appendChild(td5); //Neto
    tr.appendChild(td8); //Subtotal
    
    return tr;
}

function sdelfila(){
    
   
    var tbody = document.getElementById('tbody');
    if (idx > 1){
        tbody.removeChild(document.getElementById(idx));
        idx = idx - 1;
        calculototal();
        calculototaliva();
        calculototalneto();
    }
    
}

function showTotalRow(){
    var tbody = document.getElementById('tbody');
    
    var lastRow = tbody.lastElementChild;
    var idLastRow = parseInt(lastRow.id);
    
    if(idLastRow < 17){
        for(i=idLastRow; i < 17 ;i=i+1){
            $('#tbody').append("<tr name='fila' id="+(i+1)+" style='height:36px;'><td></td><td></td><td></td><td></td><td></td><td></td></tr>")
           

        }
    }
}



