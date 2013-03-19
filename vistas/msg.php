<?php

/*
 * El script se encarga de recibir una variable por GET. En base a esa variable
 * es el mensaje que se muestra por pantalla.
 * Es llamado desde los archivos de alta y modificacion en la parte de Negocios
 */
if ($_GET['msg'] == 'cli') {
    echo '<div class="alert alert-success">El cliente se guardó correctamente en la Base de datos</div>';
}

if ($_GET['msg'] == 'prov') {
    echo '<div class="alert alert-success">El proveedor se guardó correctamente en la Base de datos</div>';
}

if ($_GET['msg'] == 'gasto') {
    echo '<div class="alert alert-success">El gasto se guardó correctamente en la Base de datos</div>';
}

if ($_GET['msg'] == 'prod') {
    echo '<div class="alert alert-success">El producto se guardó correctamente en la Base de datos</div>';
}
if ($_GET['msg'] == 'impuesto') {
    echo '<div class="alert alert-success">El impuesto se guardó correctamente en la Base de datos</div>';
}

if ($_GET['msg'] == 'listaprecio') {
    echo '<div class="alert alert-success">La lista de precios se guardó correctamente en la Base de datos</div>';
}
?>
