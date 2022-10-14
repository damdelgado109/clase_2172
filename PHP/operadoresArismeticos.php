<?php

	echo("<hr>");
	echo("<h2> Operadores aritm&#233;ticos </h2>");

	$varUno = 5;
	$varDos = 8;
	$varTres = 2;

	echo("Valor varUno:");
	echo($varUno);
	echo("Valor varDos:");
	echo($varDos);
	echo("Valor varTres:");	
	echo($varTres);
	echo("<br>");

	echo("El valor de la suma varUno + varDos = ");
	$resultado = $varUno + $varDos;
	echo($resultado);
	echo("<br>");

	echo("El valor de la resta varDos - varTres = ");
	$resultado = $varDos - $varTres;
	echo($resultado);
	echo("<br>");

	echo("El valor de la multiplicacion varUno * varTres = ");
	$resultado = $varUno * $varTres;
	echo($resultado);
	echo("<br>");

	echo("El valor de la Division varDos / varUno = ");
	$resultado = $varDos / $varUno;
	echo($resultado);
	echo("<br>");

	echo("El valor de la Módulo varDos % varUno = ");
	$resultado = $varDos % $varUno;
	echo($resultado);
	echo("<br>");

	echo("El valor de la suma varUno + 5 = ");
	$resultado = $varUno + 5;
	echo($resultado);
	echo("<br>");

	echo("El valor de la suma varUno + 5 + varTres = ");
	$resultado = $varUno + 5 + $varTres;
	echo($resultado);
	echo("<br>");
								//8  		//2
	echo("El valor de la suma varDos - 3 * varTres = ");
	$resultado = $varDos - 3 * $varTres;
	echo($resultado);
	echo("<br>");

	echo("El valor de la suma varDos - (3 * varTres) = ");
	$resultado = $varDos - (3 * $varTres);
	echo($resultado);
	echo("<br>");

	echo("El valor de la suma (varDos - 3) * varTres = ");
	$resultado = ($varDos - 3) * $varTres;
	echo($resultado);
	echo("<br>");

	echo("<hr>");
	echo("<h2>Operadores Asignac&#237;on</h2>");

	$varTexto = "Hola soy un texto";	
	echo($varTexto);
	echo("<br>");
	$varTexto = $varTexto." ,Ahora mas texto";
	echo($varTexto);
	echo("<br>");
	$varTexto .=" ,Tengo mas texto";
	echo($varTexto);
	echo("<br>");
// ------------------------------
	$varNumero = 5;
	echo($varNumero);
	echo("<br>");
	$varNumero = $varNumero + 1;
	echo($varNumero);
	echo("<br>");
	$varNumero++;
	echo($varNumero);
	echo("<br>");
	$varNumero+=3;
	echo($varNumero);
	echo("<br>");
	$varNumero--;
	echo("Soy yo:".$varNumero);

?>

