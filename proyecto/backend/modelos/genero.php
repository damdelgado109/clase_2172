<?php

require_once("modelos/generico.php");


class genero extends generico {


	protected $nombre;

	protected $descripcion;


	public function traerNombre(){
		return $this->nombre;
	}

	public function traerDescripcion(){
		return $this->descripcion;
	}

	public function constructor($arrayDatos = array()){

		$this->id 				= $this->extraerDatos($arrayDatos,'id');
		$this->nombre 			= $this->extraerDatos($arrayDatos,'nombre');
		$this->descripcion		= $this->extraerDatos($arrayDatos,'descripcion');
	
	}

	public function ingresar(){

		$sqlInsert = "INSERT generos SET
						nombre 			= :nombre,
						descripcion		= :descripcion";	
		$arraySql = array(
						"nombre" 			=> $this->nombre,
						"descripcion" 		=> $this->descripcion
					);
			
		$retorno = $this->inputarCambio($sqlInsert, $arraySql);
		return $retorno;

	}

	public function editar(){

		$sqlInsert = "UPDATE generos SET
						nombre 			= :nombre,
						descripcion	= :descripcion
						WHERE id = :id";	
		$arraySql = array(
						"nombre" 			=> $this->nombre,
						"descripcion" 		=> $this->descripcion,
						"id" 				=> $this->id,
					);
		
		$retorno = $this->inputarCambio($sqlInsert, $arraySql);
		return $retorno;

	}

	public function borrar(){

		$sqlInsert = "UPDATE generos SET estado = 0 WHERE id = :id";	
		$mysqlPrepare = $conexion->prepare($sqlInsert);
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

		$conexion = new PDO("mysql:host=localhost:3306;dbname=curso_2172", 'root', '');                                
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		
		$sql = "SELECT * FROM generos";

		if(isset($arrayFiltros['busqueda']) && $arrayFiltros['busqueda'] != "" ){
			$sql .= " AND (nombre LIKE ('%".$arrayFiltros['busqueda']."%') ";
		}
		//SELECT * FROM autores a LIMIT 10,5;
		if(isset($arrayFiltros['totalRegistro']) && $arrayFiltros['totalRegistro']>0){

			$origen = ($arrayFiltros['pagina'] -1) * $arrayFiltros['totalRegistro'];
			$sql .= " LIMIT ".$origen.",".$arrayFiltros['totalRegistro'];
		
		}
		$arrayDatos = array();

		$respuesta = $this->cargarDatos($sql, $arrayDatos);
		return $respuesta;

	}

	public function totalRegistros($arrayFiltros = array()){
		/*
			$arrayFiltros['pagina'] : numero de pagina que estoy
			$arrayFiltros['totalRegistro'] : el numero total de registro que vamos a traer
		*/

		$sql = "SELECT count(id) as total FROM generos 
					WHERE estado = 1";

		if(isset($arrayFiltros['busqueda']) && $arrayFiltros['busqueda'] != "" ){
			$sql .= " AND (nombre LIKE ('%".$arrayFiltros['busqueda']."%') ";
		}

		$arrayDatos = array();
		$retorno = 0;

		$respuesta = $this->cargarDatos($sql, $arrayDatos);
		foreach($respuesta as $total){
			$retorno = $total['total'];
		}

		return $retorno;

	}

	public function cargar($idGenero){


		$sql = "SELECT * FROM generos WHERE id = :id";
		$arrayDatos = array();
		$arrayDatos['id'] = $idGenero;

		$respuesta = $this->cargarDatos($sql, $arrayDatos);

		foreach($respuesta as $autor){

			$this->id 				= $autor['id'];
			$this->nombre 			= $autor['nombre'];
			$this->descripcion		= $autor['descripcion'];

		}

	}


}










?>



