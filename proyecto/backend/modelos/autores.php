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

	public function fechaNacimiento(){
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
							fechaMuerte 	= :fechaMuerte";	
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

	public function extraerDatos($array, $clave){

		if(isset($array[$clave])){
			return $array[$clave];
		}
		return "";
	}

}










?>



