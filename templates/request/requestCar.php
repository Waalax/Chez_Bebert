<?php
session_start();

if (! isset($_SESSION ['name']))
{
    header("Location: /garage_bebert/templates/disconnection.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link rel='stylesheet' href='../../modules/css/index.css' />

<title>Chez Bébert - Voitures</title>

</head>

<body>
	<table style='width: 100%'>
		<tr>
			<th>
				<nav>
					<a href='../../' title='accueil'>Accueil</a>
				</nav>
			</th>
			<th>
				<nav>
					<a href='../../includes/sessions/disconnection.php'
						title='Se déconnecter'>Se déconnecter</a>
				</nav>
			</th>
		</tr>
	</table>
	<div id='header'>
		<table style='width: 100%'>
			<tr>
				<th><img src="../../images/chezbebert_logo.png" height="150px"></th>
				<th>
					<h1>VOITURES</h1>
				</th>
				<th><img src="../../images/chezbebert_logo.png" height="150px"></th>
			</tr>
		</table>
	</div>

	<h2>Liste des véhicules trouvés</h2>
	<div id='result'>
		<table style='width: 100%'>
			<tr>
				<th>Id du client</th>
				<th>Plaque d'immatriculation</th>
				<th>Marque</th>
				<th>Modèle</th>
				<th>Année de mise en circulation</th>
				<th>Kilométrage</th>
			</tr>
		
<?php

require_once (__DIR__ . '/../../config.php');
require_once (__DIR__ . '/../../includes/objects/CarRequest.class.php');

$registration = $_POST ['registration'];
$brand = $_POST ['brand'];
$model = $_POST ['model'];
$year = $_POST ['year'];
$kilometerage = $_POST ['kilometerage'];
$query = new CarRequest('', $registration, $brand, $model, $year, $kilometerage);

$mysqli = new mysqli($server, $user, $password, $database);

$result = $mysqli->query($query->getRequest());
if ($result == false)
{
    echo 'Aucun véhicule trouvé... <a href="../..">Revenir en arrière</a>';
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
                <th>$id</th>
				<th>$registration</th>
				<th>$brand</th>
				<th>$model</th>
				<th>$year</th>
				<th>$kilometerage</th>                
			</tr>";
    }
}
?>
</table>
	</div>


</body>
</html>

