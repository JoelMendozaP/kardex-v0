


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

/*=============================================
REVISAR SI SE REPITE EL ESTUDIANTE REGISTRADO
=============================================*/
$("#Ci").change(function(){
  
   var Ci =$(this).val();
  var datos = new FormData();
  datos.append("ValidarCi",Ci);

  $.ajax({

  url:"ajax/estudiante.ajax.php",
  method: "POST",
  data: datos,
  cache: false,
  contentType: false,
  processData: false,
  dataType: "json",
  success: function(respuesta){

        $(".alert").remove();
    if (respuesta) {
      $("#Ci").parent().after('<div class="alert alert-danger">El Estudiante Ya existe</div>');
      $("#Ci").val("");
    } else {
      
    }
    
          
  }

});
})


/*=============================================
 PROMEDIO DE NOTAS 
=============================================*/
$("#nota1"&&"#nota2"&&"#nota3").change(function(){

  var apr="Aprobado";
  var rep="Reprobado";
  var aba="Abandono";
  var nota1 = parseInt(document.getElementById("nota1").value);
  var nota2 = parseInt(document.getElementById("nota2").value);
  var nota3 = parseInt(document.getElementById("nota3").value);

  notafinal=parseFloat((nota1+nota2+nota3)/3);
  document.getElementById('notaf').innerHTML = ((nota1+nota2+nota3)/3);
  
  
  if(nota1!=0 && nota2!=0 && nota3!=0 ){

    if(notafinal>= 51){
    
     $("#observaciones").val(apr);
     $("#observacion").html(apr);
     $("#notafinal").val(notafinal);
    }else{
  
     $("#observaciones").val(rep);
     $("#observacion").html(rep);
     $("#notafinal").val(notafinal);
    }
  }else{
 
  $("#observaciones").val(aba);
  $("#observacion").html(aba);
  $("#notafinal").val(notafinal);
  }
})

/*=============================================
GENERAR PDF DE BOLETA
=============================================*/
$(".btnboleta").click(function(){


	var idestudiantito = $(this).attr("idestudiantito");
	console.log("este es el codigo",idestudiantito);
      if(idestudiantito != null){   
		  generarpdfestudiante(idestudiantito);                                      
		//window.open("extensiones/pdfs/cartapdf.php?idestudiantito="+idestudiantito);
	}
  })

function generarpdfestudiante(idestudiantito){
 var ancho = 1000;
 var alto = 800;
 //calcular posicion x, y para centrar la ventana
 var x = parseInt((window.screen.width/2)-(ancho/2));
 var y = parseInt((window.screen.height/2)-(alto/2));
 window.open("extensiones/pdfs/reporte.php?idestudiantito="+idestudiantito,"CARTA","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
}





