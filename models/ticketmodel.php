<?php

//importando conexion
require_once "./config/database.php";

class ticketmodel extends Database
{
	//peticion de datos -- select
	static public function gestnow(){

		//perparando fecha del dia
		$date = new Datetime();
		$dateset = $date->format('Y-m-d');
		$atendido = 0;

		$pdo = Database::connectDB()->prepare("SELECT cod_gestioncli,gestion,atendido,gestion_cliente.creado,gestion_cliente.actualizado,gestion.cod_gestion FROM gestion_cliente, gestion WHERE gestion_cliente.cod_gestion = gestion.cod_gestion and gestion_cliente.atendido = :atendido and date(gestion_cliente.creado) =:hoy 
			ORDER BY gestion_cliente.creado ASC");

		$pdo -> bindParam(":hoy", $dateset, PDO::PARAM_STR);
		$pdo -> bindParam(":atendido", $atendido, PDO::PARAM_STR);

		$pdo -> execute();
		return $pdo -> fetchAll();
		$pdo -> close();

	}

	//peticion de datos de gestiones-- select
	static public function gesttipnow(){

		$pdo = Database::connectDB()->prepare("SELECT * FROM gestion ORDER BY cod_gestion DESC");
		$pdo -> execute();
		return $pdo -> fetchAll();
		$pdo -> close();

	}

	//atender cliente
	static public function addclientd(){

		$atendido = 1;
		$natendido = 0;

		//verificamos el ultimo registro
		$pdo = Database::connectDB()->prepare("SELECT cod_gestioncli,gestion FROM gestion_cliente, gestion WHERE gestion_cliente.cod_gestion = gestion.cod_gestion and gestion_cliente.atendido = :natendido ORDER BY gestion_cliente.creado ASC LIMIT 1");

		$pdo -> bindParam(":natendido", $natendido, PDO::PARAM_STR);
		$pdo -> execute();
		$invNum = $pdo -> fetch(PDO::FETCH_ASSOC);
 		$id 	= $invNum['cod_gestioncli'];

 		//actualizando estado de gestion del cliente
 		$pdo2 = Database::connectDB()->prepare("UPDATE gestion_cliente SET atendido = :atendido WHERE 
 			cod_gestioncli = :id");
		$pdo2 -> bindParam(":id", $id, PDO::PARAM_STR);
		$pdo2 -> bindParam(":atendido", $atendido, PDO::PARAM_STR);
		$pdo2 -> execute();

		return $invNum;
		 
		$pdo -> close();
		$pdo2 -> close();

	}

	//envio de datos -- insert
	static public function inseticket($datosC , $tableDB){
   			
		
   		$pdo = Database::connectDB()->prepare("INSERT INTO $tableDB (cod_ticket,cod_gestioncli,cod_gestion,cli_nombre,cli_apellido,cli_direccion,cli_telefono,problema,solucion) VALUES (:cod_ticket,:cod_ticket,:cod_gestion,:cli_nombre,:cli_apellido,:cli_direccion,:cli_telefono,:problema,:solucion)");
 
		$pdo -> bindParam(":cod_ticket", $datosC["cod_ticket"], PDO::PARAM_STR);
		$pdo -> bindParam(":cod_gestioncli", $datosC["cod_gestioncli"], PDO::PARAM_STR);
		$pdo -> bindParam(":cod_gestion", $datosC["gestion"], PDO::PARAM_STR);
		$pdo -> bindParam(":cli_nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":cli_apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":cli_direccion", $datosC["direccion"], PDO::PARAM_STR);
		$pdo -> bindParam(":cli_telefono", $datosC["telefono"], PDO::PARAM_STR);
		$pdo -> bindParam(":problema", $datosC["problema"], PDO::PARAM_STR);
		$pdo -> bindParam(":solucion", $datosC["solucion"], PDO::PARAM_STR);

		//validando inserción
		if ($pdo -> execute()) {
            return "success";
        }
        else {
            return "error";
        }

		$pdo -> close();

	}

}