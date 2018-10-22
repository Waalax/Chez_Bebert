<?php

/**
 * Classe support de l'objet R�paration (Repair).
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
     * M�thode de construction de l'objet R�paration (Repair).
     *
     * @param int $idRepair
     */
    public function __construct($idRepair)
    {
        $this->idRepair = $idRepair;
    }

    /**
     * M�thode publique modifiant l'id de la R�paration (Repair).
     *
     * @param int $idRepair
     */
    public function setIdRepair($idRepair)
    {
        $this->idRepair = $idRepair;
    }

    /**
     * M�thode publique modifiant le num�ro d'immatriculation affect� � la R�paration (Repair).
     *
     * @param string $registrationNumber
     */
    public function setRegistrationNumber($registrationNumber)
    {
        $this->registrationNumber = $registrationNumber;
    }

    /**
     * M�thode publique modifiant les commentaires li�s � une R�paration (Repair).
     *
     * @param string $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * M�thode publique modifiant le followUp de la R�paration (Repair).
     *
     * @param string $followUp
     */
    public function setFollowUp($followUp)
    {
        $this->followUp = $followUp;
    }

    /**
     * M�thode publique modifiant l'Id du Technicien g�rant la R�paration (Repair).
     *
     * @param int $idTech
     */
    public function setIdTech($idTech)
    {
        $this->idTech = $idTech;
    }

    /**
     * M�thode publique modifiant la date d'arriv�e li�e � la R�paration (Repair).
     *
     * @param int $arrivalDate
     */
    public function setArrivalDate($arrivalDate)
    {
        $this->arrivalDate = $arrivalDate;
    }

    /**
     * M�thode publique donnant acc�s � l'id de la R�paration (Repair).
     *
     * @return int
     */
    public function getIdRepair()
    {
        return $this->idRepair;
    }

    /**
     * M�thode publique donnant acc�s � la plaque d'immatriculation associ�e � la R�paration (Repair).
     *
     * @return string
     */
    public function getRegistrationNumber()
    {
        return $this->registrationNumber;
    }

    /**
     * M�thode publique donnant acc�s aux commentaires li�s � la R�paration (Repair).
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * M�thode publique donnant acc�s au followup li� � la R�paration (Repair).
     *
     * @return string
     */
    public function getFollowUp()
    {
        return $this->followUp;
    }

    /**
     * M�thode publique donnant acc�s � l'id du technicien g�rant la R�paration (Repair).
     *
     * @return int
     */
    public function getIdTech()
    {
        return $this->idTech;
    }

    /**
     * M�thode publique donnant acc�s � la date d'arriv�e li�e � la R�paration (Repair).
     *
     * @return int
     */
    public function getArrivalDate()
    {
        return $this->arrivalDate;
    }
}
