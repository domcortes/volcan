<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../controlador/DRECEPCION_ADO.php';
include_once '../controlador/RECEPCION_ADO.php';
include_once '../controlador/FOLIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/ERECEPCION_ADO.php';
include_once '../controlador/TRECEPCION_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$DRECEPCION_ADO= new DRECEPCION_ADO();
$RECEPCION_ADO = new RECEPCION_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$EMPRESA_ADO = new EMPRESA_ADO();
$ERECEPCION_ADO =  new ERECEPCION_ADO();
$TRECEPCION_ADO =  new TRECEPCION_ADO();
$PVESPECIES_ADO = new PVESPECIES_ADO();
$VESPECIES_ADO = new VESPECIES_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP="";
$NUMERORECEPCION="";
$FECHARECEPCION="";
$NUMEROGUIA="";
$HORARECEPCION="";
$TOTALGUIA="";
$FECHAGUIA="";
$FOLIO="";
$PRODUCTOR="";
$ALIASFOLIO="";

$CODIGOPRODUCTOR="";
$NOMBREPRODUCTOR="";
$EMPRESA="";
$EMPRESAURL="";
$FOLIOBASE="";
$TOTALENVASE="";
$TOTALNETO="";
$TOTALBRUTO="";
$CSGPRODUCTOR="";
$TAMAÑO="";

//INICIALIZAR ARREGLOS
$ARRAYRECEPCION="";
$ARRAYDRECEPCION="";
$ARRAYFOLIO="";
$ARRAYEMPRESA="";
$ARRAYVESPECIES="";
$ARRAYPVESPECIES="";
$ARRAYEEXPORTACION="";
$ARRAYPRODUCTOR="";
$ARRAYPRODUCTOR2="";
$ARRAYTIPO="";

if (isset($_REQUEST['parametro']) ) {
    $IDOP = $_REQUEST['parametro'];
}

$ARRAYRECEPCION = $RECEPCION_ADO->verRecepcion2($IDOP);
$ARRAYDRECEPCION = $DRECEPCION_ADO->buscarPorIdRecepcion2($IDOP); 

$NUMERORECEPCION=$ARRAYRECEPCION[0]['NUMERO_RECEPCION'];
$FECHARECEPCION=$ARRAYRECEPCION[0]['FECHA_RECEPCIONR'];
$HORARECEPCION=$ARRAYRECEPCION[0]['HORA_RECEPCION'];
$NUMEROGUIA=$ARRAYRECEPCION[0]['NUMERO_GUIA_RECEPCION'];
$FECHAGUIA=$ARRAYRECEPCION[0]['FECHA_GUIA_RECEPCION'];
$TOTALGUIA=$ARRAYRECEPCION[0]['TOTAL_GUIA'];
$PRODUCTOR=$ARRAYRECEPCION[0]['ID_PRODUCTOR'];
$ARRAYTIPO=$TRECEPCION_ADO->verTrecepcion($ARRAYRECEPCION[0]['ID_TRECEPCION']);
$TIPO=$ARRAYTIPO[0]['NOMBRE_TRECEPCION'];



$ARRAYPRODUCTOR=$PRODUCTOR_ADO->verProductor($PRODUCTOR);

$ARRAYPRODUCTOR2=$PRODUCTOR_ADO->obtenerNombreTarja($PRODUCTOR);
$NOMBREPRODUCTOR=$ARRAYPRODUCTOR2[0]['NOMBRE_CORTADO'];
$CSGPRODUCTOR=$ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'];


$ARRAYFOLIO=$FOLIO_ADO->verFolio($FOLIO);
//$ALIASFOLIO=$ARRAYDRECEPCION[0]['ALIAS_FOLIO_DRECEPCION'];
$ARRAYEMPRESA=$EMPRESA_ADO->verEmpresa($ARRAYRECEPCION[0]['ID_EMPRESA']);
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
<title>Tarja Recepcion Granel</title>

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


foreach ($ARRAYDRECEPCION as $s) :
    
    $ARRAYPVESPECIES=$PVESPECIES_ADO->verPvespecies($s['ID_PVESPECIES']);
    $ARRAYVESPECIES=$VESPECIES_ADO->verVespecies($ARRAYPVESPECIES[0]['ID_VESPECIES']);
    $ARRAYEEXPORTACION=$ERECEPCION_ADO->verEstandar($s['ID_ESTANDAR']);


    $html=$html.'
    <div class="contenido" style="height:250px!important;">
		<div class="titulo" style="text-align: center; font-size: 14; ">
             <b > 
				 <img src="../vista/img/logo.png" width="100px" height="30px"/>
			</b>
             <br>
             <b> '.$TIPO.'</b>	
		</div>		
		<div class="subtitulo2">
			<b style="font-size:11;"></b>
		</div>

		<div class="info">
			<b> Numero Recepcion : </b> '.$NUMERORECEPCION.'
		</div>
		<div class="info">
			<b> Numero guia : </b>  '.$NUMEROGUIA.'
		</div>
		<div class="info">
			<b> Fecha Recepcion : </b>  '.$FECHARECEPCION.'
		</div>
		<div class="info">
			<b> CSG: </b>  '.$CSGPRODUCTOR.'
		</div>
        <br>
		<div class="subtitulo2"></div>
        
        <br>
  ';
    if(strlen($NOMBREPRODUCTOR)<="19"){
        $TAMAÑO="f25";
    }
    if(strlen($NOMBREPRODUCTOR)>"19" && strlen($NOMBREPRODUCTOR)<="25"){
        $TAMAÑO="f20";
    }    
    if(strlen($NOMBREPRODUCTOR)>"25" && strlen($NOMBREPRODUCTOR)<="42"){
        $TAMAÑO="f15";
    }
    if(strlen($NOMBREPRODUCTOR)>"42" && strlen($NOMBREPRODUCTOR)<="61"){
        $TAMAÑO="f10";
    }
	if(strlen($NOMBREPRODUCTOR)>"61" && strlen($NOMBREPRODUCTOR)<="70"){
        $TAMAÑO="f9";
    }

  $html=$html.'
		<div class="'.$TAMAÑO.' center " width="100%">
			<b >'.$NOMBREPRODUCTOR.' </b> 
		</div>
       
		<br>

		<div class="subtitulo2"></div>

		<div class="info justify">
			<b> Fecha Cosecha : </b>  '.$s['FECHA_COSECHA_DRECEPCIONR'].'
		</div>
        <br>
		<div class="info justify">
			<b> Estandar : </b>  '.$ARRAYEEXPORTACION[0]['NOMBRE_ESTANDAR'].'
		</div>
        <br>
		<div class="info justify">
			<b> Kilos Brutos : </b>  '.$s['BRUTO'].'
		</div>
        <br>

		<div class="subtitulo2"></div>
	
        <div class=" center">
           Kilos Neto  
        </div>
        <div class="f20 center">
            <b> '.$s['NETO'].' </b> 
        </div>
        <br>
        <div class=" center">
             N° Folio   
        </div>        
        <div class="f30 center">
            <b> '.$s['FOLIO_DRECEPCION'].' </b> 
        </div>
        <br>
        <div class=" center">
             Variedad  
        </div>	
        <div class="f20 center">
            <b> '.$ARRAYVESPECIES[0]['NOMBRE_VESPECIES'].' </b> 
        </div>

        <br>
        <div class=" center">
             N° Envases  
        </div>	
               
        <div class="f20 center">
            <b>  '.$s['ENVASE'].'  </b> 
        </div>
		<br>
		<div class="subtitulo2"></div>
        <div class="subtitulo center" style="font-size: 18px; text-align: center;">
			 <barcode code="'.$s['ALIAS_FOLIO_DRECEPCION'].'" size="0.9" type="QR"  class="barcode" disableborder="1" />
		</div>
        <div class="titulo center">
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
$NOMBREARCHIVO="TarjaRecepionGranel_";
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

$PDF = new \Mpdf\Mpdf(['format'=>[100,200] ]);
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