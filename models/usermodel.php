<?php

//importando conexion
require_once "./config/database.php";

class userM extends Database
{
	static public function LoginM($datosC , $tableDB){
		//realizamos consulta al servidor.
   		$pdo = Database::connectDB()->prepare("SELECT * FROM $tableDB WHERE inicio =:inicio");
		$pdo -> bindParam(":inicio", $datosC["inicio"], PDO::PARAM_STR);
		$pdo -> execute();

		return $pdo->fetch();

		$pdo->close();

	}
}