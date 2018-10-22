<?php

/**
 * Classe support de l'objet Client (Customer).
 * @author Simon Gaillard de Saint Germain et Alexandre Joyeux
 * @category Objets
 */
class Customer
{

    private $idCustomer;

    private $name;

    private $surname;

    private $city;

    /**
     * Méthode publique de construction de la classe Client (Customer).
     *
     * @param int $idCustomer
     */
    public function __construct($idCustomer)
    {
        $this->idCustomer = $idCustomer;
    }

    // Fonctions de modification de l'objet Client (Customer).
    
    /**
     * Méthode publique modifiant l'id du Client (Customer).
     *
     * @param int $idCustomer
     */
    public function setIdCustomer($idCustomer)
    {
        $this->idCustomer = $idCustomer;
    }

    /**
     * Methode publique modifiant le nom du Client (Customer).
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Méthode publique modifiant le prénom du Client (Customer).
     *
     * @param string $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * Méthode publique modifiant la commune du Client (Commune).
     *
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Méthode publique donnant accès à l'id du Client (Customer).
     *
     * @return int
     */
    public function getIdCustomer()
    {
        return $this->idCustomer;
    }

    /**
     * Méthode publique donnant accès au nom du Client (Customer).
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Méthode publique donnant accès au prénom du Client (Customer).
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Méthode publique donnant accès à la commune du Client (Customer).
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }
}