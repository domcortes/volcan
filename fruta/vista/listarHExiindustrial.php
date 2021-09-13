<?php


include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/EXIINDUSTRIAL_ADO.php';

include_once '../controlador/EINDUSTRIAL_ADO.php';

include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/ESPECIES_ADO.php';
include_once '../controlador/FOLIO_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$EXIINDUSTRIAL_ADO =  new EXIINDUSTRIAL_ADO();

$EINDUSTRIAL_ADO =  new EINDUSTRIAL_ADO();

$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD




//INICIALIZAR ARREGLOS
$ARRAYEXIINDUSTRIAL = "";
$ARRAYEVERINDUSTRIALID = "";
$ARRAYVERPRODUCTORID = "";
$ARRAYVERPVESPECIESID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYVERESPECIESID = "";
$ARRAYVERFOLIOID = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYEXIINDUSTRIAL = $EXIINDUSTRIAL_ADO->listarExiindustrialHCBX();

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Listar Producto Industrial</title>
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
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" onload="mueveReloj()">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../config/menu.php"; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Industrial</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Existencia</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="listarHExiindustrial.php"> Listar Producto Industrial </a>
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
                            <div class="box-header with-border">
                                <h4 class="box-title"> Registros</h4>

                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table id="hexistencia" class="table table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="text-left">
                                                        <th>Folio </th>
                                                        <th>Estado</th>
                                                        <th>Fecha Ingreso </th>
                                                        <th>Fecha Modificacion </th>
                                                        <th>CSG Productor </th>
                                                        <th>Nombre Productor </th>
                                                        <th>Estandar </th>
                                                        <th>Especies </th>
                                                        <th>Variedad </th>
                                                        <th>Kilos Neto</th>
                                                        <th>Dias </th>
                                                        <th>Empresa</th>
                                                        <th>Planta</th>
                                                        <th>Temporada</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYEXIINDUSTRIAL as $r) : ?>
                                                        <tr class="text-left">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['FOLIO_AUXILIAR_EXIINDUSTRIAL']; ?>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($r['ESTADO'] == "0") {
                                                                    echo "Eliminado";
                                                                }
                                                                if ($r['ESTADO'] == "1") {
                                                                    echo "Ingresando";
                                                                }
                                                                if ($r['ESTADO'] == "2") {
                                                                    echo "Disponible";
                                                                }
                                                                if ($r['ESTADO'] == "3") {
                                                                    echo "En Despacho";
                                                                }
                                                                if ($r['ESTADO'] == "4") {
                                                                    echo "Despachado";
                                                                }
                                                                if ($r['ESTADO'] == "5") {
                                                                    echo "En Transito";
                                                                }



                                                                ?>
                                                            </td>
                                                            <td><?php echo $r['FECHA_INGRESO_EXIINDUSTRIAL']; ?></td>
                                                            <td><?php echo $r['FECHA_MODIFICACION_EXIINDUSTRIAL']; ?></td>
                                                            <td>
                                                                <?php

                                                                $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                                echo $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                echo $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $ARRAYEVERINDUSTRIALID = $EINDUSTRIAL_ADO->verEstandar($r['ID_ESTANDAR']);
                                                                echo $ARRAYEVERINDUSTRIALID[0]['NOMBRE_ESTANDAR'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
                                                                $ARRAYVERESPECIESID = $ESPECIES_ADO->verEspecies($ARRAYVERVESPECIESID[0]['ID_ESPECIES']);
                                                                echo $ARRAYVERESPECIESID[0]['NOMBRE_ESPECIES'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                echo $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                                ?>
                                                            </td>
                                                            <td><?php echo $r['KILOS_NETO_EXIINDUSTRIAL']; ?></td>
                                                            <td><?php echo $r['DIAS']; ?></td>
                                                            <td>
                                                                <?php
                                                                $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                                echo $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $ARRAYPLANTA = $PLANTA_ADO->verPlanta($r['ID_PLANTA']);
                                                                echo $ARRAYPLANTA[0]['NOMBRE_PLANTA'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($r['ID_TEMPORADA']);
                                                                echo $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
                                                                ?>
                                                            </td>

                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr class="text-left" id="filtro">
                                                        <th>Folio </th>
                                                        <th>Estado</th>
                                                        <th>Fecha Ingreso </th>
                                                        <th>Fecha Modificacion </th>
                                                        <th>CSG Productor </th>
                                                        <th>Nombre Productor </th>
                                                        <th>Estandar </th>
                                                        <th>Especies </th>
                                                        <th>Variedad </th>
                                                        <th>Kilos Neto</th>
                                                        <th>Dias </th>
                                                        <th>Empresa</th>
                                                        <th>Planta</th>
                                                        <th>Temporada</th>
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





            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../config/footer.php"; ?>
                <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>