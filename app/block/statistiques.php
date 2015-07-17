<?php
require_once(dirname(dirname(__DIR__))."/lib/Traitement_donnees.class.php");
if (isset($_POST['siret']) && isset($_POST['email']))
    {$statistiquesEntreprise = EntrepriseStatistique($_POST['siret']);}
     setlocale(LC_MONETARY, 'fr_FR.utf8');
?>
<h2 id="Etape-03">Statistiques</h2>
<?php if(!empty($statistiquesEntreprise)) { ?>
<ul id="listProjet" class="accordion" data-accordion>
 <li class="accordion-navigation">
  <a href="<?php echo $url_canonical;?>#Statut" aria-expanded="false"><h4>Statut des demandes</h4></a>
  <?php 
  //Initialisation des variables du DataSet DATA0
  $NbDossierDéposé=0;
  $NbDossierComité=0;
  $NbDossierRefusé=0;
  $NbDossierProgrammé=0;
  $NbDossierAbandonné=0;
  
   foreach($statistiquesEntreprise['RépartitionDossier']['result'] as $stat): ?>
   <div class="content active" id="Statut">
     <div class="row">
         <div class="small-12 columns">
           <div class="row">
            <div class="small-8 columns">
           <label for="right-label" class="left Aaargh" style="font-size:1.2em;">
            <?php 
              switch ($stat['_id']) {
              case "Déposé" :
                                                echo '<span class="label round success">DP</span>' . ' - ' . $stat['_id'];
                                                $NbDossierDéposé=$stat['NBDossier'];
                                                break;
              case "Proposé comité" :
                                                echo '<span class="label round warning">PC</span>' . ' - ' . $stat['_id']; 
                                                $NbDossierComité=$stat['NBDossier'];
                                                break;
              case "Refusé en comité" :
                                                echo '<span class="label round alert">RC</span>' . ' - ' . $stat['_id']; 
                                                $NbDossierRefusé=$stat['NBDossier'];
                                                break;
              case "Programmé" : 
                                                echo '<span class="label round success">PG</span>' . ' - ' . $stat['_id']; 
                                                $NbDossierProgrammé=$stat['NBDossier'];
                                                break;
              case "Abandonné / Déprogrammé" :
                                                echo '<span class="label round alert">AD</span>' . ' - ' . $stat['_id']; 
                                                $NbDossierAbandonné=$stat['NBDossier'];
                                                break;
                                    }
            ?>
            </label>
            </div>
            <div class="small-4 columns"><h4><?php echo $stat['NBDossier']; ?></h4></div>
           </div>
         </div>
      </div>
   </div>
  <?php endforeach;?>
 </li>
 
 <li class="accordion-navigation">  
 <a href="<?php echo $url_canonical;?>#DepensesGlobales" aria-expanded="false"><h4>Dépenses globales - Périodes 2007-2013</h4></a>
  <div class="content" id="DepensesGlobales">
   <div class="row">
     <div class="small-12 columns">
       <div class="row">
         <div class="small-8 columns"><label for="left-label" class="left Aaargh" style="font-size:1.2em;">Montant total des opérations</label></div>
         <div class="small-4 columns"><h4 class="right"><?php echo money_format('%.2n', $statistiquesEntreprise['RépartitionMontant']['result']['0']['MontantTotal']); ?></h4></div>
        </div>
       </div>
     </div>
     <div class="row">
     <div class="small-12 columns">
       <div class="row">
         <div class="small-8 columns"><label for="left-label" class="left Aaargh" style="font-size:1.1em;">Montant moyen pour une opération</label></div>
         <div class="small-4 columns"><h4 class="right"><em><?php echo money_format('%.2n', $statistiquesEntreprise['RépartitionMontant']['result']['0']['MoyenneMontant']); ?></em></h4></div>
        </div>
       </div>
     </div>
     <div class="row">
      <div class="small-12 columns">
       <div class="row">
         <div class="small-8 columns"><label for="left-label" class="left Aaargh" style="font-size:1.2em;">Dépenses totales Eligibles</label></div>
         <div class="small-4 columns"><h4 class="right"><?php echo money_format('%.2n', $statistiquesEntreprise['StatDepensesEligibles']['result']['0']['DepensesEligibles']);?></h4></div>
        </div>
      </div>
     </div>
    <div class="row">
      <div class="small-12 columns">
       <div class="row">
         <div class="small-8 columns"><label for="left-label" class="left Aaargh" style="font-size:1.2em;">Part des Dépenses totales U.E</label></div>
         <div class="small-4 columns"><h4 class="right"><?php echo money_format('%.2n', $statistiquesEntreprise['StatDepensesProgrammeesUE']['result']['0']['DepensesProgrammeesUE']); ?></h4></div>
        </div>
     </div>
    </div>
    <div class="row">
      <div class="small-12 columns">
       <div class="row">
         <div class="small-8 columns"><label for="left-label" class="left Aaargh" style="font-size:1.2em;">Part des Dépenses totales pour l'Etat</label></div>
         <div class="small-4 columns"><h4 class="right"><?php echo money_format('%.2n', $statistiquesEntreprise['StatDepensesProgrammeesEtat']['result']['0']['DepensesProgrammeesEtat']); ?></h4></div>
        </div>
     </div>
    </div>
    <div class="row">   
      <div class="small-12 columns">
       <div class="row">
         <div class="small-8 columns"><label for="left-label" class="left Aaargh" style="font-size:1.2em;">Part des Dépenses totales pour la Région</label></div>
         <div class="small-4 columns"><h4 class="right"><?php echo money_format('%.2n', $statistiquesEntreprise['StatDepensesProgrammeesRegion']['result']['0']['DepensesProgrammeesRegion']); ?></h4></div>
        </div>
     </div>
    </div>
    <div class="row">   
      <div class="small-12 columns">
       <div class="row">
         <div class="small-8 columns"><label for="left-label" class="left Aaargh" style="font-size:1.2em;">Part des Dépenses totales pour le Département</label></div>
         <div class="small-4 columns"><h4 class="right"><?php echo money_format('%.2n', $statistiquesEntreprise['StatDepensesProgrammeesDepartement']['result']['0']['DepensesProgrammeesDepartement']); ?></h4></div>
        </div>
     </div>
    </div>
    <div class="row">   
      <div class="small-12 columns">
       <div class="row">
         <div class="small-8 columns"><label for="left-label" class="left Aaargh" style="font-size:1.2em;">Part des Dépenses totales pour les Autres publics</label></div>
         <div class="small-4 columns"><h4 class="right"><?php echo money_format('%.2n', $statistiquesEntreprise['StatDepensesProgrammeesAutrePublic']['result']['0']['DepensesProgrammeesAutrePublic']); ?></h4></div>
        </div>
     </div>
    </div>
    <br />
    <div class="row">   
      <div class="small-12 columns">
       <div class="row">
         <div class="small-8 columns"><label for="left-label" class="left Aaargh" style="font-size:1.2em;">Montant total engagée par l'entreprise</label></div>
         <div class="small-4 columns"><h4 class="right"><?php 
            $TotalBeneficaire=$statistiquesEntreprise['StatDepensesEligibles']['result']['0']['DepensesEligibles'] - 
                              ($statistiquesEntreprise['StatDepensesProgrammeesUE']['result']['0']['DepensesProgrammeesUE'] +
                               $statistiquesEntreprise['StatDepensesProgrammeesEtat']['result']['0']['DepensesProgrammeesEtat'] +
                               $statistiquesEntreprise['StatDepensesProgrammeesRegion']['result']['0']['DepensesProgrammeesRegion'] +
                               $statistiquesEntreprise['StatDepensesProgrammeesDepartement']['result']['0']['DepensesProgrammeesDepartement'] +
                               $statistiquesEntreprise['StatDepensesProgrammeesAutrePublic']['result']['0']['DepensesProgrammeesAutrePublic']);
            echo money_format('%.2n',$TotalBeneficaire);
         ?></h4></div>
        </div>
     </div>
    </div>
  </div>
  </li>
 <li class="accordion-navigation">
 <a href="<?php echo $url_canonical;?>#PaimentsCertifies" aria-expanded="false"><h4>Paiements certifiés - Périodes 2007-2013</h4></a>
   <div class="content" id="PaimentsCertifies">
   <div class="row">
     <div class="small-12 columns">
       <div class="row">
         <div class="small-8 columns"><label for="left-label" class="left Aaargh" style="font-size:1.2em;">Paiement total certifié AC</label></div>
         <div class="small-4 columns"><h4 class="right"><?php echo money_format('%.2n', $statistiquesEntreprise['StatPaiementTotalCertifieAC']['result']['0']['PaiementTotalCertifieAC']); ?></h4></div>
        </div>
       </div>
    </div>
    <div class="row">
      <div class="small-12 columns">
       <div class="row">
         <div class="small-8 columns"><label for="left-label" class="left Aaargh" style="font-size:1.2em;">Part des paiements U.E</label></div>
         <div class="small-4 columns"><h4 class="right"><?php echo money_format('%.2n', $statistiquesEntreprise['StatPaiementTotalUE']['result']['0']['PaiementTotalUE']); ?></h4></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="small-12 columns">
       <div class="row">
         <div class="small-8 columns"><label for="left-label" class="left Aaargh" style="font-size:1.2em;">Part des paiements pour l'Etat</label></div>
         <div class="small-4 columns"><h4 class="right"><?php echo money_format('%.2n', $statistiquesEntreprise['StatPaiementTotalEtat']['result']['0']['PaiementTotalEtat']); ?></h4></div>
        </div>
     </div>
    </div>
    <div class="row">   
      <div class="small-12 columns">
       <div class="row">
         <div class="small-8 columns"><label for="left-label" class="left Aaargh" style="font-size:1.2em;">Part des paiements pour la Région</label></div>
         <div class="small-4 columns"><h4 class="right"><?php echo money_format('%.2n', $statistiquesEntreprise['StatPaiementTotalRegion']['result']['0']['PaiementTotalRegion']); ?></h4></div>
        </div>
     </div>
    </div>
    <div class="row">   
      <div class="small-12 columns">
       <div class="row">
         <div class="small-8 columns"><label for="left-label" class="left Aaargh" style="font-size:1.2em;">Part des paiements pour le Département</label></div>
         <div class="small-4 columns"><h4 class="right"><?php echo money_format('%.2n', $statistiquesEntreprise['StatPaiementTotalDepartement']['result']['0']['PaiementTotalDepartement']); ?></h4></div>
        </div>
     </div>
    </div>
    <div class="row">   
      <div class="small-12 columns">
       <div class="row">
         <div class="small-8 columns"><label for="left-label" class="left Aaargh" style="font-size:1.2em;">Part des paiements Autres Publics</label></div>
         <div class="small-4 columns"><h4 class="right"><?php echo money_format('%.2n', $statistiquesEntreprise['StatPaiementTotalAutrePublic']['result']['0']['PaiementTotalAutrePublic']); ?></h4></div>
        </div>
     </div>
    </div>
    <div class="row">   
      <div class="small-12 columns">
       <div class="row">
         <div class="small-8 columns"><label for="left-label" class="left Aaargh" style="font-size:1.2em;">Part des paiements Autres Privés</label></div>
         <div class="small-4 columns"><h4 class="right"><?php echo money_format('%.2n', $statistiquesEntreprise['StatPaiementTotalAutrePrive']['result']['0']['PaiementTotalAutrePrive']); ?></h4></div>
        </div>
     </div>
    </div>
    <br />
    <div class="row">   
      <div class="small-12 columns">
       <div class="row">
         <div class="small-8 columns"><label for="left-label" class="left Aaargh" style="font-size:1.2em;">Montant des paiements de l'entreprise certifié</label></div>
         <div class="small-4 columns"><h4 class="right"><?php echo money_format('%.2n', $statistiquesEntreprise['StatPaiementTotalEntreprise']['result']['0']['PaiementTotalEntreprise']); ?></h4></div>
        </div>
     </div>
    </div>
   </div>
</li>
</ul> 

<?php
$DATA0=[
          $NbDossierDéposé,
          $NbDossierComité,
          $NbDossierRefusé,
          $NbDossierProgrammé,
          $NbDossierAbandonné,
        ];
$DATA1=[
    $statistiquesEntreprise['StatDepensesEligibles']['result']['0']['DepensesEligibles'],
    $statistiquesEntreprise['StatDepensesProgrammeesUE']['result']['0']['DepensesProgrammeesUE'],
    $statistiquesEntreprise['StatDepensesProgrammeesEtat']['result']['0']['DepensesProgrammeesEtat'],
    $statistiquesEntreprise['StatDepensesProgrammeesRegion']['result']['0']['DepensesProgrammeesRegion'],
    $statistiquesEntreprise['StatDepensesProgrammeesDepartement']['result']['0']['DepensesProgrammeesDepartement'],
    $statistiquesEntreprise['StatDepensesProgrammeesAutrePublic']['result']['0']['DepensesProgrammeesAutrePublic'],
    '0',    
    $TotalBeneficaire];

$DATA2=[
    $statistiquesEntreprise['StatPaiementTotalCertifieAC']['result']['0']['PaiementTotalCertifieAC'], 
    $statistiquesEntreprise['StatPaiementTotalUE']['result']['0']['PaiementTotalUE'],
    $statistiquesEntreprise['StatPaiementTotalEtat']['result']['0']['PaiementTotalEtat'],
    $statistiquesEntreprise['StatPaiementTotalRegion']['result']['0']['PaiementTotalRegion'],
    $statistiquesEntreprise['StatPaiementTotalDepartement']['result']['0']['PaiementTotalDepartement'],
    $statistiquesEntreprise['StatPaiementTotalAutrePublic']['result']['0']['PaiementTotalAutrePublic'],
    $statistiquesEntreprise['StatPaiementTotalAutrePrive']['result']['0']['PaiementTotalAutrePrive'],
    $statistiquesEntreprise['StatPaiementTotalEntreprise']['result']['0']['PaiementTotalEntreprise']
    ];
 } else { echo "Aucun historique disponible"; } ?>

<br />
<dl id="view-tabs" class="tabs" data-tab>
    <dd class="tab-title active"><a href="<?php echo $url_canonical;?>#statHisto"><h5>Comparaison</h5></a></dd>
    <dd class="tab-title"><a href="<?php echo $url_canonical;?>#statPolar"><h5>Répartition</h5></a></dd>
    <dd class="tab-title"><a href="<?php echo $url_canonical;?>#statRadar"><h5>Couverture</h5></a></dd>
</dl> 

<div class="tabs-content">
    <div class="content active" id="statHisto">
        <p>Comparaison Dépenses/Paiements pour les dossiers 2007-2013</p>
        <canvas id="Comparaison-graph" width="300" height="200"></canvas>
    </div>
    <div class="content" id="statPolar">
        <p>Répartition des financements (2007-2013)</p>
        <canvas id="Repartition-graph" width="300" height="200"></canvas>
    </div>
    <div class="content" id="statRadar">
        <p>Couverture des financements (2007-2013)</p>
        <canvas id="Couverture-graph" width="300" height="200"></canvas>
    </div>
</div>