<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/BODEGA_ADO.php';
include_once '../controlador/PRODUCTO_ADO.php';
include_once '../controlador/TUMEDIDA_ADO.php';
include_once '../controlador/DRECEPCIONE_ADO.php';

include_once '../controlador/INVENTARIOE_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$BODEGA_ADO =  new BODEGA_ADO();
$PRODUCTO_ADO =  new PRODUCTO_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();
$DRECEPCIONE_ADO =  new DRECEPCIONE_ADO();

$INVENTARIOE_ADO =  new INVENTARIOE_ADO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$CONTADOR = 0;
$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$TOTALCANTIDAD = "";
$TOTCALVALOR = "";

$FECHADESDE = "";
$FECHAHASTA = "";
$PRODUCTOR = "";

$NUMEROGUIA = "";

//INICIALIZAR ARREGLOS
$ARRAYINVENTARIO = "";
$ARRAYINVENTARIOTOTALES = "";


$ARRAYVERBODEGA = "";
$ARRAYVERTUMEDIDA = "";
$ARRAYVERPRODUCTO = "";
$ARRAYDRECEPCION = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {
    $ARRAYINVENTARIO = $INVENTARIOE_ADO->listarInventarioPorEmpresaPlantaTemporada2CBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $ARRAYINVENTARIOTOTALES = $INVENTARIOE_ADO->obtenerTotalesInventarioPorEmpresaPlantaTemporada2CBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $TOTALCANTIDAD = $ARRAYINVENTARIOTOTALES[0]['CANTIDAD'];
}
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrl.php";
include_once "../config/reporteUrl.php";


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Inventario Envases</title>
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


                    //     document.form_reg_dato.HORAINVENTARIO.value = horaImprimible;
                    document.fechahora.fechahora.value = fechaImprimible + " " + horaImprimible;
                    setTimeout("mueveReloj()", 1000);
                }
                /*
                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }*/

                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE INVENTARIO
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
                            <h3 class="page-title">Inventario Envases</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Recepción</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="listarInventarioeRecepcion.php"> Inventario Envases </a>
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
                                        <table id="existencia" class="table table-hover " style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Número</th>
                                                    <th>Estado</th>
                                                    <th>Tipo Recepción</th>
                                                    <th>Código Producto</th>
                                                    <th>Producto</th>
                                                    <th>Unidad Medida</th>
                                                    <th>Total Cantidad</th>
                                                    <th>Valor Unitario</th>
                                                    <th>Fecha Ingreso</th>
                                                    <th>Fecha Modificación</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYINVENTARIO as $r) : ?>
                                                    <?php $CONTADOR = $CONTADOR + 1 ?>
                                                    <tr class="center">
                                                        <td>
                                                            <a href="#" class="text-warning hover-warning">
                                                                <?php echo $CONTADOR; ?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($r['ESTADO'] == "1") {
                                                                echo "Ingresando";
                                                            }
                                                            if ($r['ESTADO'] == "2") {
                                                                echo "Vigente";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($r['TRECEPCION'] == "1") {
                                                                echo "Desde Proveedor";
                                                            }
                                                            if ($r['TRECEPCION'] == "2") {
                                                                echo "Desde Productor";
                                                            }
                                                            if ($r['TRECEPCION'] == "3") {
                                                                echo "Planta Externa";
                                                            }
                                                            if ($r['TRECEPCION'] == "4") {
                                                                echo "Inter Externa";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($r['ID_PRODUCTO']);
                                                            if ($ARRAYVERPRODUCTO) {
                                                                echo $ARRAYVERPRODUCTO[0]['CODIGO_PRODUCTO'];
                                                            } else {
                                                                echo "Sin Producto";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($ARRAYVERPRODUCTO) {
                                                                echo $ARRAYVERPRODUCTO[0]['NOMBRE_PRODUCTO'];
                                                            } else {
                                                                echo "Sin Producto";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($r['ID_TUMEDIDA']);
                                                            if ($ARRAYVERTUMEDIDA) {
                                                                echo $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
                                                            } else {
                                                                echo "Sin Unidad Medida";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $r['CANTIDAD']; ?></td>
                                                        <td>
                                                            <?php
                                                            $ARRAYDRECEPCION = $DRECEPCIONE_ADO->listarDrecepcionPorRecepcionProductoTumedida2CBX($r['ID_RECEPCION'], $r['ID_PRODUCTO'], $r['ID_TUMEDIDA']);
                                                            if ($ARRAYDRECEPCION) {
                                                                echo $ARRAYDRECEPCION[0]["VALOR_UNITARIO"];
                                                            } else {
                                                                echo "Sin Datos";
                                                            }
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
                                    <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 col-xs-10">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 col-xs-2">
                                        <div class="form-group">
                                            <label>Total Cantidad </label>
                                            <input type="text" class="form-control" placeholder="Total Cantidad" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALCANTIDAD; ?>" disabled />
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