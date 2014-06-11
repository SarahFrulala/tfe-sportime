<?php

require 'php/connexion-bdd.php';
require 'php/session.php';

$__body_class = 'membre';
$__page_title = 'Sportime | ' . $prenom_utilisateur_connecte;

require 'template-parts/header.php';
require 'template-parts/body-start.php';

?>

<?php require 'template-parts/sidebar.php'; ?>



<div class="contentevent">
	<div class="headercontent">
		<h2>Hey <?php echo "$prenom_utilisateur_connecte"; ?>, bienvenue sur Sportime </h2>
		<input name="search" type="text" class="txt" placeholder="Trouver un évenement"/>
		<input name="search-btn" type="submit" class="btn" value="" />
		<a class='cta-creerevnmt' href="<?php echo $racine; ?>/organiser">Créer un évenement</a>
	</div>

	<ul class="evenementliste">

		<?php require 'php/liste-tt-evenement.php'; ?>

	</ul>
</div>

<?php require 'template-parts/footer.php'; ?>