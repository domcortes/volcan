<?php

/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class EXIINDUSTRIAL {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_EXIINDUSTRIAL; 
    private	  $FOLIO_EXIINDUSTRIAL;
    private	  $NUMERO_LINEA;
    private   $FOLIO_AUXILIAR_EXIINDUSTRIAL;
    private	  $FECHA_EMBALADO_EXIINDUSTRIAL;
    private	  $FECHA_INGRESO_EXIINDUSTRIAL;
    private	  $FECHA_MODIFICACION_EXIINDUSTRIAL;
    private	  $CANTIDAD_ENVASE_INGRESADO_EXIINDUSTRIAL;
    private	  $KILOS_NETO_EXIINDUSTRIAL;
    private   $ALIAS_FOLIO_EXIINDUSTRIAL;  
    private   $PRECIO_PALLET;
    private	  $ESTADO;
    private   $ESTADO_REGISTRO;
    private	  $ID_ESTANDAR;
    private	  $ID_PRODUCTOR;
    private	  $ID_PVESPECIES;
    private	  $ID_FOLIO;
    private	  $ID_PROCESO;
    private   $ID_EMPRESA;
    private   $ID_PLANTA;
    private   $ID_TEMPORADA;
    private   $ID_DESPACHO;
    private   $ID_DESPACHO2;
    
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>