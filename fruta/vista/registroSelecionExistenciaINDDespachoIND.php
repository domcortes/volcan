<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/EINDUSTRIAL_ADO.php';
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
            <?php include_once "../config/menu.php"; 
            ?>
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
                                            <li class="breadcrumb-item" aria-current="page">Despacho</li>
                                            <li class="breadcrumb-item" aria-current="page">Inudstrial</li>
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

                                    <label id="val_dproceso" class="validacion "><?php echo $MENSAJE; ?> </label>
                                    <div class="row">
                                        <div class="col-xxl-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1 col-xs-1">
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-56col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label><i class="fa fa-info-circle"> </i> Para <b>Despachar folios</b> completos, seleccione los folios y presione <b>D. Folio</b> </label>
                                                <label><i class="fa fa-info-circle"> </i> Para <b>Despachar</b> una parte de los <b>kilos</b> de un folio ingrese los kilos a despachar y presione <b> D. Kilos </b> </label>
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
                                                        <?php foreach ($ARRAYEXIMATERIAPRIMA as $r) : ?>

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
                                                <i class="ti-back-left "></i> Volver
                                            </button>
                                            <button type="submit" class="btn btn-rounded btn-primary" data-toggle="tooltip" title="Despacho Folio" name="AGREGAR" value="AGREGAR" <?php echo $DISABLED; ?>>
                                                <i class="ti-save-alt"></i> D. Folio
                                            </button>
                                            <button type="submit" class="btn btn-rounded btn-info" data-toggle="tooltip" title="Despacho Kilos" name="DIVIDIR" value="DIVIDIR" <?php echo $DISABLED; ?>>
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
        <?php
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
                            $MENSAJE = $MENSAJE . " <br> " . $FOLIOORIGINAL . ": SOLO DEBEN INGRESAR UN VALOR MAYOR A ZERO";
                        } else {
                            if ($NETO >= $NETOORIGINAL) {
                                $SINONETO = 1;
                                $MENSAJE = $MENSAJE . " <br> " . $FOLIOORIGINAL . ": LOS KILOS DESPACHADOS NO PUEDE SER MAYOR O IGUAL A LOS KILOS NETO";
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
                        $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTindustrial($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                        $FOLIO = $ARRAYVERFOLIO[0]['ID_FOLIO'];
                        $ARRAYULTIMOFOLIO = $EXIINDUSTRIAL_ADO->obtenerFolio($FOLIO);
                        if ($ARRAYULTIMOFOLIO) {
                            if ($ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO'] == 0) {
                                $FOLIODPINDUSTRIAL = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
                            } else {
                                $FOLIODPINDUSTRIAL =  $ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO2'];
                            }
                        } else {
                            $FOLIODPINDUSTRIAL = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
                        }
                        $NUMEROFOLIODINDUSTRIAL = $FOLIODPINDUSTRIAL + 1;
                        $ARRAYFOLIOPOEXPO = $EXIINDUSTRIAL_ADO->buscarPorFolioRepaletizaje($NUMEROFOLIODINDUSTRIAL);
                        while (count($ARRAYFOLIOPOEXPO) == 1) {
                            $ARRAYFOLIOPOEXPO = $EXIINDUSTRIAL_ADO->buscarPorFolioRepaletizaje($NUMEROFOLIODINDUSTRIAL);
                            if (count($ARRAYFOLIOPOEXPO) == 1) {
                                $NUMEROFOLIODINDUSTRIAL += 1;
                            }
                        };

                        $FOLIOALIASESTACTICO = $NUMEROFOLIODINDUSTRIAL;
                        $FOLIOALIASDIANAMICO = "EMPRESA:" . $_REQUEST['EMPRESA'] . "_PLANTA:" . $_REQUEST['PLANTA'] . "_TEMPORADA:" . $_REQUEST['TEMPORADA'] .
                            "_TIPO_FOLIO:PRODUCTO INDUSTRIAL_DESPACHO:" . $_REQUEST['IDP'] . "_FOLIO:" . $NUMEROFOLIODINDUSTRIAL;


                        $ARRAYVEREXITENICA = $EXIINDUSTRIAL_ADO->verExiindustrial($IDEXISTENCIA);
                        foreach ($ARRAYVEREXITENICA as $r) :
                            $EXIINDUSTRIAL->__SET('FOLIO_EXIINDUSTRIAL',  $FOLIOORIGINAL);
                            $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $NUMEROFOLIODINDUSTRIAL);
                            $EXIINDUSTRIAL->__SET('FECHA_EMBALADO_EXIINDUSTRIAL', $r['FECHA_EMBALADO_EXIINDUSTRIAL']);
                            $EXIINDUSTRIAL->__SET('KILOS_NETO_EXIINDUSTRIAL', $NETONUEVO);
                            $EXIINDUSTRIAL->__SET('ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL', $FOLIOALIASESTACTICO);
                            $EXIINDUSTRIAL->__SET('ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL', $FOLIOALIASDIANAMICO);
                            $EXIINDUSTRIAL->__SET('INGRESO', $r['INGRESO']);
                            $EXIINDUSTRIAL->__SET('ID_TMANEJO', $r['ID_TMANEJO']);
                            $EXIINDUSTRIAL->__SET('ID_FOLIO', $FOLIO);
                            $EXIINDUSTRIAL->__SET('ID_ESTANDAR', $r['ID_ESTANDAR']);
                            $EXIINDUSTRIAL->__SET('ID_PRODUCTOR', $r['ID_PRODUCTOR']);
                            $EXIINDUSTRIAL->__SET('ID_VESPECIES', $r['ID_VESPECIES']);
                            $EXIINDUSTRIAL->__SET('ID_DESPACHO2', $IDDESPACHO);
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

                    $_SESSION["parametro"] =  $_REQUEST['IDP'];
                    $_SESSION["parametro1"] =  $_REQUEST['OPP'];
                    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
                }
                if ($SINONETO == 1) {
                    if ($MENSAJE != "") {
                        echo
                        '<script>
                        const Toast = Swal.mixin({
                            toast: true,
                            timer: 5000,
                            position: "top-end",
                            showConfirmButton: false,
                            showCancelButton: false,
                            showCloseButton: true,
                            focusConfirm: false,                  
                        })
                        Toast.fire({
                        icon: "alert", 
                        title: "",
                        html:"' . $MENSAJE . '"
                        })
                    </script>';
                    }
                }
            }
        }
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
                echo
                "<script>
                        Swal.fire({
                            icon:'info',
                            title:'Folios agregados al despacho'
                        }).then((result)=>{
                            if(result.value){
                                location.href ='" . $_REQUEST['URLO'] . ".php?op';
                            }
                        });
                    </script>";
                /*
                    $_SESSION["parametro"] =  $_REQUEST['IDP'];
                    $_SESSION["parametro1"] =  $_REQUEST['OPP'];
                    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";*/
            }
        }

        ?>
</body>

</html>