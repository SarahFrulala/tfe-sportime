
<?php

require 'php/connexion-bdd.php';


// On récupère tout le contenu de la table 
$reponse = $bdd->query('SELECT
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
                        ORDER BY e.id DESC LIMIT 6');

$donnees = $reponse->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// print_r($donnees);
// echo '</pre>';


foreach($donnees as $evenement) {

?>
<li class="un-evnmt">
    <a class="sign-up" href="evenement/<?php echo $evenement['sport']."/".$evenement['event_id']; ?>">

       <!--  <p class="moreinfo">En savoir plus</p> -->
       
        <?php 

        if ($evenement['sport']=='hockey'){
            echo "<div class='imgwait imgwait-hockey'></div>";
        }

        if ($evenement['sport']=='rugby'){
            echo "<div class='imgwait imgwait-rugby'></div>";
        }

        if ($evenement['sport']=='foot'){
            echo "<div class='imgwait imgwait-foot'></div>";
        }

        if ($evenement['sport']=='basket'){
            echo "<div class='imgwait imgwait-basket'></div>";
        }

        if ($evenement['sport']=='tennis'){
            echo "<div class='imgwait imgwait-tennis'></div>";
        }

        /*
         * Date et heure d'un évènement
         */

        setlocale (LC_ALL, 'fr_FR'); // Pour avoir le jour en français

        $date_bdd = $evenement['dates'];
        $date = strtotime($date_bdd);
        $date = strftime('%A %d %B', $date);

        $heure_bdd = $evenement['heure'];
        $heure = strtotime($heure_bdd);
        $heure = strftime('%Hh%M', $heure);
        
        ?>

        <div class="info-evnt-dash">
            <div class="info-evnt-dash-titre">
                <p><?php echo $date; ?></p>
                <h3><?php echo $evenement['sport']; ?></h3>
                <?php 

                    if ($evenement['sport']=='hockey'){
                        echo "<img src='img/icon-hockey-333.png' width='45'/>";
                    }

                    if ($evenement['sport']=='rugby'){
                        echo "<img src='img/icon-rugby-333.png' width='45'/>";
                    }

                    if ($evenement['sport']=='foot'){
                        echo "<img src='img/icon-foot-333.png' width='45'/>";
                    }

                    if ($evenement['sport']=='basket'){
                        echo "<img src='img/icon-basket-333.png' width='45'/>";
                    }

                    if ($evenement['sport']=='tennis'){
                        echo "<img src='img/icon-tennis-333.png' width='45'/>";
                    }
                    
                ?>
            </div>
            <ul>
                <li><img src="img/icon-clock.png" width="15"/><?php echo $heure; ?></li>
                <li><img src="img/icon-nbre.png" width="15"/><?php echo $evenement['nombre']; ?> participants</li>
            </ul>
            <ul>
                 <li><img src="img/icon-diff.png" width="15"/><?php echo $evenement['difficulte']; ?></li>
                <li><img src="img/icon-type.png" width="15"/><?php echo $evenement['type']; ?></li>
            </ul>
           
            
        </div>

    </a>
</li>

<?php
} // End foreach

$reponse->closeCursor(); // Termine le traitement de la requête

?>

