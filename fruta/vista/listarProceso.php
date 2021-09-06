<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/USUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';

include_once '../controlador/TPROCESO_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/PROCESO_ADO.php';

include_once '../controlador/DPEXPORTACION_ADO.php';
include_once '../controlador/DPINDUSTRIAL_ADO.php';
include_once '../controlador/PROCESO_ADO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$TPROCESO_ADO =  new TPROCESO_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$PVESPECIES_ADO =  new PVESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$PROCESO_ADO =  new PROCESO_ADO();



//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$TOTALENVASE = "";
$TOTALNETO = "";
$TOTALINDUSTRIAL = "";
$TOTALEXPORTACION = "";



//INICIALIZAR ARREGLOS
$ARRAYEMPRESA = "";
$ARRAYFOLIO2 = "";
$ARRAYPVESPECIES = "";
$ARRAYTPROCESO = "";
$ARRAYPRODUCTOR = "";
$ARRAYVESPECIES = "";

$ARRAYPROCESO = "";
$ARRAYTOTALPROCESO = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES


if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {

    $ARRAYPROCESO = $PROCESO_ADO->listarProcesoEmpresaPlantaTemporadaCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $ARRAYTOTALPROCESO = $PROCESO_ADO->obtenerTotalesEmpresaPlantaTemporadaLista($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $TOTALNETO = $ARRAYTOTALPROCESO[0]['NETO'];
    $TOTALINDUSTRIAL = $ARRAYTOTALPROCESO[0]['INDUSTRIAL'];
    $TOTALEXPORTACION = $ARRAYTOTALPROCESO[0]['EXPORTACION'];
} else {
    $ARRAYPROCESO = $PROCESO_ADO->listarProcesoCBX();
    $ARRAYTOTALPROCESO = $PROCESO_ADO->obtenerTotalesLista();
    $TOTALNETO = $ARRAYTOTALPROCESO[0]['NETO'];
    $TOTALINDUSTRIAL = $ARRAYTOTALPROCESO[0]['INDUSTRIAL'];
    $TOTALEXPORTACION = $ARRAYTOTALPROCESO[0]['EXPORTACION'];
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Listar Proceso</title>
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
        <?php include_once "../config/menu.php"; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">Proceso</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Proceso</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="listarProceso.php"> Listar Registro Proceso </a>
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
                                                    <th>Numero</th>
                                                    <th>Estado</th>
                                                    <th>Operaciones</th>
                                                    <th>Empresa</th>
                                                    <th>Fecha Proceso</th>
                                                    <th>Tipo Proceso</th>
                                                    <th>Turno </th>
                                                    <th>K. Neto Salida</th>
                                                    <th>K. Exportacion </th>
                                                    <th>K. Industrial</th>
                                                    <th>CSG Productor</th>
                                                    <th>Nombre Productor</th>
                                                    <th>Variedad</th>
                                                    <th>Fecha Ingreso</th>
                                                    <th>Fecha Modificacion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYPROCESO as $r) : ?>
                                                    <tr class="center">
                                                        <td>
                                                            <a href="#" class="text-warning hover-warning">
                                                                <?php echo $r['NUMERO_PROCESO']; ?>
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
                                                                                <button type="button" class="btn btn-rounded btn-sm btn-danger btn-outline mr-1" id="defecto" name="tarjas" Onclick="abrirVentana('../documento/informeProceso.php?parametro=<?php echo $r['ID_PROCESO']; ?>&&NOMBREUSUARIO=<?php echo $NOMBREUSUARIOS; ?>'); ">
                                                                                    <i class="fa fa-file-pdf-o"></i>
                                                                                </button>Informe
                                                                                <br>
                                                                            <?php } ?>
                                                                            <button type="button" class="btn btn-rounded btn-sm btn-danger btn-outline mr-1" id="defecto" name="tarjas" Onclick="abrirVentana('../documento/informeTarjasProceso.php?parametro=<?php echo $r['ID_PROCESO']; ?>'); ">
                                                                                <i class="fa fa-file-pdf-o"></i>
                                                                            </button>Tarjas
                                                                            <div class="dropdown-divider"></div>

                                                                            <?php if ($r['ESTADO'] == "1") { ?>
                                                                                <button type="button" class="btn btn-rounded btn-sm btn-warning btn-outline mr-1" id="defecto" name="editar" Onclick="irPagina('registroProceso.php?parametro=<?php echo $r['ID_PROCESO']; ?>&&parametro1=editar'); ">
                                                                                    <i class="ti-pencil-alt"></i>
                                                                                </button>Editar
                                                                                <br>
                                                                            <?php } ?>

                                                                            <button type="button" class="btn btn-rounded btn-sm btn-info btn-outline mr-1" id="defecto" name="ver" Onclick="irPagina('registroProceso.php?parametro=<?php echo $r['ID_PROCESO']; ?>&&parametro1=ver'); ">
                                                                                <i class="ti-eye"></i>
                                                                            </button>Ver
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $ARRAYVEREMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                            echo $ARRAYVEREMPRESA[0]['NOMBRE_EMPRESA']
                                                            ?>
                                                        </td>
                                                        <td><?php echo $r['FECHA_PROCESO']; ?></td>
                                                        <td>
                                                            <?php
                                                            $ARRAYTPROCESO = $TPROCESO_ADO->verTproceso($r['ID_TPROCESO']);
                                                            echo $ARRAYTPROCESO[0]['NOMBRE_TPROCESO'];
                                                            ?>
                                                        </td>
                                                        <td><?php
                                                            if ($r['TURNO'] == "1") {
                                                                echo "Dia";
                                                            }
                                                            if ($r['TURNO'] == "2") {
                                                                echo "Noche";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $r['KILOS_NETO_PROCESO']; ?></td>
                                                        <td><?php echo $r['KILOS_EXPORTACION_PROCESO']; ?></td>
                                                        <td><?php echo $r['KILOS_INDUSTRIAL_PROCESO']; ?></td>
                                                        <td>
                                                            <?php
                                                            $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                            echo $ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            echo $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $ARRAYPVESPECIES = $PVESPECIES_ADO->verPvespecies($r['ID_PVESPECIES']);
                                                            $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($ARRAYPVESPECIES[0]['ID_VESPECIES']);
                                                            echo $ARRAYVESPECIES[0]['NOMBRE_VESPECIES'];
                                                            ?>
                                                        </td>
                                                        <td><?php echo $r['FECHA_INGRESO_PROCESO']; ?></td>
                                                        <td><?php echo $r['FECHA_MODIFICACION_PROCESO']; ?></td>

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
                                <div class="col-sm-6">
                                    <div class="form-group">
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
                                        <label>Total Exportacion </label>
                                        <input type="text" class="form-control" placeholder="Total Neto" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALEXPORTACION; ?>" disabled />
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Total Industrial </label>
                                        <input type="text" class="form-control" placeholder="Total Neto" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALINDUSTRIAL; ?>" disabled />
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



        <?php include_once "../config/footer.php"; ?>
        <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <?php include_once "../config/urlBase.php"; ?>
</body>

</html>