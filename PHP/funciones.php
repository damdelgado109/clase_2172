<?php

	function primeraFuncion(){

		echo("Me estan utilizando");        
		echo("<br>");
	}

	function segundaFuncion($varUno){

		echo("Hola:".$varUno."!!!!!!!!");        
		echo("<br>");

	}

	include("biblotecas/operacionesMatematicas.php");




	primeraFuncion();
	segundaFuncion("Damian");
	segundaFuncion("Natalia");
	segundaFuncion("Sofia");

	

	suma(5, 4);
	suma(3, 2);
	suma(4, 4);

	$varUno = 6;
	$varDos = 9;

	$resultado = suma($varUno, $varDos);
	$resultadoDos = suma("8", "8");
	$resultadoResta = resta("6","5");

	$division = dividir(5,0);

	
?>
<html>
	<head>

	</head>
	<body>
		<p>
			El resultado de la suma es: <?=$resultado?>
		 </p>
		<p>
			El resultado de la suma dos es: <?=$resultadoDos?>
		 </p>
		<p>
			El resultado de la Resta dos es: <?=$resultadoResta?>
		 </p>	
		<p>
			El resultado de la Division es: <?=$division?>
		 </p>	
	</body>
</html>






