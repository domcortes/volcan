<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/BODEGA_ADO.php';
include_once '../controlador/PRODUCTO_ADO.php';
include_once '../controlador/TUMEDIDA_ADO.php';
include_once '../controlador/TRANSPORTE_ADO.php';
include_once '../controlador/CONDUCTOR_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/COMPRADOR_ADO.php';
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
$COMPRADOR_ADO =  new COMPRADOR_ADO();

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
    $ARRAYINVENTARIO = $INVENTARIOE_ADO->listarKardexPorEmpresaPlantaTemporadaCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
}
include_once "../config/validarDatosUrl.php";
include_once "../config/reporteUrl.php";

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Existencia Envases</title>
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
                            <h3 class="page-title">Existencia Envases</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Historial</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Existencia Envases </a>
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
                                                    <th>Tipo Movimineto</th>
                                                    <th>Fecha Movimineto</th>
                                                    <th>Empresa</th>
                                                    <th>Planta</th>
                                                    <th>Origen </th>
                                                    <th>Destino </th>
                                                    <th>N° Registro</th>
                                                    <th>N° Documento</th>                                                                          
                                                    <th>Entrada</th>
                                                    <th>Salida</th>
                                                    <th>Saldo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYINVENTARIO as $r) : ?>

                                                    <?php                                            
                                                    $ARRAYRECEPCION = $RECEPCIONE_ADO->verRecepcion2($r['RECEPCION']);
                                                    $ARRAYDESPACHO = $DESPACHOE_ADO->verDespachoe2($r['DESPACHO']);
                                                    if ($ARRAYRECEPCION) {
                                                        $NUMEROPERACION = $ARRAYRECEPCION[0]['NUMERO_RECEPCION'];
                                                        $NUMERODOCUMENTO = $ARRAYRECEPCION[0]['NUMERO_DOCUMENTO_RECEPCION'];
                                                        $FECHAOPERACION = $ARRAYRECEPCION[0]['FECHA'];
                                                        $TOPERACION = $ARRAYRECEPCION[0]['TRECEPCION'];                                                           
                                                        $NOMBREDESTINO= $r['BODEGA'];                                                                
                                                        $RECEPCIONORIGEN1 = $ARRAYRECEPCION[0]['ID_RECEPCIONMP'];    
                                                        $RECEPCIONORIGEN2 = $ARRAYRECEPCION[0]['ID_RECEPCIONIND'];    
                                                        if($RECEPCIONORIGEN1){
                                                            $TIPO="Materia Prima";
                                                        }else if($RECEPCIONORIGEN2){
                                                            $TIPO="Producto Industrial";
                                                        }else{
                                                            $TIPO="Envase";
                                                        }
                                                        if ($TOPERACION == "1") {
                                                            $NOMBREOPERACION = "Recepción Desde Proveedor ".$TIPO;
                                                            $ARRAYPROVEEDOR = $PROVEEDOR_ADO->verProveedor($ARRAYRECEPCION[0]["ID_PROVEEDOR"]);
                                                            if($ARRAYPROVEEDOR){
                                                                $NOMBREORIGEN = $ARRAYPROVEEDOR[0]["NOMBRE_PROVEEDOR"];
                                                            } else {
                                                                $NOMBREORIGEN = "Sin Datos";
                                                            }
                                                        } else if ($TOPERACION == "2") {
                                                            $NOMBREOPERACION = "Recepción Desde Productor ".$TIPO;
                                                            $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($ARRAYRECEPCION[0]["ID_PRODUCTOR"]);
                                                            if($ARRAYPRODUCTOR){
                                                                $NOMBREORIGEN = $ARRAYPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
                                                            } else {
                                                                $NOMBREORIGEN = "Sin Datos";
                                                            }
                                                        } else if ($TOPERACION == "3") {
                                                            $NOMBREOPERACION = "Recepción Desde Planta Externa ".$TIPO;
                                                            $ARRAYPLANTAEXTERNA = $PLANTA_ADO->verPlanta($ARRAYRECEPCION[0]["ID_PLANTA2"]);
                                                            if($ARRAYPLANTAEXTERNA){
                                                                $NOMBREORIGEN = $ARRAYPLANTAEXTERNA[0]["NOMBRE_PLANTA"];
                                                            } else {
                                                                $NOMBREORIGEN = "Sin Datos";
                                                            }
                                                        } else if ($TOPERACION == "4") {
                                                            $NOMBREOPERACION = "Recepción Inventario Inicial ".$TIPO;
                                                        } else {
                                                            $NOMBREOPERACION = "Sin Datos";
                                                            $NOMBREORIGEN = "Sin Datos";
                                                        }
                                                    }else if ($ARRAYDESPACHO) {
                                                        $NUMEROPERACION = $ARRAYDESPACHO[0]['NUMERO_DESPACHO'];
                                                        $NUMERODOCUMENTO = $ARRAYDESPACHO[0]['NUMERO_DOCUMENTO'];
                                                        $FECHAOPERACION = $ARRAYDESPACHO[0]['FECHA'];
                                                        $TOPERACION = $ARRAYDESPACHO[0]['TDESPACHO'];   
                                                        $NOMBREORIGEN= $r['BODEGA'];    
                                                        $DESPACHOORIGEN = $ARRAYDESPACHO[0]['ID_DESPACHOMP'];    
                                                        if($DESPACHOORIGEN){
                                                            $TIPO="Materia Prima";
                                                        }else{
                                                            $TIPO="Envase";
                                                        }
                                                        if ($TOPERACION == "1") {
                                                            $NOMBREOPERACION = "Despacho a Sub Bodega ".$TIPO;
                                                            $ARRAYVERBODEGA = $BODEGA_ADO->verBodega($ARRAYDESPACHO[0]["ID_BODEGA"]);
                                                            if ($ARRAYVERBODEGA) {
                                                                $NOMBREDESTINO = $ARRAYVERBODEGA[0]["NOMBRE_BODEGA"];
                                                            } else {
                                                                $NOMBREDESTINO = "Sin Datos";
                                                            }
                                                        }else if ($TOPERACION == "2") {
                                                            $NOMBREOPERACION = "Interplanta ".$TIPO;
                                                            $ARRAYPLANTAINTERNA = $PLANTA_ADO->verPlanta($ARRAYDESPACHO[0]["ID_PLANTA2"]);
                                                            $ARRAYVERBODEGA = $BODEGA_ADO->verBodega($ARRAYDESPACHO[0]["ID_BODEGA2"]);
                                                            if ($ARRAYVERBODEGA && $ARRAYPLANTAINTERNA) {
                                                                $NOMBREDESTINO = "" . $ARRAYPLANTAINTERNA[0]["NOMBRE_PLANTA"] . " - " . $ARRAYVERBODEGA[0]["NOMBRE_BODEGA"];
                                                            } else {
                                                                $NOMBREDESTINO = "Sin Datos";
                                                            }
                                                        }else if ($TOPERACION == "3") {
                                                            $NOMBREOPERACION = "Devolución a Productor ".$TIPO;
                                                            $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($ARRAYDESPACHO[0]["ID_PRODUCTOR"]);
                                                            if ($ARRAYPRODUCTOR) {
                                                                $NOMBREDESTINO = $ARRAYPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
                                                            } else {
                                                                $NOMBREDESTINO = "Sin Datos";
                                                            }
                                                        }else if ($TOPERACION == "4") {
                                                            $NOMBREOPERACION = "Devolución a Proveedor ".$TIPO;
                                                            $ARRAYPROVEEDOR = $PROVEEDOR_ADO->verProveedor($ARRAYDESPACHO[0]["ID_PROVEEDOR"]);
                                                            if ($ARRAYPROVEEDOR) {
                                                                $NOMBREDESTINO = $ARRAYPROVEEDOR[0]["NOMBRE_PROVEEDOR"];
                                                            } else {
                                                                $NOMBREDESTINO = "Sin Datos";
                                                            }
                                                        }else if ($TOPERACION == "5") {
                                                            $NOMBREOPERACION = " Venta".$TIPO;
                                                            $ARRAYVERCOMPRADOR = $COMPRADOR_ADO->verComprador($ARRAYDESPACHO[0]["ID_COMPRADOR"]);
                                                            if ($ARRAYVERCOMPRADOR) {
                                                                $NOMBREDESTINO = $ARRAYVERCOMPRADOR[0]["NOMBRE_COMPRADOR"];
                                                            } else {
                                                                $NOMBREDESTINO = "Sin Datos";
                                                            }
                                                        }else if ($TOPERACION == "6") {
                                                            $NOMBREOPERACION = "Regalo ".$TIPO;
                                                            $REGALO = $ARRAYDESPACHO[0]['REGALO_DESPACHO'];
                                                        }else if ($TOPERACION == "7") {
                                                            $NOMBREOPERACION = "Despacho a Planta Externa".$TIPO;
                                                            $ARRAYPLANTAEXTERNA = $PLANTA_ADO->verPlanta($ARRAYDESPACHO[0]["ID_PLANTA3"]);
                                                            if ($ARRAYPLANTAEXTERNA) {
                                                                $NOMBREDESTINO = $ARRAYPLANTAEXTERNA[0]["NOMBRE_PLANTA"];
                                                            } else {
                                                                $NOMBREDESTINO = "Sin Datos";
                                                            }
                                                        }else if ($TOPERACION == "8") {
                                                            $NOMBREOPERACION = "Despacho a Productor ".$TIPO;
                                                            $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($ARRAYDESPACHO[0]["ID_PRODUCTOR"]);
                                                            if ($ARRAYPRODUCTOR) {
                                                                $NOMBREDESTINO = $ARRAYPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
                                                            } else {
                                                                $NOMBREDESTINO = "Sin Datos";
                                                            }
                                                        }else {
                                                            $NOMBREOPERACION = "Sin Datos";
                                                        } 
                                                    }else if($r['PLANTA2']){
                                                        $ARRAYVERDESPACHO=$DESPACHOE_ADO->verDespachoe2($r['DESPACHO2']);
                                                        if($ARRAYVERDESPACHO){
                                                            $NUMERODOCUMENTO = $ARRAYVERDESPACHO[0]["NUMERO_DOCUMENTO"];
                                                            $NUMEROPERACION = $ARRAYVERDESPACHO[0]['NUMERO_DESPACHO'];
                                                            $FECHAOPERACION = $ARRAYVERDESPACHO[0]["FECHA"];
                                                            $DESPACHOORIGEN = $ARRAYVERDESPACHO[0]['ID_DESPACHOMP'];    
                                                            if($DESPACHOORIGEN){
                                                                $TIPO="Materia Prima";
                                                            }else{
                                                                $TIPO="Envase";
                                                            }
                                                        }else{
                                                            $NUMERODOCUMENTO = "Sin Datos";
                                                            $NUMEROPERACION = "Sin Datos";
                                                            $FECHAOPERACION = "Sin Datos";
                                                        }
                                                        $NOMBREOPERACION = "Interplanta ".$TIPO;                                               
                                                        $NOMBREDESTINO= $r['BODEGA'];                                                              
                                                        $ARRAYVERPLANTA=$PLANTA_ADO->verPlanta($r['PLANTA2']);    
                                                        if($ARRAYVERPLANTA){
                                                            $NOMBREORIGEN = $ARRAYVERPLANTA[0]["NOMBRE_PLANTA"];        
                                                        }else{                                                            
                                                            $NOMBREORIGEN = "Sin Datos";
                                                        }                                                        
                                                    }else {
                                                        $NUMERODOCUMENTO = "Sin Datos";
                                                        $NUMEROPERACION = "Sin Datos";
                                                        $FECHAOPERACION = "Sin Datos";
                                                        $NOMBREOPERACION = "Sin Datos";
                                                        $NOMBREORIGEN = "Sin Datos";
                                                        $NOMBREDESTINO = "Sin Datos";
                                                    }
                                         
                                                    ?>

                                                    <tr class="center">
                                                        <td><?php echo $r['CODIGO']; ?></td>
                                                        <td><?php echo $r['NOMBRE']; ?></td>
                                                        <td><?php echo $r['TUMEDIDA']; ?></td>
                                                        <td><?php echo $NOMBREOPERACION; ?></td>
                                                        <td><?php echo $FECHAOPERACION; ?></td>
                                                        <td><?php echo $r['EMPRESA']; ?></td>
                                                        <td><?php echo $r['PLANTA']; ?></td>
                                                        <td><?php echo $NOMBREORIGEN; ?></td>
                                                        <td><?php echo $NOMBREDESTINO; ?></td>
                                                        <td><?php echo $NUMEROPERACION; ?></td>
                                                        <td><?php echo $NUMERODOCUMENTO; ?></td>
                                                        <td><?php echo $r['ENTRADA']; ?></td>
                                                        <td><?php echo $r['SALIDA']; ?></td>
                                                        <td><?php echo $r['SALDO']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr id="filtro" class="text-left">
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