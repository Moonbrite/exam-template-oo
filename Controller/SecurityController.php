<?php

class SecurityController
{

    private $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    public function login(){

        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            $user = $this->userManager->findByUser();

            if ($user){

                if (password_verify($_POST["password"], $user->getPassword())){

                    session_start();

                    $_SESSION["user"] = serialize($user);

                    header("Location: index.php?controller=moto&action=list"); // TODO redirection apres la conection
                }else {
                    $error =true;
                }
            }else{
                $error =true;
            }
        }if (array_key_exists("user",$_SESSION)){
            header("Location: index.php?controller=moto&action=list"); // TODO redirection si te et deja conecter
        }

        require "View/Security/login.php"; // TODO Changer le require si besoins
    }

    public function register(){

        session_start();

        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            $errors = $this->isValidRegister();

            if (count($errors)== 0){

                $user = new User(null,$_POST["username"],password_hash($_POST["password"],PASSWORD_DEFAULT));

                $this->userManager->add($user);

                header("Location: index.php?controller=security&action=login");
            }

        }
        if (array_key_exists("user",$_SESSION)){

            header("Location: index.php?controller=moto&action=list");
        }
        require 'View/Security/register.php';
    }

    private function isValidRegister(){

        $errors = [];

        if(empty($_POST["username"])){

            $errors["username"] = "Veuillez entrer un User";

        }
        if(empty($_POST["password"])){

            $errors["password"] = "Veuillez entrer un password";

        }elseif(strlen($_POST["password"] )< 9){

            $errors["password"] = 'Le mot de passe doit contenir 8 caractére aux minimum';
        }
        if(empty($_POST["confirm-password"])){

            $errors["confirm-password"] = "Veuillez confirmer votre mot de passe";

        }elseif($_POST['password'] != $_POST['confirm-password']){

            $errors["confirm-password"] = "Veuillez mettre le meme mot de passe";
        }

        return $errors;
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: index.php?controller=security&action=login");
    }

}