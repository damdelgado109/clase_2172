
<?php

	$ruta = isset($_GET['r'])?$_GET['r']:"";

	if($ruta == "autores"){
		include("vistas/autores_vista.php");
	}elseif($ruta == "generos"){
		include("vistas/generos_vista.php");
	}elseif($ruta == "libros"){
		include("vistas/libros_vista.php");
	}elseif($ruta == "clientes"){
		include("vistas/clientes_vista.php");
	}elseif($ruta == "facturas"){
		include("vistas/facturas_vista.php");
	}	


?>
