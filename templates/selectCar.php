<?php
session_start();

if (! isset($_SESSION ['name']))
{
    header("Location: /garage_bebert/templates/connection.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link rel='stylesheet' href='../modules/css/index.css' />

<title>Chez Bébert - Selectionner la voiture</title>

</head>

<body>
	<table style='width: 100%'>
		<tr>
			<th>
				<nav>
					<a href='../' title='accueil'>Accueil</a>
				</nav>
			</th>
			<th>
				<nav>
					<a href='../includes/sessions/disconnection.php'
						title='Se déconnecter'>Se déconnecter</a>
				</nav>
			</th>
		</tr>
	</table>
	<div id='header'>
		<table style='width: 100%'>
			<tr>
				<th><img src="../images/chezbebert_logo.png" height="150px"></th>
				<th>
					<h1>VÉHICULES</h1>
				</th>
				<th><img src="../images/chezbebert_logo.png" height="150px"></th>
			</tr>
		</table>
	</div>

	<h2>Liste des véhicules trouvés</h2>
	<div id='result'>
		<table style='width: 100%'>
			<tr>
				<th>Plaque d'immatriculation</th>
				<th>Marque du véhicule</th>
				<th>Modèle du véhicule</th>
				<th>Année de mise en circulation</th>
				<th>Kilométrage</th>
				<th>Id du client</th>
			</tr>
		
<?php

require_once (__DIR__ . '/../config.php');
require_once (__DIR__ . '/../includes/objects/CarRequest.class.php');
require_once '../includes/objects/Form.class.php';

$registration = $_POST ['registration'];
$brand = $_POST ['brand'];
$model = $_POST ['model'];
$year = $_POST ['year'];
$kilometerage = $_POST ['kilometerage'];
$id_customer = $_SESSION ['request'] ['customer'] ['id_customer'];
$query = new CarRequest($id_customer, $registration, $brand, $model, $year, $kilometerage);
$mysqli = new mysqli($server, $user, $password, $database);

$result = $mysqli->query($query->getRequest());

if ($result == false)
{
    echo 'Aucune voiture trouvée... <a href="newRepair.php">Revenir en arrière</a>';
}
else
{
    for($i = 1; $i <= $result->num_rows; $i ++)
    {
        $fetcharray = $result->fetch_array();
        $id = $fetcharray ['id_customer'];
        $registration = $fetcharray ['registration'];
        $brand = $fetcharray ['brand'];
        $model = $fetcharray ['model'];
        $year = $fetcharray ['year'];
        $kilometerage = $fetcharray ['kilometerage'];
        echo "<tr>
                <th>$registration</th>
                <th>$brand</th>
                <th>$model</th>
                <th>$year</th>
                <th>$kilometerage</th>
                <th>$id</th>
			</tr>";
    }
}
?>
</table>
	</div>

	<h2>Selectionner la plaque d'immatriculation de la voiture concernée</h2>
<?php
$array = array (array ("Plaque d'immatriculation",'registration' ) );
$form = new FormObject('newRepairs.php', $array);
echo $form->getHTML();
$_SESSION ['oldpage'] = 'selectCar';
?>

</body>
</html>

