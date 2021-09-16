<?php
include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/PROCESO_ADO.php';
include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/FOLIO_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';
include_once '../controlador/TCALIBRE_ADO.php';
include_once '../controlador/TEMBALAJE_ADO.php';


include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/REPALETIZAJEEX_ADO.php';
include_once '../controlador/DREPALETIZAJEEX_ADO.php';

include_once '../modelo/REPALETIZAJEEX.php';
include_once '../modelo/EXIEXPORTACION.php';
include_once '../modelo/DREPALETIZAJEEX.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR



$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();

$DREPALETIZAJEEX_ADO =  new DREPALETIZAJEEX_ADO();
$REPALETIZAJEEX_ADO =  new REPALETIZAJEEX_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();

//INIICIALIZAR MODELO
$EXIEXPORTACION =  new EXIEXPORTACION();
$REPALETIZAJEEX =  new REPALETIZAJEEX();
$DREPALETIZAJEEX =  new DREPALETIZAJEEX();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD


$IDCAJAS = "";
$CAJAS = "";
$FOLIOCAJAS = "";

$FOLIOEXPORTACION = "";
$NUMEROFOLIODEXPORTACION = "";
$ULTIMOFOLIO = "";
$KILOSNETOSREPALETIZAJE = "";
$FOLIO = "";
$FOLIOMANUAL = "";
$FOLIOMANUALR = "";
$NUMEROFOLIODEXPORTACION = "";
$STOCK = "";
$ENVASERESTANTE = 0;
$IDEXIEXPORTACION = "";
$CAJATOTAL = "";
$CAJATOTAL2 = 0;
$FOLIOALIAS = "";

$KILONETOEXITENCIA = "";
$PDESHISDRATACIONEXISTENCIA = "";
$KILOSDESHIDRATACIONEXITENCIA = "";
$KILOSBRUTOEXISTENCIA = "";
$EMBOLSADOEXISTENCIA = "";

$CONTADOR = 0;

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$TMANEJO = "";

$IDOP = "";
$OP = "";
$NODATOURL = "";
$DISABLED = "";
$DISABLED3 = "";
$DISABLEDSTYLE3 = "";

$SINO0 = "";
$SINO = "";
$SINO2 = "";
$MENSAJE0 = "";
$MENSAJE = "";
$MENSAJE1 = "";
$MENSAJE2 = "";
$MENSAJE3 = "";


//INICIALIZAR ARREGLOS

$ARRAYESTANDAR = "";
$ARRAYVERPRODUCTORID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYEVERERECEPCIONID;

$ARRAYEXISTENCIA = "";
$ARRAYDREPALETIZAJETOTALESPOREXISTENCIA = "";
$ARRAYEXISTENCIATOTALESPORREPALETIZAJE = "";
$ARRAYVERDRECEPCION = "";

$ARRAYVERFOLIO = "";
$ARRAYULTIMOFOLIO = "";

$ARRAYEXIEXPORTACIONBOLSA = "";
$ARRAYDREPALETIZAJEBOLSA = "";

$ARRAYDREPALETIZAJEBOLSA2 = "";

$ARRAYSELECIONARCAJASID = "";
$ARRAYSELECIONARCAJAS = "";
$ARRAYSELECIONARIDFOLIO = "";
$ARRAYSELECIONARIDEXIEXPORTACION = "";




$ARRAYSELECIONAREXISTENCIA = "";
$ARRAYSELECIONAREXISTENCIAID = "";


//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['AGREGAR'])) {

    $REPALETIZAJE = $_REQUEST['IDP'];
    $ARRAYSELECIONARCAJASID = $_REQUEST['IDCAJA'];
    $ARRAYSELECIONARIDFOLIO = $_REQUEST['IDFOLIO'];
    $ARRAYSELECIONARCAJAS = $_REQUEST['CAJAS'];
    $ARRAYSELECIONARIDEXIEXPORTACION = $_REQUEST['IDEXIEXPORTACION'];



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
            $SINO0 = "1";
            $MENSAJE0 = "EL FOLIO INGRESADO, YA EXISTE";
        } else {
            $SINO0 = "0";
            $MENSAJE0 = "";
        }
    }
    if ($FOLIOMANUAL != "on") {
        $FOLIOMANUALR = "0";
        $SINO0 = "0";
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
        $ARRAYFOLIOPOEXPO = $EXIEXPORTACION_ADO->buscarPorFolioRepaletizaje($NUMEROFOLIODEXPORTACION);
        while (count($ARRAYFOLIOPOEXPO) == 1) {
            $ARRAYFOLIOPOEXPO = $EXIEXPORTACION_ADO->buscarPorFolioRepaletizaje($NUMEROFOLIODEXPORTACION);
            if (count($ARRAYFOLIOPOEXPO) == 1) {
                $NUMEROFOLIODEXPORTACION += 1;
            }
        };
    }
    if ($SINO0 == "0") {

        foreach ($ARRAYSELECIONARCAJASID as $F) :
            $IDCAJAS = $F - 1;
            $CAJAS = $ARRAYSELECIONARCAJAS[$IDCAJAS];
            $NUMEROFOLIO = $ARRAYSELECIONARIDFOLIO[$IDCAJAS];
            $IDEXIEXPORTACION = $ARRAYSELECIONARIDEXIEXPORTACION[$IDCAJAS];

            $ARRAYDREPALETIZAJEBOLSA = $DREPALETIZAJEEX_ADO->obtenerTotalesDrepaletizajePorExistencia2($IDEXIEXPORTACION);
            $ARRAYEXIEXPORTACIONBOLSASELECCION = $EXIEXPORTACION_ADO->verExiexportacion($IDEXIEXPORTACION);

            if ($ARRAYDREPALETIZAJEBOLSA) {
                $CAJATOTAL =   $ARRAYEXIEXPORTACIONBOLSASELECCION[0]['CANTIDAD_ENVASE_EXIEXPORTACION'] - $ARRAYDREPALETIZAJEBOLSA[0]['ENVASE'];
            } else {
                $CAJATOTAL =  $ARRAYEXIEXPORTACIONBOLSASELECCION[0]['CANTIDAD_ENVASE_EXIEXPORTACION'];
            }

            if ($CAJAS != "") {
                $SINO = "0";
                //$MENSAJE1 = $MENSAJE1;
                if ($CAJATOTAL == 0) {
                    $SINO = "1";
                    $MENSAJE2 = $MENSAJE2 . " <br> " . $NUMEROFOLIO . ": DEBE SELECIONAR UN REGISTRO QUE TENGA ENVASES MAYORES A CERO";
                } else {
                    if ($CAJAS <= 0) {
                        $SINO = "1";
                        $MENSAJE1 = $MENSAJE1 . " <br> " . $NUMEROFOLIO . ": SOLO DEBEN INGRESAR UN VALOR MAYOR A ZERO";
                    } else {
                        $SINO = "0";
                        $MENSAJE1 = $MENSAJE1;
                        if ($CAJAS <= $ARRAYEXIEXPORTACIONBOLSASELECCION[0]['CANTIDAD_ENVASE_EXIEXPORTACION']) {
                            $SINO = "0";
                            $MENSAJE2 = $MENSAJE2;
                        } else {
                            $SINO = "1";
                            $MENSAJE2 = $MENSAJE2 . " <br> " . $NUMEROFOLIO . ": EL VALOR A INGRESAR DEBE SER MENOR O IGUAL AL ORIGINAL";
                        }
                    }
                }
            } else {
                $SINO = "1";
            }


            if ($SINO == "0") {

                $ARRAYESTANDAR = $EEXPORTACION_ADO->verEstandar($ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_ESTANDAR"]);
                $KILONETOEXITENCIA = $CAJAS * $ARRAYESTANDAR[0]['PESO_NETO_ESTANDAR'];
                $PDESHISDRATACIONEXISTENCIA = $ARRAYESTANDAR[0]['PDESHIDRATACION_ESTANDAR'];
                $KILOSDESHIDRATACIONEXITENCIA = $KILONETOEXITENCIA * (1 + ($PDESHISDRATACIONEXISTENCIA / 100));
                $KILOSBRUTOEXISTENCIA = (($CAJAS * $ARRAYESTANDAR[0]['PESO_ENVASE_ESTANDAR']) + $KILOSDESHIDRATACIONEXITENCIA) + $ARRAYESTANDAR[0]['PESO_PALLET_ESTANDAR'];
                $EMBOLSADOEXISTENCIA = $ARRAYESTANDAR[0]['EMBOLSADO'];

                $DREPALETIZAJEEX->__SET('FOLIO_NUEVO_DREPALETIZAJE', $NUMEROFOLIODEXPORTACION);
                $DREPALETIZAJEEX->__SET('FOLIO_MANUAL', $FOLIOMANUALR);
                $DREPALETIZAJEEX->__SET('FECHA_EMBALADO_DREPALETIZAJE', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["FECHA_EMBALADO_EXIEXPORTACION"]);
                $DREPALETIZAJEEX->__SET('CANTIDAD_ENVASE_DREPALETIZAJE', $CAJAS);
                $DREPALETIZAJEEX->__SET('KILOS_NETO_DREPALETIZAJE', $KILONETOEXITENCIA);
                $DREPALETIZAJEEX->__SET('KILOS_BRUTO_DREPALETIZAJE', $KILOSBRUTOEXISTENCIA);
                $DREPALETIZAJEEX->__SET('EMBOLSADO', $EMBOLSADOEXISTENCIA);
                $DREPALETIZAJEEX->__SET('STOCK', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["STOCK"]);
                $DREPALETIZAJEEX->__SET('ID_TMANEJO', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_TMANEJO"]);
                $DREPALETIZAJEEX->__SET('ID_TCALIBRE', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_TCALIBRE"]);
                $DREPALETIZAJEEX->__SET('ID_TEMBALAJE', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_TEMBALAJE"]);
                $DREPALETIZAJEEX->__SET('ID_FOLIO', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_FOLIO"]);
                $DREPALETIZAJEEX->__SET('ID_ESTANDAR', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_ESTANDAR"]);
                $DREPALETIZAJEEX->__SET('ID_PRODUCTOR', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_PRODUCTOR"]);
                $DREPALETIZAJEEX->__SET('ID_VESPECIES', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_VESPECIES"]);
                $DREPALETIZAJEEX->__SET('ID_EXIEXPORTACION', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_EXIEXPORTACION"]);
                $DREPALETIZAJEEX->__SET('ID_REPALETIZAJE', $REPALETIZAJE);
                $DREPALETIZAJEEX_ADO->agregarDrepaletizaje($DREPALETIZAJEEX);

                $EXIEXPORTACION->__SET('FOLIO_EXIEXPORTACION', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["FOLIO_EXIEXPORTACION"]);
                $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $NUMEROFOLIODEXPORTACION);
                $EXIEXPORTACION->__SET('FOLIO_MANUAL', $FOLIOMANUALR);
                $EXIEXPORTACION->__SET('FECHA_EMBALADO_EXIEXPORTACION', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["FECHA_EMBALADO_EXIEXPORTACION"]);
                $EXIEXPORTACION->__SET('CANTIDAD_ENVASE_EXIEXPORTACION', $CAJAS);
                $EXIEXPORTACION->__SET('KILOS_NETO_EXIEXPORTACION', $KILONETOEXITENCIA);
                $EXIEXPORTACION->__SET('KILOS_BRUTO_EXIEXPORTACION', $KILOSBRUTOEXISTENCIA);
                $EXIEXPORTACION->__SET('PDESHIDRATACION_EXIEXPORTACION', $PDESHISDRATACIONEXISTENCIA);
                $EXIEXPORTACION->__SET('KILOS_DESHIRATACION_EXIEXPORTACION', $KILOSDESHIDRATACIONEXITENCIA);
                $EXIEXPORTACION->__SET('OBSERVACION_EXIESPORTACION', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["OBSERVACION_EXIESPORTACION"]);
                $EXIEXPORTACION->__SET('ALIAS_DINAMICO_FOLIO_EXIESPORTACION', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ALIAS_DINAMICO_FOLIO_EXIESPORTACION"]);
                $EXIEXPORTACION->__SET('ALIAS_ESTATICO_FOLIO_EXIESPORTACION', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ALIAS_ESTATICO_FOLIO_EXIESPORTACION"]);
                $EXIEXPORTACION->__SET('STOCK', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["STOCK"]);
                $EXIEXPORTACION->__SET('EMBOLSADO', $EMBOLSADOEXISTENCIA);
                $EXIEXPORTACION->__SET('GASIFICADO', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["GASIFICADO"]);
                $EXIEXPORTACION->__SET('PREFRIO', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["PREFRIO"]);
                $EXIEXPORTACION->__SET('TESTADOSAG', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["TESTADOSAG"]);
                $EXIEXPORTACION->__SET('VGM', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["VGM"]);
                $EXIEXPORTACION->__SET('FECHA_RECEPCION', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["FECHA_RECEPCION"]);
                $EXIEXPORTACION->__SET('FECHA_PROCESO', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["FECHA_PROCESO"]);
                $EXIEXPORTACION->__SET('FECHA_REEMBALAJE', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["FECHA_REEMBALAJE"]);
                $EXIEXPORTACION->__SET('FECHA_REPALETIZAJE', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["FECHA_REPALETIZAJE"]);
                $EXIEXPORTACION->__SET('INGRESO', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["INGRESO"]);
                $EXIEXPORTACION->__SET('ID_TCALIBRE', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_TCALIBRE"]);
                $EXIEXPORTACION->__SET('ID_TEMBALAJE', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_TEMBALAJE"]);
                $EXIEXPORTACION->__SET('ID_TMANEJO', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_TMANEJO"]);
                $EXIEXPORTACION->__SET('ID_FOLIO', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_FOLIO"]);
                $EXIEXPORTACION->__SET('ID_ESTANDAR', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_ESTANDAR"]);
                $EXIEXPORTACION->__SET('ID_PRODUCTOR', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_PRODUCTOR"]);
                $EXIEXPORTACION->__SET('ID_VESPECIES', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_VESPECIES"]);
                $EXIEXPORTACION->__SET('ID_PLANTA2', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_PLANTA2"]);
                $EXIEXPORTACION->__SET('ID_RECEPCION', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_RECEPCION"]);
                $EXIEXPORTACION->__SET('ID_PROCESO', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_PROCESO"]);
                $EXIEXPORTACION->__SET('ID_REEMBALAJE', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_REEMBALAJE"]);
                $EXIEXPORTACION->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $EXIEXPORTACION->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                $EXIEXPORTACION->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                $EXIEXPORTACION->__SET('ID_REPALETIZAJE', $REPALETIZAJE);
                $EXIEXPORTACION_ADO->agregarExiexportacionRepaletizaje($EXIEXPORTACION);
            }

        endforeach;
    }
    if ($SINO == "0") {

        $_SESSION["parametro"] =  $_REQUEST['IDP'];
        $_SESSION["parametro1"] =  $_REQUEST['OPP'];
        echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
    }
}
if (isset($_REQUEST['MANTENER'])) {


    if (isset($_REQUEST['SELECIONAREXISTENCIA'])) {
        $REPALETIZAJE = $_REQUEST['IDP'];
        $ARRAYSELECIONAREXISTENCIA = $_REQUEST['SELECIONAREXISTENCIA'];
        $SINO = "0";
        $MENSAJE = "";
    } else {
        $SINO = "1";
        $MENSAJE = "DEBE  SELECIONAR UN REGISTRO";
    }
    if ($SINO == "0") {

        foreach ($ARRAYSELECIONAREXISTENCIA as $r) :
            $IDEXIEXPORTACION = $r;
            $ARRAYDREPALETIZAJEBOLSA = $DREPALETIZAJEEX_ADO->obtenerTotalesDrepaletizajePorExistencia2($IDEXIEXPORTACION);
            $ARRAYEXIEXPORTACIONBOLSASELECCION = $EXIEXPORTACION_ADO->verExiexportacion($IDEXIEXPORTACION);

            if ($ARRAYDREPALETIZAJEBOLSA) {
                $NUMEROFOLIO = $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["FOLIO_AUXILIAR_EXIEXPORTACION"];
                $CAJATOTAL =   $ARRAYEXIEXPORTACIONBOLSASELECCION[0]['CANTIDAD_ENVASE_EXIEXPORTACION'] - $ARRAYDREPALETIZAJEBOLSA[0]['ENVASE'];
            } else {
                $CAJATOTAL =  $ARRAYEXIEXPORTACIONBOLSASELECCION[0]['CANTIDAD_ENVASE_EXIEXPORTACION'];
            }
            if ($CAJATOTAL == 0) {
                $SINO = "1";
                $MENSAJE2 = $MENSAJE2 . " <br> " . $NUMEROFOLIO . ": DEBE SELECIONAR UN REGISTRO QUE TENGA ENVASES MAYORES A CERO";
            }
            if ($SINO == "0") {

                $ARRAYESTANDAR = $EEXPORTACION_ADO->verEstandar($ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_ESTANDAR"]);
                $KILONETOEXITENCIA = $CAJATOTAL * $ARRAYESTANDAR[0]['PESO_NETO_ESTANDAR'];
                $PDESHISDRATACIONEXISTENCIA = $ARRAYESTANDAR[0]['PDESHIDRATACION_ESTANDAR'];
                $KILOSDESHIDRATACIONEXITENCIA = $KILONETOEXITENCIA * (1 + ($PDESHISDRATACIONEXISTENCIA / 100));
                $KILOSBRUTOEXISTENCIA = (($CAJATOTAL * $ARRAYESTANDAR[0]['PESO_ENVASE_ESTANDAR']) + $KILOSDESHIDRATACIONEXITENCIA) + $ARRAYESTANDAR[0]['PESO_PALLET_ESTANDAR'];
                $EMBOLSADOEXISTENCIA = $ARRAYESTANDAR[0]['EMBOLSADO'];

                $DREPALETIZAJEEX->__SET('FOLIO_NUEVO_DREPALETIZAJE', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["FOLIO_AUXILIAR_EXIEXPORTACION"]);
                $DREPALETIZAJEEX->__SET('FOLIO_MANUAL', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["FOLIO_MANUAL"]);
                $DREPALETIZAJEEX->__SET('FECHA_EMBALADO_DREPALETIZAJE', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["FECHA_EMBALADO_EXIEXPORTACION"]);
                $DREPALETIZAJEEX->__SET('CANTIDAD_ENVASE_DREPALETIZAJE', $CAJATOTAL);
                $DREPALETIZAJEEX->__SET('KILOS_NETO_DREPALETIZAJE', $KILONETOEXITENCIA);
                $DREPALETIZAJEEX->__SET('KILOS_BRUTO_DREPALETIZAJE', $KILOSBRUTOEXISTENCIA);
                $DREPALETIZAJEEX->__SET('EMBOLSADO', $EMBOLSADOEXISTENCIA);
                $DREPALETIZAJEEX->__SET('STOCK', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["STOCK"]);
                $DREPALETIZAJEEX->__SET('ID_TMANEJO', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_TMANEJO"]);
                $DREPALETIZAJEEX->__SET('ID_TCALIBRE', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_TCALIBRE"]);
                $DREPALETIZAJEEX->__SET('ID_TEMBALAJE', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_TEMBALAJE"]);
                $DREPALETIZAJEEX->__SET('ID_FOLIO', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_FOLIO"]);
                $DREPALETIZAJEEX->__SET('ID_ESTANDAR', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_ESTANDAR"]);
                $DREPALETIZAJEEX->__SET('ID_PRODUCTOR', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_PRODUCTOR"]);
                $DREPALETIZAJEEX->__SET('ID_VESPECIES', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_VESPECIES"]);
                $DREPALETIZAJEEX->__SET('ID_EXIEXPORTACION', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_EXIEXPORTACION"]);
                $DREPALETIZAJEEX->__SET('ID_REPALETIZAJE', $REPALETIZAJE);
                $DREPALETIZAJEEX_ADO->agregarDrepaletizaje($DREPALETIZAJEEX);

                $EXIEXPORTACION->__SET('FOLIO_EXIEXPORTACION', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["FOLIO_EXIEXPORTACION"]);
                $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["FOLIO_AUXILIAR_EXIEXPORTACION"]);
                $EXIEXPORTACION->__SET('FOLIO_MANUAL', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["FOLIO_MANUAL"]);
                $EXIEXPORTACION->__SET('FECHA_EMBALADO_EXIEXPORTACION', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["FECHA_EMBALADO_EXIEXPORTACION"]);
                $EXIEXPORTACION->__SET('CANTIDAD_ENVASE_EXIEXPORTACION', $CAJATOTAL);
                $EXIEXPORTACION->__SET('KILOS_NETO_EXIEXPORTACION', $KILONETOEXITENCIA);
                $EXIEXPORTACION->__SET('KILOS_BRUTO_EXIEXPORTACION', $KILOSBRUTOEXISTENCIA);
                $EXIEXPORTACION->__SET('PDESHIDRATACION_EXIEXPORTACION', $PDESHISDRATACIONEXISTENCIA);
                $EXIEXPORTACION->__SET('KILOS_DESHIRATACION_EXIEXPORTACION', $KILOSDESHIDRATACIONEXITENCIA);
                $EXIEXPORTACION->__SET('OBSERVACION_EXIESPORTACION', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["OBSERVACION_EXIESPORTACION"]);
                $EXIEXPORTACION->__SET('ALIAS_DINAMICO_FOLIO_EXIESPORTACION', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ALIAS_DINAMICO_FOLIO_EXIESPORTACION"]);
                $EXIEXPORTACION->__SET('ALIAS_ESTATICO_FOLIO_EXIESPORTACION', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ALIAS_ESTATICO_FOLIO_EXIESPORTACION"]);
                $EXIEXPORTACION->__SET('STOCK', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["STOCK"]);
                $EXIEXPORTACION->__SET('EMBOLSADO', $EMBOLSADOEXISTENCIA);
                $EXIEXPORTACION->__SET('GASIFICADO', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["GASIFICADO"]);
                $EXIEXPORTACION->__SET('PREFRIO', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["PREFRIO"]);
                $EXIEXPORTACION->__SET('TESTADOSAG', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["TESTADOSAG"]);
                $EXIEXPORTACION->__SET('VGM', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["VGM"]);
                $EXIEXPORTACION->__SET('FECHA_RECEPCION', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["FECHA_RECEPCION"]);
                $EXIEXPORTACION->__SET('FECHA_PROCESO', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["FECHA_PROCESO"]);
                $EXIEXPORTACION->__SET('FECHA_REEMBALAJE', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["FECHA_REEMBALAJE"]);
                $EXIEXPORTACION->__SET('FECHA_REPALETIZAJE', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["FECHA_REPALETIZAJE"]);
                $EXIEXPORTACION->__SET('INGRESO', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["INGRESO"]);
                $EXIEXPORTACION->__SET('ID_TCALIBRE', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_TCALIBRE"]);
                $EXIEXPORTACION->__SET('ID_TEMBALAJE', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_TEMBALAJE"]);
                $EXIEXPORTACION->__SET('ID_TMANEJO', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_TMANEJO"]);
                $EXIEXPORTACION->__SET('ID_FOLIO', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_FOLIO"]);
                $EXIEXPORTACION->__SET('ID_ESTANDAR', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_ESTANDAR"]);
                $EXIEXPORTACION->__SET('ID_PRODUCTOR', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_PRODUCTOR"]);
                $EXIEXPORTACION->__SET('ID_VESPECIES', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_VESPECIES"]);
                $EXIEXPORTACION->__SET('ID_PLANTA2', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_PLANTA2"]);
                $EXIEXPORTACION->__SET('ID_RECEPCION', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_RECEPCION"]);
                $EXIEXPORTACION->__SET('ID_PROCESO', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_PROCESO"]);
                $EXIEXPORTACION->__SET('ID_REEMBALAJE', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_REEMBALAJE"]);
                $EXIEXPORTACION->__SET('ID_DESPACHO2', $ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_DESPACHO2"]);
                $EXIEXPORTACION->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $EXIEXPORTACION->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                $EXIEXPORTACION->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                $EXIEXPORTACION->__SET('ID_REPALETIZAJE', $REPALETIZAJE);
                $EXIEXPORTACION_ADO->agregarExiexportacionRepaletizaje($EXIEXPORTACION);
            }
        endforeach;
    }
    if ($SINO == "0") {
        $_SESSION["parametro"] =  $_REQUEST['IDP'];
        $_SESSION["parametro1"] =  $_REQUEST['OPP'];
        echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
    }
}
//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO'])) {
    $IDP = $_SESSION['parametro'];
    $OPP = $_SESSION['parametro1'];
    $URLO = $_SESSION['urlO'];
    if (isset($_REQUEST['FOLIOMANUAL'])) {
        $FOLIOMANUAL = $_REQUEST['FOLIOMANUAL'];
        if (isset($_REQUEST['NUMEROFOLIODEXPORTACION'])) {
            $NUMEROFOLIODEXPORTACION = $_REQUEST['NUMEROFOLIODEXPORTACION'];
        }
    }
    $ARRAYEXIEXPORTACIONBOLSA = $EXIEXPORTACION_ADO->buscarPorRepaletizaje2($IDP);
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Detalle Repaletizaje</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
                function validacion() {

                    FOLIOMANUAL = document.getElementById('FOLIOMANUAL').checked;
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
                }

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
                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }

                function cerrar() {
                    window.opener.refrescar()
                    window.close();
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" onload="mueveReloj()">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../config/menu.php"; ?>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title"> Agregar Detalle </h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Frigorifico</li>
                                            <li class="breadcrumb-item" aria-current="page">Repaletizaje</li>
                                            <li class="breadcrumb-item" aria-current="page">Producto Terminado</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Operaciones Agregar Detalle</a>
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
                        <div class="box">
                            <div class="box-header with-border">
                                <!--
                                        <h4 class="box-title">Different Width</h4>
                                        -->
                            </div>

                            <form class="form" role="form" method="post" name="form_reg_dato" onsubmit="return validacion()">
                                <div class="box-body ">
                                    <div class="row">

                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="ID REPALETIZAJE" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP REPALETIZAJE" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL REPALETIZAJE" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                                <label>Folio</label>
                                                <input type="number" class="form-control" placeholder="Numero Folio " id="NUMEROFOLIODEXPORTACION" name="NUMEROFOLIODEXPORTACION" <?php echo $DISABLED3; ?> <?php echo $DISABLEDSTYLE3; ?> <?php if ($FOLIOMANUAL != "on") {
                                                                                                                                                                                                                                                echo "disabled style='background-color: #eeeeee;'";
                                                                                                                                                                                                                                            } ?> value="<?php echo $NUMEROFOLIODEXPORTACION; ?>" />
                                                <label id="val_folio" class="validacion"> <?php echo $MENSAJE0; ?> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <br>
                                                <input type="checkbox" class="chk-col-danger" name="FOLIOMANUAL" id="FOLIOMANUAL" <?php echo $DISABLED3; ?> <?php echo $DISABLEDSTYLE3; ?> <?php if ($FOLIOMANUAL == "on") {
                                                                                                                                                                                                echo "checked";
                                                                                                                                                                                            } ?> onchange="this.form.submit()">
                                                <label for="FOLIOMANUAL"> Folio Manual</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="table-responsive">
                                                <table id="selecionExistencia" class="table table-hover " style="width: 100%;">
                                                    <thead>
                                                        <tr class="text-left">

                                                            <th>Folio </th>
                                                            <th>Condición </th>
                                                            <th>Selección</th>
                                                            <th>Seleccion Cajas</th>
                                                            <th>Fecha Embalado </th>
                                                            <th>Código Estandar </th>
                                                            <th>Envase/Estandar </th>
                                                            <th>CSG</th>
                                                            <th>Productor</th>
                                                            <th>Variedad</th>
                                                            <th>Cantidad Envase </th>
                                                            <th>Kilo Neto </th>
                                                            <th>Tipo Manejo</th>
                                                            <th>Tipo Calibre</th>
                                                            <th>Tipo Embalaje</th>
                                                            <th>Stock</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if ($ARRAYEXIEXPORTACIONBOLSA) { ?>
                                                            <?php foreach ($ARRAYEXIEXPORTACIONBOLSA as $r) :  ?>
                                                                <?php
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
                                                                $ARRAYEVERERECEPCIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                                if ($ARRAYEVERERECEPCIONID) {
                                                                    $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
                                                                    $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                                } else {
                                                                    $CODIGOESTANDAR = "Sin Datos";
                                                                    $NOMBREESTANDAR = "Sin Datos";
                                                                }
                                                                $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
                                                                if ($ARRAYVERVESPECIESID) {
                                                                    $NOMBREVESPECIES = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                                } else {
                                                                    $NOMBREVESPECIES = "Sin Datos";
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
                                                                $ARRAYDREPALETIZAJEBOLSA2 = $DREPALETIZAJEEX_ADO->obtenerTotalesDrepaletizajePorExistencia2($r['ID_EXIEXPORTACION']);
                                                                if ($ARRAYDREPALETIZAJEBOLSA2) {
                                                                    $ENVASERESTANTE =  $r['CANTIDAD_ENVASE_EXIEXPORTACION'] - $ARRAYDREPALETIZAJEBOLSA2[0]['ENVASE'];
                                                                } else {
                                                                    $ENVASERESTANTE = $r['CANTIDAD_ENVASE_EXIEXPORTACION'];
                                                                }
                                                                ?>
                                                                <?php if ($ENVASERESTANTE > 0) { ?>
                                                                    <?php $CONTADOR = $CONTADOR + 1; ?>
                                                                    <tr class="text-left">
                                                                        <td><?php echo $r['FOLIO_AUXILIAR_EXIEXPORTACION']; ?> </td>
                                                                        <td><?php echo $ESTADOSAG; ?></td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="checkbox" class="form-control" name="SELECIONAREXISTENCIA[]" id="SELECIONAREXISTENCIA<?php echo $r['ID_EXIEXPORTACION']; ?>" value="<?php echo $r['ID_EXIEXPORTACION']; ?>">
                                                                                <label for="SELECIONAREXISTENCIA<?php echo $r['ID_EXIEXPORTACION']; ?>"> Seleccionar</label>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="hidden" class="form-control" name="IDCAJA[]" value="<?php echo  $CONTADOR; ?>">
                                                                                <input type="hidden" class="form-control" name="IDFOLIO[]" value="<?php echo  $r['FOLIO_AUXILIAR_EXIEXPORTACION']; ?>">
                                                                                <input type="hidden" class="form-control" name="IDEXIEXPORTACION[]" value="<?php echo $r['ID_EXIEXPORTACION']; ?>">
                                                                                <input type="number" class="form-control" name="CAJAS[]">
                                                                            </div>
                                                                        </td>
                                                                        <td><?php echo $r['EMBALADO']; ?></td>
                                                                        <td><?php echo $CODIGOESTANDAR; ?></td>
                                                                        <td><?php echo $NOMBREESTANDAR; ?></td>
                                                                        <td><?php echo $CSGPRODUCTOR; ?></td>
                                                                        <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                                        <td><?php echo $NOMBREVESPECIES; ?></td>
                                                                        <td><?php echo $ENVASERESTANTE; ?></td>
                                                                        <td><?php echo $r['NETO']; ?></td>
                                                                        <td><?php echo $NOMBRETMANEJO; ?></td>
                                                                        <td><?php echo $NOMBRETCALIBRE; ?></td>
                                                                        <td><?php echo $NOMBRETEMBALAJE; ?></td>
                                                                        <td><?php echo $r['STOCKR']; ?></td>
                                                                    </tr>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        <?php } ?>

                                                    </tbody>
                                                </table>
                                                <label id="val_dproceso" class="validacion center"><?php echo $MENSAJE; ?> </label>
                                                <label id="val_dproceso" class="validacion center"><?php echo $MENSAJE1; ?> </label>
                                                <label id="val_dproceso" class="validacion center"><?php echo $MENSAJE2; ?> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->

                                    <div class="box-footer">
                                        <div class="btn-group btn-rounded btn-block col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <button type="button" class="btn btn-rounded btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op');">
                                                <i class="ti-back-left "></i>
                                            </button>

                                            <button type="submit" class="btn btn-rounded btn-primary" data-toggle="tooltip" title="Agregar" name="AGREGAR" value="AGREGAR" <?php echo $DISABLED; ?>>
                                                <i class="ti-save-alt"></i>
                                            </button>
                                            <button type="submit" class="btn btn-rounded btn-info" data-toggle="tooltip" title="Mantener" name="MANTENER" value="MANTENER" <?php echo $DISABLED; ?>>
                                                <i class="ti-save-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <!--.row -->
                    </section>
                </div>
            </div>
            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../config/footer.php";   ?>
                <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>