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

echo("usuario:" .$usuarioLogueado[email]);
echo("texto:".$textoComentario);
echo("puntaje:".$puntaje);
echo("id producto: ".$id);

//echo("<br> RESULTADO COMENTARIO: ".agregarComentario("email@mail.com", 13, "lorem ipsum xd", 5));
//if(agregarComentario($usuarioLogueado["email"], $id, $textoComentario, $puntaje) == 1)
//{
//    agregarComentario($usuarioLogueado["email"], $id, $textoComentario, $puntaje)
//    header('location:index.php');
//}
//else{
//    echo('error, ya ingreso un comentario este usuario');
//}


$idUsuario = getIdUsuario($usuarioLogueado[email]);
agregarComentario($idUsuario, $id, $textoComentario, $puntaje);
    


    
    
    