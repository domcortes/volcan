<?php

/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class EXIINDUSTRIAL {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_EXIINDUSTRIAL; 
    private	  $FOLIO_EXIINDUSTRIAL;
    private   $FOLIO_AUXILIAR_EXIINDUSTRIAL;
    private	  $FECHA_EMBALADO_EXIINDUSTRIAL;
    private	  $CANTIDAD_ENVASE_EXIINDUSTRIAL;
    private	  $KILOS_NETO_EXIINDUSTRIAL;
    private	  $KILOS_BRUTO_EXIINDUSTRIAL;
    private	  $PESO_PALLET_EXIINDUSTRIAL;    
    private	  $GASIFICADO;
    private	  $PRECIO_KILO;
    private   $ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL;  
    private   $ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL;      
    private   $FECHA_RECEPCION;  
    private   $FECHA_PROCESO;  
    private   $FECHA_REEMBALAJE;  
    private   $FECHA_DESPACHO;  
    private	  $ESTADO;
    private   $ESTADO_REGISTRO;
    private   $INGRESO;
    private   $MODIFICACION;
    private	  $ID_TMANEJO;
    private	  $ID_FOLIO;
    private	  $ID_ESTANDAR;
    private	  $ID_PRODUCTOR;
    private	  $ID_VESPECIES;    
    private   $ID_EMPRESA;
    private   $ID_PLANTA;
    private   $ID_TEMPORADA;
    private	  $ID_RECEPCION;
    private	  $ID_PLANTA2;
    private	  $ID_PLANTA3;
    private	  $ID_PROCESO;
    private	  $ID_REEMBALAJE;
    private   $ID_DESPACHO;
    private   $ID_DESPACHO2;
    
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>