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

include_once '../controlador/REPALETIZAJEMP_ADO.php';
include_once '../controlador/REPALETIZAJEEX_ADO.php';
include_once '../controlador/REPALETIZAJEHFO_ADO.php';
include_once '../controlador/DREPALETIZAJEEX_ADO.php';
include_once '../controlador/DREPALETIZAJEMP_ADO.php';
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();


$REPALETIZAJEMP_ADO =  new REPALETIZAJEMP_ADO();
$REPALETIZAJEEX_ADO =  new REPALETIZAJEEX_ADO();
$REPALETIZAJEHFO_ADO =  new REPALETIZAJEHFO_ADO();
$DREPALETIZAJEEX_ADO =  new DREPALETIZAJEEX_ADO();
$DREPALETIZAJEMP_ADO =  new DREPALETIZAJEMP_ADO();

$ERECEPCION_ADO =  new ERECEPCION_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$PVESPECIES_ADO =  new PVESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$TOTALNETO = "";
$TOTALENVASE = "";
$FECHADESDE = "";
$FECHAHASTA = "";

//INICIALIZAR ARREGLOS
$ARRAYREPALETIZAJEMP = "";
$ARRAYREPALETIZAJEMPTOTAL = "";
$ARRAYFOLIOREPALETIZAJE = "";
$ARRAYFOLIODREPALETIZAJE = "";
$ARRAYTIPOREPALETIZAJE = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {
    $ARRAYREPALETIZAJEMP = $REPALETIZAJEMP_ADO->listarRepaletizajeEmpresaPlantaTemporadaCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $ARRAYREPALETIZAJEMPTOTAL = $REPALETIZAJEMP_ADO->obtenerTotalesRepaletizajeEmpresaPlantaTemporadaCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $TOTALENVASE = $ARRAYREPALETIZAJEMPTOTAL[0]['ENVASE'];
    $TOTALNETO = $ARRAYREPALETIZAJEMPTOTAL[0]['NETO'];
} else {
    $ARRAYREPALETIZAJEMP = $REPALETIZAJEMP_ADO->listarRepaletizajeCBX();
    $ARRAYREPALETIZAJEMPTOTAL = $REPALETIZAJEMP_ADO->obtenerTotalesRepaletizajeCBX();
    $TOTALENVASE = $ARRAYREPALETIZAJEMPTOTAL[0]['ENVASE'];
    $TOTALNETO = $ARRAYREPALETIZAJEMPTOTAL[0]['NETO'];
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
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Granel</li>
                                            <li class="breadcrumb-item" aria-current="page">Repaletizaje</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="listarRepaletizajeMp.php"> Listar Repaletizaje </a>
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
                                                                Numero
                                                            </a>
                                                        </th>
                                                        <th>Operaciones </th>
                                                        <th>Folio Original </th>
                                                        <th>Folio Nuevo </th>
                                                        <th>Cantidad Envase </th>
                                                        <th>Kilo Neto Entrada </th>
                                                        <th>Kilo Neto Salida </th>
                                                        <th>Motivo </th>
                                                        <th>Fecha Ingreso </th>
                                                        <th>Fecha Modificacion </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYREPALETIZAJEMP as $r) : ?>
                                                        <tr class="center">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['ID_REPALETIZAJE']; ?>
                                                                </a>
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-cog"></i></a>
                                                                            <div class="dropdown-menu dropdown-menu-right">

                                                                                <button type="button" class="btn btn-rounded btn-sm btn-danger btn-outline mr-1" id="defecto" name="tarjas" Onclick="abrirVentana('../documento/informeRepaletizajeMP.php?parametro=<?php echo $r['ID_REPALETIZAJE']; ?>&&NOMBREUSUARIO=<?php echo $NOMBREUSUARIOS; ?>'); ">
                                                                                    <i class="fa fa-file-pdf-o"></i>
                                                                                </button>Informe
                                                                                <br>
                                                                                <button type="button" class="btn btn-rounded btn-sm btn-danger btn-outline mr-1" id="defecto" name="tarjas" Onclick="abrirVentana('../documento/informeTarjasRepaletizajeMP.php?parametro=<?php echo $r['ID_REPALETIZAJE']; ?>'); ">
                                                                                    <i class="fa fa-file-pdf-o"></i>
                                                                                </button>Tarja
                                                                                <div class="dropdown-divider"></div>

                                                                                <?php if ($r['ESTADO'] == 1) { ?>
                                                                                    <button type="button" class="btn btn-rounded btn-sm btn-warning btn-outline mr-1" id="defecto" name="editar" Onclick="irPagina('registroRepaletizajeMpRecepcion.php?parametro=<?php echo $r['ID_REPALETIZAJE']; ?>&&parametro1=editar'); ">
                                                                                        <i class="ti-pencil-alt"></i>
                                                                                    </button>Editar
                                                                                    <br>
                                                                                <?php } ?>
                                                                                <button type="button" class="btn btn-rounded btn-sm btn-info btn-outline mr-1" id="defecto" name="ver" Onclick="irPagina('registroRepaletizajeMpRecepcion.php?parametro=<?php echo $r['ID_REPALETIZAJE']; ?>&&parametro1=ver'); ">
                                                                                    <i class="ti-eye"></i>
                                                                                </button>Ver
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </td>
                                                            <td>
                                                                <?php

                                                                $ARRAYFOLIOREPALETIZAJE = $REPALETIZAJEHFO_ADO->buscarPorRepaletizajeAgruparMp($r['ID_REPALETIZAJE']);
                                                                foreach ($ARRAYFOLIOREPALETIZAJE as $dr) :
                                                                    echo $dr['NUMERO_FOLIO_ORIGINAL'] . "<br>";
                                                                endforeach;
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $ARRAYFOLIODREPALETIZAJE = $DREPALETIZAJEMP_ADO->buscarDrepaletizajeAgrupadoFolio($r['ID_REPALETIZAJE']);
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
                                                            <td><?php echo $r['KILOS_NETO_ORIGINAL']; ?> </td>
                                                            <td><?php echo $r['KILOS_NETO_REPALETIZAJE']; ?> </td>
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





    <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
        <?php include_once "../config/footer.php"; ?>
        <?php include_once "../config/menuExtra.php"; ?>
        </div>
        <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
            <?php include_once "../config/urlBase.php"; ?>
</body>

</html>