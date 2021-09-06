<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/USUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';

include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/DESPACHOPT_ADO.php';
include_once '../controlador/MGUIAPT_ADO.php';


include_once '../modelo/EXIEXPORTACION.php';
include_once '../modelo/MGUIAPT.php';
include_once '../modelo/DESPACHOPT.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$DESPACHOPT_ADO =  new DESPACHOPT_ADO();
$MGUIAPT_ADO =  new MGUIAPT_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
//INIICIALIZAR MODELO

$MGUIAPT =  new MGUIAPT();
$DESPACHOPT =  new DESPACHOPT();
$EXIEXPORTACION =  new EXIEXPORTACION();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$MOTIVO = "";
$NUMERO="";
$NUMEROVER="";
$NUMERODESPACHO = "";
$NUMEROGUIA = "";
$PLANTAORIGEN = "";
$PLANTADESTINO = "";

$IDOP = "";
$OP = "";
$DISABLED = "";




//INICIALIZAR ARREGLOS
$ARRAYPLANTA = "";
$ARRAYOBTENERNUMERO="";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYPLANTA = $PLANTA_ADO->listarPlantaCBX();

//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {

    $ARRAYOBTENERNUMERO=$MGUIAPT_ADO->obtenerNumero($_REQUEST['IDDESPACHO'],$_REQUEST['EMPRESA'],$_REQUEST['PLANTAORIGEN'],$_REQUEST['PLANTA'],$_REQUEST['TEMPORADA']);
    $NUMERO=$ARRAYOBTENERNUMERO[0]["NUMERO"]+1;

    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO  
    $MGUIAPT->__SET('NUMERO_MGUIA', $NUMERO);
    $MGUIAPT->__SET('NUMERO_DESPACHO', $_REQUEST['NUMERODESPACHO']);
    $MGUIAPT->__SET('NUMERO_GUIA', $_REQUEST['NUMEROGUIA']);
    $MGUIAPT->__SET('MOTIVO_MGUIA', $_REQUEST['MOTIVO']);
    $MGUIAPT->__SET('ID_DESPACHO', $_REQUEST['IDDESPACHO']);
    $MGUIAPT->__SET('ID_PLANTA2', $_REQUEST['PLANTAORIGEN']);
    $MGUIAPT->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $MGUIAPT->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
    $MGUIAPT->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $MGUIAPT_ADO->agregarMguia($MGUIAPT);

    $DESPACHOPT->__SET('ID_DESPACHO', $_REQUEST['IDDESPACHO']);
    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
    $DESPACHOPT_ADO->abierto($DESPACHOPT);

    $DESPACHOPT->__SET('ID_DESPACHO', $_REQUEST['IDDESPACHO']);
    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
    $DESPACHOPT_ADO->Rechazado($DESPACHOPT);


    $ARRAYEXISENCIADESPACHOMP = $EXIEXPORTACION_ADO->verExistenciaPorDespacho($_REQUEST['IDDESPACHO']);
    foreach ($ARRAYEXISENCIADESPACHOMP as $r) :

        $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $r['ID_EXIEXPORTACION']);
        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
        $EXIEXPORTACION_ADO->endespacho($EXIEXPORTACION);

    endforeach;

    //REDIRECCIONAR A PAGINA registroAerolinia.php
    
    echo "
        <script type='text/javascript'>
            window.opener.refrescar()
            window.close();
            </script> 
        ";
        
}


//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($_REQUEST['IDDESPACHO'])  && isset($_REQUEST['EMPRESA']) && isset($_REQUEST['PLANTA']) && isset($_REQUEST['TEMPORADA'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDDESPACHO = $_REQUEST['IDDESPACHO'];
    $EMPRESA = $_REQUEST['EMPRESA'];
    $PLANTA = $_REQUEST['PLANTA'];
    $TEMPORADA = $_REQUEST['TEMPORADA'];
    $NODATOURL = "1";


    $ARRAYDESPACHOMP = $DESPACHOPT_ADO->verDespachopt($IDDESPACHO);
    //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
    //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
    foreach ($ARRAYDESPACHOMP as $r) :
        $NUMERODESPACHO = "" . $r['NUMERO_DESPACHO'];
        $NUMEROGUIA = "" . $r['NUMERO_GUIA_DESPACHO'];
        $PLANTADESTINO = "" . $r['ID_PLANTA2'];
        $PLANTAORIGEN = "" . $r['ID_PLANTA'];
    endforeach;
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
    <title>Registro Motivo Guía</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                //VALIDACION DE FORMULARIO
                function validacion() {

                    MOTIVO = document.getElementById("MOTIVO").value;
                    document.getElementById('val_motivo').innerHTML = "";

                    if (MOTIVO == null || MOTIVO.length == 0 || /^\s+$/.test(MOTIVO)) {
                        document.form_reg_dato.MOTIVO.focus();
                        document.form_reg_dato.MOTIVO.style.borderColor = "#FF0000";
                        document.getElementById('val_motivo').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.MOTIVO.style.borderColor = "#4AF575";



                }
                //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
                function cerrar() {
                    window.opener.refrescar()
                    window.close();
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>

            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <!--  
                                    <h4 class="box-title">Sample form 1</h4>
                                -->
                    </div>
                    <!-- /.box-header -->
                    <form class="form" role="form" method="post" name="form_reg_dato" onsubmit="return validacion()">
                        <div class="box-body">

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Número Despacho </label>
                                        <input type="hidden" class="form-control" placeholder="Numero Despacho" id="IDDESPACHO" name="IDDESPACHO" value="<?php echo $IDDESPACHO; ?>" />
                                        <input type="hidden" class="form-control" placeholder="Numero Despacho" id="PLANTA" name="PLANTA" value="<?php echo $PLANTA; ?>" />
                                        <input type="hidden" class="form-control" placeholder="Numero Despacho" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADA; ?>" />
                                        <input type="hidden" class="form-control" placeholder="Numero Despacho" id="EMPRESA" name=DEMPRESA" value="<?php echo $EMPRESA; ?>" />
                                        <input type="hidden" class="form-control" placeholder="Numero Despacho" id="NUMERODESPACHO" name="NUMERODESPACHO" value="<?php echo $NUMERODESPACHO; ?>" />
                                        <input type="text" class="form-control" placeholder="Número Despacho" id="NUMERODESPACHOV" name="NUMERODESPACHOV" value="<?php echo $NUMERODESPACHO; ?>" disabled />
                                        <label id="val_numerodespacho" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Número Guía </label>
                                        <input type="hidden" class="form-control" placeholder="Numero Despacho" id="NUMEROGUIA" name="NUMEROGUIA" value="<?php echo $NUMEROGUIA; ?>" />
                                        <input type="text" class="form-control" placeholder="Numero Despacho" id="NUMEROGUIAV" name="NUMEROGUIAV" value="<?php echo $NUMEROGUIA; ?>" disabled />
                                        <label id="val_numeroguia" class="validacion"> </label>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Planta Origen</label>
                                        <input type="hidden" class="form-control" placeholder="PLANTAORIGEN" id="PLANTAORIGEN" name="PLANTAORIGEN" value="<?php echo $PLANTAORIGEN; ?>" />
                                        <select class="form-control select2" id="PLANTAORIGENV" name="PLANTAORIGENV" style="width: 100%;" disabled>>
                                            <option></option>
                                            <?php foreach ($ARRAYPLANTA as $r) : ?>
                                                <?php if ($ARRAYPLANTA) {    ?>
                                                    <option value="<?php echo $r['ID_PLANTA']; ?>" <?php if ($PLANTAORIGEN == $r['ID_PLANTA']) {
                                                                                                        echo "selected";
                                                                                                    } ?>> <?php echo $r['NOMBRE_PLANTA'] ?> </option>
                                                <?php } else { ?>
                                                    <option>No Hay Datos Registrados </option>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </select>
                                        <label id="val_plantao" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Planta Destino</label>
                                        <input type="hidden" class="form-control" placeholder="PLANTADESTINOE" id="PLANTADESTINOE" name="PLANTADESTINOE" value="<?php echo $PLANTADESTINO; ?>" />
                                        <select class="form-control select2" id="PLANTADESTINOV" name="PLANTADESTINOV" style="width: 100%;" disabled>
                                            <option></option>
                                            <?php foreach ($ARRAYPLANTA as $r) : ?>
                                                <?php if ($ARRAYPLANTA) {    ?>
                                                    <option value="<?php echo $r['ID_PLANTA']; ?>" <?php if ($PLANTADESTINO == $r['ID_PLANTA']) {
                                                                                                        echo "selected";
                                                                                                    } ?>> <?php echo $r['NOMBRE_PLANTA'] ?> </option>
                                                <?php } else { ?>
                                                    <option>No Hay Datos Registrados </option>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </select>
                                        <label id="val_plantad" class="validacion"> </label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Motivo </label>
                                        <input type="hidden" class="form-control" placeholder="Numero Despacho" id="MOTIVOE" name="MOTIVOE" value="<?php echo $MOTIVO; ?>" />
                                        <textarea class="form-control" rows="1" placeholder="Motivo" id="MOTIVO" name="MOTIVO" <?php echo $DISABLED; ?>><?php echo $MOTIVO; ?></textarea>
                                        <label id="val_motivo" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="cerrar();">
                                <i class="ti-trash"></i> Cerrar
                            </button>
                            <button type="submit" class="btn btn-rounded btn-danger btn-outline" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED; ?>>
                                <i class="ti-save-alt"></i> Rechazar
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </section>
            <!-- /.content -->
            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>