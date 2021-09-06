<?php


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/FOLIO_ADO.php';

include_once '../controlador/DESPACHOEX_ADO.php';
include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/PCDESPACHO_ADO.php';

include_once '../modelo/DESPACHOEX.php';
include_once '../modelo/EXIEXPORTACION.php';
include_once '../modelo/PCDESPACHO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$DESPACHOEX_ADO =  new DESPACHOEX_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$PCDESPACHO_ADO =  new PCDESPACHO_ADO();

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$PVESPECIES_ADO =  new PVESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();


//INIICIALIZAR MODELO
//INIICIALIZAR MODELO
$DESPACHOEX =  new DESPACHOEX();
$EXIEXPORTACION =  new EXIEXPORTACION();
$PCDESPACHO =  new PCDESPACHO();



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


$IDDESPACHOEX = "";
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


//INICIALIZAR ARREGLOS
$ARRAYPCDESPACHO = "";

$ARRAYESTANDAR = "";
$ARRAYEVERERECEPCIONID = "";
$ARRAYVERPRODUCTORID = "";
$ARRAYVERPVESPECIESID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYVERFOLIOID = "";
$ARRAYBUSCAREXIEXPORTACION = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['AGREGAR'])) {

    $EMPRESA = $_REQUEST['EMPRESA'];
    $PLANTA = $_REQUEST['PLANTA'];
    $TEMPORADA = $_REQUEST['TEMPORADA'];
    $IDDESPACHOEX = $_REQUEST['IDDESPACHOEX'];

    if (isset($_REQUEST['SELECIONAREXISTENCIA'])) {
        $SINO = "0";
        $SELECIONAREXISTENCIA = $_REQUEST['SELECIONAREXISTENCIA'];
    } else {
        $SINO = "1";
        $MENSAJE = "DEBE  SELECIONAR UN REGISTRO";
    }
    if ($SINO == "0") {

        foreach ($SELECIONAREXISTENCIA as $r) :
            $IDPCDESPACHO = $r;
            $ARRAYBUSCAREXIEXPORTACION = $EXIEXPORTACION_ADO->verExistenciaPorPCDespacho($IDPCDESPACHO);


            foreach ($ARRAYBUSCAREXIEXPORTACION as $s) :


                $EXIEXPORTACION->__SET('ID_DESPACHOEX', $IDDESPACHOEX);
                $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $s['ID_EXIEXPORTACION']);
                $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $s['FOLIO_AUXILIAR_EXIEXPORTACION']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $EXIEXPORTACION_ADO->actualizarSelecionarDespachoCambiarEstado($EXIEXPORTACION);


            endforeach;

            $PCDESPACHO->__SET('ID_PCDESPACHO', $IDPCDESPACHO);
            $PCDESPACHO->__SET('ID_DESPACHOEX', $IDDESPACHOEX);
            // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
            $PCDESPACHO_ADO->actualizarPcdespachoADespacho($PCDESPACHO);

            $PCDESPACHO->__SET('ID_PCDESPACHO', $IDPCDESPACHO);
            // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
            $PCDESPACHO_ADO->enDespacho($PCDESPACHO);

        endforeach;

        if ($SINO == "0") {

            echo "
                <script type='text/javascript'>
                    window.opener.refrescar()
                    window.close();
                    </script> 
                ";
        }
    }
}

if (isset($_REQUEST['EMPRESA']) && isset($_REQUEST['PLANTA']) && isset($_REQUEST['TEMPORADA']) && isset($_REQUEST['DESPACHOEX'])) {
    $EMPRESA = $_REQUEST['EMPRESA'];
    $PLANTA = $_REQUEST['PLANTA'];
    $TEMPORADA = $_REQUEST['TEMPORADA'];
    $IDDESPACHOEX = $_REQUEST['DESPACHOEX'];
    $ARRAYPCDESPACHO = $PCDESPACHO_ADO->buscarPorEmpresaPlantaTemporada($EMPRESA, $PLANTA, $TEMPORADA);

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
                            <input type="hidden" id="IDDESPACHOEX" name="IDDESPACHOEX" value="<?php echo $IDDESPACHOEX; ?>" />

                            <label id="val_validato" class="validacion"> <?php echo $MENSAJE; ?> </label>
                            <div class="table-responsive">
                                <table id="selecionExistencia" class="table table-hover " style="width: 300%;">
                                    <thead>
                                        <tr class="text-left">
                                            <th>Id </th>
                                            <th>Selección</th>
                                            <th>Estado</th>
                                            <th>Cantidad Envase </th>
                                            <th>Kilo Neto </th>
                                            <th>Motivo </th>
                                            <th>Fecha PC </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ARRAYPCDESPACHO as $r) : ?>

                                            <tr class="text-left">
                                                <td>
                                                    <a href="#" class="text-warning hover-warning">
                                                        <?php
                                                        echo $r['ID_PCDESPACHO'];

                                                        ?>
                                                    </a>
                                                </td>

                                                <td>
                                                    <div class="form-group">

                                                        <input type="checkbox" name="SELECIONAREXISTENCIA[]" id="SELECIONAREXISTENCIA<?php echo $r['ID_PCDESPACHO']; ?>" value="<?php echo $r['ID_PCDESPACHO']; ?>">
                                                        <label for="SELECIONAREXISTENCIA<?php echo $r['ID_PCDESPACHO']; ?>"> Seleccionar</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($r['ESTADO_PCDESPACHO'] == "1") {
                                                        echo "Creado";
                                                    }
                                                    if ($r['ESTADO_PCDESPACHO'] == "2") {
                                                        echo "Confirmado";
                                                    }
                                                    if ($r['ESTADO_PCDESPACHO'] == "3") {
                                                        echo "En Despacho";
                                                    }
                                                    if ($r['ESTADO_PCDESPACHO'] == "4") {
                                                        echo "Despachado";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $r['CANTIDAD_ENVASE_PCDESPACHO']; ?></td>
                                                <td><?php echo $r['KILOS_NETO_PCDESPACHO']; ?></td>

                                                <td><?php echo $r['MOTIVO_PCDESPACHO']; ?> </td>
                                                <td><?php echo $r['FECHA_PCDESPACHO']; ?></td>
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