<?php
require_once(dirname(dirname(__DIR__))."/lib/Traitement_donnees.class.php");
$siret = (isset($_POST['siret']) && isset($_POST['email']))?$_POST['siret']:"23350001600040";
$identiteEntreprise = EntrepriseIdentite($siret);
?>
<h2>Mon Entreprise</h2>
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
                ( <?php echo $identiteEntreprise['AdresseGeoLong']; ?> , <?php echo $identiteEntreprise['AdresseGeoLat']; ?> )
            </div>
        </div>
    </div>
</div>