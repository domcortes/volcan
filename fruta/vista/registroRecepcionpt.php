<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/FOLIO_ADO.php';


include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/TRANSPORTE_ADO.php';
include_once '../controlador/CONDUCTOR_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';
include_once '../controlador/TCALIBRE_ADO.php';

include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/RECEPCIONPT_ADO.php';
include_once '../controlador/DRECEPCIONPT_ADO.php';


include_once '../modelo/DRECEPCIONPT.php';
include_once '../modelo/RECEPCIONPT.php';
include_once '../modelo/EXIEXPORTACION.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$FOLIO_ADO =  new FOLIO_ADO();


$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$EEXPORTACION_ADO = new EEXPORTACION_ADO();
$TMANEJO_ADO = new TMANEJO_ADO();
$TCALIBRE_ADO = new TCALIBRE_ADO();

$EXIEXPORTACION_ADO = new EXIEXPORTACION_ADO();
$RECEPCIONPT_ADO =  new RECEPCIONPT_ADO();
$DRECEPCIONPT_ADO =  new DRECEPCIONPT_ADO();
//INIICIALIZAR MODELO
$DRECEPCIONPT =  new DRECEPCIONPT();
$RECEPCIONPT =  new RECEPCIONPT();
$EXIEXPORTACION =  new EXIEXPORTACION();
//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$IDRECEPCION = "";
$NUMERO = "";
$NUMEROVER = "";
$FECHAINGRESORECEPCION = "";
$FECHAMODIFCIACIONRECEPCION = "";

$CANTIDADENVASERECEPCION = "";
$KILOSNETORECEPCION = "";
$KILOSBRUTORECEPCION = "";

$DIFERENCIAKILOS = "";
$PORCENTAJEDIFERENCIA = "";
$FECHARECEPCION = "";
$HORARECEPCION = "";
$NUMEROGUIA = "";
$FECHAGUIA = "";
$PDE = "";
$DIFERENCIALGUIA = "";
$OBSERVACION = "";
$TRECEPCION = "";
$CONDUCTOR = "";
$PATENTECAMION = "";
$PATENTECARRO = "";
$TRANSPORTE = "";
$ESTADO = "";
$PLANTA2 = "";
$PRODUCTOR = "";
$CSG = "";

$CANTIDADENVASERECEPCION2 = "";
$KILOSNETORECEPCION2 = "";
$KILOSBRUTORECEPCION2 = "";
$TOTALGUIA = "";

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$CONTADOR = 0;

$IDEMPRESA = "";
$IDPLANTA = "";
$IDTEMPORADA = "";
$SINO = "";

$IDOP = "";
$OP = "";
$ID = "";

$EEXPORTACION = "";
$VESPECIES = "";
$CALIBRE = "";
$PRODUCTOR = "";

$FOLIOELIMINAR = "";

$DISABLED = "";
$DISABLED2 = "disabled";
$DISABLED3 = "";
$DISABLEDSTYLE = "";
$DISABLEDFOLIO = "";
$MENSAJEFOLIO = "";



$MENSAJE = "";
$MENSAJE2 = "";
$MENSAJE3 = "";
$MENSAJEVALIDATO = "";

$FOLIONUMERO = "";

//INICIALIZAR ARREGLOS
$ARRAYRECEPCION = "";
$ARRAYRECEPCION2 = "";
$ARRAYRECEPCIONBUSCARGPETP = "";
$ARRAYDRECEPCION = "";
$ARRAYDRECEPCION2 = "";
$ARRAYTRECEPCION = "";
$ARRAYCONDUCTOR = "";
$ARRAYVERCONDUCTOR = "";

$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";

$ARRAYTRANSPORTE = "";
$ARRAYVEHICULO = "";
$ARRAYCONDUCTOR2 = "";
$ARRAYDRECEPCIONTOTALES = "";
$ARRAYDRECEPCIONTOTALES2 = "";
$ARRAYPRODUCTOR = "";
$ARRAYPVESPECIES = "";
$ARRAYEXISTENCIA = "";
$ARRAYEXISTENCIA2 = "";
$ARRAYESTANDAR = "";
$ARRAYFECHAACTUAL = "";
$ARRAYEXISENCIARECEPCION = "";
$ARRAYNUMERO = "";
$ARRAYFOLIO3 = "";
$ARRAYTMANEJO = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYTRANSPORTE = $TRANSPORTE_ADO->listarTransportePorEmpresaCBX($EMPRESAS);
$ARRAYCONDUCTOR = $CONDUCTOR_ADO->listarConductorPorEmpresaCBX($EMPRESAS);
$ARRAYVESPECIES = $VESPECIES_ADO->listarVespeciesPorEmpresaCBX($EMPRESAS);
$ARRAYPRODUCTOR = $PRODUCTOR_ADO->listarProductorPorEmpresaCBX($EMPRESAS);


$ARRAYFECHAACTUAL = $RECEPCIONPT_ADO->obtenerFecha();
$FECHARECEPCION = $ARRAYFECHAACTUAL[0]['FECHA'];
$FECHAGUIA = $ARRAYFECHAACTUAL[0]['FECHA'];
$HORARECEPCION = $ARRAYFECHAACTUAL[0]['HORA'];
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrlD.php";




$ARRAYFOLIO3 = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTmateriaprima($EMPRESAS, $PLANTAS, $TEMPORADAS);
if (empty($ARRAYFOLIO3)) {
    $DISABLEDFOLIO = "disabled";
    $MENSAJEFOLIO = " NECESITA <b> CREAR LOS FOLIOS MP </b> , PARA OCUPAR LA <b> FUNCIONALIDAD </b>. FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
}
//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['CREAR'])) {

    $ARRAYRECEPCIONBUSCARGPETP = $RECEPCIONPT_ADO->buscarRecepcionPorProductorGuiaEmpresaPlantaTemporada($_REQUEST['NUMEROGUIA'], $_REQUEST['PRODUCTOR'], $_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
    if ($ARRAYRECEPCIONBUSCARGPETP) {
        $SINO = "1";
        $MENSAJE3 = "LA GUIA DEL PRODUCTOR SE ENCUENTRA DUPLICADA";
    } else {
        $SINO = "0";
        $MENSAJE3 = "";
    }
    if ($SINO == "0") {
        $ARRAYNUMERO = $RECEPCIONPT_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
        $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;
        //UTILIZACION METODOS SET DEL MODELO
        //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   

        $RECEPCIONPT->__SET('NUMERO_RECEPCION', $NUMERO);
        $RECEPCIONPT->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
        $RECEPCIONPT->__SET('HORA_RECEPCION', $_REQUEST['HORARECEPCION']);
        $RECEPCIONPT->__SET('FECHA_GUIA_RECEPCION', $_REQUEST['FECHAGUIA']);
        $RECEPCIONPT->__SET('NUMERO_GUIA_RECEPCION', $_REQUEST['NUMEROGUIA']);
        $RECEPCIONPT->__SET('CANTIDAD_ENVASE_RECEPCION', 0);
        $RECEPCIONPT->__SET('KILOS_NETO_RECEPCION', 0);
        $RECEPCIONPT->__SET('KILOS_BRUTO_RECEPCION', 0);
        $RECEPCIONPT->__SET('TOTAL_KILOS_GUIA_RECEPCION',  $_REQUEST['TOTALGUIA']);
        $RECEPCIONPT->__SET('PATENTE_CAMION', $_REQUEST['PATENTECAMION']);
        $RECEPCIONPT->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARRO']);
        $RECEPCIONPT->__SET('OBSERVACION_RECEPCION', $_REQUEST['OBSERVACION']);
        $RECEPCIONPT->__SET('TRECEPCION', $_REQUEST['TRECEPCION']);
        if ($_REQUEST['TRECEPCION'] == "1") {
            $RECEPCIONPT->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
        }
        if ($_REQUEST['TRECEPCION'] == "2") {
            $RECEPCIONPT->__SET('ID_PLANTA2', $_REQUEST['PLANTA2']);
        }
        $RECEPCIONPT->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTE']);
        $RECEPCIONPT->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTOR']);
        $RECEPCIONPT->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $RECEPCIONPT->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $RECEPCIONPT->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        $RECEPCIONPT->__SET('ID_USUARIOI', $IDUSUARIOS);
        $RECEPCIONPT->__SET('ID_USUARIOM', $IDUSUARIOS);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $RECEPCIONPT_ADO->agregarRecepcion($RECEPCIONPT);

        //OBTENER EL ID DE LA RECEPCION CREADA PARA LUEGO ENVIAR EL INGRESO DEL DETALLE
        $ARRYAOBTENERID = $RECEPCIONPT_ADO->obtenerID(
            $_REQUEST['OBSERVACION'],
            $_REQUEST['TRECEPCION'],
            $_REQUEST['EMPRESA'],
            $_REQUEST['PLANTA'],
            $_REQUEST['TEMPORADA'],
        );

        //REDIRECCIONAR A PAGINA registroRecepcionpt.php 
        $_SESSION["parametro"] = $ARRYAOBTENERID[0]['ID_RECEPCION'];
        $_SESSION["parametro1"] = "crear";
        echo "<script type='text/javascript'> location.href ='registroRecepcionpt.php?op';</script>";
    }
}
//OPERACION EDICION DE FILA
if (isset($_REQUEST['GUARDAR'])) {
    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $RECEPCIONPT->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCIONE']);
    $RECEPCIONPT->__SET('HORA_RECEPCION', $_REQUEST['HORARECEPCIONE']);
    $RECEPCIONPT->__SET('FECHA_GUIA_RECEPCION', $_REQUEST['FECHAGUIAE']);
    $RECEPCIONPT->__SET('NUMERO_GUIA_RECEPCION', $_REQUEST['NUMEROGUIAE']);
    $RECEPCIONPT->__SET('CANTIDAD_ENVASE_RECEPCION', $_REQUEST['CANTIDADENVASERECEPCION']);
    $RECEPCIONPT->__SET('KILOS_NETO_RECEPCION', $_REQUEST['KILOSNETORECEPCION']);
    $RECEPCIONPT->__SET('KILOS_BRUTO_RECEPCION', $_REQUEST['KILOSBRUTORECEPCION']);
    $RECEPCIONPT->__SET('TOTAL_KILOS_GUIA_RECEPCION',  $_REQUEST['TOTALGUIAE']);
    $RECEPCIONPT->__SET('PATENTE_CAMION', $_REQUEST['PATENTECAMIONE']);
    $RECEPCIONPT->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
    $RECEPCIONPT->__SET('OBSERVACION_RECEPCION', $_REQUEST['OBSERVACIONE']);
    $RECEPCIONPT->__SET('TRECEPCION', $_REQUEST['TRECEPCIONE']);
    if ($_REQUEST['TRECEPCIONE'] == "1") {
        $RECEPCIONPT->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
    }
    if ($_REQUEST['TRECEPCIONE'] == "2") {
        $RECEPCIONPT->__SET('ID_PLANTA2', $_REQUEST['PLANTA2E']);
    }
    $RECEPCIONPT->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
    $RECEPCIONPT->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);
    $RECEPCIONPT->__SET('ID_EMPRESA', $_REQUEST['EMPRESAE']);
    $RECEPCIONPT->__SET('ID_PLANTA', $_REQUEST['PLANTAE']);
    $RECEPCIONPT->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADAE']);
    $RECEPCIONPT->__SET('ID_USUARIOM', $IDUSUARIOS);
    $RECEPCIONPT->__SET('ID_RECEPCION', $_REQUEST['IDP']);
    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
    $RECEPCIONPT_ADO->actualizarRecepcion($RECEPCIONPT);
}
//OPERACION PARA CERRAR LA RECEPCION
if (isset($_REQUEST['CERRAR'])) {
    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $ARRAYDRECEPCION2 = $DRECEPCIONPT_ADO->listarDrecepcionPorRecepcion($_REQUEST['IDP']);
    if (empty($ARRAYDRECEPCION2)) {
        $MENSAJE = "TIENE  QUE HABER AL MENOS UN REGISTRO EN EL DETALLE";
        $SINO = "1";
    } else {
        $MENSAJE = "";
        $SINO = "0";
    }
    if ($SINO == "0") {

        $RECEPCIONPT->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCIONE']);
        $RECEPCIONPT->__SET('HORA_RECEPCION', $_REQUEST['HORARECEPCIONE']);
        $RECEPCIONPT->__SET('FECHA_GUIA_RECEPCION', $_REQUEST['FECHAGUIAE']);
        $RECEPCIONPT->__SET('NUMERO_GUIA_RECEPCION', $_REQUEST['NUMEROGUIAE']);
        $RECEPCIONPT->__SET('CANTIDAD_ENVASE_RECEPCION', $_REQUEST['CANTIDADENVASERECEPCION']);
        $RECEPCIONPT->__SET('KILOS_NETO_RECEPCION', $_REQUEST['KILOSNETORECEPCION']);
        $RECEPCIONPT->__SET('KILOS_BRUTO_RECEPCION', $_REQUEST['KILOSBRUTORECEPCION']);
        $RECEPCIONPT->__SET('TOTAL_KILOS_GUIA_RECEPCION',  $_REQUEST['TOTALGUIAE']);
        $RECEPCIONPT->__SET('PATENTE_CAMION', $_REQUEST['PATENTECAMIONE']);
        $RECEPCIONPT->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
        $RECEPCIONPT->__SET('OBSERVACION_RECEPCION', $_REQUEST['OBSERVACIONE']);
        $RECEPCIONPT->__SET('TRECEPCION', $_REQUEST['TRECEPCIONE']);
        if ($_REQUEST['TRECEPCIONE'] == "1") {
            $RECEPCIONPT->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
        }
        if ($_REQUEST['TRECEPCIONE'] == "2") {
            $RECEPCIONPT->__SET('ID_PLANTA2', $_REQUEST['PLANTA2E']);
        }
        $RECEPCIONPT->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
        $RECEPCIONPT->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);
        $RECEPCIONPT->__SET('ID_EMPRESA', $_REQUEST['EMPRESAE']);
        $RECEPCIONPT->__SET('ID_PLANTA', $_REQUEST['PLANTAE']);
        $RECEPCIONPT->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADAE']);
        $RECEPCIONPT->__SET('ID_USUARIOM', $IDUSUARIOS);
        $RECEPCIONPT->__SET('ID_RECEPCION', $_REQUEST['IDP']);
        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
        $RECEPCIONPT_ADO->actualizarRecepcion($RECEPCIONPT);

        $RECEPCIONPT->__SET('ID_RECEPCION', $_REQUEST['IDP']);
        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
        $RECEPCIONPT_ADO->cerrado($RECEPCIONPT);


        $ARRAYEXISENCIARECEPCION = $EXIEXPORTACION_ADO->buscarPorRecepcion($_REQUEST['IDP']);

        foreach ($ARRAYEXISENCIARECEPCION as $r) :
            $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $r['ID_EXIEXPORTACION']);
            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
            $EXIEXPORTACION_ADO->vigente($EXIEXPORTACION);
        endforeach;

        //REDIRECCIONAR A PAGINA registroRecepcionpt.php 
        //SEGUNE EL TIPO DE OPERACIONS QUE SE INDENTIFIQUE EN LA URL
        if ($_SESSION['parametro1'] == "crear") {
            $_SESSION["parametro"] = $_REQUEST['IDP'];
            $_SESSION["parametro1"] = "ver";
            echo "<script type='text/javascript'> location.href ='registroRecepcionpt.php?op';</script>";
        }
        if ($_SESSION['parametro1'] == "editar") {
            $_SESSION["parametro"] = $_REQUEST['IDP'];
            $_SESSION["parametro1"] = "ver";
            echo "<script type='text/javascript'> location.href ='registroRecepcionpt.php?op';</script>";
        }
    }
}
//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['parametro'];
    $OP = $_SESSION['parametro1'];


    //FUNCION PARA LA OBTENCION DE LOS TOTALES DEL DETALLE ASOCIADO A RECEPCION
    $ARRAYDRECEPCION = $DRECEPCIONPT_ADO->buscarPorIdRecepcion2($IDOP);

    $ARRAYDRECEPCIONTOTALES = $DRECEPCIONPT_ADO->obtenerTotales($IDOP);
    $ARRAYDRECEPCIONTOTALES2 = $DRECEPCIONPT_ADO->obtenerTotales2($IDOP);
    $CANTIDADENVASERECEPCION = $ARRAYDRECEPCIONTOTALES[0]['TOTAL_ENVASE'];
    $KILOSNETORECEPCION = $ARRAYDRECEPCIONTOTALES[0]['TOTAL_NETO'];
    $KILOSBRUTORECEPCION = $ARRAYDRECEPCIONTOTALES[0]['TOTAL_BRUTO'];
    $CANTIDADENVASERECEPCION2 = $ARRAYDRECEPCIONTOTALES2[0]['TOTAL_ENVASE'];
    $KILOSNETORECEPCION2 = $ARRAYDRECEPCIONTOTALES2[0]['TOTAL_NETO'];
    $KILOSBRUTORECEPCION2 = $ARRAYDRECEPCIONTOTALES2[0]['TOTAL_BRUTO'];

    //IDENTIFICACIONES DE OPERACIONES
    //crear =  OBTENCION DE DATOS INICIALES PARA PODER CREAR LA RECEPCION
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
        $ARRAYRECEPCION = $RECEPCIONPT_ADO->verRecepcion($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYRECEPCION as $r) :
            $IDRECEPCION = $IDOP;
            $NUMEROVER =  "" . $r['NUMERO_RECEPCION'];
            $FECHARECEPCION = "" . $r['FECHA_RECEPCION'];
            $HORARECEPCION = "" . $r['HORA_RECEPCION'];
            $FECHAINGRESORECEPCION = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONRECEPCION = "" . $r['MODIFICACION'];
            $NUMEROGUIA = "" . $r['NUMERO_GUIA_RECEPCION'];
            $FECHAGUIA = "" . $r['FECHA_GUIA_RECEPCION'];
            $TOTALGUIA = "" . $r['TOTAL_KILOS_GUIA_RECEPCION'];
            $OBSERVACION = "" . $r['OBSERVACION_RECEPCION'];
            $PATENTECAMION = "" . $r['PATENTE_CAMION'];
            $PATENTECARRO = "" . $r['PATENTE_CARRO'];
            $TRECEPCION = "" . $r['TRECEPCION'];
            if ($TRECEPCION == "1") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
                $ARRAYVERIDPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
                if ($ARRAYVERIDPRODUCTOR) {
                    $CSG = $ARRAYVERIDPRODUCTOR[0]['CSG_PRODUCTOR'];
                    $PLANTA2 = "" . $r['ID_PLANTA2'];
                }
            }
            if ($TRECEPCION == "2") {
                $PLANTA2 = "" . $r['ID_PLANTA2'];
                $ARRAYVERIDPLANTA = $PLANTA_ADO->verPlanta($PLANTA2);
                if ($ARRAYVERIDPLANTA) {
                    $CSG = $ARRAYVERIDPLANTA[0]['CODIGO_SAG_PLANTA'];
                }
            }
            $TRANSPORTE = "" . $r['ID_TRANSPORTE'];
            $CONDUCTOR = "" . $r['ID_CONDUCTOR'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $ESTADO = "" . $r['ESTADO'];
            $DIFERENCIAKILOS = number_format($KILOSBRUTORECEPCION - $TOTALGUIA, 0, ' ', '.');
            $PORCENTAJEDIFERENCIA =  number_format((($KILOSBRUTORECEPCION * 100) / $TOTALGUIA) - 100, 2, ',', '.');
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
        $ARRAYRECEPCION = $RECEPCIONPT_ADO->verRecepcion($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYRECEPCION as $r) :
            $IDRECEPCION = $IDOP;
            $NUMEROVER =  "" . $r['NUMERO_RECEPCION'];
            $FECHARECEPCION = "" . $r['FECHA_RECEPCION'];
            $HORARECEPCION = "" . $r['HORA_RECEPCION'];
            $FECHAINGRESORECEPCION = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONRECEPCION = "" . $r['MODIFICACION'];
            $NUMEROGUIA = "" . $r['NUMERO_GUIA_RECEPCION'];
            $FECHAGUIA = "" . $r['FECHA_GUIA_RECEPCION'];
            $TOTALGUIA = "" . $r['TOTAL_KILOS_GUIA_RECEPCION'];
            $OBSERVACION = "" . $r['OBSERVACION_RECEPCION'];
            $PATENTECAMION = "" . $r['PATENTE_CAMION'];
            $PATENTECARRO = "" . $r['PATENTE_CARRO'];
            $TRECEPCION = "" . $r['TRECEPCION'];
            if ($TRECEPCION == "1") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
                $ARRAYVERIDPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
                if ($ARRAYVERIDPRODUCTOR) {
                    $CSG = $ARRAYVERIDPRODUCTOR[0]['CSG_PRODUCTOR'];
                    $PLANTA2 = "" . $r['ID_PLANTA2'];
                }
            }
            if ($TRECEPCION == "2") {
                $PLANTA2 = "" . $r['ID_PLANTA2'];
                $ARRAYVERIDPLANTA = $PLANTA_ADO->verPlanta($PLANTA2);
                if ($ARRAYVERIDPLANTA) {
                    $CSG = $ARRAYVERIDPLANTA[0]['CODIGO_SAG_PLANTA'];
                }
            }
            $TRANSPORTE = "" . $r['ID_TRANSPORTE'];
            $CONDUCTOR = "" . $r['ID_CONDUCTOR'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $ESTADO = "" . $r['ESTADO'];
            $DIFERENCIAKILOS = number_format($KILOSBRUTORECEPCION - $TOTALGUIA, 0, ' ', '.');
            $PORCENTAJEDIFERENCIA =  number_format((($KILOSBRUTORECEPCION * 100) / $TOTALGUIA) - 100, 2, ',', '.');

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
        $ARRAYRECEPCION = $RECEPCIONPT_ADO->verRecepcion($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYRECEPCION as $r) :
            $IDRECEPCION = $IDOP;
            $NUMEROVER =  "" . $r['NUMERO_RECEPCION'];
            $FECHARECEPCION = "" . $r['FECHA_RECEPCION'];
            $HORARECEPCION = "" . $r['HORA_RECEPCION'];
            $FECHAINGRESORECEPCION = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONRECEPCION = "" . $r['MODIFICACION'];
            $NUMEROGUIA = "" . $r['NUMERO_GUIA_RECEPCION'];
            $FECHAGUIA = "" . $r['FECHA_GUIA_RECEPCION'];
            $TOTALGUIA = $r['TOTAL_KILOS_GUIA_RECEPCION'];
            $OBSERVACION = "" . $r['OBSERVACION_RECEPCION'];
            $PATENTECAMION = "" . $r['PATENTE_CAMION'];
            $PATENTECARRO = "" . $r['PATENTE_CARRO'];
            $TRECEPCION = "" . $r['TRECEPCION'];
            if ($TRECEPCION == "1") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
                $ARRAYVERIDPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
                if ($ARRAYVERIDPRODUCTOR) {
                    $CSG = $ARRAYVERIDPRODUCTOR[0]['CSG_PRODUCTOR'];
                    $PLANTA2 = "" . $r['ID_PLANTA2'];
                }
            }
            if ($TRECEPCION == "2") {
                $PLANTA2 = "" . $r['ID_PLANTA2'];
                $ARRAYVERIDPLANTA = $PLANTA_ADO->verPlanta($PLANTA2);
                if ($ARRAYVERIDPLANTA) {
                    $CSG = $ARRAYVERIDPLANTA[0]['CODIGO_SAG_PLANTA'];
                }
            }
            $TRANSPORTE = "" . $r['ID_TRANSPORTE'];
            $CONDUCTOR = "" . $r['ID_CONDUCTOR'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $ESTADO = "" . $r['ESTADO'];
            $DIFERENCIAKILOS = number_format($KILOSBRUTORECEPCION - $TOTALGUIA, 0, ' ', '.');
            $PORCENTAJEDIFERENCIA =  number_format((($KILOSBRUTORECEPCION * 100) / $TOTALGUIA) - 100, 2, ',', '.');
        endforeach;
    }
}
//PROCESO PARA OBTENER LOS DATOS DEL FORMULARIO  Y MANTENERLO AL ACTUALIZACION QUE REALIZA EL SELECT DE CONDUCTOR

if (isset($_POST)) {

    if (isset($_REQUEST['FECHARECEPCION'])) {
        $FECHARECEPCION = "" . $_REQUEST['FECHARECEPCION'];
    }
    if (isset($_REQUEST['HORARECEPCION'])) {
        $HORARECEPCION = "" . $_REQUEST['HORARECEPCION'];
    }
    if (isset($_REQUEST['FECHAINGRESORECEPCION'])) {
        $FECHAINGRESORECEPCION = "" . $_REQUEST['FECHAINGRESORECEPCION'];
    }
    if (isset($_REQUEST['FECHAMODIFCIACIONRECEPCION'])) {
        $FECHAMODIFCIACIONRECEPCION = "" . $_REQUEST['FECHAMODIFCIACIONRECEPCION'];
    }
    if (isset($_REQUEST['NUMEROGUIA'])) {
        $NUMEROGUIA = "" . $_REQUEST['NUMEROGUIA'];
    }
    if (isset($_REQUEST['FECHAGUIA'])) {
        $FECHAGUIA = "" . $_REQUEST['FECHAGUIA'];
    }
    if (isset($_REQUEST['TOTALGUIA'])) {
        $TOTALGUIA = "" . $_REQUEST['TOTALGUIA'];
    }
    if (isset($_REQUEST['OBSERVACIONRECEPCION'])) {
        $OBSERVACIONRECEPCION = "" . $_REQUEST['OBSERVACIONRECEPCION'];
    }
    if (isset($_REQUEST['TRECEPCION'])) {
        $TRECEPCION = "" . $_REQUEST['TRECEPCION'];
        if ($TRECEPCION == "1") {
            if (isset($_REQUEST['PRODUCTOR'])) {
                $PRODUCTOR = "" . $_REQUEST['PRODUCTOR'];
                $PLANTA2 = "" . $_REQUEST['PLANTA2'];
                $ARRAYVERIDPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
                if ($ARRAYVERIDPRODUCTOR) {
                    $CSG = $ARRAYVERIDPRODUCTOR[0]['CSG_PRODUCTOR'];
                }
            }
        }
        if ($TRECEPCION == "2") {
            if (isset($_REQUEST['PLANTA2'])) {
                $PLANTA2 = "" . $_REQUEST['PLANTA2'];
                $ARRAYVERIDPLANTA = $PLANTA_ADO->verPlanta($PLANTA2);
                if ($ARRAYVERIDPLANTA) {
                    $CSG = $ARRAYVERIDPLANTA[0]['CODIGO_SAG_PLANTA'];
                }
            }
        }
    }
    if (isset($_REQUEST['TRANSPORTE'])) {
        $TRANSPORTE = "" . $_REQUEST['TRANSPORTE'];
    }
    if (isset($_REQUEST['CONDUCTOR'])) {
        $CONDUCTOR = "" . $_REQUEST['CONDUCTOR'];
    }
    if (isset($_REQUEST['PATENTECAMION'])) {
        $PATENTECAMION = "" . $_REQUEST['PATENTECAMION'];
    }
    if (isset($_REQUEST['PATENTECARRO'])) {
        $PATENTECARRO = "" . $_REQUEST['PATENTECARRO'];
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
    <title>Registro Recepcion</title>
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

                    FECHARECEPCION = document.getElementById("FECHARECEPCION").value;
                    HORARECEPCION = document.getElementById("HORARECEPCION").value;
                    TRECEPCION = document.getElementById("TRECEPCION").selectedIndex;


                    NUMEROGUIA = document.getElementById("NUMEROGUIA").value;
                    FECHAGUIA = document.getElementById("FECHAGUIA").value;
                    TOTALGUIA = document.getElementById("TOTALGUIA").value;
                    TRANSPORTE = document.getElementById("TRANSPORTE").selectedIndex;
                    CONDUCTOR = document.getElementById("CONDUCTOR").selectedIndex;
                    PATENTECAMION = document.getElementById("PATENTECAMION").value;
                    PATENTECARRO = document.getElementById("PATENTECARRO").value;
                    //OBSERVACION = document.getElementById("OBSERVACION").value;


                    document.getElementById('val_fechar').innerHTML = "";
                    document.getElementById('val_horar').innerHTML = "";
                    document.getElementById('val_trecepcion').innerHTML = "";


                    document.getElementById('val_numerog').innerHTML = "";
                    document.getElementById('val_fechag').innerHTML = "";
                    document.getElementById('val_totalg').innerHTML = "";
                    document.getElementById('val_transporte').innerHTML = "";
                    document.getElementById('val_conductor').innerHTML = "";
                    document.getElementById('val_patentecamion').innerHTML = "";
                    document.getElementById('val_patentecarro').innerHTML = "";
                    //  document.getElementById('val_observacion').innerHTML = "";

                    if (FECHARECEPCION == null || FECHARECEPCION.length == 0 || /^\s+$/.test(FECHARECEPCION)) {
                        document.form_reg_dato.FECHARECEPCION.focus();
                        document.form_reg_dato.FECHARECEPCION.style.borderColor = "#FF0000";
                        document.getElementById('val_fechar').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.FECHARECEPCION.style.borderColor = "#4AF575";


                    if (HORARECEPCION == null || HORARECEPCION.length == 0) {
                        document.form_reg_dato.HORARECEPCION.focus();
                        document.form_reg_dato.HORARECEPCION.style.borderColor = "#FF0000";
                        document.getElementById('val_horar').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.HORARECEPCION.style.borderColor = "#4AF575";



                    if (TRECEPCION == null || TRECEPCION == 0) {
                        document.form_reg_dato.TRECEPCION.focus();
                        document.form_reg_dato.TRECEPCION.style.borderColor = "#FF0000";
                        document.getElementById('val_trecepcion').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.TRECEPCION.style.borderColor = "#4AF575";


                    if (NUMEROGUIA == null || NUMEROGUIA.length == 0 || /^\s+$/.test(NUMEROGUIA)) {
                        document.form_reg_dato.NUMEROGUIA.focus();
                        document.form_reg_dato.NUMEROGUIA.style.borderColor = "#FF0000";
                        document.getElementById('val_numerog').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.NUMEROGUIA.style.borderColor = "#4AF575";



                    if (FECHAGUIA == null || FECHAGUIA.length == 0 || /^\s+$/.test(FECHAGUIA)) {
                        document.form_reg_dato.FECHAGUIA.focus();
                        document.form_reg_dato.FECHAGUIA.style.borderColor = "#FF0000";
                        document.getElementById('val_fechag').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.FECHAGUIA.style.borderColor = "#4AF575";

                    if (TOTALGUIA == null || TOTALGUIA == 0) {
                        document.form_reg_dato.TOTALGUIA.focus();
                        document.form_reg_dato.TOTALGUIA.style.borderColor = "#FF0000";
                        document.getElementById('val_totalg').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.TOTALGUIA.style.borderColor = "#4AF575";


                    if (TRANSPORTE == null || TRANSPORTE == 0) {
                        document.form_reg_dato.TRANSPORTE.focus();
                        document.form_reg_dato.TRANSPORTE.style.borderColor = "#FF0000";
                        document.getElementById('val_transporte').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
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

                    if (PATENTECAMION == null || PATENTECAMION == 0) {
                        document.form_reg_dato.PATENTECAMION.focus();
                        document.form_reg_dato.PATENTECAMION.style.borderColor = "#FF0000";
                        document.getElementById('val_patentecamion').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.PATENTECAMION.style.borderColor = "#4AF575";

                    /*
                                        if (PATENTECARRO == null || PATENTECARRO == 0) {
                                            document.form_reg_dato.PATENTECARRO.focus();
                                            document.form_reg_dato.PATENTECARRO.style.borderColor = "#FF0000";
                                            document.getElementById('val_patentecarro').innerHTML = "NO A INGRESADO DATO";
                                            return false
                                        }
                                        document.form_reg_dato.PATENTECARRO.style.borderColor = "#4AF575";
                    */

                    if (TRECEPCION == 1) {
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

                    if (TRECEPCION == 2) {
                        PLANTA2 = document.getElementById("PLANTA2").selectedIndex;
                        document.getElementById('val_planta2').innerHTML = "";
                        if (PLANTA2 == null || PLANTA2 == 0) {
                            document.form_reg_dato.PLANTA2.focus();
                            document.form_reg_dato.PLANTA2.style.borderColor = "#FF0000";
                            document.getElementById('val_planta2').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false
                        }
                        document.form_reg_dato.PLANTA2.style.borderColor = "#4AF575";

                    }


                    /*
                    if (OBSERVACION == null || OBSERVACION.length == 0 || /^\s+$/.test(OBSERVACION)) {
                        document.form_reg_dato.OBSERVACION.focus();
                        document.form_reg_dato.OBSERVACION.style.borderColor = "#FF0000";
                        document.getElementById('val_observacion').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.OBSERVACION.style.borderColor = "#4AF575"; 
                    */
                }
                /*
                                function confirmar() {


                                    FOLIOELIMINAR = document.getElementById("FOLIOELIMINAR").value;
                                    NOMBRESUSUARIOSLOGIN = document.getElementById("NOMBRESUSUARIOSLOGIN").value;

                                    var mensaje = 'Estimado/a: ' + NOMBRESUSUARIOSLOGIN + ' ¿Estas seguro de eliminar el Folio: ' + FOLIOELIMINAR + '?';
                                    


                                    if (confirm("Desea seguir?")) {
                                        return true;
                                    } else {
                                        return false;
                                    }
                                         }

                */




                //FUNCION PARA REALIZAR UNA ACTUALIZACION DEL FORMULARIO DE REGISTRO DE RECEPCIONPT
                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }

                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE RECEPCIONPT
                function abrirVentana(url) {
                    var opciones =
                        "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1600, height=1000'";
                    window.open(url, 'window', opciones);
                }

                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }

                function abrirPestana(url) {
                    var win = window.open(url, '_blank');
                    win.focus();
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
                                <h3 class="page-title">Registro Recepcion</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Frigorifico</li>
                                            <li class="breadcrumb-item" aria-current="page">Recepción P. Terminado</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Operaciones Registro Recepcion </a>
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
                                <div class="box-header with-border">
                                    <!--
                                        <h4 class="box-title">Different Width</h4>
                                        -->
                                </div>
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Número Recepción</label>
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESAE" name="EMPRESAE" value="<?php echo $EMPRESA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTAE" name="PLANTAE" value="<?php echo $PLANTA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADAE" name="TEMPORADAE" value="<?php echo $TEMPORADA; ?>" />


                                                <input type="hidden" name="CANTIDADENVASERECEPCION" id="CANTIDADENVASERECEPCION" value="<?php echo $CANTIDADENVASERECEPCION; ?>" />
                                                <input type="hidden" name="KILOSNETORECEPCION" id="KILOSNETORECEPCION" value="<?php echo $KILOSNETORECEPCION; ?>" />
                                                <input type="hidden" name="KILOSBRUTORECEPCION" id="KILOSBRUTORECEPCION" value="<?php echo $KILOSBRUTORECEPCION; ?>" />

                                                <input type="hidden" class="form-control" placeholder="ID RECEPCION" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP RECEPCION" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL RECEPCION" id="URLP" name="URLP" value="registroRecepcionpt" />
                                                <input type="hidden" class="form-control" placeholder="URL DRECEPCION" id="URLD" name="URLD" value="registroDrecepcionpt" />
                                                <input type="text" class="form-control" style="background-color: #eeeeee;" placeholder="Numero Recepcion" id="NUMERORECEPCION" name="NUMERORECEPCION" value="<?php echo $NUMEROVER; ?>" disabled />
                                                <label id="val_id" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-1 col-lg-1 col-md-6 col-sm-6 col-6 col-xs-6">
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Ingreso</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Ingreso" id="FECHAINGRESORECEPCIONE" name="FECHAINGRESORECEPCIONE" value="<?php echo $FECHAINGRESORECEPCION; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="FECHA RECEPCIONPT" id="FECHAINGRESORECEPCION" name="FECHAINGRESORECEPCION" value="<?php echo $FECHAINGRESORECEPCION; ?>" disabled />
                                                <label id="val_fechai" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Modificación</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Modificación" id="FECHAMODIFCIACIONRECEPCIONE" name="FECHAMODIFCIACIONRECEPCIONE" value="<?php echo $FECHAMODIFCIACIONRECEPCION; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACIONRECEPCION" name="FECHAMODIFCIACIONRECEPCION" value="<?php echo $FECHAMODIFCIACIONRECEPCION; ?>" disabled />
                                                <label id="val_fecham" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label id="val_validato" class="validacion"> <?php echo $MENSAJEVALIDATO; ?> </label>
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Recepción</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Recepción" id="FECHARECEPCIONE" name="FECHARECEPCIONE" value="<?php echo $FECHARECEPCION; ?>" />
                                                <input type="date" class="form-control" <?php echo $DISABLEDSTYLE; ?> placeholder="Fecha Recepcion" id="FECHARECEPCION" name="FECHARECEPCION" value="<?php echo $FECHARECEPCION; ?>" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_fechar" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Hora </label>
                                                <input type="hidden" class="form-control" placeholder="Hora Recepción" id="HORARECEPCIONE" name="HORARECEPCIONE" value="<?php echo $HORARECEPCION; ?>" />
                                                <input type="time" class="form-control" <?php echo $DISABLEDSTYLE; ?> placeholder="HORA RECEPCIONPT" id="HORARECEPCION" name="HORARECEPCION" value="<?php echo $HORARECEPCION; ?>" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_horar" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Tipo Recepción</label>
                                                <input type="hidden" class="form-control" placeholder="Tipo Recepción" id="TRECEPCIONE" name="TRECEPCIONE" value="<?php echo $TRECEPCION; ?>" />
                                                <select class="form-control select2" id="TRECEPCION" name="TRECEPCION" style="width: 100%;" onchange="this.form.submit()" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                    <option> </option>
                                                    <option value="1" <?php if ($TRECEPCION == "1") {
                                                                            echo "selected";
                                                                        } ?>> Desde Productor </option>
                                                    <option value="2" <?php if ($TRECEPCION == "2") {
                                                                            echo "selected";
                                                                        } ?>> Planta Externa </option>
                                                </select>
                                                <label id="val_trecepcion" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Número Guía</label>
                                                <input type="hidden" class="form-control" placeholder="Número Guía" id="NUMEROGUIAE" name="NUMEROGUIAE" value="<?php echo $NUMEROGUIA; ?>" />
                                                <input type="text" class="form-control" <?php echo $DISABLEDSTYLE; ?> placeholder="Numero Guia" id="NUMEROGUIA" name="NUMEROGUIA" value="<?php echo $NUMEROGUIA; ?>" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_numerog" class="validacion"><?php echo $MENSAJE3; ?> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Guía</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Guía" id="FECHAGUIAE" name="FECHAGUIAE" value="<?php echo $FECHAGUIA; ?>" />
                                                <input type="date" class="form-control" <?php echo $DISABLEDSTYLE; ?> placeholder="Fecha Guia" id="FECHAGUIA" name="FECHAGUIA" value="<?php echo $FECHAGUIA; ?>" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_fechag" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Total Kilo Guia</label>
                                                <input type="hidden" class="form-control" placeholder="Total Guia" id="TOTALGUIAE" name="TOTALGUIAE" value="<?php echo $TOTALGUIA; ?>" />
                                                <input type="text" class="form-control" <?php echo $DISABLEDSTYLE; ?> placeholder="Total Guia" id="TOTALGUIA" name="TOTALGUIA" value="<?php echo $TOTALGUIA; ?>" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_totalg" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            <label>Transporte</label>
                                            <input type="hidden" class="form-control" placeholder="TRANSPORTE" id="TRANSPORTEE" name="TRANSPORTEE" value="<?php echo $TRANSPORTE; ?>" />
                                            <select class="form-control select2" id="TRANSPORTE" name="TRANSPORTE" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                <option></option>
                                                <?php foreach ($ARRAYTRANSPORTE as $r) : ?>
                                                    <?php if ($ARRAYTRANSPORTE) {    ?>
                                                        <option value="<?php echo $r['ID_TRANSPORTE']; ?>" <?php if ($TRANSPORTE == $r['ID_TRANSPORTE']) {
                                                                                                                echo "selected";
                                                                                                            } ?>> <?php echo $r['NOMBRE_TRANSPORTE'] ?> </option>
                                                    <?php } else { ?>
                                                        <option>No Hay Datos Registrados </option>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <label id="val_transporte" class="validacion"> </label>
                                        </div>
                                        <div class="col-xxl-1 col-xl-1 col-lg-2 col-md-2 col-sm-3 col-3 col-xs-3">
                                            <div class="form-group">
                                                <br>
                                                <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Transporte" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopTransporte.php' ); ">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </button>
                                            </div>
                                        </div>


                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <label>Conductor</label>
                                                <input type="hidden" class="form-control" placeholder="CONDUCTORE" id="CONDUCTORE" name="CONDUCTORE" value="<?php echo $CONDUCTOR; ?>" />
                                                <select class="form-control select2" id="CONDUCTOR" name="CONDUCTOR" style="width: 100%;" value="<?php echo $CONDUCTOR; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYCONDUCTOR as $r) : ?>
                                                        <?php if ($ARRAYCONDUCTOR) {    ?>
                                                            <option value="<?php echo $r['ID_CONDUCTOR']; ?>" <?php if ($CONDUCTOR == $r['ID_CONDUCTOR']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>>
                                                                <?php echo $r['NOMBRE_CONDUCTOR'] ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_conductor" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-1 col-xl-1 col-lg-2 col-md-2 col-sm-3 col-3 col-xs-3">
                                            <div class="form-group">
                                                <br>
                                                <button type="button" class=" btn btn-success btn-block" data-toggle="tooltip" title="Agregar Conductor" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopConductor.php' ); ">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Patente Camión</label>
                                                <input type="hidden" class="form-control" placeholder="PATENTECAMIONE" id="PATENTECAMIONE" name="PATENTECAMIONE" value="<?php echo $PATENTECAMION; ?>" />
                                                <input type="text" class="form-control" <?php echo $DISABLEDSTYLE; ?> placeholder="Patente Camion" id="PATENTECAMION" name="PATENTECAMION" value="<?php echo $PATENTECAMION; ?>" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_patentecamion" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Patente Carro</label>
                                                <input type="hidden" class="form-control" placeholder="PATENTECARROE" id="PATENTECARROE" name="PATENTECARROE" value="<?php echo $PATENTECARRO; ?>" />
                                                <input type="text" class="form-control" <?php echo $DISABLEDSTYLE; ?> placeholder="Patente Carro" id="PATENTECARRO" name="PATENTECARRO" value="<?php echo $PATENTECARRO; ?>" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_patentecarro" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <?php if ($TRECEPCION == "") { ?>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>CSG/CSP</label>
                                                    <input type="hidden" class="form-control" placeholder="CSG" id="CSG" name="CSG" value="<?php echo $CSG; ?>" />
                                                    <input type="text" class="form-control" placeholder="CSG" id="CSGV" name="CSGV" value="<?php echo $CSG; ?>" disabled />

                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($TRECEPCION == "1") { ?>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>CSG</label>
                                                    <input type="hidden" class="form-control" placeholder="CSG" id="CSG" name="CSG" value="<?php echo $CSG; ?>" />
                                                    <input type="text" class="form-control" placeholder="CSG" id="CSGV" name="CSGV" value="<?php echo $CSG; ?>" disabled />
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Productor</label>
                                                    <input type="hidden" class="form-control" placeholder="PLANTA2" id="PLANTA2E" name="PLANTA2E" value="<?php echo $PLANTA2; ?>" />
                                                    <input type="hidden" class="form-control" placeholder="PLANTA2" id="PLANTA2" name="PLANTA2" value="<?php echo $PLANTA; ?>" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                    <input type="hidden" class="form-control" placeholder="Productor" id="PRODUCTORE" name="PRODUCTORE" value="<?php echo $PRODUCTOR; ?>" />
                                                    <select class="form-control select2" id="PRODUCTOR" name="PRODUCTOR" style="width: 100%;" <?php echo $DISABLEDFOLIO; ?> <?php if ($TRECEPCION == "1") { ?> onchange="this.form.submit()" <?php } ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
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
                                            <div class="col-xxl-1 col-xl-1 col-lg-2 col-md-2 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class=" btn btn-success btn-block" data-toggle="tooltip" title="Agregar Productor" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopProductor.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($TRECEPCION == "2") { ?>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>CSP</label>
                                                    <input type="hidden" class="form-control" placeholder="CSG" id="CSG" name="CSG" value="<?php echo $CSG; ?>" />
                                                    <input type="text" class="form-control" placeholder="CSG" id="CSGV" name="CSGV" value="<?php echo $CSG; ?>" disabled />
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Planta Origen</label>
                                                    <input type="hidden" class="form-control" placeholder="PLANTA2E" id="PLANTA2E" name="PLANTA2E" value="<?php echo $PLANTA2; ?>" />
                                                    <select class="form-control select2" id="PLANTA2" name="PLANTA2" style="width: 100%;" onchange="this.form.submit()" value="<?php echo $PLANTA2; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPLANTA2 as $r) : ?>
                                                            <?php if ($ARRAYPLANTA2) {    ?>
                                                                <option value="<?php echo $r['ID_PLANTA']; ?>" <?php if ($PLANTA2 == $r['ID_PLANTA']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>>
                                                                    <?php echo $r['NOMBRE_PLANTA'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_planta2" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-1 col-xl-1 col-lg-2 col-md-2 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Planta Externa" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopPlanta2.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Diferencia Kilos</label>
                                                <input type="text" class="form-control" placeholder="Diferencia Kilos" id="DIFERENCIAKILOS" name="DIFERENCIAKILOS" value="<?php echo $DIFERENCIAKILOS; ?>" disabled style='background-color: #eeeeee;' />
                                                <label id="val_dkilo" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>% Diferencia </label>
                                                <input type="text" class="form-control" placeholder="% " id="PORCENTAJEDIFERENCIA" name="PORCENTAJEDIFERENCIA" value="<?php echo $PORCENTAJEDIFERENCIA; ?>" disabled style='background-color: #eeeeee;' />
                                                <label id="val_dkilo" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Observaciónes </label>
                                                <input type="hidden" class="form-control" placeholder="Observaciónes" id="OBSERVACIONE" name="OBSERVACIONE" value="<?php echo $OBSERVACION; ?>" />
                                                <textarea class="form-control" rows="1" <?php echo $DISABLEDSTYLE; ?> placeholder="Ingrese Nota, Observaciones u Otro" id="OBSERVACION" name="OBSERVACION" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>><?php echo $OBSERVACION; ?></textarea>
                                                <label id="val_observacion" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="btn-group btn-rounded btn-block col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                        <?php if ($OP == "") { ?>
                                            <button type=" button" class="btn btn-rounded btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroRecepcionpt.php');">
                                                <i class="ti-trash"></i>
                                            </button>
                                            <button type="submit" class="btn btn-rounded btn-primary" data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" <?php echo $DISABLEDFOLIO; ?> onclick="return validacion()">
                                                <i class="ti-save-alt"></i>
                                            </button>
                                        <?php } ?>
                                        <?php if ($OP != "") { ?>
                                            <button type="button" class="btn btn-rounded  btn-success " data-toggle="tooltip" title="Volver" name="VOLVER" value="VOLVER" Onclick="irPagina('listarRecepcionpt.php'); ">
                                                <i class="ti-back-left "></i>
                                            </button>
                                            <button type="submit" class="btn btn-rounded btn-warning " data-toggle="tooltip" title="Editar" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?> onclick="return validacion()">
                                                <i class="ti-pencil-alt"></i>
                                            </button>
                                            <button type="submit" class="btn btn-rounded btn-danger " data-toggle="tooltip" title="Cerrar" name="CERRAR" value="CERRAR" <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?> onclick="return validacion()">
                                                <i class="ti-save-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-rounded  btn-info  " data-toggle="tooltip" title="Informe" id="defecto" name="tarjas" <?php echo $DISABLEDFOLIO; ?> Onclick="abrirPestana('../documento/informeRecepcionpt.php?parametro=<?php echo $IDOP; ?>&&NOMBREUSUARIO=<?php echo $NOMBREUSUARIOS; ?>'); ">
                                                <i class="fa fa-file-pdf-o"></i>
                                            </button>
                                            <button type="button" class="btn btn-rounded  btn-info  " data-toggle="tooltip" title="Tarja" id="defecto" name="tarjas" <?php echo $DISABLEDFOLIO; ?> Onclick="abrirPestana('../documento/informeTarjasRecepcionpt.php?parametro=<?php echo $IDOP; ?>'); ">
                                                <i class="fa fa-file-pdf-o"></i>
                                            </button>

                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="box">

                            <div class="box-header with-border">
                                <h4 class="box-title">Detalle Recepcion </h4>
                            </div>
                            <div class="box-body ">
                                <label id="val_drecepcion" class="validacion "><?php echo $MENSAJE; ?> </label>
                                <div class="row">
                                    <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-9 col-xs-9">
                                        <div class=" table-responsive">
                                            <table id="detalle" class="table table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="text-left">
                                                        <th>Numero Linea</th>
                                                        <th>Folio</th>
                                                        <th class="text-center">Operaciones</th>
                                                        <th>Fecha Cosecha </th>
                                                        <th>Envase/Estandar</th>
                                                        <th>Variedad</th>
                                                        <th>Cantidad Envase</th>
                                                        <th>Kilo Neto </th>
                                                        <th>% Deshidratación </th>
                                                        <th>Kilo Con Deshidratación </th>
                                                        <th>Kilo Bruto </th>
                                                        <th>Gasificacion</th>
                                                        <th>Embolsado</th>
                                                        <th>Tipo Manejo </th>
                                                        <th>Tipo Calibre </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if ($ARRAYDRECEPCION) { ?>
                                                        <?php foreach ($ARRAYDRECEPCION as $s) : ?>
                                                            <?php $CONTADOR = $CONTADOR + 1; ?>
                                                            <?php
                                                            $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($s['ID_VESPECIES']);
                                                            if ($ARRAYVESPECIES) {
                                                                $NOMBREVARIEDAD = $ARRAYVESPECIES[0]['NOMBRE_VESPECIES'];
                                                            } else {
                                                                $NOMBREVARIEDAD = "Sin Datos";
                                                            }
                                                            if ($s['GASIFICADO_DRECEPCION'] == "1") {
                                                                $GASIFICADO = "SI";
                                                            } else if ($s['GASIFICADO_DRECEPCION'] == "0") {
                                                                $GASIFICADO = "NO";
                                                            } else {
                                                                $GASIFICADO = "Sin Datos";
                                                            }
                                                            $ARRAYTCALIBRE = $TCALIBRE_ADO->verCalibre($s['ID_TCALIBRE']);
                                                            if ($ARRAYTCALIBRE) {
                                                                $NOMBRETCALIBRE = $ARRAYTCALIBRE[0]['NOMBRE_TCALIBRE'];
                                                            } else {
                                                                $NOMBRETCALIBRE = "Sin Datos";
                                                            }
                                                            $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($s['ID_TMANEJO']);
                                                            if ($ARRAYTMANEJO) {
                                                                $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                            } else {
                                                                $NOMBRETMANEJO = "Sin Datos";
                                                            }
                                                            $ARRAYESTANDAR = $EEXPORTACION_ADO->verEstandar($s['ID_ESTANDAR']);
                                                            if ($ARRAYESTANDAR) {
                                                                $NOMBREESTANDAR = $ARRAYESTANDAR[0]['NOMBRE_ESTANDAR'];
                                                            } else {
                                                                $NOMBREESTANDAR = "Sin Datos";
                                                            }
                                                            if ($s['EMBOLSADO_DRECEPCION'] == "0") {
                                                                $EMBOLSADO = "NO";
                                                            } else if ($s['EMBOLSADO_DRECEPCION'] == "1") {
                                                                $EMBOLSADO =  "SI";
                                                            } else {
                                                                $EMBOLSADO = "Sin Datos";
                                                            }
                                                            ?>
                                                            <tr class="text-lef">
                                                                <td><?php echo $CONTADOR ?></td>
                                                                <td><?php echo $s['FOLIO_DRECEPCION']; ?></td>
                                                                <td class="text-center">
                                                                    <form method="post" id="form1">
                                                                        <input type="hidden" class="form-control" placeholder="ID DRECEPCIONE" id="IDD" name="IDD" value="<?php echo $s['ID_DRECEPCION']; ?>" />
                                                                        <input type="hidden" class="form-control" placeholder="ID RECEPCIONE" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                                        <input type="hidden" class="form-control" placeholder="OP RECEPCIONE" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                                        <input type="hidden" class="form-control" placeholder="URL RECEPCIONE" id="URLP" name="URLP" value="registroRecepcionpt" />
                                                                        <input type="hidden" class="form-control" placeholder="URL DRECEPCIONE" id="URLD" name="URLD" value="registroDrecepcionpt" />
                                                                        <div class="btn-group btn-rounded btn-block" role="group" aria-label="Operaciones Detalle">
                                                                            <?php if ($ESTADO == "0") { ?>
                                                                                <button type="submit" class="btn btn-rounded btn-info   " id="VERDURL" name="VERDURL" data-toggle="tooltip" title="Ver Detalle Recepción">
                                                                                    <i class="ti-eye"></i>
                                                                                </button>
                                                                            <?php } ?>
                                                                            <?php if ($ESTADO == "1") { ?>
                                                                                <button type="submit" class="btn  btn-rounded   btn-warning  " id="EDITARDURL" name="EDITARDURL" data-toggle="tooltip" title="Editar Detalle Recepción" <?php echo $DISABLED2; ?>>
                                                                                    <i class="ti-pencil-alt"></i>
                                                                                </button>
                                                                                <button type="submit" class="btn btn-rounded  btn-secondary  " id="DUPLICARDURL" name="DUPLICARDURL" data-toggle="tooltip" title="Duplicar Detalle Recepción" <?php echo $DISABLED2; ?>>
                                                                                    <i class="fa fa-fw fa-copy"></i>
                                                                                </button>
                                                                                <button type="submit" class="btn btn-rounded   btn-danger  " id="ELIMINARDURL" name="ELIMINARDURL" data-toggle="tooltip" title="Eliminar Detalle Recepción" <?php echo $DISABLED2; ?>>
                                                                                    <i class="ti-close"></i>
                                                                                </button>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </form>
                                                                </td>
                                                                <td><?php echo $s['EMBALADO']; ?></td>
                                                                <td><?php echo $NOMBREESTANDAR; ?></td>
                                                                <td><?php echo $NOMBREVARIEDAD; ?></td>
                                                                <td><?php echo $s['ENVASE']; ?></td>
                                                                <td><?php echo $s['NETO']; ?></td>
                                                                <td><?php echo $s['PORCENTAJE'] ?></td>
                                                                <td><?php echo $s['DESHIDRATACION']; ?></td>
                                                                <td><?php echo $s['NETO']; ?></td>
                                                                <td><?php echo $GASIFICADO; ?></td>
                                                                <td><?php echo $EMBOLSADO; ?></td>
                                                                <td><?php echo $NOMBRETMANEJO; ?></td>
                                                                <td><?php echo $NOMBRETCALIBRE; ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-3 col-xs-3">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <form method="post" id="form2" name="form2">
                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control" placeholder="ID RECEPCIONPT" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                                <input type="hidden" class="form-control" placeholder="OP RECEPCIONPT" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                                <input type="hidden" class="form-control" placeholder="URL RECEPCIONPT" id="URLP" name="URLP" value="registroRecepcionpt" />
                                                                <input type="hidden" class="form-control" placeholder="URL DRECEPCIONMP" id="URLD" name="URLD" value="registroDrecepcionpt" />
                                                                <button type="submit" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Detalle Recepción" id="CREARDURL" name="CREARDURL" <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?> <?php if ($ESTADO == 0) {
                                                                                                                                                                                                                                                                            echo "disabled style='background-color: #eeeeee;'";
                                                                                                                                                                                                                                                                        } ?>>
                                                                    <i class=" glyphicon glyphicon-plus"></i>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th> Total Envase</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="CANTIDADENVASERECEPCION" id="CANTIDADENVASERECEPCION" value="<?php echo $CANTIDADENVASERECEPCION; ?>" />
                                                        <input type="text" class="form-control" placeholder="Total Envase" id="CANTIDADENVASERECEPCIONv" name="CANTIDADENVASERECEPCIONv" value="<?php echo $CANTIDADENVASERECEPCION2; ?>" disabled />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Total Neto </th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="KILOSNETORECEPCION" id="KILOSNETORECEPCION" value="<?php echo $KILOSNETORECEPCION; ?>" />
                                                        <input type="text" class="form-control" placeholder="Total Neto" id="KILOSNETORECEPCIONV" name="KILOSNETORECEPCIONV" value="<?php echo $KILOSNETORECEPCION2; ?>" disabled />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Total Bruto </th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="KILOSBRUTORECEPCION" id="KILOSBRUTORECEPCION" value="<?php echo $KILOSBRUTORECEPCION; ?>" />
                                                        <input type="text" class="form-control" placeholder="Total Bruto" id="KILOSBRUTORECEPCIONV" name="KILOSBRUTORECEPCIONV" value="<?php echo $KILOSBRUTORECEPCION2; ?>" disabled />
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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
</body>

</html>