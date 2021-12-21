<?php


include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/ICARGA_ADO.php';
include_once '../../assest/controlador/DICARGA_ADO.php';
include_once '../../assest/controlador/TCONTENEDOR_ADO.php';
include_once '../../assest/controlador/AERONAVE_ADO.php';
include_once '../../assest/controlador/NAVE_ADO.php';
include_once '../../assest/controlador/DFINAL_ADO.php';
include_once '../../assest/controlador/DESPACHOEX_ADO.php';


include_once '../../assest/modelo/ICARGA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$ICARGA_ADO =  new ICARGA_ADO();
$DICARGA_ADO =  new DICARGA_ADO();

$TCONTENEDOR_ADO =  new TCONTENEDOR_ADO();
$AERONAVE_ADO =  new AERONAVE_ADO();
$NAVE_ADO =  new NAVE_ADO();
$DFINAL_ADO =  new DFINAL_ADO();
$DESPACHOEX_ADO =  new DESPACHOEX_ADO();
//INICIALIZAR MODELO

$ICARGA =  new ICARGA();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$TOTALENVASE = "";
$TOTALNETO = "";
$TOTALBRUTO = "";
$TOTALUS   = "";

$FECHADESDE = "";
$FECHAHASTA = "";


//INICIALIZAR ARREGLOS
$ARRAYICARGA = "";
$ARRAYTOTALICARGA = "";

$ARRAYTCONTENEDOR = "";
$ARRAYTVEHICULO = "";
$ARRAYAERONAVE = "";
$ARRAYNAVE = "";
$ARRAYDFINAL = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES


if ($EMPRESAS   && $TEMPORADAS) {

    $ARRAYICARGA = $ICARGA_ADO->listarIcargaEmpresaTemporadaCBX($EMPRESAS,  $TEMPORADAS);
    $ARRAYTOTALICARGA = $ICARGA_ADO->obtenerTotalesEmpresaTemporada($EMPRESAS,  $TEMPORADAS);
    $TOTALENVASE = $ARRAYTOTALICARGA[0]['ENVASE'];
    $TOTALNETO = $ARRAYTOTALICARGA[0]['NETO'];
    $TOTALBRUTO = $ARRAYTOTALICARGA[0]['BRUTO'];
    $TOTALUS = $ARRAYTOTALICARGA[0]['US'];
}
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrLP.php";






?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title> Agrupado Instructivo Carga</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
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

                function abrirVentana(url) {
                    var opciones =
                        "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1600, height=1000'";
                    window.open(url, 'window', opciones);
                }

                function abrirPestana(url) {
                    var win = window.open(url, '_blank');
                    win.focus();
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" onload="mueveReloj()">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuExpo.php"; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Instructivo Carga</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Logistica</li>
                                            <li class="breadcrumb-item" aria-current="page">Instructivo Carga</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Agrupado Instructivo Carga </a>
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
                                            <table id="modulo" class="table table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="text-left">
                                                        <th>Número </th>
                                                        <th>Número Referencia</th>
                                                        <th>Estado</th>
                                                        <th>Fecha Instructivo</th>
                                                        <th class="text-center">Operaciónes </th>
                                                        <th>Estado Instructivo</th>
                                                        <th>Tipo Emarque</th>
                                                        <th>Tipo Contenedor</th>
                                                        <th>Contenedor</th>
                                                        <th>Fecha ETD</th>
                                                        <th>Fecha ETA</th>
                                                        <th>Días Estimados</th>
                                                        <th>Días Reales </th>
                                                        <th>Destino Final </th>
                                                        <th>Total Envase</th>
                                                        <th>Total Kg. Neto</th>
                                                        <th>Total Kg. Bruto</th>
                                                        <th>Total Precio Us</th>
                                                        <th>Empresa</th>
                                                        <th>Temporada</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYICARGA as $r) : ?>

                                                        <?php
                                                        if ($r['ESTADO_ICARGA'] == "1") {
                                                            $ESTADOICARGA = "Creado";
                                                        }
                                                        if ($r['ESTADO_ICARGA'] == "2") {
                                                            $ESTADOICARGA = "Por Cargar";
                                                        }
                                                        if ($r['ESTADO_ICARGA'] == "3") {
                                                            $ESTADOICARGA = "Cargado";
                                                        }
                                                        if ($r['ESTADO_ICARGA'] == "4") {
                                                            $ESTADOICARGA = "Arrivado";
                                                        }
                                                        if ($r['ESTADO_ICARGA'] == "5") {
                                                            $ESTADOICARGA = "Cancelado";
                                                        }
                                                        if ($r['TEMBARQUE_ICARGA'] == "1") {
                                                            $TEMBARQUE = "Terrestre";
                                                        }
                                                        if ($r['TEMBARQUE_ICARGA'] == "2") {
                                                            $TEMBARQUE = "Aereo";
                                                        }
                                                        if ($r['TEMBARQUE_ICARGA'] == "3") {
                                                            $TEMBARQUE = "Maritimo";
                                                        }
                                                        $ARRAYTCONTENEDOR = $TCONTENEDOR_ADO->verTcontenedor($r['ID_TCONTENEDOR']);
                                                        if ($ARRAYTCONTENEDOR) {
                                                            $NOMBRETCONTENEDOR = $ARRAYTCONTENEDOR[0]['NOMBRE_TCONTENEDOR'];
                                                        } else {
                                                            $NOMBRETCONTENEDOR = "Sin Datos";
                                                        }
                                                        $ARRAYDFINAL = $DFINAL_ADO->verDfinal($r['ID_DFINAL']);
                                                        if ($ARRAYDFINAL) {
                                                            $NOMBRDFINAL = $ARRAYDFINAL[0]['NOMBRE_DFINAL'];
                                                        } else {
                                                            $NOMBRDFINAL = "Sin Datos";
                                                        }

                                                        $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                        if ($ARRAYEMPRESA) {
                                                            $NOMBREEMPRESA = $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
                                                        } else {
                                                            $NOMBREEMPRESA = "Sin Datos";
                                                        }
                                                        $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($r['ID_TEMPORADA']);
                                                        if ($ARRAYTEMPORADA) {
                                                            $NOMBRETEMPORADA = $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
                                                        } else {
                                                            $NOMBRETEMPORADA = "Sin Datos";
                                                        }
                                                        
                                                        $ARRAYDESPACHOEX=$DESPACHOEX_ADO->buscarDespachoExPorIcarga($r['ID_ICARGA']);                                                     
                                                        ?>
                                                        <tr class="text-left">
                                                            <td> <?php echo $r['NUMERO_ICARGA']; ?>  </td>
                                                            <td> <?php echo $r['NREFERENCIA_ICARGA']; ?>  </td>
                                                            <td>
                                                                <?php if ($r['ESTADO'] == "0") { ?>
                                                                    <button type="button" class="btn btn-block btn-danger">Cerrado</button>
                                                                <?php  }  ?>
                                                                <?php if ($r['ESTADO'] == "1") { ?>
                                                                    <button type="button" class="btn btn-block btn-success">Abierto</button>
                                                                <?php  }  ?>
                                                            </td>
                                                            <td> <?php echo $r['FECHA']; ?> </td>
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <i class="glyphicon glyphicon-cog"></i>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <button class="dropdown-menu" aria-labelledby="dropdownMenuButton"></button>
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_ICARGA']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroICarga" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URLO" name="URLO" value="listarICarga" />


                                                                                <span href="#" class="dropdown-item">                         
                                                                                    <div class="btn-group btn-block col-12" role="group" aria-label="Acciones generales">  
                                                                                        <?php if ($r['ESTADO'] == "0") { ?>
                                                                                            <button type="submit" class="btn btn-info  " id="VERURL" name="VERURL" data-toggle="tooltip"  title="Ver">
                                                                                                <i class="ti-eye"></i> Ver
                                                                                            </button>
                                                                                        <?php } ?>
                                                                                        <?php if ($r['ESTADO'] == "1") { ?>
                                                                                                <button type="submit" class="btn  btn-warning " id="EDITARURL" name="EDITARURL" data-toggle="tooltip"  title="Editar">
                                                                                                    <i class="ti-pencil-alt"></i> Editar
                                                                                                </button>
                                                                                        <?php } ?>  
                                                                                        
                                                                                        <?php if ($ARRAYDESPACHOEX) { ?>
                                                                                            <button type="submit" class="btn btn-success " id="CARGADO" name="CARGADO"  data-toggle="tooltip"  title="Cargado"
                                                                                            <?php  if ($r['ESTADO_ICARGA'] == "3")  { echo "disabled"; }?>>
                                                                                                <i class="fa fa-check"></i> Cargado
                                                                                            </button>  
                                                                                        <?php } ?>  

                                                                                    </div>                                                                                   
                                                                                </span>                                                                            
                                                                                <hr>     
                                                                                <span href="#" class="dropdown-item">                         
                                                                                    <div class="btn-group btn-block col-12" role="group" aria-label="Acciones generales"> 
                                                                                        <button type="button" class="btn  btn-danger  " id="defecto" name="informe" data-toggle="tooltip"  title="Instructivo Español" Onclick="abrirPestana('../../assest/documento/informeIcargaEspanol.php?parametro=<?php echo $r['ID_ICARGA']; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                                                            <i class="fa fa-file-pdf-o"></i> Instructivo Español
                                                                                        </button>    
                                                                                        <button type="button" class="btn  btn-danger  " id="defecto" name="informe" data-toggle="tooltip"  title="Instruction English" Onclick="abrirPestana('../../assest/documento/informeIcargaEnglish.php?parametro=<?php echo $r['ID_ICARGA']; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                                                                <i class="fa fa-file-pdf-o"></i> Instruction English
                                                                                        </button>                                                                                 
                                                                                    </div>                                                                                   
                                                                                </span>                                                                                   
                                                                                <span href="#" class="dropdown-item">                         
                                                                                    <div class="btn-group btn-block col-12" role="group" aria-label="Acciones generales"> 
                                                                                        <button type="button" class="btn  btn-danger  " id="defecto" name="informe" data-toggle="tooltip"  title="Report Invoice" Onclick="abrirPestana('../../assest/documento/informeIcargaInvoice.php?parametro=<?php echo $r['ID_ICARGA']; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                                                            <i class="fa fa-file-pdf-o"></i> Invoice
                                                                                        </button>    
                                                                                        <button type="button" class="btn  btn-danger  " id="defecto" name="informe" data-toggle="tooltip"  title="Informe Carga Real" Onclick="abrirPestana('../../assest/documento/informeICargaReal.php?parametro=<?php echo $r['ID_ICARGA']; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                                                                <i class="fa fa-file-pdf-o"></i>  Carga Real
                                                                                        </button>                                                                                 
                                                                                    </div>                                                                                   
                                                                                </span>                                                                               
                                                                                <span href="#" class="dropdown-item">                         
                                                                                    <div class="btn-group btn-block col-12" role="group" aria-label="Acciones generales"> 
                                                                                        <button type="button" class="btn  btn-success  " id="defecto" name="informe" data-toggle="tooltip"  title="Reporte Carga Real" Onclick="abrirPestana('../../assest/reporte/reporteCargaRealcarga.php?parametro=<?php echo $r['ID_ICARGA']; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                                                            <i class="fa fa-file-excel-o"></i> Carga Real
                                                                                        </button>    
                                                                                        <button type="button" class="btn  btn-success  " id="defecto" name="informe" data-toggle="tooltip"  title="Reporte Packing Lis" Onclick="abrirPestana('../../assest/reporte/reporteICargaPackingList.php?parametro=<?php echo $r['ID_ICARGA']; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                                                            <i class="fa fa-file-excel-o"></i>   Packing List
                                                                                        </button>                                                                                 
                                                                                    </div>                                                                                   
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </td>
                                                            <td> <?php echo $ESTADOICARGA; ?> </td>
                                                            <td> <?php echo $TEMBARQUE; ?> </td>
                                                            <td> <?php echo $NOMBRETCONTENEDOR; ?> </td>
                                                            <td> <?php echo $r['CONTENEDOR']; ?> </td>
                                                            <td> <?php echo $r['FECHAETD']; ?> </td>
                                                            <td> <?php echo $r['FECHAETA']; ?> </td>
                                                            <td> <?php echo $r['ESTIMADO']; ?> </td>
                                                            <td> <?php echo $r['REAL']; ?> </td>
                                                            <td> <?php echo $NOMBRDFINAL; ?> </td>
                                                            <td> <?php echo $r['ENVASE']; ?> </td>
                                                            <td> <?php echo $r['NETO'];  ?> </td>
                                                            <td> <?php echo $r['BRUTO'];  ?> </td>
                                                            <td> <?php echo $r['US'];  ?> </td>
                                                            <td><?php echo $NOMBREEMPRESA; ?></td>
                                                            <td><?php echo $NOMBRETEMPORADA; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Datos generales">
                                    <div class="form-row align-items-center" role="group" aria-label="Datos">
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Envase</div>
                                                    <!-- input -->
                                                    <input type="text" class="form-control" placeholder="Total Envase" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALENVASE; ?>" disabled />
                                                    <!-- /input -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Kg. Neto</div>
                                                    <!-- input -->
                                                    <input type="text" class="form-control" placeholder="Total Envase" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALNETO; ?>" disabled />
                                                    <!-- /input -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Kg. Bruto</div>
                                                    <!-- input -->
                                                    <input type="text" class="form-control" placeholder="Total Bruto" id="TOTALBRUTOV" name="TOTALBRUTOV" value="<?php echo $TOTALBRUTO; ?>" disabled />
                                                    <!-- /input -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total US</div>
                                                    <!-- input -->
                                                    <input type="text" class="form-control" placeholder="Total US" id="TOTALUSV" name="TOTALUSV" value="<?php echo $TOTALUS; ?>" disabled />
                                                    <!-- /input -->
                                                </div>
                                            </div>
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
                <?php include_once "../../assest/config/footer.php"; ?>
                <?php include_once "../../assest/config/menuExtraExpo.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>

        <?php         
        if (isset($_REQUEST['CARGADO'])) {


            $ICARGA->__SET('ID_USUARIOM', $IDUSUARIOS);
            $ICARGA->__SET('ID_ICARGA', $_REQUEST['ID']);
            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
            $ICARGA_ADO->CargadoCerrado($ICARGA);            
            echo '<script>
                Swal.fire({
                    icon:"info",
                    title:"Registro Modificado",
                    text:"El registro de Instructivo se ha modificada correctamente",
                    showConfirmButton: true,
                    confirmButtonText:"Cerrar",
                    closeOnConfirm:false
                }).then((result)=>{
                    location.href = "listarICarga.php";                        
                })
            </script>';



        }   
        ?>
</body>

</html>