<?php


include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/BODEGA_ADO.php';
include_once '../controlador/CIUDAD_ADO.php';
include_once '../modelo/BODEGA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$BODEGA_ADO =  new BODEGA_ADO();
$CIUDAD_ADO =  new CIUDAD_ADO();

//INIICIALIZAR MODELO
$BODEGA =  new BODEGA();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$IDOP = "";
$OP = "";
$DISABLED = "";
$PRINCIPAL = "";

$NOMBREBODEGA = "";
$NOMBRECONTACTO = "";
$PLANTA = "";
$FNOMBRE = "";
$NOMBREPLANTA = "";
$ESTADO = "";



$NOMBRE = "";
$MENSAJE = "";
$FOCUS = "";
$MENSAJE2 = "";
$FOCUS2 = "";
$BORDER = "";

//INICIALIZAR ARREGLOS
$ARRAYBODEGA = "";
$ARRAYVALIDARBODEGA = "";
$ARRAYBODEGAID = "";
$ARRAYPLANTA = "";
$ARRAYPLANTA2 = "";
$ARRAYEMPRESA = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYBODEGA = $BODEGA_ADO->listarBodegaPorEmpresaCBX($EMPRESAS);
$ARRAYPLANTA = $PLANTA_ADO->listarPlantaCBX();
$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrl.php";



//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {

    $ARRAYVALIDARBODEGA = $BODEGA_ADO->listarBodegaPorEmpresaPlantaPrincipalCBX($_REQUEST['EMPRESA'], $_REQUEST['PLANTA']);
    if ($ARRAYVALIDARBODEGA) {
        $SINO = 1;
        $MENSAJE = "YA EXISTE UNA BODEGA PRINCIPAL EN LA PLANTA SELECIONADA";
    } else {
        $SINO = 0;
        $MENSAJE = "";
    }
    if ($SINO == 0) {
        //UTILIZACION METODOS SET DEL MODELO
        //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
        $BODEGA->__SET('NOMBRE_BODEGA', $_REQUEST['NOMBREBODEGA']);
        $BODEGA->__SET('NOMBRE_CONTACTO_BODEGA', $_REQUEST['NOMBRECONTACTO']);
        $BODEGA->__SET('PRINCIPAL', $_REQUEST['PRINCIPAL']);
        $BODEGA->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $BODEGA->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $BODEGA->__SET('ID_USUARIOI', $IDUSUARIOS);
        $BODEGA->__SET('ID_USUARIOM', $IDUSUARIOS);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $BODEGA_ADO->agregarBodega($BODEGA);
        //REDIRECCIONAR A PAGINA registroBodega.php
        echo "<script type='text/javascript'> location.href ='registroBodega.php';</script>";
    }
}

//OPERACION DE EDICION DE FILA
if (isset($_REQUEST['EDITAR'])) {

    if ($_REQUEST['PRINCIPAL'] == 1) {
        $ARRAYVALIDARBODEGA = $BODEGA_ADO->listarBodegaPorEmpresaPlantaPrincipalDistinoActualCBX($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['ID']);
        if ($ARRAYVALIDARBODEGA) {
            $SINO = 1;
            $MENSAJE = "YA EXISTE UNA BODEGA PRINCIPAL EN LA PLANTA SELECIONADA";
        } else {
            $SINO = 0;
            $MENSAJE = "";
        }
    } else {
        $SINO = 0;
        $MENSAJE = "";
    }


    if ($SINO == 0) {
        //UTILIZACION METODOS SET DEL MODELO
        //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
        $BODEGA->__SET('NOMBRE_BODEGA', $_REQUEST['NOMBREBODEGA']);
        $BODEGA->__SET('NOMBRE_CONTACTO_BODEGA', $_REQUEST['NOMBRECONTACTO']);
        $BODEGA->__SET('PRINCIPAL', $_REQUEST['PRINCIPAL']);
        $BODEGA->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $BODEGA->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $BODEGA->__SET('ID_USUARIOM', $IDUSUARIOS);
        $BODEGA->__SET('ID_BODEGA', $_REQUEST['ID']);
        //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
        $BODEGA_ADO->actualizarBodega($BODEGA);
        //REDIRECCIONAR A PAGINA registroBodega.php
        echo "<script type='text/javascript'> location.href ='registroBodega.php';</script>";
    }
}

//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION Y VISUALIZACION
//PREGUNTA SI LA URL VIENE  CON DATOS "parametro" y "parametro1"
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['parametro'];
    $OP = $_SESSION['parametro1'];

    //IDENTIFICACIONES DE OPERACIONES
    //OPERACION DE CAMBIO DE ESTADO
    //0 = DESACTIVAR
    if ($OP == "0") {

        $BODEGA->__SET('ID_BODEGA', $IDOP);
        $BODEGA_ADO->deshabilitar($BODEGA);

        echo "<script type='text/javascript'> location.href ='registroBodega.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $BODEGA->__SET('ID_BODEGA', $IDOP);
        $BODEGA_ADO->habilitar($BODEGA);
        echo "<script type='text/javascript'> location.href ='registroBodega.php';</script>";
    }
    //IDENTIFICACIONES DE OPERACIONES
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYBODEGAID = $BODEGA_ADO->verBodega($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYBODEGAID as $r) :
            $NOMBREBODEGA = "" . $r['NOMBRE_BODEGA'];
            $NOMBRECONTACTO = "" . $r['NOMBRE_CONTACTO_BODEGA'];
            $PRINCIPAL = "" . $r['PRINCIPAL'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $ESTADO = "" . $r['ESTADO_REGISTRO'];
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
        $ARRAYBODEGAID = $BODEGA_ADO->verBodega($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYBODEGAID as $r) :
            $NOMBREBODEGA = "" . $r['NOMBRE_BODEGA'];
            $NOMBRECONTACTO = "" . $r['NOMBRE_CONTACTO_BODEGA'];
            $PRINCIPAL = "" . $r['PRINCIPAL'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $ESTADO = "" . $r['ESTADO_REGISTRO'];
        endforeach;
    }
}




?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Bodega</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../config/urlHead.php"; ?>
        <script type="text/javascript">
            //VALIDACION DE FORMULARIO
            function validacion() {

                NOMBREBODEGA = document.getElementById("NOMBREBODEGA").value;
                NOMBRECONTACTO = document.getElementById("NOMBRECONTACTO").value;
                PLANTA = document.getElementById("PLANTA").selectedIndex;
                PRINCIPAL = document.getElementById("PRINCIPAL").selectedIndex;



                document.getElementById('val_nombre').innerHTML = "";
                document.getElementById('val_nombrec').innerHTML = "";
                document.getElementById('val_planta').innerHTML = "";
                document.getElementById('val_bprincipal').innerHTML = "";


                if (NOMBREBODEGA == null || NOMBREBODEGA.length == 0 || /^\s+$/.test(NOMBREBODEGA)) {
                    document.form_reg_dato.NOMBREBODEGA.focus();
                    document.form_reg_dato.NOMBREBODEGA.style.borderColor = "#FF0000";
                    document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.NOMBREBODEGA.style.borderColor = "#4AF575";



                if (NOMBRECONTACTO == null || NOMBRECONTACTO.length == 0 || /^\s+$/.test(NOMBRECONTACTO)) {
                    document.form_reg_dato.NOMBRECONTACTO.focus();
                    document.form_reg_dato.NOMBRECONTACTO.style.borderColor = "#FF0000";
                    document.getElementById('val_nombrec').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.NOMBRECONTACTO.style.borderColor = "#4AF575";

                if (PLANTA == null || PLANTA == 0) {
                    document.form_reg_dato.PLANTA.focus();
                    document.form_reg_dato.PLANTA.style.borderColor = "#FF0000";
                    document.getElementById('val_planta').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                    return false;
                }
                document.form_reg_dato.PLANTA.style.borderColor = "#4AF575";

                if (PRINCIPAL == null || PRINCIPAL == 0) {
                    document.form_reg_dato.PRINCIPAL.focus();
                    document.form_reg_dato.PRINCIPAL.style.borderColor = "#FF0000";
                    document.getElementById('val_bprincipal').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                    return false;
                }
                document.form_reg_dato.PRINCIPAL.style.borderColor = "#4AF575";
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
            <?php include_once "../config/menu.php";
            ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Bodega</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Principal</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroBodega.php"> Operaciónes Bodega </a>
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
                                            <div class="form-group">
                                                <label>Nombre </label>
                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="text" class="form-control" placeholder="Nombre Bodega" id="NOMBREBODEGA" name="NOMBREBODEGA" value="<?php echo $NOMBREBODEGA; ?>" <?php echo $DISABLED; ?> />
                                                <label id="val_nombre" class="validacion"> </label>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Nombre Contacto </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto Bodega" id="NOMBRECONTACTO" name="NOMBRECONTACTO" value="<?php echo $NOMBRECONTACTO; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombrec" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Planta</label>
                                                        <select class="form-control select2" id="PLANTA" name="PLANTA" style="width: 100%;" value="<?php echo $PLANTA; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYPLANTA as $r) : ?>
                                                                <?php if ($ARRAYPLANTA) {    ?>
                                                                    <option value="<?php echo $r['ID_PLANTA']; ?>" <?php if ($PLANTA == $r['ID_PLANTA']) {
                                                                                                                        echo "selected";
                                                                                                                    } ?>>
                                                                        <?php echo $r['NOMBRE_PLANTA'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_planta" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Bodega Principal</label>
                                                        <select class="form-control select2" id="PRINCIPAL" name="PRINCIPAL" style="width: 100%;" value="<?php echo $PRINCIPAL; ?>" <?php echo $DISABLED; ?>>
                                                            <option> </option>
                                                            <option value="0" <?php if ($PRINCIPAL == "0") {
                                                                                    echo "selected";
                                                                                } ?>> No</option>
                                                            <option value="1" <?php if ($PRINCIPAL == "1") {
                                                                                    echo "selected";
                                                                                } ?>> Si</option>
                                                        </select>
                                                        <label id="val_bprincipal" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label id="val_mensaje" class="validacion"> <?php echo $MENSAJE; ?> </label>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroBodega.php'); ">
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
                                                        <th>Id </th>
                                                        <th>Nombre </th>
                                                        <th class="text-center">Operaciónes</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYBODEGA as $r) : ?>
                                                        <tr class="center">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['ID_BODEGA']; ?>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $r['NOMBRE_BODEGA']; ?></td>
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown">
                                                                                <i class="glyphicon glyphicon-cog"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_BODEGA']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroBodega" />
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