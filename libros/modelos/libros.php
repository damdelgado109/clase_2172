<?php


	class libros{
		/*
		`id` int(50) NOT NULL AUTO_INCREMENT,
		`titulo` varchar(50) NOT NULL,
		`ibsn` varchar(100) DEFAULT NULL,
		`precio` int(6) DEFAULT NULL,
		`prologo` text,
		`imagen` varchar(50) DEFAULT NULL,
		`editorial` varchar(20) DEFAULT NULL,
		`anio` year(4) DEFAULT NULL,
		`id_autor` int(10) DEFAULT NULL,
		*/
		// Es el identificador del libro para el sistema
		protected $id;
		// Es el titulo del libro
		protected $titulo;
		protected $ibsn;
		protected $precio;
		protected $prologo;
		protected $imagen;
		protected $editorial;
		protected $anio;
		protected $id_autor;

		public function constructor($arrayDatos){

			$this->id		= isset($arrayDatos['id'])?$arrayDatos['id']:"";
			$this->titulo	= isset($arrayDatos['titulo'])?$arrayDatos['titulo']:"";
			$this->ibsn		= isset($arrayDatos['ibsn'])?$arrayDatos['ibsn']:"";
			$this->prologo	= isset($arrayDatos['prologo'])?$arrayDatos['prologo']:"";
			$this->precio	= isset($arrayDatos['precio'])?$arrayDatos['precio']:"";
			$this->editorial= isset($arrayDatos['editorial'])?$arrayDatos['editorial']:"";
			$this->imagen 	= isset($arrayDatos['imagen'])?$arrayDatos['imagen']:"";
			$this->anio		= isset($arrayDatos['anio'])?$arrayDatos['anio']:"";
			$this->id_autor = isset($arrayDatos['autor'])?$arrayDatos['autor']:"";

		}

		public function listarLibros(){

			$conexion = new PDO("mysql:host=localhost:3306;dbname=curso_2172", 'root', '');                                
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			$sql = "SELECT * FROM libros";
			$mysqlPrepare = $conexion->prepare($sql);
			$mysqlPrepare->execute(array());	
			$respuesta = $mysqlPrepare->fetchAll(PDO::FETCH_ASSOC);
			return $respuesta;

		}

		public function ingresarLibros(){

			$conexion = new PDO("mysql:host=localhost:3306;dbname=curso_2172", 'root', '');                                
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			
			$sqlInsert = "INSERT libros SET
						titulo 		= :titulo,
						ibsn 		= :ibsn,
						prologo 	= :prologo,
						precio 		= :precio,
						editorial 	= :editorial,
						anio 		= :anio,
						id_autor 	= :autor ";	
			$mysqlPrepare = $conexion->prepare($sqlInsert);
			$arraySql = array(
							"titulo" 	=> $this->titulo,
							"ibsn" 		=> $this->ibsn,
							"prologo" 	=> $this->prologo,
							"precio" 	=> $this->precio,
							"editorial" => $this->editorial,
							"anio" 		=> $this->anio,
							"autor" 	=> $this->id_autor,
						);
			
			$mysqlPrepare->execute($arraySql);	
		}

		public function cargarLibro($idLibro){

			$conexion = new PDO("mysql:host=localhost:3306;dbname=curso_2172", 'root', '');                                
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			$sql = "SELECT * FROM libros WHERE id = :id";
			$mysqlPrepare = $conexion->prepare($sql);
			$arrayLibro = array("id" => $idLibro);
			$mysqlPrepare->execute($arrayLibro);	
			$respuesta = $mysqlPrepare->fetchAll(PDO::FETCH_ASSOC);

			return $respuesta;

		}



	}



?>