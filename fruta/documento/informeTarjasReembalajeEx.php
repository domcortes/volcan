<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../controlador/EMPRESA_ADO.php';


include_once '../controlador/TREEMBALAJE_ADO.php';
include_once '../controlador/DREXPORTACION_ADO.php';
include_once '../controlador/DRINDUSTRIAL_ADO.php';
include_once '../controlador/REEMBALAJE_ADO.php';

include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/CALIBRE_ADO.php';

include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/EINDUSTRIAL_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$EMPRESA_ADO = new EMPRESA_ADO();

$DREXPORTACION_ADO =  new DREXPORTACION_ADO();
$DRINDUSTRIAL_ADO =  new DRINDUSTRIAL_ADO();
$REEMBALAJE_ADO =  new REEMBALAJE_ADO();
$TREEMBALAJE_ADO =  new TREEMBALAJE_ADO();

$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$PVESPECIES_ADO =  new PVESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$CALIBRE_ADO =  new CALIBRE_ADO();

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$EINDUSTRIAL_ADO =  new EINDUSTRIAL_ADO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP="";
$NUMEROREEMBALAJE="";
$FECHAREEMBALAJE="";
$TIPOREEMBALAJE="";
$PRODUCTOR="";
$ESTANDAR="";

$VARIEDAD="";
$TURNO="";
$EMBOLSADO="";

$PRODUCTOR="";
$CSGPRODUCTOR="";
$NOMBREPRODUCTOR="";


$TOTALENVASEDEXPORTACION="";
$TOTALNETODEXPORTACION="";
$TOTALBRUTODEXPORTACION="";

$TOTALENVASEDINDUSTRIAL="";
$TOTALNETODINDUSTRIAL="";
$TOTALBRUTODINDUSTRIAL="";

$EMPRESA="";
$EMPRESAURL="";

$html='';

//INICIALIZAR ARREGLOS
$ARRAYVERTREEMBALAJE="";
$ARRAYVERPVESPECIES="";
$ARRAYVERVESPECIES="";

$ARRAYEMPRESA="";
$ARRAYREEMBALAJE="";

$ARRAYDEXPORTACION="";
$ARRAYDEXPORTACION2="";
$ARRAYDEXPORTACIONTOTALES = "";

$ARRAYDINDUSTRIAL="";
$ARRAYDINDUSTRIAL2="";
$ARRAYDINDUSTRIALTOTALES = "";
$ARRAYCALIBRE="";

if (isset($_REQUEST['parametro']) ) {
    $IDOP = $_REQUEST['parametro'];
    $NUMEROREEMBALAJE=$IDOP;
}


$ARRAYREEMBALAJE = $REEMBALAJE_ADO->verReembalaje3($NUMEROREEMBALAJE);

$ARRAYDEXPORTACION=$DREXPORTACION_ADO->buscarPorReembalaje2($NUMEROREEMBALAJE);
$ARRAYDEXPORTACIONTOTALES = $DREXPORTACION_ADO->obtenerTotales2($NUMEROREEMBALAJE);

$ARRAYDINDUSTRIAL=$DRINDUSTRIAL_ADO->buscarPorReembalaje2($NUMEROREEMBALAJE);
$ARRAYDINDUSTRIALTOTALES = $DRINDUSTRIAL_ADO->obtenerTotales2($NUMEROREEMBALAJE);

$FECHAREEMBALAJE=$ARRAYREEMBALAJE[0]['FECHA_REEMBALAJE'];

$ARRAYTREEMBALAJE=$TREEMBALAJE_ADO->verTreembalaje($ARRAYREEMBALAJE[0]['ID_TREEMBALAJE']);

$TIPOREEMBALAJE=$ARRAYTREEMBALAJE[0]['NOMBRE_TREEMBALAJE'];
if($ARRAYREEMBALAJE[0]['TURNO']==1){
    $TURNO="DIA";
}
if($ARRAYREEMBALAJE[0]['TURNO']==2){
    $TURNO="NOCHE";
}


$PRODUCTOR=$ARRAYREEMBALAJE[0]['ID_PRODUCTOR'];
$ARRAYPRODUCTOR=$PRODUCTOR_ADO->verProductor($PRODUCTOR);
$NOMBREPRODUCTOR=$ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
$CSGPRODUCTOR=$ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'];


$ARRAYEMPRESA=$EMPRESA_ADO->verEmpresa($ARRAYREEMBALAJE[0]['ID_EMPRESA']);
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
<title>Tarja Reembalaje </title>

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
//PRODUCTO TERMINADO

foreach ($ARRAYDEXPORTACION as $r) :

    $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);   
    $ARRAYVERPVESPECIESID = $PVESPECIES_ADO->verPvespecies($r['ID_PVESPECIES']);
    $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($ARRAYVERPVESPECIESID[0]['ID_VESPECIES']);  
    $ARRAYEVEEXPORTACIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
    $ARRAYCALIBRE=$CALIBRE_ADO->verCalibre($r['ID_CALIBRE']);
    if($r['EMBOLSADO']=="1"){
        $EMBOLSADO="SI";
    }
    if($r['EMBOLSADO']=="0"){
        $EMBOLSADO="NO";
    }


    $html=$html.'
    <div class="contenido" style="height:250px!important;">
		<div class="titulo" style="text-align: center; font-size: 15px; ">
             <b > 
                <img src="../vista/img/logo.png" width="100px" height="30px"/>
             </b>
             <br>
            <b> PRODUCTO TERMINADO : </b> <b class="center f30">  '.$r['FOLIO_DREXPORTACION'].' </b>	
		</div>		
		
		<div class="subtitulo2"></div>   
        <br>
		<div class="info ">
			<b> Estandar : </b>  '.$ARRAYEVEEXPORTACIONID[0]['NOMBRE_ESTANDAR'].'
		</div>
        	<div class="info ">
			<b> Total Envase : </b> '.$r['ENVASE'].'
		</div>		
		<div class="info ">
			<b>  Total Neto : </b>  '.$r['NETO'].'
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
            <th colspan="8" class="center color2"></th>
      </tr>
      <tr>
        <th class=" center">Fecha Embalado</th>
        <th class=" center ">CSG </th>
        <th class=" center ">Nombre Productor </th>
        <th class=" center">Cant. Envase</th>
        <th class=" center">Kilos Neto</th>
        <th class=" center">Calibre</th>
        <th class=" center ">Embolsado </th>
        <th class=" center ">Variedad </th>
      </tr>
    </thead>
     <tbody>
	 
    ';

    $html=$html.' 
    <tr >
        <td class="center"> '.$r['FECHA'].'</td>
        <td  class="center  ">'.$ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'].'</td>
        <td  class="center  ">'.$ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'].'</td>
        <td  class="center  ">'.$r['ENVASE'].'</td>
        <td  class="center ">'.$r['NETO'].'</td>
        <td  class="center  ">'.$ARRAYCALIBRE[0]['NOMBRE_CALIBRE'].'</td>
        <td  class="center  ">'.$EMBOLSADO.'</td>
        <td  class="center  ">'.$ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'].'</td>
    </tr>
    ';      
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

foreach ($ARRAYDINDUSTRIAL as $r) : 

    $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);    
    $ARRAYVERPVESPECIESID = $PVESPECIES_ADO->verPvespecies($r['ID_PVESPECIES']);
    $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($ARRAYVERPVESPECIESID[0]['ID_VESPECIES']);  
    $ARRAYEVEEXPORTACIONID = $EINDUSTRIAL_ADO->verEstandar($r['ID_ESTANDAR']);




    $html=$html.'
    <div class="contenido" style="height:250px!important;">
		<div class="titulo" style="text-align: center; font-size: 14px; ">
             <b > 
                <img src="../vista/img/logo.png" width="100px" height="30px"/>
             </b>
             <br>
            <b> PRODUCTO INDUSTRIAL : </b> <b class="center f30">  '.$r['FOLIO_DRINDUSTRIAL'].' </b>	
		</div>				
		<div class="subtitulo2"></div>   
		<div class="info ">
			<b> Numero Reembalaje : </b> '.$r['ID_REEMBALAJE'].'
		</div>		
		<div class="info ">
			<b> Estandar : </b>  '.$ARRAYEVEEXPORTACIONID[0]['NOMBRE_ESTANDAR'].'
		</div>
        <div class="info ">
			<b> Neto : </b>  '.$r['NETO'].'
		</div>
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

    $html=$html.' 
    <tr >
        <td class="center"> '.$r['FECHA'].'</td>
        <td  class="center  ">'.$ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'].'</td>
        <td  class="center  ">'.$ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'].'</td>
        <td  class="center ">'.$r['NETO'].'</td>
        <td  class="center  ">'.$ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'].'</td>
    </tr>
    ';  

    $html=$html.'
    </tbody>
  </table>
  
  ';

  $html=$html.'
  <br>
		<div class="subtitulo2"></div>       
        <div class=" center">
           <b style="font-size: 10px;">  '.$EMPRESA.' </b>
        </div>
      </div>  
	  <div class="salto" style=" page-break-after: always; border: none;   margin: 0;   padding: 0;"></div>  
    ';



endforeach; 






$html=$html.'
	
</body>
</html>


';


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




//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO="TarjaReembalaje_";
$FECHADOCUMENTO = $FECHANORMAL."_".$HORAFINAL;
$TIPODOCUMENTO="Tarja";
$FORMATO=".pdf";
$NOMBREARCHIVOFINAL=$NOMBREARCHIVO.$FECHADOCUMENTO.$FORMATO;

//CONFIGURACIOND DEL DOCUMENTO
$TIPOPAPEL="";
$ORIENTACION="";

//DETALLE DEL CREADOR DEL INFORME
$TIPOINFORME = "Tarja ";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Tarja Reembalaje";




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

$PDF->SetTitle($TIPOINFORME); //titulo pdf
$PDF->SetCreator($CREADOR); //CREADOR PDF
$PDF->SetAuthor($AUTOR); //AUTOR PDF
$PDF->SetSubject($ASUNTO); //ASUNTO PDF

//CONFIGURACION

//$PDF->simpleTables = true; 
//$PDF->packTableData = true;

//CONTENIDO PDF
$stylesheet = file_get_contents('../vista/css/stylePDF.css'); // carga archivo css
$stylesheet2 = file_get_contents('../vista/css/reset.css'); // carga archivo css
$PDF->WriteHTML($stylesheet, 1); 
$PDF->WriteHTML($stylesheet2, 1); 
$PDF->WriteHTML($html);


//$PDF->Output();
$PDF->Output($NOMBREARCHIVOFINAL, \Mpdf\Output\Destination::INLINE);

?>