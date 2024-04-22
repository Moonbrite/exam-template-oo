<?php

class MotoManager extends DbManager implements ExempleInterfaceManager
{

    public function findAll()
    {
        $query = $this->bdd->query("SELECT * FROM motos ");
        $resultas = $query->fetchAll();

        if ($resultas) {
            $monTab = [];
            foreach ($resultas as $resulta) {
                $monTab[] = new Moto(
                    $resulta["id"],
                    $resulta["mark"],
                    $resulta["model"],
                    $resulta["type"],
                    $resulta["picture"]
                );
            }
            return $monTab;
        }
    }

    public function getOne($id)
    {
        $query =$this->bdd->prepare("SELECT * FROM motos WHERE id =:id");
        $query->execute(["id" => $id]);
        $result =$query->fetch();

        $moto = null;

        if ($result){
            $moto =  new Moto(
                $result["id"],
                $result["mark"],
                $result["model"],
                $result["type"],
                $result["picture"]
            );
        }

        return $moto;
    }

    public function oneDelete($id)
    {
        $query =$this->bdd->prepare("DELETE FROM motos WHERE id =:id");
        $query->execute(["id" => $id]);
    }

    public function insert($name)
    {
        $qury= $this->bdd->prepare("INSERT INTO motos (mark,model,type,picture)  VALUES (:mark,:model,:type,:picture)");
        $qury->execute([
            "mark"=>$name->getMark(),
            "model"=>$name->getModel(),
            "type"=>$name->getType(),
            "picture"=>$name->getPicture()
        ]);

    }

    public function editOne($objet)
    {
        $query = $this->bdd->prepare("UPDATE motos SET mark=:mark,model=:model,type=:type WHERE id= :id");
        $query->execute([
            "mark"=>$objet->getMark(),
            "model"=>$objet->getModel(),
            "type"=>$objet->getType(),
            "id"=>$objet->getId(),
        ]);

    }

    public function getByType($type){
        $arrayObjet = [];
        $query = $this->bdd->prepare("SELECT * FROM motos WHERE type = :type");
        $query->execute(["type"=>$type]);
        $results = $query->fetchAll();
        foreach($results as $result){
            $arrayObjet[]= new Moto(
                $result["id"],
                $result["mark"],
                $result["model"],
                $result["type"],
                $result["picture"]
            );
        }
        return $arrayObjet;
    }

}