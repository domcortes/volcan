<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';

include_once '../controlador/TINPSAG_ADO.php';
include_once '../controlador/INPSAG_ADO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();


$VESPECIES_ADO =  new VESPECIES_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$EXIEXPORTACION_ADO = new EXIEXPORTACION_ADO();


$TINPSAG_ADO =  new TINPSAG_ADO();
$INPSAG_ADO =  new INPSAG_ADO();



//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD


$TOTALBRUTO = "";
$TOTALNETO = "";
$TOTALENVASE = "";
$FECHADESDE = "";
$FECHAHASTA = "";

$DISABLEDC="";
$DISABLEDT="";
$PRODUCTOR = "";
$NUMEROGUIA = "";

//INICIALIZAR ARREGLOS
$ARRAYDESPACHOEX = "";
$ARRAYDESPACHOEXTOTALES = "";
$ARRAYVEREMPRESA = "";
$ARRAYVERPRODUCTOR = "";
$ARRAYTINPSAG = "";
$ARRAYTESTADOSAG = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES


if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {


    $ARRAYDESPACHOEX = $INPSAG_ADO->listarInpsagPlantaTemporadaCBX( $PLANTAS, $TEMPORADAS);
    $ARRAYDESPACHOEXTOTALES = $INPSAG_ADO->obtenerTotalesInpsaPlantaTemporadagCBX2($PLANTAS, $TEMPORADAS);

    $TOTALBRUTO = $ARRAYDESPACHOEXTOTALES[0]['BRUTO'];
    $TOTALNETO = $ARRAYDESPACHOEXTOTALES[0]['NETO'];
    $TOTALENVASE = $ARRAYDESPACHOEXTOTALES[0]['ENVASE'];
}
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrLP.php";







?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agrupado Inspección</title>
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
                /*
                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }*/

                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE RECEPCION
                function abrirVentana(url) {
                    var opciones =
                        "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1000, height=800'";
                    window.open(url, 'window', opciones);
                }

                function abrirPestana(url) {
                    var win = window.open(url, '_blank');
                    win.focus();
                }
            </script>
</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" onload="mueveReloj()">
    <div class="wrapper">
        <?php include_once "../config/menu.php"; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">Inspección SAG</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Operaciones SAG</li>
                                            <li class="breadcrumb-item" aria-current="page">Inspección SAG</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Agrupado Inspección </a>
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
                                        <table id="modulo" class="table table-hover " style="width: 100%;">
                                            <thead>
                                                <tr class="text-left">
                                                    <th>Numero </th>
                                                    <th>Estado</th>
                                                    <th class="text-center">Operaciónes</th>
                                                    <th>Fecha Inspección </th>
                                                    <th>Tipo Inspección </th>
                                                    <th>Condicción </th>
                                                    <th>Valor CIF </th>
                                                    <th>Cantidad Envase</th>
                                                    <th>Total Kilos Neto</th>
                                                    <th>Total Kilos Bruto</th>
                                                    <th>Fecha Ingreso</th>
                                                    <th>Fecha Modificación</th>
                                                    <th>Planta</th>
                                                    <th>Temporada</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYDESPACHOEX as $r) : ?>
                                                    <?php

                                                    $ARRAYTINPSAG = $TINPSAG_ADO->verTinpsag($r['ID_TINPSAG']);
                                                    if ($ARRAYTINPSAG) {
                                                        $NOMBRETINPSAG = $ARRAYTINPSAG[0]['NOMBRE_TINPSAG'];
                                                    } else {
                                                        $NOMBRETINPSAG = "Sin Datos";
                                                    }
                                                    if ($r['TESTADOSAG'] == null || $r['TESTADOSAG'] == "0") {
                                                        $TESTADOSAG = "Sin Condición";
                                                    }
                                                    if ($r['TESTADOSAG'] == "1") {
                                                        $TESTADOSAG = "En Inspección";
                                                    }
                                                    if ($r['TESTADOSAG'] == "2") {
                                                        $TESTADOSAG = "Aprobado Origen";
                                                    }
                                                    if ($r['TESTADOSAG'] == "3") {
                                                        $TESTADOSAG = "Aprobado USDA";
                                                    }
                                                    if ($r['TESTADOSAG'] == "4") {
                                                        $TESTADOSAG = "Fumigado";
                                                    }
                                                    if ($r['TESTADOSAG'] == "5") {
                                                        $TESTADOSAG = "Rechazado";
                                                    }                                                    
                                                    if( strlen($r['CORRELATIVO_INPSAG'])==0){
                                                        $DISABLEDC="disabled";
                                                    }else{
                                                        $DISABLEDC="";
                                                    }
                                                    $ARRAYTOMADO = $EXIEXPORTACION_ADO->buscarPorSag2($r['ID_INPSAG']);
                                                    if(empty($ARRAYTOMADO)){
                                                        $DISABLEDT="disabled";
                                                    }else{
                                                        $DISABLEDT="";
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
                                                    ?>

                                                    <tr class="text-left">
                                                        <td> <?php echo $r['NUMERO_INPSAG']; ?></td>
                                                        <td>
                                                            <?php if ($r['ESTADO'] == "0") { ?>
                                                                <button type="button" class="btn btn-block btn-danger">Cerrado</button>
                                                            <?php  }  ?>
                                                            <?php if ($r['ESTADO'] == "1") { ?>
                                                                <button type="button" class="btn btn-block btn-success">Abierto</button>
                                                            <?php  }  ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <form method="post" id="form1">
                                                                <div class="list-icons d-inline-flex">
                                                                    <div class="list-icons-item dropdown">
                                                                        <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="glyphicon glyphicon-cog"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <button class="dropdown-menu" aria-labelledby="dropdownMenuButton"></button>
                                                                            <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_INPSAG']; ?>" />
                                                                            <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroInpsag" />
                                                                            <input type="hidden" class="form-control" placeholder="URL" id="URLO" name="URLO" value="listarInpSag" />
                                                                            <?php if ($r['ESTADO'] == "0") { ?>
                                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Ver">
                                                                                    <button type="submit" class="btn btn-info btn-block " id="VERURL" name="VERURL">
                                                                                        <i class="ti-eye"></i> Ver
                                                                                    </button>
                                                                                </span>
                                                                            <?php } ?>
                                                                            <?php if ($r['ESTADO'] == "1") { ?>
                                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Editar">
                                                                                    <button type="submit" class="btn  btn-warning btn-block" id="EDITARURL" name="EDITARURL">
                                                                                        <i class="ti-pencil-alt"></i> Editar
                                                                                    </button>
                                                                                </span>
                                                                            <?php } ?>
                                                                            <hr>
                                                                            <span href="#" class="dropdown-item" data-toggle="tooltip" title="Informe">
                                                                                <button type="button" class="btn  btn-danger  btn-block" id="defecto" name="informe" title="Informe" Onclick="abrirPestana('../documento/informeInpsag.php?parametro=<?php echo $r['ID_INPSAG']; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                                                    <i class="fa fa-file-pdf-o"></i> Informe
                                                                                </button>
                                                                            </span>
                                                                            <span href="#" class="dropdown-item" data-toggle="tooltip" title="Informe">
                                                                                <button type="button" class="btn  btn-danger  btn-block" id="defecto" name="informe"  title=" S.I.F" Onclick="abrirPestana('../documento/informeInpsagSif.php?parametro=<?php echo $r['ID_INPSAG']; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                                                    <i class="fa fa-file-pdf-o"></i> S.I.F
                                                                                </button>
                                                                            </span>
                                                                            <span href="#" class="dropdown-item" data-toggle="tooltip" title="Packing List">
                                                                                <button type="button" class="btn  btn-danger btn-block" id="defecto" name="tarjas" title="Packing List" Onclick="abrirPestana('../documento/informeInpsagPackingList.php?parametro=<?php echo $r['ID_INPSAG']; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                                                    <i class="fa fa-file-pdf-o"></i>Packing List
                                                                                </button>
                                                                            </span>
                                                                            <span href="#" class="dropdown-item" data-toggle="tooltip" title="CSV">
                                                                                <button type="button" class="btn  btn-success btn-block" id="defecto" name="tarjas" title="Archivo Plano" <?php echo $DISABLEDC; ?> <?php echo $DISABLEDT; ?> Onclick="abrirPestana('../../assest/csv/CsvInpsag.php?parametro=<?php echo $r['ID_INPSAG']; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                                                    <i class="fa fa-file-excel-o"></i> Archivo Plano
                                                                                </button>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td><?php echo $r['FECHA_INPSAG']; ?></td>
                                                        <td><?php echo $NOMBRETINPSAG; ?></td>
                                                        <td><?php echo $TESTADOSAG; ?></td>                                                
                                                        <td><?php echo $r['CIF']; ?></td>
                                                        <td><?php echo $r['ENVASE']; ?></td>
                                                        <td><?php echo $r['NETO']; ?></td>
                                                        <td><?php echo $r['BRUTO']; ?></td>
                                                        <td><?php echo $r['INGRESO']; ?></td>
                                                        <td><?php echo $r['MODIFICACION']; ?></td>
                                                        <td><?php echo $NOMBREPLANTA; ?></td>
                                                        <td><?php echo $NOMBRETEMPORADA; ?></td>
                                                    </tr>
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
                                                <div class="input-group-prepend">Bruto
                                                    <div class="input-group-text">Total Neto</div>
                                                    <!-- input -->
                                                    <input type="text" class="form-control" placeholder="Total Bruto" id="TOTALBRUTOV" name="TOTALBRUTOV" value="<?php echo $TOTALBRUTO; ?>" disabled />
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
    <?php include_once "../config/urlBase.php"; ?>
</body>

</html>