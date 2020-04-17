<?php


require_once "../controladores/corespinterna.controlador.php";
require_once "../modelos/corespinterna.modelo.php";
/*=============================================
EDITAR  CARTA INTERNA
=============================================*/
if(isset($_POST["idcarta"])){
	$editar = new Ajaxcarta();
	$editar -> idcarta = $_POST["idcarta"];
	$editar -> ajaxEditarcarta();
}

if(isset($_POST["idcartas"])){
    
	$Agregar = new Ajaxcarta();
	$Agregar -> idcartas = $_POST["idcartas"];
	$Agregar -> ajaxAgregarcarta();
}

class Ajaxcarta{

	/*=============================================
	EDITAR  CARTA INTERNA
	=============================================*/	

	public $idcarta;
	public $idcartas;

	 public function ajaxEditarcarta(){
        
		$item = "cod_carta";
		$valor = $this->idcarta;

		$respuesta = Controladorcorespinterna::ctrMostrarcorespinterna($item, $valor);
        
        echo json_encode($respuesta);
    }
    
	public function ajaxAgregarcarta(){
        
		$item = "codest";
		$valor = $this->idcartas;

		$respuesta = Controladorcorespinterna::ctrMostrarcorespinterna($item, $valor);              
		echo json_encode($respuesta);
	}
}






