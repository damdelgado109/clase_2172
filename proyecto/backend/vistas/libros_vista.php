<?php
	
	$ruta 		= isset($_GET['r'])?$_GET['r']:"";
	$accion 	= isset($_GET['a'])?$_GET['a']:"";
	$idLibro 	= isset($_GET['id'])?$_GET['id']:"";
	$pagina 	= isset($_GET['pagina'])?$_GET['pagina']:"1";
	$busqueda 	= isset($_GET['busqueda'])?$_GET['busqueda']:"";

	//print_r("<h1>".$accion."::".$idGenero."</h1>");

	require_once("modelos/libros.php");
	require_once("modelos/autores.php");
	include("configuracion/configuracion.php");
	$objLibro = new libros();
	$objAutores = new autores();



	if(isset($_POST['action']) && $_POST['action'] == "ingresar"){

		print_r($_FILES);
	
		$imagen = $objLibro->subirImagen($_FILES['imagen'], 600, 600);
		if($imagen){

			$arrayDatos = $_POST;
			$arrayDatos['imagen'] = $imagen;
			$objLibro->constructor($arrayDatos);
			$respuesta = $objLibro->ingresar();

		}else{
			$respuesta['codigo'] = "Error";
		}


		print_r($respuesta);
	}

	if(isset($_POST['action']) && $_POST['action'] == "editar"){

		$arrayDatos = $_POST;
		$objLibro->constructor($arrayDatos);
		$respuesta = $objLibro->editar();

		print_r($respuesta);
	}

	if(isset($_POST['action']) && $_POST['action'] == "borrar"){

		$arrayDatos = $_POST;
		$objLibro->constructor($arrayDatos);
		$respuesta = $objLibro->borrar();

		print_r($respuesta);
	}

	if($accion == "editar" && $idLibro != ""){

		$objLibro->cargar($idLibro);

	}
	if($accion == "borrar" && $idLibro != ""){

		$objLibro->cargar($idLibro);

	}


	// Array Filtros marco el total de registros por pagina
	$arrayFiltros 	= array("totalRegistro"=>3, "busqueda" => $busqueda);
	// Obtuve el total de registros que hay en base
	$totalRegistros = $objLibro->totalRegistros($arrayFiltros);
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


	$listaLibros   = $objLibro->listar($arrayFiltros);
	$listaAutoresSelect = $objAutores->listarSelect();
	
	

?>




	<h1>Libros</h1>

<?php
	if($accion == "editar" && $idLibro != ""){
?>
	<div class="card">		
		<div class="card-content">
			<form action="index.php?r=<?=$ruta?>" method="POST" class="col s12">
				<div class="row">
					<h3>Editar Libro</h3>
				</div>
				<div class="row">
					<div class="input-field col s10">
						<input id="nombre" type="text" class="validate" name="nombre" value="<?=$objLibro->traerTitulo()?>">
						<label for="nombre">Nombre</label>
					</div>
				</div>
				<div class="row">					
					<div class="input-field col s10">
						<input id="descripcion" type="text" class="validate" name="descripcion" value="<?=$objLibro->traerDescripcion()?>">
						<label for="descripcion">Descripcion</label>
					</div>
				</div>
				<div class="row">
					<input type="hidden" name="id" value="<?=$objLibro->traerId()?>">
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
	if($accion == "borrar" && $idLibro != ""){
?>
	<div class="card">		
		<div class="card-content">
			<form action="index.php?r=<?=$ruta?>" method="POST" class="col s12">
				<div class="row">
					<h3>Borrar Libro </h3>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<h3>Estas seguro que quiere borrar el libro <?=$objLibro->traerTitulo()?> </h3>
					</div>					
				</div>			
				<div class="row">
					<input type="hidden" name="id" value="<?=$objLibro->traerId()?>">
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
							<h4 class=" white-text">Ingresar Libro</h4>
						</div>
						<form action="index.php?r=<?=$ruta?>" enctype="multipart/form-data" method="POST" class="col s12">
							<div class="modal-content">
								<div class="row">
									<div class="input-field col s6">
										<input id="titulo" type="text" class="validate" name="titulo">
										<label for="titulo">Titulo</label>
									</div>
									<div class="input-field col s6">
										<input id="ibsn" type="text" class="validate" name="ibsn">
										<label for="ibsn">ibsn</label>
									</div>
								</div>
								<div class="row">
                                    <div class="input-field col s6">
										<input id="precio" type="text" class="validate" name="precio">
										<label for="precio">Precio</label>
									</div>
									<div class="input-field col s6">
										<input id="editorial" type="text" class="validate" name="editorial">
										<label for="editorial">editorial</label>
									</div>
								</div>	
								<div class="row">
                                    <div class="input-field col s12">
										<input id="prologo" type="text" class="validate" name="prologo">
										<label for="prologo">prologo</label>
									</div>
								</div>	
								<div class="row">
                                    <div class="file-field input-field col s12">
										<div class="btn">
											<span>File</span>
											<input type="file" name="imagen">
										</div>
										<div class="file-path-wrapper">
											<input class="file-path validate" type="text" >
										</div>
									</div>
								</div>	
								<div class="row">
                                    <div class="input-field col s6">
										<input id="anio" type="text" class="validate" name="anio">
										<label for="anio">Año</label>
									</div>


									<div class="input-field col s6">
										 <select name="id_autor">
											<option value="" disabled selected>Autores</option>
<?php
				foreach($listaAutoresSelect as $autores ){
?>
											<option value="<?=$autores['id']?>">  <?=$autores['nombre']?> </option>
<?php
				}
?>

								
										</select>
										<label>Autor</label>
									</div>
<!--							
									<div class="input-field col s6">
										<input type="text" id="autocomplete-input" class="autocomplete">
										<label for="autocomplete-input">Autocomplete</label>
									</div>
-->	

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
				<th>Titulo</th>
				<th>ibsn</th>
                <th>precio</th>
                <th>editorial</th>    
				<th>imagen</th>  
				<th style="width:150px">Acciones</th>
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
                    <td><?=$libro['editorial']?></td>
					<td>
						<img src="<?=$RUTAIMG?><?=$libro['imagen']?>" width="100px">
					</td>
					<td>
						<div class="right-align">
							<a href="index.php?r=<?=$ruta?>&a=editar&id=<?=$libro['id']?>"  class="waves-effect waves-light btn yellow">
								<i class="material-icons left black-text">edit</i>
							</a>
							<a href="index.php?r=<?=$ruta?>&a=borrar&id=<?=$libro['id']?>" class="waves-effect waves-light btn red">
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


<script>

	

	

</script>