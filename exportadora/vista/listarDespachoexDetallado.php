<?php

include_once "../../assest/config/validarUsuarioExpo.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/TEMBALAJE_ADO.php';


include_once '../../assest/controlador/CONDUCTOR_ADO.php';
include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/COMPRADOR_ADO.php';


include_once '../../assest/controlador/TPROCESO_ADO.php';
include_once '../../assest/controlador/TREEMBALAJE_ADO.php';
include_once '../../assest/controlador/PROCESO_ADO.php';
include_once '../../assest/controlador/REEMBALAJE_ADO.php';


include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/EINDUSTRIAL_ADO.php';
include_once '../../assest/controlador/ERECEPCION_ADO.php';

include_once '../../assest/controlador/EXIMATERIAPRIMA_ADO.php';
include_once '../../assest/controlador/RECEPCIONMP_ADO.php';
include_once '../../assest/controlador/DESPACHOMP_ADO.php';
include_once '../../assest/controlador/EXIINDUSTRIAL_ADO.php';
include_once '../../assest/controlador/RECEPCIONIND_ADO.php';
include_once '../../assest/controlador/DESPACHOIND_ADO.php';
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';
include_once '../../assest/controlador/RECEPCIONPT_ADO.php';
include_once '../../assest/controlador/DESPACHOPT_ADO.php';
include_once '../../assest/controlador/DESPACHOEX_ADO.php';
include_once '../../assest/controlador/REPALETIZAJEEX_ADO.php';



include_once '../../assest/controlador/ICARGA_ADO.php';
include_once '../../assest/controlador/DFINAL_ADO.php';
include_once '../../assest/controlador/RFINAL_ADO.php';
include_once '../../assest/controlador/MERCADO_ADO.php';

include_once '../../assest/controlador/LDESTINO_ADO.php';
include_once '../../assest/controlador/ADESTINO_ADO.php';
include_once '../../assest/controlador/PDESTINO_ADO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$ESPECIES_ADO =  new ESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();


$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$COMPRADOR_ADO =  new COMPRADOR_ADO();


$TPROCESO_ADO =  new TPROCESO_ADO();
$TREEMBALAJE_ADO =  new TREEMBALAJE_ADO();
$PROCESO_ADO =  new PROCESO_ADO();
$REEMBALAJE_ADO =  new REEMBALAJE_ADO();

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$EINDUSTRIAL_ADO =  new EINDUSTRIAL_ADO();
$ERECEPCION_ADO =  new ERECEPCION_ADO();


$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();
$RECEPCIONMP_ADO =  new RECEPCIONMP_ADO();
$DESPACHOMP_ADO =  new DESPACHOMP_ADO();
$EXIINDUSTRIAL_ADO =  new EXIINDUSTRIAL_ADO();
$RECEPCIONIND_ADO =  new RECEPCIONIND_ADO();
$DESPACHOIND_ADO =  new DESPACHOIND_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$RECEPCIONPT_ADO =  new RECEPCIONPT_ADO();
$DESPACHOPT_ADO =  new DESPACHOPT_ADO();
$DESPACHOEX_ADO =  new DESPACHOEX_ADO();
$REPALETIZAJEEX_ADO =  new REPALETIZAJEEX_ADO();


$ICARGA_ADO =  new ICARGA_ADO();
$DFINAL_ADO =  new DFINAL_ADO();
$RFINAL_ADO =  new RFINAL_ADO();
$MERCADO_ADO =  new MERCADO_ADO();
$LDESTINO_ADO =  new LDESTINO_ADO();
$ADESTINO_ADO =  new ADESTINO_ADO();
$PDESTINO_ADO =  new PDESTINO_ADO();
//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD


$TOTALBRUTO = 0;
$TOTALNETO = 0;
$TOTALENVASE = 0;
$FECHADESDE = "";
$FECHAHASTA = "";

$PRODUCTOR = "";
$NUMEROGUIA = "";

//INICIALIZAR ARREGLOS
$ARRAYDESPACHOPT = "";
$ARRAYDESPACHOPTTOTALES = "";
$ARRAYVEREMPRESA = "";
$ARRAYVERPRODUCTOR = "";
$ARRAYVERTRANSPORTE = "";
$ARRAYVERCONDUCTOR = "";
$ARRAYMGUIAPT = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES



if ($EMPRESAS  &&  $TEMPORADAS) {
    
    $ARRAYDESPACHOEX = $DESPACHOEX_ADO->listarDespachoexEmpresaTemporadaCBX($EMPRESAS,  $TEMPORADAS);
    $ARRAYDESPACHOEXTOTALES = $DESPACHOEX_ADO->obtenerTotalesDespachoexEmpresaTemporadaCBX($EMPRESAS, $TEMPORADAS);
    $TOTALNETOEX = $ARRAYDESPACHOEXTOTALES[0]['NETO'];
    $TOTALBRUTOEX = $ARRAYDESPACHOEXTOTALES[0]['BRUTO'];
    $TOTALENVASEEX = $ARRAYDESPACHOEXTOTALES[0]['ENVASE'];

    $TOTALNETO  = number_format($TOTALNETOEX  , 2, ",", ".");
    $TOTALBRUTO = number_format( $TOTALBRUTOEX , 2, ",", ".");
    $TOTALENVASE  = number_format($TOTALENVASEEX  , 2, ",", ".");
}






?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Detallado Despacho EXPO</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
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
                /*
                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }*/

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
            </script>
</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" onload="mueveReloj()">
    <div class="wrapper">
        <?php include_once "../../assest/config/menuExpo.php"; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">Producto Terminado </h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Informe</li>
                                        <li class="breadcrumb-item" aria-current="page">Despacho</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Detallado Despacho Expo </a>
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
                                        <table id="detallado" class=" table-hover   " style="width: 100%;">
                                            <thead>
                                                <tr class="text-left">
                                                    <th>N° Folio </th>
                                                    <th>Fecha Embalado </th>
                                                    <th>Tipo Producto</th>
                                                    <th>Condición </th>
                                                    <th>Código Estandar</th>
                                                    <th>Envase/Estandar</th>
                                                    <th>CSG</th>
                                                    <th>Productor</th>
                                                    <th>Especies</th>
                                                    <th>Variedad</th>
                                                    <th>Cantidad Envase</th>
                                                    <th>Kilos Neto</th>
                                                    <th>% Deshidratacion</th>
                                                    <th>Kilos Deshidratacion</th>
                                                    <th>Kilos Bruto</th>
                                                    <th>Número Recepción </th>
                                                    <th>Fecha Recepción </th>
                                                    <th>Tipo Recepción </th>
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
                                                    <th>Destino </th>
                                                    <th>Número Referencia </th>
                                                    <th>Fecha Corte Documental </th>
                                                    <th>Fecha ETD </th>
                                                    <th>Fecha ETA</th>
                                                    <th>Recibidor Final</th>
                                                    <th>Mercado</th>
                                                    <th>Tipo Embarque</th>
                                                    <th>Nave</th>
                                                    <th>Número Viaje/Vuelo</th>
                                                    <th>Puerto/Aeropuerto/Lugar Destino</th>
                                                    <th>Tipo Manejo</th>
                                                    <th>Tipo Calibre </th>
                                                    <th>Tipo Embalaje </th>
                                                    <th>Stock</th>
                                                    <th>Embolsado</th>
                                                    <th>Gasificacion</th>
                                                    <th>Prefrío</th>
                                                    <th>Transporte </th>
                                                    <th>Nombre Conductor </th>
                                                    <th>Patente Camión </th>
                                                    <th>Patente Carro </th>
                                                    <th>Empresa</th>
                                                    <th>Planta</th>
                                                    <th>Temporada</th>
                                                    <th>N° Folio Original</th>
                                                    <th>% Exportación Proceso</th>
                                                    <th>% Industrial Proceso</th>
                                                    <th>Total Procesado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYDESPACHOEX as $r) : ?>
                                                    <?php
                                                    $ARRAYVERTRANSPORTE = $TRANSPORTE_ADO->verTransporte($r['ID_TRANSPORTE']);
                                                    if ($ARRAYVERTRANSPORTE) {
                                                        $NOMBRETRANSPORTE = $ARRAYVERTRANSPORTE[0]['NOMBRE_TRANSPORTE'];
                                                    } else {
                                                        $NOMBRETRANSPORTE = "Sin Datos";
                                                    }
                                                    $ARRAYVERCONDUCTOR = $CONDUCTOR_ADO->verConductor($r['ID_CONDUCTOR']);
                                                    if ($ARRAYVERCONDUCTOR) {

                                                        $NOMBRECONDUCTOR = $ARRAYVERCONDUCTOR[0]['NOMBRE_CONDUCTOR'];
                                                    } else {
                                                        $NOMBRECONDUCTOR = "Sin Datos";
                                                    }

                                                    $ARRAYDFINAL = $DFINAL_ADO->verDfinal($r['ID_DFINAL']);
                                                    if ($ARRAYDFINAL) {
                                                        $DESTINO = $ARRAYDFINAL[0]['NOMBRE_DFINAL'];
                                                    } else {
                                                        $DESTINO = "Sin Datos";
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
                                                    $ARRAYICARGA=$ICARGA_ADO->verIcarga($r["ID_ICARGA"]);
                                                    if($ARRAYICARGA){
                                                        $NUMEROREFERENCIA=$ARRAYICARGA[0]['NREFERENCIA_ICARGA'];
                                                        $FECHAETD=$ARRAYICARGA[0]['FECHAETD_ICARGA'];
                                                        $FECHAETA=$ARRAYICARGA[0]['FECHAETA_ICARGA'];
                                                        $FECHACDOCUMENTAL=$ARRAYICARGA[0]['FECHA_CDOCUMENTAL_ICARGA'];
                                                        if ($ARRAYICARGA[0]['TEMBARQUE_ICARGA'] == "1") {
                                                            $TEMBARQUE = "Terrestre";
                                                            $NVIAJE="No Aplica";
                                                            $NAVE="No Aplica";  
                                                            $ARRAYLDESTINO =$LDESTINO_ADO->verLdestino( $ARRAYICARGA[0]['ID_LDESTINO']);     
                                                            if($ARRAYLDESTINO){
                                                              $NOMBREDESTINO=$ARRAYLDESTINO[0]["NOMBRE_LDESTINO"];
                                                            }else{
                                                              $NOMBREDESTINO="Sin Datos";
                                                            }
                                                        }
                                                        if ($ARRAYICARGA[0]['TEMBARQUE_ICARGA'] == "2") {
                                                            $TEMBARQUE = "Aereo";
                                                            $NAVE=$ARRAYICARGA[0]['NAVE_ICARGA'];
                                                            $NVIAJE = $ARRAYICARGA[0]['NVIAJE_ICARGA'];
                                                            $ARRAYADESTINO =$ADESTINO_ADO->verAdestino( $ARRAYICARGA[0]['ID_ADESTINO']);  
                                                            if($ARRAYADESTINO){
                                                              $NOMBREDESTINO=$ARRAYADESTINO[0]["NOMBRE_ADESTINO"];
                                                            }else{
                                                              $NOMBREDESTINO="Sin Datos";
                                                            }
                                                        }
                                                        if ($ARRAYICARGA[0]['TEMBARQUE_ICARGA'] == "3") {
                                                            $TEMBARQUE = "Maritimo";
                                                            $NAVE  = $ARRAYICARGA[0]['NAVE_ICARGA'];
                                                            $NVIAJE = $ARRAYICARGA[0]['NVIAJE_ICARGA'];
                                                            $ARRAYPDESTINO =$PDESTINO_ADO->verPdestino( $ARRAYICARGA[0]['ID_PDESTINO']);
                                                            if($ARRAYPDESTINO){
                                                              $NOMBREDESTINO=$ARRAYPDESTINO[0]["NOMBRE_PDESTINO"];
                                                            }else{
                                                              $NOMBREDESTINO="Sin Datos";
                                                            }
                                                        }
                                                        $ARRAYMERCADO=$MERCADO_ADO->verMercado($ARRAYICARGA[0]["ID_MERCADO"]);
                                                        if($ARRAYMERCADO){
                                                            $NOMBREMERCADO=$ARRAYMERCADO[0]["NOMBRE_MERCADO"];
                                                        }else{
                                                            $NOMBREMERCADO="Sin Datos";
                                                        }
                                                        $ARRAYRFINAL=$RFINAL_ADO->verRfinal($ARRAYICARGA[0]["ID_RFINAL"]);
                                                        if($ARRAYRFINAL){
                                                            $NOMBRERFINAL=$ARRAYRFINAL[0]["NOMBRE_RFINAL"];
                                                        }else{
                                                            $NOMBRERFINAL="Sin Datos";
                                                        }
                                                    }else{
                                                        $NUMEROREFERENCIA="No Aplica";
                                                        $FECHAETD=$r['FECHAETD_DESPACHOEX'];
                                                        $FECHAETA=$r['FECHAETA_DESPACHOEX'];
                                                        $FECHACDOCUMENTAL="";
                                                        if ($r['TEMBARQUE_DESPACHOEX'] == "1") {
                                                            $TEMBARQUE = "Terrestre";
                                                            $NVIAJE="No Aplica";
                                                            $NAVE="No Aplica";  
                                                            $ARRAYLDESTINO =$LDESTINO_ADO->verLdestino( $r['ID_LDESTINO']);     
                                                            if($ARRAYLDESTINO){
                                                              $NOMBREDESTINO=$ARRAYLDESTINO[0]["NOMBRE_LDESTINO"];
                                                            }else{
                                                              $NOMBREDESTINO="Sin Datos";
                                                            }
                                                        }
                                                        if ($r['TEMBARQUE_DESPACHOEX'] == "2") {
                                                            $TEMBARQUE = "Aereo";
                                                            $NAVE=$r['NAVE_DESPACHOEX'];
                                                            $NVIAJE = $r['NVIAJE_DESPACHOEX'];
                                                            $ARRAYADESTINO =$ADESTINO_ADO->verAdestino( $r['ID_ADESTINO']);  
                                                            if($ARRAYADESTINO){
                                                              $NOMBREDESTINO=$ARRAYADESTINO[0]["NOMBRE_ADESTINO"];
                                                            }else{
                                                              $NOMBREDESTINO="Sin Datos";
                                                            }
                                                        }
                                                        if ($r['TEMBARQUE_DESPACHOEX'] == "3") {
                                                            $TEMBARQUE = "Maritimo";
                                                            $NAVE  = $r['NAVE_DESPACHOEX'];
                                                            $NVIAJE = $r['NVIAJE_DESPACHOEX'];
                                                            $ARRAYPDESTINO =$PDESTINO_ADO->verPdestino( $r['ID_PDESTINO']);
                                                            if($ARRAYPDESTINO){
                                                              $NOMBREDESTINO=$ARRAYPDESTINO[0]["NOMBRE_PDESTINO"];
                                                            }else{
                                                              $NOMBREDESTINO="Sin Datos";
                                                            }
                                                        }
                                                        $ARRAYMERCADO=$MERCADO_ADO->verMercado($r["ID_MERCADO"]);
                                                        if($ARRAYMERCADO){
                                                            $NOMBREMERCADO=$ARRAYMERCADO[0]["NOMBRE_MERCADO"];
                                                        }else{
                                                            $NOMBREMERCADO="Sin Datos";
                                                        }
                                                        $ARRAYRFINAL=$RFINAL_ADO->verRfinal($r["ID_RFINAL"]);
                                                        if($ARRAYRFINAL){
                                                            $NOMBRERFINAL=$ARRAYRFINAL[0]["NOMBRE_RFINAL"];
                                                        }else{
                                                            $NOMBRERFINAL="Sin Datos";
                                                        }
                                                    }



                                                    $ARRAYTOMADOEX = $EXIEXPORTACION_ADO->buscarPordespachoEx($r['ID_DESPACHOEX']);

                                                    ?>

                                                    <?php foreach ($ARRAYTOMADOEX as $s) : ?>
                                                        <?php
                                                        if ($s['TESTADOSAG'] == null || $s['TESTADOSAG'] == "0") {
                                                            $ESTADOSAG = "Sin Condición";
                                                        }
                                                        if ($s['TESTADOSAG'] == "1") {
                                                            $ESTADOSAG =  "En Inspección";
                                                        }
                                                        if ($s['TESTADOSAG'] == "2") {
                                                            $ESTADOSAG =  "Aprobado Origen";
                                                        }
                                                        if ($s['TESTADOSAG'] == "3") {
                                                            $ESTADOSAG =  "Aprobado USLA";
                                                        }
                                                        if ($s['TESTADOSAG'] == "4") {
                                                            $ESTADOSAG =  "Fumigado";
                                                        }
                                                        if ($s['TESTADOSAG'] == "5") {
                                                            $ESTADOSAG =  "Rechazado";
                                                        }
                                                        $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($s['ID_PRODUCTOR']);
                                                        if ($ARRAYVERPRODUCTORID) {
                                                            $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                            $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                        } else {
                                                            $CSGPRODUCTOR = "Sin Datos";
                                                            $NOMBREPRODUCTOR = "Sin Datos";
                                                        }
                                                        $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($s['ID_VESPECIES']);
                                                        if ($ARRAYVERVESPECIESID) {
                                                            $NOMBREVARIEDAD = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                            $ARRAYVERESPECIESID = $ESPECIES_ADO->verEspecies($ARRAYVERVESPECIESID[0]['ID_ESPECIES']);
                                                            if ($ARRAYVERVESPECIESID) {
                                                                $NOMBRESPECIES = $ARRAYVERESPECIESID[0]['NOMBRE_ESPECIES'];
                                                            } else {
                                                                $NOMBRESPECIES = "Sin Datos";
                                                            }
                                                        } else {
                                                            $NOMBREVARIEDAD = "Sin Datos";
                                                            $NOMBRESPECIES = "Sin Datos";
                                                        }
                                                        $ARRAYEVERERECEPCIONID = $EEXPORTACION_ADO->verEstandar($s['ID_ESTANDAR']);
                                                        if ($ARRAYEVERERECEPCIONID) {
                                                            $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
                                                            $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                        } else {
                                                            $NOMBREESTANDAR = "Sin Datos";
                                                            $CODIGOESTANDAR = "Sin Datos";
                                                        }
                                                        $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($s['ID_TMANEJO']);
                                                        if ($ARRAYTMANEJO) {
                                                            $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                        } else {
                                                            $NOMBRETMANEJO = "Sin Datos";
                                                        }
                                                        $ARRAYTCALIBRE = $TCALIBRE_ADO->verCalibre($s['ID_TCALIBRE']);
                                                        if ($ARRAYTCALIBRE) {
                                                            $NOMBRETCALIBRE = $ARRAYTCALIBRE[0]['NOMBRE_TCALIBRE'];
                                                        } else {
                                                            $NOMBRETCALIBRE = "Sin Datos";
                                                        }
                                                        $ARRAYTEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($s['ID_TEMBALAJE']);
                                                        if ($ARRAYTEMBALAJE) {
                                                            $NOMBRETEMBALAJE = $ARRAYTEMBALAJE[0]['NOMBRE_TEMBALAJE'];
                                                        } else {
                                                            $NOMBRETEMBALAJE = "Sin Datos";
                                                        }                                                           
                                                        if ($s['EMBOLSADO'] == "1") {
                                                            $EMBOLSADO =  "SI";
                                                        }
                                                        if ($s['EMBOLSADO'] == "0") {
                                                            $EMBOLSADO =  "NO";
                                                        }                                                                                                        
                                                        if ($s['STOCK'] != "") {
                                                            $STOCK = $s['STOCK'] ;
                                                        } else if ($s['STOCK'] == "") {
                                                            $STOCK = "Sin Datos";
                                                        } else {
                                                            $STOCK = "Sin Datos";
                                                        }                                            
                                                        if ($s['GASIFICADO'] == "1") {
                                                            $GASIFICADO = "SI";
                                                        } else if ($s['GASIFICADO'] == "0") {
                                                            $GASIFICADO = "NO";
                                                        } else {
                                                            $GASIFICADO = "Sin Datos";
                                                        }                                                   
                                                        if ($s['PREFRIO'] == "0") {
                                                            $PREFRIO = "NO";
                                                        } else if ($s['PREFRIO'] == "1") {
                                                            $PREFRIO =  "SI";
                                                        } else {
                                                            $PREFRIO = "Sin Datos";
                                                        } 

                                                        $ARRAYRECEPCION = $RECEPCIONPT_ADO->verRecepcion2($s['ID_RECEPCION']);
                                                        if ($ARRAYRECEPCION) {
                                                            $NUMERORECEPCION = $ARRAYRECEPCION[0]["NUMERO_RECEPCION"];
                                                            $FECHARECEPCION = $ARRAYRECEPCION[0]["FECHA"];
                                                            $NUMEROGUIARECEPCION = $ARRAYRECEPCION[0]["NUMERO_GUIA_RECEPCION"];
                                                            $FECHAGUIARECEPCION = $ARRAYRECEPCION[0]["GUIA"];
                                                            if ($ARRAYRECEPCION[0]["TRECEPCION"] == 1) {
                                                                $TIPORECEPCION = "Desde Productor";
                                                            }
                                                            if ($ARRAYRECEPCION[0]["TRECEPCION"] == 2) {
                                                                $TIPORECEPCION = "Planta Externa";
                                                            }
                                                        } else {
                                                            $NUMERORECEPCION = "Sin Datos";
                                                            $FECHARECEPCION = "";
                                                            $NUMEROGUIARECEPCION = "Sin Datos";
                                                            $FECHAGUIARECEPCION = "";
                                                            $TIPORECEPCION = "Sin Datos";
                                                        }
                                                        $ARRAYPROCESO = $PROCESO_ADO->verProceso2($s['ID_PROCESO']);
                                                        if ($ARRAYPROCESO) {
                                                            $NUMEROPROCESO = $ARRAYPROCESO[0]["NUMERO_PROCESO"];
                                                            $FECHAPROCESO = $ARRAYPROCESO[0]["FECHA"];
                                                            $PORCENTAJEEXPO = number_format($ARRAYPROCESO[0]["PDEXPORTACION_PROCESO"], 2);
                                                            $PORCENTAJEINDUSTRIAL = number_format($ARRAYPROCESO[0]["PDINDUSTRIAL_PROCESO"], 2);
                                                            $PORCENTAJETOTAL = number_format($ARRAYPROCESO[0]["PORCENTAJE_PROCESO"], 2);
                                                            $ARRAYTPROCESO = $TPROCESO_ADO->verTproceso($ARRAYPROCESO[0]["ID_TPROCESO"]);
                                                            if ($ARRAYTPROCESO) {
                                                                $TPROCESO = $ARRAYTPROCESO[0]["NOMBRE_TPROCESO"];
                                                            }
                                                        } else {
                                                            $NUMEROPROCESO = "Sin datos";
                                                            $FECHAPROCESO = "";
                                                            $PORCENTAJEEXPO = "Sin datos";
                                                            $PORCENTAJEINDUSTRIAL = "Sin datos";
                                                            $PORCENTAJETOTAL = "Sin datos";
                                                            $TPROCESO = "Sin datos";
                                                        }
                                                        $ARRAYREEMBALAJE = $REEMBALAJE_ADO->verReembalaje2($s['ID_REEMBALAJE']);
                                                        if ($ARRAYREEMBALAJE) {
                                                            $NUMEROREEMBALEJE = $ARRAYREEMBALAJE[0]["ID_TREEMBALAJE"];
                                                            $FECHAREEMBALEJE = $ARRAYREEMBALAJE[0]["FECHA"];
                                                            $ARRAYTREEMBALAJE = $TREEMBALAJE_ADO->verTreembalaje($ARRAYREEMBALAJE[0]["ID_TREEMBALAJE"]);
                                                            if ($ARRAYTREEMBALAJE) {
                                                                $TREEMBALAJE = $ARRAYTREEMBALAJE[0]["NOMBRE_TREEMBALAJE"];
                                                            }
                                                        } else {
                                                            $NUMEROREEMBALEJE = "Sin datos";
                                                            $FECHAREEMBALEJE = "";
                                                            $TREEMBALAJE = "Sin datos";
                                                        }

                                                        $ARRATREPALETIZAJE = $REPALETIZAJEEX_ADO->verRepaletizaje2($s['ID_REPALETIZAJE']);
                                                        if ($ARRATREPALETIZAJE) {
                                                            $FECHAREPALETIZAJE = $ARRATREPALETIZAJE[0]["INGRESO"];
                                                            $NUMEROREPALETIZAJE = $ARRATREPALETIZAJE[0]["NUMERO_REPALETIZAJE"];
                                                        } else {
                                                            $NUMEROREPALETIZAJE = "Sin Datos";
                                                            $FECHAREPALETIZAJE = "";
                                                        }
                                                        ?>
                                                        <tr class="text-left">
                                                            <td><?php echo $s['FOLIO_AUXILIAR_EXIEXPORTACION']; ?> </td>
                                                            <td><?php echo $s['EMBALADO']; ?></td>
                                                            <td><?php echo "Producto Terminado"; ?> </td>
                                                            <td><?php echo $ESTADOSAG; ?></td>
                                                            <td><?php echo $CODIGOESTANDAR; ?></td>
                                                            <td><?php echo $NOMBREESTANDAR; ?></td>
                                                            <td><?php echo $CSGPRODUCTOR; ?></td>
                                                            <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                            <td><?php echo $NOMBRESPECIES; ?></td>
                                                            <td><?php echo $NOMBREVARIEDAD; ?></td>
                                                            <td><?php echo $s['ENVASE']; ?></td>
                                                            <td><?php echo $s['NETO']; ?></td>
                                                            <td><?php echo $s['PORCENTAJE']; ?></td>
                                                            <td><?php echo $s['DESHIRATACION']; ?></td>
                                                            <td><?php echo $s['BRUTO']; ?></td>
                                                            <td><?php echo $NUMERORECEPCION; ?></td>
                                                            <td><?php echo $FECHARECEPCION; ?></td>
                                                            <td><?php echo $TIPORECEPCION; ?></td>
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
                                                            <td><?php echo $r['NUMERO_DESPACHOEX']; ?></td>
                                                            <td><?php echo $r['FECHA']; ?></td>
                                                            <td><?php echo $r['NUMERO_GUIA_DESPACHOEX']; ?></td>
                                                            <td><?php echo "Exportación"; ?></td>
                                                            <td><?php echo $DESTINO; ?></td>

                                                            <td><?php echo $NUMEROREFERENCIA; ?></td>
                                                            <td><?php echo $FECHACDOCUMENTAL; ?></td>
                                                            <td><?php echo $FECHAETD; ?></td>
                                                            <td><?php echo $FECHAETA; ?></td>
                                                            <td><?php echo $NOMBRERFINAL; ?></td>
                                                            <td><?php echo $NOMBREMERCADO; ?></td>
                                                            <td><?php echo $TEMBARQUE; ?></td>
                                                            <td><?php echo $NAVE; ?></td>
                                                            <td><?php echo $NVIAJE; ?></td>
                                                            <td><?php echo $NOMBREDESTINO; ?></td>

                                                            <td><?php echo $NOMBRETMANEJO; ?></td>
                                                            <td><?php echo $NOMBRETCALIBRE; ?></td>
                                                            <td><?php echo $NOMBRETEMBALAJE; ?></td>
                                                            <td><?php echo $STOCK; ?></td>
                                                            <td><?php echo $EMBOLSADO; ?></td>
                                                            <td><?php echo $GASIFICADO; ?></td>
                                                            <td><?php echo $PREFRIO; ?></td>
                                                            <td><?php echo $NOMBRETRANSPORTE; ?></td>
                                                            <td><?php echo $NOMBRECONDUCTOR; ?></td>  
                                                            <td><?php echo $r['PATENTE_CAMION']; ?></td>
                                                            <td><?php echo $r['PATENTE_CARRO']; ?></td>
                                                            <td><?php echo $NOMBREEMPRESA; ?></td>
                                                            <td><?php echo $NOMBREPLANTA; ?></td>
                                                            <td><?php echo $NOMBRETEMPORADA; ?></td>
                                                            <td><?php echo $s['FOLIO_EXIEXPORTACION']; ?> </td>
                                                            <td><?php echo $PORCENTAJEEXPO; ?></td>
                                                            <td><?php echo $PORCENTAJEINDUSTRIAL; ?></td>
                                                            <td><?php echo $PORCENTAJETOTAL; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
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
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Bruto</div>
                                                    <!-- input -->
                                                    <input type="text" class="form-control" placeholder="Total Bruto" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALBRUTO; ?>" disabled />
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

        <?php include_once "../../assest/config/footer.php"; ?>
        <?php include_once "../../assest/config/menuExtraExpo.php"; ?>
    </div>
    <?php include_once "../../assest/config/urlBase.php"; ?>
</body>

</html>