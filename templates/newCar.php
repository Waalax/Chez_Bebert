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

<title>Chez Bébert - Nouveau véhicule</title>

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
					<h1>NOUVEAU VÉHICULE</h1>
				</th>
				<th><img src="../images/chezbebert_logo.png" height="150px"></th>
			</tr>
		</table>
	</div>

	
<?php

require_once '../includes/objects/Form.class.php';

$array = array (array ("Plaque d'immatriculation",'registration' ),
        array ("Marque du véhicule",'brand' ),
        array ("Modèle du véhicule",'model' ),
        array ("Année de mise en circulation",'year' ),
        array ("Kilométrage",'kilometerage' ) );
$form = new FormObject('newRepairs.php', $array);
echo $form->getHTML();

$_SESSION ['oldpage'] = 'newCar';
?>