<?php
/**
 * Connection � la base de donn�e
 */
require_once (__DIR__ . '\config.php');

$mysqli = new mysqli($server, $user, $password, $database);
var_dump($mysqli);

printf("test");

/* V�rification de la connexion */
if ($mysqli->connect_errno) {
    printf("�chec de la connexion : %s\n", $mysqli->connect_error);
    exit();
}

/* "Create table" ne retournera aucun jeu de r�sultats */
if ($mysqli->query("CREATE TEMPORARY TABLE myCity LIKE clients") === TRUE) {
    printf("Table myCity cr��e avec succ�s.\n");
}

var_dump($mysqli);
/* Requ�te "Select" retourne un jeu de r�sultats */
if ($result = $mysqli->query("SELECT nom FROM clients LIMIT 10")) {
    printf("Select a retourn� %d lignes.\n", $result->num_rows);
    
    /* Lib�ration du jeu de r�sultats */
    $result->close();
}

var_dump($mysqli);

$mysqli->close();

?>