<?php
	
	session_start();

	// print_r($_SESSION);

	// On va éviter les avertissements "undefined index":
	// S'il y a au moins une "clé" dans le tableau session,
	// alors on commence à stocker les infos dans des vars
	if(count($_SESSION) > 0) {
		$id_utilisateur_connecte = $_SESSION['id'];
		$nom_utilisateur_connecte = $_SESSION['nom'];
		$prenom_utilisateur_connecte = $_SESSION['prenom'];
	}


	// echo '<p>Utilisateur connecté : ' . $id_utilisateur_connecte . '</p>';
	
?>