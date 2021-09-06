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
include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/ERECEPCION_ADO.php';


include_once '../controlador/PROCESO_ADO.php';

include_once '../controlador/EXIMATERIAPRIMA_ADO.php';
include_once '../controlador/REPALETIZAJEMP_ADO.php';
include_once '../controlador/REPALETIZAJEHFO_ADO.php';
include_once '../controlador/DREPALETIZAJEMP_ADO.php';
include_once '../modelo/DREPALETIZAJEMP.php';
include_once '../modelo/REPALETIZAJEMP.php';
include_once '../modelo/EXIMATERIAPRIMA.php';


//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$FOLIO_ADO =  new FOLIO_ADO();



$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$PVESPECIES_ADO =  new PVESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$ERECEPCION_ADO =  new ERECEPCION_ADO();

$DREPALETIZAJEMP_ADO =  new DREPALETIZAJEMP_ADO();
$REPALETIZAJEMP_ADO =  new REPALETIZAJEMP_ADO();
$REPALETIZAJEHFO_ADO =  new REPALETIZAJEHFO_ADO();
$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();

//INIICIALIZAR MODELO
$EXIMATERIAPRIMA =  new EXIMATERIAPRIMA();
$REPALETIZAJEMP =  new REPALETIZAJEMP();
$DREPALETIZAJEMP =  new DREPALETIZAJEMP();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD


$NUMERO = "";
$NUMEROVER = "";
$IDEXIMATERIAPRIMAQUITAR = "";
$FOLIOEXIMATERIAPRIMAQUITAR = "";
$FECHAINGRESOPALETIZAJE = "";
$FECHAMODIFCIACIONPALETIZAJE = "";

$MATERIAPRIMA = "";
$TOTALCAJAS = 0;
$TOTALNETO = 0;

$IDREPALETIZAJE = "";
$MOTIVOREPALETIZAJE = "";

$TOTALENVASEORIGNAL = "";
$TOTALENVASEREPALETIZAJE = "";
$DIFERENCIACAJAS = "";

$DISABLED = "";
$DISABLED2 = "";
$DISABLED3 = "";
$DISABLEDSTYLE = "";




$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$FOCUS = "";
$DISABLED0 = "disabled";
$DISABLED = "";
$DISABLED2 = "disabled";
$DISABLED3 = "";
$DISABLED4 = "";
$DISABLED5 = "";
$DISABLEDSTYLE0 = "style='background-color: #eeeeee;'";
$DISABLEDSTYLE = "";
$DISABLEDSTYLE2 = "";
$DISABLEDSTYLE3 = "";
$DISABLEDFOLIO = "";
$MENSAJEFOLIO = "";


$BORDER = "";
$MENSAJE = "";
$MENSAJE2 = "";
$MENSAJE3 = "";
$MENSAJEVALIDATO = "";

$IDOP = "";
$OP = "";

$SINO = "";

//INICIALIZAR ARREGLOS
$ARRAYEXIMATERIAPRIMATOMADO = "";
$ARRAYEXIMATERIAPRIMATOMADOREPALETIZADO = "";
$ARRAYEXIMATERIAPRIMAINGRESANDOREPALETIZADO = "";

$ARRAYEXISTENCIAVER = "";
$ARRAYNUMERO = "";

$ARRAYREPALETIZAJE = "";
$ARRAYREPALETIZAJEVER = "";
$ARRAYREPALETIZAJEVER2 = "";
$ARRAYDREPALETIZAJE = "";
$ARRAYDREPALETIZAJETOTALES = "";
$ARRAYREPALETIZAJEBUSCARID = "";

$ARRAYREPALETIZAJEHFOPOREXISTENCIA = "";

$ARRAYVERPRODUCTORID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYEVERERECEPCIONID;

$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";
$ARRAYFOLIO3 = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS 
$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
$ARRAYPLANTA = $PLANTA_ADO->listarPlantaCBX();
$ARRAYTEMPORADA = $TEMPORADA_ADO->listarTemporada3CBX();

$ARRAYFOLIO3 = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTmateriaprima($EMPRESAS, $PLANTAS, $TEMPORADAS);

if (empty($ARRAYFOLIO3)) {
    $DISABLEDFOLIO = "disabled";
    $MENSAJEFOLIO = " NECESITA <b> CREAR LOS FOLIOS MP </b> , PARA OCUPAR LA <b> FUNCIONALIDAD </b>. FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
}


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


        $ARRAYNUMERO = $REPALETIZAJEMP_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
        $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;


        $REPALETIZAJEMP->__SET('NUMERO_REPALETIZAJE', $NUMERO);
        $REPALETIZAJEMP->__SET('CANTIDAD_ENVASE_REPALETIZAJE', 0);
        $REPALETIZAJEMP->__SET('KILOS_NETO_REPALETIZAJE', 0);
        $REPALETIZAJEMP->__SET('MOTIVO_REPALETIZAJE', $_REQUEST['MOTIVOREPALETIZAJE']);
        $REPALETIZAJEMP->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $REPALETIZAJEMP->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $REPALETIZAJEMP->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $REPALETIZAJEMP_ADO->agregarRepaletizaje($REPALETIZAJEMP);

        $ARRAYREPALETIZAJEBUSCARID = $REPALETIZAJEMP_ADO->buscarID(
            0,
            0,
            $_REQUEST['MOTIVOREPALETIZAJE'],
            $_REQUEST['EMPRESA'],
            $_REQUEST['PLANTA'],
            $_REQUEST['TEMPORADA']
        );
        //REDIRECCIONAR A PAGINA registroRecepcion.php 
        echo "<script type='text/javascript'> location.href ='registroRepaletizajeMpRecepcion.php?parametro=" . $ARRAYREPALETIZAJEBUSCARID[0]['ID_REPALETIZAJE'] . "&&parametro1=crear';</script>";
    }
}


//OPERACION EDICION DE FILA
if (isset($_REQUEST['GUARDAR'])) {
    $ARRAYEXIMATERIAPRIMATOMADO = $EXIMATERIAPRIMA_ADO->buscarPorRepaletizajeEnRepaletizaje($_REQUEST['ID']);
    $ARRAYEXIMATERIAPRIMATOMADOREPALETIZADO = $EXIMATERIAPRIMA_ADO->buscarPorRepaletizajeRepaletizaje($_REQUEST['ID']);
    $ARRAYDREPALETIZAJE = $DREPALETIZAJEMP_ADO->buscarDrepaletizaje($_REQUEST['ID']);
    $ARRAYEXIMATERIAPRIMAINGRESANDOREPALETIZADO = $EXIMATERIAPRIMA_ADO->buscarPorRepaletizajeIngresando($_REQUEST['ID']);



    if ($ARRAYEXIMATERIAPRIMATOMADO || $ARRAYEXIMATERIAPRIMATOMADOREPALETIZADO) {
        $SINO = "0";
        $MENSAJE = "";

        if ($ARRAYDREPALETIZAJE) {
            $SINO = "0";
            $MENSAJE2 = "";
            if ($_REQUEST['DIFERENCIACAJAS'] == 0) {
                $SINO = "0";
                $MENSAJE3 = "";
            } else {
                $SINO = "1";
                $MENSAJE3 = "LA DIFERENCIA DE CAJAS TIENE QUE SER CERO";
            }
        } else {
            $SINO = "1";
            $MENSAJE2 = "TIENE QUE CREAR UN REGISTRO DEL DETALLE DE REPALETIZAJE";
        }
    } else {
        $SINO = "1";
        $MENSAJE = "TIENE QUE SELECIONAR UNA EXISTENCIA";
    }

    if ($SINO == "0") {
        $ARRAYREPALETIZAJEVER = $REPALETIZAJEMP_ADO->verRepaletizaje($_REQUEST['ID']);


        $REPALETIZAJEMP->__SET('ID_REPALETIZAJE', $_REQUEST['ID']);
        // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $REPALETIZAJEMP_ADO->cerrado($REPALETIZAJEMP);


        foreach ($ARRAYEXIMATERIAPRIMATOMADO as $s) :

            $EXIMATERIAPRIMA->__SET('ID_EXIMATERIAPRIMA', $s['ID_EXIMATERIAPRIMA']);
            // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
            $EXIMATERIAPRIMA_ADO->repaletizado($EXIMATERIAPRIMA);
        endforeach;

        foreach ($ARRAYEXIMATERIAPRIMAINGRESANDOREPALETIZADO as $s) :

            $EXIMATERIAPRIMA->__SET('ID_EXIMATERIAPRIMA', $s['ID_EXIMATERIAPRIMA']);
            // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
            $EXIMATERIAPRIMA_ADO->vigente($EXIMATERIAPRIMA);
        endforeach;

        foreach ($ARRAYDREPALETIZAJE as $r) :

            $DREPALETIZAJEMP->__SET('ID_DREPALETIZAJE', $r['ID_DREPALETIZAJE']);
            // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
            $DREPALETIZAJEMP_ADO->cerrado($DREPALETIZAJEMP);
        endforeach;

        //REDIRECCIONAR A PAGINA registroRecepcion.php 
        //SEGUNE EL TIPO DE OPERACIONS QUE SE INDENTIFIQUE EN LA URL
        if ($_REQUEST['parametro1'] == "crear") {
            echo "<script type='text/javascript'> location.href ='registroRepaletizajeMpRecepcion.php?parametro=" . $_REQUEST['ID'] . "&&parametro1=ver';</script>";
        }
        if ($_REQUEST['parametro1'] == "editar") {
            echo "<script type='text/javascript'> location.href ='registroRepaletizajeMpRecepcion.php?parametro=" . $_REQUEST['ID'] . "&&parametro1=ver';</script>";
        }
    }
}
if (isset($_REQUEST['ELIMINAR'])) {
    $FOLIOELIMINAR = $_REQUEST['FOLIOELIMINAR'];
    $DREPALETIZAJEMP->__SET('FOLIO_NUEVO_DREPALETIZAJE', $FOLIOELIMINAR);
    $DREPALETIZAJEMP_ADO->deshabilitar2($DREPALETIZAJEMP);


    $EXIMATERIAPRIMA->__SET('FOLIO_AUXILIAR_EXIMATERIAPRIMA', $FOLIOELIMINAR);
    $EXIMATERIAPRIMA_ADO->deshabilitar2($EXIMATERIAPRIMA);

    $EXIMATERIAPRIMA->__SET('FOLIO_AUXILIAR_EXIMATERIAPRIMA', $FOLIOELIMINAR);
    $EXIMATERIAPRIMA_ADO->eliminado($EXIMATERIAPRIMA);
}


if (isset($_REQUEST['QUITAR'])) {

    $IDEXIMATERIAPRIMAQUITAR = $_REQUEST['IDEXIMATERIAPRIMAQUITAR'];
    $FOLIOEXIMATERIAPRIMAQUITAR = $_REQUEST['FOLIOEXIMATERIAPRIMAQUITAR'];

    $ARRAYREPALETIZAJEVER2 = $REPALETIZAJEMP_ADO->verRepaletizaje($_REQUEST['IDREPALETIZAJEAUX']);
    $TOTALCAJAS = $ARRAYREPALETIZAJEVER2[0]['CANTIDAD_ENVASE_REPALETIZAJE'];
    $TOTALNETO = $ARRAYREPALETIZAJEVER2[0]['KILOS_NETO_REPALETIZAJE'];


    $ARRAYEXISTENCIAVER = $EXIMATERIAPRIMA_ADO->buscarPorNumeroFolio($FOLIOEXIMATERIAPRIMAQUITAR);
    $TOTALCAJAS = $TOTALCAJAS - $ARRAYEXISTENCIAVER[0]['CANTIDAD_ENVASE_EXIMATERIAPRIMA'];
    $TOTALNETO = $TOTALNETO - $ARRAYEXISTENCIAVER[0]['KILOS_NETO_EXIMATERIAPRIMA'];

    $EXIMATERIAPRIMA->__SET('ID_EXIMATERIAPRIMA', $IDEXIMATERIAPRIMAQUITAR);
    $EXIMATERIAPRIMA->__SET('FOLIO_AUXILIAR_EXIMATERIAPRIMA', $FOLIOEXIMATERIAPRIMAQUITAR);
    // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $EXIMATERIAPRIMA_ADO->actualizarDeselecionarRepaletizajeCambiarEstado($EXIMATERIAPRIMA);

    $REPALETIZAJEMP->__SET('CANTIDAD_ENVASE_REPALETIZAJE', $TOTALCAJAS);
    $REPALETIZAJEMP->__SET('KILOS_NETO_REPALETIZAJE', $TOTALNETO);
    $REPALETIZAJEMP->__SET('ID_REPALETIZAJE', $_REQUEST['IDREPALETIZAJEAUX']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $REPALETIZAJEMP_ADO->actualizarRepaletizajeQuitarExistenciaMateriaPrima($REPALETIZAJEMP);
}



//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($_REQUEST['parametro']) && isset($_REQUEST['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_REQUEST['parametro'];
    $OP = $_REQUEST['parametro1'];
    $ARRAYEXIMATERIAPRIMATOMADO = $EXIMATERIAPRIMA_ADO->buscarPorRepaletizajeEnRepaletizaje($IDOP);
    $ARRAYEXIMATERIAPRIMATOMADOREPALETIZADO = $EXIMATERIAPRIMA_ADO->buscarPorRepaletizajeRepaletizaje($IDOP);

    $ARRAYDREPALETIZAJE = $DREPALETIZAJEMP_ADO->buscarDrepaletizaje($IDOP);
    $ARRAYDREPALETIZAJETOTALES = $DREPALETIZAJEMP_ADO->totalesDrepaletizaje($IDOP);
    $TOTALENVASEREPALETIZAJE = $ARRAYDREPALETIZAJETOTALES[0]['TOTAL_ENVASE'];


    if ($ARRAYDREPALETIZAJETOTALES) {
        //$DISABLED4 = "disabled";
        //$DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
    }
    if (empty($ARRAYEXIMATERIAPRIMATOMADO)) {
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
        $ARRAYREPALETIZAJE = $REPALETIZAJEMP_ADO->verRepaletizaje($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYREPALETIZAJE as $r) :
            $IDREPALETIZAJE = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_REPALETIZAJE'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $TOTALENVASEORIGNAL =  "" . $r['CANTIDAD_ENVASE_REPALETIZAJE'];
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
        $ARRAYREPALETIZAJE = $REPALETIZAJEMP_ADO->verRepaletizaje($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYREPALETIZAJE as $r) :
            $IDREPALETIZAJE = "" . $r['ID_REPALETIZAJE'];
            $NUMEROVER = "" . $r['NUMERO_REPALETIZAJE'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $TOTALENVASEORIGNAL =  "" . $r['CANTIDAD_ENVASE_REPALETIZAJE'];
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
        $DISABLED4 = "disabled";
        $DISABLED5 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        $ARRAYREPALETIZAJE = $REPALETIZAJEMP_ADO->verRepaletizaje($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYREPALETIZAJE as $r) :
            $IDREPALETIZAJE = "" . $r['ID_REPALETIZAJE'];
            $NUMEROVER = "" . $r['NUMERO_REPALETIZAJE'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $TOTALENVASEORIGNAL =  "" . $r['CANTIDAD_ENVASE_REPALETIZAJE'];
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
    <title>Registro Repaletizaje Materia Prima</title>
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
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Granel</li>
                                            <li class="breadcrumb-item" aria-current="page">Repaletizaje</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroRepaletizajeMpRecepcion.php">Operaciones Repaletizaje Materia Prima</a>
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
                                            <input type="hidden" class="form-control" placeholder="ID REPALETIZAJE" id="ID" name="ID" value="<?php echo $IDREPALETIZAJE; ?>" />
                                            <label>Numero</label>
                                            <input type="text" class="form-control" placeholder="Numero Repaletizaje" id="IDREPALETIZAJE" name="IDREPALETIZAJE" value="<?php echo $NUMEROVER; ?>" <?php echo $DISABLED0; ?> <?php echo $DISABLEDSTYLE0; ?> />
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
                                                <input type="hidden" class="form-control" placeholder="FECHA INGRESO" id="FECHAINGRESOPALETIZAJEE" name="FECHAINGRESOPALETIZAJEE" value="<?php echo $FECHAINGRESOPALETIZAJE; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="FECHA PALETIZAJE" id="FECHAINGRESOPALETIZAJE" name="FECHAINGRESOPALETIZAJE" value="<?php echo $FECHAINGRESOPALETIZAJE; ?>" disabled />
                                                <label id="val_fechai" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Fecha Modificacion</label>
                                                <input type="hidden" class="form-control" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACIONPALETIZAJEE" name="FECHAMODIFCIACIONPALETIZAJEE" value="<?php echo $FECHAMODIFCIACIONPALETIZAJE; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACIONPALETIZAJE" name="FECHAMODIFCIACIONPALETIZAJE" value="<?php echo $FECHAMODIFCIACIONPALETIZAJE; ?>" disabled />
                                                <label id="val_fecham" class="validacion"> </label>
                                            </div>
                                        </div>

                                    </div>


                                    <label id="val_validato" class="validacion"> <?php echo $MENSAJEVALIDATO; ?> </label>
                                    <div class="row">

                                        <div class="col-sm-12">
                                            <label>Motivo a Repaletizar</label>
                                            <input type="text" class="form-control" placeholder="Motivo a Repaletizar" id="MOTIVOREPALETIZAJE" name="MOTIVOREPALETIZAJE" <?php echo $DISABLEDFOLIO; ?>  value="<?php echo $MOTIVOREPALETIZAJE; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDSTYLE; ?> />
                                            <label id="val_motivo" class="validacion"> </label>
                                        </div>
                                    </div>
                                    <!- selecionar existencia ->
                                        <div class="row">
                                            <div class="col-sm-11">
                                                <div class="form-group">
                                                    <label>Ingreso / Existencia Materia Prima </label>
                                                    <div class="table-responsive">
                                                        <table id="ingreso" class="table table-hover " style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <a href="#" class="text-warning hover-warning">
                                                                            N° Folio
                                                                        </a>
                                                                    </th>
                                                                    <th class="text-center">Operaciones</th>
                                                                    <th>Fecha Ingreso </th>
                                                                    <th>Cantidad Envase </th>
                                                                    <th>Kilo Neto </th>
                                                                    <th>CSG</th>
                                                                    <th>Productor</th>
                                                                    <th>Variedad</th>
                                                                    <th>Estandar </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if ($ARRAYEXIMATERIAPRIMATOMADO) { ?>
                                                                    <?php foreach ($ARRAYEXIMATERIAPRIMATOMADO as $r) : ?>
                                                                        <tr class="center">
                                                                            <td>
                                                                                <a href="#" class="text-warning hover-warning">
                                                                                    <?php
                                                                                    echo $r['FOLIO_AUXILIAR_EXIMATERIAPRIMA'];
                                                                                    ?>
                                                                                </a>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <form method="post" id="form1">
                                                                                    <input type="hidden" class="form-control" id="IDREPALETIZAJEAUX" name="IDREPALETIZAJEAUX" value="<?php echo $IDREPALETIZAJE; ?>" />
                                                                                    <input type="hidden" class="form-control" id="IDEXIMATERIAPRIMAQUITAR" name="IDEXIMATERIAPRIMAQUITAR" value="<?php echo $r['ID_EXIMATERIAPRIMA']; ?>" />
                                                                                    <input type="hidden" class="form-control" id="FOLIOEXIMATERIAPRIMAQUITAR" name="FOLIOEXIMATERIAPRIMAQUITAR" value="<?php echo $r['FOLIO_AUXILIAR_EXIMATERIAPRIMA']; ?>" />
                                                                                    <?php
                                                                                    $ARRAYREPALETIZAJEHFOPOREXISTENCIA = $REPALETIZAJEHFO_ADO->buscarPorExistenciaRepaletizajeMp($IDOP, $r['ID_EXIMATERIAPRIMA']);
                                                                                    if (empty($ARRAYREPALETIZAJEHFOPOREXISTENCIA)) { ?>
                                                                                        <button type="submit" class="btn btn-rounded btn-sm  btn-danger btn-outline mr-1" id="defecto" name="QUITAR" title="Quitar">
                                                                                            <i class="ti-close  "></i> 
                                                                                        </button>
                                                                                    <?php } else { ?>
                                                                                    <?php } ?>
                                                                                </form>
                                                                            </td>
                                                                            <td><?php echo $r['FECHA_INGRESO_EXIMATERIAPRIMA']; ?></td>
                                                                            <td><?php echo $r['CANTIDAD_ENVASE_EXIMATERIAPRIMA']; ?></td>
                                                                            <td><?php echo $r['KILOS_NETO_EXIMATERIAPRIMA']; ?></td>
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
                                                                            <td>
                                                                                <?php
                                                                                $ARRAYEVERERECEPCIONID = $ERECEPCION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                                                echo $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                                                ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                <?php } ?>
                                                                <?php if ($ARRAYEXIMATERIAPRIMATOMADOREPALETIZADO) { ?>
                                                                    <?php foreach ($ARRAYEXIMATERIAPRIMATOMADOREPALETIZADO as $r) : ?>
                                                                        <tr class="center">
                                                                            <td>
                                                                                <a href="#" class="text-warning hover-warning">
                                                                                    <?php
                                                                                    echo $r['FOLIO_AUXILIAR_EXIMATERIAPRIMA'];

                                                                                    ?>
                                                                                </a>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                -
                                                                            </td>
                                                                            <td><?php echo $r['FECHA_INGRESO_EXIMATERIAPRIMA']; ?></td>
                                                                            <td><?php echo $r['CANTIDAD_ENVASE_EXIMATERIAPRIMA']; ?></td>
                                                                            <td><?php echo $r['KILOS_NETO_EXIMATERIAPRIMA']; ?></td>
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
                                                                            <td>
                                                                                <?php
                                                                                $ARRAYEVERERECEPCIONID = $ERECEPCION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                                                echo $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                                                ?>
                                                                            </td>

                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>

                                                        <label id="val_dproceso" class="validacion center"><?php echo $MENSAJE; ?> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group center">
                                                                    Selecionar
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class=" center">
                                                                <div class="form-group">
                                                                    <button type="button" class=" btn btn-rounded btn-success btn-outline" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED2; ?> <?php echo $DISABLED4; ?> id="defecto" name="agregar" Onclick="abrirVentana('registroSelecionExistenciaRepaletizajeMp.php?EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?> && REPALETIZAJE=<?php echo $IDOP ?>' ); ">
                                                                        <i class="glyphicon glyphicon-plus"></i>
                                                                    </button>


                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!- proceso exportacion ->
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <label>Salida / Detalle Repaletizaje </label>
                                                        <div class="table-responsive">
                                                            <table id="salida" class="table table-hover " style="width: 100%;">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <a href="#" class="text-warning hover-warning">
                                                                                Folio Nuevo
                                                                            </a>
                                                                        </th>
                                                                        <th class="text-center">Operaciones</th>
                                                                        <th>Cantidad Envase </th>
                                                                        <th>Kilo Neto </th>
                                                                        <th>CSG</th>
                                                                        <th>Productor</th>
                                                                        <th>Variedad</th>
                                                                        <th>Estandar</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php if ($ARRAYDREPALETIZAJE) { ?>
                                                                        <?php foreach ($ARRAYDREPALETIZAJE as $r) : ?>
                                                                            <tr class="center">
                                                                                <td>
                                                                                    <a href="#" class="text-warning hover-warning">
                                                                                        <?php echo $r['FOLIO_NUEVO_DREPALETIZAJE']; ?>
                                                                                    </a>
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    <form method="post" id="form1">
                                                                                        <?php if ($r['ESTADO'] == "1") { ?>
                                                                                            <input type="hidden" class="form-control" id="FOLIOELIMINAR" name="FOLIOELIMINAR" value="<?php echo $r['FOLIO_NUEVO_DREPALETIZAJE']; ?>" />
                                                                                            <button type="submit" class="btn btn-rounded  btn-sm  btn-danger btn-outline mr-1" id="ELIMINAR" name="ELIMINAR" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED2; ?> title="Eliminar">
                                                                                                <i class="ti-close"></i> 
                                                                                            </button>
                                                                                        <?php } else {
                                                                                            echo "-";
                                                                                        } ?>


                                                                                    </form>
                                                                                </td>
                                                                                <td><?php echo $r['CANTIDAD_ENVASE_DREPALETIZAJE']; ?></td>
                                                                                <td><?php echo $r['KILOS_NETO_DREPALETIZAJE']; ?></td>


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

                                                                                <td>
                                                                                    <?php
                                                                                    $ARRAYEVERERECEPCIONID = $ERECEPCION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                                                    echo $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                                                    ?>
                                                                                </td>
                                                                            </tr>
                                                                        <?php endforeach; ?>
                                                                    <?php } ?>

                                                                </tbody>
                                                            </table>
                                                            <label id="val_dproceso" class="validacion center"><?php echo $MENSAJE2; ?> </label>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class=" center">
                                                                    <div class="form-group">
                                                                        <label>Agregar</label>
                                                                        <br>
                                                                        <button type="button" class=" btn btn-rounded btn-success btn-outline" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED2; ?> <?php echo $DISABLED5; ?> <?php if ($DIFERENCIACAJAS == 0) {
                                                                                                                                                                                                        echo "disabled";
                                                                                                                                                                                                    } ?> id="defecto" name="agregar" Onclick="abrirVentana('registroDrepaletizajeSeleccionCajaMP.php?EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?> && REPALETIZAJE=<?php echo $IDOP ?>' ); ">
                                                                            <i class="glyphicon glyphicon-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                                <td></td>
                                                            </tr>

                                                            <tr>
                                                                <td>Envase Original</td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="hidden" class="form-control" placeholder="Total Cantidad Original" id="TOTALENVASEORIGINAL" name="TOTALENVASEORIGINAL" value="<?php echo $TOTALENVASEORIGNAL; ?>" />
                                                                        <input type="text" class="form-control" placeholder="Total Cantidad Original" id="TOTALENVASEORIGINALV" name="TOTALENVASEORIGINALV" value="<?php echo $TOTALENVASEORIGNAL; ?>" <?php echo $DISABLED0; ?> <?php echo $DISABLEDSTYLE0; ?> />
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Envase Repaletizaje</td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="hidden" class="form-control" placeholder="Total Cantidad Repaletizaje" id="TOTALENVASEREPALETIZAJE" name="TOTALENVASEREPALETIZAJE" value="<?php echo $TOTALENVASEREPALETIZAJE; ?>" />
                                                                        <input type="text" class="form-control" placeholder="Total Cantidad Repaletizaje" id="TOTALENVASEREPALETIZAJEV" name="TOTALENVASEREPALETIZAJEV" value="<?php echo $TOTALENVASEREPALETIZAJE; ?>" <?php echo $DISABLED0; ?> <?php echo $DISABLEDSTYLE0; ?> />
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                    <div class="form-group">
                                                        <label>Diferencia Cajas </label>
                                                        <input type="hidden" class="form-control" placeholder="DIFERENCIA CAJAS" id="DIFERENCIACAJAS" name="DIFERENCIACAJAS" value="<?php echo $DIFERENCIACAJAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Diferencia Cajas " id="DIFERENCIACAJASV" name="DIFERENCIACAJAVS" value="<?php echo $DIFERENCIACAJAS; ?>" <?php echo $DISABLED0; ?> <?php echo $DISABLEDSTYLE0; ?> />
                                                    </div>

                                                    <label id="val_dproceso" class="validacion center"><?php echo $MENSAJE3; ?> </label>
                                                </div>
                                            </div>
                                            <!-- /.row -->


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


                                                        <?php if ($OP == "crear") { ?>
                                                            <button type=" button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroRepaletizajeMpRecepcion.php');">
                                                                <i class="ti-trash"></i> CANCELAR
                                                            </button>
                                                        <?php } ?>
                                                        <?php if ($OP == "editar") { ?>
                                                            <button type="button" class="btn btn-rounded  btn-success btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('listarRepaletizajeMpRecepcion.php'); ">
                                                                <i class="ti-back-left "></i> VOLVER
                                                            </button>
                                                        <?php } ?>

                                                        <?php if ($OP == "ver") { ?>
                                                            <button type="button" class="btn btn-rounded  btn-success btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('listarRepaletizajeMpRecepcion.php'); ">
                                                                <i class="ti-back-left "></i> VOLVER
                                                            </button>
                                                        <?php } ?>
                                                        <?php if ($OP == "") { ?>
                                                            <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroRepaletizajeMpRecepcion.php');">
                                                                <i class="ti-trash"></i> CANCELAR
                                                            </button>
                                                        <?php } ?>

                                                        <?php if ($OP == "crear") { ?>
                                                            <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="GUARDAR" value="GUARDAR" <?php echo $DISABLEDFOLIO; ?>>
                                                                <i class="ti-save-alt"></i> GUARDAR
                                                            </button>
                                                        <?php }   ?>
                                                        <?php if ($OP == "editar") { ?>
                                                            <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="GUARDAR" value="GUARDAR" <?php echo $DISABLEDFOLIO; ?>>
                                                                <i class="ti-save-alt"></i> GUARDAR
                                                            </button>
                                                        <?php }   ?>
                                                        <?php if ($OP == "ver") { ?>
                                                            <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="CREAR" value="CREAR" <?php echo $DISABLED; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                                <i class="ti-save-alt"></i> CREAR
                                                            </button>
                                                        <?php } ?>
                                                        <?php if ($OP == "") { ?>
                                                            <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="CREAR" value="CREAR" <?php echo $DISABLED; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                                <i class="ti-save-alt"></i> CREAR
                                                            </button>
                                                        <?php } ?>
                                                    </td>
                                                    <td>

                                                        <?php if ($OP != "") { ?>
                                                            <?php if ($ESTADO == "0") {  ?>
                                                                <button type="button" class="btn btn-rounded  btn-info btn-outline mr-1" id="defecto" name="tarjas"<?php echo $DISABLEDFOLIO; ?>  Onclick="abrirVentana('../documento/informeRepaletizajeMP.php?parametro=<?php echo $IDOP; ?>&&NOMBREUSUARIO=<?php echo $NOMBREUSUARIOS; ?>'); ">
                                                                    <i class="fa fa-file-pdf-o"></i>INFORME
                                                                </button>

                                                            <?php } ?>
                                                            <button type="button" class="btn btn-rounded  btn-info  btn-outline mr-1" id="defecto" name="tarjas" <?php echo $DISABLEDFOLIO; ?> Onclick="abrirVentana('../documento/informeTarjasRepaletizajeMP.php?parametro=<?php echo $IDOP; ?>'); ">
                                                                <i class="fa fa-file-pdf-o"></i>TARJAS
                                                            </button>
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