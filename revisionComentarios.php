<?php
require_once 'datos.php';
ini_set("display_errors", 1);
error_reporting(E_ERROR);
session_start();

$mySmarty = getSmarty();

$comentarios = getComentarios();

$usuarioLogueado = NULL;
    if(isset($_SESSION['usuarioLogueado'])) {
        $usuarioLogueado = $_SESSION['usuarioLogueado'];
    }
if(usuarioEsAdmin($usuarioLogueado))
    {
        $usuarioLogueado[] = 1;
    }

$mySmarty->assign("usuarioLogueado", $usuarioLogueado);
$mySmarty->assign("comentarios", $comentarios);
$mySmarty->display("revision_comentarios.tpl");
