<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/PTUSUARIO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


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
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_ptusuario  limit 8;	");
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
    public function listarPtusuarioCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_ptusuario  ;	");
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
    public function verPtusuario($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_ptusuario  WHERE  ID_PTUSUARIO = '".$ID."';");
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

    public function agregarPtusuario(PTUSUARIO $PTUSUARIO){
        try{
            
            
            $query=
            "INSERT INTO  usuario_ptusuario  ( 
                                                        FRUTA,
                                                        FGRANEL,
                                                        FGRECEPCION,
                                                        FGRMP,
                                                        FGRIND,

                                                        FGR_CONSOLIDADO,       
                                                        FGDESPACHO ,
                                                        FGDMP,  
                                                        FGDIND,  
                                                        FGD_CONSOLIDADO, 

                                                        FGGUIA,  
                                                        FGGMP,  
                                                        FGGIND,
                                                        FG_EXISTENCIAMP,  
                                                        FG_EXISTENCIAIND,   

                                                        FPACKING,
                                                        FPPROCESO,
                                                        FPREEMBALAJE,
                                                        FP_EXISTENCIAMP,
                                                        FP_EXISTENCIAIND,

                                                        FP_EXISTENCIAPT,
                                                        FLOGISTICA,
                                                        FLICARGA,
                                                        FL_EXISTENCIAPT,
                                                        FSAG,

                                                        FSINSPECCION,
                                                        FS_EXISTENCIAPT,
                                                        FFRIGORIFICO,
                                                        FFRECEPCIONPT,
                                                        FFDESPACHO,

                                                        FFDPT,
                                                        FFDEX,
                                                        FFD_CONSOLIDADO,
                                                        FFGUIA,
                                                        FFGPT,

                                                        FFPC,
                                                        FFREPALETIZAJE,   
                                                        FF_EXISTENCIAPT,
                                                        MATERIAL,
                                                        MMATERIAL,

                                                        MMRECEPCION,
                                                        MMDESPACHO,
                                                        MMGUIA,
                                                        MMEXISTENCIA,
                                                        MENVASE,

                                                        MERECEPCION,
                                                        MEDESPACHO,
                                                        MEEXISTENCIA,
                                                        MEGUIA,   
                                                        MCONSOLIDADO, 

                                                        MCRECEPCION,
                                                        MCDESPACHO,
                                                        MADMINISTRACION,
                                                        MAOC,
                                                        MAOC_AR,

                                                        MAOC_EXISTENCIAM,
                                                        MAOC_EXISTENCIAE,   
                                                        MKARDEX,
                                                        MKMATERIAL,
                                                        MKENVASE,

                                                        EXPORTADORA,
                                                        ELOGISTICA,
                                                        ELICARGA,
                                                        EMATERIAL,
                                                        EMFICHA,


                                                        EINFORME,
                                                        EIGRANEL,
                                                        EIPT,
                                                        EIGESTION,
                                                        MANTENEDORES,

                                                        M_REGISTRO,
                                                        M_EDITAR,
                                                        M_VER,
                                                        M_INFORME,
                                                        M_REPORTE,

                                                        M_AGRUPADO,
                                                        FHISTORIAL,
                                                        FENVASES,
                                                        FGENVASES,
                                                        AREGISTRO,


                                                        ID_TUSUARIO , 

                                                        INGRESO
                                                        MODIFICACION
                                                        ESTADO_REGISTRO
                                             ) VALUES
	       	( ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,    ?, ?, ?, ?, ?,    ?, ?, ?, ?,    ?, ?, ?, ?, ?,    ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?, ?,    ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,    ?, ?, ?, ?, ?,       ?, ?, ?, ?, ?,      ?,  SYSDATE(), SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                    
                    $PTUSUARIO->__GET('FRUTA')  ,
                    $PTUSUARIO->__GET('FGRANEL') ,
                    $PTUSUARIO->__GET('FGRECEPCION') ,
                    $PTUSUARIO->__GET('FGRMP') ,
                    $PTUSUARIO->__GET('FGRIND') ,
                    
                    $PTUSUARIO->__GET('FGR_CONSOLIDADO')  ,
                    $PTUSUARIO->__GET('FGDESPACHO') ,
                    $PTUSUARIO->__GET('FGDMP') ,
                    $PTUSUARIO->__GET('FGDIND') ,
                    $PTUSUARIO->__GET('FGD_CONSOLIDADO') ,
                    
                    $PTUSUARIO->__GET('FGGUIA')  ,
                    $PTUSUARIO->__GET('FGGMP') ,
                    $PTUSUARIO->__GET('FGGIND') ,
                    $PTUSUARIO->__GET('FG_EXISTENCIAMP') ,
                    $PTUSUARIO->__GET('FG_EXISTENCIAIND') ,
                    
                    $PTUSUARIO->__GET('FPACKING')  ,
                    $PTUSUARIO->__GET('FPPROCESO') ,
                    $PTUSUARIO->__GET('FPREEMBALAJE') ,
                    $PTUSUARIO->__GET('FP_EXISTENCIAMP') ,
                    $PTUSUARIO->__GET('FP_EXISTENCIAIND') ,
                    
                    $PTUSUARIO->__GET('FP_EXISTENCIAPT')  ,
                    $PTUSUARIO->__GET('FLOGISTICA') ,
                    $PTUSUARIO->__GET('FLICARGA') ,
                    $PTUSUARIO->__GET('FL_EXISTENCIAPT') ,
                    $PTUSUARIO->__GET('FSAG') ,
                    
                    $PTUSUARIO->__GET('FSINSPECCION')  ,
                    $PTUSUARIO->__GET('FS_EXISTENCIAPT') ,
                    $PTUSUARIO->__GET('FFRIGORIFICO') ,
                    $PTUSUARIO->__GET('FFRECEPCIONPT') ,
                    $PTUSUARIO->__GET('FFDESPACHO') ,
                    
                    $PTUSUARIO->__GET('FFDPT')  ,
                    $PTUSUARIO->__GET('FFDEX') ,
                    $PTUSUARIO->__GET('FFD_CONSOLIDADO') ,
                    $PTUSUARIO->__GET('FFGUIA') ,
                    $PTUSUARIO->__GET('FFGPT') ,
                    
                    $PTUSUARIO->__GET('FFPC')  ,
                    $PTUSUARIO->__GET('FFREPALETIZAJE') ,
                    $PTUSUARIO->__GET('FF_EXISTENCIAPT') ,
                    $PTUSUARIO->__GET('MATERIAL') ,
                    $PTUSUARIO->__GET('MRECEPCION') ,

                    $PTUSUARIO->__GET('MRMATERIAL')  ,
                    $PTUSUARIO->__GET('MRENVASE') ,
                    $PTUSUARIO->__GET('MRGUIA') ,
                    $PTUSUARIO->__GET('MRGMATERIAL') ,
                    $PTUSUARIO->__GET('MRGENVASE') ,

                    $PTUSUARIO->__GET('MR_CONSOLIDADO')  ,
                    $PTUSUARIO->__GET('MR_EXISTENCIAM') ,
                    $PTUSUARIO->__GET('MR_EXISTENCIAE') ,
                    $PTUSUARIO->__GET('MDESPACHO') ,
                    $PTUSUARIO->__GET('MDENVASE')  ,

                    $PTUSUARIO->__GET('MD_CONSOLIDADO') ,
                    $PTUSUARIO->__GET('MD_EXISTENCIAM') ,
                    $PTUSUARIO->__GET('MADMINISTRACION') ,
                    $PTUSUARIO->__GET('MAOC')  ,
                    $PTUSUARIO->__GET('MAOC_AR') ,
                    
                    $PTUSUARIO->__GET('MAOC_EXISTENCIAM') ,
                    $PTUSUARIO->__GET('MAOC_EXISTENCIAE') ,
                    $PTUSUARIO->__GET('MKARDEX') ,
                    $PTUSUARIO->__GET('MKMATERIAL')  ,
                    $PTUSUARIO->__GET('MKENVASE') ,

                    $PTUSUARIO->__GET('EXPORTADORA') ,
                    $PTUSUARIO->__GET('ELOGISTICA') ,
                    $PTUSUARIO->__GET('ELICARGA') ,
                    $PTUSUARIO->__GET('EMATERIAL')  ,
                    $PTUSUARIO->__GET('EMFICHA') ,

                    $PTUSUARIO->__GET('EINFORME') ,
                    $PTUSUARIO->__GET('EIGRANEL') ,
                    $PTUSUARIO->__GET('EIPT') ,                    
                    $PTUSUARIO->__GET('EIGESTION')  ,
                    $PTUSUARIO->__GET('MANTENEDORES') ,

                    $PTUSUARIO->__GET('M_REGISTRO') ,
                    $PTUSUARIO->__GET('M_EDITAR') ,
                    $PTUSUARIO->__GET('M_VER') ,   
                    $PTUSUARIO->__GET('M_INFORME')  ,
                    $PTUSUARIO->__GET('M_REPORTE') ,

                    $PTUSUARIO->__GET('M_AGRUPADO') , 
                    $PTUSUARIO->__GET('FHISTORIAL') , 
                    $PTUSUARIO->__GET('FENVASES') , 
                    $PTUSUARIO->__GET('FGENVASES') , 
                    $PTUSUARIO->__GET('AREGISTRO') ,                     
               
                    $PTUSUARIO->__GET('ID_TUSUARIO')              
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarPtusuario($id){
        try{$sql="DELETE FROM  usuario_ptusuario  WHERE  ID_PTUSUARIO =".$id.";";
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
		UPDATE  usuario_ptusuario  SET
             
                FRUTA=?, 
                FGRANEL=?, 
                FGRECEPCION=?,
                FGRMP=?,
                FGRIND=?,

                FGR_CONSOLIDADO=?,        
                FGDESPACHO =?,
                FGDMP=?,   
                FGDIND=?,   
                FGD_CONSOLIDADO=?,  

                FGGUIA=?,   
                FGGMP=?,   
                FGGIND=?,
                FG_EXISTENCIAMP=?,   
                FG_EXISTENCIAIND=?,  

                FPACKING=?,
                FPPROCESO=?,
                FPREEMBALAJE=?,
                FP_EXISTENCIAMP=?,
                FP_EXISTENCIAIND=?,

                FP_EXISTENCIAPT=?,
                FLOGISTICA=?,
                FLICARGA=?,
                FL_EXISTENCIAPT=?,
                FSAG=?,

                FSINSPECCION=?,
                FS_EXISTENCIAPT=?,
                FFRIGORIFICO=?,
                FFRECEPCIONPT=?,
                FFDESPACHO=?,

                FFDPT=?,
                FFDEX=?,
                FFD_CONSOLIDADO=?,
                FFGUIA=?,
                FFGPT=?,

                FFPC=?,
                FFREPALETIZAJE=?,    
                FF_EXISTENCIAPT=?,
                MATERIAL=?,
                MRECEPCION=?,

                MRMATERIAL=?,
                MRENVASE=?,
                MRGUIA=?,
                MRGMATERIAL=?,
                MRGENVASE=?,

                MR_CONSOLIDADO=?,
                MR_EXISTENCIAM=?,
                MR_EXISTENCIAE=?,
                MDESPACHO=?,
                MDENVASE=?,    

                MD_CONSOLIDADO=?,
                MD_EXISTENCIAM=?,
                MADMINISTRACION=?,
                MAOC=?,
                MAOC_AR=?,

                MAOC_EXISTENCIAM=?,
                MAOC_EXISTENCIAE=?,    
                MKARDEX=?,
                MKMATERIAL=?,
                MKENVASE=?,

                EXPORTADORA=?,
                ELOGISTICA=?,
                ELICARGA=?,
                EMATERIAL=?,
                EMFICHA=?,         

                EINFORME=?,
                EIGRANEL=?,
                EIPT=?,
                EIGESTION=?,
                MANTENEDORES=?,

                M_REGISTRO=?,
                M_EDITAR=?,
                M_VER=?,
                M_INFORME=?,
                M_REPORTE=?,

                M_AGRUPADO=?,
                FHISTORIAL=?,
                FENVASES=?,
                FGENVASES=?,
                AREGISTRO=?,                

                ID_TUSUARIO = ?            
		WHERE  ID_PTUSUARIO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                        $PTUSUARIO->__GET('FRUTA')  ,
                        $PTUSUARIO->__GET('FGRANEL') ,
                        $PTUSUARIO->__GET('FGRECEPCION') ,
                        $PTUSUARIO->__GET('FGRMP') ,
                        $PTUSUARIO->__GET('FGRIND') ,
                        
                        $PTUSUARIO->__GET('FGR_CONSOLIDADO')  ,
                        $PTUSUARIO->__GET('FGDESPACHO') ,
                        $PTUSUARIO->__GET('FGDMP') ,
                        $PTUSUARIO->__GET('FGDIND') ,
                        $PTUSUARIO->__GET('FGD_CONSOLIDADO') ,
                        
                        $PTUSUARIO->__GET('FGGUIA')  ,
                        $PTUSUARIO->__GET('FGGMP') ,
                        $PTUSUARIO->__GET('FGGIND') ,
                        $PTUSUARIO->__GET('FG_EXISTENCIAMP') ,
                        $PTUSUARIO->__GET('FG_EXISTENCIAIND') ,
                        
                        $PTUSUARIO->__GET('FPACKING')  ,
                        $PTUSUARIO->__GET('FPPROCESO') ,
                        $PTUSUARIO->__GET('FPREEMBALAJE') ,
                        $PTUSUARIO->__GET('FP_EXISTENCIAMP') ,
                        $PTUSUARIO->__GET('FP_EXISTENCIAIND') ,
                        
                        $PTUSUARIO->__GET('FP_EXISTENCIAPT')  ,
                        $PTUSUARIO->__GET('FLOGISTICA') ,
                        $PTUSUARIO->__GET('FLICARGA') ,
                        $PTUSUARIO->__GET('FL_EXISTENCIAPT') ,
                        $PTUSUARIO->__GET('FSAG') ,
                        
                        $PTUSUARIO->__GET('FSINSPECCION')  ,
                        $PTUSUARIO->__GET('FS_EXISTENCIAPT') ,
                        $PTUSUARIO->__GET('FFRIGORIFICO') ,
                        $PTUSUARIO->__GET('FFRECEPCIONPT') ,
                        $PTUSUARIO->__GET('FFDESPACHO') ,
                        
                        $PTUSUARIO->__GET('FFDPT')  ,
                        $PTUSUARIO->__GET('FFDEX') ,
                        $PTUSUARIO->__GET('FFD_CONSOLIDADO') ,
                        $PTUSUARIO->__GET('FFGUIA') ,
                        $PTUSUARIO->__GET('FFGPT') ,
                        
                        $PTUSUARIO->__GET('FFPC')  ,
                        $PTUSUARIO->__GET('FFREPALETIZAJE') ,
                        $PTUSUARIO->__GET('FF_EXISTENCIAPT') ,
                        $PTUSUARIO->__GET('MATERIAL') ,
                        $PTUSUARIO->__GET('MRECEPCION') ,

                        $PTUSUARIO->__GET('MRMATERIAL')  ,
                        $PTUSUARIO->__GET('MRENVASE') ,
                        $PTUSUARIO->__GET('MRGUIA') ,
                        $PTUSUARIO->__GET('MRGMATERIAL') ,
                        $PTUSUARIO->__GET('MRGENVASE') ,

                        $PTUSUARIO->__GET('MR_CONSOLIDADO')  ,
                        $PTUSUARIO->__GET('MR_EXISTENCIAM') ,
                        $PTUSUARIO->__GET('MR_EXISTENCIAE') ,
                        $PTUSUARIO->__GET('MDESPACHO') ,
                        $PTUSUARIO->__GET('MDENVASE')  ,

                        $PTUSUARIO->__GET('MD_CONSOLIDADO') ,
                        $PTUSUARIO->__GET('MD_EXISTENCIAM') ,
                        $PTUSUARIO->__GET('MADMINISTRACION') ,
                        $PTUSUARIO->__GET('MAOC')  ,
                        $PTUSUARIO->__GET('MAOC_AR') ,

                        $PTUSUARIO->__GET('MAOC_EXISTENCIAM') ,
                        $PTUSUARIO->__GET('MAOC_EXISTENCIAE') ,
                        $PTUSUARIO->__GET('MKARDEX') ,
                        $PTUSUARIO->__GET('MKMATERIAL')  ,
                        $PTUSUARIO->__GET('MKENVASE') ,

                        $PTUSUARIO->__GET('EXPORTADORA') ,
                        $PTUSUARIO->__GET('ELOGISTICA') ,
                        $PTUSUARIO->__GET('ELICARGA') ,
                        $PTUSUARIO->__GET('EMATERIAL')  ,
                        $PTUSUARIO->__GET('EMFICHA') ,

                        $PTUSUARIO->__GET('EINFORME') ,
                        $PTUSUARIO->__GET('EIGRANEL') ,
                        $PTUSUARIO->__GET('EIPT') ,                        
                        $PTUSUARIO->__GET('EIGESTION')  ,
                        $PTUSUARIO->__GET('MANTENEDORES') ,

                        $PTUSUARIO->__GET('M_REGISTRO') ,
                        $PTUSUARIO->__GET('M_EDITAR') ,
                        $PTUSUARIO->__GET('M_VER') ,   
                        $PTUSUARIO->__GET('M_INFORME')  ,
                        $PTUSUARIO->__GET('M_REPORTE') ,  
                        
                        $PTUSUARIO->__GET('M_AGRUPADO') , 
                        $PTUSUARIO->__GET('FHISTORIAL') , 
                        $PTUSUARIO->__GET('FENVASES') , 
                        $PTUSUARIO->__GET('FGENVASES') , 
                        $PTUSUARIO->__GET('AREGISTRO') ,    
                        
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
    UPDATE  usuario_ptusuario  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_PTUSUARIO = ?;";
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
    UPDATE  usuario_ptusuario  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_PTUSUARIO = ?;";
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