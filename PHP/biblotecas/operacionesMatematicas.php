<?php

	function suma($numUno, $numDos){

		if(is_numeric($numUno) && is_numeric($numDos)){
			$total = $numUno + $numDos;
			return $total;		
		}else{
			return "Revisar informacion de entrada";
		}

	}
	function resta($numUno, $numDos){

		$total = $numUno - $numDos;
		return $total;		

	}
	function dividir($numUno, $numDos){

		if($numDos == 0){
			return "No puedo hacer el calculo";
		}
		$total = $numUno/$numDos;
		return $total;		

	}
	function multiplicar($numUno, $numDos){

		$total = $numUno * $numDos;
		return $total;		

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