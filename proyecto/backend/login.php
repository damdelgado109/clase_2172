<?php

	require_once("modelos/administradores.php");

	$nombre = isset($_POST['nombre'])?$_POST['nombre']:"";
	$clave = isset($_POST['clave'])?$_POST['clave']:"";

	if($nombre != "" && $clave != "" && isset($_POST['action']) && $_POST['action'] == "login"){

		$objAdministradores = new administradores();
		$respuesta = $objAdministradores->login($nombre, $clave);

		if($respuesta == "OK"){
			header('Location: index.php');
		}

	}

?>


<!DOCTYPE html>
  <html>
	<head>
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="web/css/materialize.min.css"  media="screen,projection"/>

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>	
	</head>

	<body>
		<nav>
			<div class="nav-wrapper teal darken-4">
				<a href="#!" class="brand-logo center ">
					<i class="material-icons">cloud</i>
					<span class="yellow-text text-darken-2">M</span>i<span class="red-text text-darken-2">P</span>anel
				</a>
			</div>
		</nav>
	
		<div class="container">
			<div class="row">

			<div class="col s10 m6 offset-s1 offset-m3">
				<form action="login.php" method="POST" class="col s12">
					<div class="row">
						<h3>Login ...</h3>
					</div>
<?php
		if(isset($respuesta) && $respuesta == "Error"){
?>
					<div class="row">
						<div class="input-field col s12 red">
							<h3>Error en el usuario y la clave</h3>
						</div>
					</div>
<?php
		}
?>
					<div class="row">
						<div class="input-field col s12">
							<input id="nombre" type="text" class="validate" name="nombre" >
							<label for="nombre">Nombre</label>
						</div>
					</div>
					<div class="row">					
						<div class="input-field col s12">
							<input id="clave" type="password" class="validate" name="clave">
							<label for="clave">Clave</label>
						</div>
					</div>
					<div class="row">					
						<button class="btn waves-effect waves-light right" type="submit" name="action" value="login">Ingresar
							<i class="material-icons right">send</i>
						</button>
					</div>
				</form>
			</div>

			</div>
		</div>

		<!--JavaScript at end of body for optimized loading-->
		<script type="text/javascript" src="web/js/materialize.min.js"></script>
		<script>			
			document.addEventListener('DOMContentLoaded', function() {
				M.AutoInit();        
				var elems = document.querySelectorAll('.dropdown-trigger');
				var instances = M.Dropdown.init(elems, options);
			});
		</script>
	</body>
  </html>
		