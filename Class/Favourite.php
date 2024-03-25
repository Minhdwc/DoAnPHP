<?php
class Favourite
{
    public $id, $idUser;
    public function __construct($id, $idUser)
    {
        $this->id = $id;
        $this->idUser = $idUser;
    }
}
