<?php
/*
require_once 'datos.php';
ini_set("display_errors", 1);
error_reporting(E_ERROR);

$mySmarty = getSmarty();

$juego = getProducto(14);
//$juego = getJuegoConMasComentarios();

$mySmarty->assign("jueg", $juego);
$mySmarty->display("juego_destacado.tpl");