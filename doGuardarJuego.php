<?php
ini_set('display_errors, 1');
require_once "datos.php";
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$trailer = $_POST["trailer"];
$fechaLanzamiento = $_POST["fechaLanzamiento"];
$imagen = $_FILES["imagen"];
$desarrollador = $POST["desarrollador"];
$consolas =  $POST["consolas"];
$generos = $POST["generos"];
$trailer = $POST["trailer"];

$id = guardarJuego($nombre, $descripcion, $fechaLanzamiento, $imagen, $desarrollador,
                        $consolas, $generos, $trailer);
header("location:index.php");