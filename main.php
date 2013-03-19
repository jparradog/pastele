<?php
define("RUTA_ABS", dirname(__FILE__));
include_once (RUTA_ABS . "/controlador/redirect.php");
include_once (RUTA_ABS . "/controlador/controladorvista.php");

ini_set("error_reporting",  E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Panaderia</title>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="js/toggle_nav.js"></script>
        <link href="css/factura.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="js/factura.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <link rel="shortcut icon" href="img/bakery_icon.png">
        <script type="text/javascript" src="js/albaran.js"></script>
        <script type="text/javascript" src="js/facturasimple.js"></script>
        

    </head>
    <body onload="fecha()"> 

        <?php include (RUTA_ABS . "/bars/navbar.php"); ?>
        <div  style="font:13px;" class="container-fluid">

            <div  class="row-fluid">
                <div class="span2">
                    <!--Sidebar content-->

                    <?php
                    include (RUTA_ABS . "/bars/sidebar_main.php");
                    ?>
                </div>
                <div class="span10">
                    <!--Body content-->
                    <div  style="margin-top: 15px; width: auto;  padding: 8px 0;">
                        <?php
                        if ($iuflag == false) {
                            include ($vistas_dir . $vista);
                        } else {
                            ?>
                        
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
