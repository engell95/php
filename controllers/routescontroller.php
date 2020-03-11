<?php

	class RouteController{

		//plantilla principal
		public function layout(){
			include "view/layout.php";
		}

		//resolviendo peticion de rutas
		public function Route(){

			if (isset($_GET["ruta"])) {
				$route = $_GET["ruta"];
			}
			else{
				$route = "index";
			}

			$response = model::routemodel($route);

			include $response;

		}
	}	

?>