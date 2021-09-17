<?php

include_once "../config/validarUsuario.php";
//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/FOLIO_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/TCALIBRE_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';
include_once '../controlador/PROCESO_ADO.php';

include_once '../controlador/DPEXPORTACION_ADO.php';
include_once '../controlador/EXIEXPORTACION_ADO.php';

include_once '../modelo/EXIEXPORTACION.php';
include_once '../modelo/DPEXPORTACION.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$PROCESO_ADO =  new PROCESO_ADO();

$DPEXPORTACION_ADO =  new DPEXPORTACION_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
//INIICIALIZAR MODELO

$DPEXPORTACION =  new DPEXPORTACION();
$EXIEXPORTACION =  new EXIEXPORTACION();

//INCIALIZAR VARIBALES

$NUMEROFOLIODEXPORTACION = "";
$FOLIOMANUAL = "";
$FOLIOMANUALR = "";
$FECHAEMBALADO = "";



$NOTA = "";
$EEXPORTACION = "";
$VESPECIES = "";
$TCALIBRE = "";
$FOLIO = "";

$FOLIOBAS2 = "";
$FOLIOAUX = "";
$ULTIMOFOLIO = "";



$CANTIDADENVASE = "";
$PDESHIDRATACION = 0;
$EMBOLSADO = "";
$KILOSNETO = 0;
$KILOSBRUTO = "";
$KILOSNETO = "";
$KILOSDESHIDRATACION = "";


$EMBOLSADO = "";
$PESOENVASEESTANDAR = "";
$PESOPALLETEESTANDAR = "";
$PESOBRUTOEESTANDAR = "";
$PESONETOEESTANDAR = "";


$PRODUCTORDATOS = "";
$NOMBREVESPECIES = "";

$PRODUCTOR = "";
$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$TMANEJO = "";
$VESPECIES = "";
$ESTANDAR = "";

$FOLIOALIASESTACTICO = "";
$FOLIOALIASDIANAMICO = "";


$DISABLED = "";
$DISABLEDSTYLE = "";
$DISABLED2 = "";
$DISABLEDSTYLE2 = "";
$MENSAJE = "";
$MENSAJEELIMINAR = "";


$IDOP = "";
$IDOP2 = "";
$OP = "";


//INICIALIZAR ARREGLOS

$ARRAYVERFOLIO = "";
$ARRAYULTIMOFOLIO = "";


$ARRAYESTANDAR = "";
$ARRAYVESPECIES;
$ARRAYPRODUCTOR = "";
$ARRAYTEMANEJO = "";
$ARRAYTCALIBRE = "";
$ARRAYDPROCESOEXPORTACION = "";
$ARRAYDPROCESOEXPORTACION2 = "";
$ARRAYESTANDARDETALLE = "";
$ARRAYPROCESO = "";

$ARRAYVERFOLIOPOEXPO = "";
$ARRAYFECHAACTUAL = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

$ARRAYESTANDAR = $EEXPORTACION_ADO->listarEstandarPorEmpresaCBX($EMPRESAS);
$ARRAYTCALIBRE = $TCALIBRE_ADO->listarCalibrePorEmpresaCBX($EMPRESAS);
$ARRAYTMANEJO = $TMANEJO_ADO->listarTmanejoCBX();

$ARRAYFECHAACTUAL = $DPEXPORTACION_ADO->obtenerFecha();
$FECHAEMBALADO = $ARRAYFECHAACTUAL[0]['FECHA'];
include_once "../config/validarDatosUrlD.php";


//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['CREAR'])) {
    $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTexportacion($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
    $FOLIO = $ARRAYVERFOLIO[0]['ID_FOLIO'];
    if (isset($_REQUEST['FOLIOMANUAL'])) {
        $FOLIOMANUAL = $_REQUEST['FOLIOMANUAL'];
    }
    if ($FOLIOMANUAL == "on") {
        $NUMEROFOLIODEXPORTACION = $_REQUEST['NUMEROFOLIODEXPORTACION'];
        $FOLIOMANUALR = "1";
        $ARRAYFOLIOPOEXPO = $EXIEXPORTACION_ADO->buscarPorFolio($NUMEROFOLIODEXPORTACION);
        if ($ARRAYFOLIOPOEXPO) {
            $SINO = "1";
            $MENSAJE = "EL FOLIO INGRESADO, YA EXISTE";
        } else {
            $SINO = "0";
            $MENSAJE = "";
        }
    }
    if ($FOLIOMANUAL != "on") {
        $FOLIOMANUALR = "0";
        $SINO = "0";
        $ARRAYULTIMOFOLIO = $EXIEXPORTACION_ADO->obtenerFolio($FOLIO);
        if ($ARRAYULTIMOFOLIO) {
            if ($ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO'] == 0) {
                $FOLIOEXPORTACION = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
            } else {
                $FOLIOEXPORTACION = $ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO'];
            }
        } else {
            $FOLIOEXPORTACION = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
        }
        $NUMEROFOLIODEXPORTACION = $FOLIOEXPORTACION + 1;
        $ARRAYFOLIOPOEXPO = $EXIEXPORTACION_ADO->buscarPorFolio($NUMEROFOLIODEXPORTACION);

        while (count($ARRAYFOLIOPOEXPO) == 1) {
            $ARRAYFOLIOPOEXPO = $EXIEXPORTACION_ADO->buscarPorFolio($NUMEROFOLIODEXPORTACION);
            if (count($ARRAYFOLIOPOEXPO) == 1) {
                $NUMEROFOLIODEXPORTACION += 1;
            }
        };
    }
    $FOLIOALIASESTACTICO = $NUMEROFOLIODEXPORTACION + 1;
    $FOLIOALIASDIANAMICO = "EMPRESA:" . $_REQUEST['EMPRESA'] . "_PLANTA:" . $_REQUEST['PLANTA'] . "_TEMPORADA:" . $_REQUEST['TEMPORADA'] .
        "_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:" . $_REQUEST['IDP'] . "_FOLIO:" . $NUMEROFOLIODEXPORTACION;

    if ($SINO == "0") {

        $DPEXPORTACION->__SET('FOLIO_DPEXPORTACION', $NUMEROFOLIODEXPORTACION);
        $DPEXPORTACION->__SET('FOLIO_MANUAL', $FOLIOMANUALR);
        $DPEXPORTACION->__SET('FECHA_EMBALADO_DPEXPORTACION', $_REQUEST['FECHAEMBALADO']);
        $DPEXPORTACION->__SET('CANTIDAD_ENVASE_DPEXPORTACION', $_REQUEST['CANTIDADENVASE']);
        $DPEXPORTACION->__SET('KILOS_NETO_DPEXPORTACION', $_REQUEST['KILOSNETODRECEPCION']);
        $DPEXPORTACION->__SET('PDESHIDRATACION_DPEXPORTACION', $_REQUEST['PDESHIDRATACIONEESTANDAR']);
        $DPEXPORTACION->__SET('KILOS_DESHIDRATACION_DPEXPORTACION', $_REQUEST['KILOSDESHIDRATACION']);
        $DPEXPORTACION->__SET('KILOS_BRUTO_DPEXPORTACION', $_REQUEST['KILOSBRUTORECEPCION']);
        $DPEXPORTACION->__SET('EMBOLSADO', $_REQUEST['EMBOLSADO']);
        $DPEXPORTACION->__SET('ID_TEMBALAJE', $_REQUEST['TEMBALAJE']);
        $DPEXPORTACION->__SET('ID_TCALIBRE', $_REQUEST['TCALIBRE']);
        $DPEXPORTACION->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
        $DPEXPORTACION->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
        $DPEXPORTACION->__SET('ID_FOLIO', $FOLIO);
        $DPEXPORTACION->__SET('ID_VESPECIES',  $_REQUEST['VESPECIES']);
        $DPEXPORTACION->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
        $DPEXPORTACION->__SET('ID_PROCESO', $_REQUEST['IDP']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $DPEXPORTACION_ADO->agregarDpexportacion($DPEXPORTACION);

        $EXIEXPORTACION->__SET('FOLIO_EXIEXPORTACION', $NUMEROFOLIODEXPORTACION);
        $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $NUMEROFOLIODEXPORTACION);
        $EXIEXPORTACION->__SET('FOLIO_MANUAL', $FOLIOMANUALR);
        $EXIEXPORTACION->__SET('FECHA_EMBALADO_EXIEXPORTACION', $_REQUEST['FECHAEMBALADO']);
        $EXIEXPORTACION->__SET('CANTIDAD_ENVASE_EXIEXPORTACION', $_REQUEST['CANTIDADENVASE']);
        $EXIEXPORTACION->__SET('KILOS_NETO_EXIEXPORTACION', $_REQUEST['KILOSNETODRECEPCION']);
        $EXIEXPORTACION->__SET('PDESHIDRATACION_EXIEXPORTACION', $_REQUEST['PDESHIDRATACIONEESTANDAR']);
        $EXIEXPORTACION->__SET('KILOS_DESHIRATACION_EXIEXPORTACION', $_REQUEST['KILOSDESHIDRATACION']);
        $EXIEXPORTACION->__SET('KILOS_BRUTO_EXIEXPORTACION', $_REQUEST['KILOSBRUTORECEPCION']);
        $EXIEXPORTACION->__SET('ALIAS_DINAMICO_FOLIO_EXIESPORTACION', $FOLIOALIASDIANAMICO);
        $EXIEXPORTACION->__SET('ALIAS_ESTATICO_FOLIO_EXIESPORTACION', $FOLIOALIASESTACTICO);
        $EXIEXPORTACION->__SET('FECHA_PROCESO', $_REQUEST['FECHAPROCESO']);
        $EXIEXPORTACION->__SET('EMBOLSADO', $_REQUEST['EMBOLSADO']);
        $EXIEXPORTACION->__SET('ID_TEMBALAJE', $_REQUEST['TEMBALAJE']);
        $EXIEXPORTACION->__SET('ID_TCALIBRE', $_REQUEST['TCALIBRE']);
        $EXIEXPORTACION->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
        $EXIEXPORTACION->__SET('ID_FOLIO',  $FOLIO);
        $EXIEXPORTACION->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
        $EXIEXPORTACION->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
        $EXIEXPORTACION->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
        $EXIEXPORTACION->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $EXIEXPORTACION->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $EXIEXPORTACION->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        $EXIEXPORTACION->__SET('ID_PROCESO', $_REQUEST['IDP']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $EXIEXPORTACION_ADO->agregarExiexportacionProceso($EXIEXPORTACION);

        //REDIRECCIONAR A PAGINA registroProceso.php 
        $_SESSION["parametro"] =  $_REQUEST['IDP'];
        $_SESSION["parametro1"] =  $_REQUEST['OPP'];
        echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
    }
}
if (isset($_REQUEST['EDITAR'])) {
    $DPEXPORTACION->__SET('FECHA_EMBALADO_DPEXPORTACION', $_REQUEST['FECHAEMBALADO']);
    $DPEXPORTACION->__SET('CANTIDAD_ENVASE_DPEXPORTACION', $_REQUEST['CANTIDADENVASE']);
    $DPEXPORTACION->__SET('KILOS_NETO_DPEXPORTACION', $_REQUEST['KILOSNETODRECEPCION']);
    $DPEXPORTACION->__SET('PDESHIDRATACION_DPEXPORTACION', $_REQUEST['PDESHIDRATACIONEESTANDAR']);
    $DPEXPORTACION->__SET('KILOS_DESHIDRATACION_DPEXPORTACION', $_REQUEST['KILOSDESHIDRATACION']);
    $DPEXPORTACION->__SET('KILOS_BRUTO_DPEXPORTACION', $_REQUEST['KILOSBRUTORECEPCION']);
    $DPEXPORTACION->__SET('EMBOLSADO', $_REQUEST['EMBOLSADO']);
    $DPEXPORTACION->__SET('ID_TEMBALAJE', $_REQUEST['TEMBALAJE']);
    $DPEXPORTACION->__SET('ID_TCALIBRE', $_REQUEST['TCALIBRE']);
    $DPEXPORTACION->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
    $DPEXPORTACION->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
    $DPEXPORTACION->__SET('ID_VESPECIES',  $_REQUEST['VESPECIES']);
    $DPEXPORTACION->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
    $DPEXPORTACION->__SET('ID_PROCESO', $_REQUEST['IDP']);
    $DPEXPORTACION->__SET('ID_DPEXPORTACION', $_REQUEST['ID']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $DPEXPORTACION_ADO->actualizarDpexportacion($DPEXPORTACION);


    $ARRAYVERFOLIOEXISTENCIA = $EXIEXPORTACION_ADO->buscarPorProcesoNumeroFolio($_REQUEST['IDP'], $_REQUEST['NUMEROFOLIODEXPORTACIONE']);
    if ($ARRAYVERFOLIOEXISTENCIA) {
        $EXIEXPORTACION->__SET('FECHA_EMBALADO_EXIEXPORTACION', $_REQUEST['FECHAEMBALADO']);
        $EXIEXPORTACION->__SET('CANTIDAD_ENVASE_EXIEXPORTACION', $_REQUEST['CANTIDADENVASE']);
        $EXIEXPORTACION->__SET('KILOS_NETO_EXIEXPORTACION', $_REQUEST['KILOSNETODRECEPCION']);
        $EXIEXPORTACION->__SET('PDESHIDRATACION_EXIEXPORTACION', $_REQUEST['PDESHIDRATACIONEESTANDAR']);
        $EXIEXPORTACION->__SET('KILOS_DESHIRATACION_EXIEXPORTACION', $_REQUEST['KILOSDESHIDRATACION']);
        $EXIEXPORTACION->__SET('KILOS_BRUTO_EXIEXPORTACION', $_REQUEST['KILOSBRUTORECEPCION']);
        $EXIEXPORTACION->__SET('FECHA_PROCESO', $_REQUEST['FECHAPROCESO']);
        $EXIEXPORTACION->__SET('EMBOLSADO', $_REQUEST['EMBOLSADO']);
        $EXIEXPORTACION->__SET('ID_TEMBALAJE', $_REQUEST['TEMBALAJE']);
        $EXIEXPORTACION->__SET('ID_TCALIBRE', $_REQUEST['TCALIBRE']);
        $EXIEXPORTACION->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
        $EXIEXPORTACION->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
        $EXIEXPORTACION->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
        $EXIEXPORTACION->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
        $EXIEXPORTACION->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $EXIEXPORTACION->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $EXIEXPORTACION->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        $EXIEXPORTACION->__SET('ID_PROCESO', $_REQUEST['IDP']);
        $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $ARRAYVERFOLIOEXISTENCIA[0]["ID_EXIEXPORTACION"]);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $EXIEXPORTACION_ADO->actualizarExiexportacionProceso($EXIEXPORTACION);
    } else {

        $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTexportacion($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
        $FOLIO = $ARRAYVERFOLIO[0]['ID_FOLIO'];
        $NUMEROFOLIODEXPORTACION = $_REQUEST["NUMEROFOLIODEXPORTACIONE"];
        $FOLIOALIASESTACTICO = $NUMEROFOLIODEXPORTACION;
        $FOLIOALIASDIANAMICO = "EMPRESA:" . $_REQUEST['EMPRESA'] . "_PLANTA:" . $_REQUEST['PLANTA'] . "_TEMPORADA:" . $_REQUEST['TEMPORADA'] .
            "_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:" . $_REQUEST['IDP'] . "_FOLIO:" . $NUMEROFOLIODEXPORTACION;
        if ($_REQUEST["FOLIOMANUALE"] != "on") {
            $FOLIOMANUALR = "0";
        }
        if ($_REQUEST["FOLIOMANUALE"] == "on") {
            $FOLIOMANUALR = "1";
        }
        $EXIEXPORTACION->__SET('FOLIO_EXIEXPORTACION', $NUMEROFOLIODEXPORTACION);
        $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $NUMEROFOLIODEXPORTACION);
        $EXIEXPORTACION->__SET('FOLIO_MANUAL', $FOLIOMANUALR);
        $EXIEXPORTACION->__SET('FECHA_EMBALADO_EXIEXPORTACION', $_REQUEST['FECHAEMBALADO']);
        $EXIEXPORTACION->__SET('CANTIDAD_ENVASE_EXIEXPORTACION', $_REQUEST['CANTIDADENVASE']);
        $EXIEXPORTACION->__SET('KILOS_NETO_EXIEXPORTACION', $_REQUEST['KILOSNETODRECEPCION']);
        $EXIEXPORTACION->__SET('PDESHIDRATACION_EXIEXPORTACION', $_REQUEST['PDESHIDRATACIONEESTANDAR']);
        $EXIEXPORTACION->__SET('KILOS_DESHIRATACION_EXIEXPORTACION', $_REQUEST['KILOSDESHIDRATACION']);
        $EXIEXPORTACION->__SET('KILOS_BRUTO_EXIEXPORTACION', $_REQUEST['KILOSBRUTORECEPCION']);
        $EXIEXPORTACION->__SET('ALIAS_DINAMICO_FOLIO_EXIESPORTACION', $FOLIOALIASDIANAMICO);
        $EXIEXPORTACION->__SET('ALIAS_ESTATICO_FOLIO_EXIESPORTACION', $FOLIOALIASESTACTICO);
        $EXIEXPORTACION->__SET('FECHA_PROCESO', $_REQUEST['FECHAPROCESO']);
        $EXIEXPORTACION->__SET('EMBOLSADO', $_REQUEST['EMBOLSADO']);
        $EXIEXPORTACION->__SET('ID_TEMBALAJE', $_REQUEST['TEMBALAJE']);
        $EXIEXPORTACION->__SET('ID_TCALIBRE', $_REQUEST['TCALIBRE']);
        $EXIEXPORTACION->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
        $EXIEXPORTACION->__SET('ID_FOLIO',  $FOLIO);
        $EXIEXPORTACION->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
        $EXIEXPORTACION->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
        $EXIEXPORTACION->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
        $EXIEXPORTACION->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $EXIEXPORTACION->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $EXIEXPORTACION->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        $EXIEXPORTACION->__SET('ID_PROCESO', $_REQUEST['IDP']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $EXIEXPORTACION_ADO->agregarExiexportacionProceso($EXIEXPORTACION);
    }

    //REDIRECCIONAR A PAGINA registroProceso.php 
    $_SESSION["parametro"] =  $_REQUEST['IDP'];
    $_SESSION["parametro1"] =  $_REQUEST['OPP'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
}
if (isset($_REQUEST['ELIMINAR'])) {
    $IDELIMININAR = $_REQUEST['ID'];
    $FOLIOELIMINAR = $_REQUEST['NUMEROFOLIODEXPORTACIONE'];

    $DPEXPORTACION->__SET('ID_DPEXPORTACION', $IDELIMININAR);
    $DPEXPORTACION_ADO->deshabilitar($DPEXPORTACION);

    $EXIEXPORTACION->__SET('ID_PROCESO',  $_REQUEST['IDP']);
    $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $FOLIOELIMINAR);
    $EXIEXPORTACION_ADO->deshabilitarProceso($EXIEXPORTACION);

    $EXIEXPORTACION->__SET('ID_PROCESO',  $_REQUEST['IDP']);
    $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $FOLIOELIMINAR);
    $EXIEXPORTACION_ADO->eliminadoProceso($EXIEXPORTACION);

    //REDIRECCIONAR A PAGINA registroProceso.php 
    $_SESSION["parametro"] =  $_REQUEST['IDP'];
    $_SESSION["parametro1"] =  $_REQUEST['OPP'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
}
//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO'])) {
    $IDP = $_SESSION['parametro'];
    $OPP = $_SESSION['parametro1'];
    $URLO = $_SESSION['urlO'];

    $ARRAYPROCESO = $PROCESO_ADO->verProceso($IDP);
    foreach ($ARRAYPROCESO as $r) :

        $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
        $FECHAPROCESO = "" . $r['FECHA_PROCESO'];
        $VESPECIES = "" . $r['ID_VESPECIES'];
        $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
        $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
        if ($ARRAYVERPRODUCTOR) {
            $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": " . $ARRAYVERPRODUCTOR[0]["RUT_PRODUCTOR"] . "-" . $ARRAYVERPRODUCTOR[0]["DV_PRODUCTOR"] . ":" . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
        }
        if ($ARRAYVESPECIES) {
            $NOMBREVESPECIES = $ARRAYVESPECIES[0]["NOMBRE_VESPECIES"];
        }

    endforeach;
}
//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO']) && isset($_SESSION['dparametro']) && isset($_SESSION['dparametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['dparametro'];
    $OP = $_SESSION['dparametro1'];
    $IDP = $_SESSION['parametro'];
    $OPP = $_SESSION['parametro1'];
    $URLO = $_SESSION['urlO'];

    //IDENTIFICACIONES DE OPERACIONES
    //crear =  OBTENCION DE DATOS PARA LA CREACION DE REGISTRO
    if ($OP == "crear") {

        $DISABLED = "";
        $DISABLED2 = "";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "";
        $ARRAYDPROCESOEXPORTACION = $DPEXPORTACION_ADO->verDpexportacion($IDOP);
        foreach ($ARRAYDPROCESOEXPORTACION as $r) :


            // $NUMEROFOLIODEXPORTACION = "" . $r['FOLIO_DPEXPORTACION'];
            /*
            if ($r['FOLIO_MANUAL'] == "1") {
                $FOLIOMANUAL = "on";
            }
            if ($r['FOLIO_MANUAL'] == "0") {
                $FOLIOMANUAL = "off";
            }*/
            $FECHAEMBALADO = "" . $r['FECHA_EMBALADO_DPEXPORTACION'];
            $CANTIDADENVASE = 0;
            //$KILOSNETODRECEPCION = "" . $r['KILOS_NETO_DPEXPORTACION'];
            //$PDESHIDRATACIONEESTANDAR = "" . $r['PDESHIDRATACION_DPEXPORTACION'];
            //$KILOSDESHIDRATACION = "" . $r['KILOS_DESHIDRATACION_DPEXPORTACION'];
            //$KILOSBRUTORECEPCION = "" . $r['KILOS_BRUTO_DPEXPORTACION'];
            $EMBOLSADO = "" . $r['EMBOLSADO'];
            $TEMBALAJE = "" . $r['ID_TEMBALAJE'];
            $TCALIBRE = "" . $r['ID_TCALIBRE'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": " . $ARRAYVERPRODUCTOR[0]["RUT_PRODUCTOR"] . "-" . $ARRAYVERPRODUCTOR[0]["DV_PRODUCTOR"] . ":" . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            if ($ARRAYVESPECIES) {
                $NOMBREVESPECIES = $ARRAYVESPECIES[0]["NOMBRE_VESPECIES"];
            }


        endforeach;
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        $DISABLED = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDPROCESOEXPORTACION = $DPEXPORTACION_ADO->verDpexportacion($IDOP);
        foreach ($ARRAYDPROCESOEXPORTACION as $r) :

            $NUMEROFOLIODEXPORTACION = "" . $r['FOLIO_DPEXPORTACION'];

            if ($r['FOLIO_MANUAL'] == "1") {
                $FOLIOMANUAL = "on";
            }
            if ($r['FOLIO_MANUAL'] == "0") {
                $FOLIOMANUAL = "off";
            }
            $FECHAEMBALADO = "" . $r['FECHA_EMBALADO_DPEXPORTACION'];
            $CANTIDADENVASE = "" . $r['CANTIDAD_ENVASE_DPEXPORTACION'];
            $KILOSNETODRECEPCION = "" . $r['KILOS_NETO_DPEXPORTACION'];
            $PDESHIDRATACIONEESTANDAR = "" . $r['PDESHIDRATACION_DPEXPORTACION'];
            $KILOSDESHIDRATACION = "" . $r['KILOS_DESHIDRATACION_DPEXPORTACION'];
            $KILOSBRUTORECEPCION = "" . $r['KILOS_BRUTO_DPEXPORTACION'];
            $EMBOLSADO = "" . $r['EMBOLSADO'];
            $TEMBALAJE = "" . $r['ID_TEMBALAJE'];
            $TCALIBRE = "" . $r['ID_TCALIBRE'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": " . $ARRAYVERPRODUCTOR[0]["RUT_PRODUCTOR"] . "-" . $ARRAYVERPRODUCTOR[0]["DV_PRODUCTOR"] . ":" . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            if ($ARRAYVESPECIES) {
                $NOMBREVESPECIES = $ARRAYVESPECIES[0]["NOMBRE_VESPECIES"];
            }


        endforeach;
    }
    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDPROCESOEXPORTACION = $DPEXPORTACION_ADO->verDpexportacion($IDOP);
        foreach ($ARRAYDPROCESOEXPORTACION as $r) :
            $NUMEROFOLIODEXPORTACION = "" . $r['FOLIO_DPEXPORTACION'];

            if ($r['FOLIO_MANUAL'] == "1") {
                $FOLIOMANUAL = "on";
            }
            if ($r['FOLIO_MANUAL'] == "0") {
                $FOLIOMANUAL = "off";
            }
            $FECHAEMBALADO = "" . $r['FECHA_EMBALADO_DPEXPORTACION'];
            $CANTIDADENVASE = "" . $r['CANTIDAD_ENVASE_DPEXPORTACION'];
            $KILOSNETODRECEPCION = "" . $r['KILOS_NETO_DPEXPORTACION'];
            $PDESHIDRATACIONEESTANDAR = "" . $r['PDESHIDRATACION_DPEXPORTACION'];
            $KILOSDESHIDRATACION = "" . $r['KILOS_DESHIDRATACION_DPEXPORTACION'];
            $KILOSBRUTORECEPCION = "" . $r['KILOS_BRUTO_DPEXPORTACION'];
            $EMBOLSADO = "" . $r['EMBOLSADO'];
            $TEMBALAJE = "" . $r['ID_TEMBALAJE'];
            $TCALIBRE = "" . $r['ID_TCALIBRE'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": " . $ARRAYVERPRODUCTOR[0]["RUT_PRODUCTOR"] . "-" . $ARRAYVERPRODUCTOR[0]["DV_PRODUCTOR"] . ":" . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            if ($ARRAYVESPECIES) {
                $NOMBREVESPECIES = $ARRAYVESPECIES[0]["NOMBRE_VESPECIES"];
            }
        endforeach;
    }
    if ($OP == "eliminar") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $MENSAJEELIMINAR = "ESTA SEGURO DE ELIMINAR EL REGISTRO, PARA CONFIRMAR PRESIONE ELIMINAR";
        $ARRAYDPROCESOEXPORTACION = $DPEXPORTACION_ADO->verDpexportacion($IDOP);
        foreach ($ARRAYDPROCESOEXPORTACION as $r) :
            $NUMEROFOLIODEXPORTACION = "" . $r['FOLIO_DPEXPORTACION'];
            if ($r['FOLIO_MANUAL'] == "1") {
                $FOLIOMANUAL = "on";
            }
            if ($r['FOLIO_MANUAL'] == "0") {
                $FOLIOMANUAL = "off";
            }
            $FECHAEMBALADO = "" . $r['FECHA_EMBALADO_DPEXPORTACION'];
            $CANTIDADENVASE = "" . $r['CANTIDAD_ENVASE_DPEXPORTACION'];
            $KILOSNETODRECEPCION = "" . $r['KILOS_NETO_DPEXPORTACION'];
            $PDESHIDRATACIONEESTANDAR = "" . $r['PDESHIDRATACION_DPEXPORTACION'];
            $KILOSDESHIDRATACION = "" . $r['KILOS_DESHIDRATACION_DPEXPORTACION'];
            $KILOSBRUTORECEPCION = "" . $r['KILOS_BRUTO_DPEXPORTACION'];
            $EMBOLSADO = "" . $r['EMBOLSADO'];
            $TEMBALAJE = "" . $r['ID_TEMBALAJE'];
            $TCALIBRE = "" . $r['ID_TCALIBRE'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": " . $ARRAYVERPRODUCTOR[0]["RUT_PRODUCTOR"] . "-" . $ARRAYVERPRODUCTOR[0]["DV_PRODUCTOR"] . ":" . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            if ($ARRAYVESPECIES) {
                $NOMBREVESPECIES = $ARRAYVESPECIES[0]["NOMBRE_VESPECIES"];
            }
        endforeach;
    }
}
if ($_POST) {
    if (isset($_REQUEST['FOLIOMANUAL'])) {
        $FOLIOMANUAL = $_REQUEST['FOLIOMANUAL'];
        if (isset($_REQUEST['NUMEROFOLIODEXPORTACION'])) {
            $NUMEROFOLIODEXPORTACION = $_REQUEST['NUMEROFOLIODEXPORTACION'];
        }
    }
    if (isset($_REQUEST['FECHAEMBALADO'])) {
        $FECHAEMBALADO = $_REQUEST['FECHAEMBALADO'];
    }
    if (isset($_REQUEST['PRODUCTOR'])) {
        $PRODUCTOR = $_REQUEST['PRODUCTOR'];
    }
    if (isset($_REQUEST['VESPECIES'])) {
        $VESPECIES = $_REQUEST['VESPECIES'];
    }
    if (isset($_REQUEST['ESTANDAR'])) {
        $ESTANDAR = $_REQUEST['ESTANDAR'];
    }
    if (isset($_REQUEST['CANTIDADENVASE'])) {
        $CANTIDADENVASE = $_REQUEST['CANTIDADENVASE'];
    }
    if (isset($_REQUEST['TCALIBRE'])) {
        $TCALIBRE = $_REQUEST['TCALIBRE'];
    }
    if (isset($_REQUEST['TMANEJO'])) {
        $TMANEJO = $_REQUEST['TMANEJO'];
    }
    if (isset($_REQUEST['NOTA'])) {
        $NOTA = $_REQUEST['NOTA'];
    }
    if (isset($_REQUEST['CANTIDADENVASE']) != ""  &&  isset($_REQUEST['ESTANDAR']) != "") {
        $CANTIDADENVASE = $_REQUEST['CANTIDADENVASE'];
        if ($_REQUEST['CANTIDADENVASE'] == "") {
            $CANTIDADENVASE = 0;
        }
        $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($_REQUEST['ESTANDAR']);
        if ($ARRAYVERESTANDAR) {
            $PESONETOEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_NETO_ESTANDAR'];
            $PESOENVASEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_ENVASE_ESTANDAR'];

            $EMBOLSADO = $ARRAYVERESTANDAR[0]['EMBOLSADO'];
            $TEMBALAJE = $ARRAYVERESTANDAR[0]['ID_TEMBALAJE'];
            $PESOPALLETEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_PALLET_ESTANDAR'];
            $PDESHIDRATACIONEESTANDAR = $ARRAYVERESTANDAR[0]['PDESHIDRATACION_ESTANDAR'];
            $KILOSNETODRECEPCION = $CANTIDADENVASE * $PESONETOEESTANDAR;
            $KILOSDESHIDRATACION = $KILOSNETODRECEPCION * (1 + ($PDESHIDRATACIONEESTANDAR / 100));
            $KILOSBRUTORECEPCION = (($CANTIDADENVASE * $PESOENVASEESTANDAR) + $KILOSDESHIDRATACION) + $PESOPALLETEESTANDAR;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Detalle Producto Terminado</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                function validacion() {

                    FOLIOMANUAL = document.getElementById('FOLIOMANUAL').checked;
                    FECHAEMBALADO = document.getElementById("FECHAEMBALADO").value;
                    ESTANDAR = document.getElementById("ESTANDAR").selectedIndex;
                    CANTIDADENVASE = document.getElementById("CANTIDADENVASE").value;
                    TCALIBRE = document.getElementById("TCALIBRE").selectedIndex;
                    TMANEJO = document.getElementById("TMANEJO").selectedIndex;


                    document.getElementById('val_folio').innerHTML = "";
                    document.getElementById('val_fechaembalado').innerHTML = "";
                    document.getElementById('val_cantidadenvase').innerHTML = "";
                    document.getElementById('val_estandar').innerHTML = "";
                    document.getElementById('val_tcalibre').innerHTML = "";
                    document.getElementById('val_tmanejo').innerHTML = "";


                    if (FOLIOMANUAL == true) {
                        NUMEROFOLIODEXPORTACION = document.getElementById("NUMEROFOLIODEXPORTACION").value;
                        document.getElementById('val_folio').innerHTML = "";

                        if (NUMEROFOLIODEXPORTACION == null || NUMEROFOLIODEXPORTACION.length == 0 || /^\s+$/.test(NUMEROFOLIODEXPORTACION)) {
                            document.form_reg_dato.NUMEROFOLIODEXPORTACION.focus();
                            document.form_reg_dato.NUMEROFOLIODEXPORTACION.style.borderColor = "#FF0000";
                            document.getElementById('val_folio').innerHTML = "NO HA INGRESADO EL FOLIO";
                            return false;
                        }
                        document.form_reg_dato.NUMEROFOLIODEXPORTACION.style.borderColor = "#4AF575";


                        if (/^0/.test(NUMEROFOLIODEXPORTACION)) {
                            document.form_reg_dato.NUMEROFOLIODEXPORTACION.focus();
                            document.form_reg_dato.NUMEROFOLIODEXPORTACION.style.borderColor = "#FF0000";
                            document.getElementById('val_folio').innerHTML = "EL FOLIO NO PUEDE EMPEZAR CON 0";
                            return false;
                        }
                        document.form_reg_dato.NUMEROFOLIODEXPORTACION.style.borderColor = "#4AF575";


                        if (NUMEROFOLIODEXPORTACION.length > 10) {
                            document.form_reg_dato.NUMEROFOLIODEXPORTACION.focus();
                            document.form_reg_dato.NUMEROFOLIODEXPORTACION.style.borderColor = "#FF0000";
                            document.getElementById('val_folio').innerHTML = "EL FOLIO NO PUEDE TENER MAS DE DIES DIGITOS";
                            return false;
                        }
                        document.form_reg_dato.NUMEROFOLIODEXPORTACION.style.borderColor = "#4AF575";
                    }

                    if (FECHAEMBALADO == null || FECHAEMBALADO.length == 0 || /^\s+$/.test(FECHAEMBALADO)) {
                        document.form_reg_dato.FECHAEMBALADO.focus();
                        document.form_reg_dato.FECHAEMBALADO.style.borderColor = "#FF0000";
                        document.getElementById('val_fechaembalado').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.FECHAEMBALADO.style.borderColor = "#4AF575";

                    if (ESTANDAR == null || ESTANDAR == 0) {
                        document.form_reg_dato.ESTANDAR.focus();
                        document.form_reg_dato.ESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_estandar').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.ESTANDAR.style.borderColor = "#4AF575";

                    if (CANTIDADENVASE == null || CANTIDADENVASE.length == 0 || /^\s+$/.test(CANTIDADENVASE)) {
                        document.form_reg_dato.CANTIDADENVASE.focus();
                        document.form_reg_dato.CANTIDADENVASE.style.borderColor = "#FF0000";
                        document.getElementById('val_cantidadenvase').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.CANTIDADENVASE.style.borderColor = "#4AF575";

                    if (CANTIDADENVASE <= 0) {
                        document.form_reg_dato.CANTIDADENVASE.focus();
                        document.form_reg_dato.CANTIDADENVASE.style.borderColor = "#FF0000";
                        document.getElementById('val_cantidadenvase').innerHTML = "DEBE SER DISTINTO A CERO";
                        return false;
                    }
                    document.form_reg_dato.CANTIDADENVASE.style.borderColor = "#4AF575";

                    if (TCALIBRE == null || TCALIBRE == 0) {
                        document.form_reg_dato.TCALIBRE.focus();
                        document.form_reg_dato.TCALIBRE.style.borderColor = "#FF0000";
                        document.getElementById('val_tcalibre').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TCALIBRE.style.borderColor = "#4AF575";

                    if (TMANEJO == null || TMANEJO == 0) {
                        document.form_reg_dato.TMANEJO.focus();
                        document.form_reg_dato.TMANEJO.style.borderColor = "#FF0000";
                        document.getElementById('val_tmanejo').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TMANEJO.style.borderColor = "#4AF575";



                }
                //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
                function cerrar() {
                    window.opener.refrescar()
                    window.close();
                }

                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
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
                                <h3 class="page-title">Registro Detalle</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Packing</li>
                                            <li class="breadcrumb-item" aria-current="page">Proceso</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Operaciones Registro Detalle </a>
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
                    <section class="content">
                        <form class="form" role="form" method="post" name="form_reg_dato">
                            <div class="box">
                                <div class="box-header with-border">
                                    <!--
                                        <h4 class="box-title">Different Width</h4>
                                        -->
                                </div>
                                <div class="box-body ">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" placeholder="FOLIOMANUAL" id="FOLIOMANUALE" name="FOLIOMANUALE" value="<?php echo $FOLIOMANUAL; ?>" />
                                        <input type="checkbox" class="chk-col-danger" name="FOLIOMANUAL" id="FOLIOMANUAL" <?php echo $DISABLED2; ?> <?php echo $DISABLEDSTYLE2; ?> <?php if ($FOLIOMANUAL == "on") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                    } ?> onchange="this.form.submit()">
                                        <label for="FOLIOMANUAL"> Folio Manual</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6  ">
                                            <div class="form-group">
                                                <label>Folio</label>
                                                <input type="hidden" class="form-control" placeholder="ID DEXPORTACION" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PROCESO" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PROCESO" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PROCESO" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />

                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />

                                                <input type="hidden" id="NUMEROFOLIODEXPORTACIONE" name="NUMEROFOLIODEXPORTACIONE" value="<?php echo $NUMEROFOLIODEXPORTACION; ?>" />
                                                <input type="number" class="form-control" placeholder="Numero Folio " id="NUMEROFOLIODEXPORTACION" name="NUMEROFOLIODEXPORTACION" <?php echo $DISABLED2; ?> <?php echo $DISABLEDSTYLE2; ?> <?php if ($FOLIOMANUAL != "on") {
                                                                                                                                                                                                                                                echo "required disabled style='background-color: #eeeeee;'";
                                                                                                                                                                                                                                            } ?> value="<?php echo $NUMEROFOLIODEXPORTACION; ?>" />
                                                <label id="val_folio" class="validacion"> <?php echo $MENSAJE; ?> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Fecha Embalado </label>
                                                <input type="hidden" class="form-control" placeholder="PRODUCTOR" id="PRODUCTOR" name="PRODUCTOR" value="<?php echo $PRODUCTOR; ?>" />
                                                <input type="hidden" class="form-control" placeholder="VESPECIES" id="VESPECIES" name="VESPECIES" value="<?php echo $VESPECIES; ?>" />
                                                <input type="hidden" class="form-control" placeholder="FECHAPROCESO" id="FECHAPROCESO" name="FECHAPROCESO" value="<?php echo $FECHAPROCESO; ?>" />
                                                <input type="date" class="form-control" placeholder="Fecha Embalado " id="FECHAEMBALADO" name="FECHAEMBALADO" value="<?php echo $FECHAEMBALADO; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_fechaembalado" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Productor </label>
                                                <input type="text" class="form-control" placeholder="Productor" id="PRODUCTORV" name="PRODUCTORV" value="<?php echo $PRODUCTORDATOS; ?>" disabled style='background-color: #eeeeee;'"/>
                                                <label id=" val_productor" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Variedad</label>
                                                <input type="text" class="form-control" placeholder="Nombre Variedad" id="NOMBREVESPECIES" name="NOMBREVESPECIES" value="<?php echo $NOMBREVESPECIES; ?>" disabled style="background-color: #eeeeee;" />
                                                <label id="val_pvespecies" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Estandar </label>
                                                <select class="form-control select2" id="ESTANDAR" name="ESTANDAR" style="width: 100%;" onchange="this.form.submit()" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYESTANDAR as $r) : ?>
                                                        <?php if ($ARRAYESTANDAR) {    ?>
                                                            <option value="<?php echo $r['ID_ESTANDAR']; ?>" <?php if ($ESTANDAR == $r['ID_ESTANDAR']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_ESTANDAR'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados</option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_estandar" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Cantidad Envase </label>
                                                <input type="number" class="form-control" placeholder="Cantidad Envase" onchange="this.form.submit()" id="CANTIDADENVASE" name="CANTIDADENVASE" value="<?php echo $CANTIDADENVASE; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_cantidadenvase" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Kilo Neto</label>
                                                <input type="hidden" class="form-control" placeholder="EMBOLSADO" id="EMBOLSADO" name="EMBOLSADO" value="<?php echo $EMBOLSADO; ?>" />
                                                <input type="hidden" class="form-control" placeholder="TEMBALAJE" id="TEMBALAJE" name="TEMBALAJE" value="<?php echo $TEMBALAJE; ?>" />
                                                <input type="hidden" class="form-control" placeholder="PESOPALLETEESTANDAR" id="PESOPALLETEESTANDAR" name="PESOPALLETEESTANDAR" value="<?php echo $PESOPALLETEESTANDAR; ?>" />
                                                <input type="hidden" class="form-control" placeholder="PDESHIDRATACIONEESTANDAR" id="PDESHIDRATACIONEESTANDAR" name="PDESHIDRATACIONEESTANDAR" value="<?php echo $PDESHIDRATACIONEESTANDAR; ?>" />
                                                <input type="hidden" class="form-control" placeholder="KILOSNETODRECEPCION" id="KILOSNETODRECEPCION" name="KILOSNETODRECEPCION" value="<?php echo $KILOSNETODRECEPCION; ?>" />
                                                <input type="hidden" class="form-control" placeholder="KILOSDESHIDRATACION" id="KILOSDESHIDRATACION" name="KILOSDESHIDRATACION" value="<?php echo $KILOSDESHIDRATACION; ?>" />
                                                <input type="hidden" class="form-control" placeholder="KILOSBRUTORECEPCION" id="KILOSBRUTORECEPCION" name="KILOSBRUTORECEPCION" value="<?php echo $KILOSBRUTORECEPCION; ?>" />
                                                <input type="number" class="form-control" placeholder="Kilo Neto" step="0.01" id="KILOSNETOV" name="KILOSNETOV" value="<?php echo $KILOSNETODRECEPCION; ?>" disabled style='background-color: #eeeeee;'" />
                                                 <label id=" val_kilosneto" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Calibre</label>
                                                <select class="form-control select2" id="TCALIBRE" name="TCALIBRE" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYTCALIBRE as $r) : ?>
                                                        <?php if ($ARRAYTCALIBRE) {    ?>
                                                            <option value="<?php echo $r['ID_TCALIBRE']; ?>" <?php if ($TCALIBRE == $r['ID_TCALIBRE']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_TCALIBRE'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados</option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_tcalibre" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Tipo Manejo</label><br>
                                                <select class="form-control select2" id="TMANEJO" name="TMANEJO" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYTMANEJO as $r) : ?>
                                                        <?php if ($ARRAYTMANEJO) {    ?>
                                                            <option value="<?php echo $r['ID_TMANEJO']; ?>" <?php if ($TMANEJO == $r['ID_TMANEJO']) {
                                                                                                                echo "selected";
                                                                                                            } ?>> <?php echo $r['NOMBRE_TMANEJO'];  ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados</option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_tmanejo" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label id=" val_mensaje" class="validacion"><?php echo $MENSAJEELIMINAR; ?> </label>
                                    <!-- /.row -->
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="btn-group btn-rounded btn-block col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                        <button type="button" class="btn btn-rounded btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op');">
                                            <i class="ti-back-left "></i>
                                        </button>
                                        <?php if ($OP == "") { ?>
                                            <button type="submit" class="btn btn-rounded btn-primary " data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                <i class="ti-save-alt"></i>
                                            </button>
                                        <?php } ?>
                                        <?php if ($OP != "") { ?>
                                            <?php if ($OP == "crear") { ?>
                                                <button type="submit" class="btn btn-rounded btn-primary " data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i>
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP == "editar") { ?>
                                                <button type="submit" class="btn btn-rounded btn-warning   " data-toggle="tooltip" title="Editar" name="EDITAR" value="EDITAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i>
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP == "eliminar") { ?>
                                                <button type="submit" class="btn btn-rounded btn-danger " data-toggle="tooltip" title="Eliminar" name="ELIMINAR" value="ELIMINAR">
                                                    <i class="ti-trash"></i>
                                                </button>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--.row -->
                    </section>
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