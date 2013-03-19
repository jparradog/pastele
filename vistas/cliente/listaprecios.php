<div class="well">
<?php
// vistas/cliente/listaprecios.php -> Negocios/Cliente/adminlistaprecio.php
include_once (RUTA_ABS."/controlador/conexion.php");
//Conecto con la base de datos
$conexion = conectar_bd();
//Selecciono los campos de la tabla cliente
$sql = "SELECT idcliente,nombre,apellido,2apellido FROM cliente ORDER BY nombre";
//Ejecuto la consulta
$result = mysql_query($sql);

//---------------------------------------------------------------------------//
//---------------------------------------------------------------------------//

?>
<legend style="margin-left:15px;">Lista de Precios</legend>
 <?php
  if($_GET['msg'] == 'preciook'){
      echo '<div class="alert alert-success">La lista de precios se guardó correctamente en la Base de datos</div>';
  }
  ?>
<table style="margin: 15px 0px 0px 15px; width: 98%;" class="table table-bordered">
    <tr>
        <th style="font-weight: bold;">
            Nombre            
        </th>
        <th style="font-weight: bold;">
            1º Apellido
        </th>
        <th style="font-weight: bold;">
            2º Apellido
        </th>
        <th style="font-weight: bold;">
            Editar
        </th>
    </tr>
    <tbody style="background-color: #ffffff;">    
        <?php
        while ($fila = mysql_fetch_assoc($result)) {
            ?>
            <tr>
                <td>
                    <?php echo $fila['nombre']; ?>
                </td>
                <td>
                    <?php echo $fila['apellido']; ?>
                </td>
                <td>
                    <?php echo $fila['2apellido']; ?>
                </td>
                <td>
                    <a class="btn" href= <?php echo "main.php?iu=adminlistaprecios.php&mdir=negocios&dir=cliente&idcliente=".$fila['idcliente']."&nombre=".$fila['nombre'].""."&apellido=".$fila['apellido'].""."&2apellido=".$fila['2apellido'].""; ?> ><i class="icon-pencil"></i></a>
                </td> 
            </tr>   
            <?php
        }
        ?>                
    </tbody>
</table>
</div>