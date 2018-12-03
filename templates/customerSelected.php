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

<title>Chez Bébert - Véhicule</title>

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
					<h1>VÉHICULE</h1>
				</th>
				<th><img src="../images/chezbebert_logo.png" height="150px"></th>
			</tr>
		</table>
	</div>
	
	<?php
require_once (__DIR__ . '/../config.php');
require_once (__DIR__ . '/../includes/objects/CustomerRequest.class.php');

if ($_SESSION ['oldpage'] == 'selectCustomer')
{
    $customer_id = $_POST ['customer_id'];
    
    $query = new CustomerRequest($customer_id, '', '', '');
    $mysqli = new mysqli($server, $user, $password, $database);
    
    $result = $mysqli->query($query->getRequest());
    $customerSelected = $result->fetch_array();
}
elseif ($_SESSION ['oldpage'] == 'newCustomer')
{
    $name = $_POST ['name'];
    $surname = $_POST ['surname'];
    $city = $_POST ['city'];
    $mysqli = new mysqli($server, $user, $password, $database);
    $query = "INSERT INTO customers(`name`,`surname`,`city`) VALUE ('" . $name . "','" . $surname . "','" . $city . "')";
    $mysqli->query($query);
    $query = new CustomerRequest('', $name, $surname, $city);
    $result = $mysqli->query($query->getRequest());
    $customerSelected = $result->fetch_array();
}

$_SESSION ['request'] ['customer'] = array ('id_customer' => $customerSelected ['id_customer'],
        'name' => $customerSelected ['name'],
        'surname' => $customerSelected ['surname'],
        'city' => $customerSelected ['city'] );

echo "Vous avez choisis " . $customerSelected ['name'] . ' ' . $customerSelected ['surname'] . '.';
?>
	<h2>Vous pouver ajouter une nouvelle voiture</h2>
	<ul>
		<li><a href="newCar.php"
			title="Ajouter une nouvelle voiture pour ce client">Ajouter une
				nouvelle voiture pour ce client</a>
	
	</ul>
	<h2>Ou rechercher une véhicule existant</h2>
	
<?php
require_once '../includes/objects/Form.class.php';

$array = array (array ("Plaque d'immatriculation",'registration' ),
        array ("Marque du véhicule",'brand' ),
        array ("Modèle du véhicule",'model' ),
        array ("Année de mise en circulation",'year' ),
        array ("Kilométrage",'kilometerage' ) );
$form = new FormObject('selectCar.php', $array);
echo $form->getHTML();
$_SESSION ['oldpage'] = 'customerSelected';
?>