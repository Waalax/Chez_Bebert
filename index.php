<?php
session_start();
echo "<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />

<link rel='stylesheet'
	href='https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'>
<link rel='stylesheet' href='modules/css/index.css' />

<script src='modules/js/lib/jquery-3.3.1.js'></script>
<script src='modules/js/lib/jquery-ui-1.12.0.js'></script>
<!-- <script src='modules/js/common.js'></script> -->
<!-- <script src='modules/js/index.js'></script> -->

<title>Chez Bébert - Accueil</title>

</head>";
        
if (isset($_SESSION ['pseudo']))
{
    echo " 
    <body>
        <table style='width:100%'>
            <tr>
                <th text-align='left'>
                	<nav>
                		<ul id=navigation>
                			<li><a href='../' title='accueil'>Accueil</a>
                			<li><a href='returnCustomer.html' title='Rechercher un client'>Liste Clients</a></li>
                		</ul>
                	</nav>
                </th>
                <th text-align='right'>
                    <nav>
                        <ul id=navigation>
                            <li><a href='includes/sessions/disconnection.php' title='disconnect'>Se déconnecter</a>
                        </ul>
                    </nav>
                </th>
            </tr>
        </table>  
    	<div id='header'>
    		<h1>Accueil</h1>
    	</div>
    	<form method='POST' action='add.php'>
    		<div class='Item_and_his_value'>
    			<div class='item'>
    				<div class='item_text'>Nom</div>
    			</div>
    			<div class='value'>
    				<input type='text' name='surname' size='20' maxlength='35'>
    			</div>
    		</div>
    		<div class='Item_and_his_value'>
    			<div class='item'>
    				<div class='item_text'>Prénom</div>
    			</div>
    			<div class='value'>
    				<input type='text' name='name' size='20' maxlength='35'>
    			</div>
    		</div>
    		<div class='Item_and_his_value'>
    			<div class='item'>
    				<div class='item_text'>Adresse</div>
    			</div>
    			<div class='value'>
    				<input type='text' name='address' size='40' maxlength='100'>
    			</div>
    		</div>
    		<div class='Item_and_his_value'>
    			<div class='item'>
    				<div class='item_text'>suivi</div>
    			</div>
    			<div class='value'>
    				<input type='text' name='suivi' size='20' maxlength='35'>
    			</div>
    		</div>
    		<input type='submit' value='Envoyer' name='envoyer'>
    	</form>
    	<br>
    </body>
</html>
";
}

else
{
    echo "
<body>
    <table style='width:100%'>
        <tr>
            <th>
                <nav>
                    <ul id=navigation>
                        <li><a href='templates/connection.html' title='connect'>Se connecter</a>
                    </ul>
                </nav>
            </th>
        </tr>
    </table>
    <div id='header'>
    		<h1>Accueil</h1>
    </div>
    <p>Vous devez vous <a href='templates/connection.html'>connecter</a></p>
</body>
</html>";
}

?>