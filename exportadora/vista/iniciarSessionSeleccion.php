<?php

session_start();
if (isset($_SESSION["ID_EMPRESA"]) && isset($_SESSION["ID_PLANTA"]) && isset($_SESSION["ID_TEMPORADA"])  ) {
    header('Location: index.php');
}

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$EMPRESA_ADO = new EMPRESA_ADO();
$PLANTA_ADO = new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$MENSAJE = "";
$MENSAJE2 = "";



//INICIALIZAR ARREGLOS
$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
$ARRAYPLANTA = $PLANTA_ADO->listarPlantaPropiaCBX();
$ARRAYTEMPORADA = $TEMPORADA_ADO->listarTemporadaCBX();

if (isset($_REQUEST['ENTRAR'])) {
    $_SESSION["ID_EMPRESA"] = $_REQUEST['EMPRESA'];
    $_SESSION["ID_PLANTA"] = $_REQUEST['PLANTA'];
    $_SESSION["ID_TEMPORADA"] = $_REQUEST['TEMPORADA'];
     header('Location: index.php');   
}
if (isset($_REQUEST['SALIR'])) {
     session_destroy();
     echo "<script> location.href = '../../';</script>";
}

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <title>INICIAR SESSION</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../config/urlHead.php"; ?>

        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                function validacion() {

                    EMPRESA = document.getElementById("EMPRESA").selectedIndex;
                    PLANTA = document.getElementById("PLANTA").selectedIndex;
                    TEMPORADA = document.getElementById("TEMPORADA").selectedIndex;



                    document.getElementById('val_select_empresa').innerHTML = "";
                    document.getElementById('val_select_planta').innerHTML = "";
                    document.getElementById('val_temporada').innerHTML = "";



                    if (EMPRESA == null || EMPRESA == 0) {
                        document.form_reg_dato.EMPRESA.focus();
                        document.form_reg_dato.EMPRESA.style.borderColor = "#FF0000";
                        document.getElementById('val_select_empresa').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.EMPRESA.style.borderColor = "#4AF575";


                    if (PLANTA == null || PLANTA == 0) {
                        document.form_reg_dato.PLANTA.focus();
                        document.form_reg_dato.PLANTA.style.borderColor = "#FF0000";
                        document.getElementById('val_select_planta').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.PLANTA.style.borderColor = "#4AF575";

                    if (TEMPORADA == null || TEMPORADA == 0) {
                        document.form_reg_dato.TEMPORADA.focus();
                        document.form_reg_dato.TEMPORADA.style.borderColor = "#FF0000";
                        document.getElementById('val_temporada').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TEMPORADA.style.borderColor = "#4AF575";

                }
            </script>

</head>

<body class="hold-transition theme-primary bg-gradient-primary">
    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">
            <div class="col-12">
                <div class="row justify-content-center no-gutters">
                    <div class="col-lg-4 col-md-5 col-12">
                        <div class="bg-white-10 rounded5">
                            <div class="content-top-agile p-10 pb-0">
                            </div>
                            <div class="p-30">
                                <form class="form" role="form" method="post" onsubmit="return validacion()" name="form_reg_dato">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-transparent text-white">
                                                    <label class="col-lg-2 control-label" id="label" for="EMPRESA">Empresa</label>
                                                </span>
                                            </div>
                                            <div class="input-group mb-3" id="input">
                                                <select class="form-control select2" id="EMPRESA" name="EMPRESA" style="width: 100%;" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYEMPRESA as $r) : ?>
                                                        <?php if ($ARRAYEMPRESA) {    ?>
                                                            <option value="<?php echo $r['ID_EMPRESA']; ?>" <?php if ($EMPRESA == $r['ID_EMPRESA']) {
                                                                                                                echo "selected";
                                                                                                            } ?>> <?php echo $r['NOMBRE_EMPRESA'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <label id="val_select_empresa" class="validacion"> <?php echo  $MENSAJE; ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-transparent text-white">
                                                    <label class="col-lg-2 control-label" id="label" for="PLANTA">Planta</label>
                                                </span>
                                            </div>
                                            <div class="input-group mb-3" id="input">
                                                <select class="form-control select2" id="PLANTA" name="PLANTA" style="width: 100%;" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYPLANTA as $r) : ?>
                                                        <?php if ($ARRAYPLANTA) {    ?>
                                                            <option value="<?php echo $r['ID_PLANTA']; ?>" <?php if ($PLANTA == $r['ID_PLANTA']) {
                                                                                                                echo "selected";
                                                                                                            } ?>> <?php echo $r['NOMBRE_PLANTA'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <label id="val_select_planta" class="validacion"> <?php echo  $MENSAJE; ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-transparent text-white">
                                                    <label class="col-lg-2 control-label" id="label" for="TEMPORADA">Temporada</label>
                                                </span>
                                            </div>
                                            <div class="input-group mb-3" id="input">
                                                <select class="form-control select2" id="TEMPORADA" name="TEMPORADA" style="width: 100%;" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYTEMPORADA as $r) : ?>
                                                        <?php if ($ARRAYTEMPORADA) {    ?>
                                                            <option value="<?php echo $r['ID_TEMPORADA']; ?>" <?php if ($TEMPORADA == $r['ID_TEMPORADA']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_TEMPORADA'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <label id="val_temporada" class="validacion"> <?php echo  $MENSAJE; ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-0">
                                                <button type="submit" class="btn btn-primary btn-lg btn-block" id="ENTRAR" name="ENTRAR" value="ENTRAR">
                                                    Seleccionar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form method="post">
                                            <button type="submit" class="btn btn-danger btn-lg btn-block" id="SALIR" name="SALIR" value="SALIR">
                                                Salir
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once "../config/urlBaseLogin.php"; ?>
</body>

</html>