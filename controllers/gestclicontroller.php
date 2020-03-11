<?php
	
	class gestclicontroller
	{	
		//cargar lista de gestiones de clientes
		public function listgestc(){
			$response = gestcmodel::selectgestc();
			
			foreach ($response as $key => $value) {
				echo '<tr>
						<th scope="row">'.$value["cod_gestioncli"].'</th>
      					<td>'.$value["gestion"].'</td>
      					<td>'.$value["atendido"].'</td>
      					<td>'.date('d-m-Y h:i:s A', strtotime($value["creado"])).'</td>
      					<td>'.date('d-m-Y h:i:s A', strtotime($value["actualizado"])).'</td>
					  </tr>';
			}
		}
	}