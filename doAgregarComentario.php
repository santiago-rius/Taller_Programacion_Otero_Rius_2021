<?php
ini_set('display_errors, 1');
require_once "datos.php";

$textoComentario = $_POST["texto-comentario"];
$puntaje = $_POST["puntaje"];

$usuarioLogueado = NULL;
if(isset($_SESSION['usuarioLogueado'])) {
    $usuarioLogueado = $_SESSION['usuarioLogueado'];
}

$prodId = 1;
if(isset($_GET["id"])) {
    $prodId = $_GET["id"];
}
echo("usuario:" .$usuarioLogueado["id"]);
echo("producto:".$prodId);
agregarComentario($usuarioLogueado["id"], $prodId, $textoComentario, $puntaje);

//header('location:index.php');
    
    
    