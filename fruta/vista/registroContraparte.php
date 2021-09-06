<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/CIUDAD_ADO.php';

include_once '../controlador/CONTRAPARTE_ADO.php';
include_once '../modelo/CONTRAPARTE.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$CIUDAD_ADO =  new CIUDAD_ADO();

$CONTRAPARTE_ADO =  new CONTRAPARTE_ADO();
//INIICIALIZAR MODELO
$CONTRAPARTE =  new CONTRAPARTE();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$NOMBRECONTRAPARTE = "";
$DIRECCIONCONTRAPARTE = "";
$TELEFONOCONTRAPARTE = "";
$EMAILCONTRAPARTE = "";
$CIUDAD = "";


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
$ARRAYCONTRAPARTE = "";
$ARRAYCONTRAPARTEID = "";
$ARRAYCIUDAD = "";
$ARRAYTCONTRAPARTE = "";
$ARRAYVERCONTRAPARTE = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYCIUDAD = $CIUDAD_ADO->listarCiudadCBX();
$ARRAYCONTRAPARTE = $CONTRAPARTE_ADO->listarContrapartePorEmpresaCBX($EMPRESAS);
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrl.php";





//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['GUARDAR'])) {

    $ARRAYNUMERO = $CONTRAPARTE_ADO->obtenerNumero($EMPRESAS);
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;

    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $CONTRAPARTE->__SET('NUMERO_CONTRAPARTE', $NUMERO);
    $CONTRAPARTE->__SET('NOMBRE_CONTRAPARTE', $_REQUEST['NOMBRECONTRAPARTE']);
    $CONTRAPARTE->__SET('DIRECCION_CONTRAPARTE', $_REQUEST['DIRECCIONCONTRAPARTE']);
    $CONTRAPARTE->__SET('TELEFONO_CONTRAPARTE', $_REQUEST['TELEFONOCONTRAPARTE']);
    $CONTRAPARTE->__SET('EMAIL_CONTRAPARTE', $_REQUEST['EMAILCONTRAPARTE']);
    $CONTRAPARTE->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
    $CONTRAPARTE->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $CONTRAPARTE->__SET('ID_USUARIOI', $IDUSUARIOS);
    $CONTRAPARTE->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $CONTRAPARTE_ADO->agregarContraparte($CONTRAPARTE);
    //REDIRECCIONAR A PAGINA registroContraparte.php
    echo "<script type='text/javascript'> location.href ='registroContraparte.php';</script>";
}
//OPERACION EDICION DE FILA
if (isset($_REQUEST['EDITAR'])) {

    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO  
    $CONTRAPARTE->__SET('NOMBRE_CONTRAPARTE', $_REQUEST['NOMBRECONTRAPARTE']);
    $CONTRAPARTE->__SET('DIRECCION_CONTRAPARTE', $_REQUEST['DIRECCIONCONTRAPARTE']);
    $CONTRAPARTE->__SET('TELEFONO_CONTRAPARTE', $_REQUEST['TELEFONOCONTRAPARTE']);
    $CONTRAPARTE->__SET('EMAIL_CONTRAPARTE', $_REQUEST['EMAILCONTRAPARTE']);
    $CONTRAPARTE->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
    $CONTRAPARTE->__SET('ID_USUARIOM', $IDUSUARIOS);
    $CONTRAPARTE->__SET('ID_CONTRAPARTE', $_REQUEST['ID']);
    //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
    $CONTRAPARTE_ADO->actualizarContraparte($CONTRAPARTE);
    //REDIRECCIONAR A PAGINA registroContraparte.php
    echo "<script type='text/javascript'> location.href ='registroContraparte.php';</script>";
}

//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION Y VISUALIZACION
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['parametro'];
    $OP = $_SESSION['parametro1'];


    //IDENTIFICACIONES DE OPERACIONES    //OPERACION DE CAMBIO DE ESTADO
    //0 = DESACTIVAR
    if ($OP == "0") {

        $CONTRAPARTE->__SET('ID_CONTRAPARTE', $IDOP);
        $CONTRAPARTE_ADO->deshabilitar($CONTRAPARTE);

        echo "<script type='text/javascript'> location.href ='registroContraparte.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $CONTRAPARTE->__SET('ID_CONTRAPARTE', $IDOP);
        $CONTRAPARTE_ADO->habilitar($CONTRAPARTE);
        echo "<script type='text/javascript'> location.href ='registroContraparte.php';</script>";
    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYCONTRAPARTEID = $CONTRAPARTE_ADO->verContraparte($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYCONTRAPARTEID as $r) :
            $NOMBRECONTRAPARTE = "" . $r['NOMBRE_CONTRAPARTE'];
            $DIRECCIONCONTRAPARTE = "" . $r['DIRECCION_CONTRAPARTE'];
            $TELEFONOCONTRAPARTE = "" . $r['TELEFONO_CONTRAPARTE'];
            $EMAILCONTRAPARTE = "" . $r['EMAIL_CONTRAPARTE'];
            $CIUDAD = "" . $r['ID_CIUDAD'];
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
        $ARRAYCONTRAPARTEID = $CONTRAPARTE_ADO->verContraparte($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYCONTRAPARTEID as $r) :
            $NOMBRECONTRAPARTE = "" . $r['NOMBRE_CONTRAPARTE'];
            $DIRECCIONCONTRAPARTE = "" . $r['DIRECCION_CONTRAPARTE'];
            $TELEFONOCONTRAPARTE = "" . $r['TELEFONO_CONTRAPARTE'];
            $EMAILCONTRAPARTE = "" . $r['EMAIL_CONTRAPARTE'];
            $CIUDAD = "" . $r['ID_CIUDAD'];
        endforeach;
    }
}





?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Contraparte</title>
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
                    NOMBRECONTRAPARTE = document.getElementById("NOMBRECONTRAPARTE").value;
                    DIRECCIONCONTRAPARTE = document.getElementById("DIRECCIONCONTRAPARTE").value;
                    TELEFONOCONTRAPARTE = document.getElementById("TELEFONOCONTRAPARTE").value;
                    EMAILCONTRAPARTE = document.getElementById("EMAILCONTRAPARTE").value;
                    CIUDAD = document.getElementById("CIUDAD").selectedIndex;




                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_email').innerHTML = "";
                    document.getElementById('val_ciudad').innerHTML = "";


                    if (NOMBRECONTRAPARTE == null || NOMBRECONTRAPARTE.length == 0 || /^\s+$/.test(NOMBRECONTRAPARTE)) {
                        document.form_reg_dato.NOMBRECONTRAPARTE.focus();
                        document.form_reg_dato.NOMBRECONTRAPARTE.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRECONTRAPARTE.style.borderColor = "#4AF575";

                    if (NOMBRECONTRAPARTE.length > 82) {
                        document.form_reg_dato.NOMBRECONTRAPARTE.focus();
                        document.form_reg_dato.NOMBRECONTRAPARTE.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO PUEDE SER MAYOR A 82 CARACTERES";
                        return false;
                    }
                    document.form_reg_dato.NOMBRECONTRAPARTE.style.borderColor = "#4AF575";


                    if (DIRECCIONCONTRAPARTE == null || DIRECCIONCONTRAPARTE.length == 0 || /^\s+$/.test(DIRECCIONCONTRAPARTE)) {
                        document.form_reg_dato.DIRECCIONCONTRAPARTE.focus();
                        document.form_reg_dato.DIRECCIONCONTRAPARTE.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCIONCONTRAPARTE.style.borderColor = "#4AF575";

                    /*
                        if (TELEFONOCONTRAPARTE == null || TELEFONOCONTRAPARTE == 0) {
                            document.form_reg_dato.TELEFONOCONTRAPARTE.focus();
                            document.form_reg_dato.TELEFONOCONTRAPARTE.style.borderColor = "#FF0000";
                            document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.TELEFONOCONTRAPARTE.style.borderColor = "#4AF575";


                        if (EMAILCONTRAPARTE == null || EMAILCONTRAPARTE.length == 0 || /^\s+$/.test(EMAILCONTRAPARTE)) {
                            document.form_reg_dato.EMAILCONTRAPARTE.focus();
                            document.form_reg_dato.EMAILCONTRAPARTE.style.borderColor = "#FF0000";
                            document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.EMAILCONTRAPARTE.style.borderColor = "#4AF575";




                        if (CIUDAD == null || CIUDAD == 0) {
                            document.form_reg_dato.CIUDAD.focus();
                            document.form_reg_dato.CIUDAD.style.borderColor = "#FF0000";
                            document.getElementById('val_ciudad').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                            return false;
                        }
                        document.form_reg_dato.CIUDAD.style.borderColor = "#4AF575";
                    */





                }

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


                    //     document.form_reg_dato.HORARECEPCION.value = horaImprimible;
                    document.fechahora.fechahora.value = fechaImprimible + " " + horaImprimible;
                    setTimeout("mueveReloj()", 1000);
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" onload="mueveReloj()">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../config/menu.php"; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Contraparte</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroContraparte.php"> Operaciones Contraparte</a>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <div class="right-title">
                                <div class="d-flex mt-10 justify-content-end">
                                    <div class="d-lg-flex mr-20 ml-10 d-none">
                                        <div class="chart-text mr-10">
                                            <!--
								<h6 class="mb-0"><small>THIS MONTH</small></h6>
                                <h4 class="mt-0 text-primary">$12,125</h4>-->
                                        </div>
                                    </div>
                                    <div class="d-lg-flex mr-20 ml-10 d-none">
                                        <div class="chart-text mr-10">
                                            <!--
								<h6 class="mb-0"><small>LAST YEAR</small></h6>
                                <h4 class="mt-0 text-danger">$22,754</h4>-->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <!--  
                                    <h4 class="box-title">Sample form 1</h4>
                                -->
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" onsubmit="return validacion()">
                                        <div class="box-body">
                                            <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Registro
                                            </h4>
                                            <hr class="my-15">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Nombre Contraparte" id="NOMBRECONTRAPARTE" name="NOMBRECONTRAPARTE" value="<?php echo $NOMBRECONTRAPARTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Dirreccion </label>
                                                        <input type="text" class="form-control" placeholder="Dirreccion Contraparte" id="DIRECCIONCONTRAPARTE" name="DIRECCIONCONTRAPARTE" value="<?php echo $DIRECCIONCONTRAPARTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_direccion" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Telefono </label>
                                                        <input type="number" class="form-control" placeholder="Telefono Contraparte" id="TELEFONOCONTRAPARTE" name="TELEFONOCONTRAPARTE" value="<?php echo $TELEFONOCONTRAPARTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_telefono" class="validacion"> </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email </label>
                                                        <input type="text" class="form-control" placeholder="Email Contraparte" id="EMAILCONTRAPARTE" name="EMAILCONTRAPARTE" value="<?php echo $EMAILCONTRAPARTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-12">
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
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroContraparte.php'); ">
                                                <i class="ti-trash"></i> Cancelar
                                            </button>
                                            <?php if ($OP != "editar") { ?>
                                                <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED; ?>>
                                                    <i class="ti-save-alt"></i> Crear
                                                </button>
                                            <?php } else { ?>
                                                <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="EDITAR" value="EDITAR">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box -->
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Registros</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="listar" class="table table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="center">
                                                        <th>Numero </th>
                                                        <th>Nombre </th>
                                                        <th>Operaciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYCONTRAPARTE as $r) : ?>
                                                        <tr class="center">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['NUMERO_CONTRAPARTE']; ?>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $r['NOMBRE_CONTRAPARTE']; ?></td>
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown">
                                                                                <i class="glyphicon glyphicon-cog"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_CONTRAPARTE']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroContraparte" />
                                                                                <button type="submit" class="btn btn-rounded btn-outline-info btn-sm " id="VERURL" name="VERURL">
                                                                                    <i class="ti-eye"></i>
                                                                                </button>Ver
                                                                                <br>
                                                                                <button type="submit" class="btn btn-rounded btn-outline-warning btn-sm" id="EDITARURL" name="EDITARURL">
                                                                                    <i class="ti-pencil-alt"></i>
                                                                                </button>Editar
                                                                                <br>
                                                                                <?php if ($r['ESTADO_REGISTRO'] == 1) { ?>
                                                                                    <button type="submit" class="btn btn-rounded btn-outline-danger btn-sm" id="ELIMINARURL" name="ELIMINARURL">
                                                                                        <i class="ti-na "></i>
                                                                                    </button>Desahabilitar
                                                                                    <br>
                                                                                <?php } ?>
                                                                                <?php if ($r['ESTADO_REGISTRO'] == 0) { ?>
                                                                                    <button type="submit" class="btn btn-rounded btn-outline-success btn-sm" id="HABILITARURL" name="HABILITARURL">
                                                                                        <i class="ti-check "></i>
                                                                                    </button>Habilitar
                                                                                    <br>
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
                <?php include_once "../config/footer.php"; ?>
                <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>