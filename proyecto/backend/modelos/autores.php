<?php

require_once("modelos/generico.php");


class autores extends generico{


	protected $nombre;

	protected $nacionalidad;

	protected $fechaNacimiento;

	protected $fechaMuerte;


	public function traerNombre(){
		return $this->nombre;
	}

	public function traerNacionalidad(){
		return $this->nacionalidad;
	}

	public function traerfechaNacimiento(){
		return $this->fechaNacimiento;
	}

	public function traerFechaMuerte(){
		return $this->fechaMuerte;
	}

	public function constructor($arrayDatos = array()){

		$this->id 				= $this->extraerDatos($arrayDatos,'id');
		$this->nombre 			= $this->extraerDatos($arrayDatos,'nombre');
		$this->nacionalidad		= $this->extraerDatos($arrayDatos,'nacionalidad');
		$this->fechaNacimiento 	= $this->extraerDatos($arrayDatos,'fechaNacimiento');
		$this->fechaMuerte 		= $this->extraerDatos($arrayDatos,'fechaMuerte');

	}

	public function ingresar(){

		if($this->fechaMuerte == ""){
			$this->fechaMuerte = NULL;
		}

		$sqlInsert = "INSERT autores SET
						nombre 			= :nombre,
						nacionalidad	= :nacionalidad,
						fechaNacimiento = :fechaNacimiento,
						estado 			= 1";	
		$nombre = md5($this->nombre);
		$arraySql = array(
						"nombre" 			=> $nombre,
						"nacionalidad" 		=> $this->nacionalidad,
						"fechaNacimiento"	=> $this->fechaNacimiento,
					);	
		$retorno = $this->inputarCambio($sqlInsert, $arraySql);
		return $retorno;

	}

	public function entretregado(){

		if($this->fechaMuerte == ""){
			$this->fechaMuerte = NULL;
		}

		$sqlInsert = "UPDATE autores SET
						fechaMuerte 	= :fechaMuerte,
						estado 			= '2'
						WHERE id = :id";	
		$arraySql = array(
						"fechaMuerte" 		=> $this->fechaMuerte,
						"id" 				=> $this->id,
					);
		
		$retorno = $this->inputarCambio($sqlInsert, $arraySql);
		return $retorno;

	}

	public function editar(){

		if($this->fechaMuerte == ""){
			$this->fechaMuerte = NULL;
		}
		$sqlInsert = "UPDATE autores SET
						nombre 			= :nombre,
						nacionalidad	= :nacionalidad,
						fechaNacimiento = :fechaNacimiento,
						fechaMuerte 	= :fechaMuerte
						WHERE id = :id";	
		/*$arraySql = array(
						"nombre" 			=> $this->nombre,
						"nacionalidad" 		=> $this->nacionalidad,
						"fechaNacimiento"	=> $this->fechaNacimiento,
						"fechaMuerte" 		=> $this->fechaMuerte,
						"id" 				=> $this->id,
					);
		*/
		$arraySql = array();
		$arraySql['nombre'] 		= $this->nombre;
		$arraySql['nacionalidad']	= $this->nacionalidad;
		$arraySql['fechaNacimiento'] = $this->fechaNacimiento;
		$arraySql['fechaMuerte'] 	= $this->fechaMuerte;
		$arraySql['id'] 			= $this->id;
		
		$retorno = $this->inputarCambio($sqlInsert, $arraySql);
		return $retorno;

	}

	public function borrar(){

		$sqlInsert = "UPDATE autores SET estado = 0 WHERE id = :id";	
		$arraySql = array(
						"id" => $this->id,
					);
	
		$retorno = $this->inputarCambio($sqlInsert, $arraySql);
		return $retorno;

	}

	public function listar($arrayFiltros = array()){
		/*
			$arrayFiltros['pagina'] : numero de pagina que estoy
			$arrayFiltros['totalRegistro'] : el numero total de registro que vamos a traer
		*/
		$arraySql = array();
		$sql = "SELECT * FROM autores";

		if(isset($arrayFiltros['estado']) && $arrayFiltros['estado'] != ""){

			$sql .= " WHERE estado = :estado";
			$arraySql['estado'] = $arrayFiltros['estado'];

		}else{

			$sql .= " WHERE estado = 1 ";

		}

		if(isset($arrayFiltros['busqueda']) && $arrayFiltros['busqueda'] != "" ){
			$sql .= " AND (nombre LIKE ('%".$arrayFiltros['busqueda']."%') ";
			$sql .= " OR nacionalidad LIKE ('%".$arrayFiltros['busqueda']."%')) ";
		}
		//SELECT * FROM autores a LIMIT 10,5;
		if(isset($arrayFiltros['totalRegistro']) && $arrayFiltros['totalRegistro']>0){

			$origen = ($arrayFiltros['pagina'] -1) * $arrayFiltros['totalRegistro'];
			$sql .= " LIMIT ".$origen.",".$arrayFiltros['totalRegistro'];
		
		}
		
		$retorno = $this->cargarDatos($sql, $arraySql);
		return $retorno;

	}

	public function totalRegistros($arrayFiltros = array()){
		/*
			$arrayFiltros['pagina'] : numero de pagina que estoy
			$arrayFiltros['totalRegistro'] : el numero total de registro que vamos a traer
		*/

		$sql = "SELECT count(id) as total FROM autores 
					WHERE estado = 1";

		if(isset($arrayFiltros['busqueda']) && $arrayFiltros['busqueda'] != "" ){
			$sql .= " AND (nombre LIKE ('%".$arrayFiltros['busqueda']."%') ";
			$sql .= " OR nacionalidad LIKE ('%".$arrayFiltros['busqueda']."%')) ";
		}

		$arraySql = array();
		$retorno = 0;

		$respuesta = $this->cargarDatos($sql, $arraySql);
		foreach($respuesta as $total){
			$retorno = $total['total'];
		}
		return $retorno;

	}

	public function cargar($idAutor){


		$sql = "SELECT * FROM autores WHERE id = :id";

		$arrayDatos = array();
		$arrayDatos['id'] = $idAutor;
		$respuesta = $this->cargarDatos($sql, $arrayDatos);

		foreach($respuesta as $autor){

			$this->id 				= $autor['id'];
			$this->nombre 			= $autor['nombre'];
			$this->nacionalidad		= $autor['nacionalidad'];
			$this->fechaNacimiento 	= $autor['fechaNacimiento'];
			$this->fechaMuerte 		= $autor['fechaMuerte'];
		}

	}

	public function listarSelect(){
	
		$sql = 'SELECT 
					id,	
					CONCAT(nombre, " - ",nacionalidad) AS nombre
					FROM autores a
					WHERE estado = 1';		
		$arraySql = array();
		$retorno = $this->cargarDatos($sql, $arraySql);
		return $retorno;

	}

	public function obtenerEnum(){

		$arrayEnum = array();

		$sql = 'SHOW CREATE TABLE clientes;';		
		$arraySql = array();
		$retorno = $this->cargarDatos($sql, $arraySql);

		$arrayRecorte = explode("\n",$retorno[0]['Create Table']);
		
		foreach($arrayRecorte as $recorte){

			$recorte = trim($recorte);
			$respuesta = preg_match("/estado/", $recorte);
			if($respuesta == True){

				$lugarParentesisUno = strpos($recorte, "(");
				$lugarParentesisDos = strpos($recorte, ")");
				$final = $lugarParentesisDos - $lugarParentesisUno;
				$strEnum =  substr($recorte, $lugarParentesisUno, $final);
				$arrayCasiEnum = explode(",",$strEnum);
				for( $i=0; count($arrayCasiEnum) > $i; $i++){
					$limpiar = str_replace("'", "", $arrayCasiEnum[$i]);
					$limpiar = str_replace("(", "", $limpiar);
					$limpiar = str_replace(")", "", $limpiar);
					$arrayEnum[$limpiar] = $limpiar;
				}
			}
		}

		print_r($arrayEnum);

//`estado` enum('Activado','Desactivado','Borrado') DEFAULT NULL,

		//$arrayEnum = array('Activado'=>'Activado','Desactivado'=>'Desactivado','Borrado'=>'Borrado', );


		return $arrayEnum;

		/*
		CREATE TABLE `clientes` (
		`id` int(10) NOT NULL AUTO_INCREMENT,
		`nombre` varchar(50) NOT NULL,
		`apellido` varchar(50) NOT NULL,
		`telefono` varchar(10) DEFAULT NULL,
		`mail` varchar(100) DEFAULT NULL,
		`estado` enum('Activado','Desactivado','Borrado') DEFAULT NULL,
		PRIMARY KEY (`id`)
		) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1

		*/


	}


}










?>



