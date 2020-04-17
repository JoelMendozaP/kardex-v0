
<?php
require_once "conexion.php";

class Modelocorespinterna{
	/*=============================================
	MOSTRAR  CARTAS INTERNAS
    =============================================*/
    
    
	static public function MdlMostrarcorespinterna($tabla,$tabla1,$tabla2,$item, $valor){
		   
		if($item != null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt -> fetch();
			}else{
	
				$stmt = Conexion::conectar()->prepare("SELECT *
                FROM $tabla c, $tabla1 u, $tabla2 r 
                WHERE r.cod_carta=c.cod_carta and r.dnia= u.dni");
				$stmt->execute();
				return $stmt -> fetchAll();
	
			}
			$stmt->close();
			$stmt = null;
    }
/*=============================================
	MOSTRAR  CARTAS INTERNAS ver 2.0
	=============================================*/
    static public function MdlMostrarcorespinternas($item, $valor){

        
            $stmt = Conexion::conectar()->prepare("SELECT *
             FROM carta c, usuarios u, recibe r 
             WHERE c.cod_carta=r.cod_carta and r.dnia= u.dni and r.fecharecib=c.fechentre ");
             $stmt->execute();
             return $stmt -> fetchAll();
         $stmt->close();
         $stmt = null;
 }
/*=============================================
	INGRESAR USUARIO
=============================================*/
	static public function mdlIngresarcartaint($tabla,$tabla1,$datos,$clave2)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ruta,remitente,entidad,referencia,fechaplazo,fechacarta,fotocarta,prioridad,observacion,estadoproceso) VALUES ( :ruta,:remitente,:entidad,:referencia,:fechaplazo,:fechacarta,:fotocarta,:prioridad,:observacion,:estadoproceso)");
		
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":remitente", $datos["remitente"], PDO::PARAM_STR);
		$stmt->bindParam(":entidad", $datos["entidad"], PDO::PARAM_STR);
		$stmt->bindParam(":referencia", $datos["referencia"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaplazo", $datos["fechaplazo"], PDO::PARAM_STR);
		$stmt->bindParam(":fechacarta", $datos["fechacarta"], PDO::PARAM_STR);
		$stmt->bindParam(":fotocarta", $datos["fotocarta"], PDO::PARAM_STR);
		$stmt->bindParam(":prioridad", $datos["prioridad"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
        $stmt->bindParam(":estadoproceso", $datos["estadoproceso"], PDO::PARAM_STR);
        
        if ($stmt->execute()) {$v= "ok";} else {$v="error";}
              
            $id="cod_carta";
            $clave =controladorids::traerid($tabla,$id);
            $id="fechentre";
            $tempo =controladorids::traerid($tabla,$id);
        $stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla1(dnia,cod_carta,fecharecib) VALUES (:dnia,:cod_carta,:fecharecib)");
        
        $stmt1->bindParam(":dnia",$clave2,PDO::PARAM_STR);                                      
        $stmt1->bindParam(":cod_carta",$clave,PDO::PARAM_STR);
        $stmt1->bindParam(":fecharecib",$tempo,PDO::PARAM_STR);

            if ($stmt1->execute()) {return "ok";} else {return "error";}
              $stmt = null;
            $stmt1 = null;
            $stmt->close();
            $stmt1->close();
	}
	/*=============================================
	EDITAR  CARTA INTERNA
=============================================*/


	static public function mdleditarcartaint($tabla,$tabla1,$datos,$clave2,$idcarta){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ruta = :ruta ,remitente = :remitente , entidad = :entidad ,referencia = :referencia ,fechaplazo = :fechaplazo, fechacarta = :fechacarta , prioridad = :prioridad ,observacion = :observacion,fotocarta = :fotocarta , estadoproceso = :estadoproceso WHERE  cod_carta= $idcarta");
		                                       
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":remitente", $datos["remitente"], PDO::PARAM_STR);
		$stmt->bindParam(":entidad", $datos["entidad"], PDO::PARAM_STR);
		$stmt->bindParam(":referencia", $datos["referencia"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaplazo", $datos["fechaplazo"], PDO::PARAM_STR);
		$stmt->bindParam(":fechacarta", $datos["fechacarta"], PDO::PARAM_STR);
        $stmt->bindParam(":prioridad", $datos["prioridad"], PDO::PARAM_STR);
        $stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
        $stmt->bindParam(":fotocarta", $datos["fotocarta"], PDO::PARAM_STR);
		$stmt->bindParam(":estadoproceso", $datos["estadoproceso"], PDO::PARAM_STR);
        
        if ($stmt->execute()) {$v= "ok";} else {$v="error";}

            $clave =$idcarta;
        $stmt1 = Conexion::conectar()->prepare(" UPDATE $tabla1 SET  dnia = :dnia WHERE cod_carta =$clave" );
        $stmt1->bindParam(":dnia",$clave2,PDO::PARAM_STR);                                      
       
            if ($stmt1->execute()) {
             
                return "ok";} else {return "error";}
              $stmt = null;
            $stmt1 = null;
            $stmt->close();
            $stmt1->close();
            

	}

/*=============================================
	BORRAR CARTA INTERNA
=============================================*/

static public function mdlBorrarcarta($tabla, $datos){

	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE cod_carta = :cod_carta");

	$stmt -> bindParam(":cod_carta", $datos, PDO::PARAM_INT);

	if($stmt -> execute()){
		return "ok";
	}else{

		return "error";	
	   }
       $stmt = null;
       $stmt->close();
   }


   static public function mdlcrearc($tabla,$tabla1,$datos,$clave2){

	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(lugar,fechaemicion,dirijida,cargodir,referencia,saludo,asunto,despedida,emisor,cargoemisor,ciemisor,otro)
	 VALUES (:lugar,:fechaemicion,:dirijida,:cargodir,:referencia,:saludo,:asunto,:despedida,:emisor,:cargoemisor,:ciemisor,:otro)");
	                                                     
		$stmt->bindParam(":lugar", $datos["lugar"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaemicion", $datos["fechaemicion"], PDO::PARAM_STR);
		$stmt->bindParam(":dirijida", $datos["dirijida"], PDO::PARAM_STR);
		$stmt->bindParam(":cargodir", $datos["cargodir"], PDO::PARAM_STR);
		$stmt->bindParam(":referencia", $datos["referencia"], PDO::PARAM_STR);
		$stmt->bindParam(":saludo", $datos["saludo"], PDO::PARAM_STR);
		$stmt->bindParam(":asunto", $datos["asunto"], PDO::PARAM_STR);
		$stmt->bindParam(":despedida", $datos["despedida"], PDO::PARAM_STR);
		$stmt->bindParam(":emisor", $datos["emisor"], PDO::PARAM_STR);
		$stmt->bindParam(":cargoemisor", $datos["cargoemisor"], PDO::PARAM_STR);
		$stmt->bindParam(":ciemisor", $datos["ciemisor"], PDO::PARAM_STR);
		$stmt->bindParam(":otro", $datos["otro"], PDO::PARAM_STR);
		
        if ($stmt->execute()) {$v= "ok";} else {$v="error";}
		echo "<script>";
		echo "alert('";
		echo  $clave2;
		echo "')</script>";
            $id="cod_crearcarta";
			$clave =controladorids::traerid($tabla,$id);
			$clave = $stmt->insert_id;
			echo "<script>";
			echo "alert('";
			echo  $clave;
			echo "')</script>";
        $stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla1(dni_user,cod_cartacreaada) VALUES (:dni_user,:cod_cartacreaada)");
        $stmt1->bindParam(":dni_user",$clave2,PDO::PARAM_STR);                                      
        $stmt1->bindParam(":cod_cartacreaada",$clave,PDO::PARAM_STR);
        

            if ($stmt1->execute()) {return "ok";} else {return "error";}
              $stmt = null;
            $stmt1 = null;
            $stmt->close();
            $stmt1->close();
   }

   
	

}