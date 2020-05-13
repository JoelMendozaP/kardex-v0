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

/*=============================================
EDITAR CARTA CREADA
=============================================*/
 
$(".btnEditarccarta").click(function(){
	
	var idcartas = $(this).attr("idcartas");
	var ccarta=idcartas;
	var ciusuario = $(this).attr("ciusuario");
	
    
	var datos = new FormData();
	datos.append("idcartas",idcartas);
	
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
			$("#codcartac").val(ccarta);
			$("#dniuser").val(ciusuario);
			$("#editarrutacreada").val(respuesta["rutacreada"]);
			$("#editarcrearfecha").val(respuesta["fechaemicion"]);
			$("#editarlugar").val(respuesta["lugar"]);
			$("#editardirijida").val(respuesta["dirijida"]);
			$("#editarcargo").val(respuesta["cargodir"]);
			$("#editarcrearreferencia").val(respuesta["referencia"]);
			$("#editarsaludoinicial").val(respuesta["saludo"]);
			$("#editarasunto").val(respuesta["asunto"]);
			$("#editardespedida").val(respuesta["despedida"]);
			$("#editarremitentec").val(respuesta["emisor"]);
			$("#editarcargoremitente").val(respuesta["cargoemisor"]);
			$("#editarcic").val(respuesta["ciemisor"]);
			$("#editarcorreodir").val(respuesta["otro"]);
		
        }
	});
})


/*=============================================
ELIMINAR CARTA CREADA
=============================================*/
$(".btnEliminarcartac").click(function(){
	
    var codcartacreada= $(this).attr("codcartacreada");
	var ciusu = $(this).attr("ciusu");
    swal({
      title: '¿Está seguro de borrar La carta realmente esta seguro?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar la carta!'
    }).then((result)=>{
  
      if(result.value){                                         
        window.location = "index.php?ruta=corespinterna&codcartacreada="+codcartacreada+"&ciusu="+ciusu;
      }
  
    })
  
  })



/*=============================================
REASIGNAR REGISTRO DE CARTA
=============================================*/
 
$(".btnreasignar").click(function(){
	
	var codcartah = $(this).attr("codcartah");
	var cartah=codcartah;
	var codusuarioh = $(this).attr("codusuarioh");
	var remitente = $(this).attr("remitente");
	var receptoract = $(this).attr("receptoract");
	
	console.log("codcartah:",codcartah);
	console.log("codusuarioh:",codusuarioh);
	console.log("remitente:",remitente);


	var datos = new FormData();
	datos.append("codcartah",codcartah);

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

			$("#codcartaces").val(cartah);
			$("#editarreceptorhistorial").val(codusuarioh);
			$("#editarremitentes").val(remitente);
			$("#recepactual").val(receptoract);
			$("#rutahistorial").val(respuesta["ruta"]);
			$("#editarestadohistorial").html(respuesta["estadoproceso"]);
			$("#editarestadohistorial").val(respuesta["estadoproceso"]);
			$("#editarobservacionhistorial").val(respuesta["observacion"]);
			$("#fotoActualcartahistorial").val(respuesta["fotocarta"]);
			
			if(respuesta["fotocarta"] != ""){

				$(".previsualizar").attr("src", respuesta["fotocarta"]);
            }
		
        }
	});
})


  /*=============================================
GENERAR PDF DE LA CARTA CREADA
=============================================*/
$(".btnimpri").click(function(){
	var codcartac = $(this).attr("codcartac");
	console.log("este es el codigo",codcartac);
      if(codcartac != null){   
		  generarpdf(codcartac);                                      
		//window.open("extensiones/pdfs/cartapdf.php?codcartac="+codcartac);
	}
  })

function generarpdf(codcartac){
 var ancho = 1000;
 var alto = 800;
 //calcular posicion x, y para centrar la ventana
 var x = parseInt((window.screen.width/2)-(ancho/2));
 var y = parseInt((window.screen.height/2)-(alto/2));
 window.open("extensiones/pdfs/cartapdf.php?codcartac="+codcartac,"CARTA","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
}


 




/*=============================================
   HISTORIAL DE CARTA INTERNA
=============================================*/

$(".historialcarta").click(function(){
	
	var idcartahitorial = $(this).attr("idcartahitorial");
	var codu = $(this).attr("codu");

	swal({
	  title: '¿Desea ver el Historial de la carta?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, Ver La Historial!'
	}).then((result)=>{
  
	  if(result.value){
																	
		window.location = "index.php?ruta=historialcarta&idcartahitorial="+idcartahitorial+"&codu="+codu;
  
	  }
  
	})
  
  })
  

  /*=============================================
   HISTORIAL DE CARTA EXTERNA
=============================================*/

$(".historialcartas").click(function(){
	
	var idcartahitorialex = $(this).attr("idcartahitorialex");
	var codu = $(this).attr("codu");

	swal({
	  title: '¿Desea ver el Historial de la carta?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, Ver La Historial!'
	}).then((result)=>{
  
	  if(result.value){																	
		window.location = "index.php?ruta=historialcartaexterna&idcartahitorialex="+idcartahitorialex+"&codu="+codu;
	  }
	})
  })
/*=============================================
VISOR DE CARTA
=============================================*/
$(".btnvisor").click(function(){
    
	var fotocarta = $(this).attr("fotocarta");
			$("#fotoApre").val(fotocarta);
			if(fotocarta!= ""){
				$(".previsualizar").attr("src",fotocarta);
            }
})

 /*=============================================
RELOJ Y CALENDARIO EN TIEMPO REAL
=============================================*/
function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
    
    var months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    var days = ['Domingo', 'Lunes', 'Martes', 'Miercoels', 'Jueves', 'Viernes', 'Sabado'];
    var curWeekDay = days[today.getDay()];
    var curDay = today.getDate();
    var curMonth = months[today.getMonth()];
    var curYear = today.getFullYear();
    var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
    document.getElementById("date").innerHTML = date;
    
    var time = setTimeout(function(){ startTime() }, 500);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}