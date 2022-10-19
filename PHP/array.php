<?php

	echo("<h1>Array</h1>");
	echo("<h3>Array Numerado</h3>");
	$arrayFrutas = array("Banana","Manzana","Pera");
	print_r($arrayFrutas);
	$arrayFrutas[] = "Frutilla"; 
	print_r("<br>");
	print_r($arrayFrutas);
	print_r("<br>");
	print_r($arrayFrutas[1]);
	print_r("<br>");
	print_r($arrayFrutas[2]);
	$arrayFrutas[2] = "Anana";
	print_r("<br>");
	print_r($arrayFrutas);
	$arrayFrutas[9] = "Kiwi";
	print_r("<br>");
	print_r($arrayFrutas);
	$arrayFrutas[] = "Naranja";
	print_r("<br>");
	print_r($arrayFrutas);	
	unset($arrayFrutas[9]);
	print_r("<br>");
	print_r($arrayFrutas);	
	print_r("<br>");
	print_r($arrayFrutas);
	$arrayFrutas[5] = "Mandarina";
	print_r("<br>");
	print_r($arrayFrutas);
	$arrayFrutas[] = "Mango";
	print_r("<br>");
	print_r($arrayFrutas);
	print_r("<br>");
	print_r("<hr>");
	echo("<h3>Array Asociativos</h3>");

	$arrayColores = array("Verde"=>"#23a90b", "Rojo"=>"#e62424", "Amarillo"=>"#f4ef40");
	print_r($arrayColores);
	print_r("<br>");
	print_r($arrayColores['Rojo']);
	print_r("<br>");
	$arrayColores['Violeta'] = "#e102e5";
	print_r("<br>");
	print_r($arrayColores);


?>