<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/FICHA_ADO.php';
include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/ECOMERCIAL_ADO.php';
include_once '../controlador/ESPECIES_ADO.php';
include_once '../controlador/MERCADO_ADO.php';
include_once '../controlador/TETIQUETA_ADO.php';
include_once '../controlador/TEMBALAJE_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$FICHA_ADO =  new FICHA_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$ECOMERCIAL_ADO =  new ECOMERCIAL_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$MERCADO_ADO =  new MERCADO_ADO();
$TETIQUETA_ADO =  new TETIQUETA_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();

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
    <title>Agrupado Ficha</title>
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
        <?php include_once "../config/menu.php"; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">Agrupado Ficha</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Consumo</li>
                                        <li class="breadcrumb-item" aria-current="page">Ficha</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="listarOcompra.php"> Agrupado Ficha </a>
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
                                        <table id="modulo" class="table table-hover " style="width: 150%;">
                                            <thead>
                                                <tr>
                                                    <th>Número Ficha </th>
                                                    <th class="text-center">Estado</th>
                                                    <th class="text-center">Operaciónes</th>
                                                    <th>Envase/Estandar </th>
                                                    <th>Estandar Comercial</th>
                                                    <th>Especies </th>
                                                    <th>Tipo Etiqueta </th>
                                                    <th>Tipo Embalaje </th>
                                                    <th>Mercado </th>
                                                    <th>Fecha Ingreso</th>
                                                    <th>Fecha Modificación</th>
                                                    <th>Empresa </th>
                                                    <th>Temporada </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYFICHA as $r) : ?>
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-warning hover-warning">
                                                                <?php echo $r['NUMERO_FICHA']; ?>
                                                            </a>
                                                        </td>
                                                        <td class="text-center" <?php if ($r['ESTADO'] == "0") {
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
                                                                            <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_FICHA']; ?>" />
                                                                            <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroFicha" />
                                                                            <input type="hidden" class="form-control" placeholder="URLO" id="URLO" name="URLO" value="listarFicha" />
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
                                                                        <button type="button" class="btn btn-rounded  btn-danger btn-outline btn-sm" id="defecto" name="informe" title="Ficha" Onclick="abrirPestana('../documento/informeFicha.php?parametro=<?php echo $r['ID_FICHA']; ?>'); ">
                                                                            <i class="fa fa-file-pdf-o"></i>
                                                                        </button>Ficha 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $ARRAYESTANDAR = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                            if ($ARRAYESTANDAR) {
                                                                echo $ARRAYESTANDAR[0]['CODIGO_ESTANDAR'] . ":" . $ARRAYESTANDAR[0]['NOMBRE_ESTANDAR'];
                                                                $ENVASEESTANDAR = $ARRAYESTANDAR[0]["CANTIDAD_ENVASE_ESTANDAR"];
                                                                $PESOENVASEESTANDAR = $ARRAYESTANDAR[0]["PESO_ENVASE_ESTANDAR"];
                                                                $TETIQUETA = $ARRAYESTANDAR[0]["ID_TETIQUETA"];
                                                                $TEMBALAJE = $ARRAYESTANDAR[0]["ID_TEMBALAJE"];
                                                                $MERCADO = $ARRAYESTANDAR[0]["ID_MERCADO"];
                                                                $ESPECIES = $ARRAYESTANDAR[0]["ID_ESPECIES"];
                                                                $ESTANDARCOMERCIAL = $ARRAYESTANDAR[0]["ID_ECOMERCIAL"];
                                                                $ARRAYTETIQUETA = $TETIQUETA_ADO->verEtiqueta($TETIQUETA);
                                                                $ARRAYTEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($TEMBALAJE);
                                                                $ARRAYMERCADO = $MERCADO_ADO->verMercado($MERCADO);
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
                                                                echo "Sin Datos";
                                                            }


                                                            ?>
                                                        </td>
                                                        <td> <?php echo $NOMBREESTANDARCOMERCIAL; ?></td>
                                                        <td> <?php echo $NOMBREESPECIES; ?></td>
                                                        <td> <?php echo $NOMBRETETIQUETA; ?>
                                                        <td> <?php echo $NOMBRETEMBALAJE; ?>
                                                        <td> <?php echo $NOMBREMERCADO; ?>
                                                        <td><?php echo $r['INGRESOF']; ?></td>
                                                        <td><?php echo $r['MODIFICACIONF']; ?></td>
                                                        <td>
                                                            <?php
                                                            $ARRAYVEREMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                            if ($ARRAYVEREMPRESA) {
                                                                echo $ARRAYVEREMPRESA[0]['NOMBRE_EMPRESA'];
                                                            } else {
                                                                echo "Sin Datos";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $ARRAYVERTEMPORADA = $TEMPORADA_ADO->verTemporada($r['ID_TEMPORADA']);
                                                            if ($ARRAYVERTEMPORADA) {
                                                                echo $ARRAYVERTEMPORADA[0]['NOMBRE_TEMPORADA'];
                                                            } else {
                                                                echo "Sin Datos";
                                                            }
                                                            ?>
                                                        </td>

                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
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