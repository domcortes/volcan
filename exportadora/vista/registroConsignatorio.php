<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/CIUDAD_ADO.php';

include_once '../controlador/CONSIGNATARIO_ADO.php';
include_once '../modelo/CONSIGNATARIO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$CIUDAD_ADO =  new CIUDAD_ADO();

$CONSIGNATARIO_ADO =  new CONSIGNATARIO_ADO();
//INIICIALIZAR MODELO
$CONSIGNATARIO =  new CONSIGNATARIO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$NOMBRECONSIGNATARIO = "";
$DIRECCIONCONSIGNATARIO = "";
$CONTACTOCONSIGNATARIO1 = "";
$CARGOCONSIGNATARIO1 = "";
$EMAILCONSIGNATARIO1 = "";
$CONTACTOCONSIGNATARIO2 = "";
$CARGOCONSIGNATARIO2 = "";
$EMAILCONSIGNATARIO2 = "";
$CONTACTOCONSIGNATARIO3 = "";
$CARGOCONSIGNATARIO3 = "";
$EMAILCONSIGNATARIO3 = "";
$CIUDAD = "";
$NUMERO="";



$SINO = "";


//INICIALIZAR ARREGLOS
$ARRAYCONSIGNATARIO = "";
$ARRAYCONSIGNATARIOID = "";
$ARRAYCIUDAD = "";
$ARRAYNUMERO="";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYCONSIGNATARIO = $CONSIGNATARIO_ADO->listarConsignatorioPorEmpresaCBX($EMPRESAS);
$ARRAYCIUDAD = $CIUDAD_ADO->listarCiudadCBX();
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrl.php";




//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['GUARDAR'])) {

    $ARRAYNUMERO = $CONSIGNATARIO_ADO->obtenerNumero($EMPRESAS);
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;

    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $CONSIGNATARIO->__SET('NUMERO_CONSIGNATARIO', $NUMERO);
    $CONSIGNATARIO->__SET('NOMBRE_CONSIGNATARIO', $_REQUEST['NOMBRECONSIGNATARIO']);
    $CONSIGNATARIO->__SET('DIRECCION_CONSIGNATARIO', $_REQUEST['DIRECCIONCONSIGNATARIO']);
    $CONSIGNATARIO->__SET('CONTACTO1_CONSIGNATARIO', $_REQUEST['CONTACTOCONSIGNATARIO1']);
    $CONSIGNATARIO->__SET('CARGO1_CONSIGNATARIO', $_REQUEST['CARGOCONSIGNATARIO1']);
    $CONSIGNATARIO->__SET('EMAIL1_CONSIGNATARIO', $_REQUEST['EMAILCONSIGNATARIO1']);
    $CONSIGNATARIO->__SET('CONTACTO2_CONSIGNATARIO', $_REQUEST['CONTACTOCONSIGNATARIO2']);
    $CONSIGNATARIO->__SET('CARGO2_CONSIGNATARIO', $_REQUEST['CARGOCONSIGNATARIO2']);
    $CONSIGNATARIO->__SET('EMAIL2_CONSIGNATARIO', $_REQUEST['EMAILCONSIGNATARIO2']);
    $CONSIGNATARIO->__SET('CONTACTO3_CONSIGNATARIO', $_REQUEST['CONTACTOCONSIGNATARIO3']);
    $CONSIGNATARIO->__SET('CARGO3_CONSIGNATARIO', $_REQUEST['CARGOCONSIGNATARIO3']);
    $CONSIGNATARIO->__SET('EMAIL3_CONSIGNATARIO', $_REQUEST['EMAILCONSIGNATARIO3']);
    $CONSIGNATARIO->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
    $CONSIGNATARIO->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $CONSIGNATARIO->__SET('ID_USUARIOI', $IDUSUARIOS);
    $CONSIGNATARIO->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $CONSIGNATARIO_ADO->agregarConsignatorio($CONSIGNATARIO);
    //REDIRECCIONAR A PAGINA registroConsignatorio.php
    echo "<script type='text/javascript'> location.href ='registroConsignatorio.php';</script>";
}
//OPERACION EDICION DE FILA
if (isset($_REQUEST['EDITAR'])) {
    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO  
    $CONSIGNATARIO->__SET('NOMBRE_CONSIGNATARIO', $_REQUEST['NOMBRECONSIGNATARIO']);
    $CONSIGNATARIO->__SET('DIRECCION_CONSIGNATARIO', $_REQUEST['DIRECCIONCONSIGNATARIO']);
    $CONSIGNATARIO->__SET('CONTACTO1_CONSIGNATARIO', $_REQUEST['CONTACTOCONSIGNATARIO1']);
    $CONSIGNATARIO->__SET('CARGO1_CONSIGNATARIO', $_REQUEST['CARGOCONSIGNATARIO1']);
    $CONSIGNATARIO->__SET('EMAIL1_CONSIGNATARIO', $_REQUEST['EMAILCONSIGNATARIO1']);
    $CONSIGNATARIO->__SET('CONTACTO2_CONSIGNATARIO', $_REQUEST['CONTACTOCONSIGNATARIO2']);
    $CONSIGNATARIO->__SET('CARGO2_CONSIGNATARIO', $_REQUEST['CARGOCONSIGNATARIO2']);
    $CONSIGNATARIO->__SET('EMAIL2_CONSIGNATARIO', $_REQUEST['EMAILCONSIGNATARIO2']);
    $CONSIGNATARIO->__SET('CONTACTO3_CONSIGNATARIO', $_REQUEST['CONTACTOCONSIGNATARIO3']);
    $CONSIGNATARIO->__SET('CARGO3_CONSIGNATARIO', $_REQUEST['CARGOCONSIGNATARIO3']);
    $CONSIGNATARIO->__SET('EMAIL3_CONSIGNATARIO', $_REQUEST['EMAILCONSIGNATARIO3']);
    $CONSIGNATARIO->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
    $CONSIGNATARIO->__SET('ID_USUARIOM', $IDUSUARIOS);
    $CONSIGNATARIO->__SET('ID_CONSIGNATARIO', $_REQUEST['ID']);
    //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
    $CONSIGNATARIO_ADO->actualizarConsignatorio($CONSIGNATARIO);
    //REDIRECCIONAR A PAGINA registroConsignatorio.php
    echo "<script type='text/javascript'> location.href ='registroConsignatorio.php';</script>";
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

        $CONSIGNATARIO->__SET('ID_CONSIGNATARIO', $IDOP);
        $CONSIGNATARIO_ADO->deshabilitar($CONSIGNATARIO);

        echo "<script type='text/javascript'> location.href ='registroConsignatorio.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $CONSIGNATARIO->__SET('ID_CONSIGNATARIO', $IDOP);
        $CONSIGNATARIO_ADO->habilitar($CONSIGNATARIO);
        echo "<script type='text/javascript'> location.href ='registroConsignatorio.php';</script>";
    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYCONSIGNATARIOID = $CONSIGNATARIO_ADO->verConsignatorio($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYCONSIGNATARIOID as $r) :

            $NOMBRECONSIGNATARIO = "" . $r['NOMBRE_CONSIGNATARIO'];
            $DIRECCIONCONSIGNATARIO = "" . $r['DIRECCION_CONSIGNATARIO'];
            $CONTACTOCONSIGNATARIO1 = "" . $r['CONTACTO1_CONSIGNATARIO'];
            $CARGOCONSIGNATARIO1 = "" . $r['CARGO1_CONSIGNATARIO'];
            $EMAILCONSIGNATARIO1 = "" . $r['EMAIL1_CONSIGNATARIO'];
            $CONTACTOCONSIGNATARIO2 = "" . $r['CONTACTO2_CONSIGNATARIO'];
            $CARGOCONSIGNATARIO2 = "" . $r['CARGO2_CONSIGNATARIO'];
            $EMAILCONSIGNATARIO2 = "" . $r['EMAIL2_CONSIGNATARIO'];
            $CONTACTOCONSIGNATARIO3 = "" . $r['CONTACTO3_CONSIGNATARIO'];
            $CARGOCONSIGNATARIO3 = "" . $r['CARGO3_CONSIGNATARIO'];
            $EMAILCONSIGNATARIO3 = "" . $r['EMAIL3_CONSIGNATARIO'];
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
        $ARRAYCONSIGNATARIOID = $CONSIGNATARIO_ADO->verConsignatorio($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYCONSIGNATARIOID as $r) :
            $NOMBRECONSIGNATARIO = "" . $r['NOMBRE_CONSIGNATARIO'];
            $DIRECCIONCONSIGNATARIO = "" . $r['DIRECCION_CONSIGNATARIO'];
            $CONTACTOCONSIGNATARIO1 = "" . $r['CONTACTO1_CONSIGNATARIO'];
            $CARGOCONSIGNATARIO1 = "" . $r['CARGO1_CONSIGNATARIO'];
            $EMAILCONSIGNATARIO1 = "" . $r['EMAIL1_CONSIGNATARIO'];
            $CONTACTOCONSIGNATARIO2 = "" . $r['CONTACTO2_CONSIGNATARIO'];
            $CARGOCONSIGNATARIO2 = "" . $r['CARGO2_CONSIGNATARIO'];
            $EMAILCONSIGNATARIO2 = "" . $r['EMAIL2_CONSIGNATARIO'];
            $CONTACTOCONSIGNATARIO3 = "" . $r['CONTACTO3_CONSIGNATARIO'];
            $CARGOCONSIGNATARIO3 = "" . $r['CARGO3_CONSIGNATARIO'];
            $EMAILCONSIGNATARIO3 = "" . $r['EMAIL3_CONSIGNATARIO'];
            $CIUDAD = "" . $r['ID_CIUDAD'];
        endforeach;
    }
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Consignatorio</title>
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

                    NOMBRECONSIGNATARIO = document.getElementById("NOMBRECONSIGNATARIO").value;
                    DIRECCIONCONSIGNATARIO = document.getElementById("DIRECCIONCONSIGNATARIO").value;
                    CONTACTOCONSIGNATARIO1 = document.getElementById("CONTACTOCONSIGNATARIO1").value;
                    CARGOCONSIGNATARIO1 = document.getElementById("CARGOCONSIGNATARIO1").value;
                    EMAILCONSIGNATARIO1 = document.getElementById("EMAILCONSIGNATARIO1").value;
                    CONTACTOCONSIGNATARIO2 = document.getElementById("CONTACTOCONSIGNATARIO2").value;
                    CARGOCONSIGNATARIO2 = document.getElementById("CARGOCONSIGNATARIO2").value;
                    EMAILCONSIGNATARIO2 = document.getElementById("EMAILCONSIGNATARIO2").value;
                    CONTACTOCONSIGNATARIO3 = document.getElementById("CONTACTOCONSIGNATARIO3").value;
                    CARGOCONSIGNATARIO3 = document.getElementById("CARGOCONSIGNATARIO3").value;
                    EMAILCONSIGNATARIO3 = document.getElementById("EMAILCONSIGNATARIO3").value;
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



                    if (NOMBRECONSIGNATARIO == null || NOMBRECONSIGNATARIO.length == 0 || /^\s+$/.test(NOMBRECONSIGNATARIO)) {
                        document.form_reg_dato.NOMBRECONSIGNATARIO.focus();
                        document.form_reg_dato.NOMBRECONSIGNATARIO.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRECONSIGNATARIO.style.borderColor = "#4AF575";



                    if (DIRECCIONCONSIGNATARIO == null || DIRECCIONCONSIGNATARIO.length == 0 || /^\s+$/.test(DIRECCIONCONSIGNATARIO)) {
                        document.form_reg_dato.DIRECCIONCONSIGNATARIO.focus();
                        document.form_reg_dato.DIRECCIONCONSIGNATARIO.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCIONCONSIGNATARIO.style.borderColor = "#4AF575";

                    /*
                    if (CIUDAD == null || CIUDAD == 0) {
                        document.form_reg_dato.CIUDAD.focus();
                        document.form_reg_dato.CIUDAD.style.borderColor = "#FF0000";
                        document.getElementById('val_ciudad').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.CIUDAD.style.borderColor = "#4AF575";


                    if (CONTACTOCONSIGNATARIO1 == null || CONTACTOCONSIGNATARIO1.length == 0 || /^\s+$/.test(CONTACTOCONSIGNATARIO1)) {
                        document.form_reg_dato.CONTACTOCONSIGNATARIO1.focus();
                        document.form_reg_dato.CONTACTOCONSIGNATARIO1.style.borderColor = "#FF0000";
                        document.getElementById('val_contacto1').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CONTACTOCONSIGNATARIO1.style.borderColor = "#4AF575";



                    if (CARGOCONSIGNATARIO1 == null || CARGOCONSIGNATARIO1.length == 0 || /^\s+$/.test(CARGOCONSIGNATARIO1)) {
                        document.form_reg_dato.CARGOCONSIGNATARIO1.focus();
                        document.form_reg_dato.CARGOCONSIGNATARIO1.style.borderColor = "#FF0000";
                        document.getElementById('val_cargo1').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CARGOCONSIGNATARIO1.style.borderColor = "#4AF575";



                    if (EMAILCONSIGNATARIO1 == null || EMAILCONSIGNATARIO1.length == 0 || /^\s+$/.test(EMAILCONSIGNATARIO1)) {
                        document.form_reg_dato.EMAILCONSIGNATARIO1.focus();
                        document.form_reg_dato.EMAILCONSIGNATARIO1.style.borderColor = "#FF0000";
                        document.getElementById('val_email1').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EMAILCONSIGNATARIO1.style.borderColor = "#4AF575";


                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                            .test(EMAILCONSIGNATARIO1))) {
                        document.form_reg_dato.EMAILCONSIGNATARIO1.focus();
                        document.form_reg_dato.EMAILCONSIGNATARIO1.style.borderColor = "#ff0000";
                        document.getElementById('val_email1').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.EMAILCONSIGNATARIO1.style.borderColor = "#4AF575";



                    if (CONTACTOCONSIGNATARIO2 == null || CONTACTOCONSIGNATARIO2.length == 0 || /^\s+$/.test(CONTACTOCONSIGNATARIO2)) {
                        document.form_reg_dato.CONTACTOCONSIGNATARIO2.focus();
                        document.form_reg_dato.CONTACTOCONSIGNATARIO2.style.borderColor = "#FF0000";
                        document.getElementById('val_contacto2').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CONTACTOCONSIGNATARIO2.style.borderColor = "#4AF575";



                    if (CARGOCONSIGNATARIO2 == null || CARGOCONSIGNATARIO2.length == 0 || /^\s+$/.test(CARGOCONSIGNATARIO2)) {
                        document.form_reg_dato.CARGOCONSIGNATARIO2.focus();
                        document.form_reg_dato.CARGOCONSIGNATARIO2.style.borderColor = "#FF0000";
                        document.getElementById('val_cargo2').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CARGOCONSIGNATARIO2.style.borderColor = "#4AF575";



                    if (EMAILCONSIGNATARIO2 == null || EMAILCONSIGNATARIO2.length == 0 || /^\s+$/.test(EMAILCONSIGNATARIO2)) {
                        document.form_reg_dato.EMAILCONSIGNATARIO2.focus();
                        document.form_reg_dato.EMAILCONSIGNATARIO2.style.borderColor = "#FF0000";
                        document.getElementById('val_email2').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EMAILCONSIGNATARIO2.style.borderColor = "#4AF575";


                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                            .test(EMAILCONSIGNATARIO2))) {
                        document.form_reg_dato.EMAILCONSIGNATARIO2.focus();
                        document.form_reg_dato.EMAILCONSIGNATARIO2.style.borderColor = "#ff0000";
                        document.getElementById('val_email2').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.EMAILCONSIGNATARIO2.style.borderColor = "#4AF575";

                    if (CONTACTOCONSIGNATARIO3 == null || CONTACTOCONSIGNATARIO3.length == 0 || /^\s+$/.test(CONTACTOCONSIGNATARIO3)) {
                        document.form_reg_dato.CONTACTOCONSIGNATARIO3.focus();
                        document.form_reg_dato.CONTACTOCONSIGNATARIO3.style.borderColor = "#FF0000";
                        document.getElementById('val_contacto3').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CONTACTOCONSIGNATARIO3.style.borderColor = "#4AF575";



                    if (CARGOCONSIGNATARIO3 == null || CARGOCONSIGNATARIO3.length == 0 || /^\s+$/.test(CARGOCONSIGNATARIO3)) {
                        document.form_reg_dato.CARGOCONSIGNATARIO3.focus();
                        document.form_reg_dato.CARGOCONSIGNATARIO3.style.borderColor = "#FF0000";
                        document.getElementById('val_cargo3').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CARGOCONSIGNATARIO3.style.borderColor = "#4AF575";



                    if (EMAILCONSIGNATARIO3 == null || EMAILCONSIGNATARIO3.length == 0 || /^\s+$/.test(EMAILCONSIGNATARIO3)) {
                        document.form_reg_dato.EMAILCONSIGNATARIO3.focus();
                        document.form_reg_dato.EMAILCONSIGNATARIO3.style.borderColor = "#FF0000";
                        document.getElementById('val_email3').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EMAILCONSIGNATARIO3.style.borderColor = "#4AF575";


                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                            .test(EMAILCONSIGNATARIO3))) {
                        document.form_reg_dato.EMAILCONSIGNATARIO3.focus();
                        document.form_reg_dato.EMAILCONSIGNATARIO3.style.borderColor = "#ff0000";
                        document.getElementById('val_email3').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.EMAILCONSIGNATARIO3.style.borderColor = "#4AF575";

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
                                <h3 class="page-title">Consignatorio</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Instructivo</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroConsignatorio.php"> Operaciones Consignatorio</a>
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
                                                        <input type="text" class="form-control" placeholder="Nombre Consignatorio" id="NOMBRECONSIGNATARIO" name="NOMBRECONSIGNATARIO" value="<?php echo $NOMBRECONSIGNATARIO; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Direccion </label>
                                                        <input type="text" class="form-control" placeholder="Direccion Consignatorio" id="DIRECCIONCONSIGNATARIO" name="DIRECCIONCONSIGNATARIO" value="<?php echo $DIRECCIONCONSIGNATARIO; ?>" <?php echo $DISABLED; ?> />
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
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto 1 Consignatorio" id="CONTACTOCONSIGNATARIO1" name="CONTACTOCONSIGNATARIO1" value="<?php echo $CONTACTOCONSIGNATARIO1; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto1" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Cargo 1</label>
                                                        <input type="text" class="form-control" placeholder="Cargo Contacto 1 Consignatorio" id="CARGOCONSIGNATARIO1" name="CARGOCONSIGNATARIO1" value="<?php echo $CARGOCONSIGNATARIO1; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_cargo1" class="validacion"> </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Email 1</label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto 1 Consignatorio" id="EMAILCONSIGNATARIO1" name="EMAILCONSIGNATARIO1" value="<?php echo $EMAILCONSIGNATARIO1; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email1" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Contacto 2</label>
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto 2 Consignatorio" id="CONTACTOCONSIGNATARIO2" name="CONTACTOCONSIGNATARIO2" value="<?php echo $CONTACTOCONSIGNATARIO2; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto2" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Cargo 2</label>
                                                        <input type="text" class="form-control" placeholder="Cargo Contacto 2 Consignatorio" id="CARGOCONSIGNATARIO2" name="CARGOCONSIGNATARIO2" value="<?php echo $CARGOCONSIGNATARIO2; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_cargo2" class="validacion"> </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Email 2</label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto 2 Consignatorio" id="EMAILCONSIGNATARIO2" name="EMAILCONSIGNATARIO2" value="<?php echo $EMAILCONSIGNATARIO2; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email2" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Contacto 3</label>
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto 3 Consignatorio" id="CONTACTOCONSIGNATARIO3" name="CONTACTOCONSIGNATARIO3" value="<?php echo $CONTACTOCONSIGNATARIO3; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto3" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Cargo 3</label>
                                                        <input type="text" class="form-control" placeholder="Cargo Contacto 3 Consignatorio" id="CARGOCONSIGNATARIO3" name="CARGOCONSIGNATARIO3" value="<?php echo $CARGOCONSIGNATARIO3; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_cargo3" class="validacion"> </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Email 3</label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto 3 Consignatorio" id="EMAILCONSIGNATARIO3" name="EMAILCONSIGNATARIO3" value="<?php echo $EMAILCONSIGNATARIO3; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email3" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroConsignatorio.php'); ">
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
                                                    <?php foreach ($ARRAYCONSIGNATARIO as $r) : ?>
                                                        <tr class="center">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['NUMERO_CONSIGNATARIO']; ?>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $r['NOMBRE_CONSIGNATARIO']; ?></td>
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown">
                                                                                <i class="glyphicon glyphicon-cog"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_CONSIGNATARIO']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroConsignatorio" />
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