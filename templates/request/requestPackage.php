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

<title>Chez Bébert - Forfaits</title>

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
					<h1>FORFAITS</h1>
				</th>
				<th><img src="../../images/chezbebert_logo.png" height="150px"></th>
			</tr>
		</table>
	</div>

	<h2>Liste des forfaits trouvés</h2>
	<div id='result'>
		<table style='width: 100%'>
			<tr>
				<th>Id du forfait</th>
				<th>Nom</th>
				<th>Année</th>
				<th>Kilométrage</th>
				<th>Prix</th>
			</tr>
		
<?php

require_once (__DIR__ . '/../../config.php');
require_once (__DIR__ . '/../../includes/objects/PackageRequest.class.php');

$id_package = $_POST ['id_package'];
$name = $_POST ['name'];
$year = $_POST ['year'];
$kilometerage = $_POST ['kilometerage'];

$query = new PackageRequest($id_package, $name, $year, $kilometerage);

$mysqli = new mysqli($server, $user, $password, $database);

$result = $mysqli->query($query->getRequest());
if ($result == false)
{
    echo 'Aucun forfait trouvé... <a href="../..">Revenir en arrière</a>';
}
else
{
    for($i = 1; $i <= $result->num_rows; $i ++)
    {
        $fetcharray = $result->fetch_array();
        $id = $fetcharray ['id_package'];
        $name = $fetcharray ['name'];
        $year = $fetcharray ['year'];
        $kilometerage = $fetcharray ['kilometerage'];
        $price = $fetcharray['price'];
        echo "<tr>
                <th>$id</th>
				<th>$name</th>
				<th>$year</th>
				<th>$kilometerage</th>
                <th>$price</th>
			</tr>";
    }
}
?>
</table>
	</div>


</body>
</html>

