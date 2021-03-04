
<?php
    ini_set('display_errors, 1');
    require_once 'datos.php';
    
session_start();
$usuarioLogueado = NULL;
if(isset($_SESSION['usuarioLogueado'])) {
    $usuarioLogueado = $_SESSION['usuarioLogueado'];
}

$error = isset($_GET["err"]);
$categorias = getCategorias();

$mySmarty = getSmarty();
$mySmarty->assign("categorias", $categorias);
$mySmarty->assign("usuarioLogueado", $usuarioLogueado);
$mySmarty->assign("login", 1);
$mySmarty->assign("error", $error);
$mySmarty->display("inicio_registro.tpl");
