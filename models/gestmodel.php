<?php

//importando conexion
require_once "./config/database.php";

class gestmodel extends Database
{
	//peticion de datos -- select
	static public function selectgest(){

		$pdo = Database::connectDB()->prepare("SELECT * FROM gestion");
		$pdo -> execute();
		return $pdo -> fetchAll();
		$pdo -> close();

	}

	//envio de datos -- insert
	static public function insergest($datosC , $tableDB){
   		
   		$pdo = Database::connectDB()->prepare("INSERT INTO $tableDB (cod_usuario,gestion,	vis_tecnica) VALUES (:cod_usuario,:gestion,:vis_tecnica)");
 
		$pdo -> bindParam(":cod_usuario", $datosC["cod_usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":gestion", $datosC["gestion"], PDO::PARAM_STR);
		$pdo -> bindParam(":vis_tecnica", $datosC["vis_tecnica"], PDO::PARAM_STR);

		//validando inserción
		if ($pdo -> execute()) {
            return "success";
        }
        else {
            return "error";
        }

		$pdo -> close();

	}

	//envio de datos GestionCliente no atendido.
	static public function insergestcli($datosC , $tableDB){
		$atendido = 0;
		$pdo = Database::connectDB()->prepare("INSERT INTO $tableDB (cod_gestion,atendido) VALUES (:cod_gestion,:atendido)");
 
		$pdo -> bindParam(":cod_gestion", $datosC, PDO::PARAM_STR);
		$pdo -> bindParam(":atendido", $atendido, PDO::PARAM_STR);

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