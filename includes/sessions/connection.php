<?php
require_once (__DIR__ . '/../../config.php');

// Récupération de l'utilisateur et de son pass hashé
$pseudo = $_POST['pseudo'];

$mysqli = new mysqli($server, $user, $password, $database);
$query = "SELECT id, pass, group_id FROM users WHERE pseudo = '" . $pseudo ."'";

if (! $mysqli->query($query))
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    $resultat = $mysqli->query($query)->fetch_array();
    $isPasswordCorrect = password_verify($_POST ['pass'], $resultat ['pass']);
    if ($isPasswordCorrect)
    {
        $isPasswordCorrect = password_verify($_POST ['pass'], $resultat ['pass']);
        session_start();
        $_SESSION ['id'] = $resultat ['id'];
        $_SESSION ['pseudo'] = $pseudo;
        $_SESSION ['group_id'] = $resultat ['group_id'];
        echo "Vous êtes connecté !";
        header("Location: /garage_bebert/index.php");
        exit();
    }
    else
    {
        echo 'Mauvais identifiant ou mot de passe !';
        header("Location: /garage_bebert/templates/connection.html");
    }
}
