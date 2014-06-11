<?php

require 'php/connexion-bdd.php';
require 'php/session.php';

$__body_class = 'membre';
$__page_title = 'Nouvel évènement | Sportime';

require 'template-parts/header.php';
require 'template-parts/body-start.php';
require 'template-parts/sidebar.php';


/****************************************************************************/
/* Création d'un événement */
/****************************************************************************/

if(isset($_POST['creation'])) {
	if($_POST['creation']) {

		$sport = htmlentities(trim($_POST['sport']));
		$dates = htmlentities(trim($_POST['dates']));
		$heure = htmlentities(trim($_POST['heure']));
		$difficulte = htmlentities(trim($_POST['difficulte']));
		$nombre = htmlentities(trim($_POST['nombre']));
		$type = htmlentities(trim($_POST['type']));
		$confidentialite = htmlentities(trim($_POST['confidentialite']));
		$commentaire = htmlentities(trim($_POST['commentaire']));
		$adresse = htmlentities(trim($_POST['adresse']));

		$erreurs = 0;
		$erreur_sport_vide = NULL;
		$erreur_dates_vide = NULL;
		$erreur_heure_vide = NULL;
		$erreur_difficulte_vide = NULL;
		$erreur_nombre_vide = NULL;
		$erreur_type_vide = NULL;
		$erreur_confidentialite_vide = NULL;
		$erreur_adresse_vide = NULL;


	

		if($erreurs == 0) {

			try {
			
				$sql = "INSERT INTO evenement (sport, dates, heure, difficulte, nombre, type, confidentialite, commentaire, adresse, id_membres)
						VALUES ('$sport', '$dates', '$heure', '$difficulte', '$nombre', '$type', '$confidentialite', '$commentaire', '$adresse', '$id_utilisateur_connecte')";

				$query = $bdd->exec($sql);

				// header('Location: '.$racine.'/dashboard');
				// echo '<META HTTP-EQUIV="Refresh" Content="0; URL=membre.php">';    //LOCAL
    // 			exit; 
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$racine.'/dashboard">';    //LOCAL
    			exit; 
				
				
			}
			catch(Exception $e) {
				echo 'Erreur : '.$e->getMessage();
			}

		}
		else {

			// Affichage des erreurs
			$erreurs = '<ul class="erreurs">';
			$erreurs .= '<li>'.$erreur_sport_vide.'</li>';
			$erreurs .= '<li>'.$erreur_dates_vide.'</li>';
			$erreurs .= '<li>'.$erreur_heure_vide.'</li>';
			$erreurs .= '<li>'.$erreur_difficulte_vide.'</li>';
			$erreurs .= '<li>'.$erreur_nombre_vide.'</li>';
			$erreurs .= '<li>'.$erreur_type_vide.'</li>';
			$erreurs .= '<li>'.$erreur_confidentialite_vide.'</li>';
			$erreurs .= '<li>'.$erreur_adresse_vide.'</li>';
			$erreurs .= '</ul>';
		}

	}
}

?>

<div id="shadow-box-beta" onclick="return showHide();">
		<div class="shadow-box-beta-info">
			<div class="close-beta"></div>
			<h2>Version beta*</h2>
			<p>
				Vous vous trouvez actuellement sur 
				la <em>version beta</em> de <span>Sportime.be</span> ce 
				qui implique que certaines fonctionalités 
				sont fictives et servent à vous donnez un aperçu du 
				résultat final.
			</p>
		</div>
</div>


<form class="formcreaevnmt" id="login" action="" method="post">
	<div class="forms-sport">
		<div class="forms-sport-content">
			<label class="label-sport" for="sport">Sport:</label>
			<div class="select-style blink-border">
				<select name="sport" required="required">
					<option value="" disabled selected="selected" selected>Choisis un sport</option>
					<option value="rugby">Rugby</option>
					<option value="foot">Foot</option>
					<option value="basket">Basket</option>
					<option value="hockey">Hockey</option>
					<option value="tennis">Tennis</option>
				</select>
			</div>
		</div>
	</div>


	<div class="contentinfo_lieu">
		<div class="forms-info">
			<!-- <div class="forms-organisateur">
				<img src="img/img-profile-pic.png" />

				<p>Organisé par <span><?php echo $prenom_utilisateur_connecte . ' ' . $nom_utilisateur_connecte; ?></span></p>

			</div> -->
			<h2>Informations générales</h2>
			<ul>
				<li class="forms-date">
					<label for="date">Date</label>
					<input type="date"  required = "required" name="dates">
				</li>
				<li class="forms-heure">
					<label for="time">Heure</label>
					<input type="time" required = "required" name="heure">
				</li>
				<li class="forms-diff">
					<label for="difficulte">Difficulté</label>
					<select name="difficulte">
						<option value="Amateur">Amateur</option>
						<option value="Professionel">Professionel</option>
					</select>
				</li>
				<li class="forms-nbr">
					<label for="number">Nombre max</label>
					<input type="number" min="0" max="50" name="nombre">
				</li>
				<li class="forms-type">
					<label for="type">Type</label>
					<select name="type">
						<option value="Amical">Amicale</option>
						<option value="Match">Match</option>
					</select>
				</li>
				<li class="forms-conf">
					<label for="confidentialite">Confidentialité</label>
					<select name="confidentialite">
						<option value="Prive">privé</option>
						<option value="Public">public</option>
					</select>
				</li>
				<li class="forms-com">
					<label for="commentaire">Commentaire</label>
					<textarea name="commentaire"></textarea>
				</li>
			</ul>

			<div class="forms-info-submit">
				<input type="submit" value="Créer" name="creation">
				 <a href="#" onclick="return showHide();">inviter des amis</a>
			</div>
		</div>

		<div class="forms-lieu">
			 <div class="forms-lieu-map">
				<?php require 'map.php'; ?> 
			</div> 
		</div>	
	</div>
	
</form>

<?php require 'template-parts/footer.php'; ?>