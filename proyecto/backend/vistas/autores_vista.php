<?php
	$ruta 	= isset($_GET['r'])?$_GET['r']:"";
	$accion = isset($_GET['a'])?$_GET['a']:"";
	$idAutor = isset($_GET['id'])?$_GET['id']:"";
	
	//print_r("<h1>".$accion."::".$idAutor."</h1>");

	require_once("modelos/autores.php");

	$objAutores = new autores();


	if(isset($_POST['action']) && $_POST['action'] == "ingresar"){

		$arrayDatos = $_POST;
		$objAutores->constructor($arrayDatos);
		$respuesta = $objAutores->ingresar();

		print_r($respuesta);
	}

	if(isset($_POST['action']) && $_POST['action'] == "editar"){

		$arrayDatos = $_POST;
		$objAutores->constructor($arrayDatos);
		$respuesta = $objAutores->editar();

		print_r($respuesta);
	}

	if(isset($_POST['action']) && $_POST['action'] == "borrar"){

		$arrayDatos = $_POST;
		$objAutores->constructor($arrayDatos);
		$respuesta = $objAutores->borrar();

		print_r($respuesta);
	}

	if($accion == "editar" && $idAutor != ""){

		$objAutores->cargar($idAutor);

	}
	if($accion == "borrar" && $idAutor != ""){

		$objAutores->cargar($idAutor);

	}

	// Este array guarda la informacion para los filtros de la lista
	$arrayFiltros = array( "totalRegistro"=>5, "pagina"=>2);

	$listaAutores = $objAutores->listar($arrayFiltros);


?>




	<h1>Autores</h1>

<?php
	if($accion == "editar" && $idAutor != ""){
?>
	<div class="card">		
		<div class="card-content">
			<form action="index.php?r=<?=$ruta?>" method="POST" class="col s12">
				<div class="row">
					<h3>Editar Autor </h3>
				</div>
				<div class="row">
					<div class="input-field col s6">
						<input id="nombre" type="text" class="validate" name="nombre" value="<?=$objAutores->traerNombre()?>">
						<label for="nombre">Nombre</label>
					</div>
					<div class="input-field col s6">
						<input id="nacionalidad" type="text" class="validate" name="nacionalidad" value="<?=$objAutores->traerNacionalidad()?>">
						<label for="nacionalidad">Nacionalidad</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						<input id="fechaNacimiento" type="date" class="validate" name="fechaNacimiento" value="<?=$objAutores->traerfechaNacimiento()?>">
						<label for="fechaNacimiento">Fecha Nacimiento</label>
					</div>
					<div class="input-field col s6">
						<input id="fechaMuerte" type="date" class="validate" name="fechaMuerte" value="<?=$objAutores->traerFechaMuerte()?>">
						<label for="fechaMuerte">Fecha Muerte</label>
					</div>
				</div>
				<div class="row">
					<input type="hidden" name="id" value="<?=$objAutores->traerId()?>">
					<button class="btn waves-effect waves-light right" type="submit" name="action" value="editar">Guardar
						<i class="material-icons right">save</i>
					</button>
				</div>
			</form>
		</div>
	</div>
<?php
	}
?>
<?php
	if($accion == "borrar" && $idAutor != ""){
?>
	<div class="card">		
		<div class="card-content">
			<form action="index.php?r=<?=$ruta?>" method="POST" class="col s12">
				<div class="row">
					<h3>Borrar Autor </h3>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<h3>Estas seguro que quiere borrar al autor <?=$objAutores->traerNombre()?> </h3>
					</div>					
				</div>			
				<div class="row">
					<input type="hidden" name="id" value="<?=$objAutores->traerId()?>">
					<div class="input-field col s2">
						<button class="btn yellow waves-effect waves-light" type="submit" name="action" value="cancelar">Cancelar
							<i class="material-icons right">cancel</i>
						</button>
					</div>
					<div class="input-field col s2">
						<button class="btn red waves-effect waves-light" type="submit" name="action" value="borrar">Borrar
							<i class="material-icons right">delete</i>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
	}
?>

<?php
	if(isset($respuesta) && $respuesta['codigo'] == "Error"  ){
?>
		<div class="red center-align" style="height:40px">
			<h4>Error realizar la operacion</h4>
		</div>
<?php
	}elseif(isset($respuesta) && $respuesta['codigo'] == "Ok"){	
?>
		<div class="green center-align" style="height:40px">
			<h4>Se realizo la operacion correctamente</h4>
		</div>
<?php 
	}
?>
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
<?php
			foreach($listaAutores as $autor){
?>
				<tr>
					<td><?=$autor['id']?></td>
					<td><?=$autor['nombre']?></td>
					<td><?=$autor['nacionalidad']?></td>
					<td><?=$autor['fechaNacimiento']?></td>
					<td><?=$autor['fechaMuerte']?></td>
					<td>
						<div class="right-align">
							<a href="index.php?r=<?=$ruta?>&a=editar&id=<?=$autor['id']?>"  class="waves-effect waves-light btn yellow">
								<i class="material-icons left black-text">edit</i>
							</a>
							<a href="index.php?r=<?=$ruta?>&a=borrar&id=<?=$autor['id']?>" class="waves-effect waves-light btn red">
								<i class="material-icons left">delete</i>
							</a>
						</div>
					</td>
				</tr>


<?php
			}
?>
		</tbody>
	</table>