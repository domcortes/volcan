<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES


include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';

include_once '../controlador/DREPALETIZAJEEX_ADO.php';
include_once '../controlador/ERECEPCION_ADO.php';
include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../modelo/EXIEXPORTACION.php';
include_once '../modelo/DREPALETIZAJEEX.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR


$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$PVESPECIES_ADO =  new PVESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();

$ERECEPCION_ADO =  new ERECEPCION_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$DREPALETIZAJEEX_ADO =  new DREPALETIZAJEEX_ADO();

//INIICIALIZAR MODELO
$EXIEXPORTACION =  new EXIEXPORTACION();
$DREPALETIZAJEEX =  new DREPALETIZAJEEX();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD


$IDDREPALETIZAJE="";
$FOLIOORIGINALEXISTENCIA="";
$FOLIONUEVOEXISTENCIA="";
$PRODUCTOR="";
$VARIEDAD="";


$FOLIONUEVO="";
$CANTIDADENVASE = "";
$KILOSNETOSREPALETIZAJE="";

$KILOSBRUTOS="";

$EXPORTACION="";
$REPALETIZAJE="";
$CAJASREPALETIZAR="";


$DISABLED = "";
$DISABLED2 = "";
$FOCUS = "";
$BORDER = "";
$MENSAJE="";

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



if (isset($_REQUEST['EDITAR'])) {

        //OBTENCION DE LA INFORMACIÓN PARA COMPLETAR EL REGISTRO
        $ARRAYEXISTENCIA=$EXIEXPORTACION_ADO->verExiexportacion($_REQUEST['EXPORTACION']);
       // var_dump($ARRAYEXISTENCIA);
        
        if($_REQUEST['CANTIDADENVASE'] < $ARRAYEXISTENCIA[0]['CANTIDAD_ENVASE_INGRESADO_EXIEXPORTACION']){
            $SINO="0";
            $MENSAJE="";
        }else{
            $SINO="1";
            $MENSAJE="LA CANTIDAD DE ENVASE DEBE SER MENOR A LA ORIGINAL";
        }

        if($SINO=="0"){
            $ARRAYESTANDAR=$ERECEPCION_ADO->verEstandar($ARRAYEXISTENCIA[0]['ID_ESTANDAR']);
            //CALCULAR NUEVO NETO A REGISTRAR EN BASE AL ESTANDAR
            $KILOSNETOSREPALETIZAJE =$_REQUEST['CANTIDADENVASE'] * $ARRAYESTANDAR[0]['PESO_NETO_ESTANDAR'];    

            //OBTENER INFORMACIÓN DEL NUEVO DE REGISTRO DE EXISTENCIA
            $ARRAYEXISTENCIABUSCARFOLIORECEOCIONNUEVOFOLIO=$EXIEXPORTACION_ADO->buscarPorFolioProcesoNuevoFolio($ARRAYEXISTENCIA[0]['FOLIO_EXIEXPORTACION'],$ARRAYEXISTENCIA[0]['ID_PROCESO'],$_REQUEST['FOLIONUEVOEXISTENCIA']);
        
            $DREPALETIZAJEEX->__SET('CANTIDAD_ENVASE_DREPALETIZAJE', $_REQUEST['CANTIDADENVASE']);
            $DREPALETIZAJEEX->__SET('KILOS_NETO_DREPALETIZAJE', $KILOSNETOSREPALETIZAJE );
            $DREPALETIZAJEEX->__SET('ID_PRODUCTOR', $ARRAYEXISTENCIA[0]['ID_PRODUCTOR']);
            $DREPALETIZAJEEX->__SET('ID_PVESPECIES', $ARRAYEXISTENCIA[0]['ID_PVESPECIES']);
            $DREPALETIZAJEEX->__SET('ID_FOLIO', $ARRAYEXISTENCIA[0]['ID_FOLIO']);
            $DREPALETIZAJEEX->__SET('ID_ESTANDAR', $ARRAYEXISTENCIA[0]['ID_ESTANDAR']);
            $DREPALETIZAJEEX->__SET('ID_EXIEXPORTACION', $_REQUEST['EXPORTACION']);
            $DREPALETIZAJEEX->__SET('ID_REPALETIZAJE', $_REQUEST['REPALETIZAJE']);
            $DREPALETIZAJEEX->__SET('ID_DREPALETIZAJE', $_REQUEST['IDDREPALETIZAJE']);
            $DREPALETIZAJEEX_ADO->actualizarDrepaletizaje($DREPALETIZAJEEX);

             if(empty($ARRAYEXISTENCIABUSCARFOLIORECEOCIONNUEVOFOLIO)){
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $EXIEXPORTACION->__SET('FOLIO_EXIEXPORTACION', $ARRAYEXISTENCIA[0]['FOLIO_EXIEXPORTACION']);
                $EXIEXPORTACION->__SET('NUMERO_LINEA', $ARRAYEXISTENCIA[0]['NUMERO_LINEA']);
                $EXIEXPORTACION->__SET('FOLIO_REPALETIZAJE_EXIEXPORTACION',  $_REQUEST['FOLIONUEVOEXISTENCIA']);
                $EXIEXPORTACION->__SET('FECHA_EMBALADO_EXIEXPORTACION', $ARRAYEXISTENCIA[0]['FECHA_EMBALADO_EXIEXPORTACION'] );  

                $EXIEXPORTACION->__SET('CANTIDAD_ENVASE_INGRESADO_EXIEXPORTACION', $_REQUEST['CANTIDADENVASE']);
                $EXIEXPORTACION->__SET('KILOS_NETO_EXIEXPORTACION', $KILOSNETOSREPALETIZAJE );
                $EXIEXPORTACION->__SET('KILOS_BRUTO_EXIEXPORTACION', 0);
                $EXIEXPORTACION->__SET('KILOS_DESHIRATACION_EXIEXPORTACION', 0 );     

                
                $EXIEXPORTACION->__SET('ID_ESTANDAR', $ARRAYEXISTENCIA[0]['ID_ESTANDAR']);
                $EXIEXPORTACION->__SET('ID_PRODUCTOR', $ARRAYEXISTENCIA[0]['ID_PRODUCTOR']);
                $EXIEXPORTACION->__SET('ID_PVESPECIES', $ARRAYEXISTENCIA[0]['ID_PVESPECIES']);
                $EXIEXPORTACION->__SET('ID_FOLIO',  $ARRAYEXISTENCIA[0]['ID_FOLIO']);
                $EXIEXPORTACION->__SET('ID_PROCESO', $ARRAYEXISTENCIA[0]['ID_PROCESO']);
                $EXIEXPORTACION->__SET('ID_EMPRESA', $ARRAYEXISTENCIA[0]['ID_EMPRESA']);
                $EXIEXPORTACION->__SET('ID_PLANTA', $ARRAYEXISTENCIA[0]['ID_PLANTA']);
                $EXIEXPORTACION->__SET('ID_TEMPORADA', $ARRAYEXISTENCIA[0]['ID_TEMPORADA']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $EXIEXPORTACION_ADO->agregarExiexportacionRepaletizaje($EXIEXPORTACION);
    
                }else{         

                    //UTILIZACION METODOS SET DEL MODELO
                    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                    $EXIEXPORTACION->__SET('FOLIO_EXIEXPORTACION', $ARRAYEXISTENCIA[0]['FOLIO_EXIEXPORTACION']);
                    $EXIEXPORTACION->__SET('NUMERO_LINEA', $ARRAYEXISTENCIA[0]['NUMERO_LINEA']);
                    $EXIEXPORTACION->__SET('FOLIO_REPALETIZAJE_EXIEXPORTACION',  $_REQUEST['FOLIONUEVOEXISTENCIA']);
                    $EXIEXPORTACION->__SET('FECHA_EMBALADO_EXIEXPORTACION', $ARRAYEXISTENCIA[0]['FECHA_EMBALADO_EXIEXPORTACION'] );  

                    $EXIEXPORTACION->__SET('CANTIDAD_ENVASE_INGRESADO_EXIEXPORTACION', $_REQUEST['CANTIDADENVASE']);
                    $EXIEXPORTACION->__SET('KILOS_NETO_EXIEXPORTACION', $KILOSNETOSREPALETIZAJE );
                    $EXIEXPORTACION->__SET('KILOS_BRUTO_EXIEXPORTACION', 0);
                    $EXIEXPORTACION->__SET('KILOS_DESHIRATACION_EXIEXPORTACION', 0 );     

                    
                    $EXIEXPORTACION->__SET('ID_ESTANDAR', $ARRAYEXISTENCIA[0]['ID_ESTANDAR']);
                    $EXIEXPORTACION->__SET('ID_PRODUCTOR', $ARRAYEXISTENCIA[0]['ID_PRODUCTOR']);
                    $EXIEXPORTACION->__SET('ID_PVESPECIES', $ARRAYEXISTENCIA[0]['ID_PVESPECIES']);
                    $EXIEXPORTACION->__SET('ID_FOLIO',  $ARRAYEXISTENCIA[0]['ID_FOLIO']);
                    $EXIEXPORTACION->__SET('ID_PROCESO', $ARRAYEXISTENCIA[0]['ID_PROCESO']);
                    $EXIEXPORTACION->__SET('ID_EMPRESA', $ARRAYEXISTENCIA[0]['ID_EMPRESA']);
                    $EXIEXPORTACION->__SET('ID_PLANTA', $ARRAYEXISTENCIA[0]['ID_PLANTA']);
                    $EXIEXPORTACION->__SET('ID_TEMPORADA', $ARRAYEXISTENCIA[0]['ID_TEMPORADA']);
                    $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $ARRAYEXISTENCIABUSCARFOLIORECEOCIONNUEVOFOLIO[0]['ID_EXIEXPORTACION']);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $EXIEXPORTACION_ADO->actualizarExiexportacionRepaletizaje($EXIEXPORTACION);
           
                }

            //FUNCION JAVASCRIPT PARA ACTUALIZAR PAGINA PRINCIPAL Y CERRAR VENTANA ACTUAL
            
                echo "
                <script type='text/javascript'>
                    window.opener.refrescar()
                    window.close();
                    </script> 
                ";
        
        }
    
}


//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($_REQUEST['FOLIONUEVO']) &&  isset($_REQUEST['REPALETIZAJE']) &&  isset($_REQUEST['IDOP'])&& isset($_REQUEST['OP']) ) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $FOLIONUEVO = $_REQUEST['FOLIONUEVO'];
    $REPALETIZAJE = $_REQUEST['REPALETIZAJE'];
    $IDOP= $_REQUEST['IDOP'];
    $OP = $_REQUEST['OP'];
    $NODATOURL="1";

    //IDENTIFICACIONES DE OPERACIONES
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {        
        $DISABLED = "";    
        $DISABLED2= "disabled";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDREPALETIZAJE = $DREPALETIZAJEEX_ADO->verDrepaletizaje($IDOP);   
        foreach ($ARRAYDREPALETIZAJE as $r) :    
            $CANTIDADENVASE = "" . $r['CANTIDAD_ENVASE_DREPALETIZAJE'];    
            $FOLIONUEVOEXISTENCIA = "" . $r['FOLIO_NUEVO_DREPALETIZAJE'];   
            $FOLIOORIGINALEXISTENCIA = "" . $r['FOLIO_ORIGINAL_DREPALETIZAJE'];  
            $EXPORTACION = "" . $r['ID_EXIEXPORTACION']; 

            $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);           
            $PRODUCTOR= $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];

            $ARRAYVERPVESPECIESID = $PVESPECIES_ADO->verPvespecies($r['ID_PVESPECIES']);
            $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($ARRAYVERPVESPECIESID[0]['ID_VESPECIES']);
            $VARIEDAD= $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
           

        endforeach;
    }
    
    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDREPALETIZAJE = $DREPALETIZAJEEX_ADO->verDrepaletizaje($IDOP);       
        foreach ($ARRAYDREPALETIZAJE as $r) :
            $CANTIDADENVASE = "" . $r['CANTIDAD_ENVASE_DREPALETIZAJE'];    
            $FOLIONUEVOEXISTENCIA = "" . $r['FOLIO_NUEVO_DREPALETIZAJE'];  
            $FOLIOORIGINALEXISTENCIA = "" . $r['FOLIO_ORIGINAL_DREPALETIZAJE']; 
            $EXPORTACION = "" . $r['ID_EXIEXPORTACION']; 
            

            $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);           
            $PRODUCTOR= $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];

            $ARRAYVERPVESPECIESID = $PVESPECIES_ADO->verPvespecies($r['ID_PVESPECIES']);
            $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($ARRAYVERPVESPECIESID[0]['ID_VESPECIES']);
            $VARIEDAD= $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
       
        endforeach;
    }
    
}

if($_POST){
    $IDDREPALETIZAJE="".$_REQUEST['IDDREPALETIZAJE'];    
    $CANTIDADENVASE="".$_REQUEST['CANTIDADENVASE'];    
    $FOLIONUEVOEXISTENCIA="".$_REQUEST['FOLIONUEVOEXISTENCIA'];   
    $FOLIOORIGINALEXISTENCIA="".$_REQUEST['FOLIOORIGINALEXISTENCIA'];  
    $EXPORTACION="".$_REQUEST['EXPORTACION'];   
}


if($NODATOURL=="0"){
 //  header('Location: index.php');
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <title>DETALLE RECEPCION</title>
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
                                <input type="hidden" id="IDDREPALETIZAJE" name="IDDREPALETIZAJE" value="<?php echo $IDOP; ?>" />
                                <input type="hidden" id="FOLIONUEVOEXISTENCIA" name="FOLIONUEVOEXISTENCIA" value="<?php echo $FOLIONUEVOEXISTENCIA; ?>" />
                                <input type="hidden" id="FOLIOORIGINALEXISTENCIA" name="FOLIOORIGINALEXISTENCIA" value="<?php echo $FOLIOORIGINALEXISTENCIA; ?>" />
                                <input type="hidden" id="EXPORTACION" name="EXPORTACION" value="<?php echo $EXPORTACION; ?>" />
                        

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>FOLIO  ORGINAL </label>
                                        <input type="number" class="form-control" placeholder="FOLIO ORIGINAL" id="FOLIOORIGINALEXISTENCIA" name="FOLIOORIGINALEXISTENCIA" value="<?php echo $FOLIOORIGINALEXISTENCIA; ?>"  <?php echo $DISABLED2; ?> <?php echo $DISABLEDSTYLE2; ?> />
                                        <label id="val_folioriginal" class="validacion"> </label>
                                        
                                    </div>
                                </div>
                    
                                <div class="col-sm-4">
                                    <div class="form-group">          
                                        <label>PRODUCTOR </label>
                                        <input type="text" class="form-control" placeholder="NOMBRE PRODUCTOR" id="PRODUCTOR" name="PRODUCTOR" value="<?php echo $PRODUCTOR; ?>"  <?php echo $DISABLED2; ?> <?php echo $DISABLEDSTYLE2; ?> />
                                        <label id="val_productor" class="validacion"> </label> 
                                    </div>
                                </div>

                    
                                <div class="col-sm-4">
                                    <div class="form-group">          
                                        <label>VARIEDAD </label>
                                        <input type="text" class="form-control" placeholder="NOMBRE VARIEDAD" id="VARIEDAD" name="VARIEDAD" value="<?php echo $VARIEDAD; ?>"  <?php echo $DISABLED2; ?> <?php echo $DISABLEDSTYLE2; ?> />
                                        <label id="val_variedad" class="validacion"> </label> 
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>FOLIO  NUEVO </label>
                                        <input type="number" class="form-control" placeholder="FOLIO NUEVO" id="FOLIONUEVOEXISTENCIA" name="FOLIONUEVOEXISTENCIA" value="<?php echo $FOLIONUEVOEXISTENCIA; ?>"  <?php echo $DISABLED2; ?> <?php echo $DISABLEDSTYLE2; ?> />
                                        <label id="val_folionuevo" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>CANTIDAD  ENVASE </label>
                                        <input type="number" class="form-control" placeholder="CANTIDAD ENVASE" id="CANTIDADENVASE" name="CANTIDADENVASE" value="<?php echo $CANTIDADENVASE; ?>"  <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                        <label id="val_cantidadenvase" class="validacion"> <?php  echo $MENSAJE; ?> </label>
                                    </div>
                                </div>      
                                <div class="col-sm-2">
                                    <div class="form-group">          
                                    </div>
                                </div>
                            </div>

                            <!-- /.row -->


                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CERRAR" value="CERRAR" Onclick="cerrar();">
                                    <i class="ti-trash"></i> CERRAR
                                </button>
                           
                                    <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="EDITAR" value="EDITAR">
                                        <i class="ti-save-alt"></i> EDITAR
                                    </button>


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