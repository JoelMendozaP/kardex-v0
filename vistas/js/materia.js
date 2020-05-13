


/*=============================================
EDITAR MATERIA
=============================================*/

$(".btnEditarmateria").click(function(){
    
	var idmateria = $(this).attr("idmateria");
	console.log("idmateria:",idmateria);
	var datos = new FormData();
	datos.append("idmateria", idmateria);
	
	$.ajax({

		url:"ajax/materia.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			console.log("respuestas ",respuesta);


            $("#editarnombrem").val(respuesta["nombre_m"]);
			$("#editarsigla").val(respuesta["sigla"]);
			$("#editarfolio").val(respuesta["folio"]);
			$("#editarlibro").val(respuesta["libro"]);
			$("#editargestion").val(respuesta["gestion"]);
            $("#editarestapa").html(respuesta["fecha_curso"]);
            $("#editarestapa").val(respuesta["fecha_curso"]);
            $("#editardocente").val(respuesta["docente"]);
            
            
		}

	});

})

/*=============================================
ELIMINAR MATERIA
=============================================*/

$(".btnEliminarmateria").click(function(){
	
    var idmateria = $(this).attr("idmateria");
    var materia = $(this).attr("materia");
  
    swal({
      title: '¿Está seguro de borrar el materia?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar materia!'
    }).then((result)=>{
  
      if(result.value){
  
        window.location = "index.php?ruta=materia&idmateria="+idmateria+"&materia="+materia;
  
      }
  
    })
  
  })

/*=============================================
GENERAR PDF LISTA DE MATERIAS
=============================================*/
$(".btnimplistamateria").click(function(){
  var si='si';
    if(si != null){   
    generarpdflista(si);                                      
  }
})

function generarpdflista(si){
var ancho = 1000;
var alto = 800;
//calcular posicion x, y para centrar la ventana
var x = parseInt((window.screen.width/2)-(ancho/2));
var y = parseInt((window.screen.height/2)-(alto/2));
window.open("extensiones/pdfs/listamateria.php?si="+si,"LISTA DE LA MATERIA","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
}


   /*=============================================
   LISTA DE LA MATERIA
=============================================*/

$(".btnlistademateria").click(function(){
	
  var idmaterias = $(this).attr("idmaterias");
  var materia = $(this).attr("materia");
  
  swal({
    title: '¿Desea ver la Lista de Inscritos?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, Ver La Lista!'
  }).then((result)=>{

    if(result.value){
                                                                  
      window.location = "index.php?ruta=inscribir&idmaterias="+idmaterias+"&materia="+materia;

    }

  })

})
  
/*=============================================
GENERAR PDF LISTA DE ESTUDIANTES POR MATERIA
=============================================*/
$(".estudiant").click(function(){
	var codmateria = $(this).attr("codmateria");
	console.log("este es el codigo",codmateria);
      if(codmateria != null){   
		  generarpdflista(codmateria);                                      
		}
  })

function generarpdflista(codmateria){
 var ancho = 1000;
 var alto = 800;
 //calcular posicion x, y para centrar la ventana
 var x = parseInt((window.screen.width/2)-(ancho/2));
 var y = parseInt((window.screen.height/2)-(alto/2));
 window.open("extensiones/pdfs/estudiantelista.php?codmateria="+codmateria,"LISTA DE LA MATERIA","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
}




