/*
 * ESTE ARCHIVO LO UNICO QUE HACE ES PONER EN ACTIVO EL ITEM DEL MENU LATERAL AL CLICKEARLO
 *  (Lo tengo q modificar fap yeah)
 */


var sel = null;

function select(obj) {
    
    if (sel!=null) sel.className = '';
    obj.setAttribute('class','active');
    sel=obj;    
    
}

function parser(){
    var parser = document.createElement('a');
    parser.href = document.url;
    return parser.iu;
    }

/*
 * FUNCION QUE MANEJA LA FECHA DEL NAVBAR
 */
function fecha(){
    var a = document.getElementById("fechamain");
    var f = new Date();
    var fecha = f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear();
    a.innerHTML= a.innerHTML + fecha;
}