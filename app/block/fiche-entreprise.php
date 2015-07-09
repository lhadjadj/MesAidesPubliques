<?php
require_once(dirname(dirname(__DIR__))."/lib/Traitement_donnees.class.php");
require_once(dirname(dirname(__DIR__))."/lib/GeoCode.php");
if (isset($_POST['siret']) && isset($_POST['email']))
   {
    $identiteEntreprise = EntrepriseIdentite($_POST['siret']);
    $MonAdresse=$identiteEntreprise['AdresseRue'] . ", " . $identiteEntreprise['AdresseCodePostale'] . ", " . $identiteEntreprise['AdresseVille'] ;
    $geoCode = geocode($MonAdresse);
   }
?>

<h2 id="Etape-01"><b>Mon Entreprise</b></h2>
<div class="row">
    <div class="small-12 columns">
        <div class="row">
            <div class="small-3 columns">
                <label for="right-label" class="right">Siret</label>
            </div>
            <div class="small-9 columns">
                <?php echo $identiteEntreprise['NumeroSiret']; ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        <div class="row">
            <div class="small-3 columns">
                <label for="right-label" class="right">Raison Sociale</label>
            </div>
            <div class="small-9 columns">
                <?php echo $identiteEntreprise['RaisonSocial']; ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        <div class="row">
            <div class="small-3 columns">
                <label for="right-label" class="right">Nature Activité</label>
            </div>
            <div class="small-9 columns">
                <?php echo $identiteEntreprise['NatureActivité']; ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        <div class="row">
            <div class="small-3 columns">
                <label for="right-label" class="right">Activité</label>
            </div>
            <div class="small-9 columns">
                <?php echo $identiteEntreprise['CodeActivité']; ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        <div class="row">
            <div class="small-3 columns">
                <label for="right-label" class="right">Adresse</label>
            </div>
            <div class="small-9 columns">
                <?php echo $identiteEntreprise['AdresseRue']; ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        <div class="row">
            <div class="small-3 columns">
                <label for="right-label" class="right">Code Postal</label>
            </div>
            <div class="small-9 columns inline">
                <?php echo $identiteEntreprise['AdresseCodePostale']; ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        <div class="row">
            <div class="small-3 columns">
                <label for="right-label" class="right">Ville</label>
            </div>
            <div class="small-9 columns">
                <?php echo $identiteEntreprise['AdresseVille']; ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        <div class="row">
            <div class="small-3 columns">
                <label for="right-label" class="right">Code Insee</label>
            </div>
            <div class="small-9 columns">
                <?php echo $identiteEntreprise['AdresseCodeInsee']; ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        <div class="row">
            <div class="small-3 columns">
                <label for="right-label" class="right">GeoCode</label>
            </div>
            <div class="small-9 columns">
                ( <?php echo $geoCode['0']; ?> , <?php echo $geoCode['1']; ?> )
            </div>
        </div>
    </div>
</div>

<br />

<div class="row">
 <div class="small-12 columns">
    <?php
    if($geoCode){
        $latitude = $geoCode[0];
        $longitude = $geoCode[1];
        $formatted_address = $geoCode[2];
        echo '<script type="text/javascript">
               function init_map() {
                    var myOptions = {
                    zoom: 16,
                    disableDefaultUI:true,        
                    center: new google.maps.LatLng(' . $latitude . ',' . $longitude . '),
                    mapTypeId: google.maps.MapTypeId.SATELLITE
                    };
                    map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
                    marker = new google.maps.Marker({
                        map: map,
                        position: new google.maps.LatLng(' . $latitude . ',' . $longitude . ')
                        });
                    infowindow = new google.maps.InfoWindow({content: "' . $formatted_address .  '"});
                    google.maps.event.addListener(marker, "click", function () {infowindow.open(map, marker);});
                    infowindow.open(map, marker);
                    }
                google.maps.event.addDomListener(window, "load", init_map);
                </script>';}
    else { echo "Je n'arrive pas à vous localiser."; }
    ?>
    <div id="gmap_canvas" class="map">Chargement de la carte...</div>
 </div>
</div>

<br />

 <div class="row">
  <div class="small-5 columns">
    <h4>Un problème sur vos données ?</h4>
  </div>
  <div class="small-7 columns">
        <a href="#" data-reveal-id="CFE" class="button tiny round alert" role="button">OUI</a>
        <div id="CFE" 
             class="reveal-modal" 
             data-reveal aria-labelledby="cfeTitle" 
             aria-hidden="true" 
             role="dialog">
             <h2 id="cfeTitle">Vos coordonnées sont erronées ?</h2>
             <br />
             <p class="lead">Un courriel, pour signaler les anomalies, 
                 a été transmis à votre Centre de Formalités des Entreprises.</p>
             <p class="lead">Merci de prendre contact dès que possible avec 
                 votre CFE afin de régulariser votre situation.</p>
             <a class="close-reveal-modal" aria-label="Close">&#215;</a>
         </div>
  </div>
 </div>
    
<hr />

<div class="row">
    <div class="small-12 medium-12 large-12 columns">
        <div class="row small-collapse medium-collapse large-collapse">
            <div class="small-5 medium-5 large-5 columns">
                <figure class="aps"><img src="/img/Logo/logo_aps2.png" alt="je suis aps" /></figure>
            </div>
            <div class="small-7 medium-7 large-7 columns">
            <p class="text">
                Dans le cadre du projet "Dites-le nous une seule fois", Mes Aides Publiques utilise les services de l'Etat 
                pour connaître les informations relative à votre entreprise entreprise.
                Le dispositif APS - Entreprise (données Insee) et l'Api-Carto (géocodage) sont utilisés.
            </p>
            </div>
        </div>
    </div>
</div>

</div>
