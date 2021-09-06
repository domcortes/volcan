<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../modelo/PTUSUARIO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class PTUSUARIO_ADO {
    
    
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
    public function listarPtusuario(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `usuario_ptusuario` limit 8;	");
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
    public function listarPtusuarioCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `usuario_ptusuario` ;	");
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
    public function verPtusuario($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `usuario_ptusuario` WHERE `ID_PTUSUARIO`= '".$ID."';");
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

    public function agregarPtusuario(PTUSUARIO $PTUSUARIO){
        try{
            
            
            $query=
            "INSERT INTO `usuario_ptusuario` (`DETALLE_PTUSUARIO`, `ID_TUSUARIO`, `ESTADO_REGISTRO`) VALUES
	       	( ?, ?, 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                    
                    $PTUSUARIO->__GET('DETALLE_PTUSUARIO')  ,
                    $PTUSUARIO->__GET('ID_TUSUARIO')              
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarPtusuario($id){
        try{$sql="DELETE FROM `usuario_ptusuario` WHERE `ID_PTUSUARIO`=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarPtusuario(PTUSUARIO $PTUSUARIO){
        try{
            $query = "
		UPDATE `usuario_ptusuario` SET
            `DETALLE_PTUSUARIO`= ?
            `ID_TUSUARIO`= ?
            
		WHERE `ID_PTUSUARIO`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $PTUSUARIO->__GET('DETALLE_PTUSUARIO'),    
                    $PTUSUARIO->__GET('ID_TUSUARIO'),                    
                    $PTUSUARIO->__GET('ID_PTUSUARIO')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(PTUSUARIO $PTUSUARIO){

        try{
            $query = "
    UPDATE `usuario_ptusuario` SET			
            `ESTADO_REGISTRO` = 0
    WHERE `ID_PTUSUARIO`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $PTUSUARIO->__GET('ID_PTUSUARIO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(PTUSUARIO $PTUSUARIO){
        try{
            $query = "
    UPDATE `usuario_ptusuario` SET			
            `ESTADO_REGISTRO` = 1
    WHERE `ID_PTUSUARIO`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $PTUSUARIO->__GET('ID_PTUSUARIO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //BUSCADE DE LA EMPRESAS ASOACIADAS A USUARIOS

}
?>