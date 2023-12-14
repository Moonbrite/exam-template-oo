<?php

class ExempleController extends UserController //TODO changer le nom de la class
{

    private $exempleManger; ///TODO changer le nom de l'atributs si besoin


    public function __construct()
    {
        parent::__construct();
        $this->exempleManger = new ExempleManager();
    }

    public function findAll(){

        $allExemple = $this->exempleManger->findAll(); ///TODO changer le nom de la variable si besoin  changer exempleManger Atriburts

        require 'View/Exemple/la-page.php';  ///TODO changer le nom du require pour la View
    }

    public function detail($id){

        $detail = $this->exempleManger->getOne($id);  ///TODO changer exempleManger Atriburts

        if(!is_null($detail)){
            require 'View/Techno/detail.php';  ///TODO changer le nom de la View potentiel
        }else{
            header("Location: index.php?controller=techno&action=list"); ///TODO changer la redirection si id que je cherche n'existe pas
        }

    }

    public function delete($id){

        $delete = $this->exempleManger->oneDelete($id);  ///TODO changer exempleManger Atriburts

        header("Location: index.php?controller=techno&action=list"); //TODO changer le nom de la redirection
    }

    public function add() {

        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $errors = $this->isValid();
            if (count($errors)== 0){

                if ($_FILES["photos"]["size"] != 0){
                    $nameAssets = "assets/" . uniqid() . '-' . $_FILES["photos"]["name"];
                }

                $techno = new Exemple(null,$_POST["nom"],$nameAssets,$_POST["categorie"]); //TODO changer le nom de la Class changer les infos qu'on INSER dans l'objet

                $this->exempleManger->insert($techno);  //TODO changer exempleManger Atriburts

                header("Location: index.php?controller=techno&action=list"); //TODO changer le nom de la redirection apprés ajout
            }
        }
        require 'View/Techno/form.php'; //TODO changer le nom du require si besoin
    }

    public function edit($id) {

        $errors = [];

        $exempleEdit = $this->exempleManger->getOne($id); //TODO changer exempleManger Atriburts changer le nom de la variable $exempleEdit

        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            $exempleEdit->setNom($_POST["nom"]); //TODO rajouter tout les setters sauf la photos

            $errors = $this->isValid();

            if (count($errors)== 0){
                if ($_FILES["photos"]["size"] != 0){
                    move_uploaded_file($_FILES["photos"]["tmp_name"],$exempleEdit->getImage());
                }
                $this->exempleManger->editOne($exempleEdit); //TODO changer exempleManger Atriburts

                header("Location: index.php?controller=techno&action=list"); //TODO changer le nom de la redirection apprés une edition
            }
        }
        require 'View/Techno/edit.php'; //TODO changer le nom du require si besoin
    }

    private function isValid(){ // TODO Rajouter des vérification si besoin
        $errors = [];

        if (empty($_FILES)){
            if (!in_array($_FILES["photos"]["type"], Exemple::$allwoedExtension)){ // TODO modif le nom de la class
                $errors["photos"] = "Ne respecte pas les extension autariser";
            }
        }
        if ($_FILES["photos"]["size"] > 2097152) {
            $errors ["photos"] = "Image trop lourde";
        }

        if (empty($_POST["nom"])){
            $errors ["nom"] = "Veuillez mettre un nom";
        }

        // TODO verifier si le post et vide et la limite de 250 caractére

        return $errors;
    }

}