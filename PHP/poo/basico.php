<?php

	class asaderas {

		// public: son propiedades publicas 
		//  *pueden ser utilizadas en cualquier momento y son heredables
		// protected: son prpiedades protegidas 
		//  * protected son propiedades que solo se puede usar dentro de la clase y son heredables
		// private: son propiedades privadas 
		//  * private son propiedades que solo se puede usar dentro de la clase y no son heredables
		
		// Propiedades de la clase
		public $material;

		public $color;

		protected $forma;

		public $medidas = array();

		protected $temperatura;

		private $rejilla = true;

		// Metodo constructor de la clase 
		public function __construct($material, $color, $forma, $medidas){

			$this->material = $material;
			$this->color 	= $color;
			$this->forma 	= $forma;
			$this->medidas  = $medidas;
			
		}  



		public function obtenerTemperatura(){
			return $this->temperatura;
		}

		public function obtenerForma(){
			return $this->forma;
		}
		public function establecerForma($forma){
			$this->forma = $forma;
		}
		public function tieneRejilla(){
			return $this->rejilla;
		}

		public function prepararComida($ingredientes){

			// Preparo ingredientes en la asadera
			return "OK";

		}

		public function cocinar($temperatura){

			$this->temperatura = $temperatura;
		}

		public function subirTemperatura(){

			if($this->temperatura < 100){
				$this->temperatura += 10;
			}
			
		}

		public function bajarTemperatura(){

			if($this->temperatura > 10){
				$this->temperatura -= 10;
			}
			
		}

		public function lavar(){
			$retorno = "Estoy limpia";	
			return $retorno;
		}


	}

	class asaderaPizza extends asaderas{

		protected $forma = "Redonda";

		public function __construct($material, $color, $forma, $medidas){

			$this->material = $material;
			$this->color 	= $color;
			$this->medidas  = $medidas;

		} 

		public function establecerForma($forma){
			$this->forma = "Redonda";
		}

		public function tieneRejilla(){
			return $this->rejilla;
		}

		public function lavar(){
			// A traves de parent ejecute la clase padre y despues continue con la hija
			$padre = parent::lavar();
			$retorno = $padre." ademas brillo";	
			return $retorno;

		}

	}


// Termina la clase asaderas

	$material 	= "Metal";
	$color 		= "Gris";
	$forma 		= "Triangulo";
	$medidas	= array(
					"Alto" => 15, 
					"ancho"=>50, 
					"largo"=>55);


	$objAsadera = new asaderas($material, $color, $forma, $medidas);

	$ingredientes = array();
	$ingredientes[] = "Frutilla";	
	$ingredientes[] = "Banana";
	$ingredientes[] = "Manzana";

	$objAsadera->prepararComida($ingredientes);
	$temperatura = 30;
	$objAsadera->cocinar($temperatura);


	$objAsaderaPizza = new asaderaPizza($material, $color, $forma, $medidas);

?>
<html>
	<head></head>
	<body>
		<h3>
			<p>Material: <?= $objAsadera->material ?> </p>
			<p>Forma: <?= $objAsadera->obtenerForma() ?> </p>
<?php
				$objAsadera->establecerForma("Rectagular");
?>
			<p>Forma: <?= $objAsadera->obtenerForma() ?> </p>

			<p>Temperatura: <?= $objAsadera->obtenerTemperatura() ?> </p>
<?php
			$objAsadera->subirTemperatura();
?>
			<p>Temperatura 2: <?= $objAsadera->obtenerTemperatura() ?> </p>
<?php
			$objAsadera->subirTemperatura();
?>
			<p>Temperatura 3: <?= $objAsadera->obtenerTemperatura() ?> </p>
<?php
			$objAsadera->bajarTemperatura();
?>
			<p>Temperatura 4: <?= $objAsadera->obtenerTemperatura() ?> </p>
			<p> <?php var_dump($objAsadera->tieneRejilla()) ?>	
			<p><?= $objAsadera->lavar()?></p>
			<hr>
			<p>Forma: <?= $objAsaderaPizza->obtenerForma() ?> </p>
			<p>Rejilla: <?php var_dump($objAsaderaPizza->tieneRejilla()); ?> </p>
			<p><?= $objAsaderaPizza->lavar()?></p>

		</h3>
	</body>
<html>






