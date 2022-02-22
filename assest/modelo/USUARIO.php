<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  USUARIO
 */

 //ESTRUCTURA DE LA CLASE
class USUARIO {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_USUARIO;
    private	  $NOMBRE_USUARIO;
    private	  $PNOMBRE_USUARIO;
    private	  $SNOMBRE_USUARIO;
    private	  $PAPELLIDO_USUARIO;
    private	  $SAPELLIDO_USUARIO;
    private	  $CONTRASENA_USUARIO; 
    private	  $EMAIL_USUARIO; 
    private	  $TELEFONO_USUARIO;   
    private	  $NINTENTO;     
    private   $ESTADO_REGISTRO;
    private   $INGRESO;
    private   $MODIFICACION;
    private   $ID_TUSUARIO;
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>