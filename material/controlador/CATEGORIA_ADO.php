<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../modelo/CATEGORIA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class CATEGORIA_ADO {
    
    
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
    public function listarCategoria(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_categoria` limit 8 WHERE ESTADO_REGISTRO = 1;	");
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
    public function listarCategoriaCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_categoria` WHERE ESTADO_REGISTRO = 1;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function listarCategoria2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_categoria` WHERE ESTADO_REGISTRO = 0;	");
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
    public function verCategoria($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_categoria` WHERE `ID_CATEGORIA`= '".$ID."';");
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

    public function agregarCategoria(CATEGORIA $CATEGORIA){
        try{
            
            
            $query=
            "INSERT INTO `material_categoria` (`NOMBRE_CATEGORIA`, `ID_EMPRESA`,`INGRESO`,`MODIFICACION`, `ESTADO_REGISTRO`) VALUES
	       	( ?, ?, SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $CATEGORIA->__GET('NOMBRE_CATEGORIA')  ,
                    $CATEGORIA->__GET('ID_EMPRESA')                
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarCategoria($id){
        try{$sql="DELETE FROM `material_categoria` WHERE `ID_CATEGORIA`=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarCategoria(CATEGORIA $CATEGORIA){
        try{
            $query = "
		UPDATE `material_categoria` SET
            `MODIFICACION`= SYSDATE(),
            `NOMBRE_CATEGORIA`= ?,
            `ID_EMPRESA`= ?
            
		WHERE `ID_CATEGORIA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(   
                    $CATEGORIA->__GET('NOMBRE_CATEGORIA'), 
                    $CATEGORIA->__GET('ID_EMPRESA') ,                   
                    $CATEGORIA->__GET('ID_CATEGORIA')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(CATEGORIA $CATEGORIA){

        try{
            $query = "
    UPDATE `material_categoria` SET			
    `MODIFICACION`= SYSDATE(),		
            `ESTADO_REGISTRO` = 0
    WHERE `ID_CATEGORIA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $CATEGORIA->__GET('ID_CATEGORIA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(CATEGORIA $CATEGORIA){
        try{
            $query = "
    UPDATE `material_categoria` SET				
    `MODIFICACION`= SYSDATE(),	
            `ESTADO_REGISTRO` = 1
    WHERE `ID_CATEGORIA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $CATEGORIA->__GET('ID_CATEGORIA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

}
?>