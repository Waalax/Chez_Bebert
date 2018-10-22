<?php

/**
 * Classe support de l'objet Voiture (Car).
 * @author Simon Gaillard de Saint-Germain et Alexandre Joyeux
 * @category Objets
 */
class Car
{

    private $registrationNumber;

    private $brand;

    private $model;

    private $year;

    private $mileage;

    private $idCustomer;

    /**
     *
     * @param string $registrationNumber
     */
    public function __construct($registrationNumber)
    {
        $this->registrationNumber = $registrationNumber;
    }

    // Fonctions de modification de l'objet Voiture (Car).
    
    /**
     *
     * @param string $registrationNumer
     */
    public function setRegistrationNumber($registrationNumer)
    {
        $this->registrationNumber = $registrationNumer;
    }

    /**
     *
     * @param string $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     *
     * @param string $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     *
     * @param int $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     *
     * @param integer $mileage
     */
    public function setMileage($mileage)
    {
        $this->mileage = $mileage;
    }

    /**
     *
     * @param int $idCustomer
     */
    public function setIdCustomer($idCustomer)
    {
        $this->idCustomer = $idCustomer;
    }

    // Fonctions d'obtention des attributs de l'objet Voiture (Car).
    
    /**
     *
     * @return string
     */
    public function getRegistrationNumber()
    {
        return $this->registrationNumber;
    }

    /**
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     *
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     *
     * @return integer
     */
    public function getMileage()
    {
        return $this->mileage;
    }

    /**
     *
     * @return int
     */
    public function getIdCustomer()
    {
        return $this->idCustomer;
    }
}