<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR

//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class CONSULTA_ADO
{
    //ATRIBUTO
    private $conexion;

    //LLAMADO A LA BD Y CONFIGURAR PARAMETROS

    public function __CONSTRUCT()
    {
        try {
            $BDCONFIG = new BDCONFIG();
            $HOST = $BDCONFIG->__GET('HOST');
            $DBNAME = $BDCONFIG->__GET('DBNAME');
            $USER = $BDCONFIG->__GET('USER');
            $PASS = $BDCONFIG->__GET('PASS');


            $this->conexion = new PDO('mysql:host=' . $HOST . ';dbname=' . $DBNAME, $USER, $PASS);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //FUNCIONES ESPECIALIZADAS 
    //RECEPCION VS PROCESO
    public function acumuladoRecepcionMp($TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    FORMAT(IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0),2,'de_DE') AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1 
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
                                                ;	");
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
    
    public function acumuladoRecepcionMpPorEmpresa($EMPRESA,$TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    FORMAT(IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0),2,'de_DE') AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1
                                                AND recepcion.ID_EMPRESA = '".$EMPRESA."'
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
                                                ;	");
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
    
    public function acumuladoRecepcionMpPorPlanta($PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    FORMAT(IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0),2,'de_DE') AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1
                                                AND recepcion.ID_PLANTA = '".$PLANTA."'
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
                                                ;	");
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
    public function acumuladoRecepcionMpPorEmpresaPlanta($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    FORMAT(IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0),2,'de_DE') AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1
                                                AND recepcion.ID_EMPRESA = '".$EMPRESA."'
                                                AND recepcion.ID_PLANTA = '".$PLANTA."'
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
                                                ;	");
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

    public function acumuladoProcesadoMp($TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0),2,'de_DE') AS 'NETO' 
                                                FROM fruta_eximateriaprima 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_PROCESO IS NOT NULL                                                
                                                AND  ID_TEMPORADA = '".$TEMPORADA."'
                                                ;	");
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
    
    public function acumuladoProcesadoMpPorEmpresa($EMPRESA,$TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0),2,'de_DE') AS 'NETO' 
                                                FROM fruta_eximateriaprima 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_PROCESO IS NOT NULL
                                                AND ID_EMPRESA = '".$EMPRESA."'                                    
                                                AND  ID_TEMPORADA = '".$TEMPORADA."'
                                                ;	");
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
    
    public function acumuladoProcesadoMpPorPlanta($PLANTA,$TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0),2,'de_DE') AS 'NETO' 
                                                FROM fruta_eximateriaprima 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_PROCESO IS NOT NULL
                                                AND ID_PLANTA = '".$PLANTA."'                                    
                                                AND  ID_TEMPORADA = '".$TEMPORADA."'
                                                ;	");
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
    public function acumuladoProcesadoMpPorEmpresaPlanta($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0),2,'de_DE') AS 'NETO' 
                                                FROM fruta_eximateriaprima 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_PROCESO IS NOT NULL
                                                AND ID_EMPRESA = '".$EMPRESA."'
                                                AND ID_PLANTA = '".$PLANTA."'                                    
                                                AND  ID_TEMPORADA = '".$TEMPORADA."'
                                                ;	");
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


 
    //EXISTENCIA DISPONIBLE
    public function existenciaDisponibleMp($TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     FORMAT(IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0),2,'de_DE') AS 'NETO' 
                                                FROM fruta_eximateriaprima 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ESTADO = 2                                                 
                                                AND  ID_TEMPORADA = '".$TEMPORADA."'
                                                ;	");
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
    
    public function existenciaDisponibleMpPorEmpresa($EMPRESA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     FORMAT(IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0),2,'de_DE') AS 'NETO' 
                                                FROM fruta_eximateriaprima 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ESTADO = 2      
                                                AND ID_EMPRESA  = '".$EMPRESA."'                                          
                                                AND  ID_TEMPORADA = '".$TEMPORADA."'
                                                ;	");
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
    
    public function existenciaDisponibleMpPorPlanta($PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     FORMAT(IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0),2,'de_DE') AS 'NETO' 
                                                FROM fruta_eximateriaprima 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ESTADO = 2      
                                                AND ID_PLANTA = '".$PLANTA ."'                                         
                                                AND  ID_TEMPORADA = '".$TEMPORADA."'     
                                                ;	");
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
    
    public function existenciaDisponibleMpPorEmpresaPlanta($EMPRESA,$PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     FORMAT(IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0),2,'de_DE') AS 'NETO' 
                                                FROM fruta_eximateriaprima 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ESTADO = 2         
                                                AND ID_EMPRESA = '".$EMPRESA."'        
                                                AND ID_PLANTA  = '".$PLANTA ."'                                              
                                                AND  ID_TEMPORADA = '".$TEMPORADA."'

                                                ;	");
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
