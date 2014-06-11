<?php

	try
	{
		//CONNEXION BDD LOCAL
		// $dns = 'mysql:host=localhost;dbname=sportime';
		// $bdd_username = 'root';
		// $bdd_password = 'root';

		//CONNEXION BDD ONLINE
		$dns = 'mysql:host=mysql51-121.perso;dbname=sarahbrersport';
		$bdd_username = 'sarahbrersport';
		$bdd_password = 'dhYVP44cCmJS';


	    $bdd = new PDO($dns, $bdd_username, $bdd_password);
	}
	 
	catch(PDOException $e)
	{
	    die('Erreur : '.$e->getMessage());
	}

	// Prevents 'Undefined index' from showing up
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

	// Racine pour les redirections ONLINE
	$racine = 'http://sarahbreemans.be/tfe/sportime';

	// Racine pour les redirections LOCAL
	// $racine = 'http://sportime.dev';

?>