<?php

	echo("<h2>Operadores Logícos</h2>");
	echo("<br>");

	$varBolean = True;
	var_dump($varBolean);
	echo("<br>");
	$a = True;
	$b = False;
	$c = True;
	$d = False;

	echo("<h3>Operador AND</h3>");
	echo("Operar AND a && c: ");
	$resultado = $a && $c;
	var_dump($resultado);
	echo("<br>");

	echo("Operar AND a && b: ");
	$resultado = $a && $b;
	var_dump($resultado);
	echo("<br>");

	echo("Operar AND b && a: ");
	$resultado = $b && $a;
	var_dump($resultado);
	echo("<br>");

	echo("Operar AND b && d: ");
	$resultado = $b && $d;
	var_dump($resultado);
	echo("<br>");

	echo("<hr>");
	echo("<h3>Operador OR</h3>");
	echo("Operar OR a || c: ");
	$resultado = $a || $c;
	var_dump($resultado);
	echo("<br>");

	echo("Operar OR a || b: ");
	$resultado = $a || $b;
	var_dump($resultado);
	echo("<br>");

	echo("Operar OR b || c: ");
	$resultado = $b || $c;
	var_dump($resultado);
	echo("<br>");

	echo("Operar OR b || d: ");
	$resultado = $b || $d;
	var_dump($resultado);
	echo("<br>");

	echo("<hr>");
	echo("<h3>Operador XOR</h3>");

	echo("Operar XOR a xor c: ");
	$resultado = $a xor $c;
	var_dump($resultado);
	echo("<br>");

	echo("Operar XOR a xor b: ");
	$resultado = $a xor $b;
	var_dump($resultado);
	echo("<br>");

	echo("Operar XOR b xor c: ");
	$resultado = $b xor $c;
	var_dump($resultado);
	echo("<br>");

	echo("Operar XOR b xor d: ");
	$resultado = $b xor $d;
	var_dump($resultado);
	echo("<br>");

	echo("<hr>");
	echo("<h3>Operador NOT</h3>");
	echo("Operar NOT !a:");
	$resultado = !$a;
	var_dump($resultado);
	echo("<br>");
	echo("Operar NOT !b:");
	$resultado = !$b;
	var_dump($resultado);
	echo("<br>");


?>