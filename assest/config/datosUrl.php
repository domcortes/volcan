<?php 
if (isset($_REQUEST['VERURL'])) {    
    $_SESSION["parametro"] = $_REQUEST['ID'];   
    $_SESSION["parametro1"] = "ver";
    echo "<script type='text/javascript'> location.href ='". $_REQUEST['URL'].".php?op';</script>";
}
if (isset($_REQUEST['EDITARURL'])) {
    $_SESSION["parametro"] = $_REQUEST['ID'];
    $_SESSION["parametro1"] = "editar";    
    echo "<script type='text/javascript'> location.href ='". $_REQUEST['URL'].".php?op';</script>";
}
if (isset($_REQUEST['ELIMINARURL'])) {
    $_SESSION["parametro"] = $_REQUEST['ID'];
    $_SESSION["parametro1"] = "0";    
    echo "<script type='text/javascript'> location.href ='". $_REQUEST['URL'].".php?op';</script>";
}
if (isset($_REQUEST['HABILITARURL'])) {
    $_SESSION["parametro"] = $_REQUEST['ID'];
    $_SESSION["parametro1"] = "1";    
    echo "<script type='text/javascript'> location.href ='". $_REQUEST['URL'].".php?op';</script>";
}




?>