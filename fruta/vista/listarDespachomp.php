<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/USUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';


include_once '../controlador/DESPACHOMP_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/TRANSPORTE_ADO.php';


include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/CONDUCTOR_ADO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$DESPACHOMP_ADO =  new DESPACHOMP_ADO();
$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CONDUCTOR_ADO =  new CONDUCTOR_ADO();

$VESPECIES_ADO =  new VESPECIES_ADO();
$PVESPECIES_ADO =  new PVESPECIES_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();



//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD


$TOTALBRUTO = "";
$TOTALNETO = "";
$TOTALENVASE = "";
$FECHADESDE = "";
$FECHAHASTA = "";

$PRODUCTOR = "";
$NUMEROGUIA = "";

//INICIALIZAR ARREGLOS
$ARRAYDESPACHOMP = "";
$ARRAYDESPACHOMPTOTALES = "";
$ARRAYVEREMPRESA = "";
$ARRAYVERPRODUCTOR = "";
$ARRAYVERTRANSPORTE = "";
$ARRAYVERCONDUCTOR = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES



if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {

    $ARRAYDESPACHOMP = $DESPACHOMP_ADO->listarDespachompEmpresaPlantaTemporadaCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $ARRAYDESPACHOMPTOTALES = $DESPACHOMP_ADO->obtenerTotalesDespachompEmpresaPlantaTemporadaCBX2($EMPRESAS, $PLANTAS, $TEMPORADAS);

    $TOTALBRUTO = $ARRAYDESPACHOMPTOTALES[0]['BRUTO'];
    $TOTALNETO = $ARRAYDESPACHOMPTOTALES[0]['NETO'];
    $TOTALENVASE = $ARRAYDESPACHOMPTOTALES[0]['ENVASE'];
} else {

    $ARRAYDESPACHOMP = $DESPACHOMP_ADO->listarDespachompCBX();
    $ARRAYDESPACHOMPTOTALES = $DESPACHOMP_ADO->obtenerTotalesDespachompCBX2();

    $TOTALBRUTO = $ARRAYDESPACHOMPTOTALES[0]['BRUTO'];
    $TOTALNETO = $ARRAYDESPACHOMPTOTALES[0]['NETO'];
    $TOTALENVASE = $ARRAYDESPACHOMPTOTALES[0]['ENVASE'];
}





?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Listar Despacho MP</title>
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
                            <h3 class="page-title">Despacho MP</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Granel</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="listarDespachomp.php"> Listar Depacho MP </a>
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
                                                    <th>Numero </th>
                                                    <th>Estado</th>
                                                    <th>Operaciones</th>
                                                    <th>Empresa</th>
                                                    <th>Fecha Despacho </th>
                                                    <th>Numero Guia </th>
                                                    <th>Cantidad Envase</th>
                                                    <th>Total Kilos Neto</th>
                                                    <th>Fecha Ingreso</th>
                                                    <th>Fecha Modificacion</th>
                                                    <th>Transporte </th>
                                                    <th>Nombre Conductor </th>
                                                    <th>Patente Camion </th>
                                                    <th>Patente Carro </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYDESPACHOMP as $r) : ?>
                                                    <tr class="center">
                                                        <td>
                                                            <a href="#" class="text-warning hover-warning">
                                                                <?php echo $r['NUMERO_DESPACHO']; ?>
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


                                                                            <button type="button" class="btn btn-rounded btn-sm btn-danger btn-outline mr-1" id="defecto" name="tarjas" Onclick="abrirVentana('../documento/informeDespachoMP.php?parametro=<?php echo $r['ID_DESPACHO']; ?>&&NOMBREUSUARIO=<?php echo $NOMBREUSUARIOS; ?>'); ">
                                                                                <i class="fa fa-file-pdf-o"></i>
                                                                            </button>Informe <br>
                                                                            <div class="dropdown-divider"></div>

                                                                            <?php if ($r['ESTADO'] == "1") { ?>
                                                                                <button type="button" class="btn btn-rounded btn-sm btn-warning btn-outline mr-1" id="defecto" name="editar" Onclick="irPagina('registroDespachomp.php?parametro=<?php echo $r['ID_DESPACHO']; ?>&&parametro1=editar'); ">
                                                                                    <i class="ti-pencil-alt"></i>
                                                                                </button>Editar
                                                                                <br>
                                                                            <?php } ?>

                                                                            <button type="button" class="btn btn-rounded btn-sm btn-info btn-outline mr-1" id="defecto" name="ver" Onclick="irPagina('registroDespachomp.php?parametro=<?php echo $r['ID_DESPACHO']; ?>&&parametro1=ver'); ">
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
                                                        <td><?php echo $r['FECHA_DESPACHO']; ?></td>

                                                        <td><?php echo $r['NUMERO_GUIA_DESPACHO']; ?></td>
                                                        <td><?php echo $r['CANTIDAD_ENVASE_DESPACHO']; ?></td>
                                                        <td><?php echo $r['KILOS_NETO_DESPACHO']; ?></td>
                                                        <td><?php echo $r['FECHA_INGRESO_DESPACHO']; ?></td>
                                                        <td><?php echo $r['FECHA_MODIFICACION_DESPACHO']; ?></td>
                                                        <td>
                                                            <?php
                                                            $ARRAYVERTRANSPORTE = $TRANSPORTE_ADO->verTransporte($r['ID_TRANSPORTE']);
                                                            echo $ARRAYVERTRANSPORTE[0]['NOMBRE_TRANSPORTE'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $ARRAYVERCONDUCTOR = $CONDUCTOR_ADO->verConductor($r['ID_CONDUCTOR']);
                                                            echo $ARRAYVERCONDUCTOR[0]['NOMBRE_CONDUCTOR'];
                                                            ?>
                                                        </td>
                                                        <td><?php echo $r['PATENTE_CAMION']; ?></td>
                                                        <td><?php echo $r['PATENTE_CARRO']; ?></td>


                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
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



        <?php include_once "../config/footer.php"; ?>
        <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <?php include_once "../config/urlBase.php"; ?>
</body>

</html>