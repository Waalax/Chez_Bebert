<?php

/**
 * Classe support de l'objet Réparation (Repair).
 * @author Simon GAILLARD DE SAINT-GERMAIN
 * @author Alexandre JOYEUX
 * @category Objets
 */
class Repair
{

    private $idRepair;

    private $registrationNumber;

    private $comments;

    private $followUp;

    private $idTech;

    private $arrivalDate;

    /**
     * Méthode de construction de l'objet Réparation (Repair).
     *
     * @param int $idRepair
     */
    public function __construct($idRepair)
    {
        $this->idRepair = $idRepair;
    }

    /**
     * Méthode publique modifiant l'id de la Réparation (Repair).
     *
     * @param int $idRepair
     */
    public function setIdRepair($idRepair)
    {
        $this->idRepair = $idRepair;
    }

    /**
     * Méthode publique modifiant le numéro d'immatriculation affecté à la Réparation (Repair).
     *
     * @param string $registrationNumber
     */
    public function setRegistrationNumber($registrationNumber)
    {
        $this->registrationNumber = $registrationNumber;
    }

    /**
     * Méthode publique modifiant les commentaires liés à une Réparation (Repair).
     *
     * @param string $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * Méthode publique modifiant le followUp de la Réparation (Repair).
     *
     * @param string $followUp
     */
    public function setFollowUp($followUp)
    {
        $this->followUp = $followUp;
    }

    /**
     * Méthode publique modifiant l'Id du Technicien gérant la Réparation (Repair).
     *
     * @param int $idTech
     */
    public function setIdTech($idTech)
    {
        $this->idTech = $idTech;
    }

    /**
     * Méthode publique modifiant la date d'arrivée liée à la Réparation (Repair).
     *
     * @param int $arrivalDate
     */
    public function setArrivalDate($arrivalDate)
    {
        $this->arrivalDate = $arrivalDate;
    }

    /**
     * Méthode publique donnant accès à l'id de la Réparation (Repair).
     *
     * @return int
     */
    public function getIdRepair()
    {
        return $this->idRepair;
    }

    /**
     * Méthode publique donnant accès à la plaque d'immatriculation associée à la Réparation (Repair).
     *
     * @return string
     */
    public function getRegistrationNumber()
    {
        return $this->registrationNumber;
    }

    /**
     * Méthode publique donnant accès aux commentaires liés à la Réparation (Repair).
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Méthode publique donnant accès au followup lié à la Réparation (Repair).
     *
     * @return string
     */
    public function getFollowUp()
    {
        return $this->followUp;
    }

    /**
     * Méthode publique donnant accès à l'id du technicien gérant la Réparation (Repair).
     *
     * @return int
     */
    public function getIdTech()
    {
        return $this->idTech;
    }

    /**
     * Méthode publique donnant accès à la date d'arrivée liée à la Réparation (Repair).
     *
     * @return int
     */
    public function getArrivalDate()
    {
        return $this->arrivalDate;
    }
}
