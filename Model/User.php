<?php
class User{
    private $id;

    private $userName;

    private $password;


    public function __construct($id, $userName, $password)
    {
        $this->id = $id;
        $this->userName = $userName;
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

    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserName($userName): void
    {
        $this->userName = $userName;
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