<?php

class CarPart
{

    private $idPart;

    private $brand;

    private $model;

    private $year;

    private $price;

    /**
     *
     * @param int $idPart
     */
    public function __construct($idPart)
    {
        $this->idPart = $idPart;
    }

    /**
     *
     * @param int $idPart
     */
    public function setIdPart($idPart)
    {
        $this->idPart = $idPart;
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
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     *
     * @return int
     */
    public function getIdPart()
    {
        return $this->idPart;
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
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
}