<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../modelo/ESPECIES.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class ESPECIES_ADO {
    
    
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
 //LISTAR TODO CON LIMITE DE 8 FILAS   
    public function listarEspecies(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_especies` limit 8;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //LISTAR TODO
    public function listarEspeciesCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_especies` WHERE `ESTADO_REGISTRO` = 1;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }


    public function listarEspecies2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_especies` WHERE `ESTADO_REGISTRO` = 0;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }


    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
    public function verEspecies($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_especies` WHERE `ID_ESPECIES`= '".$ID."';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

  
    //BUSCAR CONSIDENCIA DE ACUERDO AL CARACTER INGRESADO EN LA FUNCION
    public function buscarNombreEspecies($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_especies` WHERE `NOMBRE_ESPECIES` LIKE '%".$NOMBRE."%';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    //REGISTRO DE UNA NUEVA FILA    
    public function agregarEspecies(ESPECIES $ESPECIES){
        try{
            
            
            $query=
            "INSERT INTO `fruta_especies` (`NOMBRE_ESPECIES`,`CODIGO_SAG_ESPECIES`, `ESTADO_REGISTRO`)  VALUES
	       	( ?, ?, 1 );";
            $this->conexion->prepare($query)
            ->execute(
                array(                     
                    $ESPECIES->__GET('NOMBRE_ESPECIES')    ,
                    $ESPECIES->__GET('CODIGO_SAG_ESPECIES')            
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarEspecies($id){
        try{$sql="DELETE FROM `fruta_especies` WHERE `ID_ESPECIES`=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarEspecies(ESPECIES $ESPECIES){
        try{
            $query = "
		UPDATE `fruta_especies` SET
            `NOMBRE_ESPECIES`= ?   ,
            `CODIGO_SAG_ESPECIES`= ?   
		WHERE `ID_ESPECIES`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $ESPECIES->__GET('NOMBRE_ESPECIES')     , 
                    $ESPECIES->__GET('CODIGO_SAG_ESPECIES')   ,     
                    $ESPECIES->__GET('ID_ESPECIES')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(ESPECIES $ESPECIES){

        try{
            $query = "
    UPDATE `fruta_especies` SET			
            `ESTADO_REGISTRO` = 0
    WHERE `ID_ESPECIES`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $ESPECIES->__GET('ID_ESPECIES')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(ESPECIES $ESPECIES){
        try{
            $query = "
    UPDATE `fruta_especies` SET			
            `ESTADO_REGISTRO` = 1
    WHERE `ID_ESPECIES`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $ESPECIES->__GET('ID_ESPECIES')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    
    
    
}
?>