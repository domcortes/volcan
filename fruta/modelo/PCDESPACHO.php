<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class  PCDESPACHO {
    
    //ATRIBUTOS DE LA CLASE    
    private	  $ID_PCDESPACHO; 
    private	  $NUMERO_PCDESPACHO;
    private	  $MOTIVO_PCDESPACHO;
    private	  $CANTIDAD_ENVASE_PCDESPACHO;
    private	  $KILOS_NETO_PCDESPACHO;
    private	  $FECHA_PCDESPACHO;
    private	  $FECHA_INGRESO_PCDESPACHO;
    private	  $FECHA_MODIFCIACION_PCDESPACHO;
    private	  $ESTADO;
    private	  $ESTADO_PCDESPACHO;
    private	  $ESTADO_REGISTRO;
    private   $ID_DESPACHOEX; 
    private   $ID_EMPRESA; 
    private   $ID_PLANTA; 
    private   $ID_TEMPORADA; 
    
    
    //FUNCIONES GET Y SET    
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>