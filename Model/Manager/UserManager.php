<?php

class UserManager extends DbManager
{

    public function add(User $user){
        $query = $this->bdd->prepare("INSERT INTO users (username,password) VALUES(:username,:password)");
        $query->execute([
            'username'=>$user->getUserName(),
            'password'=>$user->getPassword()]);
    }

    public function findByUser(){

        $user =null;

        $query = $this->bdd->prepare("SELECT * FROM users WHERE username = :username");

        $query->execute([
            "username"=>$_POST["username"]
        ]);
        $result = $query->fetch();

        if ($result){
            $user = new User($result["id"],$result["username"],$result["password"]);
        }

        return $user;
    }

}