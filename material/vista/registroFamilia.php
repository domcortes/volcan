<?php


include_once "../config/validarUsuario.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/FAMILIA_ADO.php';


include_once '../modelo/FAMILIA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$FAMILIA_ADO =  new FAMILIA_ADO();

//INIICIALIZAR MODELO

$FAMILIAS =  new FAMILIA();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$NOMBREFAMILIA = "";
$CATEGORIA = "";
$EMPRESA = "";
$NUMERO="";



$FOCUS = "";
$BORDER = "";
$DISABLED = "";
$OP = "";

//INICIALIZAR ARREGLOS
$ARRAYFAMILIAID = "";
$ARRAYFAMILIAS = "";
$ARRAYEMPRESA = "";
$ARRAYCATEGORIA = "";
$ARRAYNUMERO = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYFAMILIAS = $FAMILIA_ADO->listarFamiliaPorEmpresaCBX($EMPRESAS);
$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrl.php";


//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {

    $ARRAYNUMERO = $FAMILIA_ADO->obtenerNumero($_REQUEST['EMPRESA']);
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;

    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $FAMILIAS->__SET('NUMERO_FAMILIA', $NUMERO);
    $FAMILIAS->__SET('NOMBRE_FAMILIA', $_REQUEST['NOMBREFAMILIA']);
    $FAMILIAS->__SET('ID_USUARIOI', $IDUSUARIOS);
    $FAMILIAS->__SET('ID_USUARIOM', $IDUSUARIOS);
    $FAMILIAS->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $FAMILIA_ADO->agregarFamilia($FAMILIAS);
    //REDIRECCIONAR A PAGINA registroEcomercial.php
    echo "<script type='text/javascript'> location.href ='registroFamilia.php';</script>";
}
//OPERACION DE EDICION DE FILA
if (isset($_REQUEST['EDITAR'])) {
    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO 


    $FAMILIAS->__SET('NOMBRE_FAMILIA', $_REQUEST['NOMBREFAMILIA']);
    $FAMILIAS->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $FAMILIAS->__SET('ID_USUARIOM', $IDUSUARIOS);
    $FAMILIAS->__SET('ID_FAMILIA', $_REQUEST['ID']);
    //LLAMADA AL METODO DE EDICION DEL CONTROLADOR   
    $FAMILIA_ADO->actualizarFamilia($FAMILIAS);
    //REDIRECCIONAR A PAGINA registroEcomercial.php
    echo "<script type='text/javascript'> location.href ='registroFamilia.php';</script>";
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

        $FAMILIAS->__SET('ID_FAMILIA', $IDOP);
        $FAMILIA_ADO->deshabilitar($FAMILIAS);

        echo "<script type='text/javascript'> location.href ='registroFamilia.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $FAMILIAS->__SET('ID_FAMILIA', $IDOP);
        $FAMILIA_ADO->habilitar($FAMILIAS);

        echo "<script type='text/javascript'> location.href ='registroFamilia.php';</script>";
    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYFAMILIAID = $FAMILIA_ADO->verFamilia($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA        
        foreach ($ARRAYFAMILIAID as $r) :
            $NOMBREFAMILIA = "" . $r['NOMBRE_FAMILIA'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
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
        $ARRAYFAMILIAID = $FAMILIA_ADO->verFamilia($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYFAMILIAID as $r) :
            $NOMBREFAMILIA = "" . $r['NOMBRE_FAMILIA'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
        endforeach;
    }
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Tipo Familia</title>
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

                    NOMBREFAMILIA = document.getElementById("NOMBREFAMILIA").value;


                    document.getElementById('val_nombre').innerHTML = "";


                    if (NOMBREFAMILIA == null || NOMBREFAMILIA.length == 0 || /^\s+$/.test(NOMBREFAMILIA)) {
                        document.form_reg_dato.NOMBREFAMILIA.focus();
                        document.form_reg_dato.NOMBREFAMILIA.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREFAMILIA.style.borderColor = "#4AF575";



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

            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Tipo Familia</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Producto </li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroFamilia.php"> Operaciónes Tipo Familia </a>
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
                                                <input type="text" class="form-control" placeholder=" Nombre  Familia" id="NOMBREFAMILIA" name="NOMBREFAMILIA" value="<?php echo $NOMBREFAMILIA; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> />
                                                <label id="val_nombre" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroFamilia.php'); ">
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
                                                        <th>Número</th>
                                                        <th>Nombre</th>
                                                        <th class="text-center">Operaciónes</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYFAMILIAS as $r) : ?>
                                                        <tr class="center">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['NUMERO_FAMILIA']; ?>
                                                                </a>
                                                            </td>
                                                            <td> <?php echo $r['NOMBRE_FAMILIA']; ?></td>
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown">
                                                                                <i class="glyphicon glyphicon-cog"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_FAMILIA']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroFamilia" />
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


            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../config/footer.php"; ?>
                <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>