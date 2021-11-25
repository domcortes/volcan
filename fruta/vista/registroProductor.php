<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/TPRODUCTOR_ADO.php';
include_once '../controlador/CIUDAD_ADO.php';
include_once '../controlador/COMUNA_ADO.php';
include_once '../controlador/PROVINCIA_ADO.php';
include_once '../controlador/REGION_ADO.php';

include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../modelo/PRODUCTOR.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$TPRODUCTOR_ADO =  new TPRODUCTOR_ADO();
$CIUDAD_ADO =  new CIUDAD_ADO();
$COMUNA_ADO =  new COMUNA_ADO();
$PROVINCIA_ADO =  new PROVINCIA_ADO();
$REGION_ADO =  new REGION_ADO();

$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
//INIICIALIZAR MODELO
$PRODUCTOR =  new PRODUCTOR();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD


$RUTPRODUCTOR = "";
$DVPRODUCTOR = "";
$NOMBREPRODUCTOR = "";
$DIRECCIONPRODUCTOR = "";
$TELEFONOPRODUCTOR = "";
$EMAILPRODUCTOR = "";
$GIROPRODUCTOR = "";
$CSGPRODUCTOR = "";
$SDPPRODUCTOR = "";
$PRBPRODUCTOR = "";
$CODIGOASOCIADOPRODUCTOR = "";
$NOMBREASOCIADOPRODUCTOR = "";



$CIUDAD = "";
$COMUNA = "";
$PROVINCIA = "";
$REGION = "";
$TPRODUCTOR = "";
$NUMERO = "";



$SINO = "";
$IDOP = "";
$OP = "";
$DISABLED = "";

$MENSAJE = "";
$MENSAJE2 = "";

//INICIALIZAR ARREGLOS
$ARRAYPRODUCTOR = "";
$ARRAYPRODUCTORID = "";
$ARRAYTPRODUCTOR = "";
$ARRAYVERPRODUCTOR = "";
$ARRAYNUMERO = "";


$ARRAYCIUDAD = "";
$ARRAYCOMUNA = "";
$ARRAYPROVINCIA = "";
$ARRAYREGION = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYPRODUCTOR = $PRODUCTOR_ADO->listarProductorPorEmpresaCBX($EMPRESAS);
$ARRAYTPRODUCTOR = $TPRODUCTOR_ADO->listarTproductorPorEmpresaCBX($EMPRESAS);
$ARRAYCIUDAD = $CIUDAD_ADO->listarCiudadCBX();
$ARRAYCOMUNA = $COMUNA_ADO->listarComunaCBX();
$ARRAYPROVINCIA  = $PROVINCIA_ADO->listarProvinciaCBX();
$ARRAYREGION = $REGION_ADO->listarRegionCBX();


include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrl.php";



//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['GUARDAR'])) {

    $ARRAYNUMERO = $PRODUCTOR_ADO->obtenerNumero($_REQUEST['EMPRESA']);
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;


    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $PRODUCTOR->__SET('NUMERO_PRODUCTOR', $NUMERO);
    $PRODUCTOR->__SET('RUT_PRODUCTOR', $_REQUEST['RUTPRODUCTOR']);
    $PRODUCTOR->__SET('DV_PRODUCTOR', $_REQUEST['DVPRODUCTOR']);
    $PRODUCTOR->__SET('NOMBRE_PRODUCTOR', $_REQUEST['NOMBREPRODUCTOR']);
    $PRODUCTOR->__SET('DIRECCION_PRODUCTOR', $_REQUEST['DIRECCIONPRODUCTOR']);
    $PRODUCTOR->__SET('TELEFONO_PRODUCTOR', $_REQUEST['TELEFONOPRODUCTOR']);
    $PRODUCTOR->__SET('EMAIL_PRODUCTOR', $_REQUEST['EMAILPRODUCTOR']);
    $PRODUCTOR->__SET('GIRO_PRODUCTOR', $_REQUEST['GIROPRODUCTOR']);
    $PRODUCTOR->__SET('CSG_PRODUCTOR', $_REQUEST['CSGPRODUCTOR']);
    $PRODUCTOR->__SET('SDP_PRODUCTOR', $_REQUEST['SDPPRODUCTOR']);
    $PRODUCTOR->__SET('PRB_PRODUCTOR', $_REQUEST['PRBPRODUCTOR']);
    $PRODUCTOR->__SET('CODIGO_ASOCIADO_PRODUCTOR', $_REQUEST['CODIGOASOCIADOPRODUCTOR']);
    $PRODUCTOR->__SET('NOMBRE_ASOCIADO_PRODUCTOR', $_REQUEST['NOMBREASOCIADOPRODUCTOR']);
    $PRODUCTOR->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);    
    $PRODUCTOR->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $PRODUCTOR->__SET('ID_TPRODUCTOR', $_REQUEST['TPRODUCTOR']);
    $PRODUCTOR->__SET('ID_USUARIOI', $IDUSUARIOS);
    $PRODUCTOR->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $PRODUCTOR_ADO->agregarProductor($PRODUCTOR);
    //REDIRECCIONAR A PAGINA registroProductor.php
    echo "<script type='text/javascript'> location.href ='registroProductor.php';</script>";
}
//OPERACION EDICION DE FILA
if (isset($_REQUEST['EDITAR'])) {

    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO  
    $PRODUCTOR->__SET('RUT_PRODUCTOR', $_REQUEST['RUTPRODUCTOR']);
    $PRODUCTOR->__SET('DV_PRODUCTOR', $_REQUEST['DVPRODUCTOR']);
    $PRODUCTOR->__SET('NOMBRE_PRODUCTOR', $_REQUEST['NOMBREPRODUCTOR']);
    $PRODUCTOR->__SET('DIRECCION_PRODUCTOR', $_REQUEST['DIRECCIONPRODUCTOR']);
    $PRODUCTOR->__SET('TELEFONO_PRODUCTOR', $_REQUEST['TELEFONOPRODUCTOR']);
    $PRODUCTOR->__SET('EMAIL_PRODUCTOR', $_REQUEST['EMAILPRODUCTOR']);
    $PRODUCTOR->__SET('GIRO_PRODUCTOR', $_REQUEST['GIROPRODUCTOR']);
    $PRODUCTOR->__SET('CSG_PRODUCTOR', $_REQUEST['CSGPRODUCTOR']);
    $PRODUCTOR->__SET('SDP_PRODUCTOR', $_REQUEST['SDPPRODUCTOR']);
    $PRODUCTOR->__SET('PRB_PRODUCTOR', $_REQUEST['PRBPRODUCTOR']);
    $PRODUCTOR->__SET('CODIGO_ASOCIADO_PRODUCTOR', $_REQUEST['CODIGOASOCIADOPRODUCTOR']);
    $PRODUCTOR->__SET('NOMBRE_ASOCIADO_PRODUCTOR', $_REQUEST['NOMBREASOCIADOPRODUCTOR']);
    $PRODUCTOR->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
    $PRODUCTOR->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $PRODUCTOR->__SET('ID_TPRODUCTOR', $_REQUEST['TPRODUCTOR']);
    $PRODUCTOR->__SET('ID_USUARIOM', $IDUSUARIOS);
    $PRODUCTOR->__SET('ID_PRODUCTOR', $_REQUEST['ID']);
    //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
    $PRODUCTOR_ADO->actualizarProductor($PRODUCTOR);
    //REDIRECCIONAR A PAGINA registroProductor.php
    echo "<script type='text/javascript'> location.href ='registroProductor.php';</script>";
}

//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION Y VISUALIZACION
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['parametro'];
    $OP = $_SESSION['parametro1'];


    //IDENTIFICACIONES DE OPERACIONES    //OPERACION DE CAMBIO DE ESTADO
    //0 = DESACTIVAR
    if ($OP == "0") {

        $PRODUCTOR->__SET('ID_PRODUCTOR', $IDOP);
        $PRODUCTOR_ADO->deshabilitar($PRODUCTOR);

        echo "<script type='text/javascript'> location.href ='registroProductor.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $PRODUCTOR->__SET('ID_PRODUCTOR', $IDOP);
        $PRODUCTOR_ADO->habilitar($PRODUCTOR);
        echo "<script type='text/javascript'> location.href ='registroProductor.php';</script>";
    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYPRODUCTORID = $PRODUCTOR_ADO->verProductor($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYPRODUCTORID as $r) :
            $RUTPRODUCTOR = "" . $r['RUT_PRODUCTOR'];
            $DVPRODUCTOR = "" . $r['DV_PRODUCTOR'];
            $NOMBREPRODUCTOR = "" . $r['NOMBRE_PRODUCTOR'];
            $DIRECCIONPRODUCTOR = "" . $r['DIRECCION_PRODUCTOR'];
            $TELEFONOPRODUCTOR = "" . $r['TELEFONO_PRODUCTOR'];
            $EMAILPRODUCTOR = "" . $r['EMAIL_PRODUCTOR'];
            $GIROPRODUCTOR = "" . $r['GIRO_PRODUCTOR'];
            $CSGPRODUCTOR = "" . $r['CSG_PRODUCTOR'];
            $SDPPRODUCTOR = "" . $r['SDP_PRODUCTOR'];
            $PRBPRODUCTOR = "" . $r['PRB_PRODUCTOR'];
            $CODIGOASOCIADOPRODUCTOR = "" . $r['CODIGO_ASOCIADO_PRODUCTOR'];
            $NOMBREASOCIADOPRODUCTOR = "" . $r['NOMBRE_ASOCIADO_PRODUCTOR'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $CIUDAD = "" . $r['ID_CIUDAD'];
            $TPRODUCTOR = "" . $r['ID_TPRODUCTOR'];
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
        $ARRAYPRODUCTORID = $PRODUCTOR_ADO->verProductor($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYPRODUCTORID as $r) :
            $RUTPRODUCTOR = "" . $r['RUT_PRODUCTOR'];
            $DVPRODUCTOR = "" . $r['DV_PRODUCTOR'];
            $NOMBREPRODUCTOR = "" . $r['NOMBRE_PRODUCTOR'];
            $DIRECCIONPRODUCTOR = "" . $r['DIRECCION_PRODUCTOR'];
            $TELEFONOPRODUCTOR = "" . $r['TELEFONO_PRODUCTOR'];
            $EMAILPRODUCTOR = "" . $r['EMAIL_PRODUCTOR'];
            $GIROPRODUCTOR = "" . $r['GIRO_PRODUCTOR'];
            $CSGPRODUCTOR = "" . $r['CSG_PRODUCTOR'];
            $SDPPRODUCTOR = "" . $r['SDP_PRODUCTOR'];
            $PRBPRODUCTOR = "" . $r['PRB_PRODUCTOR'];
            $CODIGOASOCIADOPRODUCTOR = "" . $r['CODIGO_ASOCIADO_PRODUCTOR'];
            $NOMBREASOCIADOPRODUCTOR = "" . $r['NOMBRE_ASOCIADO_PRODUCTOR'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $CIUDAD = "" . $r['ID_CIUDAD'];
            $TPRODUCTOR = "" . $r['ID_TPRODUCTOR'];
        endforeach;
    }
}





?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Productor</title>
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

                    RUTPRODUCTOR = document.getElementById("RUTPRODUCTOR").value;
                    DVPRODUCTOR = document.getElementById("DVPRODUCTOR").value;
                    NOMBREPRODUCTOR = document.getElementById("NOMBREPRODUCTOR").value;
                    DIRECCIONPRODUCTOR = document.getElementById("DIRECCIONPRODUCTOR").value;
                    //TELEFONOPRODUCTOR = document.getElementById("TELEFONOPRODUCTOR").value;
                    EMAILPRODUCTOR = document.getElementById("EMAILPRODUCTOR").value;
                    GIROPRODUCTOR = document.getElementById("GIROPRODUCTOR").value;
                    CSGPRODUCTOR = document.getElementById("CSGPRODUCTOR").value;
                    SDPPRODUCTOR = document.getElementById("SDPPRODUCTOR").value;
                    PRBPRODUCTOR = document.getElementById("PRBPRODUCTOR").value;
                    CODIGOASOCIADOPRODUCTOR = document.getElementById("CODIGOASOCIADOPRODUCTOR").value;
                    NOMBREASOCIADOPRODUCTOR = document.getElementById("NOMBREASOCIADOPRODUCTOR").value;
                    CIUDAD = document.getElementById("CIUDAD").selectedIndex;
                    TPRODUCTOR = document.getElementById("TPRODUCTOR").selectedIndex;

                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_rut').innerHTML = "";
                    document.getElementById('val_dv').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";
                    //document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_email').innerHTML = "";
                    document.getElementById('val_giro').innerHTML = "";
                    document.getElementById('val_csg').innerHTML = "";
                    document.getElementById('val_sdp').innerHTML = "";
                    document.getElementById('val_prb').innerHTML = "";
                    document.getElementById('val_codigo').innerHTML = "";
                    document.getElementById('val_nombrea').innerHTML = "";
                    document.getElementById('val_ciudad').innerHTML = "";
                    document.getElementById('val_tproductor').innerHTML = "";


                    if (RUTPRODUCTOR == null || RUTPRODUCTOR.length == 0 || /^\s+$/.test(RUTPRODUCTOR)) {
                        document.form_reg_dato.RUTPRODUCTOR.focus();
                        document.form_reg_dato.RUTPRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_rut').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RUTPRODUCTOR.style.borderColor = "#4AF575";

                    if (DVPRODUCTOR == null || DVPRODUCTOR.length == 0 || /^\s+$/.test(DVPRODUCTOR)) {
                        document.form_reg_dato.DVPRODUCTOR.focus();
                        document.form_reg_dato.DVPRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_dv').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DVPRODUCTOR.style.borderColor = "#4AF575";

                    if (NOMBREPRODUCTOR == null || NOMBREPRODUCTOR.length == 0 || /^\s+$/.test(NOMBREPRODUCTOR)) {
                        document.form_reg_dato.NOMBREPRODUCTOR.focus();
                        document.form_reg_dato.NOMBREPRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREPRODUCTOR.style.borderColor = "#4AF575";

                    if (NOMBREPRODUCTOR.length > 82) {
                        document.form_reg_dato.NOMBREPRODUCTOR.focus();
                        document.form_reg_dato.NOMBREPRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO PUEDE SER MAYOR A 82 CARACTERES";
                        return false;
                    }
                    document.form_reg_dato.NOMBREPRODUCTOR.style.borderColor = "#4AF575";


                    if (DIRECCIONPRODUCTOR == null || DIRECCIONPRODUCTOR.length == 0 || /^\s+$/.test(DIRECCIONPRODUCTOR)) {
                        document.form_reg_dato.DIRECCIONPRODUCTOR.focus();
                        document.form_reg_dato.DIRECCIONPRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCIONPRODUCTOR.style.borderColor = "#4AF575";
                    /*
                                        if (TELEFONOPRODUCTOR == null || TELEFONOPRODUCTOR == 0) {
                                            document.form_reg_dato.TELEFONOPRODUCTOR.focus();
                                            document.form_reg_dato.TELEFONOPRODUCTOR.style.borderColor = "#FF0000";
                                            document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.TELEFONOPRODUCTOR.style.borderColor = "#4AF575";

                    */
                    /*
                    if (EMAILPRODUCTOR == null || EMAILPRODUCTOR.length == 0 || /^\s+$/.test(EMAILPRODUCTOR)) {
                        document.form_reg_dato.EMAILPRODUCTOR.focus();
                        document.form_reg_dato.EMAILPRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EMAILPRODUCTOR.style.borderColor = "#4AF575";


                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                            .test(EMAILPRODUCTOR))) {
                        document.form_reg_dato.EMAILPRODUCTOR.focus();
                        document.form_reg_dato.EMAILPRODUCTOR.style.borderColor = "#ff0000";
                        document.getElementById('val_email').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.EMAILPRODUCTOR.style.borderColor = "#4AF575";
*/

                    if (GIROPRODUCTOR == null || GIROPRODUCTOR.length == 0 || /^\s+$/.test(GIROPRODUCTOR)) {
                        document.form_reg_dato.GIROPRODUCTOR.focus();
                        document.form_reg_dato.GIROPRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_giro').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.GIROPRODUCTOR.style.borderColor = "#4AF575";


                    if (CSGPRODUCTOR == null || CSGPRODUCTOR == 0) {
                        document.form_reg_dato.CSGPRODUCTOR.focus();
                        document.form_reg_dato.CSGPRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_csg').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CSGPRODUCTOR.style.borderColor = "#4AF575";
                    /*
                                        if (SDPPRODUCTOR == null || SDPPRODUCTOR == 0) {
                                            document.form_reg_dato.SDPPRODUCTOR.focus();
                                            document.form_reg_dato.SDPPRODUCTOR.style.borderColor = "#FF0000";
                                            document.getElementById('val_sdp').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.SDPPRODUCTOR.style.borderColor = "#4AF575";


                                        if (PRBPRODUCTOR == null || PRBPRODUCTOR == 0) {
                                            document.form_reg_dato.PRBPRODUCTOR.focus();
                                            document.form_reg_dato.PRBPRODUCTOR.style.borderColor = "#FF0000";
                                            document.getElementById('val_prb').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.PRBPRODUCTOR.style.borderColor = "#4AF575";


                                        if (CODIGOASOCIADOPRODUCTOR == null || CODIGOASOCIADOPRODUCTOR == 0) {
                                            document.form_reg_dato.CODIGOASOCIADOPRODUCTOR.focus();
                                            document.form_reg_dato.CODIGOASOCIADOPRODUCTOR.style.borderColor = "#FF0000";
                                            document.getElementById('val_codigo').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.CODIGOASOCIADOPRODUCTOR.style.borderColor = "#4AF575";

                                        if (NOMBREASOCIADOPRODUCTOR == null || NOMBREASOCIADOPRODUCTOR.length == 0 || /^\s+$/.test(NOMBREASOCIADOPRODUCTOR)) {
                                            document.form_reg_dato.NOMBREASOCIADOPRODUCTOR.focus();
                                            document.form_reg_dato.NOMBREASOCIADOPRODUCTOR.style.borderColor = "#FF0000";
                                            document.getElementById('val_nombrea').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.NOMBREASOCIADOPRODUCTOR.style.borderColor = "#4AF575";

                    */

                    if (CIUDAD == null || CIUDAD == 0) {
                        document.form_reg_dato.CIUDAD.focus();
                        document.form_reg_dato.CIUDAD.style.borderColor = "#FF0000";
                        document.getElementById('val_ciudad').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.CIUDAD.style.borderColor = "#4AF575";



                    if (TPRODUCTOR == null || TPRODUCTOR == 0) {
                        document.form_reg_dato.TPRODUCTOR.focus();
                        document.form_reg_dato.TPRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_tproductor').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TPRODUCTOR.style.borderColor = "#4AF575";



                }

                //FUNCION PARA REALIZAR UNA ACTUALIZACION DEL FORMULARIO DE REGISTRO DE RECEPCIONMP
                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }

                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE RECEPCIONMP
                function abrirVentana(url) {
                    var opciones =
                        "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1600, height=1000'";
                    window.open(url, 'window', opciones);
                }

                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }

                function abrirPestana(url) {
                    var win = window.open(url, '_blank');
                    win.focus();
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
            <?php include_once "../config/menu.php"; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Productor</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroProductor.php"> Operaciones Productor</a>
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
                                                        <input type="text" class="form-control" placeholder="Rut Productor" id="RUTPRODUCTOR" name="RUTPRODUCTOR" value="<?php echo $RUTPRODUCTOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rut" class="validacion"> <?php echo $MENSAJE; ?> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3 col-xs-3">
                                                    <div class="form-group">
                                                        <label>DV </label>
                                                        <input type="text" class="form-control" placeholder="DV Productor" id="DVPRODUCTOR" name="DVPRODUCTOR" value="<?php echo $DVPRODUCTOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_dv" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Productor" id="NOMBREPRODUCTOR" name="NOMBREPRODUCTOR" value="<?php echo $NOMBREPRODUCTOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Dirreccion </label>
                                                        <input type="text" class="form-control" placeholder="Dirreccion Productor" id="DIRECCIONPRODUCTOR" name="DIRECCIONPRODUCTOR" value="<?php echo $DIRECCIONPRODUCTOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_direccion" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Telefono </label>
                                                        <input type="number" class="form-control" placeholder="Telefono Productor" id="TELEFONOPRODUCTOR" name="TELEFONOPRODUCTOR" value="<?php echo $TELEFONOPRODUCTOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_telefono" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Email </label>
                                                        <input type="text" class="form-control" placeholder="Email Productor" id="EMAILPRODUCTOR" name="EMAILPRODUCTOR" value="<?php echo $EMAILPRODUCTOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Giro </label>
                                                        <input type="text" class="form-control" placeholder="Giro Productor" id="GIROPRODUCTOR" name="GIROPRODUCTOR" value="<?php echo $GIROPRODUCTOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_giro" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>CSG </label>
                                                        <input type="number" class="form-control" placeholder="CSG Productor" id="CSGPRODUCTOR" name="CSGPRODUCTOR" value="<?php echo $CSGPRODUCTOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_csg" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>SDP </label>
                                                        <input type="number" class="form-control" placeholder="SDP Productor" id="SDPPRODUCTOR" name="SDPPRODUCTOR" value="<?php echo $SDPPRODUCTOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_sdp" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>PRB </label>
                                                        <input type="number" class="form-control" placeholder="PRB Productor" id="PRBPRODUCTOR" name="PRBPRODUCTOR" value="<?php echo $PRBPRODUCTOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_prb" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Codigo Asociado </label>
                                                        <input type="number" class="form-control" placeholder="Codigo Asociado Productor" id="CODIGOASOCIADOPRODUCTOR" name="CODIGOASOCIADOPRODUCTOR" value="<?php echo $CODIGOASOCIADOPRODUCTOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_codigo" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Nombre Asociado </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Asociado Productor" id="NOMBREASOCIADOPRODUCTOR" name="NOMBREASOCIADOPRODUCTOR" value="<?php echo $NOMBREASOCIADOPRODUCTOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombrea" class="validacion"> </label>
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

                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-9 col-9 col-xs-9">
                                                    <div class="form-group">
                                                        <label>Tipo Productor</label>
                                                        <select class="form-control select2" id="TPRODUCTOR" name="TPRODUCTOR" style="width: 100%;" value="<?php echo $TPRODUCTOR; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYTPRODUCTOR as $r) : ?>
                                                                <?php if ($ARRAYTPRODUCTOR) {    ?>
                                                                    <option value="<?php echo $r['ID_TPRODUCTOR']; ?>" <?php if ($TPRODUCTOR == $r['ID_TPRODUCTOR']) {
                                                                                                                            echo "selected";
                                                                                                                        } ?>>
                                                                        <?php echo $r['NOMBRE_TPRODUCTOR'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>

                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_tproductor" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3 col-xs-3">
                                                    <div class="form-group">  
                                                    <label>Agregar</label>                  
                                                        <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" <?php echo $DISABLED; ?>  title="Agregar Tipo Productor" id="defecto" name="pop" 
                                                        Onclick="abrirVentana('registroPopTproductor.php' ); ">
                                                        <i class="icon-copy fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!-- /.box-body -->

                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type=" button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroProductor.php');">
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
                                        <div class="table-responsive">
                                            <table id="listar" class="table table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="center">
                                                        <th>Número </th>
                                                        <th>Rut </th>
                                                        <th>CSG </th>
                                                        <th>Nombre </th>
                                                        <th class="text-center">Operaciónes</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYPRODUCTOR as $r) : ?>
                                                        <tr class="center">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['NUMERO_PRODUCTOR']; ?>
                                                                </a>
                                                            </td>   <td> <?php echo $r['RUT_PRODUCTOR']; ?>-<?php echo $r['DV_PRODUCTOR']; ?> </td>                                             
                                                            <td><?php echo $r['CSG_PRODUCTOR']; ?></td>
                                                            <td><?php echo $r['NOMBRE_PRODUCTOR']; ?></td>                                                                                                        
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <span class="icon-copy ti-settings"></span>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_PRODUCTOR']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroProductor" />
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
                                <!-- /.box -->
                            </div>
                        </div>
                        <!--.row -->
                    </section>
                    <!-- /.content -->
                </div>
            </div>
            <!-- /.content-wrapper -->


            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../config/footer.php"; ?>
                <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>