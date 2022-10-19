<?php


	echo("<h1>Estructura repeticion</h1>");

	echo("<h2>Bucle While</h2>");

	$i = 0;

	while($i <= 5){

		echo('<br>Hola $i ='.$i);
		$i++;

	}

	echo("<br>Fin");

	echo("<br>");
	$valido = True;
	$j = 0;
	while($valido){

		echo('<br>Hola $j ='.$j);
		$j++;
		if($j > 5){
			$valido = False;
		}

	}

	echo("<br>Fin 2");
	echo("<hr>");
	echo("<h2>Bucle For</h2>");

	for($k=0; $k <= 10; $k++){

		echo('<br>Hola $k ='.$k);
	}
	echo("<br>");
	for($l=3; $l <= 10; $l = $l+2){

		echo('<br>Hola $l ='.$l);
	}

	echo("<hr>");
	echo("<h2>Bucle doWhile</h2>");

	$i = 9;
	do{

		echo('<br>Hola $i ='.$i);
		$i++;

	}while($i <= 5);
	echo("<hr>");
	
	$n = 1;
	do{

		echo('<br>Hola $i ='.$n);
		$n++;

	}while($n <= 5);

	echo("<hr>");
	echo("<hr>");

	$p = 17;
	do{
		
		echo('<br>Hola $i ='.$p);
		if($p > 14){
			$p = 0;
		}
		$p++;

	}while($p<10);


	
	echo("<hr>");
	echo("<hr>");

	$i = 0;
	while($i < 15){

		if(($i % 2) == 0){
			echo("<br> Yo soy multiplo de 2:".$i);
		}	
		$i = $i+3;
	}






?>