<?php

class ExempleManager extends DbManager implements ExempleInterfaceManager //TODO changer le nom de la class et implements
{

    public function findAll()
    {
        $query = $this->bdd->query("SELECT * FROM exemple "); //TODO changer le nom de la bdd From
        $resultas = $query->fetchAll();

        if ($resultas) {
            $monTab = [];
            foreach ($resultas as $resulta) {
                $monTab[] = new Exemple( //TODO changer le nom de OBJET
                    $resulta["id"]   //TODO rajouter tout les information
                );
            }
            return $monTab;
        }
    }

    public function getOne($id)
    {
        $query =$this->bdd->prepare("SELECT * FROM exemple WHERE id =:id"); //TODO changer le nom de la bdd From
        $query->execute(["id" => $id]);
        $result =$query->fetch();

        $exemple = null; //TODO Changer le nom de la variable si beesion

        if ($result){
            $exemple =  new Exemple( //TODO changer le nom de OBJET
                $result["id"] //TODO rajouter tout les information
            );
        }
        return $exemple;
    }

    public function oneDelete($id)
    {
        $query =$this->bdd->prepare("DELETE FROM exemple WHERE id =:id");//TODO changer le nom de la bdd From
        $query->execute(["id" => $id]);
    }

    public function insert($name) //TODO changer la varible name si besoins
    {
        $qury= $this->bdd->prepare("INSERT INTO exemple (nom)  VALUES (:nom)"); ///TODO changer le nom de la bdd INTO et les Values
        $qury->execute([
            "nom"=>$name->getNom(), ///TODO Rajouter des atributs utiliser le getters
        ]);

    }

    public function editOne($objet)
    {
        $query = $this->bdd->prepare("UPDATE exemple SET nom=:nom WHERE id= :id");///TODO changer le nom de la bdd UPDATE et les SET rajout
        $query->execute([
            "nom"=> $objet->getNom(),///TODO Rajouter des atributs utiliser le getters
        ]);

    }

}