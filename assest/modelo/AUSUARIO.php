<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  AUSUARIO
 */

 //ESTRUCTURA DE LA CLASE
class AUSUARIO {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_AUSUARIO;
    private	  $NUMERO_REGISTRO; 
    private	  $NOMBRE_REGISTRO; 
    private	  $TABLA;
    private   $TMODULO;
    private   $TOPERACION; 
    private   $FECHA;
    private   $ID_USUARIO;
    private   $ID_EMPRESA;
    private   $ID_PLANTA;
    private   $ID_TEMPORADA;
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>