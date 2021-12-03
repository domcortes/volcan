<?php

/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class EXIEXPORTACION {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_EXIEXPORTACION; 
    private	  $FOLIO_EXIEXPORTACION;
    private	  $FOLIO_AUXILIAR_EXIEXPORTACION;
    private	  $FOLIO_MANUAL;
    private	  $NUMERO_LINEA;
    private	  $FECHA_EMBALADO_EXIEXPORTACION;
    private	  $FECHA_INGRESO_EXIEXPORTACION;
    private	  $FECHA_MODIFICACION_EXIEXPORTACION;
    private	  $CANTIDAD_ENVASE_EXIEXPORTACION;
    private	  $KILOS_NETO_EXIEXPORTACION;
    private	  $PDESHIDRATACION_EXIEXPORTACION;
    private	  $KILOS_DESHIRATACION_EXIEXPORTACION;
    private	  $KILOS_BRUTO_EXIEXPORTACION;
    private	  $OBSERVACION_EXIESPORTACION;
    private   $ALIAS_FOLIO_EXIESPORTACION;  
    private	  $STOCK;
    private   $EMBOLSADO;
    private   $GASIFICADO;
    private   $PREFRIO;   
    private   $TESTADOSAG;
    private   $PRECIO_PALLET;
    private   $VGM;
    private	  $ESTADO;
    private   $ESTADO_REGISTRO;
    private	  $ID_ESTANDAR;
    private	  $ID_PRODUCTOR;
    private	  $ID_VESPECIES;
    private	  $ID_FOLIO;
    private	  $ID_PROCESO;
    private   $ID_REPALETIZAJE;
    private   $ID_REEMBALAJE;
    private   $ID_PCDESPACHO;    
    private   $ID_DESPACHO;
    private   $ID_DESPACHO2;
    private   $ID_DESPACHOEX;
    private   $ID_ICARGA;
    private   $ID_INPSAG;
    private   $ID_PLANTA2;
    private   $ID_TCALIBRE;
    private   $ID_TEMBALAJE;
    private   $ID_TMANEJO;
    private   $ID_TCATEGORIA;
    private   $ID_TCOLOR;
    private   $ID_EMPRESA;
    private   $ID_PLANTA;
    private   $ID_TEMPORADA;
    
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>