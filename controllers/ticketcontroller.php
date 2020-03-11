<?php

class ticketcontroller
{	
	//cargar lista de gestiones del dia 
	public function listgetnow(){
		$response = ticketmodel::gestnow();
		if($response > 0){
			echo "<table class='table' >
		  			<thead>
					    <tr>
					      <th scope='col'>No.Ticket</th>
					      <th scope='col'>Gestión Solicitada</th>
					    </tr>
		  			</thead>
		  				<tbody >";
		    foreach ($response as $key => $value) {
		    	echo '<tr><th>'.$value["cod_gestioncli"].'</th><td>'.$value["gestion"].'</td></tr>';	
			}
			echo "</tbody></table>";
		}else{
		    echo '<td>sin datos<td>';
		}
	}

	//cargar lista de tipo de gestiones 
	public function listgetcombo(){
		$response = ticketmodel::gesttipnow();
		if($response > 0){
			echo '<select class="form-control form-control-lg" id="gestion" name="gestion" required>';
		    foreach ($response as $key => $value) {	
		    	echo '<option value='.$value["cod_gestion"].'>'.$value["gestion"].'</option>';
			}
			echo '</select>';
		}else{
		    echo "<option>Sin datos</option>";
		}
	}

	//cargar lista de tipo de gestiones 
	public function addclient(){
		$response = ticketmodel::addclientd();
		if($response > 0){
			echo 'Ticket # '.$response["cod_gestioncli"].' '.$response["gestion"];
			echo '<input type="hidden" id="cod_ticket" name="cod_ticket" value='.$response["cod_gestioncli"].'>';
		}else{
		    echo "Error en asignación de ticket";
		}
	}

	//capturar tipos de gestiones
	public function createticket(){
		
		if (isset(($_POST["nombre"])) and isset(($_POST["cod_ticket"])) and isset(($_POST["apellido"])) and isset(($_POST["direccion"])) and isset(($_POST["problema"])) and isset(($_POST["solucion"])) and isset(($_POST["telefono"])) and isset(($_POST["gestion"]))) {
			
			$datosC   = array("nombre"=>$_POST["nombre"],"apellido"=>$_POST["apellido"],"direccion"=>$_POST["direccion"],"telefono"=>$_POST["telefono"],"problema"=>$_POST["problema"],"solucion"=>$_POST["solucion"],"gestion"=>$_POST["gestion"],"cod_ticket"=>$_POST["cod_ticket"]);
			$tabledb  = "ticket";
			$response = ticketmodel::inseticket($datosC, $tabledb);	
				
			if ($response == "success") {
				echo "<div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>
						<div class='alert alert-success' role='alert'>
							<p>Ticket credo satisfactoriamente!</p>
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
}	