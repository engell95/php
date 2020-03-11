<!--vista para ver las gestiones de los clientes-->
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
    <h1 class="page-header">Gestiones de cliente</h1>
    <!--importando datos-->
    <div class="row justify-content-center">
    	<table class="table table-striped">
  			<thead class="thead-dark">
    			<tr>
			      <th scope="col">#</th>
			      <th scope="col">Gestion</th>
			      <th scope="col">Atendida</th>
			      <th scope="col">Creada</th>
			      <th scope="col">Actualizada</th>
			    </tr>
			</thead>      
			<tbody>
				<?php
				   	$get = new gestclicontroller();
					$get -> listgestc();
				?> 
			</tbody>
		</table>		
	</div>
</div>        

    	