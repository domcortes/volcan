<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';

include_once '../controlador/RMERCADO_ADO.php';
include_once '../controlador/TPRODUCTOR_ADO.php';
include_once '../controlador/CIUDAD_ADO.php';

include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../modelo/PRODUCTOR.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$RMERCADO_ADO =  new RMERCADO_ADO();
$TPRODUCTOR_ADO =  new TPRODUCTOR_ADO();
$CIUDAD_ADO =  new CIUDAD_ADO();

$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
//INIICIALIZAR MODELO
$PRODUCTOR =  new PRODUCTOR();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$RUTPRODUCTOR = "";
$NOMBREPRODUCTOR = "";
$DIRECCIONPRODUCTOR = "";
$TELEFONOPRODUCTOR = "";
$EMAILPRODUCTOR = "";
$GIROPRODUCTOR = "";
$CSGPRODUCTOR = "";
$SDPPRODUCTOR = "";
$PRBPRODUCTOR = "";
$CODIGOASOCIADOPRODUCTOR = "";
$NOMBREASOCIADOPRODUCTOR = "";
$CIUDAD = "";
$RMERCADO = "";
$TPRODUCTOR = "";


$FNOMBRE = "";

$SINO = "";

$NOMBRE = "";
$MENSAJE = "";
$FOCUS = "";
$MENSAJE2 = "";
$FOCUS2 = "";
$BORDER = "";
$BORDER2 = "";

//INICIALIZAR ARREGLOS
$ARRAYPRODUCTOR = "";
$ARRAYPRODUCTORID = "";
$ARRAYRMERCADO = "";
$ARRAYCIUDAD = "";
$ARRAYTPRODUCTOR = "";
$ARRAYVERPRODUCTOR = "";

$ARRAYVALIDARRUTPRODUCTOR2 = "";
$ARRAYVALIDARRUTPRODUCTOR1 = "";





//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYPRODUCTOR = $PRODUCTOR_ADO->listarProductorCBX();
$ARRAYCIUDAD = $CIUDAD_ADO->listarCiudadCBX();
$ARRAYRMERCADO = $RMERCADO_ADO->listarRmercadoCBX();
$ARRAYTPRODUCTOR = $TPRODUCTOR_ADO->listarTproductorCBX();



//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['GUARDAR'])) {
    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $PRODUCTOR->__SET('RUT_PRODUCTOR', $_REQUEST['RUTPRODUCTOR']);
    $PRODUCTOR->__SET('NOMBRE_PRODUCTOR', $_REQUEST['NOMBREPRODUCTOR']);
    $PRODUCTOR->__SET('DIRECCION_PRODUCTOR', $_REQUEST['DIRECCIONPRODUCTOR']);
    $PRODUCTOR->__SET('TELEFONO_PRODUCTOR', $_REQUEST['TELEFONOPRODUCTOR']);
    $PRODUCTOR->__SET('EMAIL_PRODUCTOR', $_REQUEST['EMAILPRODUCTOR']);
    $PRODUCTOR->__SET('GIRO_PRODUCTOR', $_REQUEST['GIROPRODUCTOR']);
    $PRODUCTOR->__SET('CSG_PRODUCTOR', $_REQUEST['CSGPRODUCTOR']);
    $PRODUCTOR->__SET('SDP_PRODUCTOR', $_REQUEST['SDPPRODUCTOR']);
    $PRODUCTOR->__SET('PRB_PRODUCTOR', $_REQUEST['PRBPRODUCTOR']);
    $PRODUCTOR->__SET('CODIGO_ASOCIADO_PRODUCTOR', $_REQUEST['CODIGOASOCIADOPRODUCTOR']);
    $PRODUCTOR->__SET('NOMBRE_ASOCIADO_PRODUCTOR', $_REQUEST['NOMBREASOCIADOPRODUCTOR']);
    $PRODUCTOR->__SET('CIUDAD', $_REQUEST['CIUDAD']);
    $PRODUCTOR->__SET('ID_TPRODUCTOR', $_REQUEST['TPRODUCTOR']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $PRODUCTOR_ADO->agregarProductor($PRODUCTOR);
    //CERRAR PAGINA POP Y ACTUALIZAR PAGINA PRINCIPAL
    echo "
    <script type='text/javascript'>
        window.opener.refrescar()
        window.close();
        </script> 
    ";
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Productor</title>
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

                    RUTPRODUCTOR = document.getElementById("RUTPRODUCTOR").value;
                    NOMBREPRODUCTOR = document.getElementById("NOMBREPRODUCTOR").value;
                    DIRECCIONPRODUCTOR = document.getElementById("DIRECCIONPRODUCTOR").value;
                    //        TELEFONOPRODUCTOR = document.getElementById("TELEFONOPRODUCTOR").value;
                    EMAILPRODUCTOR = document.getElementById("EMAILPRODUCTOR").value;
                    GIROPRODUCTOR = document.getElementById("GIROPRODUCTOR").value;
                    CSGPRODUCTOR = document.getElementById("CSGPRODUCTOR").value;
                    SDPPRODUCTOR = document.getElementById("SDPPRODUCTOR").value;
                    PRBPRODUCTOR = document.getElementById("PRBPRODUCTOR").value;
                    CODIGOASOCIADOPRODUCTOR = document.getElementById("CODIGOASOCIADOPRODUCTOR").value;
                    NOMBREASOCIADOPRODUCTOR = document.getElementById("NOMBREASOCIADOPRODUCTOR").value;
                    CIUDAD = document.getElementById("CIUDAD").selectedIndex;
                    TPRODUCTOR = document.getElementById("TPRODUCTOR").selectedIndex;




                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_rut').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";
                    //     document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_email').innerHTML = "";
                    document.getElementById('val_giro').innerHTML = "";
                    document.getElementById('val_csg').innerHTML = "";
                    document.getElementById('val_sdp').innerHTML = "";
                    document.getElementById('val_prb').innerHTML = "";
                    document.getElementById('val_codigo').innerHTML = "";
                    document.getElementById('val_nombrea').innerHTML = "";
                    document.getElementById('val_ciudad').innerHTML = "";
                    document.getElementById('val_tproductor').innerHTML = "";


                    if (RUTPRODUCTOR == null || RUTPRODUCTOR.length == 0 || /^\s+$/.test(RUTPRODUCTOR)) {
                        document.form_reg_dato.RUTPRODUCTOR.focus();
                        document.form_reg_dato.RUTPRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_rut').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RUTPRODUCTOR.style.borderColor = "#4AF575";

                    if (NOMBREPRODUCTOR == null || NOMBREPRODUCTOR.length == 0 || /^\s+$/.test(NOMBREPRODUCTOR)) {
                        document.form_reg_dato.NOMBREPRODUCTOR.focus();
                        document.form_reg_dato.NOMBREPRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREPRODUCTOR.style.borderColor = "#4AF575";

                    if (NOMBREPRODUCTOR.length > 82) {
                        document.form_reg_dato.NOMBREPRODUCTOR.focus();
                        document.form_reg_dato.NOMBREPRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO PUEDE SER MAYOR A 82 CARACTERES";
                        return false;
                    }
                    document.form_reg_dato.NOMBREPRODUCTOR.style.borderColor = "#4AF575";


                    if (DIRECCIONPRODUCTOR == null || DIRECCIONPRODUCTOR.length == 0 || /^\s+$/.test(DIRECCIONPRODUCTOR)) {
                        document.form_reg_dato.DIRECCIONPRODUCTOR.focus();
                        document.form_reg_dato.DIRECCIONPRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCIONPRODUCTOR.style.borderColor = "#4AF575";
                    /*
                                        if (TELEFONOPRODUCTOR == null || TELEFONOPRODUCTOR == 0) {
                                            document.form_reg_dato.TELEFONOPRODUCTOR.focus();
                                            document.form_reg_dato.TELEFONOPRODUCTOR.style.borderColor = "#FF0000";
                                            document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.TELEFONOPRODUCTOR.style.borderColor = "#4AF575";

                    */
                    if (EMAILPRODUCTOR == null || EMAILPRODUCTOR.length == 0 || /^\s+$/.test(EMAILPRODUCTOR)) {
                        document.form_reg_dato.EMAILPRODUCTOR.focus();
                        document.form_reg_dato.EMAILPRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EMAILPRODUCTOR.style.borderColor = "#4AF575";


                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                            .test(EMAILPRODUCTOR))) {
                        document.form_reg_dato.EMAILPRODUCTOR.focus();
                        document.form_reg_dato.EMAILPRODUCTOR.style.borderColor = "#ff0000";
                        document.getElementById('val_email').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.EMAILPRODUCTOR.style.borderColor = "#4AF575";


                    if (GIROPRODUCTOR == null || GIROPRODUCTOR.length == 0 || /^\s+$/.test(GIROPRODUCTOR)) {
                        document.form_reg_dato.GIROPRODUCTOR.focus();
                        document.form_reg_dato.GIROPRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_giro').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.GIROPRODUCTOR.style.borderColor = "#4AF575";


                    if (CSGPRODUCTOR == null || CSGPRODUCTOR == 0) {
                        document.form_reg_dato.CSGPRODUCTOR.focus();
                        document.form_reg_dato.CSGPRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_csg').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CSGPRODUCTOR.style.borderColor = "#4AF575";

                    if (SDPPRODUCTOR == null || SDPPRODUCTOR == 0) {
                        document.form_reg_dato.SDPPRODUCTOR.focus();
                        document.form_reg_dato.SDPPRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_sdp').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.SDPPRODUCTOR.style.borderColor = "#4AF575";


                    if (PRBPRODUCTOR == null || PRBPRODUCTOR == 0) {
                        document.form_reg_dato.PRBPRODUCTOR.focus();
                        document.form_reg_dato.PRBPRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_prb').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.PRBPRODUCTOR.style.borderColor = "#4AF575";


                    if (CODIGOASOCIADOPRODUCTOR == null || CODIGOASOCIADOPRODUCTOR == 0) {
                        document.form_reg_dato.CODIGOASOCIADOPRODUCTOR.focus();
                        document.form_reg_dato.CODIGOASOCIADOPRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_codigo').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CODIGOASOCIADOPRODUCTOR.style.borderColor = "#4AF575";

                    if (NOMBREASOCIADOPRODUCTOR == null || NOMBREASOCIADOPRODUCTOR.length == 0 || /^\s+$/.test(NOMBREASOCIADOPRODUCTOR)) {
                        document.form_reg_dato.NOMBREASOCIADOPRODUCTOR.focus();
                        document.form_reg_dato.NOMBREASOCIADOPRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombrea').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREASOCIADOPRODUCTOR.style.borderColor = "#4AF575";



                    if (CIUDAD == null || CIUDAD == 0) {
                        document.form_reg_dato.CIUDAD.focus();
                        document.form_reg_dato.CIUDAD.style.borderColor = "#FF0000";
                        document.getElementById('val_ciudad').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.CIUDAD.style.borderColor = "#4AF575";



                    if (TPRODUCTOR == null || TPRODUCTOR == 0) {
                        document.form_reg_dato.TPRODUCTOR.focus();
                        document.form_reg_dato.TPRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_tproductor').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TPRODUCTOR.style.borderColor = "#4AF575";



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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Rut </label>
                                        <input type="text" class="form-control" placeholder="Rut Productor" id="RUTPRODUCTOR" name="RUTPRODUCTOR" value="<?php echo $RUTPRODUCTOR; ?>" <?php echo $FOCUS2; ?> <?php echo  $BORDER2; ?> <?php echo $DISABLED; ?> />
                                        <label id="val_rut" class="validacion"> <?php echo $MENSAJE; ?> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre </label>
                                        <input type="text" class="form-control" placeholder="Nombre Productor" id="NOMBREPRODUCTOR" name="NOMBREPRODUCTOR" value="<?php echo $NOMBREPRODUCTOR; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_nombre" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dirreccion </label>
                                        <input type="text" class="form-control" placeholder="Dirreccion Productor" id="DIRECCIONPRODUCTOR" name="DIRECCIONPRODUCTOR" value="<?php echo $DIRECCIONPRODUCTOR; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_direccion" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telefono </label>
                                        <input type="number" class="form-control" placeholder="Telefono Productor" id="TELEFONOPRODUCTOR" name="TELEFONOPRODUCTOR" value="<?php echo $TELEFONOPRODUCTOR; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_telefono" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input type="text" class="form-control" placeholder="Email Productor" id="EMAILPRODUCTOR" name="EMAILPRODUCTOR" value="<?php echo $EMAILPRODUCTOR; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_email" class="validacion"> </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Giro </label>
                                        <input type="text" class="form-control" placeholder="Giro Productor" id="GIROPRODUCTOR" name="GIROPRODUCTOR" value="<?php echo $GIROPRODUCTOR; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_giro" class="validacion"> </label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>CSG </label>
                                        <input type="number" class="form-control" placeholder="CSG Productor" id="CSGPRODUCTOR" name="CSGPRODUCTOR" value="<?php echo $CSGPRODUCTOR; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_csg" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SDP </label>
                                        <input type="number" class="form-control" placeholder="SDP Productor" id="SDPPRODUCTOR" name="SDPPRODUCTOR" value="<?php echo $SDPPRODUCTOR; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_sdp" class="validacion"> </label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>PRB </label>
                                        <input type="number" class="form-control" placeholder="PRB Productor" id="PRBPRODUCTOR" name="PRBPRODUCTOR" value="<?php echo $PRBPRODUCTOR; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_prb" class="validacion"> </label>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Codigo Asociado </label>
                                        <input type="number" class="form-control" placeholder="Codigo Asociado Productor" id="CODIGOASOCIADOPRODUCTOR" name="CODIGOASOCIADOPRODUCTOR" value="<?php echo $CODIGOASOCIADOPRODUCTOR; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_codigo" class="validacion"> </label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre Asociado </label>
                                        <input type="text" class="form-control" placeholder="Nombre Asociado Productor" id="NOMBREASOCIADOPRODUCTOR" name="NOMBREASOCIADOPRODUCTOR" value="<?php echo $NOMBREASOCIADOPRODUCTOR; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_nombrea" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Ciudad </label>
                                        <select class="form-control select2" id="CIUDAD" name="CIUDAD" style="width: 100%;" value="<?php echo $CIUDAD; ?>" <?php echo $DISABLED; ?>>
                                            <option></option>
                                            <?php foreach ($ARRAYCIUDAD as $r) : ?>
                                                <?php if ($ARRAYCIUDAD) {    ?>
                                                    <option value="<?php echo $r['ID_CIUDAD']; ?>" <?php if ($CIUDAD == $r['ID_CIUDAD']) {
                                                                                                        echo "selected";
                                                                                                    } ?>>
                                                        <?php echo $r['NOMBRE_CIUDAD'] ?>
                                                    </option>
                                                <?php } else { ?>
                                                    <option>No Hay Datos Registrados </option>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </select>
                                        <label id="val_ciudad" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label>Tipo Productor</label>
                                        <select class="form-control select2" id="TPRODUCTOR" name="TPRODUCTOR" style="width: 100%;" value="<?php echo $TPRODUCTOR; ?>" <?php echo $DISABLED; ?>>
                                            <option></option>
                                            <?php foreach ($ARRAYTPRODUCTOR as $r) : ?>
                                                <?php if ($ARRAYTPRODUCTOR) {    ?>
                                                    <option value="<?php echo $r['ID_TPRODUCTOR']; ?>" <?php if ($TPRODUCTOR == $r['ID_TPRODUCTOR']) {
                                                                                                            echo "selected";
                                                                                                        } ?>>
                                                        <?php echo $r['NOMBRE_TPRODUCTOR'] ?>
                                                    </option>
                                                <?php } else { ?>
                                                    <option>No Hay Datos Registrados </option>
                                                <?php } ?>

                                            <?php endforeach; ?>
                                        </select>
                                        <label id="val_tproductor" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="cerrar();">
                                <i class="ti-trash"></i> Cancelar
                            </button>
                            <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED; ?>>
                                <i class="ti-save-alt"></i> Crear
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