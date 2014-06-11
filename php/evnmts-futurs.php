
<?php

require 'php/connexion-bdd.php';


// On récupère tout le contenu des différentes tables : ici evenement et membres
$reponse = $bdd->query("SELECT
                            e.id AS event_id,
                            e.id_membres AS creator_id,
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
                            m.prenom,
                            m.email
                        FROM evenement e
                        LEFT JOIN membres m
                        ON e.id_membres = m.id
                        WHERE m.id ='$id_utilisateur_connecte'
                        ORDER BY e.id DESC 
                        LIMIT 3
                        ");

$donnees = $reponse->fetchAll(PDO::FETCH_ASSOC);



foreach($donnees as $evenement) {
?>
<li class="un-evnmt">
    <a href="<?php echo $racine; ?>/evenement.php?id=<?php echo $evenement['event_id']; ?>">
        
    <?php 

        if ($evenement['sport']=='hockey'){
            echo '<img src="'.$racine.'/img/icon-hockey-side.png" width="30" >';
        }

        if ($evenement['sport']=='rugby'){
            echo '<img src="'.$racine.'/img/icon-rugby-side.png" width="30" >';
        }

        if ($evenement['sport']=='foot'){
            echo '<img src="'.$racine.'/img/icon-foot-side.png" width="30" >';
        }

        if ($evenement['sport']=='basket'){
            echo '<img src="'.$racine.'/img/icon-basket-side.png" width="30" >';
        }

        if ($evenement['sport']=='tennis'){
            echo '<img src="'.$racine.'/img/icon-tennis-side.png" width="30" >';
        }


        /*
        * Date et heure d'un évènement
        */

        setlocale (LC_ALL, 'fr_FR'); // Pour avoir le jour en français

        $date_bdd = $evenement['dates'];
        $date = strtotime($date_bdd);
        $date = strftime('%A %d %B', $date);

    ?>
        <ul>
            <li><h3><?php echo $evenement['sport']; ?></h3></li>
            <li class="futur-dates"><?php echo $date; ?><br /></li>
        </ul>
    </a>
</li>

<?php
} // End foreach

$reponse->closeCursor(); // Termine le traitement de la requête



?>

