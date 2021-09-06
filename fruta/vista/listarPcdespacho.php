<?php

include_once "../config/validarUsuario.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/USUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';

include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/PROCESO_ADO.php';
include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/FOLIO_ADO.php';

include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/PCDESPACHO_ADO.php';

//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();


$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$PVESPECIES_ADO =  new PVESPECIES_ADO();
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

    $ARRAYPCDESPACHO = $PCDESPACHO_ADO->listarPcdespachoEmpresaPlantaTemporadaCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $ARRAYPCDESPACHOTOTAL = $PCDESPACHO_ADO->obtenerTotalesPcdespachoEmpresaPlantaTemporadaCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $TOTALENVASE = $ARRAYPCDESPACHOTOTAL[0]['ENVASE'];
    $TOTALNETO = $ARRAYPCDESPACHOTOTAL[0]['NETO'];
} else {
    $ARRAYPCDESPACHO = $PCDESPACHO_ADO->listarPcdespachoCBX();
    $ARRAYPCDESPACHOTOTAL = $PCDESPACHO_ADO->obtenerTotalesPcdespachoCBX();
    $TOTALENVASE = $ARRAYPCDESPACHOTOTAL[0]['ENVASE'];
    $TOTALNETO = $ARRAYPCDESPACHOTOTAL[0]['NETO'];
}




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
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="listarPcdespacho.php"> Agrupado Planificador Carga </a>
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
                                                        <th>
                                                            <a href="#" class="text-warning hover-warning">
                                                                Número
                                                            </a>
                                                        </th>
                                                        <th>Estado </th>
                                                        <th>Operaciónes </th>
                                                        <th>Estado PC</th>
                                                        <th>Fecha PC </th>
                                                        <th>Motivo </th>
                                                        <th>Cantidad Envase </th>
                                                        <th>Kilo Neto </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYPCDESPACHO as $r) : ?>
                                                        <tr class="center">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['NUMERO_PCDESPACHO']; ?>
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
                                                                                    <button type="button" class="btn btn-rounded btn-sm btn-danger btn-outline mr-1" id="defecto" name="informe" Onclick="abrirVentana('../documento/informePcdespacho.php?parametro=<?php echo $r['ID_PCDESPACHO']; ?>&&NOMBREUSUARIO=<?php echo $NOMBREUSUARIOS; ?>'); ">
                                                                                        <i class="fa fa-file-pdf-o"></i>
                                                                                    </button>Informe <br>
                                                                                <div class="dropdown-divider"></div>
                                                                                <?php } ?>
                                                                                <?php if ($r['ESTADO'] == 1) { ?>
                                                                                    <button type="button" class="btn btn-rounded btn-sm btn-warning btn-outline mr-1" id="defecto" name="editar" Onclick="irPagina('registroPcdespacho.php?parametro=<?php echo $r['ID_PCDESPACHO']; ?>&&parametro1=editar'); ">
                                                                                        <i class="ti-pencil-alt"></i>
                                                                                    </button>Editar
                                                                                    <br>
                                                                                <?php } ?>
                                                                                <?php if ($r['ESTADO'] == "0") { ?>
                                                                                    <button type="button" class="btn btn-rounded btn-sm btn-info btn-outline mr-1" id="defecto" name="ver" Onclick="irPagina('registroPcdespacho.php?parametro=<?php echo $r['ID_PCDESPACHO']; ?>&&parametro1=ver'); ">
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
                                                                if ($r['ESTADO_PCDESPACHO'] == "1") {
                                                                    echo "Creado";
                                                                }
                                                                if ($r['ESTADO_PCDESPACHO'] == "2") {
                                                                    echo "Confirmado";
                                                                }
                                                                if ($r['ESTADO_PCDESPACHO'] == "3") {
                                                                    echo "En Despacho";
                                                                }
                                                                if ($r['ESTADO_PCDESPACHO'] == "4") {
                                                                    echo "Despachado";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?php echo $r['FECHA_PCDESPACHO']; ?> </td>
                                                            <td><?php echo $r['MOTIVO_PCDESPACHO']; ?> </td>
                                                            <td><?php echo $r['CANTIDAD_ENVASE_PCDESPACHO']; ?> </td>
                                                            <td><?php echo $r['KILOS_NETO_PCDESPACHO']; ?> </td>
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