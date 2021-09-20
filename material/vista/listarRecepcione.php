<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/TDOCUMENTO_ADO.php';
include_once '../controlador/BODEGA_ADO.php';
include_once '../controlador/TRANSPORTE_ADO.php';
include_once '../controlador/CONDUCTOR_ADO.php';
include_once '../controlador/PROVEEDOR_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/FOLIO_ADO.php';

include_once '../controlador/RECEPCIONE_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TDOCUMENTO_ADO =  new TDOCUMENTO_ADO();
$BODEGA_ADO =  new BODEGA_ADO();
$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
$PROVEEDOR_ADO =  new PROVEEDOR_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$FOLIO_ADO =  new FOLIO_ADO();


$RECEPCIONE_ADO =  new RECEPCIONE_ADO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

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
$ARRAYRECEPCION = "";
$ARRAYRECEPCIONTOTALES = "";
$ARRAYVEREMPRESA = "";


$ARRAYVERBODEGA = "";
$ARRAYVERTDOCUMENTO = "";
$ARRAYVERPROVEEDOR = "";
$ARRAYVERPRODUCTOR = "";
$ARRAYVERTRANSPORTE = "";
$ARRAYVERCONDUCTOR = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {
    $ARRAYRECEPCION = $RECEPCIONE_ADO->listarRecepcionPorEmpresaPlantaTemporada2CBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $ARRAYRECEPCIONTOTALES = $RECEPCIONE_ADO->obtenerTotalesRecepcionPorEmpresaPlantaTemporada2CBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $TOTALCANTIDAD = $ARRAYRECEPCIONTOTALES[0]['CANTIDAD'];
}
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrLP.php";


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agrupado Recepción Materiales</title>
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
        <?php include_once "../config/menu.php"; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">Agrupado Recepción</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Recepción</li>
                                        <li class="breadcrumb-item" aria-current="page">Recepción Materiales</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="listarRecepcionpt.php"> Agrupado Recepción </a>
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
                                        <table id="modulo" class="table table-hover " style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Número Recepción </th>
                                                    <th>Estado</th>
                                                    <th>Operaciónes</th>
                                                    <th>Fecha Recepción </th>
                                                    <th>Tipo Recepción</th>
                                                    <th>Tipo Documento </th>
                                                    <th>Número Documento </th>
                                                    <th>Total Cantidad</th>
                                                    <th>Bodega</th>
                                                    <th>Transporte </th>
                                                    <th>Nombre Conductor </th>
                                                    <th>Patente Camión </th>
                                                    <th>Patente Carro </th>
                                                    <th>Fecha Ingreso</th>
                                                    <th>Fecha Modificación</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYRECEPCION as $r) : ?>
                                                    <tr class="center">
                                                        <td>
                                                            <a href="#" class="text-warning hover-warning">
                                                                <?php echo $r['NUMERO_RECEPCION']; ?>
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
                                                                        <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown">
                                                                            <i class="glyphicon glyphicon-cog"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_RECEPCION']; ?>" />
                                                                            <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroRecepcione" />
                                                                            <input type="hidden" class="form-control" placeholder="URL" id="URLO" name="URLO" value="listarRecepcione" />
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
                                                                            
                                                                            <br>
                                                                            <button type="button" class="btn btn-rounded  btn-danger btn-outline btn-sm" id="defecto" name="informe" title="Informe" Onclick="abrirPestana('../documento/informeRecepcione.php?parametro=<?php echo $r['ID_RECEPCION']; ?>&&NOMBREUSUARIO=<?php echo $IDUSUARIOS; ?>'); ">
                                                                                <i class="fa fa-file-pdf-o"></i>
                                                                            </button>Informe
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td><?php echo $r['FECHAF']; ?></td>
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
                                                            $ARRAYVERTDOCUMENTO = $TDOCUMENTO_ADO->verTdocumento($r['ID_TDOCUMENTO']);
                                                            echo $ARRAYVERTDOCUMENTO[0]['NOMBRE_TDOCUMENTO'];
                                                            ?>
                                                        </td>
                                                        <td><?php echo $r['NUMERO_DOCUMENTO_RECEPCION']; ?></td>
                                                        <td><?php echo $r['CANTIDAD']; ?></td>
                                                        <td>
                                                            <?php
                                                            $ARRAYVERBODEGA = $BODEGA_ADO->verBodega($r['ID_BODEGA']);
                                                            echo $ARRAYVERBODEGA[0]['NOMBRE_BODEGA'];
                                                            ?>
                                                        </td>
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