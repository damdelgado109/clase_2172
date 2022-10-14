<?php

	echo("<h1>Operadores Comparacion</h1>");

	$varUno = 10;
	$varDos = 5;
	$varTres = 10;
	$varCuatro = "Algo";
	$varCinco = "10"; 

	echo("varUno:".$varUno."<br>");
	echo("varDos:".$varDos."<br>");
	echo("varTres:".$varTres."<br>");
	echo("varCuatro:".$varCuatro."<br>");
	echo("varCinco:".$varCinco."<br>");
	
	echo("Comparamos varUno == varDos: ");
	$resultado = $varUno == $varDos;
	var_dump($resultado);
	echo("<br>");
	echo("Comparamos varUno == varTres: ");
	$resultado = $varUno == $varTres;
	var_dump($resultado);
	echo("<br>");
	echo("Comparamos varUno == varCuatro: ");
	$resultado = $varUno == $varCuatro;
	var_dump($resultado);
	echo("<br>");

	echo("Comparamos varUno (Int) == varCinco (String) : ");
	var_dump($varUno);
	var_dump($varCinco);
	$resultado = $varUno == $varCinco;
	var_dump($resultado);
	echo("<br>");

	echo("Comparamos varUno (Int) === varCinco (String) : ");
	$resultado = $varUno === $varCinco;
	var_dump($resultado);
	echo("<br>");

	echo("Comparamos varUno != varDos: ");
	$resultado = $varUno != $varDos;
	var_dump($resultado);
	echo("<br>");

	echo("Comparamos varUno != varCinco: ");
	$resultado = $varUno != $varCinco;
	var_dump($resultado);
	echo("<br>");

	echo("Comparamos varUno !== varCinco: ");
	$resultado = $varUno !== $varCinco;
	var_dump($resultado);
	echo("<br>");

	echo("Comparamos varUno > varDos: ");
	$resultado = $varUno > $varDos;
	var_dump($resultado);
	echo("<br>");

	echo("Comparamos varDos > varUno: ");
	$resultado = $varDos > $varUno;
	var_dump($resultado);
	echo("<br>");

	echo("Comparamos varUno > varTres: ");
	$resultado = $varUno > $varTres;
	var_dump($resultado);
	echo("<br>");

	echo("Comparamos varUno >= varTres: ");
	$resultado = $varUno >= $varTres;
	var_dump($resultado);
	echo("<br>");

	echo("Comparamos varUno < varTres: ");
	$resultado = $varUno < $varTres;
	var_dump($resultado);
	echo("<br>");

	echo("Comparamos varUno <= varTres: ");
	$resultado = $varUno <= $varTres;
	var_dump($resultado);
	echo("<br>");

	echo("Comparamos varCuatro == 'Algo': ");
	$resultado = $varCuatro == 'Algo';
	var_dump($resultado);
	echo("<br>");

	echo("Comparamos varCuatro == 'alGo': ");
	$resultado = $varCuatro == 'alGo';
	var_dump($resultado);
	echo("<br>");

	echo("Comparamos varUno == 15: ");
	$resultado = $varUno == 15;
	var_dump($resultado);
	echo("<br>");



?>