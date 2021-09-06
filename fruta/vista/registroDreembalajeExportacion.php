<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/FOLIO_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/CALIBRE_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';

include_once '../controlador/DREXPORTACION_ADO.php';
include_once '../modelo/DREXPORTACION.php';

include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../modelo/EXIEXPORTACION.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$PVESPECIES_ADO =  new PVESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$CALIBRE_ADO =  new CALIBRE_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();

$DREXPORTACION_ADO =  new DREXPORTACION_ADO();
$DREXPORTACION =  new DREXPORTACION();

$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$EXIEXPORTACION =  new EXIEXPORTACION();
//INIICIALIZAR MODELO

$NUMEROFOLIODEXPORTACION = "";
$NUMEROLINEA = "";
$FECHAEMBALADODEXPORTACION = "";
$CANTIDADENVASEDEXPORTACION = "";
$PDESHIDRATACIONDREXPORTACION = "";

$EEXPORTACION = "";
$PVESPECIES = "";
$CALIBRE = "";
$FOLIO = "";

$FOLIOBAS2 = "";
$FOLIOAUX = "";
$ULTIMOFOLIO = "";

$EMBOLSADO = "";
$PESOENVASEESTANDAR = "";
$PESOPALLETEESTANDAR = "";
$PESOBRUTOEESTANDAR = "";
$PESONETOEESTANDAR = "";


$KILOSBRUTO = "";
$KILOSNETO = "";
$KILOSDESHIDRATACION = "";

$IDDPROCESOEXPORTACION = "";
$IDREEMBALAJE = "";


$NOMBREPRODUCTOR = "";
$NOMBREVARIEDAD = "";

$PRODUCTOR = "";
$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$TMANEJO = "";

$DISABLED = "";
$DISABLEDSTYLE = "";
$DISABLED2 = "disabled";
$DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
$FOCUS = "";
$BORDER = "";


$IDOP = "";
$IDOP2 = "";
$OP = "";

$NODATOURL = "";

//INICIALIZAR ARREGLOS

$ARRAYVERFOLIO = "";
$ARRAYULTIMOFOLIO = "";
$ARRAYOBTENERNUMEROLINEA = "";


$ARRAYESTANDAR = "";
$ARRAYCALIBRE = "";
$ARRAYPVESPECIES;
$ARRAYVESPECIES;
$ARRAYPRODUCTOR = "";
$ARRAYTEMANEJO = "";
$ARRAYDPROCESOEXPORTACION = "";
$ARRAYDPROCESOEXPORTACION2 = "";
$ARRAYESTANDARDETALLE = "";


$ARRAYVERFOLIOPOEXPO = "";
$ARRAYFECHAACTUAL = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

$ARRAYESTANDAR = $EEXPORTACION_ADO->listarEstandarCBX();
$ARRAYCALIBRE = $CALIBRE_ADO->listarCalibreCBX();
$ARRAYFECHAACTUAL = $DREXPORTACION_ADO->obtenerFecha();
$ARRAYTEMANEJO = $TMANEJO_ADO->listarTmanejoCBX();

$FECHAEMBALADODEXPORTACION = $ARRAYFECHAACTUAL[0]['FECHA'];


//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {

    //OBTENER EL FOLIO DEL DETALLE DE EXPORTACION DEL PROCESO

    $DISABLED = "disabled";

    $ARRAYOBTENERNUMEROLINEA = $DREXPORTACION_ADO->obtenerNumeroLinea($_REQUEST['IDREEMBALAJE']);
    $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTexportacion($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);


    $FOLIO = $ARRAYVERFOLIO[0]['ID_FOLIO'];
    //$ARRAYULTIMOFOLIO = $DREXPORTACION_ADO->obtenerFolio($FOLIO);    
    $ARRAYULTIMOFOLIO = $EXIEXPORTACION_ADO->obtenerFolio($FOLIO);

    $NUMEROLINEA = ($ARRAYOBTENERNUMEROLINEA[0]['NUMEROLINEAN']) + 1;

    if ($ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO2'] == 0) {
        $FOLIOEXPORTACION = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
    } else {
        $FOLIOEXPORTACION =   $ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO2'];
    }
    $NUMEROFOLIODEXPORTACION = $FOLIOEXPORTACION + 1;

    //CONSULTA PARA LA OBTENCION DE LOS PARAMETROS DEL ESTANDAR DE EXPORTACION
    $ARRAYESTANDARDETALLE = $EEXPORTACION_ADO->verEstandar($_REQUEST['EEXPORTACION']);

    $EMBOLSADO = $ARRAYESTANDARDETALLE[0]['EMBOLSADO'];

    $PESONETOEESTANDAR = $ARRAYESTANDARDETALLE[0]['PESO_NETO_ESTANDAR'];
    $PESOBRUTOEESTANDAR = $ARRAYESTANDARDETALLE[0]['PESO_BRUTO_ESTANDAR'];

    $PESOENVASEESTANDAR = $ARRAYESTANDARDETALLE[0]['PESO_ENVASE_ESTANDAR'];
    $PESOPALLETEESTANDAR = $ARRAYESTANDARDETALLE[0]['PESO_PALLET_ESTANDAR'];
    $PDESHIDRATACIONEESTANDAR = $ARRAYESTANDARDETALLE[0]['PDESHIDRATACION_ESTANDAR'];
    //$PDESHIDRATACIONEESTANDAR=$_REQUEST['PDESHIDRATACIONDREXPORTACION'];
    $KILOSNETO = $_REQUEST['CANTIDADENVASEDEXPORTACION'] * $PESONETOEESTANDAR;
    $KILOSDESHIDRATACION = $KILOSNETO * (1 + ($PDESHIDRATACIONEESTANDAR / 100));
    $KILOSBRUTO = (($_REQUEST['CANTIDADENVASEDEXPORTACION'] * $PESOENVASEESTANDAR) + $KILOSDESHIDRATACION) + $PESOPALLETEESTANDAR;

    $FOLIOALIAS =  "EMPRESA:" . $_REQUEST['EMPRESA'] . "_PLANTA:" . $_REQUEST['PLANTA'] . "_TEMPORADA:" . $_REQUEST['TEMPORADA'] . "_TIPO_FOLIO:PRODUCTO TERMINADO_NUMEROLINEA:" . $NUMEROLINEA . "REEMBALAJE:" . $_REQUEST['IDREEMBALAJE'];
    $ARRAYVERFOLIOPOEXPO = $EXIEXPORTACION_ADO->buscarPorReembalajeNumeroLinea($_REQUEST['IDREEMBALAJE'], $NUMEROLINEA, $NUMEROFOLIODEXPORTACION);

    $DREXPORTACION->__SET('FOLIO_DREXPORTACION', $NUMEROFOLIODEXPORTACION);
    $DREXPORTACION->__SET('NUMERO_LINEA', $NUMEROLINEA);
    $DREXPORTACION->__SET('FOLIO_AUX_DREXPORTACION', $NUMEROFOLIODEXPORTACION);
    $DREXPORTACION->__SET('FECHA_EMBALADO_DREXPORTACION', $_REQUEST['FECHAEMBALADODEXPORTACION']);
    $DREXPORTACION->__SET('CANTIDAD_ENVASE_DREXPORTACION', $_REQUEST['CANTIDADENVASEDEXPORTACION']);
    $DREXPORTACION->__SET('KILOS_NETO_DREXPORTACION', $KILOSNETO);
    $DREXPORTACION->__SET('KILOS_BRUTO_DREXPORTACION', $KILOSBRUTO);
    $DREXPORTACION->__SET('KILOS_DESHIDRATACION_DREXPORTACION', $KILOSDESHIDRATACION);
    $DREXPORTACION->__SET('PDESHIDRATACION_DREXPORTACION', $PDESHIDRATACIONEESTANDAR);
    $DREXPORTACION->__SET('EMBOLSADO', $EMBOLSADO);
    $DREXPORTACION->__SET('ALIAS_FOLIO_DREXPORTACION', $FOLIOALIAS);
    $DREXPORTACION->__SET('ID_ESTANDAR', $_REQUEST['EEXPORTACION']);
    $DREXPORTACION->__SET('ID_CALIBRE', $_REQUEST['CALIBRE']);
    $DREXPORTACION->__SET('ID_FOLIO', $FOLIO);
    $DREXPORTACION->__SET('ID_PVESPECIES',  $_REQUEST['PVESPECIES']);
    $DREXPORTACION->__SET('ID_REEMBALAJE', $_REQUEST['IDREEMBALAJE']);
    $DREXPORTACION->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
    $DREXPORTACION->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $DREXPORTACION_ADO->agregarDrexportacion($DREXPORTACION);

    if (empty($ARRAYVERFOLIOPOEXPO)) {
        //UTILIZACION METODOS SET DEL MODELO
        //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
        $EXIEXPORTACION->__SET('FOLIO_EXIEXPORTACION', $NUMEROFOLIODEXPORTACION);
        $EXIEXPORTACION->__SET('NUMERO_LINEA', $NUMEROLINEA);
        $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $NUMEROFOLIODEXPORTACION);
        $EXIEXPORTACION->__SET('FECHA_EMBALADO_EXIEXPORTACION', $_REQUEST['FECHAEMBALADODEXPORTACION']);
        $EXIEXPORTACION->__SET('CANTIDAD_ENVASE_EXIEXPORTACION',  $_REQUEST['CANTIDADENVASEDEXPORTACION']);
        $EXIEXPORTACION->__SET('KILOS_NETO_EXIEXPORTACION', $KILOSNETO);
        $EXIEXPORTACION->__SET('KILOS_BRUTO_EXIEXPORTACION', $KILOSBRUTO);
        $EXIEXPORTACION->__SET('KILOS_DESHIRATACION_EXIEXPORTACION', $KILOSDESHIDRATACION);
        $EXIEXPORTACION->__SET('PDESHIDRATACION_EXIEXPORTACION', $PDESHIDRATACIONEESTANDAR);
        $EXIEXPORTACION->__SET('OBSERVACION_EXIESPORTACION', "-");
        $EXIEXPORTACION->__SET('EMBOLSADO', $EMBOLSADO);
        $EXIEXPORTACION->__SET('ALIAS_FOLIO_EXIESPORTACION', $FOLIOALIAS);
        $EXIEXPORTACION->__SET('ID_ESTANDAR', $_REQUEST['EEXPORTACION']);
        $EXIEXPORTACION->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
        $EXIEXPORTACION->__SET('ID_PVESPECIES', $_REQUEST['PVESPECIES']);
        $EXIEXPORTACION->__SET('ID_FOLIO', $FOLIO);
        $EXIEXPORTACION->__SET('ID_REEMBALAJE', $_REQUEST['IDREEMBALAJE']);
        $EXIEXPORTACION->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
        $EXIEXPORTACION->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $EXIEXPORTACION->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $EXIEXPORTACION->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $EXIEXPORTACION_ADO->agregarExiexportacionReembalaje($EXIEXPORTACION);
    }

    if ($ARRAYVERFOLIOPOEXPO) {
        //UTILIZACION METODOS SET DEL MODELO
        //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
        $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $NUMEROFOLIODEXPORTACION);
        $EXIEXPORTACION->__SET('FECHA_EMBALADO_EXIEXPORTACION', $_REQUEST['FECHAEMBALADODEXPORTACION']);
        $EXIEXPORTACION->__SET('CANTIDAD_ENVASE_EXIEXPORTACION',  $_REQUEST['CANTIDADENVASEDEXPORTACION']);
        $EXIEXPORTACION->__SET('KILOS_NETO_EXIEXPORTACION', $KILOSNETO);
        $EXIEXPORTACION->__SET('KILOS_BRUTO_EXIEXPORTACION', $KILOSBRUTO);
        $EXIEXPORTACION->__SET('KILOS_DESHIRATACION_EXIEXPORTACION', $KILOSDESHIDRATACION);
        $EXIEXPORTACION->__SET('PDESHIDRATACION_EXIEXPORTACION', $PDESHIDRATACIONEESTANDAR);
        $EXIEXPORTACION->__SET('OBSERVACION_EXIESPORTACION', "-");
        $EXIEXPORTACION->__SET('EMBOLSADO', $EMBOLSADO);
        $EXIEXPORTACION->__SET('ID_ESTANDAR', $_REQUEST['EEXPORTACION']);
        $EXIEXPORTACION->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
        $EXIEXPORTACION->__SET('ID_PVESPECIES', $_REQUEST['PVESPECIES']);
        $EXIEXPORTACION->__SET('ID_FOLIO', $FOLIO);
        $EXIEXPORTACION->__SET('ID_REEMBALAJE', $_REQUEST['IDREEMBALAJE']);
        $EXIEXPORTACION->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
        $EXIEXPORTACION->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $EXIEXPORTACION->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $EXIEXPORTACION->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $ARRAYVERFOLIOPOEXPO[0]['ID_EXIEXPORTACION']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $EXIEXPORTACION_ADO->agregarExiexportacionReembalaje($EXIEXPORTACION);
    }



    echo "
    <script type='text/javascript'>
        window.opener.refrescar()
        window.close();
        </script> 
    ";
}

if (isset($_REQUEST['EDITAR'])) {

    //OBTENER EL FOLIO DEL DETALLE DE EXPORTACION DEL PROCESO
    $ARRAYDPROCESOEXPORTACION2 = $DREXPORTACION_ADO->verDrexportacion($_REQUEST['IDDPROCESOEXPORTACION']);
    $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTexportacion($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
    $FOLIO = $ARRAYVERFOLIO[0]['ID_FOLIO'];

    $NUMEROLINEA = ($ARRAYDPROCESOEXPORTACION2[0]['NUMERO_LINEA']);
    $NUMEROFOLIODEXPORTACION = $ARRAYDPROCESOEXPORTACION2[0]['FOLIO_AUX_DREXPORTACION'];




    //CONSULTA PARA LA OBTENCION DE LOS PARAMETROS DEL ESTANDAR DE EXPORTACION
    $ARRAYESTANDARDETALLE = $EEXPORTACION_ADO->verEstandar($_REQUEST['EEXPORTACION']);

    $EMBOLSADO = $ARRAYESTANDARDETALLE[0]['EMBOLSADO'];

    $PESONETOEESTANDAR = $ARRAYESTANDARDETALLE[0]['PESO_NETO_ESTANDAR'];
    $PESOBRUTOEESTANDAR = $ARRAYESTANDARDETALLE[0]['PESO_BRUTO_ESTANDAR'];

    $PESOENVASEESTANDAR = $ARRAYESTANDARDETALLE[0]['PESO_ENVASE_ESTANDAR'];
    $PESOPALLETEESTANDAR = $ARRAYESTANDARDETALLE[0]['PESO_PALLET_ESTANDAR'];
    $PDESHIDRATACIONEESTANDAR = $ARRAYESTANDARDETALLE[0]['PDESHIDRATACION_ESTANDAR'];
    //$PDESHIDRATACIONEESTANDAR=$_REQUEST['PDESHIDRATACIONDREXPORTACION'];
    $KILOSNETO = $_REQUEST['CANTIDADENVASEDEXPORTACION'] * $PESONETOEESTANDAR;
    $KILOSDESHIDRATACION = $KILOSNETO * (1 + ($PDESHIDRATACIONEESTANDAR / 100));
    $KILOSBRUTO = (($_REQUEST['CANTIDADENVASEDEXPORTACION'] * $PESOENVASEESTANDAR) + $KILOSDESHIDRATACION) + $PESOPALLETEESTANDAR;
    //$NUMEROFOLIODEXPORTACION=$_REQUEST['NUMEROFOLIODEXPORTACION'];

    $ARRAYVERFOLIOPOEXPO = $EXIEXPORTACION_ADO->buscarPorReembalajeNumeroLinea($_REQUEST['IDREEMBALAJE'], $NUMEROLINEA, $NUMEROFOLIODEXPORTACION);

    $DREXPORTACION->__SET('FOLIO_DREXPORTACION', $NUMEROFOLIODEXPORTACION);
    $DREXPORTACION->__SET('FECHA_EMBALADO_DREXPORTACION', $_REQUEST['FECHAEMBALADODEXPORTACION']);
    $DREXPORTACION->__SET('CANTIDAD_ENVASE_DREXPORTACION', $_REQUEST['CANTIDADENVASEDEXPORTACION']);
    $DREXPORTACION->__SET('KILOS_NETO_DREXPORTACION', $KILOSNETO);
    $DREXPORTACION->__SET('KILOS_BRUTO_DREXPORTACION', $KILOSBRUTO);
    $DREXPORTACION->__SET('KILOS_DESHIDRATACION_DREXPORTACION', $KILOSDESHIDRATACION);
    $DREXPORTACION->__SET('PDESHIDRATACION_DREXPORTACION', $PDESHIDRATACIONEESTANDAR);
    $DREXPORTACION->__SET('EMBOLSADO', $EMBOLSADO);
    $DREXPORTACION->__SET('ID_ESTANDAR', $_REQUEST['EEXPORTACION']);
    $DREXPORTACION->__SET('ID_CALIBRE', $_REQUEST['CALIBRE']);
    $DREXPORTACION->__SET('ID_FOLIO', $FOLIO);
    $DREXPORTACION->__SET('ID_PVESPECIES',  $_REQUEST['PVESPECIES']);
    $DREXPORTACION->__SET('ID_REEMBALAJE', $_REQUEST['IDREEMBALAJE']);
    $DREXPORTACION->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
    $DREXPORTACION->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
    $DREXPORTACION->__SET('ID_DREXPORTACION', $_REQUEST['IDDPROCESOEXPORTACION']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $DREXPORTACION_ADO->actualizarDrexportacion($DREXPORTACION);


    if (empty($ARRAYVERFOLIOPOEXPO)) {
        //UTILIZACION METODOS SET DEL MODELO
        //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
        $EXIEXPORTACION->__SET('FOLIO_EXIEXPORTACION', $NUMEROFOLIODEXPORTACION);
        $EXIEXPORTACION->__SET('NUMERO_LINEA', $NUMEROLINEA);
        $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $NUMEROFOLIODEXPORTACION);
        $EXIEXPORTACION->__SET('FECHA_EMBALADO_EXIEXPORTACION', $_REQUEST['FECHAEMBALADODEXPORTACION']);
        $EXIEXPORTACION->__SET('CANTIDAD_ENVASE_EXIEXPORTACION',  $_REQUEST['CANTIDADENVASEDEXPORTACION']);
        $EXIEXPORTACION->__SET('KILOS_NETO_EXIEXPORTACION', $KILOSNETO);
        $EXIEXPORTACION->__SET('KILOS_BRUTO_EXIEXPORTACION', $KILOSBRUTO);
        $EXIEXPORTACION->__SET('KILOS_DESHIRATACION_EXIEXPORTACION', $KILOSDESHIDRATACION);
        $EXIEXPORTACION->__SET('PDESHIDRATACION_EXIEXPORTACION', $PDESHIDRATACIONEESTANDAR);
        $EXIEXPORTACION->__SET('OBSERVACION_EXIESPORTACION', "-");
        $EXIEXPORTACION->__SET('EMBOLSADO', $EMBOLSADO);
        $EXIEXPORTACION->__SET('ID_ESTANDAR', $_REQUEST['EEXPORTACION']);
        $EXIEXPORTACION->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
        $EXIEXPORTACION->__SET('ID_PVESPECIES', $_REQUEST['PVESPECIES']);
        $EXIEXPORTACION->__SET('ID_FOLIO', $FOLIO);
        $EXIEXPORTACION->__SET('ID_REEMBALAJE', $_REQUEST['IDREEMBALAJE']);
        $EXIEXPORTACION->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
        $EXIEXPORTACION->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $EXIEXPORTACION->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $EXIEXPORTACION->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $EXIEXPORTACION_ADO->agregarExiexportacionReembalaje($EXIEXPORTACION);
    }

    if ($ARRAYVERFOLIOPOEXPO) {
        //UTILIZACION METODOS SET DEL MODELO
        //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
        $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $NUMEROFOLIODEXPORTACION);
        $EXIEXPORTACION->__SET('FECHA_EMBALADO_EXIEXPORTACION', $_REQUEST['FECHAEMBALADODEXPORTACION']);
        $EXIEXPORTACION->__SET('CANTIDAD_ENVASE_EXIEXPORTACION',  $_REQUEST['CANTIDADENVASEDEXPORTACION']);
        $EXIEXPORTACION->__SET('KILOS_NETO_EXIEXPORTACION', $KILOSNETO);
        $EXIEXPORTACION->__SET('KILOS_BRUTO_EXIEXPORTACION', $KILOSBRUTO);
        $EXIEXPORTACION->__SET('KILOS_DESHIRATACION_EXIEXPORTACION', $KILOSDESHIDRATACION);
        $EXIEXPORTACION->__SET('PDESHIDRATACION_EXIEXPORTACION', $PDESHIDRATACIONEESTANDAR);
        $EXIEXPORTACION->__SET('OBSERVACION_EXIESPORTACION', "-");
        $EXIEXPORTACION->__SET('EMBOLSADO', $EMBOLSADO);
        $EXIEXPORTACION->__SET('ID_ESTANDAR', $_REQUEST['EEXPORTACION']);
        $EXIEXPORTACION->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
        $EXIEXPORTACION->__SET('ID_PVESPECIES', $_REQUEST['PVESPECIES']);
        $EXIEXPORTACION->__SET('ID_FOLIO', $FOLIO);
        $EXIEXPORTACION->__SET('ID_REEMBALAJE', $_REQUEST['IDREEMBALAJE']);
        $EXIEXPORTACION->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
        $EXIEXPORTACION->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $EXIEXPORTACION->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $EXIEXPORTACION->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $ARRAYVERFOLIOPOEXPO[0]['ID_EXIEXPORTACION']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $EXIEXPORTACION_ADO->actualizarExiexportacionReembalaje($EXIEXPORTACION);
    }



    echo "
        <script type='text/javascript'>
            window.opener.refrescar()
            window.close();
            </script> 
        ";
}


//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($_REQUEST['IDREEMBALAJE'])  && isset($_REQUEST['PRODUCTOR']) && isset($_REQUEST['PVESPECIES']) && isset($_REQUEST['EMPRESA']) && isset($_REQUEST['PLANTA']) && isset($_REQUEST['TEMPORADA'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDREEMBALAJE = $_REQUEST['IDREEMBALAJE'];
    $PRODUCTOR = $_REQUEST['PRODUCTOR'];
    $PVESPECIES = $_REQUEST['PVESPECIES'];
    $EMPRESA = $_REQUEST['EMPRESA'];
    $PLANTA = $_REQUEST['PLANTA'];
    $TEMPORADA = $_REQUEST['TEMPORADA'];
    $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
    $NOMBREPRODUCTOR = $ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'] . " - " . $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];


    $ARRAYPVESPECIES = $PVESPECIES_ADO->verPvespecies($PVESPECIES);
    $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($ARRAYPVESPECIES[0]['ID_VESPECIES']);
    $NOMBREVARIEDAD = $ARRAYVESPECIES[0]['NOMBRE_VESPECIES'];

    $NODATOURL = "1";
} else {

    $NODATOURL = "0";
}

//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($_REQUEST['IDDPROCESOEXPORTACION']) &&  isset($_REQUEST['PRODUCTOR']) && isset($_REQUEST['PVESPECIES']) && isset($_REQUEST['EMPRESA']) && isset($_REQUEST['PLANTA']) && isset($_REQUEST['TEMPORADA']) && isset($_REQUEST['OP'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDDPROCESOEXPORTACION = $_REQUEST['IDDPROCESOEXPORTACION'];
    $PRODUCTOR = $_REQUEST['PRODUCTOR'];
    $PVESPECIES = $_REQUEST['PVESPECIES'];
    $EMPRESA = $_REQUEST['EMPRESA'];
    $PLANTA = $_REQUEST['PLANTA'];
    $TEMPORADA = $_REQUEST['TEMPORADA'];
    $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
    $NOMBREPRODUCTOR = $ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'] . " - " . $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];


    $ARRAYPVESPECIES = $PVESPECIES_ADO->verPvespecies($PVESPECIES);
    $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($ARRAYPVESPECIES[0]['ID_VESPECIES']);
    $NOMBREVARIEDAD = $ARRAYVESPECIES[0]['NOMBRE_VESPECIES'];

    $NODATOURL = "1";

    $OP = $_REQUEST['OP'];
    //IDENTIFICACIONES DE OPERACIONES

    //crear =  OBTENCION DE DATOS PARA LA CREACION DE REGISTRO
    if ($OP == "crear") {

        $DISABLED = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDPROCESOEXPORTACION = $DREXPORTACION_ADO->verDrexportacion($IDDPROCESOEXPORTACION);
        foreach ($ARRAYDPROCESOEXPORTACION as $r) :

            $NUMEROFOLIODEXPORTACION = "" . $r['FOLIO_DREXPORTACION'];
            $FECHAEMBALADODEXPORTACION = "" . $r['FECHA_EMBALADO_DREXPORTACION'];
            $CANTIDADENVASEDEXPORTACION = "" . $r['CANTIDAD_ENVASE_DREXPORTACION'];
            $PDESHIDRATACIONDREXPORTACION = "" . $r['PDESHIDRATACION_DREXPORTACION'];

            $EEXPORTACION = "" . $r['ID_ESTANDAR'];
            $PVESPECIES = "" . $r['ID_PVESPECIES'];
            $CALIBRE = "" . $r['ID_CALIBRE'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $IDREEMBALAJE = "" . $r['ID_REEMBALAJE'];

            if (isset($r['ID_EMPRESA'])) {
                $EMPRESA = "" . $r['ID_EMPRESA'];
            } else {
                $EMPRESA = "" . $_REQUEST['EMPRESA'];
            }
            if (isset($r['ID_PLANTA'])) {
                $PLANTA = "" . $r['ID_PLANTA'];
            } else {
                $PLANTA = "" . $_REQUEST['PLANTA'];
            }
            if (isset($r['ID_TEMPORADA'])) {
                $TEMPORADA = "" . $r['ID_TEMPORADA'];
            } else {
                $TEMPORADA = "" . $_REQUEST['TEMPORADA'];
            }


        endforeach;
    }


    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        $DISABLED = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDPROCESOEXPORTACION = $DREXPORTACION_ADO->verDrexportacion($IDDPROCESOEXPORTACION);
        foreach ($ARRAYDPROCESOEXPORTACION as $r) :

            $NUMEROFOLIODEXPORTACION = "" . $r['FOLIO_DREXPORTACION'];
            $FECHAEMBALADODEXPORTACION = "" . $r['FECHA_EMBALADO_DREXPORTACION'];
            $CANTIDADENVASEDEXPORTACION = "" . $r['CANTIDAD_ENVASE_DREXPORTACION'];
            $PDESHIDRATACIONDREXPORTACION = "" . $r['PDESHIDRATACION_DREXPORTACION'];

            $EEXPORTACION = "" . $r['ID_ESTANDAR'];
            $PVESPECIES = "" . $r['ID_PVESPECIES'];
            $CALIBRE = "" . $r['ID_CALIBRE'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $IDREEMBALAJE = "" . $r['ID_REEMBALAJE'];

            if (isset($r['ID_EMPRESA'])) {
                $EMPRESA = "" . $r['ID_EMPRESA'];
            } else {
                $EMPRESA = "" . $_REQUEST['EMPRESA'];
            }
            if (isset($r['ID_PLANTA'])) {
                $PLANTA = "" . $r['ID_PLANTA'];
            } else {
                $PLANTA = "" . $_REQUEST['PLANTA'];
            }
            if (isset($r['ID_TEMPORADA'])) {
                $TEMPORADA = "" . $r['ID_TEMPORADA'];
            } else {
                $TEMPORADA = "" . $_REQUEST['TEMPORADA'];
            }


        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDPROCESOEXPORTACION = $DREXPORTACION_ADO->verDrexportacion($IDDPROCESOEXPORTACION);
        foreach ($ARRAYDPROCESOEXPORTACION as $r) :

            $NUMEROFOLIODEXPORTACION = "" . $r['FOLIO_DREXPORTACION'];
            $FECHAEMBALADODEXPORTACION = "" . $r['FECHA_EMBALADO_DREXPORTACION'];
            $CANTIDADENVASEDEXPORTACION = "" . $r['CANTIDAD_ENVASE_DREXPORTACION'];
            $PDESHIDRATACIONDREXPORTACION = "" . $r['PDESHIDRATACION_DREXPORTACION'];

            $EEXPORTACION = "" . $r['ID_ESTANDAR'];
            $PVESPECIES = "" . $r['ID_PVESPECIES'];
            $CALIBRE = "" . $r['ID_CALIBRE'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $IDREEMBALAJE = "" . $r['ID_REEMBALAJE'];

            if (isset($r['ID_EMPRESA'])) {
                $EMPRESA = "" . $r['ID_EMPRESA'];
            } else {
                $EMPRESA = "" . $_REQUEST['EMPRESA'];
            }
            if (isset($r['ID_PLANTA'])) {
                $PLANTA = "" . $r['ID_PLANTA'];
            } else {
                $PLANTA = "" . $_REQUEST['PLANTA'];
            }
            if (isset($r['ID_TEMPORADA'])) {
                $TEMPORADA = "" . $r['ID_TEMPORADA'];
            } else {
                $TEMPORADA = "" . $_REQUEST['TEMPORADA'];
            }


        endforeach;
    }
}

if ($_POST) {
    $FECHAEMBALADODEXPORTACION = $_REQUEST['FECHAEMBALADODEXPORTACION'];
    $CANTIDADENVASEDEXPORTACION = $_REQUEST['CANTIDADENVASEDEXPORTACION'];
    $PDESHIDRATACIONDREXPORTACION = $PDESHIDRATACIONEESTANDAR;

    $EEXPORTACION = $_REQUEST['EEXPORTACION'];
    $PVESPECIES =  $_REQUEST['PVESPECIES'];
    $CALIBRE =  $_REQUEST['CALIBRE'];
    $EMPRESA = "" . $_REQUEST['EMPRESA'];
    $PLANTA = "" . $_REQUEST['PLANTA'];
    $TEMPORADA = "" . $_REQUEST['TEMPORADA'];
}

if ($NODATOURL == "0") {

    header('Location: index.php');
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

                    FECHAEMBALADODEXPORTACION = document.getElementById("FECHAEMBALADODEXPORTACION").value;
                    PVESPECIES = document.getElementById("PVESPECIES").value;
                    EEXPORTACION = document.getElementById("EEXPORTACION").selectedIndex;
                    CANTIDADENVASEDEXPORTACION = document.getElementById("CANTIDADENVASEDEXPORTACION").value;
                    CALIBRE = document.getElementById("CALIBRE").selectedIndex;
                    TMANEJO = document.getElementById("TMANEJO").selectedIndex;

                    document.getElementById('val_fechaembalado').innerHTML = "";
                    document.getElementById('val_pvespecies').innerHTML = "";
                    document.getElementById('val_eexportacion').innerHTML = "";
                    document.getElementById('val_cantidadenvase').innerHTML = "";
                    document.getElementById('val_calibre').innerHTML = "";
                    document.getElementById('val_tmanejo').innerHTML = "";

                    if (FECHAEMBALADODEXPORTACION == null || FECHAEMBALADODEXPORTACION.length == 0 || /^\s+$/.test(FECHAEMBALADODEXPORTACION)) {
                        document.form_reg_dato.FECHAEMBALADODEXPORTACION.focus();
                        document.form_reg_dato.FECHAEMBALADODEXPORTACION.style.borderColor = "#FF0000";
                        document.getElementById('val_fechaembalado').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.FECHAEMBALADODEXPORTACION.style.borderColor = "#4AF575";

                    if (PVESPECIES == null || PVESPECIES == 0) {
                        document.form_reg_dato.PVESPECIES.focus();
                        document.form_reg_dato.PVESPECIES.style.borderColor = "#FF0000";
                        document.getElementById('val_pvespecies').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.PVESPECIES.style.borderColor = "#4AF575";

                    if (EEXPORTACION == null || EEXPORTACION == 0) {
                        document.form_reg_dato.EEXPORTACION.focus();
                        document.form_reg_dato.EEXPORTACION.style.borderColor = "#FF0000";
                        document.getElementById('val_eexportacion').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.EEXPORTACION.style.borderColor = "#4AF575";

                    if (CANTIDADENVASEDEXPORTACION == null || CANTIDADENVASEDEXPORTACION == 0) {
                        document.form_reg_dato.CANTIDADENVASEDEXPORTACION.focus();
                        document.form_reg_dato.CANTIDADENVASEDEXPORTACION.style.borderColor = "#FF0000";
                        document.getElementById('val_cantidadenvase').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.CANTIDADENVASEDEXPORTACION.style.borderColor = "#4AF575";

                    if (CALIBRE == null || CALIBRE == 0) {
                        document.form_reg_dato.CALIBRE.focus();
                        document.form_reg_dato.CALIBRE.style.borderColor = "#FF0000";
                        document.getElementById('val_calibre').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.CALIBRE.style.borderColor = "#4AF575";

            
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
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" onload="mueveReloj()">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php //include_once "../config/menu.php"; 
            ?>
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <!--
                                        <h4 class="box-title">Different Width</h4>
                                        -->
                    </div>

                    <form class="form" role="form" method="post" name="form_reg_dato" onsubmit="return validacion()">
                        <div class="box-body form-element">

                            <input type="hidden" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESA; ?>" />
                            <input type="hidden" id="PLANTA" name="PLANTA" value="<?php echo $PLANTA; ?>" />
                            <input type="hidden" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADA; ?>" />
                            <input type="hidden" id="PRODUCTOR" name="PRODUCTOR" value="<?php echo $PRODUCTOR; ?>" />
                            <input type="hidden" id="PVESPECIES" name="PVESPECIES" value="<?php echo $PVESPECIES; ?>" />
                            <input type="hidden" id="NUMEROFOLIODEXPORTACION" name="NUMEROFOLIODEXPORTACION" value="<?php echo $NUMEROFOLIODEXPORTACION; ?>" />
                            <input type="hidden" id="IDREEMBALAJE" name="IDREEMBALAJE" value="<?php echo $IDREEMBALAJE; ?>" />
                            <input type="hidden" id="IDDPROCESOEXPORTACION" name="IDDPROCESOEXPORTACION" value="<?php echo $IDDPROCESOEXPORTACION; ?>" />

                            <div class="form-group">
                                <label>Folio</label>
                                <input type="text" placeholder="Numero Folio" id="NUMEROFOLIODEXPORTACIONV" name="NUMEROFOLIODEXPORTACIONV" value="<?php echo $NUMEROFOLIODEXPORTACION; ?>" <?php echo $DISABLED2; ?> <?php echo $DISABLEDSTYLE2; ?> />
                            </div>

                            <div class="row">


                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Fecha Embalado </label>
                                        <input type="date" class="form-control" placeholder="Fecha Embalado " id="FECHAEMBALADODEXPORTACION" name="FECHAEMBALADODEXPORTACION" value="<?php echo $FECHAEMBALADODEXPORTACION; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                        <label id="val_fechaembalado" class="validacion"> </label>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">

                                        <label>Productor </label>
                                        <input type="text" class="form-control" placeholder="Nombre Productor" id="NOMBREPRODUCTOR" name="NOMBREPRODUCTOR" value="<?php echo $NOMBREPRODUCTOR; ?>" disabled style="background-color: #eeeeee;" />

                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Variedad</label>
                                        <input type="text" class="form-control" placeholder="Nombre Variedad" id="NOMBREVARIEDAD" name="NOMBREVARIEDAD" value="<?php echo $NOMBREVARIEDAD; ?>" disabled style="background-color: #eeeeee;" />
                                        <label id="val_pvespecies" class="validacion"> </label>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Estandar </label>
                                        <select class="form-control select2" id="EEXPORTACION" name="EEXPORTACION" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?>>
                                            <option></option>
                                            <?php foreach ($ARRAYESTANDAR as $r) : ?>
                                                <?php if ($ARRAYESTANDAR) {    ?>
                                                    <option value="<?php echo $r['ID_ESTANDAR']; ?>" <?php if ($EEXPORTACION == $r['ID_ESTANDAR']) {
                                                                                                            echo "selected";
                                                                                                        } ?>> <?php echo $r['NOMBRE_ESTANDAR'] ?> </option>
                                                <?php } else { ?>
                                                    <option>NO HAY DATOS REGISTRADOS </option>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </select>
                                        <label id="val_eexportacion" class="validacion"> </label>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Cantidad Envase </label>
                                        <input type="number" class="form-control" placeholder="Cantidad Envase" id="CANTIDADENVASEDEXPORTACION" name="CANTIDADENVASEDEXPORTACION" value="<?php echo $CANTIDADENVASEDEXPORTACION; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                        <label id="val_cantidadenvase" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Calibre</label>
                                        <select class="form-control select2" id="CALIBRE" name="CALIBRE" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?>>
                                            <option></option>
                                            <?php foreach ($ARRAYCALIBRE as $r) : ?>
                                                <?php if ($ARRAYCALIBRE) {    ?>
                                                    <option value="<?php echo $r['ID_CALIBRE']; ?>" <?php if ($CALIBRE == $r['ID_CALIBRE']) {
                                                                                                        echo "selected";
                                                                                                    } ?>> <?php echo $r['NOMBRE_CALIBRE'] ?> </option>
                                                <?php } else { ?>
                                                    <option>NO HAY DATOS REGISTRADOS </option>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </select>
                                        <label id="val_calibre" class="validacion"> </label>
                                    </div>
                                </div>
                                
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Tipo Manejo</label>
                                        <select class="form-control select2" id="TMANEJO" name="TMANEJO" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?>>
                                            <option></option>
                                            <?php foreach ($ARRAYTEMANEJO as $r) : ?>
                                                <?php if ($ARRAYTEMANEJO) {    ?>
                                                    <option value="<?php echo $r['ID_TMANEJO']; ?>" <?php if ($TMANEJO == $r['ID_TMANEJO']) {
                                                                                                        echo "selected";
                                                                                                    } ?>> <?php echo $r['NOMBRE_TMANEJO'] ?> </option>
                                                <?php } else { ?>
                                                    <option>No Hay Datos Registrados</option>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </select>
                                        <label id="val_tmanejo" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>

                            <!-- /.row -->


                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CERRAR" value="CERRAR" Onclick="cerrar();">
                                    <i class="ti-trash"></i> CERRAR
                                </button>
                                <?php if ($OP != "editar") { ?>
                                    <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED; ?>>
                                        <i class="ti-save-alt"></i> GUARDAR
                                    </button>
                                <?php } else { ?>
                                    <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="EDITAR" value="EDITAR">
                                        <i class="ti-save-alt"></i> EDITAR
                                    </button>
                                <?php } ?>


                            </div>
                        </div>
                    </form>
                </div>


                <!--.row -->
            </section>





            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php //include_once "../config/footer.php"; 
                ?>
                <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>