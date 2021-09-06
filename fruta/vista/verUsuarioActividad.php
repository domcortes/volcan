<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES¿
include_once '../controlador/AUSUARIO_ADO.php';

//INICIALIZAR CONTROLADOR

$AUSUARIO_ADO =  new AUSUARIO_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD



$MENSAJE = "";
$FOCUS = "";
$BORDER = "";

$IDOP = "";
$OP = "";
$DISABLED = "";

//INICIALIZAR ARREGLOS
$ARRAYYVERAUSUARIOID = "";
$ARRAYYVERAUSUARIOIDMAX5 = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

if (isset($NOMBREUSUARIOS)) {
    $ARRAYYVERAUSUARIOID = $AUSUARIO_ADO->buscarAusuarioPorNombreUsuario($IDUSUARIOS);
    $ARRAYYVERAUSUARIOIDMAX5 = $AUSUARIO_ADO->buscarAusuarioPorNombreUsuarioUltimasCinco($IDUSUARIOS);
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Mi Actividad</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
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
                                <h3 class="page-title">Mi Actividad</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Perfil</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="verUsuario.php">Mi Actividad </a>
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
                            <div class="col-xl-4 col-lg-5">

                                <!-- Profile Image -->
                                <div class="box">
                                    <div class="box-body box-profile">
                                        <!--
                                            <img class="rounded img-fluid mx-auto d-block max-w-150" src="#" alt="User profile picture">
                                        -->
                                        <h3 class="profile-username text-center mb-0"> <?php echo $NOMBREUSUARIOS; ?> </h3>
                                        <h4 class="text-center mt-0">
                                            <i class="fa fa-envelope-o mr-10"></i>
                                            <?php
                                            $ARRAYTUSUARIO = $TUSUARIO_ADO->verTusuario($_SESSION["TIPO_USUARIO"]);

                                            if ($ARRAYTUSUARIO) {
                                                echo $ARRAYTUSUARIO[0]['NOMBRE_TUSUARIO'];
                                            } 

                                            ?>
                                        </h4>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="media-list media-list-hover media-list-divided w-p100 mt-30">
                                                    <h4 class="media media-single p-15">
                                                        <i class="fa fa-arrow-circle-o-right mr-10"></i>
                                                        <span class="title">
                                                            <a href="verUsuario.php">
                                                                Mi Perfil
                                                            </a>
                                                        </span>
                                                    </h4>
                                                        <h4 class="media media-single p-15">
                                                            <i class="fa fa-arrow-circle-o-right mr-10"></i>
                                                            <span class="title">
                                                                <a href="editarUsuario.php">
                                                                    Editar Perfil
                                                                </a>
                                                            </span>
                                                        </h4>
                                                        <h4 class="media media-single p-15">
                                                            <i class="fa fa-arrow-circle-o-right mr-10"></i>
                                                            <span class="title">
                                                                <a href="editarUsuarioClave.php">
                                                                    Cambiar Contrasena
                                                                </a>
                                                            </span>
                                                        </h4>
                                                    <h4 class="media media-single p-15">
                                                        <i class="fa fa-arrow-circle-o-right mr-10"></i>
                                                        <span class="title">
                                                            <a href="verUsuarioActividad.php">
                                                                Mi Actividad
                                                            </a>
                                                        </span>
                                                    </h4>
                                                </div>
                                            </div>

                                            <h3 class="title w-p100 mt-10 mb-0 p-20">ULTIMAS 5 OPERACIONES</h3>
                                            <div class="col-12">
                                                <div class="media-list media-list-hover w-p100 mt-0">
                                                    <?php foreach ($ARRAYYVERAUSUARIOIDMAX5 as $r) : ?>
                                                        <h5 class="media media-single py-10 px-0 w-p100 justify-content-between">
                                                            <p>
                                                                <i class="fa fa-circle text-success pr-10 font-size-12"></i> <?php echo $r['TABLA_OBJETIVO_AUSUARIO']; ?>
                                                                <span class="subtitle pl-20 mt-10"> ID
                                                                    <span class="text-success">
                                                                        <?php echo $r['ID_AUSUARIO']; ?>
                                                                    </span>
                                                                </span>
                                                            </p>
                                                            <p class="text-right pull-right">

                                                                <?php if ($r['TIPO_OPERACION_AUSUARIO'] == "1") { ?>
                                                                    <span class="badge badge-sm badge-success mb-10">
                                                                        <?php echo "REGISTRO"; ?>
                                                                    </span>
                                                                <?php     } ?>

                                                                <?php if ($r['TIPO_OPERACION_AUSUARIO'] == "2") { ?>
                                                                    <span class="badge badge-sm badge-Warning  mb-10">
                                                                        <?php echo "MODIFICACION"; ?>
                                                                    </span>
                                                                <?php     } ?>

                                                                <?php if ($r['TIPO_OPERACION_AUSUARIO'] == "3") { ?>
                                                                    <span class="badge badge-sm badge-Danger   mb-10">
                                                                        <?php echo "DESACTIVAR"; ?>
                                                                    </span>
                                                                <?php     } ?>

                                                                <?php if ($r['TIPO_OPERACION_AUSUARIO'] == "4") { ?>
                                                                    <span class="badge badge-sm badge-primary    mb-10">
                                                                        <?php echo "ACTIVAR"; ?>
                                                                    </span>
                                                                <?php     } ?>
                                                                <br>
                                                                <?php echo $r['FECHA_AUSUARIO||']; ?>
                                                            </p>
                                                        </h5>
                                                    <?php endforeach; ?>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-xl-8 col-lg-7">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Mi Actividad </h3>
                                    </div>
                                    <!-- /.box-header -->

                                    <form class="form" role="form" method="post" name="form_reg_dato" onsubmit="return validacion()">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="box-body">
                                                        <table id="listarActividad" class="table table-hover " style="width: 100%;">
                                                            <thead>
                                                                <tr>

                                                                    <th>Id </th>
                                                                    <th>Fecha </th>
                                                                    <th>Registro Objetivo</th>
                                                                    <th>Tipo Operacion</th>
                                                                    <th>Detalle</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($ARRAYYVERAUSUARIOID as $r) : ?>
                                                                    <tr class="center">
                                                                        <td>
                                                                            <a href="#" class="text-warning hover-warning">
                                                                                <?php echo $r['ID_AUSUARIO']; ?>
                                                                            </a>
                                                                        </td>
                                                                        <td><?php echo $r['FECHA_AUSUARIO||']; ?></td>
                                                                        <td><?php echo $r['TABLA_OBJETIVO_AUSUARIO']; ?></td>
                                                                        <td><?php echo $r['TIPO_OPERACION_AUSUARIO']; ?></td>
                                                                        <td><?php echo $r['DETALLE_OPERACION_AUSUARIO']; ?></td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                        </div>

                                        <div class="box-footer">
                                            <button type="button" class="btn btn-rounded  btn-success btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('index.php'); ">
                                                <i class="ti-back-left "></i> VOLVER
                                            </button>
                                        </div>
                                    </form>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                            <!-- /.col -->
                        </div>


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