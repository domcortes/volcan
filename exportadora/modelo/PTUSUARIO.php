<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PTUSUARIO
 */

 //ESTRUCTURA DE LA CLASE
class PTUSUARIO {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_PTUSUARIO;
    private	  $DETALLE_PTUSUARIO; 
    private   $ESTADO_REGISTRO; 
    private	  $ID_TUSUARIO;
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>