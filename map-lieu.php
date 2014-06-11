<?php 
require 'template-parts/header.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    
     <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

     <script type="text/javascript">
      var geocoder;
      var map;
      // initialisation de la carte Google Map de départ
      function initialize() {
        geocoder = new google.maps.Geocoder();
       
        var latlng = new google.maps.LatLng(50.501079, 4.4764595);
        var mapOptions = {
          zoom      : 17,
          center    : latlng,
          // mapTypeId : google.maps.MapTypeId.ROADMAP
        }
        // map-canvas est le conteneur HTML de la carte Google Map
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
      }
   
      function TrouverAdresse() {
        // Récupération de l'adresse tapée dans le formulaire
        var adresse = '<?php echo $adresse; ?>' ; 
        // var adresse = document.getElementById('adresse').value;
        geocoder.geocode( { 'address': adresse}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            // Récupération des coordonnées GPS du lieu tapé dans le formulaire
            var strposition = results[0].geometry.location+"";
            strposition=strposition.replace('(', '');
            strposition=strposition.replace(')', '');
            // Affichage des coordonnées dans le <span>
            document.getElementById('text_latlng').innerHTML='Coordonnées : '+strposition;
            // Création du marqueur du lieu (épingle)
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
          } else {
            alert('Adresse introuvable: ' + status);
          }
        });
      }
      // Lancement de la construction de la carte google map
      google.maps.event.addDomListener(window, 'load', initialize);
      google.maps.event.addDomListener(window, 'load', TrouverAdresse);
    </script>
  </head>
  <body>


    <span id="text_latlng"></span>

    <div id="map-canvas"></div>

    <div class="forms-adress">
        <label for="adresse">Adresse:</label>
        <p><?php echo $adresse; ?></p>
        
    </div>
  </body>
</html>