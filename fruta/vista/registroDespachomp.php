<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/USUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';


include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/ERECEPCION_ADO.php';

include_once '../controlador/CONDUCTOR_ADO.php';
include_once '../controlador/TRANSPORTE_ADO.php';
include_once '../controlador/EXIMATERIAPRIMA_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/COMPRADOR_ADO.php';

include_once '../controlador/DESPACHOMP_ADO.php';
include_once '../controlador/EXIMATERIAPRIMA_ADO.php';



include_once '../modelo/DESPACHOMP.php';
include_once '../modelo/EXIMATERIAPRIMA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$VESPECIES_ADO =  new VESPECIES_ADO();
$PVESPECIES_ADO =  new PVESPECIES_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$ERECEPCION_ADO =  new ERECEPCION_ADO();

$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$COMPRADOR_ADO =  new COMPRADOR_ADO();


$DESPACHOMP_ADO =  new DESPACHOMP_ADO();
$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();

//INIICIALIZAR MODELO EXIEXPORTACION
$DESPACHOMP =  new DESPACHOMP();
$EXIMATERIAPRIMA =  new EXIMATERIAPRIMA();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NUMERO = "";
$NUMEROVER = "";
$IDDESPACHOMP = "";
$FECHAINGRESODESPACHO = "";
$FECHAMODIFCIACIONDESPACHO = "";
$FECHADESPACHO = "";

$NUMEROGUIADESPACHO = "";
$PATENTECARRO = "";
$PATENTEVEHICULO = "";
$OBSERVACIONDESPACHO = "";


$CONDUCTOR = "";
$TRANSPORTE = "";
$PLANTADESTINO = "";
$TDESPACHO = "";
$COMPRADOR = "";
$PRODUCTOR = "";
$ESTADO = "";

$TOTALBRUTO = "";
$TOTALNETO = "";
$TOTALENVASE = "";


$IDEMPRESA = "";
$IDPLANTA = "";
$IDTEMPORADA = "";


$IDOP = "";
$OP = "";


$DISABLED = "";
$DISABLED2 = "disabled";
$DISABLED3 = "";
$DISABLEDSTYLE = "";

$MENSAJE = "";
$MENSAJE2 = "";
$MENSAJE3 = "";
$MENSAJEVALIDATO = "";


//INICIALIZAR ARREGLOS

$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";


$ARRAYCONDUCTOR = "";
$ARRAYTRANSPORTITA = "";
$ARRAYPLANTADESTINO = "";
$ARRAYTDESPACHO = "";
$ARRAYPRODUCTOR = "";
$ARRAYCOMPRADOR = "";
$ARRAYPLANTADESTINO = "";


$ARRAYTOMADO = "";
$ARRAYDESPACHOTOMADO = "";
$ARRAYNUMERO = "";
$ARRAYFECHAACTUAL = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

$ARRAYCONDUCTOR = $CONDUCTOR_ADO->listarConductorCBX();
$ARRAYTRANSPORTITA = $TRANSPORTE_ADO->listarTransporteCBX();

$ARRAYPRODUCTOR = $PRODUCTOR_ADO->listarProductorCBX();
$ARRAYCOMPRADOR = $COMPRADOR_ADO->listarCompradorCBX();



$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
$ARRAYPLANTA = $PLANTA_ADO->listarPlantaCBX();
$ARRAYTEMPORADA = $TEMPORADA_ADO->listarTemporada3CBX();


$ARRAYFECHAACTUAL = $DESPACHOMP_ADO->obtenerFecha();
$FECHADESPACHO = $ARRAYFECHAACTUAL[0]['FECHA'];

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


        $ARRAYNUMERO = $DESPACHOMP_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
        $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;


        //UTILIZACION METODOS SET DEL MODELO
        //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
        $DESPACHOMP->__SET('NUMERO_DESPACHO', $NUMERO);
        $DESPACHOMP->__SET('FECHA_DESPACHO', $_REQUEST['FECHADESPACHO']);
        $DESPACHOMP->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
        $DESPACHOMP->__SET('CANTIDAD_ENVASE_DESPACHO', 0);
        $DESPACHOMP->__SET('KILOS_NETO_DESPACHO', 0);
        $DESPACHOMP->__SET('KILOS_BRUTO_DESPACHO', 0);
        $DESPACHOMP->__SET('PATENTE_CAMION', $_REQUEST['PATENTEVEHICULO']);
        $DESPACHOMP->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARRO']);
        $DESPACHOMP->__SET('OBSERVACION_DESPACHO', $_REQUEST['OBSERVACIONDESPACHO']);
        $DESPACHOMP->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTOR']);
        $DESPACHOMP->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTE']);
        $DESPACHOMP->__SET('TDESPACHO', $_REQUEST['TDESPACHO']);
        if ($_REQUEST['TDESPACHO'] == "1") {
            $DESPACHOMP->__SET('ID_PLANTA2', $_REQUEST['PLANTADESTINO']);
        }
        if ($_REQUEST['TDESPACHO'] == "2") {
            $DESPACHOMP->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
        }
        if ($_REQUEST['TDESPACHO'] == "3") {
            $DESPACHOMP->__SET('ID_COMPRADOR', $_REQUEST['COMPRADOR']);
        }
        $DESPACHOMP->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $DESPACHOMP->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $DESPACHOMP->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $DESPACHOMP_ADO->agregarDespachomp($DESPACHOMP);


        //OBTENER EL ID DE LA DESPACHOMP CREADA PARA LUEGO ENVIAR EL INGRESO DEL DETALLE
        $ARRAYDESPACHOMP2 = $DESPACHOMP_ADO->buscarDespachompID(
            $_REQUEST['FECHADESPACHO'],
            $_REQUEST['NUMEROGUIADESPACHO'],
            0,
            0,
            0,
            $_REQUEST['CONDUCTOR'],
            $_REQUEST['TRANSPORTE'],
            $_REQUEST['EMPRESA'],
            $_REQUEST['PLANTA'],
            $_REQUEST['TEMPORADA'],
        );

        //REDIRECCIONAR A PAGINA registroDespachomp.php 
        echo "<script type='text/javascript'> location.href ='registroDespachomp.php?parametro=" . $ARRAYDESPACHOMP2[0]['ID_DESPACHO'] . "&&parametro1=crear';</script>";
    }
}

if (isset($_REQUEST['GUARDAR'])) {

    $ARRAYDDESPACHOMP2 = $EXIMATERIAPRIMA_ADO->verExistenciaPorDespacho($_REQUEST['ID']);
    if (empty($ARRAYDDESPACHOMP2)) {
        $MENSAJE = "TIENE  QUE HABER AL MENOS UNA EXISTENCIA DE MATERIA PRIMA";
        $SINO = "1";
    } else {
        $MENSAJE = "";
        $SINO = "0";
    }
    if ($SINO == "0") {

        $DESPACHOMP->__SET('FECHA_DESPACHO', $_REQUEST['FECHADESPACHOE']);
        $DESPACHOMP->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHOE']);
        $DESPACHOMP->__SET('CANTIDAD_ENVASE_DESPACHO', $_REQUEST['TOTALENVASE']);
        $DESPACHOMP->__SET('KILOS_NETO_DESPACHO', $_REQUEST['TOTALNETO']);
        $DESPACHOMP->__SET('KILOS_BRUTO_DESPACHO', $_REQUEST['TOTALBRUTO']);
        $DESPACHOMP->__SET('PATENTE_CAMION', $_REQUEST['PATENTEVEHICULOE']);
        $DESPACHOMP->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
        $DESPACHOMP->__SET('OBSERVACION_DESPACHO', $_REQUEST['OBSERVACIONDESPACHOE']);
        $DESPACHOMP->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);
        $DESPACHOMP->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
        $DESPACHOMP->__SET('TDESPACHO', $_REQUEST['TDESPACHOE']);
        if ($_REQUEST['TDESPACHOE'] == "1") {
            $DESPACHOMP->__SET('ID_PLANTA2', $_REQUEST['PLANTADESTINOE']);
        }
        if ($_REQUEST['TDESPACHOE'] == "2") {
            $DESPACHOMP->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
        }

        if ($_REQUEST['TDESPACHOE'] == "3") {
            $DESPACHOMP->__SET('ID_COMPRADOR', $_REQUEST['COMPRADORE']);
        }
        $DESPACHOMP->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $DESPACHOMP->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $DESPACHOMP->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        $DESPACHOMP->__SET('ID_DESPACHO', $_REQUEST['ID']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $DESPACHOMP_ADO->actualizarDespachomp($DESPACHOMP);
    }
}
//OPERACION PARA CERRAR LA DESPACHOMP
if (isset($_REQUEST['CERRAR'])) {
    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $ARRAYDDESPACHOMP2 = $EXIMATERIAPRIMA_ADO->verExistenciaPorDespacho($_REQUEST['ID']);
    if (empty($ARRAYDDESPACHOMP2)) {
        $MENSAJE = "TIENE  QUE HABER AL MENOS UNA EXISTENCIA DE MATERIA PRIMA";
        $SINO = "1";
    } else {
        $MENSAJE = "";
        $SINO = "0";
    }
    if ($SINO == "0") {

        $DESPACHOMP->__SET('FECHA_DESPACHO', $_REQUEST['FECHADESPACHOE']);
        $DESPACHOMP->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHOE']);
        $DESPACHOMP->__SET('CANTIDAD_ENVASE_DESPACHO', $_REQUEST['TOTALENVASE']);
        $DESPACHOMP->__SET('KILOS_NETO_DESPACHO', $_REQUEST['TOTALNETO']);
        $DESPACHOMP->__SET('KILOS_BRUTO_DESPACHO', $_REQUEST['TOTALBRUTO']);
        $DESPACHOMP->__SET('PATENTE_CAMION', $_REQUEST['PATENTEVEHICULOE']);
        $DESPACHOMP->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
        $DESPACHOMP->__SET('OBSERVACION_DESPACHO', $_REQUEST['OBSERVACIONDESPACHOE']);
        $DESPACHOMP->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);
        $DESPACHOMP->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
        $DESPACHOMP->__SET('TDESPACHO', $_REQUEST['TDESPACHOE']);
        if ($_REQUEST['TDESPACHOE'] == "1") {
            $DESPACHOMP->__SET('ID_PLANTA2', $_REQUEST['PLANTADESTINOE']);
        }
        if ($_REQUEST['TDESPACHOE'] == "2") {
            $DESPACHOMP->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
        }

        if ($_REQUEST['TDESPACHOE'] == "3") {
            $DESPACHOMP->__SET('ID_COMPRADOR', $_REQUEST['COMPRADORE']);
        }
        $DESPACHOMP->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $DESPACHOMP->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $DESPACHOMP->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        $DESPACHOMP->__SET('ID_DESPACHO', $_REQUEST['ID']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $DESPACHOMP_ADO->actualizarDespachomp($DESPACHOMP);



        $DESPACHOMP->__SET('ID_DESPACHO', $_REQUEST['ID']);
        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
        $DESPACHOMP_ADO->cerrado($DESPACHOMP);


        $ARRAYEXISENCIADESPACHOMP = $EXIMATERIAPRIMA_ADO->verExistenciaPorDespacho($_REQUEST['ID']);

        foreach ($ARRAYEXISENCIADESPACHOMP as $r) :
            $EXIMATERIAPRIMA->__SET('ID_EXIMATERIAPRIMA', $r['ID_EXIMATERIAPRIMA']);
            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
            $EXIMATERIAPRIMA_ADO->despachado($EXIMATERIAPRIMA);
        endforeach;

        //REDIRECCIONAR A PAGINA registroDespachomp.php 
        //SEGUNE EL TIPO DE OPERACIONS QUE SE INDENTIFIQUE EN LA URL
        if ($_REQUEST['parametro1'] == "crear") {
            echo "<script type='text/javascript'> location.href ='registroDespachomp.php?parametro=" . $_REQUEST['ID'] . "&&parametro1=ver ';</script>";
        }
        if ($_REQUEST['parametro1'] == "editar") {
            echo "<script type='text/javascript'> location.href ='registroDespachomp.php?parametro=" . $_REQUEST['ID'] . "&&parametro1=ver ';</script>";
        }
    }
}


if (isset($_REQUEST['QUITAR'])) {

    $IDEXIMATERIAPRIMAQUITAR = $_REQUEST['IDEXIMATERIAPRIMAQUITAR'];
    $FOLIOEXIMATERIAPRIMAQUITAR = $_REQUEST['FOLIOEXIMATERIAPRIMAQUITAR'];

    $EXIMATERIAPRIMA->__SET('ID_EXIMATERIAPRIMA', $IDEXIMATERIAPRIMAQUITAR);
    $EXIMATERIAPRIMA->__SET('FOLIO_AUXILIAR_EXIMATERIAPRIMA', $FOLIOEXIMATERIAPRIMAQUITAR);
    // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $EXIMATERIAPRIMA_ADO->actualizarDeselecionarDespachoCambiarEstado($EXIMATERIAPRIMA);
}



//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($_REQUEST['parametro']) && isset($_REQUEST['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_REQUEST['parametro'];
    $OP = $_REQUEST['parametro1'];


    $ARRAYTOMADO = $EXIMATERIAPRIMA_ADO->buscarEndespacho($IDOP);
    $ARRAYDESPACHOTOMADO = $EXIMATERIAPRIMA_ADO->buscarPorDespacho($IDOP);
    $ARRAYDESPACHOTOTAL = $EXIMATERIAPRIMA_ADO->obtenerTotalesDespacho($IDOP);

    $TOTALENVASE = $ARRAYDESPACHOTOTAL[0]['TOTAL_ENVASE'];
    $TOTALNETO = $ARRAYDESPACHOTOTAL[0]['TOTAL_NETO'];
    $TOTALBRUTO = $ARRAYDESPACHOTOTAL[0]['TOTAL_BRUTO'];

    //FUNCION PARA LA OBTENCION DE LOS TOTALES DEL DETALLE ASOCIADO A DESPACHOMP

    //IDENTIFICACIONES DE OPERACIONES
    //crear =  OBTENCION DE DATOS INICIALES PARA PODER CREAR LA DESPACHOMP
    if ($OP == "crear") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $DISABLED = "disabled";
        $DISABLED2 = "";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        $ARRAYDESPACHOMP = $DESPACHOMP_ADO->verDespachomp($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYDESPACHOMP as $r) :
            $IDDESPACHOMP = $IDOP;
            $FECHADESPACHO = "" . $r['FECHA_DESPACHO'];
            $NUMEROVER = "" . $r['NUMERO_DESPACHO'];
            $NUMEROGUIADESPACHO = "" . $r['NUMERO_GUIA_DESPACHO'];
            $PATENTEVEHICULO = "" . $r['PATENTE_CAMION'];
            $PATENTECARRO = "" . $r['PATENTE_CARRO'];
            $OBSERVACIONDESPACHO = "" . $r['OBSERVACION_DESPACHO'];
            $CONDUCTOR = "" . $r['ID_CONDUCTOR'];
            $TRANSPORTE = "" . $r['ID_TRANSPORTE'];
            $TDESPACHO = "" . $r['TDESPACHO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $ARRAYPLANTADESTINO = $PLANTA_ADO->listarPlantaPropiaDistintaActualCBX($PLANTA);
            $PLANTADESTINO = "" . $r['ID_PLANTA2'];
            $ESTADO = "" . $r['ESTADO'];
            $FECHAINGRESODESPACHO = "" . $r['FECHA_INGRESO_DESPACHO'];
            $FECHAMODIFCIACIONDESPACHO = "" . $r['FECHA_MODIFICACION_DESPACHO'];
            if ($TDESPACHO == "1") {
                $PLANTADESTINO = "" . $r['ID_PLANTA2'];
            }
            if ($TDESPACHO == "2") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            }
            if ($TDESPACHO == "3") {
                $COMPRADOR = "" . $r['ID_COMPRADOR'];
            }



        endforeach;
    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $DISABLED = "disabled";
        $DISABLED2 = "";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $ARRAYDESPACHOMP = $DESPACHOMP_ADO->verDespachomp($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYDESPACHOMP as $r) :
            $IDDESPACHOMP = $IDOP;
            $FECHADESPACHO = "" . $r['FECHA_DESPACHO'];
            $NUMEROVER = "" . $r['NUMERO_DESPACHO'];
            $NUMEROGUIADESPACHO = "" . $r['NUMERO_GUIA_DESPACHO'];
            $PATENTEVEHICULO = "" . $r['PATENTE_CAMION'];
            $PATENTECARRO = "" . $r['PATENTE_CARRO'];
            $OBSERVACIONDESPACHO = "" . $r['OBSERVACION_DESPACHO'];
            $CONDUCTOR = "" . $r['ID_CONDUCTOR'];
            $TRANSPORTE = "" . $r['ID_TRANSPORTE'];
            $TDESPACHO = "" . $r['TDESPACHO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $ARRAYPLANTADESTINO = $PLANTA_ADO->listarPlantaPropiaDistintaActualCBX($PLANTA);
            $PLANTADESTINO = "" . $r['ID_PLANTA2'];
            $ESTADO = "" . $r['ESTADO'];
            $FECHAINGRESODESPACHO = "" . $r['FECHA_INGRESO_DESPACHO'];
            $FECHAMODIFCIACIONDESPACHO = "" . $r['FECHA_MODIFICACION_DESPACHO'];



            if ($TDESPACHO == "1") {
                $PLANTADESTINO = "" . $r['ID_PLANTA2'];
            }
            if ($TDESPACHO == "2") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            }
            if ($TDESPACHO == "3") {
                $COMPRADOR = "" . $r['ID_COMPRADOR'];
            }



        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYDESPACHOMP = $DESPACHOMP_ADO->verDespachomp($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYDESPACHOMP as $r) :
            $IDDESPACHOMP = $IDOP;
            $FECHADESPACHO = "" . $r['FECHA_DESPACHO'];
            $NUMEROVER = "" . $r['NUMERO_DESPACHO'];
            $NUMEROGUIADESPACHO = "" . $r['NUMERO_GUIA_DESPACHO'];
            $PATENTEVEHICULO = "" . $r['PATENTE_CAMION'];
            $PATENTECARRO = "" . $r['PATENTE_CARRO'];
            $OBSERVACIONDESPACHO = "" . $r['OBSERVACION_DESPACHO'];
            $CONDUCTOR = "" . $r['ID_CONDUCTOR'];
            $TRANSPORTE = "" . $r['ID_TRANSPORTE'];
            $TDESPACHO = "" . $r['TDESPACHO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $ARRAYPLANTADESTINO = $PLANTA_ADO->listarPlantaPropiaDistintaActualCBX($PLANTA);
            $PLANTADESTINO = "" . $r['ID_PLANTA2'];
            $ESTADO = "" . $r['ESTADO'];
            $FECHAINGRESODESPACHO = "" . $r['FECHA_INGRESO_DESPACHO'];
            $FECHAMODIFCIACIONDESPACHO = "" . $r['FECHA_MODIFICACION_DESPACHO'];



            if ($TDESPACHO == "1") {
                $PLANTADESTINO = "" . $r['ID_PLANTA2'];
            }
            if ($TDESPACHO == "2") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            }
            if ($TDESPACHO == "3") {
                $COMPRADOR = "" . $r['ID_COMPRADOR'];
            }



        endforeach;
    }
}


//PROCESO PARA OBTENER LOS DATOS DEL FORMULARIO  Y MANTENERLO AL ACTUALIZACION QUE REALIZA EL SELECT DE CONDUCTOR

if (isset($_POST)) {

    if (isset($_REQUEST['FECHAINGRESODESPACHO'])) {

        $FECHAINGRESODESPACHO = "" . $_REQUEST['FECHAINGRESODESPACHO'];
    }
    if (isset($_REQUEST['FECHAMODIFCIACIONDESPACHO'])) {

        $FECHAMODIFCIACIONDESPACHO = "" . $_REQUEST['FECHAMODIFCIACIONDESPACHO'];
    }

    if (isset($_REQUEST['NUMEROGUIADESPACHO'])) {

        $NUMEROGUIADESPACHO = "" . $_REQUEST['NUMEROGUIADESPACHO'];
    }
    if (isset($_REQUEST['PATENTECARRO'])) {

        $PATENTECARRO = "" . $_REQUEST['PATENTECARRO'];
    }
    if (isset($_REQUEST['PATENTEVEHICULO'])) {

        $PATENTEVEHICULO = "" . $_REQUEST['PATENTEVEHICULO'];
    }
    if (isset($_REQUEST['OBSERVACIONDESPACHOMP'])) {

        $OBSERVACIONDESPACHOMP = "" . $_REQUEST['OBSERVACIONDESPACHOMP'];
    }

    if (isset($_REQUEST['CONDUCTOR'])) {

        $CONDUCTOR = "" . $_REQUEST['CONDUCTOR'];
    }
    if (isset($_REQUEST['TRANSPORTE'])) {

        $TRANSPORTE = "" . $_REQUEST['TRANSPORTE'];
    }

    if (isset($_REQUEST['TDESPACHO'])) {

        $TDESPACHO = "" . $_REQUEST['TDESPACHO'];
        $ARRAYPLANTADESTINO = $PLANTA_ADO->listarPlantaPropiaDistintaActualCBX($_REQUEST['PLANTA']);


        if ($TDESPACHO == "1") {

            if (isset($_REQUEST['PLANTADESTINO'])) {
                $PLANTADESTINO = "" . $_REQUEST['PLANTADESTINO'];
            }
        }
        if ($TDESPACHO == "2") {

            if (isset($_REQUEST['PRODUCTOR'])) {
                $PRODUCTOR = "" . $_REQUEST['PRODUCTOR'];
            }
        }
        if ($TDESPACHO == "3") {
            if (isset($_REQUEST['COMPRADOR'])) {
                $COMPRADOR = "" . $_REQUEST['COMPRADOR'];
            }
        }
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
    <title>Registro Despacho MP</title>
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

                    FECHADESPACHO = document.getElementById("FECHADESPACHO").value;
                    NUMEROGUIADESPACHO = document.getElementById("NUMEROGUIADESPACHO").value;
                    TDESPACHO = document.getElementById("TDESPACHO").selectedIndex;
                    TRANSPORTE = document.getElementById("TRANSPORTE").selectedIndex;
                    CONDUCTOR = document.getElementById("CONDUCTOR").selectedIndex;

                    PATENTEVEHICULO = document.getElementById("PATENTEVEHICULO").value;
                    PATENTECARRO = document.getElementById("PATENTECARRO").value;
                    //OBSERVACIONDESPACHOMP = document.getElementById("OBSERVACIONDESPACHOMP").value;

                    document.getElementById('val_fecha').innerHTML = "";
                    document.getElementById('val_numeroguia').innerHTML = "";
                    document.getElementById('val_tdespacho').innerHTML = "";
                    document.getElementById('val_transportita').innerHTML = "";
                    document.getElementById('val_conductor').innerHTML = "";
                    document.getElementById('val_patentevehiculo').innerHTML = "";
                    document.getElementById('val_patentecarro').innerHTML = "";
                    //  document.getElementById('val_observacion').innerHTML = "";

                    if (FECHADESPACHO == null || FECHADESPACHO.length == 0 || /^\s+$/.test(FECHADESPACHO)) {
                        document.form_reg_dato.FECHADESPACHO.focus();
                        document.form_reg_dato.FECHADESPACHO.style.borderColor = "#FF0000";
                        document.getElementById('val_fecha').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.FECHADESPACHO.style.borderColor = "#4AF575";

                    if (NUMEROGUIADESPACHO == null || NUMEROGUIADESPACHO.length == 0 || /^\s+$/.test(NUMEROGUIADESPACHO)) {
                        document.form_reg_dato.NUMEROGUIADESPACHO.focus();
                        document.form_reg_dato.NUMEROGUIADESPACHO.style.borderColor = "#FF0000";
                        document.getElementById('val_numeroguia').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.NUMEROGUIADESPACHO.style.borderColor = "#4AF575";


                    if (TDESPACHO == null || TDESPACHO == 0) {
                        document.form_reg_dato.TDESPACHO.focus();
                        document.form_reg_dato.TDESPACHO.style.borderColor = "#FF0000";
                        document.getElementById('val_tdespacho').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.TDESPACHO.style.borderColor = "#4AF575";


                    if (TRANSPORTE == null || TRANSPORTE == 0) {
                        document.form_reg_dato.TRANSPORTE.focus();
                        document.form_reg_dato.TRANSPORTE.style.borderColor = "#FF0000";
                        document.getElementById('val_transportita').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.TRANSPORTE.style.borderColor = "#4AF575";


                    if (CONDUCTOR == null || CONDUCTOR == 0) {
                        document.form_reg_dato.CONDUCTOR.focus();
                        document.form_reg_dato.CONDUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_conductor').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.CONDUCTOR.style.borderColor = "#4AF575";

                    if (PATENTEVEHICULO == null || PATENTEVEHICULO.length == 0 || /^\s+$/.test(PATENTEVEHICULO)) {
                        document.form_reg_dato.PATENTEVEHICULO.focus();
                        document.form_reg_dato.PATENTEVEHICULO.style.borderColor = "#FF0000";
                        document.getElementById('val_patentevehiculo').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.FECHADESPACHO.style.borderColor = "#4AF575";

                    if (PATENTECARRO == null || PATENTECARRO.length == 0 || /^\s+$/.test(PATENTECARRO)) {
                        document.form_reg_dato.PATENTECARRO.focus();
                        document.form_reg_dato.PATENTECARRO.style.borderColor = "#FF0000";
                        document.getElementById('val_patentecarro').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.PATENTECARRO.style.borderColor = "#4AF575";



                    if (TDESPACHO == 1) {

                        PLANTADESTINO = document.getElementById("PLANTADESTINO").selectedIndex;
                        document.getElementById('val_plantad').innerHTML = "";

                        if (PLANTADESTINO == null || PLANTADESTINO == 0) {
                            document.form_reg_dato.PLANTADESTINO.focus();
                            document.form_reg_dato.PLANTADESTINO.style.borderColor = "#FF0000";
                            document.getElementById('val_plantad').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false
                        }
                        document.form_reg_dato.PLANTADESTINO.style.borderColor = "#4AF575";

                    }


                    if (TDESPACHO == 2) {

                        PRODUCTOR = document.getElementById("PRODUCTOR").selectedIndex;
                        document.getElementById('val_productor').innerHTML = "";

                        if (PRODUCTOR == null || PRODUCTOR == 0) {
                            document.form_reg_dato.PRODUCTOR.focus();
                            document.form_reg_dato.PRODUCTOR.style.borderColor = "#FF0000";
                            document.getElementById('val_productor').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false
                        }
                        document.form_reg_dato.PRODUCTOR.style.borderColor = "#4AF575";

                    }

                    if (TDESPACHO == 3) {

                        COMPRADOR = document.getElementById("COMPRADOR").selectedIndex;
                        document.getElementById('val_comprador').innerHTML = "";

                        if (COMPRADOR == null || COMPRADOR == 0) {
                            document.form_reg_dato.COMPRADOR.focus();
                            document.form_reg_dato.COMPRADOR.style.borderColor = "#FF0000";
                            document.getElementById('val_comprador').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false
                        }
                        document.form_reg_dato.COMPRADOR.style.borderColor = "#4AF575";

                    }





                    /*
                    if (OBSERVACIONDESPACHOMP == null || OBSERVACIONDESPACHOMP.length == 0 || /^\s+$/.test(OBSERVACIONDESPACHOMP)) {
                        document.form_reg_dato.OBSERVACIONDESPACHOMP.focus();
                        document.form_reg_dato.OBSERVACIONDESPACHOMP.style.borderColor = "#FF0000";
                        document.getElementById('val_observacion').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.OBSERVACIONDESPACHOMP.style.borderColor = "#4AF575"; 
                    */
                }

                //FUNCION PARA REALIZAR UNA ACTUALIZACION DEL FORMULARIO DE REGISTRO DE DESPACHOMP
                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }

                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE DESPACHOMP
                function abrirVentana(url) {
                    var opciones =
                        "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1600, height=1000'";
                    window.open(url, 'window', opciones);
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
                                <h3 class="page-title">Despacho </h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Granel</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroDespachomp.php"> Operaciones Despacho </a>
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
                                                <input type="hidden" class="form-control" placeholder="ID DESPACHOMP" id="ID" name="ID" value="<?php echo $IDDESPACHOMP; ?>" />
                                                <input type="text" class="form-control" style="background-color: #eeeeee;" placeholder="Numero Despachomp" id="IDDESPACHOMP" name="IDDESPACHOMP" value="<?php echo $NUMEROVER; ?>" disabled />
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
                                                <input type="hidden" class="form-control" placeholder="FECHA DESPACHOMP" id="FECHAINGRESODESPACHOE" name="FECHAINGRESODESPACHOE" value="<?php echo $FECHAINGRESODESPACHO; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="FECHA DESPACHOMP" id="FECHAINGRESODESPACHO" name="FECHAINGRESODESPACHO" value="<?php echo $FECHAINGRESODESPACHO; ?>" disabled />
                                                <label id="val_fechai" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Fecha Modificacion</label>
                                                <input type="hidden" class="form-control" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACIONDESPACHOE" name="FECHAMODIFCIACIONDESPACHOE" value="<?php echo $FECHAMODIFCIACIONDESPACHO; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACIONDESPACHO" name="FECHAMODIFCIACIONDESPACHO" value="<?php echo $FECHAMODIFCIACIONDESPACHO; ?>" disabled />
                                                <label id="val_fecham" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label id="val_validato" class="validacion"> <?php echo $MENSAJEVALIDATO; ?> </label>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Fecha Despacho </label>
                                                <input type="hidden" class="Despachoform-control" placeholder="Fecha Despachomp" id="FECHADESPACHOE" name="FECHADESPACHOE" value="<?php echo $FECHADESPACHO; ?>" />
                                                <input type="date" class="form-control" <?php echo $DISABLEDSTYLE; ?> placeholder="Fecha Despachomp" id="FECHADESPACHO" name="FECHADESPACHO" value="<?php echo $FECHADESPACHO; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_fecha" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Numero Guia </label>
                                                <input type="hidden" class="form-control" placeholder="Numero Guia" id="NUMEROGUIADESPACHOE" name="NUMEROGUIADESPACHOE" value="<?php echo $NUMEROGUIADESPACHO; ?>" />
                                                <input type="text" class="form-control" <?php echo $DISABLEDSTYLE; ?> placeholder="Numero Guia" id="NUMEROGUIADESPACHO" name="NUMEROGUIADESPACHO" value="<?php echo $NUMEROGUIADESPACHO; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_numeroguia" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Tipo Despacho </label>
                                                <input type="hidden" class="form-control" placeholder="TDESPACHOE" id="TDESPACHOE" name="TDESPACHOE" value="<?php echo $TDESPACHO; ?>" />
                                                <select class="form-control select2" id="TDESPACHO" name="TDESPACHO" style="width: 100%;" onchange="this.form.submit()" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <option value="1" <?php if ($TDESPACHO == "1") {
                                                                            echo "selected";
                                                                        } ?>> Interplanta</option>
                                                    <option value="2" <?php if ($TDESPACHO == "2") {
                                                                            echo "selected";
                                                                        } ?>> Devolución Productor </option>
                                                    <option value="3" <?php if ($TDESPACHO == "3") {
                                                                            echo "selected";
                                                                        } ?>> Venta</option>

                                                </select>
                                                <label id="val_tdespacho" class="validacion"> </label>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Transporte</label>
                                                <input type="hidden" class="form-control" placeholder="Transportita" id="TRANSPORTEE" name="TRANSPORTEE" value="<?php echo $TRANSPORTE; ?>" />
                                                <select class="form-control select2" id="TRANSPORTE" name="TRANSPORTE" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYTRANSPORTITA as $r) : ?>
                                                        <?php if ($ARRAYTRANSPORTITA) {    ?>
                                                            <option value="<?php echo $r['ID_TRANSPORTE']; ?>" <?php if ($TRANSPORTE == $r['ID_TRANSPORTE']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_TRANSPORTE'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_transportita" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-1 col-12">
                                            <div class="form-group">
                                                <label>Agregar </label>
                                                <br>
                                                <button type="button" class=" btn btn-rounded btn-success btn-outline" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopTransporte.php' ); ">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Conductor</label>
                                                <input type="hidden" class="form-control" placeholder="Conductor" id="CONDUCTORE" name="CONDUCTORE" value="<?php echo $CONDUCTOR; ?>" />
                                                <select class="form-control select2" id="CONDUCTOR" name="CONDUCTOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYCONDUCTOR as $r) : ?>
                                                        <?php if ($ARRAYCONDUCTOR) {    ?>
                                                            <option value="<?php echo $r['ID_CONDUCTOR']; ?>" <?php if ($CONDUCTOR == $r['ID_CONDUCTOR']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_CONDUCTOR'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_conductor" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-1 col-12">
                                            <div class="form-group">
                                                <label>Agregar </label>
                                                <br>
                                                <button type="button" class=" btn btn-rounded btn-success btn-outline" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopConductor.php' ); ">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">


                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Patente Vehiculo</label>
                                                <input type="hidden" class="form-control" placeholder="Patente Vehiculo" id="PATENTEVEHICULOE" name="PATENTEVEHICULOE" value="<?php echo $PATENTEVEHICULO; ?>" />
                                                <input type="text" class="form-control" <?php echo $DISABLEDSTYLE; ?> placeholder="Patente Vehiculo" id="PATENTEVEHICULO" name="PATENTEVEHICULO" value="<?php echo $PATENTEVEHICULO; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_patentevehiculo" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Patente Carro</label>
                                                <input type="hidden" class="form-control" placeholder="Patente Carro" id="PATENTECARROE" name="PATENTECARROE" value="<?php echo $PATENTECARRO; ?>" />
                                                <input type="text" class="form-control" <?php echo $DISABLEDSTYLE; ?> placeholder="Patente Carro" id="PATENTECARRO" name="PATENTECARRO" value="<?php echo $PATENTECARRO; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_patentecarro" class="validacion"> </label>
                                            </div>
                                        </div>

                                        <?php if ($TDESPACHO == "1") { ?>

                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>Planta Destino</label>
                                                    <input type="hidden" class="form-control" placeholder="PLANTADESTINOE" id="PLANTADESTINOE" name="PLANTADESTINOE" value="<?php echo $PLANTADESTINO; ?>" />
                                                    <select class="form-control select2" id="PLANTADESTINO" name="PLANTADESTINO" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPLANTADESTINO as $r) : ?>
                                                            <?php if ($ARRAYPLANTADESTINO) {    ?>
                                                                <option value="<?php echo $r['ID_PLANTA']; ?>" <?php if ($PLANTADESTINO == $r['ID_PLANTA']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_PLANTA'] ?> </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_plantad" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-1 col-12">
                                                <div class="form-group">
                                                    <label>Agregar </label>
                                                    <br>
                                                    <button type="button" class=" btn btn-rounded btn-success btn-outline" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopPlanta3.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php if ($TDESPACHO == "2") { ?>

                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>Productor</label>
                                                    <input type="hidden" class="form-control" placeholder="PRODUCTORE" id="PRODUCTORE" name="PRODUCTORE" value="<?php echo $PRODUCTOR; ?>" />
                                                    <select class="form-control select2" id="PRODUCTOR" name="PRODUCTOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPRODUCTOR as $r) : ?>
                                                            <?php if ($ARRAYPRODUCTOR) {    ?>
                                                                <option value="<?php echo $r['ID_PRODUCTOR']; ?>" <?php if ($PRODUCTOR == $r['ID_PRODUCTOR']) {
                                                                                                                        echo "selected";
                                                                                                                    } ?>> <?php echo $r['NOMBRE_PRODUCTOR'] ?> </option>
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
                                                    <button type="button" class=" btn btn-rounded btn-success btn-outline" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopProductor.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php } ?>


                                        <?php if ($TDESPACHO == "3") { ?>

                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>Comprador</label>
                                                    <input type="hidden" class="form-control" placeholder="COMPRADORE" id="COMPRADORE" name="COMPRADORE" value="<?php echo $COMPRADOR; ?>" />
                                                    <select class="form-control select2" id="COMPRADOR" name="COMPRADOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYCOMPRADOR as $r) : ?>
                                                            <?php if ($ARRAYCOMPRADOR) {    ?>
                                                                <option value="<?php echo $r['ID_COMPRADOR']; ?>" <?php if ($COMPRADOR == $r['ID_COMPRADOR']) {
                                                                                                                        echo "selected";
                                                                                                                    } ?>> <?php echo $r['NOMBRE_COMPRADOR'] ?> </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_comprador" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-1 col-12">
                                                <div class="form-group">
                                                    <label>Agregar </label>
                                                    <br>
                                                    <button type="button" class=" btn btn-rounded btn-success btn-outline" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopComprador.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php } ?>



                                    </div>


                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Observaciones </label>
                                                <input type="hidden" class="form-control" placeholder="TRANSPORTE" id="OBSERVACIONDESPACHOE" name="OBSERVACIONDESPACHOE" value="<?php echo $OBSERVACIONDESPACHO; ?>" />
                                                <textarea class="form-control" rows="1" <?php echo $DISABLEDSTYLE; ?> placeholder="Ingrese Nota, Observaciones u Otro" id="OBSERVACIONDESPACHO" name="OBSERVACIONDESPACHO" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>><?php echo $OBSERVACIONDESPACHO; ?></textarea>
                                                <label id="val_observacion" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.row -->
                                <!-- /.box-body -->


                                <div class="row">
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label>Selecion / Existencia Producto Terminado </label>
                                            <div class="table-responsive">
                                                <table id="detalle" class="table table-hover " style="width: 100%;">
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
                                                        <form method="post" id="form2">
                                                            <?php if ($ARRAYTOMADO) { ?>
                                                                <?php foreach ($ARRAYTOMADO as $r) : ?>
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

                                                                                <input type="hidden" class="form-control" id="IDEXIMATERIAPRIMAQUITAR" name="IDEXIMATERIAPRIMAQUITAR" value="<?php echo $r['ID_EXIMATERIAPRIMA']; ?>" />
                                                                                <input type="hidden" class="form-control" id="FOLIOEXIMATERIAPRIMAQUITAR" name="FOLIOEXIMATERIAPRIMAQUITAR" value="<?php echo $r['FOLIO_AUXILIAR_EXIMATERIAPRIMA']; ?>" />

                                                                                <button type="submit" class="btn btn-rounded btn-sm  btn-danger btn-outline mr-1" id="defecto" name="QUITAR" title="Quitar">
                                                                                    <i class="ti-close  "></i> Quitar
                                                                                </button>



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

                                                            <?php if ($ARRAYDESPACHOTOMADO) { ?>
                                                                <?php foreach ($ARRAYDESPACHOTOMADO as $r) : ?>
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



                                                        </form>
                                                    </tbody>
                                                </table>

                                                <label id="val_dproceso" class="validacion center"><?php echo $MENSAJE; ?> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <table>
                                            <tbody>

                                                <tr>
                                                    <td class=" center">
                                                        Selecionar
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class=" center">
                                                        <div class="form-group">
                                                            <button type="button" class=" btn btn-rounded btn-success btn-outline" <?php echo $DISABLED2; ?> id="defecto" name="agregar" Onclick="abrirVentana('registroSelecionExistenciaDespachoMP.php?EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?> && DESPACHOMP=<?php echo $IDOP ?>' ); ">
                                                                <i class="glyphicon glyphicon-plus"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Total Envase</th>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" id="TOTALENVASE" name="TOTALENVASE" value="<?php echo $TOTALENVASE; ?>" />
                                                            <input type="text" class="form-control" placeholder="Total Envase" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALENVASE; ?>" disabled />
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th>Total Neto</th>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" id="TOTALNETO" name="TOTALNETO" value="<?php echo $TOTALNETO; ?>" />
                                                            <input type="text" class="form-control" placeholder="Total Neto" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALNETO; ?>" disabled />
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>Total Bruto</th>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" id="TOTALBRUTO" name="TOTALBRUTO" value="<?php echo $TOTALBRUTO; ?>" />
                                                            <input type="text" class="form-control" placeholder="Total Neto" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALBRUTO; ?>" disabled />
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                <div class="box-footer">
                                    <table class="table ">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php if ($OP == "crear") { ?>
                                                        <button type=" button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR">
                                                            <i class="ti-trash"></i> CANCELAR
                                                        </button>
                                                    <?php } ?>
                                                    <?php if ($OP == "editar") { ?>
                                                        <button type="button" class="btn btn-rounded  btn-success btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('listarDespachomp.php'); ">
                                                            <i class="ti-back-left "></i> VOLVER
                                                        </button>
                                                    <?php } ?>

                                                    <?php if ($OP == "ver") { ?>
                                                        <button type="button" class="btn btn-rounded  btn-success btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('listarDespachomp.php'); ">
                                                            <i class="ti-back-left "></i> VOLVER
                                                        </button>
                                                    <?php } ?>
                                                    <?php if ($OP == "") { ?>
                                                        <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroDespachomp.php');">
                                                            <i class="ti-trash"></i> CANCELAR
                                                        </button>
                                                    <?php } ?>

                                                    <?php if ($OP == "crear") { ?>
                                                        <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="GUARDAR" value="GUARDAR">
                                                            <i class="ti-save-alt"></i> GUARDAR
                                                        </button>
                                                    <?php }   ?>
                                                    <?php if ($OP == "editar") { ?>
                                                        <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="GUARDAR" value="GUARDAR">
                                                            <i class="ti-save-alt"></i> GUARDAR
                                                        </button>
                                                    <?php }   ?>
                                                    <?php if ($OP == "crear") { ?>
                                                        <button type="submit" class="btn btn-rounded btn-danger btn-outline" name="CERRAR" value="CERRAR">
                                                            <i class="ti-save-alt"></i> CERRAR
                                                        </button>
                                                    <?php }   ?>
                                                    <?php if ($OP == "editar") { ?>
                                                        <button type="submit" class="btn btn-rounded btn-danger btn-outline" name="CERRAR" value="CERRAR">
                                                            <i class="ti-save-alt"></i> CERRAR
                                                        </button>
                                                    <?php }   ?>

                                                    <?php if ($OP == "") { ?>
                                                        <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="CREAR" value="CREAR" <?php echo $DISABLED; ?>>
                                                            <i class="ti-save-alt"></i> CREAR
                                                        </button>
                                                    <?php } ?>
                                                </td>
                                                <td>


                                                    <?php if ($OP != "") {  ?>
                                                        <?php if ($ESTADO == "0") {  ?>
                                                            <button type="button" class="btn btn-rounded  btn-info btn-outline mr-1" id="defecto" name="tarjas" Onclick="abrirVentana('../documento/informeDespachoMP.php?parametro=<?php echo $IDOP; ?>&&NOMBREUSUARIO=<?php echo $NOMBREUSUARIOS; ?>'); ">
                                                                <i class="fa fa-file-pdf-o"></i>Informe
                                                            </button>
                                                        <?php } ?>

                                                    <?php } ?>

                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
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