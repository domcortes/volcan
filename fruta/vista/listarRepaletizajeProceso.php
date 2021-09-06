<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/USUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';

include_once '../controlador/ERECEPCION_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/FOLIO_ADO.php';

include_once '../controlador/REPALETIZAJEEX_ADO.php';
include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/DREPALETIZAJEEX_ADO.php';
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();


$REPALETIZAJEEX_ADO =  new REPALETIZAJEEX_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$DREPALETIZAJEEX_ADO =  new DREPALETIZAJEEX_ADO();

$ERECEPCION_ADO =  new ERECEPCION_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$PVESPECIES_ADO =  new PVESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$TOTALNETO = "";
$TOTALENVASE = "";
$TOTALNETO2 = "";
$TOTALENVASE2 = "";
$FECHADESDE = "";
$FECHAHASTA = "";


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
} else {

    $ARRAYREPALETIZAJEEX = $REPALETIZAJEEX_ADO->listarRepaletizajeCBX2();
    $ARRAYREPALETIZAJEEXTOTAL = $REPALETIZAJEEX_ADO->obtenerTotalesRepaletizajeCBX();

    $TOTALENVASE2 = $ARRAYREPALETIZAJEEXTOTAL[0]['ENVASE'];
    $TOTALNETO2 = $ARRAYREPALETIZAJEEXTOTAL[0]['NETO'];
}




?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Listar Repaletizaje</title>
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
                                            <li class="breadcrumb-item" aria-current="page">Proceso</li>
                                            <li class="breadcrumb-item" aria-current="page">Repaletizaje</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="listarRepaletizajeProceso.php"> Agrupado Repaletizaje </a>
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
                                <!--
                                <form class="form" role="form" method="post" name="form_reg_dato">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Fecha Desde </label>
                                                <input type="date" class="form-control" placeholder="Fecha Desde" id="FECHADESDE" name="FECHADESDE" value="<?php echo $FECHADESDE; ?>" />
                                                <label id="val_fechad" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Fecha Hasta </label>
                                                <input type="date" class="form-control" placeholder="Fecha Hasta" id="FECHAHASTA" name="FECHAHASTA" value="<?php echo $FECHAHASTA; ?>" />
                                                <label id="val_fechah" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <br>
                                                <button type="submit" class="btn btn-rounded btn-warning btn-outline" name="LIMPIAR" value="LIMPIAR">
                                                    <i class="ti-na"></i>
                                                </button>

                                                <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="FILTRAR" value="FILTRAR">
                                                    <i class="ti-filter"></i>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table id="modulo" class="table table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <a href="#" class="text-warning hover-warning">
                                                                Número
                                                            </a>
                                                        </th>
                                                        <th>Estado </th>
                                                        <th>Operaciónes </th>
                                                        <th>Folio Original </th>
                                                        <th>Folio Nuevo </th>
                                                        <th>Cantidad Envase </th>
                                                        <th>Kilo Neto Entrada</th>
                                                        <th>Kilo Neto Salida</th>
                                                        <th>Motivo </th>
                                                        <th>Fecha Ingreso </th>
                                                        <th>Fecha Modificación </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php foreach ($ARRAYREPALETIZAJEEX as $r) : ?>
                                                        <tr class="center">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['NUMERO_REPALETIZAJE']; ?>
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

                                                                                <?php if ($r['ESTADO'] == 0) { ?>
                                                                                    <button type="button" class="btn btn-rounded btn-sm btn-danger btn-outline mr-1" id="defecto" name="informe" Onclick="abrirVentana('../documento/informeRepaletizajePT.php?parametro=<?php echo $r['ID_REPALETIZAJE']; ?>&&NOMBREUSUARIO=<?php echo $NOMBREUSUARIOS; ?>'); ">
                                                                                        <i class="fa fa-file-pdf-o"></i>
                                                                                    </button>Informe <br>
                                                                                <?php } ?>
                                                                                <button type="button" class="btn btn-rounded btn-sm btn-danger btn-outline mr-1" id="defecto" name="tarjas" Onclick="abrirVentana('../documento/informeTarjasRepaletizajePT.php?parametro=<?php echo $r['ID_REPALETIZAJE']; ?>'); ">
                                                                                    <i class="fa fa-file-pdf-o"></i>
                                                                                </button>Tarja


                                                                                <div class="dropdown-divider"></div>

                                                                                <?php if ($r['ESTADO'] == 1) { ?>
                                                                                    <button type="button" class="btn btn-rounded btn-sm btn-warning btn-outline mr-1" id="defecto" name="editar" Onclick="irPagina('registroRepaletizajeEx.php?parametro=<?php echo $r['ID_REPALETIZAJE']; ?>&&parametro1=editar'); ">
                                                                                        <i class="ti-pencil-alt"></i>
                                                                                    </button>Editar
                                                                                    <br>
                                                                                <?php } ?>

                                                                                <?php if ($r['ESTADO'] == "0") { ?>
                                                                                    <button type="button" class="btn btn-rounded btn-sm btn-info btn-outline mr-1" id="defecto" name="ver" Onclick="irPagina('registroRepaletizajeEx.php?parametro=<?php echo $r['ID_REPALETIZAJE']; ?>&&parametro1=ver'); ">
                                                                                        <i class="ti-eye"></i>
                                                                                    </button>Ver
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $ARRAYFOLIOREPALETIZAJE = $EXIEXPORTACION_ADO->buscarPorRepaletizajeAgrupado($r['ID_REPALETIZAJE']);
                                                                foreach ($ARRAYFOLIOREPALETIZAJE as $dr) :
                                                                    echo $dr['FOLIO_AUXILIAR_EXIEXPORTACION'] . "<br>";
                                                                endforeach;
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $ARRAYFOLIODREPALETIZAJE = $DREPALETIZAJEEX_ADO->buscarDrepaletizajeAgrupadoFolio2($r['ID_REPALETIZAJE']);
                                                                if ($ARRAYFOLIODREPALETIZAJE) {
                                                                    foreach ($ARRAYFOLIODREPALETIZAJE as $dr) :
                                                                        echo $dr['FOLIO_NUEVO_DREPALETIZAJE'] . "<br>";
                                                                    endforeach;
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?php echo $r['CANTIDAD_ENVASE_REPALETIZAJE']; ?> </td>
                                                            <td><?php echo $r['NETOO']; ?> </td>
                                                            <td><?php echo $r['NETOR']; ?> </td>
                                                            <td><?php echo $r['MOTIVO_REPALETIZAJE']; ?> </td>
                                                            <td><?php echo $r['FECHA_INGRESO']; ?> </td>
                                                            <td><?php echo $r['FECHA_MODIFICACION']; ?> </td>
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
                                            <input type="text" class="form-control" placeholder="Total Envase" id="TOTALENVASE2V" name="TOTALENVASE2V" value="<?php echo $TOTALENVASE2; ?>" disabled />
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Total Neto </label>
                                            <input type="text" class="form-control" placeholder="Total Neto" id="TOTALENVASE2V" name="TOTALENVASE2V" value="<?php echo $TOTALNETO2; ?>" disabled />
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