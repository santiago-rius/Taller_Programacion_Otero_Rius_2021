<!DOCTYPE html>

<?php
require_once 'datos.php';
session_start(); //si ya hay una sesion iniciada no cambia el id
$mySmarty = getSmarty();
$usuarioLogueado = NULL;
if (isset($_SESSION['usuarioLogueado'])){
    $usuarioLogueado = $_SESSION['usuarioLogueado'];
}
$categorias = getCategorias();
$catId = 1;
$categoria = getCategoria($catId);

if (isset($_GET['catId'])) {
    $catId = $_GET['catId'];
} else if (isset($_COOKIE['ultimaCategoria'])) {
    $catId = $_COOKIE['ultimaCategoria'];
}

if (isset($categoria)) {
    setCookie('ultimaCategoria', $catId ,time() + (60 * 60 * 24));
    echo $categoria["nombre"];
} else {
    echo "Categoria inexistente";
}

$juegos = getProductosDeCategoria($catId);

    $mySmarty->assign("usuarioLogueado", $usuarioLogueado);
    $mySmarty->assign("categorias", $categorias);
    $mySmarty->assign("categoria", $categoria);
    $mySmarty->assign("juegos", $juegos);
    $mySmarty->display("index.tpl");

?>

