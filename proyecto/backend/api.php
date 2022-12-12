<?php


header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: POST');
header('content-type: application/json; charset=utf-8');

$json = file_get_contents('php://input');

$PARAMETROS = json_decode($json, true);

//print_r("Soy la prueba");
//var_dump($PARAMETROS );
include("ws/controlador_ws.php");

$ruta = $_GET['r'];

$respuesta = procesar($ruta, $PARAMETROS);

$respuestaJSON = json_encode($respuesta);

print_r($respuestaJSON);
//print_r($PARAMETROS['departamento']);



?>