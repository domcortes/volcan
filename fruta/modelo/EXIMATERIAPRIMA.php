<?php

/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class EXIMATERIAPRIMA {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_EXIMATERIAPRIMA; 
    private	  $FOLIO_EXIMATERIAPRIMA;
    private	  $FOLIO_AUXILIAR_EXIMATERIAPRIMA;
    private	  $FOLIO_MANUAL;
    private	  $FECHA_COSECHA_EXIMATERIAPRIMA; 
    private	  $CANTIDAD_ENVASE_EXIMATERIAPRIMA;
    private	  $KILOS_NETO_EXIMATERIAPRIMA;
    private   $KILOS_BRUTO_EXIMATERIAPRIMA;  
    private	  $KILOS_PROMEDIO_EXIMATERIAPRIMA;
    private	  $PESO_PALLET_EXIMATERIAPRIMA;
    private	  $ALIAS_DINAMICO_FOLIO_EXIMATERIAPRIMA;
    private	  $ALIAS_ESTATICO_FOLIO_EXIMATERIAPRIMA; 
    private   $GASIFICADO;
    private   $PRECIO_PALLET;
    private   $FECHA_RECEPCION;
    private   $FECHA_REPALETIZAJE;
    private   $FECHA_DESPACHO;
    private	  $ESTADO;
    private   $ESTADO_REGISTRO;
    private	  $INGRESO;
    private	  $MODIFICACION;   
    private   $ID_TMANEJO;
    private	  $ID_FOLIO;
    private	  $ID_ESTANDAR;
    private	  $ID_PRODUCTOR;
    private	  $ID_VESPECIES;
    private   $ID_EMPRESA;
    private   $ID_PLANTA;
    private   $ID_TEMPORADA;
    private	  $ID_RECEPCION;
    private   $ID_PLANTA2;
    private   $ID_PLANTA3;
    private	  $ID_PROCESO;
    private   $ID_REPALETIZAJE;
    private   $ID_DESPACHO;
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>