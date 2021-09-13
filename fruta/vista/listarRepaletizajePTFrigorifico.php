<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/ERECEPCION_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/FOLIO_ADO.php';

include_once '../controlador/REPALETIZAJEEX_ADO.php';
include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/DREPALETIZAJEEX_ADO.php';

//INICIALIZAR CONTROLADOR


$REPALETIZAJEEX_ADO =  new REPALETIZAJEEX_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$DREPALETIZAJEEX_ADO =  new DREPALETIZAJEEX_ADO();

$ERECEPCION_ADO =  new ERECEPCION_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$TOTALNETO = 0;
$TOTALENVASE = 0;
$TOTALNETO2 = 0;
$TOTALENVASE2 = 0;
$FECHADESDE = "";
$FECHAHASTA = "";
$FOLIOORIGINAL="";
$FOLIONUEVO="";


//INICIALIZAR ARREGLOS
$ARRAYREPALETIZAJEEX = "";
$ARRAYREPALETIZAJEEXTOTAL = "";

$ARRAYFOLIOREPALETIZAJE = "";
$ARRAYFOLIODREPALETIZAJE = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {

    $ARRAYREPALETIZAJEEX = $REPALETIZAJEEX_ADO->listarRepaletizajeEmpresaPlantaTemporadaCBX2($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $ARRAYREPALETIZAJEEXTOTAL = $REPALETIZAJEEX_ADO->obtenerTotalesRepaletizajeEmpresaPlantaTemporadaCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $TOTALENVASE2 = $ARRAYREPALETIZAJEEXTOTAL[0]['ENVASE'];
    $TOTALNETO2 = $ARRAYREPALETIZAJEEXTOTAL[0]['NETO'];
}
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrLP.php";




?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agrupado Repaletizaje</title>
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
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../config/menu.php"; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Repaletizaje</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Frigorifico</li>
                                            <li class="breadcrumb-item" aria-current="page">Repaletizaje</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Agrupado Repaletizaje </a>
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
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table id="modulo" class="table table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="text-left">
                                                        <th>Número </th>
                                                        <th>Estado </th>
                                                        <th class="text-center">Operaciónes </th>
                                                        <th>Folio Original </th>
                                                        <th>Folio Nuevo </th>
                                                        <th>Cantidad Envase </th>
                                                        <th>Kilo Neto Entrada</th>
                                                        <th>Kilo Neto Salida</th>
                                                        <th>Motivo </th>
                                                        <th>Fecha Ingreso </th>
                                                        <th>Fecha Modificación </th>
                                                        <th>Empresa</th>
                                                        <th>Planta</th>
                                                        <th>Temporada</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYREPALETIZAJEEX as $r) : ?>

                                                        <?php
                                                        $ARRAYFOLIOREPALETIZAJE = $EXIEXPORTACION_ADO->buscarPorRepaletizajeAgrupado($r['ID_REPALETIZAJE']);
                                                        if ($ARRAYFOLIOREPALETIZAJE) {
                                                            foreach ($ARRAYFOLIOREPALETIZAJE as $dr) :
                                                                $FOLIOORIGINAL = $FOLIOORIGINAL . $dr['FOLIO_AUXILIAR_EXIEXPORTACION'] . ", ";
                                                            endforeach;
                                                        } else {
                                                            $FOLIOORIGINAL = "";
                                                        }
                                                        $ARRAYFOLIODREPALETIZAJE = $DREPALETIZAJEEX_ADO->buscarDrepaletizajeAgrupadoFolio($r['ID_REPALETIZAJE']);
                                                        if ($ARRAYFOLIODREPALETIZAJE) {
                                                            foreach ($ARRAYFOLIODREPALETIZAJE as $dr) :
                                                                $FOLIONUEVO = $FOLIONUEVO . $dr['FOLIO_NUEVO_DREPALETIZAJE'] . ", ";
                                                            endforeach;
                                                        } else {
                                                            $FOLIONUEVO = "";
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
                                                        ?>
                                                        <tr class="text-left">
                                                            <td><?php echo $r['NUMERO_REPALETIZAJE']; ?> </td>
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
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_REPALETIZAJE']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroRepaletizajePTFrigorifico" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URLO" name="URLO" value="listarRepaletizajePTFrigorifico" />
                                                                                <?php if ($r['ESTADO'] == "0") { ?>
                                                                                    <span href="#" class="dropdown-item" data-toggle="tooltip" title="Ver">
                                                                                        <button type="submit" class="btn btn-info btn-block " id="VERURL" name="VERURL">
                                                                                            <i class="ti-eye"></i>
                                                                                        </button>
                                                                                    </span>
                                                                                <?php } ?>
                                                                                <?php if ($r['ESTADO'] == "1") { ?>
                                                                                    <span href="#" class="dropdown-item" data-toggle="tooltip" title="Editar">
                                                                                        <button type="submit" class="btn  btn-warning btn-block" id="EDITARURL" name="EDITARURL">
                                                                                            <i class="ti-pencil-alt"></i>
                                                                                        </button>
                                                                                    </span>
                                                                                <?php } ?>
                                                                                <hr>
                                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Packing List">
                                                                                    <button type="button" class="btn  btn-danger  btn-block" id="defecto" name="informe" title="Informe" Onclick="abrirPestana('../documento/informeRepaletizajePT.php?parametro=<?php echo $r['ID_REPALETIZAJE']; ?>'); ">
                                                                                        <i class="fa fa-file-pdf-o"></i>
                                                                                    </button>
                                                                                </span>
                                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Packing List">
                                                                                    <button type="button" class="btn  btn-danger  btn-block" id="defecto" name="informe" title="Informe" Onclick="abrirPestana('../documento/informeTarjasRepaletizajePT.php?parametro=<?php echo $r['ID_REPALETIZAJE']; ?>'); ">
                                                                                        <i class="fa fa-file-pdf-o"></i>
                                                                                    </button>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </td>
                                                            <td><?php echo $FOLIOORIGINAL; ?> </td>
                                                            <td><?php echo $FOLIONUEVO; ?> </td>
                                                            <td><?php echo $r['CANTIDAD_ENVASE_REPALETIZAJE']; ?> </td>
                                                            <td><?php echo $r['NETOO']; ?> </td>
                                                            <td><?php echo $r['NETOR']; ?> </td>
                                                            <td><?php echo $r['MOTIVO_REPALETIZAJE']; ?> </td>
                                                            <td><?php echo $r['INGRESO']; ?> </td>
                                                            <td><?php echo $r['MODIFICACION']; ?> </td>
                                                            <td><?php echo $NOMBREEMPRESA; ?></td>
                                                            <td><?php echo $NOMBREPLANTA; ?></td>
                                                            <td><?php echo $NOMBRETEMPORADA; ?></td>
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
                                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 col-xs-8">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 col-xs-2">
                                        <div class="form-group">
                                            <label>Total Envase </label>
                                            <input type="text" class="form-control" placeholder="Total Envase" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALENVASE; ?>" disabled />
                                        </div>
                                    </div>
                                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 col-xs-2">
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
    <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
        <?php include_once "../config/footer.php"; ?>
        <?php include_once "../config/menuExtra.php"; ?>
        </div>
        <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
            <?php include_once "../config/urlBase.php"; ?>
</body>

</html>