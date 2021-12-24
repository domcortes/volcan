<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/TPROCESO_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/ESPECIES_ADO.php';
include_once '../controlador/PROCESO_ADO.php';

include_once '../controlador/EXIMATERIAPRIMA_ADO.php';
include_once '../controlador/PROCESO_ADO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$TPROCESO_ADO =  new TPROCESO_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();

$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();
$PROCESO_ADO =  new PROCESO_ADO();



//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$TOTALENVASE = "";
$TOTALNETO = "";
$TOTALNETOENTRADA = "";
$TOTALINDUSTRIAL = "";
$TOTALEXPORTACION = "";
$TURNO = "";
$NETOENTRADA="";


//INICIALIZAR ARREGLOS
$ARRAYEMPRESA = "";
$ARRAYFOLIO2 = "";
$ARRAYPVESPECIES = "";
$ARRAYTPROCESO = "";
$ARRAYPRODUCTOR = "";
$ARRAYVESPECIES = "";

$ARRAYPROCESO = "";
$ARRAYTOTALPROCESO = "";
$ARRAYTOTALPROCESOENTRADA = "";
$ARRAYEXISMATERIPRIMAPROCESO = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES


if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {

    $ARRAYPROCESO = $PROCESO_ADO->listarProcesoEmpresaPlantaTemporadaCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $ARRAYTOTALPROCESO = $PROCESO_ADO->obtenerTotalesEmpresaPlantaTemporadaCBX2($EMPRESAS, $PLANTAS, $TEMPORADAS);

    
    $TOTALNETOENTRADA = $ARRAYTOTALPROCESO[0]['ENTRADA'];
    $TOTALNETO = $ARRAYTOTALPROCESO[0]['NETO'];
    $TOTALEXPORTACION = $ARRAYTOTALPROCESO[0]['EXPORTACION'];
    $TOTALINDUSTRIAL = $ARRAYTOTALPROCESO[0]['INDUSTRIAL'];



}
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrLP.php";


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agrupado Proceso</title>
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
                                        <li class="breadcrumb-item" aria-current="page">Packing</li>
                                        <li class="breadcrumb-item" aria-current="page">Proceso</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Agrupado Proceso </a>
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
                                                    <th>Numero</th>
                                                    <th>Estado</th>
                                                    <th class="text-center">Operaciónes</th>
                                                    <th>Fecha Proceso</th>
                                                    <th>Tipo Proceso</th>
                                                    <th>Turno </th>
                                                    <th>CSG Productor</th>
                                                    <th>Nombre Productor</th>
                                                    <th>Especie</th>
                                                    <th>Variedad</th>
                                                    <th>Kg. Neto Entrada</th>
                                                    <th>Kg. Neto Expo.</th>
                                                    <th>Kg. Deshi. </th>
                                                    <th>Kg. Con Deshi. </th>
                                                    <th>Kg. IQF</th>
                                                    <th>Kg. Merma/Desecho</th>
                                                    <th>Kg. Industrial</th>
                                                    <th>Kg. Diferencia</th>
                                                    <th>% Exportación</th>
                                                    <th>% Deshitación</th>
                                                    <th>% Industrial</th>
                                                    <th>% Total</th>     
                                                    <th>PT Embolsado</th>                                                     
                                                    <th>Fecha Ingreso</th>
                                                    <th>Fecha Modificacion</th>
                                                    <th>Empresa</th>
                                                    <th>Planta</th>
                                                    <th>Temporada</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYPROCESO as $r) : ?>

                                                    <?php
                                                    $ARRAYTOTALENVASESEMBOLSADO=$PROCESO_ADO->obtenerTotalEnvasesEmbolsado($r['ID_PROCESO']);
                                                    $ENVASESEMBOLSADO=$ARRAYTOTALENVASESEMBOLSADO[0]["ENVASE"];
                                                    $ARRAYEXISMATERIPRIMAPROCESO = $EXIMATERIAPRIMA_ADO->obtenerTotalesProceso2($r['ID_PROCESO']);
                                                    if ($ARRAYEXISMATERIPRIMAPROCESO) {
                                                        $NETOENTRADA = $ARRAYEXISMATERIPRIMAPROCESO[0]['NETOSF'];
                                                    }

                                                    $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
                                                    if ($ARRAYVERVESPECIESID) {
                                                        $NOMBREVESPECIES = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                        $ARRAYVERESPECIESID = $ESPECIES_ADO->verEspecies($ARRAYVERVESPECIESID[0]['ID_ESPECIES']);
                                                        if ($ARRAYVERVESPECIESID) {
                                                            $NOMBRESPECIES = $ARRAYVERESPECIESID[0]['NOMBRE_ESPECIES'];
                                                        } else {
                                                            $NOMBRESPECIES = "Sin Datos";
                                                        }
                                                    } else {
                                                        $NOMBREVESPECIES = "Sin Datos";
                                                        $NOMBRESPECIES = "Sin Datos";
                                                    }
                                                    $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                    if ($ARRAYVERPRODUCTORID) {

                                                        $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                        $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                    } else {
                                                        $CSGPRODUCTOR = "Sin Datos";
                                                        $NOMBREPRODUCTOR = "Sin Datos";
                                                    }

                                                    $ARRAYTPROCESO = $TPROCESO_ADO->verTproceso($r['ID_TPROCESO']);
                                                    if ($ARRAYTPROCESO) {
                                                        $TPROCESO = $ARRAYTPROCESO[0]['NOMBRE_TPROCESO'];
                                                    } else {
                                                        $TPROCESO = "Sin Datos";
                                                    }
                                                    if ($r['TURNO']) {
                                                        if ($r['TURNO'] == "1") {
                                                            $TURNO = "Dia";
                                                        }
                                                        if ($r['TURNO'] == "2") {
                                                            $TURNO = "Noche";
                                                        }
                                                    } else {
                                                        $TURNO = "Sin Datos";
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
                                                        <td> <?php echo $r['NUMERO_PROCESO']; ?> </td>
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
                                                                            <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_PROCESO']; ?>" />
                                                                            <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroProceso" />
                                                                            <input type="hidden" class="form-control" placeholder="URL" id="URLO" name="URLO" value="listarProceso" />                                                                      
                                                                            <span href="#" class="dropdown-item" data-toggle="tooltip" title="Informe">
                                                                                <button type="button" class="btn  btn-danger  btn-block" id="defecto" <?php if ($r['ESTADO'] == "1") { echo "disabled"; } ?> name="informe" title="Informe" Onclick="abrirPestana('../documento/informeProceso.php?parametro=<?php echo $r['ID_PROCESO']; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                                                    <i class="fa fa-file-pdf-o"></i> Informe
                                                                                </button>
                                                                            </span>
                                                                            <span href="#" class="dropdown-item" data-toggle="tooltip" title="Tarjas">
                                                                                <button type="button" class="btn  btn-danger btn-block" id="defecto" name="tarjas" title="Tarjas" Onclick="abrirPestana('../documento/informeTarjasProceso.php?parametro=<?php echo $r['ID_PROCESO']; ?>'); ">
                                                                                    <i class="fa fa-file-pdf-o"></i> Tarjas
                                                                                </button>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td><?php echo $r['FECHA']; ?></td>
                                                        <td><?php echo $TPROCESO; ?></td>
                                                        <td><?php echo $TURNO; ?> </td>
                                                        <td><?php echo $CSGPRODUCTOR; ?></td>
                                                        <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                        <td><?php echo $NOMBRESPECIES; ?></td>
                                                        <td><?php echo $NOMBREVESPECIES; ?></td>
                                                        <td><?php echo $r['ENTRADA']; ?></td>
                                                        <td><?php echo $r['NETO']; ?></td>
                                                        <td><?php echo $r['EXPORTACION']-$r['NETO']; ?></td>
                                                        <td><?php echo $r['EXPORTACION']; ?></td>
                                                        <td><?php echo $r['INDUSTRIALSC']; ?></td>
                                                        <td><?php echo $r['INDUSTRIALNC']; ?></td>
                                                        <td><?php echo $r['INDUSTRIAL']; ?></td>
                                                        <td><?php echo number_format( $r['ENTRADA']-$r['EXPORTACION']-$r['INDUSTRIAL'],2,".",""); ?></td>
                                                        
                                                        <td><?php echo $r['PDEXPORTACION_PROCESO']; ?></td>
                                                        <td><?php echo $r['PDEXPORTACIONCD_PROCESO']-$r['PDEXPORTACION_PROCESO']; ?></td>
                                                        <td><?php echo $r['PDINDUSTRIAL_PROCESO']; ?></td>
                                                        <td><?php echo number_format($r['PORCENTAJE_PROCESO'], 2, ",", ".");  ?></td>

                                                        <td><?php echo $ENVASESEMBOLSADO; ?></td>
                                                        <td><?php echo $r['INGRESO']; ?></td>
                                                        <td><?php echo $r['MODIFICACION']; ?></td>
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
                            <div class="btn-toolbar mb-3" role="toolbar" aria-label="Datos generales">
                                <div class="form-row align-items-center" role="group" aria-label="Datos">
                                    <div class="col-auto">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Total Kg. Neto Entrada</div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Total Kg. Neto Entrada" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALNETOENTRADA; ?>" disabled />
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Total Kg. Neto Expo</div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Total Kg. Neto Expo" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALNETO; ?>" disabled />
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Total Kg. Con Deshi.</div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Total Kg. Con Deshi." id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALEXPORTACION; ?>" disabled />
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Total Kg. Industrial</div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Total Kg. Industrial" id="TOTALBRUTOV" name="TOTALBRUTOV" value="<?php echo $TOTALINDUSTRIAL; ?>" disabled />
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

        <?php include_once "../config/footer.php"; ?>
        <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <?php include_once "../config/urlBase.php"; ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                showConfirmButton: true
            })

            Toast.fire({
                icon: "info",
                title: "Informacion importante",
                html: "<label>Los <b>procesos</b> Abiertos tienen que ser <b>Cerrados</b> para no afectar las operaciones posteriores.</label>"
            })
        </script>
</body>

</html>