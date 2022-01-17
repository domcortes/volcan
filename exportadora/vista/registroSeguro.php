<?php

include_once "../../assest/config/validarUsuarioExpo.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/SEGURO_ADO.php';
include_once '../../assest/modelo/SEGURO.php';

//INCIALIZAR LAS VARIBLES

//INICIALIZAR CONTROLADOR


$SEGURO_ADO =  new SEGURO_ADO();
//INIICIALIZAR MODELO
$SEGURO =  new SEGURO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NOMBRESEGURO = "";
$ESTIMADOSEGURO = "";
$REALSEGURO = "";
$SUMASEGURO = "";
$SUMA = "";


$IDOP = "";
$OP = "";
$DISABLED = "";


//INICIALIZAR ARREGLOS
$ARRAYSEGURO = "";
$ARRAYSEGUROID = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYSEGURO = $SEGURO_ADO->listarSeguroPorEmpressCBX($EMPRESAS);
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrl.php";





//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION Y VISUALIZACION
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['parametro'];
    $OP = $_SESSION['parametro1'];

    //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
    //ALMACENAR INFORMACION EN ARREGLO
    //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
    //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
    $ARRAYSEGUROID = $SEGURO_ADO->verSeguro($IDOP);

    //IDENTIFICACIONES DE OPERACIONES    //OPERACION DE CAMBIO DE ESTADO
    //0 = DESACTIVAR
    if ($OP == "0") {

        $SEGURO->__SET('ID_SEGURO', $IDOP);
        $SEGURO_ADO->deshabilitar($SEGURO);

        echo "<script type='text/javascript'> location.href ='registroSeguro.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $SEGURO->__SET('ID_SEGURO', $IDOP);
        $SEGURO_ADO->habilitar($SEGURO);
        echo "<script type='text/javascript'> location.href ='registroSeguro.php';</script>";
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYSEGUROID as $r) :
            $NOMBRESEGURO = "" . $r['NOMBRE_SEGURO'];
            $ESTIMADOSEGURO = "" . $r['ESTIMADO_SEGURO'];
            $REALSEGURO = "" . $r['REAL_SEGURO'];
            $SUMASEGURO = "" . $r['SUMA_SEGURO'];
        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZAAR INFORMAICON DE REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYSEGUROID as $r) :
            $NOMBRESEGURO = "" . $r['NOMBRE_SEGURO'];
            $ESTIMADOSEGURO = "" . $r['ESTIMADO_SEGURO'];
            $REALSEGURO = "" . $r['REAL_SEGURO'];
            $SUMASEGURO = "" . $r['SUMA_SEGURO'];
        endforeach;
    }
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Seguro</title>
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



                    NOMBRESEGURO = document.getElementById("NOMBRESEGURO").value;
                    ESTIMADOSEGURO = document.getElementById("ESTIMADOSEGURO").value;
                    REALSEGURO = document.getElementById("REALSEGURO").value;

                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_estimado').innerHTML = "";
                    document.getElementById('val_real').innerHTML = "";

                    if (NOMBRESEGURO == null || NOMBRESEGURO.length == 0 || /^\s+$/.test(NOMBRESEGURO)) {
                        document.form_reg_dato.NOMBRESEGURO.focus();
                        document.form_reg_dato.NOMBRESEGURO.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRESEGURO.style.borderColor = "#4AF575";

                    if (ESTIMADOSEGURO == null || ESTIMADOSEGURO.length == 0 || /^\s+$/.test(ESTIMADOSEGURO)) {
                        document.form_reg_dato.ESTIMADOSEGURO.focus();
                        document.form_reg_dato.ESTIMADOSEGURO.style.borderColor = "#FF0000";
                        document.getElementById('val_estimado').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.ESTIMADOSEGURO.style.borderColor = "#4AF575";

                    if (REALSEGURO == null || REALSEGURO.length == 0 || /^\s+$/.test(REALSEGURO)) {
                        document.form_reg_dato.REALSEGURO.focus();
                        document.form_reg_dato.REALSEGURO.style.borderColor = "#FF0000";
                        document.getElementById('val_real').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.REALSEGURO.style.borderColor = "#4AF575";



                }
                function seguro(){
                    var repuesta;                    
                    var totalseguro;

                    ESTIMADOSEGURO = document.getElementById("ESTIMADOSEGURO").value;
                    REALSEGURO = document.getElementById("REALSEGURO").value;

                    document.getElementById('val_estimado').innerHTML = "";
                    document.getElementById('val_real').innerHTML = "";

                    if (ESTIMADOSEGURO == null || ESTIMADOSEGURO.length == 0 || /^\s+$/.test(ESTIMADOSEGURO)) {
                        document.form_reg_dato.ESTIMADOSEGURO.focus();
                        document.form_reg_dato.ESTIMADOSEGURO.style.borderColor = "#FF0000";
                        document.getElementById('val_estimado').innerHTML = "NO A INGRESADO DATO";
                        repuesta = 1;
                    }else{
                        repuesta = 0;
                        document.form_reg_dato.ESTIMADOSEGURO.style.borderColor = "#4AF575";
                    }

                    if (REALSEGURO == null || REALSEGURO.length == 0 || /^\s+$/.test(REALSEGURO)) {
                        document.form_reg_dato.REALSEGURO.focus();
                        document.form_reg_dato.REALSEGURO.style.borderColor = "#FF0000";
                        document.getElementById('val_real').innerHTML = "NO A INGRESADO DATO";
                        return falserepuesta = 1;;
                    }else{                        
                        repuesta = 0;
                        document.form_reg_dato.REALSEGURO.style.borderColor = "#4AF575";
                    }

                  

                    
                    if (repuesta == 0) {                        
                        ESTIMADOSEGURO =parseInt( document.getElementById("ESTIMADOSEGURO").value);
                        REALSEGURO = parseFloat( document.getElementById("REALSEGURO").value);

                        totalseguro=ESTIMADOSEGURO+REALSEGURO;
                        totalseguro = totalseguro.toFixed(2);
                    }
                    document.getElementById('SUMASEGURO').value = totalseguro;
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
                                <h3 class="page-title">Instructivo</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Instructivo</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Seguro</a>
                                            </li>
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
                                        <h4 class="box-title">Registro Seguro</h4>                                
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" name="form_reg_dato" enctype="multipart/form-data">
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Nombre Seguro" id="NOMBRESEGURO" name="NOMBRESEGURO" value="<?php echo $NOMBRESEGURO; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <label>Estimado </label>
                                                    <input type="number" class="form-control" placeholder="Estimado Seguro" id="ESTIMADOSEGURO" name="ESTIMADOSEGURO"  onchange="seguro()" value="<?php echo $ESTIMADOSEGURO; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_estimado" class="validacion"> </label>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <label>Real </label>
                                                    <input type="number" class="form-control" placeholder="Real Seguro" id="REALSEGURO" name="REALSEGURO" onchange="seguro();" value="<?php echo $REALSEGURO; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_real" class="validacion"> </label>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <label>Total </label>
                                                    <input type="number" class="form-control" placeholder="Total Seguro" id="SUMASEGURO" name="SUMASEGURO" value="<?php echo $SUMASEGURO; ?>" <?php echo $DISABLED; ?> disabled />
                                                    <label id="val_suma" class="validacion"> </label>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroSeguro.php');">
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
                                        <h4 class="box-title"> Agrupado Seguro</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive" style="width: 100%;">
                                            <table id="listar" class="table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="center">
                                                        <th>Numero </th>
                                                        <th>Nombre </th>
                                                        <th>Operaciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYSEGURO as $r) : ?>
                                                        <tr class="center">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['NUMERO_SEGURO']; ?>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $r['NOMBRE_SEGURO']; ?></td>                                                   
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <span class="icon-copy ti-settings"></span>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_SEGURO']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroSeguro" />
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
                                                                                    <span href="#" class="dropdown-item" data-toggle="tooltip" title="Desahabilitar">
                                                                                        <button type="submit" class="btn btn-block btn-danger btn-sm" id="ELIMINARURL" name="ELIMINARURL">
                                                                                            <i class="ti-na "></i> Desahabilitar
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

                    $ARRAYNUMERO = $SEGURO_ADO->obtenerNumero($EMPRESAS);
                    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;

                    $SUMA = $_REQUEST['ESTIMADOSEGURO'] + $_REQUEST['REALSEGURO'];
                    //UTILIZACION METODOS SET DEL MODELO
                    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                    $SEGURO->__SET('NUMERO_SEGURO', $NUMERO);
                    $SEGURO->__SET('NOMBRE_SEGURO', $_REQUEST['NOMBRESEGURO']);
                    $SEGURO->__SET('ESTIMADO_SEGURO', $_REQUEST['ESTIMADOSEGURO']);
                    $SEGURO->__SET('REAL_SEGURO', $_REQUEST['REALSEGURO']);
                    $SEGURO->__SET('SUMA_SEGURO', $SUMA);
                    $SEGURO->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                    $SEGURO->__SET('ID_USUARIOI', $IDUSUARIOS);
                    $SEGURO->__SET('ID_USUARIOM', $IDUSUARIOS);
                    //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                    $SEGURO_ADO->agregarSeguro($SEGURO);
                    //REDIRECCIONAR A PAGINA registroTfruta.php
                                    echo '<script>
                                    Swal.fire({
                                        icon:"success",
                                        title:"Registro Creado",
                                        text:"El registro del mantenedor se ha creado correctamente",
                                        showConfirmButton: true,
                                        confirmButtonText:"Cerrar",
                                        closeOnConfirm:false
                                    }).then((result)=>{
                                        location.href = "registroSeguro.php";                            
                                    })
                                </script>';
                }
                //OPERACION EDICION DE FILA
                if (isset($_REQUEST['EDITAR'])) {
                    $SUMA = $_REQUEST['ESTIMADOSEGURO'] + $_REQUEST['REALSEGURO'];
                    //UTILIZACION METODOS SET DEL MODELO
                    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO  
                    $SEGURO->__SET('NOMBRE_SEGURO', $_REQUEST['NOMBRESEGURO']);
                    $SEGURO->__SET('ESTIMADO_SEGURO', $_REQUEST['ESTIMADOSEGURO']);
                    $SEGURO->__SET('REAL_SEGURO', $_REQUEST['REALSEGURO']);
                    $SEGURO->__SET('SUMA_SEGURO', $SUMA);
                    $SEGURO->__SET('ID_USUARIOM', $IDUSUARIOS);
                    $SEGURO->__SET('ID_SEGURO', $_REQUEST['ID']);
                    //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                    $SEGURO_ADO->actualizarSeguro($SEGURO);
                    //REDIRECCIONAR A PAGINA registroTfruta.php
                                echo '<script>
                                Swal.fire({
                                    icon:"success",
                                    title:"Registro Modificado",
                                    text:"El registro del mantenedor se ha Modificado correctamente",
                                    showConfirmButton: true,
                                    confirmButtonText:"Cerrar",
                                    closeOnConfirm:false
                                }).then((result)=>{
                                    location.href = "registroSeguro.php";                            
                                })
                            </script>';
                }
        ?>
</body>

</html>