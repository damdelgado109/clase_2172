<?php



	 function inputarCambio($sql){

		include("configuracion/configuracion.php");
		// Esto borrar solo para la clase en modo desmotrativo
		$DBDATABASE = "cursos_2172_lib";

		$conexion = new PDO("mysql:host=".$DBHOST.":".$DBPORT.";dbname=".$DBDATABASE."", $DBUSER, $DBPASSWORD);                                
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		$mysqlPrepare = $conexion->prepare($sql);
		$respuesta = $mysqlPrepare->execute(array());
		$retorno = array();
		if($respuesta){
			$retorno['codigo'] = "Ok";
		}else{
			$retorno['codigo'] = "Error";
		}
		return $retorno;
	}



	$arraySQL = array();

	$arraySQL[] = "

		SET FOREIGN_KEY_CHECKS=0;
		DROP TABLE administradores;
		DROP TABLE autores;
		DROP TABLE clientes;
		DROP TABLE generos;
		DROP TABLE libros;
		DROP TABLE libros_generos;
		DROP TABLE facturas;
		DROP TABLE factura_libro;
		SET FOREIGN_KEY_CHECKS=1;

	";


	$arraySQL[] = "CREATE TABLE `administradores` (
					`id` int(5) NOT NULL AUTO_INCREMENT,
					`nombre` varchar(50) DEFAULT NULL,
					`mail` varchar(100) DEFAULT NULL,
					`clave` varchar(100) DEFAULT NULL,
					`estado` int(1) DEFAULT NULL,
					PRIMARY KEY (`id`)
					)";
	$arraySQL[] = "CREATE TABLE `autores` (
						`id` int(10) NOT NULL AUTO_INCREMENT,
						`nombre` varchar(50) NOT NULL,
						`nacionalidad` char(3) DEFAULT NULL COMMENT 'Hace referencia al country ISO 3 Digitos',
						`fechaNacimiento` date DEFAULT NULL,
						`fechaMuerte` date DEFAULT NULL,
						`estado` tinyint(3) DEFAULT NULL,
						PRIMARY KEY (`id`)
						)";
	$arraySQL[] = "CREATE TABLE `clientes` (
					`id` int(10) NOT NULL AUTO_INCREMENT,
					`nombre` varchar(50) NOT NULL,
					`apellido` varchar(50) NOT NULL,
					`telefono` varchar(10) DEFAULT NULL,
					`mail` varchar(100) DEFAULT NULL,
					`estado` enum('Activado','Desactivado','Borrado') DEFAULT NULL,
					PRIMARY KEY (`id`)
					) ";
	$arraySQL[] = "CREATE TABLE `generos` (
					`id` int(5) NOT NULL AUTO_INCREMENT,
					`nombre` varchar(50) NOT NULL,
					`descripcion` text,
					`estado` int(3) DEFAULT NULL,
					PRIMARY KEY (`id`)
					)";

	$arraySQL[] = "CREATE TABLE `libros` (
						`id` int(50) NOT NULL AUTO_INCREMENT,
						`titulo` varchar(50) NOT NULL,
						`ibsn` varchar(100) DEFAULT NULL,
						`precio` int(6) DEFAULT NULL,
						`prologo` text,
						`imagen` varchar(50) DEFAULT NULL,
						`editorial` varchar(20) DEFAULT NULL,
						`anio` year(4) DEFAULT NULL,
						`id_autor` int(10) DEFAULT NULL,
						`estado` int(1) DEFAULT NULL,
						PRIMARY KEY (`id`),
						KEY `id_autor` (`id_autor`),
						CONSTRAINT `fk_idAutor_id` FOREIGN KEY (`id_autor`) REFERENCES `autores` (`id`)
					)";
	$arraySQL[] = "CREATE TABLE `libros_generos` (
						`id` int(100) NOT NULL AUTO_INCREMENT,
						`id_libro` int(50) NOT NULL,
						`id_genero` int(5) NOT NULL,
						PRIMARY KEY (`id`),
						KEY `id_libro` (`id_libro`),
						KEY `id_genero` (`id_genero`),
						CONSTRAINT `fk_idGenero_id` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id`),
						CONSTRAINT `fk_idLibro_id` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id`)
					)";
	$arraySQL[] = "CREATE TABLE `facturas` (
						`id` int(100) NOT NULL AUTO_INCREMENT,
						`id_cliente` int(10) NOT NULL,
						`fecha` datetime NOT NULL,
						PRIMARY KEY (`id`),
						KEY `id_cliente` (`id_cliente`),
						CONSTRAINT `fk_cliente_id` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`)
						) ";
	$arraySQL[] = "CREATE TABLE `factura_libro` (
					`id` bigint(100) NOT NULL AUTO_INCREMENT,
					`id_factura` int(10) NOT NULL,
					`id_libro` int(50) NOT NULL,
					`precio` int(6) DEFAULT NULL,
					PRIMARY KEY (`id`),
					KEY `id_factura` (`id_factura`),
					KEY `id_libro` (`id_libro`),
					CONSTRAINT `fk_factura_id` FOREIGN KEY (`id_factura`) REFERENCES `facturas` (`id`),
					CONSTRAINT `fk_libro_id` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id`)
				)";

	$arraySQL[] = "INSERT INTO `administradores` VALUES (1,'admin','mail@mail.com','21232f297a57a5a743894a0e4a801fc3',1);";


	foreach($arraySQL as $SQL){

		print_r($SQL."\n");
		inputarCambio($SQL);

	}













?>