<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getCategorias() {
    $categorias = array(
        array("id" => 1, "nombre" => "FPS"), 
        array("id" => 2, "nombre" => "RPG"), 
        array("id" => 3, "nombre" => "RTS"), 
        array("id" => 4, "nombre" => "Casual"), 
        array("id" => 5, "nombre" => "Racing"), 
        array("id" => 6, "nombre" => "Sports")
    );
    return $categorias;
}

function getCategoria($id){
    $categoria = NULL;
    foreach (getCategorias() as $aux) {
        if ($aux["id"] == $id) {
            $categoria = $aux;
        }
    }
    return $categoria;
}

function getProductosDeCategoria($idCategoria) {
    $juegos = array();
    if ($idCategoria == 1) {
        $juegos[] = array("id" => 1,
            "nombre" => "Overwatch",
            "descripcion" => "FPS buenardo",
            "precio" => "19",
            "imagen" => "OW_cover.jpg");
        $juegos[] = array("id" => 2,
            "nombre" => "Counter Strike",
            "descripcion" => "Vas a ragequitear",
            "precio" => "FREE",
            "imagen" => "no_cover.jpg");
        $juegos[] = array("id" => 3,
            "nombre" => "Paladins",
            "descripcion" => "Como el Overwatch pero para pobres",
            "precio" => "FREE",
            "imagen" => "no_cover.jpg");
        $juegos[] = array("id" => 4,
            "nombre" => "Call of Duty: Seoho Warfare",
            "descripcion" => "You will become a Oneus Stan",
            "precio" => "399",
            "imagen" => "no_cover.jpg");
    } else if ($idCategoria == 2) {
        $juegos[] = array("id" => 5,
            "nombre" => "The Elder Scrolls: Skyrim",
            "descripcion" => "Lleno de bugs pero it just works",
            "precio" => "15",
            "imagen" => "no_cover.jpg");
        $juegos[] = array("id" => 6,
            "nombre" => "The Witcher 3: The wild hunt",
            "descripcion" => "Best game ever 10/10",
            "precio" => "15",
            "imagen" => "no_cover.jpg");
        $juegos[] = array("id" => 7,
            "nombre" => "Cyberpunk 2077",
            "descripcion" => "Not worth it, esta mas roto que el Skyrim (Judy is best romance btw)",
            "precio" => "too much",
            "imagen" => "no_cover.jpg");
    }
    return $juegos;
}

function getProducto($id){
    foreach (getCategorias() as $categoria){
        foreach(getProductosDeCategoria($categoria["id"]) as $aux){
            if($aux["id"]== $id) {
                return $aux;
            }
        }
    }
    
    return NULL;
}

function login($usuario, $clave) {
    if ($usuario == 'admin' && $clave == 'admin') {
        return array(
            "usuario" => "admin",
            "nombre" => "usuario de prueba"
        );
    };
    return NULL;
}

function logout() {
    unset($_SESSION['usuario']);
    session_destroy();
}
