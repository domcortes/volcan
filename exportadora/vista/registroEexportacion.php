<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/ESPECIES_ADO.php';
include_once '../controlador/TETIQUETA_ADO.php';
include_once '../controlador/TEMBALAJE_ADO.php';
include_once '../controlador/ECOMERCIAL_ADO.php';



include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../modelo/EEXPORTACION.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$ESPECIES_ADO =  new ESPECIES_ADO();
$TETIQUETA_ADO =  new TETIQUETA_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();
$ECOMERCIAL_ADO =  new ECOMERCIAL_ADO();

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
//INIICIALIZAR MODELO
$EEXPORTACION =  new EEXPORTACION();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$IDOP = "";
$OP = "";
$DISABLED = "";


$CODIGOESTANDAR = "";
$NOMBREESTANDAR = "";
$PESONETOESTANDAR = "";
$ENVASEPALLETESTANDAR = "";
$PESOBRUTOESTANDAR = "";
$PESOPALLETESTANDAR = "";
$PESOENVASESTANDAR = "";
$DESHIDRATACIONESTANDAR = "";
$ESPECIES = "";
$ETIQUETA = "";
$TEMBALAJE = "";
$ECOMERCIAL = "";
$EMBOLSADO = "";
$STOCK = "";
$ESTADO = "";



//INICIALIZAR ARREGLOS
$ARRAYESTANDAR = "";
$ARRAYESTANDARID = "";

$ARRAYESPECIES = "";
$ARRAYETIQUETA = "";
$ARRAYTEMBALAJE = "";
$ARRAYECOMERCIAL = "";
$ARRAYMERCADO = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYESTANDAR = $EEXPORTACION_ADO->listarEstandarPorEmpresaCBX($EMPRESAS);
$ARRAYESPECIES = $ESPECIES_ADO->listarEspeciesCBX();
$ARRAYETIQUETA  = $TETIQUETA_ADO->listarEtiquetaPorEmpresaCBX($EMPRESAS);
$ARRAYTEMBALAJE  = $TEMBALAJE_ADO->listarEmbalajePorEmpresaCBX($EMPRESAS);
$ARRAYECOMERCIAL = $ECOMERCIAL_ADO->listarEcomercialPorEmpresaCBX($EMPRESAS);
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrl.php";



//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {

    //CALCULO DEL PESO ENVASE, BRUTO - NETO
    $PESOENVASESTANDAR = $_REQUEST['PESOBRUTOESTANDAR'] - $_REQUEST['PESONETOESTANDAR'];
    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $EEXPORTACION->__SET('CODIGO_ESTANDAR', $_REQUEST['CODIGOESTANDAR']);
    $EEXPORTACION->__SET('NOMBRE_ESTANDAR', $_REQUEST['NOMBREESTANDAR']);
    $EEXPORTACION->__SET('CANTIDAD_ENVASE_ESTANDAR', $_REQUEST['ENVASEPALLETESTANDAR']);
    $EEXPORTACION->__SET('PESO_NETO_ESTANDAR', $_REQUEST['PESONETOESTANDAR']);
    $EEXPORTACION->__SET('PESO_BRUTO_ESTANDAR', $_REQUEST['PESOBRUTOESTANDAR']);
    $EEXPORTACION->__SET('PESO_ENVASE_ESTANDAR', $PESOENVASESTANDAR);
    $EEXPORTACION->__SET('PESO_PALLET_ESTANDAR', $_REQUEST['PESOPALLETESTANDAR']);
    $EEXPORTACION->__SET('PDESHIDRATACION_ESTANDAR', $_REQUEST['DESHIDRATACIONESTANDAR']);
    $EEXPORTACION->__SET('EMBOLSADO', $_REQUEST['EMBOLSADO']);
    $EEXPORTACION->__SET('STOCK', $_REQUEST['STOCK']);
    $EEXPORTACION->__SET('ID_ESPECIES', $_REQUEST['ESPECIES']);
    $EEXPORTACION->__SET('ID_TETIQUETA', $_REQUEST['ETIQUETA']);
    $EEXPORTACION->__SET('ID_TEMBALAJE', $_REQUEST['TEMBALAJE']);
    $EEXPORTACION->__SET('ID_ECOMERCIAL', $_REQUEST['ECOMERCIAL']);
    $EEXPORTACION->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $EEXPORTACION->__SET('ID_USUARIOI', $IDUSUARIOS);
    $EEXPORTACION->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $EEXPORTACION_ADO->agregarEstandar($EEXPORTACION);
    //REDIRECCIONAR A PAGINA registroEexportacion.php
    echo "<script type='text/javascript'> location.href ='registroEexportacion.php';</script>";
}

//OPERACION DE EDICION DE FILA
if (isset($_REQUEST['EDITAR'])) {
    //CALCULO DEL PESO ENVASE, BRUTO - NETO
    $PESOENVASESTANDAR = $_REQUEST['PESOBRUTOESTANDAR'] - $_REQUEST['PESONETOESTANDAR'];

    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $EEXPORTACION->__SET('CODIGO_ESTANDAR', $_REQUEST['CODIGOESTANDAR']);
    $EEXPORTACION->__SET('NOMBRE_ESTANDAR', $_REQUEST['NOMBREESTANDAR']);
    $EEXPORTACION->__SET('CANTIDAD_ENVASE_ESTANDAR', $_REQUEST['ENVASEPALLETESTANDAR']);
    $EEXPORTACION->__SET('PESO_NETO_ESTANDAR', $_REQUEST['PESONETOESTANDAR']);
    $EEXPORTACION->__SET('PESO_BRUTO_ESTANDAR', $_REQUEST['PESOBRUTOESTANDAR']);
    $EEXPORTACION->__SET('PESO_ENVASE_ESTANDAR', $PESOENVASESTANDAR);
    $EEXPORTACION->__SET('PESO_PALLET_ESTANDAR', $_REQUEST['PESOPALLETESTANDAR']);
    $EEXPORTACION->__SET('PDESHIDRATACION_ESTANDAR', $_REQUEST['DESHIDRATACIONESTANDAR']);
    $EEXPORTACION->__SET('EMBOLSADO', $_REQUEST['EMBOLSADO']);
    $EEXPORTACION->__SET('STOCK', $_REQUEST['STOCK']);
    $EEXPORTACION->__SET('ID_ESPECIES', $_REQUEST['ESPECIES']);
    $EEXPORTACION->__SET('ID_TETIQUETA', $_REQUEST['ETIQUETA']);
    $EEXPORTACION->__SET('ID_TEMBALAJE', $_REQUEST['TEMBALAJE']);
    $EEXPORTACION->__SET('ID_ECOMERCIAL', $_REQUEST['ECOMERCIAL']);
    $EEXPORTACION->__SET('ID_USUARIOM', $IDUSUARIOS);
    $EEXPORTACION->__SET('ID_ESTANDAR', $_REQUEST['ID']);
    //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
    $EEXPORTACION_ADO->actualizarEstandar($EEXPORTACION);
    //REDIRECCIONAR A PAGINA registroEexportacion.php
    echo "<script type='text/javascript'> location.href ='registroEexportacion.php';</script>";
}

//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION Y VISUALIZACION
//PREGUNTA SI LA URL VIENE  CON DATOS "parametro" y "parametro1"
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['parametro'];
    $OP = $_SESSION['parametro1'];



    //IDENTIFICACIONES DE OPERACIONES    //OPERACION DE CAMBIO DE ESTADO
    //0 = DESACTIVAR
    if ($OP == "0") {

        $EEXPORTACION->__SET('ID_ESTANDAR', $IDOP);
        $EEXPORTACION_ADO->deshabilitar($EEXPORTACION);

        echo "<script type='text/javascript'> location.href ='registroEexportacion.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $EEXPORTACION->__SET('ID_ESTANDAR', $IDOP);
        $EEXPORTACION_ADO->habilitar($EEXPORTACION);
        echo "<script type='text/javascript'> location.href ='registroEexportacion.php';</script>";
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYESTANDARID = $EEXPORTACION_ADO->verEstandar($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA


        foreach ($ARRAYESTANDARID as $r) :

            $CODIGOESTANDAR = "" . $r['CODIGO_ESTANDAR'];
            $NOMBREESTANDAR = "" . $r['NOMBRE_ESTANDAR'];
            $ENVASEPALLETESTANDAR = "" . $r['CANTIDAD_ENVASE_ESTANDAR'];
            $PESONETOESTANDAR = "" . $r['PESO_NETO_ESTANDAR'];
            $DESHIDRATACIONESTANDAR = "" . $r['PDESHIDRATACION_ESTANDAR'];
            $PESOBRUTOESTANDAR = "" . $r['PESO_BRUTO_ESTANDAR'];
            $PESOPALLETESTANDAR = "" . $r['PESO_PALLET_ESTANDAR'];
            $PESOENVASESTANDAR = "" . $r['PESO_ENVASE_ESTANDAR'];
            $EMBOLSADO = "" . $r['EMBOLSADO'];
            $STOCK = "" . $r['STOCK'];
            $ESPECIES = "" . $r['ID_ESPECIES'];
            $ETIQUETA = "" . $r['ID_TETIQUETA'];
            $TEMBALAJE = "" . $r['ID_TEMBALAJE'];
            $ECOMERCIAL = "" . $r['ID_ECOMERCIAL'];

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
        $ARRAYESTANDARID = $EEXPORTACION_ADO->verEstandar($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYESTANDARID as $r) :

            $CODIGOESTANDAR = "" . $r['CODIGO_ESTANDAR'];
            $NOMBREESTANDAR = "" . $r['NOMBRE_ESTANDAR'];
            $ENVASEPALLETESTANDAR = "" . $r['CANTIDAD_ENVASE_ESTANDAR'];
            $PESONETOESTANDAR = "" . $r['PESO_NETO_ESTANDAR'];
            $DESHIDRATACIONESTANDAR = "" . $r['PDESHIDRATACION_ESTANDAR'];
            $PESOBRUTOESTANDAR = "" . $r['PESO_BRUTO_ESTANDAR'];
            $PESOPALLETESTANDAR = "" . $r['PESO_PALLET_ESTANDAR'];
            $PESOENVASESTANDAR = "" . $r['PESO_ENVASE_ESTANDAR'];
            $EMBOLSADO = "" . $r['EMBOLSADO'];
            $STOCK = "" . $r['STOCK'];
            $ESPECIES = "" . $r['ID_ESPECIES'];
            $ETIQUETA = "" . $r['ID_TETIQUETA'];
            $TEMBALAJE = "" . $r['ID_TEMBALAJE'];
            $ECOMERCIAL = "" . $r['ID_ECOMERCIAL'];
        endforeach;
    }
}




?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Estandar Exportacion</title>
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


                    CODIGOESTANDAR = document.getElementById("CODIGOESTANDAR").value;
                    NOMBREESTANDAR = document.getElementById("NOMBREESTANDAR").value;
                    PESONETOESTANDAR = document.getElementById("PESONETOESTANDAR").value;
                    PESOBRUTOESTANDAR = document.getElementById("PESOBRUTOESTANDAR").value;
                    ENVASEPALLETESTANDAR = document.getElementById("ENVASEPALLETESTANDAR").value;
                    PESOPALLETESTANDAR = document.getElementById("PESOPALLETESTANDAR").value;
                    PESOENVASESTANDAR = document.getElementById("PESOENVASESTANDAR").value;
                    DESHIDRATACIONESTANDAR = document.getElementById("DESHIDRATACIONESTANDAR").value;

                    ESPECIES = document.getElementById("ESPECIES").selectedIndex;
                    ETIQUETA = document.getElementById("ETIQUETA").selectedIndex;
                    EMBOLSADO = document.getElementById("EMBOLSADO").selectedIndex;
                    STOCK = document.getElementById("STOCK").selectedIndex;
                    TEMBALAJE = document.getElementById("TEMBALAJE").selectedIndex;
                    ECOMERCIAL = document.getElementById("ECOMERCIAL").selectedIndex;

                    document.getElementById('val_codigo').innerHTML = "";
                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_netoee').innerHTML = "";
                    document.getElementById('val_bruto').innerHTML = "";
                    document.getElementById('val_cajapee').innerHTML = "";
                    document.getElementById('val_pallet').innerHTML = "";
                    document.getElementById('val_envase').innerHTML = "";
                    document.getElementById('val_deshidrataciones').innerHTML = "";


                    document.getElementById('val_etiqueta').innerHTML = "";
                    document.getElementById('val_embolsado').innerHTML = "";
                    document.getElementById('val_stock').innerHTML = "";
                    document.getElementById('val_embalaje').innerHTML = "";
                    document.getElementById('val_ec').innerHTML = "";

                    if (CODIGOESTANDAR == null || CODIGOESTANDAR == 0) {
                        document.form_reg_dato.CODIGOESTANDAR.focus();
                        document.form_reg_dato.CODIGOESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_codigo').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CODIGOESTANDAR.style.borderColor = "#4AF575";

                    if (NOMBREESTANDAR == null || NOMBREESTANDAR == 0) {
                        document.form_reg_dato.NOMBREESTANDAR.focus();
                        document.form_reg_dato.NOMBREESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREESTANDAR.style.borderColor = "#4AF575";

                    if (PESONETOESTANDAR == null || PESONETOESTANDAR == "" || PESONETOESTANDAR < 0) {
                        document.form_reg_dato.PESONETOESTANDAR.focus();
                        document.form_reg_dato.PESONETOESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_netoee').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.PESONETOESTANDAR.style.borderColor = "#4AF575";


                    if (PESOBRUTOESTANDAR == null || PESOBRUTOESTANDAR == "" || PESOBRUTOESTANDAR < 0) {
                        document.form_reg_dato.PESOBRUTOESTANDAR.focus();
                        document.form_reg_dato.PESOBRUTOESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_bruto').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.PESONETOESTANDAR.style.borderColor = "#4AF575";

                    if (DESHIDRATACIONESTANDAR == null || DESHIDRATACIONESTANDAR == "" || DESHIDRATACIONESTANDAR < 0) {
                        document.form_reg_dato.DESHIDRATACIONESTANDAR.focus();
                        document.form_reg_dato.DESHIDRATACIONESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_deshidrataciones').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DESHIDRATACIONESTANDAR.style.borderColor = "#4AF575";



                    if (ENVASEPALLETESTANDAR == null || ENVASEPALLETESTANDAR == "") {
                        document.form_reg_dato.ENVASEPALLETESTANDAR.focus();
                        document.form_reg_dato.ENVASEPALLETESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_cajapee').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.ENVASEPALLETESTANDAR.style.borderColor = "#4AF575";


                    if (PESOPALLETESTANDAR == null || PESOPALLETESTANDAR == "" | PESOPALLETESTANDAR < 0) {
                        document.form_reg_dato.PESOPALLETESTANDAR.focus();
                        document.form_reg_dato.PESOPALLETESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_pallet').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.PESOPALLETESTANDAR.style.borderColor = "#4AF575";

                    if (ESPECIES == null || ESPECIES == 0) {
                        document.form_reg_dato.ESPECIES.focus();
                        document.form_reg_dato.ESPECIES.style.borderColor = "#FF0000";
                        document.getElementById('val_especies').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.ESPECIES.style.borderColor = "#4AF575";

                    if (TEMBALAJE == null || TEMBALAJE == 0) {
                        document.form_reg_dato.TEMBALAJE.focus();
                        document.form_reg_dato.TEMBALAJE.style.borderColor = "#FF0000";
                        document.getElementById('val_embalaje').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TEMBALAJE.style.borderColor = "#4AF575";

                    if (ETIQUETA == null || ETIQUETA == 0) {
                        document.form_reg_dato.ETIQUETA.focus();
                        document.form_reg_dato.ETIQUETA.style.borderColor = "#FF0000";
                        document.getElementById('val_etiqueta').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.ETIQUETA.style.borderColor = "#4AF575";

                    if (EMBOLSADO == null || EMBOLSADO == 0) {
                        document.form_reg_dato.EMBOLSADO.focus();
                        document.form_reg_dato.EMBOLSADO.style.borderColor = "#FF0000";
                        document.getElementById('val_embolsado').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.EMBOLSADO.style.borderColor = "#4AF575";

                    if (STOCK == null || STOCK == 0) {
                        document.form_reg_dato.STOCK.focus();
                        document.form_reg_dato.STOCK.style.borderColor = "#FF0000";
                        document.getElementById('val_stock').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.STOCK.style.borderColor = "#4AF575";

                    if (ECOMERCIAL == null || ECOMERCIAL == 0) {
                        document.form_reg_dato.ECOMERCIAL.focus();
                        document.form_reg_dato.ECOMERCIAL.style.borderColor = "#FF0000";
                        document.getElementById('val_ec').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.ECOMERCIAL.style.borderColor = "#4AF575";


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

<body class="hold-transition light-skin  sidebar-mini theme-primary" onload="mueveReloj()">
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
                                <h3 class="page-title">Estandar Exportacion</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores </li>
                                            <li class="breadcrumb-item" aria-current="page">Estandar </li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroEexportacion.php"> Operaciones Estandar Exportacion </a>
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
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Codigo </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Codigo Estandar" id="CODIGOESTANDAR" name="CODIGOESTANDAR" value="<?php echo $CODIGOESTANDAR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_codigo" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Estandar" id="NOMBREESTANDAR" name="NOMBREESTANDAR" value="<?php echo $NOMBREESTANDAR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Peso Neto</label>
                                                        <input type="number" step="0.00001" class="form-control" placeholder="Peso Neto" id="PESONETOESTANDAR" name="PESONETOESTANDAR" value="<?php echo $PESONETOESTANDAR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_netoee" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Peso Bruto </label>
                                                        <input type="number" step="0.00001" class="form-control" placeholder="Peso Bruto" id="PESOBRUTOESTANDAR" name="PESOBRUTOESTANDAR" value="<?php echo $PESOBRUTOESTANDAR ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_bruto" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Peso Envase</label>
                                                        <input type="number" step="0.00001" class="form-control" placeholder="Peso Envase" id="PESOENVASESTANDAR" name="PESOENVASESTANDAR" value="<?php echo $PESOENVASESTANDAR ?>" <?php echo $DISABLED; ?> disabled />
                                                        <label id="val_envase" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>% Deshidratacion </label>
                                                        <input type="number" step="0.01" class="form-control" placeholder="% Deshidratacion" id="DESHIDRATACIONESTANDAR" name="DESHIDRATACIONESTANDAR" value="<?php echo $DESHIDRATACIONESTANDAR ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_deshidrataciones" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Envase Pallet</label>
                                                        <input type="number" class="form-control" placeholder="Envase Pallet " id="ENVASEPALLETESTANDAR" name="ENVASEPALLETESTANDAR" value="<?php echo $ENVASEPALLETESTANDAR ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_cajapee" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Peso Pallet</label>
                                                        <input type="number" class="form-control" step="0.01" placeholder="Peso Pallet" id="PESOPALLETESTANDAR" name="PESOPALLETESTANDAR" value="<?php echo $PESOPALLETESTANDAR ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_pallet" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label> Especies</label>
                                                        <select class="form-control select2" id="ESPECIES" name="ESPECIES" style="width: 100%;" value="<?php echo $ESPECIES; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYESPECIES as $r) : ?>
                                                                <?php if ($ARRAYESPECIES) {    ?>
                                                                    <option value="<?php echo $r['ID_ESPECIES']; ?>" <?php if ($ESPECIES == $r['ID_ESPECIES']) {
                                                                                                                            echo "selected";
                                                                                                                        } ?>>
                                                                        <?php echo $r['NOMBRE_ESPECIES'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>

                                                            <?php endforeach; ?>


                                                        </select>
                                                        <label id="val_especies" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Embalaje</label>
                                                        <select class="form-control select2" id="TEMBALAJE" name="TEMBALAJE" style="width: 100%;" value="<?php echo $TEMBALAJE; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYTEMBALAJE as $r) : ?>
                                                                <?php if ($ARRAYTEMBALAJE) {    ?>
                                                                    <option value="<?php echo $r['ID_TEMBALAJE']; ?>" <?php if ($TEMBALAJE == $r['ID_TEMBALAJE']) {
                                                                                                                            echo "selected";
                                                                                                                        } ?>>
                                                                        <?php echo $r['NOMBRE_TEMBALAJE'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>

                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_embalaje" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Etiqueta</label>
                                                        <select class="form-control select2" id="ETIQUETA" name="ETIQUETA" style="width: 100%;" value="<?php echo $ETIQUETA; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYETIQUETA as $r) : ?>
                                                                <?php if ($ARRAYETIQUETA) {    ?>
                                                                    <option value="<?php echo $r['ID_TETIQUETA']; ?>" <?php if ($ETIQUETA == $r['ID_TETIQUETA']) {
                                                                                                                            echo "selected";
                                                                                                                        } ?>>
                                                                        <?php echo $r['NOMBRE_TETIQUETA'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>

                                                            <?php endforeach; ?>

                                                        </select>
                                                        <label id="val_etiqueta" class="validacion"> </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Embolsado</label>
                                                        <select class="form-control select2" id="EMBOLSADO" name="EMBOLSADO" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <option value="0" <?php if ($EMBOLSADO == "0") {
                                                                                    echo "selected";
                                                                                } ?>>No</option>
                                                            <option value="1" <?php if ($EMBOLSADO == "1") {
                                                                                    echo "selected";
                                                                                } ?>> Si </option>
                                                        </select>
                                                        <label id="val_embolsado" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Stock</label>
                                                        <select class="form-control select2" id="STOCK" name="STOCK" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <option value="0" <?php if ($STOCK == "0") {
                                                                                    echo "selected";
                                                                                } ?>>No</option>
                                                            <option value="1" <?php if ($STOCK == "1") {
                                                                                    echo "selected";
                                                                                } ?>> Si </option>
                                                        </select>
                                                        <label id="val_stock" class="validacion"> </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Estandar Comercial</label>
                                                        <select class="form-control select2" id="ECOMERCIAL" name="ECOMERCIAL" style="width: 100%;" value="<?php echo $ECOMERCIAL; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYECOMERCIAL as $r) : ?>
                                                                <?php if ($ARRAYECOMERCIAL) {    ?>
                                                                    <option value="<?php echo $r['ID_ECOMERCIAL']; ?>" <?php if ($ECOMERCIAL == $r['ID_ECOMERCIAL']) {
                                                                                                                            echo "selected";
                                                                                                                        } ?>>
                                                                        <?php echo $r['NOMBRE_ECOMERCIAL'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>

                                                        </select>
                                                        <label id="val_ec" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroEexportacion.php'); ">
                                                <i class="ti-trash"></i> Cancelar
                                            </button>
                                            <?php if ($OP != "editar") { ?>
                                                <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED; ?>>
                                                    <i class="ti-save-alt"></i> Crear
                                                </button>
                                            <?php } else { ?>
                                                <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="EDITAR" value="EDITAR">
                                                    <i class="ti-save-alt"></i> Editar
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
                                                    <tr class="center">
                                                        <th>Codigo </th>
                                                        <th>Nombre </th>
                                                        <th>Operaciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYESTANDAR as $r) : ?>
                                                        <tr class="center">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['CODIGO_ESTANDAR']; ?>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $r['NOMBRE_ESTANDAR']; ?></td>
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown">
                                                                                <i class="glyphicon glyphicon-cog"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_ESTANDAR']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroEexportacion" />
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