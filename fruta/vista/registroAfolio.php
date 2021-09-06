<?php

include_once "../config/validarUsuario.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/USUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';

include_once '../controlador/AFOLIO_ADO.php';
include_once '../modelo/AFOLIO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$AFOLIO_ADO =  new AFOLIO_ADO();
//INIICIALIZAR MODELO
$AFOLIO =  new AFOLIO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";


$NUMEROFOLIO = "";
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
$ARRAYAFOLIO = "";
$ARRAYAFOLIOID = "";
$ARRAYVFOLIOVALIDAR2 = "";
$ARRAYVFOLIOVALIDAR1 = "";
$ARRAYAFOLIOID2 = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYAFOLIO = $AFOLIO_ADO->listarAfolioCBX();


//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {

    //CONSULTA PARA OBTENER SI EXISTEN REGISTROS ASOCIADOS AL VALOR INGRESADO
    $ARRAYVFOLIOVALIDAR1 = $AFOLIO_ADO->validar1($_REQUEST['NUMEROFOLIO']);
    //SI EL ARREGLO CONTIENE DATOS, NO SE REALIZA LA OPERACION DE REGISTRO
    if ($ARRAYVFOLIOVALIDAR1) {
        $MENSAJE = "EXISTE UN REGISTRO ASOCIADO, INTENTE CON OTRO VALOR";
        $BORDER2 = "style='border-color:#FF0000'";
        $FOCUS2 = "true";
        $SINO = "1";
        $NUMEROFOLIO = $_REQUEST['NUMEROFOLIO'];
    } else {
        $SINO = "0";
    }

    if ($SINO == "0") {


        //UTILIZACION METODOS SET DEL MODELO
        //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
        $AFOLIO->__SET('NUMERO_AFOLIO', $_REQUEST['NUMEROFOLIO']);
        //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
        $AFOLIO_ADO->agregarAfolio($AFOLIO);
        //REDIRECCIONAR A PAGINA registroAfolio.php
        echo "<script type='text/javascript'> location.href ='registroAfolio.php';</script>";
    }
}
//OPERACION DE EDICION DE FILA
if (isset($_REQUEST['EDITAR'])) {

    $ARRAYAFOLIOID2 = $AFOLIO_ADO->verAfolio($_REQUEST['parametro']);
    //CONSULTA PARA OBTENER SI EXISTEN REGISTROS ASOCIADOS AL VALOR INGRESADO
    $ARRAYVFOLIOVALIDAR2 = $AFOLIO_ADO->validar2($_REQUEST['NUMEROFOLIO'], $ARRAYAFOLIOID2[0]['NUMERO_AFOLIO']);
    $ARRAYVFOLIOVALIDAR1 = $AFOLIO_ADO->validar1($_REQUEST['NUMEROFOLIO']);


    //PRIMEOR PREGUNATA EL VALOR INGRESADO CON VALOR ANITGUO  DEVUELVE DATO
    // SI NO DEVUELVE, COMPRUEBA SI EL VALOR TIENE UN REGISTRO ASOCIADO
    //SI CONTIENE DATO NO EFECTUA LA OPERACION, MANTIENE DATOS, DEVUELVE MENSAJE DE ERROR
    if (empty($ARRAYVFOLIOVALIDAR2)) {
        if ($ARRAYVFOLIOVALIDAR1) {
            //SE ENVIA UN MENSAJE DE ERROR
            // SE MANTIENE LOS DATOS INGRESADOS
            //SE ENVIA UN MENSAJE DE ERROR
            // SE MANTIENE LOS DATOS INGRESADOS
            $MENSAJE = "EXISTE UN REGISTRO ASOCIADO, INTENTE CON OTRO VALOR";
            $BORDER2 = "style='border-color:#FF0000'";
            $FOCUS2 = "true";
            $SINO = "1";
            $NUMEROFOLIO = $_REQUEST['NUMEROFOLIO'];
        } else {
            $SINO = "0";
        }
    }


    //PRIMEOR PREGUNATA EL VALOR INGRESADO CON VALOR ANITGUO  DEVUELVE DATO
    // SI  CONTIENE DATOS ENVIA MENSAJE DE ERROR Y MANTIENE DATOS
    //PREGUNTA SI NO TIENE DATOS, SI NO TIENE REALIZA LA OPERACION
    //DE LO CONTRARIO ENVIA MENSAJE DE ERROR Y MANTIENE DATOS INGRESADO
    if (empty($ARRAYVFOLIOVALIDAR2)) {
        if (empty($ARRAYVFOLIOVALIDAR1)) {
            $SINO = "0";
        } else {
            //SE ENVIA UN MENSAJE DE ERROR
            // SE MANTIENE LOS DATOS INGRESADOS
            $MENSAJE = "EXISTE UN REGISTRO ASOCIADO, INTENTE CON OTRO VALOR";
            $BORDER2 = "style='border-color:#FF0000'";
            $FOCUS2 = "true";
            $SINO = "1";
            $NUMEROFOLIO = $_REQUEST['NUMEROFOLIO'];
        }
    }


    //PRIMEOR PREGUNATA EL VALOR INGRESADO CON VALOR ANITGUO  DEVUELVE DATO
    // SI NO DEVUELVE, COMPRUEBA SI EL VALOR TIENE UN REGISTRO ASOCIADO
    //SI CONTIENE DATO REALIZA LA OPERACION
    if ($ARRAYVFOLIOVALIDAR2) {
        if ($ARRAYVFOLIOVALIDAR1) {
            $SINO = "0";
        } else {

            //SE ENVIA UN MENSAJE DE ERROR
            // SE MANTIENE LOS DATOS INGRESADOS
            $MENSAJE = "EXISTE UN REGISTRO ASOCIADO, INTENTE CON OTRO VALOR";
            $BORDER2 = "style='border-color:#FF0000'";
            $FOCUS2 = "true";
            $SINO = "1";
        }
    }





    if ($SINO == "0") {
        //UTILIZACION METODOS SET DEL MODELO
        //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
        $AFOLIO->__SET('NUMERO_AFOLIO', $_REQUEST['NUMEROFOLIO']);
        $AFOLIO->__SET('ID_AFOLIO', $_REQUEST['parametro']);
        //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
        $AFOLIO_ADO->actualizarAfolio($AFOLIO);
        //REDIRECCIONAR A PAGINA registroAfolio.php
        echo "<script type='text/javascript'> location.href ='registroAfolio.php';</script>";
    }
}

//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION Y VISUALIZACION
//PREGUNTA SI LA URL VIENE  CON DATOS "parametro" y "parametro1"
if (isset($_REQUEST['parametro']) && isset($_REQUEST['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_REQUEST['parametro'];
    $OP = $_REQUEST['parametro1'];


    //IDENTIFICACIONES DE OPERACIONES
    //OPERACION DE CAMBIO DE ESTADO
    //0 = DESACTIVAR
    if ($OP == "0") {

        $AFOLIO->__SET('ID_AFOLIO', $IDOP);
        $AFOLIO_ADO->deshabilitar($AFOLIO);

        echo "<script type='text/javascript'> location.href ='registroAfolio.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $AFOLIO->__SET('ID_AFOLIO', $IDOP);
        $AFOLIO_ADO->habilitar($AFOLIO);
        echo "<script type='text/javascript'> location.href ='registroAfolio.php';</script>";
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYAFOLIOID = $AFOLIO_ADO->verAfolio($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYAFOLIOID as $r) :
            $NUMEROFOLIO = "" . $r['NUMERO_AFOLIO'];
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
        $ARRAYAFOLIOID = $AFOLIO_ADO->verAfolio($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYAFOLIOID as $r) :
            $NUMEROFOLIO = "" . $r['NUMERO_AFOLIO'];
        endforeach;
    }
}




?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Auto Folio</title>
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

                    NUMEROFOLIO = document.getElementById("NUMEROFOLIO").value;
                    document.getElementById('val_numeroaf').innerHTML = "";

                    if (NUMEROFOLIO == null || NUMEROFOLIO == 0) {
                        document.form_reg_dato.NUMEROFOLIO.focus();
                        document.form_reg_dato.NUMEROFOLIO.style.borderColor = "#FF0000";
                        document.getElementById('val_numeroaf').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NUMEROFOLIO.style.borderColor = "#4AF575";


                    if (NUMEROFOLIO.length < 5 || NUMEROFOLIO.length > 5) {
                        document.form_reg_dato.NUMEROFOLIO.focus();
                        document.form_reg_dato.NUMEROFOLIO.style.borderColor = "#FF0000";
                        document.getElementById('val_numeroaf').innerHTML = "DEBE CONTENER SOLO 5 DIJITOS";
                        return false;
                    }
                    document.form_reg_dato.NUMEROFOLIO.style.borderColor = "#4AF575";





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
                                <h3 class="page-title">Auto Folio</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item active" aria-current="page"> Auto Folio</li>
                                            <li class="breadcrumb-item" aria-current="page"> <a href="registroAfolio.php">Operaciones Auto Folio </a> </li>
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
                                                <label>Numero </label>
                                                <input type="number" class="form-control" placeholder="Numero Auto Folio" id="NUMEROFOLIO" name="NUMEROFOLIO" value="<?php echo $NUMEROFOLIO; ?>" <?php echo $FOCUS2; ?> <?php echo  $BORDER2; ?> <?php echo $DISABLED; ?> />
                                                <label id="val_numeroaf" class="validacion"> <?php echo $MENSAJE; ?> </label>
                                            </div>

                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">

                                            <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroAfolio.php'); ">
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
                                                        <th>Numero </th>
                                                        <th>Operaciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYAFOLIO as $r) : ?>
                                                        <tr class="center">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['ID_AFOLIO']; ?>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $r['NUMERO_AFOLIO']; ?></td>

                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-cog"></i></a>
                                                                            <div class="dropdown-menu dropdown-menu-right">

                                                                                <?php if ($r['ESTADO_REGISTRO'] == 1) { ?>
                                                                                    <button type="button" class="btn btn-rounded btn-sm  btn-danger btn-outline mr-1" id="defecto" name="desactivar" Onclick="irPagina('registroAfolio.php?parametro=<?php echo $r['ID_AFOLIO']; ?>&&parametro1=0'); ">
                                                                                        <i class="ti-na "></i>
                                                                                    </button>Desahabilitar
                                                                                <?php } ?>
                                                                                <?php if ($r['ESTADO_REGISTRO'] == 0) { ?>
                                                                                    <button type="button" class="btn btn-rounded btn-sm  btn-success btn-outline mr-1" id="defecto" name="activar" Onclick="irPagina('registroAfolio.php?parametro=<?php echo $r['ID_AFOLIO']; ?>&&parametro1=1'); ">
                                                                                        <i class="ti-check "></i>
                                                                                    </button>Habilitar
                                                                                <?php } ?>
                                                                                <div class="dropdown-divider"></div>
                                                                                <button type="button" class="btn btn-rounded btn-sm btn-warning btn-outline mr-1" id="defecto" name="editar" Onclick="irPagina('registroAfolio.php?parametro=<?php echo $r['ID_AFOLIO']; ?>&&parametro1=editar'); ">
                                                                                    <i class="ti-pencil-alt"></i>
                                                                                </button>Editar
                                                                                <br>
                                                                                <button type="button" class="btn btn-rounded btn-sm btn-info btn-outline mr-1" id="defecto" name="ver" Onclick="irPagina('registroAfolio.php?parametro=<?php echo $r['ID_AFOLIO']; ?>&&parametro1=ver'); ">
                                                                                    <i class="ti-eye"></i>
                                                                                </button>Ver
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