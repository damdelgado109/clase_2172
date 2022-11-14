<?php
	$ruta = isset($_GET['r'])?$_GET['r']:"";

	print_r($_POST);

	require_once("modelos/autores.php");

	$objAutores = new autores();


	if(isset($_POST['action']) && $_POST['action'] == "ingresar"){

		$arrayDatos = $_POST;
		$objAutores->constructor($arrayDatos);
		$respuesta = $objAutores->ingresar();

		print_r($respuesta);

	}


?>




<h1>Autores</h1>



	<table class="striped">
		<thead>
			<tr>
				<th colspan = "7">
					 <!-- Modal Trigger -->
					<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Ingresar</a>
					<!-- Modal Structure -->
					<div id="modal1" class="modal">
						<div class="teal darken-4">
							<h4 class=" white-text">Ingresar Autor</h4>
						</div>
						<form action="index.php?r=<?=$ruta?>" method="POST" class="col s12">
							<div class="modal-content">
								<div class="row">
									<div class="input-field col s6">
										<input id="nombre" type="text" class="validate" name="nombre">
										<label for="nombre">Nombre</label>
									</div>
									<div class="input-field col s6">
										<input id="nacionalidad" type="text" class="validate" name="nacionalidad">
										<label for="nacionalidad">Nacionalidad</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s6">
										<input id="fechaNacimiento" type="date" class="validate" name="fechaNacimiento">
										<label for="fechaNacimiento">Fecha Nacimiento</label>
									</div>
									<div class="input-field col s6">
										<input id="fechaMuerte" type="date" class="validate" name="fechaMuerte">
										<label for="fechaMuerte">Fecha Muerte</label>
									</div>
								</div>	
							</div>
							<div class="modal-footer">
								<button class="btn waves-effect waves-light right" type="submit" name="action" value="ingresar">Guardar
									<i class="material-icons right">save</i>
								</button>
							</div>
						</form>
					</div>
				</th>
			</tr>
			<tr class="green lighten-5">
				<th>#</th>
				<th>Nombre</th>
				<th>Nacionalidad</th>
				<th>Fecha Nacimiento</th>
				<th>Fecha Muerte</th>
				<th style="width:150px">Acciones</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Alvin</td>
				<td>Eclair</td>
				<td>$0.87</td>
				<td>$0.87</td>
				<td>$0.87</td>
				<td>
					<div class="right-align">
						<a class="waves-effect waves-light btn yellow">
							<i class="material-icons left black-text">edit</i>
						</a>
						<a class="waves-effect waves-light btn red">
							<i class="material-icons left">delete</i>
						</a>
					</div>
				</td>
			</tr>
			<tr>
				<td>Alan</td>
				<td>Jellybean</td>
				<td>$3.76</td>
			</tr>
			<tr>
				<td>Jonathan</td>
				<td>Lollipop</td>
				<td>$7.00</td>
			</tr>
			<tr class="green lighten-5">
				<td class="center" colspan="7">
					<ul class="pagination">
						<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
						<li class="active"><a href="#!">1</a></li>
						<li class="waves-effect"><a href="#!">2</a></li>
						<li class="waves-effect"><a href="#!">3</a></li>
						<li class="waves-effect"><a href="#!">4</a></li>
						<li class="waves-effect"><a href="#!">5</a></li>
						<li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
					</ul>

				</td>
			</tr>
		</tbody>
	</table>