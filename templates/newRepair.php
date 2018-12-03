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

<title>Chez Bébert - Nouvelle réparation</title>

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
					<h1>NOUVELLE RÉPARATION</h1>
				</th>
				<th><img src="../images/chezbebert_logo.png" height="150px"></th>
			</tr>
		</table>
	</div>
	<h2>Vous pouver ajouter un nouveau client</h2>
	<ul>
		<li><a href="newCustomer.php" title="Ajouter un nouveau client">Ajouter
				un nouveau client</a>
	
	</ul>
	<h2>Ou rechercher un client existant</h2>
	
<?php
require_once '../includes/objects/Form.class.php';

$array = array (array ('Nom','surname' ),array ('Prénom','name' ),array ('Ville','city' ) );
$form = new FormObject('selectCustomer.php', $array);
echo $form->getHTML();
$_SESSION ['oldpage'] = 'newRepair';
?>