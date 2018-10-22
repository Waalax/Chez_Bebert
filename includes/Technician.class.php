<?php

class Technician
{

    private $idTech;

    private $name;

    private $surname;

    private $nbCars;

    public function __construct($idTech)
    {
        $this->idTech = $idTech;
    }

    public function setIdTech($idTech)
    {
        $this->idTech = $idTech;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function setNumberOfCars($nbCars)
    {
        $this->nbCars = $nbCars;
    }

    public function getIdTech()
    {
        return $this->idTech;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getNumberOfCars()
    {
        return $this->nbCars;
    }
}