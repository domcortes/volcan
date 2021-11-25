<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/USUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';

include_once '../controlador/FOLIO_ADO.php';




include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/PROCESO_ADO.php';
include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';
include_once '../controlador/TCALIBRE_ADO.php';
include_once '../controlador/TEMBALAJE_ADO.php';

include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/REPALETIZAJEEX_ADO.php';
include_once '../controlador/DREPALETIZAJEEX_ADO.php';

include_once '../modelo/REPALETIZAJEEX.php';
include_once '../modelo/EXIEXPORTACION.php';
include_once '../modelo/DREPALETIZAJEEX.php';


//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$FOLIO_ADO =  new FOLIO_ADO();


$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$REPALETIZAJEEX_ADO =  new REPALETIZAJEEX_ADO();
$DREPALETIZAJEEX_ADO =  new DREPALETIZAJEEX_ADO();

//INIICIALIZAR MODELO
$EXIEXPORTACION =  new EXIEXPORTACION();
$REPALETIZAJEEX =  new REPALETIZAJEEX();
$DREPALETIZAJEEX =  new DREPALETIZAJEEX();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD



$NUMERO = "";
$NUMEROVER = "";
$IDQUITAR = "";
$FOLIOEXIEXPORTACIONQUITAR = "";
$IDDREPALETIZAJE  = "";
$IDTMANEJO  = "";
$IDVESPECIES  = "";
$IDPRODUCTOR  = "";
$IDESTANDAR  = "";
$IDFOLIO  = "";
$FECHAEMBALADO  = "";
$FECHAINGRESOPALETIZAJE = "";
$FECHAMODIFCIACIONPALETIZAJE = "";
$FOLIO = "";

$KILOSNETOSREPALETIZAJE = "";
$KILOSBRUTOREPALETIZAJE = "";
$KILOSDESHIDRATACION = "";

$EXPORTACION = "";
$TOTALCAJAS = 0;
$TOTALNETO = 0;

$IDREPALETIZAJE = "";
$MOTIVOREPALETIZAJE = "";

$TOTALENVASEORIGNAL = 0;
$TOTALENVASEREPALETIZAJE = 0;
$TOTALENVASEORIGNAL2 = 0;
$TOTALENVASEREPALETIZAJE2 = 0;

$TOTALNETOORIGNAL = 0;
$TOTALNETOREPALETIZAJE = 0;

$DIFERENCIACAJAS = 0;
$ESTADO = "";
$STOCK = "";


$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$TMANEJO = "";

$FOCUS = "";
$DISABLED0 = "disabled";
$DISABLED = "";
$DISABLED2 = "";
$DISABLED3 = "";
$DISABLEDSTYLE0 = "style='background-color: #eeeeee;'";
$DISABLEDSTYLE = "";


$BORDER = "";
$MENSAJE0 = "";
$MENSAJE = "";
$MENSAJE2 = "";
$MENSAJE3 = "";


$DISABLEDFOLIO = "";
$MENSAJEFOLIO = "";
$NODATO="";

$IDOP = "";
$OP = "";

$SINO = "";
$CONTADOR = 0;

$IDBOLSA = "";

//INICIALIZAR ARREGLOS



$ARRAYEXIEXPORTACIONTOMADO = "";
$ARRAYEXIEXPORTACIONBOLSA = "";
$ARRAYEXIEXPORTACIONINGRESANDOREPALETIZADO = "";

$ARRAYEXISTENCIATOTALESPORREPALETIZAJE = "";
$ARRAYEXISTENCIATOTALESPORREPALETIZAJE2 = "";
$ARRAYDESAHABILITAR = "";
$ARRAYELIMINAR = "";

$ARRAYEXISTENCIA = "";
$ARRAYESTANDAR = "";

$ARRAYREPALETIZAJE = "";
$ARRAYREPALETIZAJEVER = "";
$ARRAYREPALETIZAJEVER2 = "";
$ARRAYDREPALETIZAJE = "";
$ARRAYDREPALETIZAJE2 = "";
$ARRAYDREPALETIZAJETOTALES = "";
$ARRAYDREPALETIZAJETOTALES2 = "";

$ARRAYREPALETIZAJEHFOPOREXISTENCIA = "";
$ARRAYREPALETIZAJEBUSCARID = "";
$ARRAYNUMERO = "";


$ARRAYEXISTENCIABUSCARPOFOLIO = "";
$ARRAYIDBOLSA = "";


$ARRAYVERPRODUCTORID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYEVERERECEPCIONID;
$ARRAYDBREPALETIZAJE = "";


$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";
$ARRAYEXIEXPORTACION = "";
$ARRAYTEMANEJO = "";
$ARRAYFOLIO = "";
$ARRAYCALIBRE = "";
$ARRAYEMBALAJE = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS 
$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
$ARRAYPLANTA = $PLANTA_ADO->listarPlantaCBX();
$ARRAYTEMPORADA = $TEMPORADA_ADO->listarTemporadaCBX();
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrlD.php";


$ARRAYFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTexportacion($EMPRESAS, $PLANTAS, $TEMPORADAS);
if (empty($ARRAYFOLIO)) {
    $DISABLEDFOLIO = "disabled";
    $MENSAJEFOLIO = " NECESITA <b> CREAR LOS FOLIOS PT </b> , PARA OCUPAR LA <b> FUNCIONALIDAD </b>. FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
}



//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['parametro'];
    $OP = $_SESSION['parametro1'];

    $ARRAYTOMADO = $EXIEXPORTACION_ADO->buscarPorRepaletizaje2($IDOP);
    $ARRAYDREPALETIZAJE = $DREPALETIZAJEEX_ADO->buscarDrepaletizaje2($IDOP);

    $ARRAYEXISTENCIATOTALESPORREPALETIZAJE = $EXIEXPORTACION_ADO->obtenerTotalesRepaletizaje($IDOP);
    $ARRAYEXISTENCIATOTALESPORREPALETIZAJE2 = $EXIEXPORTACION_ADO->obtenerTotalesRepaletizaje2($IDOP);
    $ARRAYDREPALETIZAJETOTALES = $DREPALETIZAJEEX_ADO->totalesDrepaletizaje($IDOP);
    $ARRAYDREPALETIZAJETOTALES2 = $DREPALETIZAJEEX_ADO->totalesDrepaletizaje2($IDOP);

    $TOTALNETOORIGNAL = $ARRAYEXISTENCIATOTALESPORREPALETIZAJE[0]['NETO'];
    $TOTALENVASEORIGNAL = $ARRAYEXISTENCIATOTALESPORREPALETIZAJE[0]['ENVASE'];
    $TOTALNETOORIGNAL2 = $ARRAYEXISTENCIATOTALESPORREPALETIZAJE2[0]['NETO'];
    $TOTALENVASEORIGNAL2 = $ARRAYEXISTENCIATOTALESPORREPALETIZAJE2[0]['ENVASE'];

    $TOTALNETOREPALETIZAJE = $ARRAYDREPALETIZAJETOTALES[0]['NETO'];
    $TOTALENVASEREPALETIZAJE = $ARRAYDREPALETIZAJETOTALES[0]['ENVASE'];
    $TOTALNETOREPALETIZAJE2 = $ARRAYDREPALETIZAJETOTALES2[0]['NETO'];
    $TOTALENVASEREPALETIZAJE2 = $ARRAYDREPALETIZAJETOTALES2[0]['ENVASE'];


    if (empty($ARRAYEXIEXPORTACIONTOMADO)) {
        $DISABLED5 = "disabled";
    }

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
        $ARRAYREPALETIZAJE = $REPALETIZAJEEX_ADO->verRepaletizaje($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYREPALETIZAJE as $r) :
            $IDREPALETIZAJE = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_REPALETIZAJE'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $MOTIVOREPALETIZAJE = "" . $r['MOTIVO_REPALETIZAJE'];
            $FECHAINGRESOPALETIZAJE = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONPALETIZAJE = "" . $r['MODIFICACION'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
        $DIFERENCIACAJAS = $TOTALENVASEORIGNAL - $TOTALENVASEREPALETIZAJE;
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
        $ARRAYREPALETIZAJE = $REPALETIZAJEEX_ADO->verRepaletizaje($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYREPALETIZAJE as $r) :
            $IDREPALETIZAJE = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_REPALETIZAJE'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $MOTIVOREPALETIZAJE = "" . $r['MOTIVO_REPALETIZAJE'];
            $FECHAINGRESOPALETIZAJE = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONPALETIZAJE = "" . $r['MODIFICACION'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
        $DIFERENCIACAJAS = $TOTALENVASEORIGNAL - $TOTALENVASEREPALETIZAJE;
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
        $ARRAYREPALETIZAJE = $REPALETIZAJEEX_ADO->verRepaletizaje($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYREPALETIZAJE as $r) :
            $IDREPALETIZAJE = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_REPALETIZAJE'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $MOTIVOREPALETIZAJE = "" . $r['MOTIVO_REPALETIZAJE'];
            $FECHAINGRESOPALETIZAJE = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONPALETIZAJE = "" . $r['MODIFICACION'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
        $DIFERENCIACAJAS = $TOTALENVASEORIGNAL - $TOTALENVASEREPALETIZAJE;
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

    if (isset($_REQUEST['MOTIVOREPALETIZAJE'])) {
        $MOTIVOREPALETIZAJE = "" . $_REQUEST['MOTIVOREPALETIZAJE'];
    }
    if (isset($_REQUEST['TOTALENVASEORIGNAL'])) {
        $TOTALENVASEORIGNAL = "" . $_REQUEST['TOTALENVASEORIGNAL'];
    }
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Repaletizaje </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                function validacion() {

                    MOTIVOREPALETIZAJE = document.getElementById("MOTIVOREPALETIZAJE").value;
                    document.getElementById('val_motivo').innerHTML = "";

                    if (MOTIVOREPALETIZAJE == null || MOTIVOREPALETIZAJE.length == 0 || /^\s+$/.test(MOTIVOREPALETIZAJE)) {
                        document.form_reg_dato.MOTIVOREPALETIZAJE.focus();
                        document.form_reg_dato.MOTIVOREPALETIZAJE.style.borderColor = "#FF0000";
                        document.getElementById('val_motivo').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.MOTIVOREPALETIZAJE.style.borderColor = "#4AF575";



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

                function abrirPestana(url) {
                    var win = window.open(url, '_blank');
                    win.focus();
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
                                <h3 class="page-title">Repaletizaje</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Frigorifico</li>
                                            <li class="breadcrumb-item" aria-current="page">Repaletizaje</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro Repaletizaje </a>
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

                    <label id="val_mensaje" class="validacion"><?php echo $MENSAJEFOLIO; ?> </label>
                    <!-- Main content -->
                    <section class="content">
                        <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                            <div class="box">                             
                                 <div class="box-header with-border bg-primary">                                   
                                    <h4 class="box-title">Registro de Repaletizaje</h4>                                        
                                </div>
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />

                                            <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESAE" name="EMPRESAE" value="<?php echo $EMPRESA; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTAE" name="PLANTAE" value="<?php echo $PLANTA; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADAE" name="TEMPORADAE" value="<?php echo $TEMPORADA; ?>" />


                                            <input type="hidden" class="form-control" placeholder="Total Envase" id="TOTALENVASEORIGINAL" name="TOTALENVASEORIGINAL" value="<?php echo $TOTALENVASEORIGNAL; ?>" />
                                            <input type="hidden" class="form-control" placeholder="Total Neto" id="TOTALNETOORIGNAL" name="TOTALNETOORIGNAL" value="<?php echo $TOTALNETOORIGNAL; ?>" />
                                            <input type="hidden" class="form-control" placeholder="Total Neto Envase Repaletizaje" id="TOTALNETOREPALETIZAJE" name="TOTALNETOREPALETIZAJE" value="<?php echo $TOTALNETOREPALETIZAJE; ?>" />
                                            <input type="hidden" class="form-control" placeholder="Total Cantidad Envase Repaletizaje" id="TOTALENVASEREPALETIZAJE" name="TOTALENVASEREPALETIZAJE" value="<?php echo $TOTALENVASEREPALETIZAJE; ?>" />
                                            <input type="hidden" class="form-control" placeholder="Diferencia Envase" id="DIFERENCIACAJAS" name="DIFERENCIACAJAS" value="<?php echo $DIFERENCIACAJAS; ?>" />


                                            <input type="hidden" class="form-control" placeholder="ID REPALETIZAJE" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="OP REPALETIZAJE" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="URL REPALETIZAJE" id="URLP" name="URLP" value="registroRepaletizajePTFrigorifico" />

                                            <label>Número Repaletizaje</label>
                                            <input type="text" class="form-control" placeholder="Número Repaletizaje" id="NUMEROVER" name="NUMEROVER" value="<?php echo $NUMEROVER; ?>" disabled />
                                            <label id="val_id" class="validacion"> </label>
                                        </div>
                                        <div class="col-xxl-6 col-xl-1 col-lg-1 col-md-6 col-sm-6 col-6 col-xs-6">
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6>
                                            <div class="form-group">
                                            <label>Fecha Ingreso</label>
                                            <input type="hidden" class="form-control" placeholder="FECHA INGRESO" id="FECHAINGRESOPALETIZAJEE" name="FECHAINGRESOPALETIZAJEE" value="<?php echo $FECHAINGRESOPALETIZAJE; ?>" />
                                            <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="Fecha Ingreso" id="FECHAINGRESOPALETIZAJE" name="FECHAINGRESOPALETIZAJE" value="<?php echo $FECHAINGRESOPALETIZAJE; ?>" disabled />
                                            <label id="val_fechai" class="validacion"> </label>
                                        </div>

                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Modificación</label>
                                                <input type="hidden" class="form-control" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACIONPALETIZAJEE" name="FECHAMODIFCIACIONPALETIZAJEE" value="<?php echo $FECHAMODIFCIACIONPALETIZAJE; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="FECHA Modificación" id="FECHAMODIFCIACIONPALETIZAJE" name="FECHAMODIFCIACIONPALETIZAJE" value="<?php echo $FECHAMODIFCIACIONPALETIZAJE; ?>" disabled />
                                                <label id="val_fecham" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <label>Motivo</label>
                                            <input type="hidden" class="form-control" placeholder="Motivo a Repaletizar" id="MOTIVOREPALETIZAJEE" name="MOTIVOREPALETIZAJEE" value="<?php echo $MOTIVOREPALETIZAJE; ?>" />
                                            <textarea class="form-control" rows="1" placeholder="Motivo a Repaletizar" id="MOTIVOREPALETIZAJE" name="MOTIVOREPALETIZAJE" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED2; ?> ><?php echo $MOTIVOREPALETIZAJE; ?></textarea>
                                            <label id="val_motivo" class="validacion"> </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->                                
                                <div class="box-footer">
                                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar">
                                        <div class="btn-group  col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <?php if ($OP == "") { ?>
                                                <button type=" button" class="btn btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroRepaletizajePTFrigorifico.php');">
                                                    <i class="ti-trash"></i> Borrar
                                                </button>
                                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Guardar" name="CREAR" value="CREAR" <?php echo $DISABLEDFOLIO; ?>    onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <button type="button" class="btn btn-success " data-toggle="tooltip" title="Volver" name="VOLVER" value="VOLVER" Onclick="irPagina('listarRepaletizajePTFrigorifico.php'); ">
                                                    <i class="ti-back-left "></i> Volver
                                                </button>
                                                <button type="submit" class="btn btn-warning " data-toggle="tooltip" title="Guardar" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?>   onclick="return validacion()">
                                                    <i class="ti-pencil-alt"></i> Guardar
                                                </button>
                                                <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Cerrar" name="CERRAR" value="CERRAR" <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?>   onclick="return  validacion()">
                                                    <i class="ti-save-alt"></i> Cerrar
                                                </button>
                                            <?php } ?>
                                        </div>
                                        <div class="btn-group  col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12  float-right">
                                            <?php if ($OP != "") : ?>
                                                <button type="button" class="btn  btn-primary  " data-toggle="tooltip" title="Informe" id="defecto" name="tarjas" <?php echo $DISABLEDFOLIO; ?> Onclick="abrirPestana('../documento/informeRepaletizajePT.php?parametro=<?php echo $IDOP; ?>&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                    <i class="fa fa-file-pdf-o"></i> Informe
                                                </button>
                                                <button type="button" class="btn btn-info  " data-toggle="tooltip" title="Tarja" id="defecto" name="tarjas" <?php echo $DISABLEDFOLIO; ?> Onclick="abrirPestana('../documento/informeTarjasRepaletizajePT.php?parametro=<?php echo $IDOP; ?>'); ">
                                                    <i class="fa fa-file-pdf-o"></i> Tarjas
                                                </button>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <?php if (isset($_GET['op'])): ?>
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h4 class="title_section">Ingreso / Existencia producto terminado</h4>
                                </div>                              
                                <div class="card-header">
                                    <form method="post" id="form2" name="form2">
                                        <div class="form-row align-items-center">
                                            <input type="hidden" class="form-control" placeholder="ID PROCESO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="OP PROCESO" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="URL PROCESO" id="URLP" name="URLP" value="registroRepaletizajePTFrigorifico" />
                                            <input type="hidden" class="form-control" placeholder="URL SELECCION" id="URLD" name="URLD" value="registroSelecionExistenciaPTRepaletizaje" />
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-success btn-block mb-2" data-toggle="tooltip" title="Seleccion Existencia" id="SELECIONOCDURL" name="SELECIONOCDURL" 
                                                    <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?> <?php if ($ESTADO == 0) {   echo "disabled style='background-color: #eeeeee;'";    } ?>>
                                                    Seleccion Existencia
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>                          
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="table-responsive">
                                                    <table id="ingreso" class="table table-hover " style="width: 100%;">
                                                        <thead>
                                                            <tr class="text-left">
                                                                <th> N° Folio </th>
                                                                <th>Condición </th>
                                                                <th class="text-center">Operaciónes</th>
                                                                <th>Fecha Embalado </th>
                                                                <th>Código Estandar</th>
                                                                <th>Envase/Estandar</th>
                                                                <th>Variedad</th>
                                                                <th>Cantidad Envase</th>
                                                                <th>Kilos Neto</th>
                                                                <th>% Deshidratacion</th>
                                                                <th>Kilos Deshidratacion</th>
                                                                <th>Kilos Bruto</th>
                                                                <th>CSG</th>
                                                                <th>Productor</th>
                                                                <th>Embolsado</th>
                                                                <th>Tipo Manejo</th>
                                                                <th>Calibre </th>
                                                                <th>Embalaje </th>
                                                                <th>Stock</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if ($ARRAYTOMADO) { ?>
                                                                <?php foreach ($ARRAYTOMADO as $r) : ?>
                                                                    <?php
                                                                    $CONTADOR = $CONTADOR + 1;
                                                                    if ($r['TESTADOSAG'] == null || $r['TESTADOSAG'] == "0") {
                                                                        $ESTADOSAG = "Sin Condición";
                                                                    }
                                                                    if ($r['TESTADOSAG'] == "1") {
                                                                        $ESTADOSAG =  "En Inspección";
                                                                    }
                                                                    if ($r['TESTADOSAG'] == "2") {
                                                                        $ESTADOSAG =  "Aprobado Origen";
                                                                    }
                                                                    if ($r['TESTADOSAG'] == "3") {
                                                                        $ESTADOSAG =  "Aprobado USLA";
                                                                    }
                                                                    if ($r['TESTADOSAG'] == "4") {
                                                                        $ESTADOSAG =  "Fumigado";
                                                                    }
                                                                    if ($r['TESTADOSAG'] == "5") {
                                                                        $ESTADOSAG =  "Rechazado";
                                                                    }
                                                                    $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                                    if ($ARRAYVERPRODUCTORID) {
                                                                        $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                                        $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                                    } else {
                                                                        $CSGPRODUCTOR = "Sin Datos";
                                                                        $NOMBREPRODUCTOR = "Sin Datos";
                                                                    }
                                                                    $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
                                                                    if ($ARRAYVERVESPECIESID) {
                                                                        $NOMBREVARIEDAD = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                                    } else {
                                                                        $NOMBREVARIEDAD = "Sin Datos";
                                                                    }
                                                                    $ARRAYEVERERECEPCIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                                    if ($ARRAYEVERERECEPCIONID) {
                                                                        $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
                                                                        $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                                    } else {
                                                                        $NOMBREESTANDAR = "Sin Datos";
                                                                        $CODIGOESTANDAR = "Sin Datos";
                                                                    }
                                                                    if ($r['EMBOLSADO'] == "1") {
                                                                        $EMBOLSADO =  "SI";
                                                                    }
                                                                    if ($r['EMBOLSADO'] == "0") {
                                                                        $EMBOLSADO =  "NO";
                                                                    }
                                                                    $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
                                                                    if ($ARRAYTMANEJO) {
                                                                        $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                                    } else {
                                                                        $NOMBRETMANEJO = "Sin Datos";
                                                                    }
                                                                    $ARRAYTCALIBRE = $TCALIBRE_ADO->verCalibre($r['ID_TCALIBRE']);
                                                                    if ($ARRAYTCALIBRE) {
                                                                        $NOMBRETCALIBRE = $ARRAYTCALIBRE[0]['NOMBRE_TCALIBRE'];
                                                                    } else {
                                                                        $NOMBRETCALIBRE = "Sin Datos";
                                                                    }
                                                                    $ARRAYTEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($r['ID_TEMBALAJE']);
                                                                    if ($ARRAYTEMBALAJE) {
                                                                        $NOMBRETEMBALAJE = $ARRAYTEMBALAJE[0]['NOMBRE_TEMBALAJE'];
                                                                    } else {
                                                                        $NOMBRETEMBALAJE = "Sin Datos";
                                                                    }
                                                                    $ARRAYDREPALETIZAJEBOLSA = $DREPALETIZAJEEX_ADO->obtenerTotalesDrepaletizajePorExistencia2($r['ID_EXIEXPORTACION']);
                                                                    if($ARRAYDREPALETIZAJEBOLSA){
                                                                        if($ARRAYDREPALETIZAJEBOLSA[0]["ENVASE"]=="0"){
                                                                            $NODATO="1";
                                                                        }else{                                                                    
                                                                            $NODATO="0";
                                                                        }
                                                                    }else{
                                                                        $NODATO="1";
                                                                    }
                                                                    
                                                                    ?>
                                                                    <tr class="text-left">
                                                                        <td><?php echo $r['FOLIO_AUXILIAR_EXIEXPORTACION']; ?> </td>
                                                                        <td><?php echo $ESTADOSAG; ?></td>
                                                                        <td class="text-center">
                                                                            <form method="post" id="form1">
                                                                                <input type="hidden" class="form-control" placeholder="ID REPALETIZAJE" id="IDREPALETIZAJEAUX" name="IDREPALETIZAJEAUX" value="<?php echo $IDREPALETIZAJE; ?>" />
                                                                                <input type="hidden" class="form-control" id="IDQUITAR" name="IDQUITAR" value="<?php echo $r['ID_EXIEXPORTACION']; ?>" />
                                                                                <div class="btn-group col-6 btn-block" role="group" aria-label="Operaciones Detalle">
                                                                                    <button type="submit" class="btn btn-danger btn-sm   " id="QUITAR" name="QUITAR" data-toggle="tooltip" title="Quitar  Existencia" 
                                                                                        <?php echo $DISABLED2; ?> <?php if ($NODATO =="0") { echo "disabled"; } ?>
                                                                                        <?php  if ($ESTADO == "0") { echo "disabled"; } ?>>
                                                                                            <i class="ti-close  "></i> Quitar
                                                                                    </button>
                                                                                </div>
                                                                            </form>
                                                                        </td>
                                                                        <td><?php echo $r['EMBALADO']; ?></td>
                                                                        <td><?php echo $CODIGOESTANDAR; ?></td>
                                                                        <td><?php echo $NOMBREESTANDAR; ?></td>
                                                                        <td><?php echo $NOMBREVARIEDAD; ?></td>
                                                                        <td><?php echo $r['ENVASE']; ?></td>
                                                                        <td><?php echo $r['NETO']; ?></td>
                                                                        <td><?php echo $r['PORCENTAJE']; ?></td>
                                                                        <td><?php echo $r['DESHIRATACION']; ?></td>
                                                                        <td><?php echo $r['BRUTO']; ?></td>
                                                                        <td><?php echo $CSGPRODUCTOR; ?></td>
                                                                        <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                                        <td><?php echo $EMBOLSADO; ?></td>
                                                                        <td><?php echo $NOMBRETMANEJO; ?></td>
                                                                        <td><?php echo $NOMBRETCALIBRE; ?></td>
                                                                        <td><?php echo $NOMBRETEMBALAJE; ?></td>
                                                                        <td><?php echo $r['STOCKR']; ?></td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header bg-success">
                                    <h4 class="card-title">
                                        Salida / Detalle repaletizaje
                                    </h4>
                                </div>                                                        
                                <div class="card-header">
                                    <div class="form-row align-items-center">
                                        <form method="post" id="form2" name="form2">
                                            <input type="hidden" class="form-control" placeholder="ID RECEPCIONMP" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="OP RECEPCIONMP" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="URL RECEPCIONMP" id="URLP" name="URLP" value="registroRepaletizajePTFrigorifico" />
                                            <input type="hidden" class="form-control" placeholder="URL DRECEPCIONMP" id="URLD" name="URLD" value="registroDrepaletizajePTSeleccionCaja" />
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-success btn-block mb-2" data-toggle="tooltip" title="Agregar Detalle Repaletizaje" id="CREARDURL" name="CREARDURL"
                                                    <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?> <?php if ($ESTADO == 0) : ?> disabled style='background-color: #eeeeee;' <?php endif ?>>
                                                    Agregar Detalle
                                                </button>
                                            </div>
                                        </form>
                                        <div class="col-auto">
                                            <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Envase Original</div>
                                                </div>
                                                <input type="hidden" name="TOTALENVASEORIGNAL" id="TOTALENVASEORIGNAL" value="<?php echo $TOTALENVASEORIGNAL; ?>" />
                                                <input type="text" class="form-control" placeholder="Total Envase" id="TOTALENVASEORIGNALV" name="TOTALENVASEORIGNALV" value="<?php echo $TOTALENVASEORIGNAL2; ?>" disabled />
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Envase Repaletizado</div>
                                                </div>
                                                <input type="hidden" name="TOTALENVASEREPALETIZAJE" id="TOTALENVASEREPALETIZAJE" value="<?php echo $TOTALENVASEREPALETIZAJE; ?>" />
                                                <input type="text" class="form-control" placeholder="Total Neto" id="TOTALENVASEREPALETIZAJEV" name="TOTALENVASEREPALETIZAJEV" value="<?php echo $TOTALENVASEREPALETIZAJE2; ?>" disabled />
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Diferencia Envase</div>
                                                </div>
                                                <input type="hidden" name="DIFERENCIACAJAS" id="DIFERENCIACAJAS" value="<?php echo $DIFERENCIACAJAS; ?>" />
                                                <input type="text" class="form-control" placeholder="Total Bruto" id="DIFERENCIACAJASV" name="DIFERENCIACAJASV" value="<?php echo $DIFERENCIACAJAS; ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table id="detalle" class="table table-hover " style="width: 100%;">
                                                    <thead>
                                                        <tr class="text-left">
                                                            <th> Folio Nuevo </th>
                                                            <th class="text-center">Operaciónes</th>
                                                            <th>Fecha Embalado </th>
                                                            <th>Código Estandar </th>
                                                            <th>Envase/Estandar </th>
                                                            <th>Variedad</th>
                                                            <th>Cantidad Envase </th>
                                                            <th>Kilo Neto </th>
                                                            <th>CSG</th>
                                                            <th>Productor</th>
                                                            <th>Embolsado</th>
                                                            <th>Tipo Manejo</th>
                                                            <th>Calibre</th>
                                                            <th>Embalaje</th>
                                                            <th>Stock</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if ($ARRAYDREPALETIZAJE) { ?>
                                                            <?php foreach ($ARRAYDREPALETIZAJE as $r) : ?>
                                                                <?php
                                                                $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                                if ($ARRAYVERPRODUCTORID) {
                                                                    $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                                    $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                                } else {
                                                                    $CSGPRODUCTOR = "Sin Datos";
                                                                    $NOMBREPRODUCTOR = "Sin Datos";
                                                                }
                                                                $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
                                                                if ($ARRAYVERVESPECIESID) {
                                                                    $NOMBREVARIEDAD = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                                } else {
                                                                    $NOMBREVARIEDAD = "Sin Datos";
                                                                }
                                                                $ARRAYEVERERECEPCIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                                if ($ARRAYEVERERECEPCIONID) {
                                                                    $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
                                                                    $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                                } else {
                                                                    $NOMBREESTANDAR = "Sin Datos";
                                                                    $CODIGOESTANDAR = "Sin Datos";
                                                                }
                                                                if ($r['EMBOLSADO'] == "1") {
                                                                    $EMBOLSADO =  "SI";
                                                                }
                                                                if ($r['EMBOLSADO'] == "0") {
                                                                    $EMBOLSADO =  "NO";
                                                                }
                                                                $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
                                                                if ($ARRAYTMANEJO) {
                                                                    $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                                } else {
                                                                    $NOMBRETMANEJO = "Sin Datos";
                                                                }
                                                                $ARRAYTCALIBRE = $TCALIBRE_ADO->verCalibre($r['ID_TCALIBRE']);
                                                                if ($ARRAYTCALIBRE) {
                                                                    $NOMBRETCALIBRE = $ARRAYTCALIBRE[0]['NOMBRE_TCALIBRE'];
                                                                } else {
                                                                    $NOMBRETCALIBRE = "Sin Datos";
                                                                }
                                                                $ARRAYTEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($r['ID_TEMBALAJE']);
                                                                if ($ARRAYTEMBALAJE) {
                                                                    $NOMBRETEMBALAJE = $ARRAYTEMBALAJE[0]['NOMBRE_TEMBALAJE'];
                                                                } else {
                                                                    $NOMBRETEMBALAJE = "Sin Datos";
                                                                }
                                                                ?>
                                                                <tr class="text-lef">
                                                                    <td> <?php echo $r['FOLIO_NUEVO_DREPALETIZAJE']; ?> </td>
                                                                    <td class="text-center">
                                                                        <form method="post" id="form3">
                                                                            <input type="hidden" class="form-control" id="FOLIOELIMINAR" name="FOLIOELIMINAR" value="<?php echo $r['FOLIO_NUEVO_DREPALETIZAJE']; ?>" />
                                                                            <input type="hidden" class="form-control" id="CAJAS" name="CAJAS" value="<?php echo $r['CANTIDAD_ENVASE_DREPALETIZAJE']; ?>" />
                                                                            <input type="hidden" class="form-control" id="IDTMANEJO" name="IDTMANEJO" value="<?php echo $r['ID_TMANEJO']; ?>" />
                                                                            <input type="hidden" class="form-control" id="IDTCALIBRE" name="IDTCALIBRE" value="<?php echo $r['ID_TCALIBRE']; ?>" />
                                                                            <input type="hidden" class="form-control" id="IDTEMBALAJE" name="IDTEMBALAJE" value="<?php echo $r['ID_TEMBALAJE']; ?>" />

                                                                            <input type="hidden" class="form-control" id="IDPRODUCTOR" name="IDPRODUCTOR" value="<?php echo $r['ID_PRODUCTOR']; ?>" />
                                                                            <input type="hidden" class="form-control" id="IDVESPECIES" name="IDVESPECIES" value="<?php echo $r['ID_VESPECIES']; ?>" />
                                                                            <input type="hidden" class="form-control" id="IDESTANDAR" name="IDESTANDAR" value="<?php echo $r['ID_ESTANDAR']; ?>" />
                                                                            <input type="hidden" class="form-control" id="IDFOLIO" name="IDFOLIO" value="<?php echo $r['ID_FOLIO']; ?>" />

                                                                            <input type="hidden" class="form-control" id="FECHAEMBALADO" name="FECHAEMBALADO" value="<?php echo $r['FECHA_EMBALADO_DREPALETIZAJE']; ?>" />
                                                                            <input type="hidden" class="form-control" id="REPALETIZAJE" name="REPALETIZAJE" value="<?php echo $r['ID_REPALETIZAJE']; ?>" />
                                                                            <input type="hidden" class="form-control" id="IDDREPALETIZAJE" name="IDDREPALETIZAJE" value="<?php echo $r['ID_DREPALETIZAJE']; ?>" />                                                                     
                                                                            <div class="btn-group col-6 btn-block" role="group" aria-label="Operaciones Detalle">
                                                                                <button type="submit" class="btn btn-danger btn-sm  " id="ELIMINAR" name="ELIMINAR" data-toggle="tooltip" title="Eliminar Existencia" <?php echo $DISABLED2; ?>
                                                                                <?php if ($ESTADO == "0") {   echo "disabled";  } ?>>
                                                                                    <i class="ti-close"></i> Eliminar
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </td>
                                                                    <td><?php echo $r['EMBALADO']; ?></td>
                                                                    <td><?php echo $CODIGOESTANDAR; ?></td>
                                                                    <td><?php echo $NOMBREESTANDAR; ?></td>
                                                                    <td><?php echo $NOMBREVARIEDAD; ?></td>
                                                                    <td><?php echo $r['ENVASE']; ?></td>
                                                                    <td><?php echo $r['NETO']; ?></td>
                                                                    <td><?php echo $CSGPRODUCTOR; ?></td>
                                                                    <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                                    <td><?php echo $EMBOLSADO; ?></td>
                                                                    <td><?php echo $NOMBRETMANEJO; ?></td>
                                                                    <td><?php echo $NOMBRETCALIBRE; ?></td>
                                                                    <td><?php echo $NOMBRETEMBALAJE; ?></td>
                                                                    <td><?php echo $r['STOCKR']; ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
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
        <?php       

        //OPERACIONES
        //OPERACION DE REGISTRO DE FILA
        if (isset($_REQUEST['CREAR'])) {
            $ARRAYNUMERO = $REPALETIZAJEEX_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
            $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;

            $REPALETIZAJEEX->__SET('NUMERO_REPALETIZAJE', $NUMERO);
            $REPALETIZAJEEX->__SET('MOTIVO_REPALETIZAJE', $_REQUEST['MOTIVOREPALETIZAJE']);
            $REPALETIZAJEEX->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
            $REPALETIZAJEEX->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
            $REPALETIZAJEEX->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
            $REPALETIZAJEEX->__SET('ID_USUARIOI', $IDUSUARIOS);
            $REPALETIZAJEEX->__SET('ID_USUARIOM', $IDUSUARIOS);
            //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
            $REPALETIZAJEEX_ADO->agregarRepaletizaje($REPALETIZAJEEX);
            $ARRYAOBTENERID = $REPALETIZAJEEX_ADO->obtenerId(
                $_REQUEST['EMPRESA'],
                $_REQUEST['PLANTA'],
                $_REQUEST['TEMPORADA']
            );
            //REDIRECCIONAR A PAGINA registroRecepcion.php
            $_SESSION["parametro"] = $ARRYAOBTENERID[0]['ID_REPALETIZAJE'];
            $_SESSION["parametro1"] = "crear";

            echo '<script>
                Swal.fire({
                    icon:"success",
                    title:"Registro Creado",
                    text:"El registro de repaletizaje se ha creado correctamente",
                    showConfirmButton: true,
                    confirmButtonText:"Cerrar",
                    closeOnConfirm:false
                }).then((result)=>{
                    location.href = "registroRepaletizajePTFrigorifico.php?op";                            
                })
            </script>';
        }


        if (isset($_REQUEST['GUARDAR'])) {
            $REPALETIZAJEEX->__SET('CANTIDAD_ENVASE_REPALETIZAJE', $_REQUEST['TOTALENVASEORIGINAL']);
            $REPALETIZAJEEX->__SET('KILOS_NETO_REPALETIZAJE', $_REQUEST['TOTALNETOREPALETIZAJE']);
            $REPALETIZAJEEX->__SET('CANTIDAD_ENVASE_ORIGINAL', $_REQUEST['TOTALENVASEREPALETIZAJE']);
            $REPALETIZAJEEX->__SET('KILOS_NETO_ORIGINAL', $_REQUEST['TOTALNETOORIGNAL']);
            $REPALETIZAJEEX->__SET('MOTIVO_REPALETIZAJE', $_REQUEST['MOTIVOREPALETIZAJE']);
            $REPALETIZAJEEX->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
            $REPALETIZAJEEX->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
            $REPALETIZAJEEX->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
            $REPALETIZAJEEX->__SET('ID_USUARIOM', $IDUSUARIOS);
            $REPALETIZAJEEX->__SET('ID_REPALETIZAJE', $_REQUEST['IDP']);
            //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
            $REPALETIZAJEEX_ADO->actualizarRepaletizaje($REPALETIZAJEEX);

            if ($_SESSION['parametro1'] == "crear") {
                $_SESSION["parametro"] = $_REQUEST['IDP'];
                $_SESSION["parametro1"] = "crear";
                echo '<script>
                    Swal.fire({
                        icon:"info",
                        title:"Registro Modificado",
                        text:"El registro de repaletizaje se ha modificada correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroRepaletizajePTFrigorifico.php?op";                        
                    })
                </script>';
            }
            if ($_SESSION['parametro1'] == "editar") {
                $_SESSION["parametro"] = $_REQUEST['IDP'];
                $_SESSION["parametro1"] = "editar";
                echo '<script>
                    Swal.fire({
                        icon:"info",
                        title:"Registro Modificado",
                        text:"El registro de repaletizaje se ha modificada correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroRepaletizajePTFrigorifico.php?op";                        
                    })
                </script>';
            }
        }


        //OPERACION EDICION DE FILA
        if (isset($_REQUEST['CERRAR'])) {
            $ARRAYEXIEXPORTACIONTOMADO = $EXIEXPORTACION_ADO->buscarPorRepaletizaje($_REQUEST['IDP']);
            $ARRAYDREPALETIZAJE = $DREPALETIZAJEEX_ADO->buscarDrepaletizaje($_REQUEST['IDP']);
            $ARRAYEXIEXPORTACIONINGRESANDOREPALETIZADO = $EXIEXPORTACION_ADO->buscarPorRepaletizajeIngresando($_REQUEST['IDP']);

            if (empty($ARRAYEXIEXPORTACIONTOMADO) || empty($ARRAYEXIEXPORTACIONINGRESANDOREPALETIZADO)) {
                $SINO = "1";
                $MENSAJE = $MENSAJE." Tiene que haber al menos un registro de existencia selecionado. ";

                if ($ARRAYDREPALETIZAJE) {
                    $SINO = "0";
                    $MENSAJE = $MENSAJE;
                    if ($_REQUEST['DIFERENCIACAJAS'] == 0) {
                        $SINO = "0";
                        $MENSAJE = "";
                    } else {
                        $SINO = "1";
                        $MENSAJE = $MENSAJE." La diferencia de envases tiene que ser cero. ";
                    }
                } else {
                    $SINO = "1";
                    $MENSAJE = $MENSAJE."Tiene que haber al menos un registro en el detalle. ";
                }
            } else {
                $SINO = "0";
                $MENSAJE=$MENSAJE;

            }
            if($SINO == 1){
                echo '<script>
                    Swal.fire({
                        icon:"warning",
                        title:"Accion restringida",
                        text:"'.$MENSAJE.'",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroRepaletizajePTFrigorifico.php?op";                        
                    });
                </script>';
        }

            if ($SINO == "0") {
                $REPALETIZAJEEX->__SET('CANTIDAD_ENVASE_REPALETIZAJE', $_REQUEST['TOTALENVASEORIGINAL']);
                $REPALETIZAJEEX->__SET('KILOS_NETO_REPALETIZAJE', $_REQUEST['TOTALNETOREPALETIZAJE']);
                $REPALETIZAJEEX->__SET('CANTIDAD_ENVASE_ORIGINAL', $_REQUEST['TOTALENVASEREPALETIZAJE']);
                $REPALETIZAJEEX->__SET('KILOS_NETO_ORIGINAL', $_REQUEST['TOTALNETOORIGNAL']);
                $REPALETIZAJEEX->__SET('MOTIVO_REPALETIZAJE', $_REQUEST['MOTIVOREPALETIZAJE']);
                $REPALETIZAJEEX->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $REPALETIZAJEEX->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                $REPALETIZAJEEX->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                $REPALETIZAJEEX->__SET('ID_USUARIOM', $IDUSUARIOS);
                $REPALETIZAJEEX->__SET('ID_REPALETIZAJE', $_REQUEST['IDP']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $REPALETIZAJEEX_ADO->actualizarRepaletizaje($REPALETIZAJEEX);


                $REPALETIZAJEEX->__SET('ID_REPALETIZAJE', $_REQUEST['IDP']);
                // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $REPALETIZAJEEX_ADO->cerrado($REPALETIZAJEEX);

                $ARRAYEXIEXPORTACIONTOMADO = $EXIEXPORTACION_ADO->buscarPorRepaletizaje($_REQUEST['IDP']);
                foreach ($ARRAYEXIEXPORTACIONTOMADO as $s) :
                    $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $s['ID_EXIEXPORTACION']);
                    // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $EXIEXPORTACION_ADO->Repaletizaje($EXIEXPORTACION);
                endforeach;


                $ARRAYEXIEXPORTACIONINGRESANDOREPALETIZADO = $EXIEXPORTACION_ADO->buscarPorRepaletizajeIngresando($_REQUEST['IDP']);
                foreach ($ARRAYEXIEXPORTACIONINGRESANDOREPALETIZADO as $s) :
                    $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $s['ID_EXIEXPORTACION']);
                    // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                   $EXIEXPORTACION_ADO->vigente($EXIEXPORTACION);
                endforeach;

                //REDIRECCIONAR A PAGINA registroRepaletizajePTFrigorifico.php
                //SEGUNE EL TIPO DE OPERACIONS QUE SE INDENTIFIQUE EN LA URL

                if ($_SESSION['parametro1'] == "crear") {
                    $_SESSION["parametro"] = $_REQUEST['IDP'];
                    $_SESSION["parametro1"] = "ver";
                    echo '<script>
                        Swal.fire({
                            icon:"info",
                            title:"Registro Cerrado",
                            text:"Este repaletizaje se encuentra cerrada y no puede ser modificada.",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroRepaletizajePTFrigorifico.php?op";                            
                        })
                    </script>';
                }
                if ($_SESSION['parametro1'] == "editar") {
                    $_SESSION["parametro"] = $_REQUEST['IDP'];
                    $_SESSION["parametro1"] = "ver";
                    echo '<script>
                        Swal.fire({
                            icon:"info",
                            title:"Registro Cerrado",
                            text:"Este repaletizaje se encuentra cerrada y no puede ser modificada.",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroRepaletizajePTFrigorifico.php?op";                            
                        })
                    </script>';
                } 
            }
        }
        if (isset($_REQUEST['QUITAR'])) {

            $IDQUITAR = $_REQUEST['IDQUITAR'];
            $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $IDQUITAR);
            // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
            $EXIEXPORTACION_ADO->actualizarDeselecionarRepaletizajeCambiarEstado($EXIEXPORTACION);            
            echo '<script>
                Swal.fire({
                    icon:"error",
                    title:"Accion realizada",
                    text:"Se ha quitado la existencia del repaletizaje.",
                    showConfirmButton: true,
                    confirmButtonText:"Cerrar",
                    closeOnConfirm:false
                }).then((result)=>{
                    location.href = "registroRepaletizajePTFrigorifico.php?op";                            
                })
             </script>';
        }

        if (isset($_REQUEST['ELIMINAR'])) {
            $IDDREPALETIZAJE = $_REQUEST['IDDREPALETIZAJE'];
            $FOLIOELIMINAR = $_REQUEST['FOLIOELIMINAR'];
            $CAJAS = $_REQUEST['CAJAS'];
            $IDVESPECIES = $_REQUEST['IDVESPECIES'];
            $IDPRODUCTOR = $_REQUEST['IDPRODUCTOR'];

            $IDTMANEJO = $_REQUEST['IDTMANEJO'];
            $IDTCALIBRE = $_REQUEST['IDTCALIBRE'];
            $IDTEMBALAJE = $_REQUEST['IDTEMBALAJE'];

            $IDESTANDAR = $_REQUEST['IDESTANDAR'];
            $IDFOLIO = $_REQUEST['IDFOLIO'];
            $FECHAEMBALADO = $_REQUEST['FECHAEMBALADO'];
            $REPALETIZAJE = $_REQUEST['REPALETIZAJE'];

            $DREPALETIZAJEEX->__SET('ID_DREPALETIZAJE', $IDDREPALETIZAJE);
            $DREPALETIZAJEEX_ADO->deshabilitar($DREPALETIZAJEEX);

            $ARRAYDESAHABILITAR = $EXIEXPORTACION_ADO->buscarExiexportacionEliminar(
                $FOLIOELIMINAR,
                $CAJAS,
                $IDTMANEJO,
                $IDTCALIBRE,
                $IDTEMBALAJE,
                $IDVESPECIES,
                $IDPRODUCTOR,
                $IDESTANDAR,
                $IDFOLIO,
                $FECHAEMBALADO,
                $REPALETIZAJE
            );

            foreach ($ARRAYDESAHABILITAR as $r) :
                $EXIEXPORTACION->__SET('ID_REPALETIZAJE', $REPALETIZAJE);
                $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $r["ID_EXIEXPORTACION"]);
                $EXIEXPORTACION_ADO->deshabilitarRepaletizaje($EXIEXPORTACION);

                $EXIEXPORTACION->__SET('ID_REPALETIZAJE', $REPALETIZAJE);
                $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $r["ID_EXIEXPORTACION"]);
                $EXIEXPORTACION_ADO->eliminadoRepaletizaje($EXIEXPORTACION);
            endforeach;
       
            echo '<script>
                Swal.fire({
                    icon:"error",
                    title:"Registro eliminado",
                    text:"El registro de producto terminado se ha eliminado correctamente.",
                    showConfirmButton: true,
                    confirmButtonText:"Cerrar",
                    closeOnConfirm:false
                }).then((result)=>{
                    location.href = "registroRepaletizajePTFrigorifico.php?op";                            
                })
             </script>';
        }


     
        ?>
</body>

</html>