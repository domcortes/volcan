<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class  MGUIAMP {
    
    //ATRIBUTOS DE LA CLASE    
    private	  $ID_MGUIA; 
    private	  $NUMERO_MGUIA;
    private	  $FECHA_INGRESO_MGUIA;
    private	  $NUMERO_DESPACHO;
    private	  $NUMERO_GUIA;
    private	  $MOTIVO_MGUIA;
    private	  $ESTADO_REGISTRO;
    private	  $ID_DESPACHO;
    private	  $ID_PLANTA2;
    private	  $ID_EMPRESA;
    private	  $ID_PLANTA;
    private   $ID_TEMPORADA; 
    
    
    //FUNCIONES GET Y SET    
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>