<?php


class autores {

	// Es el identificador unico de los autores
	protected $id;

	protected $nombre;

	protected $nacionalidad;

	protected $fechaNacimiento;

	protected $fechaMuerte;


	public function traerId(){
		return $this->id;
	}

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

		$conexion = new PDO("mysql:host=localhost:3306;dbname=curso_2172", 'root', '');                                
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		
		if($this->fechaMuerte == ""){
			$this->fechaMuerte = NULL;
		}

		$sqlInsert = "INSERT autores SET
						nombre 			= :nombre,
						nacionalidad	= :nacionalidad,
						fechaNacimiento = :fechaNacimiento,
						fechaMuerte 	= :fechaMuerte,
						estado 			= 1";	
		$mysqlPrepare = $conexion->prepare($sqlInsert);
		$arraySql = array(
						"nombre" 			=> $this->nombre,
						"nacionalidad" 		=> $this->nacionalidad,
						"fechaNacimiento"	=> $this->fechaNacimiento,
						"fechaMuerte" 		=> $this->fechaMuerte,
					);
		
		$respuesta = $mysqlPrepare->execute($arraySql);

		$retorno = array();
		if($respuesta){
			$retorno['codigo'] = "Ok";
		}else{
			$retorno['codigo'] = "Error";
		}
		return $retorno;

	}

	public function editar(){

		$conexion = new PDO("mysql:host=localhost:3306;dbname=curso_2172", 'root', '');                                
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		
		if($this->fechaMuerte == ""){
			$this->fechaMuerte = NULL;
		}

		$sqlInsert = "UPDATE autores SET
						nombre 			= :nombre,
						nacionalidad	= :nacionalidad,
						fechaNacimiento = :fechaNacimiento,
						fechaMuerte 	= :fechaMuerte
						WHERE id = :id";	
		$mysqlPrepare = $conexion->prepare($sqlInsert);
		$arraySql = array(
						"nombre" 			=> $this->nombre,
						"nacionalidad" 		=> $this->nacionalidad,
						"fechaNacimiento"	=> $this->fechaNacimiento,
						"fechaMuerte" 		=> $this->fechaMuerte,
						"id" 				=> $this->id,
					);
		
		$respuesta = $mysqlPrepare->execute($arraySql);

		$retorno = array();
		if($respuesta){
			$retorno['codigo'] = "Ok";
		}else{
			$retorno['codigo'] = "Error";
		}
		return $retorno;

	}

	public function borrar(){

		$conexion = new PDO("mysql:host=localhost:3306;dbname=curso_2172", 'root', '');                                
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		

		$sqlInsert = "UPDATE autores SET estado = 0 WHERE id = :id";	
		$mysqlPrepare = $conexion->prepare($sqlInsert);
		$arraySql = array(
						"id" => $this->id,
					);
		$respuesta = $mysqlPrepare->execute($arraySql);
		$retorno = array();
		if($respuesta){
			$retorno['codigo'] = "Ok";
		}else{
			$retorno['codigo'] = "Error";
		}
		return $retorno;

	}

	public function listar($arrayFiltros = array()){
		/*
			$arrayFiltros['pagina'] : numero de pagina que estoy
			$arrayFiltros['totalRegistro'] : el numero total de registro que vamos a traer
		*/

		$conexion = new PDO("mysql:host=localhost:3306;dbname=curso_2172", 'root', '');                                
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		
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

		print_r($sql);
		$mysqlPrepare = $conexion->prepare($sql);
		$mysqlPrepare->execute(array());	
		$respuesta = $mysqlPrepare->fetchAll(PDO::FETCH_ASSOC);
		return $respuesta;

	}

	public function totalRegistros($arrayFiltros = array()){
		/*
			$arrayFiltros['pagina'] : numero de pagina que estoy
			$arrayFiltros['totalRegistro'] : el numero total de registro que vamos a traer
		*/

		$conexion = new PDO("mysql:host=localhost:3306;dbname=curso_2172", 'root', '');                                
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		
		$sql = "SELECT count(id) as total FROM autores 
					WHERE estado = 1";

		if(isset($arrayFiltros['busqueda']) && $arrayFiltros['busqueda'] != "" ){
			$sql .= " AND (nombre LIKE ('%".$arrayFiltros['busqueda']."%') ";
			$sql .= " OR nacionalidad LIKE ('%".$arrayFiltros['busqueda']."%')) ";
		}

		$mysqlPrepare = $conexion->prepare($sql);
		$mysqlPrepare->execute(array());	
		$respuesta = $mysqlPrepare->fetchAll(PDO::FETCH_ASSOC);
		$retorno = 0;

		foreach($respuesta as $total){
			$retorno = $total['total'];
		}

		return $retorno;

	}

	public function cargar($idAutor){

		$conexion = new PDO("mysql:host=localhost:3306;dbname=curso_2172", 'root', '');                                
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		
		$sql = "SELECT * FROM autores WHERE id = :id";

		$mysqlPrepare = $conexion->prepare($sql);

		$arrayDatos = array();
		$arrayDatos['id'] = $idAutor;
		$mysqlPrepare->execute($arrayDatos);	
		$respuesta = $mysqlPrepare->fetchAll(PDO::FETCH_ASSOC);

		foreach($respuesta as $autor){

			$this->id 				= $autor['id'];
			$this->nombre 			= $autor['nombre'];
			$this->nacionalidad		= $autor['nacionalidad'];
			$this->fechaNacimiento 	= $autor['fechaNacimiento'];
			$this->fechaMuerte 		= $autor['fechaMuerte'];
		}

	}

	public function extraerDatos($array, $clave){

		if(isset($array[$clave])){
			return $array[$clave];
		}
		return "";
	}

}










?>



