
<?php
    ini_set('display_errors, 1');
    require_once 'datos.php';
?>

        <?php
            session_start();
            $usuarioLogueado = NULL;
            if(isset($_SESSION['usuarioLogueado'])) {
                $usuarioLogueado = $_SESSION['usuarioLogueado'];
            }

            $categorias = getCategorias();

            $mySmarty = getSmarty();
            $mySmarty->assign("categorias", $categorias);
            $mySmarty->assign("usuarioLogueado", $usuarioLogueado);
            $mySmarty->assign("login", 0);
            $mySmarty->display("inicio_registro.tpl");
        ?>
