<?php

$__page_title = 'Sportime | Bienvenue';
$__body_class = 'membre home';
require 'php/connexion-bdd.php';
require 'template-parts/header.php';
require 'template-parts/body-start.php';

require 'php/inscription.php';
require 'php/connexion.php';

?>


<?php if(isset($feedback_connexion)) {  echo $feedback_connexion; } ?>
<?php if(isset($erreurs) && $erreurs !== 0) { echo $erreurs; } ?>
<?php if(isset($reussi)) { echo $reussi; } ?>

<div id="inscription-box" class="modal-container">
	<div class="modal-bg"></div>
	<div class="modal">
		<header>
			<h3>Essaye Sportime</h3>
			<div onclick="return showHide6();" class="modal-close"></div>
		</header>
		<div class="modal-body">
			<?php require 'template-parts/inscription-forms.php'; ?>
		</div>
	</div>
</div>

<section class="indexsection1">
	<header>
		<div class="logo"><img src="img/logo-sportime.png" height="40"></div>
		<div id="bouton-co" class="bouton-co">Connexion</div>
		<form id="login-form" action="" method="post">
			<input id="email-co" type="text" name="email" placeholder="Email">
			<input id="pass-co" type="password" name="password" placeholder="Mot de passe" >
			<input id="co-co" type="submit" value="Connexion" name="connect">
		</form>
	</header>

	<div class="ictaheader content">
		<div class="indexctaheader">
			<h1><span>Organise</span> & partage des <span>événements</span> sportifs</h1>
			<p>Tu as envie de faire une partie de tennis ou d’aller courir avec des amis, découvre Sportime.</p>
			<div class="cta-header">
				<a class="a-more" href="#sportime-information">En savoir plus</a>
				<a href="" class="sign-up">Essaye Sportime</a>
			</div>
			
		</div>
	</div>
	<div  id="sportime-information" class="ban-logo-sport">
		<ul>
			<li class="basket"></li>
			<li class="pong"></li>
			<li class="bike"></li>
			<li class="rugby"></li>
			<li class="run"></li>
			<li class="swim"></li>
			<li class="tennis"></li>
			<li class="volley"></li>
			<li class="muscle"></li>
			<li class="kayak"></li>
			<li class="course"></li>
			<li class="fresbee"></li>
			<li class="ski"></li>
			<li class="foot"></li>
		</ul>
	</div>
</section>

<section  class="s2-evnt">
	<h2>- Passe un bon moment <span>&</span> rencontre d'autres passionés -</h2>
	<p class="s2-soustitre">Sportime te permet de trouver facilement <em>l'évènement sportif</em> qui te convient.</br> 
		C'est la solution idéale si tu as <em>l'esprit de compétition</em> et une envie soudaine de défier tes amis lors d'un match acharné 
		mais également si tu préfères participer à une <em>rencontre amicale</em>. </p>
	<div class="s2-cta sign-up">Participe à un évenement</div>

		<ul class="evenementliste">

			<?php require 'php/liste-home-evenement.php'; ?>

		</ul>

	<div class="s2-cta-inscription">
		<p>Tu as l'esprit de compétition ou tu veux simplement t'amuser avec des amis</p>
		<div class="inscristoi sign-up" href="">Inscris-toi gratuitement</div>
		<p class="s2-contact">ou <a href="mailto:sarah.breemans@gmail.com?Subject=Sportime">contacte-nous</a> pour plus d'infos</p>
	</div>
</section>

<section class="s3-info">
	<ul>
		<li>
			<img src="img/icon-home-bike.png">
			<p>Trouve un évenement 
sportif qui te convient</p>
		</li>
		<li>
			<img src="img/icon-home-today.png">
			<p>Programme & organise
tous tes évenements</p>
		</li>
		<li>
			<img src="img/icon-home-trophy.png">
			<p>Remporte des challenges
et deviens le numéro 1 !</p>
		</li>
	</ul>
</section>

<section class="s4-amis">
	<h2>- Esprit d'équipe -</h2>
	<div>
		<img class="home-amis-gif" src="img/home-amis.gif">
	</div>
	<div class="section-info">
		<h3>Rejoins d'autres personnes ayant envie de participer au même sport que toi.</h3>
		<p>Sportime est une <em>communauté de sportifs</em> qui se retrouvent pour partager l'envie commune de pratiquer du sport. Il n'y a pas d'engagement à long terme dans un club mais juste le <em>plaisir de partager</em> un moment.</p>
		<a class="sign-up">Deviens membre</a>
	</div>
</section>

<section class="s5-agenda">
	<h2>- Organisation -</h2>
	<div class="section-info">
		<h3>Planifie des évènements et organise ton agenda. </h3>
		<p>Sportime permet d'avoir une vue d'ensemble de ton <em>planning sportif</em>
		 grâce à la mise en place d'un agenda. Synchronise-le avec 
		 tes autres calendriers pour te permettre une <em>optimisation</em> maximale de ton temps.</p>
		<p> </p>
	</div>
	<div>
		<img class="home-cal-gif" src="img/home-cal.gif">
	</div>
</section>

<section class="s6-challenge">
	<h2>- Challenges -</h2>
	<div class="container">
		<div class="s6-trophy">
			<img src="img/img-home-trophy.png">
			<div class="section-info">
				<h3>Remporte un max de badges !</h3>
			<p>En participant à des évenements ou en <em>défiant des amis</em>, tu peux remporter des badges et atteindre la tête du classement.</p>
			</div>		
		</div>
		<div class="s6-classement">
			<img src="img/img-home-classement.png">
		</div>
	</div>
</section>

<section class="s7-partenaire">
	
</section>

<section class="s8-inscription">
	<h2>Prends part à cette expérience <span>&</span> rejoins Sportime </h2>
	<?php require 'template-parts/inscription-forms.php'; ?>
</section>


<?php require 'template-parts/footer-home.php'; ?>
<?php require 'template-parts/footer.php'; ?>