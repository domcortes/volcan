<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../modelo/EXIINDUSTRIAL.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class EXIINDUSTRIAL_ADO
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
    public function listarExiindustrial()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiindustrial limit 8;	");
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
    //LISTAR TODO
    public function listarExiindustrialCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  DATEDIFF(SYSDATE(), FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',
                                                        IFNULL(ID_PROCESO,'-') AS 'PROCESO',
                                                        IFNULL(ID_REEMBALAJE,'-') AS 'REEMBALAJE'
                                            FROM fruta_exiindustrial 
                                            WHERE ESTADO_REGISTRO = 1;	");
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









    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
    public function verExiindustrial($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiindustrial WHERE ID_EXIINDUSTRIAL= '" . $ID . "';");
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

    //REGISTRO DE UNA NUEVA FILA    
    public function agregarExiindustrialRecepcion(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query =
                "INSERT INTO fruta_exiindustrial (  
                                                    FOLIO_EXIINDUSTRIAL,
                                                    FOLIO_AUXILIAR_EXIINDUSTRIAL,
                                                    FECHA_EMBALADO_EXIINDUSTRIAL,   
                                                    KILOS_NETO_EXIINDUSTRIAL,       
                                                    ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL,   
                                                    ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL,        
                                                    FECHA_RECEPCION,    
                                                    ID_TMANEJO, 
                                                    ID_FOLIO,
                                                    ID_ESTANDAR,
                                                    ID_PRODUCTOR,
                                                    ID_VESPECIES,
                                                    ID_EMPRESA, 
                                                    ID_PLANTA, 
                                                    ID_TEMPORADA,
                                                    ID_RECEPCION,
                                                    INGRESO,
                                                    MODIFICACION,
                                                    ESTADO,  
                                                    ESTADO_REGISTRO
                                                ) VALUES
	       	( ?, ?, ?, ?, ?,    ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,  ?,  SYSDATE(),SYSDATE(),  1, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIINDUSTRIAL->__GET('FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FECHA_EMBALADO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_NETO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FECHA_RECEPCION'),
                        $EXIINDUSTRIAL->__GET('ID_TMANEJO'),
                        $EXIINDUSTRIAL->__GET('ID_FOLIO'),
                        $EXIINDUSTRIAL->__GET('ID_ESTANDAR'),
                        $EXIINDUSTRIAL->__GET('ID_PRODUCTOR'),
                        $EXIINDUSTRIAL->__GET('ID_VESPECIES'),
                        $EXIINDUSTRIAL->__GET('ID_EMPRESA'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA'),
                        $EXIINDUSTRIAL->__GET('ID_TEMPORADA'),
                        $EXIINDUSTRIAL->__GET('ID_RECEPCION')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //REGISTRO DE UNA NUEVA FILA    
    public function agregarExiindustrialProceso(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query =
                "INSERT INTO fruta_exiindustrial (  
                                                    FOLIO_EXIINDUSTRIAL,
                                                    FOLIO_AUXILIAR_EXIINDUSTRIAL,
                                                    FECHA_EMBALADO_EXIINDUSTRIAL,   
                                                    KILOS_NETO_EXIINDUSTRIAL,       
                                                    ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL,   
                                                    ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL,        
                                                    FECHA_PROCESO,    
                                                    ID_TMANEJO, 
                                                    ID_FOLIO,
                                                    ID_ESTANDAR,
                                                    ID_PRODUCTOR,
                                                    ID_VESPECIES,
                                                    ID_EMPRESA, 
                                                    ID_PLANTA, 
                                                    ID_TEMPORADA,
                                                    ID_PROCESO,
                                                    INGRESO,
                                                    MODIFICACION,
                                                    ESTADO,  
                                                    ESTADO_REGISTRO
                                                ) VALUES
	       	( ?, ?, ?, ?, ?,    ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,  ?,  SYSDATE(),SYSDATE(),  2, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIINDUSTRIAL->__GET('FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FECHA_EMBALADO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_NETO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FECHA_PROCESO'),
                        $EXIINDUSTRIAL->__GET('ID_TMANEJO'),
                        $EXIINDUSTRIAL->__GET('ID_FOLIO'),
                        $EXIINDUSTRIAL->__GET('ID_ESTANDAR'),
                        $EXIINDUSTRIAL->__GET('ID_PRODUCTOR'),
                        $EXIINDUSTRIAL->__GET('ID_VESPECIES'),
                        $EXIINDUSTRIAL->__GET('ID_EMPRESA'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA'),
                        $EXIINDUSTRIAL->__GET('ID_TEMPORADA'),
                        $EXIINDUSTRIAL->__GET('ID_PROCESO')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function agregarExiindustrialReembalaje(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query =
                "INSERT INTO fruta_exiindustrial (  
                                                    FOLIO_EXIINDUSTRIAL,
                                                    FOLIO_AUXILIAR_EXIINDUSTRIAL,
                                                    FECHA_EMBALADO_EXIINDUSTRIAL,   
                                                    KILOS_NETO_EXIINDUSTRIAL,       
                                                    ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL,   
                                                    ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL,        
                                                    FECHA_REEMBALAJE,    
                                                    ID_TMANEJO, 
                                                    ID_FOLIO,
                                                    ID_ESTANDAR,
                                                    ID_PRODUCTOR,
                                                    ID_VESPECIES,
                                                    ID_EMPRESA, 
                                                    ID_PLANTA, 
                                                    ID_TEMPORADA,
                                                    ID_REEMBALAJE,
                                                    INGRESO,
                                                    MODIFICACION,
                                                    ESTADO,  
                                                    ESTADO_REGISTRO
                                                ) VALUES
	       	( ?, ?, ?, ?, ?,    ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,  ?,  SYSDATE(),SYSDATE(),  1, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIINDUSTRIAL->__GET('FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FECHA_EMBALADO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_NETO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FECHA_REEMBALAJE'),
                        $EXIINDUSTRIAL->__GET('ID_TMANEJO'),
                        $EXIINDUSTRIAL->__GET('ID_FOLIO'),
                        $EXIINDUSTRIAL->__GET('ID_ESTANDAR'),
                        $EXIINDUSTRIAL->__GET('ID_PRODUCTOR'),
                        $EXIINDUSTRIAL->__GET('ID_VESPECIES'),
                        $EXIINDUSTRIAL->__GET('ID_EMPRESA'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA'),
                        $EXIINDUSTRIAL->__GET('ID_TEMPORADA'),
                        $EXIINDUSTRIAL->__GET('ID_REEMBALAJE')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function agregarExiindustrialGuia(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query =
                "INSERT INTO fruta_exiindustrial (  
                                                    FOLIO_EXIINDUSTRIAL,
                                                    FOLIO_AUXILIAR_EXIINDUSTRIAL,
                                                    FECHA_EMBALADO_EXIINDUSTRIAL,   
                                                    KILOS_NETO_EXIINDUSTRIAL,       
                                                    ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL,   

                                                    ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL,        
                                                    INGRESO,    
                                                    ID_TMANEJO, 
                                                    ID_FOLIO,
                                                    ID_ESTANDAR,

                                                    ID_PRODUCTOR,
                                                    ID_VESPECIES,
                                                    ID_PLANTA2,
                                                    ID_DESPACHO2,
                                                    ID_EMPRESA, 

                                                    ID_PLANTA, 
                                                    ID_TEMPORADA,

                                                    MODIFICACION,
                                                    ESTADO,  
                                                    ESTADO_REGISTRO
                                                ) VALUES
	       	( ?, ?, ?, ?, ?,    ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,  ?, ?,  SYSDATE(),  2, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIINDUSTRIAL->__GET('FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FECHA_EMBALADO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_NETO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('INGRESO'),
                        $EXIINDUSTRIAL->__GET('ID_TMANEJO'),
                        $EXIINDUSTRIAL->__GET('ID_FOLIO'),
                        $EXIINDUSTRIAL->__GET('ID_ESTANDAR'),
                        $EXIINDUSTRIAL->__GET('ID_PRODUCTOR'),
                        $EXIINDUSTRIAL->__GET('ID_VESPECIES'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA2'),
                        $EXIINDUSTRIAL->__GET('ID_DESPACHO2'),
                        $EXIINDUSTRIAL->__GET('ID_EMPRESA'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA'),
                        $EXIINDUSTRIAL->__GET('ID_TEMPORADA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function agregarExiindustrialDespacho(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query =
                "INSERT INTO fruta_exiindustrial (  
                                                    FOLIO_EXIINDUSTRIAL,
                                                    FOLIO_AUXILIAR_EXIINDUSTRIAL,
                                                    FECHA_EMBALADO_EXIINDUSTRIAL,   
                                                    KILOS_NETO_EXIINDUSTRIAL,       
                                                    ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL,   

                                                    ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL,        
                                                    INGRESO,    
                                                    ID_TMANEJO, 
                                                    ID_FOLIO,
                                                    ID_ESTANDAR,

                                                    ID_PRODUCTOR,
                                                    ID_VESPECIES,

                                                    ID_DESPACHO2,
                                                    ID_REEMBALAJE,
                                                    ID_PROCESO,
                                                    ID_RECEPCION,


                                                    ID_EMPRESA, 
                                                    ID_PLANTA, 
                                                    ID_TEMPORADA,

                                                    MODIFICACION,
                                                    ESTADO,  
                                                    ESTADO_REGISTRO
                                                ) VALUES
	       	( ?, ?, ?, ?, ?,    ?, ?, ?, ?, ?,    ?, ?,   ?, ?, ?, ?,  ?, ?, ?,  SYSDATE(),  2, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIINDUSTRIAL->__GET('FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FECHA_EMBALADO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_NETO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL'),

                        $EXIINDUSTRIAL->__GET('ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('INGRESO'),
                        $EXIINDUSTRIAL->__GET('ID_TMANEJO'),
                        $EXIINDUSTRIAL->__GET('ID_FOLIO'),
                        $EXIINDUSTRIAL->__GET('ID_ESTANDAR'),

                        $EXIINDUSTRIAL->__GET('ID_PRODUCTOR'),
                        $EXIINDUSTRIAL->__GET('ID_VESPECIES'),

                        $EXIINDUSTRIAL->__GET('ID_DESPACHO2'),
                        $EXIINDUSTRIAL->__GET('ID_REEMBALAJE'),
                        $EXIINDUSTRIAL->__GET('ID_PROCESO'),
                        $EXIINDUSTRIAL->__GET('ID_RECEPCION'),

                        $EXIINDUSTRIAL->__GET('ID_EMPRESA'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA'),
                        $EXIINDUSTRIAL->__GET('ID_TEMPORADA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarExiindustrial($id)
    {
        try {
            $sql = "DELETE FROM fruta_exiindustrial WHERE ID_EXIINDUSTRIAL=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarExiindustrialRecepcion(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
		UPDATE fruta_exiindustrial SET
                MODIFICACION =  SYSDATE(),
                FECHA_EMBALADO_EXIINDUSTRIAL = ?,
                KILOS_NETO_EXIINDUSTRIAL = ?,
                FECHA_RECEPCION = ?,
                ID_TMANEJO = ?, 
                ID_ESTANDAR = ?, 
                ID_PRODUCTOR = ?,
                ID_VESPECIES = ?,
                ID_EMPRESA = ?,
                ID_PLANTA = ?, 
                ID_TEMPORADA = ? ,
                ID_RECEPCION = ?           
		WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('FECHA_EMBALADO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_NETO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FECHA_RECEPCION'),
                        $EXIINDUSTRIAL->__GET('ID_TMANEJO'),
                        $EXIINDUSTRIAL->__GET('ID_ESTANDAR'),
                        $EXIINDUSTRIAL->__GET('ID_PRODUCTOR'),
                        $EXIINDUSTRIAL->__GET('ID_VESPECIES'),
                        $EXIINDUSTRIAL->__GET('ID_EMPRESA'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA'),
                        $EXIINDUSTRIAL->__GET('ID_TEMPORADA'),
                        $EXIINDUSTRIAL->__GET('ID_RECEPCION'),
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarExiindustrialProceso(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
		UPDATE fruta_exiindustrial SET
                MODIFICACION =  SYSDATE(),
                FECHA_EMBALADO_EXIINDUSTRIAL = ?,
                KILOS_NETO_EXIINDUSTRIAL = ?,
                FECHA_PROCESO = ?,
                ID_TMANEJO = ?, 
                ID_ESTANDAR = ?, 
                ID_PRODUCTOR = ?,
                ID_VESPECIES = ?,
                ID_EMPRESA = ?,
                ID_PLANTA = ?, 
                ID_TEMPORADA = ? ,
                ID_PROCESO = ?           
		WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('FECHA_EMBALADO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_NETO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FECHA_PROCESO'),
                        $EXIINDUSTRIAL->__GET('ID_TMANEJO'),
                        $EXIINDUSTRIAL->__GET('ID_ESTANDAR'),
                        $EXIINDUSTRIAL->__GET('ID_PRODUCTOR'),
                        $EXIINDUSTRIAL->__GET('ID_VESPECIES'),
                        $EXIINDUSTRIAL->__GET('ID_EMPRESA'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA'),
                        $EXIINDUSTRIAL->__GET('ID_TEMPORADA'),
                        $EXIINDUSTRIAL->__GET('ID_PROCESO'),
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarExiindustrialReembalaje(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
		UPDATE fruta_exiindustrial SET
                MODIFICACION =  SYSDATE(),
                FECHA_EMBALADO_EXIINDUSTRIAL = ?,
                KILOS_NETO_EXIINDUSTRIAL = ?,
                FECHA_REEMBALAJE = ?,
                ID_TMANEJO = ?, 
                ID_ESTANDAR = ?, 
                ID_PRODUCTOR = ?,
                ID_VESPECIES = ?,
                ID_EMPRESA = ?,
                ID_PLANTA = ?, 
                ID_TEMPORADA = ? ,
                ID_REEMBALAJE = ?           
		WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('FECHA_EMBALADO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_NETO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FECHA_REEMBALAJE'),
                        $EXIINDUSTRIAL->__GET('ID_TMANEJO'),
                        $EXIINDUSTRIAL->__GET('ID_ESTANDAR'),
                        $EXIINDUSTRIAL->__GET('ID_PRODUCTOR'),
                        $EXIINDUSTRIAL->__GET('ID_VESPECIES'),
                        $EXIINDUSTRIAL->__GET('ID_EMPRESA'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA'),
                        $EXIINDUSTRIAL->__GET('ID_TEMPORADA'),
                        $EXIINDUSTRIAL->__GET('ID_REEMBALAJE'),
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {

        try {
            $query = "
                UPDATE fruta_exiindustrial SET	
                        MODIFICACION =  SYSDATE(),		
                        ESTADO_REGISTRO = 0
                WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function deshabilitarRecepcion(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {

        try {
            $query = "
                UPDATE fruta_exiindustrial SET	
                        MODIFICACION =  SYSDATE(),		
                        ESTADO_REGISTRO = 0	,	
                        ID_RECEPCION = ?
                WHERE FOLIO_AUXILIAR_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_RECEPCION'),
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deshabilitarProceso(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {

        try {
            $query = "
                UPDATE fruta_exiindustrial SET	
                        MODIFICACION =  SYSDATE(),		
                        ESTADO_REGISTRO = 0	                        
                WHERE FOLIO_AUXILIAR_EXIINDUSTRIAL= ? AND FOLIO_EXIINDUSTRIAL= ? AND ID_PROCESO = ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ID_PROCESO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function deshabilitarReembalaje(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {

        try {
            $query = "
                UPDATE fruta_exiindustrial SET	
                        MODIFICACION =  SYSDATE(),		
                        ESTADO_REGISTRO = 0	,	
                        ID_REEMBALAJE = ?
                WHERE FOLIO_AUXILIAR_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_REEMBALAJE'),
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
                UPDATE fruta_exiindustrial SET		
                        MODIFICACION =  SYSDATE(),	
                        ESTADO_REGISTRO = 1
                WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO A ESTADO
    public function eliminado(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
                    UPDATE fruta_exiindustrial SET	
                            MODIFICACION =  SYSDATE(),		
                            ESTADO = 0
                    WHERE FOLIO_AUXILIAR_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function eliminadoRecepcion(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
                    UPDATE fruta_exiindustrial SET	
                            MODIFICACION =  SYSDATE(),		
                            ESTADO = 0	,	
                            ID_RECEPCION = ?
                    WHERE FOLIO_AUXILIAR_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_RECEPCION'),
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function eliminadoProceso(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
                    UPDATE fruta_exiindustrial SET	
                            MODIFICACION =  SYSDATE(),		
                            ESTADO = 0	
                           
                    WHERE FOLIO_AUXILIAR_EXIINDUSTRIAL= ? AND FOLIO_EXIINDUSTRIAL= ? AND  ID_PROCESO = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ID_PROCESO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminadoReembaleaje(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
                    UPDATE fruta_exiindustrial SET	
                            MODIFICACION =  SYSDATE(),		
                            ESTADO = 0	,	
                            ID_REEMBALAJE = ?
                    WHERE FOLIO_AUXILIAR_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_REEMBALAJE'),
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function ingresado(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
                        UPDATE fruta_exiindustrial SET	
                                MODIFICACION = SYSDATE(),		
                                ESTADO = 1
                        WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function vigente(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
                        UPDATE fruta_exiindustrial SET	
                                MODIFICACION = SYSDATE(),		
                                ESTADO = 2
                        WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function enDespacho(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
                        UPDATE fruta_exiindustrial SET	
                                MODIFICACION = SYSDATE(),		
                                ESTADO = 3
                        WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function despachado(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
                        UPDATE fruta_exiindustrial SET	
                                MODIFICACION = SYSDATE(),	
                                ESTADO = 4	,	
                                FECHA_DESPACHO = ?
                        WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('FECHA_DESPACHO'),
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function despachadoInterplanta(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
                        UPDATE fruta_exiindustrial SET	
                                MODIFICACION = SYSDATE(),	
                                ESTADO = 4	
                        WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function enTransito(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
                        UPDATE fruta_exiindustrial SET	
                                MODIFICACION = SYSDATE(),		
                                ESTADO = 5	,	
                                FECHA_DESPACHO = ?
                        WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('FECHA_DESPACHO'),
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarSelecionarDespachoAgregarNeto(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
		UPDATE fruta_exiindustrial SET
            MODIFICACION = SYSDATE(),      
            ID_DESPACHO = ? ,      
            NETO_DESPACHO = ?          
		WHERE ID_EXIINDUSTRIAL= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_DESPACHO'),
                        $EXIINDUSTRIAL->__GET('NETO_DESPACHO'),
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarSelecionarDespachoNeto(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
		UPDATE fruta_exiindustrial SET
            MODIFICACION = SYSDATE(),     
            ESTADO = 3,           
            ID_DESPACHO = ? ,       
            KILOS_NETO_EXIINDUSTRIAL = ?          
		WHERE ID_EXIINDUSTRIAL= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_DESPACHO'),
                        $EXIINDUSTRIAL->__GET('KILOS_NETO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarSelecionarDespachoAgregarPrecio(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
		UPDATE fruta_exiindustrial SET
            MODIFICACION = SYSDATE(),      
            ID_DESPACHO = ? ,      
            PRECIO_KILO = ?          
		WHERE ID_EXIINDUSTRIAL= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_DESPACHO'),
                        $EXIINDUSTRIAL->__GET('PRECIO_KILO'),
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ACTUALIZAR ESTADO, ASOCIAR PROCESO, REGISTRO HISTORIAL PROCESO


    public function actualizarSelecionarDespachoCambiarEstado(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
		UPDATE fruta_exiindustrial SET
            MODIFICACION = SYSDATE(),
            ESTADO = 3,           
            ID_DESPACHO = ?          
		WHERE ID_EXIINDUSTRIAL= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_DESPACHO'),
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //ACTUALIZAR ESTADO, ASOCIAR PROCESO, REGISTRO HISTORIAL PROCESO
    public function actualizarDeselecionarDespachoCambiarEstado(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
		UPDATE fruta_exiindustrial SET
            ESTADO = 2,          
            MODIFICACION = SYSDATE(), 
            ID_DESPACHO = null, 
            NETO_DESPACHO = null, 
            PRECIO_KILO = null          
		WHERE ID_EXIINDUSTRIAL= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //
    public function verExistenciaPorDespacho($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiindustrial 
                                WHERE ID_DESPACHO= '" . $IDDESPACHO . "'                                           
                                AND ESTADO_REGISTRO = 1;");
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
    public function verExistenciaPorDespachoEnTransito($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiindustrial 
                                WHERE ID_DESPACHO= '" . $IDDESPACHO . "'                                           
                                AND ESTADO_REGISTRO = 1
                                AND ESTADO = 5;");
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


    //LISTAR
   
    public function listarExiindustrialEmpresaPlantaTemporadaDisponibleCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT *,  
                                                        DATEDIFF(SYSDATE(), FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',    
                                                        DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y ') AS 'RECEPCION',
                                                        DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y ') AS 'PROCESO',
                                                        DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y ') AS 'REEMBALAJE',
                                                        DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y ') AS 'DESPACHO',
                                                        DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',      
                                                        DATE_FORMAT(FECHA_EMBALADO_EXIINDUSTRIAL, '%d-%m-%Y') AS 'EMBALADO',     
                                                        IFNULL(KILOS_NETO_EXIINDUSTRIAL,0) AS 'NETO' 
                                        FROM fruta_exiindustrial 
                                        WHERE  ESTADO_REGISTRO = 1
                                        AND ESTADO = 2                                              
                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                        AND ID_PLANTA = '" . $PLANTA . "'
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "'	");
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
    public function listarExiindustrialEmpresaPlantaTemporadaDisponibleCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT *,  
                                                        DATEDIFF(SYSDATE(), FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',    
                                                        DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y ') AS 'RECEPCION',
                                                        DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y ') AS 'PROCESO',
                                                        DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y ') AS 'REEMBALAJE',
                                                        DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y ') AS 'DESPACHO',
                                                        DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',      
                                                        DATE_FORMAT(FECHA_EMBALADO_EXIINDUSTRIAL, '%d-%m-%Y') AS 'EMBALADO',     
                                                        FORMAT(IFNULL(KILOS_NETO_EXIINDUSTRIAL,0),2,'de_DE') AS 'NETO' 
                                        FROM fruta_exiindustrial 
                                        WHERE  ESTADO_REGISTRO = 1
                                        AND ESTADO = 2                                              
                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                        AND ID_PLANTA = '" . $PLANTA . "'
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "'	");
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


    public function listarExiindustrialEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT *,  
                                                        DATEDIFF(SYSDATE(), FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',    
                                                        IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                        IFNULL(DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y'),'Sin Datos') AS 'PROCESO',
                                                        IFNULL(DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y'),'Sin Datos') AS 'REEMBALAJE',
                                                        IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                        DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',      
                                                        DATE_FORMAT(FECHA_EMBALADO_EXIINDUSTRIAL, '%d-%m-%Y') AS 'EMBALADO',     
                                                        IFNULL(KILOS_NETO_EXIINDUSTRIAL,0) AS 'NETO'    
                                        FROM fruta_exiindustrial 
                                        WHERE ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "'	");
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


    public function listarExiindustrialEmpresaPlantaTemporadaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',    
                                                        IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                        IFNULL(DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y'),'Sin Datos') AS 'PROCESO',
                                                        IFNULL(DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y'),'Sin Datos') AS 'REEMBALAJE',
                                                        IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',      
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIINDUSTRIAL, '%d-%m-%Y') AS 'EMBALADO',     
                                                    FORMAT(IFNULL(KILOS_NETO_EXIINDUSTRIAL,0),2,'de_DE') AS 'NETO'    
                                        FROM fruta_exiindustrial 
                                        WHERE ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "'	");
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

    public function buscarExiindustrialEmpresaPlantaTemporadaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',    
                                                    DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y ') AS 'RECEPCION',
                                                    DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y ') AS 'PROCESO',
                                                    DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y ') AS 'REEMBALAJE',
                                                    DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y ') AS 'DESPACHO',
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',      
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIINDUSTRIAL, '%d-%m-%Y') AS 'EMBALADO',     
                                                    FORMAT(IFNULL(KILOS_NETO_EXIINDUSTRIAL,0),2,'de_DE') AS 'NETO'    
                                        FROM fruta_exiindustrial 
                                        WHERE ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "'	
                                            AND ESTADO_REGISTRO = 1
                                            AND ESTADO = 2");
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


    //BUSCAR
    public function buscarPorRecepcionIngresado($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiindustrial 
                                      WHERE ID_RECEPCION= '" . $IDRECEPCION . "'  
                                      AND ESTADO = 1
                                      AND ESTADO_REGISTRO = 1;");
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
    public function buscarPorRecepcion($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiindustrial 
                                      WHERE ID_RECEPCION= '" . $IDRECEPCION . "'  
                                      AND ESTADO_REGISTRO = 1;");
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
    public function buscarPorDespacho($IDDESPACHOIND)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIINDUSTRIAL, '%d-%m-%Y') AS 'EMBALADO',
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y'),'Sin Datos') AS 'PROCESO',
                                                    IFNULL(DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y'),'Sin Datos') AS 'REEMBALAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    IFNULL(KILOS_NETO_EXIINDUSTRIAL,0) AS 'NETO'  ,  
                                                    IFNULL(NETO_DESPACHO,0) AS 'NETOD'  ,  
                                                    IFNULL(KILOS_NETO_EXIINDUSTRIAL-NETO_DESPACHO,0) AS 'DELTA',  
                                                    IFNULL(PRECIO_KILO,0) AS 'KILOP'  ,  
                                                    IFNULL(KILOS_NETO_EXIINDUSTRIAL*PRECIO_KILO,0) AS 'PRECIO'   
                                        FROM fruta_exiindustrial 
                                        WHERE ID_DESPACHO= '" . $IDDESPACHOIND . "'   
                                        AND ESTADO BETWEEN 3 AND  5
                                        AND ESTADO_REGISTRO = 1;");
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
    public function buscarPorDespacho2($IDDESPACHOIND)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIINDUSTRIAL, '%d-%m-%Y') AS 'EMBALADO',
                                                    DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y ') AS 'RECEPCION',
                                                    DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y ') AS 'PROCESO',
                                                    DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y ') AS 'REEMBALAJE',
                                                    DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y ') AS 'DESPACHO',
                                                    FORMAT(IFNULL(KILOS_NETO_EXIINDUSTRIAL,0),2,'de_DE') AS 'NETO'  ,  
                                                    FORMAT(IFNULL(NETO_DESPACHO,0),2,'de_DE') AS 'NETOD'  ,  
                                                    FORMAT(IFNULL(KILOS_NETO_EXIINDUSTRIAL-NETO_DESPACHO,0),2,'de_DE') AS 'DELTA',  
                                                    FORMAT(IFNULL(PRECIO_KILO,0),2,'de_DE') AS 'KILOP'  ,  
                                                    FORMAT(IFNULL(KILOS_NETO_EXIINDUSTRIAL*PRECIO_KILO,0),2,'de_DE') AS 'PRECIO'   
                                        FROM fruta_exiindustrial 
                                        WHERE ID_DESPACHO= '" . $IDDESPACHOIND . "'   
                                        AND ESTADO BETWEEN 3 AND  5
                                        AND ESTADO_REGISTRO = 1;");
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
    public function buscarPorNumeroFolio($NUMEROFOLIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiindustrial
                                         WHERE FOLIO_AUXILIAR_EXIINDUSTRIAL= '" . $NUMEROFOLIO . "';");
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

    //BUSCAR POR LA RECEPCION ASOCIADA A LA EXIINDUSTRIAL
    //BUSQUEDA POR NUMERO FOLIO ASOCIADO AL REGISTRO
    public function buscarPorRecepcionNumeroFolio($IDRECEPCION, $FOLIOAUXILIAREXIINDUSTRIAL)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiindustrial WHERE ID_RECEPCION= '" . $IDRECEPCION . "'  AND FOLIO_AUXILIAR_EXIINDUSTRIAL = '" . $FOLIOAUXILIAREXIINDUSTRIAL . "';");
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



    public function buscarPorProcesoNumeroFolio($IDPROCESO, $FOLIOAUXILIAREXIINDUSTRIAL)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiindustrial WHERE ID_PROCESO= '" . $IDPROCESO . "'  AND FOLIO_AUXILIAR_EXIINDUSTRIAL = '" . $FOLIOAUXILIAREXIINDUSTRIAL . "';");
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

    public function buscarPorReembalajeNumeroFolio($IDREEMBALAJE,  $FOLIOAUXILIAREXIINDUSTRIAL)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiindustrial WHERE ID_REEMBALAJE= '" . $IDREEMBALAJE . "'  AND FOLIO_AUXILIAR_EXIINDUSTRIAL = '" . $FOLIOAUXILIAREXIINDUSTRIAL . "';");
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
    //BUSQUEDA POR PROCESO

    public function buscarPorProcesoIngresando($IDPROCESO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                                FROM fruta_exiindustrial 
                                                WHERE ID_PROCESO= '" . $IDPROCESO . "'   
                                                AND ESTADO = 1
                                                AND ESTADO_REGISTRO = 1;");
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

    public function buscarPorProceso($IDPROCESO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                                FROM fruta_exiindustrial 
                                                WHERE ID_PROCESO= '" . $IDPROCESO . "'                                            
                                                AND ESTADO_REGISTRO = 1;");
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
    public function buscarPorReembalajeIngresnado($IDREEMBALAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiindustrial WHERE ID_REEMBALAJE= " . $IDREEMBALAJE . " AND ESTADO = 1   AND ESTADO_REGISTRO = 1;");
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


    public function buscarPorFolioEmpresaPlantaTemporada($FOLIOAUXILIAREXIINDUSTRIAL, $EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(FECHA_EMBALADO_EXIINDUSTRIAL, '%d-%m-%Y') AS 'EMBALADO',
                                                FORMAT(KILOS_NETO_EXIINDUSTRIAL,2,'de_DE') AS 'NETO'
                                             FROM fruta_exiindustrial 
                                             WHERE   FOLIO_AUXILIAR_EXIINDUSTRIAL LIKE '%" . $FOLIOAUXILIAREXIINDUSTRIAL . "%' 
                                             AND ID_EMPRESA = '" . $EMPRESA . "' 
                                             AND ID_PLANTA = '" . $PLANTA . "'
                                             AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                             AND ESTADO_REGISTRO = 1
                                             AND ESTADO = 2
                                             GROUP BY FOLIO_AUXILIAR_EXIINDUSTRIAL;");
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
    public function buscarPorFolioRepaletizaje($FOLIOAUXILIAREXIEXPORTACION)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * 
                                                FROM fruta_exiindustrial 
                                                WHERE  
                                                     FOLIO_AUXILIAR_EXIINDUSTRIAL LIKE '" . $FOLIOAUXILIAREXIEXPORTACION . "' 
                                                    AND ESTADO_REGISTRO =  1 
                                                    AND ESTADO != 0  
                                                    GROUP BY `FOLIO_AUXILIAR_EXIINDUSTRIAL` ;");
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


    public function buscarPorFolio2($FOLIOAUXILIAREXIINDUSTRIAL)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, DATE_FORMAT(FECHA_EMBALADO_EXIINDUSTRIAL, '%d-%m-%Y')  AS 'EMBALADO',
                                                  FORMAT(KILOS_NETO_EXIINDUSTRIAL,2,'de_DE') AS 'NETO'
                                             FROM fruta_exiindustrial
                                             WHERE   FOLIO_AUXILIAR_EXIINDUSTRIAL LIKE '" . $FOLIOAUXILIAREXIINDUSTRIAL . "'  ;");
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

    //OBTENER TOTALES
    public function obtenerTotalesEmpresaPlantaTemporadaDisponible2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT             
                                                FORMAT(IFNULL(SUM(KILOS_NETO_EXIINDUSTRIAL),0),2,'de_DE') AS 'NETO' 
                                             FROM fruta_exiindustrial 
                                             WHERE ESTADO_REGISTRO = 1
                                                AND ESTADO = 2                                                                             
                                                AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                            ;");
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
    public function obtenerTotalesEmpresaPlantaTemporadaDisponible($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT             
                                                IFNULL(SUM(KILOS_NETO_EXIINDUSTRIAL),0) AS 'NETO' 
                                             FROM fruta_exiindustrial 
                                             WHERE ESTADO_REGISTRO = 1
                                                AND ESTADO = 2                                                                                 
                                                AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                            ;");
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

    public function obtenerTotalesEmpresaPlantaTemporada2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT             
                                                IFNULL(SUM(KILOS_NETO_EXIINDUSTRIAL),0) AS 'NETO' 
                                             FROM fruta_exiindustrial 
                                             WHERE                                                                                  
                                                AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                            ;");
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


    public function obtenerTotalesDespacho($IDDESPACHOIND)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    IFNULL(SUM(KILOS_NETO_EXIINDUSTRIAL),0) AS 'NETO' ,
                                                    IFNULL(SUM(NETO_DESPACHO),0) AS 'NETOD' ,
                                                    IFNULL(SUM(KILOS_NETO_EXIINDUSTRIAL*PRECIO_KILO),0) AS 'PRECIO' 
                                             FROM fruta_exiindustrial
                                             WHERE 
                                              ID_DESPACHO = '" . $IDDESPACHOIND . "' 
                                             AND ESTADO BETWEEN 3 AND  5
                                             AND ESTADO_REGISTRO = 1;");
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
    public function obtenerTotalesDespacho2($IDDESPACHOIND)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_EXIINDUSTRIAL),0),2,'de_DE') AS 'NETO' ,
                                                    FORMAT(IFNULL(SUM(NETO_DESPACHO),0),2,'de_DE') AS 'NETOD' ,
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_EXIINDUSTRIAL-NETO_DESPACHO),0),2,'de_DE') AS 'DELTA' ,
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_EXIINDUSTRIAL*PRECIO_KILO),0),2,'de_DE') AS 'PRECIO' 
                                             FROM fruta_exiindustrial
                                             WHERE 
                                              ID_DESPACHO = '" . $IDDESPACHOIND . "' 
                                             AND ESTADO BETWEEN 3 AND  5
                                             AND ESTADO_REGISTRO = 1;");
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

    //OTRAS FUNCIONALIDADES

    public function contarExistenciaPorDespachoPrecioNulo($IDDESPACHO)
    {
        try {
            $datos = $this->conexion->prepare("SELECT 
                                                    IFNULL(COUNT(ID_EXIINDUSTRIAL),0)  AS 'CONTEO'
                                                FROM fruta_exiindustrial 
                                                WHERE ID_DESPACHO= '" . $IDDESPACHO . "'                                           
                                                    AND ESTADO_REGISTRO = 1
                                                    AND PRECIO_KILO IS  NULL
                                        ;");
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


    public function contarExistenciaPorDespachonNetoNulo($IDDESPACHO)
    {
        try {
            $datos = $this->conexion->prepare("SELECT 
                                                    IFNULL(COUNT(ID_EXIINDUSTRIAL),0)  AS 'CONTEO'
                                                FROM fruta_exiindustrial 
                                                WHERE ID_DESPACHO= '" . $IDDESPACHO . "'                                           
                                                    AND ESTADO_REGISTRO = 1
                                                    AND NETO_DESPACHO IS  NULL
                                        ;");
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


    //OBTENER EL ULTIMO FOLIO OCUPADO DEL DETALLE DE  RECEPCIONS
    public function obtenerFolio($IDFOLIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT IFNULL(COUNT(FOLIO_EXIINDUSTRIAL),0) AS 'ULTIMOFOLIO',
                                                    IFNULL(MAX(FOLIO_EXIINDUSTRIAL),0) AS 'ULTIMOFOLIO2' 
                                                    FROM fruta_exiindustrial  
                                                    WHERE  ID_FOLIO= '" . $IDFOLIO . "'
                                                           AND ESTADO_REGISTRO !=0  ;");
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

    //VALIDAR FOLIO
    public function validarFolioProceso($FOLIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                            FROM fruta_exiindustrial
                                            WHERE 
                                                 ID_DESPACHO IS NULL
                                                AND FOLIO_EXIINDUSTRIAL = '" . $FOLIO . "' ;");
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
