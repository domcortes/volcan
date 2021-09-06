<?php 
if (isset($_REQUEST['VERURL'])) {    
    $_SESSION["parametro"] = $_REQUEST['ID'];   
    $_SESSION["parametro1"] = "ver";
    $_SESSION["urlO"] = $_REQUEST['URLO'];
    echo "<script type='text/javascript'> location.href ='". $_REQUEST['URL'].".php?op';</script>";
}
if (isset($_REQUEST['EDITARURL'])) {
    $_SESSION["parametro"] = $_REQUEST['ID'];
    $_SESSION["parametro1"] = "editar";    
    $_SESSION["urlO"] = $_REQUEST['URLO'];
    echo "<script type='text/javascript'> location.href ='". $_REQUEST['URL'].".php?op';</script>";
}
if (isset($_REQUEST['ELIMINARURL'])) {
    $_SESSION["parametro"] = $_REQUEST['ID'];
    $_SESSION["parametro1"] = "0";    
    $_SESSION["urlO"] = $_REQUEST['URLO'];
    echo "<script type='text/javascript'> location.href ='". $_REQUEST['URL'].".php?op';</script>";
}
if (isset($_REQUEST['HABILITARURL'])) {
    $_SESSION["parametro"] = $_REQUEST['ID'];
    $_SESSION["parametro1"] = "1";    
    $_SESSION["urlO"] = $_REQUEST['URLO'];
    echo "<script type='text/javascript'> location.href ='". $_REQUEST['URL'].".php?op';</script>";
}

if (isset($_REQUEST['APROBARURL'])) { 
    $OCOMPRA->__SET('ID_OCOMPRA', $_REQUEST['ID']);
    $OCOMPRA->__SET('ID_USUARIOM', $IDUSUARIOS);
    $OCOMPRA_ADO->aprobado($OCOMPRA);
    $_SESSION["urlO"] = $_REQUEST['URLO'];
    echo "<script type='text/javascript'> location.href ='". $_REQUEST['URLA'].".php?op';</script>";
}

if (isset($_REQUEST['RECHAZARURL'])) {
    $_SESSION["parametro"] = $_REQUEST['ID'];
    $_SESSION["parametro1"] = "";    
    $_SESSION["urlO"] = $_REQUEST['URLO'];
    echo "<script type='text/javascript'> location.href ='". $_REQUEST['URLM'].".php?op';</script>";
}
if (isset($_REQUEST['VERMOTIVOSRURL'])) {
    $_SESSION["parametro"] = $_REQUEST['ID'];
    $_SESSION["parametro1"] = ""; 
    $_SESSION["urlO"] = $_REQUEST['URLO'];   
    echo "<script type='text/javascript'> location.href ='". $_REQUEST['URLMV'].".php?op';</script>";
}



?>