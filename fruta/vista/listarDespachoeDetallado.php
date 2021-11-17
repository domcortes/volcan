<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/TDOCUMENTO_ADO.php';
include_once '../controlador/TRANSPORTE_ADO.php';
include_once '../controlador/CONDUCTOR_ADO.php';
include_once '../controlador/BODEGA_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/PROVEEDOR_ADO.php';
include_once '../controlador/COMPRADOR_ADO.php';

include_once '../controlador/PRODUCTO_ADO.php';
include_once '../controlador/TUMEDIDA_ADO.php';

include_once '../controlador/OCOMPRA_ADO.php';
include_once '../controlador/INVENTARIOE_ADO.php';
include_once '../controlador/RECEPCIONE_ADO.php';
include_once '../controlador/MGUIAE_ADO.php';
include_once '../controlador/DESPACHOE_ADO.php';
include_once '../controlador/DESPACHOMP_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TDOCUMENTO_ADO = new TDOCUMENTO_ADO();
$TRANSPORTE_ADO = new TRANSPORTE_ADO();
$CONDUCTOR_ADO = new CONDUCTOR_ADO();
$BODEGA_ADO = new BODEGA_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$PROVEEDOR_ADO = new PROVEEDOR_ADO();
$COMPRADOR_ADO = new COMPRADOR_ADO();

$PRODUCTO_ADO = new PRODUCTO_ADO();
$TUMEDIDA_ADO = new TUMEDIDA_ADO();


$OCOMPRA_ADO = new OCOMPRA_ADO();
$INVENTARIOE_ADO = new INVENTARIOE_ADO();
$RECEPCIONE_ADO = new RECEPCIONE_ADO();
$DESPACHOE_ADO = new DESPACHOE_ADO();
$MGUIAE_ADO =  new MGUIAE_ADO();
$DESPACHOMP_ADO =  new DESPACHOMP_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD


$TOTALBRUTO = "";
$TOTALNETO = "";
$TOTALENVASE = "";
$FECHADESDE = "";
$FECHAHASTA = "";

$PRODUCTOR = "";
$NUMEROGUIA = "";

//INICIALIZAR ARREGLOS
$ARRAYDESPACHOPT = "";
$ARRAYDESPACHOPTTOTALES = "";
$ARRAYVEREMPRESA = "";
$ARRAYVERPRODUCTOR = "";
$ARRAYVERTRANSPORTE = "";
$ARRAYVERCONDUCTOR = "";
$ARRAYMGUIAMP = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES



if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {

    $ARRAYDESPACHOPT = $DESPACHOE_ADO->listarDespachoeEmpresaPlantaTemporadaCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $ARRAYDESPACHOPTTOTALES = $DESPACHOE_ADO->obtenerTotalesDespachoeEmpresaPlantaTemporadaCBX2($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $TOTALCANTIDAD = $ARRAYDESPACHOPTTOTALES[0]['CANTIDAD'];
}


include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrLP.php";





?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Detallado Despacho Envases</title>
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

                function abrirPestana(url) {
                    var win = window.open(url, '_blank');
                    win.focus();
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
        <?php include_once "../config/menu.php";
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">Despacho Envases</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Envases </li>
                                        <li class="breadcrumb-item" aria-current="page">Despacho</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Detallado Despacho </a>
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
                                                    <th>Codigo Producto </th>
                                                    <th>Producto </th>
                                                    <th>Cantidad</th>
                                                    <th>Unidad Medida</th>
                                                    <th>Planta</th>
                                                    <th>Bodega</th>
                                                    <th>Número Despacho</th>
                                                    <th>Fecha Despacho </th>
                                                    <th>Tipo Despacho</th>
                                                    <th>Destino Despacho </th>
                                                    <th>Número Documento </th>
                                                    <th>Valor Unitario</th>
                                                    <th>Transporte </th>
                                                    <th>Nombre Conductor </th>
                                                    <th>Patente Camión </th>
                                                    <th>Patente Carro </th>
                                                    <th>Empresa</th>
                                                    <th>Temporada</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYDESPACHOPT as $r) : ?>
                                                    <?php
                                                    if ($r['ESTADO_DESPACHO'] == "1") {
                                                        $ESTADODESPACHO = "Por Confirmar";
                                                    } else  if ($r['ESTADO_DESPACHO'] == "2") {
                                                        $ESTADODESPACHO = "Confirmado";
                                                    } else
                                                    if ($r['ESTADO_DESPACHO'] == "3") {
                                                        $ESTADODESPACHO = "Rechazado";
                                                    } else
                                                    if ($r['ESTADO_DESPACHO'] == "4") {
                                                        $ESTADODESPACHO = "Aprobado";
                                                    } else {
                                                        $ESTADODESPACHO = "Sin Datos";
                                                    }


                                                 
                                                    if ($r['TDESPACHO'] == "1") {
                                                        $TDESPACHO = " A Sub Bodega";
                                                        $ARRAYVERBODEGA = $BODEGA_ADO->verBodega($r["ID_BODEGA"]);
                                                        if ($ARRAYVERBODEGA) {
                                                            $NOMBRDESTINO = $ARRAYVERBODEGA[0]["NOMBRE_BODEGA"];
                                                        } else {
                                                            $NOMBRDESTINO = "Sin Datos";
                                                        }
                                                    }else if ($r['TDESPACHO'] == "2") {
                                                        $TDESPACHO = "Interplanta";
                                                        $ARRAYPLANTAINTERNA = $PLANTA_ADO->verPlanta($r["ID_PLANTA2"]);
                                                        $ARRAYVERBODEGA = $BODEGA_ADO->verBodega($r["ID_BODEGA2"]);
                                                        if ($ARRAYVERBODEGA && $ARRAYPLANTAINTERNA) {
                                                            $NOMBRDESTINO = "" . $ARRAYPLANTAINTERNA[0]["NOMBRE_PLANTA"] . " - " . $ARRAYVERBODEGA[0]["NOMBRE_BODEGA"];
                                                        } else {
                                                            $NOMBRDESTINO = "Sin Datos";
                                                        }
                                                    }else if ($r['TDESPACHO'] == "3") {
                                                        $TDESPACHO = "Devolución a Productor";
                                                        $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($r["ID_PRODUCTOR"]);
                                                        if ($ARRAYPRODUCTOR) {
                                                            $NOMBRDESTINO = $ARRAYPRODUCTOR[0]["CSG_PRODUCTOR"] .":". $ARRAYPRODUCTOR[0]["NOMBRE_PRODUCTOR"]; 
                                                        } else {
                                                            $NOMBRDESTINO = "Sin Datos";
                                                        }
                                                    }else if ($r['TDESPACHO'] == "4") {
                                                        $TDESPACHO = "Devolución a Proveedor";
                                                        $ARRAYPROVEEDOR = $PROVEEDOR_ADO->verProveedor($r["ID_PROVEEDOR"]);
                                                        if ($ARRAYPROVEEDOR) {
                                                            $NOMBRDESTINO = $ARRAYPROVEEDOR[0]["NOMBRE_PROVEEDOR"];
                                                        } else {
                                                            $NOMBRDESTINO = "Sin Datos";
                                                        }
                                                    }else if ($r['TDESPACHO'] == "5") {
                                                        $TDESPACHO = "Venta";
                                                        $ARRAYVERCOMPRADOR = $COMPRADOR_ADO->verComprador($r["ID_COMPRADOR"]);
                                                        if ($ARRAYVERCOMPRADOR) {
                                                            $NOMBRDESTINO = $ARRAYVERCOMPRADOR[0]["NOMBRE_COMPRADOR"];
                                                        } else {
                                                            $NOMBRDESTINO = "Sin Datos";
                                                        }
                                                    }else if ($r['TDESPACHO'] == "6") {
                                                        $TDESPACHO = "Regalo";
                                                        $REGALO = $r['REGALO_DESPACHO'];
                                                    }else if ($r['TDESPACHO'] == "7") {
                                                        $TDESPACHO = "Planta Externa";
                                                        $ARRAYPLANTAEXTERNA = $PLANTA_ADO->verPlanta($r["ID_PLANTA3"]);
                                                        if ($ARRAYPLANTAEXTERNA) {
                                                            $NOMBRDESTINO = $ARRAYPLANTAEXTERNA[0]["NOMBRE_PLANTA"];
                                                        } else {
                                                            $NOMBRDESTINO = "Sin Datos";
                                                        }
                                                    }else if ($r['TDESPACHO'] == "8") {
                                                        $TDESPACHO = "Despacho a Productor";
                                                        $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($r["ID_PRODUCTOR"]);
                                                        if ($ARRAYPRODUCTOR) {
                                                            $NOMBRDESTINO = $ARRAYPRODUCTOR[0]["CSG_PRODUCTOR"] .":". $ARRAYPRODUCTOR[0]["NOMBRE_PRODUCTOR"]; 
                                                        } else {
                                                            $NOMBRDESTINO = "Sin Datos";
                                                        }
                                                    }else {
                                                        $TDESPACHO = "Sin Datos";
                                                    }    
                                                    $ARRAYVERTRANSPORTE = $TRANSPORTE_ADO->verTransporte($r['ID_TRANSPORTE']);
                                                    if ($ARRAYVERTRANSPORTE) {
                                                        $NOMBRETRANSPORTE = $ARRAYVERTRANSPORTE[0]['NOMBRE_TRANSPORTE'];
                                                    } else {
                                                        $NOMBRETRANSPORTE = "Sin Datos";
                                                    }
                                                    $ARRAYVERCONDUCTOR = $CONDUCTOR_ADO->verConductor($r['ID_CONDUCTOR']);
                                                    if ($ARRAYVERCONDUCTOR) {

                                                        $NOMBRECONDUCTOR = $ARRAYVERCONDUCTOR[0]['NOMBRE_CONDUCTOR'];
                                                    } else {
                                                        $NOMBRECONDUCTOR = "Sin Datos";
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
                                                    $ARRAYTOMADO = $INVENTARIOE_ADO->buscarPorDespacho($r['ID_DESPACHO']);
                                                    ?>
                                                    <?php foreach ($ARRAYTOMADO as $s) : ?>
                                                        <?php                                                
                                                       
                                                        $ARRAYVERBODEGA = $BODEGA_ADO->verBodega($s['ID_BODEGA']);
                                                        if ($ARRAYVERBODEGA) {
                                                            $NOMBREBODEGA = $ARRAYVERBODEGA[0]['NOMBRE_BODEGA'];
                                                        } else {
                                                            $NOMBREBODEGA = "Sin Datos";
                                                        }
                                                        $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($s['ID_PRODUCTO']);
                                                        if ($ARRAYVERPRODUCTO) {
                                                            $CODIGOPRODUCTO = $ARRAYVERPRODUCTO[0]['CODIGO_PRODUCTO'];
                                                            $NOMBREPRODUCTO = $ARRAYVERPRODUCTO[0]['NOMBRE_PRODUCTO'];
                                                        } else {
                                                            $CODIGOPRODUCTO = "Sin Datos";
                                                            $NOMBREPRODUCTO = "Sin Datos";
                                                        }
                                                        $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($s['ID_TUMEDIDA']);
                                                        if ($ARRAYVERTUMEDIDA) {
                                                            $NOMBRETUMEDIDA = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
                                                        } else {
                                                            $NOMBRETUMEDIDA = "Sin Datos";
                                                        }
                                                        ?>
                                                        <tr class="text-left">          
                                                            <td><?php echo $CODIGOPRODUCTO; ?></td>
                                                            <td><?php echo $NOMBREPRODUCTO; ?></td>
                                                            <td><?php echo $s['CANTIDAD']; ?></td>
                                                            <td><?php echo $NOMBRETUMEDIDA; ?></td>
                                                            <td><?php echo $NOMBREPLANTA; ?></td>
                                                            <td><?php echo $NOMBREBODEGA; ?></td>                                                             
                                                            <td><?php echo $r['NUMERO_DESPACHO']; ?> </td>
                                                            <td><?php echo $r['FECHA']; ?></td>
                                                            <td><?php echo $TDESPACHO; ?></td>
                                                            <td><?php echo $NOMBRDESTINO; ?></td>
                                                            <td><?php echo $r['NUMERO_DOCUMENTO']; ?></td>
                                                            <td><?php echo $s['VALOR']; ?></td>
                                                            <td><?php echo $NOMBRETRANSPORTE; ?></td>
                                                            <td><?php echo $NOMBRECONDUCTOR; ?></td>
                                                            <td><?php echo $r['PATENTE_CAMION']; ?></td>
                                                            <td><?php echo $r['PATENTE_CARRO']; ?></td>
                                                            <td><?php echo $NOMBREEMPRESA; ?></td>
                                                            <td><?php echo $NOMBRETEMPORADA; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
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