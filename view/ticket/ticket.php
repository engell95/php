<!--vista para las funciones de ticket-->
<?php
	//verificacion de sessiones
	session_start();
	if (!$_SESSION["Ingreso"]) {
		header("location:index.php?ruta=login.php");
		exit();
	}
	include("view/part/nav.php");

	//enviando datos al controlador
	$post = new ticketcontroller();
	$post -> createticket();
?>

<div class="col-sm-2 col-sm-offset-3 col-md-6 col-md-offset-2 main">
    <!--formulario para crear ticket-->
	<form method="post">
		<h2 class="page-header" id="idticket">Ticket # 0</h2>
		<div class="form-group row">
			<div class="col-sm-6">
			    <label for="nombre">Nombre</label>
			    <input type="text" id="nombre" name="nombre" maxlength="50" minlength="3"s class="form-control" placeholder="jose jose" required>
			</div>
		
			<div class="col-sm-6">
			    <label for="apellido">Apellido</label>
			    <input type="text" id="apellido" name="apellido" maxlength="50" minlength="3"s class="form-control" placeholder="Rosales Mendez" required>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-6">
			    <label for="direccion">Dirección</label>
			    <input type="text" id="direccion" name="direccion" maxlength="250" minlength="8"s class="form-control" placeholder="Bo.Villa flor casa#10" required>
			 </div>

			<div class="col-sm-6">
			    <label for="telefono">Teléfono</label>
			    <input type="text" id="telefono" name="telefono" maxlength="11" minlength="8" class="form-control" placeholder="2250-5080" required>
			</div>
		</div>	 

		<div class="form-group row">
			<div class="col-sm-12">
			    <label for="gestion">Gestión real realizada</label>
			    <div id="gestion"></div>
			</div>
	    </div>

	    <div class="form-group row">
			<div class="col-sm-12">
			    <label for="problema">Problema expuesto por el cliente</label>
			    <textarea required class="form-control" id="problema" minlength="8" name="problema" rows="2"></textarea>
			</div>
		</div>	

		<div class="form-group row">
			<div class="col-sm-12">
			    <label for="solucion">Solución brindada</label>
			    <textarea required class="form-control" id="solucion" minlength="8" name="solucion" rows="2"></textarea>
			</div>
		</div>

		<button class="btn btn-lg btn-primary btn-block" type="submit">Guardar Gestión</button>
	</form>	
	
</div>        

<div class="col-6 col-md-4" style="margin-top: 20px;">
	<button type="button" class="btn btn-primary btn-sm" id="btnatender">Atender al cliente</button>
	<button type="button" class="btn btn-primary btn-sm" id="btnactualizar">Actualizar lista de tickets</button>

	<div class="table-wrapper-scroll-y my-custom-scrollbar" style="margin-top: 20px;position: relative;height: 400px;overflow: auto;" id='list'>
	</div>
</div>	

<script type="text/javascript">
	//cargando lista de gestiones y tabla
	$(document).ready(function(){
		$.ajax({
	        type:'GET',
	        url:'index.php?ruta=gestionesdia',
	        success:function(html){
	         	$('#list').html(html);
	        }
	    });
	    $.ajax({
	        type:'GET',
	        url:'index.php?ruta=gestioneslist',
	        success:function(html){
	         	$('#gestion').html(html);
	        }
	    });
	});

	//funciones
	$(function() {
		//actualizar tabla
	  $('#btnactualizar').on('click', function(e) {
	   	$.ajax({
	        type:'GET',
	        url:'index.php?ruta=gestionesdia',
	        success:function(html){
	         	$('#list').html(html);
	        }
	    });
	  });
	   //aatender cliente
	  $('#btnatender').on('click', function(e) {
	   	$.ajax({
	        type:'GET',
	        url:'index.php?ruta=addticket',
	        success:function(html){
	         	$('#idticket').html(html);
	         	$.ajax({
			        type:'GET',
			        url:'index.php?ruta=gestionesdia',
			        success:function(html){
			         	$('#list').html(html);
			        }
			    });
	        }
	    });

	  });
	});
</script>