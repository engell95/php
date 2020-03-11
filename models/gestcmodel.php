<?php

//importando conexion
require_once "./config/database.php";

class gestcmodel extends Database
{
	//peticion de datos -- select
	static public function selectgestc(){

		$pdo = Database::connectDB()->prepare("SELECT cod_gestioncli,gestion,atendido,gestion_cliente.creado,gestion_cliente.actualizado,gestion.cod_gestion FROM gestion_cliente, gestion WHERE gestion_cliente.cod_gestion = gestion.cod_gestion ORDER BY gestion_cliente.actualizado DESC");
		$pdo -> execute();
		return $pdo -> fetchAll();
		$pdo -> close();

	}
}	