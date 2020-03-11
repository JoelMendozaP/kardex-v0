


/*=============================================
EDITAR ESTUDIANTE
=============================================*/

$(".btnEditarestudiante").click(function(){
    
	var idestudiante = $(this).attr("idestudiante");
	console.log("idestudiante:",idestudiante);
	var datos = new FormData();
	datos.append("idestudiante", idestudiante);
	
	$.ajax({

		url:"ajax/estudiante.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			console.log("respuestas ",respuesta);
            $("#editarnombre").val(respuesta["nombre"]);
			$("#editarApPaterno").val(respuesta["ap_paterno"]);
			$("#editarApMaterno").val(respuesta["ap_materno"]);
			$("#editarCi").val(respuesta["ci"]);
			$("#editarnrocel").val(respuesta["celular"]);
            $("#editarmatricula").val(respuesta["reg_univ"]);
            $("#editaremail").val(respuesta["email"]);
            $("#editarestado").html(respuesta["estado"]);
            $("#editarestado").val(respuesta["estado"]);
            $("#editaringreso").html(respuesta["modo_ing"]);
            $("#editaringreso").val(respuesta["modo_ing"]);
            $("#editaregreso").html(respuesta["modo_egre"]);
            $("#editaregreso").val(respuesta["modo_egre"]);
            $("#editarnacimiento").val(respuesta["fecha_nac"]);
		}
	});
})

/*=============================================
ELIMINAR ESTUDIANTE
=============================================*/

$(".btnEliminarestudiante").click(function(){
	
    var idestudiante = $(this).attr("idestudiante");
    var reg_univ = $(this).attr("reg_univ");
    
    swal({
      title: '¿Está seguro de borrar el estudiante?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar estudiante!'
    }).then((result)=>{
  
      if(result.value){
                                                                    
        window.location = "index.php?ruta=estudiantes&idestudiante="+idestudiante+"&reg_univ="+reg_univ;
  
      }
  
    })
  
  })
  
  /*=============================================
AGREGAR A MATERIA
=============================================*/

$(".btnagregarestudiante").click(function(){
    
	var idestudiantes = $(this).attr("idestudiantes");
	console.log("idestudiantes:",idestudiantes);
	var datos = new FormData();
	datos.append("idestudiantes", idestudiantes);
	
	$.ajax({

		url:"ajax/estudiante.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			console.log("respuestas ",respuesta);
            $("#idest").val(respuesta["codest"]);
		}
	});
})

/*=============================================
BOLETA DEL ESTUDIANTE
=============================================*/

$(".btnboletaestudiante").click(function(){
	
  var idestudiantito = $(this).attr("idestudiantito");
  var reg_univ = $(this).attr("reg_univ");
  
  swal({
    title: '¿Desea ver el Historial Academico?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, Ver Hitorial!'
  }).then((result)=>{

    if(result.value){
                                                                  
      window.location = "index.php?ruta=boleta&idestudiantito="+idestudiantito+"&reg_univ="+reg_univ;

    }

  })

})