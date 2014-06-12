<?php

require 'php/connexion-bdd.php';
require 'php/session.php';

    // On récupère tout le contenu de la table 
    // $reponse = $bdd->query('SELECT * FROM evenement ORDER BY id DESC LIMIT 1 ');

    // On affiche chaque entrée une à une
    // while ($donnees = $reponse->fetch()) :

    $event_id = $_GET['id'];

    $sql = "SELECT
                e.id AS event_id,
                e.id_membres,
                e.sport,
                e.dates,
                e.heure,
                e.difficulte,
                e.nombre,
                e.type,
                e.confidentialite,
                e.commentaire,
                e.adresse,
                m.id AS membre_id,
                m.nom,
                m.prenom
            FROM evenement e
            LEFT JOIN membres m
            ON e.id_membres = m.id
            WHERE e.id = '$event_id'";

    $results = $bdd -> query($sql);
    $evenement = $results -> fetchAll(PDO::FETCH_ASSOC);

    // echo '<pre>';
    // print_r($evenement);
    // echo '</pre>';

    $id_membre = $evenement[0]['id_membres'];
    $sport = $evenement[0]['sport'];
    $date_bdd = $evenement[0]['dates'];
    $heure_bdd = $evenement[0]['heure'];
    $difficulte = $evenement[0]['difficulte'];
    $nombre = $evenement[0]['nombre'];
    $type = $evenement[0]['type'];
    $confidentialite = $evenement[0]['confidentialite'];
    $commentaire = $evenement[0]['commentaire'];
    $adresse = $evenement[0]['adresse'];
    $prenom = $evenement[0]['prenom'];
    $nom = $evenement[0]['nom'];

    /*
     * Date et heure d'un évènement
     */

    setlocale (LC_ALL, 'fr_FR'); // Pour avoir le jour en français

    $date = strtotime($date_bdd);
    $date = strftime('%A %d %B', $date);

    $heure = strtotime($heure_bdd);
    $heure = strftime('%Hh%M', $heure);

    /****************************************************************************/
    /* Participation à un événement */
    /****************************************************************************/


    if(isset($_POST['participer'])) {
        if($_POST['participer']) {

            $erreurs = 0;
            $erreur_participe_deja = NULL;

            // Vérification si le participant participe déjà 
            try {
                $sql = "SELECT id FROM participation WHERE event_id = '$event_id' AND id_membres = '$id_utilisateur_connecte'";
                $query = $bdd->query($sql); 
                $count = $query->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(PDOException $e) {
                echo 'Erreur : '.$e->getMessage();
            } 

            if(!empty($count)) {
                $erreur_participe_deja = '<div class="warning"></div>vous <span>participez déjà</span> à cette évenement';
                $erreurs++;
            }

            
            if($erreurs == 0) {

                try {
                    
                    $sql = "INSERT INTO participation (event_id, id_membres)
                            VALUES ('$event_id','$id_utilisateur_connecte')";

                    $query = $bdd->exec($sql);

                    $reussi = '<div class="erreur-co valid"><div class="valid"></div><span>Participation prise en compte</span>, vous pouvez retrouver cet évenement sur votre profil</div>';
      
                    }
                    catch(Exception $e) {
                        echo 'Erreur : '.$e->getMessage();
                    }
            }
            else {
              
                $erreurs = '<div class="erreur-co">';
                $erreurs .= '<ul class="erreurs">';
                $erreurs .= '<li>'.$erreur_participe_deja.'</li>';
                $erreurs .= '</ul>';
                $erreurs .= '</div>';
                $erreurs .= '0';
            }
        }
    }

   

    if(isset($_POST['supprimer'])) {
        if($_POST['supprimer']) {

             try {
                    
                $sql = "DELETE FROM evenement
                        WHERE id = '$event_id'";

                $query = $bdd->exec($sql);

                header('Location: '.$racine.'/dashboard');
                // echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/membre.php">';    //LOCAL
                // exit;
      
                }
                catch(Exception $e) {
                    echo 'Erreur : '.$e->getMessage();
                }
           
        }
    }

    if(isset($_POST['desister'])) {
        if($_POST['desister']) {

             try {
                    
                $sql = "DELETE FROM participation
                        WHERE event_id = '$event_id' AND id_membres = '$id_utilisateur_connecte'";

                $query = $bdd->exec($sql);
                
              
                header('Location: '.$racine.'/evenement/'.$sport.'/'.$event_id.'');
                // echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/evenement/'.$sport.'/'.$event_id.'">';    //LOCAL
                // exit;
      
                }
                catch(Exception $e) {
                    echo 'Erreur : '.$e->getMessage();
                }
           
        }
    }



$__body_class = 'membre';
$__page_title = ucfirst($sport) . ' le ' . strtolower($date) . ' | Sportime';

require 'template-parts/header.php';
require 'template-parts/body-start.php';
require 'template-parts/sidebar.php';

?>

<?php if(isset($erreurs) && $erreurs !== 0) { echo $erreurs; } ?>
<?php if(isset($reussi)) { echo $reussi; } ?>


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

<div class="recap-evnmt">

<form class="formcreaevnmt" id="login" action="" method="post">

   
   <!--  <div>
        <input type="submit" value="Supprimer" name="supprimer">
    </div>
 -->
    <div class="forms-sport">

        <?php 

                if ($sport=='hockey'){
                    echo "<div class='bg-forms-sport bg-forms-sport-hockey'></div>";
                }
      
                if ($sport=='rugby'){
                    echo "<div class='bg-forms-sport bg-forms-sport-rugby'></div>";
                }

                if ($sport=='foot'){
                    echo "<div class='bg-forms-sport bg-forms-sport-foot'></div>";
                }

                if ($sport=='basket'){
                    echo "<div class='bg-forms-sport bg-forms-sport-basket'></div>";
                }

                if ($sport=='tennis'){
                    echo "<div class='bg-forms-sport bg-forms-sport-tennis'></div>";
                }
                else {
                    echo "<div class='bg-forms-sport'></div> ";
                }

        ?>

        

        <div class="forms-sport-content titre-sport">
            <div class="titre-text">
                <b><?php echo $sport; ?></b>
                <div class="titre-sport-img">
                     <?php 

                    if ($sport=='hockey'){
                        echo "<img class='icon-hockey' src='".$racine."/img/icon-hockey-333.png' width='35'>";
                    }
          
                    if ($sport=='rugby'){
                        echo "<img src='".$racine."/img/icon-rugby-333.png' width='30'>";
                    }

                    if ($sport=='foot'){
                        echo "<img src='".$racine."/img/icon-foot-333.png' width='30'>";
                    }

                    if ($sport=='basket'){
                        echo "<img src='".$racine."/img/icon-basket-333.png' width='30'>";
                    }

                    if ($sport=='tennis'){
                        echo "<img src='".$racine."/img/icon-tennis-333.png' width='30'>";
                    }

                    ?>
                </div>
                <p>Organisé par <span><?php echo $prenom . ' ' . $nom; ?></span></p>
            </div>
            <img class="profil-pic" src="<?php echo $racine; ?>/img/img-profile-pic.png" width="65"/>
        </div>
    </div>

    <div class="contentinfo_lieu">

        <div class="forms-info">
            <h2>Informations générales</h2>
            <ul>
                <li class="forms-date">
                    <label for="date">Date</label>
                    <p><?php echo $date; ?></p>
                </li>
                <li class="forms-heure">
                    <label for="time">Heure</label>
                    <p><?php echo $heure; ?></p>
                </li>
                <li class="forms-diff">
                    <label for="difficulte">Difficulté</label>
                    <p><?php echo $difficulte; ?></p>
                </li>
                <li class="forms-nbr">
                    <label for="number">Nombre</label>
                    <p><?php echo $nombre; ?> participants</p>
                </li>
                <li class="forms-type">
                    <label for="type">Type</label>
                   <p><?php echo $type; ?></p>
                </li>
                <li class="forms-conf">
                    <label for="confidentialite">Confidentialité</label>
                   <p> <?php echo $confidentialite; ?></p>
                </li>
                <li class="forms-com evnt">
                    <label for="commentaire">Commentaire</label>
                    <p class="sport-com"><?php echo $commentaire; ?></p>
                </li>
            </ul>

            <h2>Participants (9)</h2>
            <div class="img-amis-forms" onclick="return showHide();"></div>

            <div class="forms-info-submit">

                 <?php
                    if ($id_utilisateur_connecte == $id_membre){
                        echo "<input type='submit' value='Supprimer' name='supprimer'>";
                    }
                    else {

                        // if ($event_id = $event_id && $id_membres = $id_utilisateur_connecte){
                        //     echo "<input type='submit' value='Se desister' name='participer'>";
                        // }
                        // else {
                        //     echo "<input type='submit' value='Se desister' name='participer'>";
                        // }

                        $erreurs = 0;
                        $erreur_participe_deja = NULL;

                        // Vérification si le participant participe déjà 
                        try {
                            $sql = "SELECT id FROM participation WHERE event_id = '$event_id' AND id_membres = '$id_utilisateur_connecte'";
                            $query = $bdd->query($sql); 
                            $count = $query->fetchAll(PDO::FETCH_ASSOC);
                        }
                        catch(PDOException $e) {
                            echo 'Erreur : '.$e->getMessage();
                        } 

                        if(!empty($count)) {
                            $erreurs++;
                        }

                        if($erreurs == 0) {
                            echo "<input type='submit' value='Participer' name='participer'>";
                        }
                        else {
                            echo "<input type='submit' value='Se desister' name='desister'>";
                            $erreurs .= '0';
                        }

                    }
                ?>

                
                <a href="#" onclick="return showHide();">inviter des amis</a>
            </div>

        </div>

       

        <div class="forms-lieu">
             <div class="forms-lieu-map">

              
               <?php require 'map-lieu.php'; ?> 
               
            </div> 
        </div>   
    </div>
    
</form>

<?php require 'template-parts/footer.php'; ?>

</body>

</html>