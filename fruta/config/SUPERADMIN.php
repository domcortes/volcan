<?php
    class SUPERADMIN {   

        private $NOMBRE_USUARIO;
        private $TIPO_USUARIO;
        private $EMPRESA="";
        private $PLANTA="";
        private $TEMPORADA="";
        private $PNOMBRE;
        private $SNOMBRE;
        private $PAPELLIDO;
        private $SAPELLIDO;
        private $CONTRASENA;



        public function __construct()
        {
            $this->NOMBRE_USUARIO="SUPERADMIN";
            $this->TIPO_USUARIO="0";
            $this->EMPRESA="0";
            $this->PLANTA="0";
            $this->TEMPORADA="0";
            $this->PNOMBRE="SUPER";
            $this->SNOMBRE="ADMINISTRADOR";
            $this->PAPELLIDO="-";
            $this->SAPELLIDO="-";
            $this->CONTRASENA="ADMINFVOLCAN123";
            
        }
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }

        public function devolverNombreuUsuario(){
            $ARREGLO="";
            $ARREGLO =  array($this->__GET('NOMBRE_USUARIO'), $this->__GET('TIPO_USUARIO'), $this->__GET('EMPRESA'), $this->__GET('PLANTA') , $this->__GET('TEMPORADA'));
            return $ARREGLO;
        }
        public function devolverDatos(){
            $ARREGLO="";
            $ARREGLO =  array($this->__GET('NOMBRE_USUARIO'), $this->__GET('TIPO_USUARIO'), $this->__GET('PNOMBRE'), $this->__GET('SNOMBRE'), $this->__GET('PAPELLIDO'), $this->__GET('SAPELLIDO') );
            return $ARREGLO;
        }
        public  function iniciarSessionSuper($NOMBREUSUARIO, $CONTRASENA){
            $RETORNO="";
            if($this->__GET('NOMBRE_USUARIO')==$NOMBREUSUARIO && $this->__GET('CONTRASENA') == $CONTRASENA){
                $RETORNO = true;
                
            }else{
                $RETORNO = false;
            }
            return $RETORNO;

        }
    }



?>