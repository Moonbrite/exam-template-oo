<?php
require "loader.php";

if (empty($_GET)){
    header("Location: index.php?controller=techno&action=list"); //TODO si rien dans url redirige vers la page accueil
}

//TODO Modif Immmmportant !!!!!!!!!!!!
//TODO juste modif le premier Get SI besoin
if ($_GET["controller"] === "techno"){

    $allExemple = new ExempleController();

    if ($_GET["action"] === "list"){
        $action = $allExemple->findAll();
    }

    if ($_GET["action"] === "detail" && array_key_exists("id",$_GET)){
        $allExemple->detail($_GET["id"]);
    }

    if ($_GET["action"] === "delete" && array_key_exists("id",$_GET)){
        $allExemple->delete($_GET["id"]);
    }
    if ($_GET["action"] === "add"){
        $allExemple->add();
    }
    if($_GET["action"] === "modif" && array_key_exists("id",$_GET)){
        $allExemple->edit($_GET["id"]);
    }
}

//TODO Modif Immmmportant !!!!!!!!!!!!
//TODO juste modif le premier Get SI besoin

if($_GET["controller"] == "security") {
    $security = new SecurityController();

    if ($_GET["action"] == "register") {
        $security->register();
    }
    if ($_GET["action"] == "login") {
        $security->login();
    }
    if ($_GET["action"] == "logout") {
        $security->logout();
    }
}