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

			include("configuracion/configuracion.php");
			$conexion = new PDO("mysql:host=".$DBHOST.":".$DBPORT.";dbname=".$DBDATABASE."", $DBUSER, $DBPASSWORD);                                
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

			include("configuracion/configuracion.php");
			$conexion = new PDO("mysql:host=".$DBHOST.":".$DBPORT.";dbname=".$DBDATABASE."", $DBUSER, $DBPASSWORD);                                
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			
			$mysqlPrepare = $conexion->prepare($sql);		
			$mysqlPrepare->execute($arrayDatos);	
			$respuesta = $mysqlPrepare->fetchAll(PDO::FETCH_ASSOC);

			return $respuesta;

		}


	public function subirImagen($rArchivo,$rAlto,$rAncho){
			//$rArchivo = $_FILE[(Y el name de input file)];
			include("configuracion/configuracion.php");
			$archivo = $rArchivo;
			$rutaTMP = $rArchivo['tmp_name'];

			if($rArchivo['tmp_name'] == ""){
				return false;
			}	

			$tipos =  $rArchivo['type'];
			switch ($tipos){
				case "image/png":
					$tipo = "png";
					break;
				case "image/jpeg":
					$tipo = "jpg";
					break;
				case "image/jpg":
					$tipo = "jpg";
					break;
				case "image/PNG":
					$tipo = "PNG";
					break;
				case "image/JPEG":
					$tipo = "jpg";
					break;
				case "image/JPG":
					$tipo = "JPG";
					break;
				default:
					return false;
					break;
			}
			$nombre			= uniqid().".".$tipo;
			$rutaTMPlocal 	= $RUTATMP.$nombre;
			$rutaFinal		= $RUTAIMG.$nombre;

			if(copy($rutaTMP, $rutaTMPlocal)){

				//Cargo en memoria la imagen que quiero redimensionar
				// antes de cargar verifico si la imagen es png  
				if($tipo == "png" || $tipo == "PNG"){
					$imagen_original = imagecreatefrompng($rutaTMPlocal);
				}else{
					$imagen_original = imagecreatefromjpeg($rutaTMPlocal);
				}
				//Obtengo el ancho de la imagen quecargue
				$ancho_original = imagesx($imagen_original);
				//Obtengo el alto de la imagen que cargue
				$alto_original = imagesy($imagen_original);
				//Va el alto y el ancho con que el que queda la foto
				$alto_final = $rAlto;
				$ancho_final = $rAncho;
				//Creo una imagen vacia, con el alto y el ancho que tendrla imagen redimensionada
				$imagen_redimensionada = imagecreatetruecolor($ancho_final, $alto_final);
				//Copio la imagen original con las nuevas dimensiones a la imagen en blanco que creamos en la linea anterior
				imagecopyresampled($imagen_redimensionada, $imagen_original, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho_original, $alto_original);
				//Guardo la imagen ya redimensionada
				// antes de guardar la imagen valido si la misma es png
				if($tipo == "png" || $tipo == "PNG"){
					imagepng($imagen_redimensionada,$rutaFinal);
				}else{
					imagejpeg($imagen_redimensionada,$rutaFinal);
				}
				//Libero recursos, destruyendo las imagenes que estaban en memoria
				imagedestroy($imagen_original);
				imagedestroy($imagen_redimensionada);
				//Borramos la primera imagen subida al servidor
				unlink($rutaTMPlocal );
				return $nombre; 

			}else{
				return false;
			}
					
		}


	}

?>

