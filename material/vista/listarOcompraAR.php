<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/RESPONSABLE_ADO.php';
include_once '../controlador/PROVEEDOR_ADO.php';
include_once '../controlador/FPAGO_ADO.php';
include_once '../controlador/TMONEDA_ADO.php';

include_once '../controlador/OCOMPRA_ADO.php';
include_once '../controlador/MOCOMPRA_ADO.php';

include_once '../modelo/OCOMPRA.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$RESPONSABLE_ADO =  new RESPONSABLE_ADO();
$PROVEEDOR_ADO =  new PROVEEDOR_ADO();
$FPAGO_ADO =  new FPAGO_ADO();
$TMONEDA_ADO =  new TMONEDA_ADO();

$OCOMPRA_ADO =  new OCOMPRA_ADO();
$MOCOMPRA_ADO =  new MOCOMPRA_ADO();


//INIICIALIZAR MODELO
$OCOMPRA =  new OCOMPRA();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$TOTALCANTIDAD = "";
$TOTCALVALOR = "";


//INICIALIZAR ARREGLOS
$ARRAYOCOMPRA = "";
$ARRAYOCOMPRATOTALES = "";
$ARRAYVEREMPRESA = "";


$ARRAYVERREPONSBALE = "";
$ARRAYVERPROVEEDOR = "";
$ARRAYVERFPAGO = "";
$ARRAYVERTMONEDA = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {
    $ARRAYOCOMPRA = $OCOMPRA_ADO->listarOcompraPorEmpresaTemporadaCBX($EMPRESAS,  $TEMPORADAS);
    $ARRAYOCOMPRATOTALES = $OCOMPRA_ADO->obtenerTotalesOcompraPorEmpresaTemporada2CBX($EMPRESAS,  $TEMPORADAS);


    $TOTALCANTIDAD = $ARRAYOCOMPRATOTALES[0]['CANTIDAD'];
    $TOTCALVALOR = $ARRAYOCOMPRATOTALES[0]['VALOR_TOTAL'];
}
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrLP.php";

if (isset($_REQUEST['APROBARURL'])) { 
    $OCOMPRA->__SET('ID_OCOMPRA', $_REQUEST['ID']);
    $OCOMPRA->__SET('ID_USUARIOM', $IDUSUARIOS);
    $OCOMPRA_ADO->aprobado($OCOMPRA);
    $_SESSION["urlO"] = $_REQUEST['URLO'];
    echo "<script type='text/javascript'> location.href ='". $_REQUEST['URLA'].".php?op';</script>";
}
if (isset($_REQUEST['RECHAZARURL'])) {
    $_SESSION["parametro"] = $_REQUEST['ID'];
    $_SESSION["parametro1"] = "";    
    $_SESSION["urlO"] = $_REQUEST['URLO'];
    echo "<script type='text/javascript'> location.href ='". $_REQUEST['URLM'].".php?op';</script>";
}
if (isset($_REQUEST['COMPLETAURL'])) { 
    $OCOMPRA->__SET('ID_OCOMPRA', $_REQUEST['ID']);
    $OCOMPRA->__SET('ID_USUARIOM', $IDUSUARIOS);
    $OCOMPRA_ADO->completatado($OCOMPRA);
    $_SESSION["urlO"] = $_REQUEST['URLO'];
    echo "<script type='text/javascript'> location.href ='". $_REQUEST['URLA'].".php?op';</script>";
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Aprobar/Rechazar</title>
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


                    //     document.form_reg_dato.HORAOCOMPRA.value = horaImprimible;
                    document.fechahora.fechahora.value = fechaImprimible + " " + horaImprimible;
                    setTimeout("mueveReloj()", 1000);
                }
                /*
                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }*/
                function abrirPestana(url) {
                    var win = window.open(url, '_blank');
                    win.focus();
                }
                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE OCOMPRA
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
                            <h3 class="page-title">Aprobar/Rechazar</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Administración</li>
                                        <li class="breadcrumb-item" aria-current="page">Orden Compra</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Aprobar/Rechazar </a>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <?php include_once "../config/verIndicadorEconomico.php"; ?>
                    </div>
                </div>
                <!-- Main content -->
                <section class="content">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table id="modulo" class="table table-hover " style="width: 150%;">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Número Orden </th>
                                                    <th>Número Interno </th>
                                                    <th>Estado</th>
                                                    <th>Operaciónes</th>
                                                    <th>Estado Orden</th>
                                                    <th>Fecha Orden </th>
                                                    <th>Proveedor</th>
                                                    <th>Cantidad Producto</th>
                                                    <th>Total Valor</th>
                                                    <th>Formato Pago</th>
                                                    <th>Tipo Moneda</th>
                                                    <th>Tipo Cambio</th>
                                                    <th>Reponsable</th>
                                                    <th>Fecha Ingreso</th>
                                                    <th>Fecha Modificación</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYOCOMPRA as $r) : ?>

                                                    <?php
                                                    if ($r['ESTADO_OCOMPRA'] == "1") {
                                                        $ESTADOOCOMPRA = "Creado";
                                                    } else  if ($r['ESTADO_OCOMPRA'] == "2") {
                                                        $ESTADOOCOMPRA = "Pendiente Aprobación";
                                                    } else   if ($r['ESTADO_OCOMPRA'] == "3") {
                                                        $ESTADOOCOMPRA = "Rechazado";
                                                    } else  if ($r['ESTADO_OCOMPRA'] == "4") {
                                                        $ESTADOOCOMPRA = "Aprobado";
                                                    } else  if ($r['ESTADO_OCOMPRA'] == "5") {
                                                        $ESTADOOCOMPRA = "Orden Completada";
                                                    } else {
                                                        $ESTADOOCOMPRA = "Sin Datos";
                                                    }
                                                    $ARRAYVERPROVEEDOR = $PROVEEDOR_ADO->verProveedor($r['ID_PROVEEDOR']);
                                                    if ($ARRAYVERPROVEEDOR) {
                                                        $NOMBREPROVEEDOR= $ARRAYVERPROVEEDOR[0]['NOMBRE_PROVEEDOR'];
                                                    }else{
                                                        $NOMBREPROVEEDOR="Sin Datos";
                                                    }
                                                    $ARRAYVERFPAGO = $FPAGO_ADO->verFpago($r['ID_FPAGO']);
                                                    if ($ARRAYVERFPAGO) {
                                                        $NOMBREFPAGO = $ARRAYVERFPAGO[0]['NOMBRE_FPAGO'];
                                                    }else{
                                                        $NOMBREFPAGO="Sin Datos";
                                                    }
                                                    $ARRAYVERTMONEDA = $TMONEDA_ADO->verTmoneda($r['ID_TMONEDA']);
                                                    if ($ARRAYVERTMONEDA) {
                                                        $NOMBRETMONEDA= $ARRAYVERTMONEDA[0]['NOMBRE_TMONEDA'];
                                                    }else{
                                                        $NOMBRETMONEDA="Sin Datos";
                                                    }
                                                    $ARRAYVERREPONSBALE = $RESPONSABLE_ADO->verResponsable($r['ID_RESPONSABLE']);
                                                    if ($ARRAYVERREPONSBALE) {
                                                        $NOMBRERESPONSABLE= $ARRAYVERREPONSBALE[0]['NOMBRE_RESPONSABLE'];
                                                    }else{
                                                        $NOMBRERESPONSABLE="Sin Datos";
                                                    }
                                                    $ARRAYMOCOMPRA=$MOCOMPRA_ADO->listarMcompraOcompraCBX($r['ID_OCOMPRA']);
                                                    ?>

                                                    <tr class="text-center">
                                                        <td>
                                                            <a href="#" class="text-warning hover-warning">
                                                                <?php echo $r['NUMERO_OCOMPRA']; ?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="text-warning hover-warning">
                                                                <?php echo $r['NUMEROI_OCOMPRA']; ?>
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
                                                            <form method="post" id="form1" name="form1">
                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_OCOMPRA']; ?>" />
                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroOcompraAR" />
                                                                <input type="hidden" class="form-control" placeholder="URLO" id="URLO" name="URLO" value="listarOcompraAR" />
                                                                <input type="hidden" class="form-control" placeholder="URLO" id="URLA" name="URLA" value="listarOcompraAR" />
                                                                <input type="hidden" class="form-control" placeholder="URLM" id="URLM" name="URLM" value="registroMocompra" />
                                                                <input type="hidden" class="form-control" placeholder="URLMR" id="URLMR" name="URLMR" value="listarMocompra" />
                                                                <div class="btn-group btn-rounded btn-block" role="group" aria-label="Operaciones Detalle">
                                                                    <button type="button" class="btn btn-danger  btn-sm" data-toggle="tooltip" id="defecto" name="informe" title="Informe" Onclick="abrirPestana('../documento/informeOcompra.php?parametro=<?php echo $r['ID_OCOMPRA']; ?>'); ">
                                                                        <i class="fa fa-file-pdf-o"></i>
                                                                    </button>
                                                                    <?php if ($r['ESTADO_OCOMPRA'] == "2") { ?>
                                                                        <button type="submit" class="btn btn-success btn-sm" data-toggle="tooltip" id="APROBARURL" name="APROBARURL" title="Aprobar">
                                                                            <i class="fa fa-check"></i>
                                                                        </button>

                                                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" id="RECHAZARURL" name="RECHAZARURL" title="Rechazar">
                                                                            <i class="fa fa-close"></i>
                                                                        </button>
                                                                    <?php } ?>                                                                    
                                                                    <?php if ($r['ESTADO_OCOMPRA'] == "4") { ?>
                                                                        <button type="submit" class="btn btn-warning btn-sm" data-toggle="tooltip" id="COMPLETAURL" name="COMPLETAURL" title="Orden Completada">
                                                                             <i class="mdi mdi-folder-remove"></i>                                                                  
                                                                        </button>
                                                                    <?php } ?>
                                                                    <?php if ($ARRAYMOCOMPRA) { ?>
                                                                        <button type="submit" class="btn btn-info btn-sm" data-toggle="tooltip" id="VERMOTIVOSRURL" name="VERMOTIVOSRURL" title="Ver Motivos">
                                                                            <i class="ti-eye"></i>
                                                                        </button>
                                                                    <?php } ?>
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td><?php echo $ESTADOOCOMPRA; ?></td>
                                                        <td><?php echo $r['FECHA']; ?></td>
                                                        <td><?php echo $NOMBREPROVEEDOR; ?></td>
                                                        <td><?php echo $r['CANTIDAD']; ?></td>
                                                        <td><?php echo $r['TOTAL_VALOR']; ?></td>
                                                        <td><?php echo $NOMBREFPAGO; ?></td>
                                                        <td><?php echo $NOMBRETMONEDA; ?></td>
                                                        <td><?php echo $r['TCAMBIO_OCOMPRA']; ?></td>
                                                        <td><?php echo $NOMBRERESPONSABLE; ?></td>
                                                        <td><?php echo $r['INGRESO']; ?></td>
                                                        <td><?php echo $r['MODIFICACION']; ?></td>

                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="btn-toolbar" role="toolbar" aria-label="datos generales">
                                    <div class="form-row align-items-center" role="group" aria-label="datos">
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Cantidad </div>
                                                </div>
                                                <!-- input -->
                                                <input type="text" class="form-control" placeholder="Total Cantidad" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALCANTIDAD; ?>" disabled />
                                                <!-- /input -->
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Valor </div>
                                                </div>
                                                <!-- input -->
                                                <input type="text" class="form-control" placeholder="Total Valor" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTCALVALOR; ?>" disabled />
                                                <!-- /input -->
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
</body>

</html>