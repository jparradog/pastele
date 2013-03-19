<div class="well"  style=" margin-top: 15px; max-width: 340px; padding: 8px 0;">
                        <ul class="nav nav-list">
                          <li class="nav-header">Albaran</li>
        <li onclick="select(this)" name="a" id="alb_emitir"><a href="mainusr.php?iu=vista_albhead.php&mdir=albaran"><i class="icon-inbox"></i>Emitir Albaran</a></li>
        <li onclick="select(this)" name="a" id="alb_ver"><a href="mainusr.php?iu=modtablaalbaran.php&dir=albaran&mdir=negocios"><i class="icon-search"></i>Ver Albaran</a></li>
        <li class="nav-header">Factura</li>
        <li onclick="select(this)" name="a" id="fac_nueva"><a href="mainusr.php?iu=vista_facthead.php&mdir=factura"><i class="icon-file"></i>Nueva Factura</a></li>
        <li onclick="select(this)" name="a" id="fac_ver"><a href="mainusr.php?iu=modtablafactura.php&dir=factura&mdir=negocios"><i class="icon-search"></i>Ver Factura</a></li>
        <li onclick="select(this)" name="a" id="fac_nueva"><a href="mainusr.php?iu=vista_simplehead.php&mdir=facturasimple"><i class="icon-file"></i>Nueva Factura Simple</a></li>
        <li onclick="select(this)" name="a" id="fac_ver"><a href="mainusr.php?iu=modtablafacturasimple.php&dir=facturasimple&mdir=negocios"><i class="icon-search"></i>Ver Factura Simple</a></li>
                           
                            
                        </ul>
</div>
<!--

En cada boton del menu, paso por GET/POST el 'ui' que es el formulario y 'dir' 
que es la carpeta en donde esta esa vista.

-->