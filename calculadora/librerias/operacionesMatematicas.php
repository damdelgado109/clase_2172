<?php

	function suma($numUno, $numDos){

		if(is_numeric($numUno) && is_numeric($numDos)){
			$total = $numUno + $numDos;
			return $total;		
		}else{
			return "Revisar que numero A y numero b sean realmente numeros";
		}

	}
	function resta($numUno, $numDos){

		if(is_numeric($numUno) && is_numeric($numDos)){
			$total = $numUno - $numDos;
			return $total;		
		}else{
			return "Revisar que numero A y numero b sean realmente numeros";
		}
			

	}
	function dividir($numUno, $numDos){

		if(is_numeric($numUno) && is_numeric($numDos)){
			if($numDos == 0){
				return "No puedo hacer el calculo";
			}
			$total = $numUno/$numDos;
			return $total;		
		}else{
			return "Revisar que numero A y numero b sean realmente numeros";
		}
				

	}
	function multiplicar($numUno, $numDos){

		if(is_numeric($numUno) && is_numeric($numDos)){
			$total = $numUno * $numDos;
			return $total;		
		}else{
			return "Revisar que numero A y numero b sean realmente numeros";
		}

	}


	function promedio($arrayNumeros){

		$cantidadSuma = count($arrayNumeros);
		$parcialTotal = 0;
		foreach($arrayNumeros as $numero){

			$parcialTotal = $parcialTotal+$numero;
		}
		$total = $parcialTotal / $cantidadSuma;
		return $total;

	}



?>