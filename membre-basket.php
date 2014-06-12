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
	
		<a class='cta-creerevnmt' href="<?php echo $racine; ?>/organiser">Créer un évenement</a>
		
		<div class="choixsport"> 
			<ul>
			  <li>
			    <h3 class="cta-creerevnmt choix">Choisis ton sport</h3>
			    <ul>
			      <li><a href="<?php echo $racine; ?>/dashboard">Tous</a></li>
			      <li><a href="<?php echo $racine; ?>/dashboard/basket">Basket</a></li>
			      <li><a href="<?php echo $racine; ?>/dashboard/foot">Foot</a></li>
			      <li><a href="<?php echo $racine; ?>/dashboard/hockey">Hockey</a></li>
			      <li><a href="<?php echo $racine; ?>/dashboard/rugby">Rugby</a></li>
			      <li><a href="<?php echo $racine; ?>/dashboard/tennis">Tennis</a></li>
			    </ul>
			  </li>
			</ul>
		</div>
		<div class="search">
			<input name="search-btn" type="submit" class="btn" value="" /> 
			<input name="search" type="text" class="txt" placeholder="Trouver un évenement"/>
		</div>
	</div>

	<ul class="evenementliste">

		<?php require 'php/liste-basket-evenement.php'; ?>

	</ul>
</div>

<?php require 'template-parts/footer.php'; ?>