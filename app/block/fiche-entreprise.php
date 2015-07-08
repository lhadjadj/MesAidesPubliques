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

<h2><b>Mon Entreprise</b></h2>
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
<div class="row">
    <div class="small-12 columns">
        <div class="row">
            <div class="small-3 columns">
                <figure><img src="/img/Logo/logo_aps2.png" alt="je suis aps" /></figure>
            </div>
            <div class="small-9 columns">
            <p class="text">
                Dans le cadre du projet "Dites-le nous une seule fois", Mes Aides Publiques utilise les services de l'Etat 
                pour connaître les informations relative à votre entreprise entreprise.
                Le dispositif APS - Entreprise (données Insee) et l'Api-Carto (géocodage) sont utilisés.
            </p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="small-12 columns">
<?php
    if($geoCode){
        $latitude = $geoCode[0];
        $longitude = $geoCode[1];
        $formatted_address = $geoCode[2];
    ?>
    <script type="text/javascript">
        function init_map() {
            var myOptions = {
                zoom: 16,
                disableDefaultUI:true,        
                center: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
                mapTypeId: google.maps.MapTypeId.SATELLITE
            };
            map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
            marker = new google.maps.Marker({
                map: map,
                position: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>)
            });
            infowindow = new google.maps.InfoWindow({
                content: "<?php echo $formatted_address; ?>"
            });
            google.maps.event.addListener(marker, "click", function () {
                infowindow.open(map, marker);
            });
            infowindow.open(map, marker);
        }
        google.maps.event.addDomListener(window, 'load', init_map);
    </script> 
    <?php
    } else { echo "Je n'arrive pas à vous localiser."; }
?>
    <div id="gmap_canvas" style="width:500px;height:380px;margin-left:40px;">Chargement de la carte...</div>
    <div id='map-label'></div>
    </div>
</div>
