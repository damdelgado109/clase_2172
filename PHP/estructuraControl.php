<?php
	echo("<h1>Estructura Control</h1>");

	$a = 5;
	$b = 8;

	if ($a > $b) {

		echo "a es mayor que b";
	
	}

	$respuesta = $a == 5;
	if ($respuesta) {

		echo "<br>A vale 5";
	
	}                                 //False  
		// False    //False    //True      //False
	if ($a == 8 || $a < 6 || ($a >= $b && $a===3)){

		echo "<br>Entro Al if";
	
	}elseif($a == 9 || $b > 1 ){

		echo("<br>Entre en el elseif");

	}else{

		echo "<br>No entiendo nada";
	
	}	
echo("<hr>");	


	if ($a == 8 || $a < 6 || ($a >= $b && $a===3)){

		echo "<br>2-Entro Al if";
	
	}
	if($a == 9 || $b > 1 ){

		echo("<br>2-Entre en el elseif");

	}else{
		echo "<br>2-No entiendo nada";
	}	

	echo ("<br><br> FIN");	

	echo("<hr>");


	
	$minoFranjaUno = 25000;
	$maxFranjaUno = 35000;
	$porfranjaUno = 10;

	$minoFranjaDos = 35000;
	$maxFranjaDos = 50000;
	$porfranjaDos = 15;

	$minoFranjaTres = 50000;
	$maxFranjaTres = 100000;
	$porfranjaTres = 20;

	$minoFranjaCuatro = 100000;
	$porfranjaCuatro = 25;

	$sueldo = 150000;
	$irpf = 0;

	if($sueldo > $minoFranjaUno && $sueldo < $maxFranjaUno){

		echo("Usted Esta la franja uno");
		$irpf = (($sueldo-$minoFranjaUno) * $porfranjaUno) / 100;

	}elseif($sueldo >= $minoFranjaDos && $sueldo < $maxFranjaDos){

		echo("Usted Esta en la franja 2");
		$primerEscalon = (($maxFranjaUno-$minoFranjaUno) * $porfranjaUno)/100;
		$irpf = (($sueldo - $maxFranjaUno)*$porfranjaDos)/100 + $primerEscalon; 

	}elseif($sueldo >= $minoFranjaTres && $sueldo < $maxFranjaTres){

		echo("Usted Esta en la franja 3");
		$primerEscalon = (($maxFranjaUno-$minoFranjaUno) * $porfranjaUno)/100;
		$segundoEscalon = (($maxFranjaDos - $minoFranjaDos)* $porfranjaDos)/100;
		$irpf = (($sueldo-$minoFranjaTres)/$porfranjaTres) + $primerEscalon + $segundoEscalon;

	}elseif($sueldo >= 100000){

		echo("Usted gana bien");
		$primerEscalon = (($maxFranjaUno-$minoFranjaUno) * $porfranjaUno)/100;
		$segundoEscalon = (($maxFranjaDos - $minoFranjaDos)* $porfranjaDos)/100;
		$tercerEscalon = (($maxFranjaTres-$minoFranjaTres)*$porfranjaTres)/100;
		$irpf = (($sueldo-$minoFranjaCuatro)*$porfranjaCuatro)/100 + $primerEscalon + $tercerEscalon + $tercerEscalon;
	
	}else{

		echo("No llega al minimo");
	
	}

	echo("<br><br>Usted va a aportar:".$irpf);


?>