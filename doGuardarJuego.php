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


$id = guardarJuego($nombre, $descripcion, $fechaLanzamiento, $imagen, $desarrollador,
                        $generos, $trailer);

guardarConsolasParaJuego($id, $consolas);



header("location:index.php");