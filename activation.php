<?php

$__page_title = 'Activation | Sportime';
$__body_class = 'activation';
require 'php/connexion-bdd.php';
require 'php/session.php';
require 'template-parts/header.php';

if(isset($_GET['hash'])) {
	if($_GET['hash']) {
		
		$hash = $_GET['hash'];

		try {

			// Vérification de l'existence du hash dans la BDD
			$sql = "SELECT hash FROM membres WHERE hash = '$hash'";
			$results = $bdd->query($sql);
		}
		catch(Exception $e) {
			'Erreur : '.$e->getMessage();
		}

		// Stockage des résultats dans un tableau
		$membres_a_activer = $results->fetchAll(PDO::FETCH_ASSOC);

		// On compte le nombre de lignes dans le tableau
		$count = count($membres_a_activer);

		// Si on a un résultat
		if($count == 1) {

			try {

				// Activation du membre
				$sql = "UPDATE membres SET actif = '1' WHERE hash = '$hash'";
				$bdd->exec($sql);
			}
			catch(Exception $e) {
				'Erreur : '.$e->getMessage();
			}
			$feedback = 'Activation réussie';
			header('Location: '.$racine);
		}
	}
}

?>

<body>

<?php if(isset($feedback)) { echo $feedback; } ?>

<?php require 'template-parts/footer-home.php'; ?>
<?php require 'template-parts/footer.php'; ?>

