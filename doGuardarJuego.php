<?php
ini_set('display_errors, 1');
require_once "datos.php";
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$trailer = $_POST["trailer"];
$fechaLanzamiento = $_POST["fechaLanzamiento"];
$imagen = $_POST["imagen"];
$desarrollador = $_POST["desarrollador"];
$consolas =  $_POST["consolas"];
$generos = $_POST["generos"];
$trailer = $_POST["trailer"];

echo($nombre.'<br>');
echo($descripcion.'<br>');
echo($fechaLanzamiento.'<br>');
echo($imagen.'<br>');
echo($generos.'<br>');
echo($desarrollador.'<br>');
echo($trailer.'<br>');
echo($consolas.'<br>');


$id = guardarJuego($nombre, $descripcion, $fechaLanzamiento, $imagen, $desarrollador,
                        $consolas, $generos, $trailer);

echo($id);
//header("location:index.php");