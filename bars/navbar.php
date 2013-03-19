<?php

?>
<div id="container">
    <div class="navbar navbar-static-top">
        <div class="navbar-inner">
            <a class="brand" href="#">Panaderia</a>

            <ul class="nav">
                <li id="inicio" onclick="select(this)"><a href="main.php"><i style="margin-right: 3px;" class="icon-home"></i>Inicio</a></li>
                <li id="conf" onclick="select(this)"><a href="main.php?iu=config_view.php&mdir=vistas"><i style="margin-right: 3px;" class="icon-cog"></i>Configuración</a></li>
            </ul>
            <ul class="nav pull-right">
                <li><a href="#"><i style="margin-right: 3px;" class="icon-user"></i><?php

if(isset ($_SESSION['admin'])) {
    echo "Administrador";
}

if(isset ($_SESSION['usr'])){
    echo "Empleado";
}
?></a></li>
                <li><a href="#" id="fechamain"><i style="margin-right: 3px;" class="icon-calendar"></i></a></li>
                <li><a href="login/logout.php"><i style="margin-right: 3px;" class="icon-off"></i>Cerrar Sesion</a></li>

            </ul>
        </div>
    </div>
</div>