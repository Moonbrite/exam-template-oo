<?php
require "loader.php";
require "View/Style/style.php";
if (empty($_GET)){
    header("Location: index.php?controller=moto&action=list"); //TODO si rien dans url redirige vers la page accueil
}


$exceptionController = new ExceptionController();

if ($_GET["controller"] === "moto"){
    $allMoto = new MotoController();
    if ($_GET["action"] === "list"){
        $action = $allMoto->findAll();
    } elseif ($_GET["action"] === "detail" && array_key_exists("id",$_GET)){
        $allMoto->detail($_GET["id"]);
    } elseif ($_GET["action"] === "delete" && array_key_exists("id",$_GET)){
        $allMoto->delete($_GET["id"]);
    } elseif ($_GET["action"] === "add"){
        $allMoto->add();
    } elseif($_GET["action"] === "modif" && array_key_exists("id",$_GET)){
        $allMoto->edit($_GET["id"]);
    }elseif ($_GET["action"] == "sort" && array_key_exists("type", $_GET)) {
        $allMoto->sort($_GET["type"]);
    }
    else{
        $exceptionController->notFound();
    }
}elseif ($_GET["controller"] != "moto" and $_GET["controller"] != "security"){
    $exceptionController->notFound();
}


if($_GET["controller"] == "security") {
    $security = new SecurityController();

    if ($_GET["action"] == "register") {
        $security->register();
    } elseif ($_GET["action"] == "login") {
        $security->login();
    } elseif ($_GET["action"] == "logout") {
        $security->logout();
    } else{
        $exceptionController->notFound();
    }
}