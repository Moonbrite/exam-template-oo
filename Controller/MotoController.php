<?php

class MotoController extends UserController
{

    private $motoManager;


    public function __construct()
    {
        parent::__construct();
        $this->motoManager = new MotoManager();
    }

    public function findAll(){

        $allMoto = $this->motoManager->findAll();

        require 'View/Moto/la-page.php';
    }

    public function detail($id){

        $detail = $this->motoManager->getOne($id);

        if(!is_null($detail)){
            require 'View/Moto/detail.php';
        }else{
            header("Location: index.php?controller=moto&action=list");
        }

    }

    public function delete($id){

        $delete = $this->motoManager->oneDelete($id);

        header("Location: index.php?controller=moto&action=list");
    }

    public function add() {

        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $errors = $this->isValid();
            if (count($errors)== 0){

                if ($_FILES["photos"]["size"] != 0){
                    $nameAssets = "assets/" . uniqid() . '-' . $_FILES["photos"]["name"];
                    move_uploaded_file($_FILES["photos"]["tmp_name"],$nameAssets);
                }else{
                    $nameAssets = "Public/Img/no-image.png";
                }

                $moto = new Moto(null,$_POST["mark"],$_POST["model"],$_POST["type"],$nameAssets);

                $this->motoManager->insert($moto);

                header("Location: index.php?controller=moto&action=list");
            }
        }
        require 'View/Moto/form.php';
    }

    public function edit($id) {

        $errors = [];

        $motoEdit = $this->motoManager->getOne($id);

        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            $motoEdit->setMark($_POST["mark"]);
            $motoEdit->setModel($_POST["model"]);
            $motoEdit->setType($_POST["type"]);

            $errors = $this->isValid();

            if (count($errors)== 0){
                if ($_FILES["photos"]["size"] != 0){
                    move_uploaded_file($_FILES["photos"]["tmp_name"],$motoEdit->getPicture());
                }
                $this->motoManager->editOne($motoEdit);

                header("Location: index.php?controller=moto&action=list");
            }
        }
        require 'View/Moto/edit.php';
    }

    public function sort($type)
    {
        $alloftype = $this->motoManager->getByType($type);
        require"View/Moto/type.php";
    }

    private function isValid(){
        $errors = [];


        if (empty($_FILES)){
            if (!in_array($_FILES["photos"]["type"], Moto::$allwoedExtension)){ //
                $errors["photos"] = "Ne respecte pas les extension autauriser";
            }
        }
        if ($_FILES["photos"]["size"] > 2097152) {
            $errors ["photos"] = "Image trop lourde";
        }elseif (strlen($_FILES["photos"]["name"]) > 250){
            $errors ["photos"] = "Veuillez mettre une image avec moin de 250 caractére";
        }

        if (empty($_POST["mark"])){
            $errors ["mark"] = "Veuillez mettre une marque";
        }elseif (strlen($_POST["mark"]) > 250){
            $errors ["mark"] = "Veuillez mettre un model avec moin de 250 caractére";
        }

        if (empty($_POST["model"])){
            $errors ["model"] = "Veuillez mettre un model";
        }elseif (strlen($_POST["model"]) > 250){
            $errors ["model"] = "Veuillez mettre un model avec moin de 250 caractére";
        }

        if (empty($_POST["type"])){
            $errors["type"] = "Veuiller renter un type";
        }elseif(!in_array($_POST["type"],Moto::$allwoedType)){
            $errors["type"] = "Ne respecte pas les types autauriser";
        }

        return $errors;
    }

}