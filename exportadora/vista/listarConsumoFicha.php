<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/PROCESO_ADO.php';
include_once '../controlador/DPEXPORTACION_ADO.php';
include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/ECOMERCIAL_ADO.php';
include_once '../controlador/ESPECIES_ADO.php';
include_once '../controlador/MERCADO_ADO.php';
include_once '../controlador/TETIQUETA_ADO.php';
include_once '../controlador/TEMBALAJE_ADO.php';

include_once '../controlador/PRODUCTO_ADO.php';
include_once '../controlador/FAMILIA_ADO.php';
include_once '../controlador/SUBFAMILIA_ADO.php';
include_once '../controlador/TUMEDIDA_ADO.php';



include_once '../controlador/FICHA_ADO.php';
include_once '../controlador/DFICHA_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$PROCESO_ADO =  new PROCESO_ADO();
$DPEXPORTACION_ADO =  new DPEXPORTACION_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$ECOMERCIAL_ADO =  new ECOMERCIAL_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$MERCADO_ADO =  new MERCADO_ADO();
$TETIQUETA_ADO =  new TETIQUETA_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();


$PRODUCTO_ADO =  new PRODUCTO_ADO();
$FAMILIA_ADO =  new FAMILIA_ADO();
$SUBFAMILIA_ADO =  new SUBFAMILIA_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();


$FICHA_ADO =  new FICHA_ADO();
$DFICHA_ADO =  new DFICHA_ADO();

//INIICIALIZAR MODELO

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$TOTALCANTIDAD = "";
$TOTCALVALOR = "";


//INICIALIZAR ARREGLOS
$ARRAYFICHA = "";
$ARRAYFICHATOTALES = "";
$ARRAYESTANDAR = "";
$ARRAYVEREMPRESA = "";
$ARRAYVERTEMPORADA = "";
$ARRAYMERCADO = "";
$ARRAYESTANDARCOMERCIAL = "";
$ARRAYESTANDAR = "";
$ARRAYESPECIES = "";
$ARRAYTEMBALAJE = "";
$ARRAYTETIQUETA = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
if ($EMPRESAS  && $TEMPORADAS) {
    $ARRAYFICHA = $FICHA_ADO->listarFichaPorEmpresaTemporada2CBX($EMPRESAS,  $TEMPORADAS);
}
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrLP.php";



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Consumo Materiales</title>
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

                //FUNCION PARA ABRIR UNA NUEVA PESTAÑA 
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
        <?php include_once "../config/menu.php"; 
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">Consumo Materiales</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Materiales</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#">Consumo Materiales</a>
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
                                                    <th>Número Ficha </th>
                                                    <th>Número Proceso </th>
                                                    <th>Fecha Proceso </th>
                                                    <th>Codigo Estandar </th>
                                                    <th>Envase/Estandar </th>
                                                    <th>Especies </th>
                                                    <th>Tipo Etiqueta </th>
                                                    <th>Tipo Embalaje </th>
                                                    <th>Codigo Producto </th>
                                                    <th>Producto </th>
                                                    <th>Familia </th>
                                                    <th>Sub Familia </th>
                                                    <th>Unidad Medida </th>
                                                    <th>Factor Consumo </th>
                                                    <th>Envases Estandar</th>
                                                    <th>Total Consumo </th>
                                                    <th>Fecha Ingreso</th>
                                                    <th>Fecha Modificación</th>
                                                    <th>Empresa </th>
                                                    <th>Temporada </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYFICHA as $r) : ?>
                                                    <?php
                                                    $ARRAYESTANDAR = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                    if ($ARRAYESTANDAR) {
                                                        $CODIGOESTANDAR = $ARRAYESTANDAR[0]["CODIGO_ESTANDAR"];
                                                        $NOMBRESTANDAR = $ARRAYESTANDAR[0]["NOMBRE_ESTANDAR"];
                                                        $ENVASEESTANDAR = $ARRAYESTANDAR[0]["CANTIDAD_ENVASE_ESTANDAR"];
                                                        $PESOENVASEESTANDAR = $ARRAYESTANDAR[0]["PESO_ENVASE_ESTANDAR"];
                                                        $TETIQUETA = $ARRAYESTANDAR[0]["ID_TETIQUETA"];
                                                        $TEMBALAJE = $ARRAYESTANDAR[0]["ID_TEMBALAJE"];
                                                        $ESPECIES = $ARRAYESTANDAR[0]["ID_ESPECIES"];
                                                        $ESTANDARCOMERCIAL = $ARRAYESTANDAR[0]["ID_ECOMERCIAL"];
                                                        $ARRAYTETIQUETA = $TETIQUETA_ADO->verEtiqueta($TETIQUETA);
                                                        $ARRAYTEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($TEMBALAJE);
                                                        $ARRAYESPECIES = $ESPECIES_ADO->verEspecies($ESPECIES);
                                                        $ARRAYESTANDARCOMERCIAL = $ECOMERCIAL_ADO->verEcomercial($ESTANDARCOMERCIAL);

                                                        if ($ARRAYTETIQUETA) {
                                                            $NOMBRETETIQUETA = $ARRAYTETIQUETA[0]["NOMBRE_TETIQUETA"];
                                                        } else {
                                                            $NOMBRETETIQUETA = "Sin Datos";
                                                        }
                                                        if ($ARRAYTEMBALAJE) {
                                                            $NOMBRETEMBALAJE = $ARRAYTEMBALAJE[0]["NOMBRE_TEMBALAJE"];
                                                        } else {
                                                            $NOMBRETEMBALAJE = "Sin Datos";
                                                        }
                                                        if ($ARRAYMERCADO) {
                                                            $NOMBREMERCADO = $ARRAYMERCADO[0]["NOMBRE_MERCADO"];
                                                        } else {
                                                            $NOMBREMERCADO = "Sin Datos";
                                                        }
                                                        if ($ARRAYESPECIES) {
                                                            $NOMBREESPECIES = $ARRAYESPECIES[0]["NOMBRE_ESPECIES"];
                                                        } else {
                                                            $NOMBREESPECIES = "Sin Datos";
                                                        }
                                                        if ($ARRAYESTANDARCOMERCIAL) {
                                                            $NOMBREESTANDARCOMERCIAL = $ARRAYESTANDARCOMERCIAL[0]["CODIGO_ECOMERCIAL"] . ":" . $ARRAYESTANDARCOMERCIAL[0]["NOMBRE_ECOMERCIAL"];
                                                        } else {
                                                            $NOMBREESTANDARCOMERCIAL = "Sin Datos";
                                                        }
                                                    } else {
                                                        $CODIGOESTANDAR = "Sin Datos";
                                                        $NOMBRESTANDAR = "Sin Datos";
                                                    }

                                                    $ARRAYVEREMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                    if ($ARRAYVEREMPRESA) {
                                                        $NOMBREEMPRESA = $ARRAYVEREMPRESA[0]['NOMBRE_EMPRESA'];
                                                    } else {
                                                        $NOMBREEMPRESA = "Sin Datos";
                                                    }
                                                    $ARRAYVERTEMPORADA = $TEMPORADA_ADO->verTemporada($r['ID_TEMPORADA']);
                                                    if ($ARRAYVERTEMPORADA) {
                                                        $NOMBRETEMPORADA = $ARRAYVERTEMPORADA[0]['NOMBRE_TEMPORADA'];
                                                    } else {
                                                        $NOMBRETEMPORADA = "Sin Datos";
                                                    }
                                                    $ARRAYEXISTENCIADIESTANDAR = $DPEXPORTACION_ADO->listarDpexportacionAgrupadoEstandarProceso($r['ID_ESTANDAR']);
                                                    $ARRAYDFICHA = $DFICHA_ADO->listarDfichaPorFich2CBX($r['ID_FICHA']);

                                                    ?>
                                                    <?php foreach ($ARRAYEXISTENCIADIESTANDAR as $a) : ?>

                                                        <?php foreach ($ARRAYDFICHA as $s) : ?>
                                                            <?php
                                                            $ARRAYPROCESO=$PROCESO_ADO->verProceso2($a["ID_PROCESO"]);
                                                            if($ARRAYPROCESO){
                                                                $NUMEROPROCESO=$ARRAYPROCESO[0]["NUMERO_PROCESO"];
                                                                $FECHAPROCESO=$ARRAYPROCESO[0]["FECHA"];
                                                            }else{
                                                                $NUMEROPROCESO="Sin Datos";
                                                                $FECHAPROCESO="Sin Datos";
                                                            }
                                                            $ARRAYPRODUCTO = $PRODUCTO_ADO->verProducto($s['ID_PRODUCTO']);
                                                            if ($ARRAYPRODUCTO) {
                                                                $CODIGOPRODUCTO = $ARRAYPRODUCTO[0]['CODIGO_PRODUCTO'];
                                                                $NOMBREPRODUCTO = $ARRAYPRODUCTO[0]['NOMBRE_PRODUCTO'];
                                                                $ARRAYFAMILIA = $FAMILIA_ADO->verFamilia($ARRAYPRODUCTO[0]['ID_FAMILIA']);
                                                                if ($ARRAYFAMILIA) {
                                                                    $FAMILIA = $ARRAYFAMILIA[0]["NOMBRE_FAMILIA"];
                                                                } else {
                                                                    $FAMILIA = "Sin Dato";
                                                                }
                                                                $ARRAYSUBFAMILIA = $SUBFAMILIA_ADO->verSubfamilia($ARRAYPRODUCTO[0]['ID_SUBFAMILIA']);
                                                                if ($ARRAYFAMILIA) {
                                                                    $SUBFAMILIA = $ARRAYFAMILIA[0]["NOMBRE_FAMILIA"];
                                                                } else {
                                                                    $SUBFAMILIA = "Sin Dato";
                                                                }

                                                                $ARRAYTUMEDIDA = $TUMEDIDA_ADO->verTumedida($ARRAYPRODUCTO[0]['ID_TUMEDIDA']);
                                                                if ($ARRAYTUMEDIDA) {
                                                                    $TUMEDIDA = $ARRAYTUMEDIDA[0]["NOMBRE_TUMEDIDA"];
                                                                } else {
                                                                    $TUMEDIDA = "Sin Dato";
                                                                }
                                                            } else {
                                                                $CODIGOPRODUCTO = "Sin Dato";
                                                                $NOMBREPRODUCTO = "Sin Dato";
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $r['NUMERO_FICHA']; ?> </td>
                                                                <td><?php echo $NUMEROPROCESO; ?></td>
                                                                <td><?php echo $FECHAPROCESO; ?></td>
                                                                <td><?php echo $CODIGOESTANDAR; ?></td>
                                                                <td><?php echo $NOMBRESTANDAR; ?></td>
                                                                <td><?php echo $NOMBREESPECIES; ?></td>
                                                                <td><?php echo $NOMBRETETIQUETA; ?>
                                                                <td><?php echo $NOMBRETEMBALAJE; ?>
                                                                <td><?php echo $CODIGOPRODUCTO ?></td>
                                                                <td><?php echo $NOMBREPRODUCTO ?></td>
                                                                <td><?php echo $FAMILIA ?></td>
                                                                <td><?php echo $SUBFAMILIA ?></td>
                                                                <td><?php echo $TUMEDIDA ?></td>
                                                                <td><?php echo $s['FACTOR_CONSUMO_DFICHA'] ?></td>
                                                                <td><?php echo $a["ENVASE"] ?></td>
                                                                <td><?php echo $a["ENVASE"] * $s['FACTOR_CONSUMO_DFICHA'] ?></td>
                                                                <td><?php echo $r['INGRESO']; ?></td>
                                                                <td><?php echo $r['MODIFICACION']; ?></td>
                                                                <td> <?php echo $NOMBREEMPRESA; ?>
                                                                <td> <?php echo $NOMBRETEMPORADA; ?>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
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