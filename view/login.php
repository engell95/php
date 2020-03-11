
<!--formulario enviar informacion de usuario-->
<form class="form-signin" style="max-width: 330px;padding: 15px;margin: 0 auto;" method="post">
	<h2 class="form-signin-heading" style="margin-bottom: 10px;">Inicio de Sesión</h2>

	<label for="inputusuario" class="sr-only">Usuario</label>
	<input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" required style="margin-bottom: 10px;">

	<label for="inputcontraseña" class="sr-only">Contraseña</label>
	<input type="password" id="contraseña" name="contraseña" class="form-control" placeholder="Contraseña" required style="margin-bottom: 10px;">

	<button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
</form>


<?php
	$post = new usercontroller();
	$post -> login($_POST);
?>