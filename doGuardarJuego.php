<?php

require_once "datos.php";
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$url = $_POST["urlVideo"];
guardarJuego($nombre);
header("location:index.php");