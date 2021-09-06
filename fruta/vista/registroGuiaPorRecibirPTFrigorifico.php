<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/USUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';

include_once '../controlador/FOLIO_ADO.php';
include_once '../controlador/DESPACHOPT_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/TRANSPORTE_ADO.php';
include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/CONDUCTOR_ADO.php';




include_once '../modelo/EXIEXPORTACION.php';
include_once '../modelo/DESPACHOPT.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$FOLIO_ADO =  new FOLIO_ADO();
$DESPACHOPT_ADO =  new DESPACHOPT_ADO();
$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();

$VESPECIES_ADO =  new VESPECIES_ADO();
$PVESPECIES_ADO =  new PVESPECIES_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();


//INIICIALIZAR MODELO
$DESPACHOPT =  new DESPACHOPT();
$EXIEXPORTACION =  new EXIEXPORTACION();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$FOLIO = "";
$FOLIOALIAS = "";

$TOTALBRUTO = "";
$TOTALNETO = "";
$TOTALENVASE = "";
$FECHADESDE = "";
$FECHAHASTA = "";

$PRODUCTOR = "";
$NUMEROGUIA = "";

$DISABLEDFOLIO = "";
$MENSAJEFOLIO = "";

//INICIALIZAR ARREGLOS
$ARRAYDESPACHOPT = "";
$ARRAYDESPACHOPTTOTALES = "";
$ARRAYVEREMPRESA = "";
$ARRAYVERPRODUCTOR = "";
$ARRAYVERTRANSPORTE = "";
$ARRAYVERCONDUCTOR = "";
$ARRAYFOLIO = "";
$ARRAYVERFOLIO = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

//VALIDACION DE FOLIO BASE
$ARRAYFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTexportacion($EMPRESAS, $PLANTAS, $TEMPORADAS);
if (empty($ARRAYFOLIO)) {
    $DISABLEDFOLIO = "disabled";
    $MENSAJEFOLIO = " NECESITA <b> CREAR LOS FOLIOS PT </b> , PARA OCUPAR LA <b>  FUNCIONALIDAD </b>.  FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
}



if (isset($_REQUEST['APROBAR'])) {

    $DESPACHOPT->__SET('ID_DESPACHO', $_REQUEST['ID']);
    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
    $DESPACHOPT_ADO->cerrado($DESPACHOPT);

    $DESPACHOPT->__SET('ID_DESPACHO', $_REQUEST['ID']);
    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
    $DESPACHOPT_ADO->Aprobado($DESPACHOPT);

    $ARRAYEXISENCIADESPACHOMP = $EXIEXPORTACION_ADO->verExistenciaPorDespachoEnTransito($_REQUEST['ID']);
    foreach ($ARRAYEXISENCIADESPACHOMP as $r) :
        $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $r['ID_EXIEXPORTACION']);
        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
        $EXIEXPORTACION_ADO->despachado($EXIEXPORTACION);
    endforeach;
    $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTexportacion($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $FOLIO = $ARRAYVERFOLIO[0]['ID_FOLIO'];

    foreach ($ARRAYEXISENCIADESPACHOMP as $r) :
        $ARRAYVERFOLIOPOEXPO = $EXIEXPORTACION_ADO->buscarPorDespachoEmpresaPlantaTemporadaFolio(
            $r['ID_DESPACHO'],
            $_REQUEST['EMPRESA'],
            $_REQUEST['PLANTA'],
            $_REQUEST['TEMPORADA'],
            $r['FOLIO_AUXILIAR_EXIEXPORTACION']
        );
        $FOLIOALIAS = $r['ALIAS_FOLIO_EXIESPORTACION'] . "_GUIA_POR_RECIBIR_PLANTA:" . $PLANTAS;

        if (empty($ARRAYVERFOLIOPOEXPO)) {
            //UTILIZACION METODOS SET DEL MODELO
            //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
            $EXIEXPORTACION->__SET('FOLIO_EXIEXPORTACION',  $r['FOLIO_EXIEXPORTACION']);
            $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $r['FOLIO_AUXILIAR_EXIEXPORTACION']);
            $EXIEXPORTACION->__SET('FOLIO_MANUAL', $r['FOLIO_MANUAL']);
            $EXIEXPORTACION->__SET('FECHA_EMBALADO_EXIEXPORTACION', $r['FECHA_EMBALADO_EXIEXPORTACION']);
            $EXIEXPORTACION->__SET('CANTIDAD_ENVASE_EXIEXPORTACION', $r['CANTIDAD_ENVASE_EXIEXPORTACION']);
            $EXIEXPORTACION->__SET('KILOS_NETO_EXIEXPORTACION', $r['KILOS_NETO_EXIEXPORTACION']);
            $EXIEXPORTACION->__SET('PDESHIDRATACION_EXIEXPORTACION', $r['PDESHIDRATACION_EXIEXPORTACION']);
            $EXIEXPORTACION->__SET('KILOS_DESHIRATACION_EXIEXPORTACION', $r['KILOS_DESHIRATACION_EXIEXPORTACION']);
            $EXIEXPORTACION->__SET('KILOS_BRUTO_EXIEXPORTACION', $r['KILOS_BRUTO_EXIEXPORTACION']);
            $EXIEXPORTACION->__SET('OBSERVACION_EXIESPORTACION', $r['OBSERVACION_EXIESPORTACION']);
            $EXIEXPORTACION->__SET('ALIAS_FOLIO_EXIESPORTACION', $FOLIOALIAS);
            $EXIEXPORTACION->__SET('STOCK', $r['STOCK']);
            $EXIEXPORTACION->__SET('EMBOLSADO', $r['EMBOLSADO']);
            $EXIEXPORTACION->__SET('GASIFICADO', $r['GASIFICADO']);
            $EXIEXPORTACION->__SET('PREFRIO', $r['PREFRIO']);
            $EXIEXPORTACION->__SET('TESTADOSAG', $r['TESTADOSAG']);
            $EXIEXPORTACION->__SET('VGM', $r['VGM']);
            $EXIEXPORTACION->__SET('ID_ESTANDAR', $r['ID_ESTANDAR']);
            $EXIEXPORTACION->__SET('ID_PRODUCTOR', $r['ID_PRODUCTOR']);
            $EXIEXPORTACION->__SET('ID_PVESPECIES', $r['ID_PVESPECIES']);
            $EXIEXPORTACION->__SET('ID_FOLIO', $FOLIO);
            $EXIEXPORTACION->__SET('ID_PLANTA2', $r['ID_PLANTA']);
            $EXIEXPORTACION->__SET('ID_CALIBRE', $r['ID_CALIBRE']);
            $EXIEXPORTACION->__SET('ID_EMBALAJE', $r['ID_EMBALAJE']);
            $EXIEXPORTACION->__SET('ID_TMANEJO', $r['ID_TMANEJO']);
            $EXIEXPORTACION->__SET('ID_DESPACHO', $_REQUEST['ID']);
            $EXIEXPORTACION->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
            $EXIEXPORTACION->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
            $EXIEXPORTACION->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
            //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
            $EXIEXPORTACION_ADO->agregarExiexportacionGuia($EXIEXPORTACION);
        }

        if ($ARRAYVERFOLIOPOEXPO) {
            //UTILIZACION METODOS SET DEL MODELO
            //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
            $EXIEXPORTACION->__SET('FOLIO_EXIEXPORTACION',  $r['FOLIO_EXIEXPORTACION']);
            $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $r['FOLIO_AUXILIAR_EXIEXPORTACION']);
            $EXIEXPORTACION->__SET('FOLIO_MANUAL', $r['FOLIO_MANUAL']);
            $EXIEXPORTACION->__SET('FECHA_EMBALADO_EXIEXPORTACION', $r['FECHA_EMBALADO_EXIEXPORTACION']);
            $EXIEXPORTACION->__SET('CANTIDAD_ENVASE_EXIEXPORTACION', $r['CANTIDAD_ENVASE_EXIEXPORTACION']);
            $EXIEXPORTACION->__SET('KILOS_NETO_EXIEXPORTACION', $r['KILOS_NETO_EXIEXPORTACION']);
            $EXIEXPORTACION->__SET('PDESHIDRATACION_EXIEXPORTACION', $r['PDESHIDRATACION_EXIEXPORTACION']);
            $EXIEXPORTACION->__SET('KILOS_DESHIRATACION_EXIEXPORTACION', $r['KILOS_DESHIRATACION_EXIEXPORTACION']);
            $EXIEXPORTACION->__SET('KILOS_BRUTO_EXIEXPORTACION', $r['KILOS_BRUTO_EXIEXPORTACION']);
            $EXIEXPORTACION->__SET('OBSERVACION_EXIESPORTACION', $r['OBSERVACION_EXIESPORTACION']);
            $EXIEXPORTACION->__SET('ALIAS_FOLIO_EXIESPORTACION', $FOLIOALIAS);
            $EXIEXPORTACION->__SET('STOCK', $r['STOCK']);
            $EXIEXPORTACION->__SET('EMBOLSADO', $r['EMBOLSADO']);
            $EXIEXPORTACION->__SET('GASIFICADO', $r['GASIFICADO']);
            $EXIEXPORTACION->__SET('PREFRIO', $r['PREFRIO']);
            $EXIEXPORTACION->__SET('TESTADOSAG', $r['TESTADOSAG']);
            $EXIEXPORTACION->__SET('VGM', $r['VGM']);
            $EXIEXPORTACION->__SET('ID_ESTANDAR', $r['ID_ESTANDAR']);
            $EXIEXPORTACION->__SET('ID_PRODUCTOR', $r['ID_PRODUCTOR']);
            $EXIEXPORTACION->__SET('ID_PVESPECIES', $r['ID_PVESPECIES']);
            $EXIEXPORTACION->__SET('ID_FOLIO', $FOLIO);
            $EXIEXPORTACION->__SET('ID_PLANTA2', $r['ID_PLANTA']);
            $EXIEXPORTACION->__SET('ID_CALIBRE', $r['ID_CALIBRE']);
            $EXIEXPORTACION->__SET('ID_EMBALAJE', $r['ID_EMBALAJE']);
            $EXIEXPORTACION->__SET('ID_TMANEJO', $r['ID_TMANEJO']);
            $EXIEXPORTACION->__SET('ID_DESPACHO', $_REQUEST['ID']);
            $EXIEXPORTACION->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
            $EXIEXPORTACION->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
            $EXIEXPORTACION->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
            $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $ARRAYVERFOLIOPOEXPO[0]["ID_EXIEXPORTACION"]);
            //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
            $EXIEXPORTACION_ADO->actualizarExiexportacionGuia($EXIEXPORTACION);
        }

    endforeach;
}

if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {

    $ARRAYDESPACHOPT = $DESPACHOPT_ADO->listarDespachoptEmpresaPlantaTemporadaGuiaCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $ARRAYDESPACHOPTTOTALES = $DESPACHOPT_ADO->obtenerTotalesDespachoptEmpresaPlantaTemporadaGuiaCBX2($EMPRESAS, $PLANTAS, $TEMPORADAS);

    $TOTALBRUTO = $ARRAYDESPACHOPTTOTALES[0]['BRUTO'];
    $TOTALNETO = $ARRAYDESPACHOPTTOTALES[0]['NETO'];
    $TOTALENVASE = $ARRAYDESPACHOPTTOTALES[0]['ENVASE'];
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ingreso Guía PT</title>
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
                //FUNCION PARA REALIZAR UNA ACTUALIZACION DEL FORMULARIO DE REGISTRO DE RECEPCION
                function refrescar() {
                    document.getElementById("form1").submit();
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
        <?php include_once "../config/menu.php";
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">Ingreso Guía Pt</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Frigorifico</li>
                                        <li class="breadcrumb-item" aria-current="page">Guía Por Recibir</li>
                                        <li class="breadcrumb-item" aria-current="page">Producto Terminado</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="registroGuiaPorRecibirPTFrigorifico.php">Ingreso Guía PT </a>
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

                <label id="val_mensaje" class="validacion"><?php echo $MENSAJEFOLIO; ?> </label>
                <!-- Main content -->
                <section class="content">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table id="modulo" class="table table-hover " style="width: 300%;">
                                            <thead>
                                                <tr class="text-left">
                                                    <th>Número </th>
                                                    <th>Estado</th>
                                                    <th>Operaciónes</th>
                                                    <th>Empresa</th>
                                                    <th>Fecha Despacho </th>
                                                    <th>Número Guía </th>
                                                    <th>Cantidad Envase</th>
                                                    <th>Kilos Neto</th>
                                                    <th>Kilos Bruto</th>
                                                    <th>Fecha Ingreso</th>
                                                    <th>Fecha Modificación</th>
                                                    <th>Transporte </th>
                                                    <th>Nombre Conductor </th>
                                                    <th>Patente Camión </th>
                                                    <th>Patente Carro </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYDESPACHOPT as $r) : ?>

                                                    <tr class="text-left">
                                                        <td>
                                                            <a href="#" class="text-warning hover-warning">
                                                                <?php echo $r['NUMERO_DESPACHO']; ?>
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
                                                        <td>
                                                            <form method="post" id="form1">
                                                                <div class="list-icons d-inline-flex">
                                                                    <div class="list-icons-item dropdown">
                                                                        <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-cog"></i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <input type="hidden" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESA; ?>" />
                                                                            <input type="hidden" id="PLANTA" name="PLANTA" value="<?php echo $PLANTA; ?>" />
                                                                            <input type="hidden" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADA; ?>" />
                                                                            <input type="hidden" class="form-control" placeholder="ID DESPACHOPT" id="ID" name="ID" value="<?php echo $r['ID_DESPACHO']; ?>" />
                                                                            <button type="submit" class="btn btn-rounded btn-sm btn-success btn-outline mr-1" id="defecto" name="APROBAR" value="APROBAR" <?php echo $DISABLEDFOLIO; ?>>
                                                                                <i class="fa fa-check"></i>
                                                                            </button>Aprobar <br>
                                                                            <button type="button" class="btn btn-rounded btn-sm btn-danger btn-outline mr-1" id="defecto" name="Rechazar" <?php echo $DISABLEDFOLIO; ?> Onclick="abrirVentana('registroMguiaPT.php?IDDESPACHO=<?php echo $r['ID_DESPACHO']; ?>&&EMPRESA=<?php echo $EMPRESAS; ?>&&PLANTA=<?php echo $PLANTAS; ?>&&TEMPORADA=<?php echo $TEMPORADAS; ?> '); ">
                                                                                <i class="fa fa-close"></i>
                                                                            </button>Rechazar <br>
                                                                            <div class="dropdown-divider"></div>
                                                                            <button type="button" class="btn btn-rounded btn-sm btn-danger btn-outline mr-1" id="defecto" name="Informe" <?php echo $DISABLEDFOLIO; ?> Onclick="abrirVentana('../documento/informeDespachoPTGuia.php?parametro=<?php echo $r['ID_DESPACHO']; ?>'); ">
                                                                                <i class="fa fa-file-pdf-o"></i>
                                                                            </button>Informe <br>
                                                                            <div class="dropdown-divider"></div>
                                                                            <button type="button" class="btn btn-rounded btn-sm btn-info btn-outline mr-1" id="defecto" name="ver" <?php echo $DISABLEDFOLIO; ?> Onclick="irPagina('verGuiaPorRecibirPTFrigorifico.php?parametro=<?php echo $r['ID_DESPACHO']; ?>&&parametro1=ver'); ">
                                                                                <i class="ti-eye"></i>
                                                                            </button>Ver
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $ARRAYVEREMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                            echo $ARRAYVEREMPRESA[0]['NOMBRE_EMPRESA']
                                                            ?>
                                                        </td>
                                                        <td><?php echo $r['FECHA_DESPACHO']; ?></td>
                                                        <td><?php echo $r['NUMERO_GUIA_DESPACHO']; ?></td>
                                                        <td><?php echo $r['CANTIDAD_ENVASE_DESPACHO']; ?></td>
                                                        <td><?php echo $r['KILOS_NETO_DESPACHO']; ?></td>
                                                        <td><?php echo $r['KILOS_BRUTO_DESPACHO']; ?></td>
                                                        <td><?php echo $r['FECHA_INGRESO_DESPACHO']; ?></td>
                                                        <td><?php echo $r['FECHA_MODIFICACION_DESPACHO']; ?></td>
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


                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-sm-6">
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
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Total Bruto </label>
                                            <input type="text" class="form-control" placeholder="Total Bruto" id="TOTALBRUTOV" name="TOTALBRUTOV" value="<?php echo $TOTALBRUTO; ?>" disabled />
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