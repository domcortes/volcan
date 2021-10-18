<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../modelo/PCARGA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class PCARGA_ADO {
    
    //ATRIBUTO
    private $conexion;
    
    //LLAMADO A LA BD Y CONFIGURAR PARAMETROS
    public function __CONSTRUCT()
    {
        try
        {
            $BDCONFIG = new BDCONFIG();
            $HOST = $BDCONFIG->__GET('HOST');
            $DBNAME = $BDCONFIG->__GET('DBNAME');
            $USER = $BDCONFIG->__GET('USER');
            $PASS = $BDCONFIG->__GET('PASS');

            
            $this->conexion = new PDO('mysql:host='.$HOST.';dbname='.$DBNAME, $USER ,$PASS);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
    
    
    
 //FUNCIONES BASICAS 
 //LISTAR TODO CON LIMITE DE 6 FILAS   
    public function listarPcarga(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_pcarga` limit 8;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    //LISTAR TODO
    public function listarPcargaCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_pcarga` WHERE ESTADO_REGISTRO = 1;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }


    public function listarPcargaCBX2(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_pcarga` WHERE ESTADO_REGISTRO = 0;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
    public function verPcarga($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_pcarga` WHERE `ID_PCARGA`= '".$ID."';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

  
    
    //BUSCAR CONSIDENCIA DE ACUERDO AL CARACTER INGRESADO EN LA FUNCION
    public function buscarNombrePcarga($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_pcarga` WHERE `NOMBRE_PCARGA` LIKE '%".$NOMBRE."%';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    //REGISTRO DE UNA NUEVA FILA    
    public function agregarPcarga(PCARGA $PCARGA){
        try{
            
            
            $query=
            "INSERT INTO `fruta_pcarga` (
                                            `NUMERO_PCARGA`, 
                                            `NOMBRE_PCARGA`, 
                                            `ID_EMPRESA`, 
                                            `ID_USUARIOI`, 
                                            `ID_USUARIOM`, 
                                            `ESTADO_REGISTRO`
                                        ) VALUES
	       	( ?, ?, ?, ?, ?, 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $PCARGA->__GET('NUMERO_PCARGA'),
                    $PCARGA->__GET('NOMBRE_PCARGA'),
                    $PCARGA->__GET('ID_EMPRESA'),
                    $PCARGA->__GET('ID_USUARIOI'),
                    $PCARGA->__GET('ID_USUARIOM')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarPcarga($id){
        try{$sql="DELETE FROM `fruta_pcarga` WHERE `ID_PCARGA`=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarPcarga(PCARGA $PCARGA){
        try{
            $query = "
		UPDATE `fruta_pcarga` SET
            `NOMBRE_PCARGA`= ?,
            `ID_USUARIOM`= ?            
		WHERE `ID_PCARGA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $PCARGA->__GET('NOMBRE_PCARGA') ,   
                    $PCARGA->__GET('ID_USUARIOM')    , 
                    $PCARGA->__GET('ID_PCARGA')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(PCARGA $PCARGA){

        try{
            $query = "
    UPDATE `fruta_pcarga` SET			
            `ESTADO_REGISTRO` = 0
    WHERE `ID_PCARGA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $PCARGA->__GET('ID_PCARGA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(PCARGA $PCARGA){
        try{
            $query = "
    UPDATE `fruta_pcarga` SET			
            `ESTADO_REGISTRO` = 1
    WHERE `ID_PCARGA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $PCARGA->__GET('ID_PCARGA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    
    public function listarPcargaPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_pcarga` 
                                            WHERE ESTADO_REGISTRO = 1
                                            AND ID_EMPRESA = '".$IDEMPRESA."';	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    public function obtenerNumero($IDEMPRESA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  
                                                IFNULL(COUNT(NUMERO_PCARGA),0) AS 'NUMERO'
                                            FROM `fruta_pcarga`
                                            WHERE ID_EMPRESA = '" . $IDEMPRESA . "'     
                                                ; ");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>