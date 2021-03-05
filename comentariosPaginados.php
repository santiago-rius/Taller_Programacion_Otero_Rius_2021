<?php

require_once 'datos.php';
ini_set("display_errors", 1);
error_reporting(E_ERROR);

$mySmarty = getSmarty();

$pagina = 0;
if(isset($_GET["pag"])) {
    $pagina = $_GET["pag"];
}

$prodId = 12;
if(isset($_GET["id"])) {
    $prodId = $_GET["id"];
}

echo("ID: ".$prodId);
$producto = getProducto($prodId);


$comentarios = getComentariosDeJuego($prodId);
$ultimaPagina = ultimaPaginaComentarios($prodId);

$mySmarty->assign("pagina", $pagina);
$mySmarty->assign("comentarios", $comentarios);
$mySmarty->assign("ultimaPagina", $ultimaPagina);
$mySmarty->display("comentarios_paginados.tpl");

