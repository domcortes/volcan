<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/RESPONSABLE_ADO.php';
include_once '../controlador/PROVEEDOR_ADO.php';
include_once '../controlador/FPAGO_ADO.php';
include_once '../controlador/TMONEDA_ADO.php';

include_once '../controlador/OCOMPRA_ADO.php';

include_once '../modelo/OCOMPRA.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$RESPONSABLE_ADO =  new RESPONSABLE_ADO();
$PROVEEDOR_ADO =  new PROVEEDOR_ADO();
$FPAGO_ADO =  new FPAGO_ADO();
$TMONEDA_ADO =  new TMONEDA_ADO();

$OCOMPRA_ADO =  new OCOMPRA_ADO();


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
    $ARRAYOCOMPRA = $OCOMPRA_ADO->listarOcompraPorEmpresaTemporada2CBX($EMPRESAS,  $TEMPORADAS);
    $ARRAYOCOMPRATOTALES = $OCOMPRA_ADO->obtenerTotalesOcompraPorEmpresaTemporada2CBX($EMPRESAS,  $TEMPORADAS);

    $TOTALCANTIDAD = $ARRAYOCOMPRATOTALES[0]['CANTIDAD'];
    $TOTCALVALOR = $ARRAYOCOMPRATOTALES[0]['VALOR_TOTAL'];
}
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrLP.php";



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agrupado Orden</title>
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
                            <h3 class="page-title">Agrupado Orden</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Administración</li>
                                        <li class="breadcrumb-item" aria-current="page">Orden Compra</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="listarOcompra.php"> Agrupado Orden </a>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="right-title">
                            <div class="d-flex mt-10 justify-content-end">
                                <div class="d-lg-flex mr-20 ml-10 d-none">
                                    <div class="chart-text mr-10">
                                        <h6 class="mb-0"><small></small></h6>
                                        <h4 class="mt-0 text-primary">
                                            <div id="DolarO"></div>
                                        </h4>
                                    </div>
                                </div>
                                <div class="d-lg-flex mr-20 ml-10 d-none">
                                    <div class="chart-text mr-10">
                                        <h6 class="mb-0"><small></small></h6>
                                        <h4 class="mt-0 text-danger">
                                            <div id="Euro"></div>
                                        </h4>
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
                                                <tr>
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
                                                    <tr class="center">
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
                                                            <div class="list-icons d-inline-flex">
                                                                <div class="list-icons-item dropdown">
                                                                    <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown">
                                                                        <i class="glyphicon glyphicon-cog"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <form method="post" id="form1">
                                                                            <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_OCOMPRA']; ?>" />
                                                                            <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroOcompra" />
                                                                            <input type="hidden" class="form-control" placeholder="URLO" id="URLO" name="URLO" value="listarOcompra" />
                                                                            <button type="submit" class="btn btn-rounded btn-outline-info btn-sm " id="VERURL" name="VERURL" <?php if ($r['ESTADO'] == "1") {
                                                                                                                                                                                    echo "disabled";
                                                                                                                                                                                } ?>>
                                                                                <i class="ti-eye"></i>
                                                                            </button>Ver
                                                                            <br>
                                                                            <button type="submit" class="btn btn-rounded btn-outline-warning btn-sm" id="EDITARURL" name="EDITARURL" <?php if ($r['ESTADO'] == "0") {
                                                                                                                                                                                            echo "disabled";
                                                                                                                                                                                        } ?>>
                                                                                <i class="ti-pencil-alt"></i>
                                                                            </button>Editar
                                                                        </form>
                                                                        <form method="post" id="form4">
                                                                            <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_OCOMPRA']; ?>" />
                                                                            <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="listarMocompra" />
                                                                            <input type="hidden" class="form-control" placeholder="URLO" id="URLO" name="URLO" value="listarOcompra" />
                                                                            <button type="submit" class="btn btn-rounded btn-outline-info btn-sm " id="VERMOTIVOSRURL" name="VERMOTIVOSRURL" <?php if ($r['ESTADO_OCOMPRA'] != "3") {
                                                                                                                                                                                                    echo "disabled";
                                                                                                                                                                                                } ?>>
                                                                                <i class="ti-eye"></i>
                                                                            </button>Ver Motivos
                                                                        </form>
                                                                        <button type="button" class="btn btn-rounded  btn-danger btn-outline btn-sm" id="defecto" name="informe" title="Informe" Onclick="abrirPestana('../documento/informeOcompra.php?parametro=<?php echo $r['ID_OCOMPRA']; ?>'); ">
                                                                            <i class="fa fa-file-pdf-o"></i>
                                                                        </button>Informe
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($r['ESTADO_OCOMPRA'] == "1") {
                                                                echo "Creado";
                                                            }
                                                            if ($r['ESTADO_OCOMPRA'] == "2") {
                                                                echo "Pendiente Aprobación";
                                                            }
                                                            if ($r['ESTADO_OCOMPRA'] == "3") {
                                                                echo "Rechazado";
                                                            }
                                                            if ($r['ESTADO_OCOMPRA'] == "4") {
                                                                echo "Aprobado";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $r['FECHAF']; ?></td>
                                                        <td>
                                                            <?php
                                                            $ARRAYVERPROVEEDOR = $PROVEEDOR_ADO->verProveedor($r['ID_PROVEEDOR']);
                                                            echo $ARRAYVERPROVEEDOR[0]['NOMBRE_PROVEEDOR'];
                                                            ?>
                                                        </td>
                                                        <td><?php echo $r['CANTIDAD']; ?></td>
                                                        <td><?php echo $r['TOTAL_VALOR']; ?></td>
                                                        <td>
                                                            <?php
                                                            $ARRAYVERFPAGO = $FPAGO_ADO->verFpago($r['ID_FPAGO']);
                                                            echo $ARRAYVERFPAGO[0]['NOMBRE_FPAGO'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $ARRAYVERTMONEDA = $TMONEDA_ADO->verTmoneda($r['ID_TMONEDA']);
                                                            echo $ARRAYVERTMONEDA[0]['NOMBRE_TMONEDA'];
                                                            ?>
                                                        </td>
                                                        <td><?php echo $r['TCAMBIO_OCOMPRA']; ?></td>
                                                        <td>
                                                            <?php
                                                            $ARRAYVERREPONSBALE = $RESPONSABLE_ADO->verResponsable($r['ID_RESPONSABLE']);
                                                            echo $ARRAYVERREPONSBALE[0]['NOMBRE_RESPONSABLE'];
                                                            ?>
                                                        </td>
                                                        <td><?php echo $r['INGRESOF']; ?></td>
                                                        <td><?php echo $r['MODIFICACIONF']; ?></td>

                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 col-xs-8">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Total Cantidad Producto </label>
                                            <input type="text" class="form-control" placeholder="Total Valor" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALCANTIDAD; ?>" disabled />
                                        </div>
                                    </div>
                                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 col-xs-2">
                                        <div class="form-group">
                                            <label>Total Valor Producto </label>
                                            <input type="text" class="form-control" placeholder="Total Valor" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTCALVALOR; ?>" disabled />
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