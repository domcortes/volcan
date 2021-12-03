<?php 

$URLEXCEL="";
if (isset($_REQUEST['EXPORTAR'])) {    
    $URLEXCEL=$_REQUEST['URLEXCEL'];  
    include_once "../reporte/".$URLEXCEL.".php";
}

?>