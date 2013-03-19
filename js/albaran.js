
var idx = 1;


function acalculoneto(cantidad,precio,subtotal){
    var res;
   
  
    res = precio*cantidad;
    
   
    subtotal.value = res.toFixed(2);
   
    
    acalculototal();
  
    
}

function acalculototal(){
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





function aaddfila(){
   
    var tbody = document.getElementById('tbody');       
     
    //var celdas = document.getElementById(1).innerHTML;
    if (idx <=18){
        var newfila = agenerafila();
        idx = idx +1;
        tbody.appendChild(newfila);
        document.getElementById('inputproducto'+ idx).focus();
        inputidx = document.getElementById("inputidx");
        inputidx.value = parseInt(idx);
    } else{
        alert("No es posible agregar mas filas.");
    }
}



function agenerafila(){
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
    var script =document.createElement("script");
    celdaprod.setAttribute('class', 'input-xlarge');
    celdaprod.setAttribute('type', 'text');
    celdaprod.setAttribute('id', 'inputproducto'+parseInt(idx + 1));
    celdaprod.setAttribute("onchange","aload_prod_tr(outidprod"+parseInt(idx+1)+", outpunit"+parseInt(idx+1)+", this.value,outsubtot"+parseInt(idx+1)+",inputcant"+parseInt(idx+1)+");");
    celdaprod.name = "inputproducto"+parseInt(idx+1);
    celdaprod.setAttribute('required', 'required');
    celdaprod.setAttribute('type', 'text');
    script.innerHTML = "acarga_prodlist(inputproducto"+parseInt(idx+1)+")";
    
    celdaprod.appendChild(script);
    td2.appendChild(celdaprod);
  
    
    var td3 = document.createElement("td"); //CELDA P. UNITARIO
    var celdapunit = document.createElement("input");
    celdapunit.setAttribute("class", "input-mini");
    td3.innerHTML = "€ ";
    celdapunit.setAttribute('id', 'outpunit'+parseInt(idx + 1)+'');
    
    celdapunit.name = "outpunit"+parseInt(idx+1);
    celdapunit.setAttribute("readonly", "readonly");
    celdapunit.setAttribute('type', 'text');
    td3.appendChild(celdapunit);
  
    var td4 = document.createElement("td"); //CELDA CANTIDAD
    td4.innerHTML='<input onkeypress="return justNumbers(event);" required="required" id=inputcant'+parseInt(idx+1)+' name=inputcant'+parseInt(idx+1)+' class="input-mini" type="text" oninput=acalculoneto(this.value,outpunit'+parseInt(idx + 1)+'.value,outsubtot'+parseInt(idx + 1)+');>';
    td4.setAttribute('id', "cant" + parseInt(idx + 1));
    
  
    var td8 = document.createElement("td"); //CELDA SUBTOTAL
    td8.innerHTML = "€ ";
    var celdaoutsubt = document.createElement("input");
    celdaoutsubt.setAttribute("class", "input-mini");
    celdaoutsubt.setAttribute('id', 'outsubtot'+parseInt(idx + 1)+'');
    
    celdaoutsubt.setAttribute("readonly", "readonly");
    celdaoutsubt.setAttribute('type', 'text');
    celdaoutsubt.name ="outsubtot"+parseInt(idx+1);
    td8.appendChild(celdaoutsubt);
  
  
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
   
    tr.appendChild(td8);
  
    return tr;
  
  
}

function adelfila(){
    
    //if (confirm("¿Seguro desea borrar la fila?")){ 
    var tbody = document.getElementById('tbody');
    if (idx > 1){
        tbody.removeChild(document.getElementById(idx));
        idx = idx - 1;
        acalculototal();
    
    }
        
// }
    
    
}
function acarga_prodlist(select){
    
       
    
    $.getJSON("json/listprod_albaran.json",function(data){ 
        
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

function aload_prod_tr(cod, punit,select,subtotal,cantidad){

    //Obtengo los input o output del renglon
   
    //recorro el json
    $.getJSON("json/listprod_albaran.json",function(data){ 
        $.each(data, function(i){
            var datos = this;     
            
            if(datos.idproducto == select){
                
                cod.value = datos.idproducto;
                punit.value = datos.precio;
                acalculoneto(cantidad.value,punit.value,subtotal)
                
            
            }
        
                    
        });
        
 
    });
    
    
}

