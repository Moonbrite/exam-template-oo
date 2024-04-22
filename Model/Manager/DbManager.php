<?php

abstract class DbManager
{

    private $host = "localhost";
    private $dbName = "exam_mvc";
    private $user = "root";
    private $password = "";

    protected $bdd;

    public function __construct()
    {
        return $this->bdd = new PDO(
            'mysql:host=' . $this->host . ';dbname=' . $this->dbName . ';charset=utf8',
            $this->user,
            $this->password);
        // Cette ligne demandera à pdo de renvoyer les erreurs SQL si il y en a
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

}