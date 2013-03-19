<div id="container">
    <div class="navbar navbar-static-top">
        <div class="navbar-inner">
            <a class="brand" href="#">Panaderia</a>

            <ul class="nav">
                <li onclick="select(this)"><a href="mainusr.php"><i style="margin-right: 3px;" class="icon-home"></i>Inicio</a></li>
            </ul>
            <ul class="nav pull-right">
                <li><a href="#"><i style="margin-right: 3px;" class="icon-user"></i><?php
if (isset($_SESSION['admin'])) {
    echo "Administrador";
}

if (isset($_SESSION['usr'])) {
    echo "Empleado";
}
?></a></li>
                <li><a href="#" id="fechamain"><i style="margin-right: 3px;" class="icon-calendar"></i></a></li>
                <li><a href="login/logout.php"><i style="margin-right: 3px;" class="icon-off"></i>Cerrar Sesion</a></li>

            </ul>
        </div>
    </div>
</div>