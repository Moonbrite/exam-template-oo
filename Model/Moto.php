<?php

class Moto
{
    public static $allwoedExtension = ["image/jpeg", "image/png"];

    public static $allwoedType = ["Enduro", "Custom", "Sportive", "Roadster"];


    private $id;

    private $mark;

    private $model;

    private $type;

    private $picture;

    public function __construct($id,$mark, $model, $type, $picture)
    {
        $this->id = $id;
        $this->mark = $mark;
        $this->model = $model;
        $this->type = $type;
        $this->picture = $picture;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getMark()
    {
        return $this->mark;
    }

    public function setMark($mark)
    {
        $this->mark = $mark;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

}