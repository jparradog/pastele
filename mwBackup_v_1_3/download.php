<?php
//Pagina donde esta el codigo para forzar la descarga php
//http://www.ngeeks.com/2010/04/01/forzar-descargas-de-archivos-con-php/

$file = $_GET['file'];
header("Content-disposition: attachment; filename=$file.sql");
header("Content-type: application/octet-stream");
readfile($file);

?>
