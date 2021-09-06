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


include_once '../controlador/REPALETIZAJEEX_ADO.php';
include_once '../controlador/EXIEXPORTACION_ADO.php';


include_once '../modelo/EXIEXPORTACION.php';
include_once '../modelo/REPALETIZAJEEX.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$REPALETIZAJEEX_ADO =  new REPALETIZAJEEX_ADO();
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
$EXIEXPORTACION =  new EXIEXPORTACION();
$REPALETIZAJEEX =  new REPALETIZAJEEX();



$NUMEROFOLIO = "";
$IDSELECION = "";
$IDEXIEXPORTACION = "";
$PROCESO = "";
$DETALLEPROCESO = "";
$PRODUCTOR = "";
$PVESPECIES = "";

$ESTANDARPERSONETO = "";
$NETONUEVO = "";


$REPALETIZAJE = "";
$CAJASREPALETIZAR = "";

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
$ARRAYBUSCARNUMEROFOLIOEXIEXPORTACION = "";
$ARRAYTOTALEXIEXPORTACION = "";

$ARRAYESTANDAR = "";

$ARRAYEVERERECEPCIONID = "";
$ARRAYVERPRODUCTORID = "";
$ARRAYVERPVESPECIESID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYVERFOLIOID = "";


$SELECIONAREXISTENCIA = "";
$SELECIONAREXISTENCIAID = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['AGREGAR'])) {
    if (isset($_REQUEST['SELECIONAREXISTENCIA'])) {

        $IDREEMBALAJE = $_REQUEST['IDREEMBALAJE'];
        $PRODUCTOR = $_REQUEST['PRODUCTOR'];
        $PVESPECIES = $_REQUEST['PVARIEDAD'];
        $SELECIONAREXISTENCIA = $_REQUEST['SELECIONAREXISTENCIA'];
        $SELECIONAREXISTENCIAID = $_REQUEST['SELECIONAREXISTENCIAID'];

        foreach ($SELECIONAREXISTENCIA as $r) :
            $IDEXIEXPORTACION = $r;
            $NUMEROFOLIO = $SELECIONAREXISTENCIAID[$r];

            //$ARRAYBUSCARNUMEROFOLIOEXIEXPORTACION=$EXIEXPORTACION_ADO->buscarPorNumeroFolioId($NUMEROFOLIO);
            //var_dump($ARRAYBUSCARNUMEROFOLIOEXIEXPORTACION);
            //  $IDEXIEXPORTACION=$ARRAYBUSCARNUMEROFOLIOEXIEXPORTACION[0]['ID_EXIEXPORTACION'];


            $EXIEXPORTACION->__SET('ID_REEMBALAJE', $IDREEMBALAJE);
            $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $IDEXIEXPORTACION);
            $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $NUMEROFOLIO);
            //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
            $EXIEXPORTACION_ADO->actualizarSelecionarReembalajeCambiarEstado($EXIEXPORTACION);






        endforeach;

        echo "
        <script type='text/javascript'>
            window.opener.refrescar()
            window.close();
            </script> 
        ";
    }
}

if (isset($_REQUEST['IDREEMBALAJE']) && isset($_REQUEST['IDPRODUCTOR']) && isset($_REQUEST['IDPVARIEDAD']) && isset($_REQUEST['EMPRESA']) && isset($_REQUEST['PLANTA']) && isset($_REQUEST['TEMPORADA'])) {
    $IDREEMBALAJE = $_REQUEST['IDREEMBALAJE'];
    $PRODUCTOR = $_REQUEST['IDPRODUCTOR'];
    $PVESPECIES = $_REQUEST['IDPVARIEDAD'];
    $EMPRESA = $_REQUEST['EMPRESA'];
    $PLANTA = $_REQUEST['PLANTA'];
    $TEMPORADA = $_REQUEST['TEMPORADA'];

    $ARRAYEXIEXPORTACION = $EXIEXPORTACION_ADO->buscarPorProductorPvariedad($PRODUCTOR, $PVESPECIES, $EMPRESA, $PLANTA, $TEMPORADA);


    $NODATOURL = "1";
} else {
    $NODATOURL = "0";
}


if ($NODATOURL == "0") {

    // header('Location: index.php');
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Selección Existencia</title>
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

                            <input type="hidden" id="IDREEMBALAJE" name="IDREEMBALAJE" value="<?php echo $IDREEMBALAJE; ?>" />
                            <input type="hidden" id="PRODUCTOR" name="PRODUCTOR" value="<?php echo $PRODUCTOR; ?>" />
                            <input type="hidden" id="PVARIEDAD" name="PVARIEDAD" value="<?php echo $PVESPECIES; ?>" />

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
                                                        echo $r['FOLIO_AUXILIAR_EXIEXPORTACION'];

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