<?php
	
	class gestcontroller
	{	
		//cargar lista de gestiones
		public function listget(){
			$response = gestmodel::selectgest();
			
			foreach ($response as $key => $value) {
				echo '<div class="col-xs-5" style="margin:10px">
						<a class="btn btn-primary btn-lg btn-block" href="index.php?ruta=gest&id='.$value["cod_gestion"].'" role="button" type=button>
							'.$value["gestion"].'
						</a>
					 </div>';
			}
		}

		//capturar tipos de gestiones
		public function creategest(){
			if (isset(($_POST["gestion"])) and isset(($_POST["cod_usuario"]))) {
				if (isset(($_POST["tecnica"]))) {
					$active = 1;
				}
				else{
					$active = 0;
				}
				$datosC   = array("gestion"=>$_POST["gestion"],"cod_usuario"=>$_POST["cod_usuario"],"vis_tecnica"=>$active);
				$tabledb  = "gestion";
				$response = gestmodel::insergest($datosC, $tabledb);	
				
				if ($response == "success") {
					echo "<div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>
							<div class='alert alert-success' role='alert'>
								<p>Gestion creada satisfactoriamente!</p>
						 	</div>
						</div>";
				}
				else{
					echo "<div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>
							<div class='alert alert-danger' role='alert'>
								<p>Error al crear gestion!</p>
						 	</div>
						</div>";
				}
			}
		}

		//insertar gestion de cliente (no atendido)
		public function actgestion(){
			if (isset(($_GET["id"]))) {
				$datosC = $_GET["id"];
				$tabledb  = "gestion_cliente";
				$response = gestmodel::insergestcli($datosC, $tabledb);
			}

			if ($response == "success") {
				echo "<div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>
						<div class='alert alert-success' role='alert'>
							<p>Gestion creada satisfactoriamente!</p>
						</div>
					 </div>";
			}
			else{
				echo "<div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>
						<div class='alert alert-danger' role='alert'>
							<p>Error al crear gestion!</p>
						</div>
					 </div>";
			}

			header("location:index.php?ruta=gestiones");

		}
	}
