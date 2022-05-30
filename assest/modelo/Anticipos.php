<?php
    include_once '../../assest/config/BDCONFIG.php';

    class AnticiposModel {
        static public function mdlCrearAnticipo($tabla, $datos)
        {
            try {
                $stmt = BDCONFIG::conectar()->prepare(
                    "INSERT INTO $tabla(id_empresa, hash, id_broker, estado_registro, estado, id_usuario, id_perfil_usuario, observacion, fecha_ingreso, fecha_modificacion) 
                    VALUES (:id_empresa, :hash, :id_broker, :estado_registro, :estado, :id_usuario, :id_perfil_usuario, :observacion, :fecha_ingreso, :fecha_modificacion) ");

                $fecha = date('Y-m-d H:i:s');
                $stmt->bindParam(":id_empresa", $datos['id_empresa'], PDO::PARAM_STR);
                $stmt->bindParam(":hash", $datos['hash'], PDO::PARAM_INT);
                $stmt->bindParam(":id_broker", $datos['id_broker'], PDO::PARAM_STR);
                $stmt->bindParam(":estado_registro", $datos['estado_registro'], PDO::PARAM_STR);
                $stmt->bindParam(":estado", $datos['estado'], PDO::PARAM_STR);
                $stmt->bindParam(":id_usuario", $datos['id_usuario'], PDO::PARAM_STR);
                $stmt->bindParam(":id_perfil_usuario", $datos['id_perfil_usuario'], PDO::PARAM_STR);
                $stmt->bindParam(":observacion", $datos['observacion'], PDO::PARAM_STR);
                $stmt->bindParam(":fecha_ingreso", $datos['fecha_ingreso'], PDO::PARAM_STR);
                $stmt->bindParam(":fecha_modificacion", $datos['fecha_modificacion'], PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $e) {
                $error = $e->getMessage();
            }

            $stmt = null;

            if (isset($error)) {
                return $error;
            } else {
                return 'ok';
            }
        }

        static public function mdlBuscarAnticipo($tabla,$item,$valor)
        {
            if ($item!=null) {
                $stmt = BDCONFIG::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                $stmt->bindParam(":".$item,$valor, PDO::PARAM_STR);
                $stmt->execute();

                $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt = null;
                return $retorno;
            }
        }

        static public function mdlListarAnticipos($tabla)
        {
            $stmt = BDCONFIG::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = null;
            return $retorno;
        }
    }

?>