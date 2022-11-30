<?php

	@session_start();

	if(!isset($_SESSION['nombre'])){

		header('Location: login.php');

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
		<style>
			.container {
				margin-left: 310px;
				margin-right: 10px;
				width: 96%;				
				max-width: 80%;
			}
			@media only screen and (max-width: 993px) {
				.container {
					margin-left: 10px;
					margin-right: 10px;
					width: 96%;	
					max-width: 100%;
				}
			}
			@media only screen and (min-width: 994px) {
				.container {
					margin-right: 10px;
					width: 96%;			
					max-width: 70%;
				}
			}
			@media only screen and (min-width: 1200px) {
				.container {
					margin-right: 10px;
					width: 96%;			
					max-width: 76%;
				}
			}
			.pagination li.active a {
				color: #e8f5e9  ;
			}
			.pagination li.active {
				background-color: #388e3c;
			}
		</style>
	</head>

	<body>
		<nav>
			<div class="nav-wrapper teal darken-4">
				<a href="#!" class="brand-logo center ">
					<i class="material-icons">cloud</i>
					<span class="yellow-text text-darken-2">M</span>i<span class="red-text text-darken-2">P</span>anel
				</a>
				<ul class="right hide-on-med-and-down">
					<li>
						<a class='dropdown-trigger btn' href='#' data-target='dropdown1'>
							<i class="material-icons">person</i>
						</a>
					</li>
				</ul>
				<ul id='dropdown1' class='dropdown-content'>
					<li>
						<a href="#!">Perfil</a>
					</li>
					<li>
						<a class="modal-trigger" href="#modalSalir">Salir</a>
					</li>
					<li class="divider" tabindex="-1"></li>
					<li>
						<a href="#!">Cancelar</a>
					</li>
				</ul>
			</div>
		</nav>
		

  <!-- Modal Structure -->
		<div id="modalSalir" class="modal">
			<div class="modal-content">
				<h4>Estas seguro de salir?</h4>
				</div>
				<div class="modal-footer">
				<a href="logout.php" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
				<a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
			</div>
		</div>

		<ul id="slide-out" class="sidenav sidenav-fixed">
			<li>
				<div class="user-view">
					<div class="background">
						<img src="web/img/tablas_verdes.jpg" style="width:300px">
					</div>
					<a href="#user"><img class="circle" src="images/yuna.jpg"></a>
					<a href="#name"><span class="white-text name">John Doe</span></a>
					<a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
				</div>
			</li>
			<li>
				<a href="index.php?r=autores">
					<i class="material-icons green-text text-darken-4">person</i>Autores
				</a>
			</li>
			<li>
				<a href="index.php?r=generos">
					<i class="material-icons green-text text-darken-4">share</i>Generos
				</a>
			</li>
			<li>
				<a href="index.php?r=libros">
					<i class="material-icons green-text text-darken-4">book</i>Libros
				</a>
			</li>
			<li>
				<a href="index.php?r=clientes">
					<i class="material-icons green-text text-darken-4">contacts</i>Clientes
				</a>
			</li>
			<li>
				<a href="index.php?r=facturas">
					<i class="material-icons green-text text-darken-4">credit_card</i>Facturas
				</a>
			</li>
		</ul>
	
		<div class="container">
<?php
			include("rutas.php");
?>

		</div>

		<div class="container">
			<div class="row">
				<div class="col s12">
					<div class="row">
						
					</div>
				</div>
			</div>
       	</div>
		<!--JavaScript at end of body for optimized loading-->
		<script type="text/javascript" src="web/js/materialize.min.js"></script>

		<script>			
			document.addEventListener('DOMContentLoaded', function() {
				M.AutoInit();        
				var elems = document.querySelectorAll('.dropdown-trigger');
				var instances = M.Dropdown.init(elems);

			});




/*
			document.addEventListener('DOMContentLoaded', function() {
				var elems = document.querySelectorAll('#autocomplete-input');
				var autoCompletado = M.Autocomplete.init(elems);
						
				autoCompletado.updateData({
					"Apple": null,
					"Microsoft": null,
					"Google": 'https://placehold.it/250x250'
				});

			});
*/
		</script>

		<div class="input-field col s12">
			<i class="material-icons prefix">textsms</i>
			<input type="text" id="autocomplete-input" class="autocomplete">
			<label for="autocomplete-input">Autocomplete</label>
		</div>

		<script src="https://code.jquery.com/jquery-3.6.0.js"></script>	
		<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
		<script>
			$(document).ready(function(){
				console.log("Test");
				$( function() {
					$( "#autocomplete-input" ).autocomplete({
						source: [ "c++", "java", "php", "coldfusion", "javascript", "asp", "ruby", "python", "postgres" ],
						messages: {
							noResults: '',
							results: function() {}
						}
					});

				});
			});
		</script>



	</body>
  </html>
		