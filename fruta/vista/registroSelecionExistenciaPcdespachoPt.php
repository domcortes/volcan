<?php


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/FOLIO_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';
include_once '../controlador/CALIBRE_ADO.php';
include_once '../controlador/EMBALAJE_ADO.php';


include_once '../controlador/PCDESPACHO_ADO.php';
include_once '../controlador/EXIEXPORTACION_ADO.php';

include_once '../modelo/PCDESPACHO.php';
include_once '../modelo/EXIEXPORTACION.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$PCDESPACHO_ADO =  new PCDESPACHO_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$PVESPECIES_ADO =  new PVESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$CALIBRE_ADO =  new CALIBRE_ADO();
$EMBALAJE_ADO =  new EMBALAJE_ADO();



//INIICIALIZAR MODELO
$PCDESPACHO =  new PCDESPACHO();
$EXIEXPORTACION =  new EXIEXPORTACION();



$NUMEROFOLIO = "";
$IDEXIEXPORTACION = "";
$PROCESO = "";
$PRODUCTOR = "";
$PVESPECIES = "";
$SELECIONAREXISTENCIA = "";

$ESTANDARPERSONETO = "";
$NETONUEVO = "";

$TOTALCAJAS = 0;
$TOTALNETO = 0;


$IDPCDESPACHO = "";

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
$ARRAYEXIEXPORTACION = "";

$ARRAYESTANDAR = "";

$ARRAYEVERERECEPCIONID = "";
$ARRAYVERPRODUCTORID = "";
$ARRAYVERPVESPECIESID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYVERFOLIOID = "";
$ARRAYVERPCDESPACHO = "";
$ARRAYBUSCARNUMEROFOLIOEXIEXPORTACION = "";
$ARRAYTMANEJO = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['AGREGAR'])) {

    $EMPRESA = $_REQUEST['EMPRESA'];
    $PLANTA = $_REQUEST['PLANTA'];
    $TEMPORADA = $_REQUEST['TEMPORADA'];
    $IDPCDESPACHO = $_REQUEST['IDPCDESPACHO'];

    if (isset($_REQUEST['SELECIONAREXISTENCIA'])) {
        $SINO = "0";
        $SELECIONAREXISTENCIA = $_REQUEST['SELECIONAREXISTENCIA'];
        $SELECIONAREXISTENCIAID = $_REQUEST['SELECIONAREXISTENCIAID'];
    } else {
        $SINO = "1";
        $MENSAJE = "DEBE  SELECIONAR UN REGISTRO";
    }
    if ($SINO == "0") {

        foreach ($SELECIONAREXISTENCIA as $r) :
            $IDEXIEXPORTACION = $r;
            $NUMEROFOLIO = $SELECIONAREXISTENCIAID[$r];
            $ARRAYBUSCARNUMEROFOLIOEXIEXPORTACION = $EXIEXPORTACION_ADO->buscarPorNumeroFolioId($NUMEROFOLIO, $IDEXIEXPORTACION);
            if (0 < $ARRAYBUSCARNUMEROFOLIOEXIEXPORTACION[0]['CANTIDAD_ENVASE_EXIEXPORTACION']) {
                $SINO2 = "0";
                $MENSAJE = "";
            } else {
                $SINO2 = "1";
                $MENSAJE = "DEBE SELECIONAR UNA EXISTENCIA QUE SEA MAYOR A 0";
            }
            if ($SINO2 == "0") {

                $EXIEXPORTACION->__SET('ID_PCDESPACHO', $IDPCDESPACHO);
                $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $IDEXIEXPORTACION);
                $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $ARRAYBUSCARNUMEROFOLIOEXIEXPORTACION[0]['FOLIO_AUXILIAR_EXIEXPORTACION']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $EXIEXPORTACION_ADO->actualizarSelecionarPCCambiarEstado($EXIEXPORTACION);
            }

        endforeach;




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

if (isset($_REQUEST['EMPRESA']) && isset($_REQUEST['PLANTA']) && isset($_REQUEST['TEMPORADA']) && isset($_REQUEST['PCDESPACHO'])) {
    $EMPRESA = $_REQUEST['EMPRESA'];
    $PLANTA = $_REQUEST['PLANTA'];
    $TEMPORADA = $_REQUEST['TEMPORADA'];
    $IDPCDESPACHO = $_REQUEST['PCDESPACHO'];

    $ARRAYEXIEXPORTACION = $EXIEXPORTACION_ADO->buscarPorEmpresaPlantaTemporadaPC($EMPRESA, $PLANTA, $TEMPORADA);

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
                            <input type="hidden" id="IDPCDESPACHO" name="IDPCDESPACHO" value="<?php echo $IDPCDESPACHO; ?>" />

                            <label id="val_validato" class="validacion"> <?php echo $MENSAJE; ?> </label>
                            <div class="table-responsive">
                                <table id="selecionExistencia" class="table table-hover " style="width: 300%;">
                                    <thead>
                                        <tr class="text-left">
                                            <th>Folio </th>
                                            <th>Condición </th>
                                            <th>Selección</th>
                                            <th>Fecha Embalado </th>
                                            <th>Código Estandar </th>
                                            <th>Envase/Estandar </th>
                                            <th>CSG</th>
                                            <th>Productor</th>
                                            <th>Variedad</th>
                                            <th>Cantidad Envase </th>
                                            <th>Kilo Neto </th>
                                            <th>Tipo Manejo</th>
                                            <th>Calibre</th>
                                            <th>Embalaje</th>
                                            <th>Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ARRAYEXIEXPORTACION as $r) : ?>

                                            <tr class="text-left">
                                                <td>
                                                    <a href="#" class="text-warning hover-warning">
                                                        <?php
                                                        if ($r['FOLIO_AUXILIAR_EXIEXPORTACION']) {
                                                            echo $r['FOLIO_AUXILIAR_EXIEXPORTACION'];
                                                        } else {
                                                            echo $r['FOLIO_EXIEXPORTACION'];
                                                        }
                                                        ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($r['TESTADOSAG'] == null || $r['TESTADOSAG'] == "0") {
                                                        echo "Sin Condición";
                                                    }
                                                    if ($r['TESTADOSAG'] == "1") {
                                                        echo "En Inspección";
                                                    }
                                                    if ($r['TESTADOSAG'] == "2") {
                                                        echo "Aprobado Origen";
                                                    }
                                                    if ($r['TESTADOSAG'] == "3") {
                                                        echo "Aprobado USLA";
                                                    }
                                                    if ($r['TESTADOSAG'] == "4") {
                                                        echo "Fumigado";
                                                    }
                                                    if ($r['TESTADOSAG'] == "5") {
                                                        echo "Rechazado";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="form-group">

                                                        <input type="hidden" class="form-control" name="SELECIONAREXISTENCIAID[<?php echo $r['ID_EXIEXPORTACION']; ?>]" value="<?php echo  $r['FOLIO_AUXILIAR_EXIEXPORTACION']; ?>">
                                                        <input type="checkbox" name="SELECIONAREXISTENCIA[]" id="SELECIONAREXISTENCIA<?php echo $r['ID_EXIEXPORTACION']; ?>" value="<?php echo $r['ID_EXIEXPORTACION']; ?>">
                                                        <label for="SELECIONAREXISTENCIA<?php echo $r['ID_EXIEXPORTACION']; ?>"> Seleccionar</label>
                                                    </div>

                                                </td>
                                                <td><?php echo $r['FECHA_EMBALADO_EXIEXPORTACION']; ?></td>
                                                <td>
                                                    <?php
                                                    $ARRAYEVERERECEPCIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                    echo $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                    $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                    echo $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
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
                                                <td><?php echo $r['CANTIDAD_ENVASE_EXIEXPORTACION']; ?></td>
                                                <td><?php echo $r['KILOS_NETO_EXIEXPORTACION']; ?></td>
                                                <td>
                                                    <?php
                                                    $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
                                                    if ($ARRAYTMANEJO) {
                                                        echo $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                    } else {
                                                        echo "-";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $ARRAYCALIBRE = $CALIBRE_ADO->verCalibre($r['ID_CALIBRE']);
                                                    if ($ARRAYCALIBRE) {
                                                        echo $ARRAYCALIBRE[0]['NOMBRE_CALIBRE'];
                                                    } else {
                                                        echo "Sin Calibre";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $ARRAYEMBALAJE = $EMBALAJE_ADO->verEmbalaje($r['ID_EMBALAJE']);
                                                    if ($ARRAYEMBALAJE) {
                                                        echo $ARRAYEMBALAJE[0]['NOMBRE_EMBALAJE'];
                                                    } else {
                                                        echo "Sin Embalaje";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($r['STOCK']) {
                                                        echo $r['STOCK'];
                                                    } else {
                                                        echo "Sin Stock";
                                                    }
                                                    ?>
                                                </td>


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