<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../modelo/DESPACHOPT.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../config/BDCONFIG.php';
//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class DESPACHOPT_ADO
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



    //FUNCIONES BASICAS 
    //LISTAR TODO CON LIMITE DE 6 FILAS  
    public function listarDespachopt()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM `fruta_despachopt` limit 6;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //LISTAR TODO
    public function listarDespachoptCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM `fruta_despachopt` ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listarDespachoptEmpresaPlantaTemporadaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                    DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y') AS 'FECHA',
                                                    DATE_FORMAT(FECHA_INGRESO_DESPACHO, '%d-%m-%Y %H:%i:%S') AS 'INGRESO',
                                                    DATE_FORMAT(FECHA_MODIFICACION_DESPACHO, '%d-%m-%Y %H:%i:%S') AS 'MODIFICACION',
                                                     FORMAT(IFNULL(`CANTIDAD_ENVASE_DESPACHO`,0),0,'de_DE') AS 'ENVASE',   
                                                     FORMAT(IFNULL(`KILOS_NETO_DESPACHO`,0),2,'de_DE') AS 'NETO',  
                                                     FORMAT(IFNULL(`KILOS_BRUTO_DESPACHO`,0),2,'de_DE')  AS 'BRUTO' 
                                            FROM `fruta_despachopt`                                                                           
                                            WHERE ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "';	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listarDespachoptEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                            FROM `fruta_despachopt`                                                                           
                                            WHERE ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "';	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listarDespachoptEmpresaPlantaTemporadaGuiaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                            FROM `fruta_despachopt`                                                                           
                                            WHERE TDESPACHO = 1
                                            AND ESTADO_DESPACHO = 2
                                            AND ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA2 = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "' ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerTotalesDespachoptCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT  IFNULL(SUM(`CANTIDAD_ENVASE_DESPACHO`),0) AS 'ENVASE',   
                                                     IFNULL(SUM(`KILOS_NETO_DESPACHO`),0) AS 'NETO',  
                                                     IFNULL(SUM(`KILOS_BRUTO_DESPACHO`),0)  AS 'BRUTO'  
                                            FROM `fruta_despachopt` ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listarDespachoptCBX2()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y') AS 'FECHA',
                                                       DATE_FORMAT(FECHA_INGRESO_DESPACHO, '%d-%m-%Y %H:%i:%S') AS 'INGRESO',
                                                       DATE_FORMAT(FECHA_MODIFICACION_DESPACHO, '%d-%m-%Y %H:%i:%S') AS 'MODIFICACION',
                                                       FORMAT(CANTIDAD_ENVASE_DESPACHO,0,'de_DE')  AS 'ENVASE',
                                                       FORMAT(KILOS_NETO_DESPACHO,2,'de_DE')  AS 'NETO',
                                                       FORMAT(KILOS_BRUTO_DESPACHO,2,'de_DE')  AS 'BRUTO',
                                                       FORMAT(NUMERO_GUIA_DESPACHO,2,'de_DE')  AS 'GUIA'
                                            FROM `fruta_despachopt` ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function obtenerTotalesDespachoptCBX2()
    {
        try {

            $datos = $this->conexion->prepare("SELECT  FORMAT(IFNULL(SUM(`CANTIDAD_ENVASE_DESPACHO`),0),0,'de_DE') AS 'ENVASE',   
                                                     FORMAT(IFNULL(SUM(`KILOS_NETO_DESPACHO`),0),2,'de_DE') AS 'NETO',  
                                                     FORMAT(IFNULL(SUM(`KILOS_BRUTO_DESPACHO`),0),2,'de_DE')  AS 'BRUTO'  
                                            FROM `fruta_despachopt` 
                                            
                                            ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function obtenerTotalesDespachoptPorDespachoCBX2($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  FORMAT(IFNULL(SUM(`CANTIDAD_ENVASE_DESPACHO`),0),0,'de_DE') AS 'ENVASE',   
                                                     FORMAT(IFNULL(SUM(`KILOS_NETO_DESPACHO`),0),2,'de_DE') AS 'NETO',  
                                                     FORMAT(IFNULL(SUM(`KILOS_BRUTO_DESPACHO`),0),2,'de_DE')  AS 'BRUTO'  ,  
                                                     FORMAT(IFNULL(SUM(`TOTAL_PRECIO`),0),2,'de_DE')  AS 'PRECIO'  
                                            FROM `fruta_despachopt` 
                                            WHERE ID_DESPACHO = '" . $IDDESPACHO . "'
                                            
                                            ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function obtenerTotalesDespachoptEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  IFNULL(SUM(`CANTIDAD_ENVASE_DESPACHO`),0) AS 'ENVASE',   
                                                     IFNULL(SUM(`KILOS_NETO_DESPACHO`),0) AS 'NETO',  
                                                     IFNULL(SUM(`KILOS_BRUTO_DESPACHO`),0)  AS 'BRUTO'  
                                            FROM `fruta_despachopt` 
                                                                                                                 
                                            WHERE ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                            ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function obtenerTotalesDespachoptEmpresaPlantaTemporadaGuiaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  IFNULL(SUM(`CANTIDAD_ENVASE_DESPACHO`),0) AS 'ENVASE',   
                                                     IFNULL(SUM(`KILOS_NETO_DESPACHO`),0) AS 'NETO',  
                                                     IFNULL(SUM(`KILOS_BRUTO_DESPACHO`),0)  AS 'BRUTO'  
                                            FROM `fruta_despachopt` 
                                                                                                                 
                                            WHERE TDESPACHO = 1
                                            AND ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA2 = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                            ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function obtenerTotalesDespachoptEmpresaPlantaTemporadaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  FORMAT(IFNULL(SUM(`CANTIDAD_ENVASE_DESPACHO`),0),0,'de_DE') AS 'ENVASE',   
                                                     FORMAT(IFNULL(SUM(`KILOS_NETO_DESPACHO`),0),2,'de_DE') AS 'NETO',  
                                                     FORMAT(IFNULL(SUM(`KILOS_BRUTO_DESPACHO`),0),2,'de_DE')  AS 'BRUTO'  
                                            FROM `fruta_despachopt` 
                                                                                                                 
                                            WHERE ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                            ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function obtenerTotalesDespachoptEmpresaPlantaTemporadaGuiaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  FORMAT(IFNULL(SUM(`CANTIDAD_ENVASE_DESPACHO`),0),0,'de_DE') AS 'ENVASE',   
                                                       FORMAT(IFNULL(SUM(`KILOS_NETO_DESPACHO`),0),2,'de_DE') AS 'NETO',  
                                                       FORMAT(IFNULL(SUM(`KILOS_BRUTO_DESPACHO`),0),2,'de_DE')  AS 'BRUTO'  
                                            FROM `fruta_despachopt`                                                                                                                  
                                            WHERE  TDESPACHO = 1
                                            AND ESTADO_DESPACHO = 2
                                            AND ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA2 = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                            ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function listarDespachoptCBXMP()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM `fruta_despachopt` WHERE `ID_TDESPACHOMP` = 1;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarDespachoptCBIQF()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM `fruta_despachopt`  WHERE `ID_TDESPACHOMP` = 2;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
    public function verDespachopt($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,DATE_FORMAT(FECHA_DESPACHO, '%Y-%m-%d') AS 'FECHA',
                                             DATE_FORMAT(FECHA_INGRESO_DESPACHO, '%Y-%m-%d') AS 'INGRESO',
                                             DATE_FORMAT(FECHA_MODIFICACION_DESPACHO, '%Y-%m-%d') AS 'MODIFICACION' 
                                             FROM `fruta_despachopt`
                                             WHERE `ID_DESPACHO`= '" . $ID . "';");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
    public function verDespachopt2($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y') AS 'FECHA'
                                                    , DATE_FORMAT(FECHA_INGRESO_DESPACHO, '%d-%m-%Y') AS 'INGRESO'
                                                    , DATE_FORMAT(FECHA_MODIFICACION_DESPACHO, '%d-%m-%Y') AS 'MODIFICACION'
                                            FROM `fruta_despachopt`
                                            WHERE `ID_DESPACHO`= '" . $ID . "';");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //BUSCAR CONSIDENCIA DE ACUERDO AL CARACTER INGRESADO EN LA FUNCION
    public function buscarNombreDespachopt($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM `fruta_despachopt` WHERE `OBSERVACION_DESPACHO` LIKE '%" . $NOMBRE . "%';");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //REGISTRO DE UNA NUEVA FILA    
    public function agregarDespachopt(DESPACHOPT $DESPACHOPT)
    {
        try {

            $query =
                "INSERT INTO `fruta_despachopt` ( `NUMERO_DESPACHO`, `FECHA_DESPACHO`,  `NUMERO_GUIA_DESPACHO`, 
                                            `CANTIDAD_ENVASE_DESPACHO`, `KILOS_NETO_DESPACHO`,`KILOS_BRUTO_DESPACHO`, `NUMERO_SELLO_DESPACHO`, 
                                            `PATENTE_CAMION`,`PATENTE_CARRO`,`OBSERVACION_DESPACHO`, `TDESPACHO`, 
                                            `REGALO_DESPACHO`, `TOTAL_PRECIO`,`VGM`,
                                            `ID_PLANTA2`, `ID_PLANTA3`,`ID_PRODUCTOR`, `ID_COMPRADOR`, 
                                            `ID_CONDUCTOR`, `ID_TRANSPORTE`,  
                                            `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, 
                                            `FECHA_INGRESO_DESPACHO`, `FECHA_MODIFICACION_DESPACHO`, 
                                            `ESTADO`,  `ESTADO_DESPACHO`,  `ESTADO_REGISTRO`)
             VALUES
               ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, SYSDATE(),  SYSDATE(), 1, 1, 1);";

            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOPT->__GET('NUMERO_DESPACHO'),
                        $DESPACHOPT->__GET('FECHA_DESPACHO'),
                        $DESPACHOPT->__GET('NUMERO_GUIA_DESPACHO'),
                        $DESPACHOPT->__GET('CANTIDAD_ENVASE_DESPACHO'),
                        $DESPACHOPT->__GET('KILOS_NETO_DESPACHO'),
                        $DESPACHOPT->__GET('KILOS_BRUTO_DESPACHO'),
                        $DESPACHOPT->__GET('NUMERO_SELLO_DESPACHO'),
                        $DESPACHOPT->__GET('PATENTE_CAMION'),
                        $DESPACHOPT->__GET('PATENTE_CARRO'),
                        $DESPACHOPT->__GET('OBSERVACION_DESPACHO'),
                        $DESPACHOPT->__GET('TDESPACHO'),
                        $DESPACHOPT->__GET('REGALO_DESPACHO'),
                        $DESPACHOPT->__GET('TOTAL_PRECIO'),
                        $DESPACHOPT->__GET('VGM'),
                        $DESPACHOPT->__GET('ID_PLANTA2'),
                        $DESPACHOPT->__GET('ID_PLANTA3'),
                        $DESPACHOPT->__GET('ID_PRODUCTOR'),
                        $DESPACHOPT->__GET('ID_COMPRADOR'),
                        $DESPACHOPT->__GET('ID_CONDUCTOR'),
                        $DESPACHOPT->__GET('ID_TRANSPORTE'),
                        $DESPACHOPT->__GET('ID_EMPRESA'),
                        $DESPACHOPT->__GET('ID_PLANTA'),
                        $DESPACHOPT->__GET('ID_TEMPORADA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarDespachopt($id)
    {
        try {
            $sql = "DELETE FROM `fruta_despachopt` WHERE `ID_DESPACHO`=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDespachopt(DESPACHOPT $DESPACHOPT)
    {
        try {
            $query = "
		UPDATE `fruta_despachopt` SET
        `FECHA_DESPACHO` = ?,
        `NUMERO_GUIA_DESPACHO` = ?,
        `CANTIDAD_ENVASE_DESPACHO` = ?,
        `KILOS_NETO_DESPACHO` = ?, 
        `KILOS_BRUTO_DESPACHO` = ?, 
        `NUMERO_SELLO_DESPACHO` = ?, 
        `FECHA_MODIFICACION_DESPACHO` = SYSDATE(),
        `PATENTE_CAMION` = ?,
        `PATENTE_CARRO` = ?,
        `OBSERVACION_DESPACHO` = ?,
        `TDESPACHO` = ?,
        `REGALO_DESPACHO` = ?,
        `TOTAL_PRECIO` = ?,
        `VGM` = ?,
        `ID_PLANTA2` = ?,
        `ID_PLANTA3` = ?,
        `ID_PRODUCTOR` = ?,
        `ID_COMPRADOR` = ?,
        `ID_CONDUCTOR` = ?,
        `ID_TRANSPORTE` = ?, 
        `ID_EMPRESA` = ?,
        `ID_PLANTA` = ?, 
        `ID_TEMPORADA` = ?, 
        `ESTADO` = 1
		WHERE `ID_DESPACHO`= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOPT->__GET('FECHA_DESPACHO'),
                        $DESPACHOPT->__GET('NUMERO_GUIA_DESPACHO'),
                        $DESPACHOPT->__GET('CANTIDAD_ENVASE_DESPACHO'),
                        $DESPACHOPT->__GET('KILOS_NETO_DESPACHO'),
                        $DESPACHOPT->__GET('KILOS_BRUTO_DESPACHO'),
                        $DESPACHOPT->__GET('NUMERO_SELLO_DESPACHO'),
                        $DESPACHOPT->__GET('PATENTE_CAMION'),
                        $DESPACHOPT->__GET('PATENTE_CARRO'),
                        $DESPACHOPT->__GET('OBSERVACION_DESPACHO'),
                        $DESPACHOPT->__GET('TDESPACHO'),
                        $DESPACHOPT->__GET('REGALO_DESPACHO'),
                        $DESPACHOPT->__GET('TOTAL_PRECIO'),
                        $DESPACHOPT->__GET('VGM'),
                        $DESPACHOPT->__GET('ID_PLANTA2'),
                        $DESPACHOPT->__GET('ID_PLANTA3'),
                        $DESPACHOPT->__GET('ID_PRODUCTOR'),
                        $DESPACHOPT->__GET('ID_COMPRADOR'),
                        $DESPACHOPT->__GET('ID_CONDUCTOR'),
                        $DESPACHOPT->__GET('ID_TRANSPORTE'),
                        $DESPACHOPT->__GET('ID_EMPRESA'),
                        $DESPACHOPT->__GET('ID_PLANTA'),
                        $DESPACHOPT->__GET('ID_TEMPORADA'),
                        $DESPACHOPT->__GET('ID_DESPACHO')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //FUNCIONES ESPECIALIZADAS 

    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDespachoExistenciaExportacion(DESPACHOPT $DESPACHOPT)
    {
        try {
            $query = "
    UPDATE `fruta_despachopt` SET
        `CANTIDAD_ENVASE_DESPACHO`= ?,
        `KILOS_NETO_DESPACHO`= ?,
        `FECHA_MODIFICACION_DESPACHO` = SYSDATE()        
    WHERE `ID_DESPACHO`= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOPT->__GET('CANTIDAD_ENVASE_DESPACHO'),
                        $DESPACHOPT->__GET('KILOS_NETO_DESPACHO'),
                        $DESPACHOPT->__GET('ID_DESPACHO')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDespachoQuitarExistenciaExportacion(DESPACHOPT $DESPACHOPT)
    {
        try {
            $query = "
    UPDATE `fruta_despachopt` SET
        `CANTIDAD_ENVASE_DESPACHO`= ?,
        `KILOS_NETO_DESPACHO`= ?,
        `FECHA_MODIFICACION_DESPACHO` = SYSDATE()        
    WHERE `ID_DESPACHO`= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOPT->__GET('CANTIDAD_ENVASE_PCDESPACHO'),
                        $DESPACHOPT->__GET('KILOS_NETO_DESPACHO'),
                        $DESPACHOPT->__GET('ID_DESPACHO')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(DESPACHOPT $DESPACHOPT)
    {

        try {
            $query = "
    UPDATE `fruta_despachopt` SET			
            `ESTADO_REGISTRO` = 0
    WHERE `ID_DESPACHO`= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOPT->__GET('ID_DESPACHO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(DESPACHOPT $DESPACHOPT)
    {
        try {
            $query = "
    UPDATE `fruta_despachopt` SET			
            `ESTADO_REGISTRO` = 1
    WHERE `ID_DESPACHO`= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOPT->__GET('ID_DESPACHO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO ESTADO
    //ABIERTO 1
    public function abierto(DESPACHOPT $DESPACHOPT)
    {
        try {
            $query = "
                    UPDATE `fruta_despachopt` SET			
                            `ESTADO` = 1
                    WHERE `ID_DESPACHO`= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOPT->__GET('ID_DESPACHO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CERRADO 0
    public function  cerrado(DESPACHOPT $DESPACHOPT)
    {
        try {
            $query = "
                    UPDATE `fruta_despachopt` SET			
                            `ESTADO` = 0
                    WHERE `ID_DESPACHO`= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOPT->__GET('ID_DESPACHO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIAR ESTADO DESPACHO
    /**
     * 1=Por Confirmar
     * 2=Confirmado
     * 3=Rechazado
     * 4=Aprobado
     */

    public function  porConfirmar(DESPACHOPT $DESPACHOPT)
    {
        try {
            $query = "
                    UPDATE `fruta_despachopt` SET			
                            `ESTADO_DESPACHO` = 1
                    WHERE `ID_DESPACHO`= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOPT->__GET('ID_DESPACHO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function  Confirmado(DESPACHOPT $DESPACHOPT)
    {
        try {
            $query = "
                    UPDATE `fruta_despachopt` SET			
                            `ESTADO_DESPACHO` = 2
                    WHERE `ID_DESPACHO`= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOPT->__GET('ID_DESPACHO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function  Rechazado(DESPACHOPT $DESPACHOPT)
    {
        try {
            $query = "
                    UPDATE `fruta_despachopt` SET			
                            `ESTADO_DESPACHO` = 3
                    WHERE `ID_DESPACHO`= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOPT->__GET('ID_DESPACHO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function  Aprobado(DESPACHOPT $DESPACHOPT)
    {
        try {
            $query = "
                    UPDATE `fruta_despachopt` SET			
                            `ESTADO_DESPACHO` = 4
                    WHERE `ID_DESPACHO`= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOPT->__GET('ID_DESPACHO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //CONSULTA PARA OBTENER LA FILA EN EL MISMO MOMENTO DE REGISTRAR LA FILA
    public function buscarDespachoptID(
        $FECHADESPACHOMP,
        $NUMEROGUIADESPACHO,
        $CANTIDADENVASEDESPACHO,
        $KILOSNETODESPACHO,
        $KILOSBRUTODESPACHO,
        $CONDUCTOR,
        $TRANSPORTE,
        $EMPRESA,
        $PLANTA,
        $TEMPORADA
    ) {
        try {
            $datos = $this->conexion->prepare(" SELECT *
                                            FROM `fruta_despachopt`
                                            WHERE 
                                                 FECHA_DESPACHO LIKE '" . $FECHADESPACHOMP . "' 
                                                 AND NUMERO_GUIA_DESPACHO  = '" . $NUMEROGUIADESPACHO . "'  
                                                 AND CANTIDAD_ENVASE_DESPACHO  = '" . $CANTIDADENVASEDESPACHO . "' 
                                                 AND KILOS_NETO_DESPACHO  = '" . $KILOSNETODESPACHO . "' 
                                                 AND KILOS_BRUTO_DESPACHO  = '" . $KILOSBRUTODESPACHO . "' 

                                                 AND DATE_FORMAT(FECHA_INGRESO_DESPACHO, '%Y-%m-%d %H:%i') =  DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i') 
                                                 AND DATE_FORMAT(FECHA_MODIFICACION_DESPACHO, '%Y-%m-%d %H:%i') = DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i')
                                                 
                                                 AND ID_CONDUCTOR = '" . $CONDUCTOR . "'   
                                                 AND ID_TRANSPORTE = '" . $TRANSPORTE . "' 
                                                 
                                                 AND ID_EMPRESA = '" . $EMPRESA . "'                                      
                                                 AND ID_PLANTA = '" . $PLANTA . "'                                      
                                                 AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                                 ORDER BY ID_DESPACHO DESC
                                                
                                                 ; ");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            // var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //BUSCAR FECHA ACTUAL DEL SISTEMA
    public function obtenerFecha()
    {
        try {

            $datos = $this->conexion->prepare("SELECT CURDATE() AS 'FECHA' , DATE_FORMAT(NOW( ), '%H:%i') AS 'HORA'   ;");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function buscarDespachoptPorProductorGuiaEmpresaPlantaTemporada($NUMEROGUIA, $PRODUCTOR, $EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT *
                                                FROM `fruta_despachopt`
                                                WHERE 
                                                    NUMERO_GUIA_DESPACHO = " . $NUMEROGUIA . "
                                                    AND ID_PRODUCTOR = " . $PRODUCTOR . "                                                 
                                                    AND ID_EMPRESA = " . $EMPRESA . " 
                                                    AND ID_PLANTA = " . $PLANTA . " 
                                                    AND ID_TEMPORADA = " . $TEMPORADA . "     
                                                    ; ");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FILTROS LISTA





    public function obtenerNumero($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  COUNT(IFNULL(NUMERO_DESPACHO,0)) AS 'NUMERO'
                                            FROM `fruta_despachopt`
                                            WHERE  
                                                ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "'     
                                                ; ");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
