<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/ERECEPCION_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/ESPECIES_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';

include_once '../controlador/RECEPCIONMP_ADO.php';
include_once '../controlador/PROCESO_ADO.php';



include_once '../controlador/EXIMATERIAPRIMA_ADO.php';
include_once '../modelo/EXIMATERIAPRIMA.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$RECEPCIONMP_ADO =  new RECEPCIONMP_ADO();
$PROCESO_ADO =  new PROCESO_ADO();

$ERECEPCION_ADO =  new ERECEPCION_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();


$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();
//INIICIALIZAR MODELO
$EXIMATERIAPRIMA =  new EXIMATERIAPRIMA();


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
$CONTADOR = 0;
$SINONETO = "";
$SINO = "";
$MENSAJE = "";
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


if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO'])) {
    $IDP = $_SESSION['parametro'];
    $OPP = $_SESSION['parametro1'];
    $URLO = $_SESSION['urlO'];

    $ARRAYPROCESO = $PROCESO_ADO->verProceso($IDP);
    foreach ($ARRAYPROCESO as $r) :
        $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
        $VESPECIES = "" . $r['ID_VESPECIES'];
    endforeach;
    $ARRAYEXIMATERIAPRIMA = $EXIMATERIAPRIMA_ADO->buscarPorEmpresaPlantaTemporadaVariedadProductor($EMPRESAS, $PLANTAS, $TEMPORADAS,  $VESPECIES, $PRODUCTOR);
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
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Proceso</li>
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
                                        <div class="col-xxl-11 col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11 col-xs-11">
                                            <div class="form-group">
                                                <label><i class="fa fa-info-circle"> </i> Para <b>Selecionar folios</b> completos, seleccione los folios y presione <b>P. Folios. </b> </label>
                                                <label><i class="fa fa-info-circle"> </i> Para <b>Selecionar</b> una parte de los <b>Envases</b> de un folio, ingrese los Envases a Ingresar y presione <b> P. Envases. </b> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1 col-xs-1">
                                        </div>
                                    </div>
                                    <div clas="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="table-responsive">
                                                <table id="selecionExistencia" class="table table-hover " style="width: 100%;">
                                                    <thead>
                                                        <tr class="text-left">
                                                            <th>Folio </th>
                                                            <th>Fecha Cosecha </th>
                                                            <th>Selección</th>
                                                            <th>Seleccion Envase</th>
                                                            <th>CSG Productor </th>
                                                            <th>Nombre Productor </th>
                                                            <th>Código Estandar </th>
                                                            <th>Envase/Estandar </th>
                                                            <th>Especies </th>
                                                            <th>Variedad </th>
                                                            <th>Cantidad Envase</th>
                                                            <th>Kilo Neto</th>
                                                            <th>Tipo Manejo</th>
                                                            <th>Número Recepción</th>
                                                            <th>Fecha Recepción</th>
                                                            <th>Tipo Recepción</th>
                                                            <th>Ingreso </th>
                                                            <th>Modificación </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($ARRAYEXIMATERIAPRIMA as $r) : ?>

                                                            <?php
                                                            $CONTADOR = $CONTADOR + 1;
                                                            $ARRAYRECEPCION = $RECEPCIONMP_ADO->verRecepcion2($r['ID_RECEPCION']);
                                                            if ($ARRAYRECEPCION) {
                                                                $NUMERORECEPCION = $ARRAYRECEPCION[0]["NUMERO_RECEPCION"];
                                                                if ($ARRAYRECEPCION[0]["TRECEPCION"] == 1) {
                                                                    $TIPORECEPCION = "Desde Productor";
                                                                }
                                                                if ($ARRAYRECEPCION[0]["TRECEPCION"] == 2) {
                                                                    $TIPORECEPCION = "Planta Externa";
                                                                }
                                                            } else {
                                                                $NUMERORECEPCION = "Sin Datos";
                                                                $TIPORECEPCION = "Sin Datos";
                                                            }
                                                            $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                            if ($ARRAYVERPRODUCTORID) {

                                                                $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                                $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                            } else {
                                                                $CSGPRODUCTOR = "Sin Datos";
                                                                $NOMBREPRODUCTOR = "Sin Datos";
                                                            }
                                                            $ARRAYEVERERECEPCIONID = $ERECEPCION_ADO->verEstandar($r['ID_ESTANDAR']);
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
                                                            $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
                                                            if ($ARRAYTMANEJO) {
                                                                $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                            } else {
                                                                $NOMBRETMANEJO = "Sin Datos";
                                                            }
                                                            ?>

                                                            <tr class="text-left">
                                                                <td><?php echo $r['FOLIO_AUXILIAR_EXIMATERIAPRIMA']; ?> </td>
                                                                <td><?php echo $r['COSECHA']; ?></td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="checkbox" name="SELECIONAREXISTENCIA[]" id="SELECIONAREXISTENCIA<?php echo $r['ID_EXIMATERIAPRIMA']; ?>" value="<?php echo $r['ID_EXIMATERIAPRIMA']; ?>">
                                                                        <label for="SELECIONAREXISTENCIA<?php echo $r['ID_EXIMATERIAPRIMA']; ?>"> Seleccionar</label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="hidden" class="form-control" name="IDCAJA[]" value="<?php echo  $CONTADOR; ?>">
                                                                        <input type="hidden" class="form-control" name="IDEXISTENCIA[]" value="<?php echo $r['ID_EXIMATERIAPRIMA']; ?>">
                                                                        <input type="hidden" class="form-control" name="ESTANDAR[]" value="<?php echo  $r['ID_ESTANDAR']; ?>">
                                                                        <input type="hidden" class="form-control" name="FOLIO[]" value="<?php echo  $r['FOLIO_AUXILIAR_EXIMATERIAPRIMA']; ?>">
                                                                        <input type="hidden" class="form-control" name="ENVASEORIGINAL[]" value="<?php echo $r['CANTIDAD_ENVASE_EXIMATERIAPRIMA']; ?>">
                                                                        <input type="hidden" class="form-control" name="PROMEDIO[]" value="<?php echo $r['KILOS_PROMEDIO_EXIMATERIAPRIMA']; ?>">
                                                                        <input type="hidden" class="form-control" name="PESOPALLET[]" value="<?php echo $r['PESO_PALLET_EXIMATERIAPRIMA']; ?>">
                                                                        <input type="text" pattern="^[0-9]+([.][0-9]{1,3})?$" class="form-control" name="ENVASE[]">
                                                                    </div>
                                                                </td>
                                                                <td><?php echo $CSGPRODUCTOR; ?></td>
                                                                <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                                <td><?php echo $CODIGOESTANDAR; ?></td>
                                                                <td><?php echo $NOMBREESTANDAR; ?></td>
                                                                <td><?php echo $NOMBRESPECIES; ?></td>
                                                                <td><?php echo $NOMBREVESPECIES; ?></td>
                                                                <td><?php echo $r['ENVASE']; ?></td>
                                                                <td><?php echo $r['NETO']; ?></td>
                                                                <td><?php echo $NOMBRETMANEJO; ?></td>
                                                                <td><?php echo $NUMERORECEPCION; ?></td>
                                                                <td><?php echo $r['RECEPCION']; ?></td>
                                                                <td><?php echo $TIPORECEPCION; ?></td>
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
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="btn-group btn-rounded btn-block col-4" role="group" aria-label="Acciones generales">
                                        <button type="button" class="btn btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op');">
                                            <i class="ti-back-left "></i> Volver
                                        </button>

                                        <button type="submit" class="btn btn-rounded btn-primary" data-toggle="tooltip" title="Por Folio" name="AGREGAR" value="AGREGAR" <?php echo $DISABLED; ?>>
                                            <i class="ti-save-alt"></i> P. Folio
                                        </button>
                                        <button type="submit" class="btn btn-rounded btn-info" data-toggle="tooltip" title="Por Envases" name="DIVIDIR" value="DIVIDIR" <?php echo $DISABLED; ?>>
                                            <i class="ti-save-alt"></i> P. Envases
                                        </button>
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
        //OPERACION DE REGISTRO DE FILA
        if (isset($_REQUEST['AGREGAR'])) {
            $IDPROCESO = $_REQUEST['IDP'];
            if (isset($_REQUEST['SELECIONAREXISTENCIA'])) {
                $SELECIONAREXISTENCIA = $_REQUEST['SELECIONAREXISTENCIA'];
                //var_dump($SELECIONAREXISTENCIA);
                foreach ($SELECIONAREXISTENCIA as $r) :
                    $IDEXISMATERIAPRIMA = $r;
                    $EXIMATERIAPRIMA->__SET('ID_PROCESO', $IDPROCESO);
                    $EXIMATERIAPRIMA->__SET('ID_EXIMATERIAPRIMA', $IDEXISMATERIAPRIMA);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $EXIMATERIAPRIMA_ADO->actualizarSelecionarProcesoCambiarEstado($EXIMATERIAPRIMA);
                endforeach;

                $_SESSION["parametro"] =  $_REQUEST['IDP'];
                $_SESSION["parametro1"] =  $_REQUEST['OPP'];

                echo
                "<script>
                        Swal.fire({
                            icon:'info',
                            title:'Folios agregados al proceso'
                        }).then((result)=>{
                            if(result.value){
                                location.href ='" . $_REQUEST['URLO'] . ".php?op';
                            }
                        });
                    </script>";

                // echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
            }
        }
        if (isset($_REQUEST['DIVIDIR'])) {

            $IDPROCESO = $_REQUEST['IDP'];

            $ARRAYIDCAJA = $_REQUEST['IDCAJA'];
            $ARRAYESTANDAR = $_REQUEST['ESTANDAR'];
            $ARRAYFOLIO = $_REQUEST['FOLIO'];
            $ARRAYIDEXISTENCIA = $_REQUEST['IDEXISTENCIA'];
            $ARRAYENVASEORIGINAL = $_REQUEST['ENVASEORIGINAL'];
            $ARRAYENVASE = $_REQUEST['ENVASE'];
            $ARRAYPROMEDIO = $_REQUEST['PROMEDIO'];
            $ARRAYPESOPALLET = $_REQUEST['PESOPALLET'];


            if (isset($_REQUEST['IDCAJA'])) {
                foreach ($ARRAYIDCAJA as $ID) :
                    $IDNETO = $ID - 1;

                    $ESTANDAR = $ARRAYESTANDAR[$IDNETO];
                    $IDEXISTENCIA = $ARRAYIDEXISTENCIA[$IDNETO];
                    $FOLIOORIGINAL = $ARRAYFOLIO[$IDNETO];
                    $ENVASE = $ARRAYENVASE[$IDNETO];
                    $ENVASEORIGINAL = $ARRAYENVASEORIGINAL[$IDNETO];
                    $PROMEDIO = $ARRAYPROMEDIO[$IDNETO];
                    $PESOPALLET = $ARRAYPESOPALLET[$IDNETO];


                    if ($ENVASE != "") {
                        $SINONETO = 0;
                        $MENSAJEPRECIO = $MENSAJE;
                        if ($ENVASE <= 0) {
                            $SINONETO = 1;
                            $MENSAJE = $MENSAJE . " <br> " . $FOLIOORIGINAL . ": SOLO DEBEN INGRESAR UN VALOR MAYOR A ZERO";
                        } else {
                            if ($ENVASE >= $ENVASEORIGINAL) {
                                $SINONETO = 1;
                                $MENSAJE = $MENSAJE . " <br> " . $FOLIOORIGINAL . ": LA CANTIDAD DE ENVASES NO PUEDE SER MAYOR O IGUAL A LOS ENVASES ORIGINAL";
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

                        $ARRAYVERESTANDAR = $ERECEPCION_ADO->verEstandar($ESTANDAR);
                        $PESOENVASEESTANDAR = $ARRAYVERESTANDAR[0]["PESO_ENVASE_ESTANDAR"];

                        //KILOS PARA LINEA NUEVA
                        $ENVASERESTANTE = $ENVASEORIGINAL - $ENVASE;
                        $NETORESTANTE = $ENVASERESTANTE * $PROMEDIO;
                        $PESOENVASERESTANTE = $ENVASERESTANTE * $PESOENVASEESTANDAR;
                        $BRUTORESTANTE = $NETORESTANTE + $PESOENVASERESTANTE + $PESOPALLET;

                        //KILOS PARA LA LINEA ACTUAL
                        $ENVASENUEVO = $ENVASE;
                        $NETONUEVO = $ENVASE * $PROMEDIO;
                        $PESOENVASENUEVO = $ENVASE * $PESOENVASEESTANDAR;
                        $BRUTONUEVO = $NETONUEVO + $PESOENVASENUEVO + $PESOPALLET;
                        echo $ENVASE;

                        //ACTUALIZA LOS DATOS DE LA FOLIO ACTUAL

                        $EXIMATERIAPRIMA->__SET('ID_PROCESO', $IDPROCESO);
                        $EXIMATERIAPRIMA->__SET('ID_EXIMATERIAPRIMA', $IDEXISTENCIA);
                        $EXIMATERIAPRIMA->__SET('CANTIDAD_ENVASE_EXIMATERIAPRIMA', $ENVASENUEVO);
                        $EXIMATERIAPRIMA->__SET('KILOS_NETO_EXIMATERIAPRIMA', $NETONUEVO);
                        $EXIMATERIAPRIMA->__SET('KILOS_BRUTO_EXIMATERIAPRIMA', $BRUTONUEVO);
                        // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                        $EXIMATERIAPRIMA_ADO->actualizareEnvasesProcesoKilos($EXIMATERIAPRIMA);

                        $FOLIOALIASESTACTICO = $FOLIOORIGINAL;
                        $FOLIOALIASDIANAMICO = "EMPRESA:" . $_REQUEST['EMPRESA'] . "_PLANTA:" . $_REQUEST['PLANTA'] . "_TEMPORADA:" . $_REQUEST['TEMPORADA'] .
                            "_TIPO_FOLIO:MATERIA PRIMA_DESPACHO:" . $_REQUEST['IDP'] . "_FOLIO:" . $FOLIOORIGINAL;

                        //CREA UNA FOLIO NUEVO CON EL RESTANTE DE LOS ENVASES
                        $ARRAYVEREXITENICA = $EXIMATERIAPRIMA_ADO->verEximateriaprima($IDEXISTENCIA);
                        foreach ($ARRAYVEREXITENICA as $r) :
                            $EXIMATERIAPRIMA->__SET('FOLIO_EXIMATERIAPRIMA', $r['FOLIO_EXIMATERIAPRIMA']);
                            $EXIMATERIAPRIMA->__SET('FOLIO_AUXILIAR_EXIMATERIAPRIMA', $r['FOLIO_AUXILIAR_EXIMATERIAPRIMA']);
                            $EXIMATERIAPRIMA->__SET('FOLIO_MANUAL', $r['FOLIO_MANUAL']);
                            $EXIMATERIAPRIMA->__SET('FECHA_COSECHA_EXIMATERIAPRIMA', $r['FECHA_COSECHA_EXIMATERIAPRIMA']);
                            $EXIMATERIAPRIMA->__SET('CANTIDAD_ENVASE_EXIMATERIAPRIMA', $ENVASERESTANTE);
                            $EXIMATERIAPRIMA->__SET('KILOS_NETO_EXIMATERIAPRIMA', $NETORESTANTE);
                            $EXIMATERIAPRIMA->__SET('KILOS_BRUTO_EXIMATERIAPRIMA', $BRUTORESTANTE);
                            $EXIMATERIAPRIMA->__SET('KILOS_PROMEDIO_EXIMATERIAPRIMA', $r['KILOS_PROMEDIO_EXIMATERIAPRIMA']);
                            $EXIMATERIAPRIMA->__SET('PESO_PALLET_EXIMATERIAPRIMA',  $r['PESO_PALLET_EXIMATERIAPRIMA']);
                            $EXIMATERIAPRIMA->__SET('ALIAS_DINAMICO_FOLIO_EXIMATERIAPRIMA', $FOLIOALIASDIANAMICO);
                            $EXIMATERIAPRIMA->__SET('ALIAS_ESTATICO_FOLIO_EXIMATERIAPRIMA', $FOLIOALIASESTACTICO);
                            $EXIMATERIAPRIMA->__SET('GASIFICADO', $r['GASIFICADO']);
                            $EXIMATERIAPRIMA->__SET('INGRESO', $r['INGRESO']);
                            $EXIMATERIAPRIMA->__SET('ID_TMANEJO', $r['ID_TMANEJO']);
                            $EXIMATERIAPRIMA->__SET('ID_FOLIO', $r['ID_FOLIO']);
                            $EXIMATERIAPRIMA->__SET('ID_ESTANDAR', $r['ID_ESTANDAR']);
                            $EXIMATERIAPRIMA->__SET('ID_PRODUCTOR', $r['ID_PRODUCTOR']);
                            $EXIMATERIAPRIMA->__SET('ID_VESPECIES', $r['ID_VESPECIES']);
                            $EXIMATERIAPRIMA->__SET('ID_RECEPCION', $r['ID_RECEPCION']);
                            $EXIMATERIAPRIMA->__SET('ID_DESPACHO2', $r['ID_DESPACHO2']);
                            $EXIMATERIAPRIMA->__SET('ID_EMPRESA', $EMPRESAS);
                            $EXIMATERIAPRIMA->__SET('ID_PLANTA', $PLANTAS);
                            $EXIMATERIAPRIMA->__SET('ID_TEMPORADA', $TEMPORADAS);
                            // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                            $EXIMATERIAPRIMA_ADO->agregarEximateriaprimaProceso($EXIMATERIAPRIMA);
                        endforeach;
                    }



                endforeach;
                if ($SINO == 0) {

                    $_SESSION["parametro"] =  $_REQUEST['IDP'];
                    $_SESSION["parametro1"] =  $_REQUEST['OPP'];
                    echo
                    "<script>
                            Swal.fire({
                                icon:'info',
                                title:'Folios agregados al proceso'
                            }).then((result)=>{
                                if(result.value){
                                    location.href ='" . $_REQUEST['URLO'] . ".php?op';
                                }
                            });
                    </script>";

                    //   echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
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
        ?>
</body>

</html>