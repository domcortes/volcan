<?php


include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/PTUSUARIO_ADO.php';

include_once '../modelo/PTUSUARIO.php';
//INICIALIZAR CONTROLADOR
$PTUSUARIO_ADO = new PTUSUARIO_ADO();

$PTUSUARIO = new PTUSUARIO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$FRUTA=""; 
$FRUTATODO=""; 
$FGRANEL=""; 
$FGRECEPCION="";
$FGRMP="";
$FGRIND="";
$FGR_CONSOLIDADO="";        
$FGDESPACHO ="";
$FGDMP="";   
$FGDIND="";   
$FGD_CONSOLIDADO="";  
$FGGUIA="";   
$FGGMP="";   
$FGGIND="";
$FG_EXISTENCIAMP="";   
$FG_EXISTENCIAIND="";    
$FPACKING="";
$FPPROCESO="";
$FPREEMBALAJE="";
$FP_EXISTENCIAMP="";
$FP_EXISTENCIAIND="";
$FP_EXISTENCIAPT="";
$FLOGISTICA="";
$FLICARGA="";
$FL_EXISTENCIAPT="";
$FSAG="";
$FSINSPECCION="";
$FS_EXISTENCIAPT="";
$FFRIGORIFICO="";
$FFRECEPCIONPT="";
$FFDESPACHO="";
$FFDPT="";
$FFDEX="";
$FFD_CONSOLIDADO="";
$FFGUIA="";
$FFGPT="";
$FFPC="";
$FFREPALETIZAJE="";    
$FF_EXISTENCIAPT="";
$MATERIAL="";
$MMATERIAL="";
$MATERIALTODO="";
$MMRECEPCION="";
$MMDESPACHO="";
$MMGUIA="";
$MMEXISTENCIA="";
$MENVASE="";
$MERECEPCION="";
$MEDESPACHO="";
$MEEXISTENCIA="";
$MEGUIA="";    
$MCONSOLIDADO="";    
$MCRECEPCION="";
$MCDESPACHO="";
$MADMINISTRACION="";
$MAOC="";
$MAOC_AR="";
$MAOC_EXISTENCIAM="";
$MAOC_EXISTENCIAE="";    
$MKARDEX="";
$MKMATERIAL="";
$MKENVASE="";
$EXPORTADORA="";
$EXPORTADORATODO="";
$ELOGISTICA="";
$ELICARGA="";
$EMATERIAL="";
$EMFICHA="";
$EINFORME="";
$EIGRANEL="";
$EIPT="";
$EIGESTION="";
$MANTENEDORES="";
$MANTENEDORESTODO="";
$M_REGISTRO="";
$M_EDITAR="";
$M_VER="";
$M_INFORME="";
$M_REPORTE="";
$M_AGRUPADO="";
$FHISTORIAL="";
$FENVASES="";
$FGENVASES="";
$AREGISTRO="";


$CONTADOR=0;
$TUSUARIO="";

$DISABLED="";
$DISABLED2="disabled";
$OP="";


$ARRAYTUSUARIOS="";
$ARRAYPTUSUARIO="";

//INCIALIZAR ARREGLOS
$ARRAYTUSUARIOS = $TUSUARIO_ADO->listarTusuarioCBX();
$ARRAYPTUSUARIO = $PTUSUARIO_ADO->listarPtusuarioCBX();


if (isset($_POST)) {

    if (isset($_REQUEST['TUSUARIO'])) {
        $TUSUARIO = "" . $_REQUEST['TUSUARIO'];
    }
    if (isset($_REQUEST['FRUTA'])) {
        $FRUTA = "" . $_REQUEST['FRUTA'];
    }
 
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Privilegio Tipo Usuario</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <?php include_once "../config/urlHead.php"; ?>
        
    <style>
        fieldset{
            border: 2px solid #198ca9de;
            padding: 10px;
            margin: 10px;
            background-color: #ffffff87;
            border-radius: 4px solid;
            -webkit-border-radius: 4px solid;
            -moz-border-radius: 4px solid;
            -ms-border-radius: 4px solid;
            -o-border-radius: 4px solid;
        }
        legend{
            
            border: 1px solid #198ca9de;
        }
    </style>

    <script type="text/javascript">


        function fruta(){
            
            FRUTA = document.getElementById('FRUTA').checked;
            if(FRUTA==true){                
                document.getElementById('FRUTATODO').disabled = false;                
                document.getElementById('FGRANEL').disabled = false;
                document.getElementById('FGRECEPCION').disabled = false;
                document.getElementById('FGRMP').disabled = false;
                document.getElementById('FGRIND').disabled = false;
                document.getElementById('FGR_CONSOLIDADO').disabled = false;
                document.getElementById('FGDESPACHO').disabled = false;
                document.getElementById('FGDMP').disabled = false;
                document.getElementById('FGDIND').disabled = false;                 
                document.getElementById('FGD_CONSOLIDADO').disabled = false;
                document.getElementById('FGGUIA').disabled = false;
                document.getElementById('FGGMP').disabled = false;
                document.getElementById('FGGIND').disabled = false;
                document.getElementById('FG_EXISTENCIAMP').disabled = false;
                document.getElementById('FG_EXISTENCIAIND').disabled = false;   
                document.getElementById('FPACKING').disabled = false;
                document.getElementById('FPPROCESO').disabled = false;
                document.getElementById('FPREEMBALAJE').disabled = false;
                document.getElementById('FP_EXISTENCIAMP').disabled = false;
                document.getElementById('FP_EXISTENCIAIND').disabled = false;
                document.getElementById('FP_EXISTENCIAPT').disabled = false;
                document.getElementById('FLOGISTICA').disabled = false;
                document.getElementById('FLICARGA').disabled = false; 
                document.getElementById('FL_EXISTENCIAPT').disabled = false;
                document.getElementById('FSAG').disabled = false;
                document.getElementById('FSINSPECCION').disabled = false;
                document.getElementById('FS_EXISTENCIAPT').disabled = false;
                document.getElementById('FFRIGORIFICO').disabled = false;
                document.getElementById('FFRECEPCIONPT').disabled = false;
                document.getElementById('FFDESPACHO').disabled = false;
                document.getElementById('FFDPT').disabled = false;
                document.getElementById('FFDEX').disabled = false;                  
                document.getElementById('FFD_CONSOLIDADO').disabled = false; 
                document.getElementById('FFGUIA').disabled = false; 
                document.getElementById('FFGPT').disabled = false; 
                document.getElementById('FFPC').disabled = false;   
                document.getElementById('FFREPALETIZAJE').disabled = false; 
                document.getElementById('FF_EXISTENCIAPT').disabled = false; 
                document.getElementById('FHISTORIAL').disabled = false; 
                document.getElementById('FENVASES').disabled = false; 
                document.getElementById('FGENVASES').disabled = false;
               
            }else{                
                document.getElementById('FRUTATODO').disabled = true;      
                document.getElementById('FGRANEL').disabled = true;
                document.getElementById('FGRECEPCION').disabled = true;
                document.getElementById('FGRMP').disabled = true;
                document.getElementById('FGRIND').disabled = true;
                document.getElementById('FGR_CONSOLIDADO').disabled = true;
                document.getElementById('FGDESPACHO').disabled = true;
                document.getElementById('FGDMP').disabled = true;
                document.getElementById('FGDIND').disabled = true;                 
                document.getElementById('FGD_CONSOLIDADO').disabled = true;
                document.getElementById('FGGUIA').disabled = true;
                document.getElementById('FGGMP').disabled = true;
                document.getElementById('FGGIND').disabled = true;
                document.getElementById('FG_EXISTENCIAMP').disabled = true;
                document.getElementById('FG_EXISTENCIAIND').disabled = true;   
                document.getElementById('FPACKING').disabled = true;
                document.getElementById('FPPROCESO').disabled = true;
                document.getElementById('FPREEMBALAJE').disabled = true;
                document.getElementById('FP_EXISTENCIAMP').disabled = true;
                document.getElementById('FP_EXISTENCIAIND').disabled = true;
                document.getElementById('FP_EXISTENCIAPT').disabled = true;
                document.getElementById('FLOGISTICA').disabled = true;
                document.getElementById('FLICARGA').disabled = true; 
                document.getElementById('FL_EXISTENCIAPT').disabled = true;
                document.getElementById('FSAG').disabled = true;
                document.getElementById('FSINSPECCION').disabled = true;
                document.getElementById('FS_EXISTENCIAPT').disabled = true;
                document.getElementById('FFRIGORIFICO').disabled = true;
                document.getElementById('FFRECEPCIONPT').disabled = true;
                document.getElementById('FFDESPACHO').disabled = true;
                document.getElementById('FFDPT').disabled = true;
                document.getElementById('FFDEX').disabled = true;                  
                document.getElementById('FFD_CONSOLIDADO').disabled = true; 
                document.getElementById('FFGUIA').disabled = true; 
                document.getElementById('FFGPT').disabled = true; 
                document.getElementById('FFPC').disabled = true;   
                document.getElementById('FFREPALETIZAJE').disabled = true; 
                document.getElementById('FF_EXISTENCIAPT').disabled = true; 
                document.getElementById('FHISTORIAL').disabled = true; 
                document.getElementById('FENVASES').disabled = true; 
                document.getElementById('FGENVASES').disabled = true;
            }
        }

        function todoFruta(){
            FRUTATODO = document.getElementById('FRUTATODO').checked;
            if(FRUTATODO==true){
                

            }
        }

      
    
        function validacion() {

            TUSUARIO = document.getElementById("TUSUARIO").selectedIndex;
            document.getElementById('val_tusuario').innerHTML = "";

  
            if (TUSUARIO == null || TUSUARIO == 0) {
                document.form_reg_dato.TUSUARIO.focus();
                document.form_reg_dato.TUSUARIO.style.borderColor = "#FF0000";
                document.getElementById('val_tusuario').innerHTML = "NO HA SELECCIONADO NINGUNA ALTERNATIVA";
                return false;
            }
            document.form_reg_dato.TUSUARIO.style.borderColor = "#4AF575";

        }


        function irPagina(url) {
            location.href = "" + url;
        }


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
        <?php //include_once "../config/menu.php"; ?>
        <div class="content-wrapper">
            <div class="container-full">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">Privilegio Tipo Usuario</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Usuario</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="registroUsuario.php">Privilegio Tipo Usuario </a>
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
                                <form class="form" role="form"  name="form_reg_dato" >
                                    <div class="box-body">
                                        <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Registro
                                        </h4>
                                        <hr class="my-15">                                        
                                        <div class="row">
                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Tipo Usuario</label>
                                                    <select class="form-control select2" id="TUSUARIO" name="TUSUARIO" style="width: 100%;"  value="<?php echo $TUSUARIO; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYTUSUARIOS as $r) : ?>
                                                            <?php if ($ARRAYTUSUARIOS) {    ?>
                                                                <option value="<?php echo $r['ID_TUSUARIO']; ?>" <?php if ($TUSUARIO == $r['ID_TUSUARIO']) { echo "selected";  } ?>>
                                                                    <?php echo $r['NOMBRE_TUSUARIO'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_tusuario" class="validacion"> </label>
                                                </div>
                                            </div>
                                        </div>                                       
                                        <fieldset>
                                            <legend>Fruta  </legend> 
                                            <div class="row">                                                
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FRUTA" name="FRUTA"  class="filled-in chk-col-primary" onchange="fruta()" <?php echo $FRUTA;?> >
                                                    <label for="FRUTA">Fruta</label>	
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FRUTATODO" name="FRUTATODO" class="filled-in chk-col-danger" onchange="todoFruta()"  <?php echo $FRUTATODO;?> <?php echo $DISABLED2;?> >
                                                    <label for="FRUTATODO">Selecionar Todo</label>                                        
                                                </div>
                                            </div> 
                                            <hr>        
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FGRANEL" name="FGRANEL"   class="filled-in chk-col-success" <?php echo $FGRANEL;?> <?php echo $DISABLED2;?>>
                                                    <label for="FGRANEL">Granel</label>	
                                                </div>
                                            </div>                                                        
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FGRECEPCION" name="FGRECEPCION"   class="filled-in chk-col-info"<?php echo $FGRECEPCION;?> <?php echo $DISABLED2;?> >
                                                    <label for="FGRECEPCION">Recepción</label>	
                                                </div> 
                                            </div>                                                                                           
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FGRMP" name="FGRMP"   class="filled-in chk-col-warning" <?php echo $FGRMP;?> <?php echo $DISABLED2;?>>
                                                    <label for="FGRMP">Materia Prima</label>	
                                                </div>                                                                                  
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FGRIND" name="FGRIND"   class="filled-in chk-col-warning" <?php echo $FGRIND;?> <?php echo $DISABLED2;?>>
                                                    <label for="FGRIND">Industrial</label>	
                                                </div>                                                                                                                          
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FGR_CONSOLIDADO" name="FGR_CONSOLIDADO"   class="filled-in chk-col-warning"<?php echo $FGR_CONSOLIDADO;?> <?php echo $DISABLED2;?> >
                                                    <label for="FGR_CONSOLIDADO">Consolidado</label>	
                                                </div>
                                            </div>                                                                                           
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FGDESPACHO" name="FGDESPACHO"   class="filled-in chk-col-info" <?php echo $FGDESPACHO;?> <?php echo $DISABLED2;?>>
                                                    <label for="FGDESPACHO">Despacho</label>	
                                                </div>   
                                            </div>                                                                                           
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FGDMP" name="FGDMP"   class="filled-in chk-col-warning" <?php echo $FGDMP;?> <?php echo $DISABLED2;?>>
                                                    <label for="FGDMP">Materia Prima</label>	
                                                </div>                                                                                  
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FGDIND" name="FGDIND"   class="filled-in chk-col-warning" <?php echo $FGDIND;?> <?php echo $DISABLED2;?>>
                                                    <label for="FGDIND">Industrial</label>	
                                                </div>                                                                                                                          
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FGD_CONSOLIDADO" name="FGD_CONSOLIDADO"   class="filled-in chk-col-warning" <?php echo $FGD_CONSOLIDADO;?> <?php echo $DISABLED2;?>>
                                                    <label for="FGD_CONSOLIDADO">Consolidado</label>	
                                                </div>
                                            </div>                                                                                                                              
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FGGUIA" name="FGGUIA"   class="filled-in chk-col-info"  <?php echo $FGGUIA;?> <?php echo $DISABLED2;?> >
                                                    <label for="FGGUIA">Guia Por Recibir</label>	
                                                </div>  
                                            </div>                                                                                       
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FGGMP" name="FGGMP"   class="filled-in chk-col-warning"  <?php echo $FGGMP;?> <?php echo $DISABLED2;?> >
                                                    <label for="FGGMP">Materia Prima</label>	
                                                </div>                                                                                  
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FGGIND" name="FGGIND"   class="filled-in chk-col-warning"  <?php echo $FGGIND;?> <?php echo $DISABLED2;?> >
                                                    <label for="FGGIND">Industrial</label>	
                                                </div>  
                                            </div>                                                                                         
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FG_EXISTENCIAMP" name="FG_EXISTENCIAMP"   class="filled-in chk-col-info"   <?php echo $FG_EXISTENCIAMP;?> <?php echo $DISABLED2;?>>
                                                    <label for="FG_EXISTENCIAMP">Existencia Materia Prima</label>	
                                                </div>                                                                                  
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FG_EXISTENCIAIND" name="FG_EXISTENCIAIND"   class="filled-in chk-col-info"   <?php echo $FG_EXISTENCIAIND;?> <?php echo $DISABLED2;?>>
                                                    <label for="FG_EXISTENCIAIND">Existencia Industrial</label>	
                                                </div>  
                                            </div>                                         
                                            <div class="row">                                                
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FPACKING" name="FPACKING" class="filled-in chk-col-success"  <?php echo $FPACKING;?> <?php echo $DISABLED2;?> >
                                                    <label for="FPACKING">Packing</label>	
                                                </div>
                                            </div>                                                                                        
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FPPROCESO" name="FPPROCESO" class="filled-in chk-col-info"   <?php echo $FPPROCESO;?> <?php echo $DISABLED2;?>>
                                                    <label for="FPPROCESO">Proceso</label>	
                                                </div>                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FPREEMBALAJE"  name="FPREEMBALAJE" class="filled-in chk-col-info"   <?php echo $FPREEMBALAJE;?> <?php echo $DISABLED2;?> >
                                                    <label for="FPREEMBALAJE">Reembalaje</label>                                        
                                                </div>
                                            </div>                                                                                 
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FP_EXISTENCIAMP"  name="FP_EXISTENCIAMP" class="filled-in chk-col-info"    <?php echo $FP_EXISTENCIAMP;?> <?php echo $DISABLED2;?> >
                                                    <label for="FP_EXISTENCIAMP">Existencia Materia Prima</label>	
                                                </div>                                                                                  
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FP_EXISTENCIAIND"  name="FP_EXISTENCIAIND" class="filled-in chk-col-info"    <?php echo $FP_EXISTENCIAIND;?> <?php echo $DISABLED2;?> >
                                                    <label for="FP_EXISTENCIAIND">Existencia Industrial</label>	
                                                </div>                                                                                 
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FP_EXISTENCIAPT" name="FP_EXISTENCIAPT" class="filled-in chk-col-info"    <?php echo $FP_EXISTENCIAPT;?> <?php echo $DISABLED2;?> >
                                                    <label for="FP_EXISTENCIAPT">Existencia Producto Terminado</label>	
                                                </div>  
                                            </div>                                        
                                            <div class="row">                                                
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FLOGISTICA" name="FLOGISTICA" class="filled-in chk-col-success" <?php echo $FLOGISTICA;?> <?php echo $DISABLED2;?> >
                                                    <label for="FLOGISTICA">Logistica</label>	
                                                </div>
                                            </div>                                                                                                            
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FLICARGA" name="FLICARGA" class="filled-in chk-col-info"  <?php echo $FLICARGA;?> <?php echo $DISABLED2;?> >
                                                    <label for="FLICARGA">Instructivo Carga</label>	
                                                </div>                                                                                   
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FL_EXISTENCIAPT"  name="FL_EXISTENCIAPT"class="filled-in chk-col-info"  <?php echo $FL_EXISTENCIAPT;?> <?php echo $DISABLED2;?> >
                                                    <label for="FL_EXISTENCIAPT">Existencia Producto Terminado</label>	
                                                </div>  
                                            </div>                                       
                                            <div class="row">                                                
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FSAG"  name="FSAG"class="filled-in chk-col-success"   <?php echo $FSAG;?> <?php echo $DISABLED2;?> >
                                                    <label for="FSAG">Operaciónes Sag</label>	
                                                </div>
                                            </div>                                                                                                            
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FSINSPECCION"  name="FSINSPECCION"class="filled-in chk-col-info"    <?php echo $FSINSPECCION;?> <?php echo $DISABLED2;?>>
                                                    <label for="FSINSPECCION">Inspeccion Sag</label>	
                                                </div>                                                                                   
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FS_EXISTENCIAPT"  id="FS_EXISTENCIAPT"class="filled-in chk-col-info"     <?php echo $FS_EXISTENCIAPT;?> <?php echo $DISABLED2;?> >
                                                    <label for="FS_EXISTENCIAPT">Existencia Producto Terminado</label>	
                                                </div>  
                                            </div>                                       
                                            <div class="row">                                                
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FFRIGORIFICO"  name="FFRIGORIFICO"class="filled-in chk-col-success"     <?php echo $FFRIGORIFICO;?> <?php echo $DISABLED2;?> >
                                                    <label for="FFRIGORIFICO">Frigorifico</label>	
                                                </div>
                                            </div>                                                                                                                                              
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FFRECEPCIONPT" name="FFRECEPCIONPT" class="filled-in chk-col-info"      <?php echo $FFRECEPCIONPT;?> <?php echo $DISABLED2;?> >
                                                    <label for="FFRECEPCIONPT">Recepción Producto Terminado</label>	
                                                </div>   
                                            </div>                                                                                                                                                                                        
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FFDESPACHO"  name="FFDESPACHO" class="filled-in chk-col-info"    <?php echo $FFDESPACHO;?> <?php echo $DISABLED2;?> >
                                                    <label for="FFDESPACHO">Despacho</label>	
                                                </div>   
                                            </div>                                                                                                                                        
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FFDPT"  name="FFDPT" class="filled-in chk-col-warning"   <?php echo $FFDPT;?> <?php echo $DISABLED2;?>>
                                                    <label for="FFDPT">Producto Terminado</label>	
                                                </div>                                                                                  
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FFDEX"  name="FFDEX" class="filled-in chk-col-warning"   <?php echo $FFDEX;?> <?php echo $DISABLED2;?>>
                                                    <label for="FFDEX">Exportación</label>	
                                                </div>                                                                                                                          
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FFD_CONSOLIDADO"  name="FFD_CONSOLIDADO" class="filled-in chk-col-warning"   <?php echo $FFD_CONSOLIDADO;?> <?php echo $DISABLED2;?> >
                                                    <label for="FFD_CONSOLIDADO">Consolidado</label>	
                                                </div>
                                            </div>                                                                                                                                                                  
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FFGUIA"  name="FFGUIA" class="filled-in chk-col-info"   <?php echo $FFGUIA;?> <?php echo $DISABLED2;?> >
                                                    <label for="FFGUIA">Guia Por Recibir</label>	
                                                </div>  
                                            </div>                                                                                       
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FFGPT"  name="FFGPT" class="filled-in chk-col-warning"    <?php echo $FFGPT;?> <?php echo $DISABLED2;?> >
                                                    <label for="FFGPT">Producto Terminado</label>	
                                                </div>
                                            </div>                                                                                                                                                                                        
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FFPC"  name="FFPC" class="filled-in chk-col-info"   <?php echo $FFPC;?> <?php echo $DISABLED2;?>>
                                                    <label for="FFPC">Planificador Carga</label>	
                                                </div>                                         
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FFREPALETIZAJE"  name="FFREPALETIZAJE" class="filled-in chk-col-info"   <?php echo $FFREPALETIZAJE;?> <?php echo $DISABLED2;?>>
                                                    <label for="FFREPALETIZAJE">Repaletizaje</label>	
                                                </div>                                                                                     
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FF_EXISTENCIAPT"  name="FF_EXISTENCIAPT"  class="filled-in chk-col-info"   <?php echo $FF_EXISTENCIAPT;?> <?php echo $DISABLED2;?> >
                                                    <label for="FF_EXISTENCIAPT">Existencia Producto Terminado</label>	
                                                </div>   
                                            </div>                                                                                 
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FHISTORIAL" name="FHISTORIAL" class="filled-in chk-col-success"   <?php echo $FHISTORIAL;?> <?php echo $DISABLED2;?>>
                                                    <label for="FHISTORIAL">Historial</label>	
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FENVASES" name="FENVASES" class="filled-in chk-col-success"   <?php echo $FENVASES;?> <?php echo $DISABLED2;?>>
                                                    <label for="FENVASES">Envases</label>                                        
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FGENVASES" name="FGENVASES" class="filled-in chk-col-success"   <?php echo $FGENVASES;?> <?php echo $DISABLED2;?>>
                                                    <label for="FGENVASES">Gestión Envases</label>                                        
                                                </div>
                                            </div> 
                                        </fieldset>                    
                                        <fieldset >
                                            <legend>Material  </legend> 
                                            <div class="row">                                                
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MATERIAL" name="MATERIAL" class="filled-in chk-col-primary"    <?php echo $MATERIAL;?>  >
                                                    <label for="MATERIAL">Material</label>	
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MATERIALTODO"  name="MATERIALTODO" class="filled-in chk-col-danger"    <?php echo $MATERIALTODO;?> <?php echo $DISABLED2;?> >
                                                    <label for="MATERIALTODO">Selecionar Todo</label>                                        
                                                </div>
                                            </div>   
                                            <hr>                                   
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MMATERIAL"  name="MMATERIAL"class="filled-in chk-col-success"     <?php echo $MMATERIAL;?> <?php echo $DISABLED2;?>>
                                                    <label for="MMATERIAL">Materiales</label>	
                                                </div>
                                            </div>                                                        
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MMRECEPCION"  name="MMRECEPCION" class="filled-in chk-col-info"     <?php echo $MMRECEPCION;?> <?php echo $DISABLED2;?>>
                                                    <label for="MMRECEPCION">Recepción</label>	
                                                </div>                                           
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MMDESPACHO"  name="MMDESPACHO" class="filled-in chk-col-info"     <?php echo $MMDESPACHO;?> <?php echo $DISABLED2;?>>
                                                    <label for="MMDESPACHO">Despacho</label>	
                                                </div>                                          
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MMGUIA"  name="MMGUIA" class="filled-in chk-col-info"     <?php echo $MMGUIA;?> <?php echo $DISABLED2;?>>
                                                    <label for="MMGUIA">Guia Por Recibir</label>	
                                                </div>                                          
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MMEXISTENCIA"  name="MMEXISTENCIA" class="filled-in chk-col-info"     <?php echo $MMEXISTENCIA;?> <?php echo $DISABLED2;?> >
                                                    <label for="MMEXISTENCIA">Existencia</label>	
                                                </div> 
                                            </div>                                     
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MENVASE" name="MENVASE" class="filled-in chk-col-success"      <?php echo $MENVASE;?> <?php echo $DISABLED2;?> >
                                                    <label for="MENVASE">Envases</label>	
                                                </div>
                                            </div>                                                      
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MERECEPCION" name="MERECEPCION"  class="filled-in chk-col-info"       <?php echo $MERECEPCION;?> <?php echo $DISABLED2;?> >
                                                    <label for="MERECEPCION">Recepción</label>	
                                                </div>                                           
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MMDESPACHO"  name="MMDESPACHO" class="filled-in chk-col-info"        <?php echo $MMDESPACHO;?> <?php echo $DISABLED2;?>>
                                                    <label for="MEDESPACHO">Despacho</label>	
                                                </div>                                          
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MEGUIA"  name="MEGUIA" class="filled-in chk-col-info"        <?php echo $MEGUIA;?> <?php echo $DISABLED2;?>>
                                                    <label for="MEGUIA">Guia Por Recibir</label>	
                                                </div>                                          
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MEEXISTENCIA"  name="MEEXISTENCIA" class="filled-in chk-col-info"        <?php echo $MEEXISTENCIA;?> <?php echo $DISABLED2;?>>
                                                    <label for="MEEXISTENCIA">Existencia</label>	
                                                </div> 
                                            </div>                                  
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MCONSOLIDADO"  name="MCONSOLIDADO" class="filled-in chk-col-success"         <?php echo $MCONSOLIDADO;?> <?php echo $DISABLED2;?>>
                                                    <label for="MCONSOLIDADO">Consolidado</label>	
                                                </div>
                                            </div>                                                      
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MCRECEPCION" name="MCRECEPCION" class="filled-in chk-col-info"          <?php echo $MCRECEPCION;?> <?php echo $DISABLED2;?>>
                                                    <label for="MCRECEPCION">Recepción</label>	
                                                </div>                                           
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MCDESPACHO"  name="MCDESPACHO"  class="filled-in chk-col-info"           <?php echo $MCDESPACHO;?> <?php echo $DISABLED2;?>>
                                                    <label for="MCDESPACHO">Despacho</label>	
                                                </div>  
                                            </div>                                   
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MADMINISTRACION"  name="MADMINISTRACION"  class="filled-in chk-col-success" <?php echo $MADMINISTRACION;?> <?php echo $DISABLED2;?>>
                                                    <label for="MADMINISTRACION">Administración</label>	
                                                </div>
                                            </div>                                                       
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MAOC"  name="MAOC" class="filled-in chk-col-info"  <?php echo $MAOC;?> <?php echo $DISABLED2;?>>
                                                    <label for="MAOC">Orden de Compra</label>	
                                                </div>                                           
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MAOC_AR"  name="MAOC_AR" class="filled-in chk-col-info"  <?php echo $MAOC_AR;?> <?php echo $DISABLED2;?>>
                                                    <label for="MAOC_AR">OC Aprobar/Rechazar</label>	
                                                </div>                                          
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MAOC_EXISTENCIAM"  name="MAOC_EXISTENCIAM" class="filled-in chk-col-info"  <?php echo $MAOC_EXISTENCIAM;?> <?php echo $DISABLED2;?>>
                                                    <label for="MAOC_EXISTENCIAM">Guia Por Recibir</label>	
                                                </div>                                          
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MAOC_EXISTENCIAE"  name="MAOC_EXISTENCIAE" class="filled-in chk-col-info"  <?php echo $MAOC_EXISTENCIAE;?> <?php echo $DISABLED2;?>>
                                                    <label for="MAOC_EXISTENCIAE">Existencia</label>	
                                                </div> 
                                            </div>                                  
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MKARDEX"  name="MKARDEX" class="filled-in chk-col-success"   <?php echo $MKARDEX;?> <?php echo $DISABLED2;?>>
                                                    <label for="MKARDEX">Kardex</label>	
                                                </div>
                                            </div>                                                      
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MKMATERIAL"  name="MKMATERIAL" class="filled-in chk-col-info"    <?php echo $MKMATERIAL;?> <?php echo $DISABLED2;?>>
                                                    <label for="MKMATERIAL">Material</label>	
                                                </div>                                           
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MKENVASE"  name="MKENVASE" class="filled-in chk-col-info"    <?php echo $MKENVASE;?> <?php echo $DISABLED2;?>>
                                                    <label for="MKENVASE">Envases</label>	
                                                </div>  
                                            </div>  
                                        </fieldset>                       
                                        <fieldset>    
                                            <legend>Exportadora  </legend>                                         
                                            <div class="row">                                                
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="EXPORTADORA" name="EXPORTADORA"  class="filled-in chk-col-primary"  <?php echo $EXPORTADORA;?> >
                                                    <label for="EXPORTADORA">Exportadora</label>	
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="EXPORTADORATODO"  name="EXPORTADORATODO" class="filled-in chk-col-danger"  <?php echo $EXPORTADORATODO;?> <?php echo $DISABLED2;?>>
                                                    <label for="EXPORTADORATODO">Selecionar Todo</label>                                        
                                                </div>
                                            </div>                  
                                            <hr>                   
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="ELOGISTICA"  name="ELOGISTICA" class="filled-in chk-col-success"   <?php echo $ELOGISTICA;?> <?php echo $DISABLED2;?>>
                                                    <label for="ELOGISTICA">Logistica</label>	
                                                </div>
                                            </div>                                                     
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="ELICARGA"  name="ELICARGA" class="filled-in chk-col-info"   <?php echo $ELICARGA;?> <?php echo $DISABLED2;?>>
                                                    <label for="ELICARGA">Instructivo Carga</label>	
                                                </div> 
                                            </div>                                      
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="EMATERIAL"  name="EMATERIAL" class="filled-in chk-col-success"   <?php echo $EMATERIAL;?> <?php echo $DISABLED2;?>>
                                                    <label for="EMATERIAL">Materiales</label>	
                                                </div> 
                                            </div>                                                                              
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="EMFICHA"  name="EMFICHA" class="filled-in chk-col-warning"   <?php echo $EMFICHA;?> <?php echo $DISABLED2;?>>
                                                    <label for="EMFICHA">Ficha Consumo</label>	
                                                </div>   
                                            </div>                                                                                 
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="EINFORME"  name="EINFORME" class="filled-in chk-col-success"   <?php echo $EINFORME;?> <?php echo $DISABLED2;?>>
                                                    <label for="EINFORME">Informe</label>	
                                                </div>
                                            </div>                                                    
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="EIGRANEL"  name="EIGRANEL" class="filled-in chk-col-info"   <?php echo $EIGRANEL;?> <?php echo $DISABLED2;?>>
                                                    <label for="EIGRANEL">Granel</label>	
                                                </div>                                           
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="EIPT"  name="EIPT" class="filled-in chk-col-info"   <?php echo $EIPT;?> <?php echo $DISABLED2;?>>
                                                    <label for="EIPT">Producto Terminado</label>	
                                                </div>                                           
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="EIGESTION"  name="EIGESTION" class="filled-in chk-col-info"   <?php echo $EIGESTION;?> <?php echo $DISABLED2;?>>
                                                    <label for="EIGESTION">Gestión</label>	
                                                </div> 
                                            </div>   
                                        </fieldset>
                                        <fieldset>
                                            <legend>Mantenedores </legend> 
                                            <div class="row">
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MANTENEDORES"  name="MANTENEDORES" class="filled-in chk-col-info"     <?php echo $MANTENEDORES;?>>
                                                    <label for="MANTENEDORES">Mantenedores</label>                                        
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MANTENEDORESTODO"  name="MANTENEDORESTODO" class="filled-in chk-col-danger"      <?php echo $MANTENEDORESTODO;?> <?php echo $DISABLED2;?>>
                                                    <label for="MANTENEDORESTODO">Selecionar Todo</label>                                        
                                                </div>
                                            </div>                 
                                            <hr>                   
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="M_REGISTRO"  name="M_REGISTRO" class="filled-in chk-col-success"     <?php echo $M_REGISTRO;?> <?php echo $DISABLED2;?>>
                                                    <label for="M_REGISTRO">Registro</label>	
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="M_EDITAR"  name="M_EDITAR" class="filled-in chk-col-danger"     <?php echo $M_EDITAR;?> <?php echo $DISABLED2;?>>
                                                    <label for="M_EDITAR">Editar</label>                                        
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="M_VER"  name="M_VER" class="filled-in chk-col-danger"     <?php echo $M_VER;?> <?php echo $DISABLED2;?>>
                                                    <label for="M_VER">Ver</label>                                        
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="M_INFORME"  name="M_INFORME" class="filled-in chk-col-danger"     <?php echo $M_INFORME;?> <?php echo $DISABLED2;?>>
                                                    <label for="M_INFORME">Informe</label>                                        
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="M_REPORTE"  name="M_REPORTE" class="filled-in chk-col-danger"     <?php echo $M_REPORTE;?> <?php echo $DISABLED2;?>>
                                                    <label for="M_REPORTE">Reporte</label>                                        
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="M_AGRUPADO"  name="M_AGRUPADO" class="filled-in chk-col-danger"     <?php echo $M_AGRUPADO;?> <?php echo $DISABLED2;?>>
                                                    <label for="M_AGRUPADO">Agrupado</label>                                        
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Otros </legend> 
                                            <div class="row">
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="AREGISTRO" name="AREGISTRO"  class="filled-in chk-col-info"     <?php echo $AREGISTRO;?> <?php echo $DISABLED;?>>
                                                    <label for="AREGISTRO">Apertura Registro</label>                                        
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroPtusuario.php'); ">
                                            <i class="ti-trash"></i> Cancelar
                                        </button>
                                        <?php if ($OP != "editar") { ?>
                                            <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                <i class="ti-save-alt"></i> Crear
                                            </button>
                                        <?php } else { ?>
                                            <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="EDITAR" value="EDITAR" onclick="return validacion()">
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
                                    <div class="row">

                                    </div>
                                    <table id="listar" class="table table-hover " style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Número</th>
                                                <th>Tipo Usuario</th>
                                                <th class="text-center">Operaciónes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($ARRAYPTUSUARIO as $r) : ?>
                                                <?php $CONTADOR=$CONTADOR+1;?>
                                                <tr class="center">
                                                    <td>
                                                        <a href="#" class="text-warning hover-warning">
                                                            <?php echo $CONTADOR; ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $r['ID_TUSUARIO']; ?></td>                                              
                                                    <td class="text-center">
                                                        <form method="post" id="form1">
                                                            <div class="list-icons d-inline-flex">
                                                                <div class="list-icons-item dropdown">
                                                                    <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown">
                                                                        <i class="glyphicon glyphicon-cog"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_PTUSUARIO']; ?>" />
                                                                        <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroPtusuario" />
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
                </section>
            <!-- /.content -->
            </div>
            <!--.row -->

        </div>
    </div>
    <?php include_once "../config/footer.php"; ?>
    <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <?php include_once "../config/urlBase.php"; ?>
</body>
</html>