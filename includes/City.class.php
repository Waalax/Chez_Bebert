<?php

/**
 * Classe support de l'objet Commune (City).
 * @author Simon Gaillard de Saint-Germain et Alexandre Joyeux
 * @category Objets
 */
class City
{

    private $name;

    private $nbCustomers;

    /**
     * Méthode publique permettant de construire l'objet Commune (City).
     *
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Méthode publique permettant de modifier le nom de la Commune (City).
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Méthode publique permettant de modifier le nombre de clients habitant dans cette Commune (City).
     *
     * @param int $nb_customers
     */
    public function setNumberOfCustomers($nbCustomers)
    {
        $this->nbCustomers = $nbCustomers;
    }

    /**
     * Méthode publique permettant d'obtenir le nom de cette Commune (City).
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Méthode publique permettant d'obtenir le nombre de clients habitant dans cette Commune (City).
     *
     * @return int
     */
    public function getNumberOfCustomers()
    {
        return $this->nbCustomers;
    }
}