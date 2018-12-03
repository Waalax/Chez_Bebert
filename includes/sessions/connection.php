<?php
require_once (__DIR__ . '/../../config.php');

$name = $_POST ['name'];
$surname = $_POST ['surname'];

$mysqli = new mysqli($server, $user, $password, $database);
$query = "SELECT id_technician, name, surname, password, group_id FROM technicians WHERE name = '" . $name . "' AND surname = '" . $surname . "'";
if (! $mysqli->query($query))
{
    echo 'Mauvais identifiant ou mot de passe !';
    $mysqli->close();
}
else
{
    $resultat = $mysqli->query($query)->fetch_array();
    $isPasswordCorrect = password_verify($_POST ['password'], $resultat ['password']);
    if ($isPasswordCorrect)
    {
        session_start();
        $_SESSION ['id_technician'] = $resultat ['id_technician'];
        $_SESSION ['name'] = $name;
        $_SESSION ['surname'] = $surname;
        $_SESSION ['group_id'] = $resultat ['group_id'];
        $_SESSION ['request'] = array ();
        $_SESSION ['oldpage'] = '';
        header("Location: /garage_bebert/index.php");
        exit();
    }
    else
    {
        header("Location: /garage_bebert/templates/connection.html");
        exit();
    }
}
