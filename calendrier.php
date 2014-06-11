<?php

require 'php/connexion-bdd.php';
require 'php/session.php';

$__body_class = 'membre profil calendrier';
$__page_title = 'Mes évènements | Sportime';

require 'template-parts/header.php';
require 'template-parts/body-start.php';
require 'template-parts/sidebar.php';

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

<div class="contentevent badges">
	
	<div class="headercontent">
		<div class="profil-pic"></div>
		<h2><?php echo "$prenom_utilisateur_connecte"; ?> <?php echo "$nom_utilisateur_connecte"; ?></h2>
		<img onclick="return showHide();" class="profil-edit" alt="Editer son profil" src="<?php echo $racine; ?>/img/icon-edit.png" width="15px"/>
		<h3 class="fav-sport"><span>Sport favoris:</span> Hockey & Escalade</h3>
		<ul class="menu-profil">
			<li class="aref-cal active"><a class="aref-evnt" href="<?php echo $racine; ?>/profil" class="active">Mes évenements</a>
				<a class="aref-cal" href="<?php echo $racine; ?>/profil"><img src="<?php echo $racine; ?>/img/icon-cal-liste.png" width="15px"></a>
			</li>
			<li><a href="<?php echo $racine; ?>/amis">Mes amis</a></li>
			<li><a href="<?php echo $racine; ?>/badges">Mes badges</a></li>
		</ul>
	</div>

	<div class="img-bg-calendrier" onclick="return showHide();"></div>

</div>

<?php require 'template-parts/footer.php'; ?>