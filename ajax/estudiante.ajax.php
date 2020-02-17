<?php


require_once "../controladores/estudiantes.controlador.php";
require_once "../modelos/estudiantes.modelo.php";


/*=============================================
EDITAR ESTUDIANTE
=============================================*/

if(isset($_POST["idestudiante"])){
    
	$editar = new Ajaxestudiante();
	$editar -> idestudiante = $_POST["idestudiante"];
	$editar -> ajaxEditarestudiante();
}

if(isset($_POST["idestudiantes"])){
    
	$Agregar = new Ajaxestudiante();
	$Agregar -> idestudiantes = $_POST["idestudiantes"];
	$Agregar -> ajaxAgregarestudiante();
}

class Ajaxestudiante{

	/*=============================================
	EDITAR ESTUDIANTE
	=============================================*/	

	public $idestudiante;
	public $idestudiantes;

	 public function ajaxEditarestudiante(){
        
		$item = "codest";
		$valor = $this->idestudiante;

		$respuesta = ControladorEstudiantes::ctrMostrarestudiante($item, $valor);
                        
		echo json_encode($respuesta);

	}


	public function ajaxAgregarestudiante(){
        
		$item = "codest";
		$valor = $this->idestudiantes;

		$respuesta = ControladorEstudiantes::ctrMostrarestudiante($item, $valor);
                        
		echo json_encode($respuesta);

	}
}