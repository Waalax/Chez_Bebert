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
					<h1>VALIDER LES RÉPARATIONS</h1>
				</th>
				<th><img src="../images/chezbebert_logo.png" height="150px"></th>
			</tr>
		</table>
	</div>
	<?php
echo "Vous avez choisis le client nommé <b>" . $_SESSION ['request'] ['customer'] ['name'] . '
' . $_SESSION ['request'] ['customer'] ['surname'] . '</b> et le véhicule <i> ' . $_SESSION ['request'] ['car'] ['brand'] . '
' . $_SESSION ['request'] ['car'] ['model'] . '</i> immatriculé <b>' . $_SESSION ['request'] ['car'] ['registration'] . '</b>.';

$number_of_repairs = count($_POST) / 2;

if ($number_of_repairs >= 1)
{
    echo '<br>';
    echo "Vous avez réalisé " . $number_of_repairs . " réparation(s) :";
    echo "<ul>";
    for($i = 1; $i <= $number_of_repairs; $i ++)
    {
        echo "<li>Opération " . $_POST ['repair' . $i] . " avec le commentaire suivant : " . $_POST ['comment' . $i] . "</li>";
    }
    echo "</ul>";
    $_SESSION ['request'] ['repair'] = $_POST;
}
else
{
    $number_of_repairs = count($_SESSION ['request'] ['repair']) / 2;
    echo '<br>';
    echo "Vous avez réalisé " . $number_of_repairs . " réparation(s) :";
    echo "<ul>";
    for($i = 1; $i <= $number_of_repairs; $i ++)
    {
        echo "<li>Opération " . $_SESSION ['request'] ['repair'] ['repair' . $i] . " avec le commentaire suivant : " . $_SESSION ['request'] ['repair'] ['comment' . $i] . "</li>";
    }
    echo "</ul>";
}
?>
<form action="newRepairsAdded.php" method="POST">
		<input type="submit" name="valid" value="Envoyer"> <input
			type="submit" name="valid" value="Retour">
	</form>
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
?></table>
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
