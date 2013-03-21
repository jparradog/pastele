<?php
define("RUTA_ABS", dirname(__FILE__));
include_once ("/conexion.php");
$pass1 ='"' . trim($_POST["passinput1"]) . '"';
$pass2 ='"' . trim($_POST["passinput2"]) . '"';


$conexion = conectar_bd();

if($pass1 == $pass2){
    $sql_update_pass = "UPDATE admin SET clave = $pass1 WHERE idadmin = 1";
    mysql_query($sql_update_pass);
    $msg = "La contraseña del Administrador ha cambiado.";
    $style = "success";
}else{
    $msg = "Las contraseñas no coinciden. <a href='main.php?iu=confnumfactura.php&mdir=controlador'>Volver</a>";
    $style = "error";
    
    
}


?>

<div class="alert alert-<?php echo $style ?>" style="margin-right:15px;">
    
    <strong>¡Atención!</strong> <?php echo $msg; ?>
    
</div>
