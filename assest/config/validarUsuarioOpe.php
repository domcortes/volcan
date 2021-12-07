<?php 
    session_start();
    $NOMBREUSUARIOS = "";
    $IDUSUARIOS="";
    $TUSUARIO = "";
    $EMPRESAS = "";
    $PLANTAS = "";
    $TEMPORADAS = "";
    $NOMBRESUSUARIOSLOGIN="";

    $ARRAYEMPRESAS = "";
    $ARRAYPLANTAS = "";
    $ARRAYTEMPORADAS = "";
    $ARRAYTUSUARIO = "";
    $ARRAYNOMBRESUSUARIOSLOGIN="";
    
    $EMPRESACAMBIAR="";
    $PLANTACAMBIAR="";
    $ARRAYEMPRESACAMBIAR="";
    $ARRAYPLANTACAMBIAR="";
    $DISABLEDMENU="";

    
    include_once '../../assest/controlador/USUARIO_ADO.php';
    include_once '../../assest/controlador/TUSUARIO_ADO.php';
    include_once '../../assest/controlador/EMPRESA_ADO.php';
    include_once '../../assest/controlador/PLANTA_ADO.php';
    include_once '../../assest/controlador/TEMPORADA_ADO.php';


    $USUARIO_ADO = new USUARIO_ADO();
    $TUSUARIO_ADO = new TUSUARIO_ADO();
    $EMPRESA_ADO =  new EMPRESA_ADO();
    $PLANTA_ADO =  new PLANTA_ADO();
    $TEMPORADA_ADO =  new TEMPORADA_ADO();



    if (isset($_REQUEST['CERRARS'])) {
        session_destroy();
        header('Location: iniciarSession.php');
    }    
    if (isset($_SESSION["NOMBRE_USUARIO"])) {
        $IDUSUARIOS = $_SESSION["ID_USUARIO"];
        $NOMBREUSUARIOS = $_SESSION["NOMBRE_USUARIO"];
        $TUSUARIO = $_SESSION["TIPO_USUARIO"];                 
        if (isset($_SESSION["ID_TEMPORADA"])) {
            $TEMPORADAS  = $_SESSION["ID_TEMPORADA"];   
        }       

    } else {
        session_destroy();
        header('Location: iniciarSession.php');
    }

