<?php
session_start();

if (! isset($_SESSION ['name']) and $_SESSION ['group_id'] = ! 1)
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

<title>Chez Bébert - Pièces</title>

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
					<h1>ACCUEIL - PIECES</h1>
				</th>
				<th><img src="../../images/chezbebert_logo.png" height="150px"></th>
			</tr>
		</table>
	</div>

	<h2>Liste des pièces trouvées</h2>
	<div id='result'>
		<table style='width: 100%'>
			<tr>
				<th>Id de la pièce</th>
				<th>Nom</th>
				<th>Marque du véhicule</th>
				<th>Modèle</th>
				<th>Année</th>
				<th>Prix</th>
			</tr>
		
<?php

require_once (__DIR__ . '/../../config.php');
require_once (__DIR__ . '/../../includes/objects/PartRequest.class.php');

$id_part = $_POST ['id_part'];
$name = $_POST ['name'];
$brand = $_POST ['brand'];
$model = $_POST ['model'];
$year = $_POST ['year'];

$query = new PartRequest($brand, $name, $year, $model, $id_part);

$mysqli = new mysqli($server, $user, $password, $database);

$result = $mysqli->query($query->getRequest());
if ($result == false)
{
    echo 'Aucune pièce trouvée... <a href="../..">Revenir en arrière</a>';
}
else
{
    for($i = 1; $i <= $result->num_rows; $i ++)
    {
        $fetcharray = $result->fetch_array();
        $id = $fetcharray ['id_part'];
        $name = $fetcharray ['name'];
        $brand = $fetcharray ['brand'];
        $model = $fetcharray ['model'];
        $year = $fetcharray ['year'];
        $price = $fetcharray ['price'];
        echo "<tr>
                <th>$id</th>
				<th>$name</th>
				<th>$brand</th>
				<th>$model</th>
				<th>$year</th>
				<th>$price</th>
                
			</tr>";
    }
}
?>
</table>
	</div>


</body>
</html>

