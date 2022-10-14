<?php

	echo("<h1>Operadores Comparacion</h1>");

	$varUno = 10;
	$varDos = 5;
	$varTres = 10;
	$varCuatro = "Algo";
	$varCinco = "10"; 
	$varSeis = True; 
	$varSiete = 7;
	$varOcho = "Manzana";



	echo("Comparamos:");
	$resultado = ($varUno == $varDos) || $varCinco == $varTres;
	var_dump($resultado);
	echo("<br>");

	echo("Comparamos:");
	$resultado = $varUno+$varDos >= $varTres && $varDos < $varTres;
	var_dump($resultado);
	echo("<br>");




?>