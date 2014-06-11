<?php
/****************************************************************************/
/* Connexion */
/****************************************************************************/

if(isset($_POST['connect'])) {
	if($_POST['connect']) {

		$email = htmlentities(trim($_POST['email']));
		$password = htmlentities(trim($_POST['password']));

		$erreurs = 0;
		$erreur_email_vide = NULL;
		$erreur_password_vide = NULL;
		$erreur_generale = NULL;

		/*
		 * Gestion des erreurs
		 */

		// Vérification de l'email
		if(empty($email)) {
			$erreur_email_vide = '<div class="warning"></div>Tu n\'as pas saisi <span>d\'adresse email</span>';
			$erreurs++;
		}

		// Vérification du mot de passe
		if(empty($password)) {
			$erreur_password_vide = '<div class="warning"></div>Tu n\'as pas saisi <span>le mot de passe</span>';
			$erreurs++;
		}

		/*
		 * Connexion
		 */

		if($erreurs == 0) {

			$password = md5($password);

			try {
				$sql = "SELECT * FROM membres
						WHERE email = '$email'
						AND password = '$password'
						AND actif = '1'";
				$results = $bdd->query($sql);
			}
			catch(Exception $e) {
				'Erreur : '.$e->getMessage();
			}

			// On compte les résultats de la requête
			$membre = $results -> fetchAll(PDO::FETCH_ASSOC);
			$count = count($membre);

			if($count == 1) { // Connexion acceptée
				
				// On commence une session pour l'utilisateur
				session_start();

				// On enregistre les données de l'utilisateur dans la session
				$_SESSION['id'] = $membre[0]['id'];
				$_SESSION['nom'] = $membre[0]['nom'];
				$_SESSION['prenom'] = $membre[0]['prenom'];
				$_SESSION['email'] = $membre[0]['email'];

				// redirect('membre.php');
				$feedback_connexion = 'Connexion réussie! Tu es '.$_SESSION['email'];
				// header('Location: '.$racine.'/dashboard');  //ONLINE
				// echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$racine.'/dashboard">';    //LOCAL
    // 			exit; 
    			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/dashboard">';    //LOCAL
    			exit; 
			}
			else { // Connexion refusée
				$erreur_generale = '<div class="warning"></div> Connexion <span>refusée</span>';
				$feedback_connexion = '<div class="erreur-co">';
				$feedback_connexion .= $erreur_generale;
				$feedback_connexion .= '</div>';
				$feedback_connexion .= '0';
			}
		}
		else { // Erreur(s) lors de l'envoi du formulaire

			$feedback_connexion = '<div class="erreur-co">';
			$feedback_connexion .= '<ul>';
			$feedback_connexion .= '<li>'.$erreur_email_vide.'</li>';
			$feedback_connexion .= '<li>'.$erreur_password_vide.'</li>';
			$feedback_connexion .= '</ul>';
			$feedback_connexion .= '</div>';
		}


	}
}

?>