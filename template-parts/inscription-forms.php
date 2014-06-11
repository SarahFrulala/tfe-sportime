<form id="inscription" action="" method="post">
	<input class="innom" type="text" name="nom" placeholder="Nom" value="<?php if(isset($nom)) { echo $nom; } ?>" >
	<input class="inprenom" type="text" name="prenom" placeholder="Prénom" value="<?php if(isset($prenom)) { echo $prenom; } ?>"/><br/>
	<input type="text" name="email" placeholder="Email" value="<?php if(isset($email)) { echo $email; } ?>"/><br/>
	<input type="password" name="password" placeholder="Mot de passe" value="<?php if(isset($password)) { echo $password; } ?>"/><br/>
	<input type="submit" value="S'inscrire" name="register"/>
</form>