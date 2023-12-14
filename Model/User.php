<?php
class User{
    private $id;

    private $email;

    private $password;


    public function __construct($id, $email, $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email): void
    {
        $this->email = $email;
    }


    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }


}