<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/TDOCUMENTO_ADO.php';
include_once '../controlador/BODEGA_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/PROVEEDOR_ADO.php';
include_once '../controlador/CLIENTE_ADO.php';

include_once '../controlador/PRODUCTO_ADO.php';
include_once '../controlador/TCONTENEDOR_ADO.php';
include_once '../controlador/TUMEDIDA_ADO.php';

include_once '../controlador/OCOMPRA_ADO.php';
include_once '../controlador/RECEPCIONM_ADO.php';
include_once '../controlador/DESPACHOM_ADO.php';

include_once '../controlador/INVENTARIOM_ADO.php';
include_once '../controlador/FICHA_ADO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TDOCUMENTO_ADO = new TDOCUMENTO_ADO();
$BODEGA_ADO = new BODEGA_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$PROVEEDOR_ADO = new PROVEEDOR_ADO();
$CLIENTE_ADO = new CLIENTE_ADO();

$PRODUCTO_ADO = new PRODUCTO_ADO();
$TCONTENEDOR_ADO = new TCONTENEDOR_ADO();
$TUMEDIDA_ADO = new TUMEDIDA_ADO();


$OCOMPRA_ADO = new OCOMPRA_ADO();
$RECEPCIONM_ADO = new RECEPCIONM_ADO();
$DESPACHOM_ADO = new DESPACHOM_ADO();


$INVENTARIOM_ADO = new INVENTARIOM_ADO();
$FICHA_ADO =  new FICHA_ADO();



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
$ARRAYINVENTARIO = "";
$ARRAYINVENTARIOTOTALES = "";


$ARRAYVERBODEGA = "";
$ARRAYVERTCONTENEDOR = "";
$ARRAYVERTUMEDIDA = "";
$ARRAYVERPRODUCTO = "";
$ARRAYDRECEPCION = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {
    $ARRAYINVENTARIO = $INVENTARIOM_ADO->listarKardexInventarioPorEmpresaTemporadaCBX($EMPRESAS,  $TEMPORADAS);
    $ARRAYFICHA = $FICHA_ADO->listarConsumoFichaPorEmpresaTemporadaCBX($EMPRESAS,   $TEMPORADAS);
}

include_once "../config/validarDatosUrl.php";
include_once "../config/reporteUrl.php";


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Existencia Materiales</title>
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


                    //     document.form_reg_dato.HORAINVENTARIO.value = horaImprimible;
                    document.fechahora.fechahora.value = fechaImprimible + " " + horaImprimible;
                    setTimeout("mueveReloj()", 1000);
                }
                /*
                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }*/

                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE INVENTARIO
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
                            <h3 class="page-title">Existencia Materiales</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Historial</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="listarHInventariom.php"> Existencia Materiales </a>
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
                                        <table id="hexistencia" class="table table-hover " style="width: 100%;">
                                            <thead>
                                                <tr  class="center">
                                                    <th>Codigo Producto </th>
                                                    <th>Nombre Producto </th>
                                                    <th>Unidad Medida</th>
                                                    <th>Nombre Bodega</th>    
                                                    <th>Empresa</th>
                                                    <th>Planta</th>                                                
                                                    <th>Tipo entrada</th>
                                                    <th>Fecha entrada</th>                                                    
                                                    <th>Origen entrada</th>                                                    
                                                    <th>N° Registro entrada</th>
                                                    <th>N° Documento entrada</th>  
                                                    <th>Tipo Salida</th>
                                                    <th>Fecha Salida</th>                                                   
                                                    <th>Destino Salida</th>                                                
                                                    <th>N° Registro Salida</th>
                                                    <th>N° Documento Salida</th>
                                                    <th>Código Estandar</th>
                                                    <th>Envase/Estandar</th>
                                                    <th>Consumo Estandar</th>
                                                    <th>Entrada </th>
                                                    <th>Salida </th>
                                                    <th>Temporada</th>                                                
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYINVENTARIO as $r) : ?>
                                                    <?php
                                                        if($r['ID_RECEPCION']){
                                                            $NUMEROORIGEN= $r['NUMERORECEPCION'];
                                                            $NUMERODOCUMENTOORIGEN= $r['NUMERODOCUMENTORECEPCION'];
                                                            $CANTIDADORIGEN= $r['CANTIDAD'];
                                                            $FECHAORIGEN= $r['FECHARECEPCION'];
                                                            $TIPOORIGEN = $r['TRECEPCION'];
                                                            $NOMBREORIGEN = $r['TRECEPCION'];
                                                            $NOMBREORIGEN = $r['ORIGENRECEPCION'];
                                                        }else if($r['ID_DESPACHO2']){
                                                            $NUMEROORIGEN= $r['NUMERODESPACHO2'];
                                                            $NUMERODOCUMENTOORIGEN= $r['NUMERODOCUMENTODESPACHO2'];
                                                            $CANTIDADORIGEN= $r['CANTIDAD'];
                                                            $FECHAORIGEN= $r['FECHADESPACHO2'];
                                                            $TIPOORIGEN = $r['TDESPACHO2'];
                                                            $NOMBREORIGEN = $r['DESTINODESPACHO2'];
                                                        }else{
                                                            $NUMEROORIGEN= "Sin Datos";
                                                            $NUMERODOCUMENTOORIGEN= "Sin Datos";
                                                            $CANTIDADORIGEN= "0";
                                                            $FECHAORIGEN= "Sin Datos";
                                                            $TIPOORIGEN = "Sin Datos";
                                                            $NOMBREORIGEN = "Sin Datos";
                                                        }      
                                                        if($r['ID_DESPACHO']){
                                                            $NUMERODESTINO= $r['NUMERODESPACHO'];
                                                            $NUMERODOCUMENTODESTINO= $r['NUMERODOCUMENTODESPACHO'];
                                                            $CANTIDADDESTINO= $r['CANTIDAD'];
                                                            $FECHADESTINO= $r['FECHADESPACHO'];
                                                            $TIPODESTINO = $r['TDESPACHO'];    
                                                            $NOMBRDESTINO  = $r['DESTINODESPACHO'];    
                                                        }else{       
                                                            $NUMERODESTINO= "Sin Datos";
                                                            $NUMERODOCUMENTODESTINO= "Sin Datos";
                                                            $CANTIDADDESTINO= "0";
                                                            $FECHADESTINO= "Sin Datos";
                                                            $TIPODESTINO = "Sin Datos";     
                                                            $NOMBREDESTINO = "Sin Datos";                                                                                           
                                                        }

                                                    ?>
                                                    <tr class="center">
                                                        <td> <?php echo $r['CODIGO']; ?> </td>
                                                        <td> <?php echo $r['PRODUCTO']; ?> </td>
                                                        <td> <?php echo $r['TUMEDIDA']; ?> </td>
                                                        <td> <?php echo $r['BODEGA']; ?> </td>
                                                        <td> <?php echo $r['EMPRESA']; ?> </td>
                                                        <td> <?php echo $r['PLANTA']; ?> </td>    
                                                        <td> <?php echo $TIPOORIGEN; ?> </td>
                                                        <td> <?php echo $FECHAORIGEN; ?> </td>
                                                        <td> <?php echo $NOMBREORIGEN; ?> </td>
                                                        <td> <?php echo $NUMEROORIGEN; ?> </td>
                                                        <td> <?php echo $NUMERODOCUMENTOORIGEN; ?> </td>
                                                        <td> <?php echo $TIPODESTINO; ?> </td>
                                                        <td> <?php echo $FECHADESTINO; ?> </td>
                                                        <td> <?php echo $NOMBREDESTINO; ?> </td>
                                                        <td> <?php echo $NUMERODESTINO; ?> </td>
                                                        <td> <?php echo $NUMERODOCUMENTODESTINO; ?> </td>                                                   
                                                        <td> <?php echo "No Aplica"; ?> </td>                                                          
                                                        <td> <?php echo "No Aplica"; ?> </td>                                                      
                                                        <td> <?php echo "0"; ?> </td>     
                                                        <td> <?php echo $CANTIDADORIGEN; ?> </td>
                                                        <td> <?php echo $CANTIDADDESTINO; ?> </td>   
                                                        <td> <?php echo $r['TEMPORADA']; ?> </td>    
                                                    </tr>
                                                <?php endforeach; ?>
                                                
                                                <?php foreach ($ARRAYFICHA as $r) : ?>

                                                    <tr class="center">
                                                        <td> <?php echo $r['CODIGO']; ?> </td>
                                                        <td> <?php echo $r['PRODUCTO']; ?> </td>
                                                        <td> <?php echo $r['TUMEDIDA']; ?> </td>                                                      
                                                        <td> <?php echo "No Aplica"; ?> </td>   
                                                        <td> <?php echo $r['EMPRESA']; ?> </td>
                                                        <td> <?php echo $r['PLANTA']; ?> </td>                
                                                        <td> <?php echo "No Aplica"; ?> </td>                                                         
                                                        <td> <?php echo "No Aplica"; ?> </td>                                                         
                                                        <td> <?php echo "No Aplica"; ?> </td>                                                         
                                                        <td> <?php echo "No Aplica"; ?> </td>                                                         
                                                        <td> <?php echo "No Aplica"; ?> </td>               
                                                        <td> <?php echo "Proceso"; ?> </td>    
                                                        <td> <?php echo $r['FECHAPROCESO']; ?> </td>                                                        
                                                        <td> <?php echo "No Aplica"; ?> </td>   
                                                        <td> <?php echo $r['NUMERO_PROCESO']; ?> </td>                                                     
                                                        <td> <?php echo "No Aplica"; ?> </td>   
                                                        <td> <?php echo $r['CODIGOESTANDAR']; ?> </td>       
                                                        <td> <?php echo $r['NOMBREESTANDAR']; ?> </td>      
                                                        <td> <?php echo $r['CONSUMO']; ?> </td>                                     
                                                        <td> <?php echo "0"; ?> </td>                                                 
                                                        <td> <?php echo "0"; ?> </td>      
                                                        <td> <?php echo $r['TEMPORADA']; ?> </td> 
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr id="filtro" class="text-left">
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

        <?php include_once "../config/footer.php"; ?>
        <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <?php include_once "../config/urlBase.php"; ?>
</body>

</html>