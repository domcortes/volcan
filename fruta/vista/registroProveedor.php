<?php


include_once "../config/validarUsuario.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/PROVEEDOR_ADO.php';
include_once '../controlador/CIUDAD_ADO.php';


include_once '../modelo/PROVEEDOR.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$PROVEEDOR_ADO =  new PROVEEDOR_ADO();
$CIUDAD_ADO =  new CIUDAD_ADO();

//INIICIALIZAR NOMBRE_PROVEEDOR

$PROVEEDOR =  new PROVEEDOR();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$RUTPROVEEDOR = "";
$DVPROVEEDOR = "";
$RAZONPROVEEDOR = "";
$NOMBREPROVEEDOR = "";
$GIROPROVEEDOR = "";
$DIRECCIONPROVEEDOR = "";
$TELEFONOPROVEEDOR = "";
$EMAILPROVEEDOR = "";
$CIUDAD = "";
$EMPRESA = "";


$NUMERO = "";
$FOCUS = "";
$BORDER = "";
$DISABLED = "";
$OP = "";

//INICIALIZAR ARREGLOS
$ARRAYPROVEEDORID = "";
$ARRAYPROVEEDORS = "";
$ARRAYEMPRESA = "";
$ARRAYCIUDAD = "";
$ARRAYTUMEDIDA = "";
$ARRAYNUMERO = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYPROVEEDORS = $PROVEEDOR_ADO->listarProveedorPorEmpresaCBX($EMPRESAS);
$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
$ARRAYCIUDAD = $CIUDAD_ADO->listarCiudadCBX();
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrl.php";
include_once "../config/reporteUrl.php";


//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {


    $ARRAYNUMERO = $PROVEEDOR_ADO->obtenerNumero($_REQUEST['EMPRESA']);
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;

    //UTILIZACION METODOS SET DEL NOMBRE_PROVEEDOR
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $PROVEEDOR->__SET('NUMERO_PROVEEDOR', $NUMERO);
    $PROVEEDOR->__SET('RUT_PROVEEDOR', $_REQUEST['RUTPROVEEDOR']);
    $PROVEEDOR->__SET('DV_PROVEEDOR', $_REQUEST['DVPROVEEDOR']);
    $PROVEEDOR->__SET('RAZON_PROVEEDOR', $_REQUEST['RAZONPROVEEDOR']);
    $PROVEEDOR->__SET('NOMBRE_PROVEEDOR', $_REQUEST['NOMBREPROVEEDOR']);
    $PROVEEDOR->__SET('GIRO_PROVEEDOR', $_REQUEST['GIROPROVEEDOR']);
    $PROVEEDOR->__SET('DIRECCION_PROVEEDOR', $_REQUEST['DIRECCIONPROVEEDOR']);
    $PROVEEDOR->__SET('TELEFONO_PROVEEDOR', $_REQUEST['TELEFONOPROVEEDOR']);
    $PROVEEDOR->__SET('EMAIL_PROVEEDOR', $_REQUEST['EMAILPROVEEDOR']);
    $PROVEEDOR->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);    
    $PROVEEDOR->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);    
    $PROVEEDOR->__SET('ID_USUARIOI', $IDUSUARIOS);
    $PROVEEDOR->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $PROVEEDOR_ADO->agregarProveedor($PROVEEDOR);
    //REDIRECCIONAR A PAGINA registroEcomercial.php
    echo "<script type='text/javascript'> location.href ='registroProveedor.php';</script>";
}
//OPERACION DE EDICION DE FILA
if (isset($_REQUEST['EDITAR'])) {
    //UTILIZACION METODOS SET DEL NOMBRE_PROVEEDOR
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO 


    $PROVEEDOR->__SET('RUT_PROVEEDOR', $_REQUEST['RUTPROVEEDOR']);
    $PROVEEDOR->__SET('DV_PROVEEDOR', $_REQUEST['DVPROVEEDOR']);
    $PROVEEDOR->__SET('RAZON_PROVEEDOR', $_REQUEST['RAZONPROVEEDOR']);
    $PROVEEDOR->__SET('NOMBRE_PROVEEDOR', $_REQUEST['NOMBREPROVEEDOR']);
    $PROVEEDOR->__SET('GIRO_PROVEEDOR', $_REQUEST['GIROPROVEEDOR']);
    $PROVEEDOR->__SET('DIRECCION_PROVEEDOR', $_REQUEST['DIRECCIONPROVEEDOR']);
    $PROVEEDOR->__SET('TELEFONO_PROVEEDOR', $_REQUEST['TELEFONOPROVEEDOR']);
    $PROVEEDOR->__SET('EMAIL_PROVEEDOR', $_REQUEST['EMAILPROVEEDOR']);
    $PROVEEDOR->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $PROVEEDOR->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);    
    $PROVEEDOR->__SET('ID_USUARIOM', $IDUSUARIOS);
    $PROVEEDOR->__SET('ID_PROVEEDOR', $_REQUEST['ID']);
    //LLAMADA AL METODO DE EDICION DEL CONTROLADOR   
    $PROVEEDOR_ADO->actualizarProveedor($PROVEEDOR);
    //REDIRECCIONAR A PAGINA registroEcomercial.php
    echo "<script type='text/javascript'> location.href ='registroProveedor.php';</script>";
}


//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION Y VISUALIZACION
//PREGUNTA SI LA URL VIENE  CON DATOS "parametro" y "parametro1"
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['parametro'];
    $OP = $_SESSION['parametro1'];

    //IDENTIFICACIONES DE OPERACIONES
    //OPERACION DE CAMBIO DE ESTADO
    //0 = DESACTIVAR
    if ($OP == "0") {

        $PROVEEDOR->__SET('ID_PROVEEDOR', $IDOP);
        $PROVEEDOR_ADO->deshabilitar($PROVEEDOR);

        echo "<script type='text/javascript'> location.href ='registroProveedor.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $PROVEEDOR->__SET('ID_PROVEEDOR', $IDOP);
        $PROVEEDOR_ADO->habilitar($PROVEEDOR);

        echo "<script type='text/javascript'> location.href ='registroProveedor.php';</script>";
    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYPROVEEDORID = $PROVEEDOR_ADO->verProveedor($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA        
        foreach ($ARRAYPROVEEDORID as $r) :
            $RUTPROVEEDOR = "" . $r['RUT_PROVEEDOR'];
            $DVPROVEEDOR = "" . $r['DV_PROVEEDOR'];
            $RAZONPROVEEDOR = "" . $r['RAZON_PROVEEDOR'];
            $NOMBREPROVEEDOR = "" . $r['NOMBRE_PROVEEDOR'];
            $GIROPROVEEDOR = "" . $r['GIRO_PROVEEDOR'];
            $DIRECCIONPROVEEDOR = "" . $r['DIRECCION_PROVEEDOR'];
            $TELEFONOPROVEEDOR = "" . $r['TELEFONO_PROVEEDOR'];
            $EMAILPROVEEDOR = "" . $r['EMAIL_PROVEEDOR'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $CIUDAD = "" . $r['ID_CIUDAD'];
        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZAAR INFORMAICON DE REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYPROVEEDORID = $PROVEEDOR_ADO->verProveedor($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYPROVEEDORID as $r) :
            $RUTPROVEEDOR = "" . $r['RUT_PROVEEDOR'];
            $DVPROVEEDOR = "" . $r['DV_PROVEEDOR'];
            $RAZONPROVEEDOR = "" . $r['RAZON_PROVEEDOR'];
            $NOMBREPROVEEDOR = "" . $r['NOMBRE_PROVEEDOR'];
            $GIROPROVEEDOR = "" . $r['GIRO_PROVEEDOR'];
            $DIRECCIONPROVEEDOR = "" . $r['DIRECCION_PROVEEDOR'];
            $TELEFONOPROVEEDOR = "" . $r['TELEFONO_PROVEEDOR'];
            $EMAILPROVEEDOR = "" . $r['EMAIL_PROVEEDOR'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $CIUDAD = "" . $r['ID_CIUDAD'];
        endforeach;
    }
}


if (isset($_POST)) {
    //DATOS GENERALES   
    if (isset($_REQUEST['RUTPROVEEDOR'])) {
        $RUTPROVEEDOR = $_REQUEST['RUTPROVEEDOR'];
    } 
    if (isset($_REQUEST['DVPROVEEDOR'])) {
        $DVPROVEEDOR = $_REQUEST['DVPROVEEDOR'];
    } 
    if (isset($_REQUEST['RAZONPROVEEDOR'])) {
        $RAZONPROVEEDOR = $_REQUEST['RAZONPROVEEDOR'];
    } 
    if (isset($_REQUEST['GIROPRODUCTOR'])) {
        $GIROPRODUCTOR = $_REQUEST['GIROPRODUCTOR'];
    } 
    if (isset($_REQUEST['DIRECCIONPROVEEDOR'])) {
        $DIRECCIONPROVEEDOR = $_REQUEST['DIRECCIONPROVEEDOR'];
    } 
    if (isset($_REQUEST['TELEFONOPROVEEDOR'])) {
        $TELEFONOPROVEEDOR = $_REQUEST['TELEFONOPROVEEDOR'];
    } 
    if (isset($_REQUEST['EMAILPROVEEDOR'])) {
        $EMAILPROVEEDOR = $_REQUEST['EMAILPROVEEDOR'];
    } 
    if (isset($_REQUEST['CIUDAD'])) {
        $CIUDAD = $_REQUEST['CIUDAD'];
    } 

}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Proveedor</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                //VALIDACION DE FORMULARIO
                function validacion() {

                    RUTPROVEEDOR = document.getElementById("RUTPROVEEDOR").value;
                    DVPROVEEDOR = document.getElementById("DVPROVEEDOR").value;
                    RAZONPROVEEDOR = document.getElementById("RAZONPROVEEDOR").value;
                    NOMBREPROVEEDOR = document.getElementById("NOMBREPROVEEDOR").value;
                    GIROPROVEEDOR = document.getElementById("GIROPROVEEDOR").value;
                    DIRECCIONPROVEEDOR = document.getElementById("DIRECCIONPROVEEDOR").value;
                    TELEFONOPROVEEDOR = document.getElementById("TELEFONOPROVEEDOR").value;
                    EMAILPROVEEDOR = document.getElementById("EMAILPROVEEDOR").value;
                    CIUDAD = document.getElementById("CIUDAD").selectedIndex;


                    document.getElementById('val_rut').innerHTML = "";
                    document.getElementById('val_dv').innerHTML = "";
                    document.getElementById('val_razon').innerHTML = "";
                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_giro').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_email').innerHTML = "";
                    document.getElementById('val_ciudad').innerHTML = "";


                    if (RUTPROVEEDOR == null || RUTPROVEEDOR.length == 0 || /^\s+$/.test(RUTPROVEEDOR)) {
                        document.form_reg_dato.RUTPROVEEDOR.focus();
                        document.form_reg_dato.RUTPROVEEDOR.style.borderColor = "#FF0000";
                        document.getElementById('val_rut').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RUTPROVEEDOR.style.borderColor = "#4AF575";

                    if (DVPROVEEDOR == null || DVPROVEEDOR.length == 0 || /^\s+$/.test(DVPROVEEDOR)) {
                        document.form_reg_dato.DVPROVEEDOR.focus();
                        document.form_reg_dato.DVPROVEEDOR.style.borderColor = "#FF0000";
                        document.getElementById('val_dv').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DVPROVEEDOR.style.borderColor = "#4AF575";

                    if (RAZONPROVEEDOR == null || RAZONPROVEEDOR.length == 0 || /^\s+$/.test(RAZONPROVEEDOR)) {
                        document.form_reg_dato.RAZONPROVEEDOR.focus();
                        document.form_reg_dato.RAZONPROVEEDOR.style.borderColor = "#FF0000";
                        document.getElementById('val_razon').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RAZONPROVEEDOR.style.borderColor = "#4AF575";

                    if (NOMBREPROVEEDOR == null || NOMBREPROVEEDOR.length == 0 || /^\s+$/.test(NOMBREPROVEEDOR)) {
                        document.form_reg_dato.NOMBREPROVEEDOR.focus();
                        document.form_reg_dato.NOMBREPROVEEDOR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREPROVEEDOR.style.borderColor = "#4AF575";

                    if (GIROPROVEEDOR == null || GIROPROVEEDOR.length == 0 || /^\s+$/.test(GIROPROVEEDOR)) {
                        document.form_reg_dato.GIROPROVEEDOR.focus();
                        document.form_reg_dato.GIROPROVEEDOR.style.borderColor = "#FF0000";
                        document.getElementById('val_giro').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.GIROPROVEEDOR.style.borderColor = "#4AF575";

                    if (DIRECCIONPROVEEDOR == null || DIRECCIONPROVEEDOR.length == 0 || /^\s+$/.test(DIRECCIONPROVEEDOR)) {
                        document.form_reg_dato.DIRECCIONPROVEEDOR.focus();
                        document.form_reg_dato.DIRECCIONPROVEEDOR.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCIONPROVEEDOR.style.borderColor = "#4AF575";

                    if (TELEFONOPROVEEDOR == null || TELEFONOPROVEEDOR.length == 0 || /^\s+$/.test(TELEFONOPROVEEDOR)) {
                        document.form_reg_dato.TELEFONOPROVEEDOR.focus();
                        document.form_reg_dato.TELEFONOPROVEEDOR.style.borderColor = "#FF0000";
                        document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.TELEFONOPROVEEDOR.style.borderColor = "#4AF575";

                    if (EMAILPROVEEDOR == null || EMAILPROVEEDOR.length == 0 || /^\s+$/.test(EMAILPROVEEDOR)) {
                        document.form_reg_dato.EMAILPROVEEDOR.focus();
                        document.form_reg_dato.EMAILPROVEEDOR.style.borderColor = "#FF0000";
                        document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EMAILPROVEEDOR.style.borderColor = "#4AF575";

                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                            .test(EMAILPROVEEDOR))) {
                        document.form_reg_dato.EMAILPROVEEDOR.focus();
                        document.form_reg_dato.EMAILPROVEEDOR.style.borderColor = "#ff0000";
                        document.getElementById('val_email').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.EMAILPROVEEDOR.style.borderColor = "#4AF575";


                    if (CIUDAD == null || CIUDAD == 0) {
                        document.form_reg_dato.CIUDAD.focus();
                        document.form_reg_dato.CIUDAD.style.borderColor = "#FF0000";
                        document.getElementById('val_ciudad').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.CIUDAD.style.borderColor = "#4AF575";




                }




                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }

                //FUNCION PARA REALIZAR UNA ACTUALIZACION DEL FORMULARIO DE REGISTRO DE RECEPCIONE
                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }

                function abrirVentana(url) {
                    var opciones =
                    "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1600, height=1000'";
                    window.open(url, 'window', opciones);
                }
                //FUNCION PARA OBTENER HORA Y FECHA
                function mueveReloj() {


                    momentoActual = new Date();

                    dia = momentoActual.getDate();
                    mes = momentoActual.getMonth() + 1;
                    ano = momentoActual.getFullYear();

                    hora = momentoActual.getHours();
                    minuto = momentoActual.getMinutes();
                    segundo = momentoActual.getSeconds();

                    if (dia < 10) {
                        dia = "0" + dia;
                    }

                    if (mes < 10) {
                        mes = "0" + mes;
                    }
                    if (hora < 10) {
                        hora = "0" + hora;
                    }
                    if (minuto < 10) {
                        minuto = "0" + minuto;
                    }
                    if (segundo < 10) {
                        segundo = "0" + segundo;
                    }

                    horaImprimible = hora + " : " + minuto;
                    fechaImprimible = dia + "-" + mes + "-" + ano;


                    //     document.form_reg_dato.HORARECEPCION.value = horaImprimible;
                    document.fechahora.fechahora.value = fechaImprimible + " " + horaImprimible;
                    setTimeout("mueveReloj()", 1000);
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" onload="mueveReloj()">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../config/menu.php";
            ?>

            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title"> Proveedor</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Proveedor </li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroProveedor.php"> Operaciónes Proveedor </a>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <div class="right-title">
                                <div class="d-flex mt-10 justify-content-end">
                                    <div class="d-lg-flex mr-20 ml-10 d-none">
                                        <div class="chart-text mr-10">
                                            <!--
								<h6 class="mb-0"><small>THIS MONTH</small></h6>
                                <h4 class="mt-0 text-primary">$12,125</h4>-->
                                        </div>
                                    </div>
                                    <div class="d-lg-flex mr-20 ml-10 d-none">
                                        <div class="chart-text mr-10">
                                            <!--
								<h6 class="mb-0"><small>LAST YEAR</small></h6>
                                <h4 class="mt-0 text-danger">$22,754</h4>-->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <!--  
                                    <h4 class="box-title">Sample form 1</h4>
                                -->
                                    </div>
                                    <!-- /.box-header -->
                                      <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                                        <div class="box-body">
                                            <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Registro
                                            </h4>
                                            <hr class="my-15">
                                            <div class="row">
                                                 <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                                    <div class="form-group">
                                                        <label>Rut </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder=" Rut  Proveedor" id="RUTPROVEEDOR" name="RUTPROVEEDOR" value="<?php echo $RUTPROVEEDOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rut" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3 col-xs-3">
                                                    <div class="form-group">
                                                        <label>DV </label>
                                                        <input type="text" class="form-control" placeholder=" DV  Proveedor" id="DVPROVEEDOR" name="DVPROVEEDOR" value="<?php echo $DVPROVEEDOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_dv" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Razón Social </label>
                                                        <input type="text" class="form-control" placeholder=" Nombre  Proveedor" id="RAZONPROVEEDOR" name="RAZONPROVEEDOR" value="<?php echo $RAZONPROVEEDOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_razon" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder=" Nombre  Proveedor" id="NOMBREPROVEEDOR" name="NOMBREPROVEEDOR" value="<?php echo $NOMBREPROVEEDOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Giro</label>
                                                        <input type="text" class="form-control" placeholder=" Giro  Proveedor" id="GIROPROVEEDOR" name="GIROPROVEEDOR" value="<?php echo $GIROPROVEEDOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_giro" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Dirección </label>
                                                        <input type="text" class="form-control" placeholder=" Dirección  Proveedor" id="DIRECCIONPROVEEDOR" name="DIRECCIONPROVEEDOR" value="<?php echo $DIRECCIONPROVEEDOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_direccion" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Telefono</label>
                                                        <input type="number" class="form-control" placeholder=" Telefono  Proveedor" id="TELEFONOPROVEEDOR" name="TELEFONOPROVEEDOR" value="<?php echo $TELEFONOPROVEEDOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_telefono" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Email </label>
                                                        <input type="text" class="form-control" placeholder=" Email  Proveedor" id="EMAILPROVEEDOR" name="EMAILPROVEEDOR" value="<?php echo $EMAILPROVEEDOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-9 col-9 col-xs-9">
                                                    <div class="form-group">
                                                        <label>Ciudad </label>
                                                        <select class="form-control select2" id="CIUDAD" name="CIUDAD" style="width: 100%;" value="<?php echo $CIUDAD; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYCIUDAD as $r) : ?>
                                                                <?php if ($ARRAYCIUDAD) {    ?>
                                                                    <option value="<?php echo $r['ID_CIUDAD']; ?>" <?php if ($CIUDAD == $r['ID_CIUDAD']) {
                                                                                                                        echo "selected";
                                                                                                                    } ?>>
                                                                        <?php echo $r['NOMBRE_CIUDAD'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_ciudad" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3 col-xs-3">
                                                    <div class="form-group">  
                                                    <label>Agregar</label>                  
                                                        <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" <?php echo $DISABLED; ?>  title="Agregar Ciudad" id="defecto" name="pop" 
                                                        Onclick="abrirVentana('registroPopCiudad.php' ); ">
                                                        <i class="icon-copy fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type=" button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroProveedor.php');">
                                                <i class="ti-trash"></i>Cancelar
                                                </button>
                                                <?php if ($OP != "editar") { ?>
                                                    <button type="submit" class="btn btn-primary" name="GUARDAR" value="GUARDAR"  data-toggle="tooltip" title="Guardar"  <?php echo $DISABLED; ?> Onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } else { ?>
                                                    <button type="submit" class="btn btn-primary" name="EDITAR" value="EDITAR"   data-toggle="tooltip" title="Guardar" Onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box -->
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Registros</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-10 col-10">
                                            </div>
                                            <div class="col-md-2 col-2">
                                                <form method="post" id="form2">
                                                    <div class="row">
                                                        <div class="col-md-1 col-1">
                                                            <div class="form-group">
                                                                <label>Exportar</label>
                                                                <br>
                                                                <input type="hidden" class="form-control" placeholder="URLEXCEL" id="URLEXCEL" name="URLEXCEL" value="reporteProvedor" />
                                                                <button type="submit" class="btn btn-rounded btn-success btn-outline" id="EXPORTAR" name="EXPORTAR" title="Exportar Excel">
                                                                    <i class="fa fa-file-excel-o"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-11 col-11">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <div class="table-responsive">
                                                    <table id="listar" class="table table-hover " style="width: 100%;">
                                                        <thead>
                                                            <tr class="center">
                                                                <th>Número</th>
                                                                <th>Rut</th>
                                                                <th>Nombre</th>
                                                                <th class="text-center">Operaciónes</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($ARRAYPROVEEDORS as $r) : ?>
                                                                <tr class="center">
                                                                    <td>
                                                                        <a href="#" class="text-warning hover-warning">
                                                                            <?php echo $r['NUMERO_PROVEEDOR']; ?>
                                                                        </a>
                                                                    </td>
                                                                   </td>   <td> <?php echo $r['RUT_PROVEEDOR']; ?>-<?php echo $r['DV_PROVEEDOR']; ?> </td>      
                                                                    <td> <?php echo $r['NOMBRE_PROVEEDOR']; ?></td>                                                                                                                                                                        
                                                                    <td class="text-center">
                                                                        <form method="post" id="form1">
                                                                            <div class="list-icons d-inline-flex">
                                                                                <div class="list-icons-item dropdown">
                                                                                    <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        <span class="icon-copy ti-settings"></span>
                                                                                    </button>
                                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_PROVEEDOR']; ?>" />
                                                                                        <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroProveedor" />
                                                                                        <span href="#" class="dropdown-item" data-toggle="tooltip" title="Ver">
                                                                                            <button type="submit" class="btn btn-info btn-block  btn-sm" id="VERURL" name="VERURL">
                                                                                                <i class="ti-eye"></i> Ver
                                                                                            </button>
                                                                                        </span> 
                                                                                        <span href="#" class="dropdown-item" data-toggle="tooltip" title="Editar">
                                                                                            <button type="submit" class="btn  btn-warning btn-block   btn-sm" id="EDITARURL" name="EDITARURL">
                                                                                                <i class="ti-pencil-alt"></i> Editar
                                                                                            </button>
                                                                                        </span>
                                                                                        <?php if ($r['ESTADO_REGISTRO'] == 1) { ?>
                                                                                            <span href="#" class="dropdown-item" data-toggle="tooltip" title="Desahabilitar">
                                                                                                <button type="submit" class="btn btn-block btn-danger btn-sm" id="ELIMINARURL" name="ELIMINARURL">
                                                                                                    <i class="ti-na "></i> Desahabilitar
                                                                                                </button>
                                                                                            </span>
                                                                                        <?php } ?>
                                                                                        <?php if ($r['ESTADO_REGISTRO'] == 0) { ?>
                                                                                            <span href="#" class="dropdown-item" data-toggle="tooltip" title="Habilitar">
                                                                                                <button type="submit" class="btn btn-block btn-success btn-sm" id="HABILITARURL" name="HABILITARURL">
                                                                                                    <i class="ti-check "></i> Habilitar
                                                                                                </button>
                                                                                            </span>
                                                                                        <?php } ?>                                                               
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>
                        <!--.row -->
                    </section>
                    <!-- /.content -->
                </div>
            </div>


            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../config/footer.php"; ?>
                <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>