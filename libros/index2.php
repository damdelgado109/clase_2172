
<?php

	require_once("modelos/libros.php");

	$objLibros = new libros();


	if(isset($_POST['action']) &&  isset($_POST['action']) == "ingresar"){

		$arrayLibros = $_POST;

		$objLibros->constructor($arrayLibros);

		$objLibros->ingresarLibros();

	}
	if(isset($_GET['id']) && $_GET['id'] > 0){

		$idLibro = $_GET['id'];

		$objLibros->cargarLibro($idLibro);

	}


	$listaLibros = $objLibros->listarLibros();

	print_r($listaLibros);
?>

<!DOCTYPE html>
<html>
	<head>
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>

	<body>
		 <nav>
			<div class="nav-wrapper">
				<a href="#" class="brand-logo center">Libros</a>
			</div>
		</nav>
		<div class="container">
			<h1 class="center"> Libros 2</h1>
				<div class="row">					
  					<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Ingresar</a>
					<table class="striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Titulo</th>
								<th>ISBN</th>
								<th>Precio</th>
							</tr>
						</thead>
						<tbody>
<?php
							foreach($listaLibros as $libro){
?>
								<tr>
									<td><?=$libro['id']?></td>
									<td><?=$libro['titulo']?></td>
									<td><?=$libro['ibsn']?></td>
									<td><?=$libro['precio']?></td>
									<td>
										<a href="index2.php?id=<?=$libro['id']?>">Ir</a>
									</td>
								</tr>
<?php
							}
?>


						</tbody>
					</table>
				</div>
			<!-- Modal Structure -->
			<div id="modal1" class="modal">
				<div class="modal-content">
					<h4>Ingresar Libros</h4>
					<form class="col s12" action="index2.php" method="POST" >
						<div class="row">
							<div class="input-field col s6">
								<input id="titulo" type="text" class="validate" name="titulo">
								<label for="titulo">Titulo</label>
							</div>
							<div class="input-field col s6">
								<input id="ibsn" type="text" class="validate" name="ibsn">
								<label for="ibsn">ibsn</label>
							</div>
							<div class="input-field col s6">
								<input id="precio" type="text" class="validate" name="precio">
								<label for="precio">Precio</label>
							</div>
							<div class="input-field col s6">
								<input id="prologo" type="text" class="validate" name="prologo">
								<label for="prologo">Prologo</label>
							</div>
							<div class="input-field col s6">
								<input id="editorial" type="text" class="validate" name="editorial">
								<label for="editorial">Editorial</label>
							</div>
							<div class="input-field col s6">
								<input id="anio" type="text" class="validate" name="anio">
								<label for="anio">Año</label>
							</div>
							<div class="input-field col s6">
								<input id="autor" type="text" class="validate" name="autor">
								<label for="autor">Autor</label>
							</div>
						</div>
						<div>
							<button class="btn waves-effect waves-light" type="submit" name="action" value="ingresar">Ingresar
								<i class="material-icons right">send</i>
							</button>
						</div>
					</form>
				</div>
				<div class="modal-footer">
				</div>
			</div>



		</div>
		
		<!--JavaScript at end of body for optimized loading-->
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script>
			
			document.addEventListener('DOMContentLoaded', function() {
				M.AutoInit();	
			});
		
		</script>
	</body>
  </html>
		