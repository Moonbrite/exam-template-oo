<?php

class UserManager extends DbManager
{

    public function add(User $user){
        $query = $this->bdd->prepare("INSERT INTO users (email,password) VALUES(:email,:password)");
        $query->execute(['email'=>$user->getEmail(),
            'password'=>$user->getPassword()]);
    }

    public function findByEmail(){

        $user =null;

        $query = $this->bdd->prepare("SELECT * FROM users WHERE email = :email");

        $query->execute([
            "email"=>$_POST["email"]
        ]);
        $result = $query->fetch();

        if ($result){
            $user = new User($result["id"],$result["email"],$result["password"]);
        }

        return $user;
    }

}