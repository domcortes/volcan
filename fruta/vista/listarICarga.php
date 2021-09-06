<?php


include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/ICARGA_ADO.php';
include_once '../controlador/DICARGA_ADO.php';
include_once '../controlador/TCONTENEDOR_ADO.php';
include_once '../controlador/AERONAVE_ADO.php';
include_once '../controlador/NAVE_ADO.php';
include_once '../controlador/DFINAL_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$ICARGA_ADO =  new ICARGA_ADO();
$DICARGA_ADO =  new DICARGA_ADO();

$TCONTENEDOR_ADO =  new TCONTENEDOR_ADO();
$AERONAVE_ADO =  new AERONAVE_ADO();
$NAVE_ADO =  new NAVE_ADO();
$DFINAL_ADO =  new DFINAL_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$TOTALENVASE = "";
$TOTALNETO = "";
$TOTALBRUTO = "";
$TOTALUS   = "";

$FECHADESDE = "";
$FECHAHASTA = "";


//INICIALIZAR ARREGLOS
$ARRAYICARGA = "";
$ARRAYTOTALICARGA = "";

$ARRAYTCONTENEDOR = "";
$ARRAYTVEHICULO = "";
$ARRAYAERONAVE = "";
$ARRAYNAVE = "";
$ARRAYDFINAL = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES


if ($EMPRESAS   && $TEMPORADAS) {

    $ARRAYICARGA = $ICARGA_ADO->listarIcargaEmpresaTemporadaCBX($EMPRESAS,  $TEMPORADAS);
    $ARRAYTOTALICARGA = $ICARGA_ADO->obtenerTotalesEmpresaTemporada($EMPRESAS,  $TEMPORADAS);
    $TOTALENVASE = $ARRAYTOTALICARGA[0]['ENVASE'];
    $TOTALNETO = $ARRAYTOTALICARGA[0]['NETO'];
    $TOTALBRUTO = $ARRAYTOTALICARGA[0]['BRUTO'];
    $TOTALUS = $ARRAYTOTALICARGA[0]['US'];
} 





?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title> Agrupado Instructivo Carga</title>
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
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Agrupado Instructivo Carga</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Logistica</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="listarICarga.php">Agrupado Instructivo Carga </a>
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
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table id="modulo" class="table table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Número </th>
                                                        <th>Estado</th>
                                                        <th class="text-center">Operaciónes </th>
                                                        <th>Estado Instructivo</th>
                                                        <th>Tipo Contenedor</th>
                                                        <th>Contenedor</th>
                                                        <th>Fecha Instructivo</th>
                                                        <th>Fecha ETD</th>
                                                        <th>Fecha ETA</th>
                                                        <th>Días Estimados</th>
                                                        <th>Días Reales </th>
                                                        <th>Destino Final </th>
                                                        <th>Total Envase</th>
                                                        <th>Total Kilos Neto</th>
                                                        <th>Total Kilos Bruto</th>
                                                        <th>Total Precio Us</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYICARGA as $r) : ?>
                                                        <tr class="center">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['NUMERO_ICARGA']; ?>
                                                                </a>
                                                            </td>
                                                            <td <?php if ($r['ESTADO'] == "0") {
                                                                    echo "style='background-color: #FF0000;'";
                                                                }
                                                                if ($r['ESTADO'] == "1") {
                                                                    echo "style='background-color: #4AF575;'";
                                                                }  ?>>
                                                                <?php
                                                                if ($r['ESTADO'] == "0") {
                                                                    echo "Cerrado";
                                                                }
                                                                if ($r['ESTADO'] == "1") {
                                                                    echo "Abierto";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-cog"></i></a>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <?php if ($r['ESTADO'] == "0") { ?>
                                                                                    <button type="button" class="btn btn-rounded btn-sm btn-danger btn-outline mr-1" id="defecto" name="tarjas" Onclick="abrirVentana('../documento/informeIcarga.php?parametro=<?php echo $r['ID_ICARGA']; ?>&&NOMBREUSUARIO=<?php echo $NOMBREUSUARIOS; ?>'); ">
                                                                                        <i class="fa fa-file-pdf-o"></i>
                                                                                    </button>Informe
                                                                                    <br>
                                                                                    <button type="button" class="btn btn-rounded btn-sm btn-danger btn-outline mr-1" id="defecto" name="tarjas" Onclick="abrirVentana('../documento/informeICargaReal.php?parametro=<?php echo $r['ID_ICARGA']; ?>&&NOMBREUSUARIO=<?php echo $NOMBREUSUARIOS; ?>'); ">
                                                                                        <i class="fa fa-file-pdf-o"></i>
                                                                                    </button>Carga Real
                                                                                    <br>
                                                                                <div class="dropdown-divider"></div>
                                                                                <?php } ?>
                                                                                <?php if ($r['ESTADO'] == "1") { ?>
                                                                                    <button type="button" class="btn btn-rounded btn-sm btn-warning btn-outline mr-1" id="defecto" name="editar" Onclick="irPagina('registroICarga.php?parametro=<?php echo $r['ID_ICARGA']; ?>&&parametro1=editar'); ">
                                                                                        <i class="ti-pencil-alt"></i>
                                                                                    </button>Editar
                                                                                    <br>
                                                                                <?php } ?>
                                                                                <?php if ($r['ESTADO'] == "0") { ?>
                                                                                    <button type="button" class="btn btn-rounded btn-sm btn-info btn-outline mr-1" id="defecto" name="ver" Onclick="irPagina('registroICarga.php?parametro=<?php echo $r['ID_ICARGA']; ?>&&parametro1=ver'); ">
                                                                                        <i class="ti-eye"></i>
                                                                                    </button>Ver
                                                                                    <br>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($r['ESTADO_ICARGA'] == "1") {
                                                                    echo "Creado";
                                                                }
                                                                if ($r['ESTADO_ICARGA'] == "2") {
                                                                    echo "Confirmado";
                                                                }
                                                                if ($r['ESTADO_ICARGA'] == "3") {
                                                                    echo "Despachado";
                                                                }
                                                                if ($r['ESTADO_ICARGA'] == "4") {
                                                                    echo "Arrivado";
                                                                }
                                                                if ($r['ESTADO_ICARGA'] == "5") {
                                                                    echo "Cancelado";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($r['ID_TCONTENEDOR']) {
                                                                    $ARRAYTCONTENEDOR = $TCONTENEDOR_ADO->verTcontenedor($r['ID_TCONTENEDOR']);
                                                                    echo $ARRAYTCONTENEDOR[0]['NOMBRE_TCONTENEDOR'];
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td> <?php echo $r['BOLAWBCRT_ICARGA']; ?> </td>
                                                            <td> <?php echo $r['FECHA_ICARGA']; ?> </td>
                                                            <td> <?php echo $r['FECHAETD_ICARGA']; ?> </td>
                                                            <td> <?php echo $r['FECHAETA_ICARGA']; ?> </td>
                                                            <td> <?php echo $r['ESTIMADO']; ?> </td>
                                                            <td> <?php echo $r['REAL']; ?> </td>
                                                            <td>
                                                                <?php
                                                                if ($r['ID_DFINAL']) {
                                                                    $ARRAYDFINAL = $DFINAL_ADO->verDfinal($r['ID_DFINAL']);
                                                                    echo $ARRAYDFINAL[0]['NOMBRE_DFINAL'];
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td> <?php echo $r['TOTAL_ENVASE_ICAGRA']; ?> </td>
                                                            <td> <?php echo $r['TOTAL_NETO_ICARGA'];  ?> </td>
                                                            <td> <?php echo $r['TOTAL_BRUTO_ICARGA'];  ?> </td>
                                                            <td> <?php echo $r['TOTAL_US_ICARGA'];  ?> </td>
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
                                    <div class="col-sm-4">
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

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Total Bruto </label>
                                            <input type="text" class="form-control" placeholder="Total Bruto" id="TOTALBRUTOV" name="TOTALBRUTOV" value="<?php echo $TOTALBRUTO; ?>" disabled />
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Total US </label>
                                            <input type="text" class="form-control" placeholder="Total US" id="TOTALUSV" name="TOTALUSV" value="<?php echo $TOTALUS; ?>" disabled />
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