<?php
ini_set('display_errors, 1');
require_once "datos.php";

$id_comentario = $_POST["boton-borrar-comentario"];


borrarComentario($id_comentario);

header('location:revisionComentarios.php');