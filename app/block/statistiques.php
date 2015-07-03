<?php
//require_once(dirname(dirname(__DIR__))."/lib/Traitement_donnees.class.php");
//if (isset($_POST['siret']) && isset($_POST['email']))
//    {$$statistiquesEntreprise = EntrepriseStatistique($_POST['siret']);}
    setlocale(LC_MONETARY, 'fr_FR.utf8');
?>
<h2 class="Aaargh">Statistiques</h2>
<div class="large-8 columns">
<p class="lead">Répartition par partenaire des montants programmés et certifiés</p>
<div class="row graphs">
    <div class="large-6 columns">
        <div class="row">
            <div class="large-2 small-4 columns">
                <ul data-pie-id="Plan_de_financement">
                   <li data-value="<?php echo $projet['DepenseTotalProgrammeUE']; ?>">E.U</li>
                   <li data-value="<?php echo $projet['DepenseTotalProgrammeEtat']; ?>">Etat</li>
                   <li data-value="<?php echo $projet['DepenseTotalProgrammeRegion']; ?>">Région</li>
                   <li data-value="<?php echo $projet['DepenseTotalProgrammeDepartement']; ?>">Départ.</li>
                   <li data-value="<?php echo $projet['DepenseTotalProgrammeAutrePublic']; ?>">A. Public</li>
                </ul>
            </div>
        <div class="large-10 small-8 columns">
            <div id="Plan_de_financement"></div>
        </div>
      </div>
    </div>
    <div class="large-6 columns">
        <div class="row">
            <div class="large-2 small-4 columns">
                <ul data-pie-id="Montants_certifiés" data-options='{"donut":"true"}'>
                   <li data-value="<?php echo $projet['PaiementTotal']; ?>">Bénéficiaire</li>
                   <li data-value="<?php echo $projet['PaiementTotalUE']; ?>">E.U</li>
                   <li data-value="<?php echo $projet['PaiementTotalEtat']; ?>">Etat</li>
                   <li data-value="<?php echo $projet['PaiementTotalRegion']; ?>">Région</li>
                   <li data-value="<?php echo $projet['PaiementTotalDepartement']; ?>">Départ.</li>
                   <li data-value="<?php echo $projet['PaiementTotalAutrePublic']; ?>">A. Public</li>
                   <li data-value="<?php echo $projet['PaiementTotalPrive']; ?>">Privée</li>
                </ul>
            </div>
        <div class="large-10 small-8 columns">
            <div id="Montants_certifiés"></div>
        </div>
        </div>
    </div>
</div>
</div>