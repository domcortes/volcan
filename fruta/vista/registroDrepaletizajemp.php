<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/DREPALETIZAJEMP_ADO.php';
include_once '../controlador/ERECEPCION_ADO.php';
include_once '../controlador/EXIMATERIAPRIMA_ADO.php';


include_once '../modelo/EXIMATERIAPRIMA.php';
include_once '../modelo/DREPALETIZAJEMP.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR


$ERECEPCION_ADO =  new ERECEPCION_ADO();
$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();
$DREPALETIZAJEMP_ADO =  new DREPALETIZAJEMP_ADO();

//INIICIALIZAR MODELO
$EXIMATERIAPRIMA =  new EXIMATERIAPRIMA();
$DREPALETIZAJEMP =  new DREPALETIZAJEMP();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD




$NUMEROFOLIODRECEPCION = "";
$NUMEROLINEA = "";

$IDDREPALETIZAJE="";
$FOLIONUEVOEXISTENCIA="";
$CANTIDADENVASEDRECEPCION = "";
$KILOSNETOSREPALETIZAJE="";

$KILOSBRUTOS="";

$MATERIAPRIMA="";
$REPALETIZAJE="";
$CAJASREPALETIZAR="";

$PESOENVASEESTANDAR="";
$PESOPALLETEESTANDAR="";
$PESOENVASEESTANDAR="";
$KILOSBRUTOESTANDAR="";

$DISABLED = "";
$FOCUS = "";
$BORDER = "";
$MENSAJE="";
$DISABLEDSTYLE = "";
$DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";

$IDOP = "";
$OP = "";
$NODATOURL="";

//INICIALIZAR ARREGLOS
$ARRAYDREPALETIZAJE="";
$ARRAYDREPALETIZAJETOTAL="";
$ARRAYEXISTENCIA="";
$ARRAYEXISTENCIABUSCARFOLIORECEOCIONNUEVOFOLIO="";
$ARRAYESTANDAR="";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES


//OPERACIONES
//OPERACION DE REGISTRO DE FILA


if (isset($_REQUEST['EDITAR'])) {

        //OBTENCION DE LA INFORMACIÓN PARA COMPLETAR EL REGISTRO
        $ARRAYEXISTENCIA=$EXIMATERIAPRIMA_ADO->buscarPorRepaletizajeFolio( $_REQUEST['REPALETIZAJE'],$_REQUEST['MATERIAPRIMA']);


        if($_REQUEST['CANTIDADENVASE'] <= $ARRAYEXISTENCIA[0]['CANTIDAD_ENVASE_DISPONIBLE_EXIMATERIAPRIMA']){
            $SINO="0";
            $MENSAJE="";
        }else{
            $SINO="1";
            $MENSAJE="LA CANTIDAD DE ENVASE DEBE SER MENOR A LA ORIGINAL";
        }

        if($SINO=="0"){
            $ARRAYESTANDAR=$ERECEPCION_ADO->verEstandar($ARRAYEXISTENCIA[0]['ID_ESTANDAR']);

            //CALCULAR NUEVO NETO A REGISTRAR EN BASE AL ESTANDAR //OBTENCIONS DE LOS DATOS, OBTENIDOS EN LA CONSULTA                        
            $KILOSNETOSREPALETIZAJE = $_REQUEST['CANTIDADENVASE'] * $ARRAYESTANDAR[0]['PESO_NETO_ESTANDAR'];
            
            //OBTENER INFORMACIÓN DEL NUEVO DE REGISTRO DE EXISTENCIA
            $ARRAYEXISTENCIABUSCARFOLIORECEOCIONNUEVOFOLIO=$EXIMATERIAPRIMA_ADO->buscarPorFolioRecepcionNuevoFolio($ARRAYEXISTENCIA[0]['FOLIO_EXIMATERIAPRIMA'],$ARRAYEXISTENCIA[0]['ID_RECEPCION'],$_REQUEST['FOLIONUEVOEXISTENCIA']);
        
            $DREPALETIZAJEMP->__SET('CANTIDAD_ENVASE_DREPALETIZAJE', $_REQUEST['CANTIDADENVASE']);
            $DREPALETIZAJEMP->__SET('KILOS_NETO_DREPALETIZAJE', $KILOSNETOSREPALETIZAJE );
            $DREPALETIZAJEMP->__SET('PESO_PALLET_DREPALETIZAJE', $ARRAYEXISTENCIA[0]['PESO_PALLET_EXIMATERIAPRIMA'] );
            $DREPALETIZAJEMP->__SET('ID_ESTANDAR', $ARRAYEXISTENCIA[0]['ID_ESTANDAR'] );
            $DREPALETIZAJEMP->__SET('ID_PRODUCTOR', $ARRAYEXISTENCIA[0]['ID_PRODUCTOR']);
            $DREPALETIZAJEMP->__SET('ID_PVESPECIES', $ARRAYEXISTENCIA[0]['ID_PVESPECIES']);
            $DREPALETIZAJEMP->__SET('ID_FOLIO', $ARRAYEXISTENCIA[0]['ID_FOLIO']);
            $DREPALETIZAJEMP->__SET('ID_ESTANDAR', $ARRAYEXISTENCIA[0]['ID_ESTANDAR']);
            $DREPALETIZAJEMP->__SET('ID_REPALETIZAJE', $_REQUEST['REPALETIZAJE']);
            $DREPALETIZAJEMP->__SET('ID_DREPALETIZAJE', $_REQUEST['IDDREPALETIZAJE']);
          //  $DREPALETIZAJEMP_ADO->actualizarDrepaletizaje($DREPALETIZAJEMP);

             if(empty($ARRAYEXISTENCIABUSCARFOLIORECEOCIONNUEVOFOLIO)){
                    //UTILIZACION METODOS SET DEL MODELO
                    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                    $EXIMATERIAPRIMA->__SET('FOLIO_EXIMATERIAPRIMA', $ARRAYEXISTENCIA[0]['FOLIO_EXIMATERIAPRIMA']);
                    $EXIMATERIAPRIMA->__SET('NUMERO_LINEA', $ARRAYEXISTENCIA[0]['NUMERO_LINEA']);
                    $EXIMATERIAPRIMA->__SET('FOLIO_AUXILIAR_EXIMATERIAPRIMA',  $_REQUEST['FOLIONUEVOEXISTENCIA']);
                    $EXIMATERIAPRIMA->__SET('KILOS_NETO_EXIMATERIAPRIMA', $KILOSNETOSREPALETIZAJE );
                    $EXIMATERIAPRIMA->__SET('KILOS_PROCESADOS_EXIMATERIAPRIMA', 0);
                    $EXIMATERIAPRIMA->__SET('KILOS_DESPACHADOS_EXIMATERIAPRIMA', 0);
                    $EXIMATERIAPRIMA->__SET('KILOS_DISPONIBLE_EXIMATERIAPRIMA', $KILOSNETOSREPALETIZAJE );    

                    $EXIMATERIAPRIMA->__SET('CANTIDAD_ENVASE_INGRESADO_EXIMATERIAPRIMA', $_REQUEST['CANTIDADENVASE']);
                    $EXIMATERIAPRIMA->__SET('CANTIDAD_ENVASE_DISPONIBLE_EXIMATERIAPRIMA', $_REQUEST['CANTIDADENVASE']);
                    $EXIMATERIAPRIMA->__SET('CANTIDAD_ENVASE_DESPACHADOS_EXIMATERIAPRIMA', 0);
                    $EXIMATERIAPRIMA->__SET('CANTIDAD_ENVASE_PROCESADOS_EXIMATERIAPRIMA',  0);
                    
                    $EXIMATERIAPRIMA->__SET('PESO_PALLET_EXIMATERIAPRIMA',  $ARRAYEXISTENCIA[0]['PESO_PALLET_EXIMATERIAPRIMA']);

                    $EXIMATERIAPRIMA->__SET('ID_ESTANDAR', $ARRAYEXISTENCIA[0]['ID_ESTANDAR']);
                    $EXIMATERIAPRIMA->__SET('ID_PRODUCTOR', $ARRAYEXISTENCIA[0]['ID_PRODUCTOR']);
                    $EXIMATERIAPRIMA->__SET('ID_PVESPECIES', $ARRAYEXISTENCIA[0]['ID_PVESPECIES']);
                    $EXIMATERIAPRIMA->__SET('ID_FOLIO',  $ARRAYEXISTENCIA[0]['ID_FOLIO']);
                    $EXIMATERIAPRIMA->__SET('ID_RECEPCION', $ARRAYEXISTENCIA[0]['ID_RECEPCION']);
                    $EXIMATERIAPRIMA->__SET('ID_EMPRESA', $ARRAYEXISTENCIA[0]['ID_EMPRESA']);
                    $EXIMATERIAPRIMA->__SET('ID_PLANTA', $ARRAYEXISTENCIA[0]['ID_PLANTA']);
                    $EXIMATERIAPRIMA->__SET('ID_TEMPORADA', $ARRAYEXISTENCIA[0]['ID_TEMPORADA']);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                //    $EXIMATERIAPRIMA_ADO->agregarEximateriaprimaRepaletizaje($EXIMATERIAPRIMA);
                }else{                    
                    $EXIMATERIAPRIMA->__SET('FOLIO_EXIMATERIAPRIMA', $ARRAYEXISTENCIA[0]['FOLIO_EXIMATERIAPRIMA']);
                    $EXIMATERIAPRIMA->__SET('NUMERO_LINEA', $ARRAYEXISTENCIA[0]['NUMERO_LINEA']);
                    $EXIMATERIAPRIMA->__SET('KILOS_NETO_EXIMATERIAPRIMA', $KILOSNETOSREPALETIZAJE );
                    $EXIMATERIAPRIMA->__SET('KILOS_PROCESADOS_EXIMATERIAPRIMA', 0);
                    $EXIMATERIAPRIMA->__SET('KILOS_DESPACHADOS_EXIMATERIAPRIMA', 0);
                    $EXIMATERIAPRIMA->__SET('KILOS_DISPONIBLE_EXIMATERIAPRIMA', $KILOSNETOSREPALETIZAJE );    

                    $EXIMATERIAPRIMA->__SET('CANTIDAD_ENVASE_INGRESADO_EXIMATERIAPRIMA', $_REQUEST['CANTIDADENVASE']);
                    $EXIMATERIAPRIMA->__SET('CANTIDAD_ENVASE_DISPONIBLE_EXIMATERIAPRIMA', $_REQUEST['CANTIDADENVASE']);
                    $EXIMATERIAPRIMA->__SET('CANTIDAD_ENVASE_DESPACHADOS_EXIMATERIAPRIMA', 0);
                    $EXIMATERIAPRIMA->__SET('CANTIDAD_ENVASE_PROCESADOS_EXIMATERIAPRIMA',  0);

                    $EXIMATERIAPRIMA->__SET('PESO_PALLET_EXIMATERIAPRIMA',  $ARRAYEXISTENCIA[0]['PESO_PALLET_EXIMATERIAPRIMA']);
                    
                    $EXIMATERIAPRIMA->__SET('ID_ESTANDAR', $ARRAYEXISTENCIA[0]['ID_ESTANDAR']);
                    $EXIMATERIAPRIMA->__SET('ID_PRODUCTOR', $ARRAYEXISTENCIA[0]['ID_PRODUCTOR']);
                    $EXIMATERIAPRIMA->__SET('ID_PVESPECIES', $ARRAYEXISTENCIA[0]['ID_PVESPECIES']);
                    $EXIMATERIAPRIMA->__SET('ID_FOLIO',  $ARRAYEXISTENCIA[0]['ID_FOLIO']);
                    $EXIMATERIAPRIMA->__SET('ID_RECEPCION', $ARRAYEXISTENCIA[0]['ID_RECEPCION']);
                    $EXIMATERIAPRIMA->__SET('ID_EMPRESA', $ARRAYEXISTENCIA[0]['ID_EMPRESA']);
                    $EXIMATERIAPRIMA->__SET('ID_PLANTA', $ARRAYEXISTENCIA[0]['ID_PLANTA']);
                    $EXIMATERIAPRIMA->__SET('ID_TEMPORADA', $ARRAYEXISTENCIA[0]['ID_TEMPORADA']);
                    $EXIMATERIAPRIMA->__SET('ID_EXIMATERIAPRIMA', $ARRAYEXISTENCIABUSCARFOLIORECEOCIONNUEVOFOLIO[0]['ID_EXIMATERIAPRIMA']);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                  //  $EXIMATERIAPRIMA_ADO->actualizarEximateriaprima($EXIMATERIAPRIMA);
                }

            //FUNCION JAVASCRIPT PARA ACTUALIZAR PAGINA PRINCIPAL Y CERRAR VENTANA ACTUAL
            /*
                echo "
                <script type='text/javascript'>
                    window.opener.refrescar()
                    window.close();
                    </script> 
                ";
            */
        }
    
}



//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($_REQUEST['REPALETIZAJE'])  && isset($_REQUEST['MATERIAPRIMA']) && isset($_REQUEST['IDOP'])&& isset($_REQUEST['OP']) ) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $REPALETIZAJE = $_REQUEST['REPALETIZAJE'];
    $MATERIAPRIMA = $_REQUEST['MATERIAPRIMA'];  
    $IDOP= $_REQUEST['IDOP'];
    $OP = $_REQUEST['OP'];
    $NODATOURL="1";

    $ARRAYEXISTENCIA=$EXIMATERIAPRIMA_ADO->verEximateriaprima($_REQUEST['MATERIAPRIMA']);
    $ARRAYDREPALETIZAJETOTAL=$DREPALETIZAJEMP_ADO->totalesDrepaletizaje($_REQUEST['REPALETIZAJE']);
    //IDENTIFICACIONES DE OPERACIONES
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {        
        $DISABLED = "";    
        $ARRAYDREPALETIZAJE = $DREPALETIZAJEMP_ADO->verDrepaletizaje($IDOP);   
        foreach ($ARRAYDREPALETIZAJE as $r) :    
            $IDDREPALETIZAJE = "" . $r['ID_DREPALETIZAJE'];
            $CANTIDADENVASEDRECEPCION = "" . $r['CANTIDAD_ENVASE_DREPALETIZAJE'];    
            $FOLIONUEVOEXISTENCIA = "" . $r['FOLIO_NUEVO_DREPALETIZAJE'];    
        endforeach;
    }    
    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        $DISABLED = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $ARRAYDREPALETIZAJE = $DREPALETIZAJEMP_ADO->verDrepaletizaje($IDOP);       
        foreach ($ARRAYDREPALETIZAJE as $r) :
            $IDDREPALETIZAJE = "" . $r['ID_DREPALETIZAJE'];
            $CANTIDADENVASEDRECEPCION = "" . $r['CANTIDAD_ENVASE_DREPALETIZAJE'];    
            $FOLIONUEVOEXISTENCIA = "" . $r['FOLIO_NUEVO_DREPALETIZAJE'];    
        endforeach;
    }
    
}

if($_POST){
    $IDDREPALETIZAJE="".$_REQUEST['IDDREPALETIZAJE'];    
    $CANTIDADENVASEDRECEPCION="".$_REQUEST['CANTIDADENVASE'];    
    $FOLIONUEVOEXISTENCIA="".$_REQUEST['FOLIONUEVOEXISTENCIA'];   
}


if($NODATOURL=="0"){
   header('Location: index.php');
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registro Detalle Repaletizaje</title>
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
                CANTIDADENVASE = document.getElementById("CANTIDADENVASE").value;
                document.getElementById('val_cantidadenvase').innerHTML = "";


                if (CANTIDADENVASE == null || CANTIDADENVASE == 0) {
                    document.form_reg_dato.CANTIDADENVASE.focus();
                    document.form_reg_dato.CANTIDADENVASE.style.borderColor = "#FF0000";
                    document.getElementById('val_cantidadenvase').innerHTML = "NO HA INGRESADO DATOS";
                    return false;
                }
                document.form_reg_dato.CANTIDADENVASE.style.borderColor = "#4AF575";


            }
            //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
            function cerrar() {
                window.opener.refrescar()
                window.close();
            }
        </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" onload="mueveReloj()">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
        <?php //include_once "../config/menu.php"; ?>
        <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <!--
                                        <h4 class="box-title">Different Width</h4>
                                        -->
                    </div>

                    <form class="form" role="form" method="post" name="form_reg_dato" onsubmit="return validacion()">
                        <div class="box-body form-element">
                        
                                <input type="hidden" id="REPALETIZAJE" name="REPALETIZAJE" value="<?php echo $REPALETIZAJE; ?>" />
                                <input type="hidden" id="MATERIAPRIMA" name="MATERIAPRIMA" value="<?php echo $MATERIAPRIMA; ?>" />
                                <input type="hidden" id="IDDREPALETIZAJE" name="IDDREPALETIZAJE" value="<?php echo $IDDREPALETIZAJE; ?>" />
                                <input type="hidden" id="FOLIONUEVOEXISTENCIA" name="FOLIONUEVOEXISTENCIA" value="<?php echo $FOLIONUEVOEXISTENCIA; ?>" />
                        

                            <div class="row">
                            <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Folio</label>
                                        <input type="text" class="form-control" placeholder="Folio" id="FOLIONUEVOEXISTENCIAV" name="FOLIONUEVOEXISTENCIAV" value="<?php echo $FOLIONUEVOEXISTENCIA; ?>" disabled  <?php echo $DISABLEDSTYLE2; ?>/>

                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Cantidad Envase</label>
                                        <input type="number" class="form-control" placeholder="Cantidad Envase" id="CANTIDADENVASE" name="CANTIDADENVASE" value="<?php echo $CANTIDADENVASEDRECEPCION; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                        <label id="val_cantidadenvase" class="validacion"> <?php echo $MENSAJE; ?> </label>

                                    </div>
                                </div>
                            </div>

                            <!-- /.row -->


                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CERRAR" value="CERRAR" Onclick="cerrar();">
                                    <i class="ti-trash"></i> CERRAR
                                </button>
                                <?php if ($OP != "editar") { ?>
                                    <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED; ?>>
                                        <i class="ti-save-alt"></i> GUARDAR
                                    </button>
                                <?php } else { ?>
                                    <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="EDITAR" value="EDITAR">
                                        <i class="ti-save-alt"></i> EDITAR
                                    </button>
                                <?php } ?>


                            </div>
                        </div>
                    </form>
                </div>


                <!--.row -->
        </section>
       



        <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php //include_once "../config/footer.php"; ?>
                <?php //include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>