<?php
require_once(dirname(dirname(__DIR__))."/lib/Traitement_donnees.class.php");
if (isset($_POST['siret']) && isset($_POST['email']))
    {
    $historiqueEntreprise = EntrepriseHistorique($_POST['siret']);
    $historiqueDossierAnnule = DossierAnnuleHistorique($_POST['siret']);
    }
    setlocale(LC_MONETARY, 'fr_FR.utf8');
?>

<h2>Historique <strong><?php echo $historiqueEntreprise->count();?></strong> dossier(s), dont <?php echo $historiqueDossierAnnule->count();?> abandonné(s)</h2>

<?php
if(!empty($historiqueEntreprise)) { ?>
<ul id="listProjet" class="accordion"  data-accordion>
 <?php
  foreach($historiqueEntreprise as $numProjet => $projet):?>
    <li class="accordion-navigation">
      <a href="<?php echo $url_canonical;?>#historique-projet-<?php echo $numProjet?>" aria-expanded="false">
         <?php 
          switch ($projet['EtatStatus']) {
              case "Déposé" :
                                                echo '<span class="label round success">DP</span>' . ' - ' .$projet['DateDepotDossier'] . ' - ' . $projet['Projet']; 
                                                break;
              case "Proposé comité" :
                                                echo '<span class="label round warning">PC</span>' . ' - ' .$projet['DateDepotDossier'] . ' - ' . $projet['Projet']; 
                                                break;
              case "Refusé en comité" :
                                                echo '<span class="label round alert">RC</span>' . ' - ' .$projet['DateDepotDossier'] . ' - ' . $projet['Projet']; 
                                                break;
              case "Programmé" : 
                                                echo '<span class="label round success">PG</span>' . ' - ' . $projet['DateDepotDossier'] . ' - ' . $projet['Projet']; 
                                                break;
              case "Abandonné / Déprogrammé" :
                                                echo '<span class="label round alert">AD</span>' . ' - ' .$projet['DateDepotDossier'] . ' - ' . $projet['Projet']; 
                                                break;
         }
            ?>
      </a>
       <div class="content" id="historique-projet-<?php echo $numProjet?>">
        <div class="row">
          <div class="row">
            <div class="small-12 columns">
             <div class="row">
                <div class="small-3 columns"><label for="right-label" class="right">Type</label></div>
                <div class="small-9 columns"><?php echo $projet['PO']; ?></div>
             </div>
            </div>
          </div>
          <div class="row">
           <div class="small-12 columns">
             <div class="row">
                <div class="small-3 columns"><label for="right-label" class="right">Dossier - Montant Global - Engagé</label></div>
                <div class="small-9 columns"><?php echo  '<strong>'.$projet['Dossier'] . '</strong> - ' . money_format('%.2n', $projet['PaiementTotalValideAC']) . ' - ' . money_format('%.2n', $projet['PaiementTotal']); ?></div>
             </div>
           <div class="small-12 columns">
             <div class="row">
                <div class="small-3 columns"><label for="right-label" class="right">CPER (Etat - Région)</label></div>
                <div class="small-9 columns"><?php echo money_format('%.2n', $projet['DepenseTotalProgrammeCperEtat']) . ' - ' . money_format('%.2n', $projet['DepenseTotalProgrammeCperRegion']); ?></div>
             </div>
           </div>
          </div>
        </div>
      </div>
    </li>
 <?php endforeach;?>
 </ul>
<?php } else { echo "Aucun historique disponible"; } ?>


<!--EtatStatus: 'Abandonné / Déprogrammé'
    EtatStatus: 'Programmé'
    EtatStatus: 'Refusé en comité'
    EtatStatus: 'Proposé comité'
    EtatStatus: 'Déposé' 
-->

