<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/EINDUSTRIAL_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/ESPECIES_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';


include_once '../controlador/EXIINDUSTRIAL_ADO.php';
include_once '../modelo/EXIINDUSTRIAL.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$EINDUSTRIAL_ADO =  new EINDUSTRIAL_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();


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


$DISABLED = "";
$FOCUS = "";
$BORDER = "";


$IDOP = "";
$IDOP2 = "";
$OP = "";
$NODATOURL = "";



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

if (isset($_REQUEST['AGREGAR'])) {

    $IDDESPACHO = $_REQUEST['IDP'];

    if (isset($_REQUEST['SELECIONAREXISTENCIA'])) {

        $SELECIONAREXISTENCIA = $_REQUEST['SELECIONAREXISTENCIA'];

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
        echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
    }
}

if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO'])) {
    $IDP = $_SESSION['parametro'];
    $OPP = $_SESSION['parametro1'];
    $URLO = $_SESSION['urlO'];

    $ARRAYEXIMATERIAPRIMA = $EXIINDUSTRIAL_ADO->buscarExiindustrialEmpresaPlantaTemporadaCBX2($EMPRESAS, $PLANTAS, $TEMPORADAS);
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
            <?php include_once "../config/menu.php"; ?>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Seleccion Existencia </h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Granel</li>
                                            <li class="breadcrumb-item" aria-current="page">Depsacho Materia Prima</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Operaciones Seleccion Existencia</a>
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
                        <div class="box">
                            <div class="box-header with-border">
                                <!--
                                        <h4 class="box-title">Different Width</h4>
                                        -->
                            </div>
                            <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                                <div class="box-body ">

                                    <input type="hidden" class="form-control" placeholder="ID PROCESO" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                    <input type="hidden" class="form-control" placeholder="OP PROCESO" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                    <input type="hidden" class="form-control" placeholder="URL PROCESO" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />
                                    <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                    <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                    <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                    <div class="row">
                                        <div class="col-xxl-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1 col-xs-1">
                                        </div>
                                        <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5 col-xs-5">
                                            <div class="form-group">
                                                <label> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div clas="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="table-responsive">
                                                <table id="selecionExistencia" class="table table-hover " style="width: 100%;">
                                                    <thead>
                                                        <tr class="text-left">
                                                            <th>Folio </th>
                                                            <th>Fecha Embalado </th>
                                                            <th>Selección</th>
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
                                                        <?php foreach ($ARRAYEXIMATERIAPRIMA as $r) : ?>

                                                            <?php

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
                                    <div class="box-footer">
                                        <div class="btn-group btn-rounded btn-block col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <button type="button" class="btn btn-rounded btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op');">
                                                <i class="ti-back-left "></i>
                                            </button>

                                            <button type="submit" class="btn btn-rounded btn-primary" data-toggle="tooltip" title="Seleccionar" name="AGREGAR" value="AGREGAR" <?php echo $DISABLED; ?>>
                                                <i class="ti-save-alt"></i>
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
</body>

</html>