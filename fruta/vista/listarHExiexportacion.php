<?php


include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/ESPECIES_ADO.php';
include_once '../controlador/FOLIO_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';


include_once '../controlador/RECEPCIONPT_ADO.php';
include_once '../controlador/REPALETIZAJEEX_ADO.php';
include_once '../controlador/DESPACHOPT_ADO.php';
//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();

$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();



$RECEPCIONPT_ADO =  new RECEPCIONPT_ADO();
$REPALETIZAJEEX_ADO =  new REPALETIZAJEEX_ADO();
$DESPACHOPT_ADO =  new DESPACHOPT_ADO();
//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD




//INICIALIZAR ARREGLOS
$ARRAYEXIEXPORTACION = "";
$ARRAYVEREEXPORTACIONID = "";
$ARRAYVERPRODUCTORID = "";
$ARRAYVERPVESPECIESID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYVERESPECIESID = "";
$ARRAYVERFOLIOID = "";
$ARRAYTESTADOSAG = "";
$ARRAYTMANEJO = "";
$ARRAYVERRECEPCIONPT = "";
$ARRAYVERREPALETIZAJEEX = "";
$ARRAYVERDESPACHOPT="";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYEXIEXPORTACION = $EXIEXPORTACION_ADO->listarExiexportacionCBX();

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
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Existencia</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="listarHExiexportacion.php"> Listar Existencia Producto Terminado </a>
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
                                <h4 class="box-title"> Registros</h4>

                            </div>
                            <div class="box-body">
                                <form class="form" role="form" method="post" name="form_filtro_dato" onsubmit="return validacionFiltro()">
                                    <div class="row">

                                    </div>
                                </form>
                                <div class="table-responsive">
                                    <table id="hexistencia" class="table table-hover " style="width: 150%;">
                                        <thead>
                                            <tr class="text-left">
                                                <th>Folio Original</th>
                                                <th>Folio Actual</th>
                                                <th>Estado</th>
                                                <th>Número Recepción </th>
                                                <th>Número Guía </th>
                                                <th>Número Repaletizaje </th>
                                                <th>Fecha Embalado </th>
                                                <th>Código Estandar </th>
                                                <th>Envase/Estandar </th>
                                                <th>CSG Productor </th>
                                                <th>Nombre Productor </th>
                                                <th>Especies </th>
                                                <th>Variedad </th>
                                                <th>Condicion </th>
                                                <th>Cantidad Envase</th>
                                                <th>Kilos Neto</th>
                                                <th>Kilos Bruto</th>
                                                <th>Kilos Deshidratacion</th>
                                                <th>Dias </th>
                                                <th>Tipo Manejo</th>
                                                <th>Stock</th>
                                                <th>Fecha Ingreso </th>
                                                <th>Fecha Modificacion </th>
                                                <th>Empresa</th>
                                                <th>Planta</th>
                                                <th>Temporada</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($ARRAYEXIEXPORTACION as $r) : ?>
                                                <tr class="text-left">
                                                    <td>
                                                        <a href="#" class="text-warning hover-warning">
                                                            <?php echo $r['FOLIO_EXIEXPORTACION']; ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="text-warning hover-warning">
                                                            <?php echo $r['FOLIO_AUXILIAR_EXIEXPORTACION']; ?>
                                                        </a>
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
                                                        if ($r['ESTADO'] == "9") {
                                                            echo "En Transito";
                                                        }
                                                        if ($r['ESTADO'] == "10") {
                                                            echo "En Inpeccion Sag";
                                                        }
                                                        if ($r['ESTADO'] == "11") {
                                                            echo "Rechazado";
                                                        }

                                                        ?>
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
                                                    <td>
                                                        <?php
                                                        $ARRAYVERREPALETIZAJEEX = $REPALETIZAJEEX_ADO->verRepaletizaje($r['ID_REPALETIZAJE']);
                                                        if ($ARRAYVERREPALETIZAJEEX) {
                                                            echo $ARRAYVERREPALETIZAJEEX[0]['NUMERO_REPALETIZAJE'];
                                                        } else {
                                                            echo "Sin datos";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $r['FECHA_EMBALADO_EXIEXPORTACION']; ?></td>
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
                                                    <td><?php echo $r['CANTIDAD_ENVASE_EXIEXPORTACION']; ?></td>
                                                    <td><?php echo $r['KILOS_NETO_EXIEXPORTACION']; ?></td>
                                                    <td><?php echo $r['KILOS_BRUTO_EXIEXPORTACION']; ?></td>
                                                    <td><?php echo $r['KILOS_DESHIRATACION_EXIEXPORTACION']; ?></td>
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
                                                        if ($r['STOCK']) {
                                                            echo $r['STOCK'];
                                                        } else {
                                                            echo "Sin Stock";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $r['FECHA_INGRESO_EXIEXPORTACION']; ?></td>
                                                    <td><?php echo $r['FECHA_MODIFICACION_EXIEXPORTACION']; ?></td>
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
                                                    <td>
                                                        <?php
                                                        $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($r['ID_TEMPORADA']);
                                                        echo $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="text-left" id="filtro">
                                                <th>Folio Original</th>
                                                <th>Folio Actual</th>
                                                <th>Estado</th>
                                                <th>Número Recepción </th>
                                                <th>Número Guía </th>
                                                <th>Número Repaletizaje </th>
                                                <th>Fecha Embalado </th>
                                                <th>Código Estandar </th>
                                                <th>Envase/Estandar </th>
                                                <th>CSG Productor </th>
                                                <th>Nombre Productor </th>
                                                <th>Especies </th>
                                                <th>Variedad </th>
                                                <th>Condicion </th>
                                                <th>Cantidad Envase</th>
                                                <th>Kilos Neto</th>
                                                <th>Kilos Bruto</th>
                                                <th>Kilos Deshidratacion</th>
                                                <th>Dias </th>
                                                <th>Tipo Manejo</th>
                                                <th>Stock</th>
                                                <th>Fecha Ingreso </th>
                                                <th>Fecha Modificacion </th>
                                                <th>Empresa</th>
                                                <th>Planta</th>
                                                <th>Temporada</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="box-footer">
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