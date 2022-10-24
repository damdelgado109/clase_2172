<?php

	include("biblotecas/operacionesMatematicas.php");


	$calculoUno = suma(1,5);
	$calculoDos = resta(8,2);
	$calculoTres = suma(5,2);
	$calculoCuatro= dividir(15,0);

	$sumamal = suma(5, "dsadsadsa");

	$arrayNumero = array();
	$arrayNumero[] = 1;
	$arrayNumero[] = 5;
	$arrayNumero[] = 8;
	$arrayNumero[] = 3;
	$arrayNumero[] = 6;
	$arrayNumero[] = 77;


	$respuestaPromedio = promedio($arrayNumero);

?>

<html>
	<head>
	</head>
	<body>
		<div>
			<h1>Calculadora</h1>
		</div>
		<p>
			El resultado Calculo uno es: <?=$calculoUno?>
		</p>
		<p>
			El resultado Calculo dos es: <?=$calculoDos?>
		</p>
		<p>
			El resultado Calculo tres es: <?=$calculoTres?>
		</p>
		<p>
			El resultado sumamal es: <?=$sumamal?>
		</p>
		<p>
			El resultado de la suma es: <?=$calculoCuatro?>
		</p>
		<p>
			El Promedio es: <?=$respuestaPromedio?>
		</p>				
	</body>
</html>
