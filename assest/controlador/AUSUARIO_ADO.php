<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/AUSUARIO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class AUSUARIO_ADO {
    
    
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
    public function listarAusuario(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `usuario_ausuario` limit 8;	");
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
    public function listarAusuarioCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `usuario_ausuario` ;	");
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
    public function verAusuario($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `usuario_ausuario` WHERE `ID_AUSUARIO`= '".$ID."';");
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

    public function agregarAusuario(AUSUARIO $AUSUARIO){
        try{
            
            
            $query=
            "INSERT INTO `usuario_ausuario` (`DETALLE_OPERACION_AUSUARIO`, 
                                     `TIPO_OPERACION_AUSUARIO`, 
                                     `TABLA_OBJETIVO_AUSUARIO`,
                                     `ID_USUARIO`,
                                     `FECHA_AUSUARIO`,
                                     `ESTADO_REGISTRO`) VALUES
	       	( ?, ?, ?, ?, SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                    
                    $AUSUARIO->__GET('DETALLE_OPERACION_AUSUARIO')  ,
                    $AUSUARIO->__GET('TIPO_OPERACION_AUSUARIO')      ,
                    $AUSUARIO->__GET('TABLA_OBJETIVO_AUSUARIO')       ,
                    $AUSUARIO->__GET('ID_USUARIO')               
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarAusuario($id){
        try{$sql="DELETE FROM `usuario_ausuario` WHERE `ID_AUSUARIO`=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarAusuario(AUSUARIO $AUSUARIO){
        try{
            $query = "
		UPDATE `usuario_ausuario` SET
            `DETALLE_OPERACION_AUSUARIO`= ?,
            `TIPO_OPERACION_AUSUARIO`= ?,
            `TABLA_OBJETIVO_AUSUARIO`= ?,
            `ID_USUARIO`= ?           
		WHERE `ID_AUSUARIO`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $AUSUARIO->__GET('DETALLE_OPERACION_AUSUARIO')  ,
                    $AUSUARIO->__GET('TIPO_OPERACION_AUSUARIO')      ,
                    $AUSUARIO->__GET('TABLA_OBJETIVO_AUSUARIO')       ,
                    $AUSUARIO->__GET('ID_USUARIO')               ,                 
                    $AUSUARIO->__GET('ID_AUSUARIO')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(AUSUARIO $AUSUARIO){

        try{
            $query = "
    UPDATE `usuario_ausuario` SET			
            `ESTADO_REGISTRO` = 0
    WHERE `ID_AUSUARIO`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $AUSUARIO->__GET('ID_AUSUARIO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(AUSUARIO $AUSUARIO){
        try{
            $query = "
    UPDATE `usuario_ausuario` SET			
            `ESTADO_REGISTRO` = 1
    WHERE `ID_AUSUARIO`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $AUSUARIO->__GET('ID_AUSUARIO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //BUSCADE DE LA EMPRESAS ASOACIADAS A USUARIOS

    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
    public function buscarAusuarioPorNombreUsuario($NOMBREUSUARIO){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `usuario_ausuario` WHERE `ID_USUARIO`= '".$NOMBREUSUARIO."';");
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
    public function buscarAusuarioPorNombreUsuarioUltimasCinco($NOMBREUSUARIO){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `usuario_ausuario` 
                                            WHERE `ID_USUARIO`= '".$NOMBREUSUARIO."' 
                                            ORDER BY `FECHA_AUSUARIO` DESC LIMIT 5 ; ");
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
}
?>