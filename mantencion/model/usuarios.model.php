<?php
require_once 'conexion.php';
/**
 *
 */
class UsuarioModel {
	static public function MdlMostrarUsuario($tabla,$item,$valor){
		if ($item!=null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt->bindParam(":".$item,$valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		} else {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt->bindParam(":".$item,$valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		$stmt->close();
		$stmt = null;
	}

	static public function mdlIngresarUsuario($tabla,$datos){
		try {
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(rutUsuario, nombreUsuario, usuarioAcceso, nivelAcceso, correoElectronico, contrasenna, activo, nombreMainEmpresa, rutMainEmpresa, fechaContrato) VALUES (:rutUsuario, :nombreUsuario, :usuarioAcceso, :nivelAcceso, :correoElectronico, :contrasenna, :activo, 'sin dato','sin dato',:fecha)");

			$fecha = date('Y-m-d H:i:s');
			$stmt->bindParam(":rutUsuario", $datos['rutUsuario'], PDO::PARAM_STR);
			$stmt->bindParam(":nombreUsuario", $datos['nombreUsuario'], PDO::PARAM_STR);
			$stmt->bindParam(":usuarioAcceso", $datos['usuarioAcceso'], PDO::PARAM_STR);
			$stmt->bindParam(":nivelAcceso", $datos['nivelAcceso'], PDO::PARAM_STR);
			$stmt->bindParam(":correoElectronico", $datos['correoElectronico'], PDO::PARAM_STR);
			$stmt->bindParam(":contrasenna", $datos['contrasenna'], PDO::PARAM_STR);
			$stmt->bindParam(":activo", $datos['activo'], PDO::PARAM_STR);
			$stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
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

	static public function mdlEditarUsuario($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombreUsuario = :nombre, contrasenna = :password, nivelAcceso = :perfil WHERE usuarioAcceso = :usuario");
		$stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos['password'], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos['perfil'], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos['usuario'], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return 'ok';
		} else {
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	}

	static public function mdlActualizarUsuario($tabla,$item1,$valor1,$item2,$valor2){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 where $item2 = :$item2");
		$stmt->bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		if ($stmt->execute()) {
			return 'ok';
		} else {
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	}

	static public function mdlBorrarUsuario($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idusuario = :id");
		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);
		if ($stmt->execute()) {
			return 'ok';
		} else {
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	}
}