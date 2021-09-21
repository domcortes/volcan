<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../modelo/INVENTARIOE.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class INVENTARIOE_ADO
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
    public function listarInventario()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM material_inventarioe limit 8 WHERE ESTADO_REGISTRO = 1;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //LISTAR TODO
    public function listarInventarioCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM material_inventarioe WHERE ESTADO_REGISTRO = 1;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarInventario2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM material_inventarioe WHERE ESTADO_REGISTRO = 0;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
    public function verInventario($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM material_inventarioe WHERE ID_INVENTARIO= '" . $ID . "';");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function verInventario2($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * , 
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                            FROM material_inventarioe 
                                                WHERE ID_INVENTARIO= '" . $ID . "';");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //REGISTRO DE UNA NUEVA FILA    
    public function agregarInventarioRecepcion(INVENTARIOE $INVENTARIOE)
    {
        try {
            if ($INVENTARIOE->__GET('ID_PROVEEDOR') == NULL) {
                $INVENTARIOE->__SET('ID_PROVEEDOR', NULL);
            }
            if ($INVENTARIOE->__GET('ID_PLANTA2') == NULL) {
                $INVENTARIOE->__SET('ID_PLANTA2', NULL);
            }
            if ($INVENTARIOE->__GET('ID_PRODUCTOR') == NULL) {
                $INVENTARIOE->__SET('ID_PRODUCTOR', NULL);
            }
            $query =
                "INSERT INTO material_inventarioe (   
                                                        TRECEPCION,
                                                        VALOR_UNITARIO,   
                                                        CANTIDAD_INVENTARIO, 
                                                        ID_EMPRESA,
                                                        ID_PLANTA,

                                                        ID_TEMPORADA,
                                                        ID_BODEGA,
                                                        ID_PRODUCTO,
                                                        ID_TUMEDIDA,
                                                        ID_RECEPCION,

                                                        ID_PLANTA2,
                                                        ID_PROVEEDOR,
                                                        ID_PRODUCTOR,

                                                        INGRESO,
                                                        MODIFICACION,     
                                                        ESTADO,
                                                        ESTADO_REGISTRO
                                                    ) VALUES
	       	( ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?,   SYSDATE() , SYSDATE(),  1, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('TRECEPCION'),
                        $INVENTARIOE->__GET('VALOR_UNITARIO'),
                        $INVENTARIOE->__GET('CANTIDAD_INVENTARIO'),
                        $INVENTARIOE->__GET('ID_EMPRESA'),
                        $INVENTARIOE->__GET('ID_PLANTA'),

                        $INVENTARIOE->__GET('ID_TEMPORADA'),
                        $INVENTARIOE->__GET('ID_BODEGA'),
                        $INVENTARIOE->__GET('ID_PRODUCTO'),
                        $INVENTARIOE->__GET('ID_TUMEDIDA'),
                        $INVENTARIOE->__GET('ID_RECEPCION'),

                        $INVENTARIOE->__GET('ID_PLANTA2'),
                        $INVENTARIOE->__GET('ID_PROVEEDOR'),
                        $INVENTARIOE->__GET('ID_PRODUCTOR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function agregarInventarioRecepcionDocompra(INVENTARIOE $INVENTARIOE)
    {
        try {
            if ($INVENTARIOE->__GET('ID_PROVEEDOR') == NULL) {
                $INVENTARIOE->__SET('ID_PROVEEDOR', NULL);
            }
            if ($INVENTARIOE->__GET('ID_PLANTA2') == NULL) {
                $INVENTARIOE->__SET('ID_PLANTA2', NULL);
            }
            if ($INVENTARIOE->__GET('ID_PRODUCTOR') == NULL) {
                $INVENTARIOE->__SET('ID_PRODUCTOR', NULL);
            }
            $query =
                "INSERT INTO material_inventarioe (   
                                                        TRECEPCION,
                                                        VALOR_UNITARIO,   
                                                        ID_EMPRESA,
                                                        ID_PLANTA,

                                                        ID_TEMPORADA,
                                                        ID_BODEGA,
                                                        ID_PRODUCTO,
                                                        ID_TUMEDIDA,
                                                        ID_RECEPCION,

                                                        ID_DOCOMPRA,
                                                        ID_PLANTA2,
                                                        ID_PROVEEDOR,
                                                        ID_PRODUCTOR,

                                                        CANTIDAD_INVENTARIO, 
                                                        INGRESO,
                                                        MODIFICACION,     
                                                        ESTADO,
                                                        ESTADO_REGISTRO
                                                    ) VALUES
	       	( ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?, ?,  0, SYSDATE() , SYSDATE(),  1, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('TRECEPCION'),
                        $INVENTARIOE->__GET('VALOR_UNITARIO'),
                        $INVENTARIOE->__GET('ID_EMPRESA'),
                        $INVENTARIOE->__GET('ID_PLANTA'),

                        $INVENTARIOE->__GET('ID_TEMPORADA'),
                        $INVENTARIOE->__GET('ID_BODEGA'),
                        $INVENTARIOE->__GET('ID_PRODUCTO'),
                        $INVENTARIOE->__GET('ID_TUMEDIDA'),
                        $INVENTARIOE->__GET('ID_RECEPCION'),

                        $INVENTARIOE->__GET('ID_DOCOMPRA'),
                        $INVENTARIOE->__GET('ID_PLANTA2'),
                        $INVENTARIOE->__GET('ID_PROVEEDOR'),
                        $INVENTARIOE->__GET('ID_PRODUCTOR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarInventario($id)
    {
        try {
            $sql = "DELETE FROM material_inventarioe WHERE ID_INVENTARIO=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarInventarioRecepcion(INVENTARIOE $INVENTARIOE)
    {
        try {
            if ($INVENTARIOE->__GET('ID_PROVEEDOR') == NULL) {
                $INVENTARIOE->__SET('ID_PROVEEDOR', NULL);
            }
            if ($INVENTARIOE->__GET('ID_PLANTA2') == NULL) {
                $INVENTARIOE->__SET('ID_PLANTA2', NULL);
            }
            if ($INVENTARIOE->__GET('ID_PRODUCTOR') == NULL) {
                $INVENTARIOE->__SET('ID_PRODUCTOR', NULL);
            }
            $query = "
		UPDATE material_inventarioe SET
            MODIFICACION= SYSDATE(),
            TRECEPCION= ?,
            VALOR_UNITARIO= ?,
            CANTIDAD_INVENTARIO= ?,
            ID_EMPRESA= ?,
            ID_PLANTA= ?,

            ID_TEMPORADA= ?,
            ID_BODEGA= ?,
            ID_PRODUCTO= ?  ,
            ID_TUMEDIDA= ?  ,
            ID_RECEPCION= ?  ,
            
            ID_PLANTA2= ?  ,
            ID_PROVEEDOR= ?  ,
            ID_PRODUCTOR= ?    

		WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('TRECEPCION'),
                        $INVENTARIOE->__GET('VALOR_UNITARIO'),
                        $INVENTARIOE->__GET('CANTIDAD_INVENTARIO'),
                        $INVENTARIOE->__GET('ID_EMPRESA'),
                        $INVENTARIOE->__GET('ID_PLANTA'),

                        $INVENTARIOE->__GET('ID_TEMPORADA'),
                        $INVENTARIOE->__GET('ID_BODEGA'),
                        $INVENTARIOE->__GET('ID_PRODUCTO'),
                        $INVENTARIOE->__GET('ID_TUMEDIDA'),
                        $INVENTARIOE->__GET('ID_RECEPCION'),

                        $INVENTARIOE->__GET('ID_PLANTA2'),
                        $INVENTARIOE->__GET('ID_PROVEEDOR'),
                        $INVENTARIOE->__GET('ID_PRODUCTOR'),
                        $INVENTARIOE->__GET('ID_INVENTARIO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //FUNCIONES ESPECIALIZADAS 

    public function actualizarSelecionarDespachoCambiarEstado(INVENTARIOE $INVENTARIOE)
    {
        try {
            $query = "
		UPDATE material_inventarioe SET
            MODIFICACION = SYSDATE(),
            ESTADO = 3,           
            ID_DESPACHO = ?          
		WHERE ID_INVENTARIO= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('ID_DESPACHO'),
                        $INVENTARIOE->__GET('ID_INVENTARIO')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //ACTUALIZAR ESTADO, ASOCIAR PROCESO, REGISTRO HISTORIAL PROCESO
    public function actualizarDeselecionarDespachoCambiarEstado(INVENTARIOE $INVENTARIOE)
    {
        try {
            $query = "
		UPDATE material_inventarioe SET
            ESTADO = 2,          
            MODIFICACION = SYSDATE(), 
            ID_DESPACHO = null        
		WHERE ID_INVENTARIO= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('ID_INVENTARIO')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //CAMBIO DE ESTADO 
    //CAMBIO A CERRADO
    public function eliminado(INVENTARIOE $INVENTARIOE)
    {

        try {
            $query = "
    UPDATE material_inventarioe SET			
            MODIFICACION= SYSDATE(),		
            ESTADO = 0
    WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('ID_INVENTARIO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function eliminado2(INVENTARIOE $INVENTARIOE)
    {

        try {
            $query = "
    UPDATE material_inventarioe SET			
            MODIFICACION= SYSDATE(),		
            ESTADO = 0
    WHERE FOLIO_INVENTARIO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('FOLIO_INVENTARIO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ABIERTO
    public function ingresando(INVENTARIOE $INVENTARIOE)
    {
        try {
            $query = "
    UPDATE material_inventarioe SET				
            MODIFICACION= SYSDATE(),	
            ESTADO = 1
    WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('ID_INVENTARIO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function disponible(INVENTARIOE $INVENTARIOE)
    {
        try {
            $query = "
    UPDATE material_inventarioe SET				
            MODIFICACION= SYSDATE(),	
            ESTADO = 2
    WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('ID_INVENTARIO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function enDespacho(INVENTARIOE $INVENTARIOE)
    {
        try {
            $query = "
                UPDATE material_inventarioe SET				
                        MODIFICACION= SYSDATE(),	
                        ESTADO = 3
                WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('ID_INVENTARIO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function despachado(INVENTARIOE $INVENTARIOE)
    {
        try {
            $query = "
                UPDATE material_inventarioe SET				
                        MODIFICACION= SYSDATE(),	
                        ESTADO = 4
                WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('ID_INVENTARIO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function enTransito(INVENTARIOE $INVENTARIOE)
    {
        try {
            $query = "
                UPDATE material_inventarioe SET				
                        MODIFICACION= SYSDATE(),	
                        ESTADO = 5
                WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('ID_INVENTARIO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(INVENTARIOE $INVENTARIOE)
    {

        try {
            $query = "
    UPDATE material_inventarioe SET			
            MODIFICACION= SYSDATE(),		
            ESTADO_REGISTRO = 0
    WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('ID_INVENTARIO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function deshabilitar2(INVENTARIOE $INVENTARIOE)
    {

        try {
            $query = "
    UPDATE material_inventarioe SET			
            MODIFICACION= SYSDATE(),		
            ESTADO_REGISTRO = 0
    WHERE FOLIO_INVENTARIO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('FOLIO_INVENTARIO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(INVENTARIOE $INVENTARIOE)
    {
        try {
            $query = "
    UPDATE material_inventarioe SET				
            MODIFICACION= SYSDATE(),	
            ESTADO_REGISTRO = 1
    WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('ID_INVENTARIO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //LISTAS


    public function listarInventariotCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM material_inventarioe ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listarInventariot2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION',
                                                FORMAT(IFNULL(CANTIDAD_INVENTARIO,0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL(VALOR_UNITARIO,0),3,'de_DE') AS 'VALOR'   
                                             FROM material_inventarioe ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function listarInventarioPorRecepcionCBX($IDINVENTARIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                IFNULL(VALOR_UNITARIO * CANTIDAD_INVENTARIO,0) AS 'TOTAL'  
                                            FROM material_inventarioe
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '" . $IDINVENTARIO . "'  ;
                                        	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listarInventarioPorRecepcion2CBX($IDINVENTARIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACION',
                                                FORMAT(IFNULL(CANTIDAD_INVENTARIO,0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL(VALOR_UNITARIO,0),0,'de_DE') AS 'VALOR' , 
                                                FORMAT(IFNULL(VALOR_UNITARIO * CANTIDAD_INVENTARIO,0),0,'de_DE') AS 'TOTAL' 
                                             FROM material_inventarioe
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '" . $IDINVENTARIO . "'  ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listarInventarioPorRecepcionDocompraCBX($IDINVENTARIO, $IDDOCOMPRA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                            FROM material_inventarioe
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '" . $IDINVENTARIO . "' 
                                                AND ID_DOCOMPRA = '" . $IDDOCOMPRA . "'   ;
                                        	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function listarInventarioPorRecepcionDocompraNull2CBX($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACION',
                                                FORMAT(IFNULL(CANTIDAD_INVENTARIO,0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL(VALOR_UNITARIO,0),3,'de_DE') AS 'VALOR' 
                                             FROM material_inventarioe
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '" . $IDRECEPCION . "' 
                                                AND ID_DOCOMPRA IS  NULL
                                                ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarInventarioPorRecepcionDocompraNotNull2CBX($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACION',
                                                FORMAT(IFNULL(CANTIDAD_INVENTARIO,0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL(VALOR_UNITARIO,0),3,'de_DE') AS 'VALOR' 
                                             FROM material_inventarioe
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '" . $IDRECEPCION . "' 
                                                AND ID_DOCOMPRA IS  NOT NULL
                                                ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarInventarioPorEmpresaPlantaTemporadaCBX($IDEMPRESA, $IDPLANTA, $IDTEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                * 
                                            FROM material_inventarioe
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ESTADO = 2
                                                AND ID_EMPRESA = '" . $IDEMPRESA . "' 
                                                AND ID_PLANTA = '" . $IDPLANTA . "'
                                                AND ID_TEMPORADA = '" . $IDTEMPORADA . "'  ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listarInventarioPorEmpresaPlantaTemporadaDisponible2CBX($IDEMPRESA, $IDPLANTA, $IDTEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION',
                                                FORMAT(IFNULL(CANTIDAD_INVENTARIO,0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL(VALOR_UNITARIO,0),3,'de_DE') AS 'VALOR'    
                                             FROM material_inventarioe
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ESTADO = 2
                                                AND ID_EMPRESA = '" . $IDEMPRESA . "' 
                                                AND ID_PLANTA = '" . $IDPLANTA . "'
                                                AND ID_TEMPORADA = '" . $IDTEMPORADA . "'  
                                            GROUP BY ID_RECEPCION, ID_DESPACHO, ID_PRODUCTO, VALOR_UNITARIO, ID_BODEGA;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarInventarioPorEmpresaPlantaTemporada2CBX($IDEMPRESA, $IDPLANTA, $IDTEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION',
                                                FORMAT(IFNULL(SUM(CANTIDAD_INVENTARIO),0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL(VALOR_UNITARIO,0),3,'de_DE') AS 'VALOR'    
                                             FROM material_inventarioe
                                                WHERE  ID_EMPRESA = '" . $IDEMPRESA . "' 
                                                AND ID_PLANTA = '" . $IDPLANTA . "'
                                                AND ID_TEMPORADA = '" . $IDTEMPORADA . "' 
                                             GROUP BY ESTADO, ID_RECEPCION, ID_DESPACHO, ID_PRODUCTO, VALOR_UNITARIO, ID_BODEGA ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //TOTALES


    public function obtenerTotalesInventariotCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                                IFNULL(SUM(CANTIDAD_INVENTARIO),0) AS 'CANTIDAD'
                                            FROM material_inventarioe  ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function obtenerTotalesInventariot2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM(CANTIDAD_INVENTARIO),0),0,'de_DE') AS 'CANTIDAD'
                                             FROM material_inventarioe ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function obtenerTotalesInventarioPorRecepcionCBX($IDINVENTARIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                IFNULL(SUM(CANTIDAD_INVENTARIO),0) AS 'CANTIDAD',
                                                IFNULL(SUM(VALOR_UNITARIO),0) AS 'VALOR'
                                            FROM material_inventarioe
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '" . $IDINVENTARIO . "'  ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function obtenerTotalesInventarioPorRecepcion2CBX($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    FORMAT(IFNULL(SUM(CANTIDAD_INVENTARIO),0),0,'de_DE') AS 'CANTIDAD',
                                                    FORMAT(IFNULL(SUM(VALOR_UNITARIO),0),2,'de_DE') AS 'VALOR'
                                             FROM material_inventarioe
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '" . $IDRECEPCION . "'  ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function obtenerTotalesInventarioPorEmpresaPlantaTemporadaCBX($IDEMPRESA, $IDPLANTA, $IDTEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                                IFNULL(SUM(CANTIDAD_INVENTARIO),0) AS 'CANTIDAD'
                                            FROM material_inventarioe
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ESTADO = 2
                                                AND ID_EMPRESA = '" . $IDEMPRESA . "' 
                                                AND ID_PLANTA = '" . $IDPLANTA . "'
                                                AND ID_TEMPORADA = '" . $IDTEMPORADA . "'  ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function obtenerTotalesInventarioPorEmpresaPlantaTemporada2CBX($IDEMPRESA, $IDPLANTA, $IDTEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM(CANTIDAD_INVENTARIO),0),0,'de_DE') AS 'CANTIDAD'
                                             FROM material_inventarioe
                                                WHERE ID_EMPRESA = '" . $IDEMPRESA . "' 
                                                AND ID_PLANTA = '" . $IDPLANTA . "'
                                                AND ID_TEMPORADA = '" . $IDTEMPORADA . "'  ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function obtenerTotalesInventarioPorEmpresaPlantaTemporadaDisponible2CBX($IDEMPRESA, $IDPLANTA, $IDTEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM(CANTIDAD_INVENTARIO),0),0,'de_DE') AS 'CANTIDAD'
                                             FROM material_inventarioe
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ESTADO = 2
                                                AND ID_EMPRESA = '" . $IDEMPRESA . "' 
                                                AND ID_PLANTA = '" . $IDPLANTA . "'
                                                AND ID_TEMPORADA = '" . $IDTEMPORADA . "'  ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerTotalesInventarioPorDespachoCBX($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                IFNULL(SUM(CANTIDAD_INVENTARIO),0) AS 'CANTIDAD'
                                            FROM material_inventarioe
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_DESPACHO = '" . $IDDESPACHO . "'  ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function obtenerTotalesInventarioPorDespacho2CBX($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM(CANTIDAD_INVENTARIO),0),0,'de_DE') AS 'CANTIDAD'
                                             FROM material_inventarioe
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_DESPACHO = '" . $IDDESPACHO . "'  ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //otros
    public function obtenerFolio($IDFOLIO)
    {
        try {
            $datos = $this->conexion->prepare("SELECT 
                                                IFNULL(COUNT(FOLIO_INVENTARIO),0) AS 'ULTIMOFOLIO',
                                                IFNULL(MAX(FOLIO_INVENTARIO),0) AS 'ULTIMOFOLIO2' 
                                            FROM material_inventarioe 
                                            WHERE  ID_FOLIO = '" . $IDFOLIO . "' 
                                            AND ESTADO_REGISTRO = 1
                                            AND ESTADO !=0
                                            GROUP BY FOLIO_INVENTARIO
                                            ORDER BY ULTIMOFOLIO2 DESC
                                            ");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function buscarPorRecepcion($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT 
                                                    * 
                                                FROM material_inventarioe 
                                                    WHERE ID_RECEPCION= '" . $IDRECEPCION . "'
                                                    AND ESTADO_REGISTRO = 1 ;");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function buscarPorDespacho($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT 
                                                    * 
                                                FROM material_inventarioe 
                                                    WHERE ID_DESPACHO= '" . $IDDESPACHO . "' 
                                                    AND ESTADO_REGISTRO = 1
                                                    ;");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function buscarPorDespacho2($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT 
                                                    *, 
                                                    FORMAT(IFNULL(CANTIDAD_INVENTARIO,0),0,'de_DE') AS 'CANTIDAD' ,
                                                    FORMAT(IFNULL(VALOR_UNITARIO,0),3,'de_DE') AS 'VALOR'
                                                FROM material_inventarioe 
                                                    WHERE ID_DESPACHO= '" . $IDDESPACHO . "' 
                                                    AND ESTADO_REGISTRO = 1
                                                    ;");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function buscarPorRecepcionFolio($IDRECEPCION, $FOLIOINVENTARIO)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT 
                                                    * 
                                                FROM material_inventarioe 
                                                    WHERE ID_RECEPCION = '" . $IDRECEPCION . "' 
                                                    AND FOLIO_INVENTARIO = '" . $FOLIOINVENTARIO . "'
                                                    AND ESTADO_REGISTRO = 1 ;");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
