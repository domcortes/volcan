<?php


include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/RECEPCIONMP_ADO.php';
include_once '../controlador/ERECEPCION_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/ESPECIES_ADO.php';
include_once '../controlador/REPALETIZAJEMP_ADO.php';
include_once '../controlador/DESPACHOMP_ADO.php';


include_once '../controlador/EXIMATERIAPRIMA_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$RECEPCIONMP_ADO =  new RECEPCIONMP_ADO();
$ERECEPCION_ADO =  new ERECEPCION_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$REPALETIZAJEMP_ADO =  new REPALETIZAJEMP_ADO();
$DESPACHOMP_ADO =  new DESPACHOMP_ADO();

$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();



//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD




//INICIALIZAR ARREGLOS
$ARRAYRECEPCION = "";
$ARRAYEXIMATERIAPRIMA = "";
$ARRAYEVERERECEPCIONID = "";
$ARRAYVERPRODUCTORID = "";
$ARRAYVERPVESPECIESID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYVERESPECIESID = "";
$ARRAYVERFOLIOID = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES


if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {
    $ARRAYEXIMATERIAPRIMA = $EXIMATERIAPRIMA_ADO->listarEximateriaprimaEmpresaPlantaTemporada2($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $ARRAYEXIMATERIAPRIMATOTALES = $EXIMATERIAPRIMA_ADO->obtenerTotalesEmpresaPlantaTemporadaDisponible2($EMPRESAS, $PLANTAS, $TEMPORADAS);
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Listar Materia Prima</title>
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
                                <h3 class="page-title">Materia Prima</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Existencia</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="listarHEximateriaprima.php"> Listar Existencia Materia Prima </a>
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
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table id="hexistencia" class="table table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="text-left">
                                                        <th>Folio Original</th>
                                                        <th>Folio Actual</th>
                                                        <th>Estado</th>
                                                        <th>Fecha Cosecha </th>
                                                        <th>CSG Productor </th>
                                                        <th>Nombre Productor </th>
                                                        <th>Código Estandar </th>
                                                        <th>Envase/Estandar </th>
                                                        <th>Especies </th>
                                                        <th>Variedad </th>
                                                        <th>Cantidad Envase</th>
                                                        <th>Kilo Neto</th>
                                                        <th>Kilo Promedio </th>
                                                        <th>Kilo Bruto </th>
                                                        <th>Número Recepción</th>
                                                        <th>Fecha Recepción</th>
                                                        <th>Tipo Recepción</th>
                                                        <th>Fecha Guía Recepción</th>
                                                        <th>Número Guia Recepción</th>
                                                        <th>Número Repaletizaje</th>
                                                        <th>Fecha Repaletizaje</th>
                                                        <th>Número Despacho</th>
                                                        <th>Fecha Despacho</th>
                                                        <th>Número Guia Despacho</th>
                                                        <th>Dias </th>
                                                        <th>Ingreso </th>
                                                        <th>Modificación </th>
                                                        <th>Empresa</th>
                                                        <th>Planta</th>
                                                        <th>Temporada</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYEXIMATERIAPRIMA as $r) : ?>
                                                        <?php
                                                        if ($r['ESTADO'] == "0") {
                                                            $ESTADO = "Eliminado";
                                                        }
                                                        if ($r['ESTADO'] == "1") {
                                                            $ESTADO = "Ingresando";
                                                        }
                                                        if ($r['ESTADO'] == "2") {
                                                            $ESTADO = "Disponible";
                                                        }
                                                        if ($r['ESTADO'] == "3") {
                                                            $ESTADO = "En Proceso";
                                                        }
                                                        if ($r['ESTADO'] == "4") {
                                                            $ESTADO = "Procesado";
                                                        }
                                                        if ($r['ESTADO'] == "5") {
                                                            $ESTADO = "En Repaletizaje";
                                                        }
                                                        if ($r['ESTADO'] == "6") {
                                                            $ESTADO = "Repaletizado";
                                                        }
                                                        if ($r['ESTADO'] == "7") {
                                                            $ESTADO = "En Despacho";
                                                        }
                                                        if ($r['ESTADO'] == "8") {
                                                            $ESTADO = "Despachado";
                                                        }
                                                        if ($r['ESTADO'] == "9") {
                                                            $ESTADO = "En Transito";
                                                        }
                                                        if ($r['ESTADO'] == "10") {
                                                            $ESTADO = "Rechazado";
                                                        }
                                                        $ARRAYRECEPCION = $RECEPCIONMP_ADO->verRecepcion2($r['ID_RECEPCION']);
                                                        if ($ARRAYRECEPCION) {
                                                            $NUMERORECEPCION = $ARRAYRECEPCION[0]["NUMERO_RECEPCION"];
                                                            $NUMEROGUIARECEPCION = $ARRAYRECEPCION[0]["NUMERO_GUIA_RECEPCION"];
                                                            $FECHAGUIARECEPCION = $ARRAYRECEPCION[0]["GUIA"];
                                                            if ($ARRAYRECEPCION[0]["TRECEPCION"] == 1) {
                                                                $TIPORECEPCION = "Desde Productor";
                                                            }
                                                            if ($ARRAYRECEPCION[0]["TRECEPCION"] == 2) {
                                                                $TIPORECEPCION = "Planta Externa";
                                                            }
                                                        } else {
                                                            $NUMERORECEPCION = "Sin Datos";
                                                            $NUMEROGUIARECEPCION = "Sin Datos";
                                                            $FECHAGUIARECEPCION = "Sin Datos";
                                                        }
                                                        $ARRATREPALETIZAJE = $REPALETIZAJEMP_ADO->verRepaletizaje2($r['ID_REPALETIZAJE']);
                                                        if ($ARRATREPALETIZAJE) {
                                                            $NUMEROREPALETIZAJE = $ARRATREPALETIZAJE[0]["NUMERO_REPALETIZAJE"];
                                                        } else {
                                                            $NUMEROREPALETIZAJE = "Sin Datos";
                                                        }
                                                        $ARRAYDESPACHO = $DESPACHOMP_ADO->verDespachomp2($r['ID_DESPACHO']);
                                                        if ($ARRAYDESPACHO) {
                                                            $NUMERODESPACHO = $ARRAYDESPACHO[0]["NUMERO_DESPACHO"];
                                                            $NUMEROGUIADESPACHO = $ARRAYDESPACHO[0]["NUMERO_GUIA_DESPACHO"];
                                                        } else {
                                                            $NUMERODESPACHO = "Sin Datos";
                                                            $NUMEROGUIADESPACHO = "Sin Datos";
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
                                                        $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                        if ($ARRAYEMPRESA) {
                                                            $NOMBREEMPRESA = $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
                                                        } else {
                                                            $NOMBREEMPRESA = "Sin Datos";
                                                        }
                                                        $ARRAYPLANTA = $PLANTA_ADO->verPlanta($r['ID_PLANTA']);
                                                        if ($ARRAYPLANTA) {
                                                            $NOMBREPLANTA = $ARRAYPLANTA[0]['NOMBRE_PLANTA'];
                                                        } else {
                                                            $NOMBREPLANTA = "Sin Datos";
                                                        }
                                                        $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($r['ID_TEMPORADA']);
                                                        if ($ARRAYTEMPORADA) {
                                                            $NOMBRETEMPORADA = $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
                                                        } else {
                                                            $NOMBRETEMPORADA = "Sin Datos";
                                                        }
                                                        ?>
                                                        <tr class="text-left">
                                                            <td><?php echo $r['FOLIO_EXIMATERIAPRIMA']; ?> </td>
                                                            <td><?php echo $r['FOLIO_AUXILIAR_EXIMATERIAPRIMA']; ?> </td>
                                                            <td><?php echo $ESTADO; ?></td>
                                                            <td><?php echo $r['COSECHA']; ?></td>
                                                            <td><?php echo $CSGPRODUCTOR; ?></td>
                                                            <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                            <td><?php echo $CODIGOESTANDAR; ?></td>
                                                            <td><?php echo $NOMBREESTANDAR; ?></td>
                                                            <td><?php echo $NOMBRESPECIES; ?></td>
                                                            <td><?php echo $NOMBREVESPECIES; ?></td>
                                                            <td><?php echo $r['ENVASE']; ?></td>
                                                            <td><?php echo $r['NETO']; ?></td>
                                                            <td><?php echo $r['PROMEDIO']; ?></td>
                                                            <td><?php echo $r['BRUTO']; ?></td>
                                                            <td><?php echo $NUMERORECEPCION; ?></td>
                                                            <td><?php echo $r['RECEPCION']; ?></td>
                                                            <td><?php echo $TIPORECEPCION; ?></td>
                                                            <td><?php echo $FECHAGUIARECEPCION; ?></td>
                                                            <td><?php echo $NUMEROGUIARECEPCION; ?></td>
                                                            <td><?php echo $NUMEROREPALETIZAJE; ?></td>
                                                            <td><?php echo $r['REPALETIZAJE']; ?></td>
                                                            <td><?php echo $NUMERODESPACHO; ?></td>
                                                            <td><?php echo $r['DESPACHO']; ?></td>
                                                            <td><?php echo $NUMEROGUIADESPACHO; ?></td>
                                                            <td><?php echo $r['DIAS']; ?></td>
                                                            <td><?php echo $r['INGRESO']; ?></td>
                                                            <td><?php echo $r['MODIFICACION']; ?></td>
                                                            <td><?php echo $NOMBREEMPRESA; ?></td>
                                                            <td><?php echo $NOMBREPLANTA; ?></td>
                                                            <td><?php echo $NOMBRETEMPORADA; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr class="text-left" id="filtro">
                                                        <th>Folio Original</th>
                                                        <th>Folio Actual</th>
                                                        <th>Estado</th>
                                                        <th>Fecha Cosecha </th>
                                                        <th>CSG Productor </th>
                                                        <th>Nombre Productor </th>
                                                        <th>Código Estandar </th>
                                                        <th>Envase/Estandar </th>
                                                        <th>Especies </th>
                                                        <th>Variedad </th>
                                                        <th>Cantidad Envase</th>
                                                        <th>Kilo Neto</th>
                                                        <th>Kilo Promedio </th>
                                                        <th>Kilo Bruto </th>
                                                        <th>Número Recepción</th>
                                                        <th>Fecha Recepción</th>
                                                        <th>Tipo Recepción</th>
                                                        <th>Fecha Guía Recepción</th>
                                                        <th>Número Guia Recepción</th>
                                                        <th>Número Repaletizaje</th>
                                                        <th>Fecha Repaletizaje</th>
                                                        <th>Número Despacho</th>
                                                        <th>Fecha Despacho</th>
                                                        <th>Número Guia Despacho</th>
                                                        <th>Dias </th>
                                                        <th>Ingreso </th>
                                                        <th>Modificación </th>
                                                        <th>Empresa</th>
                                                        <th>Planta</th>
                                                        <th>Temporada</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Total Envase </label>
                                            <input type="text" class="form-control" placeholder="Total Envase" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALENVASE; ?>" disabled />
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Total Neto </label>
                                            <input type="text" class="form-control" placeholder="Total Neto" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALNETO; ?>" disabled />
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





            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../config/footer.php"; ?>
                <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>