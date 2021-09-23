<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../modelo/USUARIO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class USUARIO_ADO {
    
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
    public function listarUsuario(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `usuario_usuario` limit 8;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function listarUsuarioCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `usuario_usuario` WHERE `ESTADO_REGISTRO` = 1;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function listarUsuario2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `usuario_usuario` WHERE `ESTADO_REGISTRO` = 0;	");
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
    public function verUsuario($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `usuario_usuario` WHERE `ID_USUARIO`= '".$ID."';");
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
    public function BuscarUsuarioNombre($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `usuario_usuario` WHERE `NOMBRE_USUARIO` LIKE '%".$NOMBRE."%';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function ObtenerNombreCompleto($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT  LOWER(IFNULL(CONCAT(`PNOMBRE_USUARIO`,' ', `SNOMBRE_USUARIO`,' ', `PAPELLIDO_USUARIO`,' ', `SAPELLIDO_USUARIO`),'')) AS 'NOMBRE_COMPLETO'
                                            FROM `usuario_usuario` 
                                            WHERE `ID_USUARIO` = '".$ID."';");
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
    public function agregarUsuario(USUARIO $USUARIO){
        try{
            
            
            $query=
            "INSERT INTO `usuario_usuario` (`RUT_USUARIO`, `DV_USUARIO`, `NOMBRE_USUARIO`, `PNOMBRE_USUARIO`, `SNOMBRE_USUARIO`, `PAPELLIDO_USUARIO`, `SAPELLIDO_USUARIO`,
                                    `CONTRASENA_USUARIO`,`EMAIL_USUARIO` ,`TELEFONO_USUARIO`,`ID_TUSUARIO`,`INGRESO`,`MODIFICACION`, `ESTADO_REGISTRO`) VALUES
	       	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, SYSDATE(), SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $USUARIO->__GET('RUT_USUARIO')	,
                    $USUARIO->__GET('DV_USUARIO')	,
                    $USUARIO->__GET('NOMBRE_USUARIO')	,

                    $USUARIO->__GET('PNOMBRE_USUARIO')	,
                    $USUARIO->__GET('SNOMBRE_USUARIO')	,
                    $USUARIO->__GET('PAPELLIDO_USUARIO')	,
                    $USUARIO->__GET('SAPELLIDO_USUARIO')	,

                    $USUARIO->__GET('CONTRASENA_USUARIO'),
                    $USUARIO->__GET('EMAIL_USUARIO'),
                    $USUARIO->__GET('TELEFONO_USUARIO'),
                    $USUARIO->__GET('ID_TUSUARIO')
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarUsuario($id){
        try{$sql="DELETE FROM `usuario_usuario` WHERE `ID_USUARIO`=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
 
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarUsuario(USUARIO $USUARIO){
        try{
            $query = "

            UPDATE `usuario_usuario` 
            SET 
            `MODIFICACION` = SYSDATE(), 
            `RUT_USUARIO` = ?, 
            `DV_USUARIO` = ?, 
            `PNOMBRE_USUARIO` = ?, 
            `SNOMBRE_USUARIO` = ?, 
            `PAPELLIDO_USUARIO` = ?, 
            `SAPELLIDO_USUARIO` = ?, 
            `CONTRASENA_USUARIO` = ?, 
            `EMAIL_USUARIO` = ?, 
            `TELEFONO_USUARIO` = ? , 
            `ID_TUSUARIO` = ? 
            WHERE 
              `ID_USUARIO` = ? ;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $USUARIO->__GET('RUT_USUARIO'),
                    $USUARIO->__GET('DV_USUARIO')	,
                    $USUARIO->__GET('PNOMBRE_USUARIO')	,
                    $USUARIO->__GET('SNOMBRE_USUARIO')	,
                    $USUARIO->__GET('PAPELLIDO_USUARIO')	,
                    $USUARIO->__GET('SAPELLIDO_USUARIO')	,
                    $USUARIO->__GET('CONTRASENA_USUARIO'),
                    $USUARIO->__GET('EMAIL_USUARIO'),
                    $USUARIO->__GET('TELEFONO_USUARIO'),
                    $USUARIO->__GET('ID_TUSUARIO'),
                    $USUARIO->__GET('ID_USUARIO')                   
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

     //ACTUALIZAR INFORMACION DE LA FILA, ESPECIFICAMENTE EL PERFIL DEL USUARIO
     public function actualizarPerfil(USUARIO $USUARIO){
        try{
            $query = "

            UPDATE `usuario_usuario` 
            SET 
            `MODIFICACION` = SYSDATE(), 
            `RUT_USUARIO` = ?, 
            `PNOMBRE_USUARIO` = ?, 
            `SNOMBRE_USUARIO` = ?, 
            `PAPELLIDO_USUARIO` = ?, 
            `SAPELLIDO_USUARIO` = ?, 
            `EMAIL_USUARIO` = ?, 
            `TELEFONO_USUARIO` = ? 
            WHERE 
              `ID_USUARIO` = ? ;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $USUARIO->__GET('RUT_USUARIO'),
                    $USUARIO->__GET('PNOMBRE_USUARIO')	,
                    $USUARIO->__GET('SNOMBRE_USUARIO')	,
                    $USUARIO->__GET('PAPELLIDO_USUARIO')	,
                    $USUARIO->__GET('SAPELLIDO_USUARIO')	,
                    $USUARIO->__GET('EMAIL_USUARIO'),
                    $USUARIO->__GET('TELEFONO_USUARIO'),
                    $USUARIO->__GET('ID_USUARIO')                   
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    public function actualizarContrasena(USUARIO $USUARIO){
        try{
            $query = "

            UPDATE `usuario_usuario` 
            SET 
            `MODIFICACION`= SYSDATE(),	
            `CONTRASENA_USUARIO` = ?
            WHERE 
              `ID_USUARIO` = ? ;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $USUARIO->__GET('CONTRASENA_USUARIO'),
                    $USUARIO->__GET('ID_USUARIO')                   
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    
    //FUNCIONES ESPECIALIZADAS 

    //CAMBIO DE ESTADO DE LA FILA
    //CAMBIO A DESACTIVADO
    public function deshabilitar(USUARIO $USUARIO){

        try{
            $query = "
		UPDATE `usuario_usuario` SET	
            `MODIFICACION`= SYSDATE(),			
            `ESTADO_REGISTRO` = 0
		WHERE `ID_USUARIO`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $USUARIO->__GET('ID_USUARIO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(USUARIO $USUARIO){

        try{
            $query = "
		UPDATE `usuario_usuario` SET	
            `MODIFICACION`= SYSDATE(),			
            `ESTADO_REGISTRO` = 1
		WHERE `ID_USUARIO`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $USUARIO->__GET('ID_USUARIO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }


    //OPERACION DE INCIIO SESION
    public function iniciarSession($NOMBRE,$CONTRASENA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `usuario_usuario` WHERE `NOMBRE_USUARIO`= '".$NOMBRE."' AND `CONTRASENA_USUARIO` = '".$CONTRASENA."';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
 
    
    
    
}
?>