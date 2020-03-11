<!--vista para seleccionar los diferentes tipos de gestiones-->
<?php
	//verificacion de sessiones
	session_start();
	if (!$_SESSION["Ingreso"]) {
		header("location:index.php?ruta=login.php");
		exit();
	}
	include("view/part/nav.php");
?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Lista de Gestiones</h1>
    <!--importando datos-->
    <div class="row justify-content-center">
		<?php
		   	$get = new gestcontroller();
			$get -> listget();
		?> 
	</div>
</div>        

    	