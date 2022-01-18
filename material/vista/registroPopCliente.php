<?php


include_once "../../assest/config/validarUsuarioMaterial.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/CLIENTE_ADO.php';

include_once '../../assest/controlador/CIUDAD_ADO.php';


include_once '../../assest/modelo/CLIENTE.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$CLIENTE_ADO =  new CLIENTE_ADO();

$CIUDAD_ADO =  new CIUDAD_ADO();

//INIICIALIZAR NOMBRE_CLIENTE

$CLIENTE =  new CLIENTE();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$RUTCLIENTE = "";
$DVCLIENTE = "";
$RAZONCLIENTE = "";
$NOMBRECLIENTE = "";
$GIROCLIENTE = "";
$DIRECCIONCLIENTE = "";
$TELEFONOCLIENTE = "";
$EMAILCLIENTE = "";
$CIUDAD = "";
$EMPRESA = "";
$NUMERO = "";


$FOCUS = "";
$BORDER = "";
$DISABLED = "";
$OP = "";

//INICIALIZAR ARREGLOS
$ARRAYCLIENTEID = "";
$ARRAYCLIENTES = "";
$ARRAYEMPRESA = "";
$ARRAYCIUDAD = "";
$ARRAYTUMEDIDA = "";
$ARRAYNUMERO = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYCIUDAD = $CIUDAD_ADO->listarCiudad3CBX();





?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Cliente</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                //VALIDACION DE FORMULARIO
                function validacion() {

                    RUTCLIENTE = document.getElementById("RUTCLIENTE").value;
                    DVCLIENTE = document.getElementById("DVCLIENTE").value;
                    RAZONCLIENTE = document.getElementById("RAZONCLIENTE").value;
                    NOMBRECLIENTE = document.getElementById("NOMBRECLIENTE").value;
                    GIROCLIENTE = document.getElementById("GIROCLIENTE").value;
                    DIRECCIONCLIENTE = document.getElementById("DIRECCIONCLIENTE").value;
                    TELEFONOCLIENTE = document.getElementById("TELEFONOCLIENTE").value;
                    EMAILCLIENTE = document.getElementById("EMAILCLIENTE").value;
                    CIUDAD = document.getElementById("CIUDAD").selectedIndex;


                    document.getElementById('val_rut').innerHTML = "";
                    document.getElementById('val_dv').innerHTML = "";
                    document.getElementById('val_razon').innerHTML = "";
                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_giro').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_email').innerHTML = "";
                    document.getElementById('val_ciudad').innerHTML = "";


                    if (RUTCLIENTE == null || RUTCLIENTE.length == 0 || /^\s+$/.test(RUTCLIENTE)) {
                        document.form_reg_dato.RUTCLIENTE.focus();
                        document.form_reg_dato.RUTCLIENTE.style.borderColor = "#FF0000";
                        document.getElementById('val_rut').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RUTCLIENTE.style.borderColor = "#4AF575";

                    if (DVCLIENTE == null || DVCLIENTE.length == 0 || /^\s+$/.test(DVCLIENTE)) {
                        document.form_reg_dato.DVCLIENTE.focus();
                        document.form_reg_dato.DVCLIENTE.style.borderColor = "#FF0000";
                        document.getElementById('val_dv').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DVCLIENTE.style.borderColor = "#4AF575";
                    /*
                    if (RAZONCLIENTE == null || RAZONCLIENTE.length == 0 || /^\s+$/.test(RAZONCLIENTE)) {
                        document.form_reg_dato.RAZONCLIENTE.focus();
                        document.form_reg_dato.RAZONCLIENTE.style.borderColor = "#FF0000";
                        document.getElementById('val_razon').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RAZONCLIENTE.style.borderColor = "#4AF575";
                    */

                    if (NOMBRECLIENTE == null || NOMBRECLIENTE.length == 0 || /^\s+$/.test(NOMBRECLIENTE)) {
                        document.form_reg_dato.NOMBRECLIENTE.focus();
                        document.form_reg_dato.NOMBRECLIENTE.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRECLIENTE.style.borderColor = "#4AF575";
                    /*
                    if (GIROCLIENTE == null || GIROCLIENTE.length == 0 || /^\s+$/.test(GIROCLIENTE)) {
                        document.form_reg_dato.GIROCLIENTE.focus();
                        document.form_reg_dato.GIROCLIENTE.style.borderColor = "#FF0000";
                        document.getElementById('val_giro').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.GIROCLIENTE.style.borderColor = "#4AF575";
                    */

                    if (DIRECCIONCLIENTE == null || DIRECCIONCLIENTE.length == 0 || /^\s+$/.test(DIRECCIONCLIENTE)) {
                        document.form_reg_dato.DIRECCIONCLIENTE.focus();
                        document.form_reg_dato.DIRECCIONCLIENTE.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCIONCLIENTE.style.borderColor = "#4AF575";
                    /*
                    if (TELEFONOCLIENTE == null || TELEFONOCLIENTE.length == 0 || /^\s+$/.test(TELEFONOCLIENTE)) {
                        document.form_reg_dato.TELEFONOCLIENTE.focus();
                        document.form_reg_dato.TELEFONOCLIENTE.style.borderColor = "#FF0000";
                        document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.TELEFONOCLIENTE.style.borderColor = "#4AF575";

                    if (EMAILCLIENTE == null || EMAILCLIENTE.length == 0 || /^\s+$/.test(EMAILCLIENTE)) {
                        document.form_reg_dato.EMAILCLIENTE.focus();
                        document.form_reg_dato.EMAILCLIENTE.style.borderColor = "#FF0000";
                        document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EMAILCLIENTE.style.borderColor = "#4AF575";

                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                            .test(EMAILCLIENTE))) {
                        document.form_reg_dato.EMAILCLIENTE.focus();
                        document.form_reg_dato.EMAILCLIENTE.style.borderColor = "#ff0000";
                        document.getElementById('val_email').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.EMAILCLIENTE.style.borderColor = "#4AF575";
                        ¨*/
                    /*
                    if (CIUDAD == null || CIUDAD == 0) {
                        document.form_reg_dato.CIUDAD.focus();
                        document.form_reg_dato.CIUDAD.style.borderColor = "#FF0000";
                        document.getElementById('val_ciudad').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.CIUDAD.style.borderColor = "#4AF575";*/




                }




                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
                    <!-- Main content -->
                    <section class="content">
                                <div class="box">
                                    <div class="box-header with-border bg-primary">                                
                                        <h4 class="box-title">Registro Cliente</h4>                                
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" id="form_reg_dato" name="form_reg_dato" >
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                 <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Rut </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder=" Rut  Cliente" id="RUTCLIENTE" name="RUTCLIENTE" value="<?php echo $RUTCLIENTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rut" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 col-xs-2">
                                                    <div class="form-group">
                                                        <label>DV </label>
                                                        <input type="text" class="form-control" placeholder=" DV  Cliente" id="DVCLIENTE" name="DVCLIENTE" value="<?php echo $DVCLIENTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_dv" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Razón Social </label>
                                                        <input type="text" class="form-control" placeholder=" Nombre  Cliente" id="RAZONCLIENTE" name="RAZONCLIENTE" value="<?php echo $RAZONCLIENTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_razon" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder=" Nombre  Cliente" id="NOMBRECLIENTE" name="NOMBRECLIENTE" value="<?php echo $NOMBRECLIENTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Giro</label>
                                                        <input type="text" class="form-control" placeholder=" Giro  Cliente" id="GIROCLIENTE" name="GIROCLIENTE" value="<?php echo $GIROCLIENTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_giro" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Dirección </label>
                                                        <input type="text" class="form-control" placeholder=" Dirección  Cliente" id="DIRECCIONCLIENTE" name="DIRECCIONCLIENTE" value="<?php echo $DIRECCIONCLIENTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_direccion" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Telefono</label>
                                                        <input type="number" class="form-control" placeholder=" Telefono  Cliente" id="TELEFONOCLIENTE" name="TELEFONOCLIENTE" value="<?php echo $TELEFONOCLIENTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_telefono" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Email </label>
                                                        <input type="text" class="form-control" placeholder=" Email  Cliente" id="EMAILCLIENTE" name="EMAILCLIENTE" value="<?php echo $EMAILCLIENTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Ciudad</label>
                                                        <select class="form-control select2" id="CIUDAD" name="CIUDAD" style="width: 100%;" value="<?php echo $CIUDAD; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYCIUDAD as $r) : ?>
                                                                <?php if ($ARRAYCIUDAD) {    ?>
                                                                    <option value="<?php echo $r['ID_CIUDAD']; ?>" 
                                                                    <?php if ($CIUDAD == $r['ID_CIUDAD']) { echo "selected"; } ?>>
                                                                        <?php echo $r['CIUDAD'] ?>, <?php echo $r['COMUNA'] ?>, <?php echo $r['PROVINCIA'] ?>, <?php echo $r['REGION'] ?>, <?php echo $r['PAIS'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_ciudad" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->                              
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroCliente.php');">
                                                <i class="ti-trash"></i>Cancelar
                                                </button>
                                                <?php if ($OP != "editar") { ?>
                                                    <button type="submit" class="btn btn-primary" name="GUARDAR" value="GUARDAR"  data-toggle="tooltip" title="Guardar"  <?php echo $DISABLED; ?> Onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } else { ?>
                                                    <button type="submit" class="btn btn-primary" name="EDITAR" value="EDITAR"   data-toggle="tooltip" title="Guardar" Onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box -->
                        <!--.row -->
                    </section>
                    <!-- /.content -->

            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php 
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['GUARDAR'])) {

                $ARRAYNUMERO = $CLIENTE_ADO->obtenerNumero();
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;


                //UTILIZACION METODOS SET DEL NOMBRE_CLIENTE
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $CLIENTE->__SET('NUMERO_CLIENTE', $NUMERO);
                $CLIENTE->__SET('RUT_CLIENTE', $_REQUEST['RUTCLIENTE']);
                $CLIENTE->__SET('DV_CLIENTE', $_REQUEST['DVCLIENTE']);
                $CLIENTE->__SET('RAZON_CLIENTE', $_REQUEST['RAZONCLIENTE']);
                $CLIENTE->__SET('NOMBRE_CLIENTE', $_REQUEST['NOMBRECLIENTE']);
                $CLIENTE->__SET('GIRO_CLIENTE', $_REQUEST['GIROCLIENTE']);
                $CLIENTE->__SET('DIRECCION_CLIENTE', $_REQUEST['DIRECCIONCLIENTE']);
                $CLIENTE->__SET('TELEFONO_CLIENTE', $_REQUEST['TELEFONOCLIENTE']);
                $CLIENTE->__SET('EMAIL_CLIENTE', $_REQUEST['EMAILCLIENTE']);
                $CLIENTE->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $CLIENTE->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
                $CLIENTE->__SET('ID_USUARIOI', $IDUSUARIOS);
                $CLIENTE->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $CLIENTE_ADO->agregarCliente($CLIENTE);
                //REDIRECCIONAR A PAGINA registroEcomercial.php
                    echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro del mantenedor se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroCliente.php";                            
                    })
                </script>';
            }
        ?>
</body>
</html>