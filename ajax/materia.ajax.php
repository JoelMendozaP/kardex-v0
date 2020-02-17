<?php


require_once "../controladores/materia.controlador.php";
require_once "../modelos/materia.modelo.php";


/*=============================================
EDITAR MATERIA
=============================================*/

if(isset($_POST["idmateria"])){

	$editar = new Ajaxmateria();
	$editar -> idmateria = $_POST["idmateria"];
	$editar -> ajaxEditarmateria();

}

class Ajaxmateria{

	/*=============================================
	EDITAR MATERIA
	=============================================*/	

	public $idmateria;

	 public function ajaxEditarmateria(){

		$item = "cod_mat";
		$valor = $this->idmateria;

		$respuesta = Controladormaterias::ctrMostrarmaterias($item, $valor);
                        
		echo json_encode($respuesta);

	}
}