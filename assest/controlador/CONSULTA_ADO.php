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
                                                     IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0)  AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle, principal_empresa empresa
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND recepcion.ID_EMPRESA=empresa.ID_EMPRESA
                                                AND  empresa.ESTADO_REGISTRO = 1
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1 
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
                                                ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function acumuladoRecepcionMpNoBulk($TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0)  AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle, principal_empresa empresa
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND recepcion.ID_EMPRESA=empresa.ID_EMPRESA
                                                AND  empresa.ESTADO_REGISTRO = 1
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1 
                                                AND recepcion.TRECEPCION !=3
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
                                                ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function acumuladoRecepcionMpBulk($TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0)  AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle, principal_empresa empresa
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND  recepcion.ID_EMPRESA=empresa.ID_EMPRESA
                                                AND  empresa.ESTADO_REGISTRO = 1
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1 
                                                AND  recepcion.TRECEPCION = 3
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
                                                ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function acumuladoRecepcionMpPorEmpresa($EMPRESA,$TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0)  AS 'NETO' 
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
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function acumuladoRecepcionMpNoBulkPorEmpresa($EMPRESA,$TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0)  AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1
                                                AND  recepcion.TRECEPCION != 3
                                                AND recepcion.ID_EMPRESA = '".$EMPRESA."'
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
                                                ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function acumuladoRecepcionMpBulkPorEmpresa($EMPRESA,$TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0)  AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1
                                                AND  recepcion.TRECEPCION = 3
                                                AND recepcion.ID_EMPRESA = '".$EMPRESA."'
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
                                                ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function acumuladoRecepcionMpPorPlanta($PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0)  AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle, principal_empresa empresa
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND recepcion.ID_EMPRESA=empresa.ID_EMPRESA
                                                AND  empresa.ESTADO_REGISTRO = 1
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1
                                                AND  recepcion.ID_PLANTA = '".$PLANTA."'
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
                                                ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function acumuladoRecepcionMpNoBulkPorPlanta($PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0)  AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle, principal_empresa empresa
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND recepcion.ID_EMPRESA=empresa.ID_EMPRESA
                                                AND  empresa.ESTADO_REGISTRO = 1
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1
                                                AND  recepcion.TRECEPCION !=3
                                                AND  recepcion.ID_PLANTA = '".$PLANTA."'
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
                                                ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function acumuladoRecepcionMpBulkPorPlanta($PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0)  AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle, principal_empresa empresa
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND recepcion.ID_EMPRESA=empresa.ID_EMPRESA
                                                AND  empresa.ESTADO_REGISTRO = 1
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1
                                                AND  recepcion.TRECEPCION =3
                                                AND recepcion.ID_PLANTA = '".$PLANTA."'
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
                                                ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function acumuladoRecepcionMpPorEmpresaPlanta($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0)  AS 'NETO' 
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
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function acumuladoRecepcionMpNoBulkPorEmpresaPlanta($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0)  AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1
                                                AND  recepcion.TRECEPCION !=3
                                                AND recepcion.ID_EMPRESA = '".$EMPRESA."'
                                                AND recepcion.ID_PLANTA = '".$PLANTA."'
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
                                                ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function acumuladoRecepcionMpBulkPorEmpresaPlanta($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0)  AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1
                                                AND  recepcion.TRECEPCION =3
                                                AND recepcion.ID_EMPRESA = '".$EMPRESA."'
                                                AND recepcion.ID_PLANTA = '".$PLANTA."'
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
                                                ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function acumuladoProcesadoMp($TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(existencia.KILOS_NETO_EXIMATERIAPRIMA),0)  AS 'NETO' 
                                                FROM fruta_eximateriaprima existencia, principal_empresa empresa
                                                WHERE existencia.ID_EMPRESA=empresa.ID_EMPRESA
                                                AND empresa.ESTADO_REGISTRO = 1
                                                AND existencia.ESTADO_REGISTRO = 1 
                                                AND existencia.ID_PROCESO IS NOT NULL                                             
                                                AND existencia.ID_TEMPORADA = '".$TEMPORADA."'
                                                ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function acumuladoProcesadoMpPorEmpresa($EMPRESA,$TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0)  AS 'NETO' 
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
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function acumuladoProcesadoMpPorPlanta($PLANTA,$TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(existencia.KILOS_NETO_EXIMATERIAPRIMA),0)  AS 'NETO' 
                                                FROM fruta_eximateriaprima existencia, principal_empresa empresa
                                                WHERE existencia.ID_EMPRESA=empresa.ID_EMPRESA
                                                AND empresa.ESTADO_REGISTRO = 1
                                                AND existencia.ESTADO_REGISTRO = 1 
                                                AND existencia.ID_PROCESO IS NOT NULL                                             
                                                AND existencia.ID_TEMPORADA = '".$TEMPORADA."'
                                                AND existencia.ID_PLANTA = '".$PLANTA."'   
    
                                                ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function acumuladoProcesadoMpPorEmpresaPlanta($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0)  AS 'NETO' 
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
            //	var_dump($resultado);


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
                                                     IFNULL(SUM(existencia.KILOS_NETO_EXIMATERIAPRIMA),0)  AS 'NETO' 
                                                FROM fruta_eximateriaprima existencia, principal_empresa empresa
                                                WHERE existencia.ID_EMPRESA=empresa.ID_EMPRESA
                                                AND empresa.ESTADO_REGISTRO = 1
                                                AND existencia.ESTADO_REGISTRO = 1 
                                                AND existencia.ESTADO = 2                                           
                                                AND existencia.ID_TEMPORADA = '".$TEMPORADA."'
                                                ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function existenciaDisponibleMpPorEmpresa($EMPRESA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                      IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0)  AS 'NETO' 
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
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function existenciaDisponibleMpPorPlanta($PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(existencia.KILOS_NETO_EXIMATERIAPRIMA),0)  AS 'NETO' 
                                                FROM fruta_eximateriaprima existencia, principal_empresa empresa
                                                WHERE existencia.ID_EMPRESA=empresa.ID_EMPRESA
                                                AND empresa.ESTADO_REGISTRO = 1
                                                AND existencia.ESTADO_REGISTRO = 1 
                                                AND existencia.ESTADO = 2 
                                                AND existencia.ID_PLANTA = '".$PLANTA ."'                                         
                                                AND existencia.ID_TEMPORADA = '".$TEMPORADA."'           
                                                ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function existenciaDisponibleMpPorEmpresaPlanta($EMPRESA,$PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                      IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0)  AS 'NETO' 
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
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    


    public function contarRegistrosAbiertosMateriales($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    (
                                                        select IFNULL( COUNT(recepcione.ID_RECEPCION),0) 
                                                        FROM material_recepcione recepcione
                                                        WHERE recepcione.ESTADO = 1     
                                                        AND recepcione.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                    ) AS 'RECEPCIONE',
                                                    (
                                                        select IFNULL( COUNT(recepcionm.ID_RECEPCION),0) 
                                                        FROM material_recepcionm recepcionm
                                                        WHERE recepcionm.ESTADO = 1
                                                        AND recepcionm.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                    ) AS 'RECEPCIONM',
                                                    (
                                                        select IFNULL( COUNT(despachoe.ID_DESPACHO),0) 
                                                        FROM material_despachoe despachoe
                                                        WHERE despachoe.ESTADO = 1
                                                        AND despachoe.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                    ) AS 'DESPACHOE',
                                                    (
                                                        select IFNULL( COUNT(despachom.ID_DESPACHO),0) 
                                                        FROM material_despachom despachom
                                                        WHERE despachom.ESTADO = 1
                                                        AND despachom.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                    ) AS 'DESPACHOM'
                                                ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function contarRegistrosAbiertosFruta($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                        ( SELECT IFNULL( COUNT(recepcionmp.ID_RECEPCION),0)
                                                        FROM fruta_recepcionmp recepcionmp
                                                        WHERE recepcionmp.ESTADO = 1
                                                        AND recepcionmp.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) AS 'RECEPCIONMP',
                                                        ( SELECT IFNULL( COUNT(recepcionind.ID_RECEPCION),0)
                                                        FROM fruta_recepcionind recepcionind
                                                        WHERE recepcionind.ESTADO = 1
                                                        AND recepcionind.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        )AS 'RECEPCIONIND',
                                                        ( SELECT IFNULL( COUNT(recepcionp.ID_RECEPCION),0)
                                                        FROM fruta_recepcionpt recepcionp
                                                        WHERE recepcionp.ESTADO = 1
                                                        AND recepcionp.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        )AS 'RECEPCIONPT', 
                                                        ( SELECT IFNULL( COUNT(recepcionmp.ID_RECEPCION),0)
                                                        FROM fruta_recepcionmp recepcionmp
                                                        WHERE recepcionmp.ESTADO = 1
                                                        AND recepcionmp.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        )+
                                                        ( SELECT IFNULL( COUNT(recepcionind.ID_RECEPCION),0)
                                                        FROM fruta_recepcionind recepcionind
                                                        WHERE recepcionind.ESTADO = 1
                                                        AND recepcionind.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        )+
                                                        ( SELECT IFNULL( COUNT(recepcionp.ID_RECEPCION),0)
                                                        FROM fruta_recepcionpt recepcionp
                                                        WHERE recepcionp.ESTADO = 1
                                                        AND recepcionp.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) AS 'RECEPCION',
                                                        ( SELECT IFNULL( COUNT(despachomp.ID_DESPACHO),0)
                                                        FROM fruta_despachomp despachomp
                                                        WHERE despachomp.ESTADO = 1
                                                        AND despachomp.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) AS 'DESPACHOMP',
                                                        ( SELECT IFNULL( COUNT(despachoind.ID_DESPACHO),0)
                                                        FROM fruta_despachoind despachoind
                                                        WHERE despachoind.ESTADO = 1
                                                        AND despachoind.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) AS 'DESPACHOIND',
                                                        ( SELECT IFNULL( COUNT(despachopt.ID_DESPACHO),0)
                                                        FROM fruta_despachopt despachopt
                                                        WHERE despachopt.ESTADO = 1
                                                        AND despachopt.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) AS 'DESPACHOPT',
                                                        ( SELECT IFNULL( COUNT(despachoex.ID_DESPACHOEX),0)
                                                        FROM fruta_despachoex despachoex
                                                        WHERE despachoex.ESTADO = 1
                                                        AND despachoex.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) AS 'DESPACHOEXPO'  ,
                                                        ( SELECT IFNULL( COUNT(despachomp.ID_DESPACHO),0)
                                                        FROM fruta_despachomp despachomp
                                                        WHERE despachomp.ESTADO = 1
                                                        AND despachomp.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) +
                                                        ( SELECT IFNULL( COUNT(despachoind.ID_DESPACHO),0)
                                                        FROM fruta_despachoind despachoind
                                                        WHERE despachoind.ESTADO = 1
                                                        AND despachoind.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) +
                                                        ( SELECT IFNULL( COUNT(despachopt.ID_DESPACHO),0)
                                                        FROM fruta_despachopt despachopt
                                                        WHERE despachopt.ESTADO = 1
                                                        AND despachopt.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) +
                                                        ( SELECT IFNULL( COUNT(despachoex.ID_DESPACHOEX),0)
                                                        FROM fruta_despachoex despachoex
                                                        WHERE despachoex.ESTADO = 1
                                                        AND despachoex.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) AS 'DESPACHO',
                                                        ( SELECT IFNULL( COUNT(proceso.ID_PROCESO),0)
                                                        FROM fruta_proceso proceso
                                                        WHERE proceso.ESTADO = 1
                                                        AND proceso.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) AS 'PROCESO' ,
                                                        ( SELECT IFNULL( COUNT(reembalaje.ID_REEMBALAJE),0)
                                                        FROM fruta_reembalaje reembalaje
                                                        WHERE reembalaje.ESTADO = 1
                                                        AND reembalaje.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) AS 'REEMBALAJE',
                                                        ( SELECT IFNULL( COUNT(repaletizajeex.ID_REPALETIZAJE),0)
                                                        FROM fruta_repaletizajeex repaletizajeex
                                                        WHERE repaletizajeex.ESTADO = 1
                                                        AND repaletizajeex.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) AS 'REPALETIZAJE'
                                                ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
