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
		$arraySql = array(
						"nombre" 			=> $this->nombre,
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
		$arraySql = array(
						"nombre" 			=> $this->nombre,
						"nacionalidad" 		=> $this->nacionalidad,
						"fechaNacimiento"	=> $this->fechaNacimiento,
						"fechaMuerte" 		=> $this->fechaMuerte,
						"id" 				=> $this->id,
					);
		
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

		$sql = "SELECT * FROM autores 
					WHERE estado = 1";

		if(isset($arrayFiltros['busqueda']) && $arrayFiltros['busqueda'] != "" ){
			$sql .= " AND (nombre LIKE ('%".$arrayFiltros['busqueda']."%') ";
			$sql .= " OR nacionalidad LIKE ('%".$arrayFiltros['busqueda']."%')) ";
		}
		//SELECT * FROM autores a LIMIT 10,5;
		if(isset($arrayFiltros['totalRegistro']) && $arrayFiltros['totalRegistro']>0){

			$origen = ($arrayFiltros['pagina'] -1) * $arrayFiltros['totalRegistro'];
			$sql .= " LIMIT ".$origen.",".$arrayFiltros['totalRegistro'];
		
		}
		$arraySql = array();

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


}










?>



