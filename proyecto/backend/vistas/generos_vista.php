<?php

	@session_start();	

	$ruta 		= isset($_GET['r'])?$_GET['r']:"";
	$accion 	= isset($_GET['a'])?$_GET['a']:"";
	$idGenero 	= isset($_GET['id'])?$_GET['id']:"";
	$pagina 	= isset($_GET['pagina'])?$_GET['pagina']:"1";
	$busqueda 	= isset($_GET['busqueda'])?$_GET['busqueda']:"";
	$llaveValor	= isset($_POST['llave'])?$_POST['llave']:"";
	
	

	require_once("modelos/genero.php");


	//print_r("<h1>".$accion."::".$idGenero."</h1>");

	

	$objGenero = new genero();


	if(isset($_POST['action']) && $_POST['action'] == "ingresar"){

		if($llaveValor == $_SESSION['llave']){			
			$arrayDatos = $_POST;
			$objGenero->constructor($arrayDatos);
			$respuesta = $objGenero->ingresar();

		}else{
			$respuesta['codigo'] = "Error";
		}

	}

	if(isset($_POST['action']) && $_POST['action'] == "editar"){

		$arrayDatos = $_POST;
		$objGenero->constructor($arrayDatos);
		$respuesta = $objGenero->editar();
		print_r($respuesta);

	}

	if(isset($_POST['action']) && $_POST['action'] == "borrar"){

		$arrayDatos = $_POST;
		$objGenero->constructor($arrayDatos);
		$respuesta = $objGenero->borrar();

		print_r($respuesta);
	}

	if($accion == "editar" && $idGenero != ""){

		$objGenero->cargar($idGenero);

	}
	if($accion == "borrar" && $idGenero != ""){

		$objGenero->cargar($idGenero);

	}


	// Array Filtros marco el total de registros por pagina
	$arrayFiltros 	= array("totalRegistro"=>20, "busqueda" => $busqueda);
	// Obtuve el total de registros que hay en base
	$totalRegistros = $objGenero->totalRegistros($arrayFiltros);
	/*
	 Calcule la pagina haciendo el total de registros dividio la cantidad de registro
	que voy a mostrar en la lista y redondeo el resultado para arriba
	*/
	$totalPaginas   = ceil($totalRegistros / $arrayFiltros['totalRegistro']);

	if($pagina > $totalPaginas ){
		$pagina = $totalPaginas;
	}
	if($pagina < 1){
		$pagina = 1;
	}
	$arrayFiltros['pagina'] = $pagina ;
	// Este array guarda la informacion para los filtros de la lista
	
	print_r("<br>Total de pagina es:".$totalPaginas);

	$paginaSiguiente = $pagina + 1;

	if($paginaSiguiente > $totalPaginas ){
		$paginaSiguiente = $totalPaginas;
	}
	$paginaAnterior = $pagina - 1;
	if($paginaAnterior < 1){
		$paginaAnterior = 1;
	}


	$listaGenero   = $objGenero->listar($arrayFiltros);


	
	$llave = date("Ymdhis");
	$_SESSION['llave'] = $llave;	
	

?>




	<h1>Genero</h1>

<?php
	if($accion == "editar" && $idGenero != ""){
?>
	<div class="card">		
		<div class="card-content">
			<form action="index.php?r=<?=$ruta?>" method="POST" class="col s12">
				<div class="row">
					<h3>Editar Generos</h3>
				</div>
				<div class="row">
					<div class="input-field col s10">
						<input id="nombre" type="text" class="validate" name="nombre" value="<?=$objGenero->traerNombre()?>">
						<label for="nombre">Nombre</label>
					</div>
				</div>
				<div class="row">					
					<div class="input-field col s10">
						<input id="descripcion" type="text" class="validate" name="descripcion" value="<?=$objGenero->traerDescripcion()?>">
						<label for="descripcion">Descripcion</label>
					</div>
				</div>
				<div class="row">
					<input type="hidden" name="id" value="<?=$objGenero->traerId()?>">
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
	if($accion == "borrar" && $idGenero != ""){
?>
	<div class="card">		
		<div class="card-content">
			<form action="index.php?r=<?=$ruta?>" method="POST" class="col s12">
				<div class="row">
					<h3>Borrar Genero </h3>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<h3>Estas seguro que quiere borrar al Genero <?=$objGenero->traerNombre()?> </h3>
					</div>					
				</div>			
				<div class="row">
					<input type="hidden" name="id" value="<?=$objGenero->traerId()?>">
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
				<th class='green lighten-5' colspan = "7">
					 <!-- Modal Trigger -->
					<div class="row">
						<div class="col s6 valign-wrapper" style="height:60px">
							<a class="valign-wrapper waves-effect waves-light btn modal-trigger" href="#modal1">Ingresar</a>
						</div>
						<div class="col s6 ">
							<form action="index.php" method="GET">
								<div class="input-field">
									<input type="hidden" name="r" value="<?=$ruta?>">
									<input id="search" type="search" name="busqueda" required>
									<label class="label-icon" for="search">
										<i class="material-icons">search</i>
									</label>
									<i class="material-icons">close</i>
								</div>
							</form>
						</div>
					</div>
					<!-- Modal Structure -->
					<div id="modal1" class="modal">
						<div class="teal darken-4">
							<h4 class=" white-text">Ingresar Genero</h4>
						</div>
						<form action="index.php?r=<?=$ruta?>" method="POST" class="col s12">
							<div class="modal-content">
								<div class="row">
									<div class="input-field col s10">
										<input id="nombre" type="text" class="validate" name="nombre" value="">
										<label for="nombre">Nombre</label>
									</div>
								
								</div>
								<div class="row">
                                    <div class="input-field col s10">
										<input id="descripcion" type="text" class="validate" name="descripcion">
										<label for="descripcion">Descripcion</label>
									</div>
								</div>	
							</div>
							<div class="modal-footer">
								<input type="hidden" name="llave" value="<?=$llave?>">
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
				<th>Descripcion</th>
				<th style="width:150px">Acciones</th>
			</tr>
		</thead>
		<tbody>
<?php
			foreach($listaGenero as $genero){
?>
				<tr>
					<td><?=$genero['id']?></td>
					<td><?=$genero['nombre']?></td>
					<td><?=$genero['descripcion']?></td>
					<td>
						<div class="right-align">
							<a href="index.php?r=<?=$ruta?>&a=editar&id=<?=$genero['id']?>"  class="waves-effect waves-light btn yellow">
								<i class="material-icons left black-text">edit</i>
							</a>
							<a href="index.php?r=<?=$ruta?>&a=borrar&id=<?=$genero['id']?>" class="waves-effect waves-light btn red">
								<i class="material-icons left">delete</i>
							</a>
						</div>
					</td>
				</tr>


<?php
			}
?>
			<tr>
				<td class="green lighten-5 center-align" colspan="7"> 
					<ul class="pagination">
						<li class="waves-effect">
							<a href="index.php?r=<?=$ruta?>&pagina=<?=$paginaAnterior?>&busqueda=<?=$busqueda?>"><i class="material-icons">chevron_left</i></a>
						</li>
<?php
						for($i = 1; $i <= $totalPaginas; $i++ ){
							//waves-effect o active
							if($pagina == $i){
								$marca = "active";
							}else{
								$marca = "waves-effect";
							}	
?>
						<li class="<?=$marca?>">
							<a href="index.php?r=<?=$ruta?>&pagina=<?=$i?>&busqueda=<?=$busqueda?>"><?=$i?></a>
						</li>
<?php

						}
?>				
						<li class="waves-effect">
							<a href="index.php?r=<?=$ruta?>&pagina=<?=$paginaSiguiente?>&busqueda=<?=$busqueda?>">	<i class="material-icons">chevron_right</i></a>
						</li>
					</ul>
				<td>
			</tr>
		</tbody>
	</table>