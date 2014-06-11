<?php
/****************************************************************************/
/* Inscription */
/****************************************************************************/

if(isset($_POST['register'])) {
	if($_POST['register']) {

		$nom = htmlentities(trim($_POST['nom']));
		$prenom = htmlentities(trim($_POST['prenom']));
		$email = htmlentities(trim($_POST['email']));
		$password = htmlentities(trim($_POST['password']));

		$erreurs = 0;
		$erreur_nom_vide = NULL;
		$erreur_prenom_vide = NULL;
		$erreur_email_vide = NULL;
		$erreur_email_invalide = NULL;
		$erreur_email_existant = NULL;
		$erreur_password_vide = NULL;

		/*
		 * Gestion des erreurs
		 */

		// Vérification de l'email
		if(empty($email)) {
			$erreur_email_vide = '<div class="warning"></div>Renseigner un <span>email</span>';
			$erreurs++;
		}
		else {
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$erreur_email_invalide = '<div class="warning"></div>Ceci est un <span>email incorrect</span>';
				$erreurs++;
			}

			// Vérification si l'adresse email est libre
			try {
				$sql = "SELECT id FROM membres WHERE email = '$email'";
				$query = $bdd->query($sql); 
				$count = $query->fetchAll(PDO::FETCH_ASSOC);
			}
			catch(PDOException $e) {
				echo 'Erreur : '.$e->getMessage();
			} 

			if(!empty($count)) {
				$erreur_email_existant = '<div class="warning"></div>Un compte <span>existe déjà</span> avec cette adresse';
				$erreurs++;
			}
			
		}

		// Vérification du mot de passe
		if(empty($password)) {
			$erreur_password_vide = '<div class="warning"></div>Renseigner un <span>mot de passe</span>';
			$erreurs++;
		}

		// Vérification du nom
		if(empty($nom)) {
			$erreur_nom_vide = '<div class="warning"></div>Renseigner un <span>nom</span>';
			$erreurs++;
		}

		// Vérification du prénom
		if(empty($prenom)) {
			$erreur_prenom_vide = '<div class="warning"></div>Renseigner un <span>prénom</span>';
			$erreurs++;
		}

		/*
		 * Si pas d'erreurs
		 * On inscrit l'utilisateur
		 */

		if($erreurs == 0) {

			try {
				$hash = md5(time()+rand(10,1100));
				$password_encrypte = md5($password);

				$sql = "INSERT INTO membres (nom, prenom, email, password, hash)
						VALUES ('$nom', '$prenom', '$email', '$password_encrypte', '$hash')";

				$query = $bdd->exec($sql);

				// Pas d'affichage à ce stade, voir plus bas dans le html
				$reussi = '<div class="erreur-co valid"><div class="valid"></div><span>Inscription réussie</span>, vous allez reçevoir un mail pour <span>activer votre compte</span>!</div>';
				
				// L'email d'activation est envoyé
				require 'php/email-activation.php';

				// On vide les champs du formulaire
				$nom = '';
				$prenom = '';
				$email = '';
				$password = '';
			}
			catch(Exception $e) {
				echo 'Erreur : '.$e->getMessage();
			}
		}
		else {

			// Affichage des erreurs
			$erreurs = '<div class="erreur-co">';
			$erreurs .= '<ul class="erreurs">';
			$erreurs .= '<li>'.$erreur_nom_vide.'</li>';
			$erreurs .= '<li>'.$erreur_prenom_vide.'</li>';
			$erreurs .= '<li>'.$erreur_email_vide.'</li>';
			$erreurs .= '<li>'.$erreur_email_invalide.'</li>';
			$erreurs .= '<li>'.$erreur_email_existant.'</li>';
			$erreurs .= '<li>'.$erreur_password_vide.'</li>';
			$erreurs .= '</ul>';
			$erreurs .= '</div>';
			$erreurs .= '0';
		}
	}
}
?>