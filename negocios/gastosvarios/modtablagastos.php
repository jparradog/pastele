<?php
/*
 * (bars) sidebar_main.php -> (negocios/gastosvarios) modtablagastos.php -> (vistas/gastos) modgastos.php
 * 
 * Incluye la tabla de gastos con todos los campos de gastos
 * Agrega una columna con un boton que permite elegir una fila y 
 * editar ese gasto. Al hacer esto, se pasan los datos por GET que
 * estan en la fila elegida al script de la vista modgastos.php.
 */

define("RUTA_ABS", dirname(__FILE__));
include_once (RUTA_ABS . "/controlador/conexion.php");

$conexion = conectar_bd();

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//

if (isset($_GET['fechai']) && isset($_GET['fechaf'])) {
    
    $fechainicio = '"'.$_GET['fechai'].'"';
    
    $fechafin = '"'.$_GET['fechaf'].'"';
    
    $sql_buscar = "SELECT * FROM gastos_varios WHERE fecha BETWEEN $fechainicio AND $fechafin";
    
    $result_buscar = mysql_query($sql_buscar);
    
    if (!$result_buscar) {
        echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) " .
        "en la BD: " . mysql_error();
        //Finalizo la aplicación
        exit;
    } ?>
    
    <legend style="margin-left:15px;">Modificar Gastos</legend>
    <div class="input-prepend">
        <h5 style="margin-left: 15px ;">Filtrar por Fecha</h5>
        <span style="margin-left: 15px ;" class="add-on">Fecha Inicio</span><input id="fechai" type="date">    
        <span style="margin-left: 15px ;" class="add-on">Fecha Fin</span><input id="fechaf" type="date">
        <button style="margin-left: 15px ;" class="btn btn-warning" onclick="window.open('main.php?iu=modtablagastos.php&mdir=negocios&dir=gastosvarios&fechai='+fechai.value+'&fechaf='+fechaf.value+'','_self');">Buscar</button>       
    </div>
    <table style="margin: 15px 0px 0px 15px; width: 98%;" class="table table-bordered">
        <tr>
            <th style="font-weight: bold;">
                Codigo
            </th>
            <th style="font-weight: bold;">
                Nombre
            </th>
            <th style="font-weight: bold;">
                Valor
            </th>
            <th style="font-weight: bold;">
                IVA
            </th>
            <th style="font-weight: bold;">
                Fecha
            </th>
            <th style="font-weight: bold;">
                Editar
            </th>
        </tr>
        <tbody style="background-color: #ffffff;">    
            <?php while ($fila = mysql_fetch_assoc($result_buscar)) { ?>
                <tr>
                    <td>
                        <?php echo $fila['idgastos']; ?>
                    </td>
                    <td>
                        <?php echo $fila['descripcion']; ?>
                    </td>
                    <td>
                        <?php echo $fila['precio']; ?>
                    </td>
                    <td>
                        <?php echo $fila['iva']; ?>
                    </td>
                    <td>
                        <?php echo $fila['fecha']; ?>
                    </td>
                    <td>
                        <a class="btn" href=<?php echo "main.php?iu=modgastos.php&mdir=vistas&dir=gastos&idgastos=" . $fila['idgastos'] . "&descripcion=" . $fila['descripcion'] . "" . "&precio=" . $fila['precio'] . "" . "&fecha=" . $fila['fecha'] . "" . "&iva=" . $fila['iva'] . ""; ?>><i class="icon-pencil"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    </br>
    <a class="btn" href=<?php echo "main.php?iu=modtablagastos.php&mdir=negocios&dir=gastosvarios&limit=" . $limit; ?>>Mostrar más Filas</a>

<?php

//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//
    
} else {
    
//----------------------------------------------------------------------------//
//----------------------------------------------------------------------------//
    $limit = 10;

    if (isset($_GET['limit'])) {
        $limit = $_GET['limit'] + 10;
        $query = "SELECT * FROM gastos_varios ORDER BY idgastos DESC LIMIT $limit";
    } else {
        $query = "SELECT * FROM gastos_varios ORDER BY idgastos DESC LIMIT $limit";
    }

    $result = mysql_query($query);

    if (!$result) {
        echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) " .
        "en la BD: " . mysql_error();
        //Finalizo la aplicación
        exit;
    }
    ?>
    <legend style="margin-left:15px;">Modificar Gastos</legend>
    <div class="input-prepend">
        <label style="margin-left: 15px ;" >Filtrar por Fecha</label>
        <span style="margin-left: 15px ;" class="add-on">Fecha Inicio</span><input id="fechai" type="date">    
        <span style="margin-left: 15px ;" class="add-on">Fecha Fin</span><input id="fechaf" type="date">
        <button style="margin-left: 15px ;" class="btn btn-warning" onclick="window.open('main.php?iu=modtablagastos.php&mdir=negocios&dir=gastosvarios&fechai='+fechai.value+'&fechaf='+fechaf.value+'','_self');">Buscar</button>       
    </div>

    <?php
    if (isset($_GET['msg'])){
    if ($_GET['msg'] == 'gastook') {
        echo '<div class="alert alert-success">El gasto se guardó correctamente en la Base de datos</div>';
    }}
    ?>
    <table style="margin: 15px 0px 0px 15px; width: 98%;" class="table table-bordered">
        <tr>
            <th style="font-weight: bold;">
                Codigo
            </th>
            <th style="font-weight: bold;">
                Nombre
            </th>
            <th style="font-weight: bold;">
                Valor
            </th>
            <th style="font-weight: bold;">
                IVA
            </th>
            <th style="font-weight: bold;">
                Fecha
            </th>
            <th style="font-weight: bold;">
                Editar
            </th>
        </tr>
        <tbody style="background-color: #ffffff;">    
            <?php while ($fila = mysql_fetch_assoc($result)) { ?>
                <tr>
                    <td>
                        <?php echo $fila['idgastos']; ?>
                    </td>
                    <td>
                        <?php echo $fila['descripcion']; ?>
                    </td>
                    <td>
                        <?php echo $fila['precio']; ?>
                    </td>
                    <td>
                        <?php echo $fila['iva']; ?>
                    </td>
                    <td>
                        <?php echo $fila['fecha']; ?>
                    </td>
                    <td>
                        <a class="btn" href=<?php echo "main.php?iu=modgastos.php&mdir=vistas&dir=gastos&idgastos=" . $fila['idgastos'] . "&descripcion=" . $fila['descripcion'] . "" . "&precio=" . $fila['precio'] . "" . "&fecha=" . $fila['fecha'] . "" . "&iva=" . $fila['iva'] . ""; ?>><i class="icon-pencil"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    </br>
    
    <a class="btn" href=<?php echo "main.php?iu=modtablagastos.php&mdir=negocios&dir=gastosvarios&limit=" . $limit; ?>>Mostrar más Filas</a>

<?php } //FIN IF BUSCADOR?>

