<?php
require_once '../../vendor/autoload.php';
$detect = new Mobile_Detect;

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


?>



<!DOCTYPE html>
<html lang="es">

<head>
    <title>INICIAR SESSION</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIAR SESSION</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" href="../../loginv2.css">
    <!--sweetalert-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

<body class="hold-transition sidebar-collapse sidebar-mini  login-page-exportadora"> 
    <div class="card border-0">
        <div class="card-header bg-info text-white text-center text-uppercase">
            <img src="../..//img/favicon.png" alt="" height="20px">Seleccion de parametros <strong id="title_section"></strong>
        </div>
        <div class="card-body login-card-body">
            <form class="form" role="form" method="post" onsubmit="return validacion()" name="form_reg_dato">
                <div class="input-group mb-3" id="input">
                    <label id="label" for="EMPRESA">Selecionar Empresa</label>
                    <select class="form-control" id="EMPRESA" name="EMPRESA" style="width: 100%;" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                        <option></option>
                        <?php foreach ($ARRAYEMPRESA as $r) : ?>
                            <?php if ($ARRAYEMPRESA) {    ?>
                                <option value="<?php echo $r['ID_EMPRESA']; ?>" <?php if ($EMPRESA == $r['ID_EMPRESA']) { echo "selected"; } ?>> <?php echo $r['NOMBRE_EMPRESA'] ?> </option>
                            <?php } else { ?>
                                <option>No Hay Datos Registrados </option>
                            <?php } ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <label id="val_select_empresa" class="validacion"> <?php echo  $MENSAJE; ?></label>
                <div class="input-group mb-3" id="input">
                    <label id="label" for="PLANTA">Selecionar Planta</label>
                    <select class="form-control" id="PLANTA" name="PLANTA" style="width: 100%;" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                        <option></option>
                        <?php foreach ($ARRAYPLANTA as $r) : ?>
                            <?php if ($ARRAYPLANTA) {    ?>
                                <option value="<?php echo $r['ID_PLANTA']; ?>" <?php if ($PLANTA == $r['ID_PLANTA']) { echo "selected"; } ?>> <?php echo $r['NOMBRE_PLANTA'] ?> </option>
                            <?php } else { ?>
                                <option>No Hay Datos Registrados </option>
                            <?php } ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <label id="val_select_planta" class="validacion"> <?php echo  $MENSAJE; ?></label>
                <div class="input-group mb-3" id="input">
                    <label id="label" for="TEMPORADA">Selecionar Temporada</label>
                    <select class="form-control" id="TEMPORADA" name="TEMPORADA" style="width: 100%;" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                        <option></option>
                        <?php foreach ($ARRAYTEMPORADA as $r) : ?>
                            <?php if ($ARRAYTEMPORADA) {    ?>
                                <option value="<?php echo $r['ID_TEMPORADA']; ?>" <?php if ($TEMPORADA == $r['ID_TEMPORADA']) { echo "selected"; } ?>> <?php echo $r['NOMBRE_TEMPORADA'] ?> </option>
                            <?php } else { ?>
                                <option>No Hay Datos Registrados </option>
                            <?php } ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <label id="val_temporada" class="validacion"> <?php echo  $MENSAJE; ?></label>
                <div class="row">
                    <div class="col-12">
                        <div class="btn-group-vertical col-12 d-flex">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" id="ENTRAR" name="ENTRAR" value="ENTRAR"> Ingresar </button>
                        </div>
                    </div>
                </div>
            </form>
            <form>
                <div class="row">
                    <div class="col-12">
                        <div class="btn-group-vertical col-12 d-flex">
                            <button type="submit" class="btn btn-danger btn-lg btn-block" id="SALIR" name="SALIR" value="SALIR"> Salir </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


</body>

</html>

         <!-- deteccion celular -->
         <?php if ($detect->isMobile() && $detect->isiOS() ): ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'info',
                title: 'Celular iPhone detectado',
                html:"Hemos detectado que estas desde un iPhone 📱<br>De momento algunas vistas no estan adaptadas, por lo que sugerimos que te conectes desde un tablet Android / iPad o un computador",
                showConfirmButton:true,
                confirmButtonText:"Vale! 😉"
            })
        </script>
    <?php endif ?>

    <!-- deteccion Android -->
    <?php if ($detect->isMobile() && $detect->isAndroidOS()): ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'info',
                title: 'Celular Android detectado',
                html:"Hemos detectado que estas desde un telefono Android 🤖<br>De momento algunas vistas no estan adaptadas, por lo que sugerimos que te conectes desde un tablet Android / iPad o un computador",
                showConfirmButton:true,
                confirmButtonText:"Vale! 😉"
            })
        </script>
    <?php endif ?>

<?php
        if (isset($_REQUEST['ENTRAR'])) {
            $_SESSION["ID_EMPRESA"] = $_REQUEST['EMPRESA'];
            $_SESSION["ID_PLANTA"] = $_REQUEST['PLANTA'];
            $_SESSION["ID_TEMPORADA"] = $_REQUEST['TEMPORADA'];
            echo "<script> location.href = 'index.php';</script>";
        }
        if (isset($_REQUEST['SALIR'])) {
             session_destroy();
             echo "<script> location.href = '../../';</script>";
        }
    ?>