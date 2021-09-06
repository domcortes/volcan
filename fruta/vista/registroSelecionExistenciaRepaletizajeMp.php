<?php


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/ERECEPCION_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/FOLIO_ADO.php';

include_once '../controlador/REPALETIZAJEMP_ADO.php';
include_once '../controlador/EXIMATERIAPRIMA_ADO.php';
include_once '../modelo/EXIMATERIAPRIMA.php';
include_once '../modelo/REPALETIZAJEMP.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$REPALETIZAJEMP_ADO =  new REPALETIZAJEMP_ADO();
$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();

$ERECEPCION_ADO =  new ERECEPCION_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$PVESPECIES_ADO =  new PVESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();


//INIICIALIZAR MODELO
$EXIMATERIAPRIMA =  new EXIMATERIAPRIMA();
$REPALETIZAJEMP =  new REPALETIZAJEMP();



$NUMEROFOLIO = "";
$IDEXISMATERIAPRIMA = "";
$PROCESO = "";
$DETALLEPROCESO = "";
$PRODUCTOR = "";
$PVESPECIES = "";
$SELECIONAREXISTENCIA = "";


$TOTALCAJAS = 0;
$TOTALNETO = 0;

$REPALETIZAJE = "";

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";


$DISABLED = "";
$FOCUS = "";
$BORDER = "";
$MENSAJE = "";


$IDOP = "";
$IDOP2 = "";
$OP = "";
$NODATOURL = "";

$SINO = "";
$SINO2 = "";


//INICIALIZAR ARREGLOS
$ARRAYEXIMATERIAPRIMA = "";
$ARRAYBUSCARNUMEROFOLIOEXIMATERIAPRIMA = "";

$ARRAYESTANDAR = "";

$ARRAYEVERERECEPCIONID = "";
$ARRAYVERPRODUCTORID = "";
$ARRAYVERPVESPECIESID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYVERFOLIOID = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['AGREGAR'])) {
    if (isset($_REQUEST['SELECIONAREXISTENCIA'])) {
        $SINO = "0";
    } else {
        $SINO = "1";
        $MENSAJE = "DEBE  SELECIONAR UN REGISTRO";
    }
    if ($SINO == "0") {
        $EMPRESA = $_REQUEST['EMPRESA'];
        $PLANTA = $_REQUEST['PLANTA'];
        $TEMPORADA = $_REQUEST['TEMPORADA'];
        $REPALETIZAJE = $_REQUEST['REPALETIZAJE'];
        $SELECIONAREXISTENCIA = $_REQUEST['SELECIONAREXISTENCIA'];



        if ($SINO == 0) {
            foreach ($SELECIONAREXISTENCIA as $r) :
                $NUMEROFOLIO = $r;
                $ARRAYBUSCARNUMEROFOLIOEXIMATERIAPRIMA = $EXIMATERIAPRIMA_ADO->buscarPorNumeroFolio($NUMEROFOLIO);
                $IDEXISMATERIAPRIMA = $ARRAYBUSCARNUMEROFOLIOEXIMATERIAPRIMA[0]['ID_EXIMATERIAPRIMA'];
                if (0 < $ARRAYBUSCARNUMEROFOLIOEXIMATERIAPRIMA[0]['CANTIDAD_ENVASE_EXIMATERIAPRIMA']) {
                    $SINO2 = "0";
                    $MENSAJE = "";
                } else {
                    $SINO2 = "1";
                    $MENSAJE = "DEBE SELECIONAR UNA EXISTENCIA QUE SEA MAYOR A 0";
                }
                if ($SINO2 == "0") {
                    $EXIMATERIAPRIMA->__SET('ID_REPALETIZAJE', $REPALETIZAJE);
                    $EXIMATERIAPRIMA->__SET('ID_EXIMATERIAPRIMA', $IDEXISMATERIAPRIMA);
                    $EXIMATERIAPRIMA->__SET('FOLIO_AUXILIAR_EXIMATERIAPRIMA', $ARRAYBUSCARNUMEROFOLIOEXIMATERIAPRIMA[0]['FOLIO_AUXILIAR_EXIMATERIAPRIMA']);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $EXIMATERIAPRIMA_ADO->actualizarSelecionarRepaletizajeCambiarEstado($EXIMATERIAPRIMA);


                    $ARRAYVERREPALETIZAJE = $REPALETIZAJEMP_ADO->verRepaletizaje($REPALETIZAJE);

                    $TOTALCAJAS = $ARRAYBUSCARNUMEROFOLIOEXIMATERIAPRIMA[0]['CANTIDAD_ENVASE_EXIMATERIAPRIMA'] + $ARRAYVERREPALETIZAJE[0]['CANTIDAD_ENVASE_REPALETIZAJE'];
                    $TOTALNETO = $ARRAYBUSCARNUMEROFOLIOEXIMATERIAPRIMA[0]['KILOS_NETO_EXIMATERIAPRIMA'] + $ARRAYVERREPALETIZAJE[0]['KILOS_NETO_REPALETIZAJE'];



                    //  $TOTALCAJAS=$ARRAYVERREPALETIZAJE[0]['CANTIDAD_ENVASE_REPALETIZAJE']+$ARRAYBUSCARNUMEROFOLIOEXIEXPORTACION[0]['CANTIDAD_ENVASE_INGRESADO_EXIEXPORTACION'];
                    // $TOTALNETO=$ARRAYVERREPALETIZAJE[0]['KILOS_NETO_REPALETIZAJE']+$ARRAYBUSCARNUMEROFOLIOEXIEXPORTACION[0]['KILOS_NETO_EXIEXPORTACION'];

                    $REPALETIZAJEMP->__SET('CANTIDAD_ENVASE_REPALETIZAJE', $TOTALCAJAS);
                    $REPALETIZAJEMP->__SET('KILOS_NETO_REPALETIZAJE', $TOTALNETO);
                    $REPALETIZAJEMP->__SET('ID_REPALETIZAJE', $REPALETIZAJE);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $REPALETIZAJEMP_ADO->actualizarRepaletizajeExistenciaMateriaPrima($REPALETIZAJEMP);
                }
            endforeach;
        }

        if ($SINO2 == "0") {
            echo "
                <script type='text/javascript'>
                    window.opener.refrescar()
                    window.close();
                    </script> 
                ";
        }
    }
}

if (isset($_REQUEST['EMPRESA']) && isset($_REQUEST['PLANTA']) && isset($_REQUEST['TEMPORADA']) && isset($_REQUEST['REPALETIZAJE'])) {
    $EMPRESA = $_REQUEST['EMPRESA'];
    $PLANTA = $_REQUEST['PLANTA'];
    $TEMPORADA = $_REQUEST['TEMPORADA'];
    $REPALETIZAJE = $_REQUEST['REPALETIZAJE'];
    $ARRAYEXIMATERIAPRIMA = $EXIMATERIAPRIMA_ADO->buscarPorEmpresaPlantaTemporada($EMPRESA, $PLANTA, $TEMPORADA);
    $NODATOURL = "1";
} else {
    $NODATOURL = "0";
}


if ($NODATOURL == "0") {
    header('Location: index.php');
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
                //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
                function cerrar() {
                    window.opener.refrescar()
                    window.close();
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" onload="mueveReloj()">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php //include_once "../config/menu.php"; 
            ?>
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <!--
                                        <h4 class="box-title">Different Width</h4>
                                        -->
                    </div>

                    <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                        <div class="box-body ">

                            <input type="hidden" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESA; ?>" />
                            <input type="hidden" id="PLANTA" name="PLANTA" value="<?php echo $PLANTA; ?>" />
                            <input type="hidden" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADA; ?>" />
                            <input type="hidden" id="REPALETIZAJE" name="REPALETIZAJE" value="<?php echo $REPALETIZAJE; ?>" />
                            <input type="hidden" id="CAJASREPALETIZAR" name="CAJASREPALETIZAR" value="<?php echo $CAJASREPALETIZAR; ?>" />

                            <label id="val_validato" class="validacion"> <?php echo $MENSAJE; ?> </label>
                            <div class="table-responsive">

                                <table id="selecionExistencia" class="table table-hover " style="width: 300%;">
                                    <thead>
                                        <tr class="text-left">

                                            <th>Folio </th>
                                            <th>Selección</th>
                                            <th>Estandar</th>
                                            <th>Cantidad Envase </th>
                                            <th>Kilo Neto</th>
                                            <th>Productor </th>
                                            <th>Variedad </th>
                                            <th>Fecha Cosecha </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ARRAYEXIMATERIAPRIMA as $r) : ?>

                                            <tr class="text-left">
                                                <td>
                                                    <a href="#" class="text-warning hover-warning">
                                                        <?php
                                                        if ($r['FOLIO_AUXILIAR_EXIMATERIAPRIMA']) {
                                                            echo $r['FOLIO_AUXILIAR_EXIMATERIAPRIMA'];
                                                        } else {
                                                            echo $r['FOLIO_EXIMATERIAPRIMA'];
                                                        }
                                                        ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="form-group">

                                                        <input type="checkbox" name="SELECIONAREXISTENCIA[]" id="SELECIONAREXISTENCIA<?php echo $r['ID_EXIMATERIAPRIMA']; ?>" value="<?php echo $r['FOLIO_AUXILIAR_EXIMATERIAPRIMA']; ?>">
                                                        <label for="SELECIONAREXISTENCIA<?php echo $r['ID_EXIMATERIAPRIMA']; ?>"> Seleccionar</label>
                                                    </div>

                                                </td>
                                                <td>
                                                    <?php
                                                    $ARRAYEVERERECEPCIONID = $ERECEPCION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                    echo $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                    ?>
                                                </td>

                                                <td><?php echo $r['CANTIDAD_ENVASE_EXIMATERIAPRIMA']; ?></td>
                                                <td><?php echo $r['KILOS_NETO_EXIMATERIAPRIMA']; ?></td>

                                                <td>
                                                    <?php

                                                    $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                    echo $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                    $ARRAYVERPVESPECIESID = $PVESPECIES_ADO->verPvespecies($r['ID_PVESPECIES']);
                                                    $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($ARRAYVERPVESPECIESID[0]['ID_VESPECIES']);
                                                    echo $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                    ?>
                                                </td>
                                                <td><?php echo $r['FECHA_COSECHA_EXIMATERIAPRIMA']; ?></td>



                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>



                            </div>

                            <!-- /.row -->


                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CERRAR" value="CERRAR" Onclick="cerrar();">
                                    <i class="ti-trash"></i> CERRAR
                                </button>
                                <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="AGREGAR" value="AGREGAR" <?php echo $DISABLED; ?>>
                                    <i class="ti-save-alt"></i> AGREGAR
                                </button>

                            </div>
                        </div>
                    </form>
                </div>


                <!--.row -->
            </section>





            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php //include_once "../config/footer.php"; 
                ?>
                <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>