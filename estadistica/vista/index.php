<?php
include_once "../../assest/config/validarUsuarioOpe.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once "../../assest/controlador/CONSULTA_ADO.php";


//INICIALIZAR CONTROLADOR
$CONSULTA_ADO =  NEW CONSULTA_ADO;
//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD


//INICIALIZAR ARREGLOS
$ARRAYLISTAREMPRESA="";
$ARRAYLISTARPLANTA="";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYLISTAREMPRESA=$EMPRESA_ADO->listarEmpresaCBX();
$ARRAYLISTARPLANTA=$PLANTA_ADO->listarPlantaPropiaCBX();

$ARRAYEXISTENCIAMP=$CONSULTA_ADO->existenciaDisponibleMp($TEMPORADAS);
$TOTALEXISTENCIAMP=$ARRAYEXISTENCIAMP[0]["NETO"];

$ARRAYRECEPCIONMP=$CONSULTA_ADO->acumuladoRecepcionMp($TEMPORADAS);
$TOTALRECECPCIOANDO=$ARRAYRECEPCIONMP[0]["NETO"];


$ARRAYPROCESADOMP=$CONSULTA_ADO->acumuladoProcesadoMp($TEMPORADAS);
$TOTALPROCESADO=$ARRAYPROCESADOMP[0]["NETO"];


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
        
        </script>
</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuOpera.php"; ?>
            <div class="content-wrapper">
                <div class="container-full">                   
                    <section class="content">
                        <div class="row">                      
                            <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 col-xs-12">				
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="box-title">Recepcion VS Proceso</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">                                            
                                            <table class="table  table-hover" style="width: 100%;" id="resumen">        
                                                <thead>             
                                                    <tr>
                                                        <th>Empresa/Planta</th>                           
                                                        <?php foreach ($ARRAYLISTARPLANTA as $s) : ?>                                
                                                            <th > <?php echo $s["NOMBRE_PLANTA"];?> <br> Recepcion   </th>                                    
                                                            <th > <?php echo $s["NOMBRE_PLANTA"];?> <br> Proceso  </th>                                                       
                                                        <?php endforeach; ?>
                                                        <th class="right">Total Recepción</th>  
                                                        <th class="left">Total Procesado</th>                                                          
                                                    </tr>   
                                                </thead>
                                                <tbody>                                                    
                                                <?php foreach ($ARRAYLISTAREMPRESA as $r) : ?>
                                                    <?php $ARRAYRECEPCIONMPEMPRESA=$CONSULTA_ADO->acumuladoRecepcionMpPorEmpresa($r["ID_EMPRESA"],$TEMPORADAS)?>
                                                    <?php $ARRAYPROCESADOMPEMPRESA=$CONSULTA_ADO->acumuladoProcesadoMpPorEmpresa($r["ID_EMPRESA"],$TEMPORADAS)?>
                                                        <tr >
                                                        <th> <?php echo $r["NOMBRE_EMPRESA"];?> </th>                    
                                                        <?php foreach ($ARRAYLISTARPLANTA as $s) : ?>     
                                                            <?php $ARRAYRECEPCIONMPEMPRESAPLANTA=$CONSULTA_ADO->acumuladoRecepcionMpPorEmpresaPlanta($r["ID_EMPRESA"],$s["ID_PLANTA"],$TEMPORADAS)?>  
                                                            <?php $ARRAYPROCESADOMPEMPRESAPLANTA=$CONSULTA_ADO->acumuladoProcesadoMpPorPlanta($r["ID_EMPRESA"],$s["ID_PLANTA"],$TEMPORADAS)?>  
                                                            <td><?php echo $ARRAYRECEPCIONMPEMPRESAPLANTA[0]["NETO"]; ?></td>
                                                            <td><?php echo $ARRAYPROCESADOMPEMPRESAPLANTA[0]["NETO"]; ?></td>                                                                                                                        
                                                        <?php endforeach; ?>    
                                                        <td><?php echo $ARRAYRECEPCIONMPEMPRESA[0]["NETO"]; ?></td>
                                                        <td><?php echo $ARRAYPROCESADOMPEMPRESAPLANTA[0]["NETO"]; ?></td>
                                                    </tr>    
                                                <?php endforeach; ?>       
                                                </tbody>
                                                <tfoot>                                                                                                         
                                                    <tr>
                                                        <th>Sub Total</th>                           
                                                        <?php foreach ($ARRAYLISTARPLANTA as $s) : ?>    
                                                            <?php $ARRAYRECEPCIONMPPLANTA=$CONSULTA_ADO->acumuladoRecepcionMpPorPlanta($s["ID_PLANTA"],$TEMPORADAS)?>      
                                                            <?php $ARRAYPROCESADOMPPLANTA=$CONSULTA_ADO->acumuladoProcesadoMpPorPlanta($s["ID_PLANTA"],$TEMPORADAS)?>      
                                                            <td><?php echo $ARRAYRECEPCIONMPPLANTA[0]["NETO"]; ?></td>
                                                            <td><?php echo $ARRAYPROCESADOMPPLANTA[0]["NETO"]; ?></td>
                                                        <?php endforeach; ?>  
                                                        <td><?php echo $TOTALRECECPCIOANDO;?> </td>
                                                        <td><?php echo $TOTALPROCESADO;?> </td>                                                                                                                  
                                                    </tr>  
                                                </tfoot>
                                            </table> 
                                        </div>                            
                                    </div>
                                </div>
                            </div>                                                            
                            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 col-xs-12">				
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="box-title">Existencia MP</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">                           
                                            <table class="table  table-hover" style="width: 100%;"  id="stockmp">        
                                                <thead>                                        
                                                    <tr>
                                                        <th>Empresa/Planta</th>                           
                                                        <?php foreach ($ARRAYLISTARPLANTA as $s) : ?>                                
                                                            <th> <?php echo $s["NOMBRE_PLANTA"];?> </th>                                                        
                                                        <?php endforeach; ?>
                                                        <th>Total</th>    
                                                    </tr>
                                                </thead>
                                                    <tbody>
                                                        <?php foreach ($ARRAYLISTAREMPRESA as $r) : ?>
                                                            <?php $ARRAYEXISTENCIAMPEMPRESA=$CONSULTA_ADO->existenciaDisponibleMpPorEmpresa($r["ID_EMPRESA"],$TEMPORADAS);?>    
                                                                    <tr >
                                                                        <th> <?php echo $r["NOMBRE_EMPRESA"];?> </th>                    
                                                                        <?php foreach ($ARRAYLISTARPLANTA as $s) : ?>    
                                                                            <?php $ARRAYEXISTENCIAMPEMPRESAPLANTA=$CONSULTA_ADO->existenciaDisponibleMpPorEmpresaPlanta($r["ID_EMPRESA"],$s["ID_PLANTA"],$TEMPORADAS);?>       
                                                                            <td><?php echo $ARRAYEXISTENCIAMPEMPRESAPLANTA[0]["NETO"]; ?></td>                                              
                                                                        <?php endforeach; ?>    
                                                                        <td><?php echo $ARRAYEXISTENCIAMPEMPRESA[0]["NETO"]; ?></td>                                                                                                    
                                                                    </tr>      
                                                        <?php endforeach; ?>                                                                                                 
                                                    </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Total</th>
                                                        <?php foreach ($ARRAYLISTARPLANTA as $s) : ?>  
                                                            <?php $ARRAYEXISTENCIAMPEMPRESAPLANTA=$CONSULTA_ADO->existenciaDisponibleMpPorPlanta($s["ID_PLANTA"],$TEMPORADAS);?> 
                                                            <td><?php echo $ARRAYEXISTENCIAMPEMPRESAPLANTA[0]["NETO"]; ?></td>                                                                                                         
                                                        <?php endforeach; ?>
                                                        <td><?php echo $TOTALEXISTENCIAMP;?> </td>
                                                    </tr>
                                                </tfoot>
                                            </table> 
                                        </div>                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>             
                </div>
            </div>    






            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
            <?php include_once "../../assest/config/footer.php"; ?>
            <?php include_once "../../assest/config/menuOperaExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
</body>

</html>