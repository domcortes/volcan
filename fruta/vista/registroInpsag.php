<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/INPSAG_ADO.php';
include_once '../controlador/TINPSAG_ADO.php';

include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/INPECTOR_ADO.php';
include_once '../controlador/CONTRAPARTE_ADO.php';
include_once '../controlador/PAIS_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';
include_once '../controlador/TCALIBRE_ADO.php';
include_once '../controlador/TEMBALAJE_ADO.php';


include_once '../modelo/INPSAG.php';
include_once '../modelo/EXIEXPORTACION.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$VESPECIES_ADO =  new VESPECIES_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();

$EEXPORTACION_ADO = new EEXPORTACION_ADO();
$EXIEXPORTACION_ADO = new EXIEXPORTACION_ADO();
$INPSAG_ADO =  new INPSAG_ADO();
$TINPSAG_ADO =  new TINPSAG_ADO();
$INPECTOR_ADO =  new INPECTOR_ADO();
$CONTRAPARTE_ADO =  new CONTRAPARTE_ADO();
$PAIS_ADO =  new PAIS_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();

//INIICIALIZAR MODELO EXIEXPORTACION
$INPSAG =  new INPSAG();
$EXIEXPORTACION =  new EXIEXPORTACION();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NUMERO = "";
$NUMEROVER = "";
$IDINPSAG = "";
$FECHAINGRESOINPSAG = "";
$FECHAMODIFCIACIONINPSAG = "";
$TINPSAG = "";
$TESTADOSAG = "";

$CANTIDADENVASEINPSAG = "";
$KILOSNETOINPSAG = "";
$KILOSBRUTOINPSAG = "";

$FECHAINPSAG = "";
$OBSERVACIONINPSAG = "";

$ESTADO = "";
$TOTALENVASE = "";
$TOTALNETO = "";
$TOTALBRUTO = "";
$TOTALENVASE2 = "";
$TOTALNETO2 = "";
$TOTALBRUTO2 = "";


$IDEXIEXPORTACIONQUITAR = "";
$FOLIOEXIEXPORTACIONQUITAR = "";
$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$INPECTOR = "";
$CONTRAPARTE = "";
$PAIS1 = "";
$PAIS2 = "";
$PAIS3 = "";
$PAIS4 = "";
$CIF = "";

$IDEMPRESA = "";
$IDPLANTA = "";
$IDTEMPORADA = "";



$SINO = "";
$IDOP = "";
$OP = "";
$ID = "";

$EEXPORTACION = "";
$VESPECIES = "";
$CALIBRE = "";
$PRODUCTOR = "";

$DISABLED = "";
$DISABLED2 = "disabled";
$DISABLED3 = "";
$DISABLED4 = "";
$DISABLEDSTYLE = "";

$MENSAJE = "";
$MENSAJE2 = "";
$MENSAJE3 = "";
$MENSAJEVALIDATO = "";


//INICIALIZAR ARREGLOS

$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";
$ARRAYTINPSAG = "";

$ARRAYINPSAG = "";
$ARRAYINPSAG2 = "";
$ARRAYPVESPECIES = "";
$ARRAYESTANDAR = "";
$ARRAYFECHAACTUAL = "";
$ARRAYCONTRAPARTE = "";
$ARRAYINPECTOR = "";
$ARRAYPAIS = "";
$ARRAYNUMERO = "";


$ARRAYTOMADO = "";
$ARRAYSAGAPROTOMADO = "";
$ARRAYSAGNOAPROTOMADO = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYTINPSAG = $TINPSAG_ADO->listarTinpsagCBX();
$ARRAYCONTRAPARTE =  $CONTRAPARTE_ADO->listarContrapartePorEmpresaCBX($EMPRESAS);
$ARRAYINPECTOR = $INPECTOR_ADO->listarInpectorPorEmpresaCBX($EMPRESAS);
$ARRAYPAIS = $PAIS_ADO->listarPaisCBX();
$ARRAYFECHAACTUAL = $INPSAG_ADO->obtenerFecha();
$FECHAINPSAG = $ARRAYFECHAACTUAL[0]['FECHA'];
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrlD.php";



//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['parametro'];
    $OP = $_SESSION['parametro1'];

    $ARRAYTOMADO = $EXIEXPORTACION_ADO->buscarPorSag2($IDOP);
    $ARRAYDESPACHOTOTAL = $EXIEXPORTACION_ADO->obtenerTotalesInspSag($IDOP);
    $ARRAYDESPACHOTOTAL2 = $EXIEXPORTACION_ADO->obtenerTotalesInspSag2($IDOP);

    $TOTALENVASE = $ARRAYDESPACHOTOTAL[0]['ENVASE'];
    $TOTALNETO = $ARRAYDESPACHOTOTAL[0]['NETO'];
    $TOTALBRUTO = $ARRAYDESPACHOTOTAL[0]['BRUTO'];
    $TOTALENVASE2 = $ARRAYDESPACHOTOTAL2[0]['ENVASE'];
    $TOTALNETO2 = $ARRAYDESPACHOTOTAL2[0]['NETO'];
    $TOTALBRUTO2 = $ARRAYDESPACHOTOTAL2[0]['BRUTO'];



    //FUNCION PARA LA OBTENCION DE LOS TOTALES DEL DETALLE ASOCIADO A INPSAG

    //IDENTIFICACIONES DE OPERACIONES
    //crear =  OBTENCION DE DATOS INICIALES PARA PODER CREAR LA INPSAG
    if ($OP == "crear") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $DISABLED = "disabled";
        $DISABLED2 = "";
        $DISABLED3 = "disabled";
        $DISABLED4 = "";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        $ARRAYINPSAG = $INPSAG_ADO->verInpsag($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYINPSAG as $r) :
            $NUMEROVER = "" . $r['NUMERO_INPSAG'];
            $IDINPSAG = $IDOP;
            $FECHAINPSAG = "" . $r['FECHA_INPSAG'];
            $FECHAINGRESOINPSAG = "" . $r['FECHA_INGRESOR'];
            $FECHAMODIFCIACIONINPSAG = "" . $r['FECHA_MODIFICACIONR'];
            $OBSERVACIONINPSAG = "" . $r['OBSERVACION_INPSAG'];
            $CIF = "" . $r['CIF_INPSAG'];
            $TESTADOSAG = "" . $r['TESTADOSAG'];
            $ESTADO = "" . $r['ESTADO'];
            $INPECTOR = "" . $r['ID_INPECTOR'];
            $CONTRAPARTE = "" . $r['ID_CONTRAPARTE'];
            $TINPSAG = "" . $r['ID_TINPSAG'];
            $PAIS1 = "" . $r['ID_PAIS1'];
            $PAIS2 = "" . $r['ID_PAIS2'];
            $PAIS3 = "" . $r['ID_PAIS3'];
            $PAIS4 = "" . $r['ID_PAIS4'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
        endforeach;
    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $DISABLED = "disabled";
        $DISABLED2 = "";
        $DISABLED3 = "disabled";
        $DISABLED4 = "";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $ARRAYINPSAG = $INPSAG_ADO->verInpsag($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYINPSAG as $r) :
            $NUMEROVER = "" . $r['NUMERO_INPSAG'];
            $IDINPSAG = $IDOP;
            $FECHAINPSAG = "" . $r['FECHA_INPSAG'];
            $FECHAINGRESOINPSAG = "" . $r['FECHA_INGRESOR'];
            $FECHAMODIFCIACIONINPSAG = "" . $r['FECHA_MODIFICACIONR'];
            $OBSERVACIONINPSAG = "" . $r['OBSERVACION_INPSAG'];
            $CIF = "" . $r['CIF_INPSAG'];
            $TESTADOSAG = "" . $r['TESTADOSAG'];
            $ESTADO = "" . $r['ESTADO'];
            $INPECTOR = "" . $r['ID_INPECTOR'];
            $CONTRAPARTE = "" . $r['ID_CONTRAPARTE'];
            $TINPSAG = "" . $r['ID_TINPSAG'];
            $PAIS1 = "" . $r['ID_PAIS1'];
            $PAIS2 = "" . $r['ID_PAIS2'];
            $PAIS3 = "" . $r['ID_PAIS3'];
            $PAIS4 = "" . $r['ID_PAIS4'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLED3 = "disabled";
        $DISABLED4 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYINPSAG = $INPSAG_ADO->verInpsag($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYINPSAG as $r) :
            $NUMEROVER = "" . $r['NUMERO_INPSAG'];
            $IDINPSAG = $IDOP;
            $FECHAINPSAG = "" . $r['FECHA_INPSAG'];
            $FECHAINGRESOINPSAG = "" . $r['FECHA_INGRESOR'];
            $FECHAMODIFCIACIONINPSAG = "" . $r['FECHA_MODIFICACIONR'];
            $OBSERVACIONINPSAG = "" . $r['OBSERVACION_INPSAG'];
            $CIF = "" . $r['CIF_INPSAG'];
            $TESTADOSAG = "" . $r['TESTADOSAG'];
            $ESTADO = "" . $r['ESTADO'];
            $INPECTOR = "" . $r['ID_INPECTOR'];
            $CONTRAPARTE = "" . $r['ID_CONTRAPARTE'];
            $TINPSAG = "" . $r['ID_TINPSAG'];
            $PAIS1 = "" . $r['ID_PAIS1'];
            $PAIS2 = "" . $r['ID_PAIS2'];
            $PAIS3 = "" . $r['ID_PAIS3'];
            $PAIS4 = "" . $r['ID_PAIS4'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
        endforeach;
    }
}
//PROCESO PARA OBTENER LOS DATOS DEL FORMULARIO  Y MANTENERLO AL ACTUALIZACION QUE REALIZA EL SELECT DE CONDUCTOR
if (isset($_POST)) {

    if (isset($_REQUEST['FECHAINPSAG'])) {
        $FECHAINPSAG = "" . $_REQUEST['FECHAINPSAG'];
    }
    if (isset($_REQUEST['TINPSAG'])) {
        $TINPSAG = "" . $_REQUEST['TINPSAG'];
    }
    if (isset($_REQUEST['TESTADOSAG'])) {
        $TESTADOSAG = "" . $_REQUEST['TESTADOSAG'];
    }
    if (isset($_REQUEST['INPECTOR'])) {
        $INPECTOR = "" . $_REQUEST['INPECTOR'];
    }
    if (isset($_REQUEST['CIF'])) {
        $CIF = "" . $_REQUEST['CIF'];
    }
    if (isset($_REQUEST['CONTRAPARTE'])) {
        $CONTRAPARTE = "" . $_REQUEST['CONTRAPARTE'];
    }
    if (isset($_REQUEST['FECHAINGRESOINPSAG'])) {
        $FECHAINGRESOINPSAG = "" . $_REQUEST['FECHAINGRESOINPSAG'];
    }
    if (isset($_REQUEST['FECHAMODIFCIACIONINPSAG'])) {
        $FECHAMODIFCIACIONINPSAG = "" . $_REQUEST['FECHAMODIFCIACIONINPSAG'];
    }
    if (isset($_REQUEST['PAIS1'])) {
        $PAIS1 = "" . $_REQUEST['PAIS1'];
    }
    if (isset($_REQUEST['PAIS2'])) {
        $PAIS2 = "" . $_REQUEST['PAIS2'];
    }
    if (isset($_REQUEST['PAIS3'])) {
        $PAIS3 = "" . $_REQUEST['PAIS3'];
    }
    if (isset($_REQUEST['PAIS4'])) {
        $PAIS4 = "" . $_REQUEST['PAIS4'];
    }
    if (isset($_REQUEST['PLANTA'])) {
        $PLANTA = "" . $_REQUEST['PLANTA'];
    }
    if (isset($_REQUEST['TEMPORADA'])) {
        $TEMPORADA = "" . $_REQUEST['TEMPORADA'];
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Inspección SAG</title>
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

                    FECHAINPSAG = document.getElementById("FECHAINPSAG").value;
                    TINPSAG = document.getElementById("TINPSAG").selectedIndex;
                    TESTADOSAG = document.getElementById("TESTADOSAG").selectedIndex;
                    INPECTOR = document.getElementById("INPECTOR").selectedIndex;
                    CIF = document.getElementById("CIF").value;
                    CONTRAPARTE = document.getElementById("CONTRAPARTE").selectedIndex;
                    PAIS1 = document.getElementById("PAIS1").selectedIndex;
                    PAIS2 = document.getElementById("PAIS2").selectedIndex;
                    PAIS3 = document.getElementById("PAIS3").selectedIndex;
                    PAIS4 = document.getElementById("PAIS4").selectedIndex;
                    //OBSERVACIONINPSAG = document.getElementById("OBSERVACIONINPSAG").value;

                    document.getElementById('val_fechar').innerHTML = "";
                    document.getElementById('val_tinpsag').innerHTML = "";
                    document.getElementById('val_testado').innerHTML = "";
                    document.getElementById('val_inpector').innerHTML = "";
                    document.getElementById('val_cif').innerHTML = "";
                    document.getElementById('val_contraparte').innerHTML = "";
                    document.getElementById('val_pais1').innerHTML = "";
                    document.getElementById('val_pais2').innerHTML = "";
                    document.getElementById('val_pais3').innerHTML = "";
                    document.getElementById('val_pais4').innerHTML = "";

                    //  document.getElementById('val_observacion').innerHTML = "";

                    if (FECHAINPSAG == null || FECHAINPSAG.length == 0 || /^\s+$/.test(FECHAINPSAG)) {
                        document.form_reg_dato.FECHAINPSAG.focus();
                        document.form_reg_dato.FECHAINPSAG.style.borderColor = "#FF0000";
                        document.getElementById('val_fechar').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.FECHAINPSAG.style.borderColor = "#4AF575";

                    if (TINPSAG == null || TINPSAG == 0) {
                        document.form_reg_dato.TINPSAG.focus();
                        document.form_reg_dato.TINPSAG.style.borderColor = "#FF0000";
                        document.getElementById('val_tinpsag').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.TINPSAG.style.borderColor = "#4AF575";


                    if (TESTADOSAG == null || TESTADOSAG == 0) {
                        document.form_reg_dato.TESTADOSAG.focus();
                        document.form_reg_dato.TESTADOSAG.style.borderColor = "#FF0000";
                        document.getElementById('val_testado').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.TESTADOSAG.style.borderColor = "#4AF575";



                    if (INPECTOR == null || INPECTOR == 0) {
                        document.form_reg_dato.INPECTOR.focus();
                        document.form_reg_dato.INPECTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_inpector').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.INPECTOR.style.borderColor = "#4AF575";

                    /*
                                        if (CIF == null || CIF == 0) {
                                            document.form_reg_dato.CIF.focus();
                                            document.form_reg_dato.INPECTOR.style.borderColor = "#FF0000";
                                            document.getElementById('val_cif').innerHTML = "NO HA INGRESADO DATOS";
                                            return false
                                        }
                                        document.form_reg_dato.CIF.style.borderColor = "#4AF575";
                                        */

                    if (CONTRAPARTE == null || CONTRAPARTE == 0) {
                        document.form_reg_dato.CONTRAPARTE.focus();
                        document.form_reg_dato.CONTRAPARTE.style.borderColor = "#FF0000";
                        document.getElementById('val_contraparte').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.CONTRAPARTE.style.borderColor = "#4AF575";

                    if (PAIS1 == null || PAIS1 == 0) {
                        document.form_reg_dato.PAIS1.focus();
                        document.form_reg_dato.PAIS1.style.borderColor = "#FF0000";
                        document.getElementById('val_pais1').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.PAIS1.style.borderColor = "#4AF575";

                    if (PAIS2) {
                        if (PAIS2 == PAIS1) {
                            document.form_reg_dato.PAIS2.focus();
                            document.form_reg_dato.PAIS2.style.borderColor = "#FF0000";
                            document.getElementById('val_pais2').innerHTML = "LA SELECCION TIENE QUE SER DISTINTO A LOS OTROS";
                            return false
                        }
                        document.form_reg_dato.PAIS2.style.borderColor = "#4AF575";
                    }
                    if (PAIS3) {
                        if (PAIS3 == PAIS1 || PAIS3 == PAIS2 || PAIS3 == PAIS4) {
                            document.form_reg_dato.PAIS3.focus();
                            document.form_reg_dato.PAIS3.style.borderColor = "#FF0000";
                            document.getElementById('val_pais3').innerHTML = "LA SELECCION TIENE QUE SER DISTINTO A LOS OTROS";
                            return false
                        }
                        document.form_reg_dato.PAIS3.style.borderColor = "#4AF575";
                    }
                    if (PAIS4) {
                        if (PAIS4 == PAIS1 || PAIS4 == PAIS2 || PAIS4 == PAIS3) {
                            document.form_reg_dato.PAIS4.focus();
                            document.form_reg_dato.PAIS4.style.borderColor = "#FF0000";
                            document.getElementById('val_pais4').innerHTML = "LA SELECCION TIENE QUE SER DISTINTO A LOS OTROS";
                            return false
                        }
                        document.form_reg_dato.PAIS4.style.borderColor = "#4AF575";
                    }



                    /*
                    if (OBSERVACIONINPSAG == null || OBSERVACIONINPSAG.length == 0 || /^\s+$/.test(OBSERVACIONINPSAG)) {
                        document.form_reg_dato.OBSERVACIONINPSAG.focus();
                        document.form_reg_dato.OBSERVACIONINPSAG.style.borderColor = "#FF0000";
                        document.getElementById('val_observacion').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.OBSERVACIONINPSAG.style.borderColor = "#4AF575"; 
                    */
                }

                //FUNCION PARA REALIZAR UNA ACTUALIZACION DEL FORMULARIO DE REGISTRO DE INPSAG
                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }

                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE INPSAG
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
            <?php include_once "../config/menu.php";
            ?>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Inspección SAG </h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Operaciones SAG</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Operaciones Inspección SAG </a>
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
                            <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESAE" name="EMPRESAE" value="<?php echo $EMPRESA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTAE" name="PLANTAE" value="<?php echo $PLANTA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADAE" name="TEMPORADAE" value="<?php echo $TEMPORADA; ?>" />

                                                <input type="hidden" class="form-control" id="TOTALENVASE" name="TOTALENVASE" value="<?php echo $TOTALENVASE; ?>" />
                                                <input type="hidden" class="form-control" id="TOTALNETO" name="TOTALNETO" value="<?php echo $TOTALNETO; ?>" />
                                                <input type="hidden" class="form-control" id="TOTALBRUTO" name="TOTALBRUTO" value="<?php echo $TOTALBRUTO; ?>" />

                                                <input type="hidden" class="form-control" placeholder="ID DESPACHOEX" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP DESPACHOEX" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL DESPACHOEX" id="URLP" name="URLP" value="registroInpsag" />

                                                <label>Número Inspección</label>
                                                <input type="hidden" class="form-control" placeholder="Número Inspección" id="ID" name="ID" value="<?php echo $IDINPSAG; ?>" />
                                                <input type="text" class="form-control" style="background-color: #eeeeee;" placeholder="Id Inpsag" id="IDINPSAG" name="IDINPSAG" value="<?php echo $NUMEROVER; ?>" disabled />
                                                <label id="val_id" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-1 col-lg-1 col-md-6 col-sm-6 col-6 col-xs-6">
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Ingreso</label>
                                                <input type="hidden" class="form-control" placeholder="FECHA MODIFICACION" id="FECHAINGRESOINPSAGE" name="FECHAINGRESOINPSAGE" value="<?php echo $FECHAINGRESOINPSAG; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="Fecha Ingreso" id="FECHAINGRESOINPSAG" name="FECHAINGRESOINPSAG" value="<?php echo $FECHAINGRESOINPSAG; ?>" disabled />
                                                <label id="val_fechai" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Modificación</label>
                                                <input type="hidden" class="form-control" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACIONINPSAGE" name="FECHAMODIFCIACIONINPSAGE" value="<?php echo $FECHAMODIFCIACIONINPSAG; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="Fecha Modificación Inspección" id="FECHAMODIFCIACIONINPSAG" name="FECHAMODIFCIACIONINPSAG" value="<?php echo $FECHAMODIFCIACIONINPSAG; ?>" disabled />
                                                <label id="val_fecham" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Inspección</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Inpeccion Sag" id="FECHAINPSAGE" name="FECHAINPSAGE" value="<?php echo $FECHAINPSAG; ?>" />
                                                <input type="date" class="form-control" <?php echo $DISABLEDSTYLE; ?> placeholder="Fecha Inspección " id="FECHAINPSAG" name="FECHAINPSAG" value="<?php echo $FECHAINPSAG; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_fechar" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <label>Tipo Inspección </label>
                                                <input type="hidden" class="form-control" placeholder="TINPSAGE" id="TINPSAGE" name="TINPSAGE" value="<?php echo $TINPSAG; ?>" />
                                                <select class="form-control select2" id="TINPSAG" name="TINPSAG" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYTINPSAG as $r) : ?>
                                                        <?php if ($ARRAYTINPSAG) {    ?>
                                                            <option value="<?php echo $r['ID_TINPSAG']; ?>" <?php if ($TINPSAG == $r['ID_TINPSAG']) {
                                                                                                                echo "selected";
                                                                                                            } ?>> <?php echo $r['NOMBRE_TINPSAG'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_tinpsag" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <label>Condición SAG</label>
                                                <input type="hidden" class="form-control" placeholder="TESTADOE" id="TESTADOSAGE" name="TESTADOSAGE" value="<?php echo $TESTADOSAG; ?>" />
                                                <select class="form-control select2" id="TESTADOSAG" name="TESTADOSAG" style="width: 100%;" <?php echo $DISABLED4; ?>>
                                                    <option></option>
                                                    <option value="1" <?php if ($TESTADOSAG == "1") {
                                                                            echo "selected";
                                                                        } ?>>En Inspección </option>
                                                    <option value="2" <?php if ($TESTADOSAG == "2") {
                                                                            echo "selected";
                                                                        } ?>>Aprobado Origen </option>
                                                    <option value="3" <?php if ($TESTADOSAG == "3") {
                                                                            echo "selected";
                                                                        } ?>>Aprobado USLA </option>
                                                    <option value="4" <?php if ($TESTADOSAG == "4") {
                                                                            echo "selected";
                                                                        } ?>>Fumigado </option>
                                                    <option value="5" <?php if ($TESTADOSAG == "5") {
                                                                            echo "selected";
                                                                        } ?>>Rechazado </option>

                                                </select>
                                                <label id="val_testado" class="validacion"> <?php echo $MENSAJE2; ?> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <label>Inpector</label>
                                                <input type="hidden" class="form-control" placeholder="INPECTORE" id="INPECTORE" name="INPECTORE" value="<?php echo $INPECTOR; ?>" />
                                                <select class="form-control select2" id="INPECTOR" name="INPECTOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYINPECTOR as $r) : ?>
                                                        <?php if ($ARRAYINPECTOR) {    ?>
                                                            <option value="<?php echo $r['ID_INPECTOR']; ?>" <?php if ($INPECTOR == $r['ID_INPECTOR']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_INPECTOR'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_inpector" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-1 col-xl-1 col-lg-2 col-md-2 col-sm-3 col-3 col-xs-3">
                                            <div class="form-group">
                                                <br>
                                                <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Inpector" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopInpector.php' ); ">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Valor CIF </label>
                                                <input type="hidden" class="form-control" placeholder="CIFE" id="CIFE" name="CIFE" value="<?php echo $CIF; ?>" />
                                                <input type="number" class="form-control" placeholder="CIF" id="CIF" name="CIF" value="<?php echo $CIF; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_cif" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <label>Contraparte</label>
                                                <input type="hidden" class="form-control" placeholder="CONTRAPARTEE" id="CONTRAPARTEE" name="CONTRAPARTEE" value="<?php echo $CONTRAPARTE; ?>" />
                                                <select class="form-control select2" id="CONTRAPARTE" name="CONTRAPARTE" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYCONTRAPARTE as $r) : ?>
                                                        <?php if ($ARRAYCONTRAPARTE) {    ?>
                                                            <option value="<?php echo $r['ID_CONTRAPARTE']; ?>" <?php if ($CONTRAPARTE == $r['ID_CONTRAPARTE']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_CONTRAPARTE'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_contraparte" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-1 col-xl-1 col-lg-2 col-md-2 col-sm-3 col-3 col-xs-3">
                                            <div class="form-group">
                                                <br>
                                                <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Contraparte" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopContraparte.php' ); ">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <label>Pais 1</label>
                                                <input type="hidden" class="form-control" placeholder="PAIS1E" id="PAIS1E" name="PAIS1E" value="<?php echo $PAIS1; ?>" />
                                                <select class="form-control select2" id="PAIS1" name="PAIS1" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYPAIS as $r) : ?>
                                                        <?php if ($ARRAYPAIS) {    ?>
                                                            <option value="<?php echo $r['ID_PAIS']; ?>" <?php if ($PAIS1 == $r['ID_PAIS']) {
                                                                                                                echo "selected";
                                                                                                            } ?>> <?php echo $r['NOMBRE_PAIS'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_pais1" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <label>Pais 2</label>
                                                <input type="hidden" class="form-control" placeholder="PAIS2E" id="PAIS2E" name="PAIS2E" value="<?php echo $PAIS2; ?>" />
                                                <select class="form-control select2" id="PAIS2" name="PAIS2" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYPAIS as $r) : ?>
                                                        <?php if ($ARRAYPAIS) {    ?>
                                                            <option value="<?php echo $r['ID_PAIS']; ?>" <?php if ($PAIS2 == $r['ID_PAIS']) {
                                                                                                                echo "selected";
                                                                                                            } ?>> <?php echo $r['NOMBRE_PAIS'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_pais2" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <label>Pais 3</label>
                                                <input type="hidden" class="form-control" placeholder="PAIS3E" id="PAIS3E" name="PAIS3E" value="<?php echo $PAIS3; ?>" />
                                                <select class="form-control select2" id="PAIS3" name="PAIS3" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYPAIS as $r) : ?>
                                                        <?php if ($ARRAYPAIS) {    ?>
                                                            <option value="<?php echo $r['ID_PAIS']; ?>" <?php if ($PAIS3 == $r['ID_PAIS']) {
                                                                                                                echo "selected";
                                                                                                            } ?>> <?php echo $r['NOMBRE_PAIS'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_pais3" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <label>Pais 4</label>
                                                <input type="hidden" class="form-control" placeholder="PAIS4E" id="PAIS4E" name="PAIS4E" value="<?php echo $PAIS4; ?>" />
                                                <select class="form-control select2" id="PAIS4" name="PAIS4" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYPAIS as $r) : ?>
                                                        <?php if ($ARRAYPAIS) {    ?>
                                                            <option value="<?php echo $r['ID_PAIS']; ?>" <?php if ($PAIS4 == $r['ID_PAIS']) {
                                                                                                                echo "selected";
                                                                                                            } ?>> <?php echo $r['NOMBRE_PAIS'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_pais4" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Observaciónes </label>
                                                <input type="hidden" class="form-control" placeholder="TRANSPORTE" id="OBSERVACIONINPSAGE" name="OBSERVACIONINPSAGE" value="<?php echo $OBSERVACIONINPSAG; ?>" />
                                                <textarea class="form-control" rows="1" <?php echo $DISABLEDSTYLE; ?> placeholder="Ingrese Nota, Observaciónes u Otro" id="OBSERVACIONINPSAG" name="OBSERVACIONINPSAG" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>><?php echo $OBSERVACIONINPSAG; ?></textarea>
                                                <label id="val_observacion" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="toolbar">
                                        <div class="btn-group col-sm-6">
                                            <?php if ($OP == "") { ?>
                                                <button type=" button" class="btn btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroInpsag.php');">
                                                    <i class="ti-trash"></i> Cancelar
                                                </button>
                                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Crear
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <button type="button" class="btn  btn-success " data-toggle="tooltip" title="Volver" name="VOLVER" value="VOLVER" Onclick="irPagina('listarInpsag.php'); ">
                                                    <i class="ti-back-left "></i> Volver
                                                </button>
                                                <button type="submit" class="btn btn-warning " data-toggle="tooltip" title="Editar" name="EDITAR" value="EDITAR" <?php echo $DISABLED2; ?> onclick="return validacion()">
                                                    <i class="ti-pencil-alt"></i> Guardar
                                                </button>
                                                <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Cerrar" name="CERRAR" value="CERRAR" <?php echo $DISABLED2; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Cerrar
                                                </button>
                                            <?php } ?>
                                        </div>
                                        <div class="btn-group col-sm-4">
                                            <?php if ($OP!= ""): ?>
                                                 <button type="button" class="btn  btn-info  " data-toggle="tooltip" title="Informe" id="defecto" name="tarjas" Onclick="abrirPestana('../documento/informeInpsag.php?parametro=<?php echo $IDOP; ?>&&usuario=<?php echo $IDUSUARIOS; ?>');">
                                                    <i class="fa fa-file-pdf-o"></i> Informe
                                                </button>
                                                <button type="button" class="btn  btn-primary  " data-toggle="tooltip" title="Packing list" id="defecto" name="tarjas" Onclick="abrirPestana('../documento/informeInpsagPackingList.php?parametro=<?php echo $IDOP; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                    <i class="fa fa-file-pdf-o"></i> Packing List
                                                </button>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="box">
                            <div class="card-header bg-success">
                                Seleccion de Registro Inspeccion SAG
                            </div>
                            <div class="card-header">
                                <div class="form-row align-items-center">
                                    <form method="post" id="form3" name="form3">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" placeholder="ID INPSAG" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="OP INPSAG" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="URL INPSAG" id="URLP" name="URLP" value="registroInpsag" />
                                            <input type="hidden" class="form-control" placeholder="URL SELECCION" id="URLD" name="URLD" value="registroSelecionExistenciaPTInpSag" />
                                            <button type="submit" class="btn btn-success btn-block mb-2" data-toggle="tooltip" title="Seleccion Existencia" id="SELECIONOCDURL" name="SELECIONOCDURL" <?php echo $DISABLED2; ?> <?php if ($ESTADO == 0) { echo "disabled style='background-color: #eeeeee;'"; } ?>>
                                                Seleccionar
                                            </button>
                                        </div>
                                    </form>
                                    <div class="col-auto">
                                        <label class="sr-only" for=""></label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Total Envase</div>
                                            </div>
                                            <input type="hidden" class="form-control" id="TOTALENVASE" name="TOTALENVASE" value="<?php echo $TOTALENVASE; ?>" />
                                            <input type="text" class="form-control" placeholder="Total Envase" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALENVASE2; ?>" disabled />
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <label class="sr-only" for=""></label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Total Neto</div>
                                            </div>
                                            <input type="hidden" class="form-control" id="TOTALNETO" name="TOTALNETO" value="<?php echo $TOTALNETO; ?>" />
                                            <input type="text" class="form-control" placeholder="Total Neto" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALNETO2; ?>" disabled />
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <label class="sr-only" for=""></label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Total Bruto</div>
                                            </div>
                                            <input type="hidden" class="form-control" id="TOTALBRUTO" name="TOTALBRUTO" value="<?php echo $TOTALBRUTO; ?>" />
                                            <input type="text" class="form-control" placeholder="Total Neto" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALBRUTO2; ?>" disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label id="val_dproceso" class="validacion center"><?php echo $MENSAJE; ?> </label>
                            <div class="row">
                                <div class="col-12">
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
                                                        <th>Código Estandar</th>
                                                        <th>Envase/Estandar</th>
                                                        <th>Variedad</th>
                                                        <th>Cantidad Envase</th>
                                                        <th>Kilos Neto</th>
                                                        <th>% Deshidratacion</th>
                                                        <th>Kilos Deshidratacion</th>
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
                                                            <tr class="center">
                                                                <td>
                                                                    <a href="#" class="text-warning hover-warning">
                                                                        <?php
                                                                        echo $r['FOLIO_AUXILIAR_EXIEXPORTACION'];
                                                                        ?>
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <form method="post" id="form1">
                                                                        <input type="hidden" class="form-control" placeholder="ID QUITAR" id="IDQUITAR" name="IDQUITAR" value="<?php echo $r['ID_EXIEXPORTACION']; ?>" />
                                                                        <div class="btn-group btn-rounded btn-block" role="group" aria-label="Operaciones Detalle">
                                                                            <button type="submit" class="btn btn-sm btn-danger  " id="QUITAR" name="QUITAR" data-toggle="tooltip" title="Quitar Existencia PT" <?php echo $DISABLED2; ?>  <?php if ($ESTADO == 0) { echo "disabled";} ?>>
                                                                                <i class="ti-close"></i>
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
                $ARRAYNUMERO = $INPSAG_ADO->obtenerNumero($_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO
                $INPSAG->__SET('NUMERO_INPSAG', $NUMERO);
                $INPSAG->__SET('FECHA_INPSAG', $_REQUEST['FECHAINPSAG']);
                $INPSAG->__SET('OBSERVACION_INPSAG', $_REQUEST['OBSERVACIONINPSAG']);
                $INPSAG->__SET('CIF_INPSAG', $_REQUEST['CIF']);
                $INPSAG->__SET('TESTADOSAG', $_REQUEST['TESTADOSAG']);
                $INPSAG->__SET('ID_TINPSAG', $_REQUEST['TINPSAG']);
                $INPSAG->__SET('ID_INPECTOR', $_REQUEST['INPECTOR']);
                $INPSAG->__SET('ID_CONTRAPARTE', $_REQUEST['CONTRAPARTE']);
                $INPSAG->__SET('ID_PAIS1', $_REQUEST['PAIS1']);
                $INPSAG->__SET('ID_PAIS2', $_REQUEST['PAIS2']);
                $INPSAG->__SET('ID_PAIS3', $_REQUEST['PAIS3']);
                $INPSAG->__SET('ID_PAIS4', $_REQUEST['PAIS4']);
                $INPSAG->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                $INPSAG->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                $INPSAG->__SET('ID_USUARIOI', $IDUSUARIOS);
                $INPSAG->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $INPSAG_ADO->agregarInpsag($INPSAG);


                // //OBTENER EL ID DE LA INPSAG CREADA PARA LUEGO ENVIAR EL INGRESO DEL DETALLE
                $ARRYAOBTENERID = $INPSAG_ADO->obtenerId(
                    $_REQUEST['FECHAINPSAG'],
                    $_REQUEST['OBSERVACIONINPSAG'],
                    $_REQUEST['EMPRESA'],
                    $_REQUEST['PLANTA'],
                    $_REQUEST['TEMPORADA'],
                );

                // //REDIRECCIONAR A PAGINA registroInpsag.php
                $_SESSION["parametro"] = $ARRYAOBTENERID[0]['ID_INPSAG'];
                $_SESSION["parametro1"] = "crear";
                // echo "<script type='text/javascript'> location.href ='registroInpsag.php?op';</script>";
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Encabezado creado",
                        text:"El encabezado fue creado exitosamente"
                    }).then((result)=>{
                        if(result.value){
                            location.href = "/fruta/vista/registroInpsag.php?op";
                        }
                    })</script>';
            }
            //OPERACION EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO
                $INPSAG->__SET('FECHA_INPSAG', $_REQUEST['FECHAINPSAGE']);
                $INPSAG->__SET('CANTIDAD_ENVASE_INPSAG', $_REQUEST['TOTALENVASE']);
                $INPSAG->__SET('KILOS_NETO_INPSAG', $_REQUEST['TOTALNETO']);
                $INPSAG->__SET('KILOS_BRUTO_INPSAG', $_REQUEST['TOTALBRUTO']);
                $INPSAG->__SET('OBSERVACION_INPSAG', $_REQUEST['OBSERVACIONINPSAGE']);
                $INPSAG->__SET('CIF_INPSAG', $_REQUEST['CIFE']);
                $INPSAG->__SET('TESTADOSAG', $_REQUEST['TESTADOSAG']);
                $INPSAG->__SET('ID_TINPSAG', $_REQUEST['TINPSAGE']);
                $INPSAG->__SET('ID_INPECTOR', $_REQUEST['INPECTORE']);
                $INPSAG->__SET('ID_CONTRAPARTE', $_REQUEST['CONTRAPARTEE']);
                $INPSAG->__SET('ID_PAIS1', $_REQUEST['PAIS1E']);
                $INPSAG->__SET('ID_PAIS2', $_REQUEST['PAIS2E']);
                $INPSAG->__SET('ID_PAIS3', $_REQUEST['PAIS3E']);
                $INPSAG->__SET('ID_PAIS4', $_REQUEST['PAIS4E']);
                $INPSAG->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                $INPSAG->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                $INPSAG->__SET('ID_USUARIOM', $IDUSUARIOS);
                $INPSAG->__SET('ID_INPSAG', $_REQUEST['IDP']);
                //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                $INPSAG_ADO->actualizarInpsag($INPSAG);
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro actualizado",
                        text:"El encabezado fue actualizado exitosamente"
                    }).then((result)=>{
                        if(result.value){
                            location.href = "/fruta/vista/registroInpsag.php?op";
                        }
                    })</script>';
            }
            //OPERACION PARA CERRAR LA INPSAG
            if (isset($_REQUEST['CERRAR'])) {
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO
                $ARRAYDINPSAG2 = $EXIEXPORTACION_ADO->verExistenciaPorInpSag($_REQUEST['ID']);
                if (empty($ARRAYDINPSAG2)) {
                    $MENSAJE = "TIENE  QUE HABER AL MENOS UNA EXISTENCIA DE PRODUCTO TERMINADO SELECIONADO";
                    $SINO = "1";
                    echo '<script>
                        Swal.fire({
                            icon:"info",
                            title:"Informacion importante",
                            text:"TIENE  QUE HABER AL MENOS UNA EXISTENCIA DE PRODUCTO TERMINADO SELECIONADO",
                            showConfirmButton:true,
                            confirmButtonText:"OK"
                        })
                    </script>';
                } else {
                    $MENSAJE = "";
                    $SINO = "0";
                }
                if ($SINO == "0") {
                    if ($_REQUEST['TESTADOSAG'] == "1") {
                        $MENSAJE2 = "LA CONDICION DEBE SER DISTINTO A 'EN INPECCION'";
                        $SINO = "1";
                        echo '<script>
                            Swal.fire({
                                icon:"info",
                                title:"Informacion importante",
                                html:"LA CONDICION DEBE SER DISTINTO A <strong>EN INPECCION</strong>",
                                showConfirmButton:true,
                                confirmButtonText:"OK"
                            })
                        </script>';
                    } else {
                        $MENSAJE2 = "";
                        $SINO = "0";
                    }
                    if ($SINO == "0") {
                        $INPSAG->__SET('FECHA_INPSAG', $_REQUEST['FECHAINPSAGE']);
                        $INPSAG->__SET('CANTIDAD_ENVASE_INPSAG', $_REQUEST['TOTALENVASE']);
                        $INPSAG->__SET('KILOS_NETO_INPSAG', $_REQUEST['TOTALNETO']);
                        $INPSAG->__SET('KILOS_BRUTO_INPSAG', $_REQUEST['TOTALBRUTO']);
                        $INPSAG->__SET('OBSERVACION_INPSAG', $_REQUEST['OBSERVACIONINPSAGE']);
                        $INPSAG->__SET('CIF_INPSAG', $_REQUEST['CIFE']);
                        $INPSAG->__SET('TESTADOSAG', $_REQUEST['TESTADOSAG']);
                        $INPSAG->__SET('ID_TINPSAG', $_REQUEST['TINPSAGE']);
                        $INPSAG->__SET('ID_INPECTOR', $_REQUEST['INPECTORE']);
                        $INPSAG->__SET('ID_CONTRAPARTE', $_REQUEST['CONTRAPARTEE']);
                        $INPSAG->__SET('ID_PAIS1', $_REQUEST['PAIS1E']);
                        $INPSAG->__SET('ID_PAIS2', $_REQUEST['PAIS2E']);
                        $INPSAG->__SET('ID_PAIS3', $_REQUEST['PAIS3E']);
                        $INPSAG->__SET('ID_PAIS4', $_REQUEST['PAIS4E']);
                        $INPSAG->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                        $INPSAG->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                        $INPSAG->__SET('ID_USUARIOM', $IDUSUARIOS);
                        $INPSAG->__SET('ID_INPSAG', $_REQUEST['IDP']);
                        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                        $INPSAG_ADO->actualizarInpsag($INPSAG);


                        $INPSAG->__SET('ID_INPSAG', $_REQUEST['IDP']);
                        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                        $INPSAG_ADO->cerrado($INPSAG);

                        $ARRAYEXISENCIAINPSAG = $EXIEXPORTACION_ADO->verExistenciaPorInpSag($_REQUEST['IDP']);
                        foreach ($ARRAYEXISENCIAINPSAG as $r) :
                            $EXIEXPORTACION->__SET('TESTADOSAG', $_REQUEST['TESTADOSAG']);
                            $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $r['ID_EXIEXPORTACION']);
                            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                            $EXIEXPORTACION_ADO->actualizarEstadoSag($EXIEXPORTACION);
                        endforeach;


                        //REDIRECCIONAR A PAGINA registroInpsag.php
                        //SEGUNE EL TIPO DE OPERACIONS QUE SE INDENTIFIQUE EN LA URL
                        if ($_SESSION['parametro1'] == "crear") {
                            $_SESSION["parametro"] = $_REQUEST['IDP'];
                            $_SESSION["parametro1"] = "ver";
                            // echo "<script type='text/javascript'> location.href ='registroInpsag.php?op';</script>";
                            echo '<script>
                                Swal.fire({
                                    icon:"info",
                                    title:"Registro Inspeccion cerrado",
                                    text:"Este registro se encuentra cerrado "
                                }).then((result)=>{
                                    if(result.value){
                                        location.href="/fruta/vista/registroInpsag.php?op";
                                    }
                                    })
                            </script>';
                        }
                        if ($_SESSION['parametro1'] == "editar") {
                            $_SESSION["parametro"] = $_REQUEST['IDP'];
                            $_SESSION["parametro1"] = "ver";
                            // echo "<script type='text/javascript'> location.href ='registroInpsag.php?op';</script>";
                            echo '<script>
                                Swal.fire({
                                    icon:"info",
                                    title:"Registro Inspeccion cerrado",
                                    text:"Este registro se encuentra cerrado "
                                }).then((result)=>{
                                    if(result.value){
                                        location.href="/fruta/vista/registroInpsag.php?op";
                                    }
                                    })
                            </script>';
                        }
                    }
                }
            }

            if (isset($_REQUEST['QUITAR'])) {
                $IDQUITAR = $_REQUEST['IDQUITAR'];
                $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $IDQUITAR);
                // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $EXIEXPORTACION_ADO->actualizarDeselecionarSagCambiarEstado($EXIEXPORTACION);
                echo '<script>
                    Swal.fire({
                        icon:"info",
                        title:"Elemento quitado",
                        text:"El elemento ha sido quitado de la lista "
                    }).then((result)=>{
                        if(result.value){
                            location.href="/fruta/vista/registroInpsag.php?op";
                        }
                        })
                </script>';
            }
        ?>
</body>

</html>