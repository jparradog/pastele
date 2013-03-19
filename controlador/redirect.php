<?php

//inicio la session
session_start();
/*
 * Este script se encarga de verificar si el usuario esta logueado
 * De no ser asi redirecciona automaticamente a la pagina de login
 */

//Si la session admin no esta creada
if (!isset($_SESSION["admin"]) && !isset($_SESSION["usr"])) {
    //redirecciono al loguin para comenzar
    header("Location:login/login.php?errorusuario=no");
    //Cierro este script
    exit();
}

function validarSesion() {
    $session = NULL;
    
    if (isset($_SESSION['admin'])) {
        $session = "main.php";
    } else {
        $session = "mainusr.php";
    }
    
    return $session;
}

?>