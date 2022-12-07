<?PHP

	require_once("modelos/autores.php");


	$objAutores = new autores();

	$filtros = array("estado" => "0", "pagina" => 1, "totalRegistro" => 1000000);

	$listaAutores = $objAutores->listar($filtros);

	$objAutores->obtenerEnum();

	die();

	print_r($listaAutores);

	$archivo = fopen("archivos/csv/reportes_autores_borrado.csv", "w+");

	foreach($listaAutores as $autores){


		fwrite($archivo,$autores['nombre']."\n");

	}

	fclose($archivo);


?>