<?php
/**
 * Connection à la base de donnée
 */
require_once (__DIR__ . '\config.php');

$mysqli = new mysqli($server, $user, $password, $database);
var_dump($mysqli);

printf("test");

/* Vérification de la connexion */
if ($mysqli->connect_errno) {
    printf("Échec de la connexion : %s\n", $mysqli->connect_error);
    exit();
}

/* "Create table" ne retournera aucun jeu de résultats */
if ($mysqli->query("CREATE TEMPORARY TABLE myCity LIKE clients") === TRUE) {
    printf("Table myCity créée avec succès.\n");
}

var_dump($mysqli);
/* Requête "Select" retourne un jeu de résultats */
if ($result = $mysqli->query("SELECT nom FROM clients LIMIT 10")) {
    printf("Select a retourné %d lignes.\n", $result->num_rows);
    
    /* Libération du jeu de résultats */
    $result->close();
}

var_dump($mysqli);

$mysqli->close();

?>