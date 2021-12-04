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

    
    include_once '../controlador/USUARIO_ADO.php';
    include_once '../controlador/TUSUARIO_ADO.php';
    include_once '../controlador/EMPRESA_ADO.php';
    include_once '../controlador/PLANTA_ADO.php';
    include_once '../controlador/TEMPORADA_ADO.php';


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

        if (isset($_SESSION["ID_EMPRESA"])) {
            $EMPRESAS = $_SESSION["ID_EMPRESA"];
        }else if (isset($_SESSION["ID_PLANTA"])) {
            $PLANTAS = $_SESSION["ID_PLANTA"];
        }else if (isset($_SESSION["ID_TEMPORADA"])) {
            $TEMPORADAS  = $_SESSION["ID_TEMPORADA"];   
        } else{            
            echo "<script type='text/javascript'> location.href ='iniciarSessionSeleccion.php';</script>";
        }

    } else {
        session_destroy();
        header('Location: iniciarSession.php');
    }
    if (isset($_REQUEST['CAMBIARE'])) {
        $_SESSION["ID_EMPRESA"] = $_REQUEST['EMPRESACAMBIAR'];
        echo "<script type='text/javascript'> 
                var url= window.location;
                location.href = url ;
              </script>"
        ;   
    }    
    if (isset($_REQUEST['CAMBIARP'])) {
        $_SESSION["ID_PLANTA"] = $_REQUEST['PLANTACAMBIAR'];
        echo "<script type='text/javascript'> 
                var url= window.location;
                location.href = url ;
              </script>"
        ;   
    }
