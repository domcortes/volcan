<?php

include_once "../config/validarUsuario.php";
//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/FOLIO_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/TCALIBRE_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';

include_once '../controlador/RECEPCIONPT_ADO.php';
include_once '../controlador/DRECEPCIONPT_ADO.php';
include_once '../controlador/EXIEXPORTACION_ADO.php';


include_once '../modelo/DRECEPCIONPT.php';
include_once '../modelo/EXIEXPORTACION.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();

$RECEPCIONPT_ADO =  new RECEPCIONPT_ADO();
$DRECEPCIONPT_ADO =  new DRECEPCIONPT_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
//INIICIALIZAR MODELO
$EXIEXPORTACION =  new EXIEXPORTACION();
$DRECEPCIONPT =  new DRECEPCIONPT();

//INICIALIZACION VARIABLES


$IDDRECEPCION = "";
$IDRECEPCION = "";
$FOLIODRECEPCION = "";
$FOLIOMANUAL = "";
$FOLIOMANUALR = "";
$NUMEROFOLIODRECEPCION = "";
$GASIFICADORECEPCION = "";
$FECHAEMBALADORECEPCION = "";

$CANTIDADENVASEDRECEPCION = "";
$KILOSBRUTORECEPCIONDRECEPCION = "";
$KILOSNETODRECEPCION = 0;
$KILOSPROMEDIODRECEPCION = 0;

$NOTADRECEPCION = "";
$ESTANDAR = "";
$VESPECIES = "";
$PRODUCTOR = "";
$PRODUCTORDATOS = "";
$FOLIO = "";
$TMANEJO = "";
$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$FECHARECEPCION = "";
$TRECEPCION = "";


$CANTIDADENVASERECIBIDO = "";
$CANTIDADENVASERECHAZADO = 0;
$CANTIDADENVASEAPROBADO = 0;
$PDESHIDRATACION = 0;
$EMBOLSADO = "";
$KILOSNETOREAL = 0;
$KILOSBRUTORECEPCION = 0;
$KILOSNETODRECEPCION = 0;
$KILOSDESHIDRATACION = 0;
$STOCKESTANDAR = "";
$STOCK = 0;
$NETOESTANDAR = "";
$NETOV = 0;

$FOLIOBAS2 = "";
$FOLIOAUX = "";
$ULTIMOFOLIO = "";

$FOLIOALIASESTACTICO = "";
$FOLIOALIASDIANAMICO = "";



$DISABLED = "";
$DISABLED2 = "";
$DISABLED3 = "";
$DISABLEDSTYLE = "";
$DISABLEDSTYLE2 = "";
$DISABLEDSTYLE3 = "";

$IDOP = "";
$IDOP2 = "";
$OP = "";
$NODATOURL = "";
$MENSAJE = "";
$MENSAJEELIMINAR = "";

//INICIALIZAR ARREGLOS

$ARRAYVERFOLIO = "";
$ARRAYULTIMOFOLIO = "";
$ARRAYOBTENERNUMEROLINEA = "";

$ARRAYESTANDAR = "";
$ARRAYVESPECIES;
$ARRAYDRECEPCION = "";
$ARRAYTMANEJO = "";
$ARRAYPRODUCTOR = "";

$ARRAYULTIMOFOLIO = "";
$ARRAYVERESTANDAR = "";
$ARRAYVERFOLIO = "";
$ARRAYVERFOLIOEXISTENCIA = "";
$ARRAYFECHAACTUAL = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

$ARRAYESTANDAR = $EEXPORTACION_ADO->listarEstandarPorEmpresaCBX($EMPRESAS);
$ARRAYTMANEJO = $TMANEJO_ADO->listarTmanejoCBX();
$ARRAYTCALIBRE = $TCALIBRE_ADO->listarCalibrePorEmpresaCBX($EMPRESAS);
$ARRAYPRODUCTOR = $PRODUCTOR_ADO->listarProductorPorEmpresaCBX($EMPRESAS);

$ARRAYFECHAACTUAL = $DRECEPCIONPT_ADO->obtenerFecha();
$FECHAEMBALADORECEPCION = $ARRAYFECHAACTUAL[0]['FECHA'];
include_once "../config/validarDatosUrlD.php";


//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['CREAR'])) {

    //OBTENER EL FOLIO DEL DETALLE DE EXPORTACION DEL PROCESO   

    $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTexportacion($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
    $FOLIO = $ARRAYVERFOLIO[0]['ID_FOLIO'];
    if (isset($_REQUEST['FOLIOMANUAL'])) {
        $FOLIOMANUAL = $_REQUEST['FOLIOMANUAL'];
    }
    if ($FOLIOMANUAL == "on") {
        $NUMEROFOLIODRECEPCION = $_REQUEST['NUMEROFOLIODRECEPCION'];
        $FOLIOMANUALR = "1";
        $ARRAYFOLIOPOEXPO = $EXIEXPORTACION_ADO->buscarPorFolio($NUMEROFOLIODRECEPCION);
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
        $NUMEROFOLIODRECEPCION = $FOLIOEXPORTACION + 1;
        $ARRAYFOLIOPOEXPO = $EXIEXPORTACION_ADO->buscarPorFolio($NUMEROFOLIODRECEPCION);

        while (count($ARRAYFOLIOPOEXPO) == 1) {
            $ARRAYFOLIOPOEXPO = $EXIEXPORTACION_ADO->buscarPorFolio($NUMEROFOLIODRECEPCION);
            if (count($ARRAYFOLIOPOEXPO) == 1) {
                $NUMEROFOLIODRECEPCION += 1;
            }
        };
    }
    $FOLIOALIASESTACTICO = $NUMEROFOLIODRECEPCION;
    $FOLIOALIASDIANAMICO = "EMPRESA:" . $_REQUEST['EMPRESA'] . "_PLANTA:" . $_REQUEST['PLANTA'] . "_TEMPORADA:" . $_REQUEST['TEMPORADA'] .
        "_TIPO_FOLIO:PRODUCTO TERMINADO_RECEPCION:" . $_REQUEST['IDP'] . "_FOLIO:" . $NUMEROFOLIODRECEPCION;


    $DRECEPCIONPT->__SET('FOLIO_DRECEPCION', $NUMEROFOLIODRECEPCION);
    $DRECEPCIONPT->__SET('FOLIO_MANUAL', $FOLIOMANUALR);
    $DRECEPCIONPT->__SET('FECHA_EMBALADO_DRECEPCION', $_REQUEST['FECHAEMBALADORECEPCION']);
    $DRECEPCIONPT->__SET('CANTIDAD_ENVASE_RECIBIDO_DRECEPCION', $_REQUEST['CANTIDADENVASERECIBIDO']);
    $DRECEPCIONPT->__SET('CANTIDAD_ENVASE_RECHAZADO_DRECEPCION', $_REQUEST['CANTIDADENVASERECHAZADO']);
    $DRECEPCIONPT->__SET('CANTIDAD_ENVASE_APROBADO_DRECEPCION', $_REQUEST['CANTIDADENVASEAPROBADO']);
    $DRECEPCIONPT->__SET('KILOS_NETO_REAL_DRECEPCION', $_REQUEST['KILOSNETOREAL']);
    $DRECEPCIONPT->__SET('KILOS_NETO_DRECEPCION', $_REQUEST['KILOSNETODRECEPCION']);
    $DRECEPCIONPT->__SET('KILOS_BRUTO_DRECEPCION', $_REQUEST['KILOSBRUTORECEPCION']);
    $DRECEPCIONPT->__SET('PDESHIDRATACION_DRECEPCION', $_REQUEST['PDESHIDRATACIONEESTANDAR']);
    $DRECEPCIONPT->__SET('KILOS_DESHIDRATACION_DRECEPCION', $_REQUEST['KILOSDESHIDRATACION']);
    $DRECEPCIONPT->__SET('EMBOLSADO_DRECEPCION', $_REQUEST['EMBOLSADO']);
    $DRECEPCIONPT->__SET('TEMPERATURA_DRECEPCION', $_REQUEST['TEMPERATURA']);
    $DRECEPCIONPT->__SET('STOCK_DRECEPCION', $_REQUEST['STOCK']);
    $DRECEPCIONPT->__SET('GASIFICADO_DRECEPCION', $_REQUEST['GASIFICADORECEPCION']);
    $DRECEPCIONPT->__SET('PREFRIO_DRECEPCION', $_REQUEST['PREFRIO']);
    $DRECEPCIONPT->__SET('NOTA_DRECEPCION', $_REQUEST['NOTADRECEPCION']);
    $DRECEPCIONPT->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
    $DRECEPCIONPT->__SET('ID_VESPECIES',  $_REQUEST['VESPECIES']);
    $DRECEPCIONPT->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
    $DRECEPCIONPT->__SET('ID_FOLIO', $FOLIO);
    $DRECEPCIONPT->__SET('ID_TEMBALAJE', $_REQUEST['TEMBALAJE']);
    $DRECEPCIONPT->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
    $DRECEPCIONPT->__SET('ID_TCALIBRE', $_REQUEST['TCALIBRE']);
    $DRECEPCIONPT->__SET('ID_RECEPCION', $_REQUEST['IDP']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $DRECEPCIONPT_ADO->agregarDrecepcion($DRECEPCIONPT);



    $EXIEXPORTACION->__SET('FOLIO_EXIEXPORTACION', $NUMEROFOLIODRECEPCION);
    $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $NUMEROFOLIODRECEPCION);
    $EXIEXPORTACION->__SET('FOLIO_MANUAL', $FOLIOMANUALR);
    $EXIEXPORTACION->__SET('FECHA_COSECHA_EXIEXPORTACION', $_REQUEST['FECHAEMBALADORECEPCION']);    
    $EXIEXPORTACION->__SET('CANTIDAD_ENVASE_EXIEXPORTACION', $_REQUEST['CANTIDADENVASEAPROBADO']);
    $EXIEXPORTACION->__SET('KILOS_NETO_EXIEXPORTACION', $_REQUEST['KILOSNETODRECEPCION']);
    $EXIEXPORTACION->__SET('KILOS_BRUTO_EXIEXPORTACION', $_REQUEST['KILOSBRUTORECEPCION']);
    $EXIEXPORTACION->__SET('PDESHIDRATACION_EXIEXPORTACION', $_REQUEST['PDESHIDRATACIONEESTANDAR']);
    $EXIEXPORTACION->__SET('KILOS_DESHIRATACION_EXIEXPORTACION', $_REQUEST['KILOSDESHIDRATACION']);    
    $EXIEXPORTACION->__SET('OBSERVACION_EXIESPORTACION', $_REQUEST['NOTADRECEPCION']);
    $EXIEXPORTACION->__SET('ALIAS_DINAMICO_FOLIO_EXIESPORTACION', $FOLIOALIASDIANAMICO);
    $EXIEXPORTACION->__SET('ALIAS_ESTATICO_FOLIO_EXIESPORTACION', $FOLIOALIASESTACTICO);
    $EXIEXPORTACION->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
    $EXIEXPORTACION->__SET('STOCK', $_REQUEST['STOCK']);
    $EXIEXPORTACION->__SET('EMBOLSADO', $_REQUEST['EMBOLSADO']);
    $EXIEXPORTACION->__SET('GASIFICADO', $_REQUEST['GASIFICADORECEPCION']);
    $EXIEXPORTACION->__SET('PREFRIO', $_REQUEST['PREFRIO']);
    $EXIEXPORTACION->__SET('ID_TCALIBRE', $_REQUEST['TCALIBRE']);
    $EXIEXPORTACION->__SET('ID_TEMBALAJE', $_REQUEST['TEMBALAJE']);
    $EXIEXPORTACION->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
    $EXIEXPORTACION->__SET('ID_FOLIO',  $FOLIO);
    $EXIEXPORTACION->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
    $EXIEXPORTACION->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
    $EXIEXPORTACION->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
    $EXIEXPORTACION->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $EXIEXPORTACION->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
    $EXIEXPORTACION->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
    $EXIEXPORTACION->__SET('ID_RECEPCION', $_REQUEST['IDP']);
    $EXIEXPORTACION->__SET('ID_PLANTA2', $_REQUEST['PLANTA2']);   
   
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    //$EXIEXPORTACION_ADO->agregarExiexportacionRecepcion($EXIEXPORTACION);



    /*
    //REDIRECCIONAR A PAGINA registroRecepcionmp.php 
    $_SESSION["parametro"] =  $_REQUEST['IDP'];
    $_SESSION["parametro1"] =  $_REQUEST['OPP'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
    */
}
if (isset($_REQUEST['EDITAR'])) {

    $DRECEPCIONPT->__SET('FECHA_EMBALADO_DRECEPCION', $_REQUEST['FECHAEMBALADORECEPCION']);
    $DRECEPCIONPT->__SET('CANTIDAD_ENVASE_RECIBIDO_DRECEPCION', $_REQUEST['CANTIDADENVASERECIBIDO']);
    $DRECEPCIONPT->__SET('CANTIDAD_ENVASE_RECHAZADO_DRECEPCION', $_REQUEST['CANTIDADENVASERECHAZADO']);
    $DRECEPCIONPT->__SET('CANTIDAD_ENVASE_APROBADO_DRECEPCION', $_REQUEST['CANTIDADENVASEAPROBADO']);
    $DRECEPCIONPT->__SET('KILOS_NETO_REAL_DRECEPCION', $_REQUEST['KILOSNETOREAL']);
    $DRECEPCIONPT->__SET('KILOS_NETO_DRECEPCION', $_REQUEST['KILOSNETODRECEPCION']);
    $DRECEPCIONPT->__SET('KILOS_BRUTO_DRECEPCION', $_REQUEST['KILOSBRUTORECEPCION']);
    $DRECEPCIONPT->__SET('PDESHIDRATACION_DRECEPCION', $_REQUEST['PDESHIDRATACIONEESTANDAR']);
    $DRECEPCIONPT->__SET('KILOS_DESHIDRATACION_DRECEPCION', $_REQUEST['KILOSDESHIDRATACION']);
    $DRECEPCIONPT->__SET('EMBOLSADO_DRECEPCION', $_REQUEST['EMBOLSADO']);
    $DRECEPCIONPT->__SET('TEMPERATURA_DRECEPCION', $_REQUEST['TEMPERATURA']);
    $DRECEPCIONPT->__SET('STOCK_DRECEPCION', $_REQUEST['STOCK']);
    $DRECEPCIONPT->__SET('GASIFICADO_DRECEPCION', $_REQUEST['GASIFICADORECEPCION']);
    $DRECEPCIONPT->__SET('PREFRIO_DRECEPCION', $_REQUEST['PREFRIO']);
    $DRECEPCIONPT->__SET('NOTA_DRECEPCION', $_REQUEST['NOTADRECEPCION']);
    $DRECEPCIONPT->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
    $DRECEPCIONPT->__SET('ID_VESPECIES',  $_REQUEST['VESPECIES']);
    $DRECEPCIONPT->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
    $DRECEPCIONPT->__SET('ID_TEMBALAJE', $_REQUEST['TEMBALAJE']);
    $DRECEPCIONPT->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
    $DRECEPCIONPT->__SET('ID_TCALIBRE', $_REQUEST['TCALIBRE']);
    $DRECEPCIONPT->__SET('ID_RECEPCION', $_REQUEST['IDP']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $DRECEPCIONPT_ADO->actualizarDrecepcion($DRECEPCIONPT);
}
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO'])) {
    $IDP = $_SESSION['parametro'];
    $OPP = $_SESSION['parametro1'];
    $URLO = $_SESSION['urlO'];


    $ARRAYRECEPCION = $RECEPCIONPT_ADO->verRecepcion($IDP);
    foreach ($ARRAYRECEPCION as $r) :
        $TRECEPCION = "" . $r['TRECEPCION'];
        if ($TRECEPCION == "1") {
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $FECHARECEPCION = "" . $r['FECHA_RECEPCION'];
            $PLANTA2 = "" . $r['ID_PLANTA2'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": " . $ARRAYVERPRODUCTOR[0]["RUT_PRODUCTOR"] . "-" . $ARRAYVERPRODUCTOR[0]["DV_PRODUCTOR"] . ":" . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
        }
    endforeach;
}

if (isset($_REQUEST['ELIMINAR'])) {
    $FOLIOELIMINAR = $_REQUEST['NUMEROFOLIODRECEPCIONE'];
    $DRECEPCIONPT->__SET('ID_DRECEPCION', $_REQUEST['ID']);
    $DRECEPCIONPT_ADO->deshabilitar($DRECEPCIONPT);


    $EXIEXPORTACION->__SET('ID_RECEPCION', $_REQUEST['IDP']);
    $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $FOLIOELIMINAR);
    //$EXIEXPORTACION_ADO->deshabilitarRecepcion($EXIEXPORTACION);

    $EXIEXPORTACION->__SET('ID_RECEPCION', $_REQUEST['IDP']);
    $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $FOLIOELIMINAR);
    //$EXIEXPORTACION_ADO->eliminadoRecepcion($EXIEXPORTACION);
/*
    $_SESSION["parametro"] =  $_REQUEST['IDP'];
    $_SESSION["parametro1"] =  $_REQUEST['OPP'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";*/
}


//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
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
        $DISABLED2 = "disabled";
        $DISABLED3 = "";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE3 = "";
        $ARRAYDRECEPCION = $DRECEPCIONPT_ADO->verDrecepcion($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            // $NUMEROFOLIODRECEPCION = "" . $r['FOLIO_DRECEPCION'];
            /*
            if ($r['FOLIO_MANUAL'] == "1") {
                $FOLIOMANUAL = "on";
            }
            if ($r['FOLIO_MANUAL'] == "0") {
                $FOLIOMANUAL = "off";
            }*/

            $FECHAEMBALADORECEPCION = "" . $r['FECHA_EMBALADO_DRECEPCION'];
            $CANTIDADENVASERECIBIDO = "" . $r['CANTIDAD_ENVASE_RECIBIDO_DRECEPCION'];
            $CANTIDADENVASERECHAZADO = "" . $r['CANTIDAD_ENVASE_RECHAZADO_DRECEPCION'];
            $CANTIDADENVASEAPROBADO = "" . $r['CANTIDAD_ENVASE_APROBADO_DRECEPCION'];
            $KILOSNETOREAL = "" . $r['KILOS_NETO_REAL_DRECEPCION'];
            $KILOSNETODRECEPCION = "" . $r['KILOS_NETO_DRECEPCION'];
            $KILOSBRUTORECEPCION = "" . $r['KILOS_BRUTO_DRECEPCION'];
            $PDESHIDRATACIONEESTANDAR = "" . $r['PDESHIDRATACION_DRECEPCION'];
            $KILOSDESHIDRATACION = "" . $r['KILOS_DESHIDRATACION_DRECEPCION'];
            $EMBOLSADO = "" . $r['EMBOLSADO_DRECEPCION'];
            $TEMPERATURA = "" . $r['TEMPERATURA_DRECEPCION'];
            $STOCK = "" . $r['STOCK_DRECEPCION'];
            $GASIFICADORECEPCION = "" . $r['GASIFICADO_DRECEPCION'];
            $PREFRIO = "" . $r['PREFRIO_DRECEPCION'];
            $NOTADRECEPCION = "" . $r['NOTA_DRECEPCION'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": " . $ARRAYVERPRODUCTOR[0]["RUT_PRODUCTOR"] . "-" . $ARRAYVERPRODUCTOR[0]["DV_PRODUCTOR"] . ":" . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($ESTANDAR);
            if ($ARRAYVERESTANDAR) {
                $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
            }
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $FOLIO = "" . $r['ID_FOLIO'];
            $TEMBALAJE = "" . $r['ID_TEMBALAJE'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $TCALIBRE = "" . $r['ID_TCALIBRE'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        $DISABLED = "";
        $DISABLED2 = "disabled";
        $DISABLED3 = "disabled";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE3 = "style='background-color: #eeeeee;'";
        $ARRAYDRECEPCION = $DRECEPCIONPT_ADO->verDrecepcion($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            $NUMEROFOLIODRECEPCION = "" . $r['FOLIO_DRECEPCION'];

            if ($r['FOLIO_MANUAL'] == "1") {
                $FOLIOMANUAL = "on";
            }
            if ($r['FOLIO_MANUAL'] == "0") {
                $FOLIOMANUAL = "off";
            }

            $FECHAEMBALADORECEPCION = "" . $r['FECHA_EMBALADO_DRECEPCION'];
            $CANTIDADENVASERECIBIDO = "" . $r['CANTIDAD_ENVASE_RECIBIDO_DRECEPCION'];
            $CANTIDADENVASERECHAZADO = "" . $r['CANTIDAD_ENVASE_RECHAZADO_DRECEPCION'];
            $CANTIDADENVASEAPROBADO = "" . $r['CANTIDAD_ENVASE_APROBADO_DRECEPCION'];
            $KILOSNETOREAL = "" . $r['KILOS_NETO_REAL_DRECEPCION'];
            $KILOSNETODRECEPCION = "" . $r['KILOS_NETO_DRECEPCION'];
            $KILOSBRUTORECEPCION = "" . $r['KILOS_BRUTO_DRECEPCION'];
            $PDESHIDRATACIONEESTANDAR = "" . $r['PDESHIDRATACION_DRECEPCION'];
            $KILOSDESHIDRATACION = "" . $r['KILOS_DESHIDRATACION_DRECEPCION'];
            $EMBOLSADO = "" . $r['EMBOLSADO_DRECEPCION'];
            $TEMPERATURA = "" . $r['TEMPERATURA_DRECEPCION'];
            $STOCK = "" . $r['STOCK_DRECEPCION'];
            $GASIFICADORECEPCION = "" . $r['GASIFICADO_DRECEPCION'];
            $PREFRIO = "" . $r['PREFRIO_DRECEPCION'];
            $NOTADRECEPCION = "" . $r['NOTA_DRECEPCION'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": " . $ARRAYVERPRODUCTOR[0]["RUT_PRODUCTOR"] . "-" . $ARRAYVERPRODUCTOR[0]["DV_PRODUCTOR"] . ":" . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($ESTANDAR);
            if ($ARRAYVERESTANDAR) {
                $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
            }
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $FOLIO = "" . $r['ID_FOLIO'];
            $TEMBALAJE = "" . $r['ID_TEMBALAJE'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $TCALIBRE = "" . $r['ID_TCALIBRE'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLED3 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE3 = "style='background-color: #eeeeee;'";
        $ARRAYDRECEPCION = $DRECEPCIONPT_ADO->verDrecepcion($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            $NUMEROFOLIODRECEPCION = "" . $r['FOLIO_DRECEPCION'];

            if ($r['FOLIO_MANUAL'] == "1") {
                $FOLIOMANUAL = "on";
            }
            if ($r['FOLIO_MANUAL'] == "0") {
                $FOLIOMANUAL = "off";
            }

            $FECHAEMBALADORECEPCION = "" . $r['FECHA_EMBALADO_DRECEPCION'];
            $CANTIDADENVASERECIBIDO = "" . $r['CANTIDAD_ENVASE_RECIBIDO_DRECEPCION'];
            $CANTIDADENVASERECHAZADO = "" . $r['CANTIDAD_ENVASE_RECHAZADO_DRECEPCION'];
            $CANTIDADENVASEAPROBADO = "" . $r['CANTIDAD_ENVASE_APROBADO_DRECEPCION'];
            $KILOSNETOREAL = "" . $r['KILOS_NETO_REAL_DRECEPCION'];
            $KILOSNETODRECEPCION = "" . $r['KILOS_NETO_DRECEPCION'];
            $KILOSBRUTORECEPCION = "" . $r['KILOS_BRUTO_DRECEPCION'];
            $PDESHIDRATACIONEESTANDAR = "" . $r['PDESHIDRATACION_DRECEPCION'];
            $KILOSDESHIDRATACION = "" . $r['KILOS_DESHIDRATACION_DRECEPCION'];
            $EMBOLSADO = "" . $r['EMBOLSADO_DRECEPCION'];
            $TEMPERATURA = "" . $r['TEMPERATURA_DRECEPCION'];
            $STOCK = "" . $r['STOCK_DRECEPCION'];
            $GASIFICADORECEPCION = "" . $r['GASIFICADO_DRECEPCION'];
            $PREFRIO = "" . $r['PREFRIO_DRECEPCION'];
            $NOTADRECEPCION = "" . $r['NOTA_DRECEPCION'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": " . $ARRAYVERPRODUCTOR[0]["RUT_PRODUCTOR"] . "-" . $ARRAYVERPRODUCTOR[0]["DV_PRODUCTOR"] . ":" . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($ESTANDAR);
            if ($ARRAYVERESTANDAR) {
                $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
            }
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $FOLIO = "" . $r['ID_FOLIO'];
            $TEMBALAJE = "" . $r['ID_TEMBALAJE'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $TCALIBRE = "" . $r['ID_TCALIBRE'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
    if ($OP == "eliminar") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLED3 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE3 = "style='background-color: #eeeeee;'";
        $MENSAJEELIMINAR = "ESTA SEGURO DE ELIMINAR EL REGISTRO, PARA CONFIRMAR PRESIONE ELIMINAR";
        $ARRAYDRECEPCION = $DRECEPCIONPT_ADO->verDrecepcion($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            $NUMEROFOLIODRECEPCION = "" . $r['FOLIO_DRECEPCION'];

            if ($r['FOLIO_MANUAL'] == "1") {
                $FOLIOMANUAL = "on";
            }
            if ($r['FOLIO_MANUAL'] == "0") {
                $FOLIOMANUAL = "off";
            }

            $FECHAEMBALADORECEPCION = "" . $r['FECHA_EMBALADO_DRECEPCION'];
            $CANTIDADENVASERECIBIDO = "" . $r['CANTIDAD_ENVASE_RECIBIDO_DRECEPCION'];
            $CANTIDADENVASERECHAZADO = "" . $r['CANTIDAD_ENVASE_RECHAZADO_DRECEPCION'];
            $CANTIDADENVASEAPROBADO = "" . $r['CANTIDAD_ENVASE_APROBADO_DRECEPCION'];
            $KILOSNETOREAL = "" . $r['KILOS_NETO_REAL_DRECEPCION'];
            $KILOSNETODRECEPCION = "" . $r['KILOS_NETO_DRECEPCION'];
            $KILOSBRUTORECEPCION = "" . $r['KILOS_BRUTO_DRECEPCION'];
            $PDESHIDRATACIONEESTANDAR = "" . $r['PDESHIDRATACION_DRECEPCION'];
            $KILOSDESHIDRATACION = "" . $r['KILOS_DESHIDRATACION_DRECEPCION'];
            $EMBOLSADO = "" . $r['EMBOLSADO_DRECEPCION'];
            $TEMPERATURA = "" . $r['TEMPERATURA_DRECEPCION'];
            $STOCK = "" . $r['STOCK_DRECEPCION'];
            $GASIFICADORECEPCION = "" . $r['GASIFICADO_DRECEPCION'];
            $PREFRIO = "" . $r['PREFRIO_DRECEPCION'];
            $NOTADRECEPCION = "" . $r['NOTA_DRECEPCION'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": " . $ARRAYVERPRODUCTOR[0]["RUT_PRODUCTOR"] . "-" . $ARRAYVERPRODUCTOR[0]["DV_PRODUCTOR"] . ":" . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($ESTANDAR);
            if ($ARRAYVERESTANDAR) {
                $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
            }
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $FOLIO = "" . $r['ID_FOLIO'];
            $TEMBALAJE = "" . $r['ID_TEMBALAJE'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $TCALIBRE = "" . $r['ID_TCALIBRE'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
}


if ($_POST) {
    if (isset($_REQUEST['FOLIOMANUAL'])) {
        $FOLIOMANUAL = $_REQUEST['FOLIOMANUAL'];

        if (isset($_REQUEST['NUMEROFOLIODRECEPCION'])) {
            $NUMEROFOLIODRECEPCION = $_REQUEST['NUMEROFOLIODRECEPCION'];
        }
    }
    if (isset($_REQUEST['FECHAEMBALADORECEPCION'])) {
        $FECHAEMBALADORECEPCION = $_REQUEST['FECHAEMBALADORECEPCION'];
    }
    if (isset($_REQUEST['PRODUCTOR'])) {
        $PRODUCTOR = $_REQUEST['PRODUCTOR'];
    }
    if (isset($_REQUEST['ESTANDAR'])) {
        $ESTANDAR = $_REQUEST['ESTANDAR'];
        $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($ESTANDAR);
        if ($ARRAYVERESTANDAR) {
            $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
            $STOCKESTANDAR = $ARRAYVERESTANDAR[0]['STOCK'];
            $PESOPALLETRECEPCION = $ARRAYVERESTANDAR[0]['PESO_PALLET_ESTANDAR'];
            if (isset($_REQUEST['STOCK'])) {
                $STOCK = $_REQUEST['STOCK'];
            }
        }
    }
    if (isset($_REQUEST['VESPECIES'])) {
        $VESPECIES = $_REQUEST['VESPECIES'];
    }
    if (isset($_REQUEST['CANTIDADENVASERECIBIDO'])) {
        $CANTIDADENVASERECIBIDO = $_REQUEST['CANTIDADENVASERECIBIDO'];
    }
    if (isset($_REQUEST['CANTIDADENVASERECHAZADO'])) {
        $CANTIDADENVASERECHAZADO = $_REQUEST['CANTIDADENVASERECHAZADO'];
    }
    if (isset($_REQUEST['KILOSNETOREAL'])) {
        $KILOSNETOREAL = $_REQUEST['KILOSNETOREAL'];
    }
    if (isset($_REQUEST['CANTIDADENVASERECIBIDO']) != "" && isset($_REQUEST['CANTIDADENVASERECHAZADO']) != "" && isset($_REQUEST['ESTANDAR']) != "") {
        $CANTIDADENVASERECIBIDO = $_REQUEST['CANTIDADENVASERECIBIDO'];
        $CANTIDADENVASERECHAZADO = $_REQUEST['CANTIDADENVASERECHAZADO'];
        $CANTIDADENVASEAPROBADO = $CANTIDADENVASERECIBIDO - $CANTIDADENVASERECHAZADO;
        $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($_REQUEST['ESTANDAR']);
        if ($ARRAYVERESTANDAR) {
            $PESONETOEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_NETO_ESTANDAR'];
            $PESOENVASEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_ENVASE_ESTANDAR'];
            $EMBOLSADO = $ARRAYVERESTANDAR[0]['EMBOLSADO'];
            $TEMBALAJE = $ARRAYVERESTANDAR[0]['ID_TEMBALAJE'];
            $PESOPALLETEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_PALLET_ESTANDAR'];
            $PDESHIDRATACIONEESTANDAR = $ARRAYVERESTANDAR[0]['PDESHIDRATACION_ESTANDAR'];
            $KILOSNETODRECEPCION = $CANTIDADENVASEAPROBADO * $PESONETOEESTANDAR;
            $KILOSDESHIDRATACION = $KILOSNETODRECEPCION * (1 + ($PDESHIDRATACIONEESTANDAR / 100));
            $KILOSBRUTORECEPCION = (($CANTIDADENVASEAPROBADO * $PESOENVASEESTANDAR) + $KILOSDESHIDRATACION) + $PESOPALLETEESTANDAR;
        }
    }
    if (isset($_REQUEST['TCALIBRE'])) {
        $TCALIBRE = $_REQUEST['TCALIBRE'];
    }
    if (isset($_REQUEST['TEMPERATURA'])) {
        $TEMPERATURA = $_REQUEST['TEMPERATURA'];
    }
    if (isset($_REQUEST['TMANEJO'])) {
        $TMANEJO = $_REQUEST['TMANEJO'];
    }
    if (isset($_REQUEST['GASIFICADORECEPCION'])) {
        $GASIFICADORECEPCION = $_REQUEST['GASIFICADORECEPCION'];
    }
    if (isset($_REQUEST['PREFRIO'])) {
        $PREFRIO = $_REQUEST['PREFRIO'];
    }
    if (isset($_REQUEST['NOTADRECEPCION'])) {
        $NOTADRECEPCION = $_REQUEST['NOTADRECEPCION'];
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Detalle </title>
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
                    FECHAEMBALADORECEPCION = document.getElementById("FECHAEMBALADORECEPCION").value;
                    ESTANDAR = document.getElementById("ESTANDAR").selectedIndex;
                    GASIFICADORECEPCION = document.getElementById("GASIFICADORECEPCION").selectedIndex;
                    VESPECIES = document.getElementById("VESPECIES").selectedIndex;
                    CANTIDADENVASERECIBIDO = document.getElementById("CANTIDADENVASERECIBIDO").value;
                    CANTIDADENVASERECHAZADO = document.getElementById("CANTIDADENVASERECHAZADO").value;
                    KILOSNETOREAL = document.getElementById("KILOSNETOREAL").value;
                    TCALIBRE = document.getElementById("TCALIBRE").selectedIndex;
                    TMANEJO = document.getElementById("TMANEJO").selectedIndex;
                    PREFRIO = document.getElementById("PREFRIO").selectedIndex;
                    STOCKESTANDAR = document.getElementById("STOCKESTANDAR").value;
                    TEMPERATURA = document.getElementById("TEMPERATURA").value;
                    NOTADRECEPCION = document.getElementById("NOTADRECEPCION").selectedIndex;




                    document.getElementById('val_folio').innerHTML = "";
                    document.getElementById('val_fechaembalado').innerHTML = "";
                    document.getElementById('val_estandar').innerHTML = "";
                    document.getElementById('val_gasificacion').innerHTML = "";
                    document.getElementById('val_vespecies').innerHTML = "";
                    document.getElementById('val_cantidadenvaserecibido').innerHTML = "";
                    document.getElementById('val_cantidadenvaserechazado').innerHTML = "";
                    document.getElementById('val_netoreal').innerHTML = "";
                    document.getElementById('val_calibre').innerHTML = "";
                    document.getElementById('val_tmanejo').innerHTML = "";
                    document.getElementById('val_prefrio').innerHTML = "";
                    document.getElementById('val_t').innerHTML = "";
                    document.getElementById('val_nota').innerHTML = "";



                    if (FOLIOMANUAL == true) {
                        NUMEROFOLIODRECEPCION = document.getElementById("NUMEROFOLIODRECEPCION").value;
                        document.getElementById('val_folio').innerHTML = "";

                        if (NUMEROFOLIODRECEPCION == null || NUMEROFOLIODRECEPCION.length == 0 || /^\s+$/.test(NUMEROFOLIODRECEPCION)) {
                            document.form_reg_dato.NUMEROFOLIODRECEPCION.focus();
                            document.form_reg_dato.NUMEROFOLIODRECEPCION.style.borderColor = "#FF0000";
                            document.getElementById('val_folio').innerHTML = "NO HA INGRESADO EL FOLIO";
                            return false;
                        }
                        document.form_reg_dato.NUMEROFOLIODRECEPCION.style.borderColor = "#4AF575";


                        if (/^0/.test(NUMEROFOLIODRECEPCION)) {
                            document.form_reg_dato.NUMEROFOLIODRECEPCION.focus();
                            document.form_reg_dato.NUMEROFOLIODRECEPCION.style.borderColor = "#FF0000";
                            document.getElementById('val_folio').innerHTML = "EL FOLIO NO PUEDE EMPEZAR CON 0";
                            return false;
                        }
                        document.form_reg_dato.NUMEROFOLIODRECEPCION.style.borderColor = "#4AF575";


                        if (NUMEROFOLIODRECEPCION.length > 10) {
                            document.form_reg_dato.NUMEROFOLIODRECEPCION.focus();
                            document.form_reg_dato.NUMEROFOLIODRECEPCION.style.borderColor = "#FF0000";
                            document.getElementById('val_folio').innerHTML = "EL FOLIO NO PUEDE TENER MAS DE DIES DIGITOS";
                            return false;
                        }
                        document.form_reg_dato.NUMEROFOLIODRECEPCION.style.borderColor = "#4AF575";
                    }

                    if (FECHAEMBALADORECEPCION == null || FECHAEMBALADORECEPCION.length == 0 || /^\s+$/.test(FECHAEMBALADORECEPCION)) {
                        document.form_reg_dato.FECHAEMBALADORECEPCION.focus();
                        document.form_reg_dato.FECHAEMBALADORECEPCION.style.borderColor = "#FF0000";
                        document.getElementById('val_fechaembalado').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.FECHAEMBALADORECEPCION.style.borderColor = "#4AF575";

                    if (TRECEPCION == 2) {
                        PRODUCTOR = document.getElementById("PRODUCTOR").selectedIndex;
                        document.getElementById('val_productor').innerHTML = "";

                        if (PRODUCTOR == null || PRODUCTOR == 0) {
                            document.form_reg_dato.PRODUCTOR.focus();
                            document.form_reg_dato.PRODUCTOR.style.borderColor = "#FF0000";
                            document.getElementById('val_productor').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false;
                        }
                        document.form_reg_dato.PRODUCTOR.style.borderColor = "#4AF575";
                    }

                    if (ESTANDAR == null || ESTANDAR == 0) {
                        document.form_reg_dato.ESTANDAR.focus();
                        document.form_reg_dato.ESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_estandar').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.ESTANDAR.style.borderColor = "#4AF575";

                    if (GASIFICADORECEPCION == null || GASIFICADORECEPCION == 0) {
                        document.form_reg_dato.GASIFICADORECEPCION.focus();
                        document.form_reg_dato.GASIFICADORECEPCION.style.borderColor = "#FF0000";
                        document.getElementById('val_gasificacion').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.GASIFICADORECEPCION.style.borderColor = "#4AF575";

                    if (VESPECIES == null || VESPECIES == 0) {
                        document.form_reg_dato.VESPECIES.focus();
                        document.form_reg_dato.VESPECIES.style.borderColor = "#FF0000";
                        document.getElementById('val_vespecies').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.VESPECIES.style.borderColor = "#4AF575";


                    if (CANTIDADENVASERECIBIDO == null || CANTIDADENVASERECIBIDO.length == 0 || /^\s+$/.test(CANTIDADENVASERECIBIDO)) {
                        document.form_reg_dato.CANTIDADENVASERECIBIDO.focus();
                        document.form_reg_dato.CANTIDADENVASERECIBIDO.style.borderColor = "#FF0000";
                        document.getElementById('val_cantidadenvaserecibido').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.CANTIDADENVASERECIBIDO.style.borderColor = "#4AF575";

                    if (CANTIDADENVASERECHAZADO == null || CANTIDADENVASERECHAZADO.length == 0 || /^\s+$/.test(CANTIDADENVASERECHAZADO)) {
                        document.form_reg_dato.CANTIDADENVASERECHAZADO.focus();
                        document.form_reg_dato.CANTIDADENVASERECHAZADO.style.borderColor = "#FF0000";
                        document.getElementById('val_cantidadenvaserechazado').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.CANTIDADENVASERECHAZADO.style.borderColor = "#4AF575";

                    if (KILOSNETOREAL == null || KILOSNETOREAL.length == 0 || /^\s+$/.test(KILOSNETOREAL)) {
                        document.form_reg_dato.KILOSNETOREAL.focus();
                        document.form_reg_dato.KILOSNETOREAL.style.borderColor = "#FF0000";
                        document.getElementById('val_netoreal').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.KILOSNETOREAL.style.borderColor = "#4AF575";

                    if (TCALIBRE == null || TCALIBRE == 0) {
                        document.form_reg_dato.TCALIBRE.focus();
                        document.form_reg_dato.TCALIBRE.style.borderColor = "#FF0000";
                        document.getElementById('val_calibre').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
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


                    if (PREFRIO == null || PREFRIO == 0) {
                        document.form_reg_dato.PREFRIO.focus();
                        document.form_reg_dato.PREFRIO.style.borderColor = "#FF0000";
                        document.getElementById('val_prefrio').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.PREFRIO.style.borderColor = "#4AF575";
                    /*
                                                      if (TEMPERATURA == null || TEMPERATURA.length == 0 || /^\s+$/.test(TEMPERATURA)) {
                                                          document.form_reg_dato.TEMPERATURA.focus();
                                                          document.form_reg_dato.TEMPERATURA.style.borderColor = "#FF0000";
                                                          document.getElementById('val_t').innerHTML = "NO HA INGRESADO DATOS";
                                                          return false;
                                                      }
                                                      document.form_reg_dato.TEMPERATURA.style.borderColor = "#4AF575";
                    */

                    if (STOCKESTANDAR == 1) {
                        STOCK = document.getElementById("STOCK").value;
                        document.getElementById('val_stock').innerHTML = "";
                        if (STOCK == null || STOCK.length == 0 || /^\s+$/.test(STOCK)) {
                            document.form_reg_dato.STOCK.focus();
                            document.form_reg_dato.STOCK.style.borderColor = "#FF0000";
                            document.getElementById('val_stock').innerHTML = "NO HA INGRESADO DATOS";
                            return false;
                        }
                        document.form_reg_dato.STOCK.style.borderColor = "#4AF575";
                    }



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
            <?php //include_once "../config/menu.php"; 
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
                                            <li class="breadcrumb-item" aria-current="page">Frigorifico</li>
                                            <li class="breadcrumb-item" aria-current="page">Recepción P. Terminado</li>
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
                        <div class="box">
                            <div class="box-header with-border">
                                <!--
                                        <h4 class="box-title">Different Width</h4>
                                        -->
                            </div>

                            <form class="form" role="form" method="post" name="form_reg_dato" onsubmit="return validacion()">
                                <div class="box-body form-element">
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
                                                <input type="hidden" class="form-control" placeholder="ID DRECEPCION" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID RECEPCION" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID RECEPCION" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID RECEPCION" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />

                                                <input type="hidden" id="NUMEROFOLIODRECEPCIONE" name="NUMEROFOLIODRECEPCIONE" value="<?php echo $NUMEROFOLIODRECEPCION; ?>" />

                                                <input type="number" class="form-control" placeholder="Numero Folio " id="NUMEROFOLIODRECEPCION" name="NUMEROFOLIODRECEPCION" <?php echo $DISABLED2; ?> <?php echo $DISABLEDSTYLE2; ?> <?php if ($FOLIOMANUAL != "on") {
                                                                                                                                                                                                                                            echo "required disabled style='background-color: #eeeeee;'";
                                                                                                                                                                                                                                        } ?> value="<?php echo $NUMEROFOLIODRECEPCION; ?>" />
                                                <label id="val_folio" class="validacion"> <?php echo $MENSAJE; ?> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Fecha Embalado </label>
                                                <input type="date" class="form-control" placeholder="Fecha Embalado" id="FECHAEMBALADORECEPCION" name="FECHAEMBALADORECEPCION" value="<?php echo $FECHAEMBALADORECEPCION; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_fechaembalado" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="TRECEPCION" id="TRECEPCION" name="TRECEPCION" value="<?php echo $TRECEPCION; ?>" />
                                                <input type="hidden" class="form-control" placeholder="FOLIO" id="FOLIO" name="FOLIO" value="<?php echo $FOLIO; ?>" />
                                                <input type="hidden" class="form-control" placeholder="FECHARECEPCION" id="FECHARECEPCION" name="FECHARECEPCION" value="<?php echo $FECHARECEPCION; ?>" />
                                                <input type="hidden" class="form-control" placeholder="PLANTA2" id="PLANTA2" name="PLANTA2" value="<?php echo $PLANTA2; ?>" />
                                                <label>Productor </label>
                                                <?php if ($TRECEPCION == 1) { ?>
                                                    <input type="hidden" class="form-control" placeholder="PRODUCTOR" id="PRODUCTOR" name="PRODUCTOR" value="<?php echo $PRODUCTOR; ?>" />
                                                    <input type="text" class="form-control" placeholder="Productor" id="PRODUCTORV" name="PRODUCTORV" value="<?php echo $PRODUCTORDATOS; ?>" disabled style='background-color: #eeeeee;'"/>
                                                 <?php } ?>
                                                <?php if ($TRECEPCION == 2) { ?>
                                                    <input type=" hidden" class="form-control" placeholder="PRODUCTORE" id="PRODUCTORE" name="PRODUCTORE" value="<?php echo $PRODUCTOR; ?>" />
                                                    <select class="form-control select2" id="PRODUCTOR" name="PRODUCTOR" style="width: 100%;">
                                                        <option></option>
                                                        <?php foreach ($ARRAYPRODUCTOR as $r) : ?>
                                                            <?php if ($ARRAYPRODUCTOR) {    ?>
                                                                <option value="<?php echo $r['ID_PRODUCTOR']; ?>" <?php if ($PRODUCTOR == $r['ID_PRODUCTOR']) {
                                                                                                                        echo "selected";
                                                                                                                    } ?>>
                                                                    <?php echo $r['CSG_PRODUCTOR'] ?> : <?php echo $r['RUT_PRODUCTOR'] ?> : <?php echo $r['NOMBRE_PRODUCTOR'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                <?php } ?>
                                                <label id="val_productor" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Estandar </label>
                                                <input type="hidden" class="form-control" placeholder="STOCKESTANDAR" id="STOCKESTANDAR" name="STOCKESTANDAR" value="<?php echo $STOCKESTANDAR; ?>" />
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
                                                <label>Gasificacion</label>
                                                <select class="form-control select2" id="GASIFICADORECEPCION" name="GASIFICADORECEPCION" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                    <option></option>
                                                    <option value="0" <?php if ($GASIFICADORECEPCION == "0") {
                                                                            echo "selected";
                                                                        } ?>>No</option>
                                                    <option value="1" <?php if ($GASIFICADORECEPCION == "1") {
                                                                            echo "selected";
                                                                        } ?>> Si </option>
                                                </select>
                                                <label id="val_gasificacion" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Variedad</label><br>
                                                <select class="form-control select2" id="VESPECIES" name="VESPECIES" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYVESPECIES as $r) : ?>
                                                        <?php if ($ARRAYVESPECIES) {    ?>
                                                            <option value="<?php echo $r['ID_VESPECIES']; ?>" <?php if ($VESPECIES == $r['ID_VESPECIES']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_VESPECIES']; ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados</option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_vespecies" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Peso Pallet</label>
                                                <input type="hidden" class="form-control" placeholder="Peso Pallet" id="PESOPALLETRECEPCION" name="PESOPALLETRECEPCION" value="<?php echo $PESOPALLETRECEPCION; ?>" />
                                                <input type="number" class="form-control" placeholder="Peso Pallet" id="PESOPALLETRECEPCIONV" name="PESOPALLETRECEPCIONV" value="<?php echo $PESOPALLETRECEPCION; ?>" disabled style="background-color: #eeeeee;" />
                                                <label id="val_pesopallet" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Cantidad Envase Recibido </label>
                                                <input type="hidden" id="CANTIDADENVASERECIBIDOE" name="CANTIDADENVASERECIBIDOE" value="<?php echo $CANTIDADENVASERECIBIDO; ?>" />
                                                <input type="number" class="form-control" placeholder="Cantidad Envase" onchange="this.form.submit()" id="CANTIDADENVASERECIBIDO" name="CANTIDADENVASERECIBIDO" value="<?php echo $CANTIDADENVASERECIBIDO; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_cantidadenvaserecibido" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Cantidad Envase Rechazado</label>
                                                <input type="hidden" id="CANTIDADENVASERECHAZADOE" name="CANTIDADENVASERECHAZADOE" value="<?php echo $CANTIDADENVASERECHAZADO; ?>" />
                                                <input type="number" class="form-control" placeholder="Cantidad Envase" onchange="this.form.submit()" id="CANTIDADENVASERECHAZADO" name="CANTIDADENVASERECHAZADO" value="<?php echo $CANTIDADENVASERECHAZADO; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_cantidadenvaserechazado" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Cantidad Envase Aprobados</label>
                                                <input type="hidden" class="form-control" placeholder="Cantidad Envase" id="CANTIDADENVASEAPROBADO" name="CANTIDADENVASEAPROBADO" value="<?php echo $CANTIDADENVASEAPROBADO; ?>" />
                                                <input type="number" class="form-control" placeholder="Cantidad Envase" id="CANTIDADENVASEAPROBADOV" name="CANTIDADENVASEAPROBADOV" value="<?php echo $CANTIDADENVASEAPROBADO; ?>" disabled style="background-color: #eeeeee;" />
                                                <label id="val_cantidadenvaseaprobados" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Kilo Neto</label>
                                                <input type="hidden" class="form-control" placeholder="KILOSBRUTORECEPCION" id="KILOSBRUTORECEPCION" name="KILOSBRUTORECEPCION" value="<?php echo $KILOSBRUTORECEPCION; ?>" />
                                                <input type="hidden" class="form-control" placeholder="KILOSDESHIDRATACION" id="KILOSDESHIDRATACION" name="KILOSDESHIDRATACION" value="<?php echo $KILOSDESHIDRATACION; ?>" />
                                                <input type="hidden" class="form-control" placeholder="KILOSNETODRECEPCION" id="KILOSNETODRECEPCION" name="KILOSNETODRECEPCION" value="<?php echo $KILOSNETODRECEPCION; ?>" />
                                                <input type="hidden" class="form-control" placeholder="PDESHIDRATACIONEESTANDAR" id="PDESHIDRATACIONEESTANDAR" name="PDESHIDRATACIONEESTANDAR" value="<?php echo $PDESHIDRATACIONEESTANDAR; ?>" />
                                                <input type="hidden" class="form-control" placeholder="TEMBALAJE" id="TEMBALAJE" name="TEMBALAJE" value="<?php echo $TEMBALAJE; ?>" />
                                                <input type="hidden" class="form-control" placeholder="EMBOLSADO" id="EMBOLSADO" name="EMBOLSADO" value="<?php echo $EMBOLSADO; ?>" />
                                                <input type="number" class="form-control" placeholder="Kilo Neto" step="0.01" id="KILOSNETODRECEPCIONV" name="KILOSNETODRECEPCIONV" value="<?php echo $KILOSNETODRECEPCION; ?>" disabled style='background-color: #eeeeee;'" />
                                                 <label id=" val_kilosneto" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Kilos Netos Reales</label>
                                                <input type="hidden" id="KILOSNETOREALE" name="KILOSNETOREALE" value="<?php echo $KILOSNETOREALE; ?>" />
                                                <input type="number" class="form-control" placeholder="Kilos Netos Real" id="KILOSNETOREAL" name="KILOSNETOREAL" value="<?php echo $KILOSNETOREAL; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_netoreal" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Calibre</label>
                                                <input type="hidden" id="TCALIBREE" name="TCALIBREE" value="<?php echo $TCALIBRE; ?>" />
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
                                                <label id="val_calibre" class="validacion"> </label>
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
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Prefrio </label>
                                                <input type="hidden" id="PREFRIOE" name="PREFRIOE" value="<?php echo $PREFRIO; ?>" />
                                                <select class="form-control select2" id="PREFRIO" name="PREFRIO" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                    <option></option>
                                                    <option value="0" <?php if ($PREFRIO == "0") {
                                                                            echo "selected";
                                                                        } ?>>No</option>
                                                    <option value="1" <?php if ($PREFRIO == "1") {
                                                                            echo "selected";
                                                                        } ?>> Si </option>
                                                </select>
                                                <label id="val_prefrio" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Temperatura</label>
                                                <input type="hidden" id="TEMPERATURAE" name="TEMPERATURAE" value="<?php echo $TEMPERATURA; ?>" />
                                                <input type="number" step="0.01" class="form-control" placeholder="Temperatura" id="TEMPERATURA" name="TEMPERATURA" value="<?php echo $TEMPERATURA; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_t" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <?php if ($STOCKESTANDAR == "1") { ?>
                                            <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Stock</label>
                                                    <input type="hidden" id="STOCKE" name="STOCKE" value="<?php echo $STOCK; ?>" />
                                                    <input type="text" class="form-control" placeholder="Stock" id="STOCK" name="STOCK" value="<?php echo $STOCK; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                    <label id="val_stock" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <input type="hidden" id="STOCKE" name="STOCKE" value="<?php echo $STOCK; ?>" />
                                                    <input type="hidden" class="form-control" placeholder="Stock" id="STOCK" name="STOCK" value="<?php echo $STOCK; ?>" />
                                                    <label id="val_stock" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php  } ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Nota</label>
                                                <textarea class="form-control" rows="1" placeholder="Ingrese Nota, Observaciones u Otro" id="NOTADRECEPCION" name="NOTADRECEPCION" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?>><?php echo $NOTADRECEPCION; ?></textarea>
                                                <label id="val_nota" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label id=" val_mensaje" class="validacion"><?php echo $MENSAJEELIMINAR; ?> </label>
                                    <!-- /.row -->
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <div class="btn-group btn-rounded btn-block col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <button type="button" class="btn btn-rounded btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op');">
                                                <i class="ti-back-left "></i>
                                            </button>
                                            <?php if ($OP == "") { ?>
                                                <button type="submit" class="btn btn-rounded btn-primary " data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" <?php echo $DISABLED; ?>>
                                                    <i class="ti-save-alt"></i>
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <?php if ($OP == "crear") { ?>
                                                    <button type="submit" class="btn btn-rounded btn-primary " data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" <?php echo $DISABLED; ?>>
                                                        <i class="ti-save-alt"></i>
                                                    </button>
                                                <?php } ?>
                                                <?php if ($OP == "editar") { ?>
                                                    <button type="submit" class="btn btn-rounded btn-warning   " data-toggle="tooltip" title="Editar" name="EDITAR" value="EDITAR" <?php echo $DISABLED; ?>>
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
                        </div>
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