<?php
session_start();
if (! isset($_SESSION ['name']))
{
    header("Location: /garage_bebert/templates/connection.html");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link rel='stylesheet' href='modules/css/index.css' />

<title>Chez Bébert - Accueil</title>

</head>

<body>
	<table style='width: 100%'>
		<tr>
			<th>
				<nav>
					<a href='' title='accueil'>Accueil</a>
				</nav>
			</th>
			<th>
				<nav>
					<a href='includes/sessions/disconnection.php'
						title='Se déconnecter'>Se déconnecter</a>
				</nav>
			</th>
		</tr>
	</table>
	<div id='header'>
		<table style='width: 100%'>
			<tr>
				<th><img src="images/chezbebert_logo.png" height="150px"></th>
				<th>
					<h1>ACCUEIL - CHEZ BÉBERT</h1>
				</th>
				<th><img src="images/chezbebert_logo.png" height="150px"></th>
			</tr>
		</table>
	</div>

	<div>Bienvenue sur le site de gestion du garage CHEZ BEBERT !</div>
	<br>

	<h2>DÉCLARER UNE NOUVELLE RÉPARATION</h2>
	<div>
		<a href='templates/newRepair.php' title="Ajouter une réparation">Ajouter
			une réparation</a>
	</div>

	<h2>RECHERCHER et/ou MODIFIER...</h2>

	<form method="POST">
		<SELECT name='searchRequest' size='1'>
			<OPTION selected>... des clients
			
			<OPTION>... des voitures
			
			<OPTION>... des réparations
		
		</SELECT> <input type="submit" value="Envoyer">
	</form>

	<br>
</body>
</html>


<?php
require_once 'includes/objects/Form.class.php';

if (! isset($_POST ['searchRequest']))
{
    echo '';
}
elseif ($_POST ['searchRequest'] == '... des clients')
{
    $_POST ['searchRequest'] = NULL;
    $array = array (array ('Nom','surname' ),array ('Prénom','name' ),array ('Ville','city' ) );
    $form = new FormObject('templates/request/requestCustomer.php', $array);
    echo $form->getHTML();
}
elseif ($_POST ['searchRequest'] == '... des voitures')
{
    $_POST ['searchRequest'] = NULL;
    $array = array (array ("Plaque d'immatriculation",'registration' ),
            array ("Marque du véhicule",'brand' ),
            array ("Modèle du véhicule",'model' ),
            array ("Année de mise en circulation",'year' ),
            array ("Kilométrage",'kilometerage' ) );
    $form = new FormObject('templates/request/requestCar.php', $array);
    echo $form->getHTML();
}

elseif ($_POST ['searchRequest'] == '... des réparations')
{
    $_POST ['searchRequest'] = NULL;
    $array = array (array ('Nom du client','surname' ),
            array ('Prénom du client','name' ),
            array ("Plaque d'immatriculation",'registration' ),
            array ("Date d'arrivée (format AAAA-MM-JJ)",'date_arrival' ) );
    $form = new FormObject('', $array);
    echo $form->getHTML();
}
?>
<?php
if ($_SESSION ['group_id'] == 1)
{
    echo "<h2> PARTIE ADMINISTRATEUR </h2>
<h3>RECHERCHER et/ou MODIFIER...</h3>

	<form method='POST'>
		<SELECT name='searchRequest' size='1'>
			
			<OPTION selected>... des techniciens
			
			<OPTION>... des pièces
			
			<OPTION>... des forfaits
		
		</SELECT> <input type='submit' value='Envoyer'>
	</form>
";
    if (! isset($_POST ['searchRequest']))
    {
        echo '';
    }
    elseif ($_POST ['searchRequest'] == '... des techniciens')
    {
        $_POST ['searchRequest'] = NULL;
        $array = array (array ('Nom','surname' ),array ('Prénom','name' ) );
        $form = new FormObject('includes/libraries/requestTechnician.function.php', $array);
        echo $form->getHTML();
    }
    elseif ($_POST ['searchRequest'] == '... des pièces')
    {
        $_POST ['searchRequest'] = NULL;
        $array = array (array ("Marque du véhicule",'brand' ),
                array ("Modèle du véhicule",'brand' ),
                array ('Nom','name' ),
                array ('Année','year' ),
                array ("Id de la pièce",'id_part' ) );
        $form = new FormObject('', $array);
        echo $form->getHTML();
    }
    elseif ($_POST ['searchRequest'] == '... des forfaits')
    {
        $_POST ['searchRequest'] = NULL;
        $array = array (array ('Id du Forfait','package' ),
                array ('Nom','name' ),
                array ('Année','year' ),
                array ("Kilométrage",'kilometerage' ) );
        $form = new FormObject('', $array);
        echo $form->getHTML();
    }
}
?>