<?php
require_once 'datos.php';
ini_set("display_errors", 1);
error_reporting(E_ERROR);

$mySmarty = getSmarty();

$pagina = 0;
if(isset($_GET["pag"])) {
    $pagina = $_GET["pag"];
}

$id = 1;
if(isset($_GET["idJuego"])) {
    $id = $_GET["idJuego"];
}

$usuario = 1;
if(isset($_GET["usuario"])) {
    $usuario = $_GET["usuario"];
}

$err = isset($_GET["err"]);

$comentarios = getComentariosDeJuego($id, $pagina);
$ultimaPagina = ultimaPaginaComentarios($id, $pagina);

$mySmarty->assign("pagina", $pagina);
$mySmarty->assign("comentarios", $comentarios);
$mySmarty->assign("ultimaPagina", $ultimaPagina);
$mySmarty->assign("id_juego", $id);
$mySmarty->assign("err", $err);
$mySmarty->display("comentarios_paginados.tpl");

