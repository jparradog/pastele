<?php
//Inicio la session
session_start();
//La destruyo
session_destroy();
//Redirecciono hacia la pagina de login.php
header("Location: login.php?errorusuario=no");
?>
