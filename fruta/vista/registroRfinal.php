<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/CIUDAD_ADO.php';
include_once '../controlador/RFINAL_ADO.php';

include_once '../modelo/RFINAL.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR


$CIUDAD_ADO =  new CIUDAD_ADO();

$RFINAL_ADO =  new RFINAL_ADO();
//INIICIALIZAR MODELO
$RFINAL =  new RFINAL();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$NOMBRERFINAL = "";
$DIRECCIONRFINAL = "";
$CONTACTORFINAL1 = "";
$CARGORFINAL1 = "";
$EMAILRFINAL1 = "";
$CONTACTORFINAL2 = "";
$CARGORFINAL2 = "";
$EMAILRFINAL2 = "";
$CONTACTORFINAL3 = "";
$CARGORFINAL3 = "";
$EMAILRFINAL3 = "";
$CIUDAD = "";



$SINO = "";


//INICIALIZAR ARREGLOS
$ARRAYRFINAL = "";
$ARRAYRFINALID = "";
$ARRAYCIUDAD = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYRFINAL = $RFINAL_ADO->listarRfinalPorEmpresaCBX($EMPRESAS);
$ARRAYCIUDAD = $CIUDAD_ADO->listarCiudadCBX();
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrl.php";



//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['GUARDAR'])) {

    $ARRAYNUMERO = $RFINAL_ADO->obtenerNumero($EMPRESAS);
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;


    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $RFINAL->__SET('NUMERO_RFINAL', $NUMERO);
    $RFINAL->__SET('NOMBRE_RFINAL', $_REQUEST['NOMBRERFINAL']);
    $RFINAL->__SET('DIRECCION_RFINAL', $_REQUEST['DIRECCIONRFINAL']);
    $RFINAL->__SET('CONTACTO1_RFINAL', $_REQUEST['CONTACTORFINAL1']);
    $RFINAL->__SET('CARGO1_RFINAL', $_REQUEST['CARGORFINAL1']);
    $RFINAL->__SET('EMAIL1_RFINAL', $_REQUEST['EMAILRFINAL1']);
    $RFINAL->__SET('CONTACTO2_RFINAL', $_REQUEST['CONTACTORFINAL2']);
    $RFINAL->__SET('CARGO2_RFINAL', $_REQUEST['CARGORFINAL2']);
    $RFINAL->__SET('EMAIL2_RFINAL', $_REQUEST['EMAILRFINAL2']);
    $RFINAL->__SET('CONTACTO3_RFINAL', $_REQUEST['CONTACTORFINAL3']);
    $RFINAL->__SET('CARGO3_RFINAL', $_REQUEST['CARGORFINAL3']);
    $RFINAL->__SET('EMAIL3_RFINAL', $_REQUEST['EMAILRFINAL3']);
    $RFINAL->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
    $RFINAL->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $RFINAL->__SET('ID_USUARIOI', $IDUSUARIOS);
    $RFINAL->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $RFINAL_ADO->agregarRfinal($RFINAL);
    //REDIRECCIONAR A PAGINA registroRfinal.php
    echo "<script type='text/javascript'> location.href ='registroRfinal.php';</script>";
}
//OPERACION EDICION DE FILA
if (isset($_REQUEST['EDITAR'])) {
    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO  
    $RFINAL->__SET('NOMBRE_RFINAL', $_REQUEST['NOMBRERFINAL']);
    $RFINAL->__SET('DIRECCION_RFINAL', $_REQUEST['DIRECCIONRFINAL']);
    $RFINAL->__SET('CONTACTO1_RFINAL', $_REQUEST['CONTACTORFINAL1']);
    $RFINAL->__SET('CARGO1_RFINAL', $_REQUEST['CARGORFINAL1']);
    $RFINAL->__SET('EMAIL1_RFINAL', $_REQUEST['EMAILRFINAL1']);
    $RFINAL->__SET('CONTACTO2_RFINAL', $_REQUEST['CONTACTORFINAL2']);
    $RFINAL->__SET('CARGO2_RFINAL', $_REQUEST['CARGORFINAL2']);
    $RFINAL->__SET('EMAIL2_RFINAL', $_REQUEST['EMAILRFINAL2']);
    $RFINAL->__SET('CONTACTO3_RFINAL', $_REQUEST['CONTACTORFINAL3']);
    $RFINAL->__SET('CARGO3_RFINAL', $_REQUEST['CARGORFINAL3']);
    $RFINAL->__SET('EMAIL3_RFINAL', $_REQUEST['EMAILRFINAL3']);
    $RFINAL->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
    $RFINAL->__SET('ID_USUARIOM', $IDUSUARIOS);
    $RFINAL->__SET('ID_RFINAL', $_REQUEST['ID']);
    //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
    $RFINAL_ADO->actualizarRfinal($RFINAL);
    //REDIRECCIONAR A PAGINA registroRfinal.php
    echo "<script type='text/javascript'> location.href ='registroRfinal.php';</script>";
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

        $RFINAL->__SET('ID_RFINAL', $IDOP);
        $RFINAL_ADO->deshabilitar($RFINAL);

        echo "<script type='text/javascript'> location.href ='registroRfinal.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $RFINAL->__SET('ID_RFINAL', $IDOP);
        $RFINAL_ADO->habilitar($RFINAL);
        echo "<script type='text/javascript'> location.href ='registroRfinal.php';</script>";
    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYRFINALID = $RFINAL_ADO->verRfinal($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYRFINALID as $r) :

            $NOMBRERFINAL = "" . $r['NOMBRE_RFINAL'];
            $DIRECCIONRFINAL = "" . $r['DIRECCION_RFINAL'];
            $CONTACTORFINAL1 = "" . $r['CONTACTO1_RFINAL'];
            $CARGORFINAL1 = "" . $r['CARGO1_RFINAL'];
            $EMAILRFINAL1 = "" . $r['EMAIL1_RFINAL'];
            $CONTACTORFINAL2 = "" . $r['CONTACTO2_RFINAL'];
            $CARGORFINAL2 = "" . $r['CARGO2_RFINAL'];
            $EMAILRFINAL2 = "" . $r['EMAIL2_RFINAL'];
            $CONTACTORFINAL3 = "" . $r['CONTACTO3_RFINAL'];
            $CARGORFINAL3 = "" . $r['CARGO3_RFINAL'];
            $EMAILRFINAL3 = "" . $r['EMAIL3_RFINAL'];
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
        $ARRAYRFINALID = $RFINAL_ADO->verRfinal($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYRFINALID as $r) :
            $NOMBRERFINAL = "" . $r['NOMBRE_RFINAL'];
            $DIRECCIONRFINAL = "" . $r['DIRECCION_RFINAL'];
            $CONTACTORFINAL1 = "" . $r['CONTACTO1_RFINAL'];
            $CARGORFINAL1 = "" . $r['CARGO1_RFINAL'];
            $EMAILRFINAL1 = "" . $r['EMAIL1_RFINAL'];
            $CONTACTORFINAL2 = "" . $r['CONTACTO2_RFINAL'];
            $CARGORFINAL2 = "" . $r['CARGO2_RFINAL'];
            $EMAILRFINAL2 = "" . $r['EMAIL2_RFINAL'];
            $CONTACTORFINAL3 = "" . $r['CONTACTO3_RFINAL'];
            $CARGORFINAL3 = "" . $r['CARGO3_RFINAL'];
            $EMAILRFINAL3 = "" . $r['EMAIL3_RFINAL'];
            $CIUDAD = "" . $r['ID_CIUDAD'];
        endforeach;
    }
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Recibidor final</title>
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

                    NOMBRERFINAL = document.getElementById("NOMBRERFINAL").value;
                    DIRECCIONRFINAL = document.getElementById("DIRECCIONRFINAL").value;
                    CONTACTORFINAL1 = document.getElementById("CONTACTORFINAL1").value;
                    CARGORFINAL1 = document.getElementById("CARGORFINAL1").value;
                    EMAILRFINAL1 = document.getElementById("EMAILRFINAL1").value;
                    CONTACTORFINAL2 = document.getElementById("CONTACTORFINAL2").value;
                    CARGORFINAL2 = document.getElementById("CARGORFINAL2").value;
                    EMAILRFINAL2 = document.getElementById("EMAILRFINAL2").value;
                    CONTACTORFINAL3 = document.getElementById("CONTACTORFINAL3").value;
                    CARGORFINAL3 = document.getElementById("CARGORFINAL3").value;
                    EMAILRFINAL3 = document.getElementById("EMAILRFINAL3").value;
                    CIUDAD = document.getElementById("CIUDAD").selectedIndex;


                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";
                    document.getElementById('val_contacto1').innerHTML = "";
                    document.getElementById('val_cargo1').innerHTML = "";
                    document.getElementById('val_email1').innerHTML = "";
                    document.getElementById('val_contacto2').innerHTML = "";
                    document.getElementById('val_cargo2').innerHTML = "";
                    document.getElementById('val_email2').innerHTML = "";
                    document.getElementById('val_contacto3').innerHTML = "";
                    document.getElementById('val_cargo3').innerHTML = "";
                    document.getElementById('val_email3').innerHTML = "";
                    document.getElementById('val_ciudad').innerHTML = "";



                    if (NOMBRERFINAL == null || NOMBRERFINAL.length == 0 || /^\s+$/.test(NOMBRERFINAL)) {
                        document.form_reg_dato.NOMBRERFINAL.focus();
                        document.form_reg_dato.NOMBRERFINAL.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRERFINAL.style.borderColor = "#4AF575";



                    if (DIRECCIONRFINAL == null || DIRECCIONRFINAL.length == 0 || /^\s+$/.test(DIRECCIONRFINAL)) {
                        document.form_reg_dato.DIRECCIONRFINAL.focus();
                        document.form_reg_dato.DIRECCIONRFINAL.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCIONRFINAL.style.borderColor = "#4AF575";
                    /*
                       if (CIUDAD == null || CIUDAD == 0) {
                           document.form_reg_dato.CIUDAD.focus();
                           document.form_reg_dato.CIUDAD.style.borderColor = "#FF0000";
                           document.getElementById('val_ciudad').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                           return false;
                       }
                       document.form_reg_dato.CIUDAD.style.borderColor = "#4AF575";


                       if (CONTACTORFINAL1 == null || CONTACTORFINAL1.length == 0 || /^\s+$/.test(CONTACTORFINAL1)) {
                           document.form_reg_dato.CONTACTORFINAL1.focus();
                           document.form_reg_dato.CONTACTORFINAL1.style.borderColor = "#FF0000";
                           document.getElementById('val_contacto1').innerHTML = "NO A INGRESADO DATO";
                           return false;
                       }
                       document.form_reg_dato.CONTACTORFINAL1.style.borderColor = "#4AF575";



                       if (CARGORFINAL1 == null || CARGORFINAL1.length == 0 || /^\s+$/.test(CARGORFINAL1)) {
                           document.form_reg_dato.CARGORFINAL1.focus();
                           document.form_reg_dato.CARGORFINAL1.style.borderColor = "#FF0000";
                           document.getElementById('val_cargo1').innerHTML = "NO A INGRESADO DATO";
                           return false;
                       }
                       document.form_reg_dato.CARGORFINAL1.style.borderColor = "#4AF575";



                       if (EMAILRFINAL1 == null || EMAILRFINAL1.length == 0 || /^\s+$/.test(EMAILRFINAL1)) {
                           document.form_reg_dato.EMAILRFINAL1.focus();
                           document.form_reg_dato.EMAILRFINAL1.style.borderColor = "#FF0000";
                           document.getElementById('val_email1').innerHTML = "NO A INGRESADO DATO";
                           return false;
                       }
                       document.form_reg_dato.EMAILRFINAL1.style.borderColor = "#4AF575";


                       if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                               .test(EMAILRFINAL1))) {
                           document.form_reg_dato.EMAILRFINAL1.focus();
                           document.form_reg_dato.EMAILRFINAL1.style.borderColor = "#ff0000";
                           document.getElementById('val_email1').innerHTML = "FORMATO DE CORREO INCORRECTO";
                           return false;
                       }
                       document.form_reg_dato.EMAILRFINAL1.style.borderColor = "#4AF575";



                       if (CONTACTORFINAL2 == null || CONTACTORFINAL2.length == 0 || /^\s+$/.test(CONTACTORFINAL2)) {
                           document.form_reg_dato.CONTACTORFINAL2.focus();
                           document.form_reg_dato.CONTACTORFINAL2.style.borderColor = "#FF0000";
                           document.getElementById('val_contacto2').innerHTML = "NO A INGRESADO DATO";
                           return false;
                       }
                       document.form_reg_dato.CONTACTORFINAL2.style.borderColor = "#4AF575";



                       if (CARGORFINAL2 == null || CARGORFINAL2.length == 0 || /^\s+$/.test(CARGORFINAL2)) {
                           document.form_reg_dato.CARGORFINAL2.focus();
                           document.form_reg_dato.CARGORFINAL2.style.borderColor = "#FF0000";
                           document.getElementById('val_cargo2').innerHTML = "NO A INGRESADO DATO";
                           return false;
                       }
                       document.form_reg_dato.CARGORFINAL2.style.borderColor = "#4AF575";



                       if (EMAILRFINAL2 == null || EMAILRFINAL2.length == 0 || /^\s+$/.test(EMAILRFINAL2)) {
                           document.form_reg_dato.EMAILRFINAL2.focus();
                           document.form_reg_dato.EMAILRFINAL2.style.borderColor = "#FF0000";
                           document.getElementById('val_email2').innerHTML = "NO A INGRESADO DATO";
                           return false;
                       }
                       document.form_reg_dato.EMAILRFINAL2.style.borderColor = "#4AF575";


                       if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                               .test(EMAILRFINAL2))) {
                           document.form_reg_dato.EMAILRFINAL2.focus();
                           document.form_reg_dato.EMAILRFINAL2.style.borderColor = "#ff0000";
                           document.getElementById('val_email2').innerHTML = "FORMATO DE CORREO INCORRECTO";
                           return false;
                       }
                       document.form_reg_dato.EMAILRFINAL2.style.borderColor = "#4AF575";

                       if (CONTACTORFINAL3 == null || CONTACTORFINAL3.length == 0 || /^\s+$/.test(CONTACTORFINAL3)) {
                           document.form_reg_dato.CONTACTORFINAL3.focus();
                           document.form_reg_dato.CONTACTORFINAL3.style.borderColor = "#FF0000";
                           document.getElementById('val_contacto3').innerHTML = "NO A INGRESADO DATO";
                           return false;
                       }
                       document.form_reg_dato.CONTACTORFINAL3.style.borderColor = "#4AF575";



                       if (CARGORFINAL3 == null || CARGORFINAL3.length == 0 || /^\s+$/.test(CARGORFINAL3)) {
                           document.form_reg_dato.CARGORFINAL3.focus();
                           document.form_reg_dato.CARGORFINAL3.style.borderColor = "#FF0000";
                           document.getElementById('val_cargo3').innerHTML = "NO A INGRESADO DATO";
                           return false;
                       }
                       document.form_reg_dato.CARGORFINAL3.style.borderColor = "#4AF575";



                       if (EMAILRFINAL3 == null || EMAILRFINAL3.length == 0 || /^\s+$/.test(EMAILRFINAL3)) {
                           document.form_reg_dato.EMAILRFINAL3.focus();
                           document.form_reg_dato.EMAILRFINAL3.style.borderColor = "#FF0000";
                           document.getElementById('val_email3').innerHTML = "NO A INGRESADO DATO";
                           return false;
                       }
                       document.form_reg_dato.EMAILRFINAL3.style.borderColor = "#4AF575";


                       if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                               .test(EMAILRFINAL3))) {
                           document.form_reg_dato.EMAILRFINAL3.focus();
                           document.form_reg_dato.EMAILRFINAL3.style.borderColor = "#ff0000";
                           document.getElementById('val_email3').innerHTML = "FORMATO DE CORREO INCORRECTO";
                           return false;
                       }
                       document.form_reg_dato.EMAILRFINAL3.style.borderColor = "#4AF575";

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
                                <h3 class="page-title">Recibidor final</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Instructivo</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroRfinal.php"> Operaciones Recibidorfin al</a>
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
                                    <form class="form" role="form" method="post" name="form_reg_dato" onsubmit="return validacion()">
                                        <div class="box-body">
                                            <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Registro
                                            </h4>
                                            <hr class="my-15">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Nombre Rfinal" id="NOMBRERFINAL" name="NOMBRERFINAL" value="<?php echo $NOMBRERFINAL; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Direccion </label>
                                                        <input type="text" class="form-control" placeholder="Direccion Rfinal" id="DIRECCIONRFINAL" name="DIRECCIONRFINAL" value="<?php echo $DIRECCIONRFINAL; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_direccion" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
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
                                            </div>
                                            <label>Contacto </label>
                                            <hr class="my-15">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Contacto 1</label>
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto 1 Rfinal" id="CONTACTORFINAL1" name="CONTACTORFINAL1" value="<?php echo $CONTACTORFINAL1; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto1" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Cargo 1</label>
                                                        <input type="text" class="form-control" placeholder="Cargo Contacto 1 Rfinal" id="CARGORFINAL1" name="CARGORFINAL1" value="<?php echo $CARGORFINAL1; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_cargo1" class="validacion"> </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Email 1</label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto 1 Rfinal" id="EMAILRFINAL1" name="EMAILRFINAL1" value="<?php echo $EMAILRFINAL1; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email1" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Contacto 2</label>
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto 2 Rfinal" id="CONTACTORFINAL2" name="CONTACTORFINAL2" value="<?php echo $CONTACTORFINAL2; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto2" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Cargo 2</label>
                                                        <input type="text" class="form-control" placeholder="Cargo Contacto 2 Rfinal" id="CARGORFINAL2" name="CARGORFINAL2" value="<?php echo $CARGORFINAL2; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_cargo2" class="validacion"> </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Email 2</label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto 2 Rfinal" id="EMAILRFINAL2" name="EMAILRFINAL2" value="<?php echo $EMAILRFINAL2; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email2" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Contacto 3</label>
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto 3 Rfinal" id="CONTACTORFINAL3" name="CONTACTORFINAL3" value="<?php echo $CONTACTORFINAL3; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto3" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Cargo 3</label>
                                                        <input type="text" class="form-control" placeholder="Cargo Contacto 3 Rfinal" id="CARGORFINAL3" name="CARGORFINAL3" value="<?php echo $CARGORFINAL3; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_cargo3" class="validacion"> </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Email 3</label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto 3 Rfinal" id="EMAILRFINAL3" name="EMAILRFINAL3" value="<?php echo $EMAILRFINAL3; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email3" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroRfinal.php'); ">
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
                                        <h4 class="box-title">Registros</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="listar" class="table table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="center">
                                                        <th>Numero </th>
                                                        <th>Nombre </th>
                                                        <th>Operaciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYRFINAL as $r) : ?>
                                                        <tr class="center">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['NUMERO_RFINAL']; ?>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $r['NOMBRE_RFINAL']; ?></td>
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown">
                                                                                <i class="glyphicon glyphicon-cog"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_RFINAL']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroRfinal" />
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