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
include_once '../controlador/PROCESO_ADO.php';
include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';
include_once '../controlador/CALIBRE_ADO.php';
include_once '../controlador/EMBALAJE_ADO.php';

include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/REPALETIZAJEEX_ADO.php';
include_once '../controlador/REPALETIZAJEHFO_ADO.php';
include_once '../controlador/DREPALETIZAJEEX_ADO.php';

include_once '../modelo/REPALETIZAJEEX.php';
include_once '../modelo/REPALETIZAJEHFO.php';
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
$PVESPECIES_ADO =  new PVESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$CALIBRE_ADO =  new CALIBRE_ADO();
$EMBALAJE_ADO =  new EMBALAJE_ADO();

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$REPALETIZAJEEX_ADO =  new REPALETIZAJEEX_ADO();
$REPALETIZAJEHFO_ADO =  new REPALETIZAJEHFO_ADO();
$DREPALETIZAJEEX_ADO =  new DREPALETIZAJEEX_ADO();

//INIICIALIZAR MODELO
$EXIEXPORTACION =  new EXIEXPORTACION();
$REPALETIZAJEEX =  new REPALETIZAJEEX();
$REPALETIZAJEHFO =  new REPALETIZAJEHFO();
$DREPALETIZAJEEX =  new DREPALETIZAJEEX();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD



$NUMERO = "";
$NUMEROVER = "";
$IDEXIEXPORTACIONQUITAR = "";
$FOLIOEXIEXPORTACIONQUITAR = "";


$IDDREPALETIZAJE  = "";
$IDTMANEJO  = "";
$IDPVESPECIES  = "";
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

$TOTALENVASEORIGNAL = "";
$TOTALENVASEREPALETIZAJE = "";
$TOTALENVASEORIGNAL2 = "";
$TOTALENVASEREPALETIZAJE2 = "";

$TOTALNETOORIGNAL = "";
$TOTALNETOREPALETIZAJE = "";

$DIFERENCIACAJAS = "";
$ESTADO = "";
$STOCK = "";


$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$TMANEJO = "";

$FOCUS = "";
$DISABLED0 = "disabled";
$DISABLED = "";
$DISABLED2 = "disabled";
$DISABLED3 = "";
$DISABLED4 = "";
$DISABLED5 = "";
$DISABLED6 = "";
$DISABLEDSTYLE0 = "style='background-color: #eeeeee;'";
$DISABLEDSTYLE = "";
$DISABLEDSTYLE2 = "";
$DISABLEDSTYLE3 = "";

$BORDER = "";
$MENSAJE0 = "";
$MENSAJE = "";
$MENSAJE2 = "";
$MENSAJE3 = "";
$MENSAJE4 = "";
$MENSAJE5 = "";
$MENSAJE6 = "";
$MENSAJE7 = "";
$MENSAJE8 = "";
$MENSAJE9 = "";
$MENSAJEVALIDATO = "";


$DISABLEDFOLIO = "";
$MENSAJEFOLIO = "";


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
$ARRAYTEMPORADA = $TEMPORADA_ADO->listarTemporada3CBX();

$ARRAYFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTexportacion($EMPRESAS, $PLANTAS, $TEMPORADAS);
if (empty($ARRAYFOLIO)) {
    $DISABLEDFOLIO = "disabled";
    $MENSAJEFOLIO = " NECESITA <b> CREAR LOS FOLIOS PT </b> , PARA OCUPAR LA <b> FUNCIONALIDAD </b>. FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
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

        $ARRAYNUMERO = $REPALETIZAJEEX_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
        $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;

        $REPALETIZAJEEX->__SET('NUMERO_REPALETIZAJE', $NUMERO);
        $REPALETIZAJEEX->__SET('CANTIDAD_ENVASE_REPALETIZAJE', 0);
        $REPALETIZAJEEX->__SET('KILOS_NETO_REPALETIZAJE', 0);
        $REPALETIZAJEEX->__SET('CANTIDAD_ENVASE_ORIGINAL', 0);
        $REPALETIZAJEEX->__SET('KILOS_NETO_ORIGINAL', 0);
        $REPALETIZAJEEX->__SET('MOTIVO_REPALETIZAJE', $_REQUEST['MOTIVOREPALETIZAJE']);
        $REPALETIZAJEEX->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $REPALETIZAJEEX->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $REPALETIZAJEEX->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $REPALETIZAJEEX_ADO->agregarRepaletizaje($REPALETIZAJEEX);

        $ARRAYREPALETIZAJEBUSCARID = $REPALETIZAJEEX_ADO->buscarID(
            0,
            0,
            $_REQUEST['MOTIVOREPALETIZAJE'],
            $_REQUEST['EMPRESA'],
            $_REQUEST['PLANTA'],
            $_REQUEST['TEMPORADA']
        );
        //REDIRECCIONAR A PAGINA registroRecepcion.php 
        echo "<script type='text/javascript'> location.href ='registroRepaletizajeEx.php?parametro=" . $ARRAYREPALETIZAJEBUSCARID[0]['ID_REPALETIZAJE'] . "&&parametro1=crear';</script>";
    }
}


if (isset($_REQUEST['EDITAR'])) {
    $ARRAYEXIEXPORTACIONTOMADO = $EXIEXPORTACION_ADO->buscarPorRepaletizaje($_REQUEST['ID']);
    $ARRAYDREPALETIZAJE = $DREPALETIZAJEEX_ADO->buscarDrepaletizaje($_REQUEST['ID']);
    $ARRAYEXIEXPORTACIONINGRESANDOREPALETIZADO = $EXIEXPORTACION_ADO->buscarPorRepaletizajeIngresando($_REQUEST['ID']);
    if ($ARRAYEXIEXPORTACIONTOMADO || $ARRAYEXIEXPORTACIONINGRESANDOREPALETIZADO) {
        $SINO = "0";
        $MENSAJE = "";
        if ($ARRAYDREPALETIZAJE) {
            $SINO = "0";
            $MENSAJE2 = "";
        } else {
            $SINO = "1";
            $MENSAJE2 = "TIENE QUE CREAR UN REGISTRO DEL DETALLE DE REPALETIZAJE";
        }
    } else {
        $SINO = "1";
        $MENSAJE = "TIENE QUE SELECIONAR UNA EXISTENCIA";
    }

    if ($SINO == "0") {

        $REPALETIZAJEEX->__SET('CANTIDAD_ENVASE_REPALETIZAJE', $_REQUEST['TOTALENVASEORIGINAL']);
        $REPALETIZAJEEX->__SET('KILOS_NETO_REPALETIZAJE', $_REQUEST['TOTALNETOREPALETIZAJE']);
        $REPALETIZAJEEX->__SET('CANTIDAD_ENVASE_ORIGINAL', $_REQUEST['TOTALENVASEREPALETIZAJE']);
        $REPALETIZAJEEX->__SET('KILOS_NETO_ORIGINAL', $_REQUEST['TOTALNETOORIGNAL']);
        $REPALETIZAJEEX->__SET('MOTIVO_REPALETIZAJE', $_REQUEST['MOTIVOREPALETIZAJEE']);
        $REPALETIZAJEEX->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $REPALETIZAJEEX->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $REPALETIZAJEEX->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        $REPALETIZAJEEX->__SET('ID_REPALETIZAJE', $_REQUEST['ID']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $REPALETIZAJEEX_ADO->actualizarRepaletizaje($REPALETIZAJEEX);
    }
}
//OPERACION EDICION DE FILA
if (isset($_REQUEST['CERRAR'])) {
    $ARRAYEXIEXPORTACIONTOMADO = $EXIEXPORTACION_ADO->buscarPorRepaletizaje($_REQUEST['ID']);
    $ARRAYDREPALETIZAJE = $DREPALETIZAJEEX_ADO->buscarDrepaletizaje($_REQUEST['ID']);
    $ARRAYEXIEXPORTACIONINGRESANDOREPALETIZADO = $EXIEXPORTACION_ADO->buscarPorRepaletizajeIngresando($_REQUEST['ID']);

    if ($ARRAYEXIEXPORTACIONTOMADO || $ARRAYEXIEXPORTACIONINGRESANDOREPALETIZADO) {
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
        $REPALETIZAJEEX->__SET('CANTIDAD_ENVASE_REPALETIZAJE', $_REQUEST['TOTALENVASEORIGINAL']);
        $REPALETIZAJEEX->__SET('KILOS_NETO_REPALETIZAJE', $_REQUEST['TOTALNETOREPALETIZAJE']);
        $REPALETIZAJEEX->__SET('CANTIDAD_ENVASE_ORIGINAL', $_REQUEST['TOTALENVASEREPALETIZAJE']);
        $REPALETIZAJEEX->__SET('KILOS_NETO_ORIGINAL', $_REQUEST['TOTALNETOORIGNAL']);
        $REPALETIZAJEEX->__SET('MOTIVO_REPALETIZAJE', $_REQUEST['MOTIVOREPALETIZAJEE']);
        $REPALETIZAJEEX->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $REPALETIZAJEEX->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $REPALETIZAJEEX->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        $REPALETIZAJEEX->__SET('ID_REPALETIZAJE', $_REQUEST['ID']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $REPALETIZAJEEX_ADO->actualizarRepaletizaje($REPALETIZAJEEX);

        $ARRAYREPALETIZAJEVER = $REPALETIZAJEEX_ADO->verRepaletizaje($_REQUEST['ID']);

        $REPALETIZAJEEX->__SET('ID_REPALETIZAJE', $_REQUEST['ID']);
        // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $REPALETIZAJEEX_ADO->cerrado($REPALETIZAJEEX);

        foreach ($ARRAYEXIEXPORTACIONTOMADO as $s) :
            $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $s['ID_EXIEXPORTACION']);
            // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
            $EXIEXPORTACION_ADO->Repaletizaje($EXIEXPORTACION);
        endforeach;

        foreach ($ARRAYEXIEXPORTACIONINGRESANDOREPALETIZADO as $s) :
            $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $s['ID_EXIEXPORTACION']);
            // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
            $EXIEXPORTACION_ADO->vigente($EXIEXPORTACION);
        endforeach;


        foreach ($ARRAYDREPALETIZAJE as $s) :
            $DREPALETIZAJEEX->__SET('ID_DREPALETIZAJE', $s['ID_DREPALETIZAJE']);
            // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
            $DREPALETIZAJEEX_ADO->cerrado($DREPALETIZAJEEX);
        endforeach;

        //REDIRECCIONAR A PAGINA registroRecepcion.php 
        //SEGUNE EL TIPO DE OPERACIONS QUE SE INDENTIFIQUE EN LA URL
        if ($_REQUEST['parametro1'] == "crear") {
            echo "<script type='text/javascript'> location.href ='registroRepaletizajeEx.php?parametro=" . $_REQUEST['ID'] . "&&parametro1=ver';</script>";
        }
        if ($_REQUEST['parametro1'] == "editar") {
            echo "<script type='text/javascript'> location.href ='registroRepaletizajeEx.php?parametro=" . $_REQUEST['ID'] . "&&parametro1=ver';</script>";
        }
    }
}
if (isset($_REQUEST['ELIMINAR'])) {
    $IDDREPALETIZAJE = $_REQUEST['IDDREPALETIZAJE'];
    $FOLIOELIMINAR = $_REQUEST['FOLIOELIMINAR'];
    $CAJAS = $_REQUEST['CAJAS'];
    $IDPVESPECIES = $_REQUEST['IDPVESPECIES'];
    $IDPRODUCTOR = $_REQUEST['IDPRODUCTOR'];
    $IDTMANEJO = $_REQUEST['IDTMANEJO'];
    $IDESTANDAR = $_REQUEST['IDESTANDAR'];
    $IDFOLIO = $_REQUEST['IDFOLIO'];
    $FECHAEMBALADO = $_REQUEST['FECHAEMBALADO'];
    $REPALETIZAJE = $_REQUEST['REPALETIZAJE'];
    //echo "<br>";


    $DREPALETIZAJEEX->__SET('FOLIO_NUEVO_DREPALETIZAJE', $FOLIOELIMINAR);
    $DREPALETIZAJEEX->__SET('ID_DREPALETIZAJE', $IDDREPALETIZAJE);
    $DREPALETIZAJEEX_ADO->deshabilitar3($DREPALETIZAJEEX);


    $ARRAYDESAHABILITAR = $EXIEXPORTACION_ADO->buscarExiexportacionEliminar(
        $FOLIOELIMINAR,
        $CAJAS,
        $IDTMANEJO,
        $IDPVESPECIES,
        $IDPRODUCTOR,
        $IDESTANDAR,
        $IDFOLIO,
        $FECHAEMBALADO,
        $REPALETIZAJE
    );

    foreach ($ARRAYDESAHABILITAR as $r) :

        $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $r["ID_EXIEXPORTACION"]);
        $EXIEXPORTACION->__SET('ID_REPALETIZAJE', $REPALETIZAJE);
        $EXIEXPORTACION_ADO->deshabilitarRepaletizaje($EXIEXPORTACION);


        $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $r["ID_EXIEXPORTACION"]);
        $EXIEXPORTACION->__SET('ID_REPALETIZAJE', $REPALETIZAJE);
        $EXIEXPORTACION_ADO->eliminadoRepaletizaje($EXIEXPORTACION);
    endforeach;
}


if (isset($_REQUEST['QUITAR'])) {

    $IDEXIEXPORTACIONQUITAR = $_REQUEST['IDEXIEXPORTACIONQUITAR'];
    $FOLIOEXIEXPORTACIONQUITAR = $_REQUEST['FOLIOEXIEXPORTACIONQUITAR'];
    $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $IDEXIEXPORTACIONQUITAR);
    $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $FOLIOEXIEXPORTACIONQUITAR);
    // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $EXIEXPORTACION_ADO->actualizarDeselecionarRepaletizajeCambiarEstado($EXIEXPORTACION);
}
//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($_REQUEST['parametro']) && isset($_REQUEST['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_REQUEST['parametro'];
    $OP = $_REQUEST['parametro1'];
    $ARRAYEXIEXPORTACIONTOMADO = $EXIEXPORTACION_ADO->buscarPorRepaletizaje2($IDOP);
    $ARRAYEXISTENCIATOTALESPORREPALETIZAJE = $EXIEXPORTACION_ADO->obtenerTotalesRepaletizaje($IDOP);
    $ARRAYEXISTENCIATOTALESPORREPALETIZAJE2 = $EXIEXPORTACION_ADO->obtenerTotalesRepaletizaje2($IDOP);

    $TOTALNETOORIGNAL = $ARRAYEXISTENCIATOTALESPORREPALETIZAJE[0]['TOTAL_NETO'];
    $TOTALENVASEORIGNAL = $ARRAYEXISTENCIATOTALESPORREPALETIZAJE[0]['TOTAL_ENVASE'];

    $TOTALNETOORIGNAL2 = $ARRAYEXISTENCIATOTALESPORREPALETIZAJE2[0]['TOTAL_NETO'];
    $TOTALENVASEORIGNAL2 = $ARRAYEXISTENCIATOTALESPORREPALETIZAJE2[0]['TOTAL_ENVASE'];

    $ARRAYDREPALETIZAJE = $DREPALETIZAJEEX_ADO->buscarDrepaletizaje2($IDOP);
    $ARRAYDREPALETIZAJETOTALES = $DREPALETIZAJEEX_ADO->totalesDrepaletizaje($IDOP);
    $ARRAYDREPALETIZAJETOTALES2 = $DREPALETIZAJEEX_ADO->totalesDrepaletizaje2($IDOP);
    $TOTALNETOREPALETIZAJE = $ARRAYDREPALETIZAJETOTALES[0]['TOTAL_NETO'];
    $TOTALENVASEREPALETIZAJE = $ARRAYDREPALETIZAJETOTALES[0]['TOTAL_ENVASE'];

    $TOTALNETOREPALETIZAJE2 = $ARRAYDREPALETIZAJETOTALES2[0]['TOTAL_NETO'];
    $TOTALENVASEREPALETIZAJE2 = $ARRAYDREPALETIZAJETOTALES2[0]['TOTAL_ENVASE'];

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
        $DISABLED4 = "disabled";
        $DISABLED5 = "disabled";
        $DISABLED6 = "disabled";
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
                                            <li class="breadcrumb-item" aria-current="page">Proceso</li>
                                            <li class="breadcrumb-item" aria-current="page">Repaletizaje</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroRepaletizajeEx.php">Operaciónes Repaletizaje </a>
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

                                    <label id="val_validato" class="validacion"> <?php echo $MENSAJEVALIDATO; ?> </label>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <input type="hidden" class="form-control" placeholder="ID REPALETIZAJE" id="ID" name="ID" value="<?php echo $IDREPALETIZAJE; ?>" />
                                            <label>Número Repaletizaje</label>
                                            <input type="text" class="form-control" placeholder="Número Repaletizaje" id="IDREPALETIZAJE" name="IDREPALETIZAJE" value="<?php echo $NUMEROVER; ?>" <?php echo $DISABLED0; ?> <?php echo $DISABLEDSTYLE0; ?> />
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
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="Fecha Ingreso" id="FECHAINGRESOPALETIZAJE" name="FECHAINGRESOPALETIZAJE" value="<?php echo $FECHAINGRESOPALETIZAJE; ?>" disabled />
                                                <label id="val_fechai" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Fecha Modificación</label>
                                                <input type="hidden" class="form-control" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACIONPALETIZAJEE" name="FECHAMODIFCIACIONPALETIZAJEE" value="<?php echo $FECHAMODIFCIACIONPALETIZAJE; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="FECHA Modificación" id="FECHAMODIFCIACIONPALETIZAJE" name="FECHAMODIFCIACIONPALETIZAJE" value="<?php echo $FECHAMODIFCIACIONPALETIZAJE; ?>" disabled />
                                                <label id="val_fecham" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Motivo</label>
                                            <input type="hidden" class="form-control" placeholder="Motivo a Repaletizar" id="MOTIVOREPALETIZAJEE" name="MOTIVOREPALETIZAJEE" value="<?php echo $MOTIVOREPALETIZAJE; ?>" />
                                            <input type="text" class="form-control" placeholder="Motivo a Repaletizar" id="MOTIVOREPALETIZAJE" name="MOTIVOREPALETIZAJE" value="<?php echo $MOTIVOREPALETIZAJE; ?>" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDSTYLE; ?> />
                                            <label id="val_motivo" class="validacion"> </label>
                                        </div>
                                    </div>

                                    <!- selecionar existencia ->
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Ingreso / Existencia Producto Terminado </label>
                                                </div>
                                            </div>
                                        </div>
                                        <label id="val_validato" class="validacion"> <?php echo $MENSAJE; ?> </label>
                                        <div class="row">
                                            <div class="col-sm-11">
                                                <div class="form-group">
                                                    <div class="table-responsive">
                                                        <table id="ingreso" class="table table-hover " style="width: 100%;">
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
                                                                    <th>Tipo Manejo</th>
                                                                    <th>Calibre</th>
                                                                    <th>Embalaje</th>
                                                                    <th>Stock</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <form method="post" id="form2">
                                                                    <?php if ($ARRAYEXIEXPORTACIONTOMADO) { ?>
                                                                        <?php foreach ($ARRAYEXIEXPORTACIONTOMADO as $r) : ?>
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
                                                                                        <input type="hidden" class="form-control" placeholder="ID REPALETIZAJE" id="IDREPALETIZAJEAUX" name="IDREPALETIZAJEAUX" value="<?php echo $IDREPALETIZAJE; ?>" />
                                                                                        <input type="hidden" class="form-control" id="IDEXIEXPORTACIONQUITAR" name="IDEXIEXPORTACIONQUITAR" value="<?php echo $r['ID_EXIEXPORTACION']; ?>" />
                                                                                        <input type="hidden" class="form-control" id="FOLIOEXIEXPORTACIONQUITAR" name="FOLIOEXIEXPORTACIONQUITAR" value="<?php echo $r['FOLIO_EXIEXPORTACION']; ?>" />
                                                                                        <?php
                                                                                        //$ARRAYREPALETIZAJEHFOPOREXISTENCIA=$REPALETIZAJEHFO_ADO->buscarPorExistenciaRepaletizajeEx($IDOP, $r['ID_EXIEXPORTACION']);      

                                                                                        $ARRAYDREPALETIZAJEBOLSA = $DREPALETIZAJEEX_ADO->buscarDrepaletizajeBolsa($r['ID_FOLIO'], $r['FECHA_EMBALADO_EXIEXPORTACION'],  $r['ID_ESTANDAR'], $r['ID_PRODUCTOR'], $r['ID_PVESPECIES'], $r['ID_TMANEJO'],  $r['ID_CALIBRE'], $r['ID_EMBALAJE'], $r['STOCK'],   $IDREPALETIZAJE);
                                                                                        ?>
                                                                                        <button type="submit" class="btn btn-rounded btn-sm  btn-danger btn-outline mr-1" id="defecto" name="QUITAR" title="Quitar" <?php if ($ARRAYDREPALETIZAJEBOLSA) {
                                                                                                                                                                                                                        echo "disabled";
                                                                                                                                                                                                                    } ?> <?php if ($ESTADO == "0") {
                                                                                                                                                                                                                                echo "disabled";
                                                                                                                                                                                                                            } ?>>
                                                                                            <i class="ti-close  "></i>
                                                                                        </button>
                                                                                    </form>
                                                                                </td>

                                                                                <td><?php echo $r['FECHA_EMBALADO_EXIEXPORTACION']; ?></td>
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
                                                                                <td>
                                                                                    <?php
                                                                                    $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
                                                                                    if ($ARRAYTMANEJO) {
                                                                                        echo $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                                                    } else {
                                                                                        echo "-";
                                                                                    }
                                                                                    ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php
                                                                                    $ARRAYCALIBRE = $CALIBRE_ADO->verCalibre($r['ID_CALIBRE']);
                                                                                    if ($ARRAYCALIBRE) {
                                                                                        echo $ARRAYCALIBRE[0]['NOMBRE_CALIBRE'];
                                                                                    } else {
                                                                                        echo "Sin Calibre";
                                                                                    }
                                                                                    ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php
                                                                                    $ARRAYEMBALAJE = $EMBALAJE_ADO->verEmbalaje($r['ID_EMBALAJE']);
                                                                                    if ($ARRAYEMBALAJE) {
                                                                                        echo $ARRAYEMBALAJE[0]['NOMBRE_EMBALAJE'];
                                                                                    } else {
                                                                                        echo "Sin Embalaje";
                                                                                    }
                                                                                    ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php
                                                                                    if ($r['STOCK']) {
                                                                                        echo $r['STOCK'];
                                                                                    } else {
                                                                                        echo "Sin Stock";
                                                                                    }
                                                                                    ?>
                                                                                </td>
                                                                            </tr>
                                                                        <?php endforeach; ?>
                                                                    <?php } ?>
                                                                </form>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group center">
                                                                    Seleccionar
                                                                    </divó </td>
                                                        </tr>
                                                        <tr>
                                                            <td class=" center">
                                                                <div class="form-group">
                                                                    <button type="button" class=" btn btn-rounded btn-success btn-outline" <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED4; ?> <?php if ($ESTADO == 0) {
                                                                                                                                                                                                                                    echo "disabled";
                                                                                                                                                                                                                                } ?> id="defecto" name="agregar" Onclick="abrirVentana('registroSelecionExistenciaRepaletizajePt.php?EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?> && REPALETIZAJE=<?php echo $IDOP ?>' ); ">
                                                                        <i class="glyphicon glyphicon-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>
                                        <!- detalle repaletizaje ->
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Salida / Detalle Repaletizaje </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label id="val_dproceso" class="validacion center"><?php echo $MENSAJE3; ?> </label>
                                            <label id="val_dproceso" class="validacion center"><?php echo $MENSAJE2; ?> </label>
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <div class="table-responsive">
                                                            <table id="detalle" class="table table-hover " style="width: 100%;">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <a href="#" class="text-warning hover-warning">
                                                                                Folio Nuevo
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
                                                                        <th>Tipo Manejo</th>
                                                                        <th>Calibre</th>
                                                                        <th>Embalaje</th>
                                                                        <th>Stock</th>
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
                                                                                        <input type="hidden" class="form-control" id="FOLIOELIMINAR" name="FOLIOELIMINAR" value="<?php echo $r['FOLIO_NUEVO_DREPALETIZAJE']; ?>" />

                                                                                        <input type="hidden" class="form-control" id="IDTMANEJO" name="IDTMANEJO" value="<?php echo $r['ID_TMANEJO']; ?>" />
                                                                                        <input type="hidden" class="form-control" id="IDPRODUCTOR" name="IDPRODUCTOR" value="<?php echo $r['ID_PRODUCTOR']; ?>" />
                                                                                        <input type="hidden" class="form-control" id="IDPVESPECIES" name="IDPVESPECIES" value="<?php echo $r['ID_PVESPECIES']; ?>" />
                                                                                        <input type="hidden" class="form-control" id="IDFOLIO" name="IDFOLIO" value="<?php echo $r['ID_FOLIO']; ?>" />
                                                                                        <input type="hidden" class="form-control" id="IDESTANDAR" name="IDESTANDAR" value="<?php echo $r['ID_ESTANDAR']; ?>" />
                                                                                        <input type="hidden" class="form-control" id="REPALETIZAJE" name="REPALETIZAJE" value="<?php echo $r['ID_REPALETIZAJE']; ?>" />

                                                                                        <input type="hidden" class="form-control" id="IDDREPALETIZAJE" name="IDDREPALETIZAJE" value="<?php echo $r['ID_DREPALETIZAJE']; ?>" />
                                                                                        <input type="hidden" class="form-control" id="CAJAS" name="CAJAS" value="<?php echo $r['CANTIDAD_ENVASE_DREPALETIZAJE']; ?>" />
                                                                                        <input type="hidden" class="form-control" id="FECHAEMBALADO" name="FECHAEMBALADO" value="<?php echo $r['FECHA_EMBALADO_DREPALETIZAJE']; ?>" />



                                                                                        <button type="submit" class="btn btn-rounded btn-sm  btn-danger btn-outline " <?php if ($ESTADO == "0") {
                                                                                                                                                                            echo "disabled";
                                                                                                                                                                        } ?> id="ELIMINAR" name="ELIMINAR" <?php echo $DISABLED2; ?> title="Eliminar">
                                                                                            <i class="ti-close"></i>
                                                                                        </button>

                                                                                    </form>
                                                                                </td>
                                                                                <td><?php echo $r['FECHA_EMBALADO_DREPALETIZAJE']; ?></td>
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

                                                                                    $ARRAYVERPVESPECIESID = $PVESPECIES_ADO->verPvespecies($r['ID_PVESPECIES']);
                                                                                    $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($ARRAYVERPVESPECIESID[0]['ID_VESPECIES']);
                                                                                    echo $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                                                    ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php
                                                                                    echo $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                                                    ?>
                                                                                </td>
                                                                                <td><?php echo $r['ENVASE']; ?></td>
                                                                                <td><?php echo $r['NETO']; ?></td>
                                                                                <td>
                                                                                    <?php
                                                                                    $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
                                                                                    if ($ARRAYTMANEJO) {
                                                                                        echo $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                                                    } else {
                                                                                        echo "-";
                                                                                    }
                                                                                    ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php
                                                                                    $ARRAYCALIBRE = $CALIBRE_ADO->verCalibre($r['ID_CALIBRE']);
                                                                                    if ($ARRAYCALIBRE) {
                                                                                        echo $ARRAYCALIBRE[0]['NOMBRE_CALIBRE'];
                                                                                    } else {
                                                                                        echo "Sin Calibre";
                                                                                    }
                                                                                    ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php
                                                                                    $ARRAYEMBALAJE = $EMBALAJE_ADO->verEmbalaje($r['ID_EMBALAJE']);
                                                                                    if ($ARRAYEMBALAJE) {
                                                                                        echo $ARRAYEMBALAJE[0]['NOMBRE_EMBALAJE'];
                                                                                    } else {
                                                                                        echo "Sin Embalaje";
                                                                                    }
                                                                                    ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php
                                                                                    if ($r['STOCK']) {
                                                                                        echo $r['STOCK'];
                                                                                    } else {
                                                                                        echo "Sin Stock";
                                                                                    }
                                                                                    ?>
                                                                                </td>
                                                                            </tr>
                                                                        <?php endforeach; ?>
                                                                    <?php } ?>

                                                                </tbody>
                                                            </table>

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
                                                                                                                                                                                                                                    } ?> <?php if ($ESTADO == 0) {
                                                                                                                                                                                                                                                echo "disabled";
                                                                                                                                                                                                                                            } ?> id="AGREGAR" name="agregar" Onclick="abrirVentana('registroDrepaletizajeSeleccionCajaPT.php?EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?>  && REPALETIZAJE=<?php echo $IDOP ?>' ); ">
                                                                            <i class="glyphicon glyphicon-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>Envase Original</td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="hidden" class="form-control" placeholder="Total Neto Envase Original" id="TOTALNETOORIGNAL" name="TOTALNETOORIGNAL" value="<?php echo $TOTALNETOORIGNAL; ?>" />
                                                                        <input type="hidden" class="form-control" placeholder="Total Cantidad Envase Original" id="TOTALENVASEORIGINAL" name="TOTALENVASEORIGINAL" value="<?php echo $TOTALENVASEORIGNAL; ?>" />
                                                                        <input type="text" class="form-control" placeholder="Envase Original" id="TOTALENVASEORIGINALV" name="TOTALENVASEORIGINALV" value="<?php echo $TOTALENVASEORIGNAL2; ?>" <?php echo $DISABLED0; ?> <?php echo $DISABLEDSTYLE0; ?> />
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Envase Repaletizaje</td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="hidden" class="form-control" placeholder="Total Neto Envase Repaletizaje" id="TOTALNETOREPALETIZAJE" name="TOTALNETOREPALETIZAJE" value="<?php echo $TOTALNETOREPALETIZAJE; ?>" />
                                                                        <input type="hidden" class="form-control" placeholder="Total Cantidad Envase Repaletizaje" id="TOTALENVASEREPALETIZAJE" name="TOTALENVASEREPALETIZAJE" value="<?php echo $TOTALENVASEREPALETIZAJE; ?>" />
                                                                        <input type="text" class="form-control" placeholder="Envase Repaletizaje" id="TOTALENVASEREPALETIZAJEV" name="TOTALENVASEREPALETIZAJEV" value="<?php echo $TOTALENVASEREPALETIZAJE2; ?>" <?php echo $DISABLED0; ?> <?php echo $DISABLEDSTYLE0; ?> />
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                    <div class="form-group">
                                                        <label>Diferencia Envase </label>
                                                        <input type="hidden" class="form-control" placeholder="Diferencia Envase" id="DIFERENCIACAJAS" name="DIFERENCIACAJAS" value="<?php echo $DIFERENCIACAJAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Diferencia Envase" id="DIFERENCIACAJASV" name="DIFERENCIACAJAVS" value="<?php echo $DIFERENCIACAJAS; ?>" <?php echo $DISABLED0; ?> <?php echo $DISABLEDSTYLE0; ?> />
                                                    </div>
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
                                                        <?php if ($ESTADO == 0) { ?>
                                                            <?php if ($OP == "crear") { ?>
                                                                <button type="button" class="btn btn-rounded  btn-success btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('listarRepaletizajeProceso.php'); ">
                                                                    <i class="ti-back-left "></i> VOLVER
                                                                </button>
                                                            <?php } ?>

                                                            <?php if ($OP == "") { ?>
                                                                <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroRepaletizajeEx.php');">
                                                                    <i class="ti-trash"></i> CANCELAR
                                                                </button>
                                                            <?php } ?>
                                                        <?php } ?>

                                                        <?php if ($ESTADO != 0) { ?>
                                                            <?php if ($OP == "crear") { ?>
                                                                <button type="button" class="btn btn-rounded  btn-success btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('listarRepaletizajeProceso.php'); ">
                                                                    <i class="ti-back-left "></i> VOLVER
                                                                </button>
                                                            <?php } ?>
                                                            <?php if ($OP == "") { ?>
                                                                <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroRepaletizajeEx.php');">
                                                                    <i class="ti-trash"></i> CANCELAR
                                                                </button>
                                                            <?php } ?>
                                                        <?php } ?>

                                                        <?php if ($OP == "editar") { ?>
                                                            <button type="button" class="btn btn-rounded  btn-success btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('listarRepaletizajeProceso.php'); ">
                                                                <i class="ti-back-left "></i> VOLVER
                                                            </button>
                                                        <?php } ?>
                                                        <?php if ($OP == "ver") { ?>
                                                            <button type="button" class="btn btn-rounded  btn-success btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('listarRepaletizajeProceso.php'); ">
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
                                                            <?php if ($ESTADO == "0") {  ?>
                                                                <button type="button" class="btn btn-rounded  btn-info btn-outline mr-1" id="defecto" name="tarjas" Onclick="abrirVentana('../documento/informeRepaletizajePT.php?parametro=<?php echo $IDOP; ?>&&NOMBREUSUARIO=<?php echo $NOMBREUSUARIOS; ?>'); ">
                                                                    <i class="fa fa-file-pdf-o"></i>INFORME
                                                                </button>

                                                            <?php } ?>
                                                            <button type="button" class="btn btn-rounded  btn-info  btn-outline mr-1" id="defecto" name="tarjas" Onclick="abrirVentana('../documento/informeTarjasRepaletizajePT.php?parametro=<?php echo $IDOP; ?>'); ">
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