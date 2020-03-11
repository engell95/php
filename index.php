<?php
	//controladores
	require_once "controllers/routescontroller.php";
	require_once "controllers/usercontroller.php";
	require_once "controllers/gestcontroller.php";
	require_once "controllers/gestclicontroller.php";
	require_once "controllers/ticketcontroller.php";

	//modelos
	require_once "models/routemodel.php";
	require_once 'models/usermodel.php';
	require_once 'models/gestmodel.php';
	require_once 'models/gestcmodel.php';
	require_once 'models/ticketmodel.php';

	$rutas = new RouteController();
	$rutas -> layout();

?>