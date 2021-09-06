<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/USUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';

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


include_once '../controlador/RECEPCIONPT_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();

$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();


$RECEPCIONPT_ADO =  new RECEPCIONPT_ADO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$TOTALNETO = "";
$TOTALENVASE = "";


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

    $ARRAYEXIEXPORTACION = $EXIEXPORTACION_ADO->listarExiexportacionEmpresaPlantaTemporadaDisponible2($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $ARRAYTOTALEXIEXPORTACION = $EXIEXPORTACION_ADO->obtenerTotalesEmpresaPlantaTemporadaDisponible2($EMPRESAS, $PLANTAS, $TEMPORADAS);

    $TOTALNETO = $ARRAYTOTALEXIEXPORTACION[0]['NETO'];
    $TOTALENVASE = $ARRAYTOTALEXIEXPORTACION[0]['ENVASE'];
} else {
    $ARRAYEXIEXPORTACION = $EXIEXPORTACION_ADO->listarExiexportacionDisponible2();
    $ARRAYTOTALEXIEXPORTACION = $EXIEXPORTACION_ADO->obtenerTotalesDisponible2();

    $TOTALNETO = $ARRAYTOTALEXIEXPORTACION[0]['NETO'];
    $TOTALENVASE = $ARRAYTOTALEXIEXPORTACION[0]['ENVASE'];
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Listar Producto Terminado</title>
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
                                <h3 class="page-title">Producto Terminado </h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Frigorifico</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="listarExiexportacionFrigorifico.php"> Listar Existencia Producto Terminado </a>
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
                                    <div class="col-sm-10">
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label> Exportar </label>
                                            <button type="button" class="btn btn-danger btn-outline btn-circle btn-sm" id="defecto" name="informe" title="Exportar PDF" Onclick="abrirVentana('../documento/informeExistenciaPT.php?NOMBREUSUARIO=<?php echo $NOMBREUSUARIOS; ?>&&EMPRESA=<?php echo $EMPRESAS; ?>&&PLANTA=<?php echo $PLANTAS; ?>&&TEMPORADA=<?php echo $TEMPORADAS; ?> '); ">
                                                <i class="fa fa-file-pdf-o"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label> </label>
                                            <button type="button" class="btn btn-success btn-outline btn-circle  btn-sm " id="defecto" name="reporte" title="Exportar Excel" Onclick="abrirVentana('../reporte/reporteExistenciaPt.php?EMPRESA=<?php echo $EMPRESAS; ?>&&PLANTA=<?php echo $PLANTAS; ?>&&TEMPORADA=<?php echo $TEMPORADAS; ?> '); ">
                                                <i class="fa fa-file-excel-o"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table id="existencia" class="table table-hover " style="width: 300%;">
                                                <thead>
                                                    <tr class="text-left">
                                                        <th>Folio </th>
                                                        <th>Número Recepción </th>
                                                        <th>Número Guía </th>
                                                        <th>Fecha Embalado </th>
                                                        <th>Código Estandar </th>
                                                        <th>Envase/Estandar </th>
                                                        <th>CSG Productor </th>
                                                        <th>Nombre Productor </th>
                                                        <th>Especies </th>
                                                        <th>Variedad </th>
                                                        <th>Calibre </th>
                                                        <th>Condición </th>
                                                        <th>Cantidad Envase</th>
                                                        <th>Kilos Neto</th>
                                                        <th>Kilos Deshidratacion</th>
                                                        <th>Días </th>
                                                        <th>Tipo Manejo</th>
                                                        <th>Embalaje </th>
                                                        <th>Stock</th>
                                                        <th>Fecha Ingreso </th>
                                                        <th>Fecha Modificación </th>
                                                        <th>Empresa</th>
                                                        <th>Planta</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYEXIEXPORTACION as $r) : ?>
                                                        <tr class="text-left">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['FOLIO_AUXILIAR_EXIEXPORTACION']; ?>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $ARRAYVERRECEPCIONPT = $RECEPCIONPT_ADO->verRecepcionpt($r['ID_RECEPCIONPT']);
                                                                if ($ARRAYVERRECEPCIONPT) {
                                                                    echo $ARRAYVERRECEPCIONPT[0]['NUMERO_RECEPCIONPT'];
                                                                } else {
                                                                    echo "Sin datos";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($ARRAYVERRECEPCIONPT) {
                                                                    echo $ARRAYVERRECEPCIONPT[0]['NUMERO_GUIA_RECEPCIONPT'];
                                                                } else {
                                                                    echo "Sin datos";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?php echo $r['EMBALADO']; ?></td>
                                                            <td>
                                                                <?php
                                                                $ARRAYVEREEXPORTACIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                                echo $ARRAYVEREEXPORTACIONID[0]['CODIGO_ESTANDAR'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                echo $ARRAYVEREEXPORTACIONID[0]['NOMBRE_ESTANDAR'];
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
                                                                $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
                                                                $ARRAYVERESPECIESID = $ESPECIES_ADO->verEspecies($ARRAYVERVESPECIESID[0]['ID_ESPECIES']);
                                                                echo $ARRAYVERESPECIESID[0]['NOMBRE_ESPECIES'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                echo $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $ARRAYCALIBRE = $TCALIBRE_ADO->verCalibre($r['ID_CALIBRE']);
                                                                if ($ARRAYCALIBRE) {
                                                                    echo $ARRAYCALIBRE[0]['NOMBRE_CALIBRE'];
                                                                } else {
                                                                    echo "Sin Calibre";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($r['TESTADOSAG'] == null || $r['TESTADOSAG'] == "0") {
                                                                    echo "Sin Condición";
                                                                }
                                                                if ($r['TESTADOSAG'] == "1") {
                                                                    echo "En Inspección";
                                                                }
                                                                if ($r['TESTADOSAG'] == "2") {
                                                                    echo "Aprobado Origen";
                                                                }
                                                                if ($r['TESTADOSAG'] == "3") {
                                                                    echo "Aprobado USLA";
                                                                }
                                                                if ($r['TESTADOSAG'] == "4") {
                                                                    echo "Fumigado";
                                                                }
                                                                if ($r['TESTADOSAG'] == "5") {
                                                                    echo "Rechazado";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?php echo $r['ENVASE']; ?></td>
                                                            <td><?php echo $r['NETO']; ?></td>
                                                            <td><?php echo $r['DESHIRATACION']; ?></td>
                                                            <td><?php echo $r['DIAS']; ?></td>
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
                                                                $ARRAYEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($r['ID_EMBALAJE']);
                                                                if ($ARRAYEMBALAJE) {
                                                                    echo $ARRAYEMBALAJE[0]['NOMBRE_EMBALAJE'];
                                                                } else {
                                                                    echo "Sin Embalaje";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($r['STOCK']) {
                                                                    echo $r['STOCK'];
                                                                } else {
                                                                    echo "Sin Stock";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?php echo $r['INGRESO']; ?></td>
                                                            <td><?php echo $r['MODIFICACION']; ?></td>
                                                            <td>
                                                                <?php
                                                                $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                                echo $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $ARRAYPLANTA = $PLANTA_ADO->verPlanta($r['ID_PLANTA']);
                                                                echo $ARRAYPLANTA[0]['NOMBRE_PLANTA'];
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Total Envase </label>
                                            <input type="text" class="form-control" placeholder="Total Envase" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALENVASE; ?>" disabled />
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Total Neto </label>
                                            <input type="text" class="form-control" placeholder="Total Neto" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALNETO; ?>" disabled />
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