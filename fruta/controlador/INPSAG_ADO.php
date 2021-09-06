<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../modelo/INPSAG.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../config/BDCONFIG.php';
//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class INPSAG_ADO {
  
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
    public function listarInpsag(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_inpsag` limit 6;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	var_dump($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    //LISTAR TODO

    public function obtenerTotalesInpsagCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT  IFNULL(SUM(`CANTIDAD_ENVASE_INPSAG`),0) AS 'ENVASE',   
                                                     IFNULL(SUM(`KILOS_NETO_INPSAG`),0) AS 'NETO',  
                                                     IFNULL(SUM(`KILOS_BRUTO_INPSAG`),0)  AS 'BRUTO'  
                                            FROM `fruta_inpsag` ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	var_dump($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function listarInpsagCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT *,
                                                       DATE_FORMAT(FECHA_INGRESO_INPSAG, '%Y-%m-%d') AS 'INGRESO',
                                                       DATE_FORMAT(FECHA_MODIFICACION_INPSAG, '%Y-%m-%d') AS 'MODIFICACION',
                                                       IFNULL(CANTIDAD_ENVASE_INPSAG,0)  AS 'ENVASE',
                                                       IFNULL(KILOS_NETO_INPSAG,0)  AS 'NETO',
                                                       IFNULL(KILOS_BRUTO_INPSAG,0) AS 'BRUTO'
                                            FROM `fruta_inpsag` ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	var_dump($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function listarInpsagCBX2(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                       DATE_FORMAT(FECHA_INGRESO_INPSAG, '%Y-%m-%d') AS 'INGRESO',
                                                       DATE_FORMAT(FECHA_MODIFICACION_INPSAG, '%Y-%m-%d') AS 'MODIFICACION',
                                                       FORMAT(IFNULL(CANTIDAD_ENVASE_INPSAG,0),0,'de_DE')  AS 'ENVASE',
                                                       FORMAT(IFNULL(KILOS_NETO_INPSAG,0),2,'de_DE')  AS 'NETO',
                                                       FORMAT(IFNULL(KILOS_BRUTO_INPSAG,0),2,'de_DE')  AS 'BRUTO',
                                                       FORMAT(IFNULL(CIF_INPSAG,0),2,'de_DE')  AS 'CIF'
                                            FROM `fruta_inpsag` ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	var_dump($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function listarInpsagEmpresaPlantaTemporadaCBX($EMPRESA,$PLANTA,$TEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                       DATE_FORMAT(FECHA_INGRESO_INPSAG, '%d-%m-%Y %H:%i:%S') AS 'INGRESO',
                                                       DATE_FORMAT(FECHA_MODIFICACION_INPSAG, '%d-%m-%Y %H:%i:%S') AS 'MODIFICACION',
                                                       IFNULL(CANTIDAD_ENVASE_INPSAG,0)  AS 'ENVASE',
                                                       IFNULL(KILOS_NETO_INPSAG,0) AS 'NETO',
                                                       IFNULL(KILOS_BRUTO_INPSAG,0)  AS 'BRUTO'
                                            FROM `fruta_inpsag`                                                                                                     
                                            WHERE ID_EMPRESA = '".$EMPRESA."' 
                                            AND ID_PLANTA = '".$PLANTA."'
                                            AND ID_TEMPORADA = '".$TEMPORADA."'
                                            ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	var_dump($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    } 
    public function listarInpsagEmpresaPlantaTemporadaCBX2($EMPRESA,$PLANTA,$TEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                       DATE_FORMAT(FECHA_INGRESO_INPSAG, '%d-%m-%Y %H:%i:%S') AS 'INGRESO',
                                                       DATE_FORMAT(FECHA_MODIFICACION_INPSAG, '%d-%m-%Y %H:%i:%S') AS 'MODIFICACION',
                                                       FORMAT(IFNULL(CANTIDAD_ENVASE_INPSAG,0),0,'de_DE')  AS 'ENVASE',
                                                       FORMAT(IFNULL(KILOS_NETO_INPSAG,0),2,'de_DE')  AS 'NETO',
                                                       FORMAT(IFNULL(KILOS_BRUTO_INPSAG,0),2,'de_DE')  AS 'BRUTO',
                                                       FORMAT(IFNULL(CIF_INPSAG,0),2,'de_DE')  AS 'CIF'
                                            FROM `fruta_inpsag`                                                                                                     
                                            WHERE ID_EMPRESA = '".$EMPRESA."' 
                                            AND ID_PLANTA = '".$PLANTA."'
                                            AND ID_TEMPORADA = '".$TEMPORADA."'
                                            ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	var_dump($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }    
    public function obtenerTotalesInpsagCBX2(){
        try{
            
            $datos=$this->conexion->prepare("SELECT  FORMAT(IFNULL(SUM(`CANTIDAD_ENVASE_INPSAG`),0),0,'de_DE') AS 'ENVASE',   
                                                     FORMAT(IFNULL(SUM(`KILOS_NETO_INPSAG`),0),2,'de_DE') AS 'NETO',  
                                                     FORMAT(IFNULL(SUM(`KILOS_BRUTO_INPSAG`),0),2,'de_DE')  AS 'BRUTO'  
                                            FROM `fruta_inpsag` ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	var_dump($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function obtenerTotalesInpsaEmpresaPlantaTemporadagCBX($EMPRESA,$PLANTA,$TEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT  IFNULL(SUM(`CANTIDAD_ENVASE_INPSAG`),0) AS 'ENVASE',   
                                                     IFNULL(SUM(`KILOS_NETO_INPSAG`),0) AS 'NETO',  
                                                     IFNULL(SUM(`KILOS_BRUTO_INPSAG`),0)  AS 'BRUTO'  
                                            FROM `fruta_inpsag` 
                                                                                                                        
                                            WHERE ID_EMPRESA = '".$EMPRESA."' 
                                            AND ID_PLANTA = '".$PLANTA."'
                                            AND ID_TEMPORADA = '".$TEMPORADA."'
                                            ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	var_dump($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function obtenerTotalesInpsaEmpresaPlantaTemporadagCBX2($EMPRESA,$PLANTA,$TEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT  FORMAT(IFNULL(SUM(`CANTIDAD_ENVASE_INPSAG`),0),0,'de_DE') AS 'ENVASE',   
                                                     FORMAT(IFNULL(SUM(`KILOS_NETO_INPSAG`),0),2,'de_DE') AS 'NETO',  
                                                     FORMAT(IFNULL(SUM(`KILOS_BRUTO_INPSAG`),0),2,'de_DE')  AS 'BRUTO'  
                                            FROM `fruta_inpsag` 
                                                                                                                        
                                            WHERE ID_EMPRESA = '".$EMPRESA."' 
                                            AND ID_PLANTA = '".$PLANTA."'
                                            AND ID_TEMPORADA = '".$TEMPORADA."'
                                            ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	var_dump($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function listarInpsagCBXMP(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_inpsag` WHERE `ID_TINPSAG` = 1;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	var_dump($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    public function listarInpsagCBIQF(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_inpsag`  WHERE `ID_TINPSAG` = 2;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	var_dump($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
    public function verInpsag($ID){
        try{
     
            $datos=$this->conexion->prepare("SELECT *,
                                             DATE_FORMAT(FECHA_INGRESO_INPSAG, '%Y-%m-%d') AS 'FECHA_INGRESOR',
                                             DATE_FORMAT(FECHA_MODIFICACION_INPSAG, '%Y-%m-%d') AS 'FECHA_MODIFICACIONR' 
                                             FROM `fruta_inpsag` WHERE `ID_INPSAG`= '".$ID."';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	var_dump($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

      //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
      public function verInpsag2($ID){
        try{
     
            $datos=$this->conexion->prepare("SELECT *, DATE_FORMAT(FECHA_INPSAG, '%d-%m-%Y') AS 'FECHA',
                                                    DATE_FORMAT(FECHA_INGRESO_INPSAG, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(FECHA_MODIFICACION_INPSAG, '%Y-%m-%d') AS 'MODIFICACION' 
                                            FROM `fruta_inpsag`
                                            WHERE `ID_INPSAG`= '".$ID."';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	var_dump($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    
    //BUSCAR CONSIDENCIA DE ACUERDO AL CARACTER INGRESADO EN LA FUNCION
    public function buscarNombreInpsag($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_inpsag` WHERE `OBSERVACION_INPSAG` LIKE '%".$NOMBRE."%';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	var_dump($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    //REGISTRO DE UNA NUEVA FILA    
    public function agregarInpsag(INPSAG $INPSAG){
        if($INPSAG->__GET('ID_PAIS2')==NULL){
            $INPSAG->__SET('ID_PAIS2', NULL);
        }
        if($INPSAG->__GET('ID_PAIS3')==NULL){
            $INPSAG->__SET('ID_PAIS3', NULL);
        }
        if($INPSAG->__GET('ID_PAIS4')==NULL){
            $INPSAG->__SET('ID_PAIS4', NULL);
        }

        try{     
            
            $query=
            "INSERT INTO `fruta_inpsag` (         `NUMERO_INPSAG`,`FECHA_INPSAG`,
                                            `CANTIDAD_ENVASE_INPSAG`, `KILOS_NETO_INPSAG`,`KILOS_BRUTO_INPSAG`,                                             
                                            `OBSERVACION_INPSAG`, `CIF_INPSAG`, `TESTADOSAG`, 
                                            `ID_INPECTOR`, `ID_CONTRAPARTE`, `ID_TINPSAG`,
                                            `ID_PAIS1`, `ID_PAIS2`, `ID_PAIS3`, `ID_PAIS4`, 
                                            `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, 

                                            `FECHA_INGRESO_INPSAG`, `FECHA_MODIFICACION_INPSAG`, 
                                            `ESTADO`,  `ESTADO_REGISTRO`)
             VALUES
               ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  SYSDATE(),  SYSDATE(),  1, 1);";
               
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $INPSAG->__GET('NUMERO_INPSAG'),
                    $INPSAG->__GET('FECHA_INPSAG'),
                    $INPSAG->__GET('CANTIDAD_ENVASE_INPSAG'),
                    $INPSAG->__GET('KILOS_NETO_INPSAG'), 
                    $INPSAG->__GET('KILOS_BRUTO_INPSAG'), 
                    $INPSAG->__GET('OBSERVACION_INPSAG'),  
                    $INPSAG->__GET('CIF_INPSAG'),  
                    $INPSAG->__GET('TESTADOSAG'),
                    $INPSAG->__GET('ID_INPECTOR'), 
                    $INPSAG->__GET('ID_CONTRAPARTE'), 
                    $INPSAG->__GET('ID_TINPSAG'), 
                    $INPSAG->__GET('ID_PAIS1'),
                    $INPSAG->__GET('ID_PAIS2'),
                    $INPSAG->__GET('ID_PAIS3'),
                    $INPSAG->__GET('ID_PAIS4'),
                    $INPSAG->__GET('ID_EMPRESA'),   
                    $INPSAG->__GET('ID_PLANTA'),  
                    $INPSAG->__GET('ID_TEMPORADA')
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarInpsag($id){
        try{$sql="DELETE FROM `fruta_inpsag` WHERE `ID_INPSAG`=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
        
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarInpsag(INPSAG $INPSAG){

        if($INPSAG->__GET('ID_PAIS2')==NULL){
            $INPSAG->__SET('ID_PAIS2', NULL);
        }
        if($INPSAG->__GET('ID_PAIS3')==NULL){
            $INPSAG->__SET('ID_PAIS3', NULL);
        }
        if($INPSAG->__GET('ID_PAIS4')==NULL){
            $INPSAG->__SET('ID_PAIS4', NULL);
        }


        try{
            $query = "
		UPDATE `fruta_inpsag` SET
        `FECHA_INPSAG` = ?,
        `CANTIDAD_ENVASE_INPSAG` = ?,
        `KILOS_NETO_INPSAG` = ?, 
        `KILOS_BRUTO_INPSAG` = ?, 
        `FECHA_MODIFICACION_INPSAG` = SYSDATE(),
        `OBSERVACION_INPSAG` = ?,
        `CIF_INPSAG` = ?, 
        `TESTADOSAG` = ?, 
        `ID_INPECTOR` = ?, 
        `ID_CONTRAPARTE` = ?, 
        `ID_TINPSAG` = ?, 
        `ID_PAIS1` = ?, 
        `ID_PAIS2` = ?, 
        `ID_PAIS3` = ?, 
        `ID_PAIS4` = ?, 
        `ID_EMPRESA` = ?,
        `ID_PLANTA` = ?, 
        `ID_TEMPORADA` = ?, 
        `ESTADO` = 1
		WHERE `ID_INPSAG`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $INPSAG->__GET('FECHA_INPSAG'),
                    $INPSAG->__GET('CANTIDAD_ENVASE_INPSAG'),
                    $INPSAG->__GET('KILOS_NETO_INPSAG'), 
                    $INPSAG->__GET('KILOS_BRUTO_INPSAG'),     
                    $INPSAG->__GET('OBSERVACION_INPSAG'),  
                    $INPSAG->__GET('CIF_INPSAG'),  
                    $INPSAG->__GET('TESTADOSAG'),
                    $INPSAG->__GET('ID_INPECTOR'), 
                    $INPSAG->__GET('ID_CONTRAPARTE'), 
                    $INPSAG->__GET('ID_TINPSAG'),
                    $INPSAG->__GET('ID_PAIS1'),
                    $INPSAG->__GET('ID_PAIS2'),
                    $INPSAG->__GET('ID_PAIS3'),
                    $INPSAG->__GET('ID_PAIS4'),
                    $INPSAG->__GET('ID_EMPRESA'),   
                    $INPSAG->__GET('ID_PLANTA'),  
                    $INPSAG->__GET('ID_TEMPORADA'),
                    $INPSAG->__GET('ID_INPSAG')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

  


   //FUNCIONES ESPECIALIZADAS 

//ACTUALIZAR INFORMACION DE LA FILA
public function actualizarDespachoExistenciaExportacion(INPSAG $INPSAG){
    try{
        $query = "
    UPDATE `fruta_inpsag` SET
        `CANTIDAD_ENVASE_INPSAG`= ?,
        `KILOS_NETO_INPSAG`= ?,
        `FECHA_MODIFICACION_INPSAG` = SYSDATE()        
    WHERE `ID_INPSAG`= ?;";
        $this->conexion->prepare($query)
        ->execute(
            array(
                $INPSAG->__GET('CANTIDAD_ENVASE_INPSAG'),
                $INPSAG->__GET('KILOS_NETO_INPSAG'),
                $INPSAG->__GET('ID_INPSAG')
                
            )
            
            );
        
    }catch(Exception $e){
        die($e->getMessage());
    }
    
}
//ACTUALIZAR INFORMACION DE LA FILA
public function actualizarDespachoQuitarExistenciaExportacion(INPSAG $INPSAG){
    try{
        $query = "
    UPDATE `fruta_inpsag` SET
        `CANTIDAD_ENVASE_INPSAG`= ?,
        `KILOS_NETO_INPSAG`= ?,
        `FECHA_MODIFICACION_INPSAG` = SYSDATE()        
    WHERE `ID_INPSAG`= ?;";
        $this->conexion->prepare($query)
        ->execute(
            array(  
                $INPSAG->__GET('CANTIDAD_ENVASE_PCDESPACHO'),
                $INPSAG->__GET('KILOS_NETO_INPSAG'),
                $INPSAG->__GET('ID_INPSAG')
                
            )
            
            );
        
    }catch(Exception $e){
        die($e->getMessage());
    }
    
}


    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(INPSAG $INPSAG){

        try{
            $query = "
    UPDATE `fruta_inpsag` SET			
            `ESTADO_REGISTRO` = 0
    WHERE `ID_INPSAG`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $INPSAG->__GET('ID_INPSAG')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(INPSAG $INPSAG){
        try{
            $query = "
    UPDATE `fruta_inpsag` SET			
            `ESTADO_REGISTRO` = 1
    WHERE `ID_INPSAG`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $INPSAG->__GET('ID_INPSAG')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

        //CAMBIO ESTADO
        //ABIERTO 1
        public function abierto(INPSAG $INPSAG){
            try{
                $query = "
                    UPDATE `fruta_inpsag` SET			
                            `ESTADO` = 1
                    WHERE `ID_INPSAG`= ?;";
                $this->conexion->prepare($query)
                ->execute(
                        array(                 
                            $INPSAG->__GET('ID_INPSAG')                   
                        )                    
                    );                
            }catch(Exception $e){
                die($e->getMessage());
            }
            
        }
        //CERRADO 0
        public function  cerrado(INPSAG $INPSAG){
            try{
                $query = "
                    UPDATE `fruta_inpsag` SET			
                            `ESTADO` = 0
                    WHERE `ID_INPSAG`= ?;";
                $this->conexion->prepare($query)
                ->execute(
                        array(                 
                            $INPSAG->__GET('ID_INPSAG')                   
                        )                    
                    );                
            }catch(Exception $e){
                die($e->getMessage());
            }
            
        }
  
    //CONSULTA PARA OBTENER LA FILA EN EL MISMO MOMENTO DE REGISTRAR LA FILA
    public function buscarInpsagID($FECHAINPSAG ,$KILOSNETOINPSAG,$KGBRUTOINPSAG, $INPECTOR, $CONTRAPARTE, $TESTADOSAG, $TINPSAG, $EMPRESA,$PLANTA,$TEMPORADA){
                                       
        try{
            $datos=$this->conexion->prepare(" SELECT *
                                            FROM `fruta_inpsag`
                                            WHERE 
                                                 FECHA_INPSAG LIKE '".$FECHAINPSAG."' 
                                                 AND CANTIDAD_ENVASE_INPSAG  = '".$KILOSNETOINPSAG."'  
                                                 AND KILOS_NETO_INPSAG  = '".$KILOSNETOINPSAG."'  
                                                 AND KILOS_BRUTO_INPSAG  = '".$KGBRUTOINPSAG."' 
                                                 AND DATE_FORMAT(FECHA_INGRESO_INPSAG, '%Y-%m-%d %H:%i') =  DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i') 
                                                 AND DATE_FORMAT(FECHA_MODIFICACION_INPSAG, '%Y-%m-%d %H:%i') = DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i')                                                  
                                                 AND ID_INPECTOR = '".$INPECTOR."'                                                   
                                                 AND ID_CONTRAPARTE = '".$CONTRAPARTE."'                                                   
                                                 AND TESTADOSAG = '".$TESTADOSAG."'                                                  
                                                 AND ID_TINPSAG = '".$TINPSAG."'   
                                                 AND ID_EMPRESA = '".$EMPRESA."'                                      
                                                 AND ID_PLANTA = '".$PLANTA ."'                                      
                                                 AND ID_TEMPORADA = '".$TEMPORADA."'
                                                 ORDER BY ID_INPSAG DESC
                                                
                                                 ; ");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            // var_dump($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    
    //BUSCAR FECHA ACTUAL DEL SISTEMA
    public function obtenerFecha(){
        try{
            
            $datos=$this->conexion->prepare("SELECT CURDATE() AS 'FECHA' , DATE_FORMAT(NOW( ), '%H:%i') AS 'HORA'   ;");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	var_dump($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    
    public function obtenerNumero($EMPRESA,$PLANTA,$TEMPORADA){
        try{
            $datos=$this->conexion->prepare(" SELECT  COUNT(IFNULL(NUMERO_INPSAG,0)) AS 'NUMERO'
                                                FROM `fruta_inpsag`
                                                WHERE  
                                                    ID_PLANTA = '".$PLANTA."'
                                                AND ID_TEMPORADA = '".$TEMPORADA."'     
                                                    ; ");
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
