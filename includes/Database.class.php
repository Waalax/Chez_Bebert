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
         * Connection à la base de donnée
         */
        $mysqli = new mysqli($server, $user, $password, $database);
        
        // Vérification de la connexion */
        if ($mysqli->connect_errno) {
            printf("Échec de la connexion : %s\n", $mysqli->connect_error);
            exit();
        }
        
        /* "Create table" ne retournera aucun jeu de résultats */
        // if ($mysqli->query("CREATE TEMPORARY TABLE myCity LIKE clients") === TRUE) {
        // printf("Table myCity créée avec succès.\n");
        // }
        
        /* Requête "Select" retourne un jeu de résultats */
        if ($result = $mysqli->query("SELECT nom, prenom FROM clients LIMIT 10")) {
            $biye = $result->fetch_array();
            $biye = $result->fetch_array();
            var_dump($biye);
            printf("Le nom du premier client est " . $biye['nom'] . " et son prénom est " . $biye['prenom']);
            $result->close();
        }
        
        $query = "INSERT INTO clients (`numero`, `nom`, `prenom`, `adresse`, `suivi`) VALUES (2,	'Joyeux',	'Alexandre',	'5 rue Alphonse Daudet',	NULL)";

        if ($mysqli->query($query)) {
            printf("Ajout réussi");
        }
        
        $mysqli->close();
    }
}