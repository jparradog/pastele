<?php
$iuflag = false;

if (isset($_GET['dir'])) {
    $vistas_dir = $_GET['mdir'] . '/' . $_GET['dir'] . '/'; //Guardo el directorio donde estan las vistas
    $vista = $_GET['iu']; //Obtengo por GET la variable CLICKEADA en SIDEBAR_MAIN.php, es decir, el formulario que buscamos
} else {

    if (isset($_GET['mdir'])) {  //SI ESTA MDIR Y NO DIR, SOLO GUARDO MDIR COMO DIRECTORIO
        $vistas_dir = $_GET['mdir'] . '/';
        $vista = $_GET['iu'];
    } else {
       $iuflag=true; 
    }
}
?>
