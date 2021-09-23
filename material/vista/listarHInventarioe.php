<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/BODEGA_ADO.php';
include_once '../controlador/PRODUCTO_ADO.php';
include_once '../controlador/TUMEDIDA_ADO.php';
include_once '../controlador/TRANSPORTE_ADO.php';
include_once '../controlador/CONDUCTOR_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/CLIENTE_ADO.php';
include_once '../controlador/PROVEEDOR_ADO.php';

include_once '../controlador/DESPACHOE_ADO.php';
include_once '../controlador/RECEPCIONE_ADO.php';
include_once '../controlador/INVENTARIOE_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$BODEGA_ADO =  new BODEGA_ADO();
$PRODUCTO_ADO =  new PRODUCTO_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();
$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
$PROVEEDOR_ADO =  new PROVEEDOR_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$CLIENTE_ADO =  new CLIENTE_ADO();

$DESPACHOE_ADO =  new DESPACHOE_ADO();
$RECEPCIONE_ADO =  new RECEPCIONE_ADO();
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
    $ARRAYINVENTARIO = $INVENTARIOE_ADO->listarHinventarioPorEmpresaPlantaTemporada2CBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
}
include_once "../config/validarDatosUrl.php";
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
                                        <li class="breadcrumb-item" aria-current="page">Historial</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Inventario Envases </a>
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
                                        <table id="hexistencia" class="table table-hover " style="width: 100%;">
                                            <thead>
                                                <tr class="text-left">
                                                    <th>Código Producto</th>
                                                    <th>Producto</th>
                                                    <th>Unidad Medida</th>

                                                    <th>Tipo Movimiento</th>
                                                    <th>Número Documento</th>
                                                    <th>Fecha Movimiento</th>
                                                    <th>Transporte</th>
                                                    <th>Conductor</th>
                                                    <th>Patente Camión</th>
                                                    <th>Origen </th>
                                                    <th>Destino </th>

                                                    <th>Entrada</th>
                                                    <th>Salida</th>
                                                    <th>Empresa</th>
                                                    <th>Planta</th>
                                                    <th>Temporada</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYINVENTARIO as $r) : ?>

                                                    <?php
                                                    $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($r['ID_PRODUCTO']);
                                                    if ($ARRAYVERPRODUCTO) {
                                                        $CODIGOPRODUCTO = $ARRAYVERPRODUCTO[0]['CODIGO_PRODUCTO'];
                                                        $NOMBREPRODUCTO = $ARRAYVERPRODUCTO[0]['NOMBRE_PRODUCTO'];
                                                    } else {
                                                        $CODIGOPRODUCTO = "Sin Datos";
                                                        $NOMBREPRODUCTO = "Sin Datos";
                                                    }
                                                    $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($r['ID_TUMEDIDA']);
                                                    if ($ARRAYVERTUMEDIDA) {
                                                        $NOMBRETUMEDIDA = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
                                                    } else {
                                                        $NOMBRETUMEDIDA = "Sin Datos";
                                                    }
                                                    $ARRAYRECEPCION = $RECEPCIONE_ADO->verRecepcion2($r['ID_RECEPCION']);
                                                    $ARRAYDESPACHO = $DESPACHOE_ADO->verDespachoe2($r['ID_DESPACHO']);
                                                    if ($ARRAYRECEPCION) {
                                                        $NUMERODOCUMENTO = $ARRAYRECEPCION[0]['NUMERO_RECEPCION'];
                                                        $FECHAOPERACION = $ARRAYRECEPCION[0]['FECHA'];
                                                        $TOPERACION = $ARRAYRECEPCION[0]['TRECEPCION'];
                                                        $TRANSPORTE = $ARRAYRECEPCION[0]['ID_TRANSPORTE'];
                                                        $CONDUCTOR = $ARRAYRECEPCION[0]['ID_CONDUCTOR'];
                                                        $PATENTECAMION = $ARRAYRECEPCION[0]['PATENTE_CAMION'];                                                        
                                                        $ARRAYVERTRANPORTE = $TRANSPORTE_ADO->verTransporte($TRANSPORTE);
                                                        if ($ARRAYVERTRANPORTE) {
                                                            $NOMBRETRASPORTE = $ARRAYVERTRANPORTE[0]["NOMBRE_TRANSPORTE"];
                                                        }
                                                        $ARRAYVERCONDUCTOR = $CONDUCTOR_ADO->verConductor($CONDUCTOR);
                                                        if ($ARRAYVERCONDUCTOR) {
                                                            $NOMBRECONDUCTOR = $ARRAYVERCONDUCTOR[0]["NOMBRE_CONDUCTOR"];
                                                        }
                                                        $ARRAYVERBODEGA = $BODEGA_ADO->verBodega($ARRAYRECEPCION[0]['ID_BODEGA']);
                                                        if ($ARRAYVERBODEGA) {
                                                            $DESTINO = $ARRAYVERBODEGA[0]['NOMBRE_BODEGA'];
                                                        }
                                                        if ($TOPERACION == "1") {
                                                            $NOMBREOPERACION = "Desde Proveedor";
                                                            $ARRAYPROVEEDOR = $PROVEEDOR_ADO->verProveedor($ARRAYRECEPCION[0]["ID_PROVEEDOR"]);
                                                            $ORIGEN = $ARRAYPROVEEDOR[0]["NOMBRE_PROVEEDOR"];
                                                        } else if ($TOPERACION == "2") {
                                                            $NOMBREOPERACION = "Desde Productor";
                                                            $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($ARRAYRECEPCION[0]["ID_PRODUCTOR"]);
                                                            $DESTINO = $ARRAYPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
                                                        } else if ($TOPERACION == "3") {
                                                            $NOMBREOPERACION = "Desde Planta Externa";
                                                            $ARRAYPLANTAEXTERNA = $PLANTA_ADO->verPlanta($ARRAYRECEPCION[0]["ID_PLANTA2"]);
                                                            $DESTINO = $ARRAYPLANTAEXTERNA[0]["NOMBRE_PLANTA"];
                                                        }
                                                    } else if ($ARRAYDESPACHO) {
                                                        $NUMERODOCUMENTO = $ARRAYDESPACHO[0]['NUMERO_DESPACHO'];
                                                        $FECHAOPERACION = $ARRAYDESPACHO[0]['FECHA'];
                                                        $TOPERACION = $ARRAYDESPACHO[0]['TDESPACHO'];
                                                        $TRANSPORTE = $ARRAYDESPACHO[0]['ID_TRANSPORTE'];
                                                        $CONDUCTOR = $ARRAYDESPACHO[0]['ID_CONDUCTOR'];
                                                        $PATENTECAMION = $ARRAYDESPACHO[0]['PATENTE_CAMION'];
                                                        $ARRAYVERTRANPORTE = $TRANSPORTE_ADO->verTransporte($TRANSPORTE);
                                                        if ($ARRAYVERTRANPORTE) {
                                                            $NOMBRETRASPORTE = $ARRAYVERTRANPORTE[0]["NOMBRE_TRANSPORTE"];
                                                        }
                                                        $ARRAYVERCONDUCTOR = $CONDUCTOR_ADO->verConductor($CONDUCTOR);
                                                        if ($ARRAYVERCONDUCTOR) {
                                                            $NOMBRECONDUCTOR = $ARRAYVERCONDUCTOR[0]["NOMBRE_CONDUCTOR"];
                                                        }
                                                        $ARRAYVERBODEGA = $BODEGA_ADO->verBodega($r['ID_BODEGA']);
                                                        if ($ARRAYVERBODEGA) {
                                                            $ORIGEN = $ARRAYVERBODEGA[0]['NOMBRE_BODEGA'];
                                                        }
                                                        $DESTINO = "";
                                                        if ($TOPERACION == "1") {
                                                            $NOMBREOPERACION = " A Sub Bodega";
                                                            $ARRAYVERBODEGA = $BODEGA_ADO->verBodega($ARRAYDESPACHO[0]["ID_BODEGA"]);
                                                            $DESTINO = $ARRAYVERBODEGA[0]["NOMBRE_BODEGA"];
                                                        } else
                                                          if ($TOPERACION == "2") {
                                                            $NOMBREOPERACION = "Interplanta";
                                                            $ARRAYPLANTAINTERNA = $PLANTA_ADO->verPlanta($ARRAYDESPACHO[0]["ID_PLANTA2"]);
                                                            $DESTINO = $ARRAYPLANTAINTERNA[0]["NOMBRE_PLANTA"];
                                                        } else
                                                          if ($TOPERACION == "3") {
                                                            $NOMBREOPERACION = "Devolución a Productor";
                                                            $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($ARRAYDESPACHO[0]["ID_PRODUCTOR"]);
                                                            $DESTINO = $ARRAYPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
                                                        } else
                                                          if ($TOPERACION == "4") {
                                                            $NOMBREOPERACION = "Devolución a Proveedor";
                                                            $ARRAYPROVEEDOR = $PROVEEDOR_ADO->verProveedor($ARRAYDESPACHO[0]["ID_PROVEEDOR"]);
                                                            $DESTINO = $ARRAYPROVEEDOR[0]["NOMBRE_PROVEEDOR"];
                                                        } else
                                                          if ($TOPERACION == "5") {
                                                            $NOMBREOPERACION = "Planta Externa";
                                                            $ARRAYPLANTAEXTERNA = $PLANTA_ADO->verPlanta($ARRAYDESPACHO[0]["ID_PLANTA3"]);
                                                            $DESTINO = $ARRAYPLANTAEXTERNA[0]["NOMBRE_PLANTA"];
                                                        } else
                                                          if ($TOPERACION == "6") {
                                                            $NOMBREOPERACION = "Venta";
                                                            $ARRAYVERCLIENTE = $CLIENTE_ADO->verCliente($ARRAYDESPACHO[0]["ID_CLIENTE"]);
                                                            $DESTINO = $ARRAYVERCLIENTE[0]["NOMBRE_CLIENTE"];
                                                        } else
                                                          if ($TOPERACION == "7") {
                                                            $NOMBREOPERACION = "Regalo";
                                                            $DESTINO = $ARRAYDESPACHO[0]['REGALO_DESPACHO'];
                                                        } else {
                                                            $NOMBREOPERACION = "Sin Datos";
                                                        }
                                                    } else {
                                                        $NUMERODOCUMENTO = "Sin Datos";
                                                        $FECHAOPERACION = "Sin Datos";
                                                        $NOMBREOPERACION = "Sin Datos";
                                                        $PATENTECAMION = "Sin Datos";
                                                        $ORIGEN = "Sin Datos";
                                                        $DESTINO = "Sin Datos";
                                                    }
                                                    $ARRAYVEREMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                    if ($ARRAYVEREMPRESA) {
                                                        $NOMBREEMPRESA = $ARRAYVEREMPRESA[0]['NOMBRE_EMPRESA'];
                                                    } else {
                                                        $NOMBREEMPRESA = "Sin Datos";
                                                    }
                                                    $ARRAYVERPLANTA = $PLANTA_ADO->verPlanta($r['ID_PLANTA']);
                                                    if ($ARRAYVERPLANTA) {
                                                        $NOMBREPLANTA = $ARRAYVERPLANTA[0]['NOMBRE_PLANTA'];
                                                    } else {
                                                        $NOMBREPLANTA = "Sin Datos";
                                                    }
                                                    $ARRAYVERTEMPORADA = $TEMPORADA_ADO->verTemporada($r['ID_TEMPORADA']);
                                                    if ($ARRAYVERTEMPORADA) {
                                                        $NOMBRETEMPORADA = $ARRAYVERTEMPORADA[0]['NOMBRE_TEMPORADA'];
                                                    } else {
                                                        $NOMBRETEMPORADA = "Sin Datos";
                                                    }
                                                    ?>

                                                    <tr class="center">
                                                        <td><?php echo $CODIGOPRODUCTO; ?></td>
                                                        <td><?php echo $NOMBREPRODUCTO; ?></td>
                                                        <td><?php echo $NOMBRETUMEDIDA; ?></td>

                                                        <td><?php echo $NOMBREOPERACION; ?></td>
                                                        <td><?php echo $NUMERODOCUMENTO; ?></td>
                                                        <td><?php echo $FECHAOPERACION; ?></td>
                                                        <td><?php echo $NOMBRETRASPORTE; ?></td>
                                                        <td><?php echo $NOMBRECONDUCTOR; ?></td>
                                                        <td><?php echo $PATENTECAMION; ?></td>
                                                        <td><?php echo $ORIGEN; ?></td>
                                                        <td><?php echo $DESTINO; ?></td>

                                                        <td><?php echo $r['ENTRADA']; ?></td>
                                                        <td><?php echo $r['SALIDA']; ?></td>
                                                        <td><?php echo $NOMBREEMPRESA; ?></td>
                                                        <td><?php echo $NOMBREPLANTA; ?></td>
                                                        <td><?php echo $NOMBRETEMPORADA; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr id="filtro" class="text-left">
                                                    <th>Código Producto</th>
                                                    <th>Producto</th>
                                                    <th>Unidad Medida</th>
                                                    <th>Tipo Movimiento</th>
                                                    <th>Número Documento</th>
                                                    <th>Fecha Movimiento</th>
                                                    <th>Transporte</th>
                                                    <th>Conductor</th>
                                                    <th>Patente Camión</th>
                                                    <th>Origen </th>
                                                    <th>Destino </th>
                                                    <th>Entrada</th>
                                                    <th>Salida</th>
                                                    <th>Empresa</th>
                                                    <th>Planta</th>
                                                    <th>Temporada</th>
                                                </tr>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
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