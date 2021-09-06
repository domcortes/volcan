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
include_once '../controlador/RMERCADO_ADO.php';
include_once '../controlador/MERCADO_ADO.php';


include_once '../controlador/TREEMBALAJE_ADO.php';
include_once '../controlador/REEMBALAJE_ADO.php';


include_once '../controlador/ERECEPCION_ADO.php';
include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/EINDUSTRIAL_ADO.php';

include_once '../controlador/DREXPORTACION_ADO.php';
include_once '../controlador/DRINDUSTRIAL_ADO.php';
include_once '../controlador/REEMBALAJE_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';



include_once '../controlador/EXIMATERIAPRIMA_ADO.php';
include_once '../controlador/EXIINDUSTRIAL_ADO.php';
include_once '../controlador/EXIEXPORTACION_ADO.php';

include_once '../modelo/EXIMATERIAPRIMA.php';
include_once '../modelo/EXIEXPORTACION.php';
include_once '../modelo/EXIINDUSTRIAL.php';

include_once '../modelo/DREXPORTACION.php';
include_once '../modelo/DRINDUSTRIAL.php';
include_once '../modelo/REEMBALAJE.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$FOLIO_ADO =  new FOLIO_ADO();

$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();

$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$EXIINDUSTRIAL_ADO =  new EXIINDUSTRIAL_ADO();


$DRINDUSTRIAL_ADO =  new DRINDUSTRIAL_ADO();
$DREXPORTACION_ADO =  new DREXPORTACION_ADO();

$ERECEPCION_ADO =  new ERECEPCION_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$EINDUSTRIAL_ADO =  new EINDUSTRIAL_ADO();

$TREEMBALAJE_ADO =  new TREEMBALAJE_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$PVESPECIES_ADO =  new PVESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$REEMBALAJE_ADO =  new REEMBALAJE_ADO();
$RMERCADO_ADO =  new RMERCADO_ADO();
$MERCADO_ADO =  new MERCADO_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();

//INIICIALIZAR MODELO

$REEMBALAJE =  new REEMBALAJE();
$EXIMATERIAPRIMA =  new EXIMATERIAPRIMA();
$EXIINDUSTRIAL =  new EXIINDUSTRIAL();
$EXIEXPORTACION =  new EXIEXPORTACION();
$DRINDUSTRIAL =  new DRINDUSTRIAL();
$DREXPORTACION =  new DREXPORTACION();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NUMERO = "";
$NUMEROVER = "";

$IDREEMBALAJE = "";
$IDEXIEXPORTACIONQUITAR = "";
$FOLIOEXIEXPORTACIONQUITAR = "";
$FECHAREEMBALAJE = "";
$FECHAINGRESOREEMBALAJE = "";
$FECHAMODIFCIACIONREEMBALAJE = "";
$TURNO = "";
$TREEMBALAJE = "";
$OBSERVACIONREEMBALAJE = "";
$PRODUCTOR = "";
$PVESPECIES = "";
$ESTADO = "";

$FOLIOELIMINAR = "";
$FOLIOELIMINARCAJA = "";

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";


$IDEMPRESA = "";
$IDPLANTA = "";
$IDTEMPORADA = "";

$TOTALENVASEE = 0;
$TOTALNETOE = 0;

$TOTALENVASEEX = 0;
$TOTALNETOEX = 0;
$TOTALBRUTOEX = 0;
$TOTALDESHIDRATACIONEX = 0;


$TOTALENVASEIND = 0;
$TOTALNETOIND = 0;
$TOTALBRUTOIND = 0;

$TOTALNETOEXPO = 0;
$TOTALENVASEEXPO = 0;
$DIFERENCIAKILOSNETOEXPO = 0;
$TOTALBRUTOEXPO = 0;
$PEXPORTACIONEXPOEX = 0;
$PEXPORTACIONEXPOINDU = 0;
$PEXPORTACIONEXPO = 0;


$DISABLED0 = "disabled";
$DISABLED = "";
$DISABLED2 = "disabled";
$DISABLED3 = "";
$DISABLEDSTYLE = "";
$DISABLEDSTYLE0 = "style='background-color: #eeeeee;'";
$DISABLEDFOLIO = "";
$MENSAJEFOLIO = "";


$FOCUS = "";
$BORDER = "";
$MENSAJE = "";
$MENSAJEVALIDATO = "";
$MENSAJEEXISTENCIA = "";
$MENSAJEEXPORTACION = "";
$MENSAJEINDUSTRIAL = "";
$MENSAJEDIFERENCIA = "";
$MENSAJEPORCENTAJE = "";

$IDOP = "";
$OP = "";

$SINO = "";

//INICIALIZAR ARREGLOS

$ARRAYREEMBALAJE = "";
$ARRAYREEMBALAJE2 = "";
$ARRAYREEMBALAJE3 = "";

$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";

$ARRAYPVESPECIES = "";
$ARRAYTREEMBALAJE = "";
$ARRAYPRODUCTOR = "";
$ARRAYVESPECIES = "";

$ARRAYEVERERECEPCIONID = "";
$ARRAYVEREEXPORTACION = "";
$ARRAYVEREINDUTRIAL = "";


$ARRAYEXIPRODUCTOTERMINADOTOMADO = "";
$ARRAYEXIPRODUCTOTERMINADOTOMADOPROCESADO = "";
$ARRAYEXISTENCIATOTALESREEMBALAJE = "";


$ARRAYVEREXIPRODUCTOTERMINADO = "";

$ARRAYEXIMATERIAPRIMA = "";
$ARRAYEXIEXPORTACION = "";
$ARRAYEXIINDUSTRIAL = "";
$ARRAYDEXPORTACION = "";
$ARRATDINDUSTRIAL = "";
$ARRAYTMANEJO = "";

$ARRAYDEXPORTACIONTOTALREEMBALAJE = "";
$ARRATDINDUSTRIALTOTALREEMBALAJE = "";

$ARRAYDEXPORTACIONPORREEMBALAJE = "";
$ARRATDINDUSTRIALPORREEMBALAJE = "";
$ARRAYFECHAACTUAL = "";
$ARRAYNUMERO = "";
$ARRAYFOLIO = "";
$ARRAYFOLIO2 = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
//FOLIO EXPORTACION
$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
$ARRAYPLANTA = $PLANTA_ADO->listarPlantaCBX();
$ARRAYTEMPORADA = $TEMPORADA_ADO->listarTemporadaCBX();
$ARRAYPRODUCTOR = $PRODUCTOR_ADO->listarProductorCBX();

$ARRAYTREEMBALAJE = $TREEMBALAJE_ADO->listarTreembalajeCBX();
$ARRAYFECHAACTUAL = $REEMBALAJE_ADO->obtenerFecha();
$FECHAREEMBALAJE = $ARRAYFECHAACTUAL[0]['FECHA'];

$ARRAYFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTexportacion($EMPRESAS, $PLANTAS, $TEMPORADAS);
$ARRAYFOLIO2 = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTindustrial($EMPRESAS, $PLANTAS, $TEMPORADAS);
if (empty($ARRAYFOLIO)) {
    $DISABLEDFOLIO = "disabled";
    $MENSAJEFOLIO = " NECESITA <b> CREAR LOS FOLIOS PT </b> , PARA OCUPAR LA <b> FUNCIONALIDAD </b>. FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
}

if (empty($ARRAYFOLIO2)) {
    $DISABLEDFOLIO = "disabled";
    $MENSAJEFOLIO = $MENSAJEFOLIO . "<br> NECESITA <b> CREAR LOS FOLIOS INDUSTRIAL </b> , PARA OCUPAR LA <b> FUNCIONALIDAD </b>. FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
}

//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {
    if ($_REQUEST['EMPRESA'] && $_REQUEST['PLANTA'] && $_REQUEST['TEMPORADA']) {
        $SINO = "0";
        $MENSAJEVALIDATO = "";
    } else {
        $SINO = "1";
        $MENSAJEVALIDATO = "DEBE TENER SELECIONADO EMPRESA, PLANTA Y TEMPORADA";
    }

    if ($SINO == "0") {


        $ARRAYNUMERO = $REEMBALAJE_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
        $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;
        //UTILIZACION METODOS SET DEL MODELO
        //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
        $REEMBALAJE->__SET('NUMERO_REEMBALAJE', $NUMERO);
        $REEMBALAJE->__SET('FECHA_REEMBALAJE', $_REQUEST['FECHAREEMBALAJE']);
        $REEMBALAJE->__SET('TURNO', $_REQUEST['TURNO']);
        $REEMBALAJE->__SET('OBSERVACIONE_REEMBALAJE', $_REQUEST['OBSERVACIONREEMBALAJE']);
        $REEMBALAJE->__SET('KILOS_NETO_REEMBALAJE', 0);
        $REEMBALAJE->__SET('KILOS_EXPORTACION_REEMBALAJE', 0);
        $REEMBALAJE->__SET('KILOS_INDUSTRIAL_REEMBALAJE', 0);
        $REEMBALAJE->__SET('PDEXPORTACION_REEMBALAJE', 0);
        $REEMBALAJE->__SET('PDINDUSTRIAL_REEMBALAJE', 0);
        $REEMBALAJE->__SET('PORCENTAJE_REEMBALAJE', 0);
        $REEMBALAJE->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $REEMBALAJE->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $REEMBALAJE->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        $REEMBALAJE->__SET('ID_PVESPECIES', $_REQUEST['PVESPECIES']);
        $REEMBALAJE->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
        $REEMBALAJE->__SET('ID_TREEMBALAJE', $_REQUEST['TREEMBALAJE']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR  HORAINGRESOREEMBALAJE
        $REEMBALAJE_ADO->agregarReembalaje($REEMBALAJE);
        //OBTENER EL ID DE LA RECEPCION CREADA PARA LUEGO ENVIAR EL INGRESO DEL DETALLE



        $ARRAYREEMBALAJE2 = $REEMBALAJE_ADO->buscarReembalajeID(
            $_REQUEST['FECHAREEMBALAJE'],
            $_REQUEST['TURNO'],
            $_REQUEST['OBSERVACIONREEMBALAJE'],
            0,
            0,
            0,
            $_REQUEST['EMPRESA'],
            $_REQUEST['PLANTA'],
            $_REQUEST['TEMPORADA'],
            $_REQUEST['PVESPECIES'],
            $_REQUEST['PRODUCTOR'],
            $_REQUEST['TREEMBALAJE']
        );


        //REDIRECCIONAR A PAGINA registroRecepcion.php 
        echo "<script type='text/javascript'> location.href ='registroReembalajeEx.php?parametro=" . $ARRAYREEMBALAJE2[0]['ID_REEMBALAJE'] . "&&parametro1=crear';</script>";
    }
}


//OPERACION EDICION DE FILA
if (isset($_REQUEST['EDITAR'])) {
    //UTILIZACION METODOS SET DEL MODELO



    $ARRAYEXIPRODUCTOTERMINADOTOMADO = $EXIEXPORTACION_ADO->buscarPorProcesoEnReembalaje($_REQUEST['ID']);
    $ARRAYEXIPRODUCTOTERMINADOTOMADOPROCESADO = $EXIEXPORTACION_ADO->buscarPorProcesoReembalaje($_REQUEST['ID']);


    if (empty($ARRAYEXIPRODUCTOTERMINADOTOMADO) && empty($ARRAYEXIPRODUCTOTERMINADOTOMADOPROCESADO)) {
        $SINO = "1";
        $MENSAJEEXISTENCIA = "TIENE  QUE HABER AL MENOS UN REGISTRO DE EXISTENCIA SELECIOANDO";
    } else {
        $SINO = "0";
        $MENSAJEEXISTENCIA = "";
    }

    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   


    if ($SINO == "0") {
        $REEMBALAJE->__SET('FECHA_REEMBALAJE',  $_REQUEST['FECHAREEMBALAJEE']);
        $REEMBALAJE->__SET('TURNO',  $_REQUEST['TURNOE']);
        $REEMBALAJE->__SET('OBSERVACIONE_REEMBALAJE', $_REQUEST['OBSERVACIONREEMBALAJEE']);
        $REEMBALAJE->__SET('KILOS_NETO_REEMBALAJE', $_REQUEST['TOTALNETOEXPO']);
        $REEMBALAJE->__SET('KILOS_EXPORTACION_REEMBALAJE', $_REQUEST['TOTALDESHIDRATACIONEX']);
        $REEMBALAJE->__SET('KILOS_INDUSTRIAL_REEMBALAJE', $_REQUEST['TOTALNETOIND']);

        $REEMBALAJE->__SET('PDEXPORTACION_REEMBALAJE', $_REQUEST['PEXPORTACIONEXPOEX']);
        $REEMBALAJE->__SET('PDINDUSTRIAL_REEMBALAJE', $_REQUEST['PEXPORTACIONEXPOINDU']);
        $REEMBALAJE->__SET('PORCENTAJE_REEMBALAJE', $_REQUEST['PEXPORTACIONEXPO']);

        $REEMBALAJE->__SET('ID_PVESPECIES',  $_REQUEST['PVESPECIESE']);
        $REEMBALAJE->__SET('ID_PRODUCTOR',  $_REQUEST['PRODUCTORE']);
        $REEMBALAJE->__SET('ID_TREEMBALAJE', $_REQUEST['TREEMBALAJEE']);
        $REEMBALAJE->__SET('ID_EMPRESA',  $_REQUEST['EMPRESAE']);
        $REEMBALAJE->__SET('ID_PLANTA',  $_REQUEST['PLANTAE']);
        $REEMBALAJE->__SET('ID_TEMPORADA',  $_REQUEST['TEMPORADAE']);
        $REEMBALAJE->__SET('ID_REEMBALAJE', $_REQUEST['ID']);
        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
        $REEMBALAJE_ADO->actualizarReembalaje($REEMBALAJE);
    }
}

//OPERACION CERRAR DE FILA
if (isset($_REQUEST['CERRAR'])) {
    //UTILIZACION METODOS SET DEL MODELO

    $ARRAYEXIPRODUCTOTERMINADOTOMADO = $EXIEXPORTACION_ADO->buscarPorProcesoEnReembalaje($_REQUEST['ID']);
    $ARRAYEXIPRODUCTOTERMINADOTOMADOPROCESADO = $EXIEXPORTACION_ADO->buscarPorProcesoReembalaje($_REQUEST['ID']);
    $ARRAYDEXPORTACIONPORREEMBALAJE = $DREXPORTACION_ADO->buscarPorReembalaje($_REQUEST['ID']);
    $ARRATDINDUSTRIALPORREEMBALAJE = $DRINDUSTRIAL_ADO->buscarPorReembalaje($_REQUEST['ID']);


    if (empty($ARRAYEXIPRODUCTOTERMINADOTOMADO) && empty($ARRAYEXIPRODUCTOTERMINADOTOMADOPROCESADO)) {
        $SINO = "1";
        $MENSAJEEXISTENCIA = "TIENE  QUE HABER AL MENOS UN REGISTRO DE EXISTENCIA SELECIOANDO";
    } else {
        $SINO = "0";
        $MENSAJEEXISTENCIA = "";
    }

    if (empty($ARRAYDEXPORTACIONPORREEMBALAJE)) {
        $SINO = "1";
        $MENSAJEEXPORTACION = "TIENE  QUE HABER AL MENOS UN REGISTRO  PRODUCTO TERMINADO";
    } else {
        $SINO = "0";
        $MENSAJEEXPORTACION = "";
    }
    if (empty($ARRATDINDUSTRIALPORREEMBALAJE)) {
        $SINO = "1";
        $MENSAJEINDUSTRIAL = "TIENE  QUE HABER AL MENOS UN REGISTRO PRODUCTO INDUSTRIAL";
    } else {
        $SINO = "0";
        $MENSAJEINDUSTRIAL = "";
    }



    if ($_REQUEST['TOTALDESHIDRATACIONEX'] >  $_REQUEST['TOTALNETO']) {
        $SINO = "1";
        $MENSAJEDIFERENCIA = "LA DIFERENCIA NO PUEDE SER MENOR AL LO INGRESADO";
    } else {
        $SINO = "0";
        $MENSAJEDIFERENCIA = "";
    }
    if ($_REQUEST['PEXPORTACIONEXPO'] < 100) {
        $SINO = "1";
        $MENSAJEPORCENTAJE = "LA SUMA DE LOS % TIENE QUE SER 100";
    } else {

        $SINO = "0";
        $MENSAJEPORCENTAJE = "";
    }


    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO 
    if ($SINO == "0") {
        $REEMBALAJE->__SET('FECHA_REEMBALAJE',  $_REQUEST['FECHAREEMBALAJEE']);
        $REEMBALAJE->__SET('TURNO',  $_REQUEST['TURNOE']);
        $REEMBALAJE->__SET('OBSERVACIONE_REEMBALAJE', $_REQUEST['OBSERVACIONREEMBALAJEE']);
        $REEMBALAJE->__SET('KILOS_NETO_REEMBALAJE', $_REQUEST['TOTALNETOEXPO']);
        $REEMBALAJE->__SET('KILOS_EXPORTACION_REEMBALAJE', $_REQUEST['TOTALDESHIDRATACIONEX']);
        $REEMBALAJE->__SET('KILOS_INDUSTRIAL_REEMBALAJE', $_REQUEST['TOTALNETOIND']);
        $REEMBALAJE->__SET('PDEXPORTACION_REEMBALAJE', $_REQUEST['PEXPORTACIONEXPOEX']);
        $REEMBALAJE->__SET('PDINDUSTRIAL_REEMBALAJE', $_REQUEST['PEXPORTACIONEXPOINDU']);
        $REEMBALAJE->__SET('PORCENTAJE_REEMBALAJE', $_REQUEST['PEXPORTACIONEXPO']);
        $REEMBALAJE->__SET('ID_PVESPECIES',  $_REQUEST['PVESPECIESE']);
        $REEMBALAJE->__SET('ID_PRODUCTOR',  $_REQUEST['PRODUCTORE']);
        $REEMBALAJE->__SET('ID_TREEMBALAJE', $_REQUEST['TREEMBALAJEE']);
        $REEMBALAJE->__SET('ID_EMPRESA',  $_REQUEST['EMPRESAE']);
        $REEMBALAJE->__SET('ID_PLANTA',  $_REQUEST['PLANTAE']);
        $REEMBALAJE->__SET('ID_TEMPORADA',  $_REQUEST['TEMPORADAE']);
        $REEMBALAJE->__SET('ID_REEMBALAJE', $_REQUEST['ID']);
        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
        $REEMBALAJE_ADO->actualizarReembalaje($REEMBALAJE);

        $REEMBALAJE->__SET('ID_REEMBALAJE', $_REQUEST['ID']);
        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
        $REEMBALAJE_ADO->cerrado($REEMBALAJE);



        $ARRAYEXIPRODUCTOTERMINADOTOMADO = $EXIEXPORTACION_ADO->buscarPorProcesoEnReembalaje($_REQUEST['ID']);

        $ARRAYEXIEXPORTACION = $EXIEXPORTACION_ADO->buscarPorReembalaje($_REQUEST['ID']);
        $ARRAYEXIINDUSTRIAL = $EXIINDUSTRIAL_ADO->buscarPorReembalaje($_REQUEST['ID']);

        $ARRAYDEXPORTACION = $DREXPORTACION_ADO->buscarPorReembalaje($_REQUEST['ID']);
        $ARRATDINDUSTRIAL = $DRINDUSTRIAL_ADO->buscarPorReembalaje($_REQUEST['ID']);

        foreach ($ARRAYEXIPRODUCTOTERMINADOTOMADO as $s) :
            $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $s['ID_EXIEXPORTACION']);
            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
            $EXIEXPORTACION_ADO->Reembalaje($EXIEXPORTACION);
        endforeach;


        foreach ($ARRAYEXIEXPORTACION as $s) :
            $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $s['ID_EXIEXPORTACION']);
            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
            $EXIEXPORTACION_ADO->vigente($EXIEXPORTACION);
        endforeach;
        foreach ($ARRAYEXIINDUSTRIAL as $f) :
            $EXIINDUSTRIAL->__SET('ID_EXIINDUSTRIAL', $f['ID_EXIINDUSTRIAL']);
            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
            $EXIINDUSTRIAL_ADO->vigente($EXIINDUSTRIAL);
        endforeach;

        foreach ($ARRAYDEXPORTACION as $f) :
            $DREXPORTACION->__SET('ID_DREXPORTACION', $f['ID_DREXPORTACION']);
            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
            $DREXPORTACION_ADO->cerrado($DREXPORTACION);
        endforeach;

        foreach ($ARRATDINDUSTRIAL as $f) :
            $DRINDUSTRIAL->__SET('ID_DRINDUSTRIAL', $f['ID_DRINDUSTRIAL']);
            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
            $DRINDUSTRIAL_ADO->cerrado($DRINDUSTRIAL);
        endforeach;


        //REDIRECCIONAR A PAGINA registroRecepcion.php 
        //SEGUNE EL TIPO DE OPERACIONS QUE SE INDENTIFIQUE EN LA URL
        if ($_REQUEST['parametro1'] == "crear") {
            echo "<script type='text/javascript'> location.href ='registroReembalajeEx.php?parametro=" . $_REQUEST['ID'] . "&&parametro1=ver';</script>";
        }
        if ($_REQUEST['parametro1'] == "editar") {
            echo "<script type='text/javascript'> location.href ='registroReembalajeEx.php?parametro=" . $_REQUEST['ID'] . "&&parametro1=ver';</script>";
        }
    }
}

if (isset($_REQUEST['ELIMINAREXPO'])) {
    $FOLIOELIMINAR = $_REQUEST['FOLIOELIMINAREXPO'];
    $FOLIOELIMINARCAJA = $_REQUEST['FOLIOELIMINARCAJAEXPO'];


    $DREXPORTACION->__SET('FOLIO_AUX_DREXPORTACION', $FOLIOELIMINAR);
    $DREXPORTACION->__SET('CANTIDAD_ENVASE_DREXPORTACION', $FOLIOELIMINARCAJA);
    $DREXPORTACION_ADO->deshabilitar3($DREXPORTACION);

    $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $FOLIOELIMINAR);
    $EXIEXPORTACION->__SET('CANTIDAD_ENVASE_EXIEXPORTACION', $FOLIOELIMINARCAJA);
    $EXIEXPORTACION_ADO->deshabilitar3($EXIEXPORTACION);

    $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $FOLIOELIMINAR);
    $EXIEXPORTACION->__SET('CANTIDAD_ENVASE_EXIEXPORTACION', $FOLIOELIMINARCAJA);
    $EXIEXPORTACION_ADO->eliminado2($EXIEXPORTACION);
}
if (isset($_REQUEST['ELIMINARIND'])) {
    $FOLIOELIMINAR = $_REQUEST['FOLIOELIMINARIND'];
    $DRINDUSTRIAL->__SET('FOLIO_DRINDUSTRIAL', $FOLIOELIMINAR);
    $DRINDUSTRIAL_ADO->deshabilitar2($DRINDUSTRIAL);

    $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $FOLIOELIMINAR);
    $EXIINDUSTRIAL_ADO->deshabilitar2($EXIINDUSTRIAL);

    $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $FOLIOELIMINAR);
    $EXIINDUSTRIAL_ADO->eliminado($EXIINDUSTRIAL);
}


if (isset($_REQUEST['QUITAR'])) {


    $IDEXIEXPORTACIONQUITAR = $_REQUEST['IDEXIEXPORTACION'];
    $FOLIOEXIEXPORTACIONQUITAR = $_REQUEST['FOLIOAUXILIAREXIEXPORTACION'];


    $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $_REQUEST['FOLIOAUXILIAREXIEXPORTACION']);
    $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $_REQUEST['IDEXIEXPORTACION']);
    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
    $EXIEXPORTACION_ADO->actualizarDeselecionarReembalajeeCambiarEstado($EXIEXPORTACION);
}

//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($_REQUEST['parametro']) && isset($_REQUEST['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_REQUEST['parametro'];
    $OP = $_REQUEST['parametro1'];

    //OBTENECION DE INFORMACION DE LA TABLAS DE LA VISTA
    $ARRAYDEXPORTACIONPORREEMBALAJE = $DREXPORTACION_ADO->buscarPorReembalaje($IDOP);
    $ARRATDINDUSTRIALPORREEMBALAJE = $DRINDUSTRIAL_ADO->buscarPorReembalaje($IDOP);
    $ARRAYEXIPRODUCTOTERMINADOTOMADO = $EXIEXPORTACION_ADO->buscarPorProcesoEnReembalaje($IDOP);
    $ARRAYEXIPRODUCTOTERMINADOTOMADOPROCESADO = $EXIEXPORTACION_ADO->buscarPorProcesoReembalaje($IDOP);

    //OBTENCIONS DE TOTALES O EL RESUMEN DE LAS TABLAS

    $ARRAYEXISTENCIATOTALESREEMBALAJE = $EXIEXPORTACION_ADO->obtenerTotales($IDOP);


    $TOTALNETOE = $ARRAYEXISTENCIATOTALESREEMBALAJE[0]['TOTAL_NETO'];
    $TOTALENVASEE = $ARRAYEXISTENCIATOTALESREEMBALAJE[0]['TOTAL_ENVASE'];


    $ARRAYDEXPORTACIONTOTALREEMBALAJE = $DREXPORTACION_ADO->obtenerTotales($IDOP);
    $TOTALENVASEEX = $ARRAYDEXPORTACIONTOTALREEMBALAJE[0]['TOTAL_ENVASE'];
    $TOTALNETOEX = $ARRAYDEXPORTACIONTOTALREEMBALAJE[0]['TOTAL_NETO'];
    $TOTALBRUTOEX = $ARRAYDEXPORTACIONTOTALREEMBALAJE[0]['TOTAL_BRUTO'];
    $TOTALDESHIDRATACIONEX = $ARRAYDEXPORTACIONTOTALREEMBALAJE[0]['TOTAL_DESHIDRATACION'];

    $ARRATDINDUSTRIALTOTALREEMBALAJE = $DRINDUSTRIAL_ADO->obtenerTotales($IDOP);
    $TOTALNETOIND = $ARRATDINDUSTRIALTOTALREEMBALAJE[0]['TOTAL_NETO'];


    if ($TOTALNETOEX != 0 && $TOTALNETOE != 0) {
        $PEXPORTACIONEXPOEX = round((($TOTALDESHIDRATACIONEX) / $TOTALNETOE) * 100, 3);
    } else {
        $PEXPORTACIONEXPOEX = 0;
    }
    if ($TOTALNETOIND != 0 && $TOTALNETOE != 0) {
        $PEXPORTACIONEXPOINDU = round((($TOTALNETOIND) / $TOTALNETOE) * 100, 2);
    } else {
        $PEXPORTACIONEXPOINDU = 0;
    }

    $PEXPORTACIONEXPO = round(($PEXPORTACIONEXPOEX + $PEXPORTACIONEXPOINDU), 2);


    $TOTALENVASEEXPO = $TOTALENVASEEX + $TOTALENVASEIND;
    $TOTALNETOEXPO = $TOTALNETOEX + $TOTALNETOIND;
    $TOTALBRUTOEXPO = $TOTALBRUTOEX + $TOTALBRUTOIND;

    $DIFERENCIAKILOSNETOEXPO = round($TOTALNETOE - ($TOTALDESHIDRATACIONEX + $TOTALNETOIND), 2);

    //IDENTIFICACIONES DE OPERACIONES
    //crear =  OBTENCION DE DATOS INICIALES PARA PODER CREAR LA RECEPCION
    if ($OP == "crear") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $DISABLED0 = "disabled";
        $DISABLED = "";
        $DISABLED2 = "";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE0 = "style='background-color: #eeeeee;'";

        $ARRAYREEMBALAJE = $REEMBALAJE_ADO->verReembalaje2($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYREEMBALAJE as $r) :

            $IDREEMBALAJE = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_REEMBALAJE'];
            $FECHAREEMBALAJE = "" . $r['FECHA_REEMBALAJE'];
            $FECHAINGRESOREEMBALAJE = "" . $r['FECHA_INGRESOP'];
            $FECHAMODIFCIACIONREEMBALAJE = "" . $r['FECHA_MODIFICACIONP'];
            $TURNO = "" . $r['TURNO'];
            $TREEMBALAJE = "" . $r['ID_TREEMBALAJE'];
            $OBSERVACIONREEMBALAJE = "" . $r['OBSERVACIONE_REEMBALAJE'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYPVESPECIES = $PVESPECIES_ADO->buscarPorProductor($PRODUCTOR);
            $PVESPECIES = "" . $r['ID_PVESPECIES'];
            $ESTADO = "" . $r['ESTADO'];


        endforeach;
    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $DISABLED0 = "disabled";
        $DISABLED = "";
        $DISABLED2 = "";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE0 = "style='background-color: #eeeeee;'";
        $ARRAYREEMBALAJE = $REEMBALAJE_ADO->verReembalaje2($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYREEMBALAJE as $r) :

            $IDREEMBALAJE = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_REEMBALAJE'];
            $FECHAREEMBALAJE = "" . $r['FECHA_REEMBALAJE'];
            $FECHAINGRESOREEMBALAJE = "" . $r['FECHA_INGRESOP'];
            $FECHAMODIFCIACIONREEMBALAJE = "" . $r['FECHA_MODIFICACIONP'];
            $TURNO = "" . $r['TURNO'];
            $TREEMBALAJE = "" . $r['ID_TREEMBALAJE'];
            $OBSERVACIONREEMBALAJE = "" . $r['OBSERVACIONE_REEMBALAJE'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYPVESPECIES = $PVESPECIES_ADO->buscarPorProductor($PRODUCTOR);
            $PVESPECIES = "" . $r['ID_PVESPECIES'];
            $ESTADO = "" . $r['ESTADO'];

        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION

        $DISABLED0 = "disabled";
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE0 = "style='background-color: #eeeeee;'";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR  
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYREEMBALAJE = $REEMBALAJE_ADO->verReembalaje2($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYREEMBALAJE as $r) :
            $IDREEMBALAJE = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_REEMBALAJE'];
            $FECHAREEMBALAJE = "" . $r['FECHA_REEMBALAJE'];
            $FECHAINGRESOREEMBALAJE = "" . $r['FECHA_INGRESOP'];
            $FECHAMODIFCIACIONREEMBALAJE = "" . $r['FECHA_MODIFICACIONP'];
            $TURNO = "" . $r['TURNO'];
            $TREEMBALAJE = "" . $r['ID_TREEMBALAJE'];
            $OBSERVACIONREEMBALAJE = "" . $r['OBSERVACIONE_REEMBALAJE'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYPVESPECIES = $PVESPECIES_ADO->buscarPorProductor($PRODUCTOR);
            $PVESPECIES = "" . $r['ID_PVESPECIES'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
}



//REEMBALAJE PARA OBTENER LOS DATOS DEL FORMULARIO  Y MANTENERLO AL ACTUALIZACION QUE REALIZA EL SELECT DE PRODUCTOR
if (isset($_POST)) {
    if (isset($_REQUEST['FECHAREEMBALAJE'])) {
        $FECHAREEMBALAJE = $_REQUEST['FECHAREEMBALAJE'];
    }
    if (isset($_REQUEST['TURNO'])) {
        $TURNO = $_REQUEST['TURNO'];
    }
    if (isset($_REQUEST['TREEMBALAJE'])) {
        $TREEMBALAJE = $_REQUEST['TREEMBALAJE'];
    }
    if (isset($_REQUEST['OBSERVACIONREEMBALAJE'])) {
        $OBSERVACIONREEMBALAJE = $_REQUEST['OBSERVACIONREEMBALAJE'];
    }
    if (isset($_REQUEST['PRODUCTOR'])) {
        $PRODUCTOR = $_REQUEST['PRODUCTOR'];
        $ARRAYPVESPECIES = $PVESPECIES_ADO->buscarPorProductor($_REQUEST['PRODUCTOR']);
    }
    if (isset($_REQUEST['PVESPECIES'])) {
        $PVESPECIES = $_REQUEST['PVESPECIES'];
    }
    if (isset($_REQUEST['EMPRESA'])) {
        $EMPRESA = "" . $_REQUEST['EMPRESA'];
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
    <title> Registrar Reembalaje Producto Terminado</title>
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



                    FECHAREEMBALAJE = document.getElementById("FECHAREEMBALAJE").value;
                    TURNO = document.getElementById("TURNO").selectedIndex;
                    TREEMBALAJE = document.getElementById("TREEMBALAJE").selectedIndex;
                    PRODUCTOR = document.getElementById("PRODUCTOR").selectedIndex;
                    PVESPECIES = document.getElementById("PVESPECIES").selectedIndex;
                    OBSERVACIONREEMBALAJE = document.getElementById("OBSERVACIONREEMBALAJE").value;

                    document.getElementById('val_fechap').innerHTML = "";
                    document.getElementById('val_turno').innerHTML = "";

                    document.getElementById('val_tproceso').innerHTML = "";
                    document.getElementById('val_productor').innerHTML = "";
                    document.getElementById('val_variedad').innerHTML = "";
                    document.getElementById('val_observacion').innerHTML = "";

                    if (FECHAREEMBALAJE == null || FECHAREEMBALAJE.length == 0 || /^\s+$/.test(FECHAREEMBALAJE)) {
                        document.form_reg_dato.FECHAREEMBALAJE.focus();
                        document.form_reg_dato.FECHAREEMBALAJE.style.borderColor = "#FF0000";
                        document.getElementById('val_fechap').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.FECHAREEMBALAJE.style.borderColor = "#4AF575";


                    if (TURNO == null || TURNO == 0) {
                        document.form_reg_dato.TURNO.focus();
                        document.form_reg_dato.TURNO.style.borderColor = "#FF0000";
                        document.getElementById('val_turno').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TURNO.style.borderColor = "#4AF575";

                    if (TREEMBALAJE == null || TREEMBALAJE == 0) {
                        document.form_reg_dato.TREEMBALAJE.focus();
                        document.form_reg_dato.TREEMBALAJE.style.borderColor = "#FF0000";
                        document.getElementById('val_tproceso').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TREEMBALAJE.style.borderColor = "#4AF575";

                    if (PRODUCTOR == null || PRODUCTOR == 0) {
                        document.form_reg_dato.PRODUCTOR.focus();
                        document.form_reg_dato.PRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_productor').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.PRODUCTOR.style.borderColor = "#4AF575";


                    if (PVESPECIES == null || PVESPECIES == 0) {
                        document.form_reg_dato.PVESPECIES.focus();
                        document.form_reg_dato.PVESPECIES.style.borderColor = "#FF0000";
                        document.getElementById('val_variedad').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.PVESPECIES.style.borderColor = "#4AF575";

                    /*
                    if (OBSERVACIONREEMBALAJE == null || OBSERVACIONREEMBALAJE.length == 0 || /^\s+$/.test(OBSERVACIONREEMBALAJE)) {
                        document.form_reg_dato.OBSERVACIONREEMBALAJE.focus();
                        document.form_reg_dato.OBSERVACIONREEMBALAJE.style.borderColor = "#FF0000";
                        document.getElementById('val_observacion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.OBSERVACIONREEMBALAJE.style.borderColor = "#4AF575";
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
            <?php include_once "../config/menu.php"; ?>
            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Reembalaje</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Existencia</li>
                                            <li class="breadcrumb-item" aria-current="page">Reembalaje</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroReembalajeEx.php">Operaciones Reembalaje Producto Terminado </a>
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
                                            <div class="form-group">
                                                <label>Numero </label>
                                                <input type="hidden" class="form-control" placeholder="ID REEMBALAJE" id="ID" name="ID" value="<?php echo $IDREEMBALAJE; ?>" />
                                                <input type="number" class="form-control" style="background-color: #eeeeee;" placeholder="Numero Reembalaje " id="IDREEMBALAJE" name="IDREEMBALAJE" value="<?php echo $NUMEROVER; ?>" disabled />
                                                <label id="val_id" class="validacion"> </label>
                                            </div>
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
                                                <input type="hidden" class="form-control" placeholder="Fecha Ingreso " id="FECHAINGRESOREEMBALAJEE" name="FECHAINGRESOREEMBALAJEE" value="<?php echo $FECHAINGRESOREEMBALAJE; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="FECHA RECEPCION" id="FECHAINGRESOREEMBALAJE" name="FECHAINGRESOREEMBALAJE" value="<?php echo $FECHAINGRESOREEMBALAJE; ?>" disabled />
                                                <label id="val_fechai" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Fecha Modificacion</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Modificacion " id="FECHAMODIFCIACIONREEMBALAJEE" name="FECHAMODIFCIACIONREEMBALAJEE" value="<?php echo $FECHAMODIFCIACIONREEMBALAJE; ?>" />
                                                <input type="date" class="form-control " style="background-color: #eeeeee;" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACIONREEMBALAJE" name="FECHAMODIFCIACIONREEMBALAJE" value="<?php echo $FECHAMODIFCIACIONREEMBALAJE; ?>" disabled />
                                                <label id="val_fecham" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>

                                    <label id="val_validato" class="validacion"> <?php echo $MENSAJEVALIDATO; ?> </label>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Fecha </label>
                                                <input type="hidden" class="form-control" placeholder="FECHA REEMBALAJE" id="FECHAREEMBALAJEE" name="FECHAREEMBALAJEE" value="<?php echo $FECHAREEMBALAJE; ?>" />
                                                <input type="date" class="form-control" <?php echo $DISABLEDSTYLE; ?> <?php echo $DISABLEDFOLIO; ?> placeholder="Fecha Proceso" id="FECHAREEMBALAJE" name="FECHAREEMBALAJE" value="<?php echo $FECHAREEMBALAJE; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_fechap" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Turno</label>
                                                <input type="hidden" class="form-control" placeholder="TURNO" id="TURNOE" name="TURNOE" value="<?php echo $TURNO; ?>" />
                                                <select class="form-control select2" id="TURNO" name="TURNO" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                    <option></option>
                                                    <option value="1" <?php if ($TURNO == "1") {
                                                                            echo "selected";
                                                                        } ?>>Dia </option>
                                                    <option value="2" <?php if ($TURNO == "2") {
                                                                            echo "selected";
                                                                        } ?>> Noche</option>


                                                </select>
                                                <label id="val_turno" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-12">
                                            <div class="form-group">
                                                <label>Tipo Reembalaje</label>
                                                <input type="hidden" class="form-control" placeholder="TIPO REEMBALAJE" id="TREEMBALAJEE" name="TREEMBALAJEE" value="<?php echo $TREEMBALAJE; ?>" />
                                                <select class="form-control select2" id="TREEMBALAJE" name="TREEMBALAJE" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYTREEMBALAJE as $r) : ?>
                                                        <?php if ($ARRAYTREEMBALAJE) {    ?>
                                                            <option value="<?php echo $r['ID_TREEMBALAJE']; ?>" <?php if ($TREEMBALAJE == $r['ID_TREEMBALAJE']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_TREEMBALAJE'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_tproceso" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-12">
                                            <div class="form-group">
                                                <label>Productor</label>
                                                <input type="hidden" class="form-control" placeholder="PRODUCTOR" id="PRODUCTORE" name="PRODUCTORE" value="<?php echo $PRODUCTOR; ?>" />
                                                <select class="form-control select2" id="PRODUCTOR" name="PRODUCTOR" style="width: 100%;" onchange="this.form.submit()" <?php echo $DISABLED; ?> <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYPRODUCTOR as $r) : ?>
                                                        <?php if ($ARRAYPRODUCTOR) {    ?>
                                                            <option value="<?php echo $r['ID_PRODUCTOR']; ?>" <?php if ($PRODUCTOR == $r['ID_PRODUCTOR']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>>
                                                                <?php echo $r['CSG_PRODUCTOR'] ?> : <?php echo $r['NOMBRE_PRODUCTOR'] ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>

                                                <label id="val_productor" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-12">
                                            <div class="form-group">
                                                <label>Variedad</label>
                                                <input type="hidden" class="form-control" placeholder="Variedad" id="PVESPECIESE" name="PVESPECIESE" value="<?php echo $PVESPECIES; ?>" />
                                                <select class="form-control select2" id="PVESPECIES" name="PVESPECIES" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYPVESPECIES as $r) : ?>
                                                        <?php if ($ARRAYPVESPECIES) {    ?>
                                                            <option value="<?php echo $r['ID_PVESPECIES']; ?>" <?php if ($PVESPECIES == $r['ID_PVESPECIES']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php
                                                                                                                        $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
                                                                                                                        echo $ARRAYVESPECIES[0]['NOMBRE_VESPECIES']

                                                                                                                        ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>

                                                <label id="val_variedad" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="OBSERVACION REEMBALAJE" id="OBSERVACIONREEMBALAJEE" name="OBSERVACIONREEMBALAJEE" value="<?php echo $OBSERVACIONREEMBALAJE; ?>" />
                                                <label>Observaciones </label>
                                                <textarea class="form-control" rows="1" <?php echo $DISABLEDSTYLE; ?> placeholder="Ingrese Nota e Observacion  " id="OBSERVACIONREEMBALAJE" name="OBSERVACIONREEMBALAJE" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>><?php echo $OBSERVACIONREEMBALAJE; ?></textarea>

                                                <label id="val_observacion" class="validacion"> </label>
                                            </div>
                                        </div>

                                    </div>

                                    <!- selecionar existencia ->
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label>Ingreso / Existencia Producto Terminado </label>
                                                    <div class="table-responsive">
                                                        <table id="procesoexistencia" class="table table-hover " style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <a href="#" class="text-warning hover-warning">
                                                                            Folio
                                                                        </a>
                                                                    </th>
                                                                    <th class="text-center">Operaciones</th>
                                                                    <th>Fecha Embalado </th>
                                                                    <th>Estandar </th>
                                                                    <th>Cantidad Envases </th>
                                                                    <th>Kilo Neto </th>
                                                                    <th>% Deshidratacion </th>
                                                                    <th>Kilo Con Deshidratacion </th>
                                                                    <th>Embolsado</th>
                                                                    <th>Tipo Manejo</th>
                                                                    <th>Estado</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if ($ARRAYEXIPRODUCTOTERMINADOTOMADOPROCESADO) { ?>
                                                                    <?php foreach ($ARRAYEXIPRODUCTOTERMINADOTOMADOPROCESADO as $r) : ?>
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
                                                                                    <?php if ($ESTADO == 1) { ?>
                                                                                        <input type="hidden" class="form-control" id="IDEXIEXPORTACION" name="IDEXIEXPORTACION" value="<?php echo $r['ID_EXIEXPORTACION']; ?>" />
                                                                                        <input type="hidden" class="form-control" id="FOLIOAUXILIAREXIEXPORTACION" name="FOLIOAUXILIAREXIEXPORTACION" value="<?php echo $r['FOLIO_AUXILIAR_EXIEXPORTACION']; ?>" />
                                                                                        <button type="submit" class="btn btn-rounded btn-sm  btn-danger btn-outline mr-1" id="defecto" name="QUITAR" title="Quitar">
                                                                                            <i class="ti-close  "></i> 
                                                                                        </button>
                                                                                    <?php } else {
                                                                                        echo "-";
                                                                                    }  ?>
                                                                                </form>
                                                                            </td>
                                                                            <td><?php echo $r['FECHA_EMBALADO_EXIEXPORTACION']; ?></td>
                                                                            <td>
                                                                                <?php
                                                                                $ARRAYVEREEXPORTACION = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                                                echo $ARRAYVEREEXPORTACION[0]['NOMBRE_ESTANDAR'];
                                                                                ?>
                                                                            </td>
                                                                            <td><?php echo $r['CANTIDAD_ENVASE_EXIEXPORTACION']; ?></td>
                                                                            <td><?php echo $r['KILOS_NETO_EXIEXPORTACION']; ?></td>
                                                                            <td><?php echo $r['PDESHIDRATACION_EXIEXPORTACION']; ?></td>
                                                                            <td><?php echo $r['KILOS_DESHIRATACION_EXIEXPORTACION']; ?></td>
                                                                            <td>
                                                                                <?php
                                                                                if ($r['EMBOLSADO'] == "0") {
                                                                                    echo "No";
                                                                                }

                                                                                if ($r['EMBOLSADO'] == "1") {
                                                                                    echo "Si";
                                                                                }
                                                                                ?>
                                                                            </td>
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
                                                                                if ($r['ESTADO'] == "0") {
                                                                                    echo "Elimnado";
                                                                                }
                                                                                if ($r['ESTADO'] == "1") {
                                                                                    echo "Ingresando";
                                                                                }
                                                                                if ($r['ESTADO'] == "2") {
                                                                                    echo "Disponible";
                                                                                }
                                                                                if ($r['ESTADO'] == "3") {
                                                                                    echo "En Repaletizaje";
                                                                                }
                                                                                if ($r['ESTADO'] == "4") {
                                                                                    echo "Repaletizado";
                                                                                }
                                                                                if ($r['ESTADO'] == "5") {
                                                                                    echo "En Reembalaje";
                                                                                }
                                                                                if ($r['ESTADO'] == "6") {
                                                                                    echo "Reembalaje";
                                                                                }
                                                                                if ($r['ESTADO'] == "7") {
                                                                                    echo "En Despacho";
                                                                                }
                                                                                if ($r['ESTADO'] == "8") {
                                                                                    echo "Despachado";
                                                                                }
                                                                                ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                <?php } ?>

                                                                <?php if ($ARRAYEXIPRODUCTOTERMINADOTOMADO) { ?>
                                                                    <?php foreach ($ARRAYEXIPRODUCTOTERMINADOTOMADO as $r) : ?>
                                                                        <tr class="center">
                                                                            <td>
                                                                                <?php
                                                                                echo $r['FOLIO_AUXILIAR_EXIEXPORTACION'];
                                                                                ?>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <form method="post" id="form1">
                                                                                    <?php if ($ESTADO == 1) { ?>
                                                                                        <input type="hidden" class="form-control" id="IDEXIEXPORTACION" name="IDEXIEXPORTACION" value="<?php echo $r['ID_EXIEXPORTACION']; ?>" />
                                                                                        <input type="hidden" class="form-control" id="FOLIOAUXILIAREXIEXPORTACION" name="FOLIOAUXILIAREXIEXPORTACION" value="<?php echo $r['FOLIO_AUXILIAR_EXIEXPORTACION']; ?>" />
                                                                                        <button type="submit" class="btn btn-rounded btn-sm  btn-danger btn-outline mr-1" id="defecto" name="QUITAR" Tittle="Quitar">
                                                                                            <i class="ti-close  "></i> 
                                                                                        </button>
                                                                                    <?php } else {
                                                                                        echo "-";
                                                                                    }  ?>
                                                                                </form>
                                                                            </td>
                                                                            <td><?php echo $r['FECHA_EMBALADO_EXIEXPORTACION']; ?></td>
                                                                            <td>
                                                                                <?php
                                                                                $ARRAYVEREEXPORTACION = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                                                echo $ARRAYVEREEXPORTACION[0]['NOMBRE_ESTANDAR'];
                                                                                ?>
                                                                            </td>
                                                                            <td><?php echo $r['CANTIDAD_ENVASE_EXIEXPORTACION']; ?></td>
                                                                            <td><?php echo $r['KILOS_NETO_EXIEXPORTACION']; ?></td>
                                                                            <td><?php echo $r['PDESHIDRATACION_EXIEXPORTACION']; ?></td>
                                                                            <td><?php echo $r['KILOS_DESHIRATACION_EXIEXPORTACION']; ?></td>
                                                                            <td>
                                                                                <?php
                                                                                if ($r['EMBOLSADO'] == "0") {
                                                                                    echo "No";
                                                                                }

                                                                                if ($r['EMBOLSADO'] == "1") {
                                                                                    echo "Si";
                                                                                }
                                                                                ?>
                                                                            </td>
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
                                                                                if ($r['ESTADO'] == "1") {
                                                                                    echo "Ingresando";
                                                                                }
                                                                                if ($r['ESTADO'] == "2") {
                                                                                    echo "Disponible";
                                                                                }
                                                                                if ($r['ESTADO'] == "3") {
                                                                                    echo "Despachado";
                                                                                }
                                                                                if ($r['ESTADO'] == "4") {
                                                                                    echo "Rechazado";
                                                                                }
                                                                                if ($r['ESTADO'] == "5") {
                                                                                    echo "Vendido";
                                                                                }
                                                                                if ($r['ESTADO'] == "6") {
                                                                                    echo "En Repaletizaje";
                                                                                }
                                                                                if ($r['ESTADO'] == "7") {
                                                                                    echo "Repaletizado";
                                                                                }
                                                                                if ($r['ESTADO'] == "8") {
                                                                                    echo "En Reembalaje";
                                                                                }
                                                                                if ($r['ESTADO'] == "9") {
                                                                                    echo "Reembalaje";
                                                                                }
                                                                                if ($r['ESTADO'] == "10") {
                                                                                    echo "Interplanta";
                                                                                }
                                                                                ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                <?php } ?>

                                                            </tbody>
                                                        </table>

                                                        <label id="val_dproceso" class="validacion center"><?php echo $MENSAJEEXISTENCIA; ?> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">

                                                <div class="form-group">
                                                    <label>Seleccionar</label>
                                                    <br>
                                                    <button type="button" class=" btn btn-rounded btn-success btn-outline" <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?> id="defecto" name="agregar" Onclick="abrirVentana('registroSelecionExistenciaReembalajePt.php?IDREEMBALAJE=<?php echo $IDREEMBALAJE; ?>&&IDPRODUCTOR=<?php echo $PRODUCTOR; ?>&&IDPVARIEDAD=<?php echo $PVESPECIES; ?>&&EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?>   ' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>Total Cantidad Envase</td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <input type="hidden" class="form-control" placeholder="TOTAL ENVASE" id="TOTALENVASE" name="TOTALENVASE" value="<?php echo $TOTALENVASEE; ?>" />
                                                                    <input type="text" class="form-control" placeholder="TOTAL ENVASE" id="ENVASE" name="ENVASE" value="<?php echo $TOTALENVASEE; ?>" <?php echo $DISABLED0; ?> <?php echo $DISABLEDSTYLE0; ?> />
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total Kilo Neto</td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <input type="hidden" class="form-control" placeholder="TOTAL NETO" id="TOTALNETO" name="TOTALNETO" value="<?php echo $TOTALNETOE; ?>" />
                                                                    <input type="text" class="form-control" placeholder="TOTAL NETO" id="NETO" name="NETO" value="<?php echo $TOTALNETOE; ?>" <?php echo $DISABLED0; ?> <?php echo $DISABLEDSTYLE0; ?> />
                                                                </div>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>% Exportacion</td>
                                                            <td>% Industrial</td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <input type="hidden" class="form-control" placeholder="TOTAL NETO" id="PEXPORTACIONEXPOEX" name="PEXPORTACIONEXPOEX" value="<?php echo $PEXPORTACIONEXPOEX; ?>" />
                                                                    <input type="text" class="form-control" placeholder="% Exportacion" id="PEXPORTACIONEXPOEXV" name="PEXPORTACIONEXPOEXV" value="<?php echo $PEXPORTACIONEXPOEX; ?>" <?php echo $DISABLED0; ?> <?php echo $DISABLEDSTYLE0; ?> />
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <input type="hidden" class="form-control" placeholder="TOTAL NETO" id="PEXPORTACIONEXPOINDU" name="PEXPORTACIONEXPOINDU" value="<?php echo $PEXPORTACIONEXPOINDU; ?>" />
                                                                    <input type="text" class="form-control" placeholder="% Industrial" id="PEXPORTACIONEXPOINDUV" name="PEXPORTACIONEXPOINDUV" value="<?php echo $PEXPORTACIONEXPOINDU; ?>" <?php echo $DISABLED0; ?> <?php echo $DISABLEDSTYLE0; ?> />
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <div class="form-group">
                                                    <label> Porcentaje </label>
                                                    <input type="hidden" class="form-control" placeholder="TOTAL NETO" id="PEXPORTACIONEXPO" name="PEXPORTACIONEXPO" value="<?php echo $PEXPORTACIONEXPO; ?>" />
                                                    <input type="text" class="form-control" placeholder="DIFERENCIA KILOS NETO" id="PEXPORTACIONEXPOV" name="PEXPORTACIONEXPOV" value="<?php echo $PEXPORTACIONEXPO; ?>" <?php echo $DISABLED0; ?> <?php echo $DISABLEDSTYLE0; ?> />

                                                    <label id="val_dprocesoP" class="validacion center"><?php echo $MENSAJEPORCENTAJE; ?> </label>
                                                </div>

                                            </div>
                                        </div>

                                        <!- proceso exportacion ->
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <label>Salida / Detalle Proceso </label>
                                                        <div class="table-responsive">
                                                            <table id="procesodetalle" class="table table-hover " style="width: 100%;">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <a href="#" class="text-warning hover-warning">
                                                                                Folio
                                                                            </a>
                                                                        </th>
                                                                        <th class="text-center">Operaciones</th>
                                                                        <th>Fecha Embalado </th>
                                                                        <th>Estandar </th>
                                                                        <th>Cantidad Envases </th>
                                                                        <th>Kilo Neto </th>
                                                                        <th>% Deshidratacion </th>
                                                                        <th>Kilo Con Deshidratacion </th>
                                                                        <th>Embolsado</th>
                                                                        <th>Tipo Manejo</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php if ($ARRAYDEXPORTACIONPORREEMBALAJE) { ?>
                                                                        <?php foreach ($ARRAYDEXPORTACIONPORREEMBALAJE as $r) : ?>
                                                                            <tr class="center">
                                                                                <td>
                                                                                    <a href="#" class="text-warning hover-warning">
                                                                                        <?php echo $r['FOLIO_DREXPORTACION']; ?>
                                                                                    </a>
                                                                                </td>
                                                                                <td>
                                                                                    <form method="post" id="form1">

                                                                                        <?php if ($ESTADO == "0") { ?>
                                                                                            <button type="button" class="btn btn-rounded btn-sm btn-info btn-outline mr-1" id="defecto" name="ver" title="Ver" <?php echo $DISABLEDFOLIO; ?> Onclick="abrirVentana('registroDreembalajeExportacion.php?IDDPROCESOEXPORTACION=<?php echo $r['ID_DREXPORTACION']; ?>&&PRODUCTOR=<?php echo $PRODUCTOR; ?>&&PVESPECIES=<?php echo $PVESPECIES; ?>&&EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?>&&OP=ver '); ">
                                                                                                <i class="ti-eye"></i> 
                                                                                            </button>
                                                                                        <?php } ?>
                                                                                        <?php if ($ESTADO == "1") { ?>
                                                                                            <button type="button" class="btn btn-rounded btn-sm btn-warning btn-outline mr-1" id="defecto" name="editar" title="Editar" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED2; ?> Onclick="abrirVentana('registroDreembalajeExportacion.php?IDDPROCESOEXPORTACION=<?php echo $r['ID_DREXPORTACION']; ?>&&PRODUCTOR=<?php echo $PRODUCTOR; ?>&&PVESPECIES=<?php echo $PVESPECIES; ?>&&EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?>&&OP=editar '); ">
                                                                                                <i class="ti-pencil-alt"></i> 
                                                                                            </button>
                                                                                        <?php } ?>

                                                                                        <?php if ($ESTADO == "1") { ?>
                                                                                            <button type="button" class="btn btn-rounded btn-sm btn-secondary btn-outline mr-1" id="defecto" name="editar" title="Duplicar" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED2; ?> Onclick="abrirVentana('registroDreembalajeExportacion.php?IDDPROCESOEXPORTACION=<?php echo $r['ID_DREXPORTACION']; ?>&&PRODUCTOR=<?php echo $PRODUCTOR; ?>&&PVESPECIES=<?php echo $PVESPECIES; ?>&&EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?>&&OP=crear '); ">
                                                                                                <i class="fa fa-fw fa-copy"></i> 
                                                                                            </button>
                                                                                        <?php } ?>
                                                                                        <?php if ($ESTADO == "1") { ?>
                                                                                            <input type="hidden" class="form-control" id="FOLIOELIMINARCAJAEXPO" name="FOLIOELIMINARCAJAEXPO" value="<?php echo $r['CANTIDAD_ENVASE_DREXPORTACION']; ?>" />
                                                                                            <input type="hidden" class="form-control" id="FOLIOELIMINAREXPO" name="FOLIOELIMINAREXPO" value="<?php echo $r['FOLIO_DREXPORTACION']; ?>" />
                                                                                            <button type="submit" class="btn btn-rounded btn-sm btn-danger btn-outline mr-1" id="ELIMINAREXPO" name="ELIMINAREXPO" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED2; ?> title="Eliminar">
                                                                                                <i class="ti-close"></i> 
                                                                                            </button>
                                                                                        <?php } ?>
                                                                                    </form>

                                                                                </td>
                                                                                <td><?php echo $r['FECHA_EMBALADO_DREXPORTACION']; ?></td>
                                                                                <td>
                                                                                    <?php
                                                                                    $ARRAYVEREEXPORTACION = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                                                    echo $ARRAYVEREEXPORTACION[0]['NOMBRE_ESTANDAR'];
                                                                                    ?>
                                                                                </td>
                                                                                <td><?php echo $r['CANTIDAD_ENVASE_DREXPORTACION']; ?></td>
                                                                                <td><?php echo $r['KILOS_NETO_DREXPORTACION']; ?></td>
                                                                                <td><?php echo $r['PDESHIDRATACION_DREXPORTACION']; ?></td>
                                                                                <td><?php echo $r['KILOS_DESHIDRATACION_DREXPORTACION']; ?></td>
                                                                                <td>
                                                                                    <?php
                                                                                    if ($r['EMBOLSADO'] == "0") {
                                                                                        echo "NO";
                                                                                    }

                                                                                    if ($r['EMBOLSADO'] == "1") {
                                                                                        echo "SI";
                                                                                    }
                                                                                    ?>
                                                                                </td>
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

                                                                            </tr>
                                                                        <?php endforeach; ?>
                                                                    <?php } ?>



                                                                    <?php if ($ARRATDINDUSTRIALPORREEMBALAJE) { ?>
                                                                        <?php foreach ($ARRATDINDUSTRIALPORREEMBALAJE as $r) : ?>
                                                                            <tr class="center">
                                                                                <td>
                                                                                    <a href="#" class="text-warning hover-warning">
                                                                                        <?php echo $r['FOLIO_DRINDUSTRIAL']; ?>
                                                                                    </a>
                                                                                </td>
                                                                                <td>
                                                                                    <form method="post" id="form1">

                                                                                        <?php if ($ESTADO == "0") { ?>
                                                                                            <button type="button" class="btn btn-rounded btn-sm btn-info btn-outline mr-1" title="Ver" id="defecto" name="ver" <?php echo $DISABLEDFOLIO; ?> Onclick="abrirVentana('registroDreembalajIndustrial.php?IDDPROCESOINDUSTRIAL=<?php echo $r['ID_DRINDUSTRIAL']; ?>&&PRODUCTOR=<?php echo $PRODUCTOR; ?>&&PVESPECIES=<?php echo $PVESPECIES; ?>&&EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?>&&OP=ver '); ">
                                                                                                <i class="ti-eye"></i> 
                                                                                            </button>

                                                                                        <?php } ?>
                                                                                        <?php if ($ESTADO == "1") { ?>
                                                                                            <button type="button" class="btn btn-rounded btn-sm btn-warning btn-outline mr-1" title="Editar" id="defecto" name="editar" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED2; ?> Onclick="abrirVentana('registroDreembalajIndustrial.php?IDDPROCESOINDUSTRIAL=<?php echo $r['ID_DRINDUSTRIAL']; ?>&&PRODUCTOR=<?php echo $PRODUCTOR; ?>&&PVESPECIES=<?php echo $PVESPECIES; ?>&&EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?>&&OP=editar '); ">
                                                                                                <i class="ti-pencil-alt"></i> 
                                                                                            </button>
                                                                                        <?php } ?>

                                                                                        <?php if ($ESTADO == "1") { ?>
                                                                                            <button type="button" class="btn btn-rounded btn-sm btn-secondary btn-outline mr-1" title="Duplicar" id="defecto" name="editar" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED2; ?> Onclick="abrirVentana('registroDreembalajIndustrial.php?IDDPROCESOINDUSTRIAL=<?php echo $r['ID_DRINDUSTRIAL']; ?>&&PRODUCTOR=<?php echo $PRODUCTOR; ?>&&PVESPECIES=<?php echo $PVESPECIES; ?>&&EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?>&&OP=crear '); ">
                                                                                                <i class="fa fa-fw fa-copy"></i> 
                                                                                            </button>
                                                                                        <?php } ?>

                                                                                        <?php if ($ESTADO == "1") { ?>
                                                                                            <input type="hidden" class="form-control" id="FOLIOELIMINARIND" name="FOLIOELIMINARIND" value="<?php echo $r['FOLIO_DRINDUSTRIAL']; ?>" />
                                                                                            <button type="submit" class="btn btn-rounded btn-sm btn-danger btn-outline mr-1" title="Eliminar" id="ELIMINARIND" name="ELIMINARIND" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED2; ?>>
                                                                                                <i class="ti-close"></i> 
                                                                                            </button>
                                                                                        <?php } ?>
                                                                                    </form>
                                                                                </td>
                                                                                <td><?php echo $r['FECHA_EMBALADO_DRINDUSTRIAL']; ?></td>
                                                                                <td>
                                                                                    <?php
                                                                                    $ARRAYVEREINDUTRIAL = $EINDUSTRIAL_ADO->verEstandar($r['ID_ESTANDAR']);
                                                                                    echo $ARRAYVEREINDUTRIAL[0]['NOMBRE_ESTANDAR'];
                                                                                    ?>
                                                                                </td>

                                                                                <td>-</td>
                                                                                <td><?php echo $r['KILOS_NETO_DRINDUSTRIAL']; ?></td>
                                                                                <td>-</td>
                                                                                <td>-</td>
                                                                                <td>-</td>
                                                                                <td>-</td>

                                                                            </tr>
                                                                        <?php endforeach; ?>
                                                                    <?php } ?>

                                                                </tbody>
                                                            </table>
                                                            <label id="val_dproceso" class="validacion center"><?php echo $MENSAJEEXPORTACION; ?> </label>
                                                            <label id="val_dproceso" class="validacion center"><?php echo $MENSAJEINDUSTRIAL; ?> </label>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">

                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <label>Producto Terminado</label>
                                                                        <br>
                                                                        <button type="button" class=" btn btn-rounded btn-warning btn-outline" <?php echo $DISABLED2; ?> id="defecto" name="agregar" <?php echo $DISABLEDFOLIO; ?> Onclick="abrirVentana('registroDreembalajeExportacion.php?IDREEMBALAJE=<?php echo $IDREEMBALAJE; ?>&&PRODUCTOR=<?php echo $PRODUCTOR; ?> &&PVESPECIES=<?php echo $PVESPECIES; ?> &&EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?>' ); ">
                                                                            <i class="glyphicon glyphicon-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <label>Producto Industrial</label>
                                                                        <br>
                                                                        <button type="button" class=" btn btn-rounded btn-danger btn-outline" <?php echo $DISABLED2; ?> id="defecto" name="agregar" <?php echo $DISABLEDFOLIO; ?> Onclick="abrirVentana('registroDreembalajIndustrial.php?IDREEMBALAJE=<?php echo $IDREEMBALAJE; ?>&PRODUCTOR=<?php echo $PRODUCTOR; ?> &&PVESPECIES=<?php echo $PVESPECIES; ?> &&&EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?>' ); ">
                                                                            <i class="glyphicon glyphicon-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total Kilos Exportacion</td>
                                                                <td>
                                                                    <div class="form-group"><input type="hidden" class="form-control" id="TOTALNETOEX" name="TOTALNETOEX" value="<?php echo $TOTALNETOEX; ?>" />
                                                                        <input type="hidden" class="form-control" id="TOTALENVASEEXPO" name="TOTALENVASEEXPO" value="<?php echo $TOTALENVASEEXPO; ?>" />
                                                                        <input type="hidden" class="form-control" id="TOTALNETOEXPO" name="TOTALNETOEXPO" value="<?php echo $TOTALNETOEXPO; ?>" />
                                                                        <input type="hidden" class="form-control" id="TOTALDESHIDRATACIONEX" name="TOTALDESHIDRATACIONEX" value="<?php echo $TOTALDESHIDRATACIONEX; ?>" />
                                                                        <input type="text" class="form-control" placeholder="TOTAL DESHIDRATACION" id="TOTALDESHIDRATACIONEXV" name="TOTALDESHIDRATACIONEX" V value="<?php echo $TOTALDESHIDRATACIONEX; ?>" <?php echo $DISABLED0; ?> <?php echo $DISABLEDSTYLE0; ?> />
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total Kilo Industrial</td>
                                                                <td>
                                                                    <div class="form-group">

                                                                        <input type="hidden" class="form-control" id="TOTALENVASEIND" name="TOTALENVASEIND" value="<?php echo $TOTALENVASEIND; ?>" />
                                                                        <input type="hidden" class="form-control" id="TOTALNETOIND" name="TOTALNETOIND" value="<?php echo $TOTALNETOIND; ?>" />
                                                                        <input type="text" class="form-control" placeholder="TOTAL NETO" id="TOTALNETOINDV" name="TOTALNETOINDV" value="<?php echo $TOTALNETOIND; ?>" <?php echo $DISABLED0; ?> <?php echo $DISABLEDSTYLE0; ?> />
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="form-group">
                                                        <label>Diferencia Kilos Totales</label>
                                                        <input type="hidden" class="form-control" placeholder="DIFERENCIA KILOS NETO" id="DIFERENCIAKILOSNETOEX" name="DIFERENCIAKILOSNETOEX" value="<?php echo $DIFERENCIAKILOSNETOEXPO; ?>" />
                                                        <input type="text" class="form-control" placeholder="DIFERENCIA KILOS NETO" id="DIFERENCIAKILOSNETOEXN" name="DIFERENCIAKILOSNETOEXN" value="<?php echo $DIFERENCIAKILOSNETOEXPO; ?>" <?php echo $DISABLED0; ?> <?php echo $DISABLEDSTYLE0; ?> />
                                                        <label id="val_dproceso" class="validacion center"><?php echo $MENSAJEDIFERENCIA; ?> </label>
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
                                                <th></th>
                                                <td></td>
                                                <th></th>
                                                <td></td>
                                                <th></th>
                                                <td></td>
                                            </tr>
                                            <thead>
                                            <tbody>
                                                <tr>
                                                    <td>


                                                        <?php if ($OP == "crear") { ?>
                                                            <button type=" button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroReembalajeEx.php');">
                                                                <i class="ti-trash"></i> CANCELAR
                                                            </button>
                                                        <?php } ?>
                                                        <?php if ($OP == "editar") { ?>
                                                            <button type="button" class="btn btn-rounded  btn-success btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('listarReembalajeEx.php'); ">
                                                                <i class="ti-back-left "></i> VOLVER
                                                            </button>
                                                        <?php } ?>

                                                        <?php if ($OP == "ver") { ?>
                                                            <button type="button" class="btn btn-rounded  btn-success btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('listarReembalajeEx.php'); ">
                                                                <i class="ti-back-left "></i> VOLVER
                                                            </button>
                                                        <?php } ?>
                                                        <?php if ($OP == "") { ?>
                                                            <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroReembalajeEx.php');">
                                                                <i class="ti-trash"></i> CANCELAR
                                                            </button>
                                                        <?php } ?>

                                                        <?php if ($OP == "crear") { ?>
                                                            <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="EDITAR" value="EDITAR" <?php echo $DISABLEDFOLIO; ?>>
                                                                <i class="ti-save-alt"></i> GUARDAR
                                                            </button>
                                                        <?php }   ?>
                                                        <?php if ($OP == "editar") { ?>
                                                            <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="EDITAR" value="EDITAR">
                                                                <i class="ti-save-alt"></i> GUARDAR
                                                            </button>
                                                        <?php }   ?>


                                                        <?php if ($OP == "crear") { ?>
                                                            <button type="submit" class="btn btn-rounded btn-danger btn-outline" name="CERRAR" value="CERRAR" <?php echo $DISABLED; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                                <i class="ti-save-alt"></i> CERRAR
                                                            </button>
                                                        <?php }   ?>

                                                        <?php if ($OP == "editar") { ?>
                                                            <button type="submit" class="btn btn-rounded btn-danger btn-outline" name="CERRAR" value="CERRAR" <?php echo $DISABLED; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                                <i class="ti-save-alt"></i> CERRAR
                                                            </button>
                                                        <?php }   ?>

                                                        <?php if ($OP == "ver") { ?>

                                                            <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                                <i class="ti-save-alt"></i> CREAR
                                                            </button>

                                                        <?php } ?>
                                                        <?php if ($OP == "") { ?>
                                                            <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                                <i class="ti-save-alt"></i> CREAR
                                                            </button>
                                                        <?php } ?>
                                                    </td>
                                                    <td>

                                                        <?php if ($OP != "") { ?>
                                                            <?php if ($ESTADO == "0") {  ?>
                                                                <button type="button" class="btn btn-rounded  btn-info btn-outline mr-1" id="defecto" name="tarjas" <?php echo $DISABLEDFOLIO; ?> Onclick="abrirVentana('../documento/informeReembalajeEx.php?parametro=<?php echo $IDOP; ?>&&NOMBREUSUARIO=<?php echo $NOMBREUSUARIOS; ?>'); ">
                                                                    <i class="fa fa-file-pdf-o"></i>INFORME
                                                                </button>
                                                            <?php } ?>

                                                            <button type="button" class="btn btn-rounded  btn-info  btn-outline mr-1" id="defecto" name="tarjas" <?php echo $DISABLEDFOLIO; ?> Onclick="abrirVentana('../documento/informeTarjasReembalajeEx.php?parametro=<?php echo $IDOP; ?>'); ">
                                                                <i class="fa fa-file-pdf-o"></i>TARJAS
                                                            </button>
                                                        <?php } ?>
                                                    </td>
                                                    <th></th>
                                                    <td></td>
                                                    <th></th>
                                                    <td></td>
                                                    <th></th>
                                                    <td></td>
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