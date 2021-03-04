<!DOCTYPE html>
<?php

    ini_set('display_errors, 1');
    require_once 'datos.php';
    
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];
    $email = $_POST["email"];
    
    $registroExitoso = registrarUsuario($usuario, $clave, $email);
    
    if(!$registroExitoso)
    {
        header('location:registro.php?err=1');
    }
    else
    {
        $usuarioLogueado = login($email, $clave);
        if($usuarioLogueado){
            session_start();
            $_SESSION['usuarioLogueado'] = $usuarioLogueado;
            header('location:index.php');
        }else{
            header('location:login.php?err=1');
        }
    }
    
