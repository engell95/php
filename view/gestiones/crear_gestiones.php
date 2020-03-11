<!--vista para crear los diferentes tipos de gestiones-->
<?php
	//verificacion de sessiones
	session_start();
	if (!$_SESSION["Ingreso"]) {
		header("location:index.php?ruta=login.php");
		exit();
	}

	include("view/part/nav.php");

	//enviando datos al controlador
	$post = new gestcontroller();
	$post -> creategest();
?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Crear gestión</h1>

    <!--formulario para crear gestion-->
	<form method="post">

		<label>Nombre de la gestion</label>
		<input type="text" id="gestion" name="gestion" class="form-control" placeholder="Pago de servicio" required style="margin-bottom: 20px;" maxlength="50" minlength="5">

		<label>Aplica visita tecnica</label>
		<div class="custom-control custom-checkbox" style="margin-bottom: 20px;">
  			<input type="checkbox" class="custom-control-input" id="tecnica" name="tecnica">
  			<label class="custom-control-label" for="defaultChecked2">Si Aplica</label>
		</div>

		<label>Usuario</label>
		<input id="cod_usuario" name="cod_usuario" type="hidden" value="<?php echo $_SESSION["id"];?>">
		<input type="text" readonly id="usuario" name="usuario" value="<?php echo $_SESSION["nombre"],' ',$_SESSION["apellido"]; ?>" class="form-control" placeholder="Pago de servicio" required style="margin-bottom: 20px;">

		<button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
	</form>	

</div>            

