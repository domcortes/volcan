<?php
include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/TUSUARIO_ADO.php';
include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';

//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD


//INICIALIZAR ARREGLOS


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>INICIO</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
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
            <?php include_once "../../assest/config/menuFruta.php"; ?>
            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
            <?php include_once "../../assest/config/footer.php"; ?>
            <?php include_once "../../assest/config/menuExtraFruta.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
</body>

</html>