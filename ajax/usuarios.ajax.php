<?php


require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";


/*=============================================
EDITAR USUARIO
=============================================*/

if(isset($_POST["idusuario"])){

	$editar = new AjaxUsuarios();
	$editar -> idusuario = $_POST["idusuario"];
	$editar -> ajaxEditarUsuario();

}

class AjaxUsuarios{

	/*=============================================
	EDITAR USUARIO
	=============================================*/	

	public $idusuario;

	 public function ajaxEditarUsuario(){

		$item = "cod_user";
		$valor = $this->idusuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
                        
		echo json_encode($respuesta);

	}





	/*=============================================
	ACTIVAR USUARIO
	=============================================*/	

	public $activarUsuario;
	public $activarId;
	
	 public function ajaxActivarUsuario(){

		$tabla = "usuarios";

		$item1 = "estado";
		$valor1 = $this->activarUsuario;
		
		$item2 = "cod_user";
		$valor2 = $this->activarId;

		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);
		
	}

	/*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/	
	
	public $validarUsuario;

	 public function ajaxValidarUsuario(){

		$item = "usuario";
		$valor = $this->validarUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_encode($respuesta);

	}
}



/*=============================================
ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["activarUsuario"])){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarUsuario();

}

/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

if(isset( $_POST["validarUsuario"])){

	$valUsuario = new AjaxUsuarios();
	$valUsuario -> validarUsuario = $_POST["validarUsuario"];
	$valUsuario -> ajaxValidarUsuario();

}