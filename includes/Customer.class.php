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
     * M�thode publique de construction de la classe Client (Customer).
     *
     * @param int $idCustomer
     */
    public function __construct($idCustomer)
    {
        $this->idCustomer = $idCustomer;
    }

    // Fonctions de modification de l'objet Client (Customer).
    
    /**
     * M�thode publique modifiant l'id du Client (Customer).
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
     * M�thode publique modifiant le pr�nom du Client (Customer).
     *
     * @param string $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * M�thode publique modifiant la commune du Client (Commune).
     *
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * M�thode publique donnant acc�s � l'id du Client (Customer).
     *
     * @return int
     */
    public function getIdCustomer()
    {
        return $this->idCustomer;
    }

    /**
     * M�thode publique donnant acc�s au nom du Client (Customer).
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * M�thode publique donnant acc�s au pr�nom du Client (Customer).
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * M�thode publique donnant acc�s � la commune du Client (Customer).
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }
}