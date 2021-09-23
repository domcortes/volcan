<?php
include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/FOLIO_ADO.php';

include_once '../controlador/TPROCESO_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/ESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/PROCESO_ADO.php';

include_once '../controlador/ERECEPCION_ADO.php';
include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/EINDUSTRIAL_ADO.php';

include_once '../controlador/DPEXPORTACION_ADO.php';
include_once '../controlador/DPINDUSTRIAL_ADO.php';
include_once '../controlador/PROCESO_ADO.php';


include_once '../controlador/TMANEJO_ADO.php';
include_once '../controlador/TCALIBRE_ADO.php';



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
$ESPECIES_ADO =  new ESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$PROCESO_ADO =  new PROCESO_ADO();

$TMANEJO_ADO =  new TMANEJO_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();

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
$IDQUITAR = "";
$FOLIOEXIMATERIAPRIMAQUITAR = "";
$FECHAPROCESO = "";
$FECHAINGRESOPROCESO = "";
$FECHAMODIFCIACIONPROCESO = "";
$TURNO = "";
$TPROCESO = "";
$OBSERVACIONPROCESO = "";
$PRODUCTOR = "";
$VESPECIES = "";
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

$ARRAYVESPECIES = "";
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
$ARRAYPRODUCTOR = $PRODUCTOR_ADO->listarProductorPorEmpresaCBX($EMPRESAS);
$ARRAYVESPECIES = $VESPECIES_ADO->listarVespeciesPorEmpresaCBX($EMPRESAS);
$ARRAYFECHAACTUAL = $PROCESO_ADO->obtenerFecha();
$FECHAPROCESO = $ARRAYFECHAACTUAL[0]['FECHA'];

$ARRAYFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTexportacion($EMPRESAS, $PLANTAS, $TEMPORADAS);
$ARRAYFOLIO2 = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTindustrial($EMPRESAS, $PLANTAS, $TEMPORADAS);

include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrlD.php";


if (empty($ARRAYFOLIO)) {
    $DISABLEDFOLIO = "disabled";
    $MENSAJEFOLIO = " NECESITA <b> CREAR LOS FOLIOS PT </b> , PARA OCUPAR LA <b>  FUNCIONALIDAD </b>.  FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
}
if (empty($ARRAYFOLIO2)) {
    $DISABLEDFOLIO = "disabled";
    $MENSAJEFOLIO = $MENSAJEFOLIO . "<br> NECESITA <b> CREAR LOS FOLIOS INDUSTRIAL </b> , PARA OCUPAR LA <b>  FUNCIONALIDAD </b>.  FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
}
//OPERACIONES

//OPERACION EDICION DE FILA
if (isset($_REQUEST['GUARDAR'])) {
    $PROCESO->__SET('FECHA_PROCESO',  $_REQUEST['FECHAPROCESOE']);
    $PROCESO->__SET('TURNO',  $_REQUEST['TURNOE']);
    $PROCESO->__SET('OBSERVACIONE_PROCESO', $_REQUEST['OBSERVACIONPROCESOE']);
    $PROCESO->__SET('KILOS_NETO_PROCESO', $_REQUEST['TOTALNETOEXPO']);
    $PROCESO->__SET('KILOS_EXPORTACION_PROCESO', $_REQUEST['TOTALDESHIDRATACIONEX']);
    $PROCESO->__SET('KILOS_INDUSTRIAL_PROCESO', $_REQUEST['TOTALNETOIND']);
    $PROCESO->__SET('PDEXPORTACION_PROCESO', $_REQUEST['PEXPORTACIONEXPOEX']);
    $PROCESO->__SET('PDINDUSTRIAL_PROCESO', $_REQUEST['PEXPORTACIONEXPOINDU']);
    $PROCESO->__SET('PORCENTAJE_PROCESO', $_REQUEST['PEXPORTACIONEXPO']);
    $PROCESO->__SET('ID_VESPECIES',  $_REQUEST['VESPECIESE']);
    $PROCESO->__SET('ID_PRODUCTOR',  $_REQUEST['PRODUCTORE']);
    $PROCESO->__SET('ID_TPROCESO', $_REQUEST['TPROCESOE']);
    $PROCESO->__SET('ID_EMPRESA',  $_REQUEST['EMPRESAE']);
    $PROCESO->__SET('ID_PLANTA',  $_REQUEST['PLANTAE']);
    $PROCESO->__SET('ID_TEMPORADA',  $_REQUEST['TEMPORADAE']);
    $PROCESO->__SET('ID_USUARIOM', $IDUSUARIOS);
    $PROCESO->__SET('ID_PROCESO', $_REQUEST['IDP']);
    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
    $PROCESO_ADO->actualizarProceso($PROCESO);
}
//OPERACION CERRAR DE FILA
if (isset($_REQUEST['CERRAR'])) {
    //UTILIZACION METODOS SET DEL MODELO
    $ARRAYEXIMATERIAPRIMATOMADO = $EXIMATERIAPRIMA_ADO->buscarPorProceso($_REQUEST['IDP']);
    $ARRAYDEXPORTACIONPORPROCESO = $DPEXPORTACION_ADO->buscarPorProceso($_REQUEST['IDP']);
    $ARRATDINDUSTRIALPORPROCESO = $DPINDUSTRIAL_ADO->buscarPorProceso($_REQUEST['IDP']);
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
        $PROCESO->__SET('ID_VESPECIES',  $_REQUEST['VESPECIESE']);
        $PROCESO->__SET('ID_PRODUCTOR',  $_REQUEST['PRODUCTORE']);
        $PROCESO->__SET('ID_TPROCESO', $_REQUEST['TPROCESOE']);
        $PROCESO->__SET('ID_EMPRESA',  $_REQUEST['EMPRESAE']);
        $PROCESO->__SET('ID_PLANTA',  $_REQUEST['PLANTAE']);
        $PROCESO->__SET('ID_TEMPORADA',  $_REQUEST['TEMPORADAE']);
        $PROCESO->__SET('ID_USUARIOM', $IDUSUARIOS);
        $PROCESO->__SET('ID_PROCESO', $_REQUEST['IDP']);
        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
        $PROCESO_ADO->actualizarProceso($PROCESO);

        $PROCESO->__SET('ID_PROCESO', $_REQUEST['IDP']);
        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
        $PROCESO_ADO->cerrado($PROCESO);

        $ARRAYEXIMATERIAPRIMA = $EXIMATERIAPRIMA_ADO->buscarPorProceso($_REQUEST['IDP']);

        $ARRAYEXIEXPORTACION = $EXIEXPORTACION_ADO->buscarPorProceso($_REQUEST['IDP']);
        $ARRAYEXIINDUSTRIAL = $EXIINDUSTRIAL_ADO->buscarPorProceso($_REQUEST['IDP']);



        foreach ($ARRAYEXIMATERIAPRIMA as $r) :
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

        //SEGUNE EL TIPO DE OPERACIONS QUE SE INDENTIFIQUE EN LA URL
        if ($_SESSION['parametro1'] == "crear") {
            $_SESSION["parametro"] = $_REQUEST['IDP'];
            $_SESSION["parametro1"] = "ver";
            echo "<script type='text/javascript'> location.href ='registroProceso.php?op';</script>";
        }
        if ($_SESSION['parametro1'] == "editar") {
            $_SESSION["parametro"] = $_REQUEST['IDP'];
            $_SESSION["parametro1"] = "ver";
            echo "<script type='text/javascript'> location.href ='registroProceso.php?op';</script>";
        }
    }
}



//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['parametro'];
    $OP = $_SESSION['parametro1'];

    //OBTENECION DE INFORMACION DE LA TABLAS DE LA VISTA
    $ARRAYTOMADA = $EXIMATERIAPRIMA_ADO->buscarPorProceso2($IDOP);
    $ARRAYDEXPORTACIONPORPROCESO = $DPEXPORTACION_ADO->buscarPorProceso2($IDOP);
    $ARRATDINDUSTRIALPORPROCESO = $DPINDUSTRIAL_ADO->buscarPorProceso2($IDOP);

    //OBTENCIONS DE TOTALES O EL RESUMEN DE LAS TABLAS

    $ARRAYEXISTENCIAMPTOTAL = $EXIMATERIAPRIMA_ADO->obtenerTotalesProceso($IDOP);
    $ARRAYEXISTENCIAMPTOTAL2 = $EXIMATERIAPRIMA_ADO->obtenerTotalesProceso2($IDOP);
    $TOTALNETOE = $ARRAYEXISTENCIAMPTOTAL[0]['NETO'];
    $TOTALENVASEE = $ARRAYEXISTENCIAMPTOTAL[0]['ENVASE'];
    $TOTALNETOEV = $ARRAYEXISTENCIAMPTOTAL2[0]['NETO'];
    $TOTALENVASEEV = $ARRAYEXISTENCIAMPTOTAL2[0]['ENVASE'];


    $ARRATDINDUSTRIALTOTALPROCESO = $DPINDUSTRIAL_ADO->obtenerTotales($IDOP);
    $ARRATDINDUSTRIALTOTALPROCESO2 = $DPINDUSTRIAL_ADO->obtenerTotales2($IDOP);
    $TOTALNETOIND = $ARRATDINDUSTRIALTOTALPROCESO[0]['NETO'];
    $TOTALNETOINDV = $ARRATDINDUSTRIALTOTALPROCESO2[0]['NETO'];

    $ARRAYDEXPORTACIONTOTALPROCESO = $DPEXPORTACION_ADO->obtenerTotales($IDOP);
    $ARRAYDEXPORTACIONTOTALPROCES2 = $DPEXPORTACION_ADO->obtenerTotales2($IDOP);
    $TOTALENVASEEX = $ARRAYDEXPORTACIONTOTALPROCESO[0]['ENVASE'];
    $TOTALNETOEX = $ARRAYDEXPORTACIONTOTALPROCESO[0]['NETO'];
    $TOTALBRUTOEX = $ARRAYDEXPORTACIONTOTALPROCESO[0]['BRUTO'];
    $TOTALDESHIDRATACIONEX = $ARRAYDEXPORTACIONTOTALPROCESO[0]['DESHIDRATACION'];

    $TOTALENVASEEXV = $ARRAYDEXPORTACIONTOTALPROCES2[0]['ENVASE'];
    $TOTALNETOEXV = $ARRAYDEXPORTACIONTOTALPROCES2[0]['NETO'];
    $TOTALBRUTOEXV = $ARRAYDEXPORTACIONTOTALPROCES2[0]['BRUTO'];
    $TOTALDESHIDRATACIONEXV = $ARRAYDEXPORTACIONTOTALPROCES2[0]['DESHIDRATACION'];


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
        $ARRAYPROCESO = $PROCESO_ADO->verProceso($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYPROCESO as $r) :

            $IDPROCESO = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_PROCESO'];
            $FECHAPROCESO = "" . $r['FECHA_PROCESO'];
            $FECHAINGRESOPROCESO = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONPROCESO = "" . $r['MODIFICACION'];
            $TURNO = "" . $r['TURNO'];
            $TPROCESO = "" . $r['ID_TPROCESO'];
            $OBSERVACIONPROCESO = "" . $r['OBSERVACIONE_PROCESO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $ESTADO = "" . $r['ESTADO'];

        endforeach;
    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL

        $DISABLED = "";
        $DISABLED2 = "";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $ARRAYPROCESO = $PROCESO_ADO->verProceso($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYPROCESO as $r) :
            $IDPROCESO = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_PROCESO'];
            $FECHAPROCESO = "" . $r['FECHA_PROCESO'];
            $FECHAINGRESOPROCESO = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONPROCESO = "" . $r['MODIFICACION'];
            $TURNO = "" . $r['TURNO'];
            $TPROCESO = "" . $r['ID_TPROCESO'];
            $OBSERVACIONPROCESO = "" . $r['OBSERVACIONE_PROCESO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $ESTADO = "" . $r['ESTADO'];

        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION

        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR  
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYPROCESO = $PROCESO_ADO->verProceso($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYPROCESO as $r) :
            $IDPROCESO = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_PROCESO'];
            $FECHAPROCESO = "" . $r['FECHA_PROCESO'];
            $FECHAINGRESOPROCESO = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONPROCESO = "" . $r['MODIFICACION'];
            $TURNO = "" . $r['TURNO'];
            $TPROCESO = "" . $r['ID_TPROCESO'];
            $OBSERVACIONPROCESO = "" . $r['OBSERVACIONE_PROCESO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
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
    }
    if (isset($_REQUEST['VESPECIES'])) {
        $VESPECIES = $_REQUEST['VESPECIES'];
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
                    VESPECIES = document.getElementById("VESPECIES").selectedIndex;
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


                    if (VESPECIES == null || VESPECIES == 0) {
                        document.form_reg_dato.VESPECIES.focus();
                        document.form_reg_dato.VESPECIES.style.borderColor = "#FF0000";
                        document.getElementById('val_variedad').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.VESPECIES.style.borderColor = "#4AF575";

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

                function abrirPestana(url) {
                    var win = window.open(url, '_blank');
                    win.focus();
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
                                <h3 class="page-title">Proceso</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Packing</li>
                                            <li class="breadcrumb-item" aria-current="page">Proceso</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#p">Operaciones Proceso </a>
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
                        <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                            <div class="box">
                                <div class="card-header">
                                    <h4 class="card-title">Encabezado de Proceso</h4>
                                </div>
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



                                                <input type="hidden" class="form-control" placeholder="TOTAL ENVASE" id="TOTALENVASE" name="TOTALENVASE" value="<?php echo $TOTALENVASEE; ?>" />
                                                <input type="hidden" class="form-control" placeholder="TOTAL NETO" id="TOTALNETO" name="TOTALNETO" value="<?php echo $TOTALNETOE; ?>" />

                                                <input type="hidden" class="form-control" id="TOTALNETOEX" name="TOTALNETOEX" value="<?php echo $TOTALNETOEX; ?>" />
                                                <input type="hidden" class="form-control" id="TOTALENVASEEXPO" name="TOTALENVASEEXPO" value="<?php echo $TOTALENVASEEXPO; ?>" />
                                                <input type="hidden" class="form-control" id="TOTALNETOEXPO" name="TOTALNETOEXPO" value="<?php echo $TOTALNETOEXPO; ?>" />
                                                <input type="hidden" class="form-control" id="TOTALDESHIDRATACIONEX" name="TOTALDESHIDRATACIONEX" value="<?php echo $TOTALDESHIDRATACIONEX; ?>" />

                                                <input type="hidden" class="form-control" id="TOTALENVASEIND" name="TOTALENVASEIND" value="<?php echo $TOTALENVASEIND; ?>" />
                                                <input type="hidden" class="form-control" id="TOTALNETOIND" name="TOTALNETOIND" value="<?php echo $TOTALNETOIND; ?>" />


                                                <input type="hidden" class="form-control" id="PEXPORTACIONEXPO" name="PEXPORTACIONEXPO" value="<?php echo $PEXPORTACIONEXPO; ?>" />
                                                <input type="hidden" class="form-control" placeholder="TOTAL NETO" id="PEXPORTACIONEXPOEX" name="PEXPORTACIONEXPOEX" value="<?php echo $PEXPORTACIONEXPOEX; ?>" />
                                                <input type="hidden" class="form-control" placeholder="TOTAL NETO" id="PEXPORTACIONEXPOINDU" name="PEXPORTACIONEXPOINDU" value="<?php echo $PEXPORTACIONEXPOINDU; ?>" />



                                                <input type="hidden" class="form-control" placeholder="DIFERENCIA KILOS NETO" id="DIFERENCIAKILOSNETOEX" name="DIFERENCIAKILOSNETOEX" value="<?php echo $DIFERENCIAKILOSNETOEXPO; ?>" />

                                                <input type="hidden" class="form-control" placeholder="ID PROCESO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP PROCESO" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL PROCESO" id="URLP" name="URLP" value="registroProceso" />
                                                <label>Numero</label>
                                                <input type="number" class="form-control" style="background-color: #eeeeee;" placeholder="Numero Proceso" id="NUMEROVER" name="NUMEROVER" value="<?php echo $NUMEROVER; ?>" disabled />
                                                <label id="val_id" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-1 col-lg-1 col-md-6 col-sm-6 col-6 col-xs-6">
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Ingreso</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Ingreso " id="FECHAINGRESOPROCESOE" name="FECHAINGRESOPROCESOE" value="<?php echo $FECHAINGRESOPROCESO; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="FECHA RECEPCION" id="FECHAINGRESOPROCESO" name="FECHAINGRESOPROCESO" value="<?php echo $FECHAINGRESOPROCESO; ?>" disabled />
                                                <label id="val_fechai" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Modificacion</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Modificacion " id="FECHAMODIFCIACIONPROCESOE" name="FECHAMODIFCIACIONPROCESOE" value="<?php echo $FECHAMODIFCIACIONPROCESO; ?>" />
                                                <input type="date" class="form-control " style="background-color: #eeeeee;" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACIONPROCESO" name="FECHAMODIFCIACIONPROCESO" value="<?php echo $FECHAMODIFCIACIONPROCESO; ?>" disabled />
                                                <label id="val_fecham" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha </label>
                                                <input type="hidden" class="form-control" placeholder="FECHA PROCESO" id="FECHAPROCESOE" name="FECHAPROCESOE" value="<?php echo $FECHAPROCESO; ?>" />
                                                <input type="date" class="form-control" <?php echo $DISABLEDSTYLE; ?> placeholder="Fecha Proceso" id="FECHAPROCESO" name="FECHAPROCESO" value="<?php echo $FECHAPROCESO; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?> />
                                                <label id="val_fechap" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
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
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <label>Tipo Proceso</label>
                                                <input type="hidden" class="form-control" placeholder="TIPO PROCESO" id="TPROCESOE" name="TPROCESOE" value="<?php echo $TPROCESO; ?>" />
                                                <select class="form-control select2" id="TPROCESO" name="TPROCESO" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?>>
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
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <label>Productor</label>
                                                <input type="hidden" class="form-control" placeholder="PRODUCTOR" id="PRODUCTORE" name="PRODUCTORE" value="<?php echo $PRODUCTOR; ?>" />
                                                <select class="form-control select2" id="PRODUCTOR" name="PRODUCTOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?>>
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
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <label>Variedad</label>
                                                <input type="hidden" class="form-control" placeholder="Variedad" id="VESPECIESE" name="VESPECIESE" value="<?php echo $VESPECIES; ?>" />
                                                <select class="form-control select2" id="VESPECIES" name="VESPECIES" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYVESPECIES as $r) : ?>
                                                        <?php if ($ARRAYVESPECIES) {    ?>
                                                            <option value="<?php echo $r['ID_VESPECIES']; ?>" <?php if ($VESPECIES == $r['ID_VESPECIES']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>>
                                                                <?php echo $r['NOMBRE_VESPECIES'];  ?>
                                                            </option>
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
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="OBSERVACION PROCESO" id="OBSERVACIONPROCESOE" name="OBSERVACIONPROCESOE" value="<?php echo $OBSERVACIONPROCESO; ?>" />
                                                <label>Observaciones </label>
                                                <textarea class="form-control" rows="1" <?php echo $DISABLEDSTYLE; ?> placeholder="Ingrese Nota e Observacion  " id="OBSERVACIONPROCESO" name="OBSERVACIONPROCESO" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?>><?php echo $OBSERVACIONPROCESO; ?></textarea>
                                                <label id="val_observacion" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <div class="box-footer">
                                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar">
                                        <div class="btn-group col-sm-4" role="group" aria-label="acciones">
                                            <?php if ($OP == "") { ?>
                                                <button type=" button" class="btn btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroProceso.php');">
                                                    <i class="ti-trash"></i> Cancelar
                                                </button>
                                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" <?php echo $DISABLEDFOLIO; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Crear
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <button type="button" class="btn  btn-success " data-toggle="tooltip" title="Volver" name="VOLVER" value="VOLVER" Onclick="irPagina('listarProceso.php'); ">
                                                    <i class="ti-back-left "></i> Volver
                                                </button>
                                                <button type="submit" class="btn btn-warning " data-toggle="tooltip" title="Editar" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?> onclick="return validacion()">
                                                    <i class="ti-pencil-alt"></i> Editar
                                                </button>
                                                <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Cerrar" name="CERRAR" value="CERRAR" <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Cerrar
                                                </button>
                                            <?php } ?>
                                        </div>
                                        <div class="btn-group col-sm-4">
                                            <?php if ($OP != ""): ?>
                                            <button type="button"
                                                class="btn btn-primary  "
                                                data-toggle="tooltip"
                                                title="Informe"
                                                id="defecto"
                                                name="tarjas"
                                                <?php echo $DISABLEDFOLIO; ?>
                                                Onclick="abrirPestana('../documento/informeProceso.php?parametro=<?php echo $IDOP; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                <i class="fa fa-file-pdf-o"></i> Proceso
                                            </button>
                                            <button
                                                type="button"
                                                class="btn  btn-info  "
                                                data-toggle="tooltip"
                                                title="Tarja"
                                                id="defecto"
                                                name="tarjas"
                                                <?php echo $DISABLEDFOLIO; ?>
                                                Onclick="abrirPestana('../documento/informeTarjasProceso.php?parametro=<?php echo $IDOP; ?>'); ">
                                                <i class="fa fa-file-pdf-o"></i> Tarjas
                                            </button>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                        <div class="card">
                            <div class="card-header bg-success">
                                <h4 class="card-title">Detalles de Existencia</h4>
                            </div>
                            <div class="card-header">
                                <form method="post" id="form2" name="form2">
                                    <div class="form-row align-items-center">
                                        <input type="hidden" class="form-control" placeholder="ID PROCESO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                        <input type="hidden" class="form-control" placeholder="OP PROCESO" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                        <input type="hidden" class="form-control" placeholder="URL PROCESO" id="URLP" name="URLP" value="registroProceso" />
                                        <input type="hidden" class="form-control" placeholder="URL SELECCION" id="URLD" name="URLD" value="registroSelecionExistenciaMPProceso" />
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-success btn-block mb-2" data-toggle="tooltip" title="Seleccion Existencia" id="SELECIONOCDURL" name="SELECIONOCDURL" <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?> <?php if ($ESTADO == 0) { echo "disabled style='background-color: #eeeeee;'";} ?>>Seleccion Existencia</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="ingreso" class="table table-hover " style="width: 100%;">
                                        <thead>
                                            <tr class="text-left">
                                                <th>Folio </th>
                                                <th class="text-center">Operaciones</th>
                                                <th>Fecha Cosecha </th>
                                                <th>Código Estandar </th>
                                                <th>Envase/Estandar </th>
                                                <th>Especies </th>
                                                <th>Variedad </th>
                                                <th>Cantidad Envase</th>
                                                <th>Kilo Neto</th>
                                                <th>Tipo Manejo</th>
                                                <th>CSG Productor </th>
                                                <th>Nombre Productor </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($ARRAYTOMADA) { ?>
                                                <?php foreach ($ARRAYTOMADA as $r) : ?>
                                                    <?php
                                                    $ARRAYEVERERECEPCIONID = $ERECEPCION_ADO->verEstandar($r['ID_ESTANDAR']);
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
                                                        $ARRAYVERESPECIESID = $ESPECIES_ADO->verEspecies($ARRAYVERVESPECIESID[0]['ID_ESPECIES']);
                                                        if ($ARRAYVERVESPECIESID) {
                                                            $NOMBRESPECIES = $ARRAYVERESPECIESID[0]['NOMBRE_ESPECIES'];
                                                        } else {
                                                            $NOMBRESPECIES = "Sin Datos";
                                                        }
                                                    } else {
                                                        $NOMBREVESPECIES = "Sin Datos";
                                                        $NOMBRESPECIES = "Sin Datos";
                                                    }
                                                    $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                    if ($ARRAYVERPRODUCTORID) {

                                                        $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                        $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                    } else {
                                                        $CSGPRODUCTOR = "Sin Datos";
                                                        $NOMBREPRODUCTOR = "Sin Datos";
                                                    }
                                                    $ARRAYEVERERECEPCIONID = $ERECEPCION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                    if ($ARRAYEVERERECEPCIONID) {
                                                        $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
                                                        $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                    } else {
                                                        $CODIGOESTANDAR = "Sin Datos";
                                                        $NOMBREESTANDAR = "Sin Datos";
                                                    }
                                                    $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
                                                    if ($ARRAYTMANEJO) {
                                                        $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                    } else {
                                                        $NOMBRETMANEJO = "Sin Datos";
                                                    }
                                                    ?>
                                                    <tr class="text-left">
                                                        <td><?php echo $r['FOLIO_AUXILIAR_EXIMATERIAPRIMA']; ?> </td>
                                                        <td class="text-center">
                                                            <form method="post" id="form1">
                                                                <input type="hidden" class="form-control" id="IDQUITAR" name="IDQUITAR" value="<?php echo $r['ID_EXIMATERIAPRIMA']; ?>" />
                                                                <div class="btn-group btn-block" role="group" aria-label="Operaciones Detalle">
                                                                    <button type="submit" class="btn btn-sm btn-danger " id="QUITAR" name="QUITAR" data-toggle="tooltip" title="Quitar Existencia MP" <?php echo $DISABLED2;?> <?php if ($ESTADO == 0) {echo "disabled";} ?>><i class="ti-close"></i></button>
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td><?php echo $r['CANTIDAD_ENVASE_EXIMATERIAPRIMA']; ?></td>
                                                        <td><?php echo $CODIGOESTANDAR; ?></td>
                                                        <td><?php echo $NOMBREESTANDAR; ?></td>
                                                        <td><?php echo $NOMBRESPECIES; ?></td>
                                                        <td><?php echo $NOMBREVESPECIES; ?></td>
                                                        <td><?php echo $r['CANTIDAD_ENVASE_EXIMATERIAPRIMA']; ?></td>
                                                        <td><?php echo $r['KILOS_NETO_EXIMATERIAPRIMA']; ?></td>
                                                        <td><?php echo $NOMBRETMANEJO; ?></td>
                                                        <td><?php echo $CSGPRODUCTOR; ?></td>
                                                        <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Datos generales">
                                    <div class="form-row align-items-center" role="group" aria-label="Datos">
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Envase</div>
                                                </div>
                                                <!-- inicio input -->
                                                <input type="hidden" class="form-control" placeholder="TOTAL ENVASE" id="TOTALENVASE" name="TOTALENVASE" value="<?php echo $TOTALENVASEE; ?>" />
                                                <input type="text" class="form-control text-center" placeholder="Total Envase" id="TOTALENVASEEV" name="TOTALENVASEEV" value="<?php echo $TOTALENVASEEV; ?>" disabled />
                                                <!-- /termino input -->
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Neto</div>
                                                </div>
                                                <!-- inicio input -->
                                                <input type="hidden" class="form-control" placeholder="TOTAL NETO" id="TOTALNETO" name="TOTALNETO" value="<?php echo $TOTALNETOE; ?>" />
                                                <input type="text" class="form-control text-center" placeholder="Total Neto " id="TOTALNETOEV" name="TOTALNETOEV" value="<?php echo $TOTALNETOEV; ?>" disabled />
                                                <!-- /termino input -->
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">% Exportacion</div>
                                                </div>
                                                <!-- inicio input -->
                                                <input type="hidden" class="form-control" placeholder="TOTAL NETO" id="PEXPORTACIONEXPOEX" name="PEXPORTACIONEXPOEX" value="<?php echo $PEXPORTACIONEXPOEX; ?>" />
                                                <input type="text" class="form-control text-center" placeholder="% Exportacion" id="PEXPORTACIONEXPOEXV" name="PEXPORTACIONEXPOEXV" value="<?php echo $PEXPORTACIONEXPOEX; ?>" disabled />
                                                <!-- /termino input -->
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">% Industrial</div>
                                                </div>
                                                <!-- inicio input -->
                                                <input type="hidden" class="form-control" placeholder="TOTAL NETO" id="PEXPORTACIONEXPOINDU" name="PEXPORTACIONEXPOINDU" value="<?php echo $PEXPORTACIONEXPOINDU; ?>" />
                                                <input type="text" class="form-control text-center" placeholder="% Industrial" id="PEXPORTACIONEXPOINDUV" name="PEXPORTACIONEXPOINDUV" value="<?php echo $PEXPORTACIONEXPOINDU; ?>" disabled />
                                                <!-- /termino input -->
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <label id="val_dproceso" class="validacion"><?php echo $MENSAJEEXISTENCIA; ?> </label>
                                        </div>
                                        <div class="col-auto">
                                            <label id="val_dproceso" class="validacion"><?php echo $MENSAJEPORCENTAJE; ?> </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header bg-info">
                                <h4 class="card-title">Salida / Detalle Proceso </h4>
                            </div>
                            <div class="card-header">
                                <div class="form-row align-items-center">
                                    <div class="btn-group">
                                        <form method="post" id="form5" name="form5">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="ID PROCESO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP PROCESO" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL PROCESO" id="URLP" name="URLP" value="registroProceso" />
                                                <input type="hidden" class="form-control" placeholder="URL SELECCION" id="URLD" name="URLD" value="registroDprocesoExportacion" />
                                                <button type="submit" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Producto Terminado" id="CREARDURL" name="CREARDURL" <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?> <?php if ($ESTADO == 0) {
                                                echo "disabled style='background-color: #eeeeee;'";} ?>>Agregar prod. Terminado</button>
                                            </div>
                                        </form>
                                        <form method="post" id="form6" name="form6">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="ID PROCESO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP PROCESO" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL PROCESO" id="URLP" name="URLP" value="registroProceso" />
                                                <input type="hidden" class="form-control" placeholder="URL SELECCION" id="URLD" name="URLD" value="registroDprocesoIndustrial" />
                                                <button type="submit" class="btn btn-secondary btn-block" data-toggle="tooltip" title="Agregar Producto Industrial" id="CREARDURL" name="CREARDURL" <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?> <?php if ($ESTADO == 0) { echo "disabled style='background-color: #eeeeee;'"; } ?>>Agregar prod. Industrial</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="salida" class="table table-hover " style="width: 100%;">
                                        <thead>
                                            <tr class="text-left">
                                                <th>P. Terminado/Industrial</th>
                                                <th>Folio</th>
                                                <th class="text-center">Operaciones</th>
                                                <th>Fecha Embalado </th>
                                                <th>Envase/Estandar</th>
                                                <th>Variedad</th>
                                                <th>Cantidad Envase</th>
                                                <th>Kilo Neto </th>
                                                <th>% Deshidratación </th>
                                                <th>Kilo Con Deshidratación </th>
                                                <th>Kilo Bruto </th>
                                                <th>Embolsado </th>
                                                <th>Tipo Manejo </th>
                                                <th>Tipo Calibre </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($ARRAYDEXPORTACIONPORPROCESO) { ?>
                                                <?php foreach ($ARRAYDEXPORTACIONPORPROCESO as $r) : ?>

                                                    <?php
                                                    $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
                                                    if ($ARRAYVESPECIES) {
                                                        $NOMBREVARIEDAD = $ARRAYVESPECIES[0]['NOMBRE_VESPECIES'];
                                                    } else {
                                                        $NOMBREVARIEDAD = "Sin Datos";
                                                    }
                                                    $ARRAYTCALIBRE = $TCALIBRE_ADO->verCalibre($r['ID_TCALIBRE']);
                                                    if ($ARRAYTCALIBRE) {
                                                        $NOMBRETCALIBRE = $ARRAYTCALIBRE[0]['NOMBRE_TCALIBRE'];
                                                    } else {
                                                        $NOMBRETCALIBRE = "Sin Datos";
                                                    }
                                                    $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
                                                    if ($ARRAYTMANEJO) {
                                                        $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                    } else {
                                                        $NOMBRETMANEJO = "Sin Datos";
                                                    }
                                                    $ARRAYESTANDAR = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                    if ($ARRAYESTANDAR) {
                                                        $NOMBREESTANDAR = $ARRAYESTANDAR[0]['NOMBRE_ESTANDAR'];
                                                    } else {
                                                        $NOMBREESTANDAR = "Sin Datos";
                                                    }
                                                    if ($r['EMBOLSADO'] == "0") {
                                                        $EMBOLSADO = "NO";
                                                    } else if ($r['EMBOLSADO'] == "1") {
                                                        $EMBOLSADO =  "SI";
                                                    } else {
                                                        $EMBOLSADO = "Sin Datos";
                                                    }
                                                    ?>
                                                    <tr class="text-left">
                                                        <td>P. Terminado</td>
                                                        <td><?php echo $r['FOLIO_DPEXPORTACION']; ?></td>
                                                        <td class="text-center">
                                                            <form method="post" id="form3" id="form3">
                                                                <input type="hidden" class="form-control" placeholder="ID DPEXPORTACION" id="IDD" name="IDD" value="<?php echo $r['ID_DPEXPORTACION']; ?>" />
                                                                <input type="hidden" class="form-control" placeholder="ID PROCESO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                                <input type="hidden" class="form-control" placeholder="OP PROCESO" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                                <input type="hidden" class="form-control" placeholder="URL PROCESO" id="URLP" name="URLP" value="registroProceso" />
                                                                <input type="hidden" class="form-control" placeholder="URL DPEXPORTACION" id="URLD" name="URLD" value="registroDprocesoExportacion" />
                                                                <div class="btn-group btn-rounded btn-block" role="group" aria-label="Operaciones Detalle">
                                                                    <?php if ($ESTADO == "0") { ?>
                                                                        <button type="submit" class="btn  btn-info  btn-sm" id="VERDURL" name="VERDURL" data-toggle="tooltip" title="Ver Detalle ">
                                                                            <i class="ti-eye"></i>
                                                                        </button>
                                                                    <?php } ?>
                                                                    <?php if ($ESTADO == "1") { ?>
                                                                        <button type="submit" class="btn btn-warning btn-sm" id="EDITARDURL" name="EDITARDURL" data-toggle="tooltip" title="Editar Detalle " <?php echo $DISABLED2; ?>>
                                                                            <i class="ti-pencil-alt"></i>
                                                                        </button>
                                                                        <button type="submit" class="btn   btn-secondary btn-sm" id="DUPLICARDURL" name="DUPLICARDURL" data-toggle="tooltip" title="Duplicar Detalle " <?php echo $DISABLED2; ?>>
                                                                            <i class="fa fa-fw fa-copy"></i>
                                                                        </button>
                                                                        <button type="submit" class="btn btn-danger btn-sm" id="ELIMINARDURL" name="ELIMINARDURL" data-toggle="tooltip" title="Eliminar Detalle " <?php echo $DISABLED2; ?>>
                                                                            <i class="ti-close"></i>
                                                                        </button>
                                                                    <?php } ?>
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td><?php echo $r['EMBALADO']; ?></td>
                                                        <td><?php echo $NOMBREESTANDAR; ?></td>
                                                        <td><?php echo $NOMBREVARIEDAD; ?></td>
                                                        <td><?php echo $r['ENVASE']; ?></td>
                                                        <td><?php echo $r['NETO']; ?></td>
                                                        <td><?php echo $r['PORCENTAJE']; ?></td>
                                                        <td><?php echo $r['DESHIDRATACION']; ?></td>
                                                        <td><?php echo $r['BRUTO']; ?></td>
                                                        <td><?php echo $EMBOLSADO; ?></td>
                                                        <td><?php echo $NOMBRETMANEJO; ?></td>
                                                        <td><?php echo $NOMBRETCALIBRE; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php } ?>
                                            <?php if ($ARRATDINDUSTRIALPORPROCESO) { ?>
                                                <?php foreach ($ARRATDINDUSTRIALPORPROCESO as $r) : ?>

                                                    <?php
                                                    $ARRAYVEREINDUTRIAL = $EINDUSTRIAL_ADO->verEstandar($r['ID_ESTANDAR']);
                                                    if ($ARRAYVEREINDUTRIAL) {
                                                        $NOMBREESTANDARI = $ARRAYVEREINDUTRIAL[0]['NOMBRE_ESTANDAR'];
                                                    } else {
                                                        $NOMBREESTANDARI = "Sin Datos";
                                                    }
                                                    ?>
                                                    <tr class="text-left">
                                                        <td>P. Industrial</td>
                                                        <td><?php echo $r['FOLIO_DPINDUSTRIAL']; ?></td>
                                                        <td class="text-center">
                                                            <form method="post" id="form4" id="form4">
                                                                <input type="hidden" class="form-control" placeholder="ID DPINDUSTRIAL" id="IDD" name="IDD" value="<?php echo $r['ID_DPINDUSTRIAL']; ?>" />
                                                                <input type="hidden" class="form-control" placeholder="ID PROCESO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                                <input type="hidden" class="form-control" placeholder="OP PROCESO" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                                <input type="hidden" class="form-control" placeholder="URL PROCESO" id="URLP" name="URLP" value="registroProceso" />
                                                                <input type="hidden" class="form-control" placeholder="URL DPINDUSTRIAL" id="URLD" name="URLD" value="registroDprocesoIndustrial" />
                                                                <div class="btn-group btn-rounded btn-block" role="group" aria-label="Operaciones Detalle">
                                                                    <?php if ($ESTADO == "0") { ?>
                                                                        <button type="submit" class="btn btn-rounded btn-info   " id="VERDURL" name="VERDURL" data-toggle="tooltip" title="Ver Detalle ">
                                                                            <i class="ti-eye"></i>
                                                                        </button>
                                                                    <?php } ?>
                                                                    <?php if ($ESTADO == "1") { ?>
                                                                        <button type="submit" class="btn  btn-rounded   btn-warning  " id="EDITARDURL" name="EDITARDURL" data-toggle="tooltip" title="Editar Detalle " <?php echo $DISABLED2; ?>>
                                                                            <i class="ti-pencil-alt"></i>
                                                                        </button>
                                                                        <button type="submit" class="btn btn-rounded  btn-secondary  " id="DUPLICARDURL" name="DUPLICARDURL" data-toggle="tooltip" title="Duplicar Detalle " <?php echo $DISABLED2; ?>>
                                                                            <i class="fa fa-fw fa-copy"></i>
                                                                        </button>
                                                                        <button type="submit" class="btn btn-rounded   btn-danger  " id="ELIMINARDURL" name="ELIMINARDURL" data-toggle="tooltip" title="Eliminar Detalle " <?php echo $DISABLED2; ?>>
                                                                            <i class="ti-close"></i>
                                                                        </button>
                                                                    <?php } ?>
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td><?php echo $r['FECHA_EMBALADO_DPINDUSTRIAL']; ?></td>
                                                        <td> <?php echo $NOMBREESTANDARI; ?> </td>
                                                        <td>-</td>
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
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Datos generales">
                                    <div class="form-row align-items-center" role="group" aria-label="Datos">
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        Kilos Exportacion
                                                    </div>
                                                </div>
                                                <input type="hidden" class="form-control" id="TOTALDESHIDRATACIONEX" name="TOTALDESHIDRATACIONEX" value="<?php echo $TOTALDESHIDRATACIONEX; ?>" />
                                                <input type="text" class="form-control text-center" placeholder="TOTAL DESHIDRATACION" id="TOTALDESHIDRATACIONEXV" name="TOTALDESHIDRATACIONEXV" value="<?php echo $TOTALDESHIDRATACIONEXV; ?>" disabled />
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        Kilos Industrial
                                                    </div>
                                                </div>
                                                <input type="hidden" class="form-control" id="TOTALNETOIND" name="TOTALNETOIND" value="<?php echo $TOTALNETOIND; ?>" />
                                                <input type="text" class="form-control text-center" placeholder="TOTAL NETO" id="TOTALNETOINDV" name="TOTALNETOINDV" value="<?php echo $TOTALNETOINDV; ?>" disabled />
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        Diferencia Kilos
                                                    </div>
                                                </div>
                                                <input type="hidden" class="form-control" placeholder="DIFERENCIA KILOS NETO" id="DIFERENCIAKILOSNETOEX" name="DIFERENCIAKILOSNETOEX" value="<?php echo $DIFERENCIAKILOSNETOEXPO; ?>" />
                                                <input type="text" class="form-control text-center" placeholder="DIFERENCIA KILOS NETO" id="DIFERENCIAKILOSNETOEXN" name="DIFERENCIAKILOSNETOEXN" value="<?php echo $DIFERENCIAKILOSNETOEXPO; ?>" disabled />
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <label id="val_dproceso" class="validacion "><?php echo $MENSAJEEXPORTACION; ?> </label>
                                        </div>
                                        <div class="col-auto">
                                            <label id="val_dproceso" class="validacion "><?php echo $MENSAJEINDUSTRIAL; ?> </label>
                                        </div>
                                        <div class="col-auto">
                                            <label id="val_dproceso" class="validacion center"><?php echo $MENSAJEDIFERENCIA; ?> </label>
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
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['CREAR'])) {

                $ARRAYNUMERO = $PROCESO_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;

                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO
                $PROCESO->__SET('NUMERO_PROCESO', $NUMERO);
                $PROCESO->__SET('FECHA_PROCESO', $_REQUEST['FECHAPROCESO']);
                $PROCESO->__SET('TURNO', $_REQUEST['TURNO']);
                $PROCESO->__SET('OBSERVACIONE_PROCESO', $_REQUEST['OBSERVACIONPROCESO']);
                $PROCESO->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
                $PROCESO->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                $PROCESO->__SET('ID_TPROCESO', $_REQUEST['TPROCESO']);
                $PROCESO->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $PROCESO->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                $PROCESO->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                $PROCESO->__SET('ID_USUARIOI', $IDUSUARIOS);
                $PROCESO->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR  HORAINGRESOPROCESO
                $PROCESO_ADO->agregarProceso($PROCESO);
                //OBTENER EL ID DE LA RECEPCION CREADA PARA LUEGO ENVIAR EL INGRESO DEL DETALLE
                $ARRYAOBTENERID = $PROCESO_ADO->obtenerId(
                    $_REQUEST['FECHAPROCESO'],
                    $_REQUEST['EMPRESA'],
                    $_REQUEST['PLANTA'],
                    $_REQUEST['TEMPORADA'],
                );
                //REDIRECCIONAR A PAGINA registroRecepcion.php

                $_SESSION["parametro"] = $ARRYAOBTENERID[0]['ID_PROCESO'];
                $_SESSION["parametro1"] = "crear";
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Proceso registrado",
                        showConfirmButton:true
                    }).then((result)=>{
                        location.href ="registroProceso.php?op";
                    })
                </script>';
            }

            if (isset($_REQUEST['QUITAR'])) {
                $IDQUITAR = $_REQUEST['IDQUITAR'];
                $EXIMATERIAPRIMA->__SET('ID_EXIMATERIAPRIMA', $_REQUEST['IDQUITAR']);
                //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                $EXIMATERIAPRIMA_ADO->actualizarDeselecionarProcesoCambiarEstado($EXIMATERIAPRIMA);
                echo
                    '<script>
                        Swal.fire({
                            icon:"info",
                            title:"Folio eliminado"
                        }).then((result)=>{
                            if(result.value){
                                location.href = "/fruta/vista/registroProceso.php?op";
                            }
                        });
                    </script>';
            }
        ?>
</body>

</html>