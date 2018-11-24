<?php
require_once (__DIR__ . '\..\config.php');

class Database extends mysqli
{

    public function __construct()
    {
        parent::__construct();
    }

    public function test_connect()
    {
        /**
         * Connection � la base de donn�e
         */
        $mysqli = new mysqli($server, $user, $password, $database);
        
        // V�rification de la connexion */
        if ($mysqli->connect_errno) {
            printf("�chec de la connexion : %s\n", $mysqli->connect_error);
            exit();
        }
        
        /* "Create table" ne retournera aucun jeu de r�sultats */
        // if ($mysqli->query("CREATE TEMPORARY TABLE myCity LIKE clients") === TRUE) {
        // printf("Table myCity cr��e avec succ�s.\n");
        // }
        
        /* Requ�te "Select" retourne un jeu de r�sultats */
        if ($result = $mysqli->query("SELECT nom, prenom FROM clients LIMIT 10")) {
            $biye = $result->fetch_array();
            $biye = $result->fetch_array();
            var_dump($biye);
            printf("Le nom du premier client est " . $biye['nom'] . " et son pr�nom est " . $biye['prenom']);
            $result->close();
        }
        
        $query = "INSERT INTO clients (`numero`, `nom`, `prenom`, `adresse`, `suivi`) VALUES (2,	'Joyeux',	'Alexandre',	'5 rue Alphonse Daudet',	NULL)";

        if ($mysqli->query($query)) {
            printf("Ajout r�ussi");
        }
        
        $mysqli->close();
    }
}