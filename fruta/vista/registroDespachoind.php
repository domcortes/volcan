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
include_once '../controlador/EINDUSTRIAL_ADO.php';

include_once '../controlador/CONDUCTOR_ADO.php';
include_once '../controlador/TRANSPORTE_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/COMPRADOR_ADO.php';

include_once '../controlador/DESPACHOIND_ADO.php';
include_once '../controlador/EXIMATERIAPRIMA_ADO.php';
include_once '../controlador/EXIINDUSTRIAL_ADO.php';



include_once '../modelo/DESPACHOIND.php';
include_once '../modelo/EXIMATERIAPRIMA.php';
include_once '../modelo/EXIINDUSTRIAL.php';

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
$EINDUSTRIAL_ADO =  new EINDUSTRIAL_ADO();

$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$COMPRADOR_ADO =  new COMPRADOR_ADO();


$DESPACHOIND_ADO =  new DESPACHOIND_ADO();
$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();
$EXIINDUSTRIAL_ADO =  new EXIINDUSTRIAL_ADO();

//INIICIALIZAR MODELO EXIMATERIAPRIMA
$DESPACHOIND =  new DESPACHOIND();
$EXIMATERIAPRIMA =  new EXIMATERIAPRIMA();
$EXIINDUSTRIAL =  new EXIINDUSTRIAL();

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
$NUMEROSELLODESPACHO = "";
$REGALO = "";
$CONDUCTOR = "";
$TRANSPORTE = "";
$PLANTADESTINO = "";
$TDESPACHO = "";
$COMPRADOR = "";
$PRODUCTOR = "";
$ESTADO = "";

$TOTALNETO = 0;
$TOTALNETOV = 0;


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

$ARRAYDDESPACHOMP1 = "";
$ARRAYDDESPACHOMP2 = "";

$ARRAYEXISENCIADESPACHOMP = "";


$ARRAYTOMADO1 = "";
$ARRAYDESPACHOTOTAL1 = "";

$ARRAYTOMADO2 = "";
$ARRAYDESPACHOTOTAL2 = "";

$ARRAYNUMERO = "";
$ARRAYFECHAACTUAL = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

$ARRAYCONDUCTOR = $CONDUCTOR_ADO->listarConductorCBX();
$ARRAYTRANSPORTITA = $TRANSPORTE_ADO->listarTransporteCBX();

$ARRAYPRODUCTOR = $PRODUCTOR_ADO->listarProductorCBX();
$ARRAYCOMPRADOR = $COMPRADOR_ADO->listarCompradorCBX();



$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
$ARRAYPLANTA = $PLANTA_ADO->listarPlantaExternaCBX();
$ARRAYTEMPORADA = $TEMPORADA_ADO->listarTemporada3CBX();


$ARRAYFECHAACTUAL = $DESPACHOIND_ADO->obtenerFecha();
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


        $ARRAYNUMERO = $DESPACHOIND_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
        $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;


        //UTILIZACION METODOS SET DEL MODELO
        //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
        $DESPACHOIND->__SET('NUMERO_DESPACHO', $NUMERO);
        $DESPACHOIND->__SET('FECHA_DESPACHO', $_REQUEST['FECHADESPACHO']);
        $DESPACHOIND->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
        $DESPACHOIND->__SET('CANTIDAD_ENVASE_DESPACHO', 0);
        $DESPACHOIND->__SET('KILOS_NETO_DESPACHO', 0);
        $DESPACHOIND->__SET('KILOS_BRUTO_DESPACHO', 0);
        $DESPACHOIND->__SET('PATENTE_CAMION', $_REQUEST['PATENTEVEHICULO']);
        $DESPACHOIND->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARRO']);
        $DESPACHOIND->__SET('OBSERVACION_DESPACHO', $_REQUEST['OBSERVACIONDESPACHO']);
        $DESPACHOIND->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTOR']);
        $DESPACHOIND->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTE']);
        $DESPACHOIND->__SET('TDESPACHO', $_REQUEST['TDESPACHO']);
        if ($_REQUEST['TDESPACHO'] == "1") {
            $DESPACHOIND->__SET('ID_PLANTA2', $_REQUEST['PLANTADESTINO']);
        }
        if ($_REQUEST['TDESPACHO'] == "2") {
            $DESPACHOIND->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
        }
        if ($_REQUEST['TDESPACHO'] == "3") {
            $DESPACHOIND->__SET('ID_COMPRADOR', $_REQUEST['COMPRADOR']);
        }
        if ($_REQUEST['TDESPACHOE'] == "4") {
            $DESPACHOIND->__SET('REGALO_DESPACHO', $_REQUEST['REGALO']);
        }
        $DESPACHOIND->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $DESPACHOIND->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $DESPACHOIND->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $DESPACHOIND_ADO->agregarDespachoind($DESPACHOIND);


        //OBTENER EL ID DE LA DESPACHOIND CREADA PARA LUEGO ENVIAR EL INGRESO DEL DETALLE
        $ARRAYDESPACHOMP2 = $DESPACHOIND_ADO->buscarDespachoindID(
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
        echo "<script type='text/javascript'> location.href ='registroDespachoind.php?parametro=" . $ARRAYDESPACHOMP2[0]['ID_DESPACHO'] . "&&parametro1=crear';</script>";
    }
}


if (isset($_REQUEST['GUARDAR'])) {
    $ARRAYDDESPACHOMP = $EXIINDUSTRIAL_ADO->verExistenciaPorDespacho($_REQUEST['ID']);
    if (empty($ARRAYDDESPACHOMP)) {
        $MENSAJE = "TIENE  QUE HABER AL MENOS UNA EXISTENCIA";
        $SINO = "1";
    } else {
        $MENSAJE = "";
        $SINO = "0";
    }

    if ($SINO == "0") {

        $DESPACHOIND->__SET('FECHA_DESPACHO', $_REQUEST['FECHADESPACHOE']);
        $DESPACHOIND->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHOE']);
        $DESPACHOIND->__SET('CANTIDAD_ENVASE_DESPACHO', 0);
        $DESPACHOIND->__SET('KILOS_NETO_DESPACHO', $_REQUEST['TOTALNETO']);
        $DESPACHOIND->__SET('KILOS_BRUTO_DESPACHO', 0);
        $DESPACHOIND->__SET('PATENTE_CAMION', $_REQUEST['PATENTEVEHICULOE']);
        $DESPACHOIND->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
        $DESPACHOIND->__SET('OBSERVACION_DESPACHO', $_REQUEST['OBSERVACIONDESPACHOE']);
        $DESPACHOIND->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);
        $DESPACHOIND->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
        $DESPACHOIND->__SET('TDESPACHO', $_REQUEST['TDESPACHOE']);
        if ($_REQUEST['TDESPACHOE'] == "1") {
            $DESPACHOIND->__SET('ID_PLANTA2', $_REQUEST['PLANTADESTINOE']);
        }
        if ($_REQUEST['TDESPACHOE'] == "2") {
            $DESPACHOIND->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
        }
        if ($_REQUEST['TDESPACHOE'] == "3") {
            $DESPACHOIND->__SET('ID_COMPRADOR', $_REQUEST['COMPRADORE']);
        }
        if ($_REQUEST['TDESPACHOE'] == "4") {
            $DESPACHOIND->__SET('REGALO_DESPACHO', $_REQUEST['REGALOE']);
        }
        $DESPACHOIND->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $DESPACHOIND->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $DESPACHOIND->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        $DESPACHOIND->__SET('ID_DESPACHO', $_REQUEST['ID']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        // $DESPACHOIND_ADO->actualizarDespachoind($DESPACHOIND);
    }
}

//OPERACION PARA CERRAR LA DESPACHOIND
if (isset($_REQUEST['CERRAR'])) {
    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $ARRAYDDESPACHOMP = $EXIINDUSTRIAL_ADO->verExistenciaPorDespacho($_REQUEST['ID']);
    if (empty($ARRAYDDESPACHOMP)) {
        $MENSAJE = "TIENE  QUE HABER AL MENOS UNA EXISTENCIA";
        $SINO = "1";
    } else {
        $MENSAJE = "";
        $SINO = "0";
    }
    if ($SINO == "0") {

        $DESPACHOIND->__SET('FECHA_DESPACHO', $_REQUEST['FECHADESPACHOE']);
        $DESPACHOIND->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHOE']);
        $DESPACHOIND->__SET('CANTIDAD_ENVASE_DESPACHO', 0);
        $DESPACHOIND->__SET('KILOS_NETO_DESPACHO', $_REQUEST['TOTALNETO']);
        $DESPACHOIND->__SET('KILOS_BRUTO_DESPACHO', 0);
        $DESPACHOIND->__SET('PATENTE_CAMION', $_REQUEST['PATENTEVEHICULOE']);
        $DESPACHOIND->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
        $DESPACHOIND->__SET('OBSERVACION_DESPACHO', $_REQUEST['OBSERVACIONDESPACHOE']);
        $DESPACHOIND->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);
        $DESPACHOIND->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
        $DESPACHOIND->__SET('TDESPACHO', $_REQUEST['TDESPACHOE']);
        if ($_REQUEST['TDESPACHOE'] == "1") {
            $DESPACHOIND->__SET('ID_PLANTA2', $_REQUEST['PLANTADESTINOE']);
        }
        if ($_REQUEST['TDESPACHOE'] == "2") {
            $DESPACHOIND->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
        }
        if ($_REQUEST['TDESPACHOE'] == "3") {
            $DESPACHOIND->__SET('ID_COMPRADOR', $_REQUEST['COMPRADORE']);
        }
        if ($_REQUEST['TDESPACHOE'] == "4") {
            $DESPACHOIND->__SET('REGALO_DESPACHO', $_REQUEST['REGALOE']);
        }
        $DESPACHOIND->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $DESPACHOIND->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $DESPACHOIND->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        $DESPACHOIND->__SET('ID_DESPACHO', $_REQUEST['ID']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $DESPACHOIND_ADO->actualizarDespachoind($DESPACHOIND);



        $DESPACHOIND->__SET('ID_DESPACHO', $_REQUEST['ID']);
        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
        $DESPACHOIND_ADO->cerrado($DESPACHOIND);


        $ARRAYEXISENCIADESPACHOMP2 = $EXIINDUSTRIAL_ADO->verExistenciaPorDespacho($_REQUEST['ID']);

        foreach ($ARRAYEXISENCIADESPACHOMP2 as $r) :
            $EXIINDUSTRIAL->__SET('ID_EXIINDUSTRIAL', $r['ID_EXIINDUSTRIAL']);
            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
            $EXIINDUSTRIAL_ADO->despachado($EXIINDUSTRIAL);
        endforeach;

        //REDIRECCIONAR A PAGINA registroDespachomp.php 
        //SEGUNE EL TIPO DE OPERACIONS QUE SE INDENTIFIQUE EN LA URL
        if ($_REQUEST['parametro1'] == "crear") {
            echo "<script type='text/javascript'> location.href ='registroDespachoind.php?parametro=" . $_REQUEST['ID'] . "&&parametro1=ver ';</script>";
        }
        if ($_REQUEST['parametro1'] == "editar") {
            echo "<script type='text/javascript'> location.href ='registroDespachoind.php?parametro=" . $_REQUEST['ID'] . "&&parametro1=ver ';</script>";
        }
    }
}




if (isset($_REQUEST['QUITAR'])) {

    $IDEXIINDUSTRIALQUITAR = $_REQUEST['IDEXIINDUSTRIALQUITAR'];
    $FOLIOEXIINDUSTRIALQUITAR = $_REQUEST['FOLIOEXIINDUSTRIALQUITAR'];

    $EXIINDUSTRIAL->__SET('ID_EXIINDUSTRIAL', $IDEXIINDUSTRIALQUITAR);
    $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $FOLIOEXIINDUSTRIALQUITAR);
    // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $EXIINDUSTRIAL_ADO->actualizarDeselecionarDespachoCambiarEstado($EXIINDUSTRIAL);
}



//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($_REQUEST['parametro']) && isset($_REQUEST['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_REQUEST['parametro'];
    $OP = $_REQUEST['parametro1'];




    $ARRAYTOMADO = $EXIINDUSTRIAL_ADO->buscarPorDespacho($IDOP);
    $ARRAYDESPACHOTOTAL = $EXIINDUSTRIAL_ADO->obtenerTotalesDespacho($IDOP);
    $ARRAYDESPACHOTOTAL2 = $EXIINDUSTRIAL_ADO->obtenerTotalesDespacho($IDOP);


    $TOTALNETO = $ARRAYDESPACHOTOTAL[0]['TOTAL_NETO'];
    $TOTALNETOV = $ARRAYDESPACHOTOTAL[0]['TOTAL_NETO'];


    //FUNCION PARA LA OBTENCION DE LOS TOTALES DEL DETALLE ASOCIADO A DESPACHOIND

    //IDENTIFICACIONES DE OPERACIONES
    //crear =  OBTENCION DE DATOS INICIALES PARA PODER CREAR LA DESPACHOIND
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
        $ARRAYDESPACHOMP = $DESPACHOIND_ADO->verDespachoind($IDOP);
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
            $ARRAYPLANTADESTINO = $PLANTA_ADO->listarPlantaExternaCBX();
            $PLANTADESTINO = "" . $r['ID_PLANTA2'];
            $ESTADO = "" . $r['ESTADO'];
            $FECHAINGRESODESPACHO = "" . $r['FECHA_INGRESOR'];
            $FECHAMODIFCIACIONDESPACHO = "" . $r['FECHA_MODIFICACIONR'];

            if ($TDESPACHO == "1") {
                $PLANTADESTINO = "" . $r['ID_PLANTA2'];
            }
            if ($TDESPACHO == "2") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            }
            if ($TDESPACHO == "3") {
                $COMPRADOR = "" . $r['ID_COMPRADOR'];
            }
            if ($TDESPACHO == "4") {
                $REGALO = "" . $r['REGALO_DESPACHO'];
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
        $ARRAYDESPACHOMP = $DESPACHOIND_ADO->verDespachoind($IDOP);
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
            $ARRAYPLANTADESTINO = $PLANTA_ADO->listarPlantaExternaCBX();
            $PLANTADESTINO = "" . $r['ID_PLANTA2'];
            $ESTADO = "" . $r['ESTADO'];
            $FECHAINGRESODESPACHO = "" . $r['FECHA_INGRESOR'];
            $FECHAMODIFCIACIONDESPACHO = "" . $r['FECHA_MODIFICACIONR'];


            if ($TDESPACHO == "1") {
                $PLANTADESTINO = "" . $r['ID_PLANTA2'];
            }
            if ($TDESPACHO == "2") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            }
            if ($TDESPACHO == "3") {
                $COMPRADOR = "" . $r['ID_COMPRADOR'];
            }
            if ($TDESPACHO == "4") {
                $REGALO = "" . $r['REGALO_DESPACHO'];
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
        $ARRAYDESPACHOMP = $DESPACHOIND_ADO->verDespachoind($IDOP);
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
            $ARRAYPLANTADESTINO = $PLANTA_ADO->listarPlantaExternaCBX();
            $PLANTADESTINO = "" . $r['ID_PLANTA2'];
            $ESTADO = "" . $r['ESTADO'];
            $FECHAINGRESODESPACHO = "" . $r['FECHA_INGRESOR'];
            $FECHAMODIFCIACIONDESPACHO = "" . $r['FECHA_MODIFICACIONR'];



            if ($TDESPACHO == "1") {
                $PLANTADESTINO = "" . $r['ID_PLANTA2'];
            }
            if ($TDESPACHO == "2") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            }
            if ($TDESPACHO == "3") {
                $COMPRADOR = "" . $r['ID_COMPRADOR'];
            }
            if ($TDESPACHO == "4") {
                $REGALO = "" . $r['REGALO_DESPACHO'];
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
        $ARRAYPLANTADESTINO = $PLANTA_ADO->listarPlantaExternaCBX();


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
        if ($TDESPACHO == "4") {
            if (isset($_REQUEST['REGALO'])) {
                $REGALO = "" . $_REQUEST['REGALO'];
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
    <title>Registro Despacho Industrial</title>
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

                    if (TDESPACHO == 4) {

                        REGALO = document.getElementById("REGALO").value;
                        document.getElementById('val_regalo').innerHTML = "";
                        if (REGALO == null || REGALO == 0) {
                            document.form_reg_dato.REGALO.focus();
                            document.form_reg_dato.REGALO.style.borderColor = "#FF0000";
                            document.getElementById('val_regalo').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false
                        }
                        document.form_reg_dato.REGALO.style.borderColor = "#4AF575";

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

                //FUNCION PARA REALIZAR UNA ACTUALIZACION DEL FORMULARIO DE REGISTRO DE DESPACHOIND
                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }

                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE DESPACHOIND
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
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Granel</li>
                                            <li class="breadcrumb-item" aria-current="page">Despacho Industrial</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroDespachoind.php"> Operaciónes Despacho </a>
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
                                                <label>Número Despacho</label>
                                                <input type="hidden" class="form-control" placeholder="ID DESPACHOIND" id="ID" name="ID" value="<?php echo $IDDESPACHOMP; ?>" />
                                                <input type="text" class="form-control" style="background-color: #eeeeee;" placeholder="Número Despacho" id="IDDESPACHOMP" name="IDDESPACHOMP" value="<?php echo $NUMEROVER; ?>" disabled />
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
                                                <input type="hidden" class="form-control" placeholder="FECHA DESPACHOIND" id="FECHAINGRESODESPACHOE" name="FECHAINGRESODESPACHOE" value="<?php echo $FECHAINGRESODESPACHO; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="Fecha Ingreso" id="FECHAINGRESODESPACHO" name="FECHAINGRESODESPACHO" value="<?php echo $FECHAINGRESODESPACHO; ?>" disabled />
                                                <label id="val_fechai" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Fecha Modificación</label>
                                                <input type="hidden" class="form-control" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACIONDESPACHOE" name="FECHAMODIFCIACIONDESPACHOE" value="<?php echo $FECHAMODIFCIACIONDESPACHO; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="Fecha Modificación" id="FECHAMODIFCIACIONDESPACHO" name="FECHAMODIFCIACIONDESPACHO" value="<?php echo $FECHAMODIFCIACIONDESPACHO; ?>" disabled />
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
                                                <label>Número Guía </label>
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

                                                    <option value="4" <?php if ($TDESPACHO == "4") {
                                                                            echo "selected";
                                                                        } ?>> Regalo</option>

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
                                                <label>Patente Camiíon</label>
                                                <input type="hidden" class="form-control" placeholder="Patente Vehiculo" id="PATENTEVEHICULOE" name="PATENTEVEHICULOE" value="<?php echo $PATENTEVEHICULO; ?>" />
                                                <input type="text" class="form-control" <?php echo $DISABLEDSTYLE; ?> placeholder="Patente Camiíon" id="PATENTEVEHICULO" name="PATENTEVEHICULO" value="<?php echo $PATENTEVEHICULO; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
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
                                                    <button type="button" class=" btn btn-rounded btn-success btn-outline" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>  <?php if ($ESTADO == 0) {
                                                                                                                                                                                        echo "disabled";
                                                                                                                                                                                    } ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopPlanta3.php' ); ">
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
                                                    <button type="button" class=" btn btn-rounded btn-success btn-outline" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>  <?php if ($ESTADO == 0) {
                                                                                                                                                                                        echo "disabled";
                                                                                                                                                                                    } ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopProductor.php' ); ">
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
                                                    <button type="button" class=" btn btn-rounded btn-success btn-outline" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>  <?php if ($ESTADO == 0) {
                                                                                                                                                                                        echo "disabled";
                                                                                                                                                                                    } ?>  id="defecto" name="pop" Onclick="abrirVentana('registroPopComprador.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <?php if ($TDESPACHO == "4") { ?>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label>Regalo</label>
                                                    <input type="hidden" class="form-control" placeholder="REGALOE" id="REGALOE" name="REGALOE" value="<?php echo $REGALO; ?>" />
                                                    <textarea class="form-control" rows="1" <?php echo $DISABLEDSTYLE; ?> placeholder="Ingrese Para Quien o Quienes" id="REGALO" name="REGALO" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>><?php echo $REGALO; ?></textarea>
                                                    <label id="val_regalo" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Observaciónes </label>
                                                <input type="hidden" class="form-control" placeholder="TRANSPORTE" id="OBSERVACIONDESPACHOE" name="OBSERVACIONDESPACHOE" value="<?php echo $OBSERVACIONDESPACHO; ?>" />
                                                <textarea class="form-control" rows="1" <?php echo $DISABLEDSTYLE; ?> placeholder="Ingrese Nota, Observaciónes u Otro" id="OBSERVACIONDESPACHO" name="OBSERVACIONDESPACHO" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>><?php echo $OBSERVACIONDESPACHO; ?></textarea>
                                                <label id="val_observacion" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>


                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Selecion / Existencia Producto Terminado </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label id="val_dproceso" class="validacion center"><?php echo $MENSAJE; ?> </label>
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <div class="table-responsive">
                                                    <table id="detalle" class="table table-hover " style="width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <a href="#" class="text-warning hover-warning">
                                                                        N° Folio
                                                                    </a>
                                                                </th>
                                                                <th class="text-center">Operaciónes</th>
                                                                <th>Fecha Ingreso </th>
                                                                <th>Código Estandar </th>
                                                                <th>Envase/Estandar </th>
                                                                <th>CSG</th>
                                                                <th>Productor</th>
                                                                <th>Variedad</th>
                                                                <th>Kilo Neto </th>
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
                                                                                    echo $r['FOLIO_AUXILIAR_EXIINDUSTRIAL'];

                                                                                    ?>
                                                                                </a>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <form method="post" id="form1">

                                                                                    <input type="hidden" class="form-control" id="IDEXIINDUSTRIALQUITAR" name="IDEXIINDUSTRIALQUITAR" value="<?php echo $r['ID_EXIINDUSTRIAL']; ?>" />
                                                                                    <input type="hidden" class="form-control" id="FOLIOEXIINDUSTRIALQUITAR" name="FOLIOEXIINDUSTRIALQUITAR" value="<?php echo $r['FOLIO_AUXILIAR_EXIINDUSTRIAL']; ?>" />

                                                                                    <button type="submit" class="btn btn-rounded btn-sm  btn-danger btn-outline mr-1" id="defecto" name="QUITAR" title="Quitar" <?php if ($ESTADO == 0) {
                                                                                                                                                                                                                    echo "disabled";
                                                                                                                                                                                                                } ?>>
                                                                                        <i class="ti-close  "></i> Quitar
                                                                                    </button>
                                                                                </form>
                                                                            </td>
                                                                            <td><?php echo $r['FECHA_INGRESO_EXIINDUSTRIAL']; ?></td>
                                                                            <td>
                                                                                <?php
                                                                                $ARRAYEVERERECEPCIONID = $EINDUSTRIAL_ADO->verEstandar($r['ID_ESTANDAR']);
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
                                                                            <td><?php echo $r['KILOS_NETO_EXIINDUSTRIAL']; ?></td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                <?php } ?>

                                                            </form>
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
                                                            Seleccionar
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td class=" center">
                                                            <div class="form-group">
                                                                <button type="button" class=" btn btn-rounded btn-success btn-outline" <?php echo $DISABLED2; ?> id="defecto" name="agregar" Onclick="abrirVentana('registroSelecionExistenciaDespachoIND.php?EMPRESA=<?php echo $EMPRESA; ?>&&PLANTA=<?php echo $PLANTA; ?>&&TEMPORADA=<?php echo $TEMPORADA; ?> && DESPACHOIND=<?php echo $IDOP ?>' ); ">
                                                                    <i class="glyphicon glyphicon-plus"></i>
                                                                </button>
                                                            </div>
                                                        </td>
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
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                </div>

                                <!-- /.row -->
                                <!-- /.box-body -->





                                <div class="box-footer">
                                    <table class="table ">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php if ($ESTADO == 0) { ?>
                                                        <?php if ($OP == "crear") { ?>
                                                            <button type="button" class="btn btn-rounded  btn-success btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('listarDespachoind.php'); ">
                                                                <i class="ti-back-left "></i> VOLVER
                                                            </button>
                                                        <?php } ?>

                                                        <?php if ($OP == "") { ?>
                                                            <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroDespachoind.php');">
                                                                <i class="ti-trash"></i> CANCELAR
                                                            </button>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <?php if ($ESTADO != 0) { ?>
                                                        <?php if ($OP == "crear") { ?>
                                                            <button type="button" class="btn btn-rounded  btn-success btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('listarDespachoind.php'); ">
                                                                <i class="ti-back-left "></i> VOLVER
                                                            </button>
                                                        <?php } ?>
                                                        <?php if ($OP == "") { ?>
                                                            <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroDespachoind.php');">
                                                                <i class="ti-trash"></i> CANCELAR
                                                            </button>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <?php if ($OP == "editar") { ?>
                                                        <button type="button" class="btn btn-rounded  btn-success btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('listarDespachoind.php'); ">
                                                            <i class="ti-back-left "></i> VOLVER
                                                        </button>
                                                    <?php } ?>
                                                    <?php if ($OP == "ver") { ?>
                                                        <button type="button" class="btn btn-rounded  btn-success btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('listarDespachoind.php'); ">
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


                                                    <?php if ($OP != "") {  ?>
                                                        <?php if ($ESTADO == "0") {  ?>
                                                            <button type="button" class="btn btn-rounded  btn-info btn-outline mr-1" id="defecto" name="tarjas" Onclick="abrirVentana('../documento/informeDespachoIND.php?parametro=<?php echo $IDOP; ?>&&NOMBREUSUARIO=<?php echo $NOMBREUSUARIOS; ?>'); ">
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