<?php


	class generico{

		protected $id;


		public function traerId(){
			return $this->id;
		}

		public function extraerDatos($array, $clave){

			if(isset($array[$clave])){
				return $array[$clave];
			}
			return "";
		}

		public function inputarCambio($sql, $arrayDatos = array()){

			$conexion = new PDO("mysql:host=localhost:3306;dbname=curso_2172", 'root', '');                                
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

			$mysqlPrepare = $conexion->prepare($sql);
			$respuesta = $mysqlPrepare->execute($arrayDatos);
			$retorno = array();
			if($respuesta){
				$retorno['codigo'] = "Ok";
			}else{
				$retorno['codigo'] = "Error";
			}
			return $retorno;
		}

		public function cargarDatos($sql, $arrayDatos = array()){

			$conexion = new PDO("mysql:host=localhost:3306;dbname=curso_2172", 'root', '');                                
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			
			$mysqlPrepare = $conexion->prepare($sql);		
			$mysqlPrepare->execute($arrayDatos);	
			$respuesta = $mysqlPrepare->fetchAll(PDO::FETCH_ASSOC);

			return $respuesta;

		}

	}

?>

