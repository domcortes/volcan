<?php

include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/ERECEPCION_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';

include_once '../../assest/controlador/RECEPCIONMP_ADO.php';
include_once '../../assest/controlador/DESPACHOMP_ADO.php';

include_once '../../assest/controlador/RECHAZOMP_ADO.php';


include_once '../../assest/controlador/EXIMATERIAPRIMA_ADO.php';
include_once '../../assest/modelo/EXIMATERIAPRIMA.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$RECEPCIONMP_ADO =  new RECEPCIONMP_ADO();
$DESPACHOMP_ADO =  new DESPACHOMP_ADO();

$ERECEPCION_ADO =  new ERECEPCION_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();


$RECHAZOMP_ADO =  new RECHAZOMP_ADO();
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
$CONTADOR = 0;
$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$SINO = "";
$SINOENVASE="";
$MENSAJE = "";


$DISABLED = "";
$FOCUS = "";
$BORDER = "";


$IDOP = "";
$IDOP2 = "";
$OP = "";
$NODATOURL = "";



//INICIALIZAR ARREGLOS
$ARRAYEXIMATERIAPRIMA = "";
$ARRAYEVERERECEPCIONID = "";
$ARRAYVERPRODUCTORID = "";
$ARRAYVERPVESPECIESID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYVERFOLIOID = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

//OPERACIONES

if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO'])) {
    $IDP = $_SESSION['parametro'];
    $OPP = $_SESSION['parametro1'];
    $URLO = $_SESSION['urlO'];
    $ARRAYRECHAZO = $RECHAZOMP_ADO->verRechazo($IDP);
    foreach ($ARRAYRECHAZO as $r) :
        $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
        $VESPECIES = "" . $r['ID_VESPECIES'];
    endforeach;
    $ARRAYEXIMATERIAPRIMA = $EXIMATERIAPRIMA_ADO->buscarPorEmpresaPlantaTemporadaVariedadProductorColorNulo($EMPRESAS, $PLANTAS, $TEMPORADAS,  $VESPECIES, $PRODUCTOR);
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
        <?php include_once "../../assest/config/urlHead.php"; ?>
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
            <?php include_once "../../assest/config/menuFruta.php"; 
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
                                            <li class="breadcrumb-item" aria-current="page">Calidad de Fruta</li>
                                            <li class="breadcrumb-item" aria-current="page">Rechazo</li>
                                            <li class="breadcrumb-item" aria-current="page">Materia Prima</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Seleccion Existencia</a>
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
                            <div class="card-header with-border bg-success">                                   
                                <h4 class="box-title">Seleccionar existencia</h4>                                        
                            </div>
                            <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                                <div class="card-body ">
                                    <div clas="row">
                                        <input type="hidden" class="form-control" placeholder="ID PROCESO" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                        <input type="hidden" class="form-control" placeholder="OP PROCESO" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                        <input type="hidden" class="form-control" placeholder="URL PROCESO" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />
                                        <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                        <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                        <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                    </div>
                                    <div clas="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="table-responsive">
                                                <table id="selecionExistencia" class="table-hover " style="width: 100%;">
                                                    <thead>
                                                        <tr class="text-left">
                                                            <th>Folio </th>
                                                            <th>Fecha Cosecha </th>
                                                            <th>Selección</th>
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

                                                            <?php $CONTADOR = $CONTADOR + 1; ?>
                                                            <?php
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
                                    <!-- /.box-body -->
                                    <div class="card-footer">
                                        <div class="btn-group btn-rounded btn-block col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <button type="button" class="btn btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op');">
                                                <i class="ti-back-left "></i> Volver
                                            </button>
                                            <button type="submit" class="btn  btn-primary" data-toggle="tooltip" title="Por Folio" name="AGREGAR" value="AGREGAR" <?php echo $DISABLED; ?>>
                                                <i class="ti-save-alt"></i> P. Folio
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
                <?php include_once "../../assest/config/footer.php";   ?>
                <?php include_once "../../assest/config/menuExtraFruta.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <script>            
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                showConfirmButton: true
            })
            Toast.fire({
                icon: "info",
                title: "Informacion importante",
                html: "<label>Para <b>Selecionar folios</b> completos, seleccione los folios y presione <b>P. Folios </b> </label>"
            })
        </script>
        <?php
        //OPERACION DE REGISTRO DE FILA
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
                        location.href = "registroSelecionExistenciaMPRechazoMp.php?op";                            
                    })
                </script>';
            }
            if($SINO==0){
                //var_dump($SELECIONAREXISTENCIA);
                foreach ($SELECIONAREXISTENCIA as $r) :
                    $IDEXISMATERIAPRIMA = $r;

                    $EXIMATERIAPRIMA->__SET('ID_RECHAZADO', $IDDESPACHO);
                    $EXIMATERIAPRIMA->__SET('ID_EXIMATERIAPRIMA', $IDEXISMATERIAPRIMA);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $EXIMATERIAPRIMA_ADO->actualizarSelecionarRechazoCambiarEstado($EXIMATERIAPRIMA);
                endforeach;

                $_SESSION["parametro"] =  $_REQUEST['IDP'];
                $_SESSION["parametro1"] =  $_REQUEST['OPP'];

                
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Accion realizada",
                        text:"Se agregado la existencia al rechazo.",
                        showConfirmButton: true,
                        confirmButtonText:"Volver a proceso",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href="' . $_REQUEST['URLO'] . '.php?op";                        
                    })
                </script>';
                // echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
            }
        }
        ?>
</body>

</html>