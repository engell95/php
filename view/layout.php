<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Test de desarrollo</title>
	    <!-- Importando estilo-->
	    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	    <link rel="stylesheet" type="text/css" href="view/css/design.css">
	    <script type="text/javascript" src="view/js/jquery.js"></script>
    </head>
	<body>
		<div class="container-fluid">
      		<div class="row">
      			<!-- resolviendo rutas -->
				<?php
					$route = new RouteController();
					$route -> Route();
				?>
			</div>
		</div>
	</body>
</html>
