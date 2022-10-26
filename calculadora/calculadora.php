<!-- 

calculadora.php?numeroA=456&operacion=suma&numeroB=21&action=
/calculadora.php?numeroA=695&operacion=divi&numeroB=45

-->
<?php
	include("librerias/operacionesMatematicas.php");
	// $_GET
	// $_POST
	@session_start();

	if(isset($_POST['limpiar']) && $_POST['limpiar'] == "ok"){	
		session_destroy();
		@session_start();
	}
	//var_dump($_SESSION);

	//print_r($_POST);
	$varPrueba = 52;

	$operacion = "";
	if(isset($_POST['numeroA'])){
		$varNumA = $_POST['numeroA'];
	}
	if(isset($_POST['numeroB'])){
		$varNumB = $_POST['numeroB'];
	}
	if(isset($_POST['operacion'])){
		$operacion = $_POST['operacion'];
	}

	$totalArray = "a".count($_SESSION);
	$numero = (string)$totalArray;
	var_dump($numero);
	switch($operacion){
		case "suma":
			$resultado = suma($varNumA, $varNumB);
			$textMostrar = ''.$varNumA.' + '.$varNumB.' = '.$resultado;
			$_SESSION[$numero] = $textMostrar;
			break;
		case "rest":
			$resultado = resta($varNumA, $varNumB);
			$textMostrar = ''.$varNumA.' - '.$varNumB.' = '.$resultado;
			$_SESSION[$numero] = $textMostrar;
			break;
		case "mult":
			$resultado = multiplicar($varNumA, $varNumB);
			$textMostrar = ''.$varNumA.' * '.$varNumB.' = '.$resultado;
			$_SESSION[$numero] = $textMostrar;
			break;
		case "divi":
			$resultado = dividir($varNumA, $varNumB);
			$textMostrar = ''.$varNumA.' / '.$varNumB.' = '.$resultado;
			$_SESSION[$numero] = $textMostrar;
			break;
		default:
			$textMostrar = "No selecciono una opcion valida";
			break;
	}

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
				<a href="#" class="brand-logo center">Calculadora</a>
			</div>
		</nav>
		<div class="container">
			<h1 class="center"> Calculadora</h1>
			<form class="col s12" action="calculadora.php" method="POST" >
				<div class="row">
					<div class="input-field col s4">
						<input placeholder="Numero A" id="numeroA" type="text" name="numeroA" class="validate">
						<label for="numeroA">Numero A</label>
					</div>	
					<div class="input-field col s2">
						<select name="operacion">
							<option value="" disabled selected>Elija la operacion</option>
							<option value="suma">Sumar</option>
							<option value="rest">Restar</option>
							<option value="divi">Dividir</option>
							<option value="mult">Multiplicar</option>
						</select>
						<label>Operaciones</label>
					</div>	
					<div class="input-field col s4">
						<input placeholder="Numero B" id="numeroB" type="text" name="numeroB" class="validate">
						<label for="numeroB">Numero B</label>
					</div>	
					<div class="input-field col s1">
						<button class="btn waves-effect waves-light" type="submit">Calcular
							<i class="material-icons right">send</i>
						</button>
						<button class="btn waves-effect waves-light red" type="submit"  name="limpiar" value="ok">Limpiar
							<i class="material-icons right">trash</i>
						</button>
					</div>	
					<div class="input-field col s12">	
						<h2><?=$textMostrar?></h2>
						<hr>
<?php
						foreach ($_SESSION as $calculosAnteriores){
?>
							<h4><?=$calculosAnteriores?></h4>
<?php
						}
?>
					</div>	
				</div>
			</form>


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
		