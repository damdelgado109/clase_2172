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
	print_r("Probando Rama");

	print_r("<hr>");
	echo("<h3>Array Asociativos</h3>");

	sort($arrayFrutas);	
	print_r($arrayFrutas);
	$arrayFrutas[] = "Pera"; 
	print_r("<br>");
	print_r($arrayFrutas);
	$arrayFrutas[] = "Arandanos"; 
	sort($arrayFrutas);	
	print_r("<br>");
	print_r($arrayFrutas);

	print_r("<br>");
	$totalArray = count($arrayFrutas);
	print_r("Total de frutas:".$totalArray);
	print_r("<br>");
	$stringArray = implode("-", $arrayFrutas);
	print_r("Todas las frutas:".$stringArray);
	
	print_r("<br>");
	print_r($arrayColores);
	ksort($arrayColores);
	print_r("<br>");
	print_r($arrayColores);

	rsort($arrayFrutas);
	print_r("<br>");
	print_r($arrayFrutas);
	krsort($arrayColores);
	print_r("<br>");
	print_r($arrayColores);

	$catLugares = count($arrayFrutas);
	$i = 0;
	while($i < $catLugares){

		print_r("<br>");
		print_r($arrayFrutas[$i]);
		$i ++;

	}
	echo("<hr>");

	$i = count($arrayFrutas) - 1;
	while($i >= 0){

		print_r("<br>");
		print_r($arrayFrutas[$i]);
		$i--;

	}

	echo("<hr>");
	$catLugares = count($arrayFrutas);
	$i = 0;
	while($i < $catLugares){

		$i ++;
		print_r("<br>");
		print_r($arrayFrutas[$catLugares-$i]);
		
	}

	echo("<hr>");
	$catLugares = count($arrayFrutas);
	for($i=0; $i < $catLugares; $i++){

		print_r("<br>");
		print_r($i."-".$arrayFrutas[$i]);

	}

	echo("<hr>");
	foreach($arrayFrutas as $clave => $fruta){

		print_r("<br>");
		print_r($clave."-".$fruta);

	}



	print_r("<br><br><br><br><br><br><br><br><br><br><br><br><br>");
?>