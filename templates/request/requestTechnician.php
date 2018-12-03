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

<title>Chez Bébert - Techniciens</title>

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
					<h1>TECHNICIENS</h1>
				</th>
				<th><img src="../../images/chezbebert_logo.png" height="150px"></th>
			</tr>
		</table>
	</div>

	<h2>Liste des techniciens trouvés</h2>
	<div id='result'>
		<table style='width: 100%'>
			<tr>
				<th>Id du technicien</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Groupe</th>
			</tr>
		
<?php

require_once (__DIR__ . '/../../config.php');
require_once (__DIR__ . '/../../includes/objects/TechnicianRequest.class.php');

$name = $_POST ['name'];
$surname = $_POST ['surname'];

$query = new TechnicianRequest($name, $surname);

$mysqli = new mysqli($server, $user, $password, $database);

$result = $mysqli->query($query->getRequest());
if ($result == false)
{
    echo 'Aucun technicien trouvé... <a href="../..">Revenir en arrière</a>';
}
else
{
    for($i = 1; $i <= $result->num_rows; $i ++)
    {
        $fetcharray = $result->fetch_array();
        $id = $fetcharray ['id_technician'];
        $name = $fetcharray ['name'];
        $surname = $fetcharray ['surname'];
        $group_id = $fetcharray ['group_id'];
        echo "<tr>
                <th>$id</th>
				<th>$surname</th>
				<th>$name</th>
				<th>$group_id</th>
			</tr>";
    }
}
?>
</table>
	</div>


</body>
</html>

