<?php
ini_set('display_errors, 1');
require_once "datos.php";
session_start();

$textoComentario = $_POST["textoComentario"];
$puntaje = $_POST["puntaje"];
$id = $_POST["boton-agregar-comentario"];

$usuarioLogueado = NULL;
if(isset($_SESSION['usuarioLogueado'])) {
    $usuarioLogueado = $_SESSION['usuarioLogueado'];
}

//echo("usuario:" .$usuarioLogueado[email]);
//echo("texto:".$textoComentario);
//echo("puntaje:".$puntaje);
//echo("id producto: ".$id);

$idUsuario = getIdUsuario($usuarioLogueado[email]);
if(agregarComentario($idUsuario, $id, $textoComentario, $puntaje) != false)
{
    header("location:juego.php?id=".$id);
}
else{
    header("location:juego.php?id=".$id."&err=1");
}