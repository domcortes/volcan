<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/COMUNA_ADO.php';
include_once '../controlador/CIUDAD_ADO.php';
include_once '../controlador/EXPORTADORA_ADO.php';

include_once '../modelo/EXPORTADORA.php';

include_once '../config/SUBIR.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR



$EXPORTADORA_ADO =  new EXPORTADORA_ADO();
$COMUNA_ADO =  new COMUNA_ADO();
$CIUDAD_ADO =  new CIUDAD_ADO();

//INIICIALIZAR MODELO
$EXPORTADORA =  new EXPORTADORA();
$SUBIR = new SUBIR();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";
$ID = "";

$DIRECTORIODESTINO = "img/exportadora/";

$RUTEXPORTADORA = "";
$NOMBREXPORTADORA = "";
$RAZONSOCIALEXPORTADORA = "";
$GIROEXPORTADORA = "";
$DIRECCIONEXPORTADORA    = "";
$COMUNA = "";
$CIUDAD = "";
$CONTACTOEXPORTADORA1 = "";
$EMAILEXPORTADORA1 = "";
$TELEFONOEXPORTADORA1 = "";
$CONTACTOEXPORTADORA2 = "";
$EMAILEXPORTADORA2 = "";
$TELEFONOEXPORTADORA2 = "";
$LOGOEXPORTADORA = "";
$DVEXPORTADORA = "";


$URL_IMG = "";
$URL = "";

$MENSAJE = "";
$MENSAJE2 = "";
$FOCUS = "";
$FOCUS2 = "";

//INICIALIZAR ARREGLOS
$ARRAYEXPORTADORA = "";
$ARRAYEXPORTADORASID = "";
$ARRAYCOMUNA = "";
$ARRAYCIUDAD = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYEXPORTADORA = $EXPORTADORA_ADO->listarExportadoraCBX();
$ARRAYCOMUNA = $COMUNA_ADO->listarComunaCBX();
$ARRAYCIUDAD = $CIUDAD_ADO->listarCiudadCBX();
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrl.php";




//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['GUARDAR'])) {


    //OPERACION DE SUBIR IMAGEN AL SERVIDOR
    if ($_FILES['LOGOEXPORTADORA']) {
        $SUBIRIMG = $SUBIR->subirImg($_FILES['LOGOEXPORTADORA'], $_REQUEST['RUTEXPORTADORA'], $DIRECTORIODESTINO);
        $URL_IMG = $SUBIRIMG['UBICACION'] . $SUBIRIMG['NOMBREARCHIVO'] . $SUBIRIMG['FORMATO'];
        $MENSAJE2 = $SUBIRIMG['MENSAJE'];
    }
    if ($URL_IMG == "") {
        $URL_IMG = "";
    }

    $ARRAYNUMERO = $EXPORTADORA_ADO->obtenerNumero($EMPRESAS);
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;


    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $EXPORTADORA->__SET('NUMERO_EXPORTADORA', $NUMERO);
    $EXPORTADORA->__SET('RUT_EXPORTADORA', $_REQUEST['RUTEXPORTADORA']);
    $EXPORTADORA->__SET('DV_EXPORTADORA', $_REQUEST['DVEXPORTADORA']);
    $EXPORTADORA->__SET('NOMBRE_EXPORTADORA', $_REQUEST['NOMBREXPORTADORA']);
    $EXPORTADORA->__SET('RAZON_SOCIAL_EXPORTADORA', $_REQUEST['RAZONSOCIALEXPORTADORA']);
    $EXPORTADORA->__SET('GIRO_EXPORTADORA', $_REQUEST['GIROEXPORTADORA']);
    $EXPORTADORA->__SET('DIRECCION_EXPORTADORA', $_REQUEST['DIRECCIONEXPORTADORA']);
    $EXPORTADORA->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
    $EXPORTADORA->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $EXPORTADORA->__SET('CONTACTO1_EXPORTADORA', $_REQUEST['CONTACTOEXPORTADORA1']);
    $EXPORTADORA->__SET('TELEFONO1_EXPORTADORA', $_REQUEST['TELEFONOEXPORTADORA1']);
    $EXPORTADORA->__SET('EMAIL1_EXPORTADORA', $_REQUEST['EMAILEXPORTADORA1']);
    $EXPORTADORA->__SET('CONTACTO2_EXPORTADORA', $_REQUEST['CONTACTOEXPORTADORA2']);
    $EXPORTADORA->__SET('TELEFONO2_EXPORTADORA', $_REQUEST['TELEFONOEXPORTADORA2']);
    $EXPORTADORA->__SET('EMAIL2_EXPORTADORA', $_REQUEST['EMAILEXPORTADORA2']);
    $EXPORTADORA->__SET('LOGO_EXPORTADORA', $URL_IMG);
    $EXPORTADORA->__SET('ID_USUARIOI', $IDUSUARIOS);
    $EXPORTADORA->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
    $EXPORTADORA_ADO->agregarExportadora($EXPORTADORA);
    //REDIRECCIONAR A PAGINA registroExportadora.php
    echo "<script type='text/javascript'> location.href ='registroExportadora.php';</script>";
}
//OPERACION DE EDICION DE FILA
if (isset($_REQUEST['EDITAR'])) {

    //OPERACION DE SUBIR IMAGEN AL SERVIDOR
    if ($_FILES['LOGOEXPORTADORA']) {
        $SUBIRIMG = $SUBIR->subirImg($_FILES['LOGOEXPORTADORA'], $_REQUEST['RUTEXPORTADORA'], $DIRECTORIODESTINO);
        $URL_IMG = $SUBIRIMG['UBICACION'] . $SUBIRIMG['NOMBREARCHIVO'] . $SUBIRIMG['FORMATO'];
        $MENSAJE2 = $SUBIRIMG['MENSAJE'];
    }

    if ($URL_IMG == "") {

        $URL_IMG = $_REQUEST['URL'];
    }

    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO  
    $EXPORTADORA->__SET('RUT_EXPORTADORA', $_REQUEST['RUTEXPORTADORA']);
    $EXPORTADORA->__SET('DV_EXPORTADORA', $_REQUEST['DVEXPORTADORA']);
    $EXPORTADORA->__SET('NOMBRE_EXPORTADORA', $_REQUEST['NOMBREXPORTADORA']);
    $EXPORTADORA->__SET('RAZON_SOCIAL_EXPORTADORA', $_REQUEST['RAZONSOCIALEXPORTADORA']);
    $EXPORTADORA->__SET('GIRO_EXPORTADORA', $_REQUEST['GIROEXPORTADORA']);
    $EXPORTADORA->__SET('DIRECCION_EXPORTADORA', $_REQUEST['DIRECCIONEXPORTADORA']);
    $EXPORTADORA->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
    $EXPORTADORA->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $EXPORTADORA->__SET('CONTACTO1_EXPORTADORA', $_REQUEST['CONTACTOEXPORTADORA1']);
    $EXPORTADORA->__SET('TELEFONO1_EXPORTADORA', $_REQUEST['TELEFONOEXPORTADORA1']);
    $EXPORTADORA->__SET('EMAIL1_EXPORTADORA', $_REQUEST['EMAILEXPORTADORA1']);
    $EXPORTADORA->__SET('CONTACTO2_EXPORTADORA', $_REQUEST['CONTACTOEXPORTADORA2']);
    $EXPORTADORA->__SET('TELEFONO2_EXPORTADORA', $_REQUEST['TELEFONOEXPORTADORA2']);
    $EXPORTADORA->__SET('EMAIL2_EXPORTADORA', $_REQUEST['EMAILEXPORTADORA2']);
    $EXPORTADORA->__SET('LOGO_EXPORTADORA', $URL_IMG);
    $EXPORTADORA->__SET('ID_USUARIOM', $IDUSUARIOS);
    $EXPORTADORA->__SET('ID_EXPORTADORA', $_REQUEST['ID']);
    //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
    $EXPORTADORA_ADO->actualizarExportadora($EXPORTADORA);
    //REDIRECCIONAR A PAGINA registroExportadora.php
    echo "<script type='text/javascript'> location.href ='registroExportadora.php';</script>";
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

        $EXPORTADORA->__SET('ID_EXPORTADORA', $IDOP);
        $EXPORTADORA_ADO->deshabilitar($EXPORTADORA);

        echo "<script type='text/javascript'> location.href ='registroExportadora.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $EXPORTADORA->__SET('ID_EXPORTADORA', $IDOP);
        $EXPORTADORA_ADO->habilitar($EXPORTADORA);

        echo "<script type='text/javascript'> location.href ='registroExportadora.php';</script>";
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYEXPORTADORASID = $EXPORTADORA_ADO->verExportadora($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYEXPORTADORASID as $r) :

            $RUTEXPORTADORA = "" . $r['RUT_EXPORTADORA'];
            $DVEXPORTADORA = "" . $r['DV_EXPORTADORA'];
            $NOMBREXPORTADORA = "" . $r['NOMBRE_EXPORTADORA'];
            $RAZONSOCIALEXPORTADORA = "" . $r['RAZON_SOCIAL_EXPORTADORA'];
            $GIROEXPORTADORA = "" . $r['GIRO_EXPORTADORA'];
            $DIRECCIONEXPORTADORA = "" . $r['DIRECCION_EXPORTADORA'];            
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $CIUDAD = "" . $r['ID_CIUDAD'];
            $CONTACTOEXPORTADORA1 = "" . $r['CONTACTO1_EXPORTADORA'];
            $TELEFONOEXPORTADORA1 = "" . $r['TELEFONO1_EXPORTADORA'];
            $EMAILEXPORTADORA1 = "" . $r['EMAIL1_EXPORTADORA'];
            $CONTACTOEXPORTADORA2 = "" . $r['CONTACTO2_EXPORTADORA'];
            $TELEFONOEXPORTADORA2 = "" . $r['TELEFONO2_EXPORTADORA'];
            $EMAILEXPORTADORA2 = "" . $r['EMAIL2_EXPORTADORA'];
            $URL_IMG = "" . $r['LOGO_EXPORTADORA'];

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
        $ARRAYEXPORTADORASID = $EXPORTADORA_ADO->verExportadora($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYEXPORTADORASID as $r) :
            $RUTEXPORTADORA = "" . $r['RUT_EXPORTADORA'];
            $DVEXPORTADORA = "" . $r['DV_EXPORTADORA'];
            $NOMBREXPORTADORA = "" . $r['NOMBRE_EXPORTADORA'];
            $RAZONSOCIALEXPORTADORA = "" . $r['RAZON_SOCIAL_EXPORTADORA'];
            $GIROEXPORTADORA = "" . $r['GIRO_EXPORTADORA'];
            $DIRECCIONEXPORTADORA = "" . $r['DIRECCION_EXPORTADORA'];      
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $CIUDAD = "" . $r['ID_CIUDAD'];
            $CONTACTOEXPORTADORA1 = "" . $r['CONTACTO1_EXPORTADORA'];
            $TELEFONOEXPORTADORA1 = "" . $r['TELEFONO1_EXPORTADORA'];
            $EMAILEXPORTADORA1 = "" . $r['EMAIL1_EXPORTADORA'];
            $CONTACTOEXPORTADORA2 = "" . $r['CONTACTO2_EXPORTADORA'];
            $TELEFONOEXPORTADORA2 = "" . $r['TELEFONO2_EXPORTADORA'];
            $EMAILEXPORTADORA2 = "" . $r['EMAIL2_EXPORTADORA'];
            $URL_IMG = "" . $r['LOGO_EXPORTADORA'];
        endforeach;
    }
}

if ($_POST) {

    $RUTEXPORTADORA = $_POST['RUTEXPORTADORA'];
    $NOMBREXPORTADORA  = $_POST['NOMBREXPORTADORA'];
    $RAZONSOCIALEXPORTADORA  = $_POST['RAZONSOCIALEXPORTADORA'];
    $GIROEXPORTADORA  = $_POST['GIROEXPORTADORA'];
    $DIRECCIONEXPORTADORA  = $_POST['DIRECCIONEXPORTADORA'];
    $CIUDAD  = $_POST['CIUDAD'];
    $CONTACTOEXPORTADORA1 = $_POST['CONTACTOEXPORTADORA1'];
    $TELEFONOEXPORTADORA1 = $_POST['TELEFONOEXPORTADORA1'];
    $EMAILEXPORTADORA1  = $_POST['EMAILEXPORTADORA1'];
    $CONTACTOEXPORTADORA2 = $_POST['CONTACTOEXPORTADORA2'];
    $TELEFONOEXPORTADORA2 = $_POST['TELEFONOEXPORTADORA2'];
    $EMAILEXPORTADORA2  = $_POST['EMAILEXPORTADORA2'];
    $URL_IMG  = $_POST['URL'];
}

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrar Exportadora</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>

        <?php include_once "../config/urlHead.php"; ?>
        <script type="text/javascript">
            //VALIDACION DE FORMULARIO
            function validacion() {

                RUTEXPORTADORA = document.getElementById("RUTEXPORTADORA").value;
                DVEXPORTADORA = document.getElementById("DVEXPORTADORA").value;
                NOMBREXPORTADORA = document.getElementById("NOMBREXPORTADORA").value;
                RAZONSOCIALEXPORTADORA = document.getElementById("RAZONSOCIALEXPORTADORA").value;
                GIROEXPORTADORA = document.getElementById("GIROEXPORTADORA").value;
                DIRECCIONEXPORTADORA = document.getElementById("DIRECCIONEXPORTADORA").value;
                CIUDAD = document.getElementById("CIUDAD").selectedIndex;
                CONTACTOEXPORTADORA1 = document.getElementById("CONTACTOEXPORTADORA1").value;
                TELEFONOEXPORTADORA1 = document.getElementById("TELEFONOEXPORTADORA1").value;
                EMAILEXPORTADORA1 = document.getElementById("EMAILEXPORTADORA1").value;
                CONTACTOEXPORTADORA2 = document.getElementById("CONTACTOEXPORTADORA2").value;
                TELEFONOEXPORTADORA2 = document.getElementById("TELEFONOEXPORTADORA2").value;
                EMAILEXPORTADORA2 = document.getElementById("EMAILEXPORTADORA2").value;


                document.getElementById('val_rut').innerHTML = "";
                document.getElementById('val_dv').innerHTML = "";
                document.getElementById('val_nombre').innerHTML = "";
                document.getElementById('val_giro').innerHTML = "";
                document.getElementById('val_rsocial').innerHTML = "";
                document.getElementById('val_dirrecion').innerHTML = "";
                document.getElementById('val_ciudad').innerHTML = "";

                document.getElementById('val_email1').innerHTML = "";
                document.getElementById('val_contacto1').innerHTML = "";
                document.getElementById('val_telefono1').innerHTML = "";
                document.getElementById('val_email2').innerHTML = "";
                document.getElementById('val_contacto2').innerHTML = "";
                document.getElementById('val_telefono2').innerHTML = "";


                if (RUTEXPORTADORA == null || RUTEXPORTADORA.length == 0 || /^\s+$/.test(RUTEXPORTADORA)) {
                    document.form_reg_dato.RUTEXPORTADORA.focus();
                    document.form_reg_dato.RUTEXPORTADORA.style.borderColor = "#FF0000";
                    document.getElementById('val_rut').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.RUTEXPORTADORA.style.borderColor = "#4AF575";

                if (DVEXPORTADORA == null || DVEXPORTADORA.length == 0 || /^\s+$/.test(DVEXPORTADORA)) {
                    document.form_reg_dato.DVEXPORTADORA.focus();
                    document.form_reg_dato.DVEXPORTADORA.style.borderColor = "#FF0000";
                    document.getElementById('val_dv').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.DVEXPORTADORA.style.borderColor = "#4AF575";


                if (NOMBREXPORTADORA == null || NOMBREXPORTADORA.length == 0 || /^\s+$/.test(NOMBREXPORTADORA)) {
                    document.form_reg_dato.NOMBREXPORTADORA.focus();
                    document.form_reg_dato.NOMBREXPORTADORA.style.borderColor = "#FF0000";
                    document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.NOMBREXPORTADORA.style.borderColor = "#4AF575";

                if (GIROEXPORTADORA == null || GIROEXPORTADORA.length == 0 || /^\s+$/.test(GIROEXPORTADORA)) {
                    document.form_reg_dato.GIROEXPORTADORA.focus();
                    document.form_reg_dato.GIROEXPORTADORA.style.borderColor = "#FF0000";
                    document.getElementById('val_giro').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.GIROEXPORTADORA.style.borderColor = "#4AF575";


                if (RAZONSOCIALEXPORTADORA == null || RAZONSOCIALEXPORTADORA.length == 0 || /^\s+$/.test(RAZONSOCIALEXPORTADORA)) {
                    document.form_reg_dato.RAZONSOCIALEXPORTADORA.focus();
                    document.form_reg_dato.RAZONSOCIALEXPORTADORA.style.borderColor = "#FF0000";
                    document.getElementById('val_rsocial').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.RAZONSOCIALEXPORTADORA.style.borderColor = "#4AF575";


                if (DIRECCIONEXPORTADORA == null || DIRECCIONEXPORTADORA.length == 0 || /^\s+$/.test(DIRECCIONEXPORTADORA)) {
                    document.form_reg_dato.DIRECCIONEXPORTADORA.focus();
                    document.form_reg_dato.DIRECCIONEXPORTADORA.style.borderColor = "#FF0000";
                    document.getElementById('val_dirrecion').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.DIRECCIONEXPORTADORA.style.borderColor = "#4AF575";

                /*
                             if (CIUDAD == null || CIUDAD == 0) {
                                 document.form_reg_dato.CIUDAD.focus();
                                 document.form_reg_dato.CIUDAD.style.borderColor = "#FF0000";
                                 document.getElementById('val_ciudad').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                                 return false;
                             }
                             document.form_reg_dato.CIUDAD.style.borderColor = "#4AF575";


                          

                                             if (CONTACTOEXPORTADORA1 == null || CONTACTOEXPORTADORA1.length == 0 || /^\s+$/.test(CONTACTOEXPORTADORA1)) {
                                                 document.form_reg_dato.CONTACTOEXPORTADORA1.focus();
                                                 document.form_reg_dato.CONTACTOEXPORTADORA1.style.borderColor = "#FF0000";
                                                 document.getElementById('val_contacto1').innerHTML = "NO A INGRESADO DATO";
                                                 return false;
                                             }
                                             document.form_reg_dato.CONTACTOEXPORTADORA1.style.borderColor = "#4AF575";


                                             if (TELEFONOEXPORTADORA1 == null || TELEFONOEXPORTADORA1 == 0) {
                                                 document.form_reg_dato.TELEFONOEXPORTADORA1.focus();
                                                 document.form_reg_dato.TELEFONOEXPORTADORA1.style.borderColor = "#FF0000";
                                                 document.getElementById('val_telefono1').innerHTML = "NO A INGRESADO DATO";
                                                 return false;
                                             }
                                             document.form_reg_dato.TELEFONOEXPORTADORA1.style.borderColor = "#4AF575";

                                             if (EMAILEXPORTADORA1 == null || EMAILEXPORTADORA1.length == 0 || /^\s+$/.test(EMAILEXPORTADORA1)) {
                                                 document.form_reg_dato.EMAILEXPORTADORA1.focus();
                                                 document.form_reg_dato.EMAILEXPORTADORA1.style.borderColor = "#FF0000";
                                                 document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                                                 return false;
                                             }
                                             document.form_reg_dato.EMAILEXPORTADORA1.style.borderColor = "#4AF575";



                                             if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                                                     .test(EMAILEXPORTADORA1))) {
                                                 document.form_reg_dato.EMAILEXPORTADORA1.focus();
                                                 document.form_reg_dato.EMAILEXPORTADORA1.style.borderColor = "#ff0000";
                                                 document.getElementById('val_email1').innerHTML = "FORMATO DE CORREO INCORRECTO";
                                                 return false;
                                             }
                                             document.form_reg_dato.EMAILEXPORTADORA1.style.borderColor = "#4AF575";



                                             if (CONTACTOEXPORTADORA2 == null || CONTACTOEXPORTADORA2.length == 0 || /^\s+$/.test(CONTACTOEXPORTADORA2)) {
                                                 document.form_reg_dato.CONTACTOEXPORTADORA2.focus();
                                                 document.form_reg_dato.CONTACTOEXPORTADORA2.style.borderColor = "#FF0000";
                                                 document.getElementById('val_contacto2').innerHTML = "NO A INGRESADO DATO";
                                                 return false;
                                             }
                                             document.form_reg_dato.CONTACTOEXPORTADORA2.style.borderColor = "#4AF575";


                                             if (TELEFONOEXPORTADORA2 == null || TELEFONOEXPORTADORA2 == 0) {
                                                 document.form_reg_dato.TELEFONOEXPORTADORA2.focus();
                                                 document.form_reg_dato.TELEFONOEXPORTADORA2.style.borderColor = "#FF0000";
                                                 document.getElementById('val_telefono2').innerHTML = "NO A INGRESADO DATO";
                                                 return false;
                                             }
                                             document.form_reg_dato.TELEFONOEXPORTADORA2.style.borderColor = "#4AF575";

                                             if (EMAILEXPORTADORA2 == null || EMAILEXPORTADORA2.length == 0 || /^\s+$/.test(EMAILEXPORTADORA2)) {
                                                 document.form_reg_dato.EMAILEXPORTADORA2.focus();
                                                 document.form_reg_dato.EMAILEXPORTADORA2.style.borderColor = "#FF0000";
                                                 document.getElementById('val_email2').innerHTML = "NO A INGRESADO DATO";
                                                 return false;
                                             }
                                             document.form_reg_dato.EMAILEXPORTADORA2.style.borderColor = "#4AF575";



                                             if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                                                     .test(EMAILEXPORTADORA2))) {
                                                 document.form_reg_dato.EMAILEXPORTADORA2.focus();
                                                 document.form_reg_dato.EMAILEXPORTADORA2.style.borderColor = "#ff0000";
                                                 document.getElementById('val_email').innerHTML = "FORMATO DE CORREO INCORRECTO";
                                                 return false;
                                             }
                                             document.form_reg_dato.EMAILEXPORTADORA2.style.borderColor = "#4AF575";

                             */

            }


            //REDIRECCIONAR A LA PAGINA SELECIONADA
            function irPagina(url) {
                location.href = "" + url;
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
                                <h3 class="page-title">Exportadora</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroExportadora.php"> Operaciones Exportadora </a>
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
                            <div class="col-lg-6">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <!--  
                                    <h4 class="box-title">Sample form 1</h4>
                                -->
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" onsubmit="return validacion()" enctype="multipart/form-data">
                                        <div class="box-body">
                                            <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Registro
                                            </h4>
                                            <hr class="my-15">
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Rut </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Rut Exportadora" id="RUTEXPORTADORA" name="RUTEXPORTADORA" value="<?php echo $RUTEXPORTADORA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rut" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>DV </label>
                                                        <input type="text" class="form-control" placeholder="DV Exportadora" id="DVEXPORTADORA" name="DVEXPORTADORA" value="<?php echo $DVEXPORTADORA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_dv" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Nombre </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Exportadora " id="NOMBREXPORTADORA" name="NOMBREXPORTADORA" value="<?php echo $NOMBREXPORTADORA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Giro</label>
                                                        <input type="text" class="form-control" placeholder="Giro Exportadora" id="GIROEXPORTADORA" name="GIROEXPORTADORA" value="<?php echo $GIROEXPORTADORA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_giro" class="validacion"> </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Razon Social</label>
                                                        <input type="text" class="form-control" placeholder="Razon Social Exportadora" id="RAZONSOCIALEXPORTADORA" name="RAZONSOCIALEXPORTADORA" value="<?php echo $RAZONSOCIALEXPORTADORA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rsocial" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Dirreccion</label>
                                                        <input type="text" class="form-control" placeholder="Dirreccion  Exportadora" id="DIRECCIONEXPORTADORA" name="DIRECCIONEXPORTADORA" value="<?php echo $DIRECCIONEXPORTADORA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_dirrecion" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Ciudad</label>
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
                                            </div>
                                            <label>Contacto</label>
                                            <hr class="my-15">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Nombre 1</label>
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto 1 Exportadora" id="CONTACTOEXPORTADORA1" name="CONTACTOEXPORTADORA1" value="<?php echo $CONTACTOEXPORTADORA1; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto1" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Telefono 1</label>
                                                        <input type="number" class="form-control" placeholder="Telefono Contacto  1 Exportadora" id="TELEFONOEXPORTADORA1" name="TELEFONOEXPORTADORA1" value="<?php echo $TELEFONOEXPORTADORA1 ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_telefono1" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Email 1</label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto  1Exportadora" id="EMAILEXPORTADORA1" name="EMAILEXPORTADORA1" value="<?php echo $EMAILEXPORTADORA1; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email1" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Nombre 2</label>
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto 2 Exportadora" id="CONTACTOEXPORTADORA2" name="CONTACTOEXPORTADORA2" value="<?php echo $CONTACTOEXPORTADORA2; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto2" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Telefono 2</label>
                                                        <input type="number" class="form-control" placeholder="Telefono Contacto 2 Exportadora" id="TELEFONOEXPORTADORA2" name="TELEFONOEXPORTADORA2" value="<?php echo $TELEFONOEXPORTADORA2 ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_telefono2" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Email 2</label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto 2 Exportadora" id="EMAILEXPORTADORA2" name="EMAILEXPORTADORA2" value="<?php echo $EMAILEXPORTADORA2; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email2" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label>Seleccion Imagen</label>
                                                <label class="file">
                                                    <input type="file" placeholder="IMG" id="LOGOEXPORTADORA" name="LOGOEXPORTADORA" values="<?php echo $LOGOEXPORTADORA; ?>" <?php echo $FOCUS2; ?> />
                                                </label>
                                                <label id="val_img_empresa" class="validacion"><?php echo $MENSAJE2; ?> </label>
                                                <?php if ($URL_IMG) { ?>
                                                    <img src="<?php echo  $URL_IMG; ?>" alt="Logo Exportadora" class="rounded mx-auto d-block" style="max-width:100px; max-height:100px;width: auto;height: auto;">
                                                <?php } else { ?>
                                                    <img src="img/empresa/no_disponible.png" alt="Logo Exportadora" class="rounded mx-auto d-block" style="max-width:100px; max-height:100px;width: auto;height: auto;">
                                                <?php } ?>
                                                <input type="hidden" id="URL" name="URL" value="<?php echo $URL_IMG; ?>" />
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroExportadora.php'); ">
                                                <i class="ti-trash"></i> Cancelar
                                            </button>
                                            <?php if ($OP != "editar") { ?>
                                                <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED; ?>>
                                                    <i class="ti-save-alt"></i> Crear
                                                </button>
                                            <?php } else { ?>
                                                <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="EDITAR" value="EDITAR">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box -->
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title"> Registros</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="listar" class="table table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Número </th>
                                                        <th>Nombre </th>
                                                        <th>Operaciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYEXPORTADORA as $r) : ?>
                                                        <tr class="center">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['NUMERO_EXPORTADORA']; ?>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $r['NOMBRE_EXPORTADORA']; ?></td>
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown">
                                                                                <i class="glyphicon glyphicon-cog"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_EXPORTADORA']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroExportadora" />
                                                                                <button type="submit" class="btn btn-rounded btn-outline-info btn-sm " id="VERURL" name="VERURL">
                                                                                    <i class="ti-eye"></i>
                                                                                </button>Ver
                                                                                <br>
                                                                                <button type="submit" class="btn btn-rounded btn-outline-warning btn-sm" id="EDITARURL" name="EDITARURL">
                                                                                    <i class="ti-pencil-alt"></i>
                                                                                </button>Editar
                                                                                <br>
                                                                                <?php if ($r['ESTADO_REGISTRO'] == 1) { ?>
                                                                                    <button type="submit" class="btn btn-rounded btn-outline-danger btn-sm" id="ELIMINARURL" name="ELIMINARURL">
                                                                                        <i class="ti-na "></i>
                                                                                    </button>Desahabilitar
                                                                                    <br>
                                                                                <?php } ?>
                                                                                <?php if ($r['ESTADO_REGISTRO'] == 0) { ?>
                                                                                    <button type="submit" class="btn btn-rounded btn-outline-success btn-sm" id="HABILITARURL" name="HABILITARURL">
                                                                                        <i class="ti-check "></i>
                                                                                    </button>Habilitar
                                                                                    <br>
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