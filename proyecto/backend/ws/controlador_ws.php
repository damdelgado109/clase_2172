



<?php

    require_once("ws/controlador_genero.php");
    function procesar($ruta, $arrayDatos){

        $arrayRuta = explode("/", $ruta);
        $controlador = $arrayRuta[0];
        $accion     = $arrayRuta[1];

        if($controlador == "genero"){

            if($accion == "listar"){

                $respuesta = listarGenero();

            }

        }


        return $respuesta;
    }


?>









