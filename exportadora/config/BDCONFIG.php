<?php
class BDCONFIG {

    private $HOST;
    private $USER;
    private $PASS;
    private $DBNAME;

    public function __construct()
    {
        $this->HOST="localhost";
        $this->USER="root";
        $this->PASS="";
        $this->DBNAME="produccion_arandanos";
        
    }
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }

 

}



?>