<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  AUSUARIO
 */

 //ESTRUCTURA DE LA CLASE
class AUSUARIO {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_AUSUARIO;
    private	  $FECHA_AUSUARIO; 
    private	  $DETALLE_OPERACION_AUSUARIO; 
    private	  $TIPO_OPERACION_AUSUARIO;
    private   $TABLA_OBJETIVO_AUSUARIO;
    private   $ESTADO_REGISTRO; 
    private   $NOMBRE_USUARIO;
    private   $INGRESO;
    private   $MODIFICACION;
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>