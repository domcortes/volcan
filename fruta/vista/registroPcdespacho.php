<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/USUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';


include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/PROCESO_ADO.php';
include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/FOLIO_ADO.php';

include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/PCDESPACHO_ADO.php';

include_once '../modelo/PCDESPACHO.php';
include_once '../modelo/EXIEXPORTACION.php';

//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();


$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$PVESPECIES_ADO =  new PVESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$FOLIO_ADO =  new FOLIO_ADO();

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$PCDESPACHO_ADO =  new PCDESPACHO_ADO();

//INIICIALIZAR MODELO
$PCDESPACHO =  new PCDESPACHO();
$EXIEXPORTACION =  new EXIEXPORTACION();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NUMERO = "";
$NUMEROVER = "";

$IDEXIEXPORTACIONQUITAR = "";
$FOLIOEXIEXPORTACIONQUITAR = "";
$FECHAINGRESOPCDESPACHO = "";
$FECHAMODIFCIACIONPCDESPACHO = "";

$IDPCDESPACHO = "";
$MOTIVOPCDESPACHO = "";
$FECHAPCDESPACHO = "";
$ESTADO = "";

$TOTALENVASE = "";
$TOTALNETO = "";

$TOTALENVASEV = "";
$TOTALNETOV = "";

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$DISABLED0 = "disabled";
$DISABLED = "";
$DISABLED2 = "disabled";
$DISABLED3 = "";
$DISABLEDSTYLE0 = "style='background-color: #eeeeee;'";
$DISABLEDSTYLE = "";
$DISABLEDSTYLE2 = "";

$MENSAJE0 = "";
$MENSAJE = "";
$MENSAJE2 = "";
$MENSAJEVALIDATO = "";

$TOTALENVASE = "";
$TOTALNETO = "";

$IDOP = "";
$OP = "";

$SINO = "";
//INICIALIZAR ARREGLOS



$ARRAYTOMADO = "";
$ARRAYTOMADOPCDESPACHO = "";
$ARRAYTOMADOTOTALES = "";
$ARRAYTOMADOTOTALES2 = "";

$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";
$ARRAYEXIEXPORTACION = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS 
$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
$ARRAYPLANTA = $PLANTA_ADO->listarPlantaCBX();
$ARRAYTEMPORADA = $TEMPORADA_ADO->listarTemporada3CBX();


$ARRAYFECHAACTUAL = $PCDESPACHO_ADO->obtenerFecha();
$FECHAPCDESPACHO = $ARRAYFECHAACTUAL[0]['FECHA'];
//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['CREAR'])) {

    if ($_REQUEST['EMPRESA'] && $_REQUEST['PLANTA'] && $_REQUEST['TEMPORADA']) {
        $SINO = "0";
        $MENSAJEVALIDATO = "";
    } else {
        $SINO = "1";
        $MENSAJEVALIDATO = "DEBE TENER SELECIONADO EMPRESA, PLANTA Y TEMPORADA";
    }
    if ($SINO == "0") {
        $ARRAYNUMERO = $PCDESPACHO_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
        $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;


        $PCDESPACHO->__SET('NUMERO_PCDESPACHO', $NUMERO);
        $PCDESPACHO->__SET('CANTIDAD_ENVASE_PCDESPACHO', 0);
        $PCDESPACHO->__SET('KILOS_NETO_PCDESPACHO', 0);
        $PCDESPACHO->__SET('FECHA_PCDESPACHO', $_REQUEST['FECHAPCDESPACHO']);
        $PCDESPACHO->__SET('MOTIVO_PCDESPACHO', $_REQUEST['MOTIVOPCDESPACHO']);
        $PCDESPACHO->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $PCDESPACHO->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $PCDESPACHO->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $PCDESPACHO_ADO->agregarPcdespacho($PCDESPACHO);

        $ARRAYPCDESPACHOBUSCARID = $PCDESPACHO_ADO->buscarID(
            0,
            0,
            $_REQUEST['FECHAPCDESPACHO'],
            $_REQUEST['MOTIVOPCDESPACHO'],
            $_REQUEST['EMPRESA'],
            $_REQUEST['PLANTA'],
            $_REQUEST['TEMPORADA']
        );
        //REDIRECCIONAR A PAGINA registroRecepcion.php 
        echo "<script type='text/javascript'> location.href ='registroPcdespacho.php?parametro=" . $ARRAYPCDESPACHOBUSCARID[0]['ID_PCDESPACHO'] . "&&parametro1=crear';</script>";
    }
}

//OPERACION EDICION DE FILA
if (isset($_REQUEST['EDITAR'])) {

    $ARRAYTOMADO = $EXIEXPORTACION_ADO->buscarPorPcdespacho($_REQUEST['ID']);

    if ($ARRAYTOMADO) {
        $SINO = "0";
        $MENSAJE = "";
    } else {
        $SINO = "1";
        $MENSAJE = "TIENE QUE SELECIONAR UNA EXISTENCIA";
    }
    if ($SINO == "0") {
        $PCDESPACHO->__SET('CANTIDAD_ENVASE_PCDESPACHO', $_REQUEST['TOTALENVASE']);
        $PCDESPACHO->__SET('KILOS_NETO_PCDESPACHO', $_REQUEST['TOTALNETO']);
        $PCDESPACHO->__SET('FECHA_PCDESPACHO', $_REQUEST['FECHAPCDESPACHOE']);
        $PCDESPACHO->__SET('MOTIVO_PCDESPACHO', $_REQUEST['MOTIVOPCDESPACHOE']);
        $PCDESPACHO->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $PCDESPACHO->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $PCDESPACHO->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        $PCDESPACHO->__SET('ID_PCDESPACHO', $_REQUEST['ID']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $PCDESPACHO_ADO->actualizarPcdespacho($PCDESPACHO);
    }
}


//OPERACION EDICION DE FILA
if (isset($_REQUEST['CERRAR'])) {
    $ARRAYTOMADO = $EXIEXPORTACION_ADO->buscarPorPcdespacho($_REQUEST['ID']);

    if ($ARRAYTOMADO) {
        $SINO = "0";
        $MENSAJE = "";
    } else {
        $SINO = "1";
        $MENSAJE = "TIENE QUE SELECIONAR UNA EXISTENCIA";
    }

    if ($SINO == "0") {

        $PCDESPACHO->__SET('CANTIDAD_ENVASE_PCDESPACHO', $_REQUEST['TOTALENVASE']);
        $PCDESPACHO->__SET('KILOS_NETO_PCDESPACHO', $_REQUEST['TOTALNETO']);
        $PCDESPACHO->__SET('FECHA_PCDESPACHO', $_REQUEST['FECHAPCDESPACHOE']);
        $PCDESPACHO->__SET('MOTIVO_PCDESPACHO', $_REQUEST['MOTIVOPCDESPACHOE']);
        $PCDESPACHO->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $PCDESPACHO->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $PCDESPACHO->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        $PCDESPACHO->__SET('ID_PCDESPACHO', $_REQUEST['ID']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $PCDESPACHO_ADO->actualizarPcdespacho($PCDESPACHO);

        $ARRAYPCDESPACHOVER = $PCDESPACHO_ADO->verPcdespacho($_REQUEST['ID']);
        $PCDESPACHO->__SET('ID_PCDESPACHO', $_REQUEST['ID']);
        // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $PCDESPACHO_ADO->confirmado($PCDESPACHO);

        $ARRAYPCDESPACHOVER = $PCDESPACHO_ADO->verPcdespacho($_REQUEST['ID']);
        $PCDESPACHO->__SET('ID_PCDESPACHO', $_REQUEST['ID']);
        // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $PCDESPACHO_ADO->cerrado($PCDESPACHO);

        //REDIRECCIONAR A PAGINA registroRecepcion.php 
        //SEGUNE EL TIPO DE OPERACIONS QUE SE INDENTIFIQUE EN LA URL
        if ($_REQUEST['parametro1'] == "crear") {
            echo "<script type='text/javascript'> location.href ='registroPcdespacho.php?parametro=" . $_REQUEST['ID'] . "&&parametro1=ver';</script>";
        }
        if ($_REQUEST['parametro1'] == "editar") {
            echo "<script type='text/javascript'> location.href ='registroPcdespacho.php?parametro=" . $_REQUEST['ID'] . "&&parametro1=ver';</script>";
        }
    }
}



if (isset($_REQUEST['QUITAR'])) {
    $IDEXIEXPORTACIONQUITAR = $_REQUEST['IDEXIEXPORTACIONQUITAR'];
    $FOLIOEXIEXPORTACIONQUITAR = $_REQUEST['FOLIOEXIEXPORTACIONQUITAR'];
    $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $IDEXIEXPORTACIONQUITAR);
    $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $FOLIOEXIEXPORTACIONQUITAR);
    // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $EXIEXPORTACION_ADO->actualizarDeselecionarPCCambiarEstado($EXIEXPORTACION);
}

//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($_REQUEST['parametro']) && isset($_REQUEST['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_REQUEST['parametro'];
    $OP = $_REQUEST['parametro1'];

    $ARRAYTOMADO = $EXIEXPORTACION_ADO->buscarPorPcdespacho2($IDOP);
    $ARRAYTOMADOTOTALES = $EXIEXPORTACION_ADO->obtenerTotalesPorPcdespacho($IDOP);

    $TOTALENVASE = $ARRAYTOMADOTOTALES[0]['ENVASE'];
    $TOTALNETO = $ARRAYTOMADOTOTALES[0]['NETO'];

    $ARRAYTOMADOTOTALES2 = $EXIEXPORTACION_ADO->obtenerTotalesPorPcdespacho2($IDOP);
    $TOTALENVASEV = $ARRAYTOMADOTOTALES2[0]['ENVASE'];
    $TOTALNETOV = $ARRAYTOMADOTOTALES2[0]['NETO'];




    //IDENTIFICACIONES DE OPERACIONES
    //crear =  OBTENCION DE DATOS INICIALES PARA PODER CREAR LA RECEPCION
    if ($OP == "crear") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $DISABLED2 = "";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        $ARRAYPCDESPACHO = $PCDESPACHO_ADO->verPcdespacho($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYPCDESPACHO as $r) :
            $IDPCDESPACHO = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_PCDESPACHO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $MOTIVOPCDESPACHO = "" . $r['MOTIVO_PCDESPACHO'];
            $FECHAPCDESPACHO = "" . $r['FECHA_PCDESPACHO'];
            $FECHAINGRESOPCDESPACHO = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONPCDESPACHO = "" . $r['MODIFICACION'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $DISABLED2 = "";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        $ARRAYPCDESPACHO = $PCDESPACHO_ADO->verPcdespacho($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYPCDESPACHO as $r) :
            $IDPCDESPACHO = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_PCDESPACHO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $MOTIVOPCDESPACHO = "" . $r['MOTIVO_PCDESPACHO'];
            $FECHAPCDESPACHO = "" . $r['FECHA_PCDESPACHO'];
            $FECHAINGRESOPCDESPACHO = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONPCDESPACHO = "" . $r['MODIFICACION'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        $ARRAYPCDESPACHO = $PCDESPACHO_ADO->verPcdespacho($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYPCDESPACHO as $r) :
            $IDPCDESPACHO = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_PCDESPACHO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $MOTIVOPCDESPACHO = "" . $r['MOTIVO_PCDESPACHO'];
            $FECHAPCDESPACHO = "" . $r['FECHA_PCDESPACHO'];
            $FECHAINGRESOPCDESPACHO = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONPCDESPACHO = "" . $r['MODIFICACION'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
}

if ($_POST) {

    if (isset($_REQUEST['EMPRESA'])) {
        $EMPRESA = "" . $_REQUEST['EMPRESA'];
    }

    if (isset($_REQUEST['PLANTA'])) {
        $PLANTA = "" . $_REQUEST['PLANTA'];
    }

    if (isset($_REQUEST['TEMPORADA'])) {
        $TEMPORADA = "" . $_REQUEST['TEMPORADA'];
    }

    if (isset($_REQUEST['MOTIVOPCDESPACHO'])) {
        $MOTIVOPCDESPACHO = "" . $_REQUEST['MOTIVOPCDESPACHO'];
    }
 
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Planificador Carga </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                function validacion() {


                    FECHAPCDESPACHO = document.getElementById("FECHAPCDESPACHO").value;
                    MOTIVOPCDESPACHO = document.getElementById("MOTIVOPCDESPACHO").value;

                    document.getElementById('val_fecha').innerHTML = "";
                    document.getElementById('val_motivo').innerHTML = "";


                    if (FECHAPCDESPACHO == null || FECHAPCDESPACHO.length == 0 || /^\s+$/.test(FECHAPCDESPACHO)) {
                        document.form_reg_dato.FECHAPCDESPACHO.focus();
                        document.form_reg_dato.FECHAPCDESPACHO.style.borderColor = "#FF0000";
                        document.getElementById('val_fecha').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.FECHAPCDESPACHO.style.borderColor = "#4AF575";

                    if (MOTIVOPCDESPACHO == null || MOTIVOPCDESPACHO.length == 0 || /^\s+$/.test(MOTIVOPCDESPACHO)) {
                        document.form_reg_dato.MOTIVOPCDESPACHO.focus();
                        document.form_reg_dato.MOTIVOPCDESPACHO.style.borderColor = "#FF0000";
                        document.getElementById('val_motivo').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.MOTIVOPCDESPACHO.style.borderColor = "#4AF575";





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

                //FUNCION PARA REALIZAR UNA ACTUALIZACION DEL FORMULARIO DE REGISTRO DE RECEPCION
                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }

                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE RECEPCION
                function abrirVentana(url) {
                    var opciones =
                        "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1600, height=1000'";
                    window.open(url, 'window', opciones);
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
                                <h3 class="page-title">Planificador Carga</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Frigorifico</li>
                                            <li class="breadcrumb-item" aria-current="page">Planificador Carga</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroPcdespacho.php">Operaciónes Planificador Carga</a>
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
                        <div class="box">
                            <div class="box-header with-border">
                                <!--
                                        <h4 class="box-title">Different Width</h4>
                                        -->
                            </div>

                            <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato" onsubmit="return validacion()">
                                <div class="box-body ">

                                    <div class="row">
                                        <div class="col-sm-1">
                                            <label>Número Planifica. Carga </label>
                                            <input type="hidden" class="form-control" placeholder="ID PCDESPACHO" id="ID" name="ID" value="<?php echo $IDPCDESPACHO; ?>" />
                                            <input type="text" class="form-control" placeholder="Número Planificador Carga" id="IDPCDESPACHO" name="IDPCDESPACHO" value="<?php echo $NUMEROVER; ?>" <?php echo $DISABLED0; ?> <?php echo $DISABLEDSTYLE0; ?> />
                                            <label id="val_id" class="validacion"> </label>
                                        </div>
                                        <?php if ($TUSUARIO != "0") { ?>
                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESA; ?>" />
                                                    <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTA; ?>" />
                                                    <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADA; ?>" />

                                                    <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESAE" name="EMPRESAE" value="<?php echo $EMPRESA; ?>" />
                                                    <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTAE" name="PLANTAE" value="<?php echo $PLANTA; ?>" />
                                                    <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADAE" name="TEMPORADAE" value="<?php echo $TEMPORADA; ?>" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12">
                                            </div>
                                        <?php } ?>
                                        <?php if ($TUSUARIO == "0") { ?>
                                            <div class="col-sm-1 col-12">
                                            </div>
                                            <div class="col-sm-2 col-12">
                                                <div class="form-group">
                                                    <label>Empresa</label>
                                                    <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESAE" name="EMPRESAE" value="<?php echo $EMPRESA; ?>" />
                                                    <select class="form-control select2" id="EMPRESA" name="EMPRESA" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYEMPRESA as $r) : ?>
                                                            <?php if ($ARRAYEMPRESA) {    ?>
                                                                <option value="<?php echo $r['ID_EMPRESA']; ?>" <?php if ($EMPRESA == $r['ID_EMPRESA']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_EMPRESA'] ?> </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_empresa" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 col-12">
                                                <div class="form-group">
                                                    <label>Planta</label>
                                                    <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTAE" name="PLANTAE" value="<?php echo $PLANTA; ?>" />
                                                    <select class="form-control select2" id="PLANTA" name="PLANTA" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPLANTA as $r) : ?>
                                                            <?php if ($ARRAYPLANTA) {    ?>
                                                                <option value="<?php echo $r['ID_PLANTA']; ?>" <?php if ($PLANTA == $r['ID_PLANTA']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_PLANTA'] ?> </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_planta" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 col-12">
                                                <div class="form-group">
                                                    <label>Temporada</label>
                                                    <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADAE" name="TEMPORADAE" value="<?php echo $TEMPORADA; ?>" />
                                                    <select class="form-control select2" id="TEMPORADA" name="TEMPORADA" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYTEMPORADA as $r) : ?>
                                                            <?php if ($ARRAYTEMPORADA) {    ?>
                                                                <option value="<?php echo $r['ID_TEMPORADA']; ?>" <?php if ($TEMPORADA == $r['ID_TEMPORADA']) {
                                                                                                                        echo "selected";
                                                                                                                    } ?>> <?php echo $r['NOMBRE_TEMPORADA'] ?> </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_temporada" class="validacion"> </label>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Fecha Ingreso</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Ingreso " id="FECHAINGRESOPCDESPACHOE" name="FECHAINGRESOPCDESPACHOE" value="<?php echo $FECHAINGRESOPCDESPACHO; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="FECHA RECEPCION" id="FECHAINGRESOPCDESPACHO" name="FECHAINGRESOPCDESPACHO" value="<?php echo $FECHAINGRESOPCDESPACHO; ?>" disabled />
                                                <label id="val_fechai" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Fecha Modificación</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Modificacion " id="FECHAMODIFCIACIONPCDESPACHOE" name="FECHAMODIFCIACIONPCDESPACHOE" value="<?php echo $FECHAMODIFCIACIONPCDESPACHO; ?>" />
                                                <input type="date" class="form-control " style="background-color: #eeeeee;" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACIONPCDESPACHO" name="FECHAMODIFCIACIONPCDESPACHO" value="<?php echo $FECHAMODIFCIACIONPCDESPACHO; ?>" disabled />
                                                <label id="val_fecham" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>


                                    <label id="val_validato" class="validacion"> <?php echo $MENSAJEVALIDATO; ?> </label>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label>Fecha PC</label>
                                            <input type="hidden" class="form-control" placeholder="Fecha PC Despacho" id="FECHAPCDESPACHOE" name="FECHAPCDESPACHOE" value="<?php echo $FECHAPCDESPACHO; ?>" />
                                            <input type="date" class="form-control" placeholder="Fecha PC Despacho" id="FECHAPCDESPACHO" name="FECHAPCDESPACHO" value="<?php echo $FECHAPCDESPACHO; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDSTYLE; ?> />
                                            <label id="val_fecha" class="validacion"> </label>
                                        </div>
                                        <div class="col-sm-10">
                                            <label>Motivo</label>
                                            <input type="hidden" class="form-control" placeholder="Fecha PC Despacho" id="MOTIVOPCDESPACHOE" name="MOTIVOPCDESPACHOE" value="<?php echo $MOTIVOPCDESPACHO; ?>" />
                                            <textarea class="form-control" rows="1" placeholder="Ingrese Nota, Observaciónes u Otro" id="MOTIVOPCDESPACHO" name="MOTIVOPCDESPACHO" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDSTYLE; ?>><?php echo $MOTIVOPCDESPACHO; ?></textarea>
                                            <label id="val_motivo" class="validacion"> </label>
                                        </div>
                                    </div>
                                    <!- selecionar existencia ->
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Selección / Existencia Producto Terminado </label>
                                                </div>
                                            </div>
                                        </div>
                                        <label id="val_dproceso" class="validacion center"><?php echo $MENSAJE; ?> </label>
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <div class="table-responsive">
                                                        <table id="detalle" class="table table-hover " style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <a href="#" class="text-warning hover-warning">
                                                                            N° Folio
                                                                        </a>
                                                                    </th>
                                                                    <th class="text-center">Operaciónes</th>
                                                                    <th>Fecha Embalado </th>
                                                                    <th>Código Estandar </th>
                                                                    <th>Envase/Estandar </th>
                                                                    <th>CSG</th>
                                                                    <th>Productor</th>
                                                                    <th>Variedad</th>
                                                                    <th>Cantidad Envase </th>
                                                                    <th>Kilo Neto </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <form method="post" id="form2">
                                                                    <?php if ($ARRAYTOMADO) { ?>
                                                                        <?php foreach ($ARRAYTOMADO as $r) : ?>
                                                                            <tr class="center">
                                                                                <td>
                                                                                    <a href="#" class="text-warning hover-warning">
                                                                                        <?php
                                                                                        echo $r['FOLIO_AUXILIAR_EXIEXPORTACION'];
                                                                                        ?>
                                                                                    </a>
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    <form method="post" id="form1">
                                                                                        <input type="hidden" class="form-control" placeholder="ID PCDESPACHO" id="IDPCDESPACHOAUX" name="IDPCDESPACHOAUX" value="<?php echo $IDPCDESPACHO; ?>" />
                                                                                        <input type="hidden" class="form-control" id="IDEXIEXPORTACIONQUITAR" name="IDEXIEXPORTACIONQUITAR" value="<?php echo $r['ID_EXIEXPORTACION']; ?>" />
                                                                                        <input type="hidden" class="form-control" id="FOLIOEXIEXPORTACIONQUITAR" name="FOLIOEXIEXPORTACIONQUITAR" value="<?php echo $r['FOLIO_EXIEXPORTACION']; ?>" />

                                                                                        <button type="submit" class="btn btn-rounded btn-sm  btn-danger btn-outline mr-1" id="defecto" name="QUITAR" <?php echo $DISABLED2; ?> title="Quitar" <?php if ($ESTADO == 0) {
                                                                                                                                                                                                                                                    echo "disabled";
                                                                                                                                                                                                                                                } ?>>
                                                                                            <i class="ti-close  "></i> Quitar
                                                                                        </button>
                                                                                    </form>
                                                                                </td>
                                                                                <td><?php echo $r['FECHA']; ?></td>
                                                                                <td>
                                                                                    <?php
                                                                                    $ARRAYEVERERECEPCIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                                                    echo $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
                                                                                    ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php
                                                                                    echo $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                                                    ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php
                                                                                    $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                                                    echo $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                                                    ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php
                                                                                    echo $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                                                    ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php

                                                                                    $ARRAYVERPVESPECIESID = $PVESPECIES_ADO->verPvespecies($r['ID_PVESPECIES']);
                                                                                    $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($ARRAYVERPVESPECIESID[0]['ID_VESPECIES']);
                                                                                    echo $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                                                    ?>
                                                                                </td>
                                                                                <td><?php echo $r['ENVASE']; ?></td>
                                                                                <td><?php echo $r['NETO']; ?></td>
                                                                            </tr>
                                                                        <?php endforeach; ?>
                                                                    <?php } ?>

                                                                </form>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <th>
                                                                <div class="form-group center">
                                                                    Selecionar
                                                                </div>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td class=" center">
                                                                <div class="form-group">
                                                                    <button type="button" class=" btn btn-rounded btn-success btn-outline" <?php echo $DISABLED2; ?> <?php if ($ESTADO == 0) {
                                                                                                                                                                            echo "disabled";
                                                                                                                                                                        } ?> id="defecto" name="agregar" Onclick="abrirVentana('registroSelecionExistenciaPcdespachoPt.php?EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?> && PCDESPACHO=<?php echo $IDOP ?>' ); ">
                                                                        <i class="glyphicon glyphicon-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total Envase</th>
                                                            <td>
                                                                <div class="form-group">
                                                                    <input type="hidden" class="form-control" id="TOTALENVASE" name="TOTALENVASE" value="<?php echo $TOTALENVASE; ?>" />
                                                                    <input type="text" class="form-control" placeholder="Total Envase" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALENVASEV; ?>" disabled />
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total Neto</th>
                                                            <td>
                                                                <div class="form-group">
                                                                    <input type="hidden" class="form-control" id="TOTALNETO" name="TOTALNETO" value="<?php echo $TOTALNETO; ?>" />
                                                                    <input type="text" class="form-control" placeholder="Total Neto" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALNETOV; ?>" disabled />
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <?php if ($ESTADO == 0) { ?>
                                                            <?php if ($OP == "crear") { ?>
                                                                <button type="button" class="btn btn-rounded  btn-success btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('listarPcdespacho.php'); ">
                                                                    <i class="ti-back-left "></i> VOLVER
                                                                </button>
                                                            <?php } ?>

                                                            <?php if ($OP == "") { ?>
                                                                <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroPcdespacho.php');">
                                                                    <i class="ti-trash"></i> CANCELAR
                                                                </button>
                                                            <?php } ?>
                                                        <?php } ?>

                                                        <?php if ($ESTADO != 0) { ?>
                                                            <?php if ($OP == "crear") { ?>
                                                                <button type="button" class="btn btn-rounded  btn-success btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('listarPcdespacho.php'); ">
                                                                    <i class="ti-back-left "></i> VOLVER
                                                                </button>
                                                            <?php } ?>
                                                            <?php if ($OP == "") { ?>
                                                                <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroPcdespacho.php');">
                                                                    <i class="ti-trash"></i> CANCELAR
                                                                </button>
                                                            <?php } ?>
                                                        <?php } ?>

                                                        <?php if ($OP == "editar") { ?>
                                                            <button type="button" class="btn btn-rounded  btn-success btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('listarPcdespacho.php'); ">
                                                                <i class="ti-back-left "></i> VOLVER
                                                            </button>
                                                        <?php } ?>
                                                        <?php if ($OP == "ver") { ?>
                                                            <button type="button" class="btn btn-rounded  btn-success btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('listarPcdespacho.php'); ">
                                                                <i class="ti-back-left "></i> VOLVER
                                                            </button>
                                                        <?php } ?>

                                                        <?php if ($OP == "") { ?>
                                                            <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="CREAR" value="CREAR" <?php echo $DISABLED; ?>>
                                                                <i class="ti-save-alt"></i> CREAR
                                                            </button>
                                                        <?php } ?>
                                                        <?php if ($OP == "crear") { ?>
                                                            <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="EDITAR" value="EDITAR" <?php if ($ESTADO == 0) {
                                                                                                                                                                    echo "disabled";
                                                                                                                                                                } ?>>
                                                                <i class="ti-save-alt"></i> GUARDAR
                                                            </button>
                                                        <?php }   ?>
                                                        <?php if ($OP == "editar") { ?>
                                                            <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="EDITAR" value="EDITAR" <?php if ($ESTADO == 0) {
                                                                                                                                                                    echo "disabled";
                                                                                                                                                                } ?>>
                                                                <i class="ti-save-alt"></i> GUARDAR
                                                            </button>
                                                        <?php }   ?>
                                                        <?php if ($OP == "ver") { ?>
                                                            <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="EDITAR" value="EDITAR" <?php echo $DISABLED; ?> <?php if ($ESTADO == 0) {
                                                                                                                                                                                            echo "disabled";
                                                                                                                                                                                        } ?>>
                                                                <i class="ti-save-alt"></i> GUARDAR
                                                            </button>
                                                        <?php }   ?>
                                                        <?php if ($OP == "crear") { ?>
                                                            <button type="submit" class="btn btn-rounded btn-danger btn-outline" name="CERRAR" value="CERRAR" <?php if ($ESTADO == 0) {
                                                                                                                                                                    echo "disabled";
                                                                                                                                                                } ?>>
                                                                <i class="ti-save-alt"></i> CERRAR
                                                            </button>
                                                        <?php }   ?>
                                                        <?php if ($OP == "editar") { ?>
                                                            <button type="submit" class="btn btn-rounded btn-danger btn-outline" name="CERRAR" value="CERRAR" <?php if ($ESTADO == 0) {
                                                                                                                                                                    echo "disabled";
                                                                                                                                                                } ?>>
                                                                <i class="ti-save-alt"></i> CERRAR
                                                            </button>
                                                        <?php }   ?>
                                                        <?php if ($OP == "ver") { ?>
                                                            <button type="submit" class="btn btn-rounded btn-danger btn-outline" name="CERRAR" value="CERRAR" <?php echo $DISABLED; ?> <?php if ($ESTADO == 0) {
                                                                                                                                                                                            echo "disabled";
                                                                                                                                                                                        } ?>>
                                                                <i class="ti-save-alt"></i> CERRAR
                                                            </button>
                                                        <?php }   ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($OP != "") { ?>
                                                            <?php if ($ESTADO == "0") { ?>
                                                                <button type="button" class="btn btn-rounded  btn-info btn-outline mr-1" id="defecto" name="tarjas" Onclick="abrirVentana('../documento/informePcdespacho.php?parametro=<?php echo $IDOP; ?>&&NOMBREUSUARIO=<?php echo $NOMBREUSUARIOS; ?>'); ">
                                                                    <i class="fa fa-file-pdf-o"></i>INFORME
                                                                </button>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                    </table>
                                </div>
                            </form>
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