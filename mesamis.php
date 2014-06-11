<?php

require 'php/connexion-bdd.php';
require 'php/session.php';

$__body_class = 'membre profil';
$__page_title = 'Mes amis | Sportime';

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

<div class="contentevent amis">

	
	
	<div class="headercontent">
		<div class="profil-pic"></div>
		<h2><?php echo "$prenom_utilisateur_connecte"; ?> <?php echo "$nom_utilisateur_connecte"; ?></h2>
		<img onclick="return showHide();" class="profil-edit" alt="Editer son profil" src="img/icon-edit.png" width="15px"/>
		<h3 class="fav-sport"><span>Sport favoris:</span> Hockey & Escalade</h3>
		<ul class="menu-profil">
			<li class="aref-cal"><a class="aref-evnt" href="<?php echo $racine; ?>/profil" class="active">Mes évenements</a>
				<a class="aref-cal" href="<?php echo $racine; ?>/profil"><img src="<?php echo $racine; ?>/img/icon-date.png" width="15px"></a>
			</li>
			<li><a href="<?php echo $racine; ?>/amis" class="active">Mes amis</a></li>
			<li><a href="<?php echo $racine; ?>/badges">Mes badges</a></li>
		</ul>
	</div>



	<ul class="liste-amis">
		<li onclick="return showHide();">
			<a href="#" onclick="return showHide();">
				<div class="round-profil-border">
					<div class="round-profil"></div>
				</div>
				<h3>John Miranasse</h3>
				<p class="profil-com-amis">10 amis en commun</p>
				<h3>Sport favoris</h3>
				<p>Foot, Tennis & Basket</p>
			</a>
		</li>
		<li onclick="return showHide();">
			<a href="#" onclick="return showHide();">
				<div class="round-profil-border">
					<div class="round-profil a"></div>
				</div>
				<h3>Pierre Henry</h3>
				<p class="profil-com-amis">8 amis en commun</p>
				<h3>Sport favoris</h3>
				<p>Basket</p>
			</a>
		</li>
		<li onclick="return showHide();">
			<a href="#" onclick="return showHide();">
				<div class="round-profil-border">
					<div class="round-profil b"></div>
				</div>
				<h3>Marie Periaux</h3>
				<p class="profil-com-amis">7 amis en commun</p>
				<h3>Sport favoris</h3>
				<p>Foot, Tennis & Basket</p>
			</a>
		</li>
		<li onclick="return showHide();">
			<a href="#" onclick="return showHide();">
				<div class="round-profil-border">
					<div class="round-profil c"></div>
				</div>
				<h3>Emilie Laurat</h3>
				<p class="profil-com-amis">10 amis en commun</p>
				<h3>Sport favoris</h3>
				<p>Foot, Tennis & Basket</p>
			</a>
		</li>
		<li onclick="return showHide();">
			<a href="#" onclick="return showHide();">
				<div class="round-profil-border ">
					<div class="round-profil d"></div>
				</div>
				<h3>Alice Mounlin</h3>
				<p class="profil-com-amis">1 amis en commun</p>
				<h3>Sport favoris</h3>
				<p>Foot, Tennis & Basket</p>
			</a>
		</li>
		<li onclick="return showHide();">
			<a href="#" onclick="return showHide();">
				<div class="round-profil-border">
					<div class="round-profil e"></div>
				</div>
				<h3>Philippe Leclerq</h3>
				<p class="profil-com-amis">0 amis en commun</p>
				<h3>Sport favoris</h3>
				<p>Foot, Tennis & Basket</p>
			</a>
		</li>
		<li onclick="return showHide();">
			<a href="#" onclick="return showHide();">
				<div class="round-profil-border">
					<div class="round-profil f"></div>
				</div>
				<h3>Martin Verhwael</h3>
				<p class="profil-com-amis">3 amis en commun</p>
				<h3>Sport favoris</h3>
				<p>Foot, Tennis & Basket</p>
			</a>
		</li>
		<li onclick="return showHide();">
			<a href="#" onclick="return showHide();">
				<div class="round-profil-border">
					<div class="round-profil g"></div>
				</div>
				<h3>Lionel Delatour</h3>
				<p class="profil-com-amis">0 amis en commun</p>
				<h3>Sport favoris</h3>
				<p>Foot, Tennis & Basket</p>
			</a>
		</li>
		<li onclick="return showHide();">
			<a href="#" onclick="return showHide();">
				<div class="round-profil-border">
					<div class="round-profil h"></div>
				</div>
				<h3>Elodie Vandernoden</h3>
				<p class="profil-com-amis">1 amis en commun</p>
				<h3>Sport favoris</h3>
				<p>Foot, Tennis & Basket</p>
			</a>
		</li>
		<li onclick="return showHide();">
			<a href="#" onclick="return showHide();">
				<div class="round-profil-border">
					<div class="round-profil i"></div>
				</div>
				<h3>Julie Lertemans</h3>
				<p class="profil-com-amis">2 amis en commun</p>
				<h3>Sport favoris</h3>
				<p>Foot, Tennis & Basket</p>
			</a>
		</li>
	</ul>


</div>


<?php require 'template-parts/footer.php'; ?>

</body>

</html>