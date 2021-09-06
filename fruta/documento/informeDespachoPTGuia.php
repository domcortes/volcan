<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/USUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';


include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/EEXPORTACION_ADO.php';

include_once '../controlador/CONDUCTOR_ADO.php';
include_once '../controlador/TRANSPORTE_ADO.php';
include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/COMPRADOR_ADO.php';

include_once '../controlador/DESPACHOPT_ADO.php';
include_once '../controlador/EXIEXPORTACION_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$PVESPECIES_ADO =  new PVESPECIES_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();

$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$COMPRADOR_ADO =  new COMPRADOR_ADO();


$DESPACHOPT_ADO =  new DESPACHOPT_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NUMERODESPACHO="";
$EMPRESA="";
$EMPRESAURL="";
$FECHA="";
$FECHAINGRESO="";
$FECHAMODIFCACION="";
$EMPRESA="";
$PLANTA="";
$PLANTA2="";
$TEMPORADA="";
$NUMEROSELLO="";
$NUMEROGUIA="";
$TDESPACHO="";
$TRANSPORTE="";
$PATENTECAMION="";
$PATENTECARRO="";
$CONDUCTOR="";
$PRODUCTOR="";
$COMPRADOR="";
$REGALO="";

$TOTALENVASE="";
$TOTALNETO="";
$NUMERO="";

$IDOP="";
$OP="";

//INICIALIZAR ARREGLOS
$ARRAYEMPRESA="";
$ARRAYPLANTA="";
$ARRAYTEMPORADA="";
$ARRAYDESPACHO="";
$ARRAYEXISTENCIATOMADA="";

$ARRAYTRANSPORTE="";
$ARRAYCONDUCTOR="";
$ARRAYCOMPRADOR="";
$ARRAYPRODUCTOR="";
$ARRAYPLANTA2="";

$ARRAYVERPRODUCTORID=""; 
$ARRAYVERVESPECIESID=""; 
$ARRAYEVERERECEPCIONID="";
$ARRAYUSUARIO="";


if(isset($_REQUEST['NOMBREUSUARIO'])){
  $NOMBREUSUARIO = $_REQUEST['NOMBREUSUARIO'];
  $ARRAYUSUARIO=$USUARIO_ADO->ObtenerNombreCompleto($NOMBREUSUARIO);
  $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
  
}
if (isset($_REQUEST['parametro']) ) {
    $IDOP = $_REQUEST['parametro'];
    $NUMERODESPACHO=$IDOP;
}
$ARRAYDESPACHO=$DESPACHOPT_ADO->verDespachopt2($NUMERODESPACHO);
$ARRAYDESPACHOTOTAL = $DESPACHOPT_ADO->obtenerTotalesDespachoptPorDespachoCBX2($IDOP); 


$ARRAYEXISTENCIATOMADA=$EXIEXPORTACION_ADO->buscarPordespacho2($NUMERODESPACHO);



$NUMERO=$ARRAYDESPACHO[0]['NUMERO_DESPACHO'];
$FECHA=$ARRAYDESPACHO[0]['FECHA_DESPACHOR'];
$FECHAINGRESO=$ARRAYDESPACHO[0]['INGRESO'];
$FECHAMODIFCACION=$ARRAYDESPACHO[0]['MODIFICACION'];
$NUMEROSELLO=$ARRAYDESPACHO[0]['NUMERO_SELLO_DESPACHO'];
$NUMEROGUIA=$ARRAYDESPACHO[0]['NUMERO_GUIA_DESPACHO'];
$TDESPACHO=$ARRAYDESPACHO[0]['TDESPACHO'];
$PATENTECAMION=$ARRAYDESPACHO[0]['PATENTE_CAMION'];
$PATENTECARRO=$ARRAYDESPACHO[0]['PATENTE_CARRO'];
$REGALO=$ARRAYDESPACHO[0]['REGALO_DESPACHO'];



if ($TDESPACHO == "1") {
  $TDESPACHON="Interplanta";
}
if ($TDESPACHO == "2") {
  $TDESPACHON="Devolución Productor";
}
if ($TDESPACHO == "3") {
  $TDESPACHON="Venta";
}
if ($TDESPACHO == "4") {
  $TDESPACHON="Regalo";
}


$TOTALENVASE=$ARRAYDESPACHOTOTAL[0]['ENVASE'];
$TOTALNETO=$ARRAYDESPACHOTOTAL[0]['NETO'];

$ARRAYPLANTA2=$PLANTA_ADO->verPlanta($ARRAYDESPACHO[0]['ID_PLANTA2']);
if($ARRAYPLANTA2){
  $PLANTA2=$ARRAYPLANTA2[0]['NOMBRE_PLANTA'];  
}else{
  $PLANTA2="";
}

$ARRAYPRODUCTOR=$PRODUCTOR_ADO->verProductor($ARRAYDESPACHO[0]['ID_PRODUCTOR']);
if($ARRAYPRODUCTOR){
  $PRODUCTOR=$ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];  
}else{
  $PRODUCTOR="";
}
$ARRAYCOMPRADOR=$COMPRADOR_ADO->verComprador($ARRAYDESPACHO[0]['ID_COMPRADOR']);
if($ARRAYCOMPRADOR){
  $COMPRADOR=$ARRAYCOMPRADOR[0]['NOMBRE_COMPRADOR'];  
}else{
  $COMPRADOR="";
}

$ARRAYTRANSPORTE=$TRANSPORTE_ADO->verTransporte($ARRAYDESPACHO[0]['ID_TRANSPORTE']);
$ARRAYCONDUCTOR=$CONDUCTOR_ADO->verConductor($ARRAYDESPACHO[0]['ID_CONDUCTOR']);;

$TRANSPORTE=$ARRAYTRANSPORTE[0]['NOMBRE_TRANSPORTE'];
$CONDUCTOR=$ARRAYCONDUCTOR[0]['NOMBRE_CONDUCTOR'];

$ARRAYPLANTA=$PLANTA_ADO->verPlanta($ARRAYDESPACHO[0]['ID_PLANTA']);
$ARRAYTEMPORADA=$TEMPORADA_ADO->verTemporada($ARRAYDESPACHO[0]['ID_TEMPORADA']);
$ARRAYEMPRESA=$EMPRESA_ADO->verEmpresa($ARRAYDESPACHO[0]['ID_EMPRESA']);

$TEMPORADA =$ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
$PLANTA=$ARRAYPLANTA[0]['NOMBRE_PLANTA'];
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





//ESCTRUTURA DEL DOCUMENTO

$html='
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Informe Despacho Producto Terminado </title>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
           <img src="../vista/img/logo.png" width="150px" height="45px"/>
      </div>
      <div id="company">
        <h2 class="name">Soc. Agrícola El Álamo Ltda.</h2>
        <div>Camino a Antuco, Kilómetro N°13</div>
        <div>Los Ángeles, Chile.</div>
        <div><a href="mailto:ti@fvolcan.com">ti@fvolcan.cl</a></div>
      </div>
    </header>
    <main>
      <h2 class="titulo" style="text-align: center; color: black;">
        INFORME DESPACHO PRODUCTO TERMINADO
        <br>
        <b> Número Despacho: ' . $NUMERODESPACHO . '</b>
      </h2>
      <div id="details" class="clearfix">
        
      <div id="invoice">
        <div class="date">Fecha Despacho: '.$FECHA.' </div>
        <div class="date">Empresa: '.$EMPRESA.'  </div>
        ';
        if ($TDESPACHO != "1" ) {
          $html.='
        <div class="date">Planta: '.$PLANTA.'  </div>
        ';
        }
        $html.='
        <div class="date">Temporada: '.$TEMPORADA.'  </div>
      </div>


        <div id="client">
          <div class="address">Tipo Despacho:  '.$TDESPACHON.'</div>
          <div class="address">Número Guía:  '.$NUMEROGUIA.'</div>
          <div class="address">Número Sello:  '.$NUMERODESPACHO.'</div>
          ';
          if ($TDESPACHO == "1" ) {
            $html.='
            
            <div class="address"> Planta Origen:  '.$PLANTA.'</div>
            <div class="address"> Planta Destino:  '.$PLANTA2.'</div>
            
            ';
          }
          if ($TDESPACHO == "2" ) {
            $html.='
            <div class="address"> Nombre Productor:  '.$COMPRADOR.'</div>
            ';
          }

          if ($TDESPACHO == "3" ) {
            $html.='
            <div class="address"> Nombre Comprador:  '.$COMPRADOR.'</div>
            ';
          }
          if($TDESPACHO == "4" ){
            $html.='
            <div class="address">Regalo Para:  '.$REGALO.'</div>
            ';
          }

 $html.='
        </div>        
      </div>
    <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th colspan="9" class="center">INGRESO </th>
                </tr>
                <tr>
                    <th class="color left">Folio</th>
                    <th class="color center">Fecha Embalado</th>
                    <th class="color center">Código Estandar</th>
                    <th class="color center">Envase/Estandar</th>
                    <th class="color center ">CSG </th>
                    <th class="color center ">Productor </th>
                    <th class="color center ">Variedad </th>
                    <th class="color center">Cant. Envase</th>
                    <th class="color center">Kilos Neto</th>
                </tr>
            </thead>
            <tbody>
    ';
    foreach ($ARRAYEXISTENCIATOMADA as $r) : 

        $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);    
        $ARRAYVERPVESPECIESID = $PVESPECIES_ADO->verPvespecies($r['ID_PVESPECIES']);
        $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($ARRAYVERPVESPECIESID[0]['ID_VESPECIES']);  
        $ARRAYEVERERECEPCIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
    
        $html=$html.'
        <tr>
            <th class=" left">'.$r['FOLIO_AUXILIAR_EXIEXPORTACION'].'</th>
            <td class=" center">'.$r['FECHA'].'</td>
            <td class=" center">'.$ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'].'</td>
            <td class=" center">'.$ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'].'</td>
            <td class=" center ">'.$ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'].' </td>
            <td class=" center ">'.$ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'].' </td>
            <td class=" center ">'.$ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'].' </td>
            <td class=" center">'.$r['ENVASE'].'</td>
            <td class=" center">'.$r['NETO'].'</td>
        </tr>
        ';
    endforeach;
    $html=$html.'
        <tr>
            <th class="color left">&nbsp;</th>
            <th class="color center">&nbsp;</th>
            <th class="color center ">&nbsp; </th>
            <th class="color center ">&nbsp; </th>
            <th class="color center">&nbsp;</th>
            <th class="color center">&nbsp;</th>
            <th class="color right">Sub Total</th>
            <th class="color center">'.$TOTALENVASE.'</th>
            <th class="color center">'.$TOTALNETO.'</th>
        </tr>
    ';    
    $html=$html.'
    </tbody>
  </table>
  ';




  $html=$html.'
  <div id="details" class="clearfix">
    <div id="client">
      <div class="address"><b>Informacion De Transporte</b></div>
      <div class="address">Empresa Transporte:  '.$TRANSPORTE.' </div>
      <div class="address">Conductor: '.$CONDUCTOR.'</div>
      <div class="address">Patente Camión: '.$PATENTECAMION.'</div>
      <div class="address">Patente Carro: '.$PATENTECARRO.'</div>
    </div>
  </div>
  <div id="notices">
    <div>IMPORTANTE:</div>
    <div class="notice">Este informe muestra información del momento en que fue generado, si tiene algun inconveniente por favor contactar a <a href="mailto:ti@fvolcan.cl">ti@fvolcan.cl</a>.</div>
  </div>
  <br>
  <br>    
          <table >      
            <tr>
              <td class="color2 center" style="width: 30%;" > </td>
              <td class="color2  center" style="width: 10%;"> <hr> </td>
              <td class="color2 right" style="width: 30%;"> </td>
            </tr>
            <tr>
              <td class="color2 center" style="width: 30%;" > </td>
              <td class="color2  center" style="width: 10%;"> Firma Responsable <br> Nombre Responsable: </td>
              <td class="color2 center" style="width: 30%;"> </td>
            </tr>    
          </table>

</main>
<footer>
  Informe generado por Departamento TI Fruticola Volcan
  <br>
  <a href="mailto:ti@fvolcan.cl">ti@fvolcan.cl</a>
  
</footer>
</body>
</html>

';



//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO="InformeDespachoProductoTerminado_";
$FECHADOCUMENTO = $FECHANORMAL."_".$HORAFINAL;
$TIPODOCUMENTO="Informe";
$FORMATO=".pdf";
$NOMBREARCHIVOFINAL=$NOMBREARCHIVO.$FECHADOCUMENTO.$FORMATO;

//CONFIGURACIOND DEL DOCUMENTO
$TIPOPAPEL="LETTER";
$ORIENTACION="P";
$LENGUAJE="ES";
$UNICODE="true";
$ENCODING="UTF-8";

//DETALLE DEL CREADOR DEL INFORME
$TIPOINFORME = "Informe Despacho";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Informe";

//API DE GENERACION DE PDF
require_once '../api/mpdf/mpdf/autoload.php';
//$PDF = new \Mpdf\Mpdf();W
$PDF = new \Mpdf\Mpdf(['format'=> 'letter']);

//CONFIGURACION FOOTER Y HEADER DEL PDF
$PDF->SetHTMLHeader('
    <table width="100%" >
        <tbody>
            <tr>
            <th width="55%" class="left f10">'.$EMPRESA.'</th>
            <td width="45%" class="right f10">'.$FECHANOMBRE.'</td>
            <td width="10%" class="right f10">'.$HORAFINAL2.'</td>
            </tr>
        </tbody>
    </table>
    <br>
    
');

$PDF->SetHTMLFooter('


    <table width="100%" >
        <tbody>
            <tr>
                <td width="35%" class="left"><span>{PAGENO}/{nbpg}</span></td>
                <td width="30%"  class="center f10">
                       
                        '.$EMPRESA.'
                </td>
                <td width="35%"  class="right">{DATE j-m-Y}</td>
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

//INICIALIZACION DEL CSS
$stylesheet = file_get_contents('../vista/css/stylePdf.css'); // carga archivo css
$stylesheet2 = file_get_contents('../vista/css/reset.css'); // carga archivo css

//ENLASAR CSS CON LA VISTA DEL PDF
$PDF->WriteHTML($stylesheet, 1); 
$PDF->WriteHTML($stylesheet2, 1); 

//GENERAR PDF
$PDF->WriteHTML($html);
//METODO DE SALIDA
$PDF->Output($NOMBREARCHIVOFINAL, \Mpdf\Output\Destination::INLINE);
