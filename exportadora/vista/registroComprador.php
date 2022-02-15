<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/COMUNA_ADO.php';

include_once '../../assest/controlador/COMPRADOR_ADO.php';
include_once '../../assest/modelo/COMPRADOR.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$COMUNA_ADO =  new COMUNA_ADO();

$COMPRADOR_ADO =  new COMPRADOR_ADO();
//INIICIALIZAR MODELO
$COMPRADOR =  new COMPRADOR();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$RUTCOMPRADOR = "";
$DVCOMPRADOR = "";
$NOMBRECOMPRADOR = "";
$DIRECCIONCOMPRADOR = "";
$TELEFONOCOMPRADOR = "";
$EMAILCOMPRADOR = "";
$COMUNA = "";


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
$ARRAYCOMPRADOR = "";
$ARRAYCOMPRADORID = "";
$ARRAYCOMUNA = "";





//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYCOMPRADOR = $COMPRADOR_ADO->listarCompradorPorEmpresaCBX($EMPRESAS);
$ARRAYCOMUNA = $COMUNA_ADO->listarComuna3CBX();
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrl.php";





//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION Y VISUALIZACION
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['parametro'];
    $OP = $_SESSION['parametro1'];



    //IDENTIFICACIONES DE OPERACIONES    //OPERACION DE CAMBIO DE ESTADO
    //0 = DESACTIVAR
    if ($OP == "0") {

        $COMPRADOR->__SET('ID_COMPRADOR', $IDOP);
        $COMPRADOR_ADO->deshabilitar($COMPRADOR);

        echo "<script type='text/javascript'> location.href ='registroComprador.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $COMPRADOR->__SET('ID_COMPRADOR', $IDOP);
        $COMPRADOR_ADO->habilitar($COMPRADOR);
        echo "<script type='text/javascript'> location.href ='registroComprador.php';</script>";
    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYCOMPRADORID = $COMPRADOR_ADO->verComprador($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYCOMPRADORID as $r) :
            $RUTCOMPRADOR = "" . $r['RUT_COMPRADOR'];
            $DVCOMPRADOR = "" . $r['DV_COMPRADOR'];
            $NOMBRECOMPRADOR = "" . $r['NOMBRE_COMPRADOR'];
            $DIRECCIONCOMPRADOR = "" . $r['DIRECCION_COMPRADOR'];
            $TELEFONOCOMPRADOR = "" . $r['TELEFONO_COMPRADOR'];
            $EMAILCOMPRADOR = "" . $r['EMAIL_COMPRADOR'];
            $COMUNA = "" . $r['ID_COMUNA'];
        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZAAR INFORMAICON DE REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYCOMPRADORID = $COMPRADOR_ADO->verComprador($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYCOMPRADORID as $r) :
            $RUTCOMPRADOR = "" . $r['RUT_COMPRADOR'];
            $DVCOMPRADOR = "" . $r['DV_COMPRADOR'];
            $NOMBRECOMPRADOR = "" . $r['NOMBRE_COMPRADOR'];
            $DIRECCIONCOMPRADOR = "" . $r['DIRECCION_COMPRADOR'];
            $TELEFONOCOMPRADOR = "" . $r['TELEFONO_COMPRADOR'];
            $EMAILCOMPRADOR = "" . $r['EMAIL_COMPRADOR'];
            $COMUNA = "" . $r['ID_COMUNA'];
        endforeach;
    }
}





?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Comprador</title>
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

                    RUTCOMPRADOR = document.getElementById("RUTCOMPRADOR").value;
                    DVCOMPRADOR = document.getElementById("DVCOMPRADOR").value;
                    NOMBRECOMPRADOR = document.getElementById("NOMBRECOMPRADOR").value;
                    DIRECCIONCOMPRADOR = document.getElementById("DIRECCIONCOMPRADOR").value;
                    TELEFONOCOMPRADOR = document.getElementById("TELEFONOCOMPRADOR").value;
                    EMAILCOMPRADOR = document.getElementById("EMAILCOMPRADOR").value;
                    COMUNA = document.getElementById("COMUNA").selectedIndex;




                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_dv').innerHTML = "";
                    document.getElementById('val_rut').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_email').innerHTML = "";
                    document.getElementById('val_comuna').innerHTML = "";


                    if (RUTCOMPRADOR == null || RUTCOMPRADOR.length == 0 || /^\s+$/.test(RUTCOMPRADOR)) {
                        document.form_reg_dato.RUTCOMPRADOR.focus();
                        document.form_reg_dato.RUTCOMPRADOR.style.borderColor = "#FF0000";
                        document.getElementById('val_rut').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RUTCOMPRADOR.style.borderColor = "#4AF575";

                    if (DVCOMPRADOR == null || DVCOMPRADOR.length == 0 || /^\s+$/.test(DVCOMPRADOR)) {
                        document.form_reg_dato.DVCOMPRADOR.focus();
                        document.form_reg_dato.DVCOMPRADOR.style.borderColor = "#FF0000";
                        document.getElementById('val_dv').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DVCOMPRADOR.style.borderColor = "#4AF575";

                    if (NOMBRECOMPRADOR == null || NOMBRECOMPRADOR.length == 0 || /^\s+$/.test(NOMBRECOMPRADOR)) {
                        document.form_reg_dato.NOMBRECOMPRADOR.focus();
                        document.form_reg_dato.NOMBRECOMPRADOR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRECOMPRADOR.style.borderColor = "#4AF575";

                    if (NOMBRECOMPRADOR.length > 82) {
                        document.form_reg_dato.NOMBRECOMPRADOR.focus();
                        document.form_reg_dato.NOMBRECOMPRADOR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO PUEDE SER MAYOR A 82 CARACTERES";
                        return false;
                    }
                    document.form_reg_dato.NOMBRECOMPRADOR.style.borderColor = "#4AF575";

                    /*
                                        if (EMAILCOMPRADOR == null || EMAILCOMPRADOR.length == 0 || /^\s+$/.test(EMAILCOMPRADOR)) {
                                            document.form_reg_dato.EMAILCOMPRADOR.focus();
                                            document.form_reg_dato.EMAILCOMPRADOR.style.borderColor = "#FF0000";
                                            document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.EMAILCOMPRADOR.style.borderColor = "#4AF575";

                                        if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                                                .test(EMAILCOMPRADOR))) {
                                            document.form_reg_dato.EMAILCOMPRADOR.focus();
                                            document.form_reg_dato.EMAILCOMPRADOR.style.borderColor = "#ff0000";
                                            document.getElementById('val_email').innerHTML = "FORMATO DE CORREO INCORRECTO";
                                            return false;
                                        }
                                        document.form_reg_dato.EMAILCOMPRADOR.style.borderColor = "#4AF575";

                                        if (TELEFONOCOMPRADOR == null || TELEFONOCOMPRADOR == 0) {
                                            document.form_reg_dato.TELEFONOCOMPRADOR.focus();
                                            document.form_reg_dato.TELEFONOCOMPRADOR.style.borderColor = "#FF0000";
                                            document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.TELEFONOCOMPRADOR.style.borderColor = "#4AF575";

    */
                                        if (DIRECCIONCOMPRADOR == null || DIRECCIONCOMPRADOR.length == 0 || /^\s+$/.test(DIRECCIONCOMPRADOR)) {
                                            document.form_reg_dato.DIRECCIONCOMPRADOR.focus();
                                            document.form_reg_dato.DIRECCIONCOMPRADOR.style.borderColor = "#FF0000";
                                            document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.DIRECCIONCOMPRADOR.style.borderColor = "#4AF575";



                                        if (COMUNA == null || COMUNA == 0) {
                                            document.form_reg_dato.COMUNA.focus();
                                            document.form_reg_dato.COMUNA.style.borderColor = "#FF0000";
                                            document.getElementById('val_comuna').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                                            return false;
                                        }
                                        document.form_reg_dato.COMUNA.style.borderColor = "#4AF575";

                



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
            <?php include_once "../../assest/config/menuExpo.php"; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Otros</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Otros</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Comprador</a> </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>

                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                <div class="box">
                                    <div class="box-header with-border bg-primary">                                        
                                        <h4 class="box-title">Registro Comprador</h4>                                
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                 <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Rut </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Rut Comprador" id="RUTCOMPRADOR" name="RUTCOMPRADOR" value="<?php echo $RUTCOMPRADOR; ?>" <?php echo $FOCUS2; ?> <?php echo  $BORDER2; ?> <?php echo $DISABLED; ?> />
                                                        <label id="val_rut" class="validacion"> <?php echo $MENSAJE; ?> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 col-xs-2">
                                                    <div class="form-group">
                                                        <label>DV </label>
                                                        <input type="text" class="form-control" placeholder="DV Comprador" id="DVCOMPRADOR" name="DVCOMPRADOR" value="<?php echo $DVCOMPRADOR; ?>" <?php echo $FOCUS2; ?> <?php echo  $BORDER2; ?> <?php echo $DISABLED; ?> />
                                                        <label id="val_dv" class="validacion"> <?php echo $MENSAJE; ?> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Comprador" id="NOMBRECOMPRADOR" name="NOMBRECOMPRADOR" value="<?php echo $NOMBRECOMPRADOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Email </label>
                                                        <input type="text" class="form-control" placeholder="Telefono Comprador" id="EMAILCOMPRADOR" name="EMAILCOMPRADOR" value="<?php echo $EMAILCOMPRADOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Telefono </label>
                                                        <input type="text" class="form-control" placeholder="Telefono Comprador" id="TELEFONOCOMPRADOR" name="TELEFONOCOMPRADOR" value="<?php echo $TELEFONOCOMPRADOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_telefono" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Dirreccion </label>
                                                        <input type="text" class="form-control" placeholder="Dirreccion Comprador" id="DIRECCIONCOMPRADOR" name="DIRECCIONCOMPRADOR" value="<?php echo $DIRECCIONCOMPRADOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_direccion" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label> Comuna</label>
                                                        <select class="form-control select2" id="COMUNA" name="COMUNA" style="width: 100%;" value="<?php echo $COMUNA; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYCOMUNA as $r) : ?>
                                                                <?php if ($ARRAYCOMUNA) {    ?>
                                                                    <option value="<?php echo $r['ID_COMUNA']; ?>" 
                                                                    <?php if ($COMUNA == $r['ID_COMUNA']) { echo "selected";  } ?>>
                                                                        <?php echo $r['COMUNA'] ?>, <?php echo $r['PROVINCIA'] ?>, <?php echo $r['REGION'] ?>, <?php echo $r['PAIS'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>

                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_comuna" class="validacion"> </label>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroComprador.php');">
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
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                <div class="box">
                                    <div class="box-header with-border bg-info">
                                        <h4 class="box-title">Agrupado Comprador</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="listar" class="table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="center">
                                                        <th>Numero </th>
                                                        <th>Nombre </th>
                                                        <th>Operaciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYCOMPRADOR as $r) : ?>
                                                        <tr class="center">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['NUMERO_COMPRADOR']; ?>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $r['NOMBRE_COMPRADOR']; ?></td>                                                                                                                                                                                                                                    
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <span class="icon-copy ti-settings"></span>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_COMPRADOR']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroComprador" />
                                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Ver">
                                                                                    <button type="submit" class="btn btn-info btn-block  btn-sm" id="VERURL" name="VERURL">
                                                                                        <i class="ti-eye"></i> Ver
                                                                                    </button>
                                                                                </span> 
                                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Editar">
                                                                                    <button type="submit" class="btn  btn-warning btn-block   btn-sm" id="EDITARURL" name="EDITARURL">
                                                                                        <i class="ti-pencil-alt"></i> Editar
                                                                                    </button>
                                                                                </span>
                                                                                <?php if ($r['ESTADO_REGISTRO'] == 1) { ?>
                                                                                    <span href="#" class="dropdown-item" data-toggle="tooltip" title="Deshabilitar">
                                                                                        <button type="submit" class="btn btn-block btn-danger btn-sm" id="ELIMINARURL" name="ELIMINARURL">
                                                                                            <i class="ti-na "></i> Deshabilitar
                                                                                        </button>
                                                                                    </span>
                                                                                <?php } ?>
                                                                                <?php if ($r['ESTADO_REGISTRO'] == 0) { ?>
                                                                                    <span href="#" class="dropdown-item" data-toggle="tooltip" title="Habilitar">
                                                                                        <button type="submit" class="btn btn-block btn-success btn-sm" id="HABILITARURL" name="HABILITARURL">
                                                                                            <i class="ti-check "></i> Habilitar
                                                                                        </button>
                                                                                    </span>
                                                                                <?php } ?>                                                               
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </td>  
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>
                        <!--.row -->
                    </section>
                    <!-- /.content -->
                </div>
            </div>
            <!-- /.content-wrapper -->


            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../../assest/config/footer.php"; ?>
                <?php include_once "../../assest/config/menuExtraExpo.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php
            
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['GUARDAR'])) {

                $ARRAYNUMERO = $COMPRADOR_ADO->obtenerNumero($EMPRESAS);
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;


                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $COMPRADOR->__SET('NUMERO_COMPRADOR', $NUMERO);
                $COMPRADOR->__SET('RUT_COMPRADOR', $_REQUEST['RUTCOMPRADOR']);
                $COMPRADOR->__SET('DV_COMPRADOR', $_REQUEST['DVCOMPRADOR']);
                $COMPRADOR->__SET('NOMBRE_COMPRADOR', $_REQUEST['NOMBRECOMPRADOR']);
                $COMPRADOR->__SET('DIRECCION_COMPRADOR', $_REQUEST['DIRECCIONCOMPRADOR']);
                $COMPRADOR->__SET('TELEFONO_COMPRADOR', $_REQUEST['TELEFONOCOMPRADOR']);
                $COMPRADOR->__SET('EMAIL_COMPRADOR', $_REQUEST['EMAILCOMPRADOR']);
                $COMPRADOR->__SET('ID_COMUNA', $_REQUEST['COMUNA']);
                $COMPRADOR->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $COMPRADOR->__SET('ID_USUARIOI', $IDUSUARIOS);
                $COMPRADOR->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $COMPRADOR_ADO->agregarComprador($COMPRADOR);
                //REDIRECCIONAR A PAGINA registroComprador.php
                    echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro del mantenedor se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroComprador.php";                            
                    })
                </script>';
            }
            //OPERACION EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {

                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO  
                $COMPRADOR->__SET('RUT_COMPRADOR', $_REQUEST['RUTCOMPRADOR']);
                $COMPRADOR->__SET('DV_COMPRADOR', $_REQUEST['DVCOMPRADOR']);
                $COMPRADOR->__SET('NOMBRE_COMPRADOR', $_REQUEST['NOMBRECOMPRADOR']);
                $COMPRADOR->__SET('DIRECCION_COMPRADOR', $_REQUEST['DIRECCIONCOMPRADOR']);
                $COMPRADOR->__SET('TELEFONO_COMPRADOR', $_REQUEST['TELEFONOCOMPRADOR']);
                $COMPRADOR->__SET('EMAIL_COMPRADOR', $_REQUEST['EMAILCOMPRADOR']);
                $COMPRADOR->__SET('ID_COMUNA', $_REQUEST['COMUNA']);
                $COMPRADOR->__SET('ID_USUARIOM', $IDUSUARIOS);
                $COMPRADOR->__SET('ID_COMPRADOR', $_REQUEST['ID']);
                //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                $COMPRADOR_ADO->actualizarComprador($COMPRADOR);
                //REDIRECCIONAR A PAGINA registroComprador.php
                    echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroComprador.php";                            
                    })
                </script>';
            }
        ?>
</body>
</html>