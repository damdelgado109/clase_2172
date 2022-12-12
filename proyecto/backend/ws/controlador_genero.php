<?php


    function listarGenero(){

        require_once("modelos/genero.php");
        $objGenero = new genero();
        $arrayFiltros 	= array("totalRegistro"=>20, "pagina"=>1);    
        $listaGenero   = $objGenero->listar($arrayFiltros);
        return $listaGenero;

    }
    


        

    







?>