/*=============================================
SUBIENDO LA FOTO DE LA CARTA
=============================================*/
$(".nuevafotocarta").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG O PDF
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" && imagen["type"] != "application/pdf" ){

  		$(".nuevafotocarta").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato PDF o JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevafotocarta").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen o Pdf no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){
          
            if(imagen["type"] == "application/pdf"){

                var rutaImagen ="vistas/img/pdfs/pdfs.png";
                $(".previsualizar").attr("src", rutaImagen);
                var rutaImagen = event.target.result;
          }else{
            var rutaImagen = event.target.result;
            $(".previsualizar").attr("src", rutaImagen);
          }
  			

  		})

  	}
})
/*=============================================
EDITAR CARTA
=============================================*/
 
$(".btnEditarcartainterna").click(function(){
    
    var idcarta = $(this).attr("idcarta");
    var idusuario = $(this).attr("idusuario");
    console.log("idcarta:",idcarta);
	console.log("idusuario:",idusuario);
    
	var datos = new FormData();
	datos.append("idcarta",idcarta);
	
	$.ajax({

		url:"ajax/cartainterna.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
        dataType: "json",
        success: function(respuesta){

			console.log("elementos: ",respuesta);
			
			$("#idcarta").val(idcarta);
            $("#editarruta").val(respuesta["ruta"]);
			$("#editarfechacarta").val(respuesta["fechacarta"]);
			$("#editarfechaplazo").val(respuesta["fechaplazo"]);
			$("#editarremitente").val(respuesta["remitente"]);
            $("#editarentidad").val(respuesta["entidad"]);
            $("#editarreceptor").val(idusuario);
            $("#editarprioridad").html(respuesta["prioridad"]);
            $("#editarprioridad").val(respuesta["prioridad"]);
            $("#editarestado").html(respuesta["estadoproceso"]);
            $("#editarestado").val(respuesta["estadoproceso"]);
			$("#editarreferencia").val(respuesta["referencia"]);
			$("#editarobservacion").val(respuesta["observacion"]);
			$("#fotoActualcarta").val(respuesta["fotocarta"]);
			
			if(respuesta["fotocarta"] != ""){

				$(".previsualizar").attr("src", respuesta["fotocarta"]);

            }
        }
	});
})

/*=============================================
VISOR DE CARTA
=============================================*/
$(".btnvisor").click(function(){
    
    var idcarta = $(this).attr("idcarta");
	var fotocarta = $(this).attr("fotocarta");
			$("#fotoApre").val(fotocarta);
			if(fotocarta!= ""){
				$(".previsualizar").attr("src",fotocarta);
            }
})

/*=============================================
ELIMINAR CARTA INTERNA
=============================================*/

$(".btnEliminarcartainterna").click(function(){
	
    var idcartas = $(this).attr("idcartas");
	var fotocartas = $(this).attr("fotocartas");
	var remitente = $(this).attr("remitente");

	
    
    swal({
      title: '¿Está seguro de borrar el registro relamente estas seguro?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar el Registro!'
    }).then((result)=>{
  
      if(result.value){                                         
        window.location = "index.php?ruta=corespinterna&idcartas="+idcartas+"&fotocartas="+fotocartas+"&remitente="+remitente;
      }
  
    })
  
  })