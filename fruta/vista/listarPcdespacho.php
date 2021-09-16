<?php

include_once "../config/validarUsuario.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/PROCESO_ADO.php';
include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/FOLIO_ADO.php';

include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/PCDESPACHO_ADO.php';

//INICIALIZAR CONTROLADOR

$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$FOLIO_ADO =  new FOLIO_ADO();

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$PCDESPACHO_ADO =  new PCDESPACHO_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$TOTALNETO = "";
$TOTALENVASE = "";
$TOTALNETO2 = "";
$TOTALENVASE2 = "";
$FECHADESDE = "";
$FECHAHASTA = "";


//INICIALIZAR ARREGLOS
$ARRAYPCDESPACHO = "";
$ARRAYPCDESPACHOTOTAL = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES


if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {

    $ARRAYPCDESPACHO = $PCDESPACHO_ADO->listarPcdespachoEmpresaPlantaTemporada2CBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $ARRAYPCDESPACHOTOTAL = $PCDESPACHO_ADO->obtenerTotalesPcdespachoEmpresaPlantaTemporadaCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $TOTALENVASE = $ARRAYPCDESPACHOTOTAL[0]['ENVASE'];
    $TOTALNETO = $ARRAYPCDESPACHOTOTAL[0]['NETO'];
}


include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrLP.php";

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agrupado Planificador Carga</title>
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
                                <h3 class="page-title">Agrupado Planificador Carga</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Frigorifico</li>
                                            <li class="breadcrumb-item" aria-current="page">Planificador Carga</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Agrupado Planificador Carga </a>
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
                                                        <th>
                                                            <a href="#" class="text-warning hover-warning">
                                                                Número
                                                            </a>
                                                        </th>
                                                        <th>Estado </th>
                                                        <th class="text-center">Operaciónes </th>
                                                        <th>Estado PC</th>
                                                        <th>Fecha PC </th>
                                                        <th>Motivo </th>
                                                        <th>Cantidad Envase </th>
                                                        <th>Kilo Neto </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYPCDESPACHO as $r) : ?>

                                                        <?php
                                                        if ($r['ESTADO_PCDESPACHO'] == "1") {
                                                            $ESTADODESPACHO = "Creado";
                                                        }
                                                        if ($r['ESTADO_PCDESPACHO'] == "2") {
                                                            $ESTADODESPACHO = "Confirmado";
                                                        }
                                                        if ($r['ESTADO_PCDESPACHO'] == "3") {
                                                            $ESTADODESPACHO =  "En Despacho";
                                                        }
                                                        if ($r['ESTADO_PCDESPACHO'] == "4") {
                                                            $ESTADODESPACHO = "Despachado";
                                                        }
                                                        ?>
                                                        <tr class="text-left">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['NUMERO_PCDESPACHO']; ?>
                                                                </a>
                                                            </td>
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
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_PCDESPACHO']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroPcdespacho" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URLO" name="URLO" value="listarPcdespacho" />
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
                                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Informe">
                                                                                    <button type="button" class="btn  btn-danger  btn-block" id="defecto" name="informe" title="Informe" Onclick="abrirPestana('../documento/informePcdespacho.php?parametro=<?php echo $r['ID_PCDESPACHO']; ?>'); ">
                                                                                        <i class="fa fa-file-pdf-o"></i>
                                                                                    </button>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </td>
                                                            <td><?php echo $ESTADODESPACHO; ?> </td>
                                                            <td><?php echo $r['FECHA']; ?> </td>
                                                            <td><?php echo $r['MOTIVO_PCDESPACHO']; ?> </td>
                                                            <td><?php echo $r['ENVASE']; ?> </td>
                                                            <td><?php echo $r['NETO']; ?> </td>
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