<div class="well"  style=" margin-top: 15px; max-width: 340px; padding: 8px 0;">
    <ul class="nav nav-list">
        <li class="nav-header">Clientes</li>
        <li onclick="select(this)" name="a" id="cliente"><a href="main.php?iu=cliente.php&mdir=vistas&dir=cliente"><i style="margin-right: 3px;" class="icon-plus"></i>Nuevo</a></li>
        <li onclick="select(this)" name="a" id="modcliente"><a href="main.php?iu=modtablacliente.php&dir=cliente&mdir=negocios"><i style="margin-right: 3px;" class="icon-edit"></i>Modificar</a></li>
        <li onclick="select(this)" name="a" id="listaprecio"><a href="main.php?iu=listaprecios.php&mdir=vistas&dir=cliente"><i style="margin-right: 3px;" class="icon-list"></i>Lista de Precios</a></li>
        <li class="nav-header">Proveedores</li>
        <li onclick="select(this)" name="a" id="prov_nuevo"><a href="main.php?iu=proveedor.php&mdir=vistas&dir=proveedor"><i style="margin-right: 3px;" class="icon-plus"></i>Nuevo</a></li>
        <li onclick="select(this)" name="a" id="prov_modificar"><a href="main.php?iu=modtablaproveedor.php&dir=proveedor&mdir=negocios"><i style="margin-right: 3px;" class="icon-edit"></i>Modificar</a></li>
        <li class="nav-header">Productos</li>
        <li onclick="select(this)" name="a" id="prod_nuevo"><a href="main.php?iu=producto.php&mdir=vistas&dir=producto"><i style="margin-right: 3px;" class="icon-plus"></i>Nuevo</a></li>
        <li onclick="select(this)" name="a" id="prod_modificar"><a href="main.php?iu=modtablaproducto.php&dir=producto&mdir=negocios"><i style="margin-right: 3px;" class="icon-edit"></i>Modificar</a></li>
        <li class="nav-header">Impuestos</li>
        <li onclick="select(this)" name="a" id="prod_imp"><a href="main.php?iu=impuesto.php&dir=impuesto&mdir=vistas"><i style="margin-right: 3px;" class="icon-plus"></i>Nuevo</a></li>
        <li onclick="select(this)" name="a" id="prod_modif_imp"><a href="main.php?iu=modtablaimpuesto.php&dir=impuestos&mdir=negocios"><i style="margin-right: 3px;" class="icon-edit"></i>Modificar</a></li>
        <li class="nav-header">Albaran</li>
        <li onclick="select(this)" name="a" id="alb_emitir"><a href="main.php?iu=vista_albhead.php&mdir=albaran"><i class="icon-inbox"></i>Emitir Albaran</a></li>
        <li onclick="select(this)" name="a" id="alb_ver"><a href="main.php?iu=modtablaalbaran.php&dir=albaran&mdir=negocios"><i class="icon-search"></i>Ver Albaran</a></li>
        <li class="nav-header">Factura</li>
        <li onclick="select(this)" name="a" id="fac_nueva"><a href="main.php?iu=vista_facthead.php&mdir=factura"><i class="icon-file"></i>Nueva Factura</a></li>
        <li onclick="select(this)" name="a" id="fac_ver"><a href="main.php?iu=modtablafactura.php&dir=factura&mdir=negocios"><i class="icon-search"></i>Ver Factura</a></li>
        <li onclick="select(this)" name="a" id="fac_nueva"><a href="main.php?iu=vista_simplehead.php&mdir=facturasimple"><i class="icon-file"></i>Nueva Factura Simple</a></li>
        <li onclick="select(this)" name="a" id="fac_ver"><a href="main.php?iu=modtablafacturasimple.php&dir=facturasimple&mdir=negocios"><i class="icon-search"></i>Ver Factura Simple</a></li>

        <li class="nav-header">Reportes</li>
        <li onclick="select(this)" name="a" id="rep_ver"><a href="main.php?iu=tiporeporte.php&mdir=reportes"><i class="icon-search"></i>Ver</a></li>
        <li class="nav-header">Gastos Varios</li>
        <li onclick="select(this)" name="a" id="gastos_nuevo"><a href="main.php?iu=gastos.php&mdir=vistas&dir=gastos"><i style="margin-right: 3px;" class="icon-plus"></i>Nuevo</a></li>
        <li onclick="select(this)" name="a" id="gastos_modificar"><a href="main.php?iu=modtablagastos.php&dir=gastosvarios&mdir=negocios"><i style="margin-right: 3px;" class="icon-edit"></i>Modificar</a></li>              
        <li class="nav-header">Compra a Proveedores</li>
        <li onclick="select(this)" name="a" id="compra_proveedores"><a href="main.php?iu=compras.php&mdir=vistas&dir=compras"><i style="margin-right: 3px;" class="icon-plus"></i>Nuevo</a></li>
        <li onclick="select(this)" name="a" id="gastos_modificar"><a href="main.php?iu=modtablacompras.php&dir=compras&mdir=negocios"><i style="margin-right: 3px;" class="icon-edit"></i>Modificar</a></li>              


    </ul>
</div>
<!--

En cada boton del menu, paso por GET/POST el 'ui' que es el formulario y 'dir' 
que es la carpeta en donde esta esa vista.

-->