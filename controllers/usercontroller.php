<?php
	
	//validando post inicio de sesion
	class usercontroller
	{
		public function login(){

			if (isset(($_POST["usuario"])) and isset(($_POST["contraseña"]))) {
				$datosC   = array("inicio"=>$_POST["usuario"],"contraseña"=>$_POST["contraseña"]);
				$tabledb  = "usuarios";
				$response = userM::LoginM($datosC, $tabledb);
				//verificamos los datos obtenidos por el server
				if ($response["inicio"] == $_POST["usuario"] && $response["contrasena"] == $_POST["contraseña"] ) {

					//se almacenan variables de sesion con datos del usuario
					session_start();
					$_SESSION["Ingreso"] = true;
					$_SESSION["nombre"] = $response["nombre"];
					$_SESSION["apellido"] = $response["apellido"];
					$_SESSION["id"] = $response["cod_usuario"];
					
					header("location:index.php?ruta=gestiones");

				}else{
					echo "<div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>
						<div class='alert alert-danger' role='alert'>
							<p>Credenciales incorrectas!</p>
						</div>
					 </div>";
				}
			}
		}
	}
