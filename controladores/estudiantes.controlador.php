<?php


class ControladorEstudiantes
{

    public static function CtrCrearestudiante()
    {

        if (isset($_POST["nombre"])) {
            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre"]) &&
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["ApPaterno"]) &&
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["ApMaterno"]) &&
                preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["Ci"]) 
               

            ) {

                $tabla = "estudiante";
              
                $datos = array(
                    "nombre" => $_POST["nombre"],
                    "ap_paterno" => $_POST["ApPaterno"],
                    "ap_materno" => $_POST["ApMaterno"],
                    "ci" => $_POST["Ci"],
                    "genero" => $_POST["genero"],
                    "celular" => $_POST["nrocel"],
                    "reg_univ" => $_POST["matricula"],
                    "email" => $_POST["email"],
                    "estado" => $_POST["estado"],
                    "modo_ing" => $_POST["ingreso"],
                    "modo_egre" => $_POST["egreso"],
                    "fecha_nac" => $_POST["nacimiento"],
                );
                $respuesta = ModeloEstudiantes::mdlIngresarEstudiante($tabla, $datos);
                
                if ($respuesta === "ok") {
                    echo '<script>
                                swal({
                                    type: "success",
                                    title: "EL ESTUDIANTE A SIDO REGISTRADO CORRECTAMENTE",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false

                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "estudiantes";
                                    }
                                });
                                </script>';
                } else {
                    echo '<script>

        swal({
            type: "error",
            title: "¡El Estudiante no ha sido Registado!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false

        }).then((result)=>{
            if(result.value){
                window.location = "estudiantes";
            }
        });
        </script>';
                }
            } else {
                echo '<script>
        swal({
            type: "error",
            title: "¡El ci y cel de son solo numeros puede usar caracteres especiales ni letras , <br> deben estar sin caracteres especiales ni puntos!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false

        }).then((result)=>{
            if(result.value){
                window.location = "estudiantes";
            }
        });
        </script>';
            }
        }
    }
    /*MOSTRAR ESTUDIANTE */
    static public function ctrMostrarestudiante($item, $valor)
    {
        $tabla = "estudiante";
        $respuesta = ModeloEstudiantes::MdlMostrarestudiante($tabla, $item, $valor);
        return $respuesta;
    }
      /*=============================================
	MOSTRAR BOLETA
	=============================================*/
    static public function ctrMostrarboleta($item, $valor,$id)
    {
        $tabla = "estudiante";
        $tabla1 = "materia";
        $respuesta = ModeloEstudiantes::mdlMostrarboleta($tabla,$tabla1, $item, $valor,$id);
        return $respuesta;
    }


    static public function ctrMostrarlista($item, $valor,$id)
    {
        $tabla = "estudiante";
        $tabla1 = "materia";
        $respuesta = ModeloEstudiantes::mdlMostrarlista($tabla,$tabla1, $item, $valor,$id);
        return $respuesta;
    }
    /*=============================================
	EDITAR ESTUDIANTE
	=============================================*/
	
	static public function ctreditarestudiante(){
        
        
		if(isset($_POST["editarnombre"])){
			

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnombre"])  && 
               preg_match('/^[a-zA-Z0-9ñÑáéíóú-ÁÉÍÓÚ ]+$/', $_POST["editarApPaterno"]) &&
               preg_match('/^[a-zA-Z0-9ñÑáéíóú-ÁÉÍÓÚ ]+$/', $_POST["editarApMaterno"]) &&
             preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["editarCi"]) &&
        
                preg_match('/^[0-9 ]+$/', $_POST["editarnrocel"]) &&
             preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarmatricula"])
				){
			
				$tabla = "estudiante";
               		  
			  $datos = array("nombre" => $_POST["editarnombre"],
							  "ap_paterno" => $_POST["editarApPaterno"],
							  "ap_materno" => $_POST["editarApMaterno"], 
							  "email" => $_POST["editaremail"],
                              "celular" => $_POST["editarnrocel"],
							  "reg_univ" => $_POST["editarmatricula"],
							  "ci" => $_POST["editarCi"], 
                              "estado" => $_POST["editarestado"], 
                              "modo_ing" => $_POST["editaringreso"], 
							  "modo_egre" => $_POST["editaregreso"], 
                              "fecha_nac" => $_POST["editarnacimiento"], 
							 );
	              							 
                $respuesta = ModeloEstudiantes::mdlEditarEstudiante($tabla, $datos);
                    
				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Estudiante ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "estudiantes";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los Datos no pueden ir vacíos o llevar caracteres especiales en el formulario!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "estudiantes";

							}
						})

			  	</script>';

			}

		}
    }
    
    /*=============================================
	BORRAR ESTUDIANTE
	=============================================*/
    
	static public function ctrBorrarestudiante(){

		if(isset($_GET["idestudiante"])){
            
			$tabla ="estudiante";
			$datos = $_GET["idestudiante"];

			$respuesta = Modeloestudiantes::mdlBorrarestudiante($tabla, $datos);
                                            
			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "Estudiante ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value) {
								window.location = "estudiantes";
								}
							})
				</script>';
			}		
		}
	}

  /*=============================================
      INSCRIBIR ESTUDIANTE
	=============================================*/

    public static function CtrInscribir()
    {

        if (isset($_POST["idest"])) {
            if (preg_match('/^[0-9 ]+$/', $_POST["nota1"]) &&
                preg_match('/^[0-9 ]+$/', $_POST["nota2"]) &&
                preg_match('/^[0-9 ]+$/', $_POST["nota3"]) 
            ) {

              
                $tabla = "toma";
               
                echo "<script>";
                echo "alert('";
                
                echo "')</script>";
               
                $datos = array(
                    "codest" => $_POST["idest"],
                    "cod_mat" => $_POST["nuevamateria"],
                    "notaf1" => $_POST["nota1"],
                    "notaf2" => $_POST["nota2"],
                    "notaf3" => $_POST["nota3"],
                    "observacion" => $_POST["observacion"],
                    "notafinal" => $_POST["notaf"],
                );
                $respuesta = ModeloEstudiantes::mdlinscrbirEstudiante($tabla, $datos);
                
                if ($respuesta === "ok") {
                    echo '<script>
                                swal({
                                    type: "success",
                                    title: "EL ESTUDIANTE A SIDO AGREGADO CORRECTAMENTE A LA MATERIA",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false

                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "estudiantes";
                                    }
                                });
                                </script>';
                } else {
                    echo '<script>

        swal({
            type: "error",
            title: "¡El Estudiante no ha sido Agregado a la Materia!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false

        }).then((result)=>{
            if(result.value){
                window.location = "estudiantes";
            }
        });
        </script>';
                }
            } else {
                echo '<script>
        swal({
            type: "error",
            title: "¡El ci y cel de son solo numeros puede usar caracteres especiales ni letras , <br> deben estar sin caracteres especiales ni puntos!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false

        }).then((result)=>{
            if(result.value){
                window.location = "estudiantes";
            }
        });
        </script>';
            }
        }
    }


}
