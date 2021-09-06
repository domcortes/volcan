<?php
include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/USUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';

include_once '../controlador/FOLIO_ADO.php';

include_once '../controlador/TPROCESO_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/PROCESO_ADO.php';
include_once '../controlador/RMERCADO_ADO.php';
include_once '../controlador/MERCADO_ADO.php';

include_once '../controlador/ERECEPCION_ADO.php';
include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/EINDUSTRIAL_ADO.php';

include_once '../controlador/DPEXPORTACION_ADO.php';
include_once '../controlador/DPINDUSTRIAL_ADO.php';
include_once '../controlador/PROCESO_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';



include_once '../controlador/EXIMATERIAPRIMA_ADO.php';
include_once '../controlador/EXIINDUSTRIAL_ADO.php';
include_once '../controlador/EXIEXPORTACION_ADO.php';

include_once '../modelo/EXIMATERIAPRIMA.php';
include_once '../modelo/EXIEXPORTACION.php';
include_once '../modelo/EXIINDUSTRIAL.php';
include_once '../modelo/DPEXPORTACION.php';
include_once '../modelo/DPINDUSTRIAL.php';
include_once '../modelo/PROCESO.php';

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


$DPINDUSTRIAL_ADO =  new DPINDUSTRIAL_ADO();
$DPEXPORTACION_ADO =  new DPEXPORTACION_ADO();

$ERECEPCION_ADO =  new ERECEPCION_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$EINDUSTRIAL_ADO =  new EINDUSTRIAL_ADO();

$TPROCESO_ADO =  new TPROCESO_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$PVESPECIES_ADO =  new PVESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$PROCESO_ADO =  new PROCESO_ADO();
$RMERCADO_ADO =  new RMERCADO_ADO();
$MERCADO_ADO =  new MERCADO_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();

//INIICIALIZAR MODELO

$PROCESO =  new PROCESO();
$EXIMATERIAPRIMA =  new EXIMATERIAPRIMA();
$EXIINDUSTRIAL =  new EXIINDUSTRIAL();
$EXIEXPORTACION =  new EXIEXPORTACION();
$DPINDUSTRIAL =  new DPINDUSTRIAL();
$DPEXPORTACION =  new DPEXPORTACION();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NUMERO = "";
$NUMEROVER = "";
$IDPROCESO = "";
$IDEXIMATERIAPRIMAQUITAR = "";
$FOLIOEXIMATERIAPRIMAQUITAR = "";
$FECHAPROCESO = "";
$FECHAINGRESOPROCESO = "";
$FECHAMODIFCIACIONPROCESO = "";
$TURNO = "";
$TPROCESO = "";
$OBSERVACIONPROCESO = "";
$PRODUCTOR = "";
$PVESPECIES = "";
$ESTADO = "";



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

$ARRAYPROCESO = "";
$ARRAYPROCESO2 = "";
$ARRAYPROCESO3 = "";

$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";

$ARRAYPVESPECIES = "";
$ARRAYTPROCESO = "";
$ARRAYPRODUCTOR = "";
$ARRAYVESPECIES = "";

$ARRAYEVERERECEPCIONID = "";
$ARRAYVEREEXPORTACION = "";
$ARRAYVEREINDUTRIAL = "";


$ARRAYEXIMATERIAPRIMATOMADO = "";
$ARRAYEXIMATERIAPRIMATOMADOPROCESADO = "";
$ARRAYEXISTENCIATOTALESPROCESO = "";


$ARRAYVEREXIMATERIAPRIMA = "";

$ARRAYEXIMATERIAPRIMA = "";
$ARRAYEXIEXPORTACION = "";
$ARRAYEXIINDUSTRIAL = "";
$ARRAYDEXPORTACION = "";
$ARRATDINDUSTRIAL = "";

$ARRAYDEXPORTACIONTOTALPROCESO = "";
$ARRATDINDUSTRIALTOTALPROCESO = "";

$ARRAYDEXPORTACIONPORPROCESO = "";
$ARRATDINDUSTRIALPORPROCESO = "";
$ARRAYFECHAACTUAL = "";
$ARRAYNUMERO = "";
$ARRAYTMANEJO = "";
$ARRAYFOLIO = "";
$ARRAYFOLIO2 = "";
$ARRAYFOLIO3 = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
//FOLIO EXPORTACION
$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
$ARRAYPLANTA = $PLANTA_ADO->listarPlantaCBX();
$ARRAYTEMPORADA = $TEMPORADA_ADO->listarTemporadaCBX();

$ARRAYTPROCESO = $TPROCESO_ADO->listarTprocesoCBX();
$ARRAYPRODUCTOR = $PRODUCTOR_ADO->listarProductorCBX();
$ARRAYFECHAACTUAL = $PROCESO_ADO->obtenerFecha();
$FECHAPROCESO = $ARRAYFECHAACTUAL[0]['FECHA'];

$ARRAYFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTexportacion($EMPRESAS, $PLANTAS, $TEMPORADAS);
$ARRAYFOLIO2 = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTindustrial($EMPRESAS, $PLANTAS, $TEMPORADAS);


if (empty($ARRAYFOLIO)) {
    $DISABLEDFOLIO = "disabled";
    $MENSAJEFOLIO = " NECESITA <b> CREAR LOS FOLIOS PT </b> , PARA OCUPAR LA <b>  FUNCIONALIDAD </b>.  FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
}
if (empty($ARRAYFOLIO2)) {
    $DISABLEDFOLIO = "disabled";
    $MENSAJEFOLIO = $MENSAJEFOLIO."<br> NECESITA <b> CREAR LOS FOLIOS INDUSTRIAL </b> , PARA OCUPAR LA <b>  FUNCIONALIDAD </b>.  FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
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

        $ARRAYNUMERO = $PROCESO_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
        $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;

        //UTILIZACION METODOS SET DEL MODELO
        //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
        $PROCESO->__SET('NUMERO_PROCESO', $NUMERO);
        $PROCESO->__SET('FECHA_PROCESO', $_REQUEST['FECHAPROCESO']);
        $PROCESO->__SET('TURNO', $_REQUEST['TURNO']);
        $PROCESO->__SET('OBSERVACIONE_PROCESO', $_REQUEST['OBSERVACIONPROCESO']);
        $PROCESO->__SET('KILOS_NETO_PROCESO', 0);
        $PROCESO->__SET('KILOS_EXPORTACION_PROCESO', 0);
        $PROCESO->__SET('KILOS_INDUSTRIAL_PROCESO', 0);
        $PROCESO->__SET('PDEXPORTACION_PROCESO', 0);
        $PROCESO->__SET('PDINDUSTRIAL_PROCESO', 0);
        $PROCESO->__SET('PORCENTAJE_PROCESO', 0);
        $PROCESO->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $PROCESO->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $PROCESO->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        $PROCESO->__SET('ID_PVESPECIES', $_REQUEST['PVESPECIES']);
        $PROCESO->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
        $PROCESO->__SET('ID_TPROCESO', $_REQUEST['TPROCESO']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR  HORAINGRESOPROCESO
        $PROCESO_ADO->agregarProceso($PROCESO);
        //OBTENER EL ID DE LA RECEPCION CREADA PARA LUEGO ENVIAR EL INGRESO DEL DETALLE



        $ARRAYPROCESO2 = $PROCESO_ADO->buscarProcesoID(
            $_REQUEST['FECHAPROCESO'],
            $_REQUEST['TURNO'],
            $_REQUEST['OBSERVACIONPROCESO'],
            0,
            0,
            0,
            $_REQUEST['EMPRESA'],
            $_REQUEST['PLANTA'],
            $_REQUEST['TEMPORADA'],
            $_REQUEST['PVESPECIES'],
            $_REQUEST['PRODUCTOR'],
            $_REQUEST['TPROCESO']
        );


        //REDIRECCIONAR A PAGINA registroRecepcion.php 
        echo "<script type='text/javascript'> location.href ='registroProceso.php?parametro=" . $ARRAYPROCESO2[0]['ID_PROCESO'] . "&&parametro1=crear';</script>";
    }
}


//OPERACION EDICION DE FILA
if (isset($_REQUEST['EDITAR'])) {
    //UTILIZACION METODOS SET DEL MODELO

    $ARRAYEXIMATERIAPRIMATOMADO = $EXIMATERIAPRIMA_ADO->buscarPorProcesoEnProceso($_REQUEST['ID']);
    $ARRAYEXIMATERIAPRIMATOMADOPROCESADO = $EXIMATERIAPRIMA_ADO->buscarPorProcesoProcesado($_REQUEST['ID']);


    if (empty($ARRAYEXIMATERIAPRIMATOMADO) && empty($ARRAYEXIMATERIAPRIMATOMADOPROCESADO)) {
        $SINO = "1";
        $MENSAJEEXISTENCIA = "TIENE  QUE HABER AL MENOS UN REGISTRO DE EXISTENCIA SELECIOANDO";
    } else {
        $SINO = "0";
        $MENSAJEEXISTENCIA = "";
    }


    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   


    if ($SINO == "0") {
        $PROCESO->__SET('FECHA_PROCESO',  $_REQUEST['FECHAPROCESOE']);
        $PROCESO->__SET('TURNO',  $_REQUEST['TURNOE']);
        $PROCESO->__SET('OBSERVACIONE_PROCESO', $_REQUEST['OBSERVACIONPROCESOE']);
        $PROCESO->__SET('KILOS_NETO_PROCESO', $_REQUEST['TOTALNETOEXPO']);
        $PROCESO->__SET('KILOS_EXPORTACION_PROCESO', $_REQUEST['TOTALDESHIDRATACIONEX']);
        $PROCESO->__SET('KILOS_INDUSTRIAL_PROCESO', $_REQUEST['TOTALNETOIND']);

        $PROCESO->__SET('PDEXPORTACION_PROCESO', $_REQUEST['PEXPORTACIONEXPOEX']);
        $PROCESO->__SET('PDINDUSTRIAL_PROCESO', $_REQUEST['PEXPORTACIONEXPOINDU']);
        $PROCESO->__SET('PORCENTAJE_PROCESO', $_REQUEST['PEXPORTACIONEXPO']);

        $PROCESO->__SET('ID_PVESPECIES',  $_REQUEST['PVESPECIESE']);
        $PROCESO->__SET('ID_PRODUCTOR',  $_REQUEST['PRODUCTORE']);
        $PROCESO->__SET('ID_TPROCESO', $_REQUEST['TPROCESOE']);
        $PROCESO->__SET('ID_EMPRESA',  $_REQUEST['EMPRESAE']);
        $PROCESO->__SET('ID_PLANTA',  $_REQUEST['PLANTAE']);
        $PROCESO->__SET('ID_TEMPORADA',  $_REQUEST['TEMPORADAE']);
        $PROCESO->__SET('ID_PROCESO', $_REQUEST['ID']);
        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
        $PROCESO_ADO->actualizarProceso($PROCESO);
    }
}

//OPERACION CERRAR DE FILA
if (isset($_REQUEST['CERRAR'])) {
    //UTILIZACION METODOS SET DEL MODELO

    $ARRAYEXIMATERIAPRIMATOMADOPROCESADO = $EXIMATERIAPRIMA_ADO->buscarPorProcesoProcesado($_REQUEST['ID']);
    $ARRAYEXIMATERIAPRIMATOMADO = $EXIMATERIAPRIMA_ADO->buscarPorProcesoEnProceso($_REQUEST['ID']);
    $ARRAYDEXPORTACIONPORPROCESO = $DPEXPORTACION_ADO->buscarPorProceso($_REQUEST['ID']);
    $ARRATDINDUSTRIALPORPROCESO = $DPINDUSTRIAL_ADO->buscarPorProceso($_REQUEST['ID']);


    if (empty($ARRAYEXIMATERIAPRIMATOMADO) && empty($ARRAYEXIMATERIAPRIMATOMADOPROCESADO)) {
        $SINO = "1";
        $MENSAJEEXISTENCIA = "TIENE  QUE HABER AL MENOS UN REGISTRO DE EXISTENCIA SELECIOANDO";
    } else {
        $SINO = "0";
        $MENSAJEEXISTENCIA = "";
    }

    if (empty($ARRAYDEXPORTACIONPORPROCESO)) {
        $SINO = "1";
        $MENSAJEEXPORTACION = "TIENE  QUE HABER AL MENOS UN REGISTRO  PRODUCTO TERMINADO";
    } else {
        $SINO = "0";
        $MENSAJEEXPORTACION = "";
    }
    if (empty($ARRATDINDUSTRIALPORPROCESO)) {
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
        $PROCESO->__SET('FECHA_PROCESO',  $_REQUEST['FECHAPROCESOE']);
        $PROCESO->__SET('TURNO',  $_REQUEST['TURNOE']);
        $PROCESO->__SET('OBSERVACIONE_PROCESO', $_REQUEST['OBSERVACIONPROCESOE']);
        $PROCESO->__SET('KILOS_NETO_PROCESO', $_REQUEST['TOTALNETOEXPO']);
        $PROCESO->__SET('KILOS_EXPORTACION_PROCESO', $_REQUEST['TOTALDESHIDRATACIONEX']);
        $PROCESO->__SET('KILOS_INDUSTRIAL_PROCESO', $_REQUEST['TOTALNETOIND']);
        $PROCESO->__SET('PDEXPORTACION_PROCESO', $_REQUEST['PEXPORTACIONEXPOEX']);
        $PROCESO->__SET('PDINDUSTRIAL_PROCESO', $_REQUEST['PEXPORTACIONEXPOINDU']);
        $PROCESO->__SET('PORCENTAJE_PROCESO', $_REQUEST['PEXPORTACIONEXPO']);
        $PROCESO->__SET('ID_PVESPECIES',  $_REQUEST['PVESPECIESE']);
        $PROCESO->__SET('ID_PRODUCTOR',  $_REQUEST['PRODUCTORE']);
        $PROCESO->__SET('ID_TPROCESO', $_REQUEST['TPROCESOE']);
        $PROCESO->__SET('ID_EMPRESA',  $_REQUEST['EMPRESAE']);
        $PROCESO->__SET('ID_PLANTA',  $_REQUEST['PLANTAE']);
        $PROCESO->__SET('ID_TEMPORADA',  $_REQUEST['TEMPORADAE']);
        $PROCESO->__SET('ID_PROCESO', $_REQUEST['ID']);
        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
        $PROCESO_ADO->actualizarProceso($PROCESO);

        $PROCESO->__SET('ID_PROCESO', $_REQUEST['ID']);
        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
        $PROCESO_ADO->cerrado($PROCESO);

        $ARRAYEXIMATERIAPRIMA = $EXIMATERIAPRIMA_ADO->buscarPorProceso($_REQUEST['ID']);
        $ARRAYEXIEXPORTACION = $EXIEXPORTACION_ADO->buscarPorProceso($_REQUEST['ID']);
        $ARRAYEXIINDUSTRIAL = $EXIINDUSTRIAL_ADO->buscarPorProceso($_REQUEST['ID']);
        $ARRAYDEXPORTACION = $DPEXPORTACION_ADO->buscarPorProceso($_REQUEST['ID']);
        $ARRATDINDUSTRIAL = $DPINDUSTRIAL_ADO->buscarPorProceso($_REQUEST['ID']);



        foreach ($ARRAYEXIMATERIAPRIMA as $r) :
            $ARRAYVEREXIMATERIAPRIMA = $EXIMATERIAPRIMA_ADO->verEximateriaprima($r['ID_EXIMATERIAPRIMA']);
            $EXIMATERIAPRIMA->__SET('ID_EMPRESA', $_REQUEST['EMPRESAE']);
            $EXIMATERIAPRIMA->__SET('ID_PLANTA', $_REQUEST['PLANTAE']);
            $EXIMATERIAPRIMA->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADAE']);
            $EXIMATERIAPRIMA->__SET('ID_EXIMATERIAPRIMA', $r['ID_EXIMATERIAPRIMA']);
            $EXIMATERIAPRIMA_ADO->actualizarEximateriaprimaEnvaseKilos($EXIMATERIAPRIMA);

            $EXIMATERIAPRIMA->__SET('ID_EXIMATERIAPRIMA', $r['ID_EXIMATERIAPRIMA']);
            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
            $EXIMATERIAPRIMA_ADO->procesado($EXIMATERIAPRIMA);
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
            $DPEXPORTACION->__SET('ID_DPEXPORTACION', $f['ID_DPEXPORTACION']);
            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
            $DPEXPORTACION_ADO->cerrado($DPEXPORTACION);
        endforeach;

        foreach ($ARRATDINDUSTRIAL as $f) :
            $DPINDUSTRIAL->__SET('ID_DPINDUSTRIAL', $f['ID_DPINDUSTRIAL']);
            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
            $DPINDUSTRIAL_ADO->cerrado($DPINDUSTRIAL);
        endforeach;


        //REDIRECCIONAR A PAGINA registroRecepcion.php 
        //SEGUNE EL TIPO DE OPERACIONS QUE SE INDENTIFIQUE EN LA URL
        if ($_REQUEST['parametro1'] == "crear") {
            echo "<script type='text/javascript'> location.href ='registroProceso.php?parametro=" . $_REQUEST['ID'] . "&&parametro1=ver';</script>";
        }
        if ($_REQUEST['parametro1'] == "editar") {
            echo "<script type='text/javascript'> location.href ='registroProceso.php?parametro=" . $_REQUEST['ID'] . "&&parametro1=ver';</script>";
        }
    }
}

if (isset($_REQUEST['ELIMINAREXPO'])) {
    $FOLIOELIMINAR = $_REQUEST['FOLIOELIMINAREXPO'];
    $DPEXPORTACION->__SET('FOLIO_DPEXPORTACION', $FOLIOELIMINAR);
    $DPEXPORTACION_ADO->deshabilitar2($DPEXPORTACION);

    $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $FOLIOELIMINAR);
    $EXIEXPORTACION_ADO->deshabilitar2($EXIEXPORTACION);

    $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $FOLIOELIMINAR);
    $EXIEXPORTACION_ADO->eliminado($EXIEXPORTACION);
}
if (isset($_REQUEST['ELIMINARIND'])) {
    $FOLIOELIMINAR = $_REQUEST['FOLIOELIMINARIND'];
    $DPINDUSTRIAL->__SET('FOLIO_DPINDUSTRIAL', $FOLIOELIMINAR);
    $DPINDUSTRIAL_ADO->deshabilitar2($DPINDUSTRIAL);

    $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $FOLIOELIMINAR);
    $EXIINDUSTRIAL_ADO->deshabilitar($EXIINDUSTRIAL);

    $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $FOLIOELIMINAR);
    $EXIINDUSTRIAL_ADO->eliminado($EXIINDUSTRIAL);
}


if (isset($_REQUEST['QUITAR'])) {

    $IDEXIMATERIAPRIMAQUITAR = $_REQUEST['IDEXIMATERIAPRIMAQUITAR'];
    $FOLIOEXIMATERIAPRIMAQUITAR = $_REQUEST['FOLIOEXIMATERIAPRIMAQUITAR'];

    $EXIMATERIAPRIMA->__SET('FOLIO_AUXILIAR_EXIMATERIAPRIMA', $_REQUEST['FOLIOEXIMATERIAPRIMAQUITAR']);
    $EXIMATERIAPRIMA->__SET('ID_EXIMATERIAPRIMA', $_REQUEST['IDEXIMATERIAPRIMAQUITAR']);
    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
    $EXIMATERIAPRIMA_ADO->actualizarDeselecionarProcesoCambiarEstado($EXIMATERIAPRIMA);
}

//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($_REQUEST['parametro']) && isset($_REQUEST['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_REQUEST['parametro'];
    $OP = $_REQUEST['parametro1'];

    //OBTENECION DE INFORMACION DE LA TABLAS DE LA VISTA
    $ARRAYDEXPORTACIONPORPROCESO = $DPEXPORTACION_ADO->buscarPorProceso($IDOP);
    $ARRATDINDUSTRIALPORPROCESO = $DPINDUSTRIAL_ADO->buscarPorProceso($IDOP);
    $ARRAYEXIMATERIAPRIMATOMADO = $EXIMATERIAPRIMA_ADO->buscarPorProcesoEnProceso($IDOP);
    $ARRAYEXIMATERIAPRIMATOMADOPROCESADO = $EXIMATERIAPRIMA_ADO->buscarPorProcesoProcesado($IDOP);

    //OBTENCIONS DE TOTALES O EL RESUMEN DE LAS TABLAS

    $ARRAYEXISTENCIATOTALESPROCESO = $EXIMATERIAPRIMA_ADO->obtenerTotales($IDOP);
    $TOTALNETOE = $ARRAYEXISTENCIATOTALESPROCESO[0]['TOTAL_NETO'];
    $TOTALENVASEE = $ARRAYEXISTENCIATOTALESPROCESO[0]['TOTAL_ENVASE'];


    $ARRAYDEXPORTACIONTOTALPROCESO = $DPEXPORTACION_ADO->obtenerTotales($IDOP);
    $TOTALENVASEEX = $ARRAYDEXPORTACIONTOTALPROCESO[0]['TOTAL_ENVASE'];
    $TOTALNETOEX = $ARRAYDEXPORTACIONTOTALPROCESO[0]['TOTAL_NETO'];
    $TOTALBRUTOEX = $ARRAYDEXPORTACIONTOTALPROCESO[0]['TOTAL_BRUTO'];
    $TOTALDESHIDRATACIONEX = $ARRAYDEXPORTACIONTOTALPROCESO[0]['TOTAL_DESHIDRATACION'];

    $ARRATDINDUSTRIALTOTALPROCESO = $DPINDUSTRIAL_ADO->obtenerTotales($IDOP);
    $TOTALNETOIND = $ARRATDINDUSTRIALTOTALPROCESO[0]['TOTAL_NETO'];


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

        $DISABLED = "";
        $DISABLEDSTYLE = "";
        $DISABLED2 = "";
        $DISABLEDSTYLE2 = "";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE3 = "style='background-color: #eeeeee;'";

        $DISABLED0 = "disabled";
        $DISABLEDSTYLE0 = "style='background-color: #eeeeee;'";

        $ARRAYPROCESO = $PROCESO_ADO->verProceso2($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYPROCESO as $r) :

            $IDPROCESO = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_PROCESO'];
            $FECHAPROCESO = "" . $r['FECHA_PROCESO'];
            $FECHAINGRESOPROCESO = "" . $r['FECHA_INGRESOP'];
            $FECHAMODIFCIACIONPROCESO = "" . $r['FECHA_MODIFICACIONP'];
            $TURNO = "" . $r['TURNO'];
            $TPROCESO = "" . $r['ID_TPROCESO'];
            $OBSERVACIONPROCESO = "" . $r['OBSERVACIONE_PROCESO'];
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
        $ARRAYPROCESO = $PROCESO_ADO->verProceso2($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYPROCESO as $r) :

            $IDPROCESO = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_PROCESO'];
            $FECHAPROCESO = "" . $r['FECHA_PROCESO'];
            $FECHAINGRESOPROCESO = "" . $r['FECHA_INGRESOP'];
            $FECHAMODIFCIACIONPROCESO = "" . $r['FECHA_MODIFICACIONP'];
            $TURNO = "" . $r['TURNO'];
            $TPROCESO = "" . $r['ID_TPROCESO'];
            $OBSERVACIONPROCESO = "" . $r['OBSERVACIONE_PROCESO'];
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
        $ARRAYPROCESO = $PROCESO_ADO->verProceso2($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYPROCESO as $r) :
            $IDPROCESO = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_PROCESO'];
            $FECHAPROCESO = "" . $r['FECHA_PROCESO'];
            $FECHAINGRESOPROCESO = "" . $r['FECHA_INGRESOP'];
            $FECHAMODIFCIACIONPROCESO = "" . $r['FECHA_MODIFICACIONP'];
            $TURNO = "" . $r['TURNO'];
            $TPROCESO = "" . $r['ID_TPROCESO'];
            $OBSERVACIONPROCESO = "" . $r['OBSERVACIONE_PROCESO'];
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



//PROCESO PARA OBTENER LOS DATOS DEL FORMULARIO  Y MANTENERLO AL ACTUALIZACION QUE REALIZA EL SELECT DE PRODUCTOR
if (isset($_POST)) {
    if (isset($_REQUEST['FECHAPROCESO'])) {
        $FECHAPROCESO = $_REQUEST['FECHAPROCESO'];
    }
    if (isset($_REQUEST['TURNO'])) {
        $TURNO = $_REQUEST['TURNO'];
    }
    if (isset($_REQUEST['TPROCESO'])) {
        $TPROCESO = $_REQUEST['TPROCESO'];
    }
    if (isset($_REQUEST['OBSERVACIONPROCESO'])) {
        $OBSERVACIONPROCESO = $_REQUEST['OBSERVACIONPROCESO'];
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
    <title> Registrar Proceso</title>
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



                    FECHAPROCESO = document.getElementById("FECHAPROCESO").value;
                    TURNO = document.getElementById("TURNO").selectedIndex;
                    TPROCESO = document.getElementById("TPROCESO").selectedIndex;
                    PRODUCTOR = document.getElementById("PRODUCTOR").selectedIndex;
                    PVESPECIES = document.getElementById("PVESPECIES").selectedIndex;
                    OBSERVACIONPROCESO = document.getElementById("OBSERVACIONPROCESO").value;

                    document.getElementById('val_fechap').innerHTML = "";
                    document.getElementById('val_turno').innerHTML = "";

                    document.getElementById('val_tproceso').innerHTML = "";
                    document.getElementById('val_productor').innerHTML = "";
                    document.getElementById('val_variedad').innerHTML = "";
                    document.getElementById('val_observacion').innerHTML = "";

                    if (FECHAPROCESO == null || FECHAPROCESO.length == 0 || /^\s+$/.test(FECHAPROCESO)) {
                        document.form_reg_dato.FECHAPROCESO.focus();
                        document.form_reg_dato.FECHAPROCESO.style.borderColor = "#FF0000";
                        document.getElementById('val_fechap').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.FECHAPROCESO.style.borderColor = "#4AF575";


                    if (TURNO == null || TURNO == 0) {
                        document.form_reg_dato.TURNO.focus();
                        document.form_reg_dato.TURNO.style.borderColor = "#FF0000";
                        document.getElementById('val_turno').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TURNO.style.borderColor = "#4AF575";

                    if (TPROCESO == null || TPROCESO == 0) {
                        document.form_reg_dato.TPROCESO.focus();
                        document.form_reg_dato.TPROCESO.style.borderColor = "#FF0000";
                        document.getElementById('val_tproceso').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TPROCESO.style.borderColor = "#4AF575";

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
                    if (OBSERVACIONPROCESO == null || OBSERVACIONPROCESO.length == 0 || /^\s+$/.test(OBSERVACIONPROCESO)) {
                        document.form_reg_dato.OBSERVACIONPROCESO.focus();
                        document.form_reg_dato.OBSERVACIONPROCESO.style.borderColor = "#FF0000";
                        document.getElementById('val_observacion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.OBSERVACIONPROCESO.style.borderColor = "#4AF575";
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
                                <h3 class="page-title">Proceso</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Proceso</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroProceso.php">Operaciones Proceso </a>
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
                                                <label>Numero</label>
                                                <input type="hidden" class="form-control" placeholder="ID PROCESO" id="ID" name="ID" value="<?php echo $IDPROCESO; ?>" />
                                                <input type="number" class="form-control" style="background-color: #eeeeee;" placeholder="Numero Proceso" id="IDPROCESO" name="IDPROCESO" value="<?php echo $NUMEROVER; ?>" disabled />
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
                                                <input type="hidden" class="form-control" placeholder="Fecha Ingreso " id="FECHAINGRESOPROCESOE" name="FECHAINGRESOPROCESOE" value="<?php echo $FECHAINGRESOPROCESO; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="FECHA RECEPCION" id="FECHAINGRESOPROCESO" name="FECHAINGRESOPROCESO" value="<?php echo $FECHAINGRESOPROCESO; ?>" disabled />
                                                <label id="val_fechai" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Fecha Modificacion</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Modificacion " id="FECHAMODIFCIACIONPROCESOE" name="FECHAMODIFCIACIONPROCESOE" value="<?php echo $FECHAMODIFCIACIONPROCESO; ?>" />
                                                <input type="date" class="form-control " style="background-color: #eeeeee;" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACIONPROCESO" name="FECHAMODIFCIACIONPROCESO" value="<?php echo $FECHAMODIFCIACIONPROCESO; ?>" disabled />
                                                <label id="val_fecham" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>

                                    <label id="val_validato" class="validacion"> <?php echo $MENSAJEVALIDATO; ?> </label>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Fecha </label>
                                                <input type="hidden" class="form-control" placeholder="FECHA PROCESO" id="FECHAPROCESOE" name="FECHAPROCESOE" value="<?php echo $FECHAPROCESO; ?>" />
                                                <input type="date" class="form-control" <?php echo $DISABLEDSTYLE; ?> placeholder="Fecha Proceso" id="FECHAPROCESO" name="FECHAPROCESO" value="<?php echo $FECHAPROCESO; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO;?>/>
                                                <label id="val_fechap" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-12">
                                            <div class="form-group">
                                                <label>Turno</label>
                                                <input type="hidden" class="form-control" placeholder="TURNO" id="TURNOE" name="TURNOE" value="<?php echo $TURNO; ?>" />
                                                <select class="form-control select2" id="TURNO" name="TURNO" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO;?>>
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
                                                <label>Tipo Proceso</label>
                                                <input type="hidden" class="form-control" placeholder="TIPO PROCESO" id="TPROCESOE" name="TPROCESOE" value="<?php echo $TPROCESO; ?>" />
                                                <select class="form-control select2" id="TPROCESO" name="TPROCESO" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO;?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYTPROCESO as $r) : ?>
                                                        <?php if ($ARRAYTPROCESO) {    ?>
                                                            <option value="<?php echo $r['ID_TPROCESO']; ?>" <?php if ($TPROCESO == $r['ID_TPROCESO']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_TPROCESO'] ?> </option>
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
                                                <select class="form-control select2" id="PRODUCTOR" name="PRODUCTOR" style="width: 100%;" onchange="this.form.submit()" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO;?>>
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
                                        <div class="col-sm-1 col-12">
                                            <div class="form-group">
                                                <label>Agregar </label>
                                                <br>
                                                <button type="button" class=" btn btn-rounded btn-success btn-outline" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO;?> id="defecto" name="pop" Onclick="abrirVentana('registroPopProductor.php' ); ">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-12">
                                            <div class="form-group">
                                                <label>Variedad</label>
                                                <input type="hidden" class="form-control" placeholder="Variedad" id="PVESPECIESE" name="PVESPECIESE" value="<?php echo $PVESPECIES; ?>" />
                                                <select class="form-control select2" id="PVESPECIES" name="PVESPECIES" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO;?> >
                                                    <option></option>
                                                    <?php foreach ($ARRAYPVESPECIES as $r) : ?>
                                                        <?php if ($ARRAYPVESPECIES) {    ?>
                                                            <option value="<?php echo $r['ID_PVESPECIES']; ?>" <?php if ($PVESPECIES == $r['ID_PVESPECIES']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>>
                                                                <?php
                                                                $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
                                                                echo $ARRAYVESPECIES[0]['NOMBRE_VESPECIES']
                                                                ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_variedad" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-1 col-12">
                                            <div class="form-group">
                                                <label>Agregar </label>
                                                <br>
                                                <button type="button" class=" btn btn-rounded btn-success btn-outline" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO;?>  <?php if (empty($ARRAYPVESPECIES)) {
                                                                                                                                                                                echo "disabled";
                                                                                                                                                                            } ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopPvespecies.php?PRODUCTOR=<?php echo $PRODUCTOR; ?>' ); ">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="OBSERVACION PROCESO" id="OBSERVACIONPROCESOE" name="OBSERVACIONPROCESOE" value="<?php echo $OBSERVACIONPROCESO; ?>" />
                                                <label>Observaciones </label>
                                                <textarea class="form-control" rows="1" <?php echo $DISABLEDSTYLE; ?> placeholder="Ingrese Nota e Observacion  " id="OBSERVACIONPROCESO" name="OBSERVACIONPROCESO" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO;?> ><?php echo $OBSERVACIONPROCESO; ?></textarea>
                                                <label id="val_observacion" class="validacion"> </label>
                                            </div>
                                        </div>

                                    </div>

                                    <!- selecionar existencia ->
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label>Ingreso / Existencia Materia Prima </label>
                                                    <div class="table-responsive">
                                                        <table id="procesoexistencia" class="table table-hover " style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <a href="#" class="text-warning hover-warning">
                                                                            N° Folio
                                                                        </a>
                                                                    </th>
                                                                    <th class="text-center">Operaciones</th>
                                                                    <th>Fecha Ingreso </th>
                                                                    <th>Estandar </th>
                                                                    <th>Cantidad Envase </th>
                                                                    <th>Kilo Neto </th>
                                                                    <th>Estado </th>
                                                                    <th>Productor </th>
                                                                    <th>Variedad </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if ($ARRAYEXIMATERIAPRIMATOMADOPROCESADO) { ?>
                                                                    <?php foreach ($ARRAYEXIMATERIAPRIMATOMADOPROCESADO as $s) : ?>
                                                                        <tr class="center">
                                                                            <td>
                                                                                <a href="#" class="text-warning hover-warning">
                                                                                    <?php echo $s['FOLIO_AUXILIAR_EXIMATERIAPRIMA']; ?>
                                                                                </a>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <form method="post" id="form1">
                                                                                    <?php if ($s['ESTADO'] == 3) { ?>
                                                                                        <input type="hidden" class="form-control" id="IDEXIMATERIAPRIMAQUITAR" name="IDEXIMATERIAPRIMAQUITAR" value="<?php echo $s['ID_EXIMATERIAPRIMA']; ?>" />
                                                                                        <input type="hidden" class="form-control" id="FOLIOEXIMATERIAPRIMAQUITAR" name="FOLIOEXIMATERIAPRIMAQUITAR" value="<?php echo $s['FOLIO_AUXILIAR_EXIMATERIAPRIMA']; ?>" />
                                                                                        <button type="submit" class="btn btn-rounded btn-sm  btn-danger btn-outline mr-1" id="defecto" name="QUITAR" title="Quitar">
                                                                                            <i class="ti-close  "></i> Quitar
                                                                                        </button>
                                                                                    <?php } else {
                                                                                        echo "-";
                                                                                    } ?>
                                                                                </form>
                                                                            </td>
                                                                            <td><?php echo $s['FECHA_INGRESO_EXIMATERIAPRIMA']; ?></td>
                                                                            <td>
                                                                                <?php
                                                                                $ARRAYEVERERECEPCIONID = $ERECEPCION_ADO->verEstandar($s['ID_ESTANDAR']);
                                                                                echo $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                                                ?>
                                                                            </td>

                                                                            <td><?php echo $s['CANTIDAD_ENVASE_EXIMATERIAPRIMA']; ?></td>
                                                                            <td><?php echo $s['KILOS_NETO_EXIMATERIAPRIMA']; ?></td>
                                                                            <td>
                                                                                <?php
                                                                                if ($s['ESTADO'] == "1") {
                                                                                    echo "Ingresando";
                                                                                }
                                                                                if ($s['ESTADO'] == "2") {
                                                                                    echo "Disponible";
                                                                                }
                                                                                if ($s['ESTADO'] == "3") {
                                                                                    echo "En Proceso";
                                                                                }
                                                                                if ($s['ESTADO'] == "4") {
                                                                                    echo "Procesado";
                                                                                }
                                                                                if ($s['ESTADO'] == "5") {
                                                                                    echo "Despachado";
                                                                                }
                                                                                if ($s['ESTADO'] == "6") {
                                                                                    echo "Rechazado";
                                                                                }
                                                                                if ($s['ESTADO'] == "7") {
                                                                                    echo "Replaetizando";
                                                                                }
                                                                                if ($s['ESTADO'] == "8") {
                                                                                    echo "Repaletizado";
                                                                                }
                                                                                if ($s['ESTADO'] == "9") {
                                                                                    echo "Interplanta";
                                                                                }

                                                                                ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($s['ID_PRODUCTOR']);
                                                                                echo $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                                                ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php

                                                                                $ARRAYVERPVESPECIESID = $PVESPECIES_ADO->verPvespecies($s['ID_PVESPECIES']);
                                                                                $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($ARRAYVERPVESPECIESID[0]['ID_VESPECIES']);
                                                                                echo $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                                                ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                <?php } ?>
                                                                <?php if ($ARRAYEXIMATERIAPRIMATOMADO) { ?>
                                                                    <?php foreach ($ARRAYEXIMATERIAPRIMATOMADO as $r) : ?>
                                                                        <tr class="center">
                                                                            <td>
                                                                                <a href="#" class="text-warning hover-warning">
                                                                                    <?php
                                                                                    if ($r['FOLIO_AUXILIAR_EXIMATERIAPRIMA']) {
                                                                                        echo $r['FOLIO_AUXILIAR_EXIMATERIAPRIMA'];
                                                                                    } else {
                                                                                        echo $r['FOLIO_EXIMATERIAPRIMA'];
                                                                                    }
                                                                                    ?>
                                                                                </a>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <form method="post" id="form1">
                                                                                    <?php if ($r['ESTADO'] == 3) { ?>
                                                                                        <input type="hidden" class="form-control" id="IDEXIMATERIAPRIMAQUITAR" name="IDEXIMATERIAPRIMAQUITAR" value="<?php echo $r['ID_EXIMATERIAPRIMA']; ?>" />
                                                                                        <input type="hidden" class="form-control" id="FOLIOEXIMATERIAPRIMAQUITAR" name="FOLIOEXIMATERIAPRIMAQUITAR" value="<?php echo $r['FOLIO_AUXILIAR_EXIMATERIAPRIMA']; ?>" />
                                                                                        <button type="submit" class="btn btn-rounded btn-sm  btn-danger btn-outline mr-1" id="defecto" name="QUITAR" title="Quitar">
                                                                                            <i class="ti-close  "></i> Quitar
                                                                                        </button>
                                                                                    <?php } else {
                                                                                        echo "-";
                                                                                    } ?>
                                                                                </form>
                                                                            </td>

                                                                            <td><?php echo $r['FECHA_INGRESO_EXIMATERIAPRIMA']; ?></td>
                                                                            <td>
                                                                                <?php
                                                                                $ARRAYEVERERECEPCIONID = $ERECEPCION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                                                echo $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                                                ?>
                                                                            </td>
                                                                            <td><?php echo $r['CANTIDAD_ENVASE_EXIMATERIAPRIMA']; ?></td>
                                                                            <td><?php echo $r['KILOS_NETO_EXIMATERIAPRIMA']; ?></td>


                                                                            <td>
                                                                                <?php
                                                                                if ($r['ESTADO'] == "1") {
                                                                                    echo "Ingresando";
                                                                                }
                                                                                if ($r['ESTADO'] == "2") {
                                                                                    echo "Disponible";
                                                                                }
                                                                                if ($r['ESTADO'] == "3") {
                                                                                    echo "En Proceso";
                                                                                }
                                                                                if ($r['ESTADO'] == "4") {
                                                                                    echo "Procesado";
                                                                                }
                                                                                if ($r['ESTADO'] == "5") {
                                                                                    echo "Despachado";
                                                                                }
                                                                                if ($r['ESTADO'] == "6") {
                                                                                    echo "Rechazado";
                                                                                }
                                                                                if ($r['ESTADO'] == "7") {
                                                                                    echo "Replaetizando";
                                                                                }
                                                                                if ($r['ESTADO'] == "8") {
                                                                                    echo "Repaletizado";
                                                                                }
                                                                                if ($r['ESTADO'] == "9") {
                                                                                    echo "Interplanta";
                                                                                }

                                                                                ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
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
                                                    <button type="button" class=" btn btn-rounded btn-success btn-outline" <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO;?> id="defecto" name="agregar" Onclick="abrirVentana('registroSelecionExistenciaProcesoMp.php?IDPROCESO=<?php echo $IDPROCESO; ?>&&IDPRODUCTOR=<?php echo $PRODUCTOR; ?>&&IDPVARIEDAD=<?php echo $PVESPECIES; ?>&&EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?>' ); ">
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
                                                                        <th>Cantidad Envase </th>
                                                                        <th>Kilo Neto </th>
                                                                        <th>% Deshi. </th>
                                                                        <th>Kilo Con Deshi. </th>
                                                                        <th>Embolsado</th>
                                                                        <th>Tipo Manejo</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php if ($ARRAYDEXPORTACIONPORPROCESO) { ?>
                                                                        <?php foreach ($ARRAYDEXPORTACIONPORPROCESO as $r) : ?>
                                                                            <tr class="center">
                                                                                <td>
                                                                                    <a href="#" class="text-warning hover-warning">
                                                                                        <?php echo $r['FOLIO_DPEXPORTACION']; ?>
                                                                                    </a>
                                                                                </td>
                                                                                <td>
                                                                                    <form method="post" id="form1">

                                                                                        <?php if ($ESTADO == "0") { ?>
                                                                                            <button type="button" class="btn btn-rounded btn-info btn-sm  btn-outline mr-1" id="defecto" title="Ver" name="ver" Onclick="abrirVentana('registroDprocesoExportacion.php?IDDPROCESOEXPORTACION=<?php echo $r['ID_DPEXPORTACION']; ?>&&PRODUCTOR=<?php echo $PRODUCTOR; ?>&&PVESPECIES=<?php echo $PVESPECIES; ?>&&EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?>&&OP=ver '); ">
                                                                                                <i class="ti-eye"></i>
                                                                                            </button>
                                                                                        <?php } ?>

                                                                                        <?php if ($ESTADO == "1") { ?>
                                                                                            <button type="button" class="btn btn-rounded btn-sm btn-warning btn-outline mr-1" title="Editar" id="defecto" name="editar" <?php echo $DISABLED2; ?> Onclick="abrirVentana('registroDprocesoExportacion.php?IDDPROCESOEXPORTACION=<?php echo $r['ID_DPEXPORTACION']; ?>&&PRODUCTOR=<?php echo $PRODUCTOR; ?>&&PVESPECIES=<?php echo $PVESPECIES; ?>&&EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?>&&OP=editar '); ">
                                                                                                <i class="ti-pencil-alt"></i>
                                                                                            </button>
                                                                                        <?php } ?>

                                                                                        <?php if ($ESTADO == "1") { ?>
                                                                                            <button type="button" class="btn btn-rounded btn-sm btn-secondary btn-outline mr-1" title="Duplicar" id="defecto" name="editar" <?php echo $DISABLED2; ?> Onclick="abrirVentana('registroDprocesoExportacion.php?IDDPROCESOEXPORTACION=<?php echo $r['ID_DPEXPORTACION']; ?>&&PRODUCTOR=<?php echo $PRODUCTOR; ?>&&PVESPECIES=<?php echo $PVESPECIES; ?>&&EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?>&&OP=crear '); ">
                                                                                                <i class="fa fa-fw fa-copy"></i>
                                                                                            </button>
                                                                                        <?php } ?>
                                                                                        <?php if ($ESTADO == "1") { ?>
                                                                                            <input type="hidden" class="form-control" id="FOLIOELIMINAREXPO" name="FOLIOELIMINAREXPO" value="<?php echo $r['FOLIO_DPEXPORTACION']; ?>" />
                                                                                            <button type="submit" class="btn btn-rounded btn-sm btn-danger btn-outline mr-1" title="Eliminar" id="ELIMINAREXPO" name="ELIMINAREXPO" <?php echo $DISABLED2; ?>>
                                                                                                <i class="ti-close"></i>
                                                                                            </button>
                                                                                        <?php } ?>
                                                                                    </form>
                                                                                </td>
                                                                                <td><?php echo $r['FECHA_EMBALADO_DPEXPORTACION']; ?></td>
                                                                                <td>
                                                                                    <?php
                                                                                    $ARRAYVEREEXPORTACION = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                                                    echo $ARRAYVEREEXPORTACION[0]['NOMBRE_ESTANDAR'];
                                                                                    ?>
                                                                                </td>

                                                                                <td><?php echo $r['CANTIDAD_ENVASE_DPEXPORTACION']; ?></td>
                                                                                <td><?php echo $r['KILOS_NETO_DPEXPORTACION']; ?></td>
                                                                                <td><?php echo $r['PDESHIDRATACION_DPEXPORTACION']; ?></td>
                                                                                <td><?php echo $r['KILOS_DESHIDRATACION_DPEXPORTACION']; ?></td>
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
                                                                    <?php if ($ARRATDINDUSTRIALPORPROCESO) { ?>
                                                                        <?php foreach ($ARRATDINDUSTRIALPORPROCESO as $r) : ?>
                                                                            <tr class="center">
                                                                                <td>
                                                                                    <a href="#" class="text-warning hover-warning">
                                                                                        <?php echo $r['FOLIO_DPINDUSTRIAL']; ?>
                                                                                    </a>
                                                                                </td>
                                                                                <td>
                                                                                    <form method="post" id="form1">

                                                                                        <?php if ($ESTADO == "0") { ?>
                                                                                            <button type="button" class="btn btn-rounded btn-sm btn-info btn-outline mr-1" id="defecto" name="ver" <?php echo $DISABLEDFOLIO;?> Onclick="abrirVentana('registroDprocesoIndustrial.php?IDDPROCESOINDUSTRIAL=<?php echo $r['ID_DPINDUSTRIAL']; ?>&&PRODUCTOR=<?php echo $PRODUCTOR; ?>&&PVESPECIES=<?php echo $PVESPECIES; ?>&&EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?>&&OP=ver '); ">
                                                                                                <i class="ti-eye"></i>
                                                                                            <?php } ?>
                                                                                            <?php if ($ESTADO == "1") { ?>
                                                                                                <button type="button" class="btn btn-rounded btn-sm btn-warning btn-outline mr-1" id="defecto" name="editar" <?php echo $DISABLEDFOLIO;?>  <?php echo $DISABLED2; ?> Onclick="abrirVentana('registroDprocesoIndustrial.php?IDDPROCESOINDUSTRIAL=<?php echo $r['ID_DPINDUSTRIAL']; ?>&&PRODUCTOR=<?php echo $PRODUCTOR; ?>&&PVESPECIES=<?php echo $PVESPECIES; ?>&&EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?>&&OP=editar '); ">
                                                                                                    <i class="ti-pencil-alt"></i>
                                                                                                </button>
                                                                                            <?php } ?>

                                                                                            <?php if ($ESTADO == "1") { ?>
                                                                                                <button type="button" class="btn btn-rounded btn-sm btn-secondary btn-outline mr-1" id="defecto" name="editar" <?php echo $DISABLEDFOLIO;?> <?php echo $DISABLED2; ?> Onclick="abrirVentana('registroDprocesoIndustrial.php?IDDPROCESOINDUSTRIAL=<?php echo $r['ID_DPINDUSTRIAL']; ?>&&PRODUCTOR=<?php echo $PRODUCTOR; ?>&&PVESPECIES=<?php echo $PVESPECIES; ?>&&EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?>&&OP=crear '); ">
                                                                                                    <i class="fa fa-fw fa-copy"></i>
                                                                                                </button>
                                                                                            <?php } ?>

                                                                                            <?php if ($ESTADO == "1") { ?>
                                                                                                <input type="hidden" class="form-control" id="FOLIOELIMINARIND" name="FOLIOELIMINARIND" value="<?php echo $r['FOLIO_DPINDUSTRIAL']; ?>" />
                                                                                                <button type="submit" class="btn btn-rounded btn-sm btn-danger btn-outline mr-1" id="ELIMINARIND" name="ELIMINARIND" <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO;?>>
                                                                                                    <i class="ti-close"></i>
                                                                                                </button>
                                                                                            <?php } ?>
                                                                                    </form>
                                                                                </td>
                                                                                <td><?php echo $r['FECHA_EMBALADO_DPINDUSTRIAL']; ?></td>
                                                                                <td>
                                                                                    <?php
                                                                                    $ARRAYVEREINDUTRIAL = $EINDUSTRIAL_ADO->verEstandar($r['ID_ESTANDAR']);
                                                                                    echo $ARRAYVEREINDUTRIAL[0]['NOMBRE_ESTANDAR'];
                                                                                    ?>
                                                                                </td>
                                                                                <td>-</td>
                                                                                <td><?php echo $r['KILOS_NETO_DPINDUSTRIAL']; ?></td>
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
                                                                        <button type="button" class=" btn btn-rounded btn-warning btn-outline" <?php echo $DISABLED2; ?> id="defecto" name="agregar" Onclick="abrirVentana('registroDprocesoExportacion.php?IDPROCESO=<?php echo $IDPROCESO; ?>&&PRODUCTOR=<?php echo $PRODUCTOR; ?> &&PVESPECIES=<?php echo $PVESPECIES; ?> &&EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?>' ); ">
                                                                            <i class="glyphicon glyphicon-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <label>Producto Industrial</label>
                                                                        <br>
                                                                        <button type="button" class=" btn btn-rounded btn-danger btn-outline" <?php echo $DISABLED2; ?> id="defecto" name="agregar" Onclick="abrirVentana('registroDprocesoIndustrial.php?IDPROCESO=<?php echo $IDPROCESO; ?>&PRODUCTOR=<?php echo $PRODUCTOR; ?> &&PVESPECIES=<?php echo $PVESPECIES; ?> &&&EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?>' ); ">
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
                                                            <button type=" button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroProceso.php');">
                                                                <i class="ti-trash"></i> CANCELAR
                                                            </button>
                                                        <?php } ?>
                                                        <?php if ($OP == "editar") { ?>
                                                            <button type="button" class="btn btn-rounded  btn-success btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('listarProceso.php'); ">
                                                                <i class="ti-back-left "></i> VOLVER
                                                            </button>
                                                        <?php } ?>

                                                        <?php if ($OP == "ver") { ?>
                                                            <button type="button" class="btn btn-rounded  btn-success btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('listarProceso.php'); ">
                                                                <i class="ti-back-left "></i> VOLVER
                                                            </button>
                                                        <?php } ?>
                                                        <?php if ($OP == "") { ?>
                                                            <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroProceso.php');">
                                                                <i class="ti-trash"></i> CANCELAR
                                                            </button>
                                                        <?php } ?>

                                                        <?php if ($OP == "crear") { ?>
                                                            <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="EDITAR" value="EDITAR" <?php echo $DISABLEDFOLIO;?>>
                                                                <i class="ti-save-alt"></i> GUARDAR
                                                            </button>
                                                        <?php }   ?>
                                                        <?php if ($OP == "editar") { ?>
                                                            <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="EDITAR" value="EDITAR" <?php echo $DISABLEDFOLIO;?> >
                                                                <i class="ti-save-alt"></i> GUARDAR
                                                            </button>
                                                        <?php }   ?>


                                                        <?php if ($OP == "crear") { ?>
                                                            <button type="submit" class="btn btn-rounded btn-danger btn-outline" name="CERRAR" value="CERRAR" <?php echo $DISABLED; ?> <?php echo $DISABLEDFOLIO;?>>
                                                                <i class="ti-save-alt"></i> CERRAR
                                                            </button>
                                                        <?php }   ?>

                                                        <?php if ($OP == "editar") { ?>
                                                            <button type="submit" class="btn btn-rounded btn-danger btn-outline" name="CERRAR" value="CERRAR" <?php echo $DISABLED; ?> <?php echo $DISABLEDFOLIO;?>>
                                                                <i class="ti-save-alt"></i> CERRAR
                                                            </button>
                                                        <?php }   ?>

                                                        <?php if ($OP == "ver") { ?>
                                                            <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED; ?> <?php echo $DISABLEDFOLIO;?>>
                                                                <i class="ti-save-alt"></i> CREAR
                                                            </button>
                                                        <?php } ?>
                                                        <?php if ($OP == "") { ?>
                                                            <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED; ?> <?php echo $DISABLEDFOLIO;?>>
                                                                <i class="ti-save-alt"></i> CREAR
                                                            </button>
                                                        <?php } ?>
                                                    </td>
                                                    <td>

                                                        <?php if ($OP != "") { ?>
                                                            <?php if ($ESTADO == "0") {  ?>
                                                                <button type="button" class="btn btn-rounded  btn-info btn-outline mr-1" id="defecto" name="tarjas" <?php echo $DISABLEDFOLIO;?> Onclick="abrirVentana('../documento/informeProceso.php?parametro=<?php echo $IDOP; ?>&&NOMBREUSUARIO=<?php echo $NOMBREUSUARIOS; ?>'); ">
                                                                    <i class="fa fa-file-pdf-o"></i>INFORME
                                                                </button>
                                                            <?php } ?>
                                                            <button type="button" class="btn btn-rounded  btn-info  btn-outline mr-1" id="defecto" name="tarjas" <?php echo $DISABLEDFOLIO;?> Onclick="abrirVentana('../documento/informeTarjasProceso.php?parametro=<?php echo $IDOP; ?>'); ">
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