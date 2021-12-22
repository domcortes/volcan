<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/EINDUSTRIAL_ADO.php';
include_once '../controlador/ERECEPCION_ADO.php';
include_once '../controlador/EEXPORTACION_ADO.php';

include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/ESPECIES_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';
include_once '../controlador/FOLIO_ADO.php';


include_once '../controlador/EXIINDUSTRIAL_ADO.php';
include_once '../modelo/EXIINDUSTRIAL.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$EINDUSTRIAL_ADO =  new EINDUSTRIAL_ADO();
$ERECEPCION_ADO =  new ERECEPCION_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();

$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$FOLIO_ADO =  new FOLIO_ADO();


$EXIINDUSTRIAL_ADO =  new EXIINDUSTRIAL_ADO();
//INIICIALIZAR MODELO
$EXIINDUSTRIAL =  new EXIINDUSTRIAL();


$NUMEROFOLIO = "";
$IDEXISMATERIAPRIMA = "";
$PROCESO = "";
$DETALLEPROCESO = "";
$PRODUCTOR = "";
$PVESPECIES = "";
$SELECIONAREXISTENCIA = "";
$FECHAPROCESO = "";

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$MENSAJE = "";

$DISABLED = "";
$FOCUS = "";
$BORDER = "";
$NETO = 0;
$NETOORIGINAL = 0;
$NETONUEVO = 0;

$IDOP = "";
$IDOP2 = "";
$OP = "";
$NODATOURL = "";
$CONTADOR = 0;
$SINNO="";


//INICIALIZAR ARREGLOS
$ARRAYEXIMATERIAPRIMA = "";
$ARRAYBUSCARNUMEROFOLIOEXIMATERIAPRIMA = "";
$ARRAYEVERERECEPCIONID = "";
$ARRAYVERPRODUCTORID = "";
$ARRAYVERPVESPECIESID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYVERFOLIOID = "";
$ARRAYHISOTIRALPROCESOVALIDAR = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO'])) {
    $IDP = $_SESSION['parametro'];
    $OPP = $_SESSION['parametro1'];
    $URLO = $_SESSION['urlO'];

    $ARRAYEXIINDUSTRIAL1= $EXIINDUSTRIAL_ADO->listarExiindustrialEmpresaPlantaTemporadaDisponibleCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $ARRAYEXIINDUSTRIAL2 = $EXIINDUSTRIAL_ADO->listarExiindustrialRechazoMPEmpresaPlantaTemporadaDisponibleCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $ARRAYEXIINDUSTRIAL3 = $EXIINDUSTRIAL_ADO->listarExiindustrialRechazoPTEmpresaPlantaTemporadaDisponibleCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);

}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Selección Exitencia</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
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
                //F
                //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
                function cerrar() {
                    window.opener.refrescar()
                    window.close();
                }

                function irPagina(url) {
                    location.href = "" + url;
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" onload="mueveReloj()">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../config/menu.php"; 
            ?>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Despacho Inudstrial </h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Granel</li>
                                            <li class="breadcrumb-item" aria-current="page">Despacho</li>
                                            <li class="breadcrumb-item" aria-current="page">Inudstrial</li>
                                            <li class="breadcrumb-item" aria-current="page">Registro Despacho</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Seleccion Existencia</a>
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
                    <section class="content">
                        <div class="card">
                            <div class="card-header with-border bg-info">                                   
                                <h4 class="card-title">Seleccionar existencia</h4>                                        
                            </div>
                            <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                                <div class="card-body ">

                                    <input type="hidden" class="form-control" placeholder="ID PROCESO" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                    <input type="hidden" class="form-control" placeholder="OP PROCESO" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                    <input type="hidden" class="form-control" placeholder="URL PROCESO" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />
                                    <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                    <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                    <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />

                                    <label id="val_dproceso" class="validacion "><?php echo $MENSAJE; ?> </label>                                
                                    <div clas="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="table-responsive">
                                                <table id="selecionExistencia" class="table table-hover " style="width: 100%;">
                                                    <thead>
                                                        <tr class="text-left">
                                                            <th>Folio </th>
                                                            <th>Fecha Embalado </th>
                                                            <th>Selección</th>
                                                            <th>Seleccion Kilos</th>
                                                            <th>CSG Productor </th>
                                                            <th>Nombre Productor </th>
                                                            <th>Codigo Estandar </th>
                                                            <th>Envase/Estandar </th>
                                                            <th>Especies </th>
                                                            <th>Variedad </th>
                                                            <th>Kilos Neto</th>
                                                            <th>Dias </th>
                                                            <th>Fecha Ingreso </th>
                                                            <th>Fecha Modificación </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($ARRAYEXIINDUSTRIAL1 as $r) : ?>

                                                            <?php
                                                            $CONTADOR = $CONTADOR + 1;

                                                            $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                            if ($ARRAYVERPRODUCTORID) {

                                                                $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                                $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                            } else {
                                                                $CSGPRODUCTOR = "Sin Datos";
                                                                $NOMBREPRODUCTOR = "Sin Datos";
                                                            }

                                                            $ARRAYEVERERECEPCIONID = $EINDUSTRIAL_ADO->verEstandar($r['ID_ESTANDAR']);
                                                            if ($ARRAYEVERERECEPCIONID) {
                                                                $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
                                                                $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                            } else {
                                                                $CODIGOESTANDAR = "Sin Datos";
                                                                $NOMBREESTANDAR = "Sin Datos";
                                                            }
                                                            $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
                                                            if ($ARRAYVERVESPECIESID) {
                                                                $NOMBREVESPECIES = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                                $ARRAYVERESPECIESID = $ESPECIES_ADO->verEspecies($ARRAYVERVESPECIESID[0]['ID_ESPECIES']);
                                                                if ($ARRAYVERVESPECIESID) {
                                                                    $NOMBRESPECIES = $ARRAYVERESPECIESID[0]['NOMBRE_ESPECIES'];
                                                                } else {
                                                                    $NOMBRESPECIES = "Sin Datos";
                                                                }
                                                            } else {
                                                                $NOMBREVESPECIES = "Sin Datos";
                                                                $NOMBRESPECIES = "Sin Datos";
                                                            }
                                                            ?>
                                                            <tr class="text-left">
                                                                <td><?php echo $r['FOLIO_AUXILIAR_EXIINDUSTRIAL']; ?> </td>
                                                                <td><?php echo $r['EMBALADO']; ?> </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="checkbox" name="SELECIONAREXISTENCIA[]" id="SELECIONAREXISTENCIA<?php echo $r['ID_EXIINDUSTRIAL']; ?>" value="<?php echo $r['ID_EXIINDUSTRIAL']; ?>">
                                                                        <label for="SELECIONAREXISTENCIA<?php echo $r['ID_EXIINDUSTRIAL']; ?>"> Seleccionar</label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="hidden" class="form-control" name="IDCAJA[]" value="<?php echo  $CONTADOR; ?>">
                                                                        <input type="hidden" class="form-control" name="FOLIO[]" value="<?php echo  $r['FOLIO_AUXILIAR_EXIINDUSTRIAL']; ?>">
                                                                        <input type="hidden" class="form-control" name="IDEXISTENCIA[]" value="<?php echo $r['ID_EXIINDUSTRIAL']; ?>">
                                                                        <input type="hidden" class="form-control" name="NETOORIGINAL[]" value="<?php echo $r['KILOS_NETO_EXIINDUSTRIAL']; ?>">
                                                                        <input type="text" pattern="^[0-9]+([.][0-9]{1,3})?$" class="form-control" name="NETO[]">
                                                                    </div>
                                                                </td>
                                                                <td><?php echo $CSGPRODUCTOR; ?></td>
                                                                <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                                <td><?php echo $CODIGOESTANDAR; ?></td>
                                                                <td><?php echo $NOMBREESTANDAR; ?></td>
                                                                <td><?php echo $NOMBRESPECIES; ?></td>
                                                                <td><?php echo $NOMBREVESPECIES; ?></td>
                                                                <td><?php echo $r['NETO']; ?></td>
                                                                <td><?php echo $r['DIAS']; ?></td>
                                                                <td><?php echo $r['INGRESO']; ?></td>
                                                                <td><?php echo $r['MODIFICACION']; ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                        <?php foreach ($ARRAYEXIINDUSTRIAL2 as $r) : ?>

                                                            <?php
                                                            $CONTADOR = $CONTADOR + 1;

                                                            $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                            if ($ARRAYVERPRODUCTORID) {

                                                                $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                                $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                            } else {
                                                                $CSGPRODUCTOR = "Sin Datos";
                                                                $NOMBREPRODUCTOR = "Sin Datos";
                                                            }
                                                            $ARRAYEVERERECEPCIONID2 = $ERECEPCION_ADO->verEstandar($r['ID_ESTANDARMP']);
                                                            if ($ARRAYEVERERECEPCIONID2) {
                                                                $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID2[0]['CODIGO_ESTANDAR'];
                                                                $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID2[0]['NOMBRE_ESTANDAR'];
                                                            } else {
                                                                $CODIGOESTANDAR = "Sin Datos";
                                                                $NOMBREESTANDAR = "Sin Datos";
                                                            }
                                                            $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
                                                            if ($ARRAYVERVESPECIESID) {
                                                                $NOMBREVESPECIES = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                                $ARRAYVERESPECIESID = $ESPECIES_ADO->verEspecies($ARRAYVERVESPECIESID[0]['ID_ESPECIES']);
                                                                if ($ARRAYVERVESPECIESID) {
                                                                    $NOMBRESPECIES = $ARRAYVERESPECIESID[0]['NOMBRE_ESPECIES'];
                                                                } else {
                                                                    $NOMBRESPECIES = "Sin Datos";
                                                                }
                                                            } else {
                                                                $NOMBREVESPECIES = "Sin Datos";
                                                                $NOMBRESPECIES = "Sin Datos";
                                                            }
                                                            ?>
                                                            <tr class="text-left">
                                                                <td><?php echo $r['FOLIO_AUXILIAR_EXIINDUSTRIAL']; ?> </td>
                                                                <td><?php echo $r['EMBALADO']; ?> </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="checkbox" name="SELECIONAREXISTENCIA[]" id="SELECIONAREXISTENCIA<?php echo $r['ID_EXIINDUSTRIAL']; ?>" value="<?php echo $r['ID_EXIINDUSTRIAL']; ?>">
                                                                        <label for="SELECIONAREXISTENCIA<?php echo $r['ID_EXIINDUSTRIAL']; ?>"> Seleccionar</label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="hidden" class="form-control" name="IDCAJA[]" value="<?php echo  $CONTADOR; ?>">
                                                                        <input type="hidden" class="form-control" name="FOLIO[]" value="<?php echo  $r['FOLIO_AUXILIAR_EXIINDUSTRIAL']; ?>">
                                                                        <input type="hidden" class="form-control" name="IDEXISTENCIA[]" value="<?php echo $r['ID_EXIINDUSTRIAL']; ?>">
                                                                        <input type="hidden" class="form-control" name="NETOORIGINAL[]" value="<?php echo $r['KILOS_NETO_EXIINDUSTRIAL']; ?>">
                                                                        <input type="text" pattern="^[0-9]+([.][0-9]{1,3})?$" class="form-control" name="NETO[]">
                                                                    </div>
                                                                </td>
                                                                <td><?php echo $CSGPRODUCTOR; ?></td>
                                                                <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                                <td><?php echo $CODIGOESTANDAR; ?></td>
                                                                <td><?php echo $NOMBREESTANDAR; ?></td>
                                                                <td><?php echo $NOMBRESPECIES; ?></td>
                                                                <td><?php echo $NOMBREVESPECIES; ?></td>
                                                                <td><?php echo $r['NETO']; ?></td>
                                                                <td><?php echo $r['DIAS']; ?></td>
                                                                <td><?php echo $r['INGRESO']; ?></td>
                                                                <td><?php echo $r['MODIFICACION']; ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                        <?php foreach ($ARRAYEXIINDUSTRIAL3 as $r) : ?>

                                                            <?php
                                                            $CONTADOR = $CONTADOR + 1;

                                                            $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                            if ($ARRAYVERPRODUCTORID) {

                                                                $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                                $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                            } else {
                                                                $CSGPRODUCTOR = "Sin Datos";
                                                                $NOMBREPRODUCTOR = "Sin Datos";
                                                            }

                                                            $ARRAYEVERERECEPCIONID3 = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDARPT']);
                                                            if ($ARRAYEVERERECEPCIONID3) {
                                                                $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID3[0]['CODIGO_ESTANDAR'];
                                                                $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID3[0]['NOMBRE_ESTANDAR'];
                                                            } else {
                                                                $CODIGOESTANDAR = "Sin Datos";
                                                                $NOMBREESTANDAR = "Sin Datos";
                                                            }
                                                            $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
                                                            if ($ARRAYVERVESPECIESID) {
                                                                $NOMBREVESPECIES = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                                $ARRAYVERESPECIESID = $ESPECIES_ADO->verEspecies($ARRAYVERVESPECIESID[0]['ID_ESPECIES']);
                                                                if ($ARRAYVERVESPECIESID) {
                                                                    $NOMBRESPECIES = $ARRAYVERESPECIESID[0]['NOMBRE_ESPECIES'];
                                                                } else {
                                                                    $NOMBRESPECIES = "Sin Datos";
                                                                }
                                                            } else {
                                                                $NOMBREVESPECIES = "Sin Datos";
                                                                $NOMBRESPECIES = "Sin Datos";
                                                            }
                                                            ?>
                                                            <tr class="text-left">
                                                                <td><?php echo $r['FOLIO_AUXILIAR_EXIINDUSTRIAL']; ?> </td>
                                                                <td><?php echo $r['EMBALADO']; ?> </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="checkbox" name="SELECIONAREXISTENCIA[]" id="SELECIONAREXISTENCIA<?php echo $r['ID_EXIINDUSTRIAL']; ?>" value="<?php echo $r['ID_EXIINDUSTRIAL']; ?>">
                                                                        <label for="SELECIONAREXISTENCIA<?php echo $r['ID_EXIINDUSTRIAL']; ?>"> Seleccionar</label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="hidden" class="form-control" name="IDCAJA[]" value="<?php echo  $CONTADOR; ?>">
                                                                        <input type="hidden" class="form-control" name="FOLIO[]" value="<?php echo  $r['FOLIO_AUXILIAR_EXIINDUSTRIAL']; ?>">
                                                                        <input type="hidden" class="form-control" name="IDEXISTENCIA[]" value="<?php echo $r['ID_EXIINDUSTRIAL']; ?>">
                                                                        <input type="hidden" class="form-control" name="NETOORIGINAL[]" value="<?php echo $r['KILOS_NETO_EXIINDUSTRIAL']; ?>">
                                                                        <input type="text" pattern="^[0-9]+([.][0-9]{1,3})?$" class="form-control" name="NETO[]">
                                                                    </div>
                                                                </td>
                                                                <td><?php echo $CSGPRODUCTOR; ?></td>
                                                                <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                                <td><?php echo $CODIGOESTANDAR; ?></td>
                                                                <td><?php echo $NOMBREESTANDAR; ?></td>
                                                                <td><?php echo $NOMBRESPECIES; ?></td>
                                                                <td><?php echo $NOMBREVESPECIES; ?></td>
                                                                <td><?php echo $r['NETO']; ?></td>
                                                                <td><?php echo $r['DIAS']; ?></td>
                                                                <td><?php echo $r['INGRESO']; ?></td>
                                                                <td><?php echo $r['MODIFICACION']; ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                    <!-- /.box-body -->
                                    <div class="card-footer">
                                        <div class="btn-group btn-rounded btn-block col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <button type="button" class="btn btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op');">
                                                <i class="ti-back-left "></i> Volver
                                            </button>
                                            <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Despacho Folio" name="AGREGAR" value="AGREGAR" <?php echo $DISABLED; ?>>
                                                <i class="ti-save-alt"></i> D. Folio
                                            </button>
                                            <button type="submit" class="btn btn-info" data-toggle="tooltip" title="Despacho Kilos" name="DIVIDIR" value="DIVIDIR" <?php echo $DISABLED; ?>>
                                                <i class="ti-save-alt"></i> D. Kilos
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--.row -->
                    </section>
                </div>
            </div>
            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../config/footer.php";   ?>
                <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>        
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                showConfirmButton:true
            })

            Toast.fire({
                icon:"info",
                title:"Informacion importante",
                html:"<label>Para <b>Despachar folios</b> completos, seleccione los folios y presione <b>D. Folio</b> </label><label>Para <b>Despachar</b> una parte de los <b>kilos</b> de un folio ingrese los kilos a despachar y presione <b> D. Kilos </b> </label>"
            })
        </script>
        <?php

        if (isset($_REQUEST['AGREGAR'])) {
            $IDDESPACHO = $_REQUEST['IDP'];
            if (isset($_REQUEST['SELECIONAREXISTENCIA'])) {

                $SELECIONAREXISTENCIA = $_REQUEST['SELECIONAREXISTENCIA'];
                $SINO = "0";
            } else {
                $SINO = "1";
                $_SESSION["parametro"] =  $_REQUEST['IDP'];
                $_SESSION["parametro1"] =  $_REQUEST['OPP'];
                echo '<script>
                    Swal.fire({
                        icon:"warning",
                        title:"Accion restringida",
                        text:"Se debe selecionar al menos una existencia.",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroSelecionExistenciaINDDespachoIND.php?op";                            
                    })
                </script>';
            }
            if($SINO==0){

                //var_dump($SELECIONAREXISTENCIA);
                foreach ($SELECIONAREXISTENCIA as $r) :
                    $IDEXISMATERIAPRIMA = $r;
                    $EXIINDUSTRIAL->__SET('ID_DESPACHO', $IDDESPACHO);
                    $EXIINDUSTRIAL->__SET('ID_EXIINDUSTRIAL', $IDEXISMATERIAPRIMA);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $EXIINDUSTRIAL_ADO->actualizarSelecionarDespachoCambiarEstado($EXIINDUSTRIAL);
                endforeach;

                $_SESSION["parametro"] =  $_REQUEST['IDP'];
                $_SESSION["parametro1"] =  $_REQUEST['OPP'];
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Accion realizada",
                        text:"Se agregado la existencia al despacho.",
                        showConfirmButton: true,
                        confirmButtonText:"Volver a Despacho",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href="' . $_REQUEST['URLO'] . '.php?op";                        
                    })
                </script>';
            }
        }
        if (isset($_REQUEST['DIVIDIR'])) {
            $IDDESPACHO = $_REQUEST['IDP'];
            $ARRAYFOLIO = $_REQUEST['FOLIO'];
            $ARRAYIDEXISTENCIA = $_REQUEST['IDEXISTENCIA'];
            $ARRAYIDCAJA = $_REQUEST['IDCAJA'];
            $ARRAYNETOORIGINAL = $_REQUEST['NETOORIGINAL'];
            $ARRAYNETO = $_REQUEST['NETO'];

            if (isset($_REQUEST['IDCAJA'])) {
                foreach ($ARRAYIDCAJA as $ID) :
                    $IDNETO = $ID - 1;

                    $IDEXISTENCIA = $ARRAYIDEXISTENCIA[$IDNETO];
                    $FOLIOORIGINAL = $ARRAYFOLIO[$IDNETO];

                    $NETO = $ARRAYNETO[$IDNETO];
                    $NETOORIGINAL = $ARRAYNETOORIGINAL[$IDNETO];

                    if ($NETO != "") {
                        $SINONETO = 0;
                        $MENSAJEPRECIO = $MENSAJE;
                        if ($NETO <= 0) {
                            $SINONETO = 1;
                            $MENSAJE = $MENSAJE . "  " . $FOLIOORIGINAL . ": SOLO DEBEN INGRESAR UN VALOR MAYOR A ZERO";
                        } else {
                            if ($NETO >= $NETOORIGINAL) {
                                $SINONETO = 1;
                                $MENSAJE = $MENSAJE . "  " . $FOLIOORIGINAL . ": LOS KILOS DESPACHADOS NO PUEDE SER MAYOR O IGUAL A LOS KILOS NETO";
                            } else {
                                $SINONETO = 0;
                                $MENSAJE = $MENSAJE;
                            }
                        }
                    } else {
                        $SINONETO = 1;
                        // $MENSAJE = $MENSAJE . " <br> " . $FOLIOEXIINDUSTRIALPRECIO . ": SE DEBE INGRESAR UN DATO EN KILOS DESPACHO";
                    }
                    if ($SINONETO == 0) {
                        $EXIINDUSTRIAL->__SET('ID_DESPACHO', $IDDESPACHO);
                        $EXIINDUSTRIAL->__SET('KILOS_NETO_EXIINDUSTRIAL', $NETO);
                        $EXIINDUSTRIAL->__SET('ID_EXIINDUSTRIAL', $IDEXISTENCIA);
                        // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                        $EXIINDUSTRIAL_ADO->actualizarSelecionarDespachoNeto($EXIINDUSTRIAL);

                        $NETONUEVO = $NETOORIGINAL - $NETO;                 

                        $FOLIOALIASESTACTICO = $FOLIOORIGINAL;
                        $FOLIOALIASDIANAMICO = "EMPRESA:" . $_REQUEST['EMPRESA'] . "_PLANTA:" . $_REQUEST['PLANTA'] . "_TEMPORADA:" . $_REQUEST['TEMPORADA'] .
                            "_TIPO_FOLIO:PRODUCTO INDUSTRIAL_DESPACHO:" . $_REQUEST['IDP'] . "_FOLIO:" . $FOLIOORIGINAL;


                        $ARRAYVEREXITENICA = $EXIINDUSTRIAL_ADO->verExiindustrial($IDEXISTENCIA);
                        foreach ($ARRAYVEREXITENICA as $r) :
                            $EXIINDUSTRIAL->__SET('FOLIO_EXIINDUSTRIAL', $r['FOLIO_EXIINDUSTRIAL']);
                            $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $r['FOLIO_AUXILIAR_EXIINDUSTRIAL']);
                            $EXIINDUSTRIAL->__SET('FECHA_EMBALADO_EXIINDUSTRIAL', $r['FECHA_EMBALADO_EXIINDUSTRIAL']);
                            $EXIINDUSTRIAL->__SET('KILOS_NETO_EXIINDUSTRIAL', $NETONUEVO);
                            $EXIINDUSTRIAL->__SET('ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL', $FOLIOALIASESTACTICO);
                            $EXIINDUSTRIAL->__SET('ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL', $FOLIOALIASDIANAMICO);
                            $EXIINDUSTRIAL->__SET('TCOBRO', $r['TCOBRO']);
                            $EXIINDUSTRIAL->__SET('INGRESO', $r['INGRESO']);
                            $EXIINDUSTRIAL->__SET('ID_TMANEJO', $r['ID_TMANEJO']);
                            $EXIINDUSTRIAL->__SET('ID_FOLIO',  $r['ID_FOLIO']);
                            $EXIINDUSTRIAL->__SET('ID_ESTANDAR', $r['ID_ESTANDAR']);
                            $EXIINDUSTRIAL->__SET('ID_ESTANDARMP', $r['ID_ESTANDARMP']);
                            $EXIINDUSTRIAL->__SET('ID_ESTANDARPT', $r['ID_ESTANDARPT']);

                            $EXIINDUSTRIAL->__SET('ID_PRODUCTOR', $r['ID_PRODUCTOR']);
                            $EXIINDUSTRIAL->__SET('ID_VESPECIES', $r['ID_VESPECIES']);

                            $EXIINDUSTRIAL->__SET('ID_DESPACHO2', $r['ID_DESPACHO2']);
                            $EXIINDUSTRIAL->__SET('ID_REEMBALAJE', $r['ID_REEMBALAJE']);
                            $EXIINDUSTRIAL->__SET('ID_PROCESO', $r['ID_PROCESO']);
                            $EXIINDUSTRIAL->__SET('ID_RECEPCION', $r['ID_RECEPCION']);

                            $EXIINDUSTRIAL->__SET('ID_EMPRESA', $EMPRESAS);
                            $EXIINDUSTRIAL->__SET('ID_PLANTA', $PLANTAS);
                            $EXIINDUSTRIAL->__SET('ID_TEMPORADA', $TEMPORADAS);
                            //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                            $EXIINDUSTRIAL_ADO->agregarExiindustrialDespacho($EXIINDUSTRIAL);
                        endforeach;       
                        $SINNO=0;                 
                    }
                endforeach;

                
                if ($SINNO == 0) {    
                    if ($MENSAJE == "") {                
                        $_SESSION["parametro"] =  $_REQUEST['IDP'];
                        $_SESSION["parametro1"] =  $_REQUEST['OPP'];
                        echo '<script>
                            Swal.fire({
                                icon:"success",
                                title:"Accion realizada",
                                text:"Se agregado la existencia al despacho.",
                                showConfirmButton: true,
                                confirmButtonText:"Volver al despacho",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href="' . $_REQUEST['URLO'] . '.php?op";                        
                            })
                        </script>';
                         //  echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
                    }else{                        
                        $_SESSION["parametro"] =  $_REQUEST['IDP'];
                        $_SESSION["parametro1"] =  $_REQUEST['OPP'];
                        echo '<script>
                            Swal.fire({
                                icon:"success",
                                title:"Accion realizada",
                                text:"Se agregado la existencia al despacho. ' . $MENSAJE . '",
                                showConfirmButton: true,
                                confirmButtonText:"Volver al despacho",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href="' . $_REQUEST['URLO'] . '.php?op";                        
                            })
                        </script>';
                    }
                }
                if ($SINONETO == 1) {
                    if ($MENSAJE != "") {
                        $_SESSION["parametro"] =  $_REQUEST['IDP'];
                        $_SESSION["parametro1"] =  $_REQUEST['OPP'];
                        echo '<script>
                            Swal.fire({
                                icon:"warning",
                                title:"Accion restringida",
                                text:"' . $MENSAJE . '",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href="registroSelecionExistenciaINDDespachoIND.php?op";                        
                            })
                        </script>';
                    }
                }

            }
        }
        ?>
</body>
</html>