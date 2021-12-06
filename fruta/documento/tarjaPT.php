<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/EXIINDUSTRIAL_ADO.php';
include_once '../controlador/REPALETIZAJEEX_ADO.php';
include_once '../controlador/DREPALETIZAJEEX_ADO.php';

include_once '../controlador/PROCESO_ADO.php';
include_once '../controlador/DPEXPORTACION_ADO.php';
include_once '../controlador/DPINDUSTRIAL_ADO.php';

include_once '../controlador/REEMBALAJE_ADO.php';
include_once '../controlador/DREXPORTACION_ADO.php';
include_once '../controlador/DRINDUSTRIAL_ADO.php';

include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/EINDUSTRIAL_ADO.php';

include_once '../controlador/FOLIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/TCALIBRE_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$EXIEXPORTACION_ADO= new EXIEXPORTACION_ADO();
$EXIINDUSTRIAL_ADO= new EXIINDUSTRIAL_ADO();
$REPALETIZAJEEX_ADO= new REPALETIZAJEEX_ADO();
$DREPALETIZAJEEX_ADO= new DREPALETIZAJEEX_ADO();


$PROCESO_ADO= new PROCESO_ADO();
$DPEXPORTACION_ADO= new DPEXPORTACION_ADO();
$DPINDUSTRIAL_ADO= new DPINDUSTRIAL_ADO();

$REEMBALAJE_ADO= new REEMBALAJE_ADO();
$DREXPORTACION_ADO= new DREXPORTACION_ADO();
$DRINDUSTRIAL_ADO= new DRINDUSTRIAL_ADO();


$EEXPORTACION_ADO= new EEXPORTACION_ADO();
$EINDUSTRIAL_ADO= new EINDUSTRIAL_ADO();

$TCALIBRE_ADO= new TCALIBRE_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$EMPRESA_ADO = new EMPRESA_ADO();
$VESPECIES_ADO = new VESPECIES_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NUMEROFOLIO="";
$NOMBREPRODUCTOR="";
$CSGPRODUCTOR="";
$NOMBRECALIBRE="";

$EMPRESA="";
$PLANTA="";
$TEMPORADA="";

$EMPRESA="";
$EMPRESAURL="";

//INICIALIZAR ARREGLOS
$ARRAYEXISTENCIA1 = "";
$ARRAYEXISTENCIA2 = "";
$ARRAYEXISTENCIAEXIEXPORTACION = "";
$ARRAYEXISTENCIAINDUSTRIAL = "";

$ARRAYEMPRESA = "";
$ARRAYCALIBRE="";
$ARRAYPRODUCTOR="";
$ARRAYPROCESO="";
$ARRAYEEXPORTACION="";
$ARRAYEINDUSTRIAL="";

$ARRAYREPALETIZAJE="";
$ARRAYDREPALETIZAJETOTALES="";
$ARRAYREEMBALAJE="";

$ARRAYDPEXPORTACION="";
$ARRAYDPEXPORTACIONTOTALES="";
$ARRAYDREXPORTACION="";
$ARRAYDREXPORTACIONTOTALES="";
$ARRAYDPINDUSTRIAL="";
$ARRAYDPINDUSTRIALTOTALES="";
$ARRAYDRINDUSTRIAL="";
$ARRAYDRINDUSTRIALTOTALES="";


if ($_REQUEST['NUMEROFOLIO'] && $_REQUEST['EMPRESA'] && $_REQUEST['PLANTA'] && $_REQUEST['TEMPORADA'] ) {
    $NUMEROFOLIO = $_REQUEST['NUMEROFOLIO'];
    $EMPRESA = $_REQUEST['EMPRESA'];
    $PLANTA = $_REQUEST['PLANTA'];
    $TEMPORADA = $_REQUEST['TEMPORADA'];
}


$ARRAYEXISTENCIA1 = $EXIEXPORTACION_ADO->buscarPorFolioEmpresaPlantaTemporada($NUMEROFOLIO, $EMPRESA , $PLANTA , $TEMPORADA );
$ARRAYEXISTENCIA2 = $EXIINDUSTRIAL_ADO->buscarPorFolioEmpresaPlantaTemporada($NUMEROFOLIO, $EMPRESA , $PLANTA , $TEMPORADA );




$ARRAYEMPRESA=$EMPRESA_ADO->verEmpresa($EMPRESA);
$EMPRESA=$ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
$EMPRESAURL=$ARRAYEMPRESA[0]['LOGO_EMPRESA'];

if($EMPRESAURL==""){
    $EMPRESAURL="img/empresa/no_disponible.png";
}


//OBTENCION DE LA FECHA
date_default_timezone_set('America/Santiago');
//SE LE PASA LA FECHA ACTUAL A UN ARREGLO
$ARRAYFECHADOCUMENTO =getdate();

//SE OBTIENE INFORMACION RELACIONADA CON LA HORA
$HORA="".$ARRAYFECHADOCUMENTO['hours'];
$MINUTO="".$ARRAYFECHADOCUMENTO['minutes'];
$SEGUNDO="".$ARRAYFECHADOCUMENTO['seconds'];
//EN CASO DE VALORES MENOS A 2 LENGHT, SE LE CONCATENA UN 0
if ($MINUTO < 10) {
    $MINUTO = "0".$MINUTO;
}
if ($SEGUNDO < 10) {
    $SEGUNDO = "0".$SEGUNDO;
}

// SE JUNTA LA INFORMAICON DE LA HORA Y SE LE DA UN FORMATO
$HORAFINAL=$HORA."".$MINUTO."".$SEGUNDO;
$HORAFINAL2=$HORA.":".$MINUTO.":".$SEGUNDO;

//SE OBTIENE INFORMACION RELACIONADA CON LA FECHA
$DIA="".$ARRAYFECHADOCUMENTO['mday'];

$MES="".$ARRAYFECHADOCUMENTO['mon'];
$ANO="".$ARRAYFECHADOCUMENTO['year'];
$NOMBREMES="".$ARRAYFECHADOCUMENTO['month'];
$NOMBREDIA="".$ARRAYFECHADOCUMENTO['weekday'];
//EN CASO DE VALORES MENOS A 2 LENGHT, SE LE CONCATENA UN 0
if ($DIA < 10) {
    $DIA = "0".$DIA;
}
//PARA TRAUDCIR EL MES AL ESPAÑOL
$MESESNOMBRES= array(
    "January" => "Enero",
    "February" => "Febrero",
    "March" => "Marzo",
    "April" => "Abril",
    "May" => "Mayo",
    "June" => "Junio",
    "July" => "Julio",
    "August" => "Agosto",
    "September" => "Septiembre",
    "October" => "Octubre",
    "November" => "Noviembre",
    "December" => "Diciembre"
); 
//PARA TRAUDCIR EL DIA AL ESPAÑOL
$DIASNOMBRES= array(
    "Monday" => "Lunes",
    "Tuesday" => "Martes",
    "Wednesday" => "Miércoles",
    "Thursday" => "Jueves",
    "Friday" => "Viernes",
    "Saturday" => "Sábado",
    "Sunday" => "Domingo"
); 

$NOMBREDIA = $DIASNOMBRES[$NOMBREDIA];
$NOMBREMES = $MESESNOMBRES[$NOMBREMES];
// SE JUNTA LA INFORMAICON DE LA FECHA Y SE LE DA UN FORMATO
$FECHANORMAL=$DIA."".$MES."".$ANO;
$FECHANOMBRE=$NOMBREDIA.", ".$DIA." de ".$NOMBREMES." del ".$ANO;



$html='
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tarja </title>
<style type="text/css">	
	{
		padding: 0px;
		border: 0px;
		margin: 0px;
	}
	div.contenido
	{
		width: calc(8cm - 22px);
		height: auto;
		border: solid 1px rgba(0,0,0,0.5);
		margin: 0 auto;
		padding: 2px 0px;
		overflow: hidden;
	}
	div.contenido div.titulo
	{
		width: 100%;
		height: auto;
		background-color: transparent;
		font-family: Helvetica;
		font-size: 15px;
		padding: 5px 0px 0px 0px;
	}
	div.contenido div.subtitulo
	{
		width: 100%;
		height: auto;
		background-color: transparent;
		font-family: Helvetica;
		font-size: 14px;
		font-weight: lighter;

	}
	div.contenido div.subtitulo2
	{
		width: 100%;
		height: auto;
		background-color: transparent;
		font-family: Helvetica;
		font-size: 12px;
		margin-bottom: 5px;
		text-decoration: underline;
		text-transform: uppercase;
		text-align: center;
		margin-top: 5px;
		border-top: dotted 1px black;
		padding-top: 5px;
	}
	div.contenido div.info
	{
		width: 100%;
		height: auto;
		background-color: transparent;
		font-family: Helvetica;
		font-size: 11px;
		padding: 0px 0px;
		text-align: justify;
		padding-left: 10px;
	}
	div.contenido div.valor
	{
		width: calc(100% - 2px);
		height: auto;
		background-color: transparent;
		font-family: Helvetica;
		font-size: 30px;
		padding: 5px 0px;
		text-align: right;
		border:solid 1px rgba(0,0,0,0.5);
		overflow: hidden;
		margin-top: 5px;
	}

	div.contenido div.valor span
	{
		width: 100%;
		height: auto;
		background-color: transparent;
		font-family: Helvetica;
		font-size: 16px;
		padding: 5px 0px;
		text-align: right;
	}
	b{
		/*text-transform: uppercase;*/
	}
	div.contenido div.desc
	{
		width: 100%;
		height: auto;
		background-color: transparent;
		font-family: Helvetica;
		font-size: 14px;
		padding: 5px 0px;
		text-align: justify;
	}
	div.contenido div.chip
	{
		width: calc(50% - 2px);
		height: 2cm;
		background-color: transparent;
		font-family: Helvetica;
		font-size: 14px;
		padding: 5px 0px;
		text-align: center;
		line-height: 2cm;
		float: left;
		border:solid 1px rgba(0,0,0,0.3);
	}

</style>

</head>

<body>
    

';

foreach ($ARRAYEXISTENCIA1 as $s) :
    
    $ARRAYPVESPECIES=$PVESPECIES_ADO->verPvespecies($s['ID_PVESPECIES']);
    $ARRAYVESPECIES=$VESPECIES_ADO->verVespecies($ARRAYPVESPECIES[0]['ID_VESPECIES']);
    $ARRAYEEXPORTACION=$EEXPORTACION_ADO->verEstandar($s['ID_ESTANDAR']);
	

	$ARRAYPRODUCTOR=$PRODUCTOR_ADO->obtenerNombreTarja($s['ID_PRODUCTOR']);
	$ARRAYEXISTENCIAEXIEXPORTACION = $EXIEXPORTACION_ADO->buscarPorFolio2($s['FOLIO_AUXILIAR_EXIEXPORTACION']);  

	if($s['ID_PROCESO'] !=NULL && $s['ID_REPALETIZAJE'] == NULL && $s['ID_REEMBALAJE'] == NULL){
		$ARRAYPROCESO = $PROCESO_ADO->verProceso3($s['ID_PROCESO']);
		
		$ARRAYDPEXPORTACIONTOTALES = $DPEXPORTACION_ADO->obtenerTotales2AgrupadoFolio2($s['FOLIO_AUXILIAR_EXIEXPORTACION']); 
		$TOTALENVASE=$ARRAYDPEXPORTACIONTOTALES[0]['TOTAL_ENVASE'];
		$TOTALNETO=$ARRAYDPEXPORTACIONTOTALES[0]['TOTAL_NETO'];
		
	}
	if( $s['ID_REPALETIZAJE'] != NULL && $s['ID_REEMBALAJE'] == NULL){
		$ARRAYREPALETIZAJE = $REPALETIZAJEEX_ADO->verRepaletizaje2($s['ID_REPALETIZAJE']);	
		
		$ARRAYDREPALETIZAJETOTALES = $DREPALETIZAJEEX_ADO->obtenerTotales2AgrupadoFolio2($s['FOLIO_AUXILIAR_EXIEXPORTACION']); 
		$TOTALENVASE=$ARRAYDREPALETIZAJETOTALES[0]['TOTAL_ENVASE'];
		$TOTALNETO=$ARRAYDREPALETIZAJETOTALES[0]['TOTAL_NETO'];
	}
	if(  $s['ID_REEMBALAJE'] != NULL){
		$ARRAYREEMBALAJE= $REEMBALAJE_ADO->verReembalaje3($s['ID_REEMBALAJE']);	

		$ARRAYDREXPORTACIONTOTALES = $DREXPORTACION_ADO->obtenerTotales2AgrupadoFolio2($s['FOLIO_AUXILIAR_EXIEXPORTACION']); 
		$TOTALENVASE=$ARRAYDREXPORTACIONTOTALES[0]['TOTAL_ENVASE'];
		$TOTALNETO=$ARRAYDREXPORTACIONTOTALES[0]['TOTAL_NETO'];
	}


    $html=$html.'
    <div class="contenido" style="height:250px!important;">
		<div class="titulo" style="text-align: center; font-size: 14px; ">
             <b > 
                <img src="../vista/img/logo.png" width="100px" height="30px"/>
             </b>
             <br>
            <b> PRODUCTO TERMINADO : </b> <b class="center f30">  '.$s['FOLIO_AUXILIAR_EXIEXPORTACION'].' </b>	
		</div>				
		<div class="subtitulo2"></div>  
		<div class="info ">
			<b> Estandar : </b>  '.$ARRAYEEXPORTACION[0]['NOMBRE_ESTANDAR'].'
		</div>
		<div class="info ">
			<b> Total Envase : </b> '.$TOTALENVASE.'
		</div>
		<div class="info ">
			<b> Total Neto : </b>  '.$TOTALNETO.'
		</div>
		<div class="info ">
			<b>  </b>  
		</div>  
		<br>
		<div class="subtitulo2"></div>
  ';


if($s['ID_PROCESO'] !=NULL && $s['ID_REPALETIZAJE'] == NULL && $s['ID_REEMBALAJE'] == NULL){

	$html=$html.'   
	<table border="0" cellspacing="0" cellpadding="0" >
		<thead>   
		<tr>
				<th colspan="8" class="center color2"></th>
		</tr>
		<tr>
			<th class=" center">Fecha Embalado</th>
			<th class=" center ">CSG </th>
			<th class=" center ">Nombre Productor </th>
			<th class=" center">Cant. Envase</th>
			<th class=" center">Kilos Neto</th>
			<th class=" center ">Embolsado </th>
			<th class=" center ">Calibre </th>
			<th class=" center ">Variedad </th>
		</tr>
		</thead>
		<tbody>
		
		';

		foreach ($ARRAYEXISTENCIAEXIEXPORTACION as $s) :

			if($s['EMBOLSADO']=="1"){
				$EMBOLSADO="SI";
			}
			if($s['EMBOLSADO']=="0"){
				$EMBOLSADO="NO";
			}
			
			
			$ARRAYDPEXPORTACION=$DPEXPORTACION_ADO->buscarPorFolio($s['FOLIO_AUXILIAR_EXIEXPORTACION']);
		
			$ARRAYCALIBRE= $CALIBRE_ADO->verCalibre($ARRAYDPEXPORTACION[0]['ID_CALIBRE'] );
			$NOMBRECALIBRE=$ARRAYCALIBRE[0]['NOMBRE_CALIBRE'];


		$html=$html.' 
		<tr >
			<td class="center"> '.$s['FECHA'].'</td>
			<td  class="center  ">'.$ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'].'</td>
			<td  class="center  ">'.$ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'].'</td>
			<td  class="center  ">'.$s['ENVASE'].'</td>
			<td  class="center ">'.$s['NETO'].'</td>
			<td  class="center  ">'.$EMBOLSADO.'</td>
			<td  class="center  ">'.$NOMBRECALIBRE.'</td>
			<td  class="center  ">'.$ARRAYVESPECIES[0]['NOMBRE_VESPECIES'].'</td>
		</tr>
		';  

		endforeach; 

		
		
		$html=$html.'
		</tbody>
	</table>  
	';
}
  
if( $s['ID_REPALETIZAJE'] != NULL && $s['ID_REEMBALAJE'] == NULL){

		$html=$html.'   
		<table border="0" cellspacing="0" cellpadding="0" >
		  <thead>   
			<tr>
				  <th colspan="8" class="center color2"></th>
			</tr>
			<tr>
			  <th class=" center">Fecha Embalado</th>
			  <th class=" center ">CSG </th>
			  <th class=" center ">Nombre Productor </th>
			  <th class=" center">Cant. Envase</th>
			  <th class=" center">Kilos Neto</th>
			  <th class=" center ">Embolsado </th>
			  <th class=" center ">Variedad </th>
			</tr>
		  </thead>
		   <tbody>
		   
		  ';
	  
		  foreach ($ARRAYEXISTENCIAEXIEXPORTACION as $s) :
	  
			  if($s['EMBOLSADO']=="1"){
				  $EMBOLSADO="SI";
			  }
			  if($s['EMBOLSADO']=="0"){
				  $EMBOLSADO="NO";
			  }
			  
	  
		  $html=$html.' 
		  <tr >
			  <td class="center"> '.$s['FECHA'].'</td>
			  <td  class="center  ">'.$ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'].'</td>
			  <td  class="center  ">'.$ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'].'</td>
			  <td  class="center  ">'.$s['ENVASE'].'</td>
			  <td  class="center ">'.$s['NETO'].'</td>
			  <td  class="center  ">'.$EMBOLSADO.'</td>
			  <td  class="center  ">'.$ARRAYVESPECIES[0]['NOMBRE_VESPECIES'].'</td>
		  </tr>
		  ';  
	  
		  endforeach; 
	  
		  
		  
		  $html=$html.'
		  </tbody>
		</table>  
		';
}

if(  $s['ID_REEMBALAJE'] != NULL){

	$html=$html.'   
	<table border="0" cellspacing="0" cellpadding="0" >
		<thead>   
		<tr>
				<th colspan="8" class="center color2"></th>
		</tr>
		<tr>
			<th class=" center">Fecha Embalado</th>
			<th class=" center ">CSG </th>
			<th class=" center ">Nombre Productor </th>
			<th class=" center">Cant. Envase</th>
			<th class=" center">Kilos Neto</th>
			<th class=" center ">Embolsado </th>
			<th class=" center ">Calibre </th>
			<th class=" center ">Variedad </th>
		</tr>
		</thead>
		<tbody>
		
		';

		foreach ($ARRAYEXISTENCIAEXIEXPORTACION as $s) :

			if($s['EMBOLSADO']=="1"){
				$EMBOLSADO="SI";
			}
			if($s['EMBOLSADO']=="0"){
				$EMBOLSADO="NO";
			}
			
			$ARRAYDREXPORTACION=$DREXPORTACION_ADO->verDrexportacion($s['FOLIO_AUXILIAR_EXIEXPORTACION']);
		
			$ARRAYCALIBRE= $CALIBRE_ADO->verCalibre($ARRAYDREXPORTACION[0]['ID_CALIBRE'] );
			$NOMBRECALIBRE=$ARRAYCALIBRE[0]['NOMBRE_CALIBRE'];

		$html=$html.' 
		<tr >
			<td class="center"> '.$s['FECHA'].'</td>
			<td  class="center  ">'.$ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'].'</td>
			<td  class="center  ">'.$ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'].'</td>
			<td  class="center  ">'.$s['ENVASE'].'</td>
			<td  class="center ">'.$s['NETO'].'</td>
			<td  class="center  ">'.$EMBOLSADO.'</td>
			<td  class="center  ">'.$NOMBRECALIBRE.'</td>
			<td  class="center  ">'.$ARRAYVESPECIES[0]['NOMBRE_VESPECIES'].'</td>
		</tr>
		';  

		endforeach; 

		
		
		$html=$html.'
		</tbody>
	</table>  
	';

}


  $html=$html.'
		<div class="subtitulo2"></div>       
        <div class=" center">
           <b style="font-size: 10px;">  '.$EMPRESA.' </b>
        </div>
      </div>  
    ';
endforeach; 


foreach ($ARRAYEXISTENCIA2 as $s) :

	
    $ARRAYPVESPECIES=$PVESPECIES_ADO->verPvespecies($s['ID_PVESPECIES']);
    $ARRAYVESPECIES=$VESPECIES_ADO->verVespecies($ARRAYPVESPECIES[0]['ID_VESPECIES']);
    $ARRAYEINDUSTRIAL=$EINDUSTRIAL_ADO->verEstandar($s['ID_ESTANDAR']);
	$ARRAYPRODUCTOR=$PRODUCTOR_ADO->obtenerNombreTarja($s['ID_PRODUCTOR']);
	
	$ARRAYEXISTENCIAINDUSTRIAL = $EXIINDUSTRIAL_ADO->buscarPorFolio2($s['FOLIO_AUXILIAR_EXIINDUSTRIAL']);  

	if($s['ID_PROCESO'] !=NULL  && $s['ID_REEMBALAJE'] == NULL){
		$ARRAYPROCESO = $PROCESO_ADO->verProceso3($s['ID_PROCESO']);	
	}

	if(  $s['ID_REEMBALAJE'] != NULL){
		$ARRAYREEMBALAJE= $REEMBALAJE_ADO->verReembalaje3($s['ID_REEMBALAJE']);	
	}

    $html=$html.'
    <div class="contenido" style="height:250px!important;">
		<div class="titulo" style="text-align: center; font-size: 14px; ">
             <b > 
                <img src="../vista/img/logo.png" width="100px" height="30px"/>
             </b>
             <br>
            <b> PRODUCTO INDUSTRIAL : </b> <b class="center f30">  '.$s['FOLIO_AUXILIAR_EXIINDUSTRIAL'].' </b>	
		</div>		
		
		<div class="subtitulo2"></div>   
        <br>
		';

	if($s['ID_PROCESO'] !=NULL  && $s['ID_REEMBALAJE'] == NULL){
		$html=$html.'
		<div class="info ">
			<b> Numero Proceso : </b> '.$ARRAYPROCESO[0]['NUMERO_PROCESO'].'
		</div>	
		';
	}		
	if(  $s['ID_REEMBALAJE'] != NULL){
		$html=$html.'
		<div class="info ">
			<b> Numero Reembalaje : </b> '.$ARRAYREEMBALAJE['NUMERO_REEMBALAJE'].'
		</div>	
		';
	}
    $html=$html.'
		<div class="info ">
			<b> Estandar : </b>  '.$ARRAYEINDUSTRIAL[0]['NOMBRE_ESTANDAR'].'
		</div>
        <div class="info ">
            <b> Total Neto :  </b>   '.$s['NETO'].'
        </div>         
        <div class="info ">
			<b>  </b>  
		</div>
        <br>
		<div class="subtitulo2"></div>        
		';

		$html=$html.'   
		<table border="0" cellspacing="0" cellpadding="0" >
		  <thead>    
			<tr>
			  <th class=" center">Fecha Embalado</th>
			  <th class=" center ">CSG </th>
			  <th class=" center ">Nombre Productor </th>
			  <th class=" center">Kilos Neto</th>
			  <th class=" center ">Variedad </th>
			</tr>
		  </thead>
		   <tbody>
		  ';


		  foreach ($ARRAYEXISTENCIAINDUSTRIAL as $s) :

		  $html=$html.' 
		  <tr >
			  <td class="center"> '.$s['FECHA'].'</td>
			  <td  class="center  ">'.$ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'].'</td>
			  <td  class="center  ">'.$ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'].'</td>
			  <td  class="center ">'.$s['NETO'].'</td>
			  <td  class="center  ">'.$ARRAYVESPECIES[0]['NOMBRE_VESPECIES'].'</td>
		  </tr>
		  ';  
	  
		endforeach; 


		  $html=$html.'
		  </tbody>
		</table>
		
		';

		$html=$html.'
		<div class="subtitulo2"></div>       
        <div class=" center">
           <b style="font-size: 10px;">  '.$EMPRESA.' </b>
        </div>
      </div>  
    ';
endforeach; 


$html=$html.'	
</body>
</html>

';


$html=$html.'
';



//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO="TarjaPT_";
$FECHADOCUMENTO = $FECHANORMAL."_".$HORAFINAL;
$TIPODOCUMENTO="INFORME";
$FORMATO=".pdf";
$NOMBREARCHIVOFINAL=$NOMBREARCHIVO.$FECHADOCUMENTO.$FORMATO;

//CONFIGURACIOND DEL DOCUMENTO
$TIPOPAPEL="";
$ORIENTACION="";

//DETALLE DEL CREADOR DEL INFORME
$TIPOINFORME = "TARJA RECEPCION GRANEL";
$CREADOR = "USUARIO";
$AUTOR = "USUARIO";
$ASUNTO = "TARJA ";


//API DE GENERACION DE PDF
require_once '../api/mpdf/mpdf/autoload.php';
require_once '../api/mpdf/qrcode/autoload.php';

$PDF = new \Mpdf\Mpdf(['format'=>[150,100] ]);
//$PDF = new \Mpdf\Mpdf();
//$PDF = new \Mpdf\Mpdf(['format'=> 'Letter']);

//$mpdf=new mPDF('utf-8','A4');
//$mpdf=new mPDF('utf-8','A4');
//$mpdf=new mPDF('utf-8','A4-L');
//$mpdf=new mPDF('utf-8','A3');
//$mpdf=new mPDF('utf-8','Letter');
//$mpdf=new mPDF('utf-8','150mm 150mm');
//$mpdf=new mPDF('utf-8','11.69in 8.27in');
/*
$PDF->SetHTMLHeader('
    <table width="100%" >
        <tbody>
            <tr>
            </tr>
        </tbody>
    </table>
    <br>
    
');

$PDF->SetHTMLFooter('


    <table width="100%" >
        <tbody>
            <tr>
            </tr>
        </tbody>
    </table>
    
');
*/
$PDF->SetTitle($TIPOINFORME); //titulo pdf
$PDF->SetCreator($CREADOR); //CREADOR PDF
$PDF->SetAuthor($AUTOR); //AUTOR PDF
$PDF->SetSubject($ASUNTO); //ASUNTO PDF

//CONFIGURACION

//$PDF->simpleTables = true; 
//$PDF->packTableData = true;


$stylesheet = file_get_contents('../vista/css/stylePdf.css'); // carga archivo css
$stylesheet2 = file_get_contents('../vista/css/reset.css'); // carga archivo css
$PDF->WriteHTML($stylesheet, 1); 
$PDF->WriteHTML($stylesheet2, 1); 
$PDF->WriteHTML($html);
//$PDF->Output();
$PDF->Output($NOMBREARCHIVOFINAL, \Mpdf\Output\Destination::INLINE);

?>