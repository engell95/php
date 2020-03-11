<?php

class model
{
	//configurando rutas
	static public function routemodel($route){
		if($route == "index") {
			$page = "view/login.php";
		}
		if ($route == "gestiones") {
			$page = "view/gestiones/gestiones.php";
		}
		else if ($route == "crear_gestiones") {
			$page = "view/gestiones/crear_gestiones.php";
		}
		else if ($route == "crear_gestiones") {
			$page = "view/gestiones/crear_gestiones.php";
		}
		else if ($route == "gest") {
			//creando gestion cliente
			$get = new gestcontroller();
			$get -> actgestion();
		}
		else if ($route == "gestion_cliente") {
			$page = "view/gestion_cliente/gestion_cliente.php";
		}
		else if ($route == "ticket") {
			$page = "view/ticket/ticket.php";
		}
		else if ($route == "gestionesdia") {
			//peticion de ajax
			$page = "view/ticket/listgest.php";
		}
		else if ($route == "gestioneslist") {
			//peticion de ajax
			$page = "view/ticket/listgestcombo.php";
		}
		else if ($route == "addticket") {
			//peticion de ajax
			$page = "view/ticket/addticket.php";
		}
		else if ($route == "salir") {
			//cerrando session del usuario
			session_start();
			session_destroy();
			$page = "view/login.php";
		}
		else{
			$page = "view/login.php";
		}
		return $page;
	}

}