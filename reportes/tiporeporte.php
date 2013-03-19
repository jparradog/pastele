<div class="well">
<legend>Reportes</legend>
<div class="well"  style="margin-top: 15px; max-width: 340px; padding: 8px 0; margin-left: 15px;">
    <ul class="nav nav-list">        
        <li class="nav-header">Proveedores</li>
        <li onclick="select(this)" name="a" id="listaprecio"><a href="main.php?iu=proveedorxreporte.php&mdir=reportes&dir=proveedor"><i style="margin-right: 3px;" class="icon-edit"></i>Total de Compras a Proveedores por Trimestre</a></li>
        <li class="nav-header">Gastos Varios</li>
        <li onclick="select(this)" name="a" id="listaprecio"><a href="main.php?iu=gastosporfecha.php&mdir=reportes&dir=gastosvarios"><i style="margin-right: 3px;" class="icon-edit"></i>Gastos Varios</a></li>
        <li class="nav-header">Albaran</li>
        <li onclick="select(this)" name="a" id="listaprecio"><a href="main.php?iu=albaranporfecha.php&mdir=reportes&dir=albaran&tipo=total"><i style="margin-right: 3px;" class="icon-edit"></i>Total de Venta de Albaranes</a></li>
        <li onclick="select(this)" name="a" id="listaprecio"><a href="main.php?iu=albaranporfecha.php&mdir=reportes&dir=albaran&tipo=cliente"><i style="margin-right: 3px;" class="icon-edit"></i>Total de Venta de Albaranes por Cliente</a></li>
        <li class="nav-header">Factura</li>
        <li onclick="select(this)" name="a" id="listaprecio"><a href="main.php?iu=facturaporfecha.php&mdir=reportes&dir=facturas&tipo=total"><i style="margin-right: 3px;" class="icon-edit"></i>Total de Venta de Facturas</a></li>
        <li onclick="select(this)" name="a" id="listaprecio"><a href="main.php?iu=facturaporfecha.php&mdir=reportes&dir=facturas&tipo=cliente"><i style="margin-right: 3px;" class="icon-edit"></i>Total de Venta de Facturas por Cliente</a></li>
        <li onclick="select(this)" name="a" id="listaprecio"><a href="main.php?iu=facturaporfecha.php&mdir=reportes&dir=facturas&tipo=simple"><i style="margin-right: 3px;" class="icon-edit"></i>Total de Venta de Facturas Simples por Cliente</a></li>
    </ul>
</div>
</div>
<!--

En cada boton del menu, paso por GET/POST el 'ui' que es el formulario y 'dir' 
que es la carpeta en donde esta esa vista.

-->
