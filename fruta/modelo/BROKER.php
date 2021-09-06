<?php
    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class BROKER {
        
        //ATRIBUTOS DE LA CLASE    
        private	  $ID_BROKER; 
        private	  $NUMERO_BROKER;
        private	  $NOMBRE_BROKER;
        private	  $EORI_BROKER;
        private	  $DIRECCION_BROKER;
        private   $CONTACTO1_BROKER;
        private   $CARGO1_BROKER;
        private   $EMAIL1_BROKER;
        private   $CONTACTO2_BROKER;
        private   $CARGO2_BROKER;
        private   $EMAIL2_BROKER;
        private   $CONTACTO3_BROKER;
        private   $CARGO3_BROKER;
        private   $EMAIL3_BROKER;
        private   $ESTADO_REGISTRO;
        private   $ID_CIUDAD;
        private	  $ID_EMPRESA; 
        private	  $ID_USUARIOI; 
        private	  $ID_USUARIOM; 
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>