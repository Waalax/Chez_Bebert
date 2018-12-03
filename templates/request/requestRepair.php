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

<title>Chez Bébert - Réparations</title>

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
					<h1>RÉPARATIONS</h1>
				</th>
				<th><img src="../../images/chezbebert_logo.png" height="150px"></th>
			</tr>
		</table>
	</div>

	<h2>Liste des réparations trouvées</h2>
	<div id='result'>
		<table style='width: 100%'>
			<tr>
				<th>Id de la réparation</th>
				<th>Id du technicien</th>
				<th>Plaque d'immatriculation</th>
				<th>Type</th>
				<th>Commentaire</th>
				<th>Date de la réparation</th>
			</tr>
		
<?php

require_once (__DIR__ . '/../../config.php');
require_once (__DIR__ . '/../../includes/objects/RepairRequest.class.php');

$array = array (array ('Id du technicien','id_technician' ),
        array ("Plaque d'immatriculation",'registration' ),
        array ("Type de réparation",'type' ),
        array ("Date d'arrivée (format AAAA-MM-JJ)",'date_arrival' ) );

$id_technician = $_POST ['id_technician'];
$registration = $_POST ['registration'];
$type = $_POST ['type'];
$date_arrival = $_POST ['date_arrival'];

$query = new RepairRequest($id_technician, $registration, $type, $date_arrival);
$mysqli = new mysqli($server, $user, $password, $database);

$result = $mysqli->query($query->getRequest());
if ($result == false)
{
    echo 'Aucune réparation trouvée... <a href="../..">Revenir en arrière</a>';
}
else
{
    for($i = 1; $i <= $result->num_rows; $i ++)
    {
        $fetcharray = $result->fetch_array();
        $id = $fetcharray ['id_rep'];
        $id_technician = $fetcharray ['id_technician'];
        $type = $fetcharray ['type'];
        $registration = $fetcharray ['registration'];
        $comments = $fetcharray ['comments'];
        $date_arrival = $fetcharray ['date_arrival'];
        echo "<tr>
                <th>$id</th>
				<th>$id_technician</th>
				<th>$registration</th>
				<th>$type</th>
                <th>$comments</th>
                <th>$date_arrival</th>
			</tr>";
    }
}
?>
</table>
	</div>


</body>
</html>

