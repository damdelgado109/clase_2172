<?php

require_once("modelos/generico.php");


class libros extends generico {


	protected $titulo;

	protected $ibsn;

	protected $precio;

	protected $prologo;

	protected $imagen;

	protected $editorial;

	protected $anio;

	protected $id_autor;

	protected $estado;

	private $tabla = "libros";

	public function traerTitulo(){
		return $this->titulo;
	}

	public function traerIbsn(){
		return $this->ibsn;
	}

	public function traerPrecio(){
		return $this->precio;
	}

	public function traerPrologo(){
		return $this->prologo;
	}

	public function traerImagen(){
		return $this->imagen;
	}

	public function traerEditorial(){
		return $this->editorial;
	}

	public function traerIdAutor(){
		return $this->id_autor;
	}

	public function constructor($arrayDatos = array()){

		$this->id 			= $this->extraerDatos($arrayDatos,'id');
		$this->titulo 		= $this->extraerDatos($arrayDatos,'titulo');
		$this->ibsn			= $this->extraerDatos($arrayDatos,'ibsn');
		$this->precio 		= $this->extraerDatos($arrayDatos,'precio');
		$this->prologo		= $this->extraerDatos($arrayDatos,'prologo');
		$this->imagen 		= $this->extraerDatos($arrayDatos,'imagen');
		$this->anio 		= $this->extraerDatos($arrayDatos,'anio');
		$this->editorial	= $this->extraerDatos($arrayDatos,'editorial');
		$this->id_autor		= $this->extraerDatos($arrayDatos,'id_autor');
		
	}

	public function ingresar(){

		$sqlInsert = "INSERT $this->tabla SET
						titulo 		= :titulo,
						ibsn		= :ibsn,
						precio		= :precio,
						prologo		= :prologo,
						imagen		= :imagen,
						anio		= :anio,
						editorial	= :editorial,
						id_autor	= :id_autor,
						estado		= 1
						";	
		$arraySql = array(
						"titulo" 	=> $this->titulo,
						"ibsn" 		=> $this->ibsn,
						"precio" 	=> $this->precio,
						"prologo" 	=> $this->prologo,
						"imagen" 	=> $this->imagen,
						"anio" 		=> $this->anio,
						"editorial" => $this->editorial,
						"id_autor" 	=> $this->id_autor
					);
			
		$retorno = $this->inputarCambio($sqlInsert, $arraySql);
		return $retorno;

	}

	public function editar(){

		$sqlInsert = "UPDATE libros SET
						titulo 		= :titulo,
						ibsn		= :ibsn,
						precio		= :precio,
						prologo		= :prologo,
						imagen		= :imagen,
						editorial	= :editorial,
						id_autor	= :id_autor
						WHERE id = :id";	
		$arraySql = array(
						"titulo" 	=> $this->titulo,
						"ibsn" 		=> $this->ibsn,
						"precio" 	=> $this->precio,
						"prologo" 	=> $this->prologo,
						"imagen" 	=> $this->imagen,
						"editorial" => $this->editorial,
						"id_autor" 	=> $this->id_autor,
						"id" 		=> $this->id,
					);
		
		$retorno = $this->inputarCambio($sqlInsert, $arraySql);
		return $retorno;

	}

	public function borrar(){

		$sqlInsert = "UPDATE libros SET estado = 0 WHERE id = :id";	
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

		$sql = "SELECT * FROM libros WHERE estado = 1 ";

		if(isset($arrayFiltros['busqueda']) && $arrayFiltros['busqueda'] != "" ){
			$sql .= " AND (titulo LIKE ('%".$arrayFiltros['busqueda']."%') ";
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

		$sql = "SELECT count(id) as total FROM libros 
					WHERE estado = 1";

		if(isset($arrayFiltros['busqueda']) && $arrayFiltros['busqueda'] != "" ){
			$sql .= " AND (titulo LIKE ('%".$arrayFiltros['busqueda']."%') ";
		}

		$arrayDatos = array();
		$retorno = 0;

		$respuesta = $this->cargarDatos($sql, $arrayDatos);
		foreach($respuesta as $total){
			$retorno = $total['total'];
		}

		return $retorno;

	}

	public function cargar($idAutor){


		$sql = "SELECT * FROM libros WHERE id = :id";
		$arrayDatos = array();
		$arrayDatos['id'] = $idAutor;

		$respuesta = $this->cargarDatos($sql, $arrayDatos);

		foreach($respuesta as $libros){

			$this->id 			= $libros['id'];
			$this->titulo 		= $libros['titulo'];
			$this->ibsn			= $libros['ibsn'];
			$this->precio 		= $libros['precio'];
			$this->prologo 		= $libros['prologo'];
			$this->editorial	= $libros['editorial'];
			$this->anio 		= $libros['id'];
			$this->id_autor 	= $libros['id_autor'];
			$this->imagen		= $libros['imagen'];

		}

	}


}










?>



