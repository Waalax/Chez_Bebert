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

<title>Chez Bébert - Ajouter des réparations</title>

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
					<h1>AJOUTER DES RÉPARATIONS</h1>
				</th>
				<th><img src="../images/chezbebert_logo.png" height="150px"></th>
			</tr>
		</table>
	</div>
	<?php
require_once (__DIR__ . '/../config.php');
require_once (__DIR__ . '/../includes/objects/CarRequest.class.php');

if ($_SESSION ['oldpage'] == 'selectCar')
{
    $registration = $_POST ['registration'];
    
    $query = new CarRequest('', $registration, '', '', '', '');
    $mysqli = new mysqli($server, $user, $password, $database);
    
    $result = $mysqli->query($query->getRequest());
    $carSelected = $result->fetch_array();
    $_SESSION ['request'] ['car'] = array ('id_customer' => $carSelected ['id_customer'],
            'registration' => $carSelected ['registration'],
            'brand' => $carSelected ['brand'],
            'model' => $carSelected ['model'],
            'year' => $carSelected ['year'],
            'kilometerage' => $carSelected ['kilometerage'] );
    $_SESSION ['oldpage'] = 'newRepairs';
}
elseif ($_SESSION ['oldpage'] == 'newCar')
{
    $registration = $_POST ['registration'];
    $brand = $_POST ['brand'];
    $model = $_POST ['model'];
    $year = $_POST ['year'];
    $kilometerage = $_POST ['kilometerage'];
    $id_customer = $_SESSION ['request'] ['customer'] ['id_customer'];
    
    $mysqli = new mysqli($server, $user, $password, $database);
    $query = "INSERT INTO cars(`registration`,`brand`,`model`, `year`, `kilometerage`, `id_customer`) VALUE ('" . $registration . "','" . $brand . "','" . $model . "','" . $year . "','" . $kilometerage . "','" . $id_customer . "')";
    $mysqli->query($query);
    $query = new CarRequest($id_customer, $registration, '', '', '', '');
    $result = $mysqli->query($query->getRequest());
    $carSelected = $result->fetch_array();
    $_SESSION ['request'] ['car'] = array ('id_customer' => $carSelected ['id_customer'],
            'registration' => $carSelected ['registration'],
            'brand' => $carSelected ['brand'],
            'model' => $carSelected ['model'],
            'year' => $carSelected ['year'],
            'kilometerage' => $carSelected ['kilometerage'] );
    $_SESSION ['oldpage'] = 'newRepairs';
}

echo "Vous avez choisis le client nommé <b>" . $_SESSION ['request'] ['customer'] ['name'] . ' 
' . $_SESSION ['request'] ['customer'] ['surname'] . '</b> et le véhicule <i> ' . $_SESSION ['request'] ['car'] ['brand'] . ' 
' . $_SESSION ['request'] ['car'] ['model'] . '</i> immatriculé <b>' . $_SESSION ['request'] ['car'] ['registration'] . '</b>.';
?>


<h2>Nombre de réparations souhaitées</h2>
	<form method="POST">
		<div class='form-bebert'>
			<input type='text' name='number' id='input'>
		</div>
		<input type="submit" value="Envoyer">
	</form>
	<h2>Veuillez sélectionner les différentes réparations en fonctions des
		tableaux ci-dessous (ID)</h2>
<?php
require_once '../includes/objects/Form.class.php';

if (! isset($_POST ['number']))
{
    echo '';
}
else
{
    echo "<form action='newRepairsValidation' method='POST'>
		";
    for($i = 1; $i <= intval($_POST ['number']); $i ++)
    {
        echo "<div class='form-bebert'>
<label>Réparation" . $i . "</label>
<input type='text' name='repair" . $i . "' id='repair" . $i . "'>
<label>Commentaire" . $i . "</label>
<input type='text' name='comment" . $i . "' id='comment" . $i . "'>
</div>";
    }
    echo "
<input type='submit' value='Envoyer'>
	</form>";
}
?>

<h2>Liste des réparations possibles avec ID</h2>
	<p>Voici la liste des réparations possibles
	
	
	<h3>Forfaits</h3>
	<table style='width: 100%'>
		<tr>
			<th>ID Forfait</th>
			<th>Nom</th>
			<th>Année</th>
			<th>Kilométrage</th>
			<th>Prix</th>
		</tr>
<?php
require_once (__DIR__ . '/../config.php');
require_once (__DIR__ . '/../includes/objects/PackageRequest.class.php');

$query = new PackageRequest('', '', '', '');
$mysqli = new mysqli($server, $user, $password, $database);

$result = $mysqli->query($query->getRequest());
for($i = 1; $i <= $result->num_rows; $i ++)
{
    $fetcharray = $result->fetch_array();
    $id = $fetcharray ['id_package'];
    $name = $fetcharray ['name'];
    $year = $fetcharray ['year'];
    $kilometerage = $fetcharray ['kilometerage'];
    $price = $fetcharray ['price'];
    echo "<tr>
                <th>$id</th>
                <th>$name</th>
                <th>$year</th>
                <th>$kilometerage</th>
                <th>$price</th>
			</tr>";
}
?>
</table>
	<h3>Pièces changées</h3>
	<table style='width: 100%'>
		<tr>
			<th>ID Pièce</th>
			<th>Nom</th>
			<th>Marque</th>
			<th>Modèle</th>
			<th>Année</th>
			<th>Prix</th>
		</tr>
<?php
require_once (__DIR__ . '/../config.php');
require_once (__DIR__ . '/../includes/objects/PartRequest.class.php');

$query = new PartRequest('', '', '', '', '');
$mysqli = new mysqli($server, $user, $password, $database);

$result = $mysqli->query($query->getRequest());
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
?>
</table>

</body>
</html>
