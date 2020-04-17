<?php


class Controladorcorespinterna
{
    static public function CtrCrearcartaint()
    {
        if (isset($_POST["nuevofechaplazo"])) {

            if (
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoremitente"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoentidad"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoreferencia"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoobservacion"]) 
            ) {
                /*validar imagen */
                $ruta = "";
                if (isset($_FILES["nuevafotocarta"]["tmp_name"])) {

                    if ($_FILES["nuevafotocarta"]["type"] == "application/pdf") {
                        $directorio = "vistas/img/cartas/Interna/" . $_POST["nuevoremitente"];
                        mkdir($directorio, 0755);
                        /*=============================================
                        GUARDAMOS EL PDF EN EL DIRECTORIO
                        =============================================*/
                        $aleatorio = mt_rand(100, 999999);
                        $ruta = "vistas/img/cartas/Interna/" . $_POST["nuevoremitente"] . "/" . $aleatorio . ".pdf";
                            $resultado =@move_uploaded_file($_FILES["nuevafotocarta"]["tmp_name"],$ruta);
                        
                    } else {
                        list($ancho, $alto) = getimagesize($_FILES["nuevafotocarta"]["tmp_name"]);
                        $nuevoAncho = 500;
                        $nuevoAlto = 500;
                        /* creamos el directorio a guardar la foto del remitente*/
                        $directorio = "vistas/img/cartas/Interna/" . $_POST["nuevoremitente"];
                        mkdir($directorio, 0755);
                        /* de acuerdo al tipo de imagen aplicamos las funciones por defecto de php*/
                        if ($_FILES["nuevafotocarta"]["type"] == "image/jpeg") {

                            /*=============================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        =============================================*/

                            $aleatorio = mt_rand(100, 999999);

                            $ruta = "vistas/img/cartas/Interna/" . $_POST["nuevoremitente"] . "/" . $aleatorio . ".jpg";

                            $origen = imagecreatefromjpeg($_FILES["nuevafotocarta"]["tmp_name"]);

                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                            imagejpeg($destino, $ruta);
                        }

                        if ($_FILES["nuevafotocarta"]["type"] == "image/png") {

                            /*=============================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        =============================================*/

                            $aleatorio = mt_rand(100, 999999);

                            $ruta = "vistas/img/cartas/Interna/" . $_POST["nuevoremitente"] . "/" . $aleatorio . ".png";

                            $origen = imagecreatefrompng($_FILES["nuevafotocarta"]["tmp_name"]);

                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                            imagepng($destino, $ruta);
                        }
                    }
                }

                $tabla = "carta";
                $tabla1 = "recibe";

                $datos = array(
                    "ruta" => $_POST["nuevoruta"],
                    "remitente" => $_POST["nuevoremitente"],
                    "entidad" => $_POST["nuevoentidad"],
                    "referencia" => $_POST["nuevoreferencia"],
                    "fechaplazo" => $_POST["nuevofechaplazo"],
                    "fechacarta" => $_POST["nuevofechacarta"],
                    "prioridad" => $_POST["prioridad"],
                    "observacion" => $_POST["nuevoobservacion"],
                    "estadoproceso" => $_POST["estado"],
                    "fotocarta" => $ruta,
                );
               

                $clave2=$_POST["nuevoreceptor"];

                $respuesta = Modelocorespinterna::mdlIngresarcartaint($tabla,$tabla1,$datos,$clave2);

                if ($respuesta === "ok") {
                    echo '<script>
                                swal({
                                    type: "success",
                                    title: "EL REGISTRO A SIDO GUARDADO CORRECTAMENTE",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false

                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "corespinterna";
                                    }
                                });
                                </script>';
                } else {
                    echo '<script>

        swal({
            type: "error",
            title: "¡El Registro no ha sido guardado correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false

        }).then((result)=>{
            if(result.value){
                window.location = "corespinterna";
            }
        });
        </script>';
                }
            } else {
                echo '<script>

        swal({
            type: "error",
            title: "¡El Registro no pude usar caracteres especiales!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false

        }).then((result)=>{
            if(result.value){
                window.location = "corespinterna";
            }
        });
        </script>';
            }
        }
    }

    /*=============================================
	MOSTRAR  CORESPINTERNA
	=============================================*/
    static public function ctrMostrarcorespinterna($item, $valor)
    {
        $tabla = "carta";
        $tabla1 = "usuarios";
        $tabla2 = "recibe";
        $respuesta = Modelocorespinterna::MdlMostrarcorespinterna($tabla, $tabla1,$tabla2, $item, $valor);
        return $respuesta;
    }

    /*=============================================
	MOSTRAR  CORESPINTERNA ver 2.0
	=============================================*/
    static public function ctrMostrarcorespinternas($item, $valor)
    {
        
        $respuesta = Modelocorespinterna::MdlMostrarcorespinternas($item, $valor);
        return $respuesta;
    }
    /*=============================================
	EDITAR CARTA INTERNA
	=============================================*/
    static public function ctreditarcartaint()
    {

        if (isset($_POST["editarfechacarta"])) {
                   if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarremitente"]) &&
                    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarentidad"]) &&
                    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarreferencia"]) &&
                   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarobservacion"]) 
                    ) {
                   /*=============================================
				   VALIDAR IMAGEN
				  =============================================*/
                   $ruta = $_POST["fotoActualcarta"];
                   if (isset($_FILES["editarfotocarta"]["tmp_name"]) && !empty($_FILES["editarfotocarta"]["tmp_name"])) {
                     /*=============================================
						PREGUNTAMOS SI EL ARCHIVO ES UN PDF 
						=============================================*/
                    if ($_FILES["editarfotocarta"]["type"] == "application/pdf") {

                        $directorio = "vistas/img/cartas/Interna/" . $_POST["editarremitente"];

                            if (!empty($_POST["fotoActualcarta"])) {
                                     unlink($_POST["fotoActualcarta"]);
                            } else {
                                mkdir($directorio, 0755);
                            }
                            /*=============================================
                            GUARDAMOS EL PDF EN EL DIRECTORIO
                              =============================================*/
                                $aleatorio = mt_rand(100, 999999);
                                $ruta = "vistas/img/cartas/Interna/" . $_POST["editarremitente"] . "/" . $aleatorio . ".pdf";
                                $resultado =@move_uploaded_file($_FILES["editarfotocarta"]["tmp_name"],$ruta);
                                
                                           
                   } else {
                                    list($ancho, $alto) = getimagesize($_FILES["editarfotocarta"]["tmp_name"]);

                                    $nuevoAncho = 500;
                                    $nuevoAlto = 500;
                    /*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/
                    $directorio = "vistas/img/cartas/Interna/" . $_POST["editarremitente"];

                    /*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

                    if (!empty($_POST["fotoActualcarta"])) {
                        unlink($_POST["fotoActualcarta"]);
                    } else {
                        mkdir($directorio, 0755);
                    }
                    /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

                    if ($_FILES["editarfotocarta"]["type"] == "image/jpeg") {
                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/
                        $aleatorio = mt_rand(100, 999);

                        $ruta = "vistas/img/cartas/Interna/" . $_POST["editarremitente"] . "/" . $aleatorio . ".jpg";

                        $origen = imagecreatefromjpeg($_FILES["editarfotocarta"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["editarfotocarta"]["type"] == "image/png") {

                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "vistas/img/cartas/Interna/" . $_POST["editarremitente"] . "/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["editarfotocarta"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    }
                }
            }

                $tabla = "carta";
                $tabla1 = "recibe";
                $datos = array(
                    "ruta" => $_POST["editarruta"],
                    "remitente" => $_POST["editarremitente"],
                    "entidad" => $_POST["editarentidad"],
                    "referencia" => $_POST["editarreferencia"],
                    "fechaplazo" => $_POST["editarfechaplazo"],
                    "fechacarta" => $_POST["editarfechacarta"],
                    "prioridad" => $_POST["editarprioridad"],
                    "observacion" => $_POST["editarobservacion"],
                    "estadoproceso" => $_POST["editarestado"],
                    "fotocarta" => $ruta,
                );
                $clave2=$_POST["editarreceptor"];
                $idcarta=$_POST["idcarta"];
                
                
                $respuesta =  Modelocorespinterna::mdleditarcartaint($tabla,$tabla1,$datos,$clave2,$idcarta);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "El registro de la carta ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "corespinterna";

									}
								})

					</script>';
                }else {
                    echo '<script>
        swal({
            type: "error",
            title: "¡El Registro no ha sido Editado correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false

        }).then((result)=>{
            if(result.value){
                window.location = "corespinterna";
            }
        });
        </script>';
                }
            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡La ruta no puede ir vacío o llevar caracteres especiales como puntos comas y guiones!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "corespinterna";

							}
						})

			  	</script>';
            }
        }
    }

    /*=============================================
	BORRAR CARTA INTERNA
	=============================================*/
    static public function ctrBorrarCartainterna()
    {

        if (isset($_GET["idcartas"])) {

            $tabla = "carta";
            $datos = $_GET["idcartas"];

            if ($_GET["fotocartas"] != "") {
                unlink($_GET["fotocartas"]);
                rmdir('vistas/img/cartas/Interna/' . $_GET["remitente"]);
            }

            $respuesta = Modelocorespinterna::mdlBorrarcarta($tabla, $datos);


            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "El Registro de la carta ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value) {
								window.location = "corespinterna";
								}
							})
				</script>';
            }
        }
    }

/*=============================================
	Crear carta
	=============================================*/
    static public function CtrCrearc()
    {
        if (isset($_POST["dirijida"])) {

            if (
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevolugar"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["cargo"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["remitente"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["cic"])&&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ@. ]+$/', $_POST["correodir"]) 
            ) {
                $tabla = "crearcarta";
                $tabla1 = "crearc";

                $datos = array(
                    "lugar" => $_POST["nuevolugar"],
                    "dirijida" => $_POST["dirijida"],
                    "cargodir" => $_POST["cargo"],
                    "referencia" => $_POST["crearreferencia"],
                    "fechaemicion" => $_POST["crearfecha"],
                    "saludo" => $_POST["saludoinicial"],
                    "asunto" => $_POST["asunto"],
                    "despedida" => $_POST["despedida"],
                    "emisor" => $_POST["remitente"],
                    "cargoemisor" => $_POST["cargoremitente"],
                    "ciemisor" => $_POST["cic"],
                    "otro" => $_POST["correodir"],
                );
                $clave2=$_POST["user"];

                $respuesta = Modelocorespinterna::mdlcrearc($tabla,$tabla1,$datos,$clave2);

                echo "<script>";
                echo "alert('";
                echo  $respuesta;
                echo "')</script>";

                if ($respuesta === "ok") {
                    echo '<script>
                                swal({
                                    type: "success",
                                    title: "LA CARTA A SIDO CREADA CORRECTAMENTE",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false

                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "corespinterna";
                                    }
                                });
                                </script>';

                } else {
                    echo '<script>

        swal({
            type: "error",
            title: "¡La carta no ha sido Creada correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false

        }).then((result)=>{
            if(result.value){
                window.location = "corespinterna";
            }
        });
        </script>';
                }
            } else {
                echo '<script>

        swal({
            type: "error",
            title: "¡La carta no pude usar caracteres especiales!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false

        }).then((result)=>{
            if(result.value){
                window.location = "corespinterna";
            }
        });
        </script>';
            }
        }
    }
}
