<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/ESPECIES_ADO.php';
include_once '../controlador/FOLIO_ADO.php';
include_once '../controlador/FOLIO_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';
include_once '../controlador/TCALIBRE_ADO.php';
include_once '../controlador/TEMBALAJE_ADO.php';
include_once '../controlador/TPROCESO_ADO.php';
include_once '../controlador/TREEMBALAJE_ADO.php';
include_once '../controlador/COMPRADOR_ADO.php';
include_once '../controlador/DFINAL_ADO.php';
include_once '../controlador/TCOLOR_ADO.php';
include_once '../controlador/TCATEGORIA_ADO.php';

 


include_once '../controlador/RECEPCIONPT_ADO.php';
include_once '../controlador/REPALETIZAJEEX_ADO.php';
include_once '../controlador/PROCESO_ADO.php';
include_once '../controlador/REEMBALAJE_ADO.php';
include_once '../controlador/DESPACHOPT_ADO.php';
include_once '../controlador/DESPACHOEX_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();

$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();
$TPROCESO_ADO =  new TPROCESO_ADO();
$TREEMBALAJE_ADO =  new TREEMBALAJE_ADO();
$COMPRADOR_ADO =  new COMPRADOR_ADO();
$DFINAL_ADO =  new DFINAL_ADO();
$TCOLOR_ADO =  new TCOLOR_ADO();
$TCATEGORIA_ADO =  new TCATEGORIA_ADO();




$RECEPCIONPT_ADO =  new RECEPCIONPT_ADO();
$REPALETIZAJEEX_ADO =  new REPALETIZAJEEX_ADO();
$DESPACHOPT_ADO =  new DESPACHOPT_ADO();
$DESPACHOEX_ADO =  new DESPACHOEX_ADO();
$PROCESO_ADO =  new PROCESO_ADO();
$REEMBALAJE_ADO =  new REEMBALAJE_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$TOTALNETO = "";
$TOTALENVASE = "";
$TAMAÑO=0;
$CONTADOR=0;


//INICIALIZAR ARREGLOS
$ARRAYEXIEXPORTACION = "";
$ARRAYTOTALEXIEXPORTACION = "";
$ARRAYVEREEXPORTACIONID = "";
$ARRAYVERPRODUCTORID = "";
$ARRAYVERPVESPECIESID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYVERESPECIESID = "";
$ARRAYVERFOLIOID = "";
$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYVERRECEPCIONPT = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES 
if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {

    $ARRAYEXIEXPORTACION = $EXIEXPORTACION_ADO->listarExiexportacionAgrupadoPorFolioEmpresaPlantaTemporadaDespachado($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $ARRAYTOTALEXIEXPORTACION = $EXIEXPORTACION_ADO->obtenerTotalesEmpresaPlantaTemporadaDespachado2($EMPRESAS, $PLANTAS, $TEMPORADAS);

    $TOTALNETO = $ARRAYTOTALEXIEXPORTACION[0]['NETO'];
    $TOTALENVASE = $ARRAYTOTALEXIEXPORTACION[0]['ENVASE'];
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Existencia Producto Terminado</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }
                function abrirPestana(url) {
                    var win = window.open(url, '_blank');
                    win.focus();
                }
                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE RECEPCION
                function abrirVentana(url) {
                    var opciones =
                        "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1000, height=800'";
                    window.open(url, 'window', opciones);
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
            <?php include_once "../config/menu.php"; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Existencia Producto Terminado </h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Existencia</li>
                                            <li class="breadcrumb-item" aria-current="page">Despachado</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Existencia Producto Terminado </a>
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
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table id="existencia" class="table table-hover table-bordered" style="width: 300%;">
                                                <thead>
                                                    <tr class="text-left">
                                                        <th>Folio Original</th>
                                                        <th>Folio Nuevo</th>
                                                        <th>Fecha Embalado </th>
                                                        <th>Estado </th>
                                                        <th>Condición </th>
                                                        <th>Código Estandar</th>
                                                        <th>Envase/Estandar</th>
                                                        <th>Tipo Calibre </th>
                                                        <th>CSG</th>
                                                        <th>Productor</th>
                                                        <th>Especies</th>
                                                        <th>Variedad</th>
                                                        <th>Cantidad Envase</th>
                                                        <th>Total Envase</th>
                                                        <th>Kilos Neto</th>
                                                        <th>% Deshidratacion</th>
                                                        <th>Kilos Deshidratacion</th>
                                                        <th>Kilos Bruto</th>
                                                        <th>Número Recepción </th>
                                                        <th>Fecha Recepción </th>
                                                        <th>Tipo Recepción </th>
                                                        <th>CSG/CSP Recepción</th>
                                                        <th>Origen Recepción </th>
                                                        <th>Número Guía Recepción </th>
                                                        <th>Fecha Guía Recepción
                                                        <th>Número Repaletizaje </th>
                                                        <th>Fecha Repaletizaje </th>
                                                        <th>Número Proceso </th>
                                                        <th>Fecha Proceso </th>
                                                        <th>Tipo Proceso </th>
                                                        <th>Número Reembalaje </th>
                                                        <th>Fecha Reembalaje </th>
                                                        <th>Tipo Reembalaje </th>
                                                        <th>Número Despacho </th>
                                                        <th>Fecha Despacho </th>
                                                        <th>Número Guía Despacho </th>
                                                        <th>Tipo Despacho </th>
                                                        <th>CSG/CSP Despacho</th>
                                                        <th>Destino Despacho</th>
                                                        <th>Tipo Manejo</th>
                                                        <th>Tipo Calibre </th>
                                                        <th>Tipo Embalaje </th>
                                                        <th>Stock</th>
                                                        <th>Embolsado</th>
                                                        <th>Gasificacion</th>
                                                        <th>Prefrío</th>
                                                        <th>Tipo Categoria </th>
                                                        <th>Tipo Color </th>      
                                                        <th>Días</th>
                                                        <th>Ingreso</th>
                                                        <th>Modificación</th>
                                                        <th>Empresa</th>
                                                        <th>Planta</th>
                                                        <th>Temporada</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYEXIEXPORTACION as $s) : ?>

                                                        <?php $ARRAYEXISTENCIA=$EXIEXPORTACION_ADO->listarExiexportacionEmpresaPlantaTemporadaPorFolioDespachado($EMPRESAS, $PLANTAS, $TEMPORADAS,$s['FOLIO_AUXILIAR_EXIEXPORTACION'] );  ?>                                                                                                                    
                                                        <?php foreach ($ARRAYEXISTENCIA as $r) : ?>
                                                            <?php  $CONTADOR+=1;   ?>
                                                            <?php
                                                            if ($r['ESTADO'] == "0") {
                                                                $ESTADO = "Elimnado";
                                                            }
                                                            if ($r['ESTADO'] == "1") {
                                                                $ESTADO = "Ingresando";
                                                            }
                                                            if ($r['ESTADO'] == "2") {
                                                                $ESTADO = "Disponible";
                                                            }
                                                            if ($r['ESTADO'] == "3") {
                                                                $ESTADO = "En Repaletizaje";
                                                            }
                                                            if ($r['ESTADO'] == "4") {
                                                                $ESTADO = "Repaletizado";
                                                            }
                                                            if ($r['ESTADO'] == "5") {
                                                                $ESTADO = "En Reembalaje";
                                                            }
                                                            if ($r['ESTADO'] == "6") {
                                                                $ESTADO = "Reembalaje";
                                                            }
                                                            if ($r['ESTADO'] == "7") {
                                                                $ESTADO = "En Despacho";
                                                            }
                                                            if ($r['ESTADO'] == "8") {
                                                                $ESTADO = "Despachado";
                                                            }
                                                            if ($r['ESTADO'] == "9") {
                                                                $ESTADO = "En Transito";
                                                            }
                                                            if ($r['ESTADO'] == "10") {
                                                                $ESTADO = "En Inpeccion Sag";
                                                            }
                                                            if ($r['ESTADO'] == "11") {
                                                                $ESTADO = "Rechazado";
                                                            }
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
                                                                $ESTADOSAG =  "Aprobado USDA";
                                                            }
                                                            if ($r['TESTADOSAG'] == "4") {
                                                                $ESTADOSAG =  "Fumigado";
                                                            }
                                                            if ($r['TESTADOSAG'] == "5") {
                                                                $ESTADOSAG =  "Rechazado";
                                                            }
                                                            $ARRAYRECEPCION = $RECEPCIONPT_ADO->verRecepcion2($r['ID_RECEPCION']);
                                                            if ($ARRAYRECEPCION) {
                                                                $NUMERORECEPCION = $ARRAYRECEPCION[0]["NUMERO_RECEPCION"];
                                                                $FECHARECEPCION = $ARRAYRECEPCION[0]["FECHA"];
                                                                $NUMEROGUIARECEPCION = $ARRAYRECEPCION[0]["NUMERO_GUIA_RECEPCION"];
                                                                $FECHAGUIARECEPCION = $ARRAYRECEPCION[0]["GUIA"];
                                                                if ($ARRAYRECEPCION[0]["TRECEPCION"] == 1) {
                                                                    $TIPORECEPCION = "Desde Productor";
                                                                    $ARRAYPRODUCTOR2 = $PRODUCTOR_ADO->verProductor($ARRAYRECEPCION[0]['ID_PRODUCTOR']);
                                                                    if ($ARRAYPRODUCTOR2) {
                                                                        $CSGCSPORIGEN=$ARRAYPRODUCTOR2[0]['CSG_PRODUCTOR'];
                                                                        $ORIGEN =  $ARRAYPRODUCTOR2[0]['NOMBRE_PRODUCTOR'];
                                                                    } else {
                                                                        $ORIGEN = "Sin Datos";
                                                                        $CSGCSPORIGEN="Sin Datos";
                                                                    }
                                                                }
                                                                if ($ARRAYRECEPCION[0]["TRECEPCION"] == 2) {
                                                                    $TIPORECEPCION = "Planta Externa";
                                                                    $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($ARRAYRECEPCION[0]['ID_PLANTA2']);
                                                                    if ($ARRAYPLANTA2) {
                                                                        $ORIGEN = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
                                                                        $CSGCSPORIGEN=$ARRAYPLANTA2[0]['CODIGO_SAG_PLANTA'];
                                                                    } else {
                                                                        $ORIGEN = "Sin Datos";
                                                                        $CSGCSPORIGEN="Sin Datos";
                                                                    }
                                                                }
                                                            } else {
                                                                $NUMERORECEPCION = "Sin Datos";
                                                                $FECHARECEPCION = "Sin Datos";
                                                                $NUMEROGUIARECEPCION = "Sin Datos";
                                                                $FECHAGUIARECEPCION = "Sin Datos";
                                                                $TIPORECEPCION = "Sin Datos";
                                                                $ORIGEN = "Sin Datos";
                                                                $CSGCSPORIGEN = "Sin Datos";
                                                            }
                                                            $ARRAYPROCESO = $PROCESO_ADO->verProceso2($r['ID_PROCESO']);
                                                            if ($ARRAYPROCESO) {
                                                                $NUMEROPROCESO = $ARRAYPROCESO[0]["NUMERO_PROCESO"];
                                                                $FECHAPROCESO = $ARRAYPROCESO[0]["FECHA"];
                                                                $ARRAYTPROCESO = $TPROCESO_ADO->verTproceso($ARRAYPROCESO[0]["ID_TPROCESO"]);
                                                                if ($ARRAYTPROCESO) {
                                                                    $TPROCESO = $ARRAYTPROCESO[0]["NOMBRE_TPROCESO"];
                                                                }
                                                            } else {
                                                                $NUMEROPROCESO = "Sin datos";
                                                                $FECHAPROCESO = "Sin datos";
                                                                $TPROCESO = "Sin datos";
                                                            }
                                                            $ARRAYREEMBALAJE = $REEMBALAJE_ADO->verReembalaje2($r['ID_REEMBALAJE']);
                                                            if ($ARRAYREEMBALAJE) {
                                                                $NUMEROREEMBALEJE = $ARRAYREEMBALAJE[0]["ID_TREEMBALAJE"];
                                                                $FECHAREEMBALEJE = $ARRAYREEMBALAJE[0]["FECHA"];
                                                                $ARRAYTREEMBALAJE = $TREEMBALAJE_ADO->verTreembalaje($ARRAYREEMBALAJE[0]["ID_TREEMBALAJE"]);
                                                                if ($ARRAYTREEMBALAJE) {
                                                                    $TREEMBALAJE = $ARRAYTREEMBALAJE[0]["NOMBRE_TREEMBALAJE"];
                                                                }
                                                            } else {
                                                                $NUMEROREEMBALEJE = "Sin datos";
                                                                $FECHAREEMBALEJE = "Sin datos";
                                                                $TREEMBALAJE = "Sin datos";
                                                            }

                                                            $ARRATREPALETIZAJE = $REPALETIZAJEEX_ADO->verRepaletizaje2($r['ID_REPALETIZAJE']);
                                                            if ($ARRATREPALETIZAJE) {
                                                                $FECHAREPALETIZAJE = $ARRATREPALETIZAJE[0]["INGRESO"];
                                                                $NUMEROREPALETIZAJE = $ARRATREPALETIZAJE[0]["NUMERO_REPALETIZAJE"];
                                                            } else {
                                                                $NUMEROREPALETIZAJE = "Sin Datos";
                                                                $FECHAREPALETIZAJE = "Sin Datos";
                                                            }

                                                            $ARRAYVERDESPACHOPT = $DESPACHOPT_ADO->verDespachopt2($r['ID_DESPACHO']);
                                                            $ARRYADESPACHOEX = $DESPACHOEX_ADO->verDespachoex2($r['ID_DESPACHOEX']);
                                                            if ($ARRAYVERDESPACHOPT) {
                                                                $NUMERODESPACHO = $ARRAYVERDESPACHOPT[0]["NUMERO_DESPACHO"];
                                                                $FECHADESPACHO = $ARRAYVERDESPACHOPT[0]["FECHA"];

                                                                if ($ARRAYVERDESPACHOPT[0]['TDESPACHO'] == "1") {
                                                                    $TDESPACHO = "Interplanta";
                                                                    $NUMEROGUIADESPACHO = $ARRAYVERDESPACHOPT[0]["NUMERO_GUIA_DESPACHO"];
                                                                    $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($ARRAYVERDESPACHOPT[0]['ID_PLANTA2']);
                                                                    if ($ARRAYPLANTA2) {
                                                                        $DESTINO = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
                                                                        $CSGCSPDESTINO=$ARRAYPLANTA2[0]['CODIGO_SAG_PLANTA'];
                                                                    } else {
                                                                        $DESTINO = "Sin Datos";
                                                                        $CSGCSPDESTINO="Sin Datos";
                                                                    }
                                                                }
                                                                if ($ARRAYVERDESPACHOPT[0]['TDESPACHO'] == "2") {
                                                                    $TDESPACHO = "Devolución Productor";
                                                                    $NUMEROGUIADESPACHO = $ARRAYVERDESPACHOPT[0]["NUMERO_GUIA_DESPACHO"];
                                                                    $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($ARRAYVERDESPACHOPT[0]['ID_PRODUCTOR']);
                                                                    if ($ARRAYPRODUCTOR) {
                                                                        $CSGCSPDESTINO=$ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'];
                                                                        $DESTINO =  $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
                                                                    } else {
                                                                        $DESTINO = "Sin Datos";
                                                                        $CSGCSPDESTINO="Sin Datos";
                                                                    }
                                                                }
                                                                if ($ARRAYVERDESPACHOPT[0]['TDESPACHO'] == "3") {
                                                                    $TDESPACHO = "Venta";
                                                                    $NUMEROGUIADESPACHO = $ARRAYVERDESPACHOPT[0]["NUMERO_GUIA_DESPACHO"];
                                                                    $ARRAYCOMPRADOR = $COMPRADOR_ADO->verComprador($ARRAYVERDESPACHOPT[0]['ID_COMPRADOR']);
                                                                    if ($ARRAYCOMPRADOR) {
                                                                        $DESTINO = $ARRAYCOMPRADOR[0]['NOMBRE_COMPRADOR'];
                                                                        $CSGCSPDESTINO="No Aplica";
                                                                    } else {
                                                                        $DESTINO = "Sin Datos";
                                                                        $CSGCSPDESTINO="Sin Datos";
                                                                    }
                                                                }
                                                                if ($ARRAYVERDESPACHOPT[0]['TDESPACHO'] == "4") {
                                                                    $TDESPACHO = "Despacho de Decarte";
                                                                    $NUMEROGUIADESPACHO = "No Aplica";
                                                                    $CSGCSPDESTINO="No Aplica";
                                                                    $DESTINO = $ARRAYVERDESPACHOPT[0]['REGALO_DESPACHO'];
                                                                }
                                                                if ($ARRAYVERDESPACHOPT[0]['TDESPACHO'] == "5") {
                                                                    $TDESPACHO = "Planta Externa";
                                                                    $NUMEROGUIADESPACHO = $ARRAYVERDESPACHOPT[0]["NUMERO_GUIA_DESPACHO"];
                                                                    $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($ARRAYVERDESPACHOPT[0]['ID_PLANTA3']);
                                                                    if ($ARRAYPLANTA2) {
                                                                        $DESTINO = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
                                                                        $CSGCSPDESTINO=$ARRAYPLANTA2[0]['CODIGO_SAG_PLANTA'];
                                                                    } else {
                                                                        $DESTINO = "Sin Datos";
                                                                        $CSGCSPDESTINO="Sin Datos";
                                                                    }
                                                                }
                                                            } else if ($ARRYADESPACHOEX) {
                                                                $TDESPACHO = "Exportación";
                                                                $CSGCSPDESTINO="No Aplica";
                                                                $NUMERODESPACHO = $ARRYADESPACHOEX[0]["NUMERO_DESPACHOEX"];
                                                                $NUMEROGUIADESPACHO = $ARRYADESPACHOEX[0]["NUMERO_GUIA_DESPACHOEX"];
                                                                $FECHADESPACHO = $ARRYADESPACHOEX[0]["FECHA"];
                                                                $ARRAYDFINAL = $DFINAL_ADO->verDfinal($ARRYADESPACHOEX[0]['ID_DFINAL']);
                                                                if ($ARRAYDFINAL) {
                                                                    $DESTINO = $ARRAYDFINAL[0]['NOMBRE_DFINAL'];
                                                                } else {
                                                                    $DESTINO = "Sin Datos";
                                                                }
                                                            } else {
                                                                $DESTINO = "Sin datos";
                                                                $TDESPACHO = "Sin datos";
                                                                $FECHADESPACHO = "Sin Datos";
                                                                $NUMERODESPACHO = "Sin Datos";
                                                                $NUMEROGUIADESPACHO = "Sin Datos";
                                                                $CSGCSPDESTINO="Sin Datos";
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
                                                            $ARRAYTEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($r['ID_TEMBALAJE']);
                                                            if ($ARRAYTEMBALAJE) {
                                                                $NOMBRETEMBALAJE = $ARRAYTEMBALAJE[0]['NOMBRE_TEMBALAJE'];
                                                            } else {
                                                                $NOMBRETEMBALAJE = "Sin Datos";
                                                            }
                                                            $ARRAYTCATEGORIA=$TCATEGORIA_ADO->verTcategoria($r['ID_TCATEGORIA']);
                                                            if($ARRAYTCATEGORIA){
                                                            $NOMBRETCATEGORIA= $ARRAYTCATEGORIA[0]["NOMBRE_TCATEGORIA"];
                                                            }else{
                                                                $NOMBRETCATEGORIA = "Sin Datos";
                                                            }   
                                                            $ARRAYTCOLOR=$TCOLOR_ADO->verTcolor($r['ID_TCOLOR']);
                                                            if($ARRAYTCOLOR){
                                                                $NOMBRETCOLOR= $ARRAYTCOLOR[0]["NOMBRE_TCOLOR"];
                                                            }else{
                                                                $NOMBRETCOLOR = "Sin Datos";
                                                            } 
                                                            $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                            if ($ARRAYEMPRESA) {
                                                                $NOMBREEMPRESA = $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
                                                            } else {
                                                                $NOMBREEMPRESA = "Sin Datos";
                                                            }
                                                            $ARRAYPLANTA = $PLANTA_ADO->verPlanta($r['ID_PLANTA']);
                                                            if ($ARRAYPLANTA) {
                                                                $NOMBREPLANTA = $ARRAYPLANTA[0]['NOMBRE_PLANTA'];
                                                            } else {
                                                                $NOMBREPLANTA = "Sin Datos";
                                                            }
                                                            $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($r['ID_TEMPORADA']);
                                                            if ($ARRAYTEMPORADA) {
                                                                $NOMBRETEMPORADA = $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
                                                            } else {
                                                                $NOMBRETEMPORADA = "Sin Datos";
                                                            }

                                                            if ($r['STOCK'] != "") {
                                                                $STOCK = $r['STOCK'];
                                                            } else if ($r['STOCK'] == "") {
                                                                $STOCK = "Sin Datos";
                                                            } else {
                                                                $STOCK = "Sin Datos";
                                                            }
                                                            if ($r['EMBOLSADO'] == "1") {
                                                                $EMBOLSADO =  "SI";
                                                            }
                                                            if ($r['EMBOLSADO'] == "0") {
                                                                $EMBOLSADO =  "NO";
                                                            }
                                                            if ($r['GASIFICADO'] == "1") {
                                                                $GASIFICADO = "SI";
                                                            } else if ($r['GASIFICADO'] == "0") {
                                                                $GASIFICADO = "NO";
                                                            } else {
                                                                $GASIFICADO = "Sin Datos";
                                                            }
                                                            if ($r['PREFRIO'] == "0") {
                                                                $PREFRIO = "NO";
                                                            } else if ($r['PREFRIO'] == "1") {
                                                                $PREFRIO =  "SI";
                                                            } else {
                                                                $PREFRIO = "Sin Datos";
                                                            }
                                                            ?>
                                                            <tr class="text-left">
                                                                <td><?php echo $r['FOLIO_EXIEXPORTACION']; ?> </td>
                                                                <td>
                                                                    <?php echo $r['FOLIO_AUXILIAR_EXIEXPORTACION']; ?>
                                                                    <!--
                                                                    <a Onclick="abrirPestana('../documento/informeTarjasPT.php?parametro=<?php echo $r['FOLIO_AUXILIAR_EXIEXPORTACION']; ?>&&parametro1=<?php echo $EMPRESAS; ?>');">                                                                        
                                                                    </a>-->
                                                                </td>
                                                                <td><?php echo $r['EMBALADO']; ?></td>
                                                                <td><?php echo $ESTADO; ?></td>
                                                                <td><?php echo $ESTADOSAG; ?></td>
                                                                <td><?php echo $CODIGOESTANDAR; ?></td>
                                                                <td><?php echo $NOMBREESTANDAR; ?></td>
                                                                <td><?php echo $NOMBRETCALIBRE; ?></td>
                                                                <td><?php echo $CSGPRODUCTOR; ?></td>
                                                                <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                                <td><?php echo $NOMBRESPECIES; ?></td>
                                                                <td><?php echo $NOMBREVESPECIES; ?></td>
                                                                <td><?php echo $r['ENVASE']; ?></td>
                                                                <th><?php echo $s['ENVASE']; ?></th>
                                                                <td><?php echo $r['NETO']; ?></td>
                                                                <td><?php echo $r['PORCENTAJE']; ?></td>
                                                                <td><?php echo $r['DESHIRATACION']; ?></td>
                                                                <td><?php echo $r['BRUTO']; ?></td>
                                                                <td><?php echo $NUMERORECEPCION; ?></td>
                                                                <td><?php echo $FECHARECEPCION; ?></td>
                                                                <td><?php echo $TIPORECEPCION; ?></td>
                                                                <td><?php echo $CSGCSPORIGEN; ?></td>
                                                                <td><?php echo $ORIGEN; ?></td>
                                                                <td><?php echo $NUMEROGUIARECEPCION; ?></td>
                                                                <td><?php echo $FECHAGUIARECEPCION; ?></td>
                                                                <td><?php echo $NUMEROREPALETIZAJE; ?></td>
                                                                <td><?php echo $FECHAREPALETIZAJE; ?></td>
                                                                <td><?php echo $NUMEROPROCESO; ?></td>
                                                                <td><?php echo $FECHAPROCESO; ?></td>
                                                                <td><?php echo $TPROCESO; ?></td>
                                                                <td><?php echo $NUMEROREEMBALEJE; ?></td>
                                                                <td><?php echo $FECHAREEMBALEJE; ?></td>
                                                                <td><?php echo $TREEMBALAJE; ?></td>
                                                                <td><?php echo $NUMERODESPACHO; ?></td>
                                                                <td><?php echo $FECHADESPACHO; ?></td>
                                                                <td><?php echo $NUMEROGUIADESPACHO; ?></td>
                                                                <td><?php echo $TDESPACHO; ?></td>
                                                                <td><?php echo $CSGCSPDESTINO; ?></td>
                                                                <td><?php echo $DESTINO; ?></td>
                                                                <td><?php echo $NOMBRETMANEJO; ?></td>
                                                                <td><?php echo $NOMBRETCALIBRE; ?></td>
                                                                <td><?php echo $NOMBRETEMBALAJE; ?></td>
                                                                <td><?php echo $STOCK; ?></td>
                                                                <td><?php echo $EMBOLSADO; ?></td>
                                                                <td><?php echo $GASIFICADO; ?></td>
                                                                <td><?php echo $PREFRIO; ?></td>
                                                                <td><?php echo $NOMBRETCATEGORIA; ?></td>
                                                                <td><?php echo $NOMBRETCOLOR; ?></td>
                                                                <td><?php echo $r['DIAS']; ?></td>
                                                                <td><?php echo $r['INGRESO']; ?></td>
                                                                <td><?php echo $r['MODIFICACION']; ?></td>
                                                                <td><?php echo $NOMBREEMPRESA; ?></td>
                                                                <td><?php echo $NOMBREPLANTA; ?></td>
                                                                <td><?php echo $NOMBRETEMPORADA; ?></td>
                                                            </tr>                                                       
                                                        <?php endforeach; ?>        
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Datos generales">
                                    <div class="form-row align-items-center" role="group" aria-label="Datos">
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Envase</div>
                                                    <!-- input -->
                                                    <input type="text" class="form-control" placeholder="Total Envase" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALENVASE; ?>" disabled />
                                                    <!-- /input -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Neto</div>
                                                    <!-- input -->
                                                    <input type="text" class="form-control" placeholder="Total Envase" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALNETO; ?>" disabled />
                                                    <!-- /input -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box -->
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