<?php

/**
 * Classe support de l'objet Forfait (Package).
 * @author Simon GAILLARD DE SAINT-GERMAIN
 * @author Alexandre JOYEUX
 * @category Objets
 */
class Package
{

    private $idPackage;

    private $model;

    private $year;

    private $mileage;

    private $price;

    /**
     * Méthode publique de construction de la classe Forfait (Package).
     *
     * @param int $idPackage
     */
    public function __construct($idPackage)
    {
        $this->idPackage = $idPackage;
    }

    /**
     * Méthode publique modifiant l'id du Forfait (Package).
     *
     * @param int $idPackage
     */
    public function setIdPackage($idPackage)
    {
        $this->idPackage = $idPackage;
    }

    /**
     * Méthode publique modifiant le modèle lié au Forfait (Package).
     *
     * @param string $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * Méthode publique modifiant l'année liée au Forfait (Package).
     *
     * @param int $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * Méthode publique modifiant le kilométrage lié au Forfait (Package).
     *
     * @param float $mileage
     */
    public function setMileage($mileage)
    {
        $this->mileage = $mileage;
    }

    /**
     * Méthode publique modifiant le prix du Forfait (Package).
     *
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Méthode publique donnant accès à l'id du Forfait (Package).
     *
     * @return int
     */
    public function getIdPackage()
    {
        return $this->idPackage;
    }

    /**
     * Méthode publique donnant accès au modèle lié au Forfait (Package).
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Méthode publique donnant accès à l'année liée au Forfait (Package).
     *
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Méthode publique donnant accès au kilométrage lié au Forfait (Package).
     *
     * @return float
     */
    public function getMileage()
    {
        return $this->mileage;
    }

    /**
     * Méthode publique donnant accès au prix du Forfait (Package).
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
}