<?php


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/EXIMATERIAPRIMA_ADO.php';
include_once '../controlador/ERECEPCION_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/FOLIO_ADO.php';
include_once '../modelo/EXIMATERIAPRIMA.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();
$ERECEPCION_ADO =  new ERECEPCION_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$PVESPECIES_ADO =  new PVESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();


//INIICIALIZAR MODELO
$EXIMATERIAPRIMA =  new EXIMATERIAPRIMA();


$NUMEROFOLIO = "";
$IDEXISMATERIAPRIMA = "";
$PROCESO = "";
$DETALLEPROCESO = "";
$PRODUCTOR = "";
$PVESPECIES = "";
$SELECIONAREXISTENCIA = "";

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";


$DISABLED = "";
$FOCUS = "";
$BORDER = "";


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
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['AGREGAR'])) {
    if (isset($_REQUEST['SELECIONAREXISTENCIA'])) {
        $PRODUCTOR = $_REQUEST['PRODUCTOR'];
        $PROCESO = $_REQUEST['IDPROCESO'];
        $PVESPECIES = $_REQUEST['PVARIEDAD'];
        $DETALLEPROCESO = "" . $PROCESO;

        $SELECIONAREXISTENCIA = $_REQUEST['SELECIONAREXISTENCIA'];

        //var_dump($SELECIONAREXISTENCIA);
        foreach ($SELECIONAREXISTENCIA as $r) :
            $NUMEROFOLIO = $r;
            $ARRAYBUSCARNUMEROFOLIOEXIMATERIAPRIMA = $EXIMATERIAPRIMA_ADO->buscarPorNumeroFolio($NUMEROFOLIO);
            $IDEXISMATERIAPRIMA = $ARRAYBUSCARNUMEROFOLIOEXIMATERIAPRIMA[0]['ID_EXIMATERIAPRIMA'];
            $EXIMATERIAPRIMA->__SET('ID_PROCESO', $PROCESO);
            $EXIMATERIAPRIMA->__SET('ID_EXIMATERIAPRIMA', $IDEXISMATERIAPRIMA);
            $EXIMATERIAPRIMA->__SET('FOLIO_AUXILIAR_EXIMATERIAPRIMA', $NUMEROFOLIO);
            //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
            $EXIMATERIAPRIMA_ADO->actualizarSelecionarProcesoCambiarEstado($EXIMATERIAPRIMA);



        endforeach;

        echo "
        <script type='text/javascript'>
            window.opener.refrescar()
            window.close();
            </script> 
        ";
    }
}

if (isset($_REQUEST['IDPROCESO']) && isset($_REQUEST['IDPRODUCTOR']) && isset($_REQUEST['IDPVARIEDAD']) && isset($_REQUEST['EMPRESA']) && isset($_REQUEST['PLANTA']) && isset($_REQUEST['TEMPORADA'])) {
    $PROCESO = $_REQUEST['IDPROCESO'];
    $PRODUCTOR = $_REQUEST['IDPRODUCTOR'];
    $PVESPECIES = $_REQUEST['IDPVARIEDAD'];
    $EMPRESA = $_REQUEST['EMPRESA'];
    $PLANTA = $_REQUEST['PLANTA'];
    $TEMPORADA = $_REQUEST['TEMPORADA'];

    $ARRAYEXIMATERIAPRIMA = $EXIMATERIAPRIMA_ADO->buscarPorProductorPvariedadDisponible($PRODUCTOR, $PVESPECIES, $EMPRESA, $PLANTA, $TEMPORADA);

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

                            <input type="hidden" id="PROCESO" name="PROCESO" value="<?php echo $PROCESO; ?>" />
                            <input type="hidden" id="PRODUCTOR" name="PRODUCTOR" value="<?php echo $PRODUCTOR; ?>" />
                            <input type="hidden" id="PVARIEDAD" name="PVARIEDAD" value="<?php echo $PVESPECIES; ?>" />
                            <div class="table-responsive">
                                <table id="selecionExistencia" class="table table-hover " style="width: 300%;">
                                    <thead>
                                        <tr class="text-left">
                                            <th>Folio </th>
                                            <th>Selección</th>
                                            <th>Fecha Cosecha </th>
                                            <th>Estandar</th>
                                            <th>Cantidad Envase </th>
                                            <th>Kilo Neto</th>
                                            <th>Productor </th>
                                            <th>Variedad </th>
                                            <th>Recepcion </th>
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
                                                <td><?php echo $r['FECHA_COSECHA_EXIMATERIAPRIMA']; ?></td>
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
                                                <td><?php echo $r['ID_RECEPCION']; ?></td>





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