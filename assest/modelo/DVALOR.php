<?php
    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class DVALOR {
        
        //ATRIBUTOS DE LA CLASE    
        private	  $ID_DVALOR; 
        private	  $VALOR_DVALOR;
        private   $COMERCIAL;
        private	  $ESTADO;
        private   $ESTADO_REGISTRO;
        private	  $INGRESO;
        private	  $MODIFICACION;
        private   $ID_ECOMERCIAL;
        private   $ID_VALOR;
        private   $ID_TITEM;
        private   $ID_USUARIOI;
        private   $ID_USUARIOM;
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>