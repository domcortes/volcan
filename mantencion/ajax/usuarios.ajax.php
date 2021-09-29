<?php
require_once "../controller/usuario.controller.php";
require_once "../model/usuarios.model.php";

	class AjaxUsuarios{
		//editar usuario
		public $idUsuario;
		public function ajaxEditarUsuario(){
			$item = 'idusuario';
			$valor = $this->idUsuario;
			$respuesta = UsuarioController::ctrMostrarUsuarios($item,$valor);
			echo json_encode($respuesta);
		}

		public $activarId;
		public $activarUsuario;

		public function ajaxActivarUsuario(){
			$tabla = 'usuarios';
			$item1 = 'activo';
			$valor1 = $this->activarUsuario;

			$item2 = 'idusuario';
			$valor2 = $this->activarId;
			$respuesta = UsuarioModel::mdlActualizarUsuario($tabla,$item1,$valor1, $item2,$valor2);
		}

		public $validarUsuario;
		public function ajaxValidarUsuario(){
			$item = 'usuario';
			$valor = $this->validarUsuario;
			$respuesta = UsuarioController::ctrMostrarUsuarios($item,$valor);
			echo json_encode($respuesta);
		}
	}

	//editar usuario
	if (isset($_POST['idUsuario'])) {
		$editar = new AjaxUsuarios();
		$editar->idUsuario = $_POST['idUsuario'];
		$editar->ajaxEditarUsuario();
	}

	//activar usuario
	if (isset($_POST['activarUsuario'])) {
		$activarUsuario = new AjaxUsuarios();
		$activarUsuario->activarUsuario = $_POST['activarUsuario'];
		$activarUsuario->activarId = $_POST['activarId'];
		$activarUsuario->ajaxActivarUsuario();
	}

	//validar usuario
	if (isset($_POST['validarUsuario'])) {
		$valUsuario = new AjaxUsuarios();
		$valUsuario->validarUsuario = $_POST['validarUsuario'];
		$valUsuario->ajaxValidarUsuario();
	}