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
     * M�thode publique de construction de la classe Forfait (Package).
     *
     * @param int $idPackage
     */
    public function __construct($idPackage)
    {
        $this->idPackage = $idPackage;
    }

    /**
     * M�thode publique modifiant l'id du Forfait (Package).
     *
     * @param int $idPackage
     */
    public function setIdPackage($idPackage)
    {
        $this->idPackage = $idPackage;
    }

    /**
     * M�thode publique modifiant le mod�le li� au Forfait (Package).
     *
     * @param string $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * M�thode publique modifiant l'ann�e li�e au Forfait (Package).
     *
     * @param int $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * M�thode publique modifiant le kilom�trage li� au Forfait (Package).
     *
     * @param float $mileage
     */
    public function setMileage($mileage)
    {
        $this->mileage = $mileage;
    }

    /**
     * M�thode publique modifiant le prix du Forfait (Package).
     *
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * M�thode publique donnant acc�s � l'id du Forfait (Package).
     *
     * @return int
     */
    public function getIdPackage()
    {
        return $this->idPackage;
    }

    /**
     * M�thode publique donnant acc�s au mod�le li� au Forfait (Package).
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * M�thode publique donnant acc�s � l'ann�e li�e au Forfait (Package).
     *
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * M�thode publique donnant acc�s au kilom�trage li� au Forfait (Package).
     *
     * @return float
     */
    public function getMileage()
    {
        return $this->mileage;
    }

    /**
     * M�thode publique donnant acc�s au prix du Forfait (Package).
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
}