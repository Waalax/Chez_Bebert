<?php
session_start();

if (! isset($_SESSION ['name']))
{
    header("Location: /garage_bebert/templates/connection.html");
    exit();
}
if (! isset($_POST ['valid']) or $_POST ['valid'] == 'Retour')
{
    header("Location: /garage_bebert/templates/newRepairs.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link rel='stylesheet' href='../modules/css/index.css' />

<title>Chez Bébert - Valider des réparations</title>

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
					<h1>CONFIRMATION</h1>
				</th>
				<th><img src="../images/chezbebert_logo.png" height="150px"></th>
			</tr>
		</table>
	</div>
	
	
	<?php
require_once (__DIR__ . '/../config.php');
$number_of_repairs = count($_SESSION ['request'] ['repair']) / 2;
$id_technician = $_SESSION ['id_technician'];
$id_customer = $_SESSION ['request'] ['customer'] ['id_customer'];
$registration = $_SESSION ['request'] ['car'] ['registration'];

$mysqli = new mysqli($server, $user, $password, $database);
for($i = 1; $i <= $number_of_repairs; $i ++)

{
    $type = $_SESSION ['request'] ['repair'] ['repair' . $i];
    $comment = $_SESSION ['request'] ['repair'] ['comment' . $i];
    
    $query = "INSERT INTO repairs(`id_technician`,`registration`, `type`, `comments`, `date_arrival`) VALUE (" . $id_technician . ",'" . $registration . "','" . $type . "','" . $comment . "', CURDATE())";
    if ($mysqli->query($query))
    {
        echo "Opération " . $type . " enregistrée pour le véhicule immatriculé " . $registration;
        echo "<br>";
    }
    else
    {
        echo "L'opération a échouée";
        echo "<br>";
    }
}

echo "<center><a href='../'>Retourner à l'accueil</a></center>";
$_SESSION ['request'] = array ();

?>

