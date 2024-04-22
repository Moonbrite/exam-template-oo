<?php

interface ExempleInterfaceManager
{
    public function findAll();

    public function getOne($id);

    public function oneDelete($id);

    public function insert($name);

    public function editOne($objet);

    public function getByType($type);

}