<?php
include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/ERECEPCION_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/FOLIO_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';



include_once '../controlador/RECEPCIONMP_ADO.php';
include_once '../controlador/DRECEPCIONMP_ADO.php';
include_once '../controlador/EXIMATERIAPRIMA_ADO.php';

include_once '../modelo/DRECEPCIONMP.php';
include_once '../modelo/EXIMATERIAPRIMA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR


$ERECEPCION_ADO =  new ERECEPCION_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();

$RECEPCIONMP_ADO =  new RECEPCIONMP_ADO();
$DRECEPCIONMP_ADO =  new DRECEPCIONMP_ADO();
$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();

//INIICIALIZAR MODELO
$DRECEPCIONMP =  new DRECEPCIONMP();
$EXIMATERIAPRIMA =  new EXIMATERIAPRIMA();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD



$IDDRECEPCION = "";
$IDRECEPCION = "";
$FOLIODRECEPCION = "";
$FOLIOMANUAL = "";
$FOLIOMANUALR = "";
$NUMEROFOLIODRECEPCION = "";
$GASIFICADORECEPCION = "";
$FECHACOSECHADRECEPCION = "";

$CANTIDADENVASEDRECEPCION = "";
$KILOSBRUTODRECEPCION = "";
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


$PESOENVASEESTANDAR = 0;
$PESOPALLETRECEPCION = 0;

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
$ARRAYESTANDAR = "";
$ARRAYVESPECIES;
$ARRAYDRECEPCION = "";
$ARRAYTMANEJO = "";
$ARRAYPRODUCTOR = "";

$ARRAYULTIMOFOLIO = "";
$ARRAYVERESTANDAR = "";
$ARRAYVERFOLIO = "";
$ARRAYVERFOLIOEXISTENCIA = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYESTANDAR = $ERECEPCION_ADO->listarEstandarPorEmpresaCBX($EMPRESAS);
$ARRAYTMANEJO = $TMANEJO_ADO->listarTmanejoCBX();
$ARRAYPRODUCTOR = $PRODUCTOR_ADO->listarProductorPorEmpresaCBX($EMPRESAS);
//$ARRAYPRODUCTOR = 
$ARRAYFECHAACTUAL = $DRECEPCIONMP_ADO->obtenerFecha();
$FECHACOSECHADRECEPCION = $ARRAYFECHAACTUAL[0]['FECHA'];
include_once "../config/validarDatosUrlD.php";


//OPERACIONES

if (isset($_REQUEST['EDITAR'])) {

    $KILOSBRUTODRECEPCION = $_REQUEST['KILOSBRUTODRECEPCION'];
    //CONSULTA PARA LA OBTENCION DE LOS PARAMETROS DEL ESTANDAR DE EXPORTACION
    $ARRAYVERESTANDAR = $ERECEPCION_ADO->verEstandar($_REQUEST['ESTANDAR']);
    //OBTENCIONS DE LOS DATOS, OBTENIDOS EN LA CONSULTA
    if ($KILOSBRUTODRECEPCION > 0 && $CANTIDADENVASEDRECEPCION > 0) {
        if ($ARRAYVERESTANDAR) {
            $PESOENVASEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_ENVASE_ESTANDAR'];
            if ($_REQUEST['PESOPALLETRECEPCION']) {
                $PESOPALLETEESTANDAR = $_REQUEST['PESOPALLETRECEPCION'];
            } else {
                $PESOPALLETEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_PALLET_ESTANDAR'];
            }

            $PESOENVASEESTANDAR = $PESOENVASEESTANDAR * $_REQUEST['CANTIDADENVASEDRECEPCION'];

            //OPERACIONES DE OBTENER NETO Y PROMEDIO  DEL DETALLE
            $KILOSNETODRECEPCION = $KILOSBRUTODRECEPCION - $PESOENVASEESTANDAR - $PESOPALLETEESTANDAR;
            $KILOSPROMEDIODRECEPCION = $KILOSNETODRECEPCION / $_REQUEST['CANTIDADENVASEDRECEPCION'];
        }
    }

    $DRECEPCIONMP->__SET('FECHA_COSECHA_DRECEPCION', $_REQUEST['FECHACOSECHADRECEPCION']);
    $DRECEPCIONMP->__SET('CANTIDAD_ENVASE_DRECEPCION', $_REQUEST['CANTIDADENVASEDRECEPCION']);
    $DRECEPCIONMP->__SET('KILOS_NETO_DRECEPCION', $KILOSNETODRECEPCION);
    $DRECEPCIONMP->__SET('KILOS_BRUTO_DRECEPCION', $_REQUEST['KILOSBRUTODRECEPCION']);
    $DRECEPCIONMP->__SET('KILOS_PROMEDIO_DRECEPCION', $KILOSPROMEDIODRECEPCION);
    $DRECEPCIONMP->__SET('PESO_PALLET_DRECEPCION', $_REQUEST['PESOPALLETRECEPCION']);
    $DRECEPCIONMP->__SET('GASIFICADO_DRECEPCION', $_REQUEST['GASIFICADORECEPCION']);
    $DRECEPCIONMP->__SET('NOTA_DRECEPCION', $_REQUEST['NOTADRECEPCION']);
    $DRECEPCIONMP->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
    $DRECEPCIONMP->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
    $DRECEPCIONMP->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
    $DRECEPCIONMP->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
    $DRECEPCIONMP->__SET('ID_RECEPCION', $_REQUEST['IDP']);
    $DRECEPCIONMP->__SET('ID_DRECEPCION', $_REQUEST['ID']);
    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
    $DRECEPCIONMP_ADO->actualizarDrecepcion($DRECEPCIONMP);


    $ARRAYVERFOLIOEXISTENCIA = $EXIMATERIAPRIMA_ADO->buscarPorRecepcionNumeroFolio($_REQUEST['IDP'], $_REQUEST['NUMEROFOLIODRECEPCIONE']);
    if ($ARRAYVERFOLIOEXISTENCIA) {

        $EXIMATERIAPRIMA->__SET('FECHA_COSECHA_EXIMATERIAPRIMA', $_REQUEST['FECHACOSECHADRECEPCION']);
        $EXIMATERIAPRIMA->__SET('CANTIDAD_ENVASE_EXIMATERIAPRIMA', $_REQUEST['CANTIDADENVASEDRECEPCION']);
        $EXIMATERIAPRIMA->__SET('KILOS_NETO_EXIMATERIAPRIMA', $KILOSNETODRECEPCION);
        $EXIMATERIAPRIMA->__SET('KILOS_BRUTO_EXIMATERIAPRIMA', $_REQUEST['KILOSBRUTODRECEPCION']);
        $EXIMATERIAPRIMA->__SET('KILOS_PROMEDIO_EXIMATERIAPRIMA', $KILOSPROMEDIODRECEPCION);
        $EXIMATERIAPRIMA->__SET('PESO_PALLET_EXIMATERIAPRIMA', $_REQUEST['PESOPALLETRECEPCION']);
        $EXIMATERIAPRIMA->__SET('GASIFICADO', $_REQUEST['GASIFICADORECEPCION']);
        $EXIMATERIAPRIMA->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
        $EXIMATERIAPRIMA->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
        $EXIMATERIAPRIMA->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
        $EXIMATERIAPRIMA->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
        $EXIMATERIAPRIMA->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
        $EXIMATERIAPRIMA->__SET('ID_RECEPCION', $_REQUEST['IDP']);
        $EXIMATERIAPRIMA->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $EXIMATERIAPRIMA->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $EXIMATERIAPRIMA->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        $EXIMATERIAPRIMA->__SET('ID_EXIMATERIAPRIMA', $ARRAYVERFOLIOEXISTENCIA[0]["ID_EXIMATERIAPRIMA"]);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $EXIMATERIAPRIMA_ADO->actualizarEximateriaprimaRecepcion($EXIMATERIAPRIMA);
    } else {
        $NUMEROFOLIODRECEPCION = $_REQUEST["NUMEROFOLIODRECEPCIONE"];
        $FOLIOALIASESTACTICO = $NUMEROFOLIODRECEPCION;
        $FOLIOALIASDIANAMICO = "EMPRESA:" . $_REQUEST['EMPRESA'] . "_PLANTA:" . $_REQUEST['PLANTA'] . "_TEMPORADA:" . $_REQUEST['TEMPORADA'] .
            "_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:" . $_REQUEST['IDP'] . "_FOLIO:" . $NUMEROFOLIODRECEPCION;
        if ($_REQUEST["FOLIOMANUALE"] != "on") {
            $FOLIOMANUALR = "0";
        }
        if ($_REQUEST["FOLIOMANUALE"] == "on") {
            $FOLIOMANUALR = "1";
        }
        $EXIMATERIAPRIMA->__SET('FOLIO_EXIMATERIAPRIMA', $NUMEROFOLIODRECEPCION);
        $EXIMATERIAPRIMA->__SET('FOLIO_AUXILIAR_EXIMATERIAPRIMA', $NUMEROFOLIODRECEPCION);
        $EXIMATERIAPRIMA->__SET('FOLIO_MANUAL', $FOLIOMANUALR);
        $EXIMATERIAPRIMA->__SET('FECHA_COSECHA_EXIMATERIAPRIMA', $_REQUEST['FECHACOSECHADRECEPCION']);
        $EXIMATERIAPRIMA->__SET('CANTIDAD_ENVASE_EXIMATERIAPRIMA', $_REQUEST['CANTIDADENVASEDRECEPCION']);
        $EXIMATERIAPRIMA->__SET('KILOS_NETO_EXIMATERIAPRIMA', $KILOSNETODRECEPCION);
        $EXIMATERIAPRIMA->__SET('KILOS_BRUTO_EXIMATERIAPRIMA', $_REQUEST['KILOSBRUTODRECEPCION']);
        $EXIMATERIAPRIMA->__SET('KILOS_PROMEDIO_EXIMATERIAPRIMA', $KILOSPROMEDIODRECEPCION);
        $EXIMATERIAPRIMA->__SET('PESO_PALLET_EXIMATERIAPRIMA', $_REQUEST['PESOPALLETRECEPCION']);
        $EXIMATERIAPRIMA->__SET('ALIAS_DINAMICO_FOLIO_EXIMATERIAPRIMA', $FOLIOALIASDIANAMICO);
        $EXIMATERIAPRIMA->__SET('ALIAS_ESTATICO_FOLIO_EXIMATERIAPRIMA', $FOLIOALIASESTACTICO);
        $EXIMATERIAPRIMA->__SET('GASIFICADO', $_REQUEST['GASIFICADORECEPCION']);
        $EXIMATERIAPRIMA->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
        $EXIMATERIAPRIMA->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
        $EXIMATERIAPRIMA->__SET('ID_FOLIO',  $_REQUEST['FOLIO']);
        $EXIMATERIAPRIMA->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
        $EXIMATERIAPRIMA->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
        $EXIMATERIAPRIMA->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
        $EXIMATERIAPRIMA->__SET('ID_RECEPCION', $_REQUEST['IDP']);
        $EXIMATERIAPRIMA->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $EXIMATERIAPRIMA->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $EXIMATERIAPRIMA->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $EXIMATERIAPRIMA_ADO->agregarEximateriaprimaRecepcion($EXIMATERIAPRIMA);
    }
    //REDIRECCIONAR A PAGINA registroRecepcionmp.php 
    $_SESSION["parametro"] =  $_REQUEST['IDP'];
    $_SESSION["parametro1"] =  $_REQUEST['OPP'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
}

if (isset($_REQUEST['ELIMINAR'])) {
    $FOLIOELIMINAR = $_REQUEST['NUMEROFOLIODRECEPCIONE'];
    $DRECEPCIONMP->__SET('ID_DRECEPCION', $_REQUEST['ID']);
    $DRECEPCIONMP_ADO->deshabilitar($DRECEPCIONMP);


    $EXIMATERIAPRIMA->__SET('ID_RECEPCION', $_REQUEST['IDP']);
    $EXIMATERIAPRIMA->__SET('FOLIO_AUXILIAR_EXIMATERIAPRIMA', $FOLIOELIMINAR);
    $EXIMATERIAPRIMA_ADO->deshabilitarRecepcion($EXIMATERIAPRIMA);

    $EXIMATERIAPRIMA->__SET('ID_RECEPCION', $_REQUEST['IDP']);
    $EXIMATERIAPRIMA->__SET('FOLIO_AUXILIAR_EXIMATERIAPRIMA', $FOLIOELIMINAR);
    $EXIMATERIAPRIMA_ADO->eliminadoRecepcion($EXIMATERIAPRIMA);

    $_SESSION["parametro"] =  $_REQUEST['IDP'];
    $_SESSION["parametro1"] =  $_REQUEST['OPP'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
}


//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
//OBTENCION DE DATOS ENVIADOR A LA URL
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO'])) {
    $IDP = $_SESSION['parametro'];
    $OPP = $_SESSION['parametro1'];
    $URLO = $_SESSION['urlO'];

    $ARRAYRECEPCION = $RECEPCIONMP_ADO->verRecepcion($IDP);
    foreach ($ARRAYRECEPCION as $r) :
        $TRECEPCION = "" . $r['TRECEPCION'];
        if ($TRECEPCION == "1") {
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $FECHARECEPCION = "" . $r['FECHA_RECEPCION'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": " . $ARRAYVERPRODUCTOR[0]["RUT_PRODUCTOR"] . "-" . $ARRAYVERPRODUCTOR[0]["DV_PRODUCTOR"] . ":" . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
        }
        if ($TRECEPCION == "2") {
            $PLANTA2 = "" . $r['ID_PLANTA2'];
        }
    endforeach;
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
    //crear =  OBTENCION DE DATOS PARA REGISTRAR INFORMACION
    if ($OP == "crear") {

        $DISABLED = "";
        $DISABLED2 = "";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "";
        $ARRAYDRECEPCION = $DRECEPCIONMP_ADO->verDrecepcion($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            // $NUMEROFOLIODRECEPCION = "" . $r['FOLIO_DRECEPCION'];
            /*
            if ($r['FOLIO_MANUAL'] == "1") {
                $FOLIOMANUAL = "on";
            }
            if ($r['FOLIO_MANUAL'] == "0") {
                $FOLIOMANUAL = "off";
            }*/
            $CANTIDADENVASEDRECEPCION = "" . $r['CANTIDAD_ENVASE_DRECEPCION'];
            $KILOSBRUTODRECEPCION = "" . $r['KILOS_BRUTO_DRECEPCION'];
            $KILOSNETODRECEPCION = "" . $r['KILOS_NETO_DRECEPCION'];
            $KILOSPROMEDIODRECEPCION = "" . $r['KILOS_PROMEDIO_DRECEPCION'];
            $PESOPALLETRECEPCION = "" . $r['PESO_PALLET_DRECEPCION'];
            $GASIFICADORECEPCION = "" . $r['GASIFICADO_DRECEPCION'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $ERECEPCION_ADO->verEstandar($ESTANDAR);
            if ($ARRAYVERESTANDAR) {
                $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
            }
            $FOLIO = "" . $r['ID_FOLIO'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $FECHACOSECHADRECEPCION = "" . $r['FECHA_COSECHA_DRECEPCION'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": " . $ARRAYVERPRODUCTOR[0]["RUT_PRODUCTOR"] . "-" . $ARRAYVERPRODUCTOR[0]["DV_PRODUCTOR"] . ":" . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        $DISABLED = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDRECEPCION = $DRECEPCIONMP_ADO->verDrecepcion($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            $NUMEROFOLIODRECEPCION = "" . $r['FOLIO_DRECEPCION'];
            if ($r['FOLIO_MANUAL'] == "1") {
                $FOLIOMANUAL = "on";
            }
            if ($r['FOLIO_MANUAL'] == "0") {
                $FOLIOMANUAL = "off";
            }
            $CANTIDADENVASEDRECEPCION = "" . $r['CANTIDAD_ENVASE_DRECEPCION'];
            $KILOSBRUTODRECEPCION = "" . $r['KILOS_BRUTO_DRECEPCION'];
            $KILOSNETODRECEPCION = "" . $r['KILOS_NETO_DRECEPCION'];
            $KILOSPROMEDIODRECEPCION = "" . $r['KILOS_PROMEDIO_DRECEPCION'];
            $PESOPALLETRECEPCION = "" . $r['PESO_PALLET_DRECEPCION'];
            $GASIFICADORECEPCION = "" . $r['GASIFICADO_DRECEPCION'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $ERECEPCION_ADO->verEstandar($ESTANDAR);
            if ($ARRAYVERESTANDAR) {
                $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
            }
            $FOLIO = "" . $r['ID_FOLIO'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $FECHACOSECHADRECEPCION = "" . $r['FECHA_COSECHA_DRECEPCION'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": " . $ARRAYVERPRODUCTOR[0]["RUT_PRODUCTOR"] . "-" . $ARRAYVERPRODUCTOR[0]["DV_PRODUCTOR"] . ":" . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDRECEPCION = $DRECEPCIONMP_ADO->verDrecepcion($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            $NUMEROFOLIODRECEPCION = "" . $r['FOLIO_DRECEPCION'];
            if ($r['FOLIO_MANUAL'] == "1") {
                $FOLIOMANUAL = "on";
            }
            if ($r['FOLIO_MANUAL'] == "0") {
                $FOLIOMANUAL = "off";
            }
            $CANTIDADENVASEDRECEPCION = "" . $r['CANTIDAD_ENVASE_DRECEPCION'];
            $KILOSBRUTODRECEPCION = "" . $r['KILOS_BRUTO_DRECEPCION'];
            $KILOSNETODRECEPCION = "" . $r['KILOS_NETO_DRECEPCION'];
            $KILOSPROMEDIODRECEPCION = "" . $r['KILOS_PROMEDIO_DRECEPCION'];
            $PESOPALLETRECEPCION = "" . $r['PESO_PALLET_DRECEPCION'];
            $GASIFICADORECEPCION = "" . $r['GASIFICADO_DRECEPCION'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $ERECEPCION_ADO->verEstandar($ESTANDAR);
            if ($ARRAYVERESTANDAR) {
                $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
            }
            $FOLIO = "" . $r['ID_FOLIO'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $FECHACOSECHADRECEPCION = "" . $r['FECHA_COSECHA_DRECEPCION'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": " . $ARRAYVERPRODUCTOR[0]["RUT_PRODUCTOR"] . "-" . $ARRAYVERPRODUCTOR[0]["DV_PRODUCTOR"] . ":" . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "eliminar") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $MENSAJEELIMINAR = "ESTA SEGURO DE ELIMINAR EL REGISTRO, PARA CONFIRMAR PRESIONE ELIMINAR";
        $ARRAYDRECEPCION = $DRECEPCIONMP_ADO->verDrecepcion($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            $NUMEROFOLIODRECEPCION = "" . $r['FOLIO_DRECEPCION'];
            if ($r['FOLIO_MANUAL'] == "1") {
                $FOLIOMANUAL = "on";
            }
            if ($r['FOLIO_MANUAL'] == "0") {
                $FOLIOMANUAL = "off";
            }
            $CANTIDADENVASEDRECEPCION = "" . $r['CANTIDAD_ENVASE_DRECEPCION'];
            $KILOSBRUTODRECEPCION = "" . $r['KILOS_BRUTO_DRECEPCION'];
            $KILOSNETODRECEPCION = "" . $r['KILOS_NETO_DRECEPCION'];
            $KILOSPROMEDIODRECEPCION = "" . $r['KILOS_PROMEDIO_DRECEPCION'];
            $PESOPALLETRECEPCION = "" . $r['PESO_PALLET_DRECEPCION'];
            $GASIFICADORECEPCION = "" . $r['GASIFICADO_DRECEPCION'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $ERECEPCION_ADO->verEstandar($ESTANDAR);
            if ($ARRAYVERESTANDAR) {
                $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
            }
            $FOLIO = "" . $r['ID_FOLIO'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $FECHACOSECHADRECEPCION = "" . $r['FECHA_COSECHA_DRECEPCION'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": " . $ARRAYVERPRODUCTOR[0]["RUT_PRODUCTOR"] . "-" . $ARRAYVERPRODUCTOR[0]["DV_PRODUCTOR"] . ":" . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
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
    if (isset($_REQUEST['FECHACOSECHADRECEPCION'])) {
        $FECHACOSECHADRECEPCION = $_REQUEST['FECHACOSECHADRECEPCION'];
    }
    if (isset($_REQUEST['PRODUCTOR'])) {
        $PRODUCTOR = $_REQUEST['PRODUCTOR'];
    }
    if (isset($_REQUEST['GASIFICADORECEPCION'])) {
        $GASIFICADORECEPCION = $_REQUEST['GASIFICADORECEPCION'];
    }
    if (isset($_REQUEST['ESTANDAR'])) {
        $ESTANDAR = $_REQUEST['ESTANDAR'];
        $ARRAYVERESTANDAR = $ERECEPCION_ADO->verEstandar($ESTANDAR);
        if ($ARRAYVERESTANDAR) {
            $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
            if ($_REQUEST['PESOPALLETRECEPCION']) {
                $PESOPALLETRECEPCION = $_REQUEST['PESOPALLETRECEPCION'];
            } else {
                if ($ARRAYVERESTANDAR) {
                    $PESOPALLETRECEPCION = $ARRAYVERESTANDAR[0]['PESO_PALLET_ESTANDAR'];
                } else {
                    $PESOPALLETRECEPCION = "";
                }
            }
        }
    }

    if (isset($_REQUEST['VESPECIES'])) {
        $VESPECIES = $_REQUEST['VESPECIES'];
    }
    if (isset($_REQUEST['TMANEJO'])) {
        $TMANEJO = $_REQUEST['TMANEJO'];
    }
    if (isset($_REQUEST['CANTIDADENVASEDRECEPCION'])) {
        $CANTIDADENVASEDRECEPCION = $_REQUEST['CANTIDADENVASEDRECEPCION'];
    }
    if (isset($_REQUEST['KILOSBRUTODRECEPCION'])) {
        $KILOSBRUTODRECEPCION = $_REQUEST['KILOSBRUTODRECEPCION'];
        //CONSULTA PARA LA OBTENCION DE LOS PARAMETROS DEL ESTANDAR DE EXPORTACION
        $ARRAYVERESTANDAR = $ERECEPCION_ADO->verEstandar($_REQUEST['ESTANDAR']);
        //OBTENCIONS DE LOS DATOS, OBTENIDOS EN LA CONSULTA
        if ($KILOSBRUTODRECEPCION > 0 && $CANTIDADENVASEDRECEPCION > 0) {
            if ($ARRAYVERESTANDAR) {
                $PESOENVASEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_ENVASE_ESTANDAR'];
                if ($_REQUEST['PESOPALLETRECEPCION']) {
                    $PESOPALLETEESTANDAR = $_REQUEST['PESOPALLETRECEPCION'];
                } else {
                    $PESOPALLETEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_PALLET_ESTANDAR'];
                }

                $PESOENVASEESTANDAR = $PESOENVASEESTANDAR * $_REQUEST['CANTIDADENVASEDRECEPCION'];

                //OPERACIONES DE OBTENER NETO Y PROMEDIO  DEL DETALLE
                $KILOSNETODRECEPCION = $KILOSBRUTODRECEPCION - $PESOENVASEESTANDAR - $PESOPALLETEESTANDAR;
                $KILOSPROMEDIODRECEPCION = $KILOSNETODRECEPCION / $_REQUEST['CANTIDADENVASEDRECEPCION'];
            }
        }
    }
    if (isset($_REQUEST['NOTADRECEPCION'])) {
        $NOTADRECEPCION = $_REQUEST['NOTADRECEPCION'];
    }
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Detalle Recepcion</title>
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

                    FOLIOMANUAL = document.getElementById('FOLIOMANUAL').checked;
                    FECHACOSECHADRECEPCION = document.getElementById("FECHACOSECHADRECEPCION").value;
                    TRECEPCION = document.getElementById("TRECEPCION").value;
                    ESTANDAR = document.getElementById("ESTANDAR").selectedIndex;
                    GASIFICADORECEPCION = document.getElementById("GASIFICADORECEPCION").selectedIndex;
                    VESPECIES = document.getElementById("VESPECIES").selectedIndex;
                    TMANEJO = document.getElementById("TMANEJO").selectedIndex;
                    PESOPALLETRECEPCION = document.getElementById("PESOPALLETRECEPCION").value;
                    CANTIDADENVASEDRECEPCION = document.getElementById("CANTIDADENVASEDRECEPCION").value;
                    KILOSBRUTODRECEPCION = document.getElementById("KILOSBRUTODRECEPCION").value;
                    //NOTADRECEPCION = document.getElementById("NOTADRECEPCION").value;

                    document.getElementById('val_fechacosecha').innerHTML = "";
                    document.getElementById('val_estandar').innerHTML = "";
                    document.getElementById('val_gasificacion').innerHTML = "";
                    document.getElementById('val_vespecies').innerHTML = "";
                    document.getElementById('val_tmanejo').innerHTML = "";
                    document.getElementById('val_pesopallet').innerHTML = "";
                    document.getElementById('val_cantidadenvase').innerHTML = "";
                    document.getElementById('val_kilosbruto').innerHTML = "";
                    //document.getElementById('val_nota').innerHTML = "";

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
                    if (FECHACOSECHADRECEPCION == null || FECHACOSECHADRECEPCION.length == 0 || /^\s+$/.test(FECHACOSECHADRECEPCION)) {
                        document.form_reg_dato.FECHACOSECHADRECEPCION.focus();
                        document.form_reg_dato.FECHACOSECHADRECEPCION.style.borderColor = "#FF0000";
                        document.getElementById('val_fechacosecha').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.FECHACOSECHADRECEPCION.style.borderColor = "#4AF575";

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

                    if (TMANEJO == null || TMANEJO == 0) {
                        document.form_reg_dato.TMANEJO.focus();
                        document.form_reg_dato.TMANEJO.style.borderColor = "#FF0000";
                        document.getElementById('val_tmanejo').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TMANEJO.style.borderColor = "#4AF575";

                    if (PESOPALLETRECEPCION == null || PESOPALLETRECEPCION == 0) {
                        document.form_reg_dato.PESOPALLETRECEPCION.focus();
                        document.form_reg_dato.PESOPALLETRECEPCION.style.borderColor = "#FF0000";
                        document.getElementById('val_pesopallet').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.PESOPALLETRECEPCION.style.borderColor = "#4AF575";

                    if (CANTIDADENVASEDRECEPCION == null || CANTIDADENVASEDRECEPCION == 0) {
                        document.form_reg_dato.CANTIDADENVASEDRECEPCION.focus();
                        document.form_reg_dato.CANTIDADENVASEDRECEPCION.style.borderColor = "#FF0000";
                        document.getElementById('val_cantidadenvase').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.CANTIDADENVASEDRECEPCION.style.borderColor = "#4AF575";

                    if (KILOSBRUTODRECEPCION == null || KILOSBRUTODRECEPCION == 0) {
                        document.form_reg_dato.KILOSBRUTODRECEPCION.focus();
                        document.form_reg_dato.KILOSBRUTODRECEPCION.style.borderColor = "#FF0000";
                        document.getElementById('val_kilosbruto').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.KILOSBRUTODRECEPCION.style.borderColor = "#4AF575";



                    /*
                        if (NOTADRECEPCION == null || NOTA.length == 0 || /^\s+$/.test(NOTADRECEPCION)) {
                            document.form_reg_dato.NOTADRECEPCION.focus();
                            document.form_reg_dato.NOTADRECEPCION.style.borderColor = "#FF0000";
                            document.getElementById('val_nota').innerHTML = "NO HA INGRESADO DATOS";
                            return false;
                        }
                        document.form_reg_dato.NOTADRECEPCION.style.borderColor = "#4AF575";
                    */
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
                                            <li class="breadcrumb-item" aria-current="page">Granel</li>
                                            <li class="breadcrumb-item" aria-current="page">Recepción</li>
                                            <li class="breadcrumb-item" aria-current="page">Materia Prima</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Operaciónes Registro Detalle </a>
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
                                                <label>Fecha Cosecha </label>
                                                <input type="date" class="form-control" placeholder="Fecha Cosecha" id="FECHACOSECHADRECEPCION" name="FECHACOSECHADRECEPCION" value="<?php echo $FECHACOSECHADRECEPCION; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_fechacosecha" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="TRECEPCION" id="TRECEPCION" name="TRECEPCION" value="<?php echo $TRECEPCION; ?>" />
                                                <input type="hidden" class="form-control" placeholder="FOLIO" id="FOLIO" name="FOLIO" value="<?php echo $FOLIO; ?>" />
                                                <input type="hidden" class="form-control" placeholder="FECHARECEPCION" id="FECHARECEPCION" name="FECHARECEPCION" value="<?php echo $FECHARECEPCION; ?>" />
                                                <label>Productor </label>
                                                <?php if ($TRECEPCION == 1) { ?>
                                                    <input type="hidden" class="form-control" placeholder="PRODUCTOR" id="PRODUCTOR" name="PRODUCTOR" value="<?php echo $PRODUCTOR; ?>" />
                                                    <input type="text" class="form-control" placeholder="Productor" id="PRODUCTORV" name="PRODUCTORV" value="<?php echo $PRODUCTORDATOS; ?>" disabled style='background-color: #eeeeee;'"/>
                                                 <?php } ?>
                                                <?php if ($TRECEPCION == 2) { ?>
                                                    <select class=" form-control select2" id="PRODUCTOR" name="PRODUCTOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?>>
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
                                                                                                                } ?>> <?php

                                                                                                                        echo $r['NOMBRE_VESPECIES'];

                                                                                                                        ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados</option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_vespecies" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Tipo Manejo</label><br>
                                                <select class="form-control select2" id="TMANEJO" name="TMANEJO" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYTMANEJO as $r) : ?>
                                                        <?php if ($ARRAYTMANEJO) {    ?>
                                                            <option value="<?php echo $r['ID_TMANEJO']; ?>" <?php if ($TMANEJO == $r['ID_TMANEJO']) {
                                                                                                                echo "selected";
                                                                                                            } ?>> <?php

                                                                                                                    echo $r['NOMBRE_TMANEJO'];

                                                                                                                    ?>
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
                                                <label>Peso Pallet</label>
                                                <input type="number" class="form-control" placeholder="Peso Pallet" id="PESOPALLETRECEPCION" name="PESOPALLETRECEPCION" value="<?php echo $PESOPALLETRECEPCION; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_pesopallet" class="validacion"> </label>

                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Cantidad Envase</label>
                                                <input type="number" class="form-control" placeholder="Cantidad Envase" id="CANTIDADENVASEDRECEPCION" name="CANTIDADENVASEDRECEPCION" value="<?php echo $CANTIDADENVASEDRECEPCION; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_cantidadenvase" class="validacion"> </label>

                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Kilo Bruto</label>
                                                <input type="number" class="form-control" placeholder="Kilo Bruto" id="KILOSBRUTODRECEPCION" name="KILOSBRUTODRECEPCION" onchange="this.form.submit()" value="<?php echo $KILOSBRUTODRECEPCION; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_kilosbruto" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Kilo Neto</label>
                                                <input type="hidden" class="form-control" placeholder="KILOSPROMEDIODRECEPCION" id="KILOSPROMEDIODRECEPCION" name="KILOSPROMEDIODRECEPCION" value="<?php echo $KILOSPROMEDIODRECEPCION; ?>" />
                                                <input type="hidden" class="form-control" placeholder="KILOSNETODRECEPCION" id="KILOSNETODRECEPCION" name="KILOSNETODRECEPCION" value="<?php echo $KILOSNETODRECEPCION; ?>" />
                                                <input type="number" class="form-control" placeholder="Kilo Neto" id="KILOSNETODRECEPCIONV" name="KILOSNETODRECEPCIONV" value="<?php echo $KILOSNETODRECEPCION; ?>" disabled style='background-color: #eeeeee;'" />
                                        <label id=" val_kilosneto" class="validacion"> </label>
                                            </div>
                                        </div>
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
                                        <div class="btn-group btn-block col-3" role="group" aria-label="Acciones generales">
                                            <button type="button" class="btn  btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op');">
                                                <i class="ti-back-left "></i> Cancelar
                                            </button>
                                            <?php if ($OP == "") { ?>
                                                <button type="submit" class="btn btn-primary " data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" <?php echo $DISABLED; ?>>
                                                    <i class="ti-save-alt"></i> Crear
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <?php if ($OP == "crear") { ?>
                                                    <button type="submit" class="btn btn-primary " data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" <?php echo $DISABLED; ?>>
                                                        <i class="ti-save-alt"></i> Crear
                                                    </button>
                                                <?php } ?>
                                                <?php if ($OP == "editar") { ?>
                                                    <button type="submit" class="btn btn-warning   " data-toggle="tooltip" title="Editar" name="EDITAR" value="EDITAR" <?php echo $DISABLED; ?>>
                                                        <i class="ti-save-alt"></i> Editar
                                                    </button>
                                                <?php } ?>
                                                <?php if ($OP == "eliminar") { ?>
                                                    <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Eliminar" name="ELIMINAR" value="ELIMINAR">
                                                        <i class="ti-trash"></i> Eliminar
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
                <?php include_once "../config/footer.php";  ?>
                <?php include_once "../config/menuExtra.php";   ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
        <?php
        //OPERACION DE REGISTRO DE FILA
        if (isset($_REQUEST['CREAR'])) {

            //CONSULTA PARA OBTENER DATOS BASE PARA EL CALCULO DEL NUMEOR DE FOLIO Y NUMERO LINEA
            $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTmateriaprima($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
            $FOLIO = $ARRAYVERFOLIO[0]['ID_FOLIO'];
            $ARRAYULTIMOFOLIO = $EXIMATERIAPRIMA_ADO->obtenerFolio($FOLIO);
            if (isset($_REQUEST['FOLIOMANUAL'])) {
                $FOLIOMANUAL = $_REQUEST['FOLIOMANUAL'];
            }
            if ($FOLIOMANUAL == "on") {
                $NUMEROFOLIODRECEPCION = $_REQUEST['NUMEROFOLIODRECEPCION'];
                $FOLIOMANUALR = "1";
                $ARRAYFOLIOPOEXPO = $EXIMATERIAPRIMA_ADO->buscarPorFolio($NUMEROFOLIODRECEPCION);
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
                //$ARRAYULTIMOFOLIO = $DRECEPCIONPT_ADO->obtenerFolio($FOLIO);

                $ARRAYULTIMOFOLIO = $EXIMATERIAPRIMA_ADO->obtenerFolio($FOLIO);
                if ($ARRAYULTIMOFOLIO) {
                    if ($ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO'] == 0) {
                        $FOLIOEXPORTACION = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
                    } else {
                        $FOLIOEXPORTACION =   $ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO'];
                    }
                } else {
                    $FOLIOEXPORTACION = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
                }
                $NUMEROFOLIODRECEPCION = $FOLIOEXPORTACION + 1;
                $ARRAYFOLIOPOEXPO = $EXIMATERIAPRIMA_ADO->buscarPorFolio($NUMEROFOLIODRECEPCION);

                while (count($ARRAYFOLIOPOEXPO) == 1) {
                    $ARRAYFOLIOPOEXPO = $EXIMATERIAPRIMA_ADO->buscarPorFolio($NUMEROFOLIODRECEPCION);
                    if (count($ARRAYFOLIOPOEXPO) == 1) {
                        $NUMEROFOLIODRECEPCION += 1;
                    }
                };
            }
            $FOLIOALIASESTACTICO = $NUMEROFOLIODRECEPCION;
            $FOLIOALIASDIANAMICO = "EMPRESA:" . $_REQUEST['EMPRESA'] . "_PLANTA:" . $_REQUEST['PLANTA'] . "_TEMPORADA:" . $_REQUEST['TEMPORADA'] .
                "_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:" . $_REQUEST['IDP'] . "_FOLIO:" . $NUMEROFOLIODRECEPCION;


            $KILOSBRUTODRECEPCION = $_REQUEST['KILOSBRUTODRECEPCION'];
            //CONSULTA PARA LA OBTENCION DE LOS PARAMETROS DEL ESTANDAR DE EXPORTACION
            $ARRAYVERESTANDAR = $ERECEPCION_ADO->verEstandar($_REQUEST['ESTANDAR']);
            //OBTENCIONS DE LOS DATOS, OBTENIDOS EN LA CONSULTA
            if ($KILOSBRUTODRECEPCION > 0 && $CANTIDADENVASEDRECEPCION > 0) {
                if ($ARRAYVERESTANDAR) {
                    $PESOENVASEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_ENVASE_ESTANDAR'];
                    if ($_REQUEST['PESOPALLETRECEPCION']) {
                        $PESOPALLETEESTANDAR = $_REQUEST['PESOPALLETRECEPCION'];
                    } else {
                        $PESOPALLETEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_PALLET_ESTANDAR'];
                    }

                    $PESOENVASEESTANDAR = $PESOENVASEESTANDAR * $_REQUEST['CANTIDADENVASEDRECEPCION'];

                    //OPERACIONES DE OBTENER NETO Y PROMEDIO  DEL DETALLE
                    $KILOSNETODRECEPCION = $KILOSBRUTODRECEPCION - $PESOENVASEESTANDAR - $PESOPALLETEESTANDAR;
                    $KILOSPROMEDIODRECEPCION = $KILOSNETODRECEPCION / $_REQUEST['CANTIDADENVASEDRECEPCION'];
                }
            }

            //UTILIZACION METODOS SET DEL MODELO
            //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO

            if ($SINO == "0") {

                $DRECEPCIONMP->__SET('FOLIO_DRECEPCION', $NUMEROFOLIODRECEPCION);
                $DRECEPCIONMP->__SET('FOLIO_MANUAL', $FOLIOMANUALR);
                $DRECEPCIONMP->__SET('FECHA_COSECHA_DRECEPCION', $_REQUEST['FECHACOSECHADRECEPCION']);
                $DRECEPCIONMP->__SET('CANTIDAD_ENVASE_DRECEPCION', $_REQUEST['CANTIDADENVASEDRECEPCION']);
                $DRECEPCIONMP->__SET('KILOS_NETO_DRECEPCION', $KILOSNETODRECEPCION);
                $DRECEPCIONMP->__SET('KILOS_BRUTO_DRECEPCION', $_REQUEST['KILOSBRUTODRECEPCION']);
                $DRECEPCIONMP->__SET('KILOS_PROMEDIO_DRECEPCION', $KILOSPROMEDIODRECEPCION);
                $DRECEPCIONMP->__SET('PESO_PALLET_DRECEPCION', $_REQUEST['PESOPALLETRECEPCION']);
                $DRECEPCIONMP->__SET('GASIFICADO_DRECEPCION', $_REQUEST['GASIFICADORECEPCION']);
                $DRECEPCIONMP->__SET('NOTA_DRECEPCION', $_REQUEST['NOTADRECEPCION']);
                $DRECEPCIONMP->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                $DRECEPCIONMP->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
                $DRECEPCIONMP->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                $DRECEPCIONMP->__SET('ID_FOLIO', $FOLIO);
                $DRECEPCIONMP->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                $DRECEPCIONMP->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                $DRECEPCIONMP_ADO->agregarDrecepcion($DRECEPCIONMP);

                //OPERACIOENS SOBRE LA TABLA EXIMATERIPRIMA
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO
                $EXIMATERIAPRIMA->__SET('FOLIO_EXIMATERIAPRIMA', $NUMEROFOLIODRECEPCION);
                $EXIMATERIAPRIMA->__SET('FOLIO_AUXILIAR_EXIMATERIAPRIMA', $NUMEROFOLIODRECEPCION);
                $EXIMATERIAPRIMA->__SET('FOLIO_MANUAL', $FOLIOMANUALR);
                $EXIMATERIAPRIMA->__SET('FECHA_COSECHA_EXIMATERIAPRIMA', $_REQUEST['FECHACOSECHADRECEPCION']);
                $EXIMATERIAPRIMA->__SET('CANTIDAD_ENVASE_EXIMATERIAPRIMA', $_REQUEST['CANTIDADENVASEDRECEPCION']);
                $EXIMATERIAPRIMA->__SET('KILOS_NETO_EXIMATERIAPRIMA', $KILOSNETODRECEPCION);
                $EXIMATERIAPRIMA->__SET('KILOS_BRUTO_EXIMATERIAPRIMA', $_REQUEST['KILOSBRUTODRECEPCION']);
                $EXIMATERIAPRIMA->__SET('KILOS_PROMEDIO_EXIMATERIAPRIMA', $KILOSPROMEDIODRECEPCION);
                $EXIMATERIAPRIMA->__SET('PESO_PALLET_EXIMATERIAPRIMA', $_REQUEST['PESOPALLETRECEPCION']);
                $EXIMATERIAPRIMA->__SET('ALIAS_DINAMICO_FOLIO_EXIMATERIAPRIMA', $FOLIOALIASDIANAMICO);
                $EXIMATERIAPRIMA->__SET('ALIAS_ESTATICO_FOLIO_EXIMATERIAPRIMA', $FOLIOALIASESTACTICO);
                $EXIMATERIAPRIMA->__SET('GASIFICADO', $_REQUEST['GASIFICADORECEPCION']);
                $EXIMATERIAPRIMA->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
                $EXIMATERIAPRIMA->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                $EXIMATERIAPRIMA->__SET('ID_FOLIO',  $FOLIO);
                $EXIMATERIAPRIMA->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                $EXIMATERIAPRIMA->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                $EXIMATERIAPRIMA->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
                $EXIMATERIAPRIMA->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                $EXIMATERIAPRIMA->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $EXIMATERIAPRIMA->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                $EXIMATERIAPRIMA->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $EXIMATERIAPRIMA_ADO->agregarEximateriaprimaRecepcion($EXIMATERIAPRIMA);

                //REDIRECCIONAR A PAGINA registroRecepcionmp.php
                $_SESSION["parametro"] =  $_REQUEST['IDP'];
                $_SESSION["parametro1"] =  $_REQUEST['OPP'];

                echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Fila registrada",
                            text:"Se ha creado una fila para el detalle de recepcion",
                            showConfirmButton:true,
                            confirmButtonText:"Volver a recepcion"
                        }).then((result)=>{
                            if(result.value){
                                location.href ="' . $_REQUEST['URLO'] . '.php?op";
                            }
                        })
                    </script>';
            }
        }
        ?>
</body>

</html>